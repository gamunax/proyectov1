
<div class="wrapper-md">
    
        
    <div class="col-md-12" id="content-ajax">
        <div class="panel panel-default" id="content">
          <div class="panel-heading"><?php echo $page_title;?></div>

<div class="wrapper-md">
    <div class="tab-container">
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

                             <label class="col-sm-1 control-label">RUC/DNI: </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="RUC/DNI:">
                            </div>

                            <div class="col-sm-1">
                                <input type="text" class="form-control" placeholder="Código">
                            </div>

                            <label class="col-sm-1 control-label">Tipo: </label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control">
                            </div>

                            <label class="col-sm-1 control-label">Nombre: </label>
                            <div class="col-sm-5">
                                <?php echo form_input($razonsocial); ?>
                            </div>

                            
                        </div>

                     
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Servicio: </label>
                            <div class="col-sm-3">
                                <?php echo form_input($apepaterno); ?>
                            </div>

            
                            <label class="col-sm-1 control-label">F. Emisión: </label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control">
                            </div>
                            
                             <label class="col-sm-1 control-label">Estado: </label>
                             <div class="col-sm-3">
                                <?php
                                $opciones = array(
                                    '0'  => 'DESACTIVADO',
                                    '1'  => 'ACTIVO',
                                );
                                $st_estado = $estado == '' ? '1': $estado;
                                echo form_dropdown('estado',$opciones,$st_estado,'class="form-control" '); ?>
                            </div>
                       </div>
                        
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Tipo documento: </label>
                            <div class="col-sm-3">
                                    <input type="text" class="form-control" placeholder="Tipo">
                            </div>

                             <label class="col-sm-1 control-label">Documento de Venta: </label>
                            <div class="col-sm-1">
                                    <input type="text" class="form-control" placeholder="Serie">
                            </div>
                            <div class="col-sm-2">
                                     <input type="text" class="form-control" placeholder="Número">
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-success">Agregar</button>
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
        var r = confirm("Desea modificar imagen?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>cliente/dashboard/cliente_edit/"+id;
        } else {
            //Cancelado
        }
    }
</script>
        </div>
    </div>
</div>

<script type="text/javascript">
    function metod_confirm (id) {
        var r = confirm("¿Desea realizar esta operación?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>cliente/dashboard/delete/"+id;
        } else {
            //Cancelado
        }
    }
    function edit(id){
        $("#content-ajax #content").html("");
        $("#content-ajax #content").load("<?php echo base_url(); ?>cliente/dashboard/cliente_edit/"+id);
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }

    function create(){
        $("#content-ajax #content").load("<?php echo base_url(); ?>cliente/dashboard/create_cliente");
        $("#content-ajax").removeClass("hidden");
        $("#content-ajax").addClass("block");
    }

</script>