'use strict';

/* Directives */


angular.module('directives', [])
//        .directive('appVersion', ['version', function (version) {
//                return function (scope, elm, attrs) {
//                    elm.text(version);
//                };
//            }])
        .directive('getDataModal', function () {
            return {
                restrict: 'A',
                controller: function ($scope, $http, $attrs) {
                    $http.get($attrs.urlDataModal).success(function (data) {
                        $scope.data = data;
                    });
                }
            };
        })
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
                    value: "="
                },
                link: function (scope, element, attrs) {
                    scope.$watch("value", function (value) {
                        if (value !== null) {
                            console.log(value);
                            angular.forEach(value, function (error) {
                                toastr.error(error.message, error.field, {timeOut: 10000, onclick: null})
//                            scope.error[error.field] = error.message;
//                            scope.$apply();
//                            console.log(error.message);
                            });
                        }
                    }, true);
                }
            };
        })
        .directive('onFinishRender', function ($timeout) {
            return {
                restrict: 'A',
                link: function (scope, element, attr) {
                    if (scope.$last === true) {
                        $timeout(function () {
                            scope.$emit(attr.onFinishRender);
                        });
                    }
                }
            }
        });
