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
?>

<!-- === BEGIN HEADER === -->
<!DOCTYPE html>

<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>Contactenos - Ente Tucumán Turismo</title>
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
        $_valor3=1;
        error_reporting('0');
        $paginador1= new paginador();
        $a_prensa = $paginador1->paginar(consulta::getconsulta(0,"",1), "0", "4");
        
        /*PAGINADOR Y OBJETO PARA CARRUSEL DE EVENTOS */
        $paginador2= new paginador();
        $a_eventos = $paginador2->paginar(consulta::getconsulta(1,"",$_valor3), "0", "101");

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
        
        ?>

        <div id="body-bg">
            <!-- Telefono/Email -->
            <?php cabecera::getPreCabecera(); ?>
            <!-- End Telefono/Email -->
            <!-- Header -->
            <div id="header">
                 <?php
                    cabecera::getCabecera(); ?>
            </div>
            <!-- End Header -->
            <!-- Top Menu -->
            <div id="hornav" class="bottom-border-shadow">
                <?php
                cabecera::getMenu2($a_info,$a_servicios);
                ?>

            </div>
            <!-- End Top Menu -->
            <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Main Column -->
                        <div class="col-md-8">
                            <!-- Main Content -->
                            <div class="headline">
                                <h2>¡Ponte en Contacto con Nosotros!</h2>
                            </div>
                            <p>Si desea contactarnos puede hacerlo utilizando el formulario de contacto disponible en Sesta página.</p>
                            <br>
                            <!-- Contact Form -->
                            <form>
                                <label>Nombre y Apellido</label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-6 col-md-offset-0">
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <label>Email
                                    <span class="color-red">*</span>
                                </label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-6 col-md-offset-0">
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <label>Mensaje</label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-8 col-md-offset-0">
                                        <textarea rows="8" class="form-control"></textarea>
                                    </div>
                                </div>
                                <p>
                                    <button type="submit" class="btn btn-primary"> <i class="fa-envelope color-primary"></i>Enviar</button>
                                </p>
                            </form>
                            <!-- End Contact Form -->
                            <!-- End Main Content -->
                        </div>
                        <!-- End Main Column -->
                        <!-- Side Column -->
                        <div class="col-md-4">
                            <!-- Recent Posts -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Información Contacto</h3>
                                </div>
                                <div class="panel-body">
                                    <p>También puedes contactarte por:.</p>
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="fa-phone color-primary"></i>(0381) - 4303644 | (0381) - 4222199</li>
                                        <li>
                                            <i class="fa-envelope color-primary"></i>informes@tucumanturismo.gob.ar</li>
                                        <li>
                                            <i class="fa-facebook color-primary"></i>http://www.facebook.com/tucumanturismo</li>

                                        <li>
                                            <i class="fa-twitter color-primary"></i>http://twitter.com/tucumanturismo?lang=es</li>
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong class="color-primary">Lunes-Viernes:</strong>8am a 9pm</li>
                                        <li>
                                            <strong class="color-primary">Sabado:</strong>9am a 9pm</li>
                                        <li>
                                            <strong class="color-primary">Domingo:</strong>9am a 9pm</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End recent Posts -->
                            
                        </div>
                        <!-- End Side Column -->
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <div id="base">
                    <?php  panelmenudinamico::getPMD($a_info,$a_dondeir,$a_servicios,$a_quehacer ); ?>
            </div>
            <!-- Footer -->
                <?php cabecera::getfooter(); ?>
            <!-- End Footer -->

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