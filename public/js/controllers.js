'use strict';

var branchesControllers = angular.module('branchesControllers', []);

branchesControllers.controller('PlaceListController', ['$scope', 'Place',
    function($scope, Place) {
        $scope.places = Place.query();
    }]
);

branchesControllers.controller('PlaceDetailController', ['$scope', '$routeParams', 'Place',
    function($scope, $routeParams, Place) {
        $scope.place = Place.get({id: $routeParams.id});
    }]
);
