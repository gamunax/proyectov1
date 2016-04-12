<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Proyectos</h1>
</div>
<div class="wrapper-md">
    <div class="col-md-8 paddingLeft0">
      <div class="panel panel-default">
        <div class="panel-heading">
          Lista de Proyectos
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
                Nuevo Proyecto
            </a>

            
        </div>
        <div style="margin-bottom: 25px;">
          <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="5">
            <thead>
              <tr>
                  <th data-toggle="true">
                      Titulo
                  </th>
                 <th>
                      Prox. Proy?
                  </th>
                  <th>
                      Departamento
                  </th>
                  <th>
                      Provincia
                  </th>
                  <th>
                      Distrito
                  </th>
                  <th>
                      Tipo Moneda
                  </th>
                  <th>
                      Precio
                  </th>
                  <th data-hide="phone">
                      Acciones
                  </th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($proyectos_general)): ?>
                <?php foreach ($proyectos_general as $proyecto) : ?>
                  <tr>
                      <td><?php echo $proyecto->titulo; ?></td>
                      <td><?php echo $proyecto->proximoproyecto == 'checked' ? 'SI' : 'NO'; ?></td>
                      
                      <td><?php echo $proyecto->departamento; ?></td>
                      <td><?php echo $proyecto->provincia; ?></td>
                      <td><?php echo $proyecto->distrito; ?></td>
                      <td><?php echo $proyecto->idTipoMoneda == 1 ? 'Soles' : 'Dolares'; ?></td>
                      <td><?php echo $proyecto->precio; ?></td>
                    
                     <td data-value="1">
                        <span class="label bg-<?php echo $proyecto->estado == 0 ? 'danger' : 'success'; ?>" title="Active">
                          <?php echo $proyecto->estado == 0 ? 'Anulado' : 'Activo'; ?>
                        </span>
                      </td>
                      
                      <td>


                        <a href="#edit" onclick="edit(<?php echo  $proyecto->idinmueble ?>);"  title="Editar" class="btn btn-default">
                            <i class="fa fa-edit"></i>
                          Editar
                        </a>

                        <?php
                        if($proyecto->estado == '0'){ ?>
                            <a href="#" onclick="return metod_confirm('<?php echo  $proyecto->idinmueble; ?>/1');" title="Activar" class="btn btn-default">
                                <i class="fa fa-times-circle-o"></i>
                                Activar
                            </a>
                        <?php }else{ ?>
                            <a href="#" onclick="return metod_confirm('<?php echo  $proyecto->idinmueble; ?>/0');" title="Desactivar" class="btn btn-default">
                                <i class="fa fa-times-circle-o"></i>
                                Anular
                            </a>
                        <?php }?>
                       
                      </td>
                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <li class="list-group-item">
                    No existen proyectos
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
    <div class="col-md-4 paddingRight0 hidden" id="content-ajax">
        <div class="panel panel-default" id="content"></div>
    </div>
</div>

<script type="text/javascript">
    function metod_confirm (id) {
        var r = confirm("¿Desea realizar esta operación?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>proyectos/dashboard/delete/"+id;
        } else {
            //Cancelado
        }
    }
    function edit(id){
        $("#content-ajax #content").html("");
        $("#content-ajax #content").load("<?php echo base_url(); ?>proyectos/dashboard/proyecto_edit/"+id);
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }
    function create(){
        $("#content-ajax #content").load("<?php echo base_url(); ?>proyectos/dashboard/create_proyecto");
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }

</script>