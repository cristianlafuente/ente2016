<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$nombre=utf8_decode($_POST['nombre']);
$idiomas_id=$_POST["idiomas_id"];

$datosid="select MAX(id)+1 as id from tipos_servicios";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA TIPOS_SERVICIOS
$insertar="INSERT INTO TIPOS_SERVICIOS(id, nombre, idiomas_id) VALUES ('".$id."', '".$nombre."', '".$idiomas_id."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());
//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listartipser.php');
?>