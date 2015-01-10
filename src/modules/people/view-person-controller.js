(function() {
  'use strict';

  ViewPersonController.$inject = ['$routeParams', 'Person'];

  function ViewPersonController($routeParams, Person) {
    this.person = Person.get({id: $routeParams.id});
  }

  angular.module('branches.people')
    .controller('ViewPersonController', ViewPersonController);
})();
