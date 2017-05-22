function alta(){
    var datosEnviar = {
        nombre: $("#txtNombre").val(),
        correo: $("#txtCorreo").val(),
        edad: $("#txtEdad").val(),
        clave: $("#txtClave").val()
    }
    $.ajax({
        url: "administracion/ClienteCarga.php",
        type: "POST",
        data: datosEnviar
    })
    .done(function(datos){
            $("#salida").html(datos);
    });
}


function validar(){
    $.ajax({
        url: "administracion/ValidarCliente.php",
        type: "POST",
        data: {
            correo: $("#ingresoCorreo").val(),
            clave: $("#ingresoClave").val(),
            //recordar: ("#recordarme").val()
        }
    })
}


function mostrar(){
        $.ajax({
            url: "administracion/mostrar.php",
            type: "POST",
            dataType: "text"
        })
        .done(function(datos){
            $("#salida").html(datos);
        });
    
}