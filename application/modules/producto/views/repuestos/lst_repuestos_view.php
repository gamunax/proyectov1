<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Respuestos</h1>
</div>
<div class="wrapper-md">
    <div class="col-md-7 paddingLeft0">
      <div class="panel panel-default">
        <div class="panel-heading">
          Lista de Producto
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


            <a onclick="return create();" title="Nuevo" class="btn btn-success">
                <i class="fa fa-plus"></i>
                Crear Nuevo Producto
            </a>

            <a href="<?php echo base_url().'producto/dashboard/orden'?>" title="Nuevo" class="btn btn-primary">
                <i class="fa icon-eye"></i>
                Ordenes
            </a>

            <a href="<?php echo base_url().'producto/dashboard/cliente'?>" title="Nuevo" class="btn btn-info">
                <i class="fa icon-eye"></i>
                Clientes
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
                  <th>
                      Estado
                  </th>
                  <th data-hide="phone">
                      Acciones
                  </th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($productos_general)): ?>
                <?php foreach ($productos_general as $producto) : ?>
                  <tr>
                      <td><img src="<?php echo base_url().'uploads/producto/'.$producto->prod_id.'/thumbs/'.$producto->prod_img_grande; ?>" style="width: 50px;"></td>
                      <td><?php echo $producto->prod_nombre; ?></td>
                      <td data-value="1">
                        <span class="label bg-<?php echo $producto->prod_estado == 0 ? 'danger' : 'success'; ?>" title="Active">
                          <?php echo $producto->prod_estado == 0 ? 'Desabilitado' : 'Activo'; ?>
                        </span>
                      </td>
                      <td>


                        <a href="#edit" onclick="edit(<?php echo  $producto->prod_id ?>);"  title="Editar" class="btn btn-default">
                            <i class="fa fa-edit"></i>
                          Editar
                        </a>

                        <?php
                        if($producto->prod_estado == '0'){ ?>
                            <a href="#" onclick="return metod_confirm('<?php echo  $producto->prod_id ?>/1');" title="Eliminar" class="btn btn-default">
                                <i class="fa fa-times-circle-o"></i>
                                Activar
                            </a>
                        <?php }else{ ?>
                            <a href="#" onclick="return metod_confirm('<?php echo  $producto->prod_id ?>/0');" title="Eliminar" class="btn btn-default">
                                <i class="fa fa-times-circle-o"></i>
                                Desactivar
                            </a>
                        <?php }?>
                        <a href="#" onclick="return metod_confirm('<?php echo  $producto->prod_id ?>/');" title="Eliminar" class="btn btn-danger">
                            <i class="fa fa-times-circle-o"></i>
                          Eliminar
                        </a>
                      </td>
                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <li class="list-group-item">
                    No existen productos
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
        var r = confirm("Desea Modificar imagen?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>producto/repuestos/delete/"+id;
        } else {
            //Cancelado
        }
    }
    function edit(id){
        $("#content-ajax #content").html("");
        $("#content-ajax #content").load("<?php echo base_url(); ?>producto/repuestos/producto_edit/"+id);
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }
    function create(){
        $("#content-ajax #content").load("<?php echo base_url(); ?>producto/repuestos/create_producto");
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }

</script>