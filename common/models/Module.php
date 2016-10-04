<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property integer $id
 * @property string $iconfa
 * @property string $label
 * @property string $description
 * @property string $controller
 * @property integer $active
 * @property integer $type_id
 *
 * @property Access[] $accesses
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'description', 'controller', 'active', 'type_id'], 'required'],
            [['active', 'type_id'], 'integer'],
            [['iconfa'], 'string', 'max' => 100],
            [['label', 'controller'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }
    
    public function extraFields() {
        return ['type'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iconfa' => 'Iconfa',
            'label' => 'Label',
            'description' => 'Descripcion',
            'controller' => 'Controlador',
            'active' => 'Activo',
            'type_id' => 'Tipo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccesses()
    {
        return $this->hasMany(Access::className(), ['module_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType() {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }
}
