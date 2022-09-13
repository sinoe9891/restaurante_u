<?php
include '../conexion.php';
// Actualizar Usuario
if (isset($_POST['user_id']) && isset($_POST['update'])) {
	$bandera = $_POST['update'];
	$id_usuario = $_POST['user_id'];

	if ($bandera == 'Actualizar') {
		$user_id = $_POST['user_id'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$nickname = $_POST['nickname'];
		$email = $_POST['email'];
		$role = $_POST['role'];
		$estado = $_POST['estado'];
		$nickname = trim($nickname);
		$email = trim($email);
		$nombre = trim($nombre);
		$apellidos = trim($apellidos);
		$sql = "UPDATE main_users SET usuario_name = '$nombre', apellidos = '$apellidos', nickname = '$nickname', email_user = '$email',  role_user = $role, estado_user = '$estado' WHERE id = $id_usuario";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
			header('Location: ../../edit-usuario.php?ID='.$id_usuario.'&up=1');
		} else {
			header('Location: ../../edit-usuario.php?ID='.$id_usuario.'&up=0');
		}
	}
};

if (isset($_POST['idm']) && isset($_POST['updatemesa'])) {
	$bandera = $_POST['updatemesa'];
	$idm = $_POST['idm'];
	$role = $_POST['role'];
	$estado = $_POST['estado'];
	if ($role == 0) {
		$asignar = 0;
	}else{
		$asignar = 1;
	}

	if ($bandera == 'Actualizar') {
		$role = $_POST['role'];
		$estado = $_POST['estado'];
		$sql = "UPDATE `mesas` SET `id_mesero` = '$role', `estado_mesa` = '$estado', `asignada` = '$asignar'  WHERE `mesas`.`id` = $idm";

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
			header('Location: ../../edit-mesa.php?idm='.$idm.'&up=1');
		} else {
			// header('Location: ../../edit-mesa.php?idm='.$idm.'&up=0');
		}
	}
};
