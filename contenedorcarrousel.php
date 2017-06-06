<?php

class ContenedorCarrousel
{
	
	public function __construct()
	{
			# code...
	}

	public function getCCarrousel()
	{
		echo "<div id='carousel-example' class='carousel slide' data-ride='carousel'>
                            <!-- Carousel Indicators -->
                            <ol class='carousel-indicators'>
                                <li data-target='#carousel-example' data-slide-to='0' class='active'></li>
                                <li data-target='#carousel-example' data-slide-to='1'></li>
                                <li data-target='#carousel-example' data-slide-to='2'></li>
                            </ol>
                            <div class='clearfix'></div>
                            <!-- End Carousel Indicators -->
                            <!-- Carousel Images -->
                            <div class='carousel-inner'>
                                <div class='item active'>
                                    <!--<img src='assets/img/slideshow/slide1.jpg' style='max-width:100%;height:350px;'>-->
                                    <img src='img/slideshow/slide1.jpg' style='max-width:100%;max-height:350px;'>
                                </div>
                                <div class='item'>
                                    <img src='img/slideshow/slide2.jpg' style='max-width:100%;max-height:350px;'>
                                </div>
                                <div class='item'>
                                    <img src='img/slideshow/slide3.jpg' style='max-width:100%;max-height:350px;'>
                                </div>
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

public function getCarro($a_datos)
{

    ?>
    <!--<section id="SliderTest_Container" class="col-md-12">-->
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <?php
                //require_once("DBAccess.php");
                //$DBA = new DBAccess();
                //$Datos = $DBA->GetData("SELECT * FROM autosgta");
                if ($a_datos == FALSE) {
                    echo "Ha ocurrido un error en la conexi車n. Por favor revise su configuraci車n o la consulta que ha enviado a DBAccess.php";
                } else {
                    $Rows = mysqli_num_rows($a_datos);
                    echo '<ol class="carousel-indicators">';
                    for ($i=0; $i<$Rows; $i++) {
                        if ($i == 0) {
                            echo '<li data-target="#carousel-example" data-slide-to="0" class="active"></li>';
                        } else {
                            echo '<li data-target="#carousel-example" data-slide-to="' . $i . '"></li>';
                        }
                    }
                    echo '</ol>';
                    echo '<div class="carousel-inner" role="listbox">';
                    for ($i=0; $i<$Rows; $i++) {
                        $Auto = mysqli_fetch_array($a_datos);
                        if ($i == 0) {
                            echo '<div class="item active">';
                        } else {
                            echo '<div class="item">';
                        }
                        echo '<img style="width: 100%;" src="img/slideshow/' . $Auto["archivo"] . '"  style="max-width:250px;max-height:350px;" />';
                        echo '</div>';//ITEM
                    }//FOR
                    echo '</div>';
                }//ELSE
            ?>
        </div>
    <!-- </section>-->
    <?php
    }


    public function getECarro($a_datos)
    {
    
       
        echo " <div class='col-md-12'> 
        <h2 text-align='center'>
        Eventos del mes de "; 
        $arrayMeses = array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SETIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');

        echo $arrayMeses[date('m')-1]."</h2><br></div>";
        
        
        
        
        if ($a_datos == FALSE) {
                    echo "Ha ocurrido un error en la conexión. Por favor revise su configuración o la consulta que ha enviado a DBAccess.php";
        } else {
        		//CAROUSEL QUE FUNCIONA PARA LA PC      
		        echo '<div id="carousel-example-2" class="carousel slide alternative" data-ride="carousel">';
	               $Rows = mysqli_num_rows($a_datos);
	                echo '<ol class="carousel-indicators">';
        	        $contar=$Rows/4;
                            for ($i=0; $i<$contar; $i++) {
                                if ($i == 0) {
                                    echo '<li data-target="#carousel-example" data-slide-to="0" class="active"></li>';
                                } else {
                                    echo '<li data-target="#carousel-example" data-slide-to="' . $i . '"></li>';
                                }
                            }
                            echo '</ol>';
		                //finaliza el indicador de eventos
		                //grupo de eventos
		                echo '<div class="carousel-inner" role="listbox">';
		                            for ($i=0; $i<$contar; $i++) {
		                                //$Auto = mysql_fetch_array($a_datos);
		                                if ($i == 0) {
		                                    echo '<div class="item active">';
		                                } else {
		                                    echo '<div class="item">';
		                                }
		                                for($j=0;$j<4;$j++){
		                                    $Auto = mysqli_fetch_array($a_datos);
		                                    echo '<div class="col-md-3"><img src="http://www.tucumanturismo.gob.ar/uploads/image//'.$Auto["archivo"] . '"  style="max-width:100%;max-height:195px;" />';
		                                     
		                                    echo '<h4>'.$Auto["titulo"].'</h4>';
		                                    echo '<p>Fecha Inicio: '.$Auto["Inicio"].'</p>';
		                                    echo '<p>Fecha Fin: '.$Auto["Fin"].'</p>';
		                                    echo '</div>';//cierre del item[$j]
		                                    }
		                                echo '</div>';//ITEM ACTIVO
		                            }//FOR
		                            echo '</div>';//FIN DE CARROUSEL QUE FUNCIONA PARA LA PC

                        }//ELSE
                    ?>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-2" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            
      
             
<?php        echo '</div>';//cierre del div carousel-example-2
        echo '</div>';//cierre del div gral
        
        
}

public function getICarro($a_datos)
    {
        if ($a_datos == FALSE) {
                    echo "Ha ocurrido un error en la conexi車n. Por favor revise su configuraci車n o la consulta que ha enviado a DBAccess.php";
        } else {
            echo '<div id="carousel-example-2" class="carousel slide alternative" data-ride="carousel">';
               $Rows = mysqli_num_rows($a_datos);
                echo '<ol class="carousel-indicators">';
                $contar=$Rows/4;
                            for ($i=0; $i<$contar; $i++) {
                                if ($i == 0) {
                                    echo '<li data-target="#carousel-example" data-slide-to="0" class="active"></li>';
                                } else {
                                    echo '<li data-target="#carousel-example" data-slide-to="' . $i . '"></li>';
                                }
                            }
                            echo '</ol>';
                //finaliza el indicador de eventos
                //grupo de eventos
                echo '<div class="carousel-inner" role="listbox">';
                            for ($i=0; $i<$contar; $i++) {
                                //$Auto = mysql_fetch_array($a_datos);
                                if ($i == 0) {
                                    echo '<div class="item active">';
                                } else {
                                    echo '<div class="item">';
                                }
                                for($j=0;$j<4;$j++){
                                    $Auto = mysqli_fetch_array($a_datos);
                                    echo '<div class="col-md-3"><img src="http://www.tucumanturismo.gob.ar/uploads/image//'.$Auto["archivo"] . '"  style="max-width:100%;max-height:195px;" />';
                                     
                                    echo '</div>';//cierre del item[$j]
                                    }
                                echo '</div>';//ITEM ACTIVO
                            }//FOR
                            echo '</div>';
                        }//ELSE
                    ?>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-2" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
<?php        echo '</div>';//cierre del div carousel-example-2
        echo '</div>';//cierre del div gral
}

public function getselector($a_datos,$a_opcion)
    {
 	$ccelda = ( integer ) $a_opcion;
 	
 	if ($a_opcion==4){
 	
 	echo " <div class='col-md-12'> 
         <H2 text-align='center'>Eventos de "; 
         $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
         echo $arrayMeses[date('m')-1]."</H2><br></div>";	
         } else {
         echo " <div class='col-md-12'> 
         <H5 style='text-align:center;'>Eventos de "; 
         $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
         echo $arrayMeses[date('m')-1]."</H5><br></div>";}
 	

       
        if ($a_datos == FALSE) {
                    echo "Ha ocurrido un error";
        } else {
            echo '<div id="carousel-example-2" class="carousel slide" data-ride="carousel">';
               $Rows = mysqli_num_rows($a_datos);
                echo '<ol class="carousel-indicators">';
	
                $contar=$Rows/$ccelda;
                            for ($i=0; $i<$contar; $i++) {
                                if ($i == 0) {
                                    echo '<li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>';
                                } else {
                                    echo '<li data-target="#carousel-example-2" data-slide-to="' . $i . '"></li>';
                                }
                            }
                            echo '</ol>';
                //finaliza el indicador de eventos
                //grupo de eventos
                echo '<div class="carousel-inner">';
                            for ($i=0; $i<$contar; $i++) {
                                //$Auto = mysql_fetch_array($a_datos);
                                if ($i == 0) {
                                    echo '<div class="item active">';
                                } else {
                                    echo '<div class="item">';
                                }
                                for($j=0;$j<$ccelda;$j++){
                                    $Auto = mysqli_fetch_array($a_datos);
                                    echo '<div class="col-md-3"><img src="http://www.tucumanturismo.gob.ar/uploads/image//'.$Auto["archivo"] . '"  style="max-width:100%;max-height:200px;" />';
                                     
                                    echo '<h4>'.$Auto["titulo"].'</h4>';
                                    echo '<p>Fecha Inicio: '.$Auto["Inicio"].'</p></br>';
                                    echo '<p>Fecha Fin: '.$Auto["Fin"].'</p>';
                                    echo '</div>';//cierre del item[$j]
                                    }
                                echo '</div>';//ITEM ACTIVO
                            }//FOR
                            echo '</div>';
                        }//ELSE
                    ?>
            <!-- Controls -->



            <a class="left carousel-control" href="#carousel-example-2" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-2" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
                
                
                
                
            </a>
    <?php        echo '</div>';//cierre del div carousel-example-2
        echo '</div>';//cierre del div gral
}

}

?>