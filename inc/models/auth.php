<?php
	//Código para login de administradores
	$accion = $_POST['accion'];
if ($accion === 'login') {
	$password = $_POST['password'];
	$name = $_POST['nombre'];
	include '../conexion.php';
	$password = $_POST['password'];
	try {
		//Seleccionaremos al administrador de la base de datos
		$stmt = $conn->prepare('SELECT email_user, id, usuario_name, apellidos, nickname, role_user, estado_user, password FROM main_users WHERE email_user = ?');
		$stmt->bind_param('s', $name);
		$stmt->execute();
		//Loguear el usuario
		$stmt->bind_result($email_user, $id_user, $usuario_name, $apellidos, $username, $role_user, $estado, $password_user);
		$stmt->fetch();
		if ($email_user) {
			//Si el usuario existe verificar el password
			if (password_verify($password, $password_user) && $estado == 'a') {
				//Iniciar la Sesión
				session_start();
				$_SESSION['correo'] = $email_user;
				$_SESSION['id'] = $id_user;
				$_SESSION['nombre_usuario'] = $usuario_name;
				$_SESSION['apellidos'] = $apellidos;
				$_SESSION['username'] = $username;
				$_SESSION['role_user'] = $role_user;
				$_SESSION['login'] = true;
				//Login Correcto
				$respuesta = array(
					'respuesta' => 'correcto',
					'nombre' => $email_user,
					'apellidos' => $apellidos,
					'username' => $username,
					'tipo' => $accion,
					'role' => $role_user,
					'id' => $id_user,
					'pass' => $password_user,
					'pass1' => $password,
					//Ver en consola si el usuario existe o no
					'columnas' => $stmt->affected_rows
				);
			} elseif (password_verify($password, $password_user) && $estado == 'd') {
				$respuesta = array(
					'respuesta' => 'des'
				);
			} else {
				//Login Incorrecto, enviar error
				$respuesta = array(
					'respuesta' => 'Password Incorrecto',
					'nombre' => $email_user,
					'username' => $username,
					'tipo' => $accion,
					'id' => $id_user,
					'pass' => $password_user,
					'pass1' => $password,
					//Ver en consola si el usuario existe o no
					'columnas' => $stmt->affected_rows,
				);
			};
		} else {
			$respuesta = array(
				'error' => 'Usuario no existe!',
				'respuesta' => 'noexiste',
				'nombre' => $email_user,
				'apellidos' => $apellidos,
				'username' => $username,
				'tipo' => $accion,
				'role' => $role_user,
				'id' => $id_user,
				'pass' => $password_user,
				'pass1' => $password,
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		//En caso de un error, tomar la exepción
		$respuesta = array(
			//Arreglo asociativo
			'pass' => $e->getMessage()
			// 'pass' => $hash_password
		);
	}
	echo json_encode($respuesta);
};
