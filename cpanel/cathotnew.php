<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$nombre=utf8_decode($_POST['nombre']);
$tipo_id=$_POST["tipo"];

$datosid="select MAX(id)+1 as id from categoria_hoteles";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA ARTICULOS
$insertar="INSERT INTO categoria_hoteles(id, nombre) VALUES ('".$id."', '".$nombre."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listarcathot.php');
	
?>