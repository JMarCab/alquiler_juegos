-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2020 a las 11:41:35
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquiler_juegos`
--
DROP DATABASE IF EXISTS `alquiler_juegos`;
CREATE DATABASE IF NOT EXISTS `alquiler_juegos` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `alquiler_juegos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

DROP TABLE IF EXISTS `alquiler`;
CREATE TABLE `alquiler` (
  `id` int(11) NOT NULL,
  `Cod_juego` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `DNI_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_alquiler` date NOT NULL,
  `Fecha_devol` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`id`, `Cod_juego`, `DNI_cliente`, `Fecha_alquiler`, `Fecha_devol`) VALUES
(10, 'CoD-PS4', '12121212A', '2020-12-11', '2020-12-11'),
(11, 'CoD-PS4', '12121212A', '2020-12-11', '2020-12-11'),
(12, 'CoD-PS4', '12121212A', '2020-12-11', '2020-12-11'),
(13, 'M-Nintendo', '12121212A', '2020-12-11', '2020-12-11'),
(14, 'CoD-PS4', '12121212A', '2020-12-11', '2020-12-11'),
(15, 'F-PS4', '12121212A', '2020-12-11', '2020-12-11'),
(16, 'SMB-Nintendo', '12121212A', '2020-12-11', '2020-12-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `DNI` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Localidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`DNI`, `Nombre`, `Apellidos`, `Direccion`, `Localidad`, `Clave`, `Tipo`) VALUES
('11111111A', 'Antonio', 'López', 'Ancha,21', 'Lucena', '4a181673429f0b6abbfd452f0f3b5950', 'cliente'),
('12121212A', 'Admin', 'Admin', 'Direc. Admin', 'Lucena', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE `juegos` (
  `Codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_juego` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_consola` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Anno` year(4) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Alguilado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`Codigo`, `Nombre_juego`, `Nombre_consola`, `Anno`, `Precio`, `Alguilado`, `Imagen`, `descripcion`) VALUES
('CoD-PS4', 'Call of Duty', 'PS4', 2019, 120, 'NO', 'imagenes/1606902279índice.jpg', 'Call of Duty es una serie de videojuegos de disparos en primera persona, de estilo bélico, creada por Ben Chichoski, desarrollada principal e inicialmente por Infinity Ward, Treyarch, Sledgehammer Games y en menor proporción Raven Software y distribuida por Activision.'),
('F-PS4', 'Fortnite', 'PS4', 2018, 90, 'NO', 'imagenes/1607683088fornite.jpg', 'Fortnite es un videojuego del año 2017 desarrollado por la empresa Epic Games, lanzado como diferentes paquetes de software que presentan diferentes modos de juego, pero que comparten el mismo motor de juego y mecánicas. Fue anunciado en los Spike Video Game Awards en 2011'),
('M-Nintendo', 'MineCraft', 'Nintendo', 2015, 50, 'NO', 'imagenes/1607590859minecraft.jpg', 'Minecraft es un videojuego de construcción, de tipo «mundo abierto» o sandbox creado originalmente por el sueco Markus Persson (conocido comúnmente como \"Notch\"),2​ y posteriormente desarrollado por su empresa, Mojang Studios. Fue lanzado públicamente el 17 de mayo de 2009, después de diversos cambios fue lanzada su versión completa el 18 de noviembre de 2011. '),
('SMB-Nintendo', 'Super Mario Bross', 'Nintendo', 2007, 99, 'NO', 'imagenes/160690218600197580507404____1__640x640.jpg', 'Super Mario (スーパーマリオ Sūpā Mario?) es una serie de videojuegos de plataformas creados por la empresa desarrolladora Nintendo y protagonizados por su mascota, Mario. También conocida como la serie Super Mario Bros. (スーパーマリオブラザーズ Sūpā Mario Burazāzu?). o simplemente la serie Mario (マ リ オ?), es la serie principal de la franquicia de Mario. Se ha lanzado al menos un videojuego de Super Mario para todas las consolas de videojuegos de Nintendo. ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cod_juego` (`Cod_juego`),
  ADD KEY `DNI_cliente` (`DNI_cliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`Codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`DNI_cliente`) REFERENCES `cliente` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alquiler_ibfk_2` FOREIGN KEY (`Cod_juego`) REFERENCES `juegos` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
