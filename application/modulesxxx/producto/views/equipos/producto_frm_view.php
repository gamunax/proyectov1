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
            <li class="active"><a href="#tab1" data-toggle="tab">Principal </a></li>
            <!--< ?php if(!empty($id_producto)): ?>
                <li><a href="#tab2" data-toggle="tab">Imágenes</a></li>
            < ?php endif ?>-->
        </ul>


        
            <div class="tab-content">

                <div class="tab-pane active" id="tab1">
                    
                    <?php echo form_open_multipart('producto/equipos/cu_create_producto','class="form-horizontal"');?>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre: </label>
                            <div class="col-sm-10">
                                <?php echo form_hidden('tipo', 'equipos');?>
                                <?php echo form_hidden('id_producto', $id_producto);?>
                                <?php echo form_input($nombre); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Precio: </label>
                            <div class="col-sm-10">
                                <?php echo form_input($precio); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Stock: </label>
                            <div class="col-sm-10">
                                <?php echo form_input($stock); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Imagen Principal</label>
                            <div class="col-sm-10">
                                <?php
                                if(!empty($img_print)){
                                    echo '<img src="'.base_url().'uploads/producto/'.$id_producto.'/thumbs/'.$img_print.'" class="img-responsive" style="margin-bottom:10px">';
                                } 
                                echo form_input($imagen);?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Categoria: </label>
                            <div class="col-sm-10">
                                <?php
                                    echo form_dropdown('idcategoria',$categoria,$idcategoria,'class="form-control m-b" required="required"');
                                ?>
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

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción: </label>
                            <div class="col-sm-10">
                                <?php echo form_textarea($descripcion); ?>
                            </div>
                        </div>

                        <div class="form-horizontal">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary"><?php echo $id_producto == '' ? 'Guardar' : 'Actualizar' ?></button>
                                    <a href="<?php echo base_url().'producto/repuestos'; ?>" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>

                <?php if(!empty($id_producto)): ?>
                    <div class="tab-pane" id="tab2">
                        <?php echo form_open_multipart('producto/repuestos/cu_create_producto_detail','class="form-horizontal"');?>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Estado: </label>
                                <div class="col-sm-10">
                                    <?php 
                                        echo form_hidden('id_producto', $id_producto);
                                        echo form_hidden('id_producto_detail', $id_producto_detail);
                                        $opciones = array(
                                            '0'  => 'DESACTIVADO',
                                            '1'  => 'ACTIVO',
                                        );
                                        $st_estado = $estado_detail == '' ? '1': $estado_detail;
                                        echo form_dropdown('estado',$opciones,$st_estado,'class="form-control m-b"'); 
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Imagen</label>
                                <div class="col-sm-10">
                                    <?php
                                    echo form_input($imagen);?>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button type="submit" class="btn btn-primary">Guardar Imagen</button>
                                        <a href="<?php echo base_url().'producto/repuestos'; ?>" class="btn btn-default">Cancelar</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table m-b-none" ui-jq="footable" data-filter="#filter" data-page-size="5">
                                <thead>
                                    <tr>
                                        <th data-toggle="true">
                                            Nombre
                                        </th>
                                        <th>
                                            Estado
                                        </th>
                                        <th data-hide="phone">
                                            Acciones
                                        </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($productos_detail)): ?>
                                    <?php //print_r($productos_detail) ?>
                                        <?php foreach ($productos_detail as $producto) : ?>
                                            <tr>
                                                
                                                <td><img src="<?php echo base_url() ?>uploads/producto/<?php echo $producto->gale_producto_id.'/'.$producto->gale_imagen_grande ?>" style="  width: 150px;"></td>
                                                <td data-value="1">
                                                    <span class="label bg-<?php echo $producto->gale_estado == 0 ? 'danger' : 'success'; ?>" title="Active">
                                                        <?php echo $producto->gale_estado == 0 ? 'Desabilitado' : 'Activo'; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($producto->gale_estado == '0'){ ?>
                                                        <a href="#" onclick="return metod_confirm('<?php echo  $producto->gale_id."/".$producto->gale_producto_id ?>/1');" title="Eliminar" class="btn btn-default">
                                                            <i class="fa fa-times-circle-o"></i>
                                                            Activar
                                                        </a>
                                                    <?php }else{ ?>
                                                        <a href="#" onclick="return metod_confirm('<?php echo  $producto->gale_id."/".$producto->gale_producto_id ?>/0');" title="Eliminar" class="btn btn-default">
                                                            <i class="fa fa-times-circle-o"></i>
                                                            Desactivar
                                                        </a>
                                                    <?php }?>
                                                    <a href="#" onclick="return metod_confirm('<?php echo  $producto->gale_id."/".$producto->gale_producto_id ?>/');" title="Eliminar" class="btn btn-danger">
                                                        <i class="fa fa-times-circle-o"></i>
                                                        Eliminar
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <li class="list-group-item">
                                            No existen imágenes
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

                        <?php echo form_close();?>
                    </div>
                <?php endif ?>

                
            </div>
        

    </div>

</div>

<script type="text/javascript">
    function metod_confirm (id) {
        var r = confirm("Desea modificar imagen?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>producto/repuestos/delete_detail/"+id;
        } else {
            //Cancelado
        }
    }
</script>