<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de Restos y Bares";

$_datos="SELECT id, nombre, estado FROM restos order by id DESC";
$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
           <DIV><h1> <?php echo $e;?></h1></DIV>
            <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-res-up.php'> Agregar Nuevo Resto </a></button>
    <br><br>
    </div>
    <div><table class="table">

<?php
 while ($row = mysql_fetch_assoc($consulta)) {
                                               
 echo "<tr><td><label> Nro de Resto:  ".$row['id']." - ".$row['nombre']."     - </label></td>";
 if ($row['estado']==0) echo "<td><button type='button' class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-remove'></span> </button></td>";
 else
 	echo "<td><button type='button' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-ok'></span> </button></td>";

 echo "<td><button type='button' class='btn btn-success btn-xs'> <a href='pages-res-mod.php?v1=".$row['id']."'> Editar </a></button></td><td><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['id']."&v2=6'> Eliminar </a></button></td></tr>";
} 
 ?></table></div>