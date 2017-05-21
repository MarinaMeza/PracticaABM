function alta(){
    var datosEnviar = {
        numero: $("#txtNumero").val(),
        descripcion: $("#txtDescripcion").val(),
        pais: $("#txtPais").val(),
        foto: "https://static.pexels.com/photos/104827/cat-pet-animal-domestic-104827.jpeg"//$("#txtFoto").val()
    }
    $.ajax({
        url: "php/alta.php",
        type: "POST",
        data: datosEnviar
    })
}