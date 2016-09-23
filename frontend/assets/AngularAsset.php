<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AngularAsset extends AssetBundle {

    public $sourcePath = '@bower';
    public $css = YII_ENV_DEV ? [
        'angular-material/angular-material.css',
        'angular-material-icons/angular-material-icons.css',
    ]:[
        'angular-material/angular-material.min.css',
        'angular-material-icons/angular-material-icons.css',
    ];
    public $js = YII_ENV_DEV ? [
        'angular/angular.js',
        'angular-route/angular-route.js',
        'angular-resource/angular-resource.js',
        'angular-animate/angular-animate.js',
        'angular-aria/angular-aria.js',
        'angular-messages/angular-messages.js',
        'angular-material/angular-material.js',
        'angular-material-icons/angular-material-icons.js',
        'angular-strap/dist/angular-strap.js',
    ]:[
        'angular/angular.js',
        'angular-route/angular-route.min.js',
        'angular-resource/angular-resource.min.js',
        'angular-animate/angular-animate.min.js',
        'angular-aria/angular-aria.min.js',
        'angular-messages/angular-messages.min.js',
        'angular-material/angular-material.min.js',
        'angular-material-icons/angular-material-icons.min.js',
        'angular-strap/dist/angular-strap.min.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

}
