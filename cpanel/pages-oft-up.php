<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<?php 
//session_start(); 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";

$e="Planilla de ingresos de ofertas";
?>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <head>
        <style>
          .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }</style>
        <!-- Title --><?php libreria::getlLibreria($e); ?>
                <script type="text/javascript">
                function salir() 
                { 
                document.location.href="mainindex.php"; 
                } 
            </script>

    <script language="javascript" src="js/jquery.js"></script>
                    <script language="javascript">
        $(document).ready(function(){
            $("#category").change(function () {
                $("#category option:selected").each(function () {
                    id_category = $(this).val();
                    $.post("subcategories.php", { id_category: id_category }, function(data){
                        $("#subcategory").html(data);
                    });         
                });
            })
        });
    </script>
    </head>
    <body>
    <!-- Start Phone/Email -->  <?php cabecera::getPreCabecera(); ?>    <!-- End Phone/Email -->
    <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Register Box -->
                        <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                            <form class="signup-page" action="artnew.php"  enctype="multipart/form-data" method="POST">
                                <div class="signup-header">
                                    <h2>Creando Nuevo Ofertas</h2>
                                </div>
                                <label>Titulo <span class="color-red"></label>
                                <input name="titulo" class="form-control margin-bottom-20" type="text">
                                <label>Copete <span class="color-red"></label>
                                <input name="descripcion_corta" class="form-control margin-bottom-20" type="textarea">
                                <label>Contenido <!--<span class="color-red">*</span>--> </label>
                                <input name="descripcion_larga" class="form-control margin-bottom-20" type="textarea">
                                <div>
        <!--INSERCION DEL TIPO DE ARTICULO-->
                                <label>Tipo de Articulo: <span class="color-red" /></label>
                                <select name="tipo">
                                    <option value="0">Selección:</option>
                                    <?php  
                                            $_datos="SELECT id, nombre FROM tipos";
                                            $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                          while ($row = mysql_fetch_assoc($consulta)) {
                                                
                                      echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; } ?>
                                </select><br /></div>
        <!--INSERCION DE TIPO DE OFERTA-->
                                <div>
                                    <div>
                                        <select name="category" id="category">
                                        <OPTION VALUE="1">Hoteles</OPTION>
                                        <OPTION VALUE="2">Transportes</OPTION>
                                        <OPTION VALUE="3">Restaurantes/Bares</OPTION>
                                        </SELECT>
                                    </div>
                            </div>
                              
        <!--INSERCION DE TIPO DE LA RELACION DEL ARTICULO-->
                                <div><label>Listado</label>
                                    <select name="subcategory" id="subcategory">
                                    <?php 
                                        $id_category = $_POST['id_category'];
                                        echo "<option value='".$id_category."'>".$id_category."</option>";
                                        switch ($id_category) {
                                        case 1: $_datos="select nombre, id from hoteles"; break;
                                        case 2: $_datos="select nombre, id from transportes"; break;
                                        case 3: $_datos="select nombre, id from restos"; break;
                                        default: $_datos="select titulo, id from articulos"; break;
                                    }

                                    $consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
                                     while ($row = mysql_fetch_assoc($consulta)) {
                                        echo '<option value="'.$row[id].'">'.$row[nombre].'</option>'; }                                                 
                                    //}
                                    ?></select>
                                </div>

        <!-- INSERCION DE LA IMAGEN Y PREVIA VISTA-->
                                <div class="nomfoto space"> 
                                <label> Imagen <span class="color-red"/> </label><!--<input name="archivo" class="foto" type="file" /> -->
                                <input type="file" name="imagen" id="files" />
                                <!--<input type="file" id="files" name="archivo[]" /> -->
                                <br /> <output id="list"></output>
<!--                                <input name="archivo" type="file" />-->
                                </div><br />


        <!-- BOTON PARA AGREGAR EL ARTICULO-->
                                <hr>
                                <div class="row">
                                    <div class="col-md-10 text-left">
                                        <input class="btn btn-primary" type="submit" name="Aceptar">
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <input type="button" class="btn btn-danger" name="Cancelar" value="Cancelar" onClick="salir();">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Register Box -->
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
            <!-- === BEGIN FOOTER === -->
            <!-- Footer --> <?php cabecera::getfooter(); ?> <!-- End Footer -->
            <!-- JS --><?php libreria::getScripts(); ?>

    </body>
</html>
<!-- === END FOOTER === -->