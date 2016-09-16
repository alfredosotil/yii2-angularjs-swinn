<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Description of newPHPClass
 *
 * @author asotilp
 */
class MdbootstrapAsset extends AssetBundle {

    public $basePath = '@webroot/MDB';
    public $baseUrl = '@web/MDB';
    public $css = YII_ENV_DEV ? [
        'css/bootstrap.css',
        'css/mdb.css',
    ]:[
        'css/bootstrap.min.css',
        'css/mdb.min.css',
    ];
    public $js = YII_ENV_DEV ? [
        'js/jquery-2.2.3.js',
        'js/tether.js',
        'js/bootstrap.js',
        'js/mdb.js',
    ]:[
        'js/jquery-2.2.3.min.js',
        'js/tether.min.js',
        'js/bootstrap.min.js',
        'js/mdb.min.js',
    ];
    public $jsOptions = [
        'position' => View::POS_END,
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}
