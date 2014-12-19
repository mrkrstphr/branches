(function() {
  'use strict';

  config.$inject = ['$routeProvider'];

  function config($routeProvider) {
    $routeProvider.when('/', {
      templateUrl: 'modules/home-page/home-page.html',
      controller: 'HomeController',
      controllerAs: 'controller'
    });

    $routeProvider.otherwise({
      redirectTo: '/'
    });
  }

  angular.module('branches.home_page', ['ngRoute'])
    .config(config);
})();
