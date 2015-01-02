(function() {

  'use strict';

  PlaceFactory.$inject = ['$resource'];

  function PlaceFactory($resource) {
    return $resource('/api/places/:id', {}, {
      query: {method:'GET', params:{id:'places'}, isArray:true}
    });
  }

  angular.module('branches.resources')
    .factory('Place', PlaceFactory);

})();
