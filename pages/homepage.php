            <?php include "module/titulocarousel.php" ?>
            
            <?php include "module/minfo.php" ?>
            

            <!-- INSERCION DE LOS EVENTOS DE LA BASE DE DATOS-->
            <?php include "module/carrouseleventos.php" ?>
            <!-- FINALIZACION DE LOS EVENTOS DE LA DB-->
            <!-- INICIO DE LA SECCION NOTICIAS -->
            <?php  include "module/mnoticias.php" ?>
    		<!-- FIN DE LA SECCION PRENSA-->
            <!-- INICIO SECCION GALERIAS -->
            <?php include "module/mgalerias.php" ?>
            <!-- End Portfolio -->
            <!-- === BEGIN FOOTER === -->
            <div id="base">
            <?php  panelmenudinamico::getPMD($a_info,$a_dondeir,$a_servicios,$a_quehacer ); ?>
            </div>
            <!-- Footer -->
            <!-- End Footer -->