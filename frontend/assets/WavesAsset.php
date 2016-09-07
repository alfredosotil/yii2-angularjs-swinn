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
class WavesAsset extends AssetBundle {

    //put your code here
    public $sourcePath = '@bower';
    public $css = [
        'waves/dist/waves.min.css',
    ];
    public $js = [ 
        'waves/dist/waves.js',
        ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

}
