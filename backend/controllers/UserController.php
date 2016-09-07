<?php

namespace backend\controllers;

use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class UserController extends ActiveController {

    public $modelClass = 'common\models\User';

    public function behaviors() {
        return ArrayHelper::merge(parent::behaviors(), [
                    'corsFilter' => [
                        'class' => \yii\filters\Cors::className(),
                    ],
        ]);
    }

}
