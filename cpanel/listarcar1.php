<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de Características de Restaurantes";

$_datos="SELECT id, nombre, tipo FROM caracteristicas order by id DESC";
$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
<DIV ><h1 > <?php echo $e;?></h1></DIV>

    <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-car-up.php'> Agregar Nueva Caracteristicas </a></button>
    <br><br>
    </div>
    <div>
    <table class="table">
<?php

    $registros = mysql_num_rows($consulta);

if ($registros!=""){
 while ($row = mysql_fetch_assoc($consulta)) {
                                               
 echo "<tr> <td><label> Nro: ".$row['id']." - ".$row['nombre']." -  ".$row['tipo']."</label></td>";
 echo "<td><button type='button' class='btn btn-success btn-xs'> <a href='pages-car-mod.php?v1=".$row['id']."'> Editar </a></button></td><td><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['id']."&v2=1'> Eliminar </a></button></td></tr>";
}
}
else
{
    echo "<br />Lista vacia de Caracteristicas de Restaurantes, por favor ingrese alguno...";

}
 ?>
 </table></div>