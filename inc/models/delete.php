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
