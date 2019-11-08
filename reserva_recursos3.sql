-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2019 a las 18:23:46
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reserva_recursos3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `dsc_incidencia` text NOT NULL,
  `id_recursos` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `dsc_incidencia`, `id_recursos`, `id_usu`, `estado`) VALUES
(2, 'test test test test', 4, 2, 1),
(3, 'Texto largo largo Texto largo largo Texto largo largo Texto largo largo Texto largo largo Texto larg', 3, 4, 1),
(7, 'Incidencia1', 1, 4, 1),
(8, 'Incidencia tal ', 2, 4, 1),
(9, 'erwter', 1, 4, 1),
(10, 'Incidencia nueva', 2, 2, 1),
(11, 'Incidencia de ', 2, 4, 1),
(12, 'Juanma lo ha roto', 2, 2, 1),
(13, 'hbjnm', 1, 4, 1),
(25, 'Ha pasado esto', 2, 4, 1),
(26, 'Incidencia 1', 8, 4, 1),
(27, 'Incidencia 1', 5, 4, 1),
(28, 'Incidencia 1', 8, 4, 1),
(29, 'Incidencia testeo', 1, 4, 1),
(36, 'ghn', 2, 4, 1),
(37, 'tgvhbjnm', 2, 4, 1),
(38, 'qrrety', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recursos` int(3) NOT NULL,
  `nombre_recurso` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `id_disponible` int(3) DEFAULT NULL,
  `id_tipo_recurso` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id_recursos`, `nombre_recurso`, `descripcion`, `imagen`, `id_disponible`, `id_tipo_recurso`) VALUES
(1, 'Sala Multidisciplinar 1', '', '', 1, 1),
(2, 'Sala Multidisciplinar 2', '', '', 1, 1),
(3, 'Sala Multidisciplinar 3', '', '', 1, 1),
(4, 'Sala Multidisciplinar 4', '', '', 1, 1),
(5, 'Sala Informatica 1', '', '', 1, 2),
(6, 'Sala Informatica 2', '', '', 1, 2),
(7, 'Taller Cocina', '', '', 1, 3),
(8, 'Despacho Entrevista 1', '', '', 1, 4),
(9, 'Despacho Entrevista 2', '', '', 1, 4),
(10, 'Salon Actos', '', '', 1, 5),
(11, 'Sala Reuniones', '', '', 1, 6),
(12, 'Proyector Portatil 1', '', '', 1, 7),
(13, 'Proyector Portatil 2', '', '', 1, 7),
(14, 'Portatil 1', '', '', 1, 8),
(15, 'Portatil 2', '', '', 1, 8),
(16, 'Portatil 3', '', '', 1, 8),
(17, 'Movil 1', '', '', 1, 9),
(18, 'Movil 2', '', '', 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(3) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_ini` time NOT NULL,
  `hora_fin` time DEFAULT NULL,
  `id_usu` int(11) DEFAULT NULL,
  `id_recursos` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `fecha_ini`, `fecha_fin`, `hora_ini`, `hora_fin`, `id_usu`, `id_recursos`) VALUES
(10, '2019-11-05', '2019-11-05', '05:10:12', '05:10:12', 2, 4),
(11, '2019-11-05', '2019-11-05', '05:11:52', '05:11:52', 2, 5),
(12, '2019-11-05', '2019-11-05', '05:32:13', '05:32:13', 2, 1),
(14, '2019-11-05', '2019-11-05', '05:54:49', '05:54:49', 2, 5),
(15, '2019-11-05', '2019-11-05', '07:18:29', '07:18:29', 2, 1),
(17, '2019-11-05', '2019-11-05', '07:33:48', '07:33:48', 2, 1),
(18, '2019-11-05', '2019-11-05', '07:43:17', '07:43:17', 2, 1),
(19, '2019-11-05', '2019-11-05', '07:47:29', '07:47:29', 1, 16),
(20, '2019-11-05', '2019-11-05', '07:47:31', '07:47:31', 1, 3),
(21, '2019-11-05', '2019-11-05', '07:47:33', '07:47:33', 1, 9),
(22, '2019-11-05', '2019-11-05', '07:47:35', '07:47:35', 1, 18),
(37, '2019-11-05', '2019-11-05', '07:51:21', '07:51:21', 2, 1),
(38, '2019-11-05', '2019-11-05', '08:16:22', '08:16:22', 2, 1),
(39, '2019-11-05', '2019-11-05', '08:18:47', '08:18:47', 2, 4),
(40, '2019-11-05', '2019-11-05', '08:27:50', '08:27:50', 2, 1),
(41, '2019-11-06', '2019-11-06', '06:03:55', '06:03:55', 2, 18),
(42, '2019-11-07', '2019-11-07', '04:11:46', '04:11:46', 4, 1),
(43, '2019-11-07', '2019-11-07', '04:20:48', '04:20:48', 4, 1),
(44, '2019-11-07', '2019-11-07', '04:38:31', '04:38:31', 4, 2),
(45, '2019-11-07', '2019-11-07', '04:40:19', '04:40:19', 4, 1),
(46, '2019-11-07', '2019-11-07', '04:43:34', '04:43:34', 2, 2),
(48, '2019-11-07', '2019-11-07', '04:58:08', '04:58:08', 4, 1),
(49, '2019-11-07', '2019-11-07', '04:58:11', '04:58:11', 4, 2),
(50, '2019-11-07', '2019-11-07', '05:01:21', '05:01:21', 4, 1),
(51, '2019-11-07', '2019-11-07', '05:13:48', '05:13:48', 2, 2),
(52, '2019-11-07', '2019-11-07', '05:49:05', '05:49:05', 4, 1),
(53, '2019-11-08', '2019-11-08', '01:14:23', '01:14:23', 2, 1),
(54, '2019-11-08', '2019-11-08', '01:20:15', '01:20:15', 2, 1),
(55, '2019-11-08', '2019-11-08', '03:46:01', '03:46:01', 4, 1),
(56, '2019-11-08', '2019-11-08', '03:55:07', '03:55:07', 4, 1),
(57, '2019-11-08', '2019-11-08', '03:56:47', '03:56:47', 4, 2),
(59, '2019-11-08', '2019-11-08', '04:24:42', '04:24:42', 2, 1),
(60, '2019-11-08', '2019-11-08', '04:32:24', '04:32:24', 4, 8),
(61, '2019-11-08', '2019-11-08', '04:35:55', '04:35:55', 4, 1),
(62, '2019-11-08', '2019-11-08', '04:36:17', '04:36:17', 4, 5),
(63, '2019-11-08', '2019-11-08', '04:36:29', '04:36:29', 4, 1),
(64, '2019-11-08', '2019-11-08', '04:37:03', '04:37:03', 4, 2),
(65, '2019-11-08', '2019-11-08', '04:38:48', '04:38:48', 4, 2),
(66, '2019-11-08', '2019-11-08', '04:48:55', '04:48:55', 4, 4),
(67, '2019-11-08', '2019-11-08', '04:49:08', '04:49:08', 4, 8),
(68, '2019-11-08', '2019-11-08', '04:57:00', '04:57:00', 4, 1),
(71, '2019-11-08', '2019-11-08', '05:52:14', '05:52:14', 2, 1),
(74, '2019-11-08', '2019-11-08', '06:10:15', '06:10:15', 3, 1),
(75, '2019-11-08', '2019-11-08', '06:10:21', '06:10:21', 3, 14),
(76, '2019-11-08', '2019-11-08', '06:10:25', '06:10:25', 3, 15),
(79, '2019-11-08', '2019-11-08', '06:14:52', '06:14:52', 2, 1),
(80, '2019-11-08', '2019-11-08', '06:15:00', '06:15:00', 2, 11),
(81, '2019-11-08', '2019-11-08', '06:15:06', '06:15:06', 2, 13),
(82, '2019-11-08', '2019-11-08', '06:15:09', '06:15:09', 2, 17),
(83, '2019-11-08', '2019-11-08', '06:15:13', '06:15:13', 2, 16),
(84, '2019-11-08', '2019-11-08', '06:15:18', '06:15:18', 2, 10),
(85, '2019-11-08', '2019-11-08', '06:15:21', '06:15:21', 2, 9),
(86, '2019-11-08', '2019-11-08', '06:15:25', '06:15:25', 2, 7),
(87, '2019-11-08', '2019-11-08', '06:15:47', '06:15:47', 2, 8),
(88, '2019-11-08', '2019-11-08', '06:15:53', '06:15:53', 2, 14),
(89, '2019-11-08', '2019-11-08', '06:15:57', '06:15:57', 2, 12),
(90, '2019-11-08', '2019-11-08', '06:16:00', '06:16:00', 2, 15),
(91, '2019-11-08', '2019-11-08', '06:16:03', '06:16:03', 2, 18),
(92, '2019-11-08', '2019-11-08', '06:16:08', '06:16:08', 2, 6),
(93, '2019-11-08', '2019-11-08', '06:16:10', '06:16:10', 2, 1),
(94, '2019-11-08', '2019-11-08', '06:16:12', '06:16:12', 2, 2),
(95, '2019-11-08', '2019-11-08', '06:16:14', '06:16:14', 2, 3),
(96, '2019-11-08', '2019-11-08', '06:16:16', '06:16:16', 2, 4),
(97, '2019-11-08', '2019-11-08', '06:16:20', '06:16:20', 2, 5),
(98, '2019-11-08', '2019-11-08', '06:17:17', '06:17:17', 2, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_recurso`
--

CREATE TABLE `tipo_recurso` (
  `id_tipo_recurso` int(3) NOT NULL,
  `Nombre_tipo_recurso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_recurso`
--

INSERT INTO `tipo_recurso` (`id_tipo_recurso`, `Nombre_tipo_recurso`) VALUES
(1, 'Sala Multidisciplinar'),
(2, 'Sala Informatica'),
(3, 'Taller Cocina'),
(4, 'Despacho Entrevista'),
(5, 'Salon Actos'),
(6, 'Sala Reuniones'),
(7, 'Proyector Portatil'),
(8, 'Portatil'),
(9, 'Movil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `user`, `password`) VALUES
(1, 'fernando', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Mario', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Aaron', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_recursos` (`id_recursos`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recursos`),
  ADD KEY `id_tipo_recurso` (`id_tipo_recurso`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `id_recursos` (`id_recursos`);

--
-- Indices de la tabla `tipo_recurso`
--
ALTER TABLE `tipo_recurso`
  ADD PRIMARY KEY (`id_tipo_recurso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`id_recursos`) REFERENCES `recursos` (`id_recursos`),
  ADD CONSTRAINT `incidencias_ibfk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `recursos_ibfk_1` FOREIGN KEY (`id_tipo_recurso`) REFERENCES `tipo_recurso` (`id_tipo_recurso`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_recursos`) REFERENCES `recursos` (`id_recursos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
