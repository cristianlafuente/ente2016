<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$nombre=utf8_decode($_POST['nombre']);
//$elegir=utf8_decode($_POST['elegir']);
$fcreacion=date("Y-m-d H:i:s");

//fin de codigo de control de la imagen
$datosid="select MAX(id)+1 as id from restos_categorias";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA ARTICULOS
$insertar="INSERT INTO restos_categorias(id, nombre,fcreacion) VALUES ('".$id."', '".$nombre."', '".$fcreacion."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error("Error de insercion en tabla restos_categorias<br>"));
//if (!$retry_value) { die('Error: ' . mysql_error());}
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listararticulos.php');
//}
 
//mysql_close($db_connection);
		
?>