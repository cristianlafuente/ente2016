<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$nombre=utf8_decode($_POST['nombre']);
//FALTA AGREGAR DOS DATOS EL ID Y EL ESTADO=0
$estado=0;
//$elegir=utf8_decode($_POST['elegir']);
$fcreacion=date("Y-m-d H:i:s");
$fmodificacion=date("Y-m-d H:i:s");

$datosid="select MAX(id)+1 as id from localidades";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA ARTICULOS
$insertar="INSERT INTO LOCALIDADES(id, nombre, estado, fcreacion) VALUES ('".$id."', '".$nombre."', '".$estado."', '".$fcreacion."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());
//if (!$retry_value) { die('Error: ' . mysql_error());}

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listarlol.php');
//}
 
//mysql_close($db_connection);
		
?>