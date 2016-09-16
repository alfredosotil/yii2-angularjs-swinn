'use strict';

/* Directives */


angular.module('directives', [])
//        .directive('appVersion', ['version', function (version) {
//                return function (scope, elm, attrs) {
//                    elm.text(version);
//                };
//            }])
        .directive('ajaxGet', function () {
            return {
                restrict: 'E',
                controller: function ($scope, $http, $attrs) {
                    $http.get($attrs.path).success(function (data) {
                        $scope[$attrs.value] = data;
                    });
                }
            };
        })
        .directive('showErrors', function () {
            return {
                restrict: 'E',
                scope: {
                    error: "="
                },
                link: function (scope, element, attrs) {
                    scope.$watch(attrs.value, function (value) {
                        console.log(value);
                        angular.forEach(value, function (error) {
                            scope.error[error.field] = error.message;
//                            scope.$apply();
                            console.log(error.message);
                        });
                    }, true);
                }
            };
        });
