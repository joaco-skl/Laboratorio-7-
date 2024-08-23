-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2024 a las 01:24:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemacompras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cod_cli` int(11) NOT NULL,
  `Nombre_C` varchar(100) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Cod_cli`, `Nombre_C`, `Direccion`, `Email`) VALUES
(1, 'joaquin stekl', 'charrua y simon bolivar', 'joaquinstekl@gmail.com'),
(2, 'joaquin stekl', 'charrua y simon bolivar', 'joaquinstekl@gmail.com'),
(3, 'josé hola', 'afafaf', 'jafafsfb@amdmgad'),
(4, 'joaco Stekl Prada', 'kskdaksdk', 'akmfaofomsf'),
(5, 'joaco Stekl Prada', 'kskdaksdk', 'akmfaofomsf'),
(6, 'Candela Sosa', 'ajakfafkfs', 'jadgnadkfaf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `Cod_Compra` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Cod_cli` int(11) DEFAULT NULL,
  `Cod_P` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `Cod` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Origen` varchar(100) DEFAULT NULL,
  `Cod_P` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`Cod`, `Descripcion`, `Origen`, `Cod_P`) VALUES
(1, 'Deliciosa milanesa', 'Uruguay', 20),
(2, 'panchos re ricos', 'Uruguay', 21),
(3, 'mouse RGB para jugar', 'Tahilandia', 23),
(4, 'Teclado generico', 'China', 22),
(5, 'Pelota que rebota', 'China', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Cod_P` int(11) NOT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Cod_P`, `Precio`, `Nombre`) VALUES
(20, 100, 'milanesa'),
(21, 100, 'pancho'),
(22, 200, 'teclado'),
(23, 1500, 'mouse gamer'),
(24, 10000000, 'Pelota');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cod_cli`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`Cod_Compra`),
  ADD KEY `compra_ibfk_1` (`Cod_cli`),
  ADD KEY `fk_cod_p` (`Cod_P`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`Cod`),
  ADD KEY `detalle_ibfk_1` (`Cod_P`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Cod_P`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Cod_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `Cod_Compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `Cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Cod_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`Cod_cli`) REFERENCES `cliente` (`Cod_cli`),
  ADD CONSTRAINT `fk_cod_p` FOREIGN KEY (`Cod_P`) REFERENCES `producto` (`Cod_P`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`Cod_P`) REFERENCES `producto` (`Cod_P`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
