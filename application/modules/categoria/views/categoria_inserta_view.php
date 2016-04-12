
<div class="panel-heading"><?php echo $page_title;?></div>

<div class="wrapper-md">
    <div class="tab-container">

        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab1" data-toggle="tab">Descripción </a></li>
            <li><a href="#tab2" data-toggle="tab">Atributos</a></li>
            <li><a href="#tab3" data-toggle="tab">Seo</a></li>
        </ul>

        <?php echo form_open_multipart('categoria/dashboard/cu_categoria');?>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <?php echo form_hidden('idcategoria', $idcategoria);?>
                            <?php echo form_input($nombre); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Descripción</label>
                        <div class="col-sm-10">
                            <?php echo form_textarea($describe); ?>
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

                </div>
            </div>

            <div class="tab-pane" id="tab2">
                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Orden</label>
                        <div class="col-sm-10">
                            <?php echo form_input($orden); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Padre</label>
                        <div class="col-sm-10">
                            <?php
                            echo form_dropdown('idpadre',$padre,$idpadre,'class="form-control m-b"');
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Descripción Corta</label>
                        <div class="col-sm-10">
                            <?php echo form_textarea($desc_corto); ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="tab-pane" id="tab3">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">SEO Titulo</label>
                        <div class="col-sm-10">
                            <?php echo form_input($seo_titulo); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Meta Data</label>
                        <div class="col-sm-10">
                            <?php echo form_textarea($seo_desc); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-horizontal">
                <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="<?php echo base_url().'categoria/dashboard'; ?>" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php echo form_close();?>
    </div>
