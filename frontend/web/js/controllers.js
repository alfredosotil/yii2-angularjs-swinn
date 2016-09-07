/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
'use strict';

angular.module('controllers', [])
        .controller('SiteCtrl', ["moduleService", "$scope", "$location", "$mdSidenav", "$log", "$timeout", function (moduleService, s, l, m, log, t) {
//                s.pageClass = 'page-home';
//                s.toggleSidenav = function () {
//                    return m('left').toggle();
//                };                
//                http://www.tothenew.com/blog/angulars-resource-for-crud-operations/
                s.menuModules = moduleService.query();
//
                s.select = function (item) {
                    s.selected = item;
                };
                s.isActive = function (item) {
                    return s.selected === item;
                };
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

