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
                    
                    <?php echo form_open_multipart('orden_operador/dashboard/cu_create_orden_operador','class="form-horizontal"');?>
                         <?php echo form_hidden('id', $id);?> 
                        <div class="form-group">
                             <label class="col-sm-1 control-label">Operador:</label>
                            <div class="col-sm-5">
                                <?php
                                    echo form_dropdown('idoperador',$operador,$idoperador,'class="form-control m-b"  style="margin-bottom:0px;"');
                                ?>
                            </div>
                             <label class="col-sm-1 control-label">Emision: </label>
                            <div class="col-sm-5">
                                <?php echo form_input($emision); ?>
                            </div> 
                        </div>

                        <div class="form-group">
                             <label class="col-sm-1 control-label">Inicio O.S.: </label>
                            <div class="col-sm-5">
                                <?php echo form_input($inios); ?>
                            </div>                  

                            <label class="col-sm-1 control-label">Fin O.S.: </label>
                            <div class="col-sm-5">
                                <?php echo form_input($finos); ?>
                            </div>

                        </div>

                        <div class="form-group">
                             <label class="col-sm-1 control-label">F. Asig: </label>
                            <div class="col-sm-5">
                                <?php echo form_input($fechaasig); ?>
                            </div>               

                            <label class="col-sm-1 control-label">Cantidad: </label>
                            <div class="col-sm-2">
                                <?php echo form_input($cantidad); ?>
                            </div>
                             <label class="col-sm-1 control-label">Consumo: </label>
                            <div class="col-sm-2">
                                <?php echo form_input($consumo); ?>
                            </div>

                        </div>


                        <div class="form-horizontal">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary"><?php echo $id == '' ? 'Guardar' : 'Actualizar' ?></button>
                                    <a href="<?php echo base_url().'orden_operador/dashboard'; ?>" class="btn btn-default">Cancelar</a>
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
        var r = confirm("Desea modificar imagen?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>orden_operador/dashboard/orden_operador_edit/"+id;
        } else {
            //Cancelado
        }
    }
</script>