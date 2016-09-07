<?php

namespace backend\controllers;

use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class AccessController extends ActiveController
{
    public $modelClass = 'common\models\Access';
    
    public function behaviors() {
        return ArrayHelper::merge(parent::behaviors(), [
                    'corsFilter' => [
                        'class' => \yii\filters\Cors::className(),
                    ],
        ]);
    }
}
