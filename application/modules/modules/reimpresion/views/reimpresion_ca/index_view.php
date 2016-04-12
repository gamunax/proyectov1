
<div class="wrapper-md">
    
        
    <div class="col-md-12" id="content-ajax">
        <div class="panel panel-default" id="content">
          <div class="panel-heading"><?php echo $page_title;?></div>

<div class="wrapper-md"  ng-controller="reimpresionController">
    <div class="tab-container">
      
          
                     
                   <div class="container" style="margin-bottom:10px;">
                    <div class="row">
                        <div class="col-md-12 " >
                          
                              <label class="col-sm-1 control-label">Emisión</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control" placeholder="Emisión:" ng-model="emision">
                              </div>

                              <label class="col-sm-1 control-label">Salida</label>
                              <div class="col-sm-2">
                                  <input type="text" class="form-control" placeholder="salida:" ng-model="salida">
                              </div>

                          </div>
                        </div>
                      
                    </div>
                     <div class="container">
                      <div class="row">
                         <div class="col-md-12">
                           
                              
                            <label class="col-sm-1 control-label">Desde:</label>
                            <div class="col-sm-2">
                                  <input type="text" class="form-control" placeholder="desde" ng-model="desde">
                            </div>

                             <label class="col-sm-1 control-label">Hasta:</label>
                            <div class="col-sm-2">
                                  <input type="text" class="form-control" placeholder="hasta" ng-model="hasta">
                            </div>
                          

                      
                         </div>

                        </div>
                      </div>
                        <div class="container" style="margin-top:10px;">
                          <div class="row">
                            <div class="form-group">
                              <button type="button" id="imprimir" ng-click="imprimirca()" data-toggle="" data-target="" class="btn btn-success">Imprimir</button>

                            </div>
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
