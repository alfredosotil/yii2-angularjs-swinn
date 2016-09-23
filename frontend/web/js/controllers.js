/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
'use strict';

angular.module('controllers', [])
        .controller('SiteCtrl', ["moduleService", "$scope", "$http", "$window", "$location", "$mdSidenav", "$log", "$timeout", function (moduleService, s, h, w, l, m, log, t) {
                if (l.path() === '/login') {
                    if (w.sessionStorage.getItem("access_token") !== null) {
                        l.path('/dashboard').replace();
                    }
                }

                if (l.path() === '/dashboard') {
                    h.get('api/dashboard').success(function (data) {
                        s.dashboard = data;
                        s.$parent.menu = data.menu;
                        setTimeout(function () {
                            $(".collapsible").collapsible();
                            log.debug("collapsible");
                        }, 2000);
                    });
                }
                s.pageClass = 'page-home';
                s.captchaUrl = 'site/captcha';

                s.login = function () {
                    s.submitted = true;
                    s.error = {};
                    h.post('api/login', s.loginModel).success(
                            function (data) {
                                w.sessionStorage.access_token = data.access_token;
                                l.path('/dashboard').replace();
                            }).error(
                            function (data) {
                                angular.forEach(data, function (error) {
                                    s.error[error.field] = error.message;
                                });
                            }
                    );
                };

                s.logout = function () {
                    delete w.sessionStorage.access_token;
                    s.$parent.menu = [];
                    h.get('api/logout').success(function (data) {
                        s.info = data;
                        log.debug(s.info.message);
                    });

                    l.path('/index').replace();
                };

                s.loggedIn = function () {
                    return Boolean(w.sessionStorage.access_token);
                };

                s.contact = function () {
                    s.submitted = true;
                    s.error = {};
                    h.post('api/contact', s.contactModel).success(
                            function (data) {
                                s.contactModel = {};
                                s.flash = data.flash;
                                w.scrollTo(0, 0);
                                s.submitted = false;
                                s.captchaUrl = 'site/captcha' + '?' + new Date().getTime();
                            }).error(
                            function (data) {
                                angular.forEach(data, function (error) {
                                    s.error[error.field] = error.message;
                                });
                            }
                    );
                };

                s.refreshCaptcha = function () {
                    h.get('site/captcha?refresh=1').success(function (data) {
                        s.captchaUrl = data.url;
                    });
                };

//                http://www.tothenew.com/blog/angulars-resource-for-crud-operations/
//                s.menuModules = moduleService.query();

            }])
//        .controller('DashboardController', ['$scope', '$http',
//            function (s, h) {
//                h.get('api/dashboard').success(function (data) {
//                    s.dashboard = data;
////                    s.dashboardMenu = s.dashboard.menu;
//                });
//            }
//        ])

        .controller('UserCtrl', ["$scope", "$location", function (s, l) {
                s.pageClass = 'page-home';
            }])
        .controller('ModuleCtrl', ["$scope", "$location", function (s, l) {
                s.pageClass = 'page-home';
            }])
        .controller('ProfileCtrl', ["$scope", "$location", function (s, l) {
                s.pageClass = 'page-home';
            }])
        .controller('TypeCtrl', ["$scope", "$location", function (s, l) {
                s.pageClass = 'page-home';
            }])
        .controller('StateCtrl', ["$scope", "$location", function (s, l) {
                s.pageClass = 'page-home';
            }])
        .controller('AccessCtrl', ["$scope", "$location", function (s, l) {
                s.pageClass = 'page-home';
            }]);

