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