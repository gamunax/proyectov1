<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
	<meta charset="UTF-8">
	<title>Reporte x Remito</title>

  <meta name="description" content="Angularjs, Html5, Music, Landing, 4 in 1 ui kits package" />
  <meta name="keywords" content="AngularJS, angular, bootstrap, admin, dashboard, panel, app, charts, components,flat, responsive, layout, kit, ui, route, web, app, widgets" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/paginacion.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/font.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css">
  <script src="http://localhost/assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="http://localhost/assets/admin/bower_components/jquery/dist/jquery-ui.min.js"></script>

<!--   <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/app.css" type="text/css" />
 -->

</head>

<body  ng-controller="reportexremitoController">
	<div class="container">
		 <div class="row">
			<h1 style="text-align:center;">REPORTE POR REMITOS</h1>
			<br><br>
			
			<!-- <div class="col-sm-1 ">
			 	Emisión: 
				 <select class="form-control" ng-init="emision = emision || emisiones[0];" id="tipdoc" 
                ng-model="emision" ng-options="emision.nombre for emision in emisiones" ng-change="">
                 
                </select>
	
			</div> -->
		<div class="form-group">
			<div class="col-sm-4 ">
				<label for="fechain">Fecha Inicio</label>
   				<input type="text"  ng-model="fechain" datepicker />
			</div>
			 
			 <div class="col-sm-4 ">
				 <label for="fechater">Fecha Final</label>
   				 <input type="text" id="fechater" name="input" ng-model="fechater" datepicker />
			</div>

			<div class="col-sm-4">
				        
                 <select name="est" id="est" class="form-control" ng-options="estado as estado.DESCRIPCION for estado in estados"
                  ng-model="reporte.estado" ng-init="estados()">
                 <option value="">Seleccione Estado</option>
                 </select>
                                            
            </div>
            </div>
<br><br>
            <!-- codigo agregado -->
            <?php echo form_open_multipart('reporte/dashboard/cu_create_cliente','class="form-horizontal"');?>

						<div class="form-group">

                             <label class="col-sm-1 control-label">RUC/DNI: </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="RUC/DNI:" ng-model="rucdni"  ng-keypress="buscarcliente(rucdni,$event)">
                            </div>

                            <!-- <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="Código" ng-model="codigo" disabled >
                                 
                            </div> -->
                            <div class="busqueda col-sm-1" >
                              <a href="" ng-click="clear()" data-toggle="modal" data-target="#myModal"><i class="icon-magnifier icon text-success-lter"></i></a>
                            </div>
                           


                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" ng-click="clear()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Búsqueda de clientes</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                       <label class="col-sm-1 control-label">Cliente: </label>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control" placeholder="" ng-model="buscar">
                                          
                                      </div>
                                      <div class="col-sm-2">
                                        <button type="button" class="btn btn-success" ng-click="buscarcliente('x',$event)">Buscar</button>
                                      </div>
                                      <table class="table m-b-none table-hover" ui-jq="footable" data-filter="#filter" data-page-size="5">
                                        <thead>
                                          <tr>
                                              <th data-toggle="true">
                                                ID
                                              </th>
                                              <th>
                                                  RUC/DNI
                                              </th>
                                             
                                              <th>
                                                  Nro cliente
                                              </th>
                                              <th>
                                                  Cliente
                                              </th>
                                                
                                          </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tr ng-repeat="cliente in clientes|filter:buscar">
                                          <td><button type="button" ng-click="sel(cliente.ID, cliente.RAZON_SOCIAL, cliente.TIPO_CLIENTE, cliente.DOCUMENTO, cliente.NROCLIENTE) " class="btn btn-success" data-dismiss="modal">{{cliente.ID}}</button></td>
                                          <td>{{cliente.DOCUMENTO}}</td>
                                          <td>{{cliente.NROCLIENTE}}</td>
                                          <td>{{cliente.RAZON_SOCIAL}}</td>
                                        </tr>
                                        <tfoot></tfoot>
                                      </table>
                                    </div>
                                    

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="clear()">Close</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>

                            <label class="col-sm-1 control-label" style="z-index:1;"> Tipo: </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" ng-model="tipocliente" disabled>
                                <input type="hidden" ng-model="cod_tipocliente">
                            </div>

                            <label class="col-sm-1 control-label">Nombre: </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" ng-model="nombre" disabled>
                                <input type="hidden" ng-model="idcliente">
                            </div>

                            
                        </div>

			<!-- fin de codigo agregado -->
			<br>
			<div class="col-sm-3">
				<!-- <span style="color:#fff;">marmat</span> -->
				<button type="button" id="agregar" data-toggle="modal" ng-click="reportexremito(fechain,fechater, reporte.estado.CODIGO,rucdni)" data-target=".bs-example-modal-lg" class="btn btn-success">Buscar</button>
			</div>
		
		</div>
			<br><br>
			
			<h3>DATOS DEL ENVIO:</h3>
			  <table class="table m-b-none table-hover" ui-jq="footable" data-filter="#filter" data-page-size="5">
				<tr>
					<td><strong>Emision</strong></td>
					<td><strong>Remito</strong></td>
					<td><strong>Fecha Registro</strong></td>
					<td><strong>ID_Cliente</strong></td>
					<td><strong>Nom_Cliente</strong></td>
					<td><strong>NroCliente</strong></td>
					<td><strong>Consignado</strong></td>
					<td><strong>Direccion_Entrega</strong></td>
					<td><strong>Estado</strong></td>
				</tr>
				 <tr ng-repeat="remito in remitos">
				 	<td>{{remito.EMISION}}</td>
				 	<td>{{remito.REMITO}}</td>
				 	<td>{{remito.FECHA_REGISTRO}}</td>
				 	<td>{{remito.ID_CLIENTE}}</td>
				 	<td>{{remito.NOM_CLIENTE}}</td>
				 	<td>{{remito.NROCLIENTE}}</td>
				 	<td>{{remito.CONSIGNADO}}</td>
				 	<td>{{remito.DIRECCION_ENTREGA}}</td>
				 	<td>{{remito.DESCRIPCION}}</td>
				 </tr>
			</table>
			<br><br>
			
		</div>
	</div>
<script src="http://localhost/assets/admin/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/js/angular.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/front.js"></script>




</body>
</html>