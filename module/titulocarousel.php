<div id="slideshow" class="bottom-border-shadow">
    <div class="container no-padding background-white bottom-border">
        <div class="row">
            <!-- Carousel Slideshow -->
            <?php 
            $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $_datos="SELECT id, archivo, tipo, estado FROM imagenes where tipo=4 and estado=1 order by id DESC";
            $consulta = mysqli_query($link, $_datos) or die(mysqli_error($link));
            contenedorcarrousel::getCarro($consulta);
            ?>
            <!-- End Carousel Slideshow -->
        </div>
    </div>
</div>