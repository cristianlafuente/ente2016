<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del transporte
$_valor1=($_GET['v1']);
$nombre=utf8_decode($_POST['nombre']);
$contactos_id=$_POST["datos_contactos_id"];
$idiomas_id=$_POST['idiomas_id'];
$transportes_categoria_id=$_POST['categorias_id'];
$estado=$_POST['estado'];
$fmodificacion=date("Y-m-d H:i:s");

//SE PROCEDE A REALIZAR LA MODIFICACION EN LA TABLA ARTICULOS
$insertar="UPDATE TRANSPORTES SET nombre='".$nombre."',datos_contactos_id='".$contactos_id."', estado='".$estado."', fmodificacion='".$fmodificacion."', transportes_categoria_id='".$transportes_categoria_id."', idiomas_id=".$idiomas_id." where id=".$_valor1."";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//SE DARÁ DE BAJA A TODAS LAS RELACIONES RESTOS-CARACTERISTICAS Y SE CARGARAN NUEVAMENTE
//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA RESTO Y RESTO_CARACTERISTICAS
$borrar1="DELETE FROM destino_transporte WHERE transportes_id=".$_valor1;
$retry_value =  mysql_query($borrar1, Db::connect()) or die(mysql_error('No se Pudo eliminar el archivo por mantener FK'));		
//VERIFICADOR DE CHECKBOX E INSERCION DE DESTINO-TRANSPORTE
$colores = $_POST['carc'];
foreach($colores as $color){
    $valor = $color;
	$sql_insert = "INSERT INTO DESTINO_TRANSPORTE(transportes_id, articulos_id) VALUES ('".$_valor1."' , '". $valor."')";    
	$retry_value =  mysql_query($sql_insert, Db::connect()) or die(mysql_error("Error de insercion en tabla resto-carc"));
}
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listararticulos.php');
		
?>