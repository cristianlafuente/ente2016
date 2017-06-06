<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$titulo=utf8_decode($_POST['titulo']);
$copete=utf8_decode($_POST['copete']);
$contenido=utf8_decode($_POST['contenido']);
//$tipo_id=utf8_decode($_POST['tipo_id']);
$tipo_id=$_POST["tipo"];
//*$idiomas_id=utf8_decode($_POST['idiomas_id']);
$idiomas_id=$_POST["idiomas_id"];
//$contactos_id=utf8_decode($_POST['datos_contactos_id']);
$contactos_id=$_POST["datos_contactos_id"];
//$galerias_id=utf8_decode($_POST['galerias_id']);
$galerias_id=$_POST["galerias_id"];
//$archivo=utf8_decode($_POST['archivo']);
$archivo=$_FILES['imagen']['name'];
//$padre_id=utf8_decode($_POST['padre_id']);
$padre_id=$_POST["padre_id"];

//FALTA AGREGAR DOS DATOS EL ID Y EL ESTADO=0
$estado=0;
//$elegir=utf8_decode($_POST['elegir']);
$fcreacion=date("Y-m-d H:i:s");
$fmodificacion=date("Y-m-d H:i:s");



//codigo de subir imagen
	// En versiones de PHP anteriores a la 4.1.0, debería utilizarse $HTTP_POST_FILES en lugar de $_FILES.
	$dir_subida = '../images/';
	$fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);

		echo '<pre>';
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
    		echo "El fichero es válido y se subió con éxito.\n";
			} else {
    			echo "¡Posible ataque de subida de ficheros!\n";
			}
		//echo 'Más información de depuración:'; //print_r($_FILES);

		print "</pre>";
//fin de codigo de control de la imagen
$datosid="select MAX(id)+1 as id from articulos";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA ARTICULOS
$insertar="INSERT INTO ARTICULOS(id, titulo, copete, contenido, tipo_id, estado, fcreacion, fmodificacion, idiomas_id, datos_contactos_id, galerias_id, archivo, padre_id) VALUES ('".$id."', '".$titulo."', '".$copete."', '".$contenido."', '".$tipo_id."', '".$estado."', '".$fcreacion."', '".$fmodificacion."', '".$idiomas_id."', '".$contactos_id."', '".$galerias_id."', '".$archivo."', '".$padre_id."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());
//if (!$retry_value) { die('Error: ' . mysql_error());}

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listararticulos.php');
		
?>