<?php 
include_once "../config/config.php";
include_once "../config/Db.php";
include_once "../cabecera.php";
include_once "../libreria.php";
include_once "../paginador.php";
include_once "../consulta.php";

$e="Planilla de Imagenes";

//$_datos="SELECT id, nombre, archivo FROM imagenes order by id DESC";
//$consulta = mysql_query($_datos, Db::connect()) or die(mysql_error());
?>
<html lang="es">
    <!--<![endif]-->
    <head>
        <!-- Title --> <?php libreria::getlLibreria($e); ?>
        <style>
            .thumb {
            height: 100px;
            width: :100px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }
        </style>        

    </head>
    <body>

      <?php error_reporting('0'); ?> 
    <div id="content">
       <div class="container background-white">
		    <div class="row margin-vert-30">
            <div class="col-md-12 col-md-offset-2 col-sm-offset-2">
            <DIV><h1> <?php echo $e; ?></h1></DIV>
            <div> <button type='button' class='btn btn-success btn-xs'> <a href='pages-img-up.php'> Agregar Nueva Imagen </a></button>
            <br><br>
            </div>
            
<?php
            //LISTAR DE GALERIAS DE IMAGENES
            
                                $paginador = new paginador();
                                $pagina = $_GET["pagina"];
                                //$a_imagenes = $paginador->paginar(consulta::getconsulta(12,""),$pagina,"");
                                $a_imagenes = $paginador->paginar(consulta::getconsulta(12,"",""),$pagina,"");
                                $params1= $paginador->getPaginacion();

?>
                            <DIV>
                                <label><b>Lista de Archivos Multimedia: <span class="color-red" /></b></label><br>
<?php  

//                                while($a_imagenes as $row){
                                foreach ($a_imagenes as $row) {
                                    echo "<div>";
                                        echo "<img class='thumb' src='http://www.tucumanturismo.gob.ar/uploads/image/".$row['archivo']."'>";
                                    //AQUI SE USA PARA ARMAR EL CHECKBOX DE SELECCION
                                    echo "<label>".$row['nombre']."</label>";
                                    if ($row['estado']==0) echo "<button type='button' class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-remove'></span> </button>";
                                    else
                                        echo "<button type='button' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-ok'></span> </button>";
                                        echo "<button type='button' class='btn btn-success btn-xs'> <a href='pages-lol-mod.php?v1=".$row['id']."'> Editar </a></button><button type='button' class='btn btn-danger btn-xs'> <a href='baja.php?v1=".$row['id']."&v2=3'> Eliminar </a></button></div>";
                                        }
                                     ?>

                                </DIV>
                                <div>
                        <ul>
                            <!-- Elemento Inicial del paginador-->
                            <li style="display:inLine; margin-right: 5px;">
                            <?php if ($params1['primero']):?>
                                <a href="?pagina=<?php echo $params1['primero'];?>">
                                   <button class="btn btn-primary" type="button"> <i class="fa fa-fast-backward"></i>
                                 Primero </button></a>
                            <?php else:?>
                                    <button class="btn btn-default"> <i class="fa fa-fast-backward"></i>
                                 Primero </button> <?php endif;?></li>
                            <!-- Elemento Anterior del paginador-->
                            <li style="display:inline; margin-right:5px;">
                            <?php if($params1['anterior']):?>
                                <a href="?pagina=<?php echo $params1['anterior'];?>"> 
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-backward"></i>
                                        Anterior </button> </a>
                            <?php else:?>
                                <button class="btn btn-default" type="button"> <i class="fa fa-backward"></i>
                                 Anterior</button><?php endif;?></li>
                            <!-- Elemento Siguiente del paginador-->
                            <li style="display:inLine; margin-right:5px;">
                            <?php if($params1['siguiente']):?>
                                <a href="?pagina=<?php echo $params1['siguiente'];?>">
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-forward"></i>
                                    Siguiente</button></a>
                            <?php else:?>
                                    <button class="btn btn-default" type="button"> <i class="fa fa-forward"></i>
                                Siguiente</button><?php endif; ?></li>
                            <!-- Elemento Final del paginador-->
                            <li style="display:inLine; margin-right:5px;">
                            <?php if($params1['ultimo']):?>
                                <a href="?pagina=<?php echo $params1['ultimo'];?>">
                                    <button class="btn btn-primary" type="button"> <i class="fa fa-fast-forward"></i>
                                    Ultimo</button></a>
                            <?php else:?>
                                    <button class="btn btn-default" type="button"> <i class="fa fa-fast-forward"></i>
                                    Ultimo</button><?php endif;?></li>
                        </ul>
                        </div>
 </div></div></div></div>
<?php libreria::getScripts();?>
 </body></html>