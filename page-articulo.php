<?php

require_once 'config/config.php';
require_once 'config/Db.php';
require_once 'paginador.php';
require_once 'consulta.php';
require_once 'cabecera.php';
require_once 'infointeresante.php';
require_once 'eventoscarrousel.php';
require_once 'panelmenudinamico.php';
require_once 'carro3.php';
require_once 'galeriaimagenes.php';


?>
<?php
        //se utiliza error_reporting('0') para que no muestre los warning de las 
        //variables no inicializadas.
        error_reporting('0');
        //echo $datos;
        //$_valor=$datos;//ELEMENTO ESPECIFICO DEL EVENTO
        //$xxx=1100;
        $_valor1=($_GET['v1']);
        echo $_valor1;
        $_valor2=($_GET['v2']);
        echo $_valor2;
        //valor del idioma por defecto
        $paginador= new paginador();
        //SE INGRESARÁ EL ID DEL PADRE Y DEL ARTICULO
        $a_articuloseleccionado=$paginador->paginar(consulta::getdevolver(1,$_valor1,$_valor2,$_valor3),"0","");
        //($opcion, $padre,$articulo,$idioma)

       ?>



            <!-- End Top Menu -->
            <!-- === END HEADER === -->
          <!-- === BEGIN CONTENT === -->
            <div id="content">

                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!--<div class="col-md-12">-->
                        <div class="container-fluid">
                         <?php foreach($a_articuloseleccionado as $row): ?>
                            <h2><?php echo $row['titulo'] ;?></h2>
                            <div class="row">
                                <!--<div class="col-md-6 animate fadeIn">-->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate fadeIn">
                                   <?php 
                                            if (is_null($row['archivo'])) {
                                                echo "<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Tucuman-CasaIndependencia1.jpg/220px-Tucuman-CasaIndependencia1.jpg'  alt='imagen' class='margin-top-10'";
                                            } else{
//                                            echo "<img src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['portada1']."'  alt='imagen' class='margin-top-10'";}
                                            echo "<img src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['archivo']."'  alt='imagen' class='margin-top-10'";}
  
                                    ?>
                                    
                                </div>
                                <!--<div class="col-md-6 margin-bottom-10 animate fadeInRight">-->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate fadeInRight">
                                    <h3 class="padding-top-10 pull-left"> <small><?php echo $row['especial']?></small> 
                                    </h3>
                                    <div class="clearfix"></div>
                                    <h4>
                                        <?php 

                                        if(is_null($row['copete']) and is_null($row['contenido'])){ echo "Para más información contactarse a informes.";}
                                            else {echo "<em>".$row['copete']."</em>";}
                                        ?>
 
                                    </h4>
                                    <p class="text-justify"><?php echo $row['contenido'];
                                    $galeriaid=$row['galeria_id'];
                                    $paginadordesubpaginas= new paginador();
                                    //SE INGRESARÁ EL ID DEL PADRE Y DEL ARTICULO
                                    $apadre=$row['id'];
                                    $a_artsub=$paginadordesubpaginas->paginar(consulta::getdevolver(3,$apadre,"",$_valor3),"0","");//getdevolver($opcion, $padre,$articulo,$idioma)
                                    ?></p>
                                </div>
                            </div>
                         <?php endforeach ?>
                         </div>

                        <hr class="margin-bottom-40">
                            <!-- SE CREA UN PORTFOLIO DE IMAGENES DE LA GALERIA EN CUESTION-->

                        <!--<div class="col-md-12 portfolio-group no-padding">-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 portfolio-group no-padding">

                            <!-- Portfolio Item -->
<!--                            <div class="col-md-2 portfolio-item margin-bottom-40 audio">-->
                        <?php
                                if(!is_null($a_artsub)){
                                    echo "<ul class='portfolio-group'>";
                                    foreach($a_artsub as $row){
                                        echo " <li class='portfolio-item col-sm-4 col-xs-6 margin-bottom-40'>";
                                        $b=$row['id']; 
                                        echo "<a href='page-articulo.php?v1=".$apadre."&v2=".$b."'>
                                              <figure class='animate fadeInLeft'>";
                                        echo"<img alt='image1' src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['archivo']."'>
                                             <figcaption>
                                             <h3>".$row['titulo']."</h3>
                                             </figcaption>
                                             </figure> 
                                             <h4>".$row['titulo']."</h4>
                                             </a> </li>";
                                    }
                                }

                               if(is_null($galeriaid)){ //echo "PROXIMAMENTE...";
                                }
                                else{
                               //LISTAR DE GALERIAS DE IMAGENES
                                $paginador7 = new paginador();
                                $pagina = $_GET["pagina"];
                                $a_imagenes = $paginador7->paginar(consulta::getdevolver(2,$galeriaid,"",$_valor3),$pagina,"");
                                $params1= $paginador7->getPaginacion();
                        ?>
                        <!-- End Portfolio Item -->
                        
                        <ul class="portfolio-group">
                        <?php $a=0;
                            foreach($a_imagenes as $row):
                                if(is_null($row)){ exit;}
                            else{
                            $a=$a +1;
                        ?>
                            <!-- Portfolio Item -->
                            <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                                <?php $b=$row['id']; 
                                echo "<a href='page-imggaleria.php?galeria=".$b."'>" ?>
                                <!--<a href="#">-->
                                    <figure class="animate fadeInLeft">
                                        <!--<img alt="image1" src="assets/img/frontpage/image1.jpg"> -->
                                        <?php echo"<img alt='image1' src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['imagen']."'>
                                        <figcaption>
                                            <h3>".$row['nombre']."</h3>
                                            <span>".$row['descripcion']."</span>
                                        </figcaption>";
                                        ?>
                                    </figure>
                                </a>
                            </li>
                            <!-- //Portfolio Item// -->
                        <?php 
                                }
                                endforeach ;
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
                        <?php } ?>
                        </div>


                        <!--end de Portfolio -->
                        </div>
                            <hr class="margin-bottom-40">
                            <a href="index.php" class="btn btn-primary" role="button">Regresar </a>
                        </div>
                <!--AGREGAR BOTON ATRAS-->
                <div>
                </div>
                <!--FIN BOTON ATRAS-->
                    </div>
                </div> 
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->