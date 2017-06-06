<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de Hoteles";

$_datos="SELECT h.id as hotid, h.nombre as hotnombre, h.categoria_hoteles_id, c.id as catid, c.nombre as catnom, h.estado as estado FROM hoteles as h inner join categoria_hoteles as c on h.categoria_hoteles_id=c.id  order by hotid DESC";
$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
    <DIV><h1 > <?php echo $e; ?></h1></DIV>

    <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-hot-up.php'> Agregar Nuevo Hotel </a></button>
    <br><br>
    </div>
    <div><table class="table">

<?php

    $registros = mysql_num_rows($consulta);

if ($registros!=""){
 while ($row = mysql_fetch_assoc($consulta)) {
                                               
 echo "<tr><td><label> Nro: ".$row['hotid']." - ".$row['hotnombre']." -  ".$row['catnom']."</label></td>";
  if ($row['estado']==0) echo "<td><button type='button' class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-remove'></span> </button></td>";
 else
    echo "<td><button type='button' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-ok'></span> </button></td>";
 echo "<td><button type='button' class='btn btn-success btn-xs'> <a href='pages-hot-mod.php?v1=".$row['hotid']."'> Editar </a></button></td><td><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['hotid']."&v2=10'> Eliminar </a></button></td></tr>";
}
}
else
{
    echo "<br />Lista vacia de Hoteles, por favor ingrese alguno...";

}
 ?></table></div>