-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2023 a las 07:39:39
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_examen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `id_person` int(11) NOT NULL,
  `name_person` varchar(250) NOT NULL,
  `email_person` varchar(250) NOT NULL,
  `rfc_person` varchar(250) NOT NULL,
  `pass_person` varchar(250) NOT NULL,
  `phone_person` varchar(50) NOT NULL,
  `web_person` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`id_person`, `name_person`, `email_person`, `rfc_person`, `pass_person`, `phone_person`, `web_person`) VALUES
(1, 'Emiliano', 'emiliano@correo.com', 'OIVE991211', '12345', '7341296682', 'www.hola.com'),
(2, 'Emiliano1', 'emiliano1@correo.com', 'OIVE991211P65', '12', '', ''),
(46, 'Emiliano1', 'emiliano1@correo.com', 'OIVE991211P11', '123', '', ''),
(47, 'Emiliano1', 'emiliano2@correo.com', 'OIVE991211P22', '123', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_usu` int(11) NOT NULL,
  `name_usu` varchar(250) NOT NULL,
  `rfc_usu` varchar(250) NOT NULL,
  `address_usu` varchar(250) NOT NULL,
  `phone_usu` varchar(50) NOT NULL,
  `website_usu` varchar(250) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_usu`, `name_usu`, `rfc_usu`, `address_usu`, `phone_usu`, `website_usu`, `person_id`) VALUES
(1, 'Jose', 'JOSE991211P65', 'Av. Emiliano Zapata', '7341296682', 'www.google.com', 1),
(8, 'Manuel', 'MANU111213P23', 'correo@correo.com', '7341296682', 'www.google.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
