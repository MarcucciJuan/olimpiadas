-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2024 a las 02:30:37
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
-- Base de datos: `olimpiadas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `Gmail` varchar(255) NOT NULL,
  `contraseña_cliente` varchar(255) NOT NULL,
  `rol_cliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `Gmail`, `contraseña_cliente`, `rol_cliente`) VALUES
(3, 'administrativo1', 'administrativo1@carrito.com', 'carrito', 'administrativo'),
(4, 'Guillermo', 'guilleroperto@gmail.com', 'rafael15', 'cliente'),
(5, 'Tomas', 'tomaspaeya@gmail.com', 'mariscos145', 'cliente'),
(6, 'Pepe', 'pepe@gmail.com', '12345678', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `id_cliente` int(255) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `total`, `id_cliente`, `stock`) VALUES
(13, 760000, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_tiene_producto`
--

CREATE TABLE `pedido_tiene_producto` (
  `id_pedido` int(255) NOT NULL,
  `id_producto` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(255) NOT NULL,
  `nombre_producto` text NOT NULL,
  `stock` int(255) NOT NULL,
  `precio` int(255) NOT NULL,
  `tipo_de_producto` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `stock`, `precio`, `tipo_de_producto`, `imagen`) VALUES
(1, 'Nike Air Max 270', 8, 60000, 'zapatilla', 'zapatilla.jpg'),
(2, 'Adidas Ultraboost', 3, 120000, 'zapatilla', 'zapatilla.jpg'),
(3, 'New Balance 990v5', 10, 75000, 'zapatilla', 'zapatilla.jpg'),
(4, 'Puma RS-X', 5, 40000, 'zapatilla', 'zapatilla.jpg'),
(5, 'Gildan', 20, 15000, 'Remera', 'remera.jpg'),
(6, 'American Apparel', 20, 15000, 'Remera', 'remera.jpg'),
(7, 'Trek Domane', 2, 560000, 'Bicicleta', 'bicicleta.jpg'),
(8, 'Specialized Stumpjumper', 2, 760000, 'Bicicleta', 'bicicleta.jpg'),
(9, 'Pelota Mundial 2014', 4, 80000, 'pelota', 'pelota.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `pedido_tiene_producto`
--
ALTER TABLE `pedido_tiene_producto`
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido_tiene_producto`
--
ALTER TABLE `pedido_tiene_producto`
  ADD CONSTRAINT `pedido_tiene_producto_ibfk_3` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_tiene_producto_ibfk_4` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
