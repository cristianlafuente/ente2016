<?php
require_once 'config/config.php';
require_once 'config/Db.php';
require_once 'paginador.php';
require_once 'consulta.php';
require_once 'cabecera.php';
require_once 'panelmenudinamico.php';
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
        <title>Eventos - Ente Tucumán Turismo</title>
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
        <!--Agregado para cambiar la vista de los paneles-->
        <link rel="stylesheet" href="css/panel.css" rel="stylesheet">

        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
        <!-- SCRIPT QUE ABRE LOS LINKS EN LA MISMA PAGINA DE MANERA DINAMICA -->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    </head>
    <body>

<?php
        //se utiliza error_reporting('0') para que no muestre los warning de las 
        //variables no inicializadas.
        error_reporting('0');
        $_valor3=1;

        $paginador1= new paginador();
        $a_prensa = $paginador1->paginar(consulta::getconsulta(0,"",$_valor3), "0", "4");

        
        /*PAGINADOR Y OBJETO PARA CARRUSEL DE EVENTOS */
        $paginador2= new paginador();
        $a_eventos = $paginador2->paginar(consulta::getconsulta(1,"",$_valor3), "0", "101");

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

        // LISTAR DE EVENTOS QUE QUEDAN
        $paginador7= new paginador();
        $a_eventosfin=$paginador7->paginar(consulta::getconsulta(11,"",$_valor3),"0","");
        //$a_eventosfin=$paginador7->paginar(consulta::getconsulta(10,"",$_valor3),"0","");

        ?>

        <div id="body-bg">
             <!-- Telefono/Email -->
            <?php cabecera::getPreCabecera(); ?>
            <!-- End Telefono/Email -->
            <!-- Header -->
            <?php cabecera::getCabecera(); ?>
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
                        <div class="col-md-12">  <h2>AGENDA</h2>  </div>
                    </div>
                <!--<DIV CLASS="col-md-12">-->
                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12" >
                 <?php
                               //LISTAR DE GALERIAS
                                $paginador7 = new paginador();
                                 $pagina = $_GET["pagina"];
                                //$a_eventosfin=$paginador7->paginar(consulta::getconsulta(10,""),$pagina,"");
                                 $a_eventosfin=$paginador7->paginar(consulta::getconsulta(11,"",$_valor3),$pagina,"");
                                //$a_serhoteles=$paginador7->paginar(consulta::getlistaservicios(1,1),$pagina,"");
                                $params1= $paginador7->getPaginacion();
                ?>
                <!-- FIN DEL CONTADOR -->
                <!-- FIN DE EVENTO ACTUALIZADO -->
                    <ul class="portfolio-group">

                    <?php     
                    $datos=$a_eventosfin;
                    foreach ($datos as $row) { ?>
                     <div class="col-md-4 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <?php /*
                    $opcion=$row['tipos_eventos_id'];
                    switch ($opcion) {
                            case 1:  $a="fa-glass"; echo "<div class='panel panel-orange'>"; break;
                            case 2:  $a="fa-university"; echo "<div class='panel panel-aqua'>"; break;
                            case 3:  $a="fa-trophy"; echo "<div class='panel panel-red'>"; break;
                            case 4:  $a="fa-users"; echo "<div class='panel panel-blue'>"; break;
                            case 5:  $a="fa-music"; echo "<div class='panel panel-green'>"; break;
                            case 6:  $a="fa-asl-interpreting"; echo "<div class='panel panel-yellow'>"; break;}*/
                    $a="fa-university";// echo "<div class='panel panel-aqua'>";
                    ?>

                    
                    <div class="panel panel-aqua">
                        <div class="panel-heading">
                            <?php $b=$row['id']; 
                            echo "<a href='page-evento.php?evento=".$b."'>"
                            ?>
                            
                            <h3 class="panel-title"><?php 
                             $fecha_det = explode("-", $row['Inicio']);
                              $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                              echo $fecha_det[0]." - ".$arrayMeses[date('m')-1]." - ".$b." "; // imprimiría el dia
                             echo "<i class='".$a." color-secundary animate FadeIn animated'></i>";
                             
                            ?> <!--<a name="boton" class="fa-rocket" href="#"></a>--></h3></a>
                        </div>
                        <div class="panel-body">
                        <?php  echo "<h4>".$row['titulo']." </h4> <span> Fecha de Fin:". $row['Fin']."</span>";  ?>
                        <?php echo "<img src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['dire']."' style='max-height:150px;display:block;'>";?>
                        </div>
                    <?php echo "</div>";?>
                    <!-- FIN DE ITEM DE LA FECHA -->

                        </div>

                               <?php } ?>
                
                    <!--</DIV>-->
                </ul>
            <!--FINAL DEl GRUPO DE EVENTOS -->
            </DIV>
            <!-- PASADOR DE PAGINAS -->
                    <div class="text-left">
                        <ul>
                        <!--<ul class="pagination">-->
                            <!-- Elemento Inicial del paginador-->
                            <li style="display:inLine; margin-right: 5px;">
                            <?php if ($params1['primero']):?>
                                <a href="?pagina=<?php echo $params1['primero'];?>">
                                   <button class="btn btn-primary" type="button"> 
                                   <i class="fa fa-fast-backward"></i>
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
                            <!-- Elemento Actual del paginador-->
<!--                            <li style="display:inLine; margin-right:5px;">
                            <?php //for($i=1; $i<=$params1['total'];$i++): //if ($params1['actual']!=$i) :?>
                                <a href="?pagina=<?php echo $i;?>"><?php //echo $i;?></a>
                            <?php //else: echo $i; endif; endfor;?></li>   -->
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

               </div>               
            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <div id="base">
                    <?php  panelmenudinamico::getPMD($a_info,$a_dondeir,$a_servicios,$a_quehacer ); ?>
            </div>
            <!-- Footer -->
            <?php cabecera::getfooter() ;?>

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