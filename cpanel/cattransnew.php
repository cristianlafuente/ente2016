<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$nombre=utf8_decode($_POST['nombre']);
$fcreacion=date("Y-m-d H:i:s");

$datosid="select MAX(id)+1 as id from transportes_categorias";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA ZONAS
$insertar="INSERT INTO transportes_categorias(id, nombre, fcreacion) VALUES ('".$id."', '".$nombre."', '".$fcreacion."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());
//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listarzonas.php');

?>