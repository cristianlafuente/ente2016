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


$e="Modificación de Tipos de Eventos";
?>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <!-- Title --> <?php libreria::getlLibreria($e); ?>
        <script type="text/javascript">
                function salir() 
                { 
                document.location.href="mainindex.php"; 
                } 
            </script>
        <style>
          .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }</style> <!--End HEAR-->
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
                        <?php   //ID DEL TIPO DE EVENTO
                        $_valor1=($_GET['v1']);
                        //valor del idioma por defecto
                        $_valor3=1;
                        $paginador= new paginador();
                        //SE INGRESARÁ EL ID TIPOS DE EVENTO
                        $a_art=$paginador->paginar(consulta::getdevolver(16,"",$_valor1,$_valor3),"0","");
                        foreach($a_art as $articulo):
                        ?>
                           <form class="signup-page" <?php echo "action='tipevtmod.php?v1=".$articulo['id']."'"; ?> enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Modificar Tipo de Evento</h2>
                                </div>
                                <label>Nombre<span class="color-red"></label>
                                <input name="nombre" class="form-control margin-bottom-20" type="text" value="<?php echo $articulo['nombre'];?>">
                                <br />
                        <!-- BOTON PARA ELEGIR DE ACTIVAR O NO EL TIPO DE EVENTOS-->
                                <div>
                                <?php if($articulo['estado']!=0){
                                    echo "<input type='radio' name='estado' value='0'> Inactivo <input type='radio' name='estado' value='1' checked> Activado";}
                                    else{
                                        echo "<input type='radio' name='estado' value='0' checked> Inactivo <input type='radio' name='estado' value='1'> Activado";
                                    }

                                ?>
                                <!--<input type="radio" name="estado" value="0" > Inactivo<br>
                                <input type="radio" name="estado" value="1" > Activado<br>-->
                                </div><br>
                                
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