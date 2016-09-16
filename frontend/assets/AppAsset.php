<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/app.js',
        'js/controllers.js',
        'js/services.js',
        'js/directives.js',
//        'js/filters.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
        'frontend\assets\AngularAsset',
//        'frontend\assets\WavesAsset',
        'frontend\assets\CrudAsset',
        'frontend\assets\MdbootstrapAsset',
    ];
}
