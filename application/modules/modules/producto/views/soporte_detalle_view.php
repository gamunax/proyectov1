<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Soporte Técnico</h1>
</div>
<div class="wrapper-md">

    <div class="row">
        <div class="col-sm-12">
            <div class="blog-post">
                <a href="<?php echo base_url().'producto/dashboard/tecnico/';?>" title="Nuevo" class="btn btn-info" style="margin-bottom: 10px;">
                    <i class="fa fa-plus"></i>
                    Volver
                </a>

                <div class="panel">
                    <div class="wrapper-lg">
                        <h2 class="m-t-none"><?php echo $titulo; ?></h2>
                        <div>
                            <?php echo $contenido; ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>


</div>

<script type="text/javascript">
    function metod_confirm (id) {
        var r = confirm("Desea eliminar Banner?");
        if (r == true) {
            window.location = "<?php echo base_url(); ?>producto/collections/delete/"+id;
        } else {
            //Cancelado
        }
    }
</script>