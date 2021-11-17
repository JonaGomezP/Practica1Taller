-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 08:48:50
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tallerservidores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuario`
--

CREATE TABLE `datos_usuario` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido1` varchar(25) NOT NULL,
  `apellido2` varchar(25) NOT NULL,
  `fecha_alta` date NOT NULL,
  `pass` varchar(50) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_usuario`
--

INSERT INTO `datos_usuario` (`id_usuario`, `nombre`, `apellido1`, `apellido2`, `fecha_alta`, `pass`, `administrador`) VALUES
(1, 'Roberto', 'Gonzalez', 'Garcia', '2021-10-11', '1234', 0),
(2, 'Jonatan', 'Gomez', 'Pascual', '2021-10-01', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_servicios`
--

CREATE TABLE `lista_servicios` (
  `id_servicio` int(10) NOT NULL,
  `id_vehiculo` int(32) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `servicio` varchar(50) NOT NULL,
  `ultima_revision` date NOT NULL,
  `proxima_revision` date NOT NULL,
  `comentarios` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_servicios`
--

INSERT INTO `lista_servicios` (`id_servicio`, `id_vehiculo`, `matricula`, `servicio`, `ultima_revision`, `proxima_revision`, `comentarios`) VALUES
(9, 23, '0700JRW', 'bimasa', '2021-10-18', '2021-10-23', 'la bimasa tocá'),
(11, 23, '', 'cambio_correa_distribucion', '2021-10-04', '2022-10-29', 'Cambiar la correa'),
(12, 23, '0700JRW', 'prueba', '1999-02-01', '2000-11-11', 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_vehiculos`
--

CREATE TABLE `lista_vehiculos` (
  `id_usuario` int(10) NOT NULL,
  `id_vehiculo` int(10) NOT NULL,
  `marca` varchar(32) NOT NULL,
  `modelo` varchar(32) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `combustible` varchar(10) NOT NULL,
  `tipo_motor` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_vehiculos`
--

INSERT INTO `lista_vehiculos` (`id_usuario`, `id_vehiculo`, `marca`, `modelo`, `matricula`, `combustible`, `tipo_motor`) VALUES
(1, 23, 'seat', 'ibiza', '0700JRW', 'diesel', 'BKD'),
(1, 24, 'ford', 'focus', '1234thb', 'diesel', 'jks'),
(1, 517, 'bmw', 'm4', '1234HBC', 'gasolina', '6YV'),
(1, 518, 'bmw', 'm4', '1234HBC', 'gasolina', '6YV'),
(2, 519, 'lambo', 'huracan', '1234ZZZ', 'hibrido', 'bbb');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_usuario`
--
ALTER TABLE `datos_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `lista_vehiculos`
--
ALTER TABLE `lista_vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_usuario`
--
ALTER TABLE `datos_usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1282;

--
-- AUTO_INCREMENT de la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  MODIFY `id_servicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `lista_vehiculos`
--
ALTER TABLE `lista_vehiculos`
  MODIFY `id_vehiculo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=533;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lista_servicios`
--
ALTER TABLE `lista_servicios`
  ADD CONSTRAINT `lista_servicios_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `lista_vehiculos` (`id_vehiculo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_vehiculos`
--
ALTER TABLE `lista_vehiculos`
  ADD CONSTRAINT `lista_vehiculos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `datos_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
