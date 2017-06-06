            <div id="icons" class="bottom-border-shadow">
                <div class="container no-padding background-white bottom-border">
                    <div class="row">
                    <br>
                        <!-- Carousel Slideshow -->
                        <?php
                        $_idioma=1; 
                        $_datos="SELECT date_format(e.fechainicio,'%d-%m-%Y') as 'Inicio', date_format(e.fechafin,'%d-%m-%Y') as 'Fin', e.titulo, e.copete, e.estado, 
                                 e.idiomas_id, e.archivo, e.tipos_eventos_id
                                 FROM eventos AS e WHERE idiomas_id=".$_idioma."  and (date(e.fechainicio)>= DATE(CURDATE()) OR DATE(e.fechafin)>=DATE(CURDATE()))
                                 AND ((MONTH(e.fechainicio) = MONTH (CURDATE()) or MONTH(e.fechafin)=MONTH (CURDATE())) AND (year(e.fechainicio) = YEAR(CURDATE()) or 
                                 YEAR(e.fechafin)=YEAR(CURDATE()))) order by 1 asc limit 12";
                  //     $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                     if (is_null($is_utf8)) { mysqli_query($link,"SET NAMES 'utf8'"); }  
                        $consulta = mysqli_query($link, $_datos) or die(mysqli_error($link));
                            //REVISAR PARA QUE EL CARRO SE VEA 1 DE ACUERDO AL DISPOSITIVO
                            ?>

                           <?php if ($detect->isMobile()){  
                            contenedorcarrousel::getselector($consulta,1);
                                                     
                            } else { 
                             contenedorcarrousel::getselector($consulta,4);
                            } ?>    
                        <!-- End Carousel Slideshow -->
                        <a href="pages-eventos.php" class="btn btn-tucuman" style="font-family:Lato">Más Eventos.. »</a>
                    </div>
                </div>
            </div>