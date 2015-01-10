(function() {
  'use strict';

  angular.module('branches', [
    'ui.bootstrap',
    'branches.resources',
    'branches.home_page',
    'branches.places',
    'branches.people'
  ])

  .config(['$locationProvider', function($locationProvider) {
    $locationProvider.html5Mode(true);
  }]);
})();
