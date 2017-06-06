<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<?php 
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de ingresos de Transporte";
        error_reporting('0');
?>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <!-- Title --><?php libreria::getlLibreria($e); ?>
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
                            <form class="signup-page" action="resnew.php"  enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Creando Nuevo Transporte</h2>
                                </div>
                                <label>Nombre <span class="color-red"></label>
                                <input name="nombre" class="form-control margin-bottom-20" type="text">
                                <!--<input name="tripadvisor" class="form-control margin-bottom-20" type="text">-->
                                <div>
                                <!--INSERCION DE IDIOMAS-->
                                <label><b>Idioma: <span class="color-red" /></b></label>
                                <select name="idiomas_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM idiomas";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; } ?>
                                </select><br /></div>

                                <!--INSERCION DE CATEGORIAS-->
                                <label><b>Categorias: <span class="color-red" /></b></label>
                                <select name="categorias_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM transportes_categorias";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; } ?>
                                </select><br />



                                <!--EL DATOS DE LOS CONTACTOS DEL ARTICULO-->
                                <DIV>
                                <label><b>Seleccion de Contacto: <span class="color-red" /></b></label>
                                <select name="datos_contactos_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT d.id, CONCAT(d.direccion, ', ', l.nombre)as direccion FROM datos_contactos as d inner join localidades as l on d.localidades_id=l.id ";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row[id].'">'.$row[direccion].'</option>'; } ?>
                                </select></DIV>
                                <HR>
        <!-- AQUI SE ELIGE LOS CHECKBOX DE DESTINOS-->                                
                                <DIV>
                                <label><b>Seleccion de Destinos: <span class="color-red" /></b></label><br>
                                    <?php  
                                    $_datos="SELECT id, titulo FROM articulos where tipo_id=3 and idiomas_id=1";
                                    $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                    while ($row = mysql_fetch_assoc($consulta)) {
                                       echo "<label class='checkbox-inline'>".$row['titulo']."<input type='checkbox' name='carc[]' value='".$row['id']."'/></label>"; } ?>
                                </DIV>
        <!-- BOTON PARA AGREGAR EL TIPO EVENTO-->
                                <hr>
                                <div class="row">
                                    <div class="col-md-10 text-left">
                                        <input class="btn btn-primary" type="submit" name="Aceptar">
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <input type="button" class="btn btn-danger" name="Cancelar" value="Cancelar" onClick="salir();">
                                    </div>
                                </div>
            
                            </form>
                        </div>
                        <!-- End Register Box -->
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <!-- Footer --> <?php cabecera::getfooter(); ?> <!-- End Footer -->
            <!-- JS --><?php libreria::getScripts(); ?>

    </body>
</html>
<!-- === END FOOTER === -->