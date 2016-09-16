<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $names
 * @property string $surnames
 * @property string $email
 * @property string $username
 * @property string $password
 * @property integer $active
 * @property string $lastupdate
 * @property integer $type_id
 * @property integer $state_id
 * @property string $sex
 * @property integer $profile_id
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Ideas[] $ideas
 * @property Profile $profile
 * @property State $state
 * @property Type $type
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['names', 'surnames', 'email', 'username', 'password', 'active', 'type_id', 'state_id', 'sex', 'profile_id'], 'required'],
            [['active', 'type_id', 'state_id', 'profile_id'], 'integer'],
            [['lastupdate'], 'safe'],
            [['names'], 'string', 'max' => 100],
            [['surnames', 'email', 'username', 'password', 'authKey', 'accessToken'], 'string', 'max' => 45],
            [['sex'], 'string', 'max' => 1],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'names' => Yii::t('app', 'Names'),
            'surnames' => Yii::t('app', 'Surnames'),
            'email' => Yii::t('app', 'Email'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'active' => Yii::t('app', 'Active'),
            'lastupdate' => Yii::t('app', 'Lastupdate'),
            'type_id' => Yii::t('app', 'Type ID'),
            'state_id' => Yii::t('app', 'State ID'),
            'sex' => Yii::t('app', 'Sex'),
            'profile_id' => Yii::t('app', 'Profile ID'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'accessToken' => Yii::t('app', 'Access Token'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdeas() {
        return $this->hasMany(Ideas::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile() {
        return $this->hasOne(Profile::className(), ['id' => 'profile_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState() {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType() {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find() {
        return new UserQuery(get_called_class());
    }

    public static function findByUsername($username) {
        $user = User::find()
                ->where("active=:active", ["active" => 1])
                ->andWhere("username=:username", [":username" => $username])
                ->one();
        if ($user) {
            return new static($user);
        }
        return null;
    }

    public function getAuthKey() {
        return $this->authKey;
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password) {
        return $this->password === $password;
    }

    public static function findIdentity($id) {
        $user = User::find()
                ->where("active=:active", [":active" => 1])
                ->andWhere("id=:id", ["id" => $id])
                ->one();
        return isset($user) ? new static($user) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        if (Yii::$app->session->get('accessToken') === $token) {
            return static::findOne([
                        'username' => Yii::$app->session->get('username'),
                        'password' => Yii::$app->session->get('password'),
                        'active' => 1]);
        }
        return null;
//        return static::findOne(['password' => $token]);
    }

}
