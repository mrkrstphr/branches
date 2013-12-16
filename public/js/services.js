'use strict';

var branchesServices = angular.module('branchesServices', ['ngResource']);

branchesServices.factory('Place', ['$resource',
    function($resource){
        return $resource('places/:id', {}, {
            query: {method:'GET', params:{id:''}, isArray:true}
        });
    }]);
