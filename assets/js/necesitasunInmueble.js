var myApp = angular.module('myApp', []);

myApp.controller('necesitasController', function($scope, $http) {
	$scope.valor ="";
	$scope.busqueda = {};
    $scope.success2  = "";
    $scope.success3  = "";
    $scope.hover = "fondottop";
    $scope.pagedItems = [];
    $scope.cantidad = 0;
    $scope.pageSize = 6;
    $scope.pageSize2 = 4;
    $scope.currentPage = 0;
	$scope.alquilerventa = [
    		{codigo: 'Compra', nombre: 'Compra'}
    ]; 
    $scope.success = "";

    $scope.mipreciodesde = [
            
                    {codigo: '15000', nombre: '15,000'},
                    {codigo: '40000', nombre: '40,000'},
                    {codigo: '70000', nombre: '70,000'},
                    {codigo: '100000', nombre: '100,000'}
                    

                ];

    $scope.mipreciohasta = [
                    
                {codigo: '39999', nombre: '39,999'},
                {codigo: '69999', nombre: '69,999'},
                {codigo: '99999', nombre: '99,999'},
                {codigo: '99999999999', nombre: 'a más'}

                ];

     $http({
        method: 'POST',
        url: 'http://carterainmobiliaria.com.pe/mahpsanew/front/caracteristicas',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).
    success(function(data, status){
        $scope.caracteristicas = data;
        $scope.nombre = "";
        $scope.email = "";
        $scope.asunto = "";
        $scope.telefono="";
        $scope.comentario = "";
        $scope.success = "Se envió el correo correctamente";
    }).
    error(function(data, status){
        $scope.data = data || "Falló el envio";
        $scope.status = status;
    });


     $scope.tipomoneda = [
        {codigo: '1', nombre: 'Soles'},
        {codigo: '2', nombre: 'Dolares'}
        
    ];

    $scope.changepreciodesde = function(newpreciodesde) {
            
        $scope.preciodesde = newpreciodesde;  
        
    };

     $scope.changepreciohasta = function(newpreciohasta) {
            
            
            $scope.preciohasta = newpreciohasta;    
            
        };

    $scope.banos = [
            
            {codigo: '1', nombre: '1'},
            {codigo: '2', nombre: '2'},
            {codigo: '3', nombre: '3'},
            {codigo: '4', nombre: '4'},
            {codigo: '5', nombre: '5'}
        ];

        $scope.dormitorios = [
            {codigo: '1', nombre: '1'},
            {codigo: '2', nombre: '2'},
            {codigo: '3', nombre: '3'},
            {codigo: '4', nombre: '4'},
            {codigo: '5', nombre: '5'}
        ];

        $scope.areasjp = [
            {codigo: '1', nombre: '50 m2 - 100 m2'},
            {codigo: '2', nombre: '101 m2 - 150 m2'},
            {codigo: '3', nombre: '151 m2 - 200 m2'},
            {codigo: '4', nombre: '201 m2 - 350 m2'},
            {codigo: '5', nombre: '351 m2 a +'}
        ];

        $scope.cocheras = [
            {codigo: '1', nombre: '1'},
            {codigo: '2', nombre: '2'},
            {codigo: '3', nombre: '3'},
            {codigo: '4', nombre: '4'},
            {codigo: '5', nombre: '5'}
        ];

    $http({
        method: 'POST',
        url: 'http://carterainmobiliaria.com.pe/mahpsanew/front/departamentos',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).
    success(function(data, status){
        $scope.departamentos2 = data;
        $scope.nombre = "";
        $scope.email = "";
        $scope.asunto = "";
        $scope.telefono="";
        $scope.comentario = "";
        $scope.success = "Se envió el correo correctamente";
    }).
    error(function(data, status){
        $scope.data = data || "Falló el envio";
        $scope.status = status;
    });

    $http({
        method: 'POST',
        url: 'http://carterainmobiliaria.com.pe/mahpsanew/front/tipoinmueble',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).
    success(function(data, status){
        $scope.tipoinmuebles  = data;
        $scope.nombre = "";
        $scope.email = "";
        $scope.asunto = "";
        $scope.telefono="";
        $scope.comentario = "";
        $scope.success = "Se envió el correo correctamente";
    }).
    error(function(data, status){
        $scope.data = data || "Falló el envio";
        $scope.status = status;
    });

    $scope.detalle = function(idinmueble){


        $http({
                method: 'POST',
                url: 'http://carterainmobiliaria.com.pe/mahpsanew/front/detalleinmueble/'+idinmueble,
                //data: 'dep=:'+ departamento,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                $scope.detalle = data;
                $scope.nombre = "";
                $scope.email = "";
                $scope.asunto = "";
                $scope.telefono="";
                $scope.comentario = "";
                $scope.success = "Se envió el correo correctamente";
            }).
            error(function(data, status){
                $scope.data = data || "Falló el envio";
                $scope.status = status;
            });
    };

    $scope.proyectos = function(){
         $http({
                method: 'POST',
                url: 'http://carterainmobiliaria.com.pe/mahpsanew/front/resultadoproyectos',
                //data: 'dep=:'+ departamento,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                $scope.resproyectos = data;

                 $scope.pagedItems = [];
                console.log('cantidadddd:' + data.length);
                $scope.cantidad = data.length;
                if($scope.cantidad == 0){
                    $scope.ver = false;
                }

                for (var i = 0; i < $scope.cantidad; i++) {
                    if (i % $scope.pageSize2 === 0) {
                        $scope.pagedItems[Math.floor(i / $scope.pageSize2)] = [ $scope.resproyectos[i] ];
                    } else {
                        $scope.pagedItems[Math.floor(i / $scope.pageSize2)].push($scope.resproyectos[i]);
                    }
                }

                $scope.nombre = "";
                $scope.email = "";
                $scope.asunto = "";
                $scope.telefono="";
                $scope.comentario = "";
                $scope.success = "Se envió el correo correctamente";
            }).
            error(function(data, status){
                $scope.data = data || "Falló el envio";
                $scope.status = status;
            });

    };


    $scope.proyectos2 = function(){
         $http({
                method: 'POST',
                url: 'http://carterainmobiliaria.com.pe/mahpsanew/front/resultadoproyectos2',
                //data: 'dep=:'+ departamento,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                $scope.resproyectos = data;

                $scope.pagedItems = [];
                console.log('cantidadddd:' + data.length);
                $scope.cantidad = data.length;
                if($scope.cantidad == 0){
                    $scope.ver = false;
                }

                for (var i = 0; i < $scope.cantidad; i++) {
                    if (i % $scope.pageSize === 0) {
                        $scope.pagedItems[Math.floor(i / $scope.pageSize)] = [ $scope.resproyectos[i] ];
                    } else {
                        $scope.pagedItems[Math.floor(i / $scope.pageSize)].push($scope.resproyectos[i]);
                    }
                }

                $scope.nombre = "";
                $scope.email = "";
                $scope.asunto = "";
                $scope.telefono="";
                $scope.comentario = "";
                $scope.success = "Se envió el correo correctamente";
            }).
            error(function(data, status){
                $scope.data = data || "Falló el envio";
                $scope.status = status;
            });

    };


    $scope.searchprovincia = function (departamento){
            
            if(typeof(departamento)=="undefined"){
                departamento = "";
                
            }
            $http({
                method: 'POST',
                url: 'http://carterainmobiliaria.com.pe/mahpsanew/front/provincias/'+departamento,
                //data: 'dep=:'+ departamento,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                $scope.provincias = data;
                $scope.nombre = "";
                $scope.email = "";
                $scope.asunto = "";
                $scope.telefono="";
                $scope.comentario = "";
                $scope.success = "Se envió el correo correctamente";
            }).
            error(function(data, status){
                $scope.data = data || "Falló el envio";
                $scope.status = status;
            });
    };

    $scope.searchDepdistrito = function (provincia){
            
            if(typeof(provincia)=="undefined"){
                provincia = "";
                
            }
            $http({
                method: 'POST',
                url: 'http://carterainmobiliaria.com.pe/mahpsanew/front/distritos/'+provincia,
                //data: 'dep=:'+ departamento,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                $scope.distritos = data;
                $scope.nombre = "";
                $scope.email = "";
                $scope.asunto = "";
                $scope.telefono="";
                $scope.comentario = "";
                $scope.success = "Se envió el correo correctamente";
            }).
            error(function(data, status){
                $scope.data = data || "Falló el envio";
                $scope.status = status;
            });
    };

    $scope.buscar = function(alquilerventa, departamento, provincia, distrito, gradoconservacion, area, tipoinmueble, tipomoneda, preciodesde, preciodsta, dormitorio, bano, cochera, descripcion, caracteristica){
            if(typeof(alquilerventa)=="undefined"){
                alquilerventa = "";
                
            }
            if(typeof(departamento)=="undefined"){
                departamento = "A";
                
            }
            if(typeof(provincia)=="undefined"){
                provincia = "A";
                
            }
            if(typeof(distrito)=="undefined"){
                distrito = "A";
                
            }
            if(typeof(gradoconservacion)=="undefined"){
                gradoconservacion = "A";
                
            }
            if(typeof(area)=="undefined"){
                area = "A";
                
            }
            if(typeof(tipoinmueble)=="undefined"){
                tipoinmueble = "A";
                
            }
            if(typeof(tipomoneda)=="undefined"){
                tipomoneda = "A";
                
            }
            if(typeof(preciodesde)=="undefined"){
                preciodesde = "A";
                
            }
            if(typeof(preciohasta)=="undefined"){
                preciohasta = "A";
                
            }
            if(typeof(dormitorio)=="undefined"){
                dormitorio = "A";
                
            }
            if(typeof(bano)=="undefined"){
                bano = "A";
                
            }
            if(typeof(caracteristica)=="undefined"){
                caracteristica = "A";
                
            }
            if(typeof(cochera)=="undefined"){
                cochera = "A";
                
            }
            if(typeof(descripcion)=="undefined"){
                descripcion = "A";
                
            }
            $http({
                method: 'POST',
                url: 'http://carterainmobiliaria.com.pe/mahpsanew/front/buscar/'+alquilerventa+'/'+departamento+'/'+provincia+'/'+distrito+'/'+gradoconservacion+'/'+area+'/'+tipoinmueble+'/'+tipomoneda+'/'+preciodesde+'/'+preciohasta+'/'+dormitorio+'/'+bano+'/'+cochera+'/'+descripcion+'/'+caracteristica,
                //data: 'dep=:'+ departamento,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                $scope.resultado = data;

                $scope.pagedItems = [];
                console.log('cantidadddd:' + data.length);
                $scope.cantidad = data.length;
                if($scope.cantidad == 0){
                    $scope.ver = false;
                }

                for (var i = 0; i < $scope.cantidad; i++) {
                    if (i % $scope.pageSize === 0) {
                        $scope.pagedItems[Math.floor(i / $scope.pageSize)] = [ $scope.resultado[i] ];
                    } else {
                        $scope.pagedItems[Math.floor(i / $scope.pageSize)].push($scope.resultado[i]);
                    }
                }

                
                $scope.cantidad =  data.length;
                console.log($scope.cantidad );
                $scope.nombre = "";
                $scope.email = "";
                $scope.asunto = "";
                $scope.telefono="";
                $scope.comentario = "";
                $scope.success = "Se envió el correo correctamente";
            }).
            error(function(data, status){
                $scope.data = data || "Falló el envio";
                $scope.status = status;
            });

    };

     $scope.buscaren = function(alquilerventa, departamento, provincia, distrito, gradoconservacion, area, tipoinmueble, tipomoneda, preciodesde, preciohasta, dormitorio, bano, cochera, descripcion, caracteristica){
            if(typeof(alquilerventa)=="undefined"){
                alquilerventa = "";
                
            }
            if(typeof(departamento)=="undefined"){
                departamento = "A";
                
            }
            if(typeof(provincia)=="undefined"){
                provincia = "A";
                
            }
            if(typeof(distrito)=="undefined"){
                distrito = "A";
                
            }
            if(typeof(gradoconservacion)=="undefined"){
                gradoconservacion = "A";
                
            }
            if(typeof(area)=="undefined"){
                area = "A";
                
            }
            if(typeof(tipoinmueble)=="undefined"){
                tipoinmueble = "A";
                
            }
            if(typeof(tipomoneda)=="undefined"){
                tipomoneda = "A";
                
            }
            if(typeof(preciodesde)=="undefined"){
                preciodesde = "A";
                
            }
            if(typeof(preciohasta)=="undefined"){
                preciohasta = "A";
                
            }
            if(typeof(dormitorio)=="undefined"){
                dormitorio = "A";
                
            }
            if(typeof(bano)=="undefined"){
                bano = "A";
                
            }
            if(typeof(cochera)=="undefined"){
                cochera = "A";
                
            }
            if(typeof(descripcion)=="undefined"){
                descripcion = "A";
                
            }
             if(typeof(caracteristica)=="undefined"){
                caracteristica= "A";
                
            }
            $http({
                method: 'POST',
                url: 'http://carterainmobiliaria.com.pe/mahpsanew/front_en/buscar/'+alquilerventa+'/'+departamento+'/'+provincia+'/'+distrito+'/'+gradoconservacion+'/'+area+'/'+tipoinmueble+'/'+tipomoneda+'/'+preciodesde+'/'+preciohasta+'/'+dormitorio+'/'+bano+'/'+cochera+'/'+descripcion+'/'+caracteristica,
                //data: 'dep=:'+ departamento,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                $scope.resultado = data;
                $scope.pagedItems = [];
                console.log('cantidadddd:' + data.length);
                $scope.cantidad = data.length;
                if($scope.cantidad == 0){
                    $scope.ver = false;
                }

                for (var i = 0; i < $scope.cantidad; i++) {
                    if (i % $scope.pageSize === 0) {
                        $scope.pagedItems[Math.floor(i / $scope.pageSize)] = [ $scope.resultado[i] ];
                    } else {
                        $scope.pagedItems[Math.floor(i / $scope.pageSize)].push($scope.resultado[i]);
                    }
                }
                
                //$scope.cantidad =  data.length;
                //console.log($scope.cantidad );
                $scope.nombre = "";
                $scope.email = "";
                $scope.asunto = "";
                $scope.telefono="";
                $scope.comentario = "";
                $scope.success = "Se envió el correo correctamente";
            }).
            error(function(data, status){
                $scope.data = data || "Falló el envio";
                $scope.status = status;
            });

    };

     $scope.nextPage = function () {
            if ($scope.currentPage < $scope.pagedItems.length - 1) {
                $scope.currentPage++;
            }
    };

    $scope.setPage = function () {
            $scope.currentPage = this.n;

    };

    $scope.prevPage = function () {
            if ($scope.currentPage > 0) {
                $scope.currentPage--;
            }
    };



    $scope.changemouse = function() {
        console.log('a');
    $scope.hover = 'fondot';

    };

    $scope.changeleave = function() {
        console.log('b');
    $scope.hover = 'fondottop';
    };

     $scope.sendmail = function(){
        console.log("sdsds");

            $scope.success="";
                $http({
                    method: 'POST',
                    url: 'http://carterainmobiliaria.com.pe/enviocorreoContacto.php',
                    data: 'nombre=:'+ $scope.nombre + '&email='+ $scope.email + '&asunto=' + $scope.asunto +'&telefono=' + $scope.telefono  +'&comentario=' + $scope.comentario,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).
                success(function(data, status){
                    $scope.resultado = data;
                    $scope.nombre = "";
                    $scope.email = "";
                    $scope.asunto = "";
                    $scope.telefono="";
                    $scope.comentario = "";
                    $scope.success2 = "Se envió el correo correctamente.";
                }).
                error(function(data, status){
                    $scope.data = data || "Falló el envio";
                    $scope.status = status;
                });
            
        };

         $scope.sendmailfooter = function(){
        console.log("sdsds");

            $scope.success="";
                $http({
                    method: 'POST',
                    url: 'http://carterainmobiliaria.com.pe/enviocorreofooter.php',
                    data: 'nombre=:'+ $scope.nombre + '&email='+ $scope.email + '&asunto=' + $scope.comentario ,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).
                success(function(data, status){
                    $scope.resultado = data;
                    $scope.nombre = "";
                    $scope.email = "";
                    $scope.asunto = "";
                    $scope.telefono="";
                    $scope.comentario = "";
                    $scope.success3 = "Se envió el correo correctamente.";
                }).
                error(function(data, status){
                    $scope.data = data || "Falló el envio";
                    $scope.status = status;
                });
            
        };

        jQuery(function($){
             $('.imagef').hover(function(){
                contador = 1;
                $('.textox').animate({
                    left: '-100%'
               });
            });
        });
    


});