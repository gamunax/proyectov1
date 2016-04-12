
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
                    
                    <?php echo form_open_multipart('paquete/dashboard/cu_create_paquete','class="form-horizontal"');?>
                        <input id="url" type="hidden" value="<?php echo base_url() ?>">
                        <div class="form-group">
                            
                            

                            <label class="col-sm-1 control-label">Descripción: </label>
                            <div class="col-sm-9">
                                <?php echo form_input($descripcion); ?>
                                    <?php echo form_hidden('id', $id);?>
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
                        <h3><strong>DETALLE:</strong></h3>
                      
                        <div class="form-group">
                                <?php if(isset($tarifas)): ?>
                                <input type="hidden" value="<?php echo count($tarifas); ?>" name="nroItemPaquete" id="nroItemPaquete">
                                <div class="group_inputs">
                                    <?php
                                    $n=1;
                                    foreach($tarifas as $i):
                                        ?>
                                     <input type="hidden" value="<?php echo $i->ID_PAQUETE;?>" name="cid<?php echo $n;?>">
                                     <input type="hidden" value="<?php echo $i->ID_PAQUETE_DET;?>" name="idgen<?php echo $n;?>">
                                      <input type="hidden" value="<?php echo $i->ID_ZONA;?>" name="cidzona<?php echo $n;?>">
                                                <input type="hidden" value="<?php echo $i->ID_TARIFA;?>" name="cidtarifa<?php echo $n;?>">
                                        <div class="form-group col-<?php echo $n; ?>">
                                           
                                            <div class="col-md-2">
                                               
                                               
                                                      <select class="form-control" name="czona<?php echo $n;?>" id="czona<?php echo $n;?>" required>
                                                            <option>Zona</option>
                                                            <?php
                                                            foreach($zonades as $tar):
                                                                    if($tar->ID == $i->ID_ZONA):
                                                                ?>
                                                                <option selected value=<?php echo $tar->ID; ?>><?php echo $tar->DESCRIPCION; ?></option>
                                                                <?php else: ?>
                                                                    <option value=<?php echo $tar->ID; ?>><?php echo $tar->DESCRIPCION;?></option>
                                                                <?php
                                                                    endif;
                                                                endforeach;
                                                            ?>
                                                        </select>
                                                    
                                                    
                                            </div>
                                            <div class="col-md-4">
                                               
                                                  
                                                        
                                                         <select class="form-control changetarifa" name="cc<?php echo $n;?>" id="cc<?php echo $n;?>" required onchange="buscar(<?php echo $n;?>)">
                                                            <option>Seleccione una tarifa</option>
                                                            <?php
                                                            foreach($tarifades as $tar):
                                                                    if($tar->ID == $i->ID_TARIFA):
                                                                ?>
                                                                <option selected value=<?php echo $tar->ID; ?>><?php echo $tar->DESCRIPCION; ?></option>
                                                                <?php else: ?>
                                                                    <option value=<?php echo $tar->ID; ?>><?php echo $tar->DESCRIPCION;?></option>
                                                                <?php
                                                                    endif;
                                                                endforeach;
                                                            ?>
                                                        </select>
                                                    
                                            </div>
                                            <div class="col-md-1">
                                                
                                                    <input type="text" class="form-control" name="ctfbase<?php echo $n;?>" id="ctfbase<?php echo $n;?>" disabled value="<?php echo $i->TFA_BASE;?>">
                                                
                                            </div>
                                            <div class="col-md-1">
                                                
                                                    <input type="text" class="form-control" name="ctfexceso<?php echo $n;?>" id="ctfexceso<?php echo $n;?>" disabled value="<?php echo $i->TFA_EXCESO;?>">
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btn-danger" onclick="javascript:delete_inputs_col(<?php echo $n; ?>);"> Eliminar </button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $n++;
                                    endforeach;
                                    ?>
                                </div>
                                <?php else: ?>
                                <input type="hidden" value="0" name="nroItemPaquete" id="nroItemPaquete">
                                <div class="group_inputs">
                                    <!--<div class="form-group">
                                        <div class="col-md-6">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="ctitulo1" placeholder="Título 1" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-sm-12">
                                                <input type="color" class="form-control" name="ccontenido1" value="" required>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            <?php endif; ?>

                                <div class="form-group">
                                <div class="col-md-12">
                                    <button type="button" onclick="javascript:add_inputs_col();" class="btn btn-success pull-right">Agregar tarifa</button>
                                </div>
                        </div>
                        </div>


                        <div class="form-horizontal">
                            <div class="line line-dashed b-b line-lg pull-in"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary"><?php echo $id == '' ? 'Guardar' : 'Actualizar' ?></button>
                                    <a href="<?php echo base_url().'paquete/dashboard'; ?>" class="btn btn-default">Cancelar</a>
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
            window.location = "<?php echo base_url(); ?>paquete/dashboard/paquete_edit/"+id;
        } else {
            //Cancelado
        }
    }

     function add_inputs_col(){
        var nro = $('#nroItemPaquete').val(),
            nnro = parseInt(nro)+1;
      
        var zona = '<div class="col-md-2">'+
          '<select class="form-control" name="czona'+nnro+'" id="czona'+nnro+'" required>'+
            '<option>Zona</option>'+
            <?php
            foreach($zonades as $tar):
                    if($tar->ID == $tari):
                ?>
                '<option selected value=<?php echo $tar->ID; ?>><?php echo $tar->DESCRIPCION; ?></option>'+
                <?php else: ?>
                    '<option value=<?php echo $tar->ID; ?>><?php echo $tar->DESCRIPCION;?></option>'+
                <?php
                    endif;
                endforeach;
            ?>
        '</select>'+
        '</div>';
            
        var tari =  '<div class="col-md-4">'+
             '<select class="form-control changetarifa" name="cc'+nnro+'" id="cc'+nnro+'" required onchange="buscar('+nnro+')">'+
            '<option>Seleccione una tarifa</option>'+
                <?php
                foreach($tarifades as $tar):
                        if($tar->ID == $tari):
                    ?>
                    '<option selected value=<?php echo $tar->ID; ?>><?php echo $tar->DESCRIPCION; ?></option>'+
                        <?php else: ?>
                        '<option value=<?php echo $tar->ID; ?>><?php echo $tar->DESCRIPCION;?></option>'+
                    <?php
                        endif;
                    endforeach;
                ?>
            '</select>'+
            '</div>';

         

        var pesobase = '<div class="col-md-1"><input type="text" class="form-control" name="ctfbase'+nnro+'"  id="ctfbase'+nnro+'" placeholder="Peso base" value="" disabled></div>';
        var pesoexceso = '<div class="col-md-1"><input type="text" class="form-control" name="ctfexceso'+nnro+'"  id="ctfexceso'+nnro+'" placeholder="Peso exceso" value="" disabled></div>';
        console.log(tari);
        var action =  '<div class="col-md-2">'+
            '<div class="col-sm-12">'+
            '<button type="button" class="btn btn-danger" onclick="javascript:delete_inputs_col('+nnro+');"> Eliminar </button>'
            '</div>'+
            '</div>';
        var new_input = zona+tari+pesobase+pesoexceso+action;
        $('#tab1 .group_inputs').append('<div class="form-group col-'+nnro+'">'+new_input+'</div>');
        $('#nroItemPaquete').val(nnro);
    }

    function delete_inputs_col(id) {
        //$('.col-' + id).remove();
        $('.col-'+id).css({'position': 'absolute', 'top': '-9999px', 'visibility': 'hidden'});
        $('.col-'+id).append('<input type="hidden" value="1" name="col-del-'+id+'">');
    }

    function buscar(valor){
     console.log(valor);

        $("#cc"+valor+" option:selected").each(function () {
            console.log('entro');
            var idtarifa = $('#cc'+valor).val(),
                urlControllers = $('#url').val()+'paquete/dashboard/tarifamontos/';
              //  console.log('paquete/dashboard/tarifamontos/');
            $.post(urlControllers, { idtar: idtarifa}, function(data){
                console.log(data);
                pos = data.indexOf("|");
                var pbase, pexceso;
                pbase = parseFloat(data.substr(0, pos-1));
                pexceso = parseFloat(data.substr(pos+1));

                $('#ctfbase'+valor).val(pbase);
                $('#ctfexceso'+valor).val(pexceso);
                //$("#provincias").html(data);
                //$("#distritos").html('<option>Seleccion una provincia</option>');
            });
        });
}



    
</script>