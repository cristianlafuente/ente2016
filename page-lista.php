<?php
require_once 'config/config.php';
require_once 'config/Db.php';
require_once 'paginador.php';
require_once 'consulta.php';
require_once 'cabecera.php';
require_once 'contenedorcarrousel.php';
require_once 'infointeresante.php';
//require_once 'menudinamico.php';
require_once 'panelmenudinamico.php';
require_once 'libreria.php';

$e="Eventos - Ente Tucumán Turismo";
?>




<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <!-- Title --><?php libreria::getLibreria1($e);?>
    </head>
    <body>

<?php
        //se utiliza error_reporting('0') para que no muestre los warning de las 
        //variables no inicializadas.
        error_reporting('0');
        $_valor3=1;
        $paginador1= new paginador();
//        $pagina1= $_GET["pagina"];
        $a_prensa = $paginador1->paginar(consulta::getconsulta(0,"",$_valor3), "0", "4");
 //       $params1 = $paginador1->getRangoPaginacion();
        
        /*PAGINADOR Y OBJETO PARA CARRUSEL DE EVENTOS */
        $paginador2= new paginador();
 //       $pagina2= $_GET["pagina"];
        $a_eventos = $paginador2->paginar(consulta::getconsulta(1,"",$_valor3), "0", "101");

         // LISTAR INFORMACION DEL ENTE
        $paginador3= new paginador();
        $a_info = $paginador3->paginar(consulta::getconsulta(2,17,$_valor3),"0","");
        //$a_info = $paginador3->paginar(consulta::getconsulta(5,16,1),"0","");

        // LISTAR ¿DONDE IR? DEL ENTE
        $paginador4= new paginador();
        $a_dondeir=$paginador4->paginar(consulta::getconsulta(4,15,$_valor3),"0","");
        //$a_dondeir=$paginador4->paginar(consulta::getconsulta(6,15,1),"0","");

        // LISTAR SERVICIOS DEL ENTE
        $paginador5= new paginador();
        $a_servicios=$paginador5->paginar(consulta::getconsulta(5,16,$_valor3),"0","");
        //$a_servicios=$paginador5->paginar(consulta::getconsulta(7,"",1),"0","");

        // LISTAR ¿QUE HACER? DEL ENTE
        $paginador6= new paginador();
        $a_quehacer=$paginador6->paginar(consulta::getconsulta(6,17,$_valor3),"0","");

        // LISTAR DE EVENTOS QUE QUEDAN
        $paginador7= new paginador();
        //$a_eventosfin=$paginador7->paginar(consulta::getconsulta(9,""),"0","");
        $a_eventosfin=$paginador7->paginar(consulta::getconsulta(7,"",$_valor3),"0","");
        ?>

        <div id="body-bg">
             <!-- Telefono/Email -->
            <?php cabecera::getPrecabecera(); ?>
            <!-- End Telefono/Email -->
            <!-- Header -->
                 <?php
                    cabecera::getCabecera(); ?>
            <!-- End Header -->
           <!-- Top Menu -->
            <div id="hornav" class="bottom-border-shadow">
                <?php //cabecera::getMenu(); 
                        cabecera::getMenu2($a_info,$a_servicios);
                ?>

            </div>
            <!-- End Top Menu -->
            <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white" display:table>
                    <div class="row margin-vert-30">
                        <div class="col-md-12">
                            <h2>AGENDA</h2>
                        </div>
                    </div>
                <DIV CLASS="col-md-12">
                        <?php //menudinamico::getCalendario($a_eventosfin,0);?>
                <!-- EVENTO ACTUALIZADO CDO SE HACE CLICK -->
                <div tabindex="-1" id="div-evento" class="col-mod-12">
                        

                </div>

                <!-- FIN DE EVENTO ACTUALIZADO -->
                    <?php     $datos=$a_eventosfin;
                    foreach ($datos as $row) { ?>
                     <div class="col-md-3 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <?php 
                    $opcion=$row['tipo_eventos_id'];
                    //echo $opcion;

                    switch ($opcion) {
                            case 1:  $a="fa-glass"; echo "<div class='panel panel-orange'>"; break;
                            case 2:  $a="fa-university"; echo "<div class='panel panel-aqua'>"; break;
                            case 3:  $a="fa-trophy"; echo "<div class='panel panel-red'>"; break;
                            case 4:  $a="fa-users"; echo "<div class='panel panel-blue'>"; break;
                            case 5:  $a="fa-music"; echo "<div class='panel panel-green'>"; break;
                            case 6:  $a="fa-asl-interpreting"; echo "<div class='panel panel-yellow'>"; break;}
                    ?>
                    <!--<div class="panel panel-aqua">-->
                        <div class="panel-heading">
                            <?php $b=$row['id']; 
                            echo "<a href='page-evento.php?evento=".$b."'>"
                            ?>
                            
                            <h3 class="panel-title"><?php 
                             $fecha_det = explode("-", $row['Inicio']);
                              $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                              echo $fecha_det[0]." - ".$arrayMeses[date('m')-1]." - ".$b." / "; // imprimiría el dia
                             echo "<i class='".$a." color-secundary animate FadeIn animated'></i>";
                             
                            ?> <!--<a name="boton" class="fa-rocket" href="#"></a>--></h3></a>
                        </div>
                        <div class="panel-body">
                        <?php echo "<img src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['dire']."'  style='max-width:150px;max-height:150px;'>";?>
                        <?php  echo "<h4>".$row['titulo']." </h4> <span> Fecha de Fin:". $row['Fin']."</span>";  ?></div>
                            
                    <?php echo "</div>";?>
                    <!-- FIN DE ITEM DE LA FECHA -->

                    </div>

                               <?php } ?>
                </DIV>
            <!--FINAL DE FAQ -->



               </div>               

            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <div id="base">
                    <?php  panelmenudinamico::getPMD($a_info,$a_dondeir,$a_servicios,$a_quehacer ); ?>
            </div>
            <!-- Footer -->
            <?php cabecera::getFooter();?>

        </script> -->
            <!-- End Footer -->
            <!-- JS -->
            <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/scripts.js"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
            <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
            <!-- Modernizr -->
            <script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
            <!-- End JS -->
            <!-- Libreria jQuery -->
            <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    </body>
</html>
<!-- === END FOOTER === -->