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
                    
                    <?php echo form_open_multipart('usuario/dashboard/cu_create_usuario','class="form-horizontal"');?>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Usuario: </label>
                            <div class="col-sm-10">
                                <?php echo form_hidden('id', $id);?>
                                <?php echo form_input($cod_usuario); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre: </label>
                            <div class="col-sm-10">
                                <?php echo form_input($nombre); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Perfil: </label>
                            <div class="col-sm-10">
                                <?php echo form_input($permiso); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Clave: </label>
                            <div class="col-sm-10">
                                <?php echo form_input($clave); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estado: </label>
                            <div class="col-sm-10">
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
                                    <button type="submit" class="btn btn-primary"><?php echo $id == '' ? 'Guardar' : 'Actualizar' ?></button>
                                    <a href="<?php echo base_url().'usuario/dashboard'; ?>" class="btn btn-default">Cancelar</a>
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
            window.location = "<?php echo base_url(); ?>usuario/dashboard/cliente_edit/"+id;
        } else {
            //Cancelado
        }
    }
</script>