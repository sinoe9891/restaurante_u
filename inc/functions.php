<?php
date_default_timezone_set('America/Tegucigalpa');
//Obtener página actual remplazando .php por vacio.
function obtenerPaginaActual(){
	$archivo = basename($_SERVER['PHP_SELF']);
	$pagina = str_replace(".php", "", $archivo);
	return $pagina;
};

//quitar acentos
function quitar_acentos($cadena){
	$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
	$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
	$cadena = utf8_decode($cadena);
	$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
	return utf8_encode($cadena);
}
