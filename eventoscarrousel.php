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
		echo " <div class='col-md-12'> 
                    <H2 text-align='center'>
                            Eventos del mes de "; 
                            $arrayMeses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

                    echo $arrayMeses[date('m')-1]."</H2>
                </div>

        <div id='carousel-example' class='carousel slide' data-ride='carousel'>
                            <!-- Carousel Indicators -->
                                <ol class='carousel-indicators'>
                                    <li data-target='#carousel-example' data-slide-to='0' class='active'></li>";
                                    $contadoreventos= count($a_eventos);
                                    $roweventos=$a_eventos;
                                    for($i=0;$i<$contadoreventos ;$i++){ 
                                        echo "<li data-target='#carousel-example' data-slide-to='".$i."'></li>";
                                    }
                                echo "</ol>
                            <div class='clearfix'></div>
                            <!-- End Carousel Indicators -->
                            <!-- Carousel Images -->
                            <div class='carousel-inner'>
                                <div class='item active'>
                                <!-- ----- SE INSERTARA EL MES DEL EVENTO ---------- -->
                                    <div class='col-md-6'>
                                    <h2>";
                              //          $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                                        echo "EVENTOS DEL MES DE ".$arrayMeses[date('m')-1];
                                        echo "cantidad de eventos: ".$contadoreventos."/n";
                                        echo $roweventos[0]['titulo'];

                                    echo "</h2> </div>
                                    <div class='col-md-6'>
                                    <img src='assets/img/eventos/slide1.jpg'> </div>
                                </div>";
                                //----Se incia la serie de items del mes
                                //$a=0;

                                foreach($a_eventos as $roweventos){ 
                                    //$a=$a+1; 
                                    echo "<div class='item'>
                                        <div class='col-md-6'> <h3><a href='pages-eventos.php'>".$roweventos['titulo'].$roweventos['grafico_id']."</a></h3></div>
                                        <div class='col-md-6'> <img src='http://www.tucumanturismo.gob.ar/uploads/image/".$roweventos['archivo']."'></div>
                                    </div>";}
                            echo "
                            </div>
                            <!-- End Carousel Images -->
                            <!-- Carousel Controls -->
                            <a class='left carousel-control' href='#carousel-example' data-slide='prev'>
                                <span class='glyphicon glyphicon-chevron-left'></span>
                            </a>
                            <a class='right carousel-control' href='#carousel-example' data-slide='next'>
                                <span class='glyphicon glyphicon-chevron-right'></span>
                            </a>
                            <!-- End Carousel Controls -->
                        </div>";
	}
}
?>