'use strict';

describe('HomeController', function() {
  beforeEach(module('branches.home_page'));

  var controller;

  beforeEach(inject(function($rootScope, $controller) {
    controller = $controller('HomeController', {$scope:$rootScope.$new()});
  }));

  it('should show some dashboard-y stuff');
});
