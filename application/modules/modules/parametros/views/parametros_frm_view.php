<div class="panel-heading"><?php echo $page_title;?></div>

<div class="wrapper-md">
    <div class="tab-container">

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


        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab1" data-toggle="tab"> </a></li>
            <!--< ?php if(!empty($id_producto)): ?>
                <li><a href="#tab2" data-toggle="tab">Imágenes</a></li>
            < ?php endif ?>-->
        </ul>


        
            <div class="tab-content">

                <div class="tab-pane active" id="tab1">
                    
                    <?php echo form_open_multipart('parametros/dashboard/cu_create_parametro','class="form-horizontal"');?>
                        
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Tabla: </label>
                            <div class="col-sm-2">

                                <?php echo form_input($tabla); ?>
                                 <?php echo form_hidden('tablaid', $tablaid);?>
                               
                            </div>

                             <label class="col-sm-1 control-label">Codigo: </label>
                            <div class="col-sm-1">
                                <?php echo form_input($codigo); ?>
                               
                            </div>

                            <label class="col-sm-1 control-label">Descripción: </label>
                            <div class="col-sm-6">
                                <?php echo form_input($descripcion); ?>
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Estado: </label>
                            <div class="col-sm-2">
                                <?php
                                $opciones = array(
                                    '0'  => 'DESACTIVADO',
                                    '1'  => 'ACTIVO',
                                );
                                $st_estado = $estado == '' ? '1': $estado;
                                echo form_dropdown('estado',$opciones,$st_estado,'class="form-control m-b" '); ?>
                            </div>
                        </div>



                        <div class="form-horizontal">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">

                                    <button type="submit" class="btn btn-primary"><?php echo $tablaid == '' ? 'Guardar' : 'Actualizar' ?></button>
                                    <a href="<?php echo base_url().'parametros/dashboard'; ?>" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>

            </div>
        

    </div>

</div>

<script type="text/javascript">
    function metod_confirm (id) {
        var r = confirm("Desea modificar el estado?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>articulo/dashboard/articulo_edit/"+id;
        } else {
            //Cancelado
        }
    }
</script>