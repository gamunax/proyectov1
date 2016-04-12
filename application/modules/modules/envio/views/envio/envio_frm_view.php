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
                    
                    <?php echo form_open_multipart('cliente/dashboard/cu_create_cliente','class="form-horizontal"');?>
                        
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Tipo: </label>
                            <div class="col-sm-3">
                                <?php echo form_hidden('id', $id);?>
                                <?php echo form_input($tipo); ?>
                            </div>

                            <label class="col-sm-1 control-label">RUC/DNI: </label>
                            <div class="col-sm-3">
                                <?php echo form_input($rucdni); ?>
                            </div>

                             <label class="col-sm-1 control-label">Nro: </label>
                            <div class="col-sm-2">
                                <?php echo form_input($nrocliente); ?>
                            </div>
                        </div>

                       <div class="form-group">
                            <label class="col-sm-1 control-label">Razon Social: </label>
                            <div class="col-sm-10">
                                <?php echo form_input($razonsocial); ?>
                            </div>
                  
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Ape. Paterno: </label>
                            <div class="col-sm-3">
                                <?php echo form_input($apepaterno); ?>
                            </div>

            
                            <label class="col-sm-1 control-label">Ape. Materno: </label>
                            <div class="col-sm-3">
                                <?php echo form_input($apematerno); ?>
                            </div>
                      
                            <label class="col-sm-1 control-label">Nombres: </label>
                            <div class="col-sm-3">
                                <?php echo form_input($nombres); ?>
                            </div>
                       </div>


                         <div class="form-group">
                            <label class="col-sm-1 control-label">Dirección: </label>
                            <div class="col-sm-4">
                                <?php echo form_input($direccion); ?>
                            </div>

                            <label class="col-sm-1 control-label">F.Ingreso: </label>
                            <div class="col-sm-4">
                                <?php echo form_input($fechaingreso); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Estado: </label>
                            <div class="col-sm-4">
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
                                    <a href="<?php echo base_url().'cliente/dashboard'; ?>" class="btn btn-default">Cancelar</a>
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
            window.location = "<?php echo base_url(); ?>cliente/dashboard/cliente_edit/"+id;
        } else {
            //Cancelado
        }
    }
</script>