<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de Categoria de Hoteles";

$_datos="SELECT id, nombre FROM categoria_hoteles order by id DESC";
$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
    <DIV><h1 > <?php echo $e;?></h1></DIV>

    <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-cathot-up.php'> Agregar Nuevo Hotel </a></button>
    <br><br>
    </div>
    <div>
    <table class="table">
<?php

    $registros = mysql_num_rows($consulta);

if ($registros!=""){
 while ($row = mysql_fetch_assoc($consulta)) {
                                               
 echo "<tr><td> <label> Nro: ".$row['id']." - ".$row['nombre']."</label></td>";

 echo "<td><button type='button' class='btn btn-success btn-xs'> <a href='pages-cathot-mod.php?v1=".$row['id']."'> Editar </a></button></td><td><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['id']."&v2=11'> Eliminar </a></button></td></tr>";
}
}
else
{
    echo "<br />Lista vacia de Categoria de Hoteles, por favor ingrese alguno...";

}
 ?>
 	
 </table></div>