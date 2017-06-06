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


$e="Modificación de Articulos";
?>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <!-- Title --> <?php libreria::getlLibreria($e); ?> <!--End HEAR-->
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
                        <div class="col-md-10 col-md-offset-1 col-sm-offset-1">
                        <?php   //ID DEL ARTICULO
                        $_valor1=($_GET['v1']);
                        //valor del idioma por defecto
                        $_valor3=1;
                        $paginador= new paginador();
                        //SE INGRESARÁ EL ID ARTICULO
                        $a_art=$paginador->paginar(consulta::getdevolver(11,"",$_valor1,$_valor3),"0","");
                        foreach($a_art as $articulo):
                        ?>
                           <form class="signup-page" <?php echo "action='artmod.php?v1=".$articulo['id']."'"; ?> enctype="multipart/form-data" method="POST" name="Aceptar"> <div>
                                <div class="signup-header">
                                    <h2>Modificar Artículo</h2>
                                </div>
                                <div>
                                <label><strong>Titulo <span class="color-red"></strong></label>
                                <input name="titulo" class="form-control margin-bottom-20" type="text" value="<?php echo $articulo['titulo'];?>">
                                <label><strong>Copete <span class="color-red"></strong></label>
                                <textarea name="copete" class="form-control margin-bottom-20" cols="80" id="editor2" rows="10"> <?php echo $articulo['copete'];?>
                                </textarea>
                                <script type="text/javascript">CKEDITOR.inline('editor2');</script>
                                
                                <label><strong>Contenido <!--<span class="color-red">*</span>--></strong> </label>
                                <textarea name="contenido" class="form-control margin-bottom-20" cols="80" id="editor1" rows="10"><?php echo $articulo['contenido'];?></textarea>
                                    <!--<textarea cols=”80″ id=”editor1″ name=”editor1″ rows=”10″>-->
                                    
                                    <script type="text/javascript">
                                    CKEDITOR.inline('editor1');
                                    </script>
                                </div>
                                <div>
        <!--INSERCION DEL TIPO DE ARTICULO-->
                                
                                <label><strong>Tipo de Articulo: <span class="color-red" /></strong></label>
                                <select name="tipo" class="form-control">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM tipos";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                if($articulo['tipo_id']!=$row['id']){
                                                echo '<option value="'.$row[id].'">'.$row[nombre].'</option>';}
                                                else{
                                                echo '<option value="'.$row[id].'" selected>'.$row[nombre].'</option>';    
                                                }
                                         } ?>
                                </select><br /></div>
        <!--INSERCION DEL IDIOMA DEL ARTICULO-->
                                <div>
                                <label><strong>Selecion de Idioma: <span class="color-red" /></strong></label>
                                <select name="idiomas_id" class="form-control">
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
        <!--INSERCION DE LA GALERIA QUE TIENE RELACIONADA-->
                                <label><strong>Selecion de Galeria: <span class="color-red" /></strong></label>
                                <select name="galerias_id" class="form-control">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM galerias";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                            if($articulo['galerias_id']!=$row['id']){
                                              echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; } 
                                            else{
                                                echo '<option value="'.$row[id].'" selected>'.$row[nombre].'</option>';
                                            } } ?>

                                </select>
                                
        <!--INSERCION DEL DATOS DE LOS CONTACTOS DEL ARTICULO-->

                                <label><strong>Selecion de Contacto: <span class="color-red" /></strong></label>
                                <select name="datos_contactos_id" class="form-control">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT d.id, CONCAT(d.direccion, ', ', l.nombre)as direccion FROM datos_contactos as d inner join localidades as l on d.localidades_id=l.id ";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                            if($articulo['datos_contactos_id']!=$row['id']){                
                                            echo '<option value="'.$row[id].'">'.$row[direccion].'</option>'; } 
                                            else{
                                            echo '<option value="'.$row[id].'" selected>'.$row[direccion].'</option>';
                                            }}?>
                                </select>
                                
        <!-- INSERCION DEL PADRE DEL ARTICULO O ARTICULO RELACIONADO-->
                                
                                <label><strong>Selecion de Dependencia: <span class="color-red" /></strong></label>
                                <select name="padre_id" class="form-control">
                                    <option value="">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, titulo FROM articulos where idiomas_id=1";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                            if($articulo['padre_id']!=$row['id']){
                                            echo '<option value="'.$row[id].'">'.$row[titulo].'</option>'; }
                                            else{
                                            echo '<option value="'.$row[id].'" selected>'.$row[titulo].'</option>';
                                        } } ?>
                                </select>
                                </div>
        <!-- INSERCION DE LA IMAGEN Y PREVIA VISTA-->
                                <div class="nomfoto space"> 
                                <label> <strong>Imagen: <span class="color-red"/></strong> </label> <br />
                                <label><?php echo $articulo['archivo'];?></label>
                                
                                <input type="file" name="imagen" id="files" />
                                <br /> <output id="list"></output>
                                </div><br />

        <!-- BOTON PARA ELEGIR DE ACTIVAR O NO EL ARTICULO-->
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
                            

                            </div>
                           
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
                        <?php endforeach ?>
                        </div>
                         </form>
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