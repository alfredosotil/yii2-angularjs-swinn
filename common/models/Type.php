<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property integer $id
 * @property string $type
 * @property string $category
 * @property integer $active
 *
 * @property User[] $users
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'category', 'active'], 'required'],
            [['active'], 'integer'],
            [['type', 'category'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'category' => Yii::t('app', 'Category'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['type_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TypeQuery(get_called_class());
    }
}
