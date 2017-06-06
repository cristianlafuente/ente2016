<?php

class InfoInteresante
{
	
	public function __construct()
	{
			# code...
	}

public function getIInteresante()
    {
        ?>
          <!--<div class='col-md-4 text-center'>-->
                        <div class='col-md-3 text-center'><a href='page-articulo.php?v1=0&v2=17'>
                            <!--<i class='fa fa-car fa-4x color-secundary animate fadeIn'></i>-->
                            <i class='animate fadeIn'><img src='img/iconos/quehacer-01.png'></i></a>
                            <h3 class='padding-top-10 animate fadeIn'><strong>¿Que hacer?</strong></h2>
                            <p id="pal1" class='animate fadeIn text-justify' >Si  algo caracteriza a Tucumán, es la movida nocturna. Durante toda la semana, en especial de jueves a domingo, el visitante podrá disfrutar de centenares de bares, peñas, pubs, discotecas, salas de juego, teatros.</p>
                        </div>
                        <div class='col-md-3 text-center'><a href='page-articulo.php?v1=15&v2=20'>
                            <i class='animate fadeIn'><img src='img/iconos/dondeir-01.png'></i></a>
                            <!--<i class='fa fa-map-marker fa-4x color-primary animate fadeIn'></i>-->
                            <h3 class='padding-top-10 animate fadeIn'><strong>¿Que conocer?</strong></h2>
                            <p class="paal">Tucumán encierra algunos de los destinos más paradisíacos de Argentina. Con la ventaja de tener distancias cortas y buen clima durante todo el año.</pal>
                        </div>

                       <div class='col-md-3 text-center'>
                            <a href='pages-hoteles.php'>
                            <!--<i class='fa fa-bed fa-4x color-secundary animate fadeIn'></i>-->
                            <i class='animate fadeIn'><img src='img/iconos/dondedormir-01.png'></i></a>
                            <h3 class='padding-top-10 animate fadeIn'><strong>¿Donde dormir?</strong></h2>
                            <p id="pal3" class='animate fadeIn text-justify'>Tucumán posee una gran variedad de lugares de descanso para todas las clases de bolsillo .</p>
                        </div>


                        <div class='col-md-3 text-center'><a href='page-listaserv.php?v1=&v2=2'>
                            <!--<i class='fa-bar-chart fa-4x color-primary animate fadeIn'></i> -->
                            <i class='animate fadeIn'><img src='img/iconos/dondecomer-01.png'></i></a>

                            <h3 class='padding-top-10 animate fadeIn'><strong>¿Donde comer?</strong></h2>
                            <p id="pal4" class='animate fadeIn text-justify'>Las opciones son de lo más diversas: tanto para degustar platos regionales como empanadas, humitas o locros como para disfrutar de comidas nacionales e  internacionales.</p>
                        </div>
<?php 
    }
}

?>