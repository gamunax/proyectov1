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
            <li class="active"><a href="#tab1" data-toggle="tab"> Datos </a></li>
            <li class=""><a href="#tab2" data-toggle="tab"> Imagenes </a></li>
            <!--< ?php if(!empty($id_producto)): ?>
                <li><a href="#tab2" data-toggle="tab">Imágenes</a></li>
            < ?php endif ?>-->
        </ul>


         <?php echo form_open_multipart('inmueble/dashboard/cu_create_inmueble','class="form-horizontal"');?>
            <input id="url" type="hidden" value="<?php echo base_url() ?>">
            <div class="tab-content">

                <div class="tab-pane active" id="tab1">
                    <div class="form-horizontal">
                   
                        
                       <!-- <div class="form-group">
                            <label class="col-sm-4 control-label">Código: </label>
                            <div class="col-sm-8">-->
                                <?php echo form_hidden('idinmueble', $idinmueble);?>
                               
                                <?php 
                                
                                echo form_hidden('idcodinmueble', $idcodinmueble);
                                echo form_hidden('idcodinmuebleingles', $idcodinmuebleingles);?>
                                <?php /*echo form_input($codigo); */?>
                            <!--</div>
                        </div>-->

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tipo de Inmueble: </label>
                            <div class="col-sm-8">
                                <?php
                                    echo form_dropdown('idtipoinmueble',$tipoinmueble,$idtipoinmueble,'class="form-control m-b" required="required" style="margin-bottom:0px;"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Titulo: </label>
                            <div class="col-sm-8">
                                <?php echo form_input($titulo); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title: </label>
                            <div class="col-sm-8">
                                <?php echo form_input($title); ?>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-sm-2 control-label">Imagen Principal</label>
                            <div class="col-sm-8">
                              
                            
                                <?php
                                if(!empty($img_print)){
                                    echo '<img src="'.base_url().'uploads/inmueble/'.$idinmueble.'/'.$img_print.'" class="img-responsive" style="margin-bottom:10px; ">';
                                } 
                                echo form_input($imagen1);?>
                            </div>
                        </div>


                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción: </label>
                            <div class="col-sm-8">
                                <?php echo form_textarea($descripcion); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description: </label>
                            <div class="col-sm-8">
                                <?php echo form_textarea($descripcionIngles); ?>
                            </div>
                        </div>


                         <div class="form-group">
                            <label class="col-sm-2 control-label">Tipo de Moneda: </label>
                            <div class="col-sm-8">
                                <?php
                                $opciones = array(
                                    '2'  => 'Dolares',
                                    '1'  => 'Soles',
                                );
                                $st_tipomoneda = $idtipomoneda == '' ? '1': $idtipomoneda;
                                echo form_dropdown('idtipomoneda',$opciones,$st_tipomoneda,'class="form-control m-b" style="margin-bottom:0px;" '); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Precio: </label>
                            <div class="col-sm-8">
                                <?php echo form_input($precioventa); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Caracteristicas: </label>
                            <div class="col-sm-8">
                                <?php
                                    echo form_dropdown('idcaracteristica',$caracteristicas,$idcaracteristica,'class="form-control m-b" required="required" style="margin-bottom:0px;"');
                                ?>
                            </div>
                        </div>


                         <div class="form-group">
                             <label class="col-sm-2 control-label">Departamento: </label>
                            <div class="col-sm-8">
                                
                                    <select class="form-control" name="departamentos" id="departamentos" required>
                                        <option>Selecciona un departamento</option>
                                        <?php
                                        foreach($departamentos as $depa):
                                                if($depa->id == $departamento):
                                            ?>
                                                <option selected value="<?php echo $depa->id; ?>"><?php echo $depa->descripcion; ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo $depa->id; ?>"><?php echo $depa->descripcion;?></option>
                                            <?php
                                                endif;
                                            endforeach;
                                        ?>
                                    </select>
                             </div>   
                        </div>

                         <div class="form-group">
                             <label class="col-sm-2 control-label">Provincia: </label>
                            <div class="col-sm-8">
                                
                                    <select class="form-control" id="provincias" required>
                                         <?php
                                        if($provincias):
                                            foreach($provincias as $prov):
                                                if($prov->id == $provincia):
                                        ?>
                                                <option selected value="<?php echo $prov->id; ?>"><?php echo $prov->descripcion; ?></option>
                                        <?php   else: ?>
                                                <option value="<?php echo $prov->id; ?>"><?php echo $prov->descripcion; ?></option>
                                        <?php
                                                endif;
                                            endforeach;
                                        else:
                                        ?>
                                            <option>Seleccion una provincia</option>
                                        <?php
                                        endif;
                                        ?>
                                    </select>
                            </div>
                                
                        </div>

                         <div class="form-group">
                             <label class="col-sm-2 control-label">Distrito: </label>
                            <div class="col-sm-8">
                                
                                    <select class="form-control" name="distritos" id="distritos" required>
                                        <?php
                                            if($distritos):
                                                foreach($distritos as $dist):
                                                    if($dist->id == $distrito):
                                            ?>
                                                    <option selected value="<?php echo $dist->id; ?>"><?php echo $dist->descripcion; ?></option>
                                            <?php   else: ?>
                                                    <option value="<?php echo $dist->id; ?>"><?php echo $dist->descripcion; ?></option>
                                            <?php
                                                    endif;
                                                endforeach;
                                            else:
                                            ?>
                                                <option>Seleccion una provincia</option>
                                            <?php
                                            endif;
                                            ?>
                                    </select>
                             </div>   
                        </div>

                       

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Dormitorio(s): </label>
                            <div class="col-sm-8">
                                <?php echo form_input($dormitorios); ?>
                            </div>
                        </div>


                         <div class="form-group">
                            <label class="col-sm-2 control-label">Bano(s): </label>
                            <div class="col-sm-8">
                                <?php echo form_input($banos); ?>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-sm-2 control-label">Cochera(s): </label>
                            <div class="col-sm-8">
                                <?php echo form_input($cocheras); ?>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-sm-2 control-label">Area(m2): </label>
                            <div class="col-sm-8">
                                <?php echo form_input($areaconstruida); ?>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estado: </label>
                            <div class="col-sm-8">
                                <?php
                                $opciones = array(
                                    '0'  => 'Anulado',
                                    '1'  => 'Activo',
                                );
                                $st_estado = $estado == '' ? '1': $estado;
                                echo form_dropdown('estado',$opciones,$st_estado,'class="form-control m-b" '); ?>
                            </div>
                        </div>
                     </div>       
                </div>
                <div class="tab-pane" id="tab2">
                     <div class="form-horizontal">

                         <div class="form-group">
                            
                           
                            
                            <div class="col-sm-10 col-md-10 col-lg-6">
                                <label class="">Imagen 2</label>

                                <?php echo form_hidden('idinmueble', $idinmueble);?>
                            
                                <?php
                                if(!empty($img_print2)){
                                    echo '<img src="'.base_url().'uploads/inmueble/'.$idinmueble.'/'.$img_print2.'" class="img-responsive" style="margin-bottom:10px;width:150px;height:125px; ">';
                                } 
                                echo form_input($imagen2);?>
                            </div>    

                            <div class="col-sm-10 col-md-10 col-lg-6" style="margin-bottom:20px;">
                                <label class="">Imagen 3</label>
                                <?php echo form_hidden('idinmueble', $idinmueble);?>
                            
                                <?php
                                if(!empty($img_print3)){
                                    echo '<img src="'.base_url().'uploads/inmueble/'.$idinmueble.'/'.$img_print3.'" class="img-responsive" style="margin-bottom:10px; width:150px;height:125px;">';
                                } 
                                echo form_input($imagen3);?>
                            </div>

                        </div>

                         <div class="form-group">
                            
                            
                            
                            <div class="col-sm-10 col-md-10 col-lg-6">
                                <label class="">Imagen 4</label>
                                <?php echo form_hidden('idinmueble', $idinmueble);?>
                            
                                <?php
                                if(!empty($img_print4)){
                                    echo '<img src="'.base_url().'uploads/inmueble/'.$idinmueble.'/'.$img_print4.'" class="img-responsive" style="margin-bottom:10px;width:150px;height:125px; ">';
                                } 
                                echo form_input($imagen4);?>
                            </div>    

                              <div class="col-sm-10 col-md-10 col-lg-6" style="margin-bottom:20px;">
                                <label class="">Imagen 5</label>
                                <?php echo form_hidden('idinmueble', $idinmueble);?>
                            
                                <?php
                                if(!empty($img_print5)){
                                    echo '<img src="'.base_url().'uploads/inmueble/'.$idinmueble.'/'.$img_print5.'" class="img-responsive" style="margin-bottom:10px; width:150px;height:125px;">';
                                } 
                                echo form_input($imagen5);?>
                            </div>

                        </div>

                         <div class="form-group">
                            
                          
                            
                            <div class="col-sm-10 col-md-10 col-lg-6">
                                <label class="">Imagen 6</label>
                                <?php echo form_hidden('idinmueble', $idinmueble);?>
                            
                                <?php
                                if(!empty($img_print6)){
                                    echo '<img src="'.base_url().'uploads/inmueble/'.$idinmueble.'/'.$img_print6.'" class="img-responsive" style="margin-bottom:10px;width:150px;height:125px; ">';
                                } 
                                echo form_input($imagen6);?>
                            </div>    
                        </div>

                    </div>
                </div>
                 <div class="form-horizontal">
                                <div class="line line-dashed b-b line-lg pull-in"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button type="submit" class="btn btn-primary"><?php echo $idinmueble == '' ? 'Guardar' : 'Actualizar' ?></button>
                                        <a href="<?php echo base_url().'inmueble/dashboard/'.$idcodinmueble; ?>" class="btn btn-default">Cancelar</a>
                                    </div>
                                </div>
                 </div>
            </div>
            <?php echo form_close();?>

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

    $('document').ready(function(){
       console.log('2');
       console.log($('#url').val());

    // SELECT DEPARTAMENTOS
    $("#departamentos").change(function()
    {
          console.log('3');
        $("#departamentos option:selected").each(function () {
            var idDepartamento = $('#departamentos').val(),
                urlControllers = $('#url').val()+'inmueble/dashboard/provincias/';
                console.log($('#url').val()+'inmueble/dashboard/provincias/');
            $.post(urlControllers, { idDepa: idDepartamento}, function(data){
                $("#provincias").html(data);
                $("#distritos").html('<option>Seleccion una provincia</option>');
            });
        });
    })

    // SELECT PROVINCIA
    $("#provincias").on('change',function()
    {
        $("#provincias option:selected").each(function () {
            var idProvincia = $('#provincias').val(),
                urlControllers = $('#url').val()+'inmueble/dashboard/distritos/';
            $.post(urlControllers, { idProv: idProvincia}, function(data){
                $("#distritos").html(data);
            });
        });
    })

});
</script>