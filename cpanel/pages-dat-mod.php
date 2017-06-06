<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<?php 
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
require_once '../paginador.php';
require_once '../consulta.php';
require_once "../libreria.php";


$e="Modificación de Contactos";
?>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <!-- Title --> <?php libreria::getlLibreria($e); ?> <!--End HEAR-->
                <script type="text/javascript">
                function salir() 
                { 
                document.location.href="mainindex.php"; 
                } 
            </script>
    </head>
    <body>

    <!-- Start Phone/Email -->  <?php cabecera::getPreCabecera(); ?>    <!-- End Phone/Email -->
    <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Register Box -->
                        <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                        <?php   //ID DEL ARTICULO
                        $_valor1=($_GET['v1']);
                        //valor del idioma por defecto
                        $_valor3=1;
                        $paginador= new paginador();
                        //SE INGRESARÁ EL ID ARTICULO
                        $a_art=$paginador->paginar(consulta::getdevolver(13,"",$_valor1,$_valor3),"0","");
                        foreach($a_art as $articulo):
                        ?>
                           <form class="signup-page" <?php echo "action='datmod.php?v1=".$articulo['id']."'"; ?> enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Modificar Contacto</h2>
                                </div>
                                <label>Direccion <span class="color-red"></label>
                                <input name="direccion" class="form-control margin-bottom-20" type="text" value="<?php echo $articulo['direccion'];?>">
                                <label>Telefono <span class="color-red"></label>
                                <input name="telefono" class="form-control margin-bottom-20" type="textarea" value="<?php echo $articulo['telefono'];?>">
                                <label>Correo <!--<span class="color-red">*</span>--> </label>
                                <input name="mail" class="form-control margin-bottom-20" type="textarea" value="<?php echo $articulo['mail'];?>">
                                <label>Web <!--<span class="color-red">*</span>--> </label>
                                <input name="web" class="form-control margin-bottom-20" type="textarea" value="<?php echo $articulo['web'];?>">
                                <label>Longitud <!--<span class="color-red">*</span>--> </label>
                                <input name="longitud" class="form-control margin-bottom-20" type="textarea" value="<?php echo $articulo['longitud'];?>">
                                <label>Latitud <!--<span class="color-red">*</span>--> </label>
                                <input name="latitud" class="form-control margin-bottom-20" type="textarea" value="<?php echo $articulo['latitud'];?>">
                                <div>
        <!--INSERCION DE LOCALIDAD-->
                                <label>Localidad: <span class="color-red" /></label>
                                <select name="localidades_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM localidades";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                if($articulo['localidades_id']!=$row['id']){
                                                echo '<option value="'.$row[id].'">'.$row[nombre].'</option>';}
                                                else{
                                                echo '<option value="'.$row[id].'" selected>'.$row[nombre].'</option>';    
                                                }
                                         } ?>
                                </select><br /></div>
                                <br>
                                
        <!-- BOTON PARA MODIFICAR EL CONTACTO-->
                                <hr>
                                <div class="row">
                                    <div class="col-md-10 text-left">
                                        <input class="btn btn-primary" type="submit" name="Modificar">
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <input type="button" class="btn btn-danger" name="Cancelar" value="Cancelar" onClick="salir();">
                                    </div>
                                </div>
                            </form>
                        <?php endforeach ?>
                        </div>
                        <!-- End Register Box -->
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <!-- Footer --> <?php cabecera::getfooter(); ?> <!-- End Footer -->
            <!-- JS -->
            <?php libreria::getScripts();?>

    </body>
</html>
<!-- === END FOOTER === -->