(function() {
  'use strict';

  config.$inject = ['$routeProvider'];

  function config($routeProvider) {
    $routeProvider.when('/people', {
      templateUrl: 'modules/people/people-list.html',
      controller: 'PeopleListController',
      controllerAs: 'controller'
    });

    $routeProvider.when('/people/view/:id', {
      templateUrl: 'modules/people/view-person.html',
      controller: 'ViewPersonController',
      controllerAs: 'controller'
    });
  }

  angular.module('branches.people', ['ngRoute', 'branches.resources'])
    .config(config);
})();
