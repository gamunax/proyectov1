<div class="wrapper-md">
    <script>
 
    </script>
        
    <div class="col-md-12" id="content-ajax">
        <div class="panel panel-default" id="content">
          <div class="panel-heading"><?php echo $page_title;?></div>

<div class="wrapper-md"  ng-controller="envioController">
    <div class="tab-container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab1" data-toggle="tab"> </a></li>
            <!--< ?php if(!empty($id_producto)): ?>
                <li><a href="#tab2" data-toggle="tab">Imágenes</a></li>
            < ?php endif ?>-->
        </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="tab1">
                    
                    <?php echo form_open_multipart('envio/dashboard/cu_create_cliente','class="form-horizontal"');?>
                        
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
                            <label class="col-sm-1 control-label">Servicio: </label>
                            <div class="col-sm-3">
                                <input type="hidden" ng-model="idservicio">
                                 <input type="text" class="form-control" placeholder="Servicio"  id="serv" ng-model="servicio" disabled >
                            </div>
                             <div class="busqueda">
                              <a href="" ng-click="clear()" data-toggle="modal" data-target="#myModalservicio"><i class="icon-magnifier icon text-success-lter"></i></a>
                            </div>

                              <!-- Modal -->
                            <div class="modal fade" id="myModalservicio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" ng-click="clear()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Búsqueda de servicios</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                       <label class="col-sm-1 control-label">Servicio: </label>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control" placeholder="" ng-model="buscar">
                                          
                                      </div>
                                      <div class="col-sm-2">
                                        <button type="button" class="btn btn-success" ng-click="buscarservicio()">Buscar</button>
                                      </div>
                                      <table class="table m-b-none table-hover" ui-jq="footable" data-filter="#filter" data-page-size="5">
                                        <thead>
                                          <tr>
                                              <th data-toggle="true">
                                                ID
                                              </th>
                                              <th>
                                                 Servicio
                                              </th>
                                             
                                              <th>
                                                  Tipo de servicio
                                              </th>
                                              
                                                
                                          </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tr ng-repeat="servicio in servicios|filter:buscar">
                                          <td><button type="button" ng-click="sel_servicio(servicio.ID, servicio.DESCRIPCION) " class="btn btn-success" data-dismiss="modal">{{servicio.ID}}</button></td>
                                          <td>{{servicio.ID}}</td>
                                          <td>{{servicio.DESCRIPCION}}</td>
                                          <td>{{servicio.TIPO_SERVICIO}}</td>
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

            
                            <label class="col-sm-1 control-label">F. Emisión: </label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="datePicker" id="datePicker" disabled>
                            </div>
                            
                           
                             <div class="col-sm-3">
                                 <select class="form-control" ng-init="estado = estado || estados[1];"  
                                ng-model="estado" ng-options="estado.nombre for estado in estados" ng-change="" disabled>
                                 
                                </select>
                            </div>
                       </div>
                        
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Tipo documento: </label>
                            <div class="col-sm-3">
                                <select class="form-control" ng-init="" id="tipdoc" 
                                ng-model="tipodocumento" ng-options="tipodocumento.nombre for tipodocumento in Tipodocumentos" ng-change="">
                                 <option value="">Tipo de documento</option>
                                </select>
                            </div>
                             <div class="busqueda" style="">
                              <a href=""><i class="icon-magnifier icon" style="color:#fff;"></i></a>
                            </div>

                             <label class="col-sm-1 control-label">Documento de Venta: </label>
                            <div class="col-sm-1">
                                    <input type="text" class="form-control" placeholder="Serie" id="serie" ng-model="prefijo">
                            </div>
                            <div class="col-sm-2">
                                     <input type="text" class="form-control" placeholder="Número" id="numero" ng-model="numero">
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <button type="button" id="agregar" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-success">Agregar</button>
                        </div>
                      

                     <table class="table m-b-none table-hover" >
                        <thead>
                            
                                <th>Acción</th>
                                <th>Emisión</th>
                                <th>Remito</th>
                                <th>Consignado</th>
                                <th>Destino</th>
                                <th>Articulo</th>
                                <th>Tarifa</th>
                                <th>Monto Base</th>  
                                <th>Monto Exceso</th>  
                                <th>IGV</th>
                                <th>Precio Venta</th>
                                <th>Direccion de Entrega</th>
                          
                        </thead>
                        <tbody>
                            <tr ng-repeat="(itemIndex,item) in items">
                                <td><button type="button" id="eliminar" class="btn btn-danger" ng-click="removeRow(itemIndex)">Eliminar</button></td>
                                <td></td>
                                <td></td>
                                <td>{{item.consignado}}</td>
                                <td>{{item.destino}}</td>
                                <td>{{item.articulo}}</td>
                                <td>{{item.tarifa}}</td>
                                <td>{{item.montobase}}</td>
                                <td>{{item.montoexceso}}</td>
                                <td>{{item.igv}}</td>
                                <td>{{item.valorventa}}</td>
                                <td>{{item.direccionentrega}}</td>
                            </tr>
                        </tbody>
                        <tfood>
                          <th>
                            {{items|total }} filas                          </th>
                           <th></th> 
                           <th></th>
                           <th></th>
                           <th>
                             <th></th>
                             <th>Totales</th>
                             <th>{{ items|total:'montobase' | number:2}} 
                              <th>{{ items|total:'montoexceso' | number:2}} 
                              <th>{{ items|total:'igv' | number:2}} 
                              <th>{{ items|total:'valorventa' | number:2}} 
                           </th>
                        </tfood>
                    </table>



                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Detalle del remito</h4>
                          </div>
                          <div class="modal-body">
                                <div class="border">

                                      <div class="form-group">
                                       
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="consignado" name="consignado" ng-model="envio.consignado"
                                                   placeholder="Consignado">
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" name="datePicker1" id="datePicker1"  disabled>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                       

                                        
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="destino" ng-change="cargadestino()" name="destino" ng-model="envio.destino"
                                                   placeholder="Destino">
                                              <ul>
                                                <li ng-repeat="destino in destinos">
                                                    <a ng-click="cambiadestino(destino.DESCRIPCION, destino.UBIGEO, destino.ID_DESTINO, destino.ID_ZONA)">
                                                        {{destino.UBIGEO}}-{{destino.DESCRIPCION}}-{{destino.NOM_CIUDAD}}-{{destino.ID_DESTINO}}
                                                    </a>
                                                </li>
                                            </ul>
                                            <input type="hidden" ng-model="ubigeo_terri">
                                            <input type="hidden" ng-model="id_destino">
                                             <input type="hidden" ng-model="id_zona">
                                            </div>

                                             <div class="col-sm-5">
                                            
                                             <div ng-if="existepaquete == 1">
                                              <select name="tari" id="tari" class="form-control"  ng-options="tarifa.ID as tarifa.DESCRIPCION for tarifa in tarifas"
                                                ng-model="envio.tarifa"  ng-change="upd_montos(envio.tarifa)" >
                                                </select>
                                              </div>
                                              
                                               <div ng-if="existepaquete == 0">
                                                 <select name="tari" id="tari" class="form-control"  ng-options="tarifa as tarifa.DESCRIPCION for tarifa in tarifas"
                                                ng-model="envio.tarifa" ng-change="upd_montos2(envio.tarifa.TFA_BASE, envio.tarifa.TFA_EXCESO, envio.tarifa.montoembalaje, envio.tarifa.montootroscobros)" >
                                                <option value="">Seleccione tarifa</option>

                                                </select>
                                              </div>
                                        </div>
                                      </div>

                                        
                                    <div class="form-group">
                                        
                                       
                                        <div class="col-sm-4">
                                           <select name="art" id="art" class="form-control" ng-options="articulo as articulo.DESCRIPCION for articulo in articulos"
                                            ng-model="envio.articulo" ng-init="articulos()">
                                              <option value="">Seleccione articulo</option>
                                            </select>
                                            
                                        </div>
                                        
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="direccion" name="direccion" ng-model="envio.direccionentrega"
                                                   placeholder="Direccion de entrega">
                                        </div>
                                      
                                    </div>

                                   
                                    <div class="form-group">
                                         
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="dni" name="dni" ng-model="envio.dni"
                                                   placeholder="Dni">
                                        </div>
                                        
                                       <div class="col-sm-3">
                                              <input type="text" class="form-control" id="celular" name="celular" ng-model="envio.celular"
                                                     placeholder="Celular">
                                          </div>
                                         
                                    </div>
                                      
                                     <div class="form-group">

                                       <label class="col-sm-1 control-label">Pieza: </label>
                                        <div class="col-sm-2">
                                          
                                           <input type="text" class="form-control" id="piezas" name="piezas" ng-model="envio.piezas"
                                                   placeholder="Nro de piezas">
                                        </div>

                                         <label class="col-sm-1 control-label">Peso real: </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="pesoreal" name="pesoreal" ng-model="envio.pesoreal"
                                                   placeholder="Peso real">
                                        </div>
                                        
                                         <label class="col-sm-1 control-label">Peso exceso: </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="pesoexceso" name="pesoexceso" ng-model="envio.pesoexceso"
                                                   placeholder="Peso exceso">
                                        </div>
                                       
                                      </div>


                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="observacion" name="observacion" ng-model="envio.observacion"
                                                   placeholder="Observación">
                                        </div>

                                    </div>
                                    

                                    <div class="form-group">
                                        
                                        <div class="col-sm-3">
                                            <select name="cargo" id="cargo" class="form-control" ng-options="cargoadjunto as cargoadjunto.nombre for cargoadjunto in cargoadjuntos"
                                            ng-model="envio.cargoadjunto" >
                                              <option value="">Seleccione Cargo Adj</option>
                                            </select>
                                            
                                        </div>
                                         
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="nrocargoadjunto" name="nrocargoadjunto" ng-model="envio.nrocargoadjunto"
                                                   placeholder="Nro C. Adj">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="seriejurada" name="seriejurada" ng-model="envio.seriejurada"
                                                   placeholder="Serie Jur">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="numerojurada" name="numerojurada" ng-model="envio.numerojurada"
                                                   placeholder="Número Jur">
                                        </div>

                                         <div class="col-sm-2">
                                            <input type="text" class="form-control" id="montoarticulo" name="montoarticulo" ng-model="envio.montoarticulo"
                                                   placeholder="Monto Art">
                                        </div>

                                    </div>
                                      
                                </div>
                                    
                                    
                          </div>
                          <h4 class="modal-title" id="myModalLabel" style="padding-left:15px;">Montos</h4>
                          <div class="modal-footer">

                             <div class="form-group">
                                        
                                        <label class="col-sm-1 control-label">Monto Base: </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="montobase" name="montobase" ng-model="envio.montobase" ng-change="upd_montos()"
                                                   placeholder="Monto Base">
                                        </div>
                                        
                                        <label class="col-sm-1 control-label">Monto Exceso: </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="montoexceso" name="montoexceso" ng-model="envio.montoexceso" ng-change="upd_montos()"
                                                   placeholder="Monto Exceso">
                                        </div>
                                        
                                        <label class="col-sm-1 control-label">Monto Embalaje: </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="montoembalaje" name="montoembalaje" ng-model="envio.montoembalaje" ng-change="upd_montos()"
                                                   placeholder="Monto embalaje">
                                        </div>
                                        
                                        <label class="col-sm-1 control-label">Monto Otros: </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="montootroscobros" name="montootroscobros" ng-model="envio.montootroscobros" ng-change="upd_montos()"
                                                   placeholder="Monto Otros cobros">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        
                                        <label class="col-sm-1 control-label">Subtotal: </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="valorventa" name="valorventa" placeholder="Valor venta" ng-model="envio.valorventa" disabled>
                                        </div>
                                        <label class="col-sm-1 control-label">Descuento </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="descuento" name="descuento" placeholder="Descuento" ng-model="envio.descuento" disabled>
                                        </div>
                                        
                                        <label class="col-sm-1 control-label">IGV: </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="igv" name="igv" ng-model="envio.igv" placeholder="IGV" disabled>
                                        </div>
                                        
                                        <label class="col-sm-1 control-label">Total: </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="precioventa" name="precioventa" ng-model="envio.precioventa" placeholder="Precio venta" disabled>
                                        </div>
                                    </div>

                             <button type="button" id="aceptar" ng-click="additem()" class="btn btn-success">Aceptar</button>
                            <button type="button"  class="btn btn-success" data-dismiss="modal" >Close</button>
                          
                          
                          </div>

                        </div>
                      </div>
                    </div>


                        <div class="form-horizontal">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button type="button" ng-click="enviar()" class="btn btn-primary">Guardar</button><label>{{cargando}}</label>
                                    <a href="<?php echo base_url().'cliente/dashboard'; ?>" class="btn btn-default">Cancelar</a>
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
    document.getElementById('datePicker').valueAsDate = new Date();
      document.getElementById('datePicker1').valueAsDate = new Date();

  
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
