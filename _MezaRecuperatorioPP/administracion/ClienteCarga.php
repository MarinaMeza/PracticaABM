<?php
    require_once "../clases/container.php";
    require_once "../clases/AccesoDatos.php";

    $miContainer = new Container($_POST["nombre"],$_POST["correo"],$_POST["edad"],$_POST["clave"]);
    $miContainer->InsertarContainer();
?>