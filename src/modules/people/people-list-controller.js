(function() {
  'use strict';

  PeopleListController.$inject = ['Person'];

  function PeopleListController(Person) {
    this.people = Person.query();
  }

  angular.module('branches.people')
    .controller('PeopleListController', PeopleListController);
})();
