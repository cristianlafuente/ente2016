<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$nombre=utf8_decode($_POST['nombre']);
$tripadvisor=utf8_decode($_POST['tripadvisor']);
$horario=utf8_decode($_POST['horario']);
$zona=$_POST["zona"];
$contactos_id=$_POST["datos_contactos_id"];
//$galerias_id=utf8_decode($_POST['galerias_id']);
$archivo=$_FILES['imagen']['name'];
$idiomas_id=$_POST['idiomas_id'];
$restos_categorias_id=$_POST['categorias_id'];
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
$datosid="select MAX(id)+1 as id from restos";
$consulta = mysql_query($datosid, Db::connect()) or die(mysql_error());
$row = mysql_fetch_assoc($consulta);
$id=$row['id'];

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA RESTOS
$insertar="INSERT INTO restos(id, nombre,tripadvisor, horario, zonas_id,datos_contactos_id, estado, fcreacion, fmodificacion, archivo, idiomas_id) VALUES ('".$id."', '".$nombre."', '".$tripadvisor."', '".$horario."', '".$zona."', '".$contactos_id."', '".$estado."', '".$fcreacion."', '".$fmodificacion."', '".$archivo."', '".$idiomas_id."')";
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error("Error de insercion en tabla resto<br>"));
//if (!$retry_value) { die('Error: ' . mysql_error());}

//VERIFICADOR DE CHECKBOX E INSERCION DE RESTO-CARACTERISTICAS
$colores = $_POST['carc'];
foreach($colores as $color){
    $valor = $color;
    //$colores_aux[] = $valor;
	$sql_insert = "INSERT INTO RESTOS_CARACTERISTICAS (restos_id, caracteristicas_id) VALUES ('".$id."' , '". $valor."')";    
	$retry_value =  mysql_query($sql_insert, Db::connect()) or die(mysql_error("Error de insercion en tabla resto-carc"));
//		echo $sql_insert."<br>";
}
//VERIFICADOR DE CHECKBOX E INSERCION DE RESTO-CATEGORIAS
	$sql_insert = "INSERT INTO CATEGORIAS_RESTOS (restos_id, restos_categorias_id) VALUES ('".$id."' , '". $restos_categorias_id."')";  
	$retry_value =  mysql_query($sql_insert, Db::connect()) or die(mysql_error("Error de insercion en tabla resto-carc"));

//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listararticulos.php');
//}
 
//mysql_close($db_connection);
		
?>