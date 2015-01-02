(function() {
  'use strict';

  ViewPlaceController.$inject = ['$scope', '$routeParams', 'Place'];

  function ViewPlaceController($scope, $routeParams, Place) {
    this.$scope = $scope;
    this.place = Place.get({id: $routeParams.id});
  }

  angular.module('branches.places')
    .controller('ViewPlaceController', ViewPlaceController);
})();
