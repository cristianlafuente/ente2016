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
		echo "<div id='carousel-example' class='carousel slide' data-ride='carousel'>
                            <!-- Carousel Indicators -->
                                <ol class='carousel-indicators'>
                                    <li data-target='#carousel-example' data-slide-to='0' class='active'></li>";
                                    $contadoreventos= count($a_eventos);
                                    $roweventos=$a_eventos;
                                    for($i=0;$i<$contadoreventos ;$i++){ 
                                        echo "<li data-target='#carousel-example' data-slide-to='".$i."'></li>";
                                    }
                                echo "</ol>

                            <!-- End Carousel Indicators -->
                            <!-- Carousel Images -->
                            <div class='carousel-inner' role='listbox'>
                                <div class='item active'>
                                    <img data-src='holder.js/900x500/auto/#777:#777' alt='900x500' src='assets/img/eventos/slide1.jpg' data-holder-rendered='true'>
                                <!-- ----- SE INSERTARA EL MES DEL EVENTO ---------- -->
                                    <div class='carrousel-caption'><h2>";
                                        $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                                        echo "Eventos para el mes de ".$arrayMeses[date('m')-1];
                                        echo "cantidad de eventos: ".$contadoreventos."/n";
                                        echo $roweventos[0]['titulo'];

                                    echo "</h2> </div>
                                </div>";
                                //----Se incia la serie de items del mes
                                $a=0;

                                foreach($a_eventos as $roweventos){ 
                                    $a=$a+1; 
                                    echo "<div class='item'>
                                        <img data-src='holder.js/900x500/auto/#777:#777' alt='900x500' src='assets/img/eventos/slide".$a.".jpg' data-holder-rendered='true'>
                                        <div class='carrousel-caption'> <h3>".$roweventos['titulo'].$roweventos['grafico_id']."</h3></div>
                                    </div>";}
                            echo "
                            </div>
                            <!-- End Carousel Images -->
                            <!-- Carousel Controls -->
                            <a class='left carousel-control' href='#carousel-example' role='button' data-slide='prev'>
                                <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'> <span class='sr-only'> Previo </span>
                            </a>
                            <a class='right carousel-control' href='#carousel-example' role='button' data-slide='next'> 
                                <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span> <span class='sr-only'>Siguiente</span>
                            </a>
                            <!-- End Carousel Controls -->
                        </div>";
	}
}
?>