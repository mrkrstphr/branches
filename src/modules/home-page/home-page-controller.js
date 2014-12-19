(function() {
  HomeController.$inject = ['$scope'];

  function HomeController($scope) {
    this.$scope = $scope;
  }

  angular.module('branches.home_page')
    .controller('HomeController', HomeController);
})();
