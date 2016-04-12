
<div class="wrapper-md">
    
        
    <div class="col-md-12" id="content-ajax">
        <div class="panel panel-default" id="content">
          <div class="panel-heading"><?php echo $page_title;?></div>

<div class="wrapper-md"  ng-controller="configuracionController" ng-init="open()">
    <div class="tab-container">
      
          
                     
                   <div class="container" style="margin-bottom:10px; margin-left:0px !important;">
                    <div class="row">
                        <div class="col-md-12 " >
                          
                              <label class="col-sm-1 control-label">RUC</label>
                              <input type="hidden" ng-model="config.id">
                              <div class="col-sm-2">
                                  <input type="text" class="form-control" placeholder="ruc:" ng-model="config.ruc" disabled>
                              </div>

                              <label class="col-sm-1 control-label">IGV</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control" placeholder="igv:" ng-model="config.igv">
                              </div>

                          </div>
                        </div>
                      
                    </div>
                     <div class="container" style="margin-left:0px !important;">
                      <div class="row">
                         <div class="col-md-12">
                           
                              
                            <label class="col-sm-1 control-label">Tipo de cambio:</label>
                            <div class="col-sm-2">
                                  <input type="text" class="form-control" placeholder="tipo de cambio" ng-model="config.tipocambio">
                            </div>

                             <label class="col-sm-1 control-label">Tipo de Impresión Sticker:</label>
                            <div class="col-sm-4">
                                 <select name="tipoimp" id="tipoimp" class="form-control" ng-options="tipoimp.CODIGO as tipoimp.DESCRIPCION for tipoimp in configuraciones"
                                  ng-model="config.tipoimp" ng-init="configuracion()">
                                    <option value="">Seleccione tipo de Impresión</option>
                                  </select>

                            </div>
                          

                      
                         </div>

                        </div>
                      </div>
                        <div class="container" style="margin-top:10px; margin-left:0px !important;">
                          <div class="row">
                            <div class="form-group">
                              <button type="button" id="guardar" ng-click="guardar()" data-toggle="" data-target="" class="btn btn-success">Guardar</button>

                            </div>
                          </div>
                        </div>
                 

              

    </div>

</div>



  
</script>
</script>
        </div>
    </div>
</div>

