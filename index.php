<?php
require 'config/config.php';
require 'config/Db.php';
require 'paginador.php';
require 'consulta.php';
require 'cabecera.php';
include 'contenedorcarrousel.php';
include 'infointeresante.php';
include 'eventoscarrousel.php';
include 'panelmenudinamico.php';
include 'carro3.php';
include 'galeriaimagenes.php';
require 'resolucion.php';
require 'Mobile_Detect.php';
?>


<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <?php include 'module/metadatos.php' ?>
   </head>
    <body>
    

<!--        <pre> -->
        <?php
        $GLOBALS['detect'] = new Mobile_Detect();
        $GLOBALS['link'] = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        //se utiliza error_reporting('0') para que no muestre los warning de las 
        //variables no inicializadas.
        error_reporting('0');
        $GLOBALS['_valor3'] = 1;
        $paginador1= new paginador();
        $a_prensa = $paginador1->paginar(consulta::getconsulta(0,"",$_valor3), "0", "4");

        /*PAGINADOR Y OBJETO PARA CARRUSEL DE EVENTOS */
        $paginador2= new paginador();
        $a_eventos = $paginador2->paginar(consulta::getconsulta(1,"",$_valor3), "0", "101");


        // LISTAR INFORMACION DEL ENTE
        $paginador3= new paginador();
        $a_info = $paginador3->paginar(consulta::getconsulta(2,17,$_valor3),"0","");
        //$a_info = $paginador3->paginar(consulta::getconsulta(5,16,1),"0","");

        // LISTAR ¿DONDE IR? DEL ENTE
        $paginador4= new paginador();
        $a_dondeir=$paginador4->paginar(consulta::getconsulta(4,18,$_valor3),"0","");
        //$a_dondeir=$paginador4->paginar(consulta::getconsulta(6,15,1),"0","");

        // LISTAR SERVICIOS DEL ENTE
        $paginador5= new paginador();
        $a_servicios=$paginador5->paginar(consulta::getconsulta(5,16,$_valor3),"0","");
        //$a_servicios=$paginador5->paginar(consulta::getconsulta(7,"",1),"0","");

        // LISTAR ¿QUE HACER? DEL ENTE
        $paginador6= new paginador();
        $a_quehacer=$paginador6->paginar(consulta::getconsulta(6,17,$_valor3),"0","");
        //$a_quehacer=$paginador6->paginar(consulta::getconsulta(8,"",1),"0","");

        // LISTAR GALERIAS DE IMAGENES
        $paginador7= new paginador();
        $a_imagenes=$paginador7->paginar(consulta::getconsulta(9,"",$_valor3),"0","");
        //$a_imagenes=$paginador7->paginar(consulta::getconsulta(12,"",1),"0","");
        ?>
        <!-- </pre> -->




        <div id="body-bg">
            <!-- Telefono/Email -->
            <?php 
            if (!($detect->isMobile())){
                cabecera::getPreCabecera(); 
                cabecera::getCabecera();
            }
            ?>
            <!-- End Header -->
            <!-- Top Menu -->
            <div id="hornav" class="bottom-border-shadow">
                <?php cabecera::getMenu2($a_info,$a_servicios); ?>
            </div>
            <!--<img id='loading' src='img/loading.gif'>-->
            <div id="contenido">
            <?php include("module/pages.php"); ?>
            <img id='loading' src='img/loading.gif'>
            <div id="demoajax" cellspacing="0">
            <br style="clear:both;" />
            </div>
            <!-- === END CONTENT === -->
    
            <!-- JS -->
            <?php include("module/mscripts.php") ?>
            <!-- End JS -->
    </body>
</html>
<!-- === END FOOTER === -->