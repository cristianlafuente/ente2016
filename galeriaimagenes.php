<?php

/**
* 
*/
class galeriaImagenes
{
	
	public function __construct()
	{
			# code...
	}

	public function getgeneral($a_imagenes)
	{?>

                    <ul class="portfolio-group">
                        <?php $a=0;
                            foreach($a_imagenes as $row):
                            $a=$a +1;
                        ?>
                            <!-- Portfolio Item -->
                            <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                                <?php $b=$row['id']; 
                                echo "<a href='page-imggaleria.php?galeria=".$b."'>" ?>
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
                        <?php endforeach ;
                        ?>

                    </ul>



<?php

	}
	
	public function getgeneralmovil($a_imagenes)
	{
		foreach($a_imagenes as $row):
                $a=$a +1; ?>
		<div class="col-xs-12">
		      <div class="thumbnail">
			<?php  echo "<a href='page-imggaleria.php?galeria=".$b."' target='_blank'>" ?>
		        <?php echo"<img alt='image1' src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['imagen']."' style='width:100%'>"; ?>
			<div class="caption">
			<?php echo "<h3>".$row['nombre']."</h3>"; ?>
		        </div>
	                </a>
		      </div>
		</div>
		<?php endforeach ;
	}
	
	public function getImgSelector($a_imagenes,$opcion)
	{
		switch ($opcion) {
				    case 1: 
				    	galeriaImagenes::getgeneral($a_imagenes);
				    break;
				    case 2:
				    	galeriaImagenes::getgeneralmovil($a_imagenes);
				    break;
				 }
	}
}
?>