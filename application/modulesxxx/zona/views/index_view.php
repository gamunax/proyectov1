<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Maestro de Zonas</h1>
</div>
<div class="wrapper-md">
    <div class="col-md-6 paddingLeft0">
      <div class="panel panel-default">
        <div class="panel-heading">
          Listado de Zonas
        </div>
        <div class="panel-body b-b b-light">
            <?php
            $correcto = $this->session->flashdata('message');
            switch ($correcto) {
                case 'update':
                    $texto = "Se ha <strong>ACTUALIZADO</strong> correctamente";
                    break;
                case 'insert':
                    $texto = "Se ha <strong>INSERTADO</strong> correctamente";
                    break;
                case 'error':
                    $texto = "Ocurrio un error intentelo nuevamente";
                    break;
                case 'delete':
                    $texto = "Se ha <strong>ELIMINADO</strong> correctamente";
                    break;
            }
            ?>
            <?php if($correcto === 'error'): ?>
                <!-- Mensaje Error -->
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <?php echo $texto ?>
                </div>
            <?php endif ?>

            <?php if($correcto === 'update' || $correcto === 'insert' || $correcto === 'delete' ): ?>
                <!-- Mensaje correcto -->
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <?php echo $texto ?>
                </div>
            <?php endif ?>
             <!--Buscar: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
            <a href="< ?php echo base_url().'slider/dashboard/'?>"  title="Banner" class="btn btn-primary">
                Banner Colecciones
            </a>-->
            Buscar: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>
           
        
            <a onclick="return create();" title="Nuevo" class="btn btn-success">
                <i class="fa fa-plus"></i>
                Nueva Zona
            </a>

            
        </div>
        <div style="margin-bottom: 25px;">
          <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="5">
            <thead>
              <tr>
                  <th data-toggle="true">
                      Código
                  </th>
                 
                  <th>
                      Descripción
                  </th>
                  <th data-hide="phone">
                      Acciones
                  </th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($zonas_general)): ?>
                <?php foreach ($zonas_general as $zona) : ?>
                  <tr>
                      <td><?php echo $zona->ID; ?></td>
                      
                      <td><?php echo $zona->DESCRIPCION; ?></td>
                      <td data-value="1">
                        <span class="label bg-<?php echo $zona->ESTADO == 0 ? 'danger' : 'success'; ?>" title="Active">
                          <?php echo $zona->ESTADO == 0 ? 'Desabilitado' : 'Activo'; ?>
                        </span>
                      </td>
                      <td>


                        <a href="#edit" onclick="edit(<?php echo  $zona->ID ?>);"  title="Editar" class="btn btn-default">
                            <i class="fa fa-edit"></i>
                          Editar
                        </a>

                        <?php
                        if($tarifa->ESTADO == '0'){ ?>
                            <a href="#" onclick="return metod_confirm('<?php echo  $zona->ID ?>/1');" title="Activar" class="btn btn-default">
                                <i class="fa fa-times-circle-o"></i>
                                Activar
                            </a>
                        <?php }else{ ?>
                            <a href="#" onclick="return metod_confirm('<?php echo  $zona->ID ?>/0');" title="Desactivar" class="btn btn-default">
                                <i class="fa fa-times-circle-o"></i>
                                Desactivar
                            </a>
                        <?php }?>
                       
                      </td>
                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <li class="list-group-item">
                    No existen Zonas
                  </li>
              <?php endif ?>
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
    </div>
    <div class="col-md-6 paddingRight0 hidden" id="content-ajax">
        <div class="panel panel-default" id="content"></div>
    </div>
</div>

<script type="text/javascript">
    function metod_confirm (id) {
        var r = confirm("¿Desea realizar esta operación?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>zona/dashboard/delete/"+id;
        } else {
            //Cancelado
        }
    }
    function edit(id){
        $("#content-ajax #content").html("");
        $("#content-ajax #content").load("<?php echo base_url(); ?>zona/dashboard/zona_edit/"+id);
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }
    function create(){
        $("#content-ajax #content").load("<?php echo base_url(); ?>zona/dashboard/create_zona");
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }

</script>