-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2022 a las 16:38:42
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ceutago`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credenciales`
--

CREATE TABLE `credenciales` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `credenciales`
--

INSERT INTO `credenciales` (`id`, `email`, `password`) VALUES
(17, 'uasd@gmail.com', '123'),
(18, 'root@gmail.com', '123'),
(19, 'root2', '123'),
(21, 'rewiopfsda', '123'),
(22, '123', '123'),
(23, 'juanmaherrera@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `id_puestos` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `puntos` int(5) NOT NULL,
  `tipo_puestos` enum('Tursimo','Local') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`id_puestos`, `nombre`, `puntos`, `tipo_puestos`) VALUES
(1, 'La Muralla', 50, 'Tursimo'),
(2, 'Bar Pepe', 200, 'Local'),
(3, 'Las Vegas', 200, 'Local'),
(4, 'Monte Hacho', 50, 'Tursimo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `status` enum('Visitado','No visitado') NOT NULL DEFAULT 'No visitado',
  `date` date DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`user_id`, `task_id`, `points`, `status`, `date`, `name`) VALUES
(17, 1, 100, 'No visitado', NULL, 'Vista el lugar de interés La Muralla'),
(17, 2, 50, 'No visitado', NULL, 'Vista el local Bar Pepe'),
(17, 3, 50, 'No visitado', NULL, 'Vista el local Las Vegas'),
(17, 4, 100, 'No visitado', NULL, 'Vista el lugar de interés Monte Hacho'),
(22, 1, 50, 'No visitado', NULL, 'Visita el sitio de interes La Muralla'),
(22, 2, 200, 'No visitado', NULL, 'Visita el sitio de interes Bar Pepe'),
(22, 3, 200, 'No visitado', NULL, 'Visita el sitio de interes Las Vegas'),
(22, 4, 50, 'No visitado', NULL, 'Visita el sitio de interes Monte Hacho'),
(23, 1, 100, 'No visitado', NULL, 'Visita el lugar de interés La Muralla'),
(23, 2, 50, 'No visitado', NULL, 'Visita el local Bar Pepe'),
(23, 3, 50, 'No visitado', NULL, 'Visita el local Las Vegas'),
(23, 4, 100, 'No visitado', NULL, 'Visita el lugar de interés Monte Hacho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `name` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `points` int(4) NOT NULL,
  `tipo_usuario` enum('Residente','No Residente') NOT NULL,
  `cdo_post` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`name`, `id`, `points`, `tipo_usuario`, `cdo_post`) VALUES
('123', 17, 0, 'Residente', 0),
('root', 18, 0, 'No Residente', 11370),
('root2', 19, 0, 'No Residente', 11370),
('root3', 21, 0, 'Residente', 51002),
('juanma', 22, 5200, 'No Residente', 11370),
('juanmaherrera', 23, 0, 'Residente', 51001);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `credenciales`
--
ALTER TABLE `credenciales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`id_puestos`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`user_id`,`task_id`),
  ADD KEY `tarea` (`task_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `id_puestos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `credenciales`
--
ALTER TABLE `credenciales`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tarea` FOREIGN KEY (`task_id`) REFERENCES `puestos` (`id_puestos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
