<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de Contactos";

$_datos="SELECT dat.id, dat.direccion, dat.telefono, dat.mail, dat.web, dat.latitud, dat.longitud, l.nombre FROM datos_contactos as dat inner join localidades as l on dat.localidades_id=l.id order by dat.id DESC";
$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
    <DIV><h1> <?php echo $e;?></h1></DIV>
    <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-dat-up.php'> Agregar Nuevo Contacto </a></button>
    <br><br>
    </div>
    <div>
    <table class="table">

<?php
 while ($row = mysql_fetch_assoc($consulta)) {
                                               
 echo "<tr><td> <label> Nro: ".$row['id']; 
        if($row['direccion']!='') {echo " - ".$row['direccion'];}
            else{
                if($row['telefono']){echo " - ".$row['telefono'];}
                else{
                    if($row['mail']){echo " - ".$row['mail'];}
                    else{
                        if ($row['web']) {echo " - ".$row['web'];}
                        else {echo " - ".$row['latitud']." - ".$row['longitud'];}
                        }
                    }
                }
            
 echo " , ".$row['nombre'];
 echo "</label></td>";

 echo "<td><button type='button' class='btn btn-success btn-xs'> <a href='pages-dat-mod.php?v1=".$row['id']."'> Editar </a></button></td><td><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['id']."&v2=2'> Eliminar </a></button></td></tr>";
} 
 ?>
 </table></div>