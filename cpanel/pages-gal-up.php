<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<?php 
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";
require_once "../paginador.php";
require_once "../consulta.php";

$e="Planilla de Ingreso de galerias";
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
                            <form class="signup-page" action="artnew.php"  enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Creando Nueva Galeria</h2>
                                </div>
                                <label>Nombre <span class="color-red"></label>
                                <input name="nombre" class="form-control margin-bottom-20" type="text">
                                <label>Descripcion <span class="color-red"></label>
                                <textarea class="form-control" rows="5" id="comment" name="descripcion"><?php echo "Escriba una descripcion";?></textarea>
                                <div>
        <!-- BOTON PARA ELEGIR DE ACTIVAR O NO LA GALERIA-->
                                <div>
                                <input type='radio' name='oculta' value='0' checked="">Oculto <input type='radio' name='oculta' value='1'> Visible
                                </div><br>
        <!-- INSERCION DE LA IMAGEN Y PREVIA VISTA-->
                                <div class="nomfoto space"> 
                                <label> Imagen <span class="color-red"/> </label>
                                <input type="file" name="imagen" id="files" />
                                <br /> <output id="list"></output>
                                </div><br />
        <!-- AQUI SE ELIGE LOS CHECKBOX DE CARACTERISTICAS-->                                
                                <DIV class="col-md-12">
                                <label><b>Seleccion de Multimedia: <span class="color-red" /></b></label><br>
                                    <?php
                               //LISTAR DE GALERIAS DE IMAGENES
                                $paginador7 = new paginador();
                                $pagina = $_GET["pagina"];
                                //es con el archivo consulta_vieja
                                //$a_imagenes = $paginador7->paginar(consulta::getconsulta(12,""),$pagina,"");
                                $a_imagenes = $paginador7->paginar(consulta::getconsulta(12,"",""),$pagina,"");
                                //$params2 = getPaginacion();
                                $params1= $paginador7->getPaginacion();

                                    //$_datos="SELECT id, archivo, nombre, tipo FROM imagenes order by id desc";
                                    //$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                    foreach($a_imagenes as $row){
                                    //while ($row = mysql_fetch_assoc($consulta)) {
                                        echo "<div class='col-md-4'>";
                                        switch($row['tipo']){
                                            case 1: //echo "<img class='thumb' src='wwww.tucumanturismo.gob.ar/images/'".$row['archivo'].">";
                                            echo "<img class='thumb' src='http://www.tucumanturismo.gob.ar/uploads/image/".$row['archivo']."'>";
                                                    break;
                                            case 2: echo "<iframe width='200' height='200' src='https://www.youtube.com/watch?v=".$row['archivo']."' allowfullscreen></iframe>"; break;
                                                         }
                                       echo "<hr><label class='checkbox-inline'>".$row['nombre']."<input type='checkbox' name='carc[]' value='".$row['id']."'/><hr></label></div>"; 
                                    } ?>
                                    
                                </DIV>
                                <hr>
                                <div>
                                <ul>
                            <!-- Elemento Inicial del paginador-->
                            <li style="display:inLine; margin-right: 5px;">
                            <?php if ($params1['primero']):?>
                                <a href="?pagina=<?php echo $params1['primero'];?>">
                                   <button class="btn btn-primary" type="button"> <i class="fa fa-fast-backward"></i>
                                 Primero </button></a>
                            <?php else:?>
                                    <button class="btn btn-default"> <i class="fa fa-fast-backward"></i>
                                 Primero </button> <?php endif;?></li>
                            <!-- Elemento Anterior del paginador-->
                            <li style="display:inline; margin-right:5px;">
                            <?php if($params1['anterior']):?>
                                <a href="?pagina=<?php echo $params1['anterior'];?>"> 
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-backward"></i>
                                        Anterior </button> </a>
                            <?php else:?>
                                <button class="btn btn-default" type="button"> <i class="fa fa-backward"></i>
                                 Anterior</button><?php endif;?></li>
                            <!-- Elemento Siguiente del paginador-->
                            <li style="display:inLine; margin-right:5px;">
                            <?php if($params1['siguiente']):?>
                                <a href="?pagina=<?php echo $params1['siguiente'];?>">
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-forward"></i>
                                    Siguiente</button></a>
                            <?php else:?>
                                    <button class="btn btn-default" type="button"> <i class="fa fa-forward"></i>
                                Siguiente</button><?php endif; ?></li>
                            <!-- Elemento Final del paginador-->
                            <li style="display:inLine; margin-right:5px;">
                            <?php if($params1['ultimo']):?>
                                <a href="?pagina=<?php echo $params1['ultimo'];?>">
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-fast-forward"></i>
                                    Ultimo</button></a>
                            <?php else:?>
                                    <button class="btn btn-default" type="button"> <i class="fa fa-fast-forward"></i>
                                    Ultimo</button><?php endif;?></li>
                        </ul>
                        </div>

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