/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
'use strict';

angular.module('controllers', [])
        .controller('SiteCtrl', ["moduleService", "$scope", "$http", "$window", "$location", "$mdSidenav", "$log", "$timeout", function (moduleService, s, h, w, l, m, log, t) {
//                s.pageClass = 'page-home';
//                s.toggleSidenav = function () {
//                    return m('left').toggle();
//                };  
                s.loggedIn = function () {
                    return Boolean(w.sessionStorage.access_token);
                };
                s.logout = function () {
                    delete w.sessionStorage.access_token;
                    h.get('api/logout').success(function (data) {
                        s.info = data;
                        log.debug(s.info.message);
                    });

                    l.path('/login').replace();
                };
//                s.login = function () {
//                    s.submitted = true;
//                    s.error = {};
////                    console.log(s.loginModel);
//                    h.post('api/login', s.loginModel).success(
//                            function (data) {
//                                w.sessionStorage.access_token = data.access_token;
//                                l.path('/dashboard').replace();
//                            }).error(
//                            function (data) {
//                                angular.forEach(data, function (error) {
//                                    s.error[error.field] = error.message;
//                                });
//                            }
//                    );
//                };
//                http://www.tothenew.com/blog/angulars-resource-for-crud-operations/
                s.menuModules = moduleService.query();
//
//                s.select = function (item) {
//                    s.selected = item;
//                };
//                s.isActive = function (item) {
//                    return s.selected === item;
//                };
//                s.toggleLeft = buildDelayedToggler('left');
                s.toggleMenu = buildToggler('menuOperation');
                s.isOpenMenu = function () {
                    return m('menuOperation').isOpen();
                };
                s.close = function () {
                    // Component lookup should always be available since we are not using `ng-if`
                    m('menuOperation').close()
                            .then(function () {
                                log.debug("close menu is done");
                            });
                };
                function debounce(func, wait, context) {
                    var timer;

                    return function debounced() {
                        var context = s,
                                args = Array.prototype.slice.call(arguments);
                        t.cancel(timer);
                        timer = t(function () {
                            timer = undefined;
                            func.apply(context, args);
                        }, wait || 10);
                    };
                }
                function buildDelayedToggler(navID) {
                    return debounce(function () {
                        // Component lookup should always be available since we are not using `ng-if`
                        m(navID)
                                .toggle()
                                .then(function () {
                                    log.debug("toggle " + navID + " is done");
                                });
                    }, 200);
                }
                function buildToggler(navID) {
                    return function () {
                        // Component lookup should always be available since we are not using `ng-if`
                        m(navID)
                                .toggle()
                                .then(function () {
                                    log.debug("toggle " + navID + " is done");
                                });
                    };
                }

            }])
        .controller('DashboardController', ['$scope', '$http',
            function (s, h) {
                h.get('api/dashboard').success(function (data) {
                    s.dashboard = data;
                });
            }
        ])
        .controller('LoginController', ['$scope', '$http', '$window', '$location',
            function (s, h, w, l) {
                if (w.sessionStorage.getItem("access_token") !== null) {
                    l.path('/dashboard').replace();
                }
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
            }
        ])
        .controller('ContactController', ['$scope', '$http', '$window',
            function (s, h, w) {
                s.captchaUrl = 'site/captcha';
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
            }])
        .controller('UserCtrl', ["$scope", "$location", function (s, l) {
                s.pageClass = 'page-home';
                s.$watch('put.errorText', function (value) {
                    console.log(value);
                    angular.forEach(value, function (error) {
                        s.error[error.field] = error.message;
//                            scope.$apply();
                        console.log(error.message);
                    });
                }, true);
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

