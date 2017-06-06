<?php
require_once '../config/config.php';
require_once '../config/db.php';
require_once '../paginador.php';
require_once '../consulta.php';

$id_category = $_POST['id_category'];
echo "<option value='0'>".$id_category."</option>";

	switch ($id_category) {
    case 1: $_datos="select nombre, id from hoteles"; break;
    case 2: $_datos="select nombre, id from transportes"; break;
    case 3: $_datos="select nombre, id from restos"; break;
    default: $_datos="select titulo, id from articulos"; break;
}

$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
 while ($row = mysql_fetch_assoc($consulta)) {
 	echo "<option value='".$row[id]."'>".$row[nombre]."</option>"; }                                                 
//}
?>

