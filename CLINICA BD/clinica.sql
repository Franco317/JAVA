-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2025 a las 18:53:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallehistoriaclinica`
--

CREATE TABLE `detallehistoriaclinica` (
  `id_detalle` int(11) NOT NULL,
  `id_historia` int(11) NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `fecha_consulta` datetime NOT NULL,
  `observaciones` text DEFAULT NULL,
  `receta` text DEFAULT NULL,
  `estudios_solicitados` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallehistoriaclinica`
--

INSERT INTO `detallehistoriaclinica` (`id_detalle`, `id_historia`, `id_profesional`, `fecha_consulta`, `observaciones`, `receta`, `estudios_solicitados`) VALUES
(1, 1, 5, '2025-03-08 23:54:11', 'mejoro en las ultimas 2 semanas', 'ejercicio diario', 'radiografias de 2011'),
(2, 2, 6, '2025-03-12 21:25:00', 'fgj', 'jkjhk', 'trata'),
(3, 9, 5, '2025-04-22 12:14:00', 'hihvhfiih', 'iugoo', 'ugiyg\r\n'),
(4, 9, 5, '2025-04-11 09:01:00', 'vhv', 'effdef', 'fewfe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre_especialidad`, `descripcion`) VALUES
(1, 'fonoaudiologo', 'nariz y oido'),
(2, 'Pediatria', 'medico de niños'),
(3, 'Cardiologo', 'todo lo relacionado al corazon\r\n'),
(4, 'oculista', 'especialista en ojos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinica`
--

CREATE TABLE `historiaclinica` (
  `id_historia` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_apertura` date NOT NULL,
  `motivo_consulta` text DEFAULT NULL,
  `antecedentes` text DEFAULT NULL,
  `diagnostico` text DEFAULT NULL,
  `tratamiento` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historiaclinica`
--

INSERT INTO `historiaclinica` (`id_historia`, `id_paciente`, `fecha_apertura`, `motivo_consulta`, `antecedentes`, `diagnostico`, `tratamiento`) VALUES
(1, 1, '2025-03-07', 'dolor de cabeza ', 'ninguno', 'mucho estres laboral', 'paracetamol cada 8hs'),
(2, 3, '2025-03-07', 'dolor de panza ', 'ninguno', 'problemas de nerviosismo', 'paracetamol cada 8hs'),
(3, 2, '2025-03-08', 'vjhvuv', 'f fxvghb', ' bgfdbg', 'gbfdg'),
(9, 2, '2025-04-11', '8hi9y8g', 'i0im0i mfdvdf', 'vfvdv', 'dvfdvv'),
(11, 4, '2025-07-15', 'Dolor de muela', 'comio idrio', 'Muela lastimada', 'ponerle un bozal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre_paciente` varchar(50) NOT NULL,
  `apellido_paciente` varchar(50) NOT NULL,
  `dni_paciente` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono_paciente` varchar(20) DEFAULT NULL,
  `email_paciente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre_paciente`, `apellido_paciente`, `dni_paciente`, `fecha_nacimiento`, `telefono_paciente`, `email_paciente`) VALUES
(1, 'edgardo', 'valentes', '65763543', '2002-03-05', '351898744', 'edgar@gmail.com'),
(2, 'Giuliano', 'Diaz', '34567888', '2015-02-11', '4234242223', 'GIL@Email.com'),
(3, 'Marlon ', 'Brando', '47999888', '1924-04-03', '367636365', 'Marlon@Email.com'),
(4, 'Airthon ', 'Maquera', '4672989', '2012-07-19', '35178953498', 'Amaque@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `id_profesional` int(11) NOT NULL,
  `nombre_profesional` varchar(50) NOT NULL,
  `apellido_profesional` varchar(50) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `telefono_profesional` varchar(20) DEFAULT NULL,
  `email_profesional` varchar(100) DEFAULT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesional`
--

INSERT INTO `profesional` (`id_profesional`, `nombre_profesional`, `apellido_profesional`, `matricula`, `telefono_profesional`, `email_profesional`, `id_especialidad`) VALUES
(5, 'alberto', 'jonas', '43532', '351765234', 'alb@gmail.com', 1),
(6, 'lucia', 'nashe', '12432', '23412332141', 'luu@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallehistoriaclinica`
--
ALTER TABLE `detallehistoriaclinica`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_historia` (`id_historia`),
  ADD KEY `id_profesional` (`id_profesional`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  ADD PRIMARY KEY (`id_historia`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `dni_paciente` (`dni_paciente`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id_profesional`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallehistoriaclinica`
--
ALTER TABLE `detallehistoriaclinica`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id_profesional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallehistoriaclinica`
--
ALTER TABLE `detallehistoriaclinica`
  ADD CONSTRAINT `detallehistoriaclinica_ibfk_1` FOREIGN KEY (`id_historia`) REFERENCES `historiaclinica` (`id_historia`),
  ADD CONSTRAINT `detallehistoriaclinica_ibfk_2` FOREIGN KEY (`id_profesional`) REFERENCES `profesional` (`id_profesional`);

--
-- Filtros para la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  ADD CONSTRAINT `historiaclinica_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `profesional_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
