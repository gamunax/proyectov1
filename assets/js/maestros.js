var myApp = angular.module('myApp', []);




myApp.controller('ubigeoController', function($scope, $http){
    $scope.seguro = "sdsd";
     $scope.clear = function(){
        //$scope.items.length = 0;
        $scope.operadores = {};
        $scope.buscar = '';
    };
});





