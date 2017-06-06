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


$e="Modificación de Galerias";
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
        <style>
          .thumb {
            height: 100px;
            width: :100px;
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
                        <div class="col-md-10 col-md-offset-1 col-sm-offset-1">
                        <?php   //ID DEL RESTO
                        $_valor1=($_GET['v1']);
                        //valor del idioma por defecto
                        $_valor3=1;
                        $paginador= new paginador();
                        //SE INGRESARÁ EL ID ARTICULO
                        $a_art=$paginador->paginar(consulta::getdevolver(23,"",$_valor1,$_valor3),"0","");
                        foreach($a_art as $articulo):
                        ?>
                           <form class="signup-page" <?php echo "action='galmod.php?v1=".$articulo['id']."'"; ?> enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Modificar Galerias</h2>
                                </div>
                                <label>Nombre<span class="color-red"></label>
                                <input name="nombre" class="form-control margin-bottom-20" type="text" value="<?php echo $articulo['nombre'];?>">
                                <label>Descripcion<span class="color-red"></label>
                                 <textarea class="form-control" rows="5" id="comment" name="descripcion"><?php echo $articulo['descripcion'];?></textarea>
                        <!-- BOTON PARA ELEGIR DE ACTIVAR O NO EL HOTEL-->
                                <div>
                                <?php if($articulo['oculta']!=0){
                                    echo "<input type='radio' name='oculta' value='0'> Oculta <input type='radio' name='oculta' value='1' checked> Visible";}
                                    else{
                                        echo "<input type='radio' name='oculta' value='0' checked> Oculta <input type='radio' name='oculta' value='1'> Visible";
                                    }

                                ?>
                                </div><br>
                        <!--INSERCION DEL CATEGORIAS-->                                
                                <div>
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

                       <!-- INSERCION DE LA IMAGEN Y PREVIA VISTA-->
                                <div class="nomfoto space"> 
                                <label><?php echo $articulo['imagen'];?></label>
                                <label> Imagen <span class="color-red"/> </label>
                                <input type="file" name="imagen" id="files" />
                                <br /> <output id="list"></output>
                                </div><br />

                        <!-- BOTON PARA ELEGIR DE ACTIVAR O NO EL HOTEL-->
                                <div>
                                <?php if($articulo['estado']!=0){
                                    //echo "<input type='radio' name='estado' value='0'> Inactivo <input type='radio' name='estado' value='1' checked> Activado";
                                        $y="";$x="checked";}
                                    else{
                                        //echo "<input type='radio' name='estado' value='0' checked> Inactivo <input type='radio' name='estado' value='1'> Activado";
                                        $y="checked";$x="";}
                                    echo "<input type='radio' name='estado' value='0' ".$y."> Inactivo <input type='radio' name='estado' value='1' ".$x."> Activado";
                                ?>
                                </div><br>

                        <!-- AQUI SE ELIGE LOS CHECKBOX DE LAS IMAGENES DE LAS GALERIAS-->                                
                                <DIV>
                                <label><b>Seleccion de Elementos de la Galeria: <span class="color-red" /></b></label><br>
                                    <?php  

                            //REPENSAR COMO HACER PARA LLAMAR A LA DOBLE hoteles_servicios_hoteles Y COMPARARLA CON LA TABLA servicios_hoteles PARA DEJAR MARCADOS AQUELLOS VALORES QUE TIENEN EN COMUN
                            //PARA ELLO DEBO DE REALIZAR UNA CONSULTA A ESTA TABLA Y HACER BUCLES FOR DENTRO DE OTRO BUCLE FOR
                                    $_datos="SELECT id, nombre,archivo,tipo FROM imagenes order by id desc";
                                    $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());

                            //UNA VEZ CARGADA TODAS LAS CARACTERISTICAS PROCEDEREMOS A MARCAR LAS QUE ESTEN RELACIONADAS 

                                while($row=mysql_fetch_assoc($consulta)){
                                    $_datos1="select galerias_id, imagenes_id from galeria_imagen where galerias_id=".$articulo['id'];
                                    $consulta1 = mysql_query($_datos1, Db::connect()) or die(mysql_error());
                                    while($row1=mysql_fetch_assoc($consulta1)){
                                        if($row['id']==$row1['imagenes_id']){ $e3="checked"; break;} 
                                        else{  $e3=""; }}
                                    //AQUI SE HACE LA SELECCION DE TIPO DE ARCHIVO
                                        echo "<div class='col-md-4'>";
                                        switch($row['tipo']){
                                            case 1: //echo "<img class='thumb' src='wwww.tucumanturismo.gob.ar/images/'".$row['archivo'].">";
                                            echo "<img class='thumb' src='http://www.tucumanturismo.gob.ar/uploads/image/".$row['archivo']."'>";
                                                    break;}
                                        /*    case 2: echo "<iframe width='200' height='200' src='https://www.youtube.com/watch?v=".$row['archivo']."' allowfullscreen></<i></i>frame>"; break;
                                                         }*/
                                    //AQUI SE USA PARA ARMAR EL CHECKBOX DE SELECCION
                                    echo "<label class='checkbox-inline'>".$row['nombre']."<input type='checkbox' name='carc[]' ";
                                    echo $e3." value=".$row['id']."/></label></div>";
                                        }
                                     ?>

                                </DIV>
                               
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