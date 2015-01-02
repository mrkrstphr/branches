(function() {
  'use strict';

  CreatePlaceController.$inject = ['$scope', '$location', 'Place'];

  function CreatePlaceController($scope, $location, Place) {
    this.$scope = $scope;
    this.$location = $location;
    this.place = new Place();
  }

  CreatePlaceController.prototype.save = function () {
    var self = this;
    this.place.$save().then(function (data) {
      self.$location.path('/places/view/' + data._id);
    });
  };

  angular.module('branches.places')
    .controller('CreatePlaceController', CreatePlaceController);
})();
