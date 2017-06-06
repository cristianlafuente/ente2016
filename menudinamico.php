<?php


class menudinamico
{
	
	public function __construct()
	{
			# code...
	}

	public function getMDinamico($datos,$opcion)
	{
	?>
		<h3 class="margin-bottom-10">
			<?php
			switch (//$datos['padre_id']
					$opcion) {
    		case 1: echo "Información"; break;
    		case 2: echo "¿Donde ir?"; break;
    		case 3: echo "Servicios"; break;
    		case 4: echo "¿Que hacer?"; break;
    		default: echo "Menu"; break;}
			?>
		</h3>
                           <ul>
                                <?php foreach($datos as $row): ?>
                                <li>
                                    <?php echo "<a class='fa-link' href='page-articulo.php?v1=".$row['padre_id']."&v2=".$row['id']."'>".$row['titulo']." </a>"; ?>
                                </li>
                                <?php endforeach ?>                            
                                <!-- <li>
                                    <a class="fa-coffee" href="#">Nam liber tempor</a>
                                </li>-->
                           </ul> 
                            <div class="clearfix"></div>
<?php } 


	public function getMenuT($datos,$opcion)
	{
	?>
		<span class=
			<?php
			switch (//$datos['padre_id']
					$opcion) {
    		case 1: echo "'glyphicon glyphicon-book'> INFORMACIÓN"; break;
    		case 2: echo "'glyphicon glyphicon-globe'> CIRCUITOS TURÍSTICOS"; break;
    		case 3: echo "'glyphicon glyphicon-gift'> SERVICIOS"; break;
    		case 4: echo "'glyphicon glyphicon-lock'> ¿QUE HACER?"; break;
    		default: echo "Menu"; break;}
			?>
		</span>
                           <ul>
                                <?php foreach($datos as $row){
                                    

                                switch($opcion){
                                    case 1: echo "<li><a href='page-articulo.php?v1=".$row['padre_id']."&v2=".$row['id']."'>";
                                            echo $row['titulo']."</a></li>"; break;
                                    case 2: echo "<li><a href='page-lista.php?v1=".$row['id']."'>";
                                            echo $row['titulo']."</a></li>"; break;
                                    case 3: if($row['titulo']!='Alojamientos'){
                                                switch ($row['id']) {
                                                    case 225://gastronomia
                                                                $a=2;
                                                        break;
                                                  case 226: //transporte
                                                                $a=3;
                                                        break;
                                                  case 14824: //agencias de viajes
                                                                $a=4;
                                                        break;
                                                    default: $a=$row['id']; break;
                                                }
                                                //se debe corregir este codigo para que tome otros servicios que se agregan
                                                if($a<5){
                                                echo "<li><a href='page-listaserv.php?v1=&v2=".$a."'>";
                                                echo $row['titulo']."</a></li>"; }
                                                else{
                                                    echo "<li><a href='page-articulo.php?v1=16&v2=".$a."'>";
                                                    echo $row['titulo']."</a></li>";
                                                    }
                                                }
                                            else{echo "<li><a href='pages-hoteles.php'>";
                                                echo $row['titulo']."</a></li>"; }
                                            break;
                                }

                                }?>

<!--                                <li>
                                    <?php //echo "<a href='page-articulo.php?v1=".$row['padre_id']."&v2=".$row['id']."'>";
                                    // echo $row['titulo']; ?>
<!--                                    </a>
                                </li> -->
                                <?php //endforeach ?>                            
                                <!-- <li>
                                    <a class="fa-coffee" href="#">Nam liber tempor</a>
                                </li>-->
                           </ul> 
                            <div class="clearfix"></div>
<?php } 

public function getCalendario($datos,$opcion)
    { 
            foreach ($datos as $row) { ?>

                    <div class="col-md-3 margin-bottom-40 filer-code" display: table-cell;  float:none>
                    <!-- ITEM DE LA FECHA -->
                    <div class="panel panel-aqua">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php 
                             /*   $fecha_det= explode($row['fecha_inicio']); echo $fecha_det[0];
                             echo $row['Inicio'];*/
                             $fecha_det = explode("-", $row['Inicio']);
                              $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
                              echo $fecha_det[0]." - ".$arrayMeses[date('m')-1]; // imprimiría el dia
                            ?> <a class="fa-rocket" href="#"></a></h3>
                        </div>
                        <div class="panel-body"><?php  echo "Evento: ".$row['titulo']." - Fecha de Fin:". $row['Fin'];  ?></div>
                    </div>
                    <!-- FIN DE ITEM DE LA FECHA -->
                    </div>

<?php           }
    }
}
?>