<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de Tipos de Servicios";

$_datos="SELECT id, nombre FROM tipos_servicios order by id DESC";
$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
            <DIV><h1><?php echo $e;?></h1></DIV>
            <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-tipser-up.php'> Agregar Nuevo Tipo de Servicios </a></button>
    <br><br>
    </div>
    <div><table class="table">

<?php
 while ($row = mysql_fetch_assoc($consulta)) {
                                               
 echo "<tr><td><label> Nro: ".$row['id']." - ".$row['nombre']."     - </label></td>";
  echo "<td><button type='button' class='btn btn-success btn-xs'> <a href='pages-tipser-mod.php?v1=".$row['id']."'> Editar </a></button></td><td><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['id']."&v2=8'> Eliminar </a></button></td></tr>";
} 
 ?></table></div>