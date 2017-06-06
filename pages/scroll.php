<?php
include('../config/Db.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$link,$limit);
}
function showData($data,$link,$limit){
  $page = $data['page'];
   if($page==1){
   $start = 0;  
  }
  else{
  $start = ($page-1)*$limit;
  }
  
  //$sql = "select * from ajaxpage order by id asc limit $start,$limit";
  

  $sql = "SELECT hot.id as 'hotid', hot.nombre, hot.estrellas, datcon.direccion, datcon.telefono, datcon.mail, lol.id, lol.nombre as 'lolnombre', hot.categoria_hoteles_id, cat.nombre as 'catnombre', hot.archivo
        FROM hoteles AS hot INNER JOIN categoria_hoteles AS cat ON hot.categoria_hoteles_id=cat.id
                inner join datos_contactos AS datcon ON hot.datos_contactos_id=datcon.id
                INNER JOIN localidades AS lol ON datcon.localidades_id=lol.id
            where hot.idiomas_id=1 order by hotid asc limit $start,$limit";
  $str='';
  $data = $link->query($sql);
  if($data!=null && $data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      //$str.="<div class='data-container'><p>".$row['id']."</p><p>".$row['firstname']."</p><p>".$row['lastname']."</p></div>";
      /*$str.="<div class='data-container'><p>".$row['hotid']."</p><p>".$row['nombre']."</p><p>".$row['catnombre']."</p></div>";*/

      $str.="<div class='datos' style='width:60%;'><a href='page-hotel.php?hotel=".$row['hotid']."'><h3><strong>".$row['nombre']."</strong></h3></a><p class='text-left'><span type='span' class='label label-success'>".$row['catnombre']."</span></p></br>";
                for($i=0; $i<$row['estrellas']; $i++){
                   $str.="<small> <i class='fa-star color-secundary animate FadeIn animated'></i> </small>";
                    } 
                $str.="</br><p class='label'><strong>Direcci贸n: </strong>".$row['direccion']."</p></br><p class='label '><strong> Localidad: </strong>".$row['lolnombre']."</p></br><p class='label'><strong>Telefono: </strong>".$row['telefono']."</p></br><p class='label web'><strong>Email: </strong>".$row['mail']."</p></br></div><div class='logo' style='width:30%;'><img src='http://www.tucumanturismo.gob.ar/uploads/image//".$row['archivo']."'  alt='thumb' align='right'></div>";
   }
   $str.="<input type='hidden' class='nextpage' value='".($page+1)."'><input type='hidden' class='isload' value='true'>";
   }else{
    $str .= "<input type='hidden' class='isload' value='false'><p>Finished</p>";
   }
  
   
echo $str; 

}

?>