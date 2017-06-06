<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<?php 
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de ingresos de Hoteles";
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
        <style>
          .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }</style>
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
                            <form class="signup-page" action="hotnew.php"  enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Creando Nuevo Hoteles</h2>
                                </div>
                                <label>Nombre <span class="color-red"></label>
                                <input name="nombre" class="form-control margin-bottom-20" type="text">
                                <label>Estrellas <span class="color-red"></label>
                                <input name="estrellas" class="form-control margin-bottom-20" type="text">
                                <label>Booking <span class="color-red"></label>
                                <!--<input name="estrellas" class="form-control margin-bottom-20" type="text">-->
                                <textarea class="form-control" rows="5" id="comment" name="booking"></textarea>
                                <label>TripAdvisor <span class="color-red"></label>
                                <!--<input name="estrellas" class="form-control margin-bottom-20" type="text">-->
                                <textarea class="form-control" rows="5" id="comment" name="tripadvisor"></textarea>
                                <label>Ubicación <span class="color-red"></label>
                                <!--<input name="estrellas" class="form-control margin-bottom-20" type="text">-->
                                <textarea class="form-control" rows="5" id="comment" name="ubicacion"></textarea>
                                <label>Descripción <span class="color-red"></label>
                                <!--<input name="estrellas" class="form-control margin-bottom-20" type="text">-->
                                <textarea class="form-control" rows="5" id="comment" name="descripcion"></textarea>
                                <label>Habitaciones <span class="color-red"></label>
                                <!--<input name="estrellas" class="form-control margin-bottom-20" type="text">-->
                                <textarea class="form-control" rows="5" id="comment" name="habitaciones"></textarea>



                                <!--INSERCION DE LA CATEGORIA-->
                                <div>
                                <label><b>Categoria: <span class="color-red" /></b></label>
                                <select name="categorias">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM categoria_hoteles";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>'; } ?>
                                </select><br /></div>

                                <div>
                                <!--INSERCION DE IDIOMAS-->
                                <label><b>Idioma: <span class="color-red" /></b></label>
                                <select name="idiomas_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM idiomas";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>'; } ?>
                                </select><br /></div>


                                <!--EL DATOS DE LOS CONTACTOS DEL HOTEL-->
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
                            <!-- GALERIAS RELACIONADAS -->
                                <div>
                                <label><b>Galeria: <span class="color-red" /></b></label>
                                <select name="galerias">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM galerias";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>'; } ?>
                                </select><br /></div>

                            <!-- INSERCION DE LA IMAGEN Y PREVIA VISTA-->
                                <div class="nomfoto space"> 
                                <label> Imagen <span class="color-red"/> </label><!--<input name="archivo" class="foto" type="file" /> -->
                                <input type="file" name="imagen" id="files" />
                                <!--<input type="file" id="files" name="archivo[]" /> -->
                                <br /> <output id="list"></output>
<!--                                <input name="archivo" type="file" />-->
                                </div><br />
                                <HR>



        <!-- AQUI SE ELIGE LOS CHECKBOX DE CARACTERISTICAS-->                                
                                <DIV>
                                <label><b>Seleccion de Servicios: <span class="color-red" /></b></label><br>
                                    <?php  
                                    $_datos="SELECT id, nombre FROM servicios_hoteles";
                                    $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                    while ($row = mysql_fetch_assoc($consulta)) {
                                       echo "<label class='checkbox-inline'>".$row['nombre']."<input type='checkbox' name='carc[]' value='".$row['id']."'/></label>"; } ?>
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
                                </div>                            </form>
                        </div>
                        <!-- End Register Box -->
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <!-- Footer --> <?php cabecera::getfooter(); ?> <!-- End Footer -->
            <!-- JS --><?php libreria::getScripts(); ?>
            <script>
              function archivo(evt) {
                  var archivo = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo 'file'.
                  for (var i = 0, f; f = archivo[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById('list').innerHTML = ['<img class='thumb' src='', e.target.result,'' title='', escape(theFile.name), ''/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
             </script>

    </body>
</html>
<!-- === END FOOTER === -->