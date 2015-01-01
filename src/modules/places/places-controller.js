(function() {
  'use strict';

  PlaceListController.$inject = ['$scope', 'Place'];

  function PlaceListController($scope, Place) {
    this.$scope = $scope;
    this.places = Place.get();
  }

  angular.module('branches.places')
    .controller('PlaceListController', PlaceListController);
})();
