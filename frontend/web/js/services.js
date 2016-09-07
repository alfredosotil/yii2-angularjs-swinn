/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

'use strict';

angular.module('services', ['ngResource'])
        .factory('accessService', ["$resource", function (r) {
                return r('http://localhost/yii2-angularjs-swinn/backend/web/access', {}, {
                    query: {method: "GET", isArray: true},
                    create: {method: "POST"},
                    get: {method: "GET"},
                    remove: {method: "DELETE"},
                    update: {method: "PUT"}
                });

            }])
        .factory('moduleService', ["$resource", function (r) {
                return r('http://localhost/yii2-angularjs-swinn/backend/web/module', {}, {
                    query: {method: "GET", isArray: true},
                    create: {method: "POST"},
                    get: {method: "GET"},
                    remove: {method: "DELETE"},
                    update: {method: "PUT"}
                });

            }])
        .factory('profileService', ["$resource", function (r) {
                return r('http://localhost/yii2-angularjs-swinn/backend/web/profile', {}, {
                    query: {method: "GET", isArray: true},
                    create: {method: "POST"},
                    get: {method: "GET"},
                    remove: {method: "DELETE"},
                    update: {method: "PUT"}
                });

            }])
        .factory('stateService', ["$resource", function (r) {
                return r('http://localhost/yii2-angularjs-swinn/backend/web/state', {}, {
                    query: {method: "GET", isArray: true},
                    create: {method: "POST"},
                    get: {method: "GET"},
                    remove: {method: "DELETE"},
                    update: {method: "PUT"}
                });

            }])
        .factory('typeService', ["$resource", function (r) {
                return r('http://localhost/yii2-angularjs-swinn/backend/web/type', {}, {
                    query: {method: "GET", isArray: true},
                    create: {method: "POST"},
                    get: {method: "GET"},
                    remove: {method: "DELETE"},
                    update: {method: "PUT"}
                });

            }])
        .factory('userService', ["$resource", function (r) {
                return r('http://localhost/yii2-angularjs-swinn/backend/web/user', {}, {
                    query: {method: "GET", isArray: true},
                    create: {method: "POST"},
                    get: {method: "GET"},
                    remove: {method: "DELETE"},
                    update: {method: "PUT"}
                });

            }]);