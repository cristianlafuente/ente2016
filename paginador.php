<?php

class paginador {
        
        private $_datos;
	private $_paginacion;
	
	public function __construct(){
		$this->_datos =array();
		$this->_paginacion=array();
		
	}
        
        public function paginar( $query, $pagina = false, $limite = FALSE ){
            if ($limite && is_numeric($limite)){
                $limite = $limite;
            }
            else {
                //$limite = 10;
                $limite = 9;
                  }
            if($pagina && is_numeric( $pagina )){
                $pagina = $pagina;
                $inicio = ($pagina - 1) * $limite;
            }
            else{
                $pagina = 1;
                $inicio = 0;
            }
            $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	    //Agregado (OSO) 03/10/2016 -- Prueba texto acentuado UTF-8
	    static $is_utf8;
	       if (is_null($is_utf8)) {mysqli_query($link,"SET NAMES 'utf8'"); } 


            $consulta = mysqli_query($link, $query) or die(mysqli_error($link));
            $registros = mysqli_num_rows($consulta);
            $total = ceil($registros / $limite);
            $query = $query . " LIMIT $inicio, $limite ";
            $consulta = mysqli_query($link, $query) or die(mysqli_error($link));
      
            while($regs = mysqli_fetch_assoc( $consulta ) )
		{
			$this->_datos[]=$regs;
		}
            
            $paginacion = array();
            $paginacion['actual'] = $pagina;
            $paginacion['total'] = $total;
            
            if($pagina > 1){
                $paginacion['primero'] = 1;
                $paginacion['anterior'] = $pagina - 1;
               }else{
                $paginacion['primero'] = "";
                $paginacion['anterior'] = "";
                 }
                 
             if($pagina < $total){
                 $paginacion['ultimo'] = $total;
                $paginacion['siguiente'] = $pagina + 1;
             }else{
                 $paginacion['ultimo'] = "";
                $paginacion['siguiente'] = "";
             }
           $this->_paginacion = $paginacion;
           return $this->_datos;
        }
        
        public function getRangoPaginacion($limite = FALSE )
        {
                 if ($limite && is_numeric($limite)){
                $limite = $limite;
            }
            else {
                $limite = 10;
                  }
                  
            $total_paginas = $this->_paginacion['total'];
            $pagina_seleccionada= $this->_paginacion['actual'];
            $rango =  ceil($limite / 2);
            $paginas = array();
            
            $rango_derecho = $total_paginas - $pagina_seleccionada;
            
            if($rango_derecho < $rango){
                $resto = $rango - $rango_derecho;
            } else {
                $resto = 0;
            }
            $rango_izquierdo = $pagina_seleccionada - ($rango + $resto);
            
            for($i = $pagina_seleccionada ; $i > $rango_izquierdo; $i--){
                if($i == 0){
                    break;
                }
                $paginas[]=$i;
            }
            sort($paginas);
            
            if($pagina_seleccionada < $rango){
                $rango_derecho = $limite;
            }else{
                $rango_derecho = $pagina_seleccionada + $rango;
            }
                
            for($i = $pagina_seleccionada + 1; $i < $rango_derecho; $i++){
                if($i > $total_paginas){
                    break;
                }
                    $paginas[]=$i;
                }
                
                $this->_paginacion['rango']= $paginas;
                return $this->_paginacion;
        }

        public function getPaginacion()
	{
		if($this->_paginacion){
			return $this->_paginacion;
		}else{
			return false;
		}
	}
}
