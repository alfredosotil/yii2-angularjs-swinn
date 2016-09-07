<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\WavesAsset;

AppAsset::register($this);
//WavesAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="myapp" ng-cloak>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script>paceOptions = {ajax: {trackMethods: ['GET', 'POST']}};</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-corner-indicator.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body  ng-controller="SiteCtrl" >
        <?php $this->beginBody() ?>
    <md-sidenav class="md-sidenav-right md-whiteframe-4dp" md-component-id="menuOperation">
        <md-toolbar class="md-theme-light">
            <h1 class="md-toolbar-tools">Sidenav Right</h1>

        </md-toolbar>
        <md-content flex layout-padding>
            <md-button ng-click="close()" class="md-primary">
                Close Sidenav Right
            </md-button>
            <md-list>
                <md-list-item ng-repeat="item in menuModules" md-ink-ripple="#3F51B5" class="pointer">

                    <md-menu-link>
                        <md-icon aria-label="{{item.label}}" class="material-icons">{{item.iconfa}}</md-icon>                            
                        <a ng-click="select(item)" ng-class="{active: isActive(item)}" ng-href="{{'#/' + item.controller}}">{{item.label}}</a>
                    </md-menu-link>
                </md-list-item>
            </md-list>            
        </md-content>
    </md-sidenav>
    <md-content flex layout-padding>
        <div layout="column" layout-align="top left">
            <div>
                <md-button ng-click="toggleMenu()" ng-hide="isOpenMenu()" class="md-icon-button">
                    <md-icon md-menu-origin class="material-icons">menu</md-icon>
                </md-button>
             <!--<a class="btn-floating btn-large waves-effect waves-light red"  ><i class="material-icons">add</i></a>-->
                <!--                <md-button ng-click="toggleMenu()" ng-hide="isOpenMenu()" class="md-primary md-raised">
                                    Toggle right
                                </md-button>-->
            </div>
             </div>
    </md-content>
    <nav class="">
        <div class="nav-wrapper">
            <a class="brand-logo" href="#/">Swinn</a>
            <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li ng-class="{ active: isActive('/index')}"><a href="#/index">Inicio</a></li>
                <li ng-class="{ active: isActive('/aboutus')}"><a href="#/aboutus">Nosotros</a></li>
                <li ng-class="{ active: isActive('/services')}"><a href="#/services">Servicios</a></li>
                <li ng-class="{ active: isActive('/contact')}"><a href="#/contact">Contacto</a></li>

            </ul>
            <!--                        <ul class="side-nav" id="mobile-nav" ng-controller="SiteCtrl">
                                        <li ng-class="{active: isActive('/')}"><a href="#/">Inicio</a></li>
                                        <li ng-class="{active: isActive('/user')}"><a href="#/user">Usuarios</a></li>
                                        <li ng-class="{active: isActive('/customers')}"><a href="#/customers">clientes</a></li>
                                        <li ng-class="{active: isActive('/services')}"><a href="#/services">Servicios</a></li>
                                        <li ng-class="{active: isActive('/contact')}"><a href="#/contact">Contacto</a></li>
                    
                                    </ul>-->
        </div>
    </nav>
    <div class="container">
        <div ng-view>
        </div>
    </div>    
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Rubik Cube Ideas - better solutions <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
