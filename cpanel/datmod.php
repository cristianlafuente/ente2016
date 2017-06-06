<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del CONTACTO
$_valor1=($_GET['v1']);
$direccion=utf8_decode($_POST['direccion']);
$telefono=utf8_decode($_POST['telefono']);
$mail=utf8_decode($_POST['mail']);
$web=utf8_decode($_POST['web']);
$latitud=utf8_decode($_POST['latitud']);
$longitud=utf8_decode($_POST['longitud']);

$localidades_id=$_POST["localidades_id"];
//SE PROCEDE A REALIZAR LA MODIFICACION EN LA TABLA DATOS CONTACTOS
$insertar="UPDATE datos_contactos SET direccion='".$direccion."', telefono='".$telefono."', mail='".$mail."', web='".$web."', latitud='".$latitud."', longitud='".$longitud."', localidades_id='".$localidades_id."' where id='".$_valor1."'";

$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listardatcon.php');
		
?>