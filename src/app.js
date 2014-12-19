(function() {
  'use strict';

  angular.module('branches', [
    'ui.bootstrap',
    'branches.home_page'
  ])

  .config(['$locationProvider', function($locationProvider) {
    $locationProvider.html5Mode(true);
  }]);
})();
