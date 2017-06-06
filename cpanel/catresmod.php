<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del articulo
$_valor1=($_GET['v1']);
$nombre=utf8_decode($_POST['nombre']);
$fmodificacion=date("Y-m-d H:i:s");

//SE PROCEDE A REALIZAR LA MODIFICACION EN LA TABLA ARTICULOS
$insertar="UPDATE restos_categorias SET nombre='".$nombre."', fcreacion='".$fmodificacion."' where id=".$_valor1."";

$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());
//echo $insertar."<br>";
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listararticulos.php');
		
?>