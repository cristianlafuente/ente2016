<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$nombre=utf8_decode($_POST['nombre']);
$tipo_id=$_POST["tipo"];
$tipos_servicios_id=$_POST["tipos_servicios_id"];

//fin de codigo de control de la imagen
$datosid="select MAX(id)+1 as id from servicios_hoteles";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA SERVICIOS HOTELES
$insertar="INSERT INTO SERVICIOS_HOTELES(id, nombre, tipos_servicios_id) VALUES ('".$id."', '".$nombre."', '".$tipos_servicios_id."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//CREAR LA PAGINA DE LISTAR SERVICIOS HOTELES
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listarserhot.php');
//}
 
//mysql_close($db_connection);
		
?>