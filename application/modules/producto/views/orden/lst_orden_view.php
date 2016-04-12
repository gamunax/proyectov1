<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Ordenes</h1>
</div>
<div class="wrapper-md">
    <div class="panel panel-default">
        <div class="panel-heading">

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

        </div>
        <div style="margin-bottom: 25px;">
            <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="5">
                <thead>
                <tr>
                    <th data-toggle="true">
                        Titulo
                    </th>
                    <th data-hide="phone">
                        Acciones
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($orden_lst)): ?>
                    <?php foreach ($orden_lst as $orden) : ?>
                        <tr>
                            <td><?php echo $orden->pag_titulo?></td>
                            <td>
                                <a href="<?php echo base_url().'producto/dashboard/ver_tecnico/'.$orden->pag_id ?>"  title="Editar" class="btn btn-default">
                                    <i class="fa icon-eye"></i>
                                    Ver
                                </a>
                                <!--
                                <a href="#" onclick="return metod_confirm(<?php echo  $orden->pag_id ?>);" title="Eliminar" class="btn btn-danger">
                                    <i class="fa fa-times-circle-o"></i>
                                    Eliminar
                                </a>
                                -->
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <li class="list-group-item">
                        No existen Ordenes
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

<script type="text/javascript">
    function metod_confirm (id) {
        var r = confirm("Desea eliminar Banner?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>producto/collections/delete/"+id;
        } else {
            //Cancelado
        }
    }
</script>