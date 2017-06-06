<?php 
include_once "../config/config.php";
include_once "../config/Db.php";

$e="Planilla de Articulos";

$_datos="SELECT id, titulo, idiomas_id, estado FROM articulos where idiomas_id=1 order by id DESC";
$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
<!--<div class="col-md-12 col-md-offset-2 col-sm-offset-2">-->
            <DIV><h1> <?php echo $e;?></h1></DIV>

    <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-art-up.php'> Agregar Nuevo Artículo </a></button>
    <br><br>
    </div>
    <table class="table">

<?php
 while ($row = mysql_fetch_assoc($consulta)) {
       /*                                        
 echo "<div> <label> Nro de Art".$row['id']." - ".$row['titulo']."     - </label>";
 if ($row['estado']==0) echo "<button type='button' class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-remove'></span> </button>";
 else
 	echo "<button type='button' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-ok'></span> </button>";

 echo "<button type='button' class='btn btn-success btn-xs'> <a href='pages-art-mod.php?v1=".$row['id']."'> Editar </a></button><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['id']."&v2=0'> Eliminar </a></button></div>";*/
  echo "<tr><td> <label> Nro de Art".$row['id']." - ".$row['titulo']."     - </label></td>";
 if ($row['estado']==0) echo "<td><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove'></span> </button></td>";
 else
 	echo "<td><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok'></span> </button></td>";

 echo "<td><button type='button' class='btn btn-success btn-sm'> <a href='pages-art-mod.php?v1=".$row['id']."'> Editar </a></button></td><td><button type='button' class='btn btn-danger btn-sm'> <a href='baja.php?v1=".$row['id']."&v2=0'> Eliminar </a></button></td></tr>";
} 
 ?>
 </table>
 </div>