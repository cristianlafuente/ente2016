<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$nombre=utf8_decode($_POST['nombre']);
$tipo_id=$_POST["tipo"];

$datosid="select MAX(id)+1 as id from caracteristicas";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA ARTICULOS
$insertar="INSERT INTO caracteristicas(id, nombre, tipo) VALUES ('".$id."', '".$nombre."', '".$tipo_id."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listarcar1.php');
//}
 
//mysql_close($db_connection);
		
?>