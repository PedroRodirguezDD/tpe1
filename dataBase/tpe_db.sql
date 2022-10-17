-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2022 a las 05:50:27
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id`, `nombre`, `imagen`) VALUES
(1, 'The Beatles', ''),
(2, 'radio head', ''),
(13, 'Queen', 'img/artista/634cd065b61fe.jpg'),
(14, 'pink floyd', 'img/artista/634cd0aee1683.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `anio` int(11) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `artista_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id`, `nombre`, `anio`, `genero`, `artista_id_fk`) VALUES
(3, 'let it be', 1969, 'rock', 1),
(11, 'no surprises', 1997, 'rock', 2),
(12, 'yesterday', 1965, 'rock', 1),
(15, 'creep', 1992, 'rock', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'pedro@mail.com', '$2a$12$Xh3k3FSSG1ZVVPVqqy3Hse5YXhxVqwC5ih7aa9PQgD6Q/Uikv.B6S');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_id_fk` (`artista_id_fk`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`artista_id_fk`) REFERENCES `artista` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
