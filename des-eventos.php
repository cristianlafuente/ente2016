<?php

class deseventos{

	public function __construct()
	{
			# code...
	}

	public function getCabecera()
	{
		// verificamos si se ha enviado alguna variable via GET
		if(isset($_GET['id']) /*&& $_GET['categoria']*/){
  		// asignamos los valores a las variables que usaremos
  		$cat_eventos = $_GET['id'];
  		$categoria = $_GET['categoria'];
  		$clausula = "WHERE notCategoriaID = '$cat_ID'";
  		// tambien armamos el titular de la pagina
  		$titulo = "Noticias en la categoria $categoria"; 
		}else{
  			// de lo contrario el titulo sera general
  			$titulo = "Todas las noticias"; 
		}
		// armamos la consulta
		$sqlQueryNot = mysql_query("SELECT notTitulo, notTexto FROM sn_noticias $clausula", $db_link) or die(mysql_error());
		echo "<h1>$titulo</h1>";
		// mostramos las noticias otra vez usando un bucle while
			while($rowNot = mysql_fetch_array($sqlQueryNot)){
  			echo "<h1>$rowNot[notTitulo]</h1>";
  			echo nl2br($rowNot['notTexto']);
			}
	}

}
?>