<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de Zonas";

$_datos="SELECT id, nombre FROM zonas order by id DESC";
$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
    <DIV><h1 ><?php echo $e;?></h1></DIV>

    <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-zon-up.php'> Agregar Nueva Zona </a></button>
    <br><br>
    </div>
    <div><table class="table">
<?php

    $registros = mysql_num_rows($consulta);

if ($registros!=""){
 while ($row = mysql_fetch_assoc($consulta)) {
                                               
 echo "<tr><td><label> Nro: ".$row['id']." - ".$row['nombre']." -  </label></td>";
 echo "<td><button type='button' class='btn btn-success btn-xs'> <a href='pages-zon-mod.php?v1=".$row['id']."'> Editar </a></button></td><td><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['id']."&v2=7'> Eliminar </a></button></td></tr>";
}
}
else
{
    echo "<br />Lista vacia de Zonas, por favor ingrese alguna...";

}
 ?></table></div>