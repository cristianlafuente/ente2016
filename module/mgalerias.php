		<div id="portfolio" class="bottom-border-shadow">
            	<div class="container no-padding background-white bottom-border">
                <!--<div class="container bottom-border">-->
                <div><br><h2>Galerias </h2></div>
                <div class="row padding-top-40">

            <!-- creacion de las Galerias de Imagenes -->
               <?php if ($detect->isMobile()){  
            		galeriaimagenes::getgeneralmovil($a_imagenes);
            		} else{
            		galeriaimagenes::getgeneral($a_imagenes);
            		}
            ?>
                 </div><div style="border">
                <a href="pagegaleriaimg.php" class="btn btn-tucuman" role="button">Más Galerías.. »</a> </div>
            	</div>
                
            </div>