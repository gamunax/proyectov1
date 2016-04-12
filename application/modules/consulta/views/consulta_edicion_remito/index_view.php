<div class="wrapper-md">
    <script>
 
    </script>
        
    <div class="col-md-12" id="content-ajax">
        <div class="panel panel-default" id="content">
          <div class="panel-heading"><?php echo $page_title;?></div>

<div class="wrapper-md"  ng-controller="consultaController">
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

                             <label class="col-sm-1 control-label">Emisión: </label>
                            <div class="col-sm-1">
                                 <input type="text" class="form-control" placeholder="emision" ng-model="emision" >
                            </div>
                            
                             
                            <div class="col-sm-1">
                                <input type="text" class="form-control" placeholder="remito" ng-model="remito" >
                                 
                            </div>
                        </div>

                     
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Cliente: </label>
                            <div class="col-sm-2">
                                 <input type="text" class="form-control" placeholder=""  id="" ng-model="ruc" disabled >
                            </div>
                            <div class="col-sm-1">
                                 <input type="text" class="form-control" placeholder=""  id="" ng-model="codigo" disabled >
                            </div>
                            <div class="col-sm-2">
                                 <input type="text" class="form-control" placeholder=""  id="" ng-model="nombre" disabled >
                            </div>
            
                       </div>
                        
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Fecha Manifiesto: </label>
                            <div class="col-sm-1">
                                  <input type="text" class="form-control" placeholder=""  id="" ng-model="fecha" disabled >
                            </div>
                            
                             <label class="col-sm-1 control-label">Ubigeo: </label>
                            <div class="col-sm-2">
                                    <input type="text" class="form-control" placeholder="" id="" ng-model="ubigeo">
                            </div>
                            <label class="col-sm-1 control-label">oficina: </label>
                            <div class="col-sm-2">
                                     <input type="text" class="form-control" placeholder="" id="" ng-model="oficina">
                            </div>
                             <label class="col-sm-1 control-label">Orden Servicio: </label>
                            <div class="col-sm-1">
                                     <input type="text" class="form-control" placeholder="" id="" ng-model="ordenservicio">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-sm-1 control-label">Consignado: </label>
                            <div class="col-sm-2">
                                  <input type="text" class="form-control" placeholder=""  id="" ng-model="consignado" disabled >
                            </div>
                             

                             <label class="col-sm-1 control-label">Direccion Entrega: </label>
                            <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="" id="" ng-model="direccion">
                            </div>
                            <label class="col-sm-1 control-label">DNI: </label>
                            <div class="col-sm-1">
                                     <input type="text" class="form-control" placeholder="" id="" ng-model="dni">
                            </div>
                             <label class="col-sm-1 control-label">Télefono: </label>
                            <div class="col-sm-1">
                                     <input type="text" class="form-control" placeholder="" id="" ng-model="telefono">
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
                                        <input type="hidden" class="form-control" ng-model="emi" disabled>
                                        <input type="hidden" class="form-control" ng-model="rem" disabled>
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
