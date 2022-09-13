-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-09-2022 a las 18:08:43
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_menu`
--

CREATE TABLE `categorias_menu` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `clase` varchar(50) NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias_menu`
--

INSERT INTO `categorias_menu` (`id_categoria`, `nombre_categoria`, `clase`, `estado`) VALUES
(1, 'Desayuno', 'burger', ''),
(2, 'Almuerzo', 'pizza', ''),
(3, 'Cena', 'pasta', ''),
(4, 'Papas', 'fries', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_factura`
--

CREATE TABLE `control_factura` (
  `id_factura` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `pedido` varchar(250) NOT NULL,
  `precio` float(8,2) NOT NULL,
  `id_mesero` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `main_cargo`
--

CREATE TABLE `main_cargo` (
  `id_role` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `main_cargo`
--

INSERT INTO `main_cargo` (`id_role`, `descripcion`) VALUES
(1, 'Superadmin'),
(2, 'Administrador'),
(3, 'Mesero'),
(4, 'Cocinero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `main_users`
--

CREATE TABLE `main_users` (
  `id` int(11) NOT NULL,
  `usuario_name` varchar(50) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `nickname` varchar(250) NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role_user` int(11) NOT NULL,
  `estado_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `main_users`
--

INSERT INTO `main_users` (`id`, `usuario_name`, `apellidos`, `nickname`, `email_user`, `password`, `role_user`, `estado_user`) VALUES
(1, 'Danny', 'Velásquez', 'dvelasquez', 'admin@bertrand.com', '$2y$12$MDEkUpR7ibh3injkmZzhX.07VG6TEBEBDfHwG4VQK7aHdprq9rB9i', 1, 'a'),
(3, 'Martín', 'Bertrand', 'mbertrand', 'mesero@bertrand.com', '$2y$12$MDEkUpR7ibh3injkmZzhX.07VG6TEBEBDfHwG4VQK7aHdprq9rB9i', 3, 'a'),
(4, 'Patricia', 'Sánchez', 'psanchez', 'mesero2@bertrand.com', '$2y$12$UuMC0M3zRPLwqeojLEPauu4WafvyuZv.b9W72fUx71NYhdzmr1guy', 3, 'a'),
(27, 'Kelin', 'Ferrera', 'kferrera', 'cocinero@bertrand.com', '$2y$12$973L5jWWgjCQYjf.LlosYeDXIFsLQFYrYGOwS13uuxJcAKfkkNf9i', 4, 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double(8,2) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `url_foto` text NOT NULL,
  `oferta` tinyint(1) NOT NULL,
  `precio_oferta` double(8,2) NOT NULL,
  `estado_plato` varchar(1) NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `nombre`, `descripcion`, `precio`, `categoria`, `url_foto`, `oferta`, `precio_oferta`, `estado_plato`) VALUES
(1, 'Picadero de Carne', 'Ipsum ipsum clita erat amet dolor justo diam', 100.00, '2', 'img/menu-1.jpg', 0, 0.00, 'd'),
(2, 'Chuleta Asada', 'Ipsum ipsum clita erat amet dolor justo diam', 100.00, '2', 'img/menu-2.jpg', 0, 0.00, 'a'),
(3, 'Pizza Carbonara', 'Ipsum ipsum clita erat amet dolor justo diam', 150.00, '3', 'img/menu-3.jpg', 0, 0.00, 'a'),
(4, 'Puyaso', 'Ipsum ipsum clita erat amet dolor justo diam', 200.00, '2', 'img/menu-4.jpg', 0, 0.00, 'a'),
(5, 'Almuerzo ', 'Ipsum ipsum clita erat amet dolor justo diam', 150.00, '2', 'img/menu-5.jpg', 0, 0.00, 'a'),
(6, 'Filete de pescado', 'Ipsum ipsum clita erat amet dolor justo diam', 200.00, '2', 'img/menu-6.jpg', 0, 0.00, 'a'),
(7, 'Pizza con Chile', 'Ipsum ipsum clita erat amet dolor justo diam', 180.00, '3', 'img/menu-7.jpg', 0, 0.00, 'a'),
(8, 'Filete de Res', 'Ipsum ipsum clita erat amet dolor justo diam', 170.00, '2', 'img/menu-8.jpg', 0, 0.00, 'a'),
(26, 'Panqueques con Arandanos', 'Deliciosos Panqueques', 100.00, '1', 'img/desayunos-01.jpg', 0, 0.00, 'a'),
(27, 'Huevos Benedictinos', 'Disfruta de dos tostadas con deliciosos huevos', 100.00, '1', 'img/desayunos-02.jpg', 0, 0.00, 'a'),
(28, 'Grand Slam', 'Comparte con tu familia esto tan delicioso', 150.00, '1', 'img/desayunos-03.jpg', 0, 0.00, 'a'),
(29, 'Avena con Frutas', 'Quieres algo mas light esto es lo que necesitas', 200.00, '1', 'img/desayunos-04.jpg', 0, 0.00, 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `numero_mesa` int(2) NOT NULL,
  `id_mesero` int(11) NOT NULL,
  `estado_mesa` varchar(1) NOT NULL DEFAULT 'a',
  `asignada` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `numero_mesa`, `id_mesero`, `estado_mesa`, `asignada`) VALUES
(1, 1, 3, 'a', 1),
(2, 2, 3, 'a', 1),
(3, 3, 3, 'a', 1),
(4, 4, 4, 'a', 1),
(5, 5, 0, 'a', 0),
(6, 6, 0, 'a', 0),
(7, 7, 0, 'a', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id_orden` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `estado` varchar(10) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_mesero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id_orden`, `datetime`, `estado`, `id_mesa`, `date`, `id_mesero`) VALUES
(1, '2022-09-12 04:29:46', 'cola', 1, '2022-09-12', 3),
(2, '2022-09-12 04:42:45', 'cola', 1, '2022-09-12', 3),
(3, '2022-09-12 04:59:23', 'cola', 1, '2022-09-12', 3),
(4, '2022-09-13 07:13:37', 'cola', 1, '2022-09-13', 3),
(5, '2022-09-13 07:16:38', 'cola', 1, '2022-09-13', 3),
(6, '2022-09-13 08:01:12', 'cola', 1, '2022-09-13', 3),
(7, '2022-09-13 08:03:49', 'cola', 1, '2022-09-13', 3),
(8, '2022-09-13 08:04:32', 'cancelada', 1, '2022-09-13', 3),
(9, '2022-09-13 08:10:03', 'cancelada', 1, '2022-09-13', 3),
(10, '2022-09-13 08:10:18', 'cancelada', 1, '2022-09-13', 3),
(11, '2022-09-13 08:11:48', 'cancelada', 1, '2022-09-13', 3),
(12, '2022-09-13 08:12:43', 'cancelada', 1, '2022-09-13', 3),
(13, '2022-09-13 08:16:46', 'cancelada', 1, '2022-09-13', 3),
(14, '2022-09-13 10:05:17', 'cancelada', 1, '2022-09-13', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_detalle`
--

CREATE TABLE `orden_detalle` (
  `id_orden_detalle` int(11) NOT NULL,
  `id_plato` int(11) NOT NULL,
  `precio_plato` float(8,2) NOT NULL,
  `id_mesero` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orden_detalle`
--

INSERT INTO `orden_detalle` (`id_orden_detalle`, `id_plato`, `precio_plato`, `id_mesero`, `id`) VALUES
(1, 26, 100.00, '3', 1),
(1, 28, 150.00, '3', 2),
(2, 26, 100.00, '3', 3),
(2, 28, 150.00, '3', 4),
(3, 3, 150.00, '3', 5),
(3, 7, 180.00, '3', 6),
(4, 26, 100.00, '3', 7),
(4, 28, 150.00, '3', 8),
(5, 26, 100.00, '3', 9),
(5, 28, 150.00, '3', 10),
(6, 26, 100.00, '3', 11),
(6, 28, 150.00, '3', 12),
(7, 26, 100.00, '3', 13),
(7, 28, 150.00, '3', 14),
(8, 26, 100.00, '3', 15),
(8, 28, 150.00, '3', 16),
(9, 26, 100.00, '3', 17),
(9, 28, 150.00, '3', 18),
(10, 26, 100.00, '3', 19),
(10, 28, 150.00, '3', 20),
(11, 26, 100.00, '3', 21),
(11, 28, 150.00, '3', 22),
(12, 26, 100.00, '3', 23),
(12, 28, 150.00, '3', 24),
(13, 26, 100.00, '3', 25),
(13, 28, 150.00, '3', 26),
(14, 26, 100.00, '3', 27),
(14, 4, 200.00, '3', 28),
(14, 7, 180.00, '3', 29);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias_menu`
--
ALTER TABLE `categorias_menu`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `control_factura`
--
ALTER TABLE `control_factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `main_cargo`
--
ALTER TABLE `main_cargo`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `main_users`
--
ALTER TABLE `main_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role_user`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias_menu`
--
ALTER TABLE `categorias_menu`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `control_factura`
--
ALTER TABLE `control_factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `main_cargo`
--
ALTER TABLE `main_cargo`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `main_users`
--
ALTER TABLE `main_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
