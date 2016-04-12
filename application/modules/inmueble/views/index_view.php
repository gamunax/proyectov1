
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Inmuebles <?php echo " - ".$idcodinmueble; ?></h1>
</div>
<input id="url" type="hidden" value="<?php echo base_url() ?>">
<div class="wrapper-md">
    <div class="col-md-7 paddingLeft0">
      <div class="panel panel-default">
        <div class="panel-heading">
          Lista de Inmuebles
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
             Buscar: <input id="filter" type="text" class="form-control input-sm w-sm inline m-r"/>

            <a onclick="return create('<?php echo $idcodinmueble;?>');" title="Nuevo" class="btn btn-success">
                <i class="fa fa-plus"></i>
                Nuevo Inmueble
            </a>

            
        </div>
        <div style="margin-bottom: 25px;">
          <table style="font-size:14px;" class=" table-striped table-hover  m-b-none" data-page-size="10" ui-jq="footable" data-filter="#filter" data-page-size="5">
            <thead>
              <tr>
                
                 
                  <th data-toggle="true" style="text-align:center;">
                      Tipo inmueble
                  </th>
                  <th data-toggle="true" style="text-align:center;"> 
                      Titulo
                  </th>
                  <th data-toggle="true" style="text-align:center;"> 
                      Tipo de moneda
                  </th>
                  <th data-toggle="true" style="text-align:center;"> 
                      Precio
                  </th>
                  <th data-toggle="true" style="text-align:center;">
                      Estado
                  </th>
                  <th data-hide="" style="text-align:center;">
                      Acciones
                  </th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($inmuebles_general)): ?>
                <?php foreach ($inmuebles_general as $inmueble) : ?>
                  <tr>
               
                      
                      <td><?php echo $inmueble->destipoinmueble; ?></td>
                      <td><?php echo $inmueble->titulo; ?></td>
                      <td><?php echo $inmueble->idTipoMoneda == 1 ? 'Soles' : 'Dolares'; ?></td>
                      <td><?php echo $inmueble->precio; ?></td>
                      <td data-value="1">
                        <span class="label bg-<?php echo $inmueble->estado == 0 ? 'danger' : 'success'; ?>" title="Active">
                          <?php echo $inmueble->estado == 0 ? 'Anulado' : 'Activo'; ?>
                        </span>
                      </td>
                      
                      <td>


                        <a href="#edit" onclick="edit(<?php echo  $inmueble->idinmueble ?>);"  title="Editar" class="btn btn-default">
                            <i class="fa fa-edit"></i>
                          Editar
                        </a>

                        <?php
                        if($inmueble->estado == '0'){ ?>
                            <a href="#" onclick="return metod_confirm('<?php echo  $inmueble->idinmueble.'/'.$idcodinmueble; ?>/1');" title="Activar" class="btn btn-default">
                                <i class="fa fa-times-circle-o"></i>
                                Activar
                            </a>
                        <?php }else{ ?>
                            <a href="#" onclick="return metod_confirm('<?php echo  $inmueble->idinmueble .'/'.$idcodinmueble; ?>/0');" title="Desactivar" class="btn btn-default">
                                <i class="fa fa-times-circle-o"></i>
                                Anular
                            </a>
                        <?php }?>
                       
                      </td>
                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <li class="list-group-item">
                    No existen Inmuebles
                  </li>
              <?php endif ?>
            </tbody>
            <tfoot class="">
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
    function metod_confirm (id, idventaalquiler ) {
        var r = confirm("¿Desea realizar esta operación?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>inmueble/dashboard/delete/"+id+"/"+idventaalquiler;
        } else {
            //Cancelado
        }
    }
    function edit(id){
        $("#content-ajax #content").html("");
        $("#content-ajax #content").load("<?php echo base_url(); ?>inmueble/dashboard/inmueble_edit/"+id);
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }
    function create(idventaalquiler){
        $("#content-ajax #content").load("<?php echo base_url(); ?>inmueble/dashboard/create_inmueble/"+idventaalquiler);
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }

</script>