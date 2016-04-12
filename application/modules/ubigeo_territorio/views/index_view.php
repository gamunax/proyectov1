
<div class="wrapper-md">
    
        
    <div class="col-md-12" id="content-ajax">
        <div class="panel panel-default" id="content">
          <div class="panel-heading"><?php echo $page_title;?></div>

<div class="wrapper-md"  ng-controller="ubigeoController">
    <div class="tab-container">
           

        
                    
Buscar: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
                        
                         <table class="table m-b-none table-hover"  ui-jq="footable" data-filter="#filter" data-page-size="20"  >
                           <thead>
                            <tr>

                              <th data-toggle="true">Nro</th>
                              <th>Ubigeo</th>
                              <th>Descripcion</th>
                              <th>Destino</th>
                              <th>Zona</th>
                              <th>Tipo de Acceso</th>
                              <th>Estado</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr ng-repeat="ubigeo in ubigeos">
                                <td>{{ubigeo.ID}}</td>
                                <td >{{ubigeo.UBIGEO}}</td>
                                <td>{{ubigeo.DESCRIPCION}}</td>
                                <td>{{ubigeo.NOM_DESTINO}}</td>
                                <td>{{ubigeo.NOM_ZONA}}</td>
                                <td>{{ubigeo.NOM_TIPO_ACCESO}}</td>
                                <td>{{ubigeo.ESTADO}}</td>
                                
                                
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
