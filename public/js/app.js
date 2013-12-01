'use strict';

var branchesApp = angular.module('branchesApp', [
    'ngRoute',
    'branchesControllers',
    'branchesServices'
]);

branchesApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/places', {
                templateUrl: 'partials/places-list.html',
                controller: 'PlaceListController'
            }).
            when('/places/:id', {
                templateUrl: 'partials/place-detail.html',
                controller: 'PlaceDetailController'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]
);
