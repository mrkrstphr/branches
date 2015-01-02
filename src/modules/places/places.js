(function() {
  'use strict';

  config.$inject = ['$routeProvider'];

  function config($routeProvider) {
    $routeProvider.when('/places', {
      templateUrl: 'modules/places/place-list.html',
      controller: 'PlaceListController',
      controllerAs: 'controller'
    });

    $routeProvider.when('/places/view/:id', {
      templateUrl: 'modules/places/view-place.html',
      controller: 'ViewPlaceController',
      controllerAs: 'controller'
    });

    $routeProvider.when('/places/create', {
      templateUrl: 'modules/places/create-place.html',
      controller: 'CreatePlaceController',
      controllerAs: 'controller'
    });
  }

  angular.module('branches.places', ['ngRoute', 'branches.resources'])
    .config(config);
})();
