var myApp = angular.module('myApp', []);

myApp.controller('seguimientoController', function($scope, $http) {
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

myApp.controller('reportexremitoController', function($scope, $filter, $http) {
    //$scope.valor ="a";

     $scope.emisiones = [
        {codigo: '16', nombre: '16'}


    ];

     $scope.fechain = $filter("date")(Date.now(), 'dd/MM/yyyy');
     $scope.fechater = $filter("date")(Date.now(), 'dd/MM/yyyy');
     console.log($scope.fechain);
    $scope.reportexremito = function(fecha1, fecha2, estado, documento) {

        if(typeof(documento)=="undefined"){
                documento = "%";
            }


         var dia = fecha1.substr(0,2);
         var mes = fecha1.substr(3,2);
         var ano = fecha1.substr(6,4);
         console.log(dia);
         console.log(mes);
         console.log(ano);
         var dfechaini = ano+'-'+mes+'-'+dia;

         var dia = fecha2.substr(0,2);
         var mes = fecha2.substr(3,2);
         var ano = fecha2.substr(6,4);
         console.log(dia);
         console.log(mes);
         console.log(ano);
         var dfechafin = ano+'-'+mes+'-'+dia;
          
             $http({
            method: 'GET',
            url: '/reporte/dashboard/buscar_reportexremito',
            params:{fechaini: dfechaini,  fechafin: dfechafin , estado : estado, documento: documento}
            
            }).
            success(function(data, status){
                console.log(data.length);
                    if(data.length == 0 ){
                        alert("No existen remitos en los rangos ingresados");
                        $scope.remitos = "";

                    }
                $scope.remitos = data;
               
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
            });        
          
    }

    $scope.estados    =   function(){
       
        $http({
            method: 'POST',
            url: '/reporte/dashboard/buscar_estado'
           
        }).
        success(function(data, status){
                
                $scope.estados = data;
            
        }).
        error(function(data,status){
            $scope.data = data || "Falló al mostrar la data";
            $scope.status = status;
        });  

       
    }

     $scope.sel = function(id, razon_social, tipocliente, rucdni, codigo){
        $scope.idcliente = id;
        $scope.nombre = razon_social;
        $scope.rucdni = rucdni;
        $scope.codigo = codigo;
        $scope.cod_tipocliente = tipocliente
        if(tipocliente == 'J'){
           $scope.tipocliente = 'Juridico'; 
        }else{
            $scope.tipocliente = 'Natural';
        }
        
    }

    $scope.buscarcliente    =   function(documento, keyEvent){
        if (keyEvent.which === 13){

            $http({
                method: 'POST',
                url: '/envio/dashboard/buscar_cliente/'+ documento,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                if(documento != 'x'){
                    console.log(data.length);
                    if(data.length == 0 ){
                        $scope.nombre = ""; 
                        $scope.rucdni ="";
                        $scope.codigo = "";
                        $scope.tipocliente = "";
                    }else{
                        $scope.idcliente = data[0].ID;
                        $scope.nombre = data[0].RAZON_SOCIAL;
                        $scope.rucdni = data[0].DOCUMENTO;
                        $scope.codigo = data[0].NROCLIENTE;
                        $scope.tipocliente = data[0].TIPO_CLIENTE;
                    }
                }else{
                    $scope.clientes = data;
                }
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
            });  
        }else{
             $http({
                method: 'POST',
                url: '/envio/dashboard/buscar_cliente/'+ documento,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                if(documento != 'x'){
                    console.log(data.length);
                    if(data.length == 0 ){
                        $scope.nombre = "";
                    }else{
                        $scope.nombre = data[0].RAZON_SOCIAL;
                    }
                }else{
                    $scope.clientes = data;
                }
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
            });  

        }
    };




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