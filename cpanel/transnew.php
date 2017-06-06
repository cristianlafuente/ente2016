<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$nombre=utf8_decode($_POST['nombre']);
$contactos_id=$_POST["datos_contactos_id"];
$idiomas_id=$_POST['idiomas_id'];
$transportes_categoria_id=$_POST['categorias_id'];
$estado=0;
$fcreacion=date("Y-m-d H:i:s");
$fmodificacion=date("Y-m-d H:i:s");


//SELECCION DEL NUEVO VALOR DE ID
$datosid="select MAX(id)+1 as id from restos";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA TRANSPORTE
$insertar="INSERT INTO transportes(id, nombre,datos_contactos_id, estado, fcreacion, fmodificacion, idiomas_id, transportes_categoria_id) VALUES ('".$id."', '".$nombre."', '".$contactos_id."', '".$estado."', '".$fcreacion."', '".$fmodificacion."', '".$idiomas_id."', '".$transportes_categoria_id."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error("Error de insercion en tabla resto<br>"));
//if (!$retry_value) { die('Error: ' . mysql_error());}

//VERIFICADOR DE CHECKBOX E INSERCION DE DESTINO-TRANSPORTE
$colores = $_POST['carc'];
foreach($colores as $color){
    $valor = $color;
    //$colores_aux[] = $valor;
	$sql_insert = "INSERT INTO destino_transporte (transportes_id, articulos_id) VALUES ('".$id."' , '". $valor."')";    
	$retry_value =  mysql_query($sql_insert, Db::connect()) or die(mysql_error("Error de insercion en tabla destino-Trans"));
//		echo $sql_insert."<br>";
}
//CREAR LA PAGINA DE LISTAR TRANSPORTE
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listararticulos.php');
//}
 
//mysql_close($db_connection);
		
?>