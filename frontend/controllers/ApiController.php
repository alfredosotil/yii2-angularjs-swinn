<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\ContactForm;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\rest\Controller;
use yii\filters\auth\HttpBearerAuth;
use frontend\assets\AppAsset;

class ApiController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'only' => ['dashboard'],
        ];
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'only' => ['dashboard'],
            'rules' => [
                [
                    'actions' => ['dashboard'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];
        return $behaviors;
    }

    public function actionLogin() {
        $model = new LoginForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
            Yii::$app->session->set('accessToken', Yii::$app->getSecurity()->generatePasswordHash(Yii::$app->user->identity->password));
            Yii::$app->session->set('username', Yii::$app->user->identity->username);
            Yii::$app->session->set('password', Yii::$app->user->identity->password);
            return ['access_token' => Yii::$app->session->get('accessToken')];
        } else {
            $model->validate();
            return $model;
        }
    }

    public function actionLogout() {
        $username = Yii::$app->session->get('username');
        $accessToken = Yii::$app->session->get('accessToken');
        $message = "La sesion ha sido destruida para el usuario $username, accessToken=$accessToken";
        Yii::$app->session->destroy();
        return ['message' => $message];
    }

    public function actionDashboard() {
//        $test = Yii::$app->db->createCommand('SELECT * FROM user')
//            ->queryAll();
        $response = [
            'username' => Yii::$app->user->identity->username,
            'access_token' => Yii::$app->session->get('accessToken'),
            'menu' => AppAsset::menuDashboard(),
//            'menu' => count($test),
//            'access_token' => Yii::$app->user->identity->password
//            'access_token' => $hash,
        ];
        return $response;
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                $response = [
                    'flash' => [
                        'class' => 'success',
                        'message' => 'Thank you for contacting us. We will respond to you as soon as possible.',
                    ]
                ];
            } else {
                $response = [
                    'flash' => [
                        'class' => 'error',
                        'message' => 'There was an error sending email.',
                    ]
                ];
            }
            return $response;
        } else {
            $model->validate();
            return $model;
        }
    }

}
