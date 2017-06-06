<?php
require_once 'config/config.php';
require_once 'config/Db.php';
require_once 'paginador.php';
require_once 'consulta.php';
require_once 'cabecera.php';
require_once 'contenedorcarrousel.php';
require_once 'infointeresante.php';
require_once 'eventoscarrousel.php';
require_once 'panelmenudinamico.php';
require_once 'carro3.php';
require_once 'galeriaimagenes.php';
?>

<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script> 

<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>Hoteles - Ente Tucumán Turismo</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="tucuman.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
    </head>
    <body>

        <?php
        //se utiliza error_reporting('0') para que no muestre los warning de las 
        //variables no inicializadas.
        error_reporting('0');
        $_valor3=1;

        // LISTAR INFORMACION DEL ENTE
        $paginador3= new paginador();
        $a_info = $paginador3->paginar(consulta::getconsulta(2,17,1),"0","");
        // LISTAR ¿DONDE IR? DEL ENTE
        $paginador4= new paginador();
        $a_dondeir=$paginador4->paginar(consulta::getconsulta(4,15,1),"0","");
        // LISTAR SERVICIOS DEL ENTE
        $paginador5= new paginador();
        $a_servicios=$paginador5->paginar(consulta::getconsulta(5,16,1),"0","");
        // LISTAR ¿QUE HACER? DEL ENTE
        $paginador6= new paginador();
        $a_quehacer=$paginador6->paginar(consulta::getconsulta(6,17,1),"0","");


        //EVENTO QUE TRAE DEL LLAMADO DEL CALENDARIO
        $_valor=($_GET['hotel']);

        $paginador= new paginador();
        $a_serseleccionado=$paginador->paginar(consulta::getdevolver(5, $_valor,"",$_valor3),"0","");
        //getdevolver($opcion, $padre,$articulo,$idioma)
     
        ?>


        <div id="body-bg">
            <!-- Phone/Email -->
            <?php cabecera::getPreCabecera(); ?>
            <!-- End Phone/Email -->
            <!-- Header -->
                <?php  cabecera::getCabecera(); ?>            
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
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <div class="col-md-12">
                        
                         <?php foreach($a_serseleccionado as $row): ?>
                            <h2><?php echo $row['nombre'] ;
                                for($i=0; $i<$row['estrellas']; $i++){
                                echo "<span> <i class='fa-star color-secundary animate FadeIn animated'></i> </span>";
                             }

                            ?></h2>
                            <div class="row">
                                <div class="col-md-6 animate fadeIn">
                                   <?php echo "<img src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['archivo']."'  alt='imagen' class='margin-top-10'";?>
                                </div>
                            </div>
                                <div class="col-md-8 col-xs-12 margin-bottom-10 animate fadeInRight">
                                    <h3 class="padding-top-10 pull-left"> <small> <?php echo $row['catnombre']?></small> 
                                    </h3>
                                    <div class="clearfix"></div>
                                    <h4><?php echo "<em>".$row['descripcion']."</em>";?></h4>
                                    <?php 
                                    echo "<strong>Dirección:</strong>".$row['direccion']."<br>";
                                    echo "<strong>Localidad:</strong>".$row['lolnombre']."<br>";
                                    echo "<strong>Telefono:</strong>".$row['Telefono']."<br>";
                                    echo "<strong>Email:</strong>".$row['mail']."<br>";
                                    echo "<strong>Web:</strong>".$row['web']."<br>";
                                    echo "<br>";
                                    echo "<strong>Ubicacion</strong>";
                                    echo $row['ubicacion'];
                                    $habi=$row['habitaciones'];    
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row animate fadeInUp">
                                <h2 class="text-center margin-top-10">Características</h2>

                                <?php
                                echo "<div class='panel panel-default'><div class='panel-header'>HABITACIONES</div><div class='panel-body'>";

                                echo $habi."<br>";
                                echo "</div></div>";
                                

                                $a_serservicio=$paginador->paginar(consulta::getdevolver(6,$_valor,"",$_valor3),"0","");
                                echo "<div class='panel panel-default'><div class='panel-header'>SERVICIOS</div><div class='panel-body'>";
                                foreach ($a_serservicio as $row2) {
                                    echo $row2['nombreservicio'].". ";
                                }
                                echo "</div></div>";

                                ?>

                                <!--<p class="text-center margin-bottom-30"><strong>Lugar:</strong>-->
                                <?php //echo $row['direccion']." - ".$row['localidad'];?></p>
                                <h2 class="text-center margin-top-10">
                                <?php //echo $row['X']." - ".$row['Y'];?>
                                </h2>
                                <!-- Inicio Galeria de Imagenes-->
                                <div class="row">

                                    <?php  
                                    $_idioma=1; 
                                    $_datos1="SELECT g.id, g.estado, g.fcreacion,g.oculta, g.imagen, g.nombre, g.descripcion, gi.galerias_id, gi.imagenes_id, im.id as 'imagen_id', im.archivo, im.fcreacion, im.estado as 'imagen_estado', im.tipo, im.nombre as 'imagen_nombre' FROM galerias as g inner join galeria_imagen as gi on g.id=gi.galerias_id inner join imagenes as im on gi.imagenes_id=im.id WHERE g.id=".$row['galerias_id']." and im.estado=1 order by 1 asc limit 12";
                                    //$_datos1=consulta::getdevolver(7,"",$row['galerias_id'],$idioma);
                                    $link1 = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                                    if (is_null($is_utf8)) { mysqli_query($link1,"SET NAMES 'utf8'"); }  
                                    $a_imagenes = mysqli_query($link1, $_datos1) or die(mysqli_error($link1));

                                    contenedorcarrousel::getICarro($a_imagenes);                        
                                    ?>
                                </div><!-- Fin de la Galeria-->

                            </div>
                            <hr class="margin-bottom-40">
                        <?php// endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <div id="base">
                <?php  panelmenudinamico::getPMD($a_info,$a_dondeir,$a_servicios,$a_quehacer ); ?>
            </div>
            <!-- Footer -->
                <?php cabecera::getFooter(); ?>
            <!-- End Footer -->
            <!-- Go to www.addthis.com/dashboard to customize your tools --> 
            <!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5915b3aa2ef51605"></script> -->
            
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
    </body>
</html>
<!-- === END FOOTER === -->