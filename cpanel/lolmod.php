<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del articulo
$_valor1=($_GET['v1']);
$nombre=utf8_decode($_POST['nombre']);
$estado=$_POST["estado"];
$fmodificacion=date("Y-m-d H:i:s");


//SE PROCEDE A REALIZAR LA MODIFICACION EN LA TABLA CARACTERISTICAS
$insertar="UPDATE localidades SET nombre='".$nombre."', estado='".$estado."' where id='".$_valor1."'";

$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se mdoificó con exito";
header('Location:mainindex.php');
//header('Location: listarlol.php');
		
?>