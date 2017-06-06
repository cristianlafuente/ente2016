<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$direccion=utf8_decode($_POST['direccion']);
$telefono=utf8_decode($_POST['telefono']);
$mail=utf8_decode($_POST['mail']);
$web=utf8_decode($_POST['web']);
$latitud=utf8_decode($_POST['latitud']);
$longitud=utf8_decode($_POST['longitud']);

$localidades_id=$_POST["localidades_id"];
//$elegir=utf8_decode($_POST['elegir']);

//fin de codigo de control de la imagen
$datosid="select MAX(id)+1 as id from datos_contactos";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA ARTICULOS
$insertar="INSERT INTO datos_contactos(id, direccion, telefono, mail, web, latitud, longitud, localidades_id) VALUES ('".$id."', '".$direccion."', '".$telefono."', '".$mail."', '".$web."', '".$latitud."', '".$longitud."', '".$localidades_id."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());


//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listardatcon.php');
//}
 
//mysql_close($db_connection);
		
?>