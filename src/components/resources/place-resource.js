(function() {

  'use strict';

  PlaceFactory.$inject = ['$resource'];

  function PlaceFactory($resource) {
    var Place = $resource('/api/places/:id');

    Place.create = function(data) {
      return new Place({places: data});
    };

    return Place;
  }

  angular.module('branches.resources')
    .factory('Place', PlaceFactory);

})();
