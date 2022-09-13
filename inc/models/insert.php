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

if ($accion === 'newMesa') {
	include '../conexion.php';
	echo $_POST['numero_mesa'];
	echo $name = $_POST['usuario'];
	echo $numero_mesa = $_POST['numero_mesa'];
	echo $id_mesero = $_POST['usuario'];
	echo $estado = $_POST['estado'];

	//Si el usuario existe verificar el password
	echo 'Procede a Insertar';
	$sql = "INSERT INTO `mesas` (`id`, `numero_mesa`, `id_mesero`, `estado_mesa`, `asignada`) VALUES (NULL, '$numero_mesa', '$id_mesero', '$estado', '1');";
	if (mysqli_query($conn, $sql)) {
		echo 'Insertó';
		header('Location: ../../new-mesa.php?add=1');
	} else {
		header('Location: ../../new-mesa.php?add=0');
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

if ($accion === 'newPlato') {
	include '../conexion.php';
	$nombreplato = $_POST['nombreplato'];
	$precio = $_POST['precio'];
	$precioferta = $_POST['precioferta'];
	$categoria = $_POST['categoria'];
	$estado = $_POST['estado'];
	$url = $_POST['url'];
	$descripcion = $_POST['descripcion'];
	// echo $url = $_POST['url_foto'];
	if (isset($_POST['precioferta'])) {
		$preciooferta = $_POST['precioferta'];
		if ($preciooferta == '') {
			$oferta = 0;
			$preciooferta = 0;
		} else {
			$oferta = 1;
		}
	} else {
		$oferta = 0;
		$preciooferta = 0;
	}

	//Si el usuario existe verificar el password
	echo 'Procede a Insertar';
	$sql = "INSERT INTO `menu` (`id`, `nombre`, `descripcion`, `precio`, `categoria`, `url_foto`, `oferta`, `precio_oferta`, `estado_plato`) VALUES (NULL, '$nombreplato', '$descripcion', '$precio', '$categoria', '', '$oferta', '$preciooferta', '$estado')";
	if (mysqli_query($conn, $sql)) {
		echo 'Insertó';
		header('Location: ../../new-plato.php?add=1');
	} else {
		header('Location: ../../new-plato.php?add=0');
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}



if ($accion === 'newOrden') {
	include '../conexion.php';
	$mesa = $_POST['mesa'];
	$mesero = $_POST['mesero'];
	$checkBox = implode(',', $_POST['menuplato']);

	echo $mesa . ' Mesa</br>';
	echo $mesero . ' Mesero</br>';
	$DateAndTime = date('Y-m-d h:i:s', time());
	$date = date('Y-m-d', time());
	//Creamos la orden
	$orden = "INSERT INTO `ordenes` (`id_orden`, `datetime`, `estado`, `id_mesa`, `date`, `id_mesero`) VALUES (NULL, '$DateAndTime', 'cola', '$mesa', '$date', '$mesero')";
	if (mysqli_query($conn, $orden)) {
		$ultimoid = $conn->insert_id;
		// echo $insert_id; 
	}
	echo $ultimoid;
	foreach ($_POST['menuplato'] as $key => $val) {
		$consulta = $conn->query("SELECT * FROM `menu` WHERE id = $val");
		$contador = 1;
		while ($solicitud = $consulta->fetch_array()) {
			$nombre = $solicitud['nombre'];
			$precio = $solicitud['precio'];
			//insert into

			// echo $DateAndTime;
			$sql = "INSERT INTO orden_detalle (`id_orden_detalle`, `id_plato`, `precio_plato`, `id_mesero`) VALUES ('$ultimoid', '$val', '$precio', '$mesero')";
			if (mysqli_query($conn, $sql)) {
				echo 'Insertó Orden';
				header('Location: ../../orden.php?orden=' . $ultimoid.'&fact=true');
			} else {
				header('Location: ../../orden.php?orden=0&fact=false');
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
}

if ($accion === 'facturacrear') {
	include '../conexion.php';
	$id_orden = $_POST['id_orden'];
	$DateAndTime = date('Y-m-d h:i:s', time());
	$datetime = date('Y-m-d h:i:s', time());
	// echo $DateAndTime;
	// $datetime  = $_POST['datetime'];
	$idmesero = $_POST['idmesero'];
	$total = $_POST['total'];
	$grantotal = $_POST['grantotal'];
	$descuento = $_POST['descuento'];
	$propina = $_POST['propina'];
	$impuesto = $_POST['impuestototal'];
	$estado_factura = 'pagado';

	// echo $url = $_POST['url_foto'];
	if (isset($_POST['precioferta'])) {
		$preciooferta = $_POST['precioferta'];
		if ($preciooferta == '') {
			$oferta = 0;
			$preciooferta = 0;
		} else {
			$oferta = 1;
		}
	} else {
		$oferta = 0;
		$preciooferta = 0;
	}

	//Si el usuario existe verificar el password
	echo 'Procede a Insertar';
	$sql = "INSERT INTO `facturas` (no_factura, fecha_hora, id_orden, id_mesero, total, descuento, propina, impuesto, subtotal, estado_factura, grantotal) VALUES (NULL, '$datetime', '$id_orden', '$idmesero', '$grantotal', '$descuento', '$propina', '$impuesto', '$total', '$estado_factura', '$grantotal')";

	$orden = "UPDATE `ordenes` SET `estado` = 'pagada' WHERE `ordenes`.`id_orden` = $id_orden";

	if (mysqli_query($conn, $sql) && mysqli_query($conn, $orden)) {
		echo 'Insertó';
		header('Location: ../../detalle_factura.php??ID='.$id_orden.'add=1');
	} else {
		header('Location: ../../detalle_factura.php??ID='.$id_orden.'add=0');
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
