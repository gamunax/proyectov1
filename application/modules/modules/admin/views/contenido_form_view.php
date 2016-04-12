<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Contenido</h1>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">

    <div class="panel panel-default">
        <div class="panel-heading font-bold">
            Contenido
        </div>

        <div class="panel-body">

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


            <?php echo form_open_multipart('admin/dashboard/page','class="form-horizontal"');?>

            <div class="form-group">
                <label class="col-sm-2 control-label">Contenido</label>
                <div class="col-sm-10">
                    <?php echo form_hidden('idcontenido', $idcontenido);?>
                    <?php echo form_textarea($contenido); ?>
                </div>
            </div>

            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="<?php echo base_url().'admin/dashboard'; ?>" class="btn btn-default">Cancelar</a>
                </div>
            </div>

            <?php echo form_close();?>
        </div>
    </div>
</div>