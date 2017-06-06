                            <div class="recent-post">
                              <div class="col-md-8">
                              <?php 

                                echo "<h5>". $row['catnombre']." </h5>"; 
                             
                               echo "<span> <br>Dirección:</br>".$row['direccion']."; ".$row['lolnombre']." (Tucumán)</span>";
                                echo "<span > <br>Telefono:</br>".$row['telefono']."</span>";
                                echo "<span > <br>email:</br>".$row['mail']."</p>";
                            ?></div>
                            <div class="col-md-4">
                            <?php
                                echo "<img class='pull-left' src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['archivo']."'  style='max-width:120px;max-height:120px;' alt='thumb'>";

                            ?>
                            </div>
                            </div>
                            <div class="clearfix"></div>