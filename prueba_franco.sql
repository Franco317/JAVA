-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2025 a las 16:40:07
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
-- Base de datos: `prueba franco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `Id_barrio` int(11) NOT NULL,
  `Nombre_barrio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`Id_barrio`, `Nombre_barrio`) VALUES
(1, 'Las Flores'),
(2, 'Villa Libertador'),
(3, 'Ciudadela'),
(4, 'Parque velez Sarfield'),
(5, 'Alberdi'),
(7, 'Alta Cordoba'),
(8, 'Jardin'),
(9, 'Fuerte Apaache');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Id_genero` int(11) NOT NULL,
  `Nombre_genero` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Id_genero`, `Nombre_genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Transgenero'),
(4, 'No Binario'),
(5, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_Persona` int(11) NOT NULL,
  `Apellido_persona` text NOT NULL,
  `Nombre_persona` text NOT NULL,
  `DNI_persona` int(8) NOT NULL,
  `FecNac` date NOT NULL,
  `Genero_persona` int(11) NOT NULL,
  `Calle_persona` text NOT NULL,
  `Numero_persona` int(11) NOT NULL,
  `Barrio_persona` int(11) NOT NULL,
  `Telefono` text NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_Persona`, `Apellido_persona`, `Nombre_persona`, `DNI_persona`, `FecNac`, `Genero_persona`, `Calle_persona`, `Numero_persona`, `Barrio_persona`, `Telefono`, `Email`) VALUES
(1, 'Lopez Acosta', 'Maria Alejandra', 46789987, '2005-07-20', 2, 'Av. Velez Sarfield', 3500, 1, '351678912', 'mariale207@gmailcom'),
(2, 'Rodriguez', 'Carlos Alberto', 45123123, '2004-11-03', 1, 'Av. de Mayo', 520, 2, '4666777', 'carlitosrodri11@hotmailcom'),
(3, 'Gatti', 'Raul Ricardo', 44432234, '2003-11-11', 1, 'Bv.San Juan', 1733, 5, '3516444546', 'rarigatti@yahoo.com'),
(4, 'lopez torres', 'Susana Maria Pia', 45200300, '2005-07-14', 2, 'Elias yofre', 683, 7, '156520201', 'pia1407@gmail.com'),
(5, 'Alonso Diaz', 'Juan Carlos', 47220220, '2007-03-29', 4, 'Colon', 2330, 5, '155667788', 'Juank29@gmail'),
(6, 'Lopez ', 'Alejandra Ariana', 47999888, '2008-10-10', 3, 'Martin Ferreyra', 789, 0, '4613887', 'AleAri@yahoo.com'),
(7, 'Barrios Diaz ', 'Josefina Alejandra', 25444678, '1983-04-24', 0, '', 0, 1, '153242526', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`Id_barrio`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`Id_genero`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_Persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `Id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `Id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
