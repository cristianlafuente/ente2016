<?php
$title="CARRO DE BANNER";
require_once 'config/config.php';
require_once 'config/db.php';
require_once 'paginador.php';
require_once 'consulta.php';

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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <body>
  <hr>
    <div class="row-fluid">
    <div class="container">
        <!--<div class="col-xs-12 col-sm-6 col-md-6 col-lg-9"> -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="carousel-example-captions" class="carousel slide" data-ride="carousel"> 
				<?php
					$query="select date_format(e.fecha_inicio,'%d-%m-%Y') as 'Inicio', date_format(e.fecha_fin,'%d-%m-%Y') as 'Fin',  et.titulo, et.copete, et.contenido, e.grafico_id, im.archivo  from eventos as e inner join eventos_traduccion as et on e.id=et.evento_id inner join idiomas as i on et.idioma_id=i.id INNER JOIN graficos as g on e.grafico_id=g.id 
			inner join imagenes as im on g.imagen_principal_id=im.id
			where et.idioma_id=1 and ((MONTH(e.fecha_inicio) = MONTH (CURDATE()) or MONTH(e.fecha_fin)=MONTH (CURDATE())) AND (year(e.fecha_inicio) = YEAR(CURDATE()) or YEAR(e.fecha_fin)=YEAR(CURDATE())))order by 1 asc";
					$a_eventos = mysql_query($query, Db::connect());
					//$paginador2= new paginador();
 					//       $pagina2= $_GET["pagina"];
        			//$a_eventos = $paginador2->paginar(consulta::getconsulta(1,""), "0", "101");
					//$sql_slider=mysqli_query($con,"select * from slider where estado=1 order by orden");
					$nums_slides=mysql_num_rows($a_eventos);
				?>
					<ol class="carousel-indicators">
						<?php 
						for ($i=0; $i<$nums_slides; $i++){
							$active="active";
							?>
							<!--<li data-target="#carousel-example-captions" data-slide-to="<?php //echo $i;?>" class="<?php echo $active;?>"></li> -->
							<?php
							$active="";
						}
						?>
						
					</ol> 
				<div class="carousel-inner" role="listbox"> 
				<?php
					$active="active";
					while ($rw_slider=mysql_fetch_array($a_eventos)){
				?>
						<div class="item <?php echo $active;?>"> 
							<img data-src="holder.js/900x500/auto/#777:#777" alt="900x500" style="max-width:100%;height:195px;" src="http://www.tucumanturismo.gob.ar/uploads/image/<?php echo $rw_slider['archivo'];?>" data-holder-rendered="true" > 
							<div class="carousel-caption"> 
								<h3><?php echo $rw_slider['titulo'];?></h3>
								<p><?php echo $rw_slider['copete'];?></p> 
								<a class='btn btn-<?php echo $rw_slider['estilo_boton'];?> text-right' href="<?php echo $rw_slider['Inicio'];?>"><?php echo $rw_slider['Fin'];?></a> 
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
        </div><!--
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
			<h4 class='text-center'>Sistema de cotizaciones</h4>
			<a href="http://obedalvarado.pw/cotizador-web/" target="_blank"><img src="http://obedalvarado.pw/img/cotizador-banner.png" class="img-responsive"></a>
			<hr>
			<h4 class='text-center'>Sistema de inventario</h4>
			<a href="http://obedalvarado.pw/sistema-de-control-de-inventario/" target="_blank"><img src="http://obedalvarado.pw/img/sistema-control-inventario.png" class="img-responsive"></a>
		</div> -->
          
    </div>
	
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>