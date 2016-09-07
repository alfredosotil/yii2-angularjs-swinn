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

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/mdb.js',
        'js/tether.js',
    ];
    public $jsOptions = [
        'position' => View::POS_END,
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}
