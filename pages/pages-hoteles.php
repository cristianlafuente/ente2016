<!-- === BEGIN CONTENT === -->
<div id="content">
    <div class="container background-white" display:table>
        <div class="row margin-vert-30">
            <div class="col-md-12"> <h2>ALOJAMIENTOS</h2> </div>
        </div>
        <DIV CLASS="col-md-12">
        <!--SE INGRESA EL CONTADOR DE PAGINAS DE LOS HOTELES -->
        <?php
        $paginador7 = new paginador();
        $pagina = $_GET['pagina'];
        $a_serhoteles = $paginador7->paginar(consulta::getlistaservicios(1,$_valor3),$pagina,"");
        $params1= $paginador7->getPaginacion();
        ?>
        <!-- FIN DEL CONTADOR -->
        <!-- INICIO DEL PORTFOLIO DE HOTELES -->
        <ul class="cuadros_servicios">
        <?php     
        $datos=$a_serhoteles;
        foreach ($datos as $row) { 
            if (!($detect->isMobile())){ 
/*                $a="style='width: 360px;'";
                $c="style='width: 240px;'";
                $d="style='width: 90px;'"; */
                $a="style='width: 45%;'";
                $c="style='width: 60%;'";
                $d="style='width: 30%;'";

            }
            else{
                $a="style='width:100%;'";
                $c="style='width:60%;'";
                $d="style='width:30%;'";
            }
            ?>
            <li <?php echo $a;?> >
<!--            <div class="col-md-6 cal-xs-12 margin-bottom-40 filer-code" display: table-cell;  float:none>-->
                    <!-- ITEM DE LA FECHA -->
            <div class="datos" <?php echo $c; ?> >
                <?php $b=$row['hotid']; 
                echo "<a href='page-hotel.php?hotel=".$b."'>";
                echo "<h3><strong>".$row['nombre']."</strong></h3></a>";
                echo "<p class='text-left'><span type='span' class='label label-success'>".$row['catnombre']."</span></p></br>";
                for($i=0; $i<$row['estrellas']; $i++){
                   echo "<small> <i class='fa-star color-secundary animate FadeIn animated'></i> </small>";
                    } 
                echo "</br>";
                echo "<p class='label'><strong>Direcci贸n: </strong>".$row['direccion']."</p></br>";
                echo "<p class='label '><strong> Localidad: </strong>".$row['lolnombre']."</p></br>";
                echo "<p class='label'><strong>Telefono: </strong>".$row['telefono']."</p></br>";
                echo "<p class='label web'><strong>Email: </strong>".$row['mail']."</p></br>";
                ?>
            </div>
            <div class="logo" <?php echo $d; ?> >
            <?php echo "<img src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['archivo']."'  alt='thumb' align='right'>";                                 ?>                        
            </div>
            
            <!--</div>-->
            </li>
            <?php } ?>
        </ul>

            <!--FINAL DEl GRUPO DE HOTELES -->
            <!-- PASADOR DE PAGINAS -->
                    <div class="text-left">
                        <ul>
                        <!--<ul class="pagination">-->
                            <!-- Elemento Inicial del paginador-->
                            <li style="display:inLine; margin-right: 5px;">
                            <?php if ($params1['primero']):?>
                                <a href="index.php?page=pages-hoteles.php&pagina=<?php echo $params1['primero'];?>">
                                   <button class="btn btn-primary" type="button"> 
                                   <i class="fa fa-fast-backward"></i>
                                 Primero </button></a>
                            <?php else:?>
                                    <button class="btn btn-default"> <i class="fa fa-fast-backward"></i>
                                 Primero </button> <?php endif;?></li>
                            <!-- Elemento Anterior del paginador-->
                            <li style="display:inline; margin-right:5px;">
                            <?php if($params1['anterior']):?>
                                <a href="index.php?page=pages-hoteles.php&pagina=<?php echo $params1['anterior'];?>"> 
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-backward"></i>
                                        Anterior </button> </a>
                            <?php else:?>
                                <button class="btn btn-default" type="button"> <i class="fa fa-backward"></i>
                                 Anterior</button><?php endif;?></li>
                            <!-- Elemento Siguiente del paginador-->
                            <li style="display:inLine; margin-right:5px;">
                            <?php if($params1['siguiente']):?>
                                <a href="index.php?page=pages-hoteles.php&pagina=<?php echo $params1['siguiente'];?>">
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-forward"></i>
                                    Siguiente</button></a>
                            <?php else:?>
                                    <button class="btn btn-default" type="button"> <i class="fa fa-forward"></i>
                                Siguiente</button><?php endif; ?></li>
                            <!-- Elemento Final del paginador-->
                            <li style="display:inLine; margin-right:5px;">
                            <?php if($params1['ultimo']):?>
                                <a href="index.php?page=pages-hoteles.php&pagina=<?php echo $params1['ultimo'];?>">
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