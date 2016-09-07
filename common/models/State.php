<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property integer $id
 * @property string $state
 * @property string $category
 * @property integer $active
 *
 * @property User[] $users
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state', 'category', 'active'], 'required'],
            [['active'], 'integer'],
            [['state', 'category'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'state' => Yii::t('app', 'State'),
            'category' => Yii::t('app', 'Category'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['state_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return StateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StateQuery(get_called_class());
    }
}
