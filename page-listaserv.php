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
        <title>Servicios - Ente Tucumán Turismo</title>
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
        $a_prensa = $paginador1->paginar(consulta::getconsulta(0,"",1), "0", "4");

        /*PAGINADOR Y OBJETO PARA CARRUSEL DE EVENTOS */
        $paginador2= new paginador();
        $a_eventos = $paginador2->paginar(consulta::getconsulta(1,"",1), "0", "101");


        // LISTAR INFORMACION DEL ENTE
        $paginador3= new paginador();
        $a_info = $paginador3->paginar(consulta::getconsulta(2,17,1),"0","");
        //$a_info = $paginador3->paginar(consulta::getconsulta(5,16,1),"0","");

        // LISTAR ¿DONDE IR? DEL ENTE
        $paginador4= new paginador();
        $a_dondeir=$paginador4->paginar(consulta::getconsulta(4,15,1),"0","");
        //$a_dondeir=$paginador4->paginar(consulta::getconsulta(6,15,1),"0","");

        // LISTAR SERVICIOS DEL ENTE
        $paginador5= new paginador();
        $a_servicios=$paginador5->paginar(consulta::getconsulta(5,16,1),"0","");
        //$a_servicios=$paginador5->paginar(consulta::getconsulta(7,"",1),"0","");

        // LISTAR ¿QUE HACER? DEL ENTE
        $paginador6= new paginador();
        $a_quehacer=$paginador6->paginar(consulta::getconsulta(6,17,1),"0","");
        //$a_quehacer=$paginador6->paginar(consulta::getconsulta(8,"",1),"0","");

     // LISTAR DE EVENTOS QUE QUEDAN
        //$paginador7= new paginador();
        //$a_eventosfin=$paginador7->paginar(consulta::getconsulta(9,""),"0","");
        //$a_eventosfin=$paginador7->paginar(consulta::getconsulta(10,"",$_valor3),"0","");

        //OPCION TRAIDA PARA SABER CUAL ES EL SERVICIO A TRAER
        $_valor=($_GET['v1']);
        $_opcion=($_GET['v2']);
        ?>

        <div id="body-bg">
             <!-- Telefono/Email -->
                <?php cabecera::getPrecabecera();?>
            <!-- End Telefono/Email -->
            <!-- Header -->
            <div id="header">
                 <?php
                    cabecera::getCabecera(); ?>
            </div>
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
                            <h2><?php  switch ($_opcion){
                                        case 2: echo "Gastronomía"; break;
                                        case 3: echo "Transporte"; break;
                                        case 4: echo "Agencia de Viajes"; break;

                            }//crear rutina para cambiar titulo aqui 
                            ?>
                            </h2>
                        </div>
                    </div>
                <DIV CLASS="col-md-12">
                <!--SE INGRESA EL CONTADOR DE PAGINAS DE LOS HOTELES -->
                        <?php
                               //LISTAR DE GALERIAS DE IMAGENES
                                $paginador7 = new paginador();
                                $pagina = $_GET["pagina"];
                                //rutina de seleccion de servicio
                                switch ($_opcion) {
                                    case 2:
                                        $a_serhabilitado=$paginador7->paginar(consulta::getlistaservicios(2,$_valor3),$pagina,10);
                                        break;
                                    case 3:
                                        $a_serhabilitado=$paginador7->paginar(consulta::getlistaservicios(3,$_valor3),$pagina,"");
                                        break;
                                    case 4:
                                        $a_serhabilitado=$paginador7->paginar(consulta::getlistaservicios(4,$_valor3),$pagina,"");
                                        break;
                                    default:
                                        # code...
                                        break;
                                }
                                $params1= $paginador7->getPaginacion();

                        ?>
                            </div>

                <!-- FIN DEL CONTADOR -->

                <!-- INICIO DEL PORTFOLIO DE HOTELES -->
                 <ul class="portfolio-group">
                    <?php     
                    $datos=$a_serhabilitado;
                    foreach ($datos as $row) { ?>
                     <div class="col-md-6 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <?php
                    echo "<div class='panel panel-default'>";
                    switch ($_opcion) {
                        case 2:
                            echo "<div class='panel-heading'><a href='page-resto.php?resto='".$row['id']."'>";
                            echo "<h4 class='panel-title'><strong>".$row['nombre']."</strong></h4></a></div>";
                            echo "<div class='panel-body'><div><p class='text-left'><span type='span' class='label label-success'>".$row['categoria']."</span></p>";
                            echo "<p class='text-left'><strong>Horario: </strong>".$row['horario']."</p>";
                            echo "<p class='text-left'><strong>Direccion: </strong>".$row['direccion']." - ".$row['lolnombre']."</p>";
                            echo "<p class='text-left'><strong>Telefono: </strong>".$row['telefono']."</p></div></div>";
                            break;
                        
                        case 3:
                            echo "<div class='panel-heading'><a href='page-resto.php?resto='".$row['id']."'>";
                            echo "<h4 class='panel-title'><strong>".$row['nombre']."</strong></h4></a></div>";
                            echo "<div class='panel-body'><p class='text-left'><span type='span' class='label label-success'>".$row['categoria']."</span></p>";
                            echo "<p class='text-left'><strong>Direccion: </strong>".$row['direccion']." - ".$row['lolnombre']."</p>";
                            echo "<p class='text-left'><strong>Telefono: </strong>".$row['telefono']." - <strong>mail: </strong>".$row['mail']."</p>";
                            echo "<p class='text-left'><strong>web: </strong>".$row['web']."</p></div>";
                            break;
                    
                        case 4:
                            echo "<div class='panel-heading'>";
                            echo "<div class='panel-body'><p class='pull-left'>".$row['contenido']."</p></div>";
                            
                            break;
                        default:
                            # code...
                            break;
                        }
                    echo "</div>";
                    ?>
                    </div>

                               <?php } ?>
                    </ul>
                    <!--</DIV>-->
                
            <!--FINAL DEl GRUPO DE HOTELES -->
            <!-- PASADOR DE PAGINAS -->
                <?php if($_opcion!=4){ ?>
                    <div class="row margin-vert-30">
                        <div class="text-left">
                        <ul>
                            <!-- Elemento Inicial del paginador-->
                            <li style="display:inLine; margin-right: 5px;">
                            <?php if ($params1['primero']):?>
                                <a href="?pagina=<?php echo $params1['primero'];?>&v2=<?php echo $_opcion;?>">
                                   <button class="btn btn-primary" type="button"> <i class="fa fa-fast-backward"></i>
                                 Primero </button></a>
                            <?php else:?>
                                    <button class="btn btn-default"> <i class="fa fa-fast-backward"></i>
                                 Primero </button> <?php endif;?></li>
                            <!-- Elemento Anterior del paginador-->
                            <li style="display:inline; margin-right:5px;">
                            <?php if($params1['anterior']):?>
                                <a href="?pagina=<?php echo $params1['anterior'];?>&v2=<?php echo $_opcion;?>"> 
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-backward"></i>
                                        Anterior </button> </a>
                            <?php else:?>
                                <button class="btn btn-default" type="button"> <i class="fa fa-backward"></i>
                                 Anterior</button><?php endif;?></li>
                            <!-- Elemento Siguiente del paginador-->
                            <li style="display:inLine; margin-right:5px;">
                            <?php if($params1['siguiente']):?>
                                <a href="?pagina=<?php echo $params1['siguiente'];?>&v2=<?php echo $_opcion;?>">
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-forward"></i>
                                    Siguiente</button></a>
                            <?php else:?>
                                    <button class="btn btn-default" type="button"> <i class="fa fa-forward"></i>
                                Siguiente</button><?php endif; ?></li>
                            <!-- Elemento Final del paginador-->
                            <li style="display:inLine; margin-right:5px;">
                            <?php if($params1['ultimo']):?>
                                <a href="?pagina=<?php echo $params1['ultimo'];?>&v2=<?php echo $_opcion;?>">
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-fast-forward"></i>
                                    Ultimo</button></a>
                            <?php else:?>
                                    <button class="btn btn-default" type="button"> <i class="fa fa-fast-forward"></i>
                                    Ultimo</button><?php endif;?></li>
                        </ul>
                        </div>
                    </div>
                    <?php }?>
                </div>               
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <div id="base">
                    <?php  panelmenudinamico::getPMD($a_info,$a_dondeir,$a_servicios,$a_quehacer ); ?>
            </div>
            <!-- Footer -->
            <div id="footer" class="background-grey">
                <div class="container">
                    <div class="row">
                        <!-- Footer Menu -->
                        <div id="footermenu" class="col-md-8">
                            <ul class="list-unstyled list-inline">
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">Sample Link</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Footer Menu -->
                        <!-- Copyright -->
                        <div id="copyright" class="col-md-4">
                            <p class="pull-right">(c) 2014 Your Copyright Info</p>
                        </div>
                        <!-- End Copyright -->
                    </div>
                </div>
            </div>



 
        <!-- Acción sobre el botó con id=boton y actualizamos el div con id=capa -->
        <!-- <script type="text/javascript">
            $(document).ready(function() {
                $("#boton").click(function(event) {
                    $("#capa").load("/demos/2013/03-jquery-load03.php",{valor1:'primer valor', valor2:'segundo valor'}, function(response, status, xhr) {
                          if (status == "error") {
                            var msg = "Error!, algo ha sucedido: ";
                            $("#capa").html(msg + xhr.status + " " + xhr.statusText);
                          }
                        });
                });
            });         
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