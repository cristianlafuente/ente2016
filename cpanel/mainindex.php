<?php
//session_start();

require_once '../config/config.php';
require_once '../config/Db.php';
require_once '../paginador.php';
require_once '../consulta.php';
require_once '../cabecera.php';
include_once "../libreria.php";
include_once 'menu.php';

$e="MENU PRINCIPAL";
//session_start(); 
?>

<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <meta name='description' content=''>
        <meta name='author' content=''>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
        <!-- Favicon -->
        <link href='../tucuman.ico' rel='shortcut icon'>
        <!-- Bootstrap Core CSS -->
        <link rel='stylesheet' href='../assets/css/bootstrap.css' rel='stylesheet'>
        <!-- Template CSS -->
        <link rel='stylesheet' href='../assets/css/animate.css' rel='stylesheet'>
        <link rel='stylesheet' href='../assets/css/font-awesome.css' rel='stylesheet'>
        <link rel='stylesheet' href='../assets/css/nexus.css' rel='stylesheet'>
        <link rel='stylesheet' href='../assets/css/responsive.css' rel='stylesheet'>
        <link rel='stylesheet' href='../assets/css/custom.css' rel='stylesheet'>
        <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
        <!-- Title -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
         <!--<script src="assets/js/holder.js"></script> -->
        <!-- Libreria jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <!-- Acción sobre el botón con id=boton y actualizamos el div con id=capa -->
            <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function() {
                $('#listararticulos').click(function(){$.ajax({type: "POST", url: "listararticulos.php", success: function(a) {$('#contenido').html(a);}});});
                $('#tipoarticulos').click(function(){$.ajax({type: "POST", url: "listartipoarticulos.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listardatcon').click(function(){$.ajax({type: "POST", url: "listardatcon.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarlol').click(function(){$.ajax({type: "POST", url: "listarlol.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarevt').click(function(){$.ajax({type: "POST", url: "listarevt.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listartipevt').click(function(){$.ajax({type: "POST", url: "listartipevt.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarhot').click(function(){$.ajax({type: "POST", url: "listarhot.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarcathot').click(function(){$.ajax({type: "POST", url: "listarcathot.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listartipser').click(function(){$.ajax({type: "POST", url: "listartipser.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarest').click(function(){$.ajax({type: "POST", url: "listarest.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarcar1').click(function(){$.ajax({type: "POST", url: "listarcar1.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarcatres').click(function(){$.ajax({type: "POST", url: "listarcatres.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarzonas').click(function(){$.ajax({type: "POST", url: "listarzonas.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listargal').click(function(){$.ajax({type: "POST", url: "listargal.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarimag').click(function(){$.ajax({type: "POST", url: "listarimag.php", success: function(a) {$('#contenido').
                    html(a);}});});
                $('#listartrans').click(function(){$.ajax({type: "POST", url: "listartrans.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarcattrans').click(function(){$.ajax({type: "POST", url: "listarcattrans.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listaroft').click(function(){$.ajax({type: "POST", url: "listaroft.php", success: function(a) {$('#contenido').html(a);}});});
                $('#listarserhot').click(function(){$.ajax({type: "POST", url: "listarserhot.php", success: function(a) {$('#contenido').html(a);}});});
                    });
            </script>
    </head>
    <body>

<!--        <pre> -->
        <?php
        //se utiliza error_reporting('0') para que no muestre los warning de las 
        //variables no inicializadas.
        error_reporting('0');
        $_valor3=1;
        $link=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $paginador1= new paginador();
        $a_prensa = $paginador1->paginar(consulta::getconsulta(0,"",$_valor3), "0", "4");

        ?>
        <!-- </pre> -->




        <div id="body-bg">
            <!-- Telefono/Email -->
            <?php cabecera::getPreCabecera(); ?>
            <!-- End Telefono/Email -->
            <!-- Begin Sidebar Menu -->
            <div id="content">
            <div class="col-md-2">
                <?php menuadmin::getdinamica();?>

            </div>
            <!-- End Top Menu -->
            <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            <div class="col-md-10">
            <div id="contenido" name="contenido">
            </div></div>
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

            <script type="text/javascript">
                    document.getElementsByTagName('a').onclick = cargaContenido;
                      function cargaContenido() {
                          $('#contenido').load(href);   
                      }
            </script>
    </body>
</html>
<!-- === END FOOTER === -->