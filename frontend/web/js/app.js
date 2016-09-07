'use strict';

// Declare app level module which depends on views, and components
//extendIndex.$inject = ['mgIndex'];
//function extendIndex(mgIndex) {
//    return angular.extend(mgIndex, {
//        init: 'index.filter={page:0,recordsPerPage:1}'
//    });
//}

angular.module('myapp', [
    'ngRoute',
    'ngAnimate',
    'mgCrud',
    'ngMaterial',
    'controllers',
    'services'
//    'myapp.filters',
//    'myapp.directives',
])
        .config(function (mgHttpProvider) {
            mgHttpProvider.setDefaultConfig({url: 'http://localhost/yii2-angularjs-swinn/backend/web'});
        })
        .config(function ($mdThemingProvider) {
            $mdThemingProvider.theme('default');
//                    .primaryPalette('pink', {
//                        'default': '400', // by default use shade 400 from the pink palette for primary intentions
//                        'hue-1': '100', // use shade 100 for the <code>md-hue-1</code> class
//                        'hue-2': '600', // use shade 600 for the <code>md-hue-2</code> class
//                        'hue-3': 'A100' // use shade A100 for the <code>md-hue-3</code> class
//                    })
//                    // If you specify less than all of the keys, it will inherit from the
//                    // default shades
//                    .accentPalette('purple', {
//                        'default': '200' // use shade 200 for default, and keep all other shades the same
//                    })
//                    .dark();
        })
        .config(['$routeProvider', function ($routeProvider) {
                $routeProvider
//                        site
                        .when('/', {templateUrl: 'views/site/index.html', controller: 'SiteCtrl'})
                        .when('/index', {templateUrl: 'views/site/index.html', controller: 'SiteCtrl'})
                        .when('/aboutus', {templateUrl: 'views/site/aboutus.html', controller: 'SiteCtrl'})
                        .when('/services', {templateUrl: 'views/site/services.html', controller: 'SiteCtrl'})
                        .when('/contact', {templateUrl: 'views/site/contact.html', controller: 'SiteCtrl'})
//                        users
                        .when('/user', {templateUrl: 'views/user/list.html', controller: 'UserCtrl'})
                        .when('/user/edit/:id', {templateUrl: 'views/user/edit.html', controller: 'UserCtrl'})
                        .when('/user/create', {templateUrl: 'views/user/create.html', controller: 'UserCtrl'})
                        .when('/user/delete/:id', {templateUrl: 'views/user/delete.html', controller: 'UserCtrl'})
//                        modules
                        .when('/module', {templateUrl: 'views/module/list.html', controller: 'ModuleCtrl'})
                        .when('/module/edit/:id', {templateUrl: 'views/module/edit.html', controller: 'ModuleCtrl'})
                        .when('/module/create', {templateUrl: 'views/module/create.html', controller: 'ModuleCtrl'})
                        .when('/module/delete/:id', {templateUrl: 'views/module/delete.html', controller: 'ModuleCtrl'})
//                        profiles
                        .when('/profile', {templateUrl: 'views/profile/list.html', controller: 'ProfileCtrl'})
                        .when('/profile/edit/:id', {templateUrl: 'views/profile/edit.html', controller: 'ProfileCtrl'})
                        .when('/profile/create', {templateUrl: 'views/profile/create.html', controller: 'ProfileCtrl'})
                        .when('/profile/delete/:id', {templateUrl: 'views/profile/delete.html', controller: 'ProfileCtrl'})
//                        types
                        .when('/type', {templateUrl: 'views/type/list.html', controller: 'TypeCtrl'})
                        .when('/type/edit/:id', {templateUrl: 'views/type/edit.html', controller: 'TypeCtrl'})
                        .when('/type/create', {templateUrl: 'views/type/create.html', controller: 'TypeCtrl'})
                        .when('/type/delete/:id', {templateUrl: 'views/type/delete.html', controller: 'TypeCtrl'})
//                        states
                        .when('/state', {templateUrl: 'views/state/list.html', controller: 'StateCtrl'})
                        .when('/state/edit/:id', {templateUrl: 'views/state/edit.html', controller: 'StateCtrl'})
                        .when('/state/create', {templateUrl: 'views/state/create.html', controller: 'StateCtrl'})
                        .when('/state/delete/:id', {templateUrl: 'views/state/delete.html', controller: 'StateCtrl'})
//                        acesses
                        .when('/access', {templateUrl: 'views/access/list.html', controller: 'AccessCtrl'})
                        .when('/access/edit/:id', {templateUrl: 'views/access/edit.html', controller: 'AccessCtrl'})
                        .when('/access/create', {templateUrl: 'views/access/create.html', controller: 'AccessCtrl'})
                        .when('/access/delete/:id', {templateUrl: 'views/access/delete.html', controller: 'AccessCtrl'})
//                        
                        .otherwise({redirectTo: 'views/site/index.html'});
            }]);



