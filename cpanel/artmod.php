<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del articulo
$_valor1=($_GET['v1']);
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

//$estado=utf8_decode($_POST['estado']);
$estado=$_POST['estado'];
$fmodificacion=date("Y-m-d H:i:s");


//echo $archivo."<br>";

if($archivo==""){
	$consulta="select archivo from articulos where id='".$_valor1."'";
	$devuelto=mysql_query($consulta,Db::connect()) or die(mysql_error());
	$row = mysql_fetch_assoc($devuelto);
	$archivo=$row['archivo'];
}
else{
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
}

//SE PROCEDE A REALIZAR LA MODIFICACION EN LA TABLA ARTICULOS
$insertar="UPDATE ARTICULOS SET titulo='".$titulo."', copete='".$copete."', contenido='".$contenido."', tipo_id='".$tipo_id."', estado='".$estado."', fmodificacion='".$fmodificacion."', idiomas_id='".$idiomas_id."', datos_contactos_id='".$contactos_id."', galerias_id='".$galerias_id."', archivo='".$archivo."', padre_id='".$padre_id."' where id='".$_valor1."'";

$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
//header('Location: listararticulos.php');
header('Location:mainindex.php');
		
?>