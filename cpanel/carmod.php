<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del articulo
$_valor1=($_GET['v1']);
$nombre=utf8_decode($_POST['nombre']);
$tipo_id=$_POST["tipo"];
$fmodificacion=date("Y-m-d H:i:s");


//SE PROCEDE A REALIZAR LA MODIFICACION EN LA TABLA CARACTERISTICAS
$insertar="UPDATE caracteristicas SET nombre='".$nombre."', tipo='".$tipo_id."' where id='".$_valor1."'";

$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se mdoificó con exito";
header('Location:mainindex.php');
//header('Location: listarcar1.php');
		
?>