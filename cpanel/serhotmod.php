<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del articulo
$_valor1=($_GET['v1']);
$nombre=utf8_decode($_POST['nombre']);
$tipos_servicios_id=$_POST["tipos_servicios_id"];

//SE PROCEDE A REALIZAR LA MODIFICACION EN LA TABLA SERVICIOS HOTELES
$insertar="UPDATE SERVICIOS_HOTELES SET nombre='".$nombre."', tipos_servicios_id='".$tipos_servicios_id."' where id='".$_valor1."'";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listarserhot.php');
		
?>