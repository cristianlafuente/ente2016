<?php
require_once 'menudinamico.php';

class panelmenudinamico
{
	
	public function __construct()
	{
			# code...
	}

	public function getPMD($a_info,$a_dondeir,$a_servicios,$a_quehacer)
	{
	?>
                <div class="container bottom-border padding-vert-30">
                    <div class="row">
                        <!-- Disclaimer -->
                        <div class="col-md-3">
                            <?php menudinamico::getMdinamico($a_info,1); ?>
                        <!--
                            <h3 class="class margin-bottom-10">Disclaimer</h3>
                            <p>All stock images on this template demo are for presentation purposes only, intended to represent a live site and are not included with the template or in any of the Joomla51 club membership plans.</p>
                            <p>Most of the images used here are available from
                                <a href="http://www.shutterstock.com/" target="_blank">shutterstock.com</a>. Links are provided if you wish to purchase them from their copyright owners.</p>-->
                        </div>
                        <!-- End Disclaimer -->
                        <!-- Contact Details -->
                        <div class="col-md-3 margin-bottom-20">
                            <?php menudinamico::getMdinamico($a_dondeir,2); ?>
                        </div>
                        <!-- End Contact Details -->
                        <!-- Sample Menu -->
                        <div class="col-md-3 margin-bottom-20">
                            <?php menudinamico::getMdinamico($a_servicios,3); ?>
                        </div>
                        <!-- End Sample Menu -->
                        <!-- Sample Menu -->
                        <div class="col-md-3 margin-bottom-20">
                            <?php menudinamico::getMdinamico($a_quehacer,4); ?>
                        </div>
                        <!-- End Sample Menu -->
                    </div>
                </div>

<?php
	}
}
?>