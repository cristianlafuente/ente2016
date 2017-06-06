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

<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>Galerias - Ente Tucumán Turismo</title>
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
        $_valor3=1;
        //se utiliza error_reporting('0') para que no muestre los warning de las 
        //variables no inicializadas.
        error_reporting('0');
        
        // LISTAR INFORMACION DEL ENTE
        $paginador3= new paginador();
        $a_info = $paginador3->paginar(consulta::getconsulta(2,17,$_valor3),"0","");

        // LISTAR ¿DONDE IR? DEL ENTE
        $paginador4= new paginador();
        $a_dondeir=$paginador4->paginar(consulta::getconsulta(4,15,$_valor3),"0","");

        // LISTAR SERVICIOS DEL ENTE
        $paginador5= new paginador();
        $a_servicios=$paginador5->paginar(consulta::getconsulta(5,16,$_valor3),"0","");

        // LISTAR ¿QUE HACER? DEL ENTE
        $paginador6= new paginador();
        $a_quehacer=$paginador6->paginar(consulta::getconsulta(6,17,$_valor3),"0","");

        //TRAE LA GALERIA ESPECIFICADA POR ID
        $_valor=($_GET['galeria']);
        echo $_valor;

        $paginador= new paginador();
//        $a_galeriaseleccionada=$paginador->paginar(consulta::getconsulta(13,$_valor),"0","100");
        $a_galeriaseleccionada=$paginador->paginar(consulta::getconsulta(10,$_valor,$_valor3),"0","100");

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
                        
                        <?php $r=$a_galeriaseleccionada[0]; ?>
                            <h2><?php echo $r['nombre']; ?></h2>
                            <div class="row">
                                <div class="col-md-6 animate fadeIn">
                                   <?php echo "<img src='http://www.tucumanturismo.gob.ar/uploads/image//".$r['imagen']."'  alt='imagen' class='margin-top-10'";
                                   cabecera::getMenuRedesSociales(); ?>
                                </div>
                                <div class="col-md-6 margin-bottom-10 animate fadeInRight">
                                    <h3 class="padding-top-10 pull-left"> <small>Maraton</small> 
                                    </h3>
                                    <div class="clearfix"></div>
                                    <h4>
                                        <?php echo "<em>".$r['descripcion']."</em>";?>
                                    </h4>

                                </div>

                            </div>
                            <hr>
                            <div >
                                
                                    <ul class="portfolio-group">
                                    <?php $a=0;
                                    foreach($a_galeriaseleccionada as $row):
                                        $a=$a +1; ?>
                                    <!-- Portfolio Item -->
                                    <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                                        <a href="#">
                                        <figure class="animate fadeInLeft">
                                        <?php echo"<img alt='image1' src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['archivo']."'>";
                                        ?>
                                        </figure>
                                        </a>
                                    </li>
                            <!-- //Portfolio Item// -->
                                    <?php endforeach ; //echo $a;  ?>
                                    </ul>
                            </div>
                            <hr >
                        <?php //endforeach ?>
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
                <?php cabecera::getfooter();?>
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
    </body>
</html>
<!-- === END FOOTER === -->