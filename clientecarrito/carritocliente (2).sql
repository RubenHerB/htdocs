-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2024 a las 01:57:11
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carritocliente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `codArticulo` int(8) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `PVP` decimal(12,2) NOT NULL,
  `IVA` int(3) NOT NULL,
  `cantidad` int(6) NOT NULL,
  `cantidadMinima` int(4) NOT NULL,
  `correoProveedor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codArticulo`, `nombre`, `PVP`, `IVA`, `cantidad`, `cantidadMinima`, `correoProveedor`) VALUES
(1, 'Camiseta de algodón', 15.99, 21, 15, 20, 'proveedor1@ejemplo.com'),
(2, 'Pantalones vaqueros', 29.99, 21, 80, 15, 'proveedor2@ejemplo.com'),
(3, 'Zapatillas deportivas', 49.99, 21, 120, 30, 'proveedor3@ejemplo.com'),
(4, 'Reloj de pulsera', 99.99, 21, 50, 10, 'proveedor4@ejemplo.com'),
(5, 'Bolso de cuero', 79.99, 21, 70, 25, 'proveedor5@ejemplo.com'),
(6, 'Gafas de sol', 25.99, 21, 90, 18, 'proveedor6@ejemplo.com'),
(7, 'Bufanda de lana', 12.99, 21, 0, 40, 'proveedor7@ejemplo.com'),
(8, 'Sombrero de paja', 9.99, 21, 120, 35, 'proveedor8@ejemplo.com'),
(9, 'Chaqueta de cuero', 89.99, 21, 60, 12, 'proveedor9@ejemplo.com'),
(10, 'Vestido de fiesta', 69.99, 21, 40, 8, 'proveedor10@ejemplo.com'),
(11, 'Corbata elegante', 19.99, 21, 110, 25, 'proveedor11@ejemplo.com'),
(12, 'Calcetines de algodón', 5.99, 21, 200, 50, 'proveedor12@ejemplo.com'),
(13, 'Blusa estampada', 29.99, 21, 70, 15, 'proveedor13@ejemplo.com'),
(14, 'Abrigo de invierno', 99.99, 21, 45, 10, 'proveedor14@ejemplo.com'),
(15, 'Joyas de plata', 149.99, 21, 30, 5, 'proveedor15@ejemplo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `CodLinea` int(11) NOT NULL,
  `codVenta` int(11) NOT NULL,
  `codArticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`CodLinea`, `codVenta`, `codArticulo`, `cantidad`, `precio`) VALUES
(1, 1, 1, 100, 0.00),
(2, 2, 2, 2, 0.00),
(3, 3, 7, 150, 0.00),
(4, 4, 1, 81, 0.00),
(5, 5, 1, 4, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `DNI` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `poblacion` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `nombre`, `apellidos`, `direccion`, `poblacion`, `correo`) VALUES
('71903520T', 'aaa', 'aa', 'aa', 'aa', 'aa'),
('77777777T', 'ttt', 'tttttt', 'tttttt', 'ttttt', 'ttttttt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `codVenta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `DNI` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`codVenta`, `fecha`, `DNI`) VALUES
(1, '2024-03-13', '77777777T'),
(2, '2024-03-13', '77777777T'),
(3, '2024-03-13', '77777777T'),
(4, '2024-03-13', '77777777T'),
(5, '2024-03-13', '71903520T');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`codArticulo`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`CodLinea`),
  ADD KEY `venta_fk` (`codVenta`),
  ADD KEY `articulo_fk` (`codArticulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`codVenta`),
  ADD KEY `dni_fk` (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `codArticulo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `CodLinea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `codVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD CONSTRAINT `articulo_fk` FOREIGN KEY (`codArticulo`) REFERENCES `articulos` (`codArticulo`),
  ADD CONSTRAINT `venta_fk` FOREIGN KEY (`codVenta`) REFERENCES `ventas` (`codVenta`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `dni_fk` FOREIGN KEY (`DNI`) REFERENCES `usuarios` (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
