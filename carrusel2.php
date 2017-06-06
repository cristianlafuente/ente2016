<?php
class carrousel
    
{ 
    public function getmostarcar($a_eventos){
     ?>
     <!-- <h1>Bootstrap Carousel with Animate.css</h1> -->
     <div id="carousel-example-generic" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <?php $contadoreventos= count($a_eventos);
                    $roweventos=$a_eventos;
                    for($i=0;$i<$contadoreventos ;$i++){ ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php $i; ?>"></li>
                    <?php } ?>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
			<!-- probar div para 3 slides -->
        <!-- First slide -->
        <div class="item active deepskyblue">

          <div class="carousel-caption">
              <h3 data-animation="animated bounceInLeft">
                  <?php 
                   // $dia=date(m);
                    
                    $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                   //$arrayDias = array( 'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
     
                    //echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
                   //echo $a_eventos['titulo'];
                    echo "Eventos para el mes de ".$arrayMeses[date('m')-1];
					echo "cantidad de eventos: ".$contadoreventos."/n";
                  
				  echo $roweventos[0]['titulo'];
				  ?>
              </h3>
              <p> <?php //echo $a_eventos['copete']; ?></p>
            <button class="btn btn-primary btn-lg" data-animation="animated zoomInUp">Button</button>  
          </div>          
        </div> <!-- /.item -->

        <!-- Second slide -->
        
        <?php 
			foreach($a_eventos as $roweventos): ?>
            <div class="item skyblue"  width:33%>
                <div class="carousel-caption">
                    <h3 class="icon-container" data-animation="animated bounceInDown">
                        <?php echo $roweventos['titulo']; echo $roweventos['grafico_id']; ?>
                    </h3>    
                    <img src="image/noticias/<?php echo $roweventos['grafico_id'];?> .jpg" height="20px" width="100%" padding="20">
                    <!--<h3><?php //echo $row['copete']; ?> </h3>-->
                     <button class="btn btn-primary btn-lg" data-animation="animated zoomInUp">Button</button>
                </div>
            </div>
            <?php endforeach ?>
      

      </div><!-- /.carousel-inner -->

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
    <?php }
}