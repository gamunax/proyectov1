<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Slider</h1>
</div>
<div class="wrapper-md">
    <div class="col-md-7">
      <div class="panel panel-default">
        <div class="panel-heading">
            Listado
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
            <a href="#new" onclick="create(<?php echo $idslider;?>)" title="Nuevo" class="btn btn-success">
                <i class="fa fa-plus"></i>
                Nuevo Banner
            </a>
        </div>
        <div style="margin-bottom: 25px;">
          <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="5">
            <thead>
              <tr>
                  <th data-toggle="true">
                      Imagen
                  </th>
                  <th data-toggle="true">
                      Nombre
                  </th>
                  <th data-toggle="true">
                      Name
                  </th>
                  <th>
                      Estado
                  </th>
                  <th data-hide="phone">
                      Acciones
                  </th>
              </tr>
            </thead>
            <tbody class="searchable">
              <?php if(!empty($slider_collections)): ?>
                <?php foreach ($slider_collections as $slider_colect) : ?>
                  <tr>
                      <td>
                          <img src="<?php echo base_url().'uploads/slider/'.$slider_colect->dslide_idslider.'/'.utf8_encode($slider_colect->dslide_imagen);?>" style="width: 100px;"/>
                      </td>
                      <td><?php echo $slider_colect->dslide_nombre ?></td>
                     <td><?php echo $slider_colect->nombre_ingles ?></td>


                         <td data-value="1">
                        <span class="label bg-<?php echo $slider_colect->dslide_estado == 0 ? 'danger' : 'success'; ?>" title="Active">
                          <?php echo $slider_colect->dslide_estado == 0 ? 'Anulado' : 'Activo'; ?>
                        </span>
                      </td>
                      
                      <td>


                        <a href="#edit" onclick="edit(<?php echo $slider_colect->dslide_id ?>
                          )" title="Editar" class="btn btn-default">
                            <i class="fa fa-edit"></i>
                          Editar
                        </a>

                        <?php
                        if($slider_colect->dslide_estado == '0'){ ?>
                            <a href="#" onclick="return metod_confirm('<?php echo  $slider_colect->dslide_id; ?>/1');" title="Activar" class="btn btn-default">
                                <i class="fa fa-times-circle-o"></i>
                                Activar
                            </a>
                        <?php }else{ ?>
                            <a href="#" onclick="return metod_confirm('<?php echo  $slider_colect->dslide_id; ?>/0');" title="Eliminar" class="btn btn-danger">
                                <i class="fa fa-times-circle-o"></i>
                                Anular
                            </a>
                        <?php }?>
                       
                      </td>
                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <li class="list-group-item">
                    No existen sliders
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
    <div class="col-md-5 paddingRight0 hidden" id="content-ajax">
        <div class="panel panel-default" id="content"></div>
    </div>
</div>

<script type="text/javascript">
    function metod_confirm (id) {
       var r = confirm("¿Desea realizar esta operación?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>slider/collections/delete/"+id;
        } else {
            //Cancelado
        }
    }
    function edit(id){
        $("#content-ajax #content").html("");
        $("#content-ajax #content").load("<?php echo base_url(); ?>slider/collections/edit_collection/"+id);
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }
    function create(id){
        $("#content-ajax #content").html("");
        $("#content-ajax #content").load("<?php echo base_url(); ?>slider/collections/create_collection/"+id);
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }

    


</script>