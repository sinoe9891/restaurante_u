<?php
include '../conexion.php';

if (isset($_GET['delete']) && isset($_GET['id'])) {
	$accion = $_GET['delete'];
	$id = $_GET['id'];
	if ($accion === 'true') {

		$sql = "DELETE FROM `main_users` WHERE `main_users`.`id` = '$id'";
		if (mysqli_query($conn, $sql)) {
			echo 'Insertó';
			header('Location: ../../usuarios?del=1');
		} else {
			// header('Location: ../../usuarios?del=0');
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
if (isset($_GET['delete']) && isset($_GET['orden'])) {
	$accion = $_GET['delete'];
	$id_orden = $_GET['orden'];
	if ($accion === 'true') {
		$sql = "UPDATE ordenes SET estado = 'cancelada' WHERE id_orden = $id_orden";
		if (mysqli_query($conn, $sql)) {
			echo 'Insertó';
			header('Location: ../../ordenes?del=1');
		} else {
			// header('Location: ../../usuarios?del=0');
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
