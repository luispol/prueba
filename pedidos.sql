-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-03-2024 a las 17:34:38
-- Versión del servidor: 8.0.36-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3-4ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `idingrediente` int NOT NULL,
  `idproducto` int NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `costo_adicional` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`idingrediente`, `idproducto`, `descripcion`, `costo_adicional`) VALUES
(15, 1, 'Lechuga', 1),
(16, 1, 'Pollo Indio', 12),
(17, 1, 'Arroz', 12),
(18, 1, 'Brocoli', 1),
(19, 1, 'Chile verde', 1),
(20, 1, 'Tomate', 4),
(21, 2, 'Masa de pan', 12),
(22, 2, 'Ajo', 1),
(23, 2, 'Tomate', 34),
(24, 3, 'Piña', 1),
(25, 3, 'Jamon', 12),
(26, 4, 'Pan de caja', 1),
(27, 4, 'Queso', 0.25),
(28, 4, 'Tomate', 1),
(33, 4, 'Lechuga', 2),
(38, 25, 'Ajo', 1),
(39, 25, 'Queso', 1),
(40, 25, 'Pan', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int NOT NULL,
  `idrestaurante` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `foto1` varchar(250) NOT NULL,
  `foto2` varchar(250) NOT NULL,
  `foto3` varchar(250) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `idrestaurante`, `nombre`, `descripcion`, `foto1`, `foto2`, `foto3`, `precio`) VALUES
(1, 8, 'Pollo a la wok', 'Pollo con variedad de vegetales', '/prueba/public_html/fotos/PolloWok1.jpg', '/prueba/public_html/fotos/polloWok2.jpg', '/prueba/public_html/fotos/polloWok3.jpg', 10.2),
(2, 7, 'Palitroques', 'Pieza de pan suave', '/prueba/public_html/fotos/palitroques1.jpg', '/prueba/public_html/fotos/palitroques2.jpg', '/prueba/public_html/fotos/palitroques3.jpg', 15),
(3, 7, 'Pizza Hawaiana', 'Pizza con piña', '/prueba/public_html/fotos/pizza1.jpg', '/prueba/public_html/fotos/pizza2.jpg', '/prueba/public_html/fotos/pizza3.jpg', 25),
(4, 6, ' The Grand Slamwich', 'Sandiwch con especialidad de la casa', '/prueba/public_html/fotos/sandwich1.jpg', '/prueba/public_html/fotos/sandiwch2.jpg', '/prueba/public_html/fotos/sandiwch3.jpg', 15.45),
(25, 7, 'Pan con ajo', 'Pan con ajo con quesillo especial', '/prueba/public_html/fotos/panajo1.jpg', '/prueba/public_html/fotos/panajo2.jpg', '/prueba/public_html/fotos/panajo3.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `idrestaurante` int NOT NULL,
  `nombre_restaurante` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `contacto` varchar(50) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`idrestaurante`, `nombre_restaurante`, `direccion`, `telefono`, `contacto`, `foto`, `fecha_ingreso`, `latitud`, `longitud`) VALUES
(6, 'Dennys', 'Santa Ana', '7777-7777', 'dennys@gmail.com', '/prueba/public_html/fotos/dennys.png', '2024-03-25', 14.172312272643577, -89.52575648470115),
(7, 'Pizza Hut', 'Santa Ana', '1111-1111', 'pizza@gmail.com', '/prueba/public_html/fotos/PizzaHut.png', '2024-03-25', 14.001817364854116, -88.72375453157615),
(8, 'China Wok', 'Santa Ana', '3333-3333', 'cihna@gmail.com', '/prueba/public_html/fotos/choinaWok.png', '2024-03-29', 13.985826954298721, -89.8141475979824),
(9, 'KFC', 'Santa Ana', '5555-5555', 'kfc@gmail.com', '/prueba/public_html/fotos/kfc.png', '2024-03-25', 13.60226024244035, -89.74960292024802),
(10, 'Pupusawa', 'Sonsonate', '9999-9999', 'pupusawa@gmail.com', '/prueba/public_html/fotos/pupusawa.jpg', '2024-03-28', 13.705815874721827, -89.6438595120449),
(11, 'Wendys', '', '7878-7878', 'wendys@gmail.com', '/prueba/public_html/fotos/wendys.jpg', '2024-03-28', 13.695142139070825, -89.20165980501365);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `tipo` enum('Administrador','Usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario`, `password`, `nombres`, `apellidos`, `tipo`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Luis Mario', 'Polanco Bolaños', 'Administrador'),
(3, 'user1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Karla', 'Sandoval', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`idingrediente`),
  ADD KEY `FK_idproducto` (`idproducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `FK_idrestaurante` (`idrestaurante`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`idrestaurante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `idingrediente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `idrestaurante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `FK_idproducto` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_idrestaurante` FOREIGN KEY (`idrestaurante`) REFERENCES `restaurantes` (`idrestaurante`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
