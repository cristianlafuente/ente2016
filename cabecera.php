<?php
session_start(); 
require_once 'menudinamico.php';
/**
* 
*/
class cabecera
{
	
	public function __construct()
	{
			# code...
	}


    public static function getPreCabecera()
    {
        ?>
        <div id="pre-header" class="background-gray-lighter">
                <div class="container no-padding">
                    <div class="row hidden-xs">
                        <div class="col-sm-6 padding-vert-5">
                            <strong>Telefono:</strong>&nbsp;(0381) - 4303644 | (0381) - 4222199
                        </div>
                        <div>
                            <?php 
                            if (isset($_SESSION['userid']))
                                echo $_SESSION['usuario'];
                            ?>
                        </div>
                        <div class="col-sm-6 text-right padding-vert-5">
                            <strong>Email:</strong>&nbsp;informes@tucumanturismo.gob.ar
                        </div>
                    </div>
                </div>
            </div>
        <?php 
    }

	public function getCabecera()
	{
			echo "<div id='header'>
                    <div class='container'>
                    <div class='row'>
                        <!-- Logo -->
                        <div class='logo'>
                            <a href='index.php' title=''>
                             <!--       <img src='assets/img/bicentenario_tucuman.gif' alt='Logo' /> -->
                             <img src='assets/img/icon/logo_tucuman.png' alt='Logo' />
                            <!--    <img src='assets/img/logo.png' alt='Logo' /> -->
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>
                </div></div>";
         }

    public function getMenu2($a_info,$a_servicios)
    {?>
         <div class='container no-padding border-bottom'>
                    <div class='row'>
                        <div class='col-md-10 no-padding'>
                            <div class='visible-lg'>
                                <ul id='hornavmenu' class='nav navbar-nav'>
                                    <li>
                                        <a href='index.php' class='fa-home active'>Inicio</a>
                                    </li>
                                    <li>
                                        <!--  <span class='fa-gears'>Información</span>-->

                                        <?php menudinamico::getMenuT($a_info,1);?>
                                    </li>
                                    <li>
                                        <?php menudinamico::getMenuT($a_servicios,3);?>

                                    </li>
                                    <li>
                                        <span class='fa-comment'><a href='contact.php'>Contactenos</a></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    <?php }
     
     public static function getfooter(){
        echo "<div id='footer' class='background-grey'>
                <div class='container'>
                    <div class='row'>
                        <!-- Footer Menu -->
                        <div id='footermenu' class='col-md-8'>
                            <ul class='list-unstyled list-inline'>
                                <li>
                                    <a href='#' target='_blank'>Sample Link</a>
                                </li>
                                <li>
                                    <a href='#' target='_blank'>Sample Link</a>
                                </li>
                                <li>
                                    <a href='#' target='_blank'>Sample Link</a>
                                </li>
                                <li>
                                    <a href='#' target='_blank'>Sample Link</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Footer Menu -->
                        <!-- Copyright -->
                        <div id='copyright' class='col-md-4'>
                            <p class='pull-right'>(c) 2017 Your Copyright Info EATT </p>
                        </div>
                        <!-- End Copyright -->
                    </div>
                </div></div>";
     }

     public function getMenuRedesSociales(){
        ?>
            <ul class="list-inline about-me-icons margin-vert-20">
                <li> <a href="#"> <i class="fa-lg fa-border fa-linkedin"></i> </a> </li>
                <li> <a href="#"> <i class="fa-lg fa-border fa-facebook"></i> </a> </li>
                <li> <a href="#"> <i class="fa-lg fa-border fa-dribbble"></i> </a> </li>
                <li> <a href="#"> <i class="fa-lg fa-border fa-google-plus"></i> </a> </li>
            </ul>
     <?php }

}
?>