<?php

class consulta {
    private $_datos;
	private $_consulta;
	
	public function __construct(){
//		$this->_datos =array();
//		$this->_paginacion=array();
	}
	
	
	public static function getconsulta($opcion, $_valor, $_idioma)
	{
	switch ($opcion) {
    case 0:
		//DATOS TOMA EL VALOR DE LAS NOTICIAS EN ORDEN DESCENDENTE
		$_datos="select articulos.id AS 'id',articulos.titulo AS 'titulo',articulos.copete AS 'copete',articulos.tipo_id AS 'tipo_id',articulos.estado AS 'estado',articulos.fcreacion AS 'fcreacion',articulos.fmodificacion AS 'fmodificacion', articulos.idiomas_id as 'idiomas_id', articulos.padre_id, articulos.archivo from articulos where ((estado = 1) and (tipo_id = 16) and (idiomas_id =".$_idioma.")) order by fmodificacion desc, fcreacion desc";
//		echo $_datos;
        return $_datos;
        break;

    case 1:
			/*MUESTRA LOS EVENTOS DEL MES CON LA IMAGEN CORRESPONDIENTE PARA CARROUSEL*/
		$_datos="SELECT date_format(e.fechainicio,'%d-%m-%Y') as 'Inicio', date_format(e.fechafin,'%d-%m-%Y') as 'Fin', e.titulo, e.copete, e.estado, e.idiomas_id, e.archivo, e.tipos_eventos_id
			FROM eventos AS e WHERE idiomas_id=".$_idioma." and ((MONTH(e.fechainicio) = MONTH (CURDATE()) or MONTH(e.fechafin)=MONTH (CURDATE())) AND (year(e.fechainicio) = YEAR(CURDATE()) or YEAR(e.fechafin)=YEAR(CURDATE())))order by 1 asc";
		return $_datos;
		break;

	case 2:
		/*DATOS TOMA EL VALOR DE INFORMACION (17)*/
        $_datos="SELECT id, titulo, copete, tipo_id, padre_id  FROM articulos WHERE tipo_id=".$_valor." and idiomas_id=".$_idioma." and estado=1 ORDER BY id ASC";
		return $_datos;
        break;

    case 3:
   		 //BUSCADOR DE ARTICULOS()
        $_datos="SELECT fcreacion, fmodificacion, id, tipo_id, padre_id, estado, idiomas_id, titulo, copete, contenido FROM articulos WHERE idiomas_id=".$_idioma." and (titulo='%".$_valor."%' or contenido='%".$_valor."%') ORDER BY id DESC, tipo_id DESC";
		return $_datos;
        break;	

    case 4:
		//LISTADO DE ¿DONDE IR? PADRE_ID=15 or TIPO_ID=18
		$_datos="SELECT id, titulo, padre_id, tipo_id, copete, estado FROM articulos WHERE tipo_id=".$_valor." and idiomas_id=".$_idioma." and estado!=0 order by id ASC";
		return $_datos;
		break;

	case 5:
		//LISTADO DE SERVICIOS PADRE_ID=16
		$_datos="SELECT a.id, a.titulo, a.padre_id, a.copete, a.tipo_id, a.estado,a.idiomas_id FROM articulos as a 
		WHERE a.padre_id=".$_valor."  and a.idiomas_id=".$_idioma." and a.estado!=0 order by a.id ASC";
		return $_datos;
		break;

	case 6:
		//LISTADO DE ¿QUE HACER? PADRE_ID=17		
		$_datos="SELECT id, titulo, copete, padre_id, tipo_id, estado FROM articulos WHERE padre_id=".$_valor." and idiomas_id=".$_idioma." and estado!=0 order by id ASC";
		return $_datos;
		break;

	case 7:
		/*MUESTRA LOS EVENTOS QUEDAN DEL MES*/
		$_datos="SELECT date_format(fechainicio,'%d-%m-%Y') as 'Inicio', date_format(fechafin,'%d-%m-%Y') as 'Fin', titulo, copete, contenido  from eventos
			where idiomas_id=".$_idioma." and ((fechainicio >= CURDATE() or fechafin >= CURDATE()) 
			/* AND (MONTH(fechainicio) = MONTH(CURDATE()) OR MONTH(fechafin) = MONTH(CURDATE()))) */ order by 1";
		return $_datos;
		break;

	case 8:
		/*DEVUELVE TODO EL EVENTO SELECCIONADO */
		$_datos="SELECT e.id as 'eventos_id', e.titulo, e.copete, e.fechainicio as 'Inicio', e.fechafin as 'Fin', e.archivo,e.contenido, te.nombre as 'tipos_eventos_nombre', e.idiomas_id, e.estado, datcon.direccion, datcon.telefono, datcon.mail, datcon.web, datcon.latitud as 'X', datcon.longitud as 'Y', lol.nombre as 'localidad', lol.estado as 'localidades_estado', datcon.localidades_id, e.datos_contactos_id, e.tipos_eventos_id 
			FROM eventos as e left join tipos_eventos as te on e.tipos_eventos_id=te.id
			left join datos_contactos as datcon on e.datos_contactos_id=datcon.id
			left join localidades as lol on datcon.localidades_id=lol.id			
			WHERE e.id=".$_valor." and e.idiomas_id=".$_idioma;
		return $_datos;
		break;

	case 9:
	/******TODAS LAS GALERIAS ACTIVAS CON IMAGEN DE PORTADA *************/
		$_datos="SELECT id, estado, fcreacion as 'creado', oculta, imagen, nombre, descripcion FROM galerias WHERE estado =1 and oculta=0 and imagen<>''";
		return $_datos;
		break;

	case 10:
	/*********OBTENER GALERIA ESPECIFICA***************************/
		$_datos="SELECT g.id, g.estado, g.fcreacion,g.oculta, g.imagen, g.nombre, g.descripcion, gi.galerias_id, gi.imagenes_id, im.id as 'imagen_id', im.archivo, im.fcreacion, im.estado as 'imagen_estado', im.tipo, im.nombre as 'imagen_nombre'
			FROM galerias as g inner join galeria_imagen as gi on g.id=gi.galerias_id
     			inner join imagenes as im on gi.imagenes_id=im.id
				WHERE g.id=".$_valor." and im.estado=1";
		return $_datos;
		break;
	/******************************************************************/
	case 11:
		/*MUESTRA TODOS LOS EVENTOS DESDE EL DIA ACTUAL HACIA EL FUTURO*/
		$_datos="SELECT id, date_format(fechainicio,'%d-%m-%Y') as 'Inicio', date_format(fechafin,'%d-%m-%Y') as 'Fin', titulo, copete, contenido, tipos_eventos_id,  archivo as 'dire' from eventos
			where idiomas_id=".$_idioma." and (fechainicio >= CURDATE() or fechafin >= CURDATE()) 
			order by 2";
		return $_datos;
		break;

		/*********************************************************************************/
	case 12:
		/* DEVUELVE LA LISTA DE IMAGENES GUARDADAS EN EL SERVIDOR*/
		$_datos="SELECT id, nombre, archivo,tipo, estado FROM imagenes order by id DESC";
		return $_datos;
		break;

	}
	}


	public static function getdevolver($opcion, $padre,$articulo,$idioma)
	{
		switch ($opcion) {
			/**************DEVUELVE EL ARTICULO SOLICITADO **************/
			case 1:
				$_datos="SELECT art.id, art.titulo, art.copete, art.contenido, art.tipo_id, art.estado, art.fcreacion, art.fmodificacion, art.idiomas_id, art.datos_contactos_id, art.galerias_id, art.archivo, art.padre_id, tipos.id as 'tipos_id', tipos.nombre as 'tipos_nombre'
					FROM articulos as art INNER JOIN tipos ON 
						art.tipo_id=tipos.id 
					WHERE art.idiomas_id=".$idioma." and art.padre_id=".$padre." AND art.estado<>0 AND art.id=".$articulo." ORDER BY art.id DESC, art.tipo_id DESC";
				return $_datos;				
				break;
			/****************************************************************/
			case 2:
				/****DEVUELVE LA GALERIA ACTIVA CON IMAGEN DE PORTADA *****/
				$_datos="SELECT g.id, g.estado,g.freacion as 'creado', g.oculta, g.imagen, g.nombre, g.descripcion FROM galerias as g WHERE g.estado =1 and g.oculta=0 and g.imagen<>'' and gt.idioma_id=".$idioma." and g.id=".$padre;
				return $_datos;
				break;
			/**************************************************************/
		
			case 3:
				/***DEVUELVE TODAS LOS ARTICULOS DEPENDIENDTES DEL PADRE ******/
				$_datos="SELECT  art.fcreacion, art.fmodificacion, art.id, art.padre_id, art.tipo_id, art.titulo, art.copete, art.contenido, art.archivo, art.idiomas_id, art.estado
					FROM articulos as art
					WHERE art.idiomas_id=".$idioma." AND art.padre_id=".$padre." AND art.estado<>0 ORDER BY art.id DESC, art.tipo_id DESC";	
			return $_datos;
			break;
			/****************************************************************/
			case 4:
				/*******DEVUELVE EL RESTA SELECCIONADO - PADRE **************/

			$_datos="SELECT res.id, res.nombre, res.horario, res.estado, res.archivo, res.tripadvisor, res.fcreacion,res.fmodificacion, res.zonas_id, res.datos_contactos_id, res.idiomas_id, zonas.id, zonas.nombre as 'zonas_nombre', datcon.direccion, datcon.telefono, datcon.mail, datcon.web, datcon.latitud, datcon.longitud, lol.nombre as 'localidades_nombre', datcon.localidades_id
					FROM RESTOS AS res INNER JOIN datos_contactos AS datcon ON res.datos_contactos_id=datcon.id
						INNER JOIN localidades AS lol ON datcon.localidades_id=lol.id
						INNER JOIN zonas ON res.zonas_id=zonas.id
     				/*WHERE RES.estado=1 and RES.nombre like '%.$padre.%' */
     				WHERE RES.estado=1 and RES.id=".$padre." and
     					and REST.idioma_id=".$idioma;
			return $_datos;
			break;
		/**************************************************************/
		
		case 5:
			/******DEVUELVE EL HOTEL SELECCIONADO - PADRE ******************/
		$_datos="SELECT h.id as 'hotid',  h.nombre, h.estrellas, h.estado, h.archivo, h.booking, h.tripadvisor, h.fcreacion, h.ubicacion, h.descripcion, h.habitaciones, h.categoria_hoteles_id, h.idiomas_id, h.galerias_id, h.datos_contactos_id, categoria_hoteles.nombre as 'catnombre', datcon.direccion, datcon.telefono, datcon.mail, datcon.web, datcon.latitud, datcon.longitud, lol.nombre as 'lolnombre'
			FROM hoteles AS h INNER JOIN categoria_hoteles ON h.categoria_hoteles_id=categoria_hoteles.id
    		inner join datos_contactos AS datcon ON h.datos_contactos_id=datcon.id
    		INNER JOIN localidades AS lol ON datcon.localidades_id=lol.id
			WHERE h.idiomas_id=".$idioma." and h.estado=1 and h.id=".$padre;
		return $_datos;
		break;
		/**************************************************************/
		
		case 6:
			/****DEVUELVE LOS SERVICIOS DEL HOTEL ESPECIFICO ANTERIOR *******/
			$_datos="SELECT hsh.hoteles_id, hsh.servicios_hoteles_id, sh.nombre as 'nombreservicio', tp.nombre as 'nombretiposervicio', tp.idiomas_id
				FROM hoteles_servicios_hoteles as hsh INNER JOIN servicios_hoteles AS sh on hsh.servicios_hoteles_id=sh.id
					INNER JOIN tipos_servicios as tp on sh.tipos_servicios_id=tp.id
				WHERE hsh.hoteles_id=".$padre." and tp.idiomas_id=".$idioma;
		return $_datos;
		break;

		/**************DEVUELVE LAS HABITACIONES DEL HOTEL ESPECIFICO ANTERIOR - NO ANDA (ELIMINE LA TABLA HABITACIONES)******************/
/*		case 7:
		$_datos="SELECT habhot.id, habhot.hotel_id, habhot.cantidad, habhot.precio, nomhabtra.nombre_habitaciones_id, nomhabtra.nombre as 'habnombre', habhottra.descripcion as 'habdescripcion'
				FROM habitacion_hoteles AS habhot 
    			INNER JOIN nombres_habitaciones_traduccion AS nomhabtra ON habhot.nombre_habitaciones_id=nomhabtra.nombre_habitaciones_id
    			INNER JOIN habitaciones_hoteles_traduccion AS habhottra ON habhot.id=habhottra.habitacion_hotel_id
				WHERE habhottra.idioma_id=1 and habhot.hotel_id=".$padre." AND nomhabtra.idioma_id=1";
		return $_datos;
		break;
*/
		case 7:
		/*********************************************************************************/
		//devuelve la galeria del hotel con limite de 12 fotos
		$_datos="SELECT g.id, g.estado, g.fcreacion,g.oculta, g.imagen, g.nombre, g.descripcion, gi.galerias_id, gi.imagenes_id, im.id as 'imagen_id', im.archivo, im.fcreacion, im.estado as 'imagen_estado', im.tipo, im.nombre as 'imagen_nombre' FROM galerias as g inner join galeria_imagen as gi on g.id=gi.galerias_id inner join imagenes as im on gi.imagenes_id=im.id WHERE g.id=".$articulo." and im.estado=1 order by 1 asc limit 12";
		return $_datos;
		break;
		/******************************************************************/
		case 8:
			/*******DEVUELVE LAS OFERTAS***********************************/
				switch ($padre) {
				case 1:
				$_datos="SELECT ho.hoteles_id, ho.estado, ho.fecha_inicio, ho.fecha_fin, o.id, o.titulo, o.descripcion_corta, o.descripcion_larga, o.archivo, o.estado
					FROM  hoteles_ofertas as ho INNER JOIN ofertas as o on
					ho.ofertas_id=o.id
					WHERE ho.hoteles_id=".$articulo;
				break;
				case 2:
				$_datos="SELECT reso.restos_id, reso.estado, reso.fecha_inicio, reso.fecha_fin, o.id, o.titulo, o.descripcion_corta, o.descripcion_larga, o.archivo, o.estado
					FROM  restos_ofertas as reso INNER JOIN ofertas as o on
					reso.ofertas_id=o.id
					WHERE reso.restos_id=".$articulo;
				break;
				case 3:
				$_datos="SELECT trans.transportes_id, trans.estado, trans.fecha_inicio, trans.fecha_fin, o.id, o.titulo, o.descripcion_corta, o.descripcion_larga, o.archivo, o.estado
					FROM  transportes_ofertas as trans INNER JOIN ofertas as o on
					trans.ofertas_id=o.id
					WHERE trans.transportes_id=".$articulo;
				break;
				}
		return $_datos;
		break;

		case 9:
			/****DEVUELVE LAS CARACTERISTICAS DEL RESTO ESPECIFICO ******/
			$_datos="SELECT rc.restos_id, ,rc.caracteristicas_id, c.nombre, c.tipo
				FROM restos_caracteristicas as rc INNER JOIN caracteristicas AS c on rc.caracteristicas_id=c.id
				WHERE rc.restos_id=".$padre;
		return $_datos;
		break;

		case 10:
			/****DEVUELVE LAS CATEGORIAS DEL RESTO ESPECIFICO ******/
			$_datos="SELECT rc.restos_id, ,rc.restos_categorias_id, c.nombre
				FROM categorias_restos as rc INNER JOIN restos_categorias AS c on rc.restos_categorias_id=c.id
				WHERE rc.restos_id=".$padre;
		return $_datos;
		break;

		//DEVUELVE EL ARTICULO PARA REALIZAR MODIFICACIONES
		case 11:
				$_datos="SELECT id, titulo, copete, contenido, tipo_id, estado, fcreacion, fmodificacion, idiomas_id, datos_contactos_id, galerias_id, archivo, padre_id
					FROM articulos WHERE id=".$articulo;
				return $_datos;				
				break;
		//DEVUELVE LAS CARACTERISTICAS PARA REALIZAR MODIFICACIONES
		case 12:
				$_datos="SELECT id, nombre, tipo FROM caracteristicas WHERE id=".$articulo;
				return $_datos;				
				break;
		//DEVUELVE LOS DATOS DE CONTACTOS PARA REALIZAR MODIFICACIONES
		case 13:
				$_datos="SELECT id, direccion, telefono, mail, web, latitud, longitud, localidades_id FROM datos_contactos WHERE id=".$articulo;
				return $_datos;				
				break;
		//DEVUELVE LOS DATOS DE localidades PARA REALIZAR MODIFICACIONES
		case 14:
				$_datos="SELECT id,nombre,estado, fcreacion FROM localidades WHERE id=".$articulo;
				return $_datos;				
				break;
		//DEVUELVE EL EVENTO PARA REALIZAR LAS MODIFICACIONES
		case 15:
				$_datos="SELECT id, titulo, copete, contenido, fechaInicio, fechaFin, tipos_eventos_id,idiomas_id, datos_contactos_id, galerias_id, archivo, estado FROM eventos WHERE id=".$articulo;
				return $_datos;
				break;
		//DEVUELVE EL TIPO DE EVENTO PARA REALIZAR LAS MODIFICACIONES
		case 16:
				$_datos="SELECT id, nombre, estado FROM tipos_eventos WHERE id=".$articulo;
				return $_datos;
				break;
		//DEVUELVE EL BARES PARA REALIZAR LAS MODIFICACIONES
		case 17:
				$_datos="SELECT id, nombre, horario,estado, archivo, tripadvisor,datos_contactos_id, zonas_id FROM restos WHERE id=".$articulo;
				return $_datos;
				break;
		//DEVUELVE LAS ZONAS PARA REALIZAR LAS MODIFICACIONES
		case 18:
				$_datos="SELECT id, nombre FROM zonas WHERE id=".$articulo;
				return $_datos;
				break;
		//DEVUELVE LAS TIPOS DE SERVICIOS PARA REALIZAR LAS MODIFICACIONES
		case 19:
				$_datos="SELECT id, nombre,idiomas_id FROM tipos_servicios WHERE id=".$articulo;
				return $_datos;
				break;

		//DEVUELVE LOS SERVICIOS DE hoteles
		case 20:
				$_datos="SELECT id, nombre,tipos_servicios_id FROM servicios_hoteles WHERE id=".$articulo;
				return $_datos;
				break;

		//DEVUELVE EL HOTEL PARA MODIFICAR
		case 21:
				$_datos="SELECT id, nombre,estrellas, estado, archivo, booking, tripadvisor, fcreacion, fmodificacion, idiomas_id, categoria_hoteles_id, datos_contactos_id, galerias_id, ubicacion, descripcion, habitaciones FROM hoteles WHERE id=".$articulo;
				return $_datos;
				break;
		//DEVUELVE EL CATEGORIA-HOTEL PARA MODIFICAR
		case 22:
				$_datos="SELECT id, nombre FROM categoria_hoteles WHERE id=".$articulo;
				return $_datos;
				break;
		//DEVUELVE EL GALERIAS PARA MODIFICAR
		case 23:
				$_datos="SELECT id, nombre, descripcion, imagen, oculta, fcreacion, estado FROM galerias WHERE id=".$articulo;
				return $_datos;
				break;
		//DEVUELVE CATEGORIAS DE LOS RESTOS PARA MODIFICAR
		case 24:
				$_datos="SELECT id, nombre, fcreacion FROM restos_categorias WHERE id=".$articulo;
				return $_datos;
				break;

		//DEVUELVE TRANSPORTES PARA MODIFICAR
		case 25:
				$_datos="SELECT id, nombre, estado, fcreacion, fmodificacion, datos_contactos_id, transportes_categoria_id, idiomas_id FROM transportes WHERE id=".$articulo;
				return $_datos;
				break;

		//DEVUELVE LA CATEGORIA DE TRANSPORTES PARA MODIFICAR
		case 26:
				$_datos="SELECT id, nombre, fcreacion FROM transportes_categorias WHERE id=".$articulo;
				return $_datos;
				break;

		}
}
public function getlistaservicios($opcion,$idioma){
	
	switch ($opcion) {
		//LISTADO DE hoteles
		case 1: 
			$_datos="SELECT hot.id as 'hotid', hot.nombre, hot.estrellas, datcon.direccion, datcon.telefono, datcon.mail, lol.id, lol.nombre as 'lolnombre', hot.categoria_hoteles_id, cat.nombre as 'catnombre', hot.archivo
				FROM hoteles AS hot INNER JOIN categoria_hoteles AS cat ON hot.categoria_hoteles_id=cat.id
                inner join datos_contactos AS datcon ON hot.datos_contactos_id=datcon.id
                INNER JOIN localidades AS lol ON datcon.localidades_id=lol.id
        		where hot.idiomas_id=".$idioma." order by hotid";
		return $_datos;
		break;

		//LISTADO DE RESTAURANTES
		case 2:
			$_datos="SELECT res.id ,res.nombre ,res.horario , datcon.direccion , datcon.telefono, lol.nombre as 'lolnombre', rc.nombre as 'categoria', res.zonas_id
				FROM restos AS res INNER JOIN datos_contactos AS datcon ON res.datos_contactos_id=datcon.id INNER JOIN localidades AS lol ON datcon.localidades_id=lol.id INNER JOIN categorias_restos AS cr ON res.id=cr.restos_id INNER JOIN restos_categorias AS rc ON cr.restos_categorias_id=rc.id 
				WHERE res.estado=1
				/*order by rc.nombre asc, res.zonas_id asc, res.nombre asc*/";
		return $_datos; 
		break;

		//LISTADO DE TRANSPORTES
		case 3:
			$_datos="SELECT trans.id, trans.nombre, trans.estado, tc.nombre  as 'categoria', datcon.direccion, datcon.telefono,datcon.mail,datcon.web,datcon.latitud, datcon.longitud, lol.nombre as 'lolnombre'
				FROM transportes AS trans INNER JOIN transportes_categorias AS tc ON trans.transportes_categoria_id=tc.id 
    			INNER JOIN datos_contactos AS datcon ON trans.datos_contactos_id=datcon.id INNER JOIN localidades AS lol ON datcon.localidades_id=lol.id 
				where trans.estado=1 and trans.idiomas_id=".$idioma." order by tc.id";
		return $_datos;
		break;

		//LISTADO AGENCIAS DE VIAJES
		case 4:
			$_datos="select art.id, art.titulo, art.contenido from articulos as art where id=14824";
			return $_datos;
		break;

		//LISTADO DE OFERTAS
		case 5:
			$_datos="(SELECT h.nombre, h.id,ro.estado,ro.fecha_inicio,ro.fecha_fin, o.titulo, o.descripcion_corta from hoteles as h inner join hoteles_ofertas as ro ON h.id=ro.hoteles_id inner join ofertas as o on ro.ofertas_id=o.id )UNION(
				SELECT t.nombre, t.id,ro.estado,ro.fecha_inicio,ro.fecha_fin, o.titulo, o.descripcion_corta from transportes as t inner join transportes_ofertas as ro ON t.id=ro.transportes_id inner join ofertas as o on ro.ofertas_id=o.id)";
			return $_datos;
		break;
	}

	}
	}



