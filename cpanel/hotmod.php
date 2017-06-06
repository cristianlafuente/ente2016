<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del articulo
$_valor1=($_GET['v1']);
$nombre=utf8_decode($_POST['nombre']);
$estrellas=utf8_decode($_POST['estrellas']);
$booking=utf8_decode($_POST['booking']);
$tripadvisor=utf8_decode($_POST['tripadvisor']);
$ubicacion=utf8_decode($_POST['ubicacion']);
$descripcion=utf8_decode($_POST['descripcion']);
$habitaciones=utf8_decode($_POST['habitaciones']);
$categorias=$_POST['categorias'];
$contactos_id=$_POST["datos_contactos_id"];
$galerias_id=$_POST['galerias_id'];
$archivo=$_FILES['imagen']['name'];
$idiomas_id=$_POST['idiomas_id'];
//FALTA AGREGAR DOS DATOS EL ID Y EL ESTADO=0
$estado=$_POST['estado'];
$fmodificacion=date("Y-m-d H:i:s");



if($archivo==""){
	$consulta="select archivo from hoteles where id='".$_valor1."'";
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
$insertar="UPDATE hoteles SET nombre='".$nombre."' , estrellas='".$estrellas."', booking='".$booking."', tripadvisor='".$tripadvisor."', ubicacion='".$ubicacion."', descripcion='".$descripcion."', habitaciones='".$habitaciones."', categoria_hoteles_id='".$categorias."',datos_contactos_id='".$contactos_id."', galerias_id='".$galerias_id."', estado='".$estado."', fmodificacion='".$fmodificacion."', archivo='".$archivo."', idiomas_id=".$idiomas_id." where id=".$_valor1."";

$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());
//SE DARÁ DE BAJA A TODAS LAS RELACIONES RESTOS-CARACTERISTICAS Y SE CARGARAN NUEVAMENTE
//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA RESTO Y RESTO_CARACTERISTICAS
$borrar1="DELETE FROM hoteles_servicios_hoteles WHERE hoteles_id=".$_valor1;
$retry_value =  mysql_query($borrar1, Db::connect()) or die(mysql_error('No se Pudo eliminar el archivo por mantener FK'));		
echo $borrar1."<br>";

//VERIFICADOR DE CHECKBOX E INSERCION DE RESTO-CARACTERISTICAS
$colores = $_POST['carc'];
foreach($colores as $color){
    $valor = $color;
	$sql_insert = "INSERT INTO hoteles_servicios_hoteles (hoteles_id, servicios_hoteles_id) VALUES ('".$_valor1."' , '". $valor."')";    
	$retry_value =  mysql_query($sql_insert, Db::connect()) or die(mysql_error("Error de insercion en tabla Hoteles y Servicios"));
	echo $sql_insert."<br>";
}


//CREAR LA PAGINA DE LISTAR ARTICULOS

echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listarhot.php');
		
?>