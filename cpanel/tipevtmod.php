<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del articulo
$_valor1=($_GET['v1']);
$nombre=utf8_decode($_POST['nombre']);
//$estado=utf8_decode($_POST['estado']);
$estado=$_POST['estado'];
$fmodificacion=date("Y-m-d H:i:s");


//SE PROCEDE A REALIZAR LA MODIFICACION EN LA TABLA TIPOS_EVENTOS
$insertar="UPDATE TIPOS_EVENTOS SET nombre='".$nombre."', estado='".$estado."', fcreacion='".$fmodificacion."' where id='".$_valor1."'";

$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listartipevt.php');
		
?>