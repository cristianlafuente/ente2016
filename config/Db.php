<?php
class Db {
public function connect($is_utf8 = null) {
    
    //if(!$link = mysql_connect(DB_HOST, DB_USER, DB_PASS)){
    if(!$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS)){
    //if(!$link = mysql_connect(DB_HOST,DB_USER,DB_PASS)){
        die('Error al conectarse al Servidor');
	}
    if(!mysqli_select_db($link, DB_NAME)){
	die('Error no se ecuentra la Base de Datos');
	}
	//Agregado (OSO) 03/10/2016 -- Prueba texto acentuado UTF-8
	if (is_null($is_utf8)) { 
     mysqli_query($link,"SET NAMES 'utf8'"); 
    } 
    return $link;
		
    }
    
}
