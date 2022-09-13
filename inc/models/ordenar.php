<?php
// include '../conexion.php';
date_default_timezone_set('America/Tegucigalpa');
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

if ($accion === 'newOrden') {
	include '../conexion.php';
	$mesa = $_POST['mesa'];
	$mesero = $_POST['mesero'];
	$checkBox = implode(',', $_POST['menu']);

	echo $mesa.' Mesa</br>';
	echo $mesero.' Mesero</br>';
	$DateAndTime = date('Y-m-d h:i:s', time());  
	$date = date('Y-m-d', time());  
	//Creamos la orden
	// $orden = "INSERT INTO `ordenes` (`id_orden`, `datetime`, `estado`, `id_mesa`, `date`, `id_mesero`) VALUES (NULL, '$DateAndTime', 'cola', '$mesa', '$date', '$mesero')";
	// if (mysqli_query($conn, $orden)) {
	// 	$ultimoid = $conn -> insert_id;
	// 	// echo $insert_id; 
	// }
	// echo $ultimoid; 
	$total = 0;
	foreach ($_POST['menu'] as $key => $val) {
		$consulta = $conn->query("SELECT * FROM `menu` WHERE id = $val");
		$contador = 1;
		while ($solicitud = $consulta->fetch_array()) {
			$nombre = $solicitud['nombre'];
			$precio = $solicitud['precio'];
			echo $solicitud['nombre'] . '<br>';
			echo $solicitud['precio'] . '<br>';
			echo $solicitud['id'] . '<br>';
			//insert into
			$total +=  $precio;
			// echo $DateAndTime;
			// $sql = "INSERT INTO orden_detalle (`id_orden_detalle`, `id_plato`, `precio_plato`, `id_mesero`) VALUES ('$ultimoid', '$val', '$precio', '$mesero')";
			// if (mysqli_query($conn, $sql)) {
			// 	echo 'Insertó Orden';
			// 	header('Location: ../../orden.php?orden='.$ultimoid);
			// } else {
			// 	header('Location: ../../orden.php?orden=0');
			// 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			// }
			
		}
	}
	echo '<br>Total' . $total . '<br>';

	
}
