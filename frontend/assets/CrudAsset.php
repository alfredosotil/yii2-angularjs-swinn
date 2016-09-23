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
 * Description of CrudAsset
 *
 * @author asotilp
 */
class CrudAsset  extends AssetBundle{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'mgcrud/mgcrud.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
