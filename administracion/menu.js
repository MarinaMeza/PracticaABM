$(document).ready(function(){
    $("#btnAlta").click(function(){
        var datosEnviar = {
            nombre: $("#txtNombre").val(),
            apellido: $("#txtApellido").val(),
            numero: $("#txtNumero").val()
        }

        $.ajax({
            url: "administracion/altaTxt.php",
            type: "POST",
            data: datosEnviar
        })
    })
    $("#btnBorrarTodo").click(function(){
        $.ajax({
            url: "administracion/borrarTodo.php",
            type: "POST"
        })
    })
    $("#get_btn").click(function(){
        $.ajax({
            url: "administracion/mostrar.php",
            type: "POST",
            dataType: "text"
        })
        .done(function(datos){
            $("#salida").html(datos);
        })
    })
})