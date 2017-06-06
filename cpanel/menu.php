<?php
//session_start(); 
//require_once 'menudinamico.php';
class menuadmin
{
	
	public function __construct()
	{
			# code...
	}


    public function getdinamica()
    {
    	$_consultas="show tables";
		$escala=$_SESSION['escala'];
    	$_usuario="";
    		if($escala>2){
?>
    		<!--<div class='col-md-2 no-padding'>-->
	                        <!--<ul class='social-icons pull-right'>-->
	                        <ul class="list-group sidebar-nav" id="sidebar-nav">
								<li>
                                    <span>Articulos</span>
                                    <ul>
			                            <li ><a href='#' id="listararticulos">Listado</a></li>
								        <li ><a href='#' id='tipoarticulos'>Tipo de Articulos</a></li>
                                    </ul>
                                </li>
								<li >
                                    <a href='#' id='listardatcon'>Contactos</a>
                                </li>
								<li>
                                    <a href='#' id='listarlol'>Localidades</a>
                                </li>

								<li>
                                    <span>Eventos</span>
                                    <ul>
                                       	<li><a href='#' id='listarevt'>Eventos</a></li>
										<li><a href='#' id='listartipevt'>Tipos de Eventos</a></li>                                       
                                    </ul>
                                </li>

                                <li>
                                	<span>Hoteles</span>
                                	<ul>
                                	    <li><a href='#' id='listarhot'>Hoteles</a></li>
		                                <li><a href='#' id='listarcathot'>Características Hoteles</a></li>
		                                <li><a href='#' id='listarserhot'>Servicios Hoteles</a></li>
										<li><a href='#' id='listartipser'>Tipo de Servicios</a></li>                                		
                                	</ul>
                                </li>
                                <li>
                                	<span>Restaurantes</span>
                                	<ul>
		                                <li><a href='#' id='listarest'>Restaurantes</a></li>
                                		<li><a href='#' id='listarcar1'>Características Restaurantes</a></li>
		                                <li><a href='#' id='listarcatres'>Categoria Restaurantes</a></li>
		                                <li><a href='#' id='listarzonas'>Zonas</a></li>


                                	</ul>
                                </li>
                                <li>
                                    <a href='#' id='listargal'>Galerias</a>
                                </li>

                                <li>
                                    <a href='#' id='listarimag'>Imagen</a>
                                </li>

                                <li>
                                    <a href='' target='_blank' title='Facebook'>Idiomas</a>
                                </li>

                                
                                <li>
                                    <a href='#' id='listaroft'>Ofertas</a>
                                </li>
                                <li>
                                	<span >Transportes</span>
                                	<ul>
                                <li><a href='#' id='listartrans'>Transportes</a></li>
                                <li><a href='#' id='listarcattrans'>Categoria de Transportes</a></li>
                                	</ul></li>

                                
                                <li>
                                    <a href='' target='_blank' title='Facebook'>usuarios</a>
                                </li>
                            </ul>
                        <!--</div>-->
			<?php
			}else { ?>
				<!--<div class='col-md-2 no-padding'>
                            <ul class='social-icons pull-right'>-->
                            <ul class="list-group sidebar-nav" id="sidebar-nav">
                                <li>
                                    <span>Articulos</span>
                                    <ul>
                                        <li ><a href='#' id="listararticulos">Listado</a></li>
                                        <li ><a href='#' id='tipoarticulos'>Tipo de Articulos</a></li>
                                    </ul>
                                </li>
                                <li >
                                    <a href='#' id='listardatcon'>Contactos</a>
                                </li>
                                <li>
                                    <a href='#' id='listarlol'>Localidades</a>
                                </li>

                                <li>
                                    <span>Eventos</span>
                                    <ul>
                                        <li><a href='#' id='listarevt'>Eventos</a></li>
                                        <li><a href='#' id='listartipevt'>Tipos de Eventos</a></li>                                       
                                    </ul>
                                </li>

                                <li>
                                    <a href='#' id='listargal'>Galerias</a>
                                </li>

                                <li>
                                    <a href='#' id='listarimag'>Imagen</a>
                                </li>

                            </ul>
                        <!--</div>-->
<?php }}} 
?>