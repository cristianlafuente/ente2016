<?php
require_once 'config/config.php';
require_once 'config/Db.php';
require_once 'paginador.php';
require_once 'consulta.php';
require_once 'cabecera.php';
require_once 'infointeresante.php';
require_once 'eventoscarrousel.php';
//require_once 'menudinamico.php';
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
        //se utiliza error_reporting('0') para que no muestre los warning de las 
        //variables no inicializadas.
        error_reporting('0');
        $paginador1= new paginador();
//        $pagina1= $_GET["pagina"];
 //       $a_prensa = $paginador1->paginar(consulta::getconsulta(0,""), "0", "4");
 //       $params1 = $paginador1->getRangoPaginacion();
        
        // LISTAR INFORMACION DEL ENTE
        $paginador3= new paginador();
   //     $a_info = $paginador3->paginar(consulta::getconsulta(5,""),"0","");

        // LISTAR ¿DONDE IR? DEL ENTE
        $paginador4= new paginador();
   //     $a_dondeir=$paginador4->paginar(consulta::getconsulta(6,""),"0","");

        // LISTAR SERVICIOS DEL ENTE
        $paginador5= new paginador();
   //     $a_servicios=$paginador5->paginar(consulta::getconsulta(7,""),"0","");

        // LISTAR ¿QUE HACER? DEL ENTE
        $paginador6= new paginador();
    //    $a_quehacer=$paginador6->paginar(consulta::getconsulta(8,""),"0","");



        // LISTAR DE GALERIAS DE IMAGENES
      //  $paginador7= new paginador();
      //  $a_imagenes=$paginador7->paginar(consulta::getconsulta(12,""),"0","");
        ?>


        <div id="body-bg">

            <!-- Phone/Email -->
            <?php cabecera::getPreCabecera(); ?>
            <!-- End Phone/Email -->
            <!-- Header -->
            <div id="header">
                <?php  cabecera::getCabecera(); ?>            
            </div>
            <!-- End Header -->
            <!-- Top Menu -->
            <div id="hornav" class="bottom-border-shadow">
                <?php //cabecera::getMenu(); 
                 //       cabecera::getMenu2($a_info,$a_servicios);
                ?>

            </div>
            <!-- End Top Menu -->
            <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <div class="col-md-12">
                            <h2>6 Column Portfolio</h2>
                            <!-- Filter Buttons -->
                            <div class="portfolio-filter-container margin-top-20">
                                <ul class="portfolio-filter">
                                    <li class="portfolio-filter-label label label-primary">
                                        filter by:
                                    </li>
                                    <li>
                                        <a href="#" class="portfolio-selected btn btn-default" data-filter="*">All</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-default" data-filter=".code">Coding</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-default" data-filter=".design">Design</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-default" data-filter=".audio">Audio</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-default" data-filter=".video">Video</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Filter Buttons -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 portfolio-group no-padding">
                            <!-- Portfolio Item -->
<!--                            <div class="col-md-2 portfolio-item margin-bottom-40 audio">-->
                        <?php
                               //LISTAR DE GALERIAS DE IMAGENES
                                $paginador7 = new paginador();
                                $pagina = $_GET["pagina"];
                                //es con el archivo consulta_vieja
                                //$a_imagenes = $paginador7->paginar(consulta::getconsulta(12,""),$pagina,"");
                                $a_imagenes = $paginador7->paginar(consulta::getconsulta(9,"",""),$pagina,"");
                                //$params2 = getPaginacion();
                                $params1= $paginador7->getPaginacion();

                        ?>
                            </div>
                         <!-- End Portfolio Item -->
                        <ul class="portfolio-group">
                        <?php $a=0;
                            foreach($a_imagenes as $row):
                            $a=$a +1;
                        ?>
                            <!-- Portfolio Item -->
                            <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                                <?php $b=$row['id']; 
                                echo "<a href='page-imggaleria.php?galeria=".$b."'>" ?>
                                <!--<a href="#">-->
                                    <figure class="animate fadeInLeft">
                                        <!--<img alt="image1" src="assets/img/frontpage/image1.jpg"> -->
                                        <?php 
                                        //la linea siguiente es con la consulta vieja
                                        //echo"<img alt='image1' src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['imagen']."'>
                                        echo"<img alt='image1' src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['imagen']."'>

                                        <figcaption>
                                            <h3>".$row['nombre']."</h3>
                                            <span>".$row['descripcion']."</span>
                                        </figcaption>";
                                        ?>
                                    </figure>
                                </a>
                            </li>
                            <!-- //Portfolio Item// -->
                        <?php endforeach ;
                            //echo $a;
                        ?>
                        </ul>
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


                        <!--end de Portfolio -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <div id="base">
                <?php // panelmenudinamico::getPMD($a_info,$a_dondeir,$a_servicios,$a_quehacer ); ?>
            </div>
            <!-- Footer -->
            <?php cabecera::getfooter(); ?>
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