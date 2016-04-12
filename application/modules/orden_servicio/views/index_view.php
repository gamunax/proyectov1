<div class="wrapper-md">
    <script>
 
    </script>
        
    <div class="col-md-12" id="content-ajax">
        <div class="panel panel-default" id="content">
          <div class="panel-heading"><?php echo $page_title;?></div>

<div class="wrapper-md"  ng-controller="orden_servicioController">
    <div class="tab-container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab1" data-toggle="tab"> </a></li>
            <!--< ?php if(!empty($id_producto)): ?>
                <li><a href="#tab2" data-toggle="tab">Imágenes</a></li>
            < ?php endif ?>-->
        </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="tab1">
                  <?php echo form_open_multipart('orden_servicio/dashboard/cu_create_cliente','class="form-horizontal"');?>

                  <div class="form-group">
                    
                                
                      <label  class="col-sm-1 control-label" for="fechain">Fecha Inicio</label>      
                      <div class="col-sm-2">
                                <!-- <input type="date" class="form-control" name="datePicker" id="datePicker"> -->
                                <input type="text"  ng-model="fechain" datepicker />
                      </div>
                      <label  class="col-sm-1 control-label" for="fechater">Fecha Final</label>
                      <div class="col-sm-2 ">
                        <input type="text" id="fechater" name="input" ng-model="fechater" datepicker />
                       </div>


                       
                         <!-- <label class="col-sm-1 control-label">Fecha Final</label>
                     
                       <div class="col-sm-2 ">
                           <input type="date" class="form-control" name="datePicker1" id="datePicker1">
                      </div> -->

                      <label class="col-sm-1 control-label">Estado :</label>
                      <div class="col-sm-4">
                                
                                 <select name="estado" id="estado" class="form-control" ng-model="ordenestado">
                                 <option value="">Seleccione Estado</option>
                                 <option value="1">Activo</option>
                                 <option value="0">Inactivo</option>
                                 
                                 </select>
                                                            
                      </div>
                  </div>
                  
                        
                        <div class="form-group">

                             <label class="col-sm-1 control-label">RUC/DNI: </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="RUC/DNI:" ng-model="rucdni"  ng-keypress="buscarcliente(rucdni,$event)">
                            </div>

                            <div class="col-sm-1">
                                <input type="text" class="form-control" placeholder="Código" ng-model="codigo" disabled >
                                 
                            </div>
                            <div class="busqueda">
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
                            <div class="col-sm-1">
                                <input type="text" class="form-control" ng-model="tipocliente" disabled>
                                <input type="hidden" ng-model="cod_tipocliente">
                            </div>

                            <label class="col-sm-1 control-label">Nombre: </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" ng-model="nombre" id="nombre" disabled>
                                <input type="hidden" ng-model="idcliente">
                            </div>

                            
                        </div>

                     
                        
                        
                        
                        <div class="form-group">
                          <!-- <div class="col-sm-3"> -->
       
                            <button type="button" id="busqueda"  ng-click="listaos(fechain,fechater,ordenestado,rucdni)"  class="btn btn-success">Buscar</button>
                          <!-- </div> -->

                            <button type="button" id="agregar" ng-click="clear()"data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-success">Agregar</button>
                        </div>
                      

                     <table class="table m-b-none table-hover" ui-jq="footable" data-filter="#filter" data-page-size="12">
                        <thead>
                                <th>Editar</th>
                                <th>Nro. Orden</th>
                                <th>Razon Social</th>
                                <th>Nro. Clie</th>
                                <th>Fecha Ord.</th>
                                <th>Cantidad</th>
                                <th>Glosa</th>
                                <th>Tipo Servicio</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="orden in ordens">
                              <td><a href="" ng-click="mostrar(orden.ID)" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="icon-eye icon text-success-lter"></i></a></td>
                                <td>{{orden.NRO_ORDEN}}</td>
                                <td>{{orden.RAZON_SOCIAL}}</td>
                                <td>{{orden.NROCLIENTE}}</td>
                                <td>{{orden.FECHA_ORDEN}}</td>
                                <td>{{orden.CANT_ENVIOS}}</td>
                                <td>{{orden.GLOSA}}</td>
                                <td>{{orden.TIPO_SERVICIO}}</td>
                                
                            </tr>
                        </tbody>
                        <tfoot class="hide-if-no-paging">
                          <tr>
                              <td colspan="5" class="text-center">
                                  <ul class="pagination"></ul>
                              </td>
                          </tr>
                        </tfoot>
                    </table>


                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Orden de servicio</h4>
                          </div>
                          <div class="modal-body">
                                <div class="border">

                                    <div class="form-group">
                                       
                                         <input type="hidden" ng-model="os.codid">
                                        <label class="col-sm-1 control-label">Emision: </label>
                                         <div class="col-sm-1">
                                          <input type="text" class="form-control" ng-model="os.emision">
                                        </div>

                                        <label class="col-sm-2 control-label">Numero de Orden: </label>
                                         <div class="col-sm-2">
                                          <input type="text" class="form-control" ng-model="os.norden">
                                        </div>

                                        <label class="col-sm-1 control-label">Fecha: </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" ng-model="os.fechareg" datepicker />
                                        </div>

                                        <label class="col-sm-1 control-label">Estado :</label>
                                        <div class="col-sm-2">
                                
                                       <select name="estado1" id="estado1" class="form-control" ng-model="os.ordenestado">
                                       <option value="">Estado</option>
                                       <option value="1">Activo</option>
                                       <option value="0">Inactivo</option>
                                       
                                       </select>
                                                            
                                       </div>

                                        
                                    </div>

                                  <div class="form-group">
                                       
                                         <label class="col-sm-1 control-label">RUC/DNI: </label>
                                         <div class="col-sm-2">
                                          <input type="text" class="form-control" placeholder="RUC/DNI:" ng-model="os.rucdni">
                                        </div>
                                        <div class="col-sm-1">
                                          <input type="text" class="form-control" placeholder="codigo:" ng-model="os.codigo">
                                        </div>
                                        <label class="col-sm-1 control-label" style="z-index:1;"> Tipo: </label>
                                       <div class="col-sm-2">
                                        <input type="text" class="form-control" ng-model="os.tipocliente" disabled>
                                       
                                        </div>

                                       <label class="col-sm-1 control-label">Nombre: </label>
                                      <div class="col-sm-4">
                                        <input type="text" class="form-control" ng-model="os.nombre" disabled>
                                         <input type="hidden" ng-model="os.idcliente">
                                     </div>
                                  </div>

                                  

                                    <div class="form-group">

                                      <label class="col-sm-1 control-label">Tipo de Servicio :</label>
                                        <div class="col-sm-2">
                                
                                       <select name="tservicio" id="tservicio" class="form-control" ng-model="os.tservicios">
                                       <option value="">Servicio</option>
                                       <option value="L">Local</option>
                                       <option value="N">Nacional</option>
                                       <option value="I">Internacional</option>
                                       
                                       </select>
                                                            
                                       </div>

                                       <label class="col-sm-1 control-label">Cantidad: </label>
                                         <div class="col-sm-2">
                                          <input type="text" class="form-control" ng-model="os.cantidad">
                                        </div>


                                    </div>
                                  <div class="form-group">

                                    <label class="col-sm-1 control-label">GLosa: </label>
                                         <div class="col-sm-11">
                                          <input type="text" class="form-control" ng-model="os.glosa">
                                        </div>

                                  </div> 
                                    
                          </div>
                          <h4 class="modal-title" id="myModalLabel" style="padding-left:15px;">Envios</h4>
                          <div class="modal-footer">

                             <div class="form-group">
                                        
                                       
     
                                        
                              </div>

                                    

                             <!-- <button type="button" id="aceptar" ng-click="additem()" class="btn btn-success">Aceptar</button> -->
                             <button type="button" ng-click="guardar()" class="btn btn-primary">Guardar</button><label>{{cargando}}</label>
                            <button type="button"  class="btn btn-success" data-dismiss="modal" >Cancelar</button>
                          
                          
                          </div>

                        </div>
                      </div>
                    </div>
                      

                       
                    <?php echo form_close();?>
                </div>

            </div>
        

    </div>

</div>

<script type="text/javascript">
    function metod_confirm (id) {
        var r = confirm("Desea modificar imagen?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>cliente/dashboard/cliente_edit/"+id;
        } else {
            //Cancelado
        }
    }
   

  
</script>
</script>
        </div>
    </div>
</div>

<script type="text/javascript">
    function sel (id) {
        
    }
    function edit(id){
        $("#content-ajax #content").html("");
        $("#content-ajax #content").load("<?php echo base_url(); ?>cliente/dashboard/cliente_edit/"+id);
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }

    function create(){
        $("#content-ajax #content").load("<?php echo base_url(); ?>cliente/dashboard/create_cliente");
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }

   

</script>
