-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 15:12:57
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
-- Estructura de tabla para la tabla `disponible`
--

CREATE TABLE `disponible` (
  `id_disponible` int(3) NOT NULL,
  `nombre_disponible` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disponible`
--

INSERT INTO `disponible` (`id_disponible`, `nombre_disponible`) VALUES
(1, 'si'),
(2, 'no');

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
  `fecha_fin` date NOT NULL,
  `hora_ini` time NOT NULL,
  `hora_fin` time NOT NULL,
  `id_usu` int(11) DEFAULT NULL,
  `id_recursos` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'Aaron', '81dc9bdb52d04dc20036dbd8313ed055');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
