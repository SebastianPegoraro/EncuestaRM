-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2018 a las 14:44:32
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuestarm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elecciones`
--

CREATE TABLE `elecciones` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `elecciones`
--

INSERT INTO `elecciones` (`id`, `descripcion`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Si, por favor'),
(4, 'Masculino'),
(5, 'Femenino'),
(6, 'Si, por favor'),
(7, 'Masculino'),
(8, 'Masculino'),
(9, 'Masculino'),
(10, 'Masculino'),
(11, 'Masculino'),
(12, 'Masculino'),
(13, 'Femenino'),
(14, 'Si, por favor'),
(15, 'Masculino'),
(16, 'Femenino'),
(17, 'Si, por favor'),
(18, 'Bleach'),
(19, 'Fullmetal Alchemist'),
(20, 'Shingeki no Kioshin'),
(21, 'HunterXHunter'),
(22, 'Femenino'),
(23, 'Masculino'),
(24, 'a'),
(25, 'a'),
(26, 'Femenino'),
(27, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_cierre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `titulo`, `fecha_inicio`, `fecha_cierre`, `fecha_creacion`) VALUES
(1, 'Cerveza', '18-12-2018', '15-02-2019', '17/12/2018'),
(2, 'CumpleaÃ±os', '26-12-2018', '31-12-2018', '21/12/2018'),
(3, 'Bienal', '02-12-2018', '14-08-2019', '21/12/2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(11) NOT NULL,
  `eleccion_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `eleccion_id`, `tipo_id`, `pregunta_id`, `estado`) VALUES
(1, 7, 3, 4, NULL),
(2, 11, 3, 8, NULL),
(3, 12, 3, 9, NULL),
(4, 13, 3, 9, NULL),
(5, 14, 3, 9, NULL),
(6, 15, 3, 10, NULL),
(7, 16, 3, 10, NULL),
(8, 17, 3, 10, NULL),
(9, 18, 1, 11, NULL),
(10, 19, 1, 11, NULL),
(11, 20, 1, 11, NULL),
(12, 21, 1, 11, NULL),
(13, 22, 3, 12, NULL),
(14, 23, 3, 12, NULL),
(15, 24, 4, 13, NULL),
(16, 25, 4, 14, NULL),
(17, 26, 1, 15, NULL),
(18, 27, 1, 15, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `encuesta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `descripcion`, `encuesta_id`) VALUES
(4, 'Sexo?', 1),
(8, 'Sexo?', 1),
(9, 'Sexo?', 1),
(10, 'Sexo?', 1),
(11, 'Anime?', 1),
(12, 'Sexo?', 2),
(13, 'Edad', 2),
(14, 'Feeling Good?', 2),
(15, 'Sexo?', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `clase` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `clase`) VALUES
(1, 'radio'),
(3, 'checkbox'),
(4, 'text');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `Password`) VALUES
(0, 'Mauro', '1234'),
(1, 'Seba', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eleccion_id` (`eleccion_id`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `pregunta_id` (`pregunta_id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `encuesta_id` (`encuesta_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`),
  ADD CONSTRAINT `opciones_ibfk_2` FOREIGN KEY (`eleccion_id`) REFERENCES `elecciones` (`id`),
  ADD CONSTRAINT `opciones_ibfk_3` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
