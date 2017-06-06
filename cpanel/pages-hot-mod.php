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


$e="Modificación de Hoteles";
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
                        <?php   //ID DEL RESTO
                        $_valor1=($_GET['v1']);
                        //valor del idioma por defecto
                        $_valor3=1;
                        $paginador= new paginador();
                        //SE INGRESARÁ EL ID ARTICULO
                        $a_art=$paginador->paginar(consulta::getdevolver(21,"",$_valor1,$_valor3),"0","");
                        foreach($a_art as $articulo):
                        ?>
                           <form class="signup-page" <?php echo "action='hotmod.php?v1=".$articulo['id']."'"; ?> enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Modificar Hoteles</h2>
                                </div>
                                <label>Nombre<span class="color-red"></label>
                                <input name="nombre" class="form-control margin-bottom-20" type="text" value="<?php echo $articulo['nombre'];?>">
                                <label>Estrelllas<span class="color-red"></label>
                                <input name="estrellas" class="form-control margin-bottom-20" type="textarea" value="<?php echo $articulo['estrellas'];?>">
                                 <label>Booking <span class="color-red"></label>
                                 <textarea class="form-control" rows="5" id="comment" name="booking"><?php echo $articulo['booking'];?></textarea>
                                 <label>tripadvisor <span class="color-red"></label>
                                 <textarea class="form-control" rows="5" id="comment" name="tripadvisor"><?php echo $articulo['tripadvisor'];?></textarea>
                                 <label>Ubicacion<span class="color-red"></label>
                                 <textarea class="form-control" rows="5" id="comment" name="ubicacion"><?php echo $articulo['ubicacion'];?></textarea>
                                <label>Descripcion<span class="color-red"></label>
                                 <textarea class="form-control" rows="5" id="comment" name="descripcion"><?php echo $articulo['descripcion'];?></textarea>
                                <label>Habitaciones <span class="color-red"></label>
                                 <textarea class="form-control" rows="5" id="comment" name="habitaciones"><?php echo $articulo['habitaciones'];?></textarea>

                                <div>
        <!--INSERCION DEL CATEGORIAS-->
                                <label>Categorias:  <span class="color-red" /></label>
                                <select name="categorias">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM categoria_hoteles";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                if($articulo['categoria_hoteles_id']!=$row['id']){
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
        <!--INSERCION DE LAS GALERIAS DEL HOTEL-->
                                <label>Selecion de Galerias: <span class="color-red" /></label>
                                <select name="galerias_id">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM galerias ";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                            if($articulo['galerias_id']!=$row['id']){    
                                            echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; }
                                            else{
                                            echo '<option value="'.$row[id].'" selected>'.$row[nombre].'</option>'; 
                                            }

                                      } ?>
                                </select>

        <!-- INSERCION DE LA IMAGEN Y 
        PREVIA VISTA-->
                                <div class="nomfoto space"> 
                                <label><?php echo $articulo['archivo'];?></label>
                                <label> Imagen <span class="color-red"/> </label>
                                <input type="file" name="imagen" id="files" />
                                <br /> <output id="list"></output>
                                </div><br />
        <!-- AQUI SE ELIGE LOS CHECKBOX DE SERVICIOS DE LOS HOTELES-->                                
                                <DIV>
                                <label><b>Seleccion de Servicios: <span class="color-red" /></b></label><br>
                                    <?php  

                            //REPENSAR COMO HACER PARA LLAMAR A LA DOBLE hoteles_servicios_hoteles Y COMPARARLA CON LA TABLA servicios_hoteles PARA DEJAR MARCADOS AQUELLOS VALORES QUE TIENEN EN COMUN
                            //PARA ELLO DEBO DE REALIZAR UNA CONSULTA A ESTA TABLA Y HACER BUCLES FOR DENTRO DE OTRO BUCLE FOR
                                    $_datos="SELECT id, nombre FROM servicios_hoteles";
                                    $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());

                            //UNA VEZ CARGADA TODAS LAS CARACTERISTICAS PROCEDEREMOS A MARCAR LAS QUE ESTEN RELACIONADAS 

                                while($row=mysql_fetch_assoc($consulta)){
                                    $_datos1="select hoteles_id, servicios_hoteles_id from hoteles_servicios_hoteles where hoteles_id=".$articulo['id'];
                                    $consulta1 = mysql_query($_datos1, Db::connect()) or die(mysql_error());
                                    while($row1=mysql_fetch_assoc($consulta1)){
                                        if($row['id']==$row1['servicios_hoteles_id']){ $e3="checked"; break;} 
                                        else{  $e3=""; }}
                                    echo "<label class='checkbox-inline'>".$row['nombre']."<input type='checkbox' name='carc[]' ";
                                    echo $e3." value=".$row['id']."/></label>";
                                        }
                                     ?>

                                </DIV>


        <!-- BOTON PARA ELEGIR DE ACTIVAR O NO EL HOTEL-->
                                <div>
                                <?php if($articulo['estado']!=0){
                                    echo "<input type='radio' name='estado' value='0'> Inactivo <input type='radio' name='estado' value='1' checked> Activado";}
                                    else{
                                        echo "<input type='radio' name='estado' value='0' checked> Inactivo <input type='radio' name='estado' value='1'> Activado";
                                    }

                                ?>
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