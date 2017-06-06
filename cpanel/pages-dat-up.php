<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de Contactos";
?>
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
                            <form class="signup-page" action="datnew.php"  enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Creando Nuevo Contacto</h2>
                                </div>
                                <label>Direccion<span class="color-red"></label>
                                <input name="direccion" class="form-control margin-bottom-20" type="text">
                                <label>Telefono <span class="color-red"></label>
                                <input name="telefono" class="form-control margin-bottom-20" type="textarea">
                                <label>mail<!--<span class="color-red">*</span>--> </label>
                                <input name="mail" class="form-control margin-bottom-20" type="textarea">
                                <label>web<!--<span class="color-red">*</span>--> </label>
                                <input name="web" class="form-control margin-bottom-20" type="textarea">
                                <div>
                                <label>Latitud<!--<span class="color-red">*</span>--> </label>
                                <input name="latitud" class="form-control margin-bottom-20" type="textarea">
                                <div>
                                <label>Longitud<!--<span class="color-red">*</span>--> </label>
                                <input name="longitud" class="form-control margin-bottom-20" type="textarea">
                                <div>
        <!--INSERCION DEL TIPO DE DATOS CONTACTOS-->
                                <label>Localidad: <span class="color-red" /></label>
                                <select name="localidades_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM localidades";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; } ?>
                                </select><br /></div>
                                </div><br />
        <!-- BOTON PARA AGREGAR EL DATOS CONTACTOS-->
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
            <!-- JS --> <?php libreria::getScripts(); ?> <!-- End JS -->

    </body>
</html>
<!-- === END FOOTER === -->