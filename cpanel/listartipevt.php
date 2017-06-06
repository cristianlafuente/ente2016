<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de Tipos de Eventos";

$_datos="SELECT id, nombre, estado FROM tipos_eventos order by id DESC";
$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
    <DIV><h1><?php echo $e; ?></h1></DIV>
            <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-tipevt-up.php'> Agregar Nuevo Tipo de Eventos </a></button>
    <br><br>
    </div>
	<div><table class="table">
<?php
 while ($row = mysql_fetch_assoc($consulta)) {
                                               
 echo "<tr><td><label> Nro de Art".$row['id']." - ".$row['nombre']."     - </label></td>";
 if ($row['estado']==0) echo "<td><button type='button' class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-remove'></span> </button></td>";
 else
 	echo "<td><button type='button' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-ok'></span> </button></td>";

 echo "<td><button type='button' class='btn btn-success btn-xs'> <a href='pages-tipevt-mod.php?v1=".$row['id']."'> Editar </a></button></td><td><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['id']."&v2=5'> Eliminar </a></button></td></tr>";
} 
 ?></table></div>