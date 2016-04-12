var myApp = angular.module('myApp', []);

myApp.controller('necesitasController', function($scope, $http) {
	$scope.valor ="";

	$scope.alquilerventa = [
    		
    		{codigo: 'A', nombre: 'Solo Alquiler'},
    		{codigo: 'V', nombre: 'Solo Venta'}

    ]; 

});