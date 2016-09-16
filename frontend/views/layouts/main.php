<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
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
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    </head>
    <body  ng-controller="SiteCtrl" style="margin-top: 55px;height: auto;">
        <?php $this->beginBody() ?>
        <!--    <md-sidenav class="md-sidenav-right md-whiteframe-4dp" md-component-id="menuOperation">
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
                     <a class="btn-floating btn-large waves-effect waves-light red"  ><i class="material-icons">add</i></a>
                                        <md-button ng-click="toggleMenu()" ng-hide="isOpenMenu()" class="md-primary md-raised">
                                            Toggle right
                                        </md-button>
                    </div>
                </div>
            </md-content>-->
        <nav class="navbar navbar-fixed-top bg-faded navbar-dark secondary-color-dark">
            <!--Collapse button-->
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2"><i class="fa fa-bars"></i></button>

            <div class="container">
                <!--Collapse content-->
                <div class="collapse navbar-toggleable-xs" id="collapseEx2">
                    <!--Navbar Brand-->
                    <a class="navbar-brand" href="#/">SwInn</a>
                    <!--Links-->
                    <ul class="nav navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#/index">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#/aboutus">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#/services">Servicios</a>
                        </li>                
                        <li class="nav-item">
                            <a class="nav-link" href="#/contact">Contacto</a>
                        </li>  
                        <li class="nav-item pull-right" ng-hide="loggedIn()">
                            <a class="nav-link" href="#/login">Iniciar Sesion</a>
                        </li>    
                    </ul>
<!--                    <md-fab-speed-dial md-open="false" md-direction="down" class="md-fling">
                        <md-fab-trigger>
                            <md-button aria-label="menu" class="md-fab md-warn material-icons">
                                <md-icon>menu</md-icon>
                            </md-button>
                        </md-fab-trigger>
                        <md-fab-actions>
                            <md-button aria-label="Twitter" class="md-fab md-raised md-mini">
                                <md-icon class="material-icons" aria-label="Twitter">accessibility</md-icon>
                            </md-button>
                            <md-button aria-label="Facebook" class="md-fab md-raised md-mini">
                                <md-icon class="material-icons" aria-label="Facebook">facebook</md-icon>
                            </md-button>
                            <md-button aria-label="Google Hangout" class="md-fab md-raised md-mini">
                                <md-icon class="material-icons" aria-label="Google Hangout">hangout</md-icon>
                            </md-button>
                        </md-fab-actions>
                    </md-fab-speed-dial>-->
                    <ul class="nav navbar-nav pull-right" ng-show="loggedIn()">
                        <li class="nav-item">

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-user"></i></a>
                            <div class="dropdown-menu dropdown-secondary" aria-labelledby="dropdownMenu1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item waves-effect waves-light" href="#/dashboard"><i class="fa fa-tachometer"></i>  Dashboard</a>
                                <a class="dropdown-item waves-effect waves-light" href="#/settings"><i class="fa fa-sliders"></i>  Configuracion</a>
                                <a class="dropdown-item waves-effect waves-light" href="" ng-click="logout()"><i class="fa fa-sign-out"></i>  Salir</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--/.Navbar blue-->
        <!--    <nav class="">
                <div class="nav-wrapper">
                    <a class="brand-logo" href="#/">Swinn</a>
                    <a href="#" data-activates="mobile-nav" class="button-collapse"></a>
                    <ul class="right hide-on-med-and-down">
                        <li ng-class="{ active: isActive('/index')}"><a href="#/index">Inicio</a></li>
                        <li ng-class="{ active: isActive('/aboutus')}"><a href="#/aboutus">Nosotros</a></li>
                        <li ng-class="{ active: isActive('/services')}"><a href="#/services">Servicios</a></li>
                        <li ng-class="{ active: isActive('/contact')}"><a href="#/contact">Contacto</a></li>
                        <li ng-class="{ active: isActive('/login')}"><a href="#/login">Iniciar Sesion</a></li>
                    </ul>
                                            <ul class="side-nav" id="mobile-nav" ng-controller="SiteCtrl">
                                                <li ng-class="{active: isActive('/')}"><a href="#/">Inicio</a></li>
                                                <li ng-class="{active: isActive('/user')}"><a href="#/user">Usuarios</a></li>
                                                <li ng-class="{active: isActive('/customers')}"><a href="#/customers">clientes</a></li>
                                                <li ng-class="{active: isActive('/services')}"><a href="#/services">Servicios</a></li>
                                                <li ng-class="{active: isActive('/contact')}"><a href="#/contact">Contacto</a></li>
                            
                                            </ul>
                </div>
            </nav>-->
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
