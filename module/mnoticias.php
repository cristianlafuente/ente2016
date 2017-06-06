            <div id="content" class="bottom-border-shadow">
                    <div class="container background-white bottom-border">
                    <br>
                    <div> <h2> Ultimas noticias</h2>                        
                    </div>
                    <div class="row margin-vert-30 text-left">
                    <div class="card-deck"><!-- inicio del card deck -->
			<!-- DIV DE CARDS DE BOOTSRATS PARA LAS NOTICIAS -->                   
				<?php foreach($a_prensa as $row): ?>
				<?php if ($detect->isMobile()){  ?>
	      				<div class="col-xs-12">
	      			<?php }else{ ?>
					<div class="col-md-3">
				<?php } ?>
<!--      				<div class="card" style="width: 20rem;">-->
      				<div class="card card-inverse">

					<?php
                                            if (is_null($row['archivo'])) {
                                                echo "<img src='../uploads/image/1428594767 - Circuitos.jpg'  alt='Card image cap' class='card-img'style='max-width:100%;height:150px;'>";
                                            } else{ ?>
                                             <img class="card-img-top" <?php echo "src='../uploads/image/".$row['archivo']."' ";  ?> alt="Card image cap" style="max-width:100%;height:150px;">
                                             <?php } ?>
                                  <?php echo "<a href='page-articulo.php?v1=".$row['padre_id']."&v2=".$row['id']."' style='font-family:Lato'>";?>
				  <div class="card-img-overlay">
				  <h6 class="card-title" ><?php echo $row['titulo']; ?></h6></a>
				  </div>
				</div></div>
				<?php 
				if ($detect->isMobile()){
				echo "<div style:'font-size:12px;'> &nbsp </div>";} ?>
				<!--FIN DEL DIV CARDS DE NOTICIAS-->
				<?php endforeach ?>
                </div> <!--fin del card decks -->
                </div>
                   <a href="pages-prensa.php" class="btn btn-tucuman" style="font-family:Lato">Más noticias.. »</a>
                  </div>
