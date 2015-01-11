(function() {
  'use strict';

  CreatePersonController.$inject = ['Person'];

  function CreatePersonController(Person) {
    this.Person = Person;
    this.person = new Person();
    this.person.names = [{given: '', surname: ''}];
    this.name = this.person.names[0];
  }

  CreatePersonController.prototype.savePerson = function () {
    console.log(this.person);
    console.log(this);
  };

  angular.module('branches.people')
    .controller('CreatePersonController', CreatePersonController);
})();
