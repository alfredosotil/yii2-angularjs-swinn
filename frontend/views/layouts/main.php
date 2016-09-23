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
    <body  ng-controller="SiteCtrl" class="fixed-sn mdb-skin">
        <?php $this->beginBody() ?>
        <!--Double navigation-->
        <header>
            <!-- Sidebar navigation -->
            <ul id="slide-out" class="side-nav fixed custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light">
                        <a href="#"><img src="http://mdbootstrap.com/wp-content/uploads/2015/12/mdb-white2.png" class="img-fluid flex-center"></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!--Social-->
                <li>
                    <ul class="social">
                        <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                        <li><a class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
                        <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
                        <li><a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
                    </ul>
                </li>
                <!--/Social-->

                <!--Search Form-->
                <li>
                    <form class="search-form" role="search">
                        <div class="form-group waves-light">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                </li>
                <!--/.Search Form-->

                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible">
                        <li>
                            <a class="waves-effect" href="#/dashboard"><i class="fa fa-tachometer"></i> Dashboard</a>
                        </li>
                        <li ng-repeat="tp in menu">
                            <a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> {{tp.typeModule.type}}<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li ng-repeat="m in tp.modules">
                                        <a href="#/{{m.controller}}" class="waves-effect"><i class="fa {{m.iconfa}}"></i> {{m.label}}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--                        <li>
                                                    <a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Instruction<i class="fa fa-angle-down rotate-icon"></i></a>
                                                    <div class="collapsible-body">
                                                        <ul>
                                                            <li><a href="#" class="waves-effect">For bloggers</a>
                                                            </li>
                                                            <li><a href="#" class="waves-effect">For authors</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> About<i class="fa fa-angle-down rotate-icon"></i></a>
                                                    <div class="collapsible-body">
                                                        <ul>
                                                            <li><a href="#" class="waves-effect">Introduction</a>
                                                            </li>
                                                            <li><a href="#" class="waves-effect">Monthly meetings</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-o"></i> Contact me<i class="fa fa-angle-down rotate-icon"></i></a>
                                                    <div class="collapsible-body">
                                                        <ul>
                                                            <li><a href="#" class="waves-effect">FAQ</a>
                                                            </li>
                                                            <li><a href="#" class="waves-effect">Write a message</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>-->
                    </ul>
                </li>
                <!--/. Side navigation links -->

            </ul>
            <!--/. Sidebar navigation -->

            <!--Navbar-->
            <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">

                <!-- SideNav slide-out button -->
                <div class="pull-left" ng-show="loggedIn()">
                    <button data-activates="slide-out" class="navbar-toggler button-collapse"><i class="fa fa-bars"></i></button>
                </div>

                <!--Collapse button-->
                <div class="pull-right">
                    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2"><i class="fa fa-bars"></i></button>
                </div>
                <div class="container">
                    <!--Collapse content-->
                    <div class="collapse navbar-toggleable-xs" id="collapseEx2">
                        <!-- Breadcrumb-->
                        <a class="" href="#/">
                            <div class="navbar-brand">
                                <h2>SwInn</h2>
                            </div>
                        </a>
                        <ul class="nav navbar-nav pull-right">
                            <li class="nav-item text-center">
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
                                <a class="nav-link" href="#/login"><i class="fa fa-sign-in" aria-hidden="false"></i><span class="hidden-sm-down"> Iniciar Sesion</span></a>
                            </li>   
                            <li class="nav-item pull-right" ng-show="loggedIn()">
                                <a class="nav-link" href="" ng-click="logout()"><i class="fa fa-sign-out" aria-hidden="false"></i><span class="hidden-sm-down"> Salir</span></a>
                            </li>   
                        </ul>
                    </div>
                </div>
            </nav>
            <!--/.Navbar-->
        </header>
        <!--/Double navigation-->
        <!--Main layout-->
        <main>
            <div class="container-fluid" ng-view>
            </div>
        </main>
        <!--/Main layout-->
        <!--Footer-->
        <footer class="page-footer center-on-small-only">

            <!--Footer Links-->
            <div class="container-fluid">
                <div class="row">

                    <!--First column-->
                    <div class="col-md-3 col-md-offset-1">
                        <h5 class="title">Footer Content</h5>
                        <p>Here you can use rows and columns here to organize your footer content.</p>
                    </div>
                    <!--/.First column-->

                    <hr class="hidden-md-up">

                    <!--Second column-->
                    <div class="col-md-2 col-md-offset-1">
                        <h5 class="title">Links</h5>
                        <ul>
                            <li><a href="#!">Link 1</a></li>
                            <li><a href="#!">Link 2</a></li>
                            <li><a href="#!">Link 3</a></li>
                            <li><a href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <!--/.Second column-->

                    <hr class="hidden-md-up">

                    <!--Third column-->
                    <div class="col-md-2">
                        <h5 class="title">Links</h5>
                        <ul>
                            <li><a href="#!">Link 1</a></li>
                            <li><a href="#!">Link 2</a></li>
                            <li><a href="#!">Link 3</a></li>
                            <li><a href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <!--/.Third column-->

                    <hr class="hidden-md-up">

                    <!--Fourth column-->
                    <div class="col-md-2">
                        <h5 class="title">Links</h5>
                        <ul>
                            <li><a href="#!">Link 1</a></li>
                            <li><a href="#!">Link 2</a></li>
                            <li><a href="#!">Link 3</a></li>
                            <li><a href="#!">Link 4</a></li>
                        </ul>
                    </div>
                    <!--/.Fourth column-->

                </div>
            </div>
            <!--/.Footer Links-->

            <hr>

            <!--Call to action-->
            <div class="call-to-action">
                <ul>
                    <li>
                        <h5>Register for free</h5></li>
                    <li><a href="" class="btn btn-danger">Sign up!</a></li>
                </ul>
            </div>
            <!--/.Call to action-->

            <hr>

            <!--Social buttons-->
            <div class="social-section">
                <ul>
                    <li><a class="btn-floating btn-small btn-fb"><i class="fa fa-facebook"> </i></a></li>
                    <li><a class="btn-floating btn-small btn-tw"><i class="fa fa-twitter"> </i></a></li>
                    <li><a class="btn-floating btn-small btn-gplus"><i class="fa fa-google-plus"> </i></a></li>
                    <li><a class="btn-floating btn-small btn-li"><i class="fa fa-linkedin"> </i></a></li>
                    <li><a class="btn-floating btn-small btn-git"><i class="fa fa-github"> </i></a></li>
                    <li><a class="btn-floating btn-small btn-pin"><i class="fa fa-pinterest"> </i></a></li>
                    <li><a class="btn-floating btn-small btn-ins"><i class="fa fa-instagram"> </i></a></li>
                </ul>
            </div>
            <!--/.Social buttons-->

            <!--Copyright-->
            <div class="footer-copyright">
                <div class="container-fluid">
                    <p class="pull-left">&copy; Rubik Cube Ideas - better solutions <?= date('Y') ?></p><a href=""> www.rubikcubeideas.com </a>
                    <p class="pull-right"><?= Yii::powered() ?></p>
                </div>
            </div>
            <!--/.Copyright-->

        </footer>
        <!--/.Footer-->
        <!--        <footer class="footer">
                    <div class="container">
                        <p class="pull-left">&copy; Rubik Cube Ideas - better solutions <?= date('Y') ?></p>
        
                        <p class="pull-right"><?= Yii::powered() ?></p>
                    </div>
                </footer>-->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
