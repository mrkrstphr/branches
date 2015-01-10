(function() {

  'use strict';

  PersonFactory.$inject = ['$resource'];

  function PersonFactory($resource) {
    var Person = $resource('/api/people/:id', {}, {
      query: {method: 'GET', params: {id:''}, isArray: true, transformResponse: function (data) {
        data = angular.fromJson(data);
        if (data.people) {
          return data.people;
        }

        return [];
      }},
      get: {method: 'GET', params: {id: ''}, isArray: false, transformResponse: function (data) {
        data = angular.fromJson(data);
        if (data.people) {
          return data.people;
        }

        return [];
      }}
    });

    Person.prototype.getPreferredName = function (firstLast) {
      if (firstLast) {
        return this.names[0].surname + ', ' + this.names[0].given;
      }

      return this.names[0].given + ' ' + this.names[0].surname;
    };

    Person.prototype.getPreferredEvent = function (type) {
      return _.first(_.filter(this.events, {type: type}));
    };

    return Person;
  }

  angular.module('branches.resources')
    .factory('Person', PersonFactory);

})();
