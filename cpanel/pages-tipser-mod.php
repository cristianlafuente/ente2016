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


$e="Modificación de Tipos de Servicios";
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
                        $a_art=$paginador->paginar(consulta::getdevolver(19,"",$_valor1,$_valor3),"0","");
                        foreach($a_art as $articulo):
                        ?>
                           <form class="signup-page" <?php echo "action='tipsermod.php?v1=".$articulo['id']."'"; ?> enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Modificar Tipo de Servicios</h2>
                                </div>
                                <label>nombre<span class="color-red"></label>
                                <input name="nombre" class="form-control margin-bottom-20" type="text" value="<?php echo $articulo['nombre'];?>">

        <!--INSERCION DEL IDIOMA DEL ARTICULO-->
                                <label>Selecion de Idioma: <span class="color-red" /></label>
                                <select name="idiomas_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM idiomas ";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                            if($articulo['idiomas_id']!=$row['id']){    
                                            echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; }
                                            else{
                                            echo '<option value="'.$row[id].'" selected>'.$row[nombre].'</option>'; 
                                            }

                                      } ?>
                                </select>
                                <br>
                                
        <!-- BOTON PARA MODIFICAR EL ARTICULO-->
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