<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<?php 
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de ingresos de articulos";
?>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <!-- Title --><?php libreria::getlLibreria($e); ?>
        <script type="text/javascript" src="ckeditor/ckeditor.js"> </script>
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
                            <form class="signup-page" action="artnew.php"  enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Creando Nuevo Artículo</h2>
                                </div>
                                <label>Titulo <span class="color-red"></label>
                                <input name="titulo" class="form-control margin-bottom-20" type="text">
                                <label>Copete <span class="color-red"></label>
                                <input name="copete" class="form-control margin-bottom-20" type="textarea">
                                <label>Contenido <!--<span class="color-red">*</span>--> </label>
                                <textarea name="contenido" class="form-control margin-bottom-20" type="textarea" cols="80" id="editor1" rows="10"></textarea>
									<!--<textarea cols=”80″ id=”editor1″ name=”editor1″ rows=”10″>-->
									
									<script type="text/javascript">
									CKEDITOR.replace("editor1");
									</script>
                                <div>
        <!--INSERCION DEL TIPO DE ARTICULO-->
                                <label>Tipo de Articulo: <span class="color-red" /></label>
                                <select name="tipo">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM tipos";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; } ?>
                                </select><br /></div>
        <!--INSERCION DEL IDIOMA DEL ARTICULO-->
                                <label>Selecion de Idioma: <span class="color-red" /></label>
                                <select name="idiomas_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM idiomas ";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; } ?>
                                </select>
        <!--INSERCION DE LA GALERIA QUE TIENE RELACIONADA-->
                                <label>Selecion de Galeria: <span class="color-red" /></label>
                                <select name="galerias_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM galerias";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; } ?>
                                </select>
                                
        <!--INSERCION DEL DATOS DE LOS CONTACTOS DEL ARTICULO-->
                                <label>Selecion de Contacto: <span class="color-red" /></label>
                                <select name="datos_contactos_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT d.id, CONCAT(d.direccion, ', ', l.nombre)as direccion FROM datos_contactos as d inner join localidades as l on d.localidades_id=l.id ";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row[id].'">'.$row[direccion].'</option>'; } ?>
                                </select>
                                
        <!-- INSERCION DEL PADRE DEL ARTICULO O ARTICULO RELACIONADO-->
                                <label>Selecion de Dependencia: <span class="color-red" /></label>
                                <select name="padre_id">
                                    <option value="">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, titulo FROM articulos where idiomas_id=1";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row[id].'">'.$row[titulo].'</option>'; } ?>
                                </select>
        <!-- INSERCION DE LA IMAGEN Y PREVIA VISTA-->
                                <div class="nomfoto space"> 
                                <label> Imagen <span class="color-red"/> </label><!--<input name="archivo" class="foto" type="file" /> -->
                                <input type="file" name="imagen" id="files" />
                                <!--<input type="file" id="files" name="archivo[]" /> -->
                                <br /> <output id="list"></output>
<!--                                <input name="archivo" type="file" />-->
                                </div><br />


        <!-- BOTON PARA AGREGAR EL ARTICULO-->
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