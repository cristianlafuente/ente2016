<?php
?><!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white" display:table>
                    <div class="row margin-vert-30">
                        <div class="col-md-12">
                            <h2>ALOJAMIENTOS</h2>
                        </div>
                    </div>
                <DIV CLASS="col-md-12">
                <!--SE INGRESA EL CONTADOR DE PAGINAS DE LOS HOTELES -->
                        <?php
                                $paginador7 = new paginador();
                                $pagina = $_GET['pagina'];
                                $a_serhoteles = $paginador7->paginar(consulta::getlistaservicios(1,$_valor3),$pagina,"");
                                $params1= $paginador7->getPaginacion();

                        ?>
                    <!--        </div> -->

                <!-- FIN DEL CONTADOR -->

                <!-- INICIO DEL PORTFOLIO DE HOTELES -->
		<!-- <ul class="portfolio-group"> -->
                    <?php     
                    //$a=1;
                    $datos=$a_serhoteles;
                    foreach ($datos as $row) { ?>
                    <div class="col-md-6 cal-xs-12 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
			<div class="panel panel-success">
	                        <div class="clearfix">
                        		<div class="col-xs-7 col-sm-6 col-lg-8" > 
	                                <?php $b=$row['hotid']; 
                                    echo '<a href="index.php?page=page-hotel.php&hotel='.$b.'">';
	                                echo "<h4 class='panel-title'><center><strong>".$row['nombre']."</strong></center></h4>";
	                                echo "<center>";
	                                for($i=0; $i<$row['estrellas']; $i++){
        	                           echo "<small> <i class='fa-star color-secundary animate FadeIn animated'></i> </small>";
                		           }
                		        echo "</center>"; ?>
                                	</div>
                                	<div class="col-xs-5 col-sm-6 col-lg-4">
	                                <?php
        	                        echo "<img src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['archivo']."' class='logohotel' alt='thumb' align='right'>";
//                	                 echo "</a>";
                        	         ?>                        
                               		</div>
                        	</div>
                        	<div class="panel-body">
	                            	<?php //echo "<p class='text-left'><span type='span' class='label label-success'>".$row['catnombre']."</span></p>";?>
        	                </div>
        	                <table class="table">    
                	        <?php
	  	             	    echo "<tr><td><p class='text-left'><span type='span' class='label label-success'>".$row['catnombre']."</span></p></td></tr>";
	                            echo "<tr><td><p class='text-left'><strong>Dirección:</strong>".$row['direccion']." - ".$row['lolnombre']."</p></td></tr>";
	                            echo "<tr><td><p class='text-left'><strong>Telefono:</strong>".$row['telefono']."</p></td></tr>";
	                            echo "<tr><td><p class='text-left'><strong>Email:</strong>".$row['mail']."</p></td></tr>";
	                        ?>
				</table>
                        </div>           
                    <!-- FIN DE ITEM DE LA FECHA -->
                    <?php //echo "</div>";  ?>
                    </div>

                    <?php } ?>
                    <!-- </ul> -->
                    </DIV>
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