<?php
require_once 'config/config.php';
require_once 'config/Db.php';
require_once 'paginador.php';
require_once 'consulta.php';


        //se utiliza error_reporting('0') para que no muestre los warning de las 
        //variables no inicializadas.
        error_reporting('0');
        //echo $datos;
        //$_valor=$datos;//ELEMENTO ESPECIFICO DEL EVENTO
        //$xxx=1100;
        $_valor=($_GET['evento']);
        echo $_valor;

        $paginador= new paginador();
        $a_eventosseleccionado=$paginador->paginar(consulta::getconsulta(11,$_valor),"0","");
?>
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <div class="col-md-12">
                        
                         <?php foreach($a_eventosseleccionado as $row): ?>
                            <h2><?php echo $row['titulo'] ;?></h2>
                            <div class="row">
                                <div class="col-md-6 animate fadeIn">
                                   <?php echo "<img src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['archivo']."'  alt='imagen' class='margin-top-10'";?>
                                    <ul class="list-inline about-me-icons margin-vert-20">
                                        <li>
                                            <a href="#">
                                                <i class="fa-lg fa-border fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa-lg fa-border fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa-lg fa-border fa-dribbble"></i>
                                            </a>
                                        </li>
                                        <!--<li>
                                            <a href="#">
                                                <i class="fa-lg fa-border fa-google-plus"></i>
                                            </a>
                                        </li>-->
                                    </ul>
                                  </div>
                                <div class="col-md-6 margin-bottom-10 animate fadeInRight">
                                    <h3 class="padding-top-10 pull-left"> <small>Maraton</small> 
                                    </h3>
                                    <div class="clearfix"></div>
                                    <h4>
                                        <?php echo "<em>".$row['copete']."</em>";?>
 
                                    </h4>
                                    <p><?php echo $row['contenido'];?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row animate fadeInUp">
                                <h2 class="text-center margin-top-10">DATOS</h2>
                                <p class="text-center margin-bottom-30"><strong>Fecha Inicio:</strong>
                                    <?php echo $row['Inicio'];?>
                                </p>
                                <p class="text-center margin-bottom-30"><strong>Fecha Fin:</strong>
                                <?php echo $row['Fin'];?></p>
                                <p class="text-center margin-bottom-30"><strong>Lugar:</strong>
                                <?php echo $row['direccion']." - ".$row['localidad'];?></p>
                                <h2 class="text-center margin-top-10">
                                <?php echo $row['X']." - ".$row['Y'];?>
                                </h2>
                            </div>
                            <hr class="margin-bottom-40">
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
