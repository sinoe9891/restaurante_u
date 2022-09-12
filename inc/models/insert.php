<?php
// include '../conexion.php';

// Crear Usuario
//die(json_encode($_POST));
$accion = $_POST['accion'];
if ($accion === 'newUsuario') {
	$name = $_POST['nombre'];
	$apellido = $_POST['apellidos'];
	$nickname = $_POST['nickname'];
	$email = $_POST['email'];
	$role = $_POST['role'];
	$estado = $_POST['estado'];
	$contrasena = $_POST['password'];
	//Hashear Password
	$opciones = array(
		'cost' => 12
	);

	//Necesitamos 3 paramentros, Contraseña, algoritmo de encriptación, opciones(arreglo)
	$hash_password = password_hash($contrasena, PASSWORD_BCRYPT, $opciones);
	//Importar la conexión
	include '../conexion.php';
	include '../functions.php';
	include '../functionsquery.php';
	$primerNombre = explode(" ", $name);
	$primerApellido = explode(" ", $apellido);
	// var_dump($primerNombre);
	$nombre = substr($primerNombre[0], 0, 1);
	$nickname = $nombre . $primerApellido[0];
	$nombre = quitar_acentos($nickname);
	$nickname = strtolower($nombre);
	// echo '@' . $nickname;
	$bandera = false;
	$comparar = obtenerTodo('main_users');
	while ($row = $comparar->fetch_assoc()) {
		$username = $row['nickname'];
		$email_user = $row['email_user'];
		if (strcmp($nickname, $username) === 0) {
			$rand = range(1, 13);
			shuffle($rand);
			foreach ($rand as $val) {
				$alea = $val;
			}
			$nombre = substr($primerNombre[0], 0, 1);
			$nickname = $nombre . $primerApellido[0] . $alea;
			$nombre = quitar_acentos($nickname);
			$nickname = strtolower($nombre);
			echo 'Entró';
		}

		if ($email === $email_user) {
			$bandera = true;
		}
	}
	//Si el usuario existe verificar el password
	if ($bandera) {
		header('Location: ../../new-usuario.php?error=1');
	} else {
		echo 'Procede a Insertar';
		$sql = "INSERT INTO main_users (`id`, `usuario_name`, `apellidos`, `nickname`, `email_user`, `password`, `role_user`, `estado_user`) VALUES (NULL, '$name', '$apellido', '$nickname', '$email', '$hash_password', $role, '$estado')";
		if (mysqli_query($conn, $sql)) {
			echo 'Insertó';
			header('Location: ../../new-usuario.php?add=1');
		} else {
			header('Location: ../../new-usuario.php?add=0');
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
