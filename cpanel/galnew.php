<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$nombre=utf8_decode($_POST['nombre']);
$descripcion=utf8_decode($_POST['descripcion']);
$oculta=$_POST["oculta"];

$archivo=$_FILES['imagen']['name'];
//$padre_id=utf8_decode($_POST['padre_id']);
$padre_id=$_POST["padre_id"];

//FALTA AGREGAR DOS DATOS EL ID Y EL ESTADO=0
$estado=0;
$fcreacion=date("Y-m-d H:i:s");


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
//codigo de subir imagen
// En versiones de PHP anteriores a la 4.1.0, debería utilizarse $HTTP_POST_FILES en lugar de $_FILES.

//if (isset($_FILES['imagen'])){
	
//	$cantidad= count($_FILES["imagen"]["tmp_name"]);
	
//	for ($i=0; $i<$cantidad; $i++){
//	$dir_subida = '../images/';
//	$fichero_subido = $dir_subida . basename($_FILES['imagen']['name'][$i])
	//Comprobamos si el fichero es una imagen
//	if ($_FILES['imagen']['type'][$i]=='image/png' || $_FILES['imagen']['type'][$i]=='image/jpeg'){
	
	//Subimos el fichero al servidor
	//move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], $_FILES["imagen"]["name"][$i]);
//		if(move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $fichero_subido)){
//			echo "El fichero es válido y se subió con éxito.\n";
//				} else {
//    			echo "¡Posible ataque de subida de ficheros!\n";
//				}
//	$validar=true;
//	}
//	else {
//		$validar=false;
//	}
//}
//}print "</pre>";

//fin de codigo de control de la imagen
$datosid="select MAX(id)+1 as id from galerias";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA GALERIAS
$insertar="INSERT INTO GALERIAS(id, nombre, descripcion, oculta, estado, fcreacion, imagen) VALUES ('".$id."', '".$nombre."', '".$descripcion."', '".$oculta."', '".$estado."', '".$fcreacion."', '".$archivo."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());

//VERIFICADOR DE CHECKBOX E INSERCION DE RESTO-CARACTERISTICAS
$colores = $_POST['carc'];
foreach($colores as $color){
    $valor = $color;
	$sql_insert = "INSERT INTO galeria_imagen (galerias_id, imagenes_id) VALUES ('".$id."' , '". $valor."')";    
	$retry_value =  mysql_query($sql_insert, Db::connect()) or die(mysql_error("Error de insercion en tabla Galerias  y Galeria con Imagenes"));
//		echo $sql_insert."<br>";
}



//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listargal.php');		
?>