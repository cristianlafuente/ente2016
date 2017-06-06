<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del articulo
$_valor1=($_GET['v1']);
$nombre=utf8_decode($_POST['nombre']);
//SE PROCEDE A REALIZAR LA MODIFICACION EN LA TABLA ZONAS
$insertar="UPDATE zonas SET nombre='".$nombre."' where id='".$_valor1."'";

$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se mdoificó con exito";
header('Location:mainindex.php');
//header('Location: listarcar1.php');
		
?>