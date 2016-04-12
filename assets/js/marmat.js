var myApp = angular.module('myApp', []);

myApp.filter('total', function () {
      return function (input, property) {
        var i = input instanceof Array ? input.length : 0;
        if (typeof property === 'undefined' || i === 0) {
          return i;
        } else if (isNaN(input[0][property])) {
          throw 'filter total can count only numeric values';
        } else {
          var total = 0        
          while (i--)
            total += Number(input[i][property]);
          return total;
        }
      };
})


myApp.controller('configuracionController', function($scope, $http){
    $scope.valor = "aa";
    $scope.config = {};

    $scope.open = function(){
        $http({
            method: 'POST',
            url: '/configuracion/dashboard/abrir_config'
        }).
        success(function(data, status){
            console.log(data);
                $scope.config.ruc = data[0].RUC;
                $scope.config.igv = data[0].IGV;
                $scope.config.tipocambio = data[0].TIPOCAMBIO;
                $scope.config.tipoimp= data[0].IMPRESION;
                $scope.config.id = data[0].ID;
                console.log( $scope.config.tipoimp);
        }).
        error(function(data,status){
            $scope.data = data || "Falló al mostrar la data";
            $scope.status = status;
        });  
    }

    $scope.guardar = function(){
        $http({
            method: 'POST',
            url: '/configuracion/dashboard/guardar_master',
            params:{id: $scope.config.id, ruc: $scope.config.ruc, igv: $scope.config.igv, tipocambio: $scope.config.tipocambio, impresion:  $scope.config.tipoimp}
        }).
        success(function(data, status){
            console.log(data);
             swal("Se guardó correctamente!", "Presiona en el botón Ok, para continuar!", "success")
       
        }).
        error(function(data,status){
            $scope.data = data || "Falló al mostrar la data";
            $scope.status = status;
        });  
    }
   
   $scope.configuracion   =   function(){
        $http({
            method: 'POST',
            url: '/configuracion/dashboard/listar_impresion'
        }).
        success(function(data, status){
                $scope.configuraciones = data;
                
        }).
        error(function(data,status){
            $scope.data = data || "Falló al mostrar la data";
            $scope.status = status;
        });  

       
    };
});

myApp.controller('reimpresionController', function($scope, $http){
    $scope.valor = "aa";
   
    $scope.imprimirca = function(){
        var cadena;
        cadena = "";
        $scope.emision = '#'+ $scope.emision;
        cadena += "impMarmatca:" +$scope.emision + '|'+$scope.desde +'-'+$scope.hasta;
        window.location = cadena;
    };
});

myApp.controller('consultaController', function($scope, $http){
    
     $scope.emisiones = [
        {codigo: '16', nombre: '16'}


    ];
});

myApp.controller('ubigeoController', function($scope, $http){
    $scope.seguro = "sdsd";
     $scope.clear = function(){
        //$scope.items.length = 0;
        $scope.operadores = {};
        $scope.buscar = '';
    };

   // $scope.listarubigeo = function(){
        //$scope.items.length = 0;
        $http({
                method: 'POST',
                url: '/ubigeo_territorio/dashboard/listarubigeo',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
               $scope.ubigeos = data;
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
        });  
    //};


});

myApp.controller('envioController', function($scope, $http) {
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
     $scope.filteredItems = 0;
     $scope.existepaquete = 0;


    $scope.items = [];
    $scope.envio = {};
    $scope.envio.piezas = 1;
    $scope.envio.pesoreal = 1;
    $scope.envio.pesoexceso = 0;


    
  $scope.removeRow = function (itemIndex) {
    $scope.items.splice(itemIndex, 1);
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

     $scope.sel_servicio = function(id, descripcion){
        $scope.idservicio = id;
        $scope.servicio = descripcion;
        
        
    }

    myApp.filter('total', function () {
      return function (input, property) {
        var i = input instanceof Array ? input.length : 0;
        if (typeof property === 'undefined' || i === 0) {
          return i;
        } else if (isNaN(input[0][property])) {
          throw 'filter total can count only numeric values';
        } else {
          var total = 0        
          while (i--)
            total += Number(input[i][property]);
          return total;
        }
      };
    })





    $scope.envio.observacion = "";
    $scope.additem = function(){




            //Se verifica si la opcion del select esta vacia
            if ($('#art').val().trim() === '') {
                swal('Debes seleccionar un articulo!');
                return false;
            }

          

            if ($('#tari').val().trim() === '') {
                swal('Debes seleccionar una tarifa!');
                return false;
            }

            if ($('#destino').val().trim() === '') {
                swal('Debes seleccionar un destino!');
                return false;
            }


            

            if ($('#cargo').val().trim() === '') {
                swal('Debes seleccionar tipo de cargo adjunto!');
                return false;
            }


       
            if(typeof($scope.envio.dni)=="undefined"){
                $scope.envio.dni = "";
            }
            if(typeof($scope.envio.declaracionjurada)=="undefined"){
                $scope.envio.declaracionjurada = "";
            }
            if(typeof($scope.envio.seriejurada)=="undefined"){
                $scope.envio.seriejurada = "";
            }
            if(typeof($scope.envio.numerojurada)=="undefined"){
                $scope.envio.numerojurada = "";
            }
            if(typeof($scope.envio.montoarticulo)=="undefined"){
                $scope.envio.montoarticulo = "";
            }
           
           if(typeof($scope.envio.nrocargoadjunto)=="undefined"){
                $scope.envio.nrocargoadjunto = "";
            }


           if(typeof($scope.envio.observacion)=="undefined"){
                $scope.envio.observacion = "";
            }

            if(typeof($scope.envio.celular)=="undefined"){
                $scope.envio.celular = "";
            }
            
            if(typeof($scope.envio.dni)=="undefined"){
                $scope.envio.dni = "";
            }
             if( $scope.existepaquete == 1){
                var idtarifa_existe   = $scope.envio.tarifa;
            }else{
               var idtarifa_existe     =  $scope.envio.tarifa.ID;
            }
              
            $scope.items.push({
            rucdni          : $scope.rucdni,
            codigo          : $scope.codigo,
            idcliente       : $scope.idcliente,
            idservicio      : $scope.idservicio,
            tipodocumento   : $scope.tipodocumento.codigo,
            prefijo         : $scope.prefijo,
            numero          : $scope.numero,
            consignado      : $scope.envio.consignado,
            //fecha           : new Date("DD-MM-YYYY"),//$scope.envio.fecha,
            ubigeo          : $scope.ubigeo_terri,
            destino         : $scope.envio.destino,
            id_destino      : $scope.id_destino,
            articulo        : $scope.envio.articulo.DESCRIPCION,
            idarticulo      : $scope.envio.articulo.ID,
            tarifa          : $scope.envio.tarifa.DESCRIPCION,
           
            idtarifa        : idtarifa_existe,  
            servicio        : $scope.servicio,
            direccionentrega : $scope.envio.direccionentrega,
            dni             : $scope.envio.dni,
            celular         : $scope.envio.celular,
            pieza           : $scope.envio.piezas,
            pesoreal        : $scope.envio.pesoreal,
            pesoexceso      : $scope.envio.pesoexceso,
            observacion     : $scope.envio.observacion,
            cargoadjunto    : $scope.envio.cargoadjunto.codigo,
            nrocargoadjunto  : $scope.envio.nrocargoadjunto,
            seriejurada     : $scope.envio.seriejurada,
            numerojurada    : $scope.envio.numerojurada,
            montoarticulo   : $scope.envio.montoarticulo,
            montobase       : $scope.envio.montobase,
            montoexceso     : $scope.envio.montoexceso,
            montoembalaje   : $scope.envio.montoembalaje,
            montootroscobros  : $scope.envio.montootroscobros,
            valorventa      : $scope.envio.valorventa,
            descuento       : $scope.envio.descuento,
            igv             : $scope.envio.igv,
            precioventa     : $scope.envio.precioventa,
            emision         : $scope.envio.emi,
            remito          : $scope.envio.rem

            });
      
        $scope.filteredItems = $scope.items.length; //Initially for no filter  

        console.log($scope.items);

        $scope.envio = {};
         $scope.envio.piezas = 1;
        $scope.envio.pesoreal = 1;
        $scope.envio.pesoexceso = 0;
    };

    $scope.myFunct = function(keyEvent) {
          if (keyEvent.which === 13)
            alert('I am an alert');
        }

    $scope.clear = function(){
        //$scope.items.length = 0;
        $scope.clientes = {};
        $scope.buscar = '';
    };

    $scope.findos = function(keyEvent, emiorden, nroorden){
        if(keyEvent.which === 13){
             $http({
                method: 'POST',
                url: '/envio/enviocre/validar_os/'+emiorden+'/'+nroorden
                }).
                success(function(data, status){
                        $scope.resultado = data;
                        if($scope.resultado.length > 0){
                            $scope.rucdni = $scope.resultado[0].DOCUMENTO;
                            $scope.codigo = $scope.resultado[0].NROCLIENTE;
                        }else{
                            sweetAlert("Aviso","No existe OS, favor verificar","error");
                            $scope.emiorden = "";
                            $scope.nroorden = "";
                            return false;
                        }
                        
                }).
                error(function(data,status){
                    $scope.data = data || "Falló al mostrar la data";
                    $scope.status = status;
            });  
        }
    };



     $('#agregar').click(function() {


       if($('#valida').val().trim() == '1'){
            console.log('emtro');
            if(($("#emiorden").val().trim()) === '' || ($("#nroorden").val().trim() === '' )){
                 swal("Ingrese una Orden de servicio!");
                return false;
            }
       }

        if ($('#nombre').val().trim() === '') {
            //alert('Debes ingresar un cliente');
            swal("Debes ingresar un cliente!");
            return false;
        }

        
        if ($('#serv').val().trim() === '') {
            swal('Debes seleccionar un servicio!');
            return false;
        }

        //Se verifica si la opcion del select esta vacia
        if ($('#tipdoc').val().trim() === '') {
            swal('Debes seleccionar un tipo de documento!');
            return false;
        }

        if ($('#serie').val().trim() === '') {
            swal('Debes ingresar la serie de documento!');
            return false;
        }

        if ($('#numero').val().trim() === '') {
            swal('Debes ingresar el numero de documento!');
            return false;
        }
      });

    $scope.json = function(){
        $scope.array = JSON.parse($scope.items);
        console.log($scope.array); 
    };

    $scope.cargadestino = function(){
        $http({
            method: 'GET',
            url: '/envio/dashboard/buscar_destino',
            params:{value: $scope.envio.destino}
        }).
        success(function(data, status){
            $scope.destinos = data;
        }).
        error(function(data, status){
            $scope.data = data || "Falló el envio";
            $scope.status = status;
        });
    };

    /**************CALCULAR MONTOS PARA REALIZAR EL ENVIO************/
    $scope.upd_montos = function(idtarifa){

             $http({
                method: 'POST',
                url: '/envio/dashboard/buscar_tarifa_id/'+idtarifa
            
                }).
                success(function(data, status){
                        
                        //$scope.tarifas_id = data;
                        
                        //$scope.envio.tarifa = data[0].ID;
                       // console.log($scope.tarifas);

                       base = data[0].TFA_BASE;
                       exceso = data[0].TFA_EXCESO;

                    console.log(base);
                       if(typeof(base)=="undefined"){
                        base = 0;
                        }
                        if(typeof(exceso)=="undefined"){
                            exceso = 0;
                        }

                      
                        embalaje = 0;
                        otros = 0;
                        

                        console.log(base);
                        $scope.envio.montobase = base;
                        $scope.envio.montoexceso = exceso;
                        $scope.envio.descuento = 0;
                        $scope.envio.montoembalaje = embalaje;
                        $scope.envio.montootroscobros = otros;

                        $scope.envio.valorventa = parseFloat(base) + parseFloat(exceso) + parseFloat(embalaje) + parseFloat(otros);    
                        $scope.envio.igv = 0.18;
                        var num;
                        num =  parseFloat($scope.envio.valorventa)* 1.18;
                        $scope.envio.precioventa = parseFloat(num).toFixed(2);
                    

                                
                    }).
                    error(function(data,status){
                        $scope.data = data || "Falló al mostrar la data";
                        $scope.status = status;
                        console.log('error');
                });  

            
        }

    /**************CALCULAR MONTOS PARA REALIZAR EL ENVIO************/
    $scope.upd_montos2 = function(base, exceso, embalaje, otros){
            if(typeof(base)=="undefined"){
                base = 0;
            }
            if(typeof(exceso)=="undefined"){
                exceso = 0;
            }

            if(typeof(embalaje)=="undefined"){
                embalaje = 0;
            }

            if(typeof(otros)=="undefined"){
                otros = 0;
            }


            $scope.envio.montobase = base;
            $scope.envio.montoexceso = exceso;
            $scope.envio.descuento = 0;
            $scope.envio.montoembalaje = embalaje;
            $scope.envio.montootroscobros = otros;

            $scope.envio.valorventa = parseFloat(base) + parseFloat(exceso) + parseFloat(embalaje) + parseFloat(otros);    
            $scope.envio.igv = 0.18;
            var num;
            num =  parseFloat($scope.envio.valorventa)* 1.18;
            $scope.envio.precioventa = parseFloat(num).toFixed(2);
        
    }

    
    /***************************/


    //Cuando eliges un usuario lo reemplaza en el campo de texto
    $scope.cambiadestino = function(destino, ubigeo, id_destino, id_zona){
        $scope.envio.destino = destino;
        $scope.ubigeo_terri = ubigeo;
        $scope.id_destino = id_destino;
        $scope.id_zona = id_zona;
        $scope.destinos = null;

        $http({
                method: 'POST',
                url: '/envio/dashboard/buscar_cliente_paquete/'+ $scope.idcliente,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                    if(data.length > 0 ){
                        console.log('cliente_paquete: '+data[0].ID_PAQUETE);
                        $http({
                                method: 'POST',
                                url: '/envio/dashboard/buscar_paquete_tarifa_det/'+ data[0].ID_PAQUETE+'/'+$scope.id_zona,
                                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                            }).
                            success(function(data, status){
                                    if(data.length > 0 ){
                                        console.log('det: '+data[0].ID_TARIFA);
                                        $scope.existepaquete = 1;
                                        console.log('existe '+$scope.existepaquete);
                                        $scope.envio.tarifa = data[0].ID_TARIFA;

                                         /**************CALCULAR MONTOS PARA REALIZAR EL ENVIO************/
                                           

                                             $http({
                                                method: 'POST',
                                                url: '/envio/dashboard/buscar_tarifa_id/'+$scope.envio.tarifa
                                            
                                                }).
                                                success(function(data, status){
                                                        
                                                        //$scope.tarifas_id = data;
                                                        
                                                        //$scope.envio.tarifa = data[0].ID;
                                                       // console.log($scope.tarifas);

                                                       base = data[0].TFA_BASE;
                                                       exceso = data[0].TFA_EXCESO;

                                                    console.log(base);
                                                       if(typeof(base)=="undefined"){
                                                        base = 0;
                                                        }
                                                        if(typeof(exceso)=="undefined"){
                                                            exceso = 0;
                                                        }

                                                      
                                                        embalaje = 0;
                                                        otros = 0;
                                                        

                                                        console.log(base);
                                                        $scope.envio.montobase = base;
                                                        $scope.envio.montoexceso = exceso;
                                                        $scope.envio.descuento = 0;
                                                        $scope.envio.montoembalaje = embalaje;
                                                        $scope.envio.montootroscobros = otros;

                                                        $scope.envio.valorventa = parseFloat(base) + parseFloat(exceso) + parseFloat(embalaje) + parseFloat(otros);    
                                                        $scope.envio.igv = 0.18;
                                                        var num;
                                                        num =  parseFloat($scope.envio.valorventa)* 1.18;
                                                        $scope.envio.precioventa = parseFloat(num).toFixed(2);
                                                    

                                                                
                                                    }).
                                                    error(function(data,status){
                                                        $scope.data = data || "Falló al mostrar la data";
                                                        $scope.status = status;
                                                        console.log('error');
                                                });  

                                                    
                                                

                                    }else{
                                        $scope.existepaquete = 0;
                                        $scope.envio.montobase = 0;
                                        $scope.envio.montoexceso = 0;
                                        $scope.envio.descuento = 0;
                                        $scope.envio.montoembalaje = 0;
                                        $scope.envio.montootroscobros = 0;
                                        $scope.envio.precioventa = 0;
                                        $scope.envio.valorventa = 0;
                                        $scope.envio.tarifa = "";

                                    }
                                    
                                
                        }).
                        error(function(data,status){
                            $scope.data = data || "Falló al mostrar la data";
                            $scope.status = status;
                        });  
                                    }
                    
                
        }).
        error(function(data,status){
            $scope.data = data || "Falló al mostrar la data";
            $scope.status = status;
        });  


    }

    $scope.enviar = function(){
        $scope.cargando = "Cargando....";
        $http({
            method: 'POST',
            url: '/envio/dashboard/envio_insertar',
            data: $scope.items
        }).
        success(function(data, status){
            $scope.envios = data;
            console.log(data);
            $scope.nombre = "";
            $scope.email = "";
            $scope.asunto = "";
            $scope.telefono="";
            $scope.comentario = "";
            $scope.cargando = "";


            $scope.success = "Se envió el correo correctamente";

            $http({
            method: 'POST',
            url: '/envio/dashboard/impresionflg'
            }).
            success(function(data, status){
                    $scope.flgimpresion = data[0].IMPRESION;
                    console.log($scope.flgimpresion);
                    
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
                sweetAlert("Error en la base de datos","Favor verificar el numero de remito");
                return false;
            });  

            var cadena, remitos;
            cadena = "";
            remitos = $scope.envios.substr(1, $scope.envios.length -3);
            cadena += "impMarmat:" + remitos;
            window.location = cadena;

            

            console.log(cadena);

            //var cadena;
            /*for (i = 0; i < $scope.envios.length; i++) {
               // text += $scope.envios[i] + 
               cadena += $scope.envios[i].REMITO + "#";
              //$scope.telephone[i.toString()] = $scope.phone[i];
            }*/
            //console.log(cadena);
            

            //alert('Se guardó correctamente');
               swal("Se guardó correctamente!", "Presiona en el botón Ok, para continuar!", "success")
             $scope.envio = {};
             $scope.items = [];
             $scope.rucdni = ""
             $scope.codigo = ""
             $scope.tipocliente = "";
             $scope.cod_tipocliente = "";
             $scope.nombre = "";
             $scope.servicio = "";
             $scope.idservicio = "";
             $scope.estado = "";
             $scope.tipodocumento = "";
             $scope.prefijo = "";
             $scope.numero ="";

            
        }).
        error(function(data, status){
            $scope.data = data || "Falló el envio";
            $scope.status = status;
        });
        $scope.cargando = "";
    };


    $scope.enviarca = function(){
        $scope.cargando = "Cargando....";
        $http({
            method: 'POST',
            url: '/envio/envioca/envio_insertar',
            data: $scope.items
        }).
        success(function(data, status){
            $scope.envios = data;
            console.log(data);
            $scope.nombre = "";
            $scope.email = "";
            $scope.asunto = "";
            $scope.telefono="";
            $scope.comentario = "";
            $scope.cargando = "";


            $scope.success = "Se envió el correo correctamente";

            $http({
            method: 'POST',
            url: '/envio/dashboard/impresionflg'
            }).
            success(function(data, status){
                    $scope.flgimpresion = data[0].IMPRESION;
                    console.log($scope.flgimpresion);
                    
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
                sweetAlert("Error en la base de datos","Favor verificar el numero de remito");
                return false;
            });  

            var cadena, remitos;
            cadena = "";
            remitos = $scope.envios.substr(1, $scope.envios.length -3);
            cadena += "impMarmat:" + remitos;
            window.location = cadena;

            

            console.log(cadena);

            //var cadena;
            /*for (i = 0; i < $scope.envios.length; i++) {
               // text += $scope.envios[i] + 
               cadena += $scope.envios[i].REMITO + "#";
              //$scope.telephone[i.toString()] = $scope.phone[i];
            }*/
            //console.log(cadena);
            

            //alert('Se guardó correctamente');
               swal("Se guardó correctamente!", "Presiona en el botón Ok, para continuar!", "success")
             $scope.envio = {};
             $scope.items = [];
             $scope.rucdni = ""
             $scope.codigo = ""
             $scope.tipocliente = "";
             $scope.cod_tipocliente = "";
             $scope.nombre = "";
             $scope.servicio = "";
             $scope.idservicio = "";
             $scope.estado = "";
             $scope.tipodocumento = "";
             $scope.prefijo = "";
             $scope.numero ="";

            
        }).
        error(function(data, status){
            $scope.data = data || "Falló el envio";
            $scope.status = status;
        });
        $scope.cargando = "";
    };

    $scope.lecturacodbarras = function(lectura, keyEvent){
        if(keyEvent.which === 13){
            var tipo = lectura.substr(0,1);
            var emision = lectura.substr(1,2);
            var remito = lectura.substr(3);

            $scope.envio.emi = emision;
            $scope.envio.rem = parseInt(remito);

            //alert(tipo+' '+emision+' '+remito);
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

    $scope.buscarservicio    =   function(){
       
        $http({
            method: 'POST',
            url: '/envio/dashboard/buscar_servicio',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
           
           
               
            
        }).
        success(function(data, status){
                
                $scope.servicios = data;
            
        }).
        error(function(data,status){
            $scope.data = data || "Falló al mostrar la data";
            $scope.status = status;
        });  

       
    };

    $scope.articulos    =   function(){
       
        $http({
            method: 'POST',
            url: '/envio/dashboard/buscar_articulo'
           
        }).
        success(function(data, status){
                
                $scope.articulos = data;
                console.log($scope.articulos );
            
        }).
        error(function(data,status){
            $scope.data = data || "Falló al mostrar la data";
            $scope.status = status;
        });  

       
    };

    //$scope.tarifas    =   function(){
       
        $http({
            method: 'POST',
            url: '/envio/dashboard/buscar_tarifa'
            
        }).
        success(function(data, status){
                
                $scope.tarifas = data;
                
                //$scope.envio.tarifa = data[0].ID;
                console.log($scope.tarifas);

            
        }).
        error(function(data,status){
            $scope.data = data || "Falló al mostrar la data";
            $scope.status = status;
        });  

       
    //};



    $scope.cargoadjuntos = [
        {codigo:'1', nombre: 'SI'},
        {codigo:'0', nombre: 'NO'}
    ];

    $scope.declaraciones = [
        {codigo:'S', nombre: 'SI'},
        {codigo:'N', nombre: 'NO'}
    ];

 


    $scope.Tipodocumentos = [
        {codigo: 'B', nombre: 'BOLETA'},
        {codigo: 'F', nombre: 'FACTURA'}
    ];

     $scope.estados = [
        {codigo: '0', nombre: 'ANULADO'},
        {codigo: '1', nombre: 'EMITIDO'}

    ];


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

    $scope.mipreciorango = [
                {desde: '50000', hasta: '100000', nombre: '50,000 - 100,000'},
                {desde: '101000', hasta: '200000', nombre: '101,000 - 200,000'},
                {desde: '201000', hasta: '300000', nombre: '201,000 - 300,000'},
                {desde: '301000', hasta: '400000', nombre: '301,000 - 400,000'},
                {desde: '401000', hasta: '500000', nombre: '401,000 - 500,000'},
                {desde: '501000', hasta: '9999999', nombre: '501,000 a +'},
    ]
    
    $scope.miantiguedad = [
                {desde: '0', hasta: '0', nombre: 'Estreno'},
                {desde: '1', hasta: '10', nombre: '1 - 10 Años'},
                {desde: '11', hasta: '20', nombre: '11 - 20 Años'},
                {desde: '21', hasta: '30', nombre: '21 - 30 Años'},
                {desde: '31', hasta: '99999', nombre: '31 Años a +'}
    ]
    
    $scope.miantiguedaden = [
                {desde: '0', hasta: '0', nombre: 'Premiere'},
                {desde: '1', hasta: '10', nombre: '1 - 10 Years'},
                {desde: '11', hasta: '20', nombre: '11 - 20 Years'},
                {desde: '21', hasta: '30', nombre: '21 - 30 Years'},
                {desde: '31', hasta: '99999', nombre: '31 Years a +'}
    ]


    

     $scope.tipomoneda = [
        {codigo: '1', nombre: 'Soles'},
        {codigo: '2', nombre: 'Dolares'}
        
    ];

  
        
    


});

myApp.controller('orden_servicioController', function($scope, $filter, $http) {
    //$scope.valor ="a";
    $scope.os = {};
    $scope.items = [];

     

     $scope.fechain = $filter("date")(Date.now(), 'dd/MM/yyyy');
     $scope.fechater = $filter("date")(Date.now(), 'dd/MM/yyyy');
     $scope.os.fechareg = $filter("date")(Date.now(), 'dd/MM/yyyy');
     console.log($scope.fechain);

     $scope.clear = function(){
        //$scope.items.length = 0;
        $scope.os = {}; 
        $scope.items = [];
    };

    $scope.listaos = function(fecha1, fecha2, estado, documento) {

        if(typeof(documento)=="undefined"){
                documento = "%";
            }
        if(typeof(estado) == "undefined"){
            estado = "%";
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
            url: '/orden_servicio/dashboard/buscar_os',
            params:{fechaini: dfechaini,  fechafin: dfechafin , estado : estado, documento: documento}
            
            }).
            success(function(data, status){
                console.log(data.length);
                    if(data.length == 0 ){
                        alert("No existen remitos en los rangos ingresados");
                        $scope.remitos = "";

                    }
                $scope.remitos = data;
                $scope.ordens = data;
               
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
            });        
          
    }

    $scope.mostrar = function(id){
        $http({
        method: 'GET',
        url: '/orden_servicio/dashboard/mostraros/'+id        
        }).
        success(function(data, status){
            console.log(data.length);
                if(data.length == 0 ){
                    sweetAlert("Aviso","No existe orden de servicio no existe");
                    $scope.selorden = "";
                    return false;
                }
            $scope.selorden = data;
            $scope.os.rucdni = $scope.selorden[0].DOCUMENTO;
            $scope.os.codigo = $scope.selorden[0].NROCLIENTE;
            $scope.os.nombre = $scope.selorden[0].RAZON_SOCIAL;
            $scope.os.emision = $scope.selorden[0].EMI_ORDEN;
            $scope.os.norden = $scope.selorden[0].NRO_ORDEN;
            if($scope.selorden[0].FECHA_ORDEN != ""){
                var fecha = $scope.selorden[0].FECHA_ORDEN;
                var dia = fecha.substr(8,2);
                 var mes = fecha.substr(5,2);
                 var ano = fecha.substr(0,4);
                  var dfechareg = dia+'/'+mes+'/'+ano;
            }
            $scope.os.fechareg = dfechareg;//$scope.selorden[0].FECHA_ORDEN;
            $scope.os.ordenestado = $scope.selorden[0].ESTADO;
            $scope.os.tservicios = $scope.selorden[0].TIPO_SERVICIO;
            $scope.os.cantidad = $scope.selorden[0].CANT_ENVIOS;
            $scope.os.glosa = $scope.selorden[0].GLOSA;
            $scope.os.codid = $scope.selorden[0].ID;





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

    $scope.guardar = function(){


        $scope.cargando = "Cargando....";
       
         var dia = $scope.os.fechareg.substr(0,2);
         var mes = $scope.os.fechareg.substr(3,2);
         var ano = $scope.os.fechareg.substr(6,4);
         console.log(dia);
         console.log(mes);
         console.log(ano);
         var dfecha = ano+'-'+mes+'-'+dia;
   

         $scope.items.push({
                rucdni : $scope.os.rucdni,
                nrocliente  : $scope.os.codigo,
                emision : $scope.os.emision,
                norden : $scope.os.norden,
                fechareg  : dfecha,
                ordenestado : $scope.os.ordenestado,
                tservicio : $scope.os.tservicios,
                cantidad : $scope.os.cantidad,
                glosa  : $scope.os.glosa,
                tiposervicio : $scope.os.tservicios,
                id : $scope.os.codid
            });


        $http({
            method: 'POST',
            url: '/orden_servicio/dashboard/os_insertar',
            data: $scope.items
        }).
        success(function(data, status){
            $scope.ordenservicio = data;
            console.log(data);
            $scope.nombre = "";
            $scope.email = "";
            $scope.asunto = "";
            $scope.telefono="";
            $scope.comentario = "";
            $scope.cargando = "";


            $scope.success = "Se guardó correctamente";

            $scope.items = [];
            $scope.os = {};

          
            //var cadena;
            /*for (i = 0; i < $scope.envios.length; i++) {
               // text += $scope.envios[i] + 
               cadena += $scope.envios[i].REMITO + "#";
              //$scope.telephone[i.toString()] = $scope.phone[i];
            }*/
            //console.log(cadena);
            

            //alert('Se guardó correctamente');
             swal("Se guardó correctamente!", "Presiona en el botón Ok, para continuar!", "success")
             
            
        }).
        error(function(data, status){
            $scope.data = data || "Falló el envio";
            $scope.status = status;
        });
        $scope.cargando = "";
    };

    $scope.lecturacodbarras = function(lectura, keyEvent){
        if(keyEvent.which === 13){
            var tipo = lectura.substr(0,1);
            var emision = lectura.substr(1,2);
            var remito = lectura.substr(3);

            $scope.emi = emision;
            $scope.rem = remito;

            //alert(tipo+' '+emision+' '+remito);
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

myApp.controller('paqcliController', function($scope, $http){
    $scope.seguro = "sdsd";
     $scope.clear = function(){
        //$scope.items.length = 0;
        $scope.operadores = {};
        $scope.buscar = '';
    };
});

myApp.controller('liquidacionController', function($scope, $filter, $http){
    
   
    
    $scope.items = [];
    $scope.liq = {};
    $scope.accion = "checked"
    $scope.liq.salida = 1;
    $scope.idope ="";
    $scope.habi = "";
    $scope.mostrar = false;


    function formatDate(date) {
           date = new Date(date);

          var day = ('0' + date.getDate()).slice(-2);
          var month = ('0' + (date.getMonth() + 1)).slice(-2);
          var year = date.getFullYear();

          return year + '/' + month + '/' + day;
    }

    $scope.motivos = function(){
        $http({
            method:'POST',
            url: '/liquidacion/dashboard/listar_motivos'
        }).
        success(function(data, status){
            $scope.motivos = data;

        }).
        error(function(data, status){
            $scope.data = data  || "Falló al mostrar la data";
            $scope.status = status;
        });

    };

    $('#buscar').click(function() {
        //Se verifica si la opcion del select esta vacia
        if ($('#nomoperador').val().trim() === '') {
            swal('Debes seleccionar un operador!');
             return false
        }
        
      });

     $('#codbarras').keypress(function() {
        //Se verifica si la opcion del select esta vacia

        
            if($scope.accion == 'M' ){
                if ($('#opeint').val().trim() === '') {
                    swal('Debes seleccionar un operador interno!');
                    //$('#codbarras').val() = "";
                    return false
                }
                if ($('#mot').val().trim() === '') {
                    swal('Debes seleccionar un motivo!');
                    //$('#codbarras').val() = "";
                    return false
                }
                if ($('#glosa').val().trim() === '') {
                    swal('Debes seleccionar una glosa!');
                    //$('#codbarras').val() = "";
                    return false
                }
            }else{
                if ($('#nomoperador').val().trim() === '') {
                swal('Debes seleccionar un operador!');
                //$('#codbarras').val() = "";
                return false
            }
        }

        
      });

      $('#accion3').click(function() {
        //Se verifica si la opcion del select esta vacia
        if ($('#accion3').val().trim() == 'M') {
           $scope.mostrar = true;
           console.log("pruebaa");
        }
    });

      $('#accion2').click(function() {
        //Se verifica si la opcion del select esta vacia
        if ($('#accion2').val().trim() == 'E') {
           $scope.mostrar = false;
        }
        
      });

        $('#accion').click(function() {
        //Se verifica si la opcion del select esta vacia
        if ($('#accion').val().trim() == 'A') {
           $scope.mostrar = false;
        }
        
      });

     /*

      

     

       
      });*/


    $scope.liq.fecha = $filter("date")(Date.now(), 'dd/MM/yyyy');

//console.log(Date.now());

    //$scope.liq.fechamostrar = $filter("date")(Date.now(), 'dd/MM/yyyy');
    //console.log( $scope.liq.fechamostrar );

     $scope.clear = function(){
        //$scope.items.length = 0;
        $scope.operadores = {}; 
        $scope.buscar = '';
    };



    $scope.getTotalasig = function(){
    var total = 0;
   // console.log($scope.items);
        for(var i = 0; i < $scope.items.length; i++){
            var estado = $scope.items[i].ESTADO;
            var estado2 = $scope.items[i].IDESTADO;
            if(estado == '2' || estado2 == '2' ){
                total += 1;
            }
        }
        return total;
    }

    $scope.getTotalentr = function(){
    var total = 0;
   // console.log($scope.items);
        for(var i = 0; i < $scope.items.length; i++){
            var estado = $scope.items[i].ESTADO;
            var estado2 = $scope.items[i].IDESTADO;
            if(estado == '4' || estado2 == '4' ){
                total += 1;
            }
        }
        return total;
    }

    $scope.getTotalmot = function(){
    var total = 0;
   // console.log($scope.items);
        for(var i = 0; i < $scope.items.length; i++){
            var estado = $scope.items[i].ESTADO;
            var estado2 = $scope.items[i].IDESTADO;
            if(estado == '5' || estado2 == '5' ){
                total += 1;
            }
        }
        return total;
    }

    $scope.pintar = function(estado){
    var color = "";
   
   // console.log(estado);
        if(estado == 'Asignado'){
            color = "info";
        }else if(estado == 'Entregado'){
            color = "success";
        }else if(estado == 'Motivado'){
            color = "warning";
        }else if(estado =='Pendiente'){
            color = "danger";
        }
    
        console.log(color);
        return color;

    }


    $scope.buscarliq = function(){
        // $scope.liq.fecha  = $scope.liq.fechamostrar;
         console.log($scope.liq.fecha);
         var dia = $scope.liq.fecha.substr(0,2);
         var mes = $scope.liq.fecha.substr(3,2);
         var ano = $scope.liq.fecha.substr(6,4);
         console.log(dia);
         console.log(mes);
         console.log(ano);
         var dfecha = ano+'-'+mes+'-'+dia;
         console.log('sdsd');
    console.log($scope.idoperador);
        $http({
            method: 'GET',
            url: '/liquidacion/dashboard/buscarliquidacion',
            params:{fecha: dfecha, salida : $scope.liq.salida, operador : $scope.idoperador},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
         
        }).
        success(function(data, status){
            $scope.items = data;
            console.log($scope.items);
             idevento : 'lupa'
            
            $scope.success = "Se envió el correo correctamente";
           // alert('Se guardó correctamente');
            //location.reload();
             //$scope.items = [];
        }).
        error(function(data, status){
            $scope.data = data || "Falló el envio";
            $scope.status = status;
        });
    };

    $scope.buscaroperador    =   function(codigo, keyEvent, tipo ){
        console.log(codigo,keyEvent)
        var idope;
        if (keyEvent.which === 13){

            $http({
                method: 'POST',
                url: '/liquidacion/dashboard/buscar_operador/'+ codigo,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                if(codigo != 'x'){
                    console.log(data.length);
                    if(data.length == 0 ){
                        if(tipo=='normal'){
                            $scope.idoperador = "";
                            $scope.codoperador = "";
                            $scope.liq.nomoperador = ""
                            $scope.apellidos = "";
                            $scope.nombres = "";
                            $scope.dni = "";
                        }else{
                            $scope.liq.opeint = ""
                        }



                    }else{
                        if(tipo == 'normal'){
                            $scope.idoperador = data[0].ID;
                            console.log($scope.idoperador);
                            $scope.idope = $scope.idoperador;
                            $scope.codoperador = data[0].COD_OPERADOR;
                            $scope.apellidos = data[0].APELLIDOS;
                            $scope.nombres = data[0].NOMBRES;
                            $scope.liq.nomoperador = data[0].APELLIDOS + ' ' + data[0].NOMBRES;
                            $scope.dni = data[0].DNI;
                        }else{
                            $scope.idoperadorint = data[0].ID
                            $scope.opeint = data[0].COD_OPERADOR;
                        }
                       
                        

                         //console.log($scope.liq.fecha);
                         var dia = $scope.liq.fecha.substr(0,2);
                         var mes = $scope.liq.fecha.substr(3,2);
                         var ano = $scope.liq.fecha.substr(6,4);
                         console.log(dia);
                         console.log(mes);
                         console.log(ano);
                         var dfecha = ano+'-'+mes+'-'+dia;
                        
                        console.log($scope.idope);
                        $http({
                            method: 'GET',
                            url: '/liquidacion/dashboard/buscarliquidacion',
                            params:{fecha: dfecha, salida : $scope.liq.salida, operador : $scope.idope},
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                         
                        }).
                        success(function(data, status){
                            $scope.items = data;
                            console.log($scope.items);
                             idevento : 'lupa';
                           
                            $scope.success = "Se envió el correo correctamente";
                           // alert('Se guardó correctamente');
                            //location.reload();
                             //$scope.items = [];
                        }).
                        error(function(data, status){
                            $scope.data = data || "Falló el envio";
                            $scope.status = status;
                        });

                    }
                }else{
                    $scope.operadores = data;
                }
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
            });  
        }else{
             $http({
                method: 'POST',
                url: '/liquidacion/dashboard/buscar_operador/'+ codigo,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                if(codigo != 'x'){
                    console.log(data.length);
                    if(data.length == 0 ){
                        $scope.nombre = "";
                        $scope.codoperador = "";
                    }else{
                        $scope.codoperador = data[0].COD_OPERADOR;
                        $scope.idope = data[0].ID; 

                    }
                }else{
                    $scope.operadores = data;
                     //$scope.liq.codoperador = 
                }
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
            });  

        }

       
    };
    
      $scope.sel = function(id, cod_operador, apellidos, nombres, tipo){
        if(tipo == 'normal'){
            $scope.idoperador = id;
            $scope.idope = $scope.idoperador;
            $scope.codoperador = cod_operador;
            $scope.apellidos = apellidos;
            $scope.liq.nomoperador = apellidos+' '+nombres;
            $scope.liq.codoperador = cod_operador;
            $scope.nombres = nombres;
            console.log(id);
            console.log(cod_operador);
            console.log(apellidos);
            console.log(nombres);
        }else{
            $scope.liq.idoperadorint = id;
            $scope.liq.opeint = cod_operador;
        }

         //console.log($scope.liq.fecha);
         var dia = $scope.liq.fecha.substr(0,2);
         var mes = $scope.liq.fecha.substr(3,2);
         var ano = $scope.liq.fecha.substr(6,4);
         console.log(dia);
         console.log(mes);
         console.log(ano);
         var dfecha = ano+'-'+mes+'-'+dia;
        
        console.log($scope.idope);
        $http({
            method: 'GET',
            url: '/liquidacion/dashboard/buscarliquidacion',
            params:{fecha: dfecha, salida : $scope.liq.salida, operador : $scope.idope},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
         
        }).
        success(function(data, status){
            $scope.items = data;
            console.log($scope.items);
             idevento : 'lupa'
            
            $scope.success = "Se envió el correo correctamente";
           // alert('Se guardó correctamente');
            //location.reload();
             //$scope.items = [];
        }).
        error(function(data, status){
            $scope.data = data || "Falló el envio";
            $scope.status = status;
        });
        
    };

    $scope.additem = function(remito,keyEvent, accion){


        console.log($scope.liq.fecha);
         var dia = $scope.liq.fecha.substr(0,2);
         var mes = $scope.liq.fecha.substr(3,2);
         var ano = $scope.liq.fecha.substr(6,4);
         console.log(dia);
         console.log(mes);
         console.log(ano);
         var dfecha = ano+'-'+mes+'-'+dia;
       if(accion == "checked"){
            accion = 'A';
        }
        if(accion == 'A'){
            $scope.estado_accion = 2;//ASIGNADO
        }else if(accion == 'E'){
            $scope.estado_accion = 4;//ENTREGADO
        }else if(accion == 'M'){
            $scope.estado_accion = 5;//MOTIVADO
        }
        //alert($scope.estado_accion );

        $scope.textfe=  $filter('date')($scope.liq.fecha,'yyyy/MM/dd');
        console.log($scope.textfe);
         if (keyEvent.which === 13){
            $http({
            method: 'POST',
            url: '/liquidacion/dashboard/buscar_remito/'+ remito,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).
            success(function(data, status){
                console.log(data);
                if(data.length == 0 ){
                    swal("No existe remito ingresado "+ remito);

                    $scope.liq.codigobarras = "";
                }else{
                  
                    
                    console.log($scope.result);
                    $scope.emision      =   data[0].EMISION;
                    $scope.remito       =   data[0].REMITO;
                    $scope.consignado   =   data[0].CONSIGNADO;
                    $scope.direccion    =   data[0].DIRECCION;
                    $scope.estado       =   $scope.estado_accion;
                    $scope.glosa        =   '';
                    $scope.motivo       =   '';
                    $scope.nroveces     =   1;
                    $scope.tipo         =  'normal';
                    $scope.idestado     =  data[0].IDESTADO;

                    if(accion == 'M'){

                        $scope.idmotivo     =   parseInt($scope.liq.moti.CODIGO);
                        $scope.motivo       =   $scope.liq.moti.DESCRIPCION;
                    
                    }



                    $scope.result = $filter('filter')($scope.items, {REMITO:$scope.remito});
                    $scope.resp_estado = $filter('filter')($scope.items, {IDESTADO: $scope.idestado});
                    console.log($scope.resp_estado);
                    console.log($scope.items);
                    console.log($scope.result.length);
                    //if(accion == 'E' || accion == 'M'){
                    if($scope.result.length == 1 && $scope.resp_estado.length == 1){
                        if($scope.idestado == 4){
                            $scope.liq.codigobarras = "";
                            swal("El remito ya se encuentra reportado "+ remito);
                            return false;
                        }
                    }
                    //}

                    if(accion == 'E' || accion == 'M'){
                        if($scope.result.length == 0){
                            $scope.liq.codigobarras = "";
                            swal("No existe remito ingresado en el listado "+ remito);
                            return false;
                        }

                    }





                    $scope.items.push({
                        EMISION : $scope.emision,
                        REMITO  : $scope.remito,
                        CONSIGNADO : $scope.consignado,
                        DIRECCION : $scope.direccion,
                        ESTADO  : $scope.estado,
                        GLOSA : $scope.glosa,
                        MOTIVO : $scope.motivo,
                        nroveces : $scope.nroveces,
                        tipo  : $scope.tipo,
                        fechasalida : dfecha,
                        idoperador : $scope.idoperador,
                        salida : $scope.liq.salida,
                        IDESTADO : $scope.estado,
                        IDMOTIVO : $scope.idmotivo,
                        motivo : $scope.motivo,
                        GLOSA : $scope.liq.glosa,


                        idevento : 'enter'

                    });

                  //  console.log($scope.items);

                    $scope.liq.codigobarras = "";

                }
               
            }).
            error(function(data,status){
                $scope.data = data || "Falló al mostrar la data";
                $scope.status = status;
            });  

               
                
            };
        }

     $scope.procesar = function(){
        $http({
            method: 'POST',
            url: '/liquidacion/dashboard/liquidacion_insertar',
            data: $scope.items
        }).
        success(function(data, status){
            $scope.envios = data;
            console.log(data);
            $scope.nombre = "";
            $scope.email = "";
            $scope.asunto = "";
            $scope.telefono="";
            $scope.comentario = "";
            $scope.success = "Se envió el correo correctamente";
             swal("Se guardó correctamente!", "Presiona en el botón Ok, para continuar!", "success")

              console.log($scope.liq.fecha);
             var dia = $scope.liq.fecha.substr(0,2);
             var mes = $scope.liq.fecha.substr(3,2);
             var ano = $scope.liq.fecha.substr(6,4);
             console.log(dia);
             console.log(mes);
             console.log(ano);
             var dfecha = ano+'-'+mes+'-'+dia;
             console.log('sdsd');
            console.log($scope.idoperador);
                $http({
                    method: 'GET',
                    url: '/liquidacion/dashboard/buscarliquidacion',
                    params:{fecha: dfecha, salida : $scope.liq.salida, operador : $scope.idoperador},
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                 
                }).
                success(function(data, status){
                    $scope.items = data;
                    console.log($scope.items);
                     idevento : 'lupa'
                    
                    $scope.success = "Se envió el correo correctamente";
                   // alert('Se guardó correctamente');
                    //location.reload();
                     //$scope.items = [];
                }).
                error(function(data, status){
                    $scope.data = data || "Falló el envio";
                    $scope.status = status;
                });
            //location.reload();
             //$scope.items = [];
        }).
        error(function(data, status){
            $scope.data = data || "Falló el envio";
            $scope.status = status;
        });
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

