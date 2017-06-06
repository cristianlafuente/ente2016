<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de Eventos";

$_datos="SELECT id, titulo, copete, contenido, fechaInicio, fechaFin, tipos_eventos_id,idiomas_id, datos_contactos_id, galerias_id, archivo, estado FROM eventos where idiomas_id=1 order by id DESC";
$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
   <DIV><h1> <?php echo $e; ?></h1></DIV>
            <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-evt-up.php'> Agregar Nuevo Evento </a></button>
            <br><br>
            </div>
            <div><table class="table">

<?php
 while ($row = mysql_fetch_assoc($consulta)) {
                                               
 echo "<tr><td><label> Nro de Evt".$row['id']." - ".$row['titulo']."     - </label></td>";
 if ($row['estado']==0) echo "<td><button type='button' class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-remove'></span> </button></td>";
 else
 	echo "<td><button type='button' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-ok'></span> </button></td>";

 echo "<td><button type='button' class='btn btn-success btn-xs'> <a href='pages-evt-mod.php?v1=".$row['id']."'> Editar </a></button></td><td><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['id']."&v2=4'> Eliminar </a></button></td></tr>";
} 
 ?></table></div>