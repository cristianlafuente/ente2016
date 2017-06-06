<?php
class CarroEvento
{
	
	public function __construct()
	{
			# code...
	}

	public function getCarro()
	{
				echo " <div class='col-md-12'> 
                    <H2 text-align='center'>
                            Eventos del mes de "; 
                            $arrayMeses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

                    echo $arrayMeses[date('m')-1]."</H2>
                <br></div>";

?>
                      <div id="carousel-example-2" class="carousel slide alternative" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <div class="row">
        <div class="col-md-3"><img src="assets/img/slideshow/01.png" style="max-width:100%;height:195px;"><h4>Maratón Don Orione</h4><p>01/10/2016</p></div>
        <div class="col-md-3"><img src="assets/img/slideshow/02.png" style="max-width:100%;height:195px;"><h4>Concierto Federal. Septiembre Musical</h4><p>02/10/2016</p></div>
        <div class="col-md-3"><img src="assets/img/slideshow/03.png" style="max-width:100%;height:195px;"><h4>Campeonato Tucumano de Duatlon. 4ta Fecha</h4><p>02/10/2016</p></div>
        <div class="col-md-3"><img src="assets/img/slideshow/04.png" style="max-width:100%;height:195px;"><h4>101º Reunion Nacional de Física</h4><p> 04/10/2016</p></div>
      </div>
    </div>
    <div class="item">
      <div class="row">
        <div class="col-md-3"><img src="assets/img/slideshow/05.png" style="max-width:100%;height:195px;"><h4>XII Encuentro Nacional y VI Congreso Internacional de Historia Oral</h4><p>05/10/2016</p></div>
        <div class="col-md-3"><img src="assets/img/slideshow/06.png" style="max-width:100%;height:195px;"><h4>51º Festival Nacional "Monteros de la Patria Fortaleza del Folclore"</h4><p>06/10/2016</p></div>
        <div class="col-md-3"><img src="assets/img/slideshow/07.png" style="max-width:100%;height:195px;"><h4>XXIII Jornadas Argentinas de Tiflología</h4><p>07/10/2016 - 09/10/2016</p></div>
        <div class="col-md-3"><img src="assets/img/slideshow/08.png" style="max-width:100%;height:195px;"><h4>1º Encuentro Nacional de la Hermandad Chivera Argentina</h4><p>08/10/2016 - 09/10/2016</p></div>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-2" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-2" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<?php 
	}

}
?>