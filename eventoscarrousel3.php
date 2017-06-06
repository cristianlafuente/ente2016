<?php

/**
* 
*/
class EventosCarrousel
{
	
	public function __construct()
	{
			# code...
	}

	public function getECarrousel($a_eventos)
	{
//-------------------------------------------------------------------------------------------------
$active="active";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title;?></title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="assets/carrousel/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <body>
  <hr>
    <div class="row-fluid">
    <div class="container">
        <div class="col-xs-12">
			<div id="carousel-example-captions" class="carousel slide" data-ride="carousel"> 
				<?php
					$nums_slides=mysqli_num_rows($a_eventos);
				?>
					<ol class="carousel-indicators">
						<?php 
						for ($i=0; $i<$nums_slides; $i++){
							$active="active";
							?>
							<li data-target="#carousel-example-captions" data-slide-to="<?php echo $i;?>" class="<?php echo $active;?>"></li>
							<?php
							$active="";
						}
						?>
						
					</ol> 
				<div class="carousel-inner" role="listbox"> 
				<?php
					$active="active";
					$a=0;
					while ($rw_slider=mysqli_fetch_array($a_eventos)){
						$a=$a+1;
				?>
						<div class="item <?php echo $active;?>"> 
							<img data-src="holder.js/900x500/auto/#777:#777" alt="900x500" src="assets/img/slideshow/slide<?php echo $a.".jpg'  data-holder-rendered='true'>" ?>
							<?php //echo $rw_slider['url_image'];?> 
							<div class="carousel-caption"> 
								<h3><?php echo $rw_slider['titulo'];?></h3>
							</div> 
						</div>
						<?php
						$active="";
					}
				?>
					
					 
					
				</div> 
				<a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
				<a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
			</div>
        </div>
		          
    </div>
	
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/carrousel/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="assets/carrousel/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>

<?php
//-------------------------------------------------------------------------------------------------
	}

} ?>