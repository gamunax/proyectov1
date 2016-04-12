var myApp = angular.module('myApp', []);

myApp.controller('reimpresionController', function($scope, $http) {
	//$scope.valor ="a";

	 $scope.emisiones = [
        {codigo: '16', nombre: '16'}


    ];

	$scope.remitoseguimiento = function(emision,remito) {
          
          	 $http({
            method: 'POST',
            url: '/liquidacion/dashboard/buscar_remito_seg/'+emision+'/'+remito,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                console.log(data.length);
	                if(data.length == 0 ){
	                    alert("No existe remito ingresado "+ remito);
	                    $scope.remito = "";

	                }
	            $scope.envios = data;
               
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
            });  


             $http({
            method: 'POST',
            url: '/front/front/mostrar_tracking/'+emision+'/'+remito,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                console.log(data.length);
                    
                $scope.tracking = data;
               
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
            });  

               
                
          
          
			
    }

});



myApp.directive('datepicker', function () {
  return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, elem, attrs, ngModelCtrl) {
          var updateModel = function (dateText) {
              scope.$apply(function () {
                  ngModelCtrl.$setViewValue(dateText);
              });
          };
          var options = {
              dateFormat: 'dd/mm/yy',
              onSelect: function (dateText) {
                  updateModel(dateText);
              }
          };
          elem.datepicker(options);
          
      }
  };




});