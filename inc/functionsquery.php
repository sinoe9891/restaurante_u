<?php
	date_default_timezone_set('America/Tegucigalpa');
	//Obtener página actual remplazando .php por vacio.
	function obtenerTodo($tabla = null) {
		include 'conexion.php';
		try {
			return $conn->query("SELECT * FROM {$tabla}");
	
		} catch(Exception $e) {
			echo "Error! : " . $e->getMessage();
			return false;
		}
	}
	function obtenerRoles() {
		include 'conexion.php';
		try {
			return $conn->query("SELECT * FROM main_cargo");

		} catch(Exception $e) {
			echo "Error! : " . $e->getMessage();
			return false;
		}
	}

?>