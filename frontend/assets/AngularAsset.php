<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AngularAsset extends AssetBundle {

    public $sourcePath = '@bower';
    public $css = [
        'angular-material/angular-material.min.css',
    ];
    public $js = [
        'angular/angular.js',
        'angular-route/angular-route.min.js',
        'angular-resource/angular-resource.min.js',
        'angular-animate/angular-animate.min.js',
        'angular-aria/angular-aria.min.js',
        'angular-messages/angular-messages.min.js',
        'angular-material/angular-material.min.js',
        'angular-strap/dist/angular-strap.min.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

}
