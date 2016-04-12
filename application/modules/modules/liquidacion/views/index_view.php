
<div class="wrapper-md">
    
        
    <div class="col-md-12" id="content-ajax">
        <div class="panel panel-default" id="content">
          <div class="panel-heading"><?php echo $page_title;?></div>

<div class="wrapper-md"  ng-controller="liquidacionController">
    <div class="tab-container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab1" data-toggle="tab"> </a></li>
            <!--< ?php if(!empty($id_producto)): ?>
                <li><a href="#tab2" data-toggle="tab">Imágenes</a></li>
            < ?php endif ?>-->
        </ul>
            <div class="tab-content">

                <div class="tab-pane active" id="tab1">
                    
                   
                        
                        <div class="form-group">

                          <fieldset class="scheduler-border" style="width:118px;float:left;margin-right:20px !important;">
                            <legend class="scheduler-border">Acciones</legend><br>
                            <input type="radio" name="accion" id="accion" border="0" value="A" ng-model="accion" ng-checked="true" checked="checked"  >&nbsp;Asignación<br>
                            <input type="radio" name="accion2" id="accion2" border="0" value="E" ng-model="accion">&nbsp;Entrega<br><!--onclick="checkKey(event,this.name);"-->
                            <input type="radio" name="accion3" id="accion3" border="0" value="M" ng-model="accion">&nbsp;Motivaciones

                          </fieldset>

                          <label for="">Fecha Salida:</label>
                          <input type="text" ng-model="liq.salida" style="width:50px;">
                          <input type="text" ng-model="liq.fecha" datepicker>
                          
                          
                          <label for="">Cod. Operador:</label>
                          
                          <input type="text" ng-model="liq.codoperador" ng-keypress="buscaroperador(liq.codoperador,$event)" style="width:50px;">
                          <input type="text" ng-model="liq.nomoperador"  id="nomoperador" style="width:200px;" disabled>
                          <input type="hidden" ng-model="idope">


                              <a href="" ng-click="clear()" data-toggle="modal" data-target="#myModal"><i class="icon-magnifier icon text-success-lter"></i></a>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                           <!--<button type="button" class="btn btn-success" ng-click="buscarliq()" id="buscar">Buscar</button>-->

                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" ng-click="clear()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Búsqueda de Operadores</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                       <label class="col-sm-1 control-label">Operador: </label>
                                      <div class="col-sm-8">
                                          <input type="text" class="form-control" placeholder="" ng-model="buscar">
                                          
                                      </div>
                                      <div class="col-sm-2">
                                        <button type="button" class="btn btn-success" ng-click="buscaroperador('x',$event)">Buscar</button>
                                      </div>
                                      <table class="table m-b-none table-hover" ui-jq="footable" data-filter="#filter" data-page-size="30">
                                        <thead>
                                          <tr>
                                              <th data-toggle="true">
                                                ID
                                              </th>
                                              <th>
                                                  Codigo
                                              </th>
                                             
                                              <th>
                                                  Apellidos
                                              </th>
                                              <th>
                                                  Nombres
                                              </th>
                                                
                                          </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tr ng-repeat="operador in operadores|filter:buscar">
                                          <td><button type="button" ng-click="sel(operador.ID, operador.COD_OPERADOR, operador.APELLIDOS, operador.NOMBRES) " class="btn btn-success" data-dismiss="modal">{{operador.COD_OPERADOR}}</button></td>
                                          <td>{{operador.ID}}</td>
                                          <td>{{operador.COD_OPERADOR}}</td>
                                          <td>{{operador.APELLIDOS}}</td>
                                          <td>{{operador.NOMBRES}}</td>
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

                         <p></p>
                          <p>
                          <label for="">Remito:</label>
                          <input type="text" id="codbarras" ng-model="liq.codigobarras" ng-keypress="additem(liq.codigobarras, $event, accion)">
                         </p>

                          <p>
                          <button type="button" ng-click="procesar()" class="btn btn-primary {{habi}}">Procesar</button>
                         </p>

                        </div>
                        
                         <table class="table  table-bordered"  >
                           <thead>
                            <tr>

                              <td><strong>Emisión</strong></td>
                              <td><strong>Remito</strong></td>
                              <td><strong>Consignado</strong></td>
                              <td><strong>Dirección</strong></td>
                              <td><strong>Glosa</strong></td>
                              <td><strong>Estado</strong></td>
                              <td><strong>Motivo</strong></td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr ng-repeat="item in items">
                                <td class="{{pintar(item.ESTADO)}}">{{item.EMISION}}</td>
                                <td class="{{pintar(item.ESTADO)}}">{{item.REMITO}}</td>
                                <td class="{{pintar(item.ESTADO)}}">{{item.CONSIGNADO}}</td>
                                <td class="{{pintar(item.ESTADO)}}">{{item.DIRECCION}}</td>
                                <td class="{{pintar(item.ESTADO)}}">{{item.GLOSA}}</td>
                                <td class="{{pintar(item.ESTADO)}}">{{item.ESTADO}}</td>
                                <td class="{{pintar(item.ESTADO)}}">{{item.MOTIVO}}</td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr><th></th></tr>
                           <th>{{items|total}} filas</th>
                           <th  class="info">Asignados: {{getTotalasig()}}</th>
                           <th class="success">Entregados: {{getTotalentr()}}</th>
                           <th class="warning">Motivados:</th>
                           
                         </tfoot> 
                          </table>



                           
                         

                         

                  
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
    //document.getElementById('datePicker').valueAsDate = new Date();
      //document.getElementById('datePicker1').valueAsDate = new Date();

  
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
