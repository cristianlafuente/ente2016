<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

//trae el id del articulo
$_valor1=($_GET['v1']);

$nombre=utf8_decode($_POST['nombre']);
$descripcion=utf8_decode($_POST['descripcion']);
$oculta=$_POST["oculta"];
$archivo=$_FILES['imagen']['name'];
//FALTA AGREGAR DOS DATOS EL ID Y EL ESTADO=0
$estado=$_POST['estado'];
$fmodificacion=date("Y-m-d H:i:s");

if($archivo==""){
	$consulta="select imagen from galerias where id='".$_valor1."'";
	$devuelto=mysql_query($consulta,Db::connect()) or die(mysql_error());
	$row = mysql_fetch_assoc($devuelto);
	$archivo=$row['imagen'];
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

//SE PROCEDE A REALIZAR LA INSERCION EN LA TABLA GALERIAS
$insertar="UPDATE galerias set nombre='".$nombre."', descripcion='".$descripcion."', oculta='".$oculta."', estado='".$estado."', imagen='".$archivo."' where id=".$_valor1;
$retry_value =  mysql_query($insertar, Db::connect()) or die(mysql_error());


//SE DARÁ DE BAJA A TODAS LAS RELACIONES RESTOS-CARACTERISTICAS Y SE CARGARAN NUEVAMENTE
//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA RESTO Y RESTO_CARACTERISTICAS
$borrar1="DELETE FROM galeria_imagen WHERE galerias_id=".$_valor1;
$retry_value =  mysql_query($borrar1, Db::connect()) or die(mysql_error('No se Pudo eliminar el archivo por mantener FK'));		
echo $borrar1."<br>";

//VERIFICADOR DE CHECKBOX E INSERCION DE RESTO-CARACTERISTICAS
$colores = $_POST['carc'];
foreach($colores as $color){
    $valor = $color;
	$sql_insert = "INSERT INTO galeria_imagen (galerias_id, imagenes_id) VALUES ('".$_valor1."' , '". $valor."')";    
	$retry_value =  mysql_query($sql_insert, Db::connect()) or die(mysql_error("Error de insercion en tabla Galerias y Galerias de Imagenes"));
	echo $sql_insert."<br>";
}


//CREAR LA PAGINA DE LISTAR ARTICULOS

echo "<br /> se ingreso con exito";
header('Location:mainindex.php');
//header('Location: listargal.php');
		
?>