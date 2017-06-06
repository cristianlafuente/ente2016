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
                        <?php   //ID DEL ARTICULO
                        $_valor1=($_GET['v1']);
                        //valor del idioma por defecto
                        $_valor3=1;
                        $paginador= new paginador();
                        //SE INGRESARÁ EL ID ARTICULO
                        $a_art=$paginador->paginar(consulta::getdevolver(15,"",$_valor1,$_valor3),"0","");
                        foreach($a_art as $articulo):
                        ?>
                           <form class="signup-page" <?php echo "action='evtmod.php?v1=".$articulo['id']."'"; ?> enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Modificar Artículo</h2>
                                </div>
                                <label>Titulo <span class="color-red"></label>
                                <input name="titulo" class="form-control margin-bottom-20" type="text" value="<?php echo $articulo['titulo'];?>">
                                <label>Copete <span class="color-red"></label>
                                <input name="copete" class="form-control margin-bottom-20" type="textarea" value="<?php echo $articulo['copete'];?>">
                                <label>Contenido <!--<span class="color-red">*</span>--> </label>
                                <input name="contenido" class="form-control margin-bottom-20" type="textarea" value="<?php echo $articulo['contenido'];?>">
            <!-- INSERCION DE LAS FECHAS-->
                                <label>Fecha de Incio:<span class="color-red"></label>
                                <input type="date" name="fechainicio" step="1" min="2000-01-01" max="2200-12-31" value="<?php echo $articulo['fechaInicio'];?>">
                                <input type="date" name="fechafin" step="1" min="2000-01-01" max="2200-12-31" value="<?php echo $articulo['fechaFin'];?>"> 
                                <br>
                                <div>

        <!--INSERCION DEL TIPO DE ARTICULO-->
                                <label>Tipo de Evento: <span class="color-red" /></label>
                                <select name="tipo">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM tipos_eventos";
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
        <!--INSERCION DE LA GALERIA QUE TIENE RELACIONADA-->
                                <label>Selecion de Galeria: <span class="color-red" /></label>
                                <select name="galerias_id">
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
                                <label>Selecion de Contacto: <span class="color-red" /></label>
                                <select name="datos_contactos_id">
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
                                <label>Selecion de Dependencia: <span class="color-red" /></label>
                                <select name="padre_id">
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
        <!-- INSERCION DE LA IMAGEN Y PREVIA VISTA-->
                                <div class="nomfoto space"> 
                                <label><?php echo $articulo['archivo'];?></label>
                                <label> Imagen <span class="color-red"/> </label>
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