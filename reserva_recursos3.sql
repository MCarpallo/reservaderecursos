-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2019 a las 15:56:27
-- Versión del servidor: 8.0.13
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
  `id_recursos` int(3) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `dsc_incidencia`, `id_recursos`, `id_usu`, `estado`) VALUES
(1, 'test test test test', 4, 2, 1),
(2, 'scvbncvbhnj', 3, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recursos` int(3) NOT NULL,
  `nombre_recurso` varchar(100) NOT NULL,
  `id_disponible` int(3) DEFAULT NULL,
  `id_tipo_recurso` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id_recursos`, `nombre_recurso`, `id_disponible`, `id_tipo_recurso`) VALUES
(1, 'Sala Multidisciplinar 1', 1, 1),
(2, 'Sala Multidisciplinar 2', 1, 1),
(3, 'Sala Multidisciplinar 3', 1, 1),
(4, 'Sala Multidisciplinar 4', 1, 1),
(5, 'Sala Informatica 1', 1, 2),
(6, 'Sala Informatica 2', 1, 2),
(7, 'Taller Cocina', 1, 3),
(8, 'Despacho Entrevista 1', 1, 4),
(9, 'Despacho Entrevista 2', 1, 4),
(10, 'Salon Actos', 1, 5),
(11, 'Sala Reuniones', 1, 6),
(12, 'Proyector Portatil 1', 1, 7),
(13, 'Proyector Portatil 2', 1, 7),
(14, 'Portatil 1', 1, 8),
(15, 'Portatil 2', 1, 8),
(16, 'Portatil 3', 1, 8),
(17, 'Movil 1', 1, 9),
(18, 'Movil 2', 1, 9);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `fecha_ini`, `fecha_fin`, `hora_ini`, `hora_fin`, `id_usu`, `id_recursos`) VALUES
(8, '2019-11-05', NULL, '05:02:44', NULL, 2, 13),
(9, '2019-11-05', '2019-11-05', '05:08:54', NULL, 2, 2),
(10, '2019-11-05', '2019-11-05', '05:10:12', '05:10:12', 2, 4),
(11, '2019-11-05', '2019-11-05', '05:11:52', '05:11:52', 2, 5),
(12, '2019-11-05', '2019-11-05', '05:32:13', '05:32:13', 2, 1),
(13, '2019-11-05', NULL, '05:34:53', NULL, 2, 3),
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
(41, '2019-11-07', NULL, '03:11:09', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_recurso`
--

CREATE TABLE `tipo_recurso` (
  `id_tipo_recurso` int(3) NOT NULL,
  `Nombre_tipo_recurso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `user`, `password`) VALUES
(1, 'Fernando', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Mario', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Aaron', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Admin', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `id_recursos` (`id_recursos`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recursos`),
  ADD KEY `id_disponible` (`id_disponible`),
  ADD KEY `id_tipo_recurso` (`id_tipo_recurso`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `reserva_recursos` (`id_recursos`);

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
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recursos` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tipo_recurso`
--
ALTER TABLE `tipo_recurso`
  MODIFY `id_tipo_recurso` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `incidencias_ibfk_2` FOREIGN KEY (`id_recursos`) REFERENCES `recursos` (`id_recursos`);

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
  ADD CONSTRAINT `reserva_recursos` FOREIGN KEY (`id_recursos`) REFERENCES `recursos` (`id_recursos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
