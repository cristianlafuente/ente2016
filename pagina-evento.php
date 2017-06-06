<?php
require_once 'config.php';
require_once 'Db.php';
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
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
<!-- SCRIPT QUE ABRE LOS LINKS EN LA MISMA PAGINA DE MANERA DINAMICA -->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        

<script type="text/javascript">
$(document).ready(function() { $('#div-item1').click(function(){ $.ajax({ type: "POST", url: "pageitem1.php", success: function(a) { $('#div-evento').html(a); 
    //document.getElementById('base').focus();
    document.getElementById('div-evento').scrollIntoView();
} });  }); });
$(document).ready(function() { $('#div-item2').click(function(){ $.ajax({ type: "POST", url: "pageitem2.php", success: function(a) { $('#div-evento').html(a);
    document.getElementById('div-evento').focus();
} });  }); });
$(document).ready(function() { $('#div-item3').click(function(){ $.ajax({ type: "POST", url: "pageitem3.php", success: function(a) { $('#div-evento').html(a);} });  }); });
$(document).ready(function() { $('#div-item4').click(function(){ $.ajax({ type: "POST", url: "pageitem4.php", success: function(a) { $('#div-evento').html(a);} });  }); });
$(document).ready(function() { $('#div-item5').click(function(){ $.ajax({ type: "POST", url: "pageitem5.php", success: function(a) { $('#div-evento').html(a);} });  }); });
$(document).ready(function() { $('#div-item6').click(function(){ $.ajax({ type: "POST", url: "pageitem6.php", success: function(a) { $('#div-evento').html(a);} });  }); });
$(document).ready(function() { $('#div-item7').click(function(){ $.ajax({ type: "POST", url: "pageitem7.php", success: function(a) { $('#div-evento').html(a);} });  }); });
$(document).ready(function() { $('#div-item8').click(function(){ $.ajax({ type: "POST", url: "pageitem8.php", success: function(a) { $('#div-evento').html(a);} });  }); });
</script>



    </head>
    <body>

<?php
        //se utiliza error_reporting('0') para que no muestre los warning de las 
        //variables no inicializadas.
        error_reporting('0');
        $paginador1= new paginador();
//        $pagina1= $_GET["pagina"];
        $a_prensa = $paginador1->paginar(consulta::getconsulta(0,""), "0", "4");
 //       $params1 = $paginador1->getRangoPaginacion();
        
        /*PAGINADOR Y OBJETO PARA CARRUSEL DE EVENTOS */
        $paginador2= new paginador();
 //       $pagina2= $_GET["pagina"];
        $a_eventos = $paginador2->paginar(consulta::getconsulta(1,""), "0", "101");

        // LISTAR INFORMACION DEL ENTE
        $paginador3= new paginador();
        $a_info = $paginador3->paginar(consulta::getconsulta(5,""),"0","");

        // LISTAR ¿DONDE IR? DEL ENTE
        $paginador4= new paginador();
        $a_dondeir=$paginador4->paginar(consulta::getconsulta(6,""),"0","");

        // LISTAR SERVICIOS DEL ENTE
        $paginador5= new paginador();
        $a_servicios=$paginador5->paginar(consulta::getconsulta(7,""),"0","");

        // LISTAR ¿QUE HACER? DEL ENTE
        $paginador6= new paginador();
        $a_quehacer=$paginador6->paginar(consulta::getconsulta(8,""),"0","");

        // LISTAR DE EVENTOS QUE QUEDAN
        $paginador7= new paginador();
        $a_eventosfin=$paginador7->paginar(consulta::getconsulta(9,""),"0","");
        ?>







        <div id="body-bg">
             <!-- Telefono/Email -->
            <div id="pre-header" class="background-gray-lighter">
                <div class="container no-padding">
                    <div class="row hidden-xs">
                        <div class="col-sm-6 padding-vert-5">
                            <strong>Telefono:</strong>&nbsp;(0381) - 4303644 | (0381) - 4222199
                        </div>
                        <div class="col-sm-6 text-right padding-vert-5">
                            <strong>Email:</strong>&nbsp;informes@tucumanturismo.gob.ar
                        </div>
                    </div>
                </div>
            </div>
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
                            <h2>EVENTOS DEL MES DE OCTUBRE</h2>
                            
                        </div>
                    </div>
                <DIV CLASS="col-md-12">
                    <div class="col-md-3 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    
                    <div class="panel panel-red">
                    
                        <div class="panel-heading">

                            <h3 class="panel-title">
                            <a href="#" id="div-item1" style="cursor:pointer;">01 - OCTUBRE - <i class="fa-futbol-o color-secondary animate FadeIn animated"> </i> </a>
                            </h3>
                        </div>
                        <div class="panel-body">
                        <img src="assets/img/slideshow/01.png" style="max-width:150px;max-height:150px;">
                        <h4>Maratón Don Orione </h4><span>Fecha de Fin: 01/10/2016</span></div>
                    </div>
                    <!-- FIN DE ITEM DE LA FECHA -->
                    </div>
                    <!-- ITEM 2 -->
                    <div class="col-md-3 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <a href="#" id="div-item2" style="cursor:pointer;">
                    <div class="panel panel-green">
                    
                        <div class="panel-heading">

                            <h3 class="panel-title">
                                02 - OCTUBRE - <i class="fa-music color-secundary animate FadeIn animated"></i>
                            </h3>
                        </div>
                        <div class="panel-body">
                        <img src="assets/img/slideshow/02.png" style="max-width:150px;max-height:150px;">
                        <h4>Concierto Federal. Septiembre Musical </h4><span>Fecha de Fin: 02/10/2016</span></div>
                    </div></a>
                    <!-- FIN DE ITEM DE LA FECHA -->
                    </div>
                    <!-- ITEM 3 -->
                    <div class="col-md-3 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <a href="#" id="div-item3" style="cursor:pointer;">
                    <div class="panel panel-red">
                    
                        <div class="panel-heading">

                            <h3 class="panel-title">
                                02 - OCTUBRE - <i class="fa-futbol-o color-secundary animate FadeIn animated"></i>
                            </h3>
                        </div>
                        <div class="panel-body">
                        <img src="assets/img/slideshow/03.png" style="max-width:150px;max-height:150px;">
                        <h4>Campeonato Tucumano de Duatlon. 4ta Fecha </h4><span>Fecha de Fin: 02/10/2016</span></div>
                    </div></a>
                    <!-- FIN DE ITEM DE LA FECHA -->
                    </div>
                     <!-- ITEM 4 -->
                    <div class="col-md-3 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <a href="#" id="div-item4" style="cursor:pointer;">
                    <div class="panel panel-blue" >
                    
                        <div class="panel-heading">

                            <h3 class="panel-title">
                                04 - OCTUBRE - <i class="fa-users color-secundary animate fadeIn animated"></i>
                            </h3>
                        </div>
                        <div class="panel-body">
                        <img src="assets/img/slideshow/04.png" style="max-width:150px;max-height:150px;">
                        <h4>101º Reunion Nacional de Física</h4><span>Fecha de Fin: 04/10/2016</span></div>
                    </div></a>
                    <!-- FIN DE ITEM DE LA FECHA -->
                    </div>
                    <!-- ITEM 5 -->
                    <div class="col-md-3 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <a href="#" id="div-item5" style="cursor:pointer;">
                    <div class="panel panel-blue">
                    
                        <div class="panel-heading">

                            <h3 class="panel-title">
                                05 - OCTUBRE - <i class="fa-users color-secundary animate FadeIn animated"></i>
                            </h3>
                        </div>
                        <div class="panel-body">
                        <img src="assets/img/slideshow/05.png" style="max-width:150px;max-height:150px;">
                        <h4>XII Encuentro Nacional y VI Congreso Internacional de Historia Oral</h4><span>Fecha de Fin: 05/10/2016</span></div>
                    </div></a>
                    <!-- FIN DE ITEM DE LA FECHA -->
                    </div>
                    <!-- ITEM 6 -->
                    <div class="col-md-3 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <a href="#" id="div-item6" style="cursor:pointer;">
                    <div class="panel panel-orange">
                    
                        <div class="panel-heading">

                            <h3 class="panel-title">
                                06 - OCTUBRE - <i class="fa-glass color-secundary animate FadeIn animated"></i>
                            </h3>
                        </div>
                        <div class="panel-body">
                        <img src="assets/img/slideshow/06.png" style="max-width:150px;max-height:150px;">
                        <h4>51º Festival Nacional "Monteros de la Patria Fortaleza del Folclore" </h4><span> Fecha de Fin: 06/10/2016</span></div>
                    </div></a>
                    <!-- FIN DE ITEM DE LA FECHA -->
                    </div>
                    <!-- ITEM 7 -->
                    <div class="col-md-3 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <a href="#" id="div-item7" style="cursor:pointer;">
                    <div class="panel panel-blue"  >
                    
                        <div class="panel-heading">

                            <h3 class="panel-title">
                                07 - OCTUBRE - <i class="fa-users color-secundary animate FadeIn animated"></i>
                            </h3>
                        </div>
                        <div class="panel-body">
                        <img src="assets/img/slideshow/07.png" style="max-width:150px;max-height:150px;">
                        <h4>XXIII Jornadas Argentinas de Tiflología</h4><span>Fecha de Fin: 09/10/2016</span></div>
                    </div></a>
                    <!-- FIN DE ITEM DE LA FECHA -->
                    </div>
                    <!-- ITEM 8 -->
                    <div class="col-md-3 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <a href="#"  id="div-item8" style="cursor:pointer;">
                    <div class="panel panel-blue">
                    
                        <div class="panel-heading">

                            <h3 class="panel-title">
                                08 - OCTUBRE - <i class="fa-users color-secundary animate FadeIn animated"></i>
                            </h3>
                        </div>
                        <div class="panel-body">
                        <img src="assets/img/slideshow/08.png" style="max-width:150px;max-height:150px;">
                        <h4>1º Encuentro Nacional de la Hermandad Chivera Argentina</h4><span>Fecha de Fin: 09/10/2016</span> </div>
                    </div></a>
                    <!-- FIN DE ITEM DE LA FECHA -->
                    </div>
            
                </DIV>
            <!--FINAL DE FAQ -->
            <!-- EVENTO ACTUALIZADO CDO SE HACE CLICK -->
                <div tabindex="-1" id="div-evento" class="col-mod-12">
                        

                </div>
            <!-- FIN DE EVENTO ACTUALIZADO -->
            <div class="col-md-2">

                    <a href="pagina-evento.php" id="div-regresar" class="btn btn-primary" role="button" style="cursor:pointer;"> <i class="fa-home fa-2x color-primary animate FadeIn animated">Regresar.. »</i></a>
                <!--<a href="#"  style="cursor:pointer;"> 
                <p>Regresar...</p></i></a>-->
                </div>

            </DIV>            
            
                

            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <div tabindex="0" id="base">
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