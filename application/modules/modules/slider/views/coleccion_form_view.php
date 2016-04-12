<!--<div class="wrapper-md" ng-controller="FormDemoCtrl">

    <div class="panel panel-default">-->
        <div class="panel-heading font-bold">
            Creación de Banners
        </div>
        <div class="panel-body">


            <?php echo form_open_multipart('slider/collections/create_collections','class="form-horizontal"');?>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nombre (linea 1)</label>
                <div class="col-sm-10">
                    <?php echo form_hidden('idslider', $idslider);?>
                    <?php echo form_hidden('id_dslider', $id_dslider);?>
                    <?php echo form_input($nombre); ?>

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Name (line 1)</label>
                <div class="col-sm-10">
                    <?php echo form_input($name); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nombre 2 (linea 2)</label>
                <div class="col-sm-10">
            
                    <?php echo form_input($nombre2); ?>

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Name 2 (line 2) </label>
                <div class="col-sm-10">
                    <?php echo form_input($name2); ?>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Enlace</label>
                <div class="col-sm-10">
                    <?php echo form_input($enlace); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Ventana</label>
                <div class="col-sm-10">
                    <?php
                    $opciones = array(
                        '0'  => 'NO',
                        '1'  => 'SI',
                    );
                    $st_estado = $estado == '' ? '0': $estado;
                    echo form_dropdown('ventana',$opciones,$st_estado,'class="form-control m-b"');
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                    <?php
                    $opciones = array(
                        '0'  => 'Desactivado',
                        '1'  => 'Activo',
                    );
                    $st_estado = $estado == '' ? '1': $estado;
                    echo form_dropdown('estado',$opciones,$st_estado,'class="form-control m-b"');
                    ?>
                </div>
            </div>



             <div class="form-group">
            <label class="col-sm-2 control-label">Imagen Principal</label>
            <div class="col-sm-10">
                <?php
                if(!empty($img_print)){
                    echo '<img src="'.base_url().'uploads/slider/'.$idslider.'/'.$img_print.'" class="img-responsive" style="margin-bottom:10px">';
                } 
                echo form_input($imagen);?>
            </div>
        </div>

            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="<?php echo base_url().'slider/dashboard/banners/1'; ?>" class="btn btn-default">Cancelar</a>
                </div>
            </div>

            <?php echo form_close();?>
        </div>
    <!--</div>

</div> -->