<?php 
session_start();
require_once "js/funciones.js";

$correo=$_POST['correo'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

$retorno;

//if($correo=="" && $clave=="")//hacer
//{			
	if($recordar=="true")
	{
		setcookie("registro",$correo,  time()+36000 , '/');
		
	}else
	{
		setcookie("registro",$correo,  time()-36000 , '/');
		
	}
	
	$_SESSION['registrado']=$correo;
	$retorno=" ingreso";

	
/*}else
{
	$retorno= "No esta";
}*/

echo $retorno;

?>