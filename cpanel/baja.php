<?php
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";

$_valor1=($_GET['v1']);
$_valor2=($_GET['v2']);
//$titulo=utf8_decode($_POST['titulo']);

switch ($_valor2) {
    		case 0:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA ARTICULOS
			$borrar="DELETE FROM ARTICULOS WHERE ID=".$_valor1; 
			$e3="listararticulos.php";
			break;

    		case 1:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA CARACTERISTICAS
			$borrar="DELETE FROM caracteristicas WHERE ID=".$_valor1; 
			$e3="listarcar1.php";
			//echo "muestra:".$e3;
			break;

			case 2:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA CONTACTOS
			$borrar="DELETE FROM datos_contactos WHERE ID=".$_valor1; 
			$e3="listardatcon.php";
			break;			

			case 3:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA LOCALIDADES
			$borrar="DELETE FROM localidades WHERE ID=".$_valor1; 
			$e3="listarlol.php";
			break;			

			case 4:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA EVENTOS
			$borrar="DELETE FROM eventos WHERE ID=".$_valor1; 
			$e3="listarevt.php";
			break;			

			case 5:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA TIPO DE EVENTOS
			$borrar="DELETE FROM tipos_eventos WHERE ID=".$_valor1; 
			$e3="listartipevt.php";
			break;						

			case 6:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA RESTO Y RESTO_CARACTERISTICAS
			$borrar1="DELETE FROM RESTOS_CARACTERISTICAS WHERE restos_id=".$_valor1;
			$retry_value =  mysql_query($borrar1, Db::connect()) or die(mysql_error('No se Pudo eliminar el archivo por mantener FK'));			
			$borrar="DELETE FROM restos WHERE ID=".$_valor1; 
			$e3="listarest.php";
			break;

			case 7:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA ZONAS
			$borrar="DELETE FROM zonas WHERE ID=".$_valor1; 
			$e3="listarzonas.php";
			break;			

			case 8:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA TIPOS_SERVICIOS
			$borrar="DELETE FROM tipos_servicios WHERE ID=".$_valor1; 
			$e3="listartipser.php";
			break;			

			case 9:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA SERVICIOS_HOTELES
			$borrar="DELETE FROM servicios_hoteles WHERE ID=".$_valor1; 
			$e3="listarserhot.php";
			break;			

			case 10:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA HOTELES Y HOTELES_SERVICIOS
			$borrar1="DELETE FROM hoteles_servicios_hoteles WHERE hoteles_id=".$_valor1;
			$retry_value =  mysql_query($borrar1, Db::connect()) or die(mysql_error('No se Pudo eliminar el archivo por mantener FK'));			
			$borrar="DELETE FROM hoteles WHERE ID=".$_valor1; 
			$e3="listarhot.php";
			break;

			case 11:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA CATEGORIA_HOTELES
			$borrar="DELETE FROM categoria_hoteles WHERE ID=".$_valor1; 
			$e3="listarcathot.php";
			break;		


			case 12:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA GALERIAS Y GALERIA_IMAGEN
			$borrar1="DELETE FROM galeria_imagen WHERE galerias_id=".$_valor1;
			$retry_value =  mysql_query($borrar1, Db::connect()) or die(mysql_error('No se Pudo eliminar el archivo por mantener FK'));	
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA GALERIAS
			$borrar="DELETE FROM galerias WHERE ID=".$_valor1; 
			$e3="listargal.php";
			break;

			case 13:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA RESTO Y RESTO_CATEGORIAS
			$borrar1="DELETE FROM CATEGORIAS_RESTOS WHERE restos_categorias_id=".$_valor1;
			$retry_value =  mysql_query($borrar1, Db::connect()) or die(mysql_error('No se Pudo eliminar el archivo por mantener FK'));
			$borrar="DELETE FROM restos_categorias WHERE ID=".$_valor1; 
			$e3="listarcatres.php";
			break;

			case 14:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA TRANSPORTES Y DESTINO_TRANSPORTE
			$borrar1="DELETE FROM destino_transporte WHERE transportes_id=".$_valor1;
			$retry_value =  mysql_query($borrar1, Db::connect()) or die(mysql_error('No se Pudo eliminar el archivo por mantener FK'));
			$borrar="DELETE FROM transportes WHERE id=".$_valor1; 
			$e3="listarcathot.php";
			break;						

			case 15:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA CATEGORIAS DE TRANSPORTES
			$borrar="DELETE FROM transportes_categorias WHERE id=".$_valor1;
			$e3="listarcattrans.php";
			break;						
			
			case 16:
			//SE PROCEDE A REALIZAR EL BORRADO EN LA TABLA OFERTAS Y CUALQUIER COMBINACION DE LA MISMA
			$borrar1="DELETE FROM RESTOS_OFERTAS WHERE ofertas_id=".$_valor1;
			$borrar2="DELETE FROM TRANSPORTES_OFERTAS WHERE ofertas_id=".$_valor1;
			$borrar3="DELETE FROM HOTELES_OFERTAS WHERE ofertas_id=".$_valor1;
			$retry_value =  mysql_query($borrar1, Db::connect()) or die(mysql_error('No se Pudo eliminar el archivo por mantener FK'));
			$borrar="DELETE FROM OFERTAS WHERE id=".$_valor1; 
			$e3="listaroft.php";
			break;						

}



$retry_value =  mysql_query($borrar, Db::connect()) or die(mysql_error('No se Pudo eliminar el archivo por mantener FK'));
//echo "HOLA funciono";
//CREAR LA PAGINA DE LISTAR ARTICULOS
echo "<br /> se borro con exito";
header('Location:mainindex.php');
//header('Location:'.$e3);
//}
 
//mysql_close($db_connection);
		
?>