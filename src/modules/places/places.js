(function() {
  'use strict';

  config.$inject = ['$routeProvider'];

  function config($routeProvider) {
    $routeProvider.when('/places', {
      templateUrl: 'modules/places/places.html',
      controller: 'PlaceListController',
      controllerAs: 'controller'
    });
  }

  angular.module('branches.places', ['ngRoute', 'branches.resources'])
    .config(config);
})();
