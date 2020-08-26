-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2020 a las 03:19:44
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `geoinf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_violencia`
--

CREATE TABLE `datos_violencia` (
  `cve_geo` int(2) NOT NULL,
  `entidad` varchar(31) DEFAULT NULL,
  `misotuits` int(5) DEFAULT NULL,
  `tot_tuits` int(6) DEFAULT NULL,
  `tasa_misotuits` varchar(5) DEFAULT NULL,
  `femin_secretariado` int(3) DEFAULT NULL,
  `pob_fem15` int(8) DEFAULT NULL,
  `tasa_fem_cienmil` varchar(4) DEFAULT NULL,
  `feminicidios` int(4) DEFAULT NULL,
  `tasa_femp_cienmil` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_violencia`
--

INSERT INTO `datos_violencia` (`cve_geo`, `entidad`, `misotuits`, `tot_tuits`, `tasa_misotuits`, `femin_secretariado`, `pob_fem15`, `tasa_fem_cienmil`, `feminicidios`, `tasa_femp_cienmil`) VALUES
(0, 'Nacional', 17666, 146468, '12.06', 867, 61474620, '1.41', 1177, '1.91'),
(1, 'Aguascalientes', 123, 1153, '10.67', 3, 672453, '0.45', 2, '0.3'),
(2, 'Baja California', 247, 2578, '9.58', 23, 1665425, '1.38', 85, '5.1'),
(3, 'Baja California Sur', 89, 749, '11.88', 0, 352892, '0', 13, '3.68'),
(4, 'Campeche', 122, 891, '13.69', 4, 458655, '0.87', 2, '0.44'),
(5, 'Coahuila de Zaragoza', 403, 3034, '13.28', 7, 1492303, '0.47', 14, '0.94'),
(6, 'Colima', 120, 804, '14.93', 10, 360444, '2.77', 8, '2.22'),
(7, 'Chiapas', 224, 1866, '12', 24, 2681187, '0.9', 11, '0.41'),
(8, 'Chihuahua', 310, 2288, '13.55', 47, 1804299, '2.6', 128, '7.09'),
(9, 'Ciudad de México', 2884, 32611, '8.84', 41, 4687003, '0.87', 60, '1.28'),
(10, 'Durango', 116, 935, '12.41', 5, 894372, '0.56', 8, '0.89'),
(11, 'Guanajuato', 611, 4786, '12.77', 15, 3027308, '0.5', 146, '4.82'),
(12, 'Guerrero', 186, 1679, '11.08', 34, 1834192, '1.85', 82, '4.47'),
(13, 'Hidalgo', 294, 2169, '13.55', 27, 1489334, '1.81', 6, '0.4'),
(14, 'Jalisco', 1245, 10491, '11.87', 38, 4009761, '0.95', 43, '1.07'),
(15, 'México', 1426, 12675, '11.25', 91, 8353540, '1.09', 125, '1.5'),
(16, 'Michoacán de Ocampo', 261, 2043, '12.78', 23, 2374724, '0.97', 49, '2.06'),
(17, 'Morelos', 193, 1940, '9.95', 19, 988905, '1.92', 15, '1.52'),
(18, 'Nayarit', 59, 477, '12.37', 6, 595050, '1.01', 13, '2.18'),
(19, 'Nuevo León', 2497, 16547, '15.09', 82, 2577647, '3.18', 24, '0.93'),
(20, 'Oaxaca', 139, 1544, '9', 36, 2079211, '1.73', 51, '2.45'),
(21, 'Puebla', 764, 6327, '12.08', 22, 3225206, '0.68', 44, '1.36'),
(22, 'Querétaro', 440, 3550, '12.39', 3, 1044936, '0.29', 9, '0.86'),
(23, 'Quintana Roo', 328, 2994, '10.96', 7, 750024, '0.93', 25, '3.33'),
(24, 'San Luis Potosí', 250, 2019, '12.38', 28, 1400295, '2', 17, '1.21'),
(25, 'Sinaloa', 755, 4658, '16.21', 58, 1502236, '3.86', 34, '2.26'),
(26, 'Sonora', 905, 6057, '14.94', 27, 1439911, '1.88', 15, '1.04'),
(27, 'Tabasco', 339, 2621, '12.93', 39, 1223680, '3.19', 15, '1.23'),
(28, 'Tamaulipas', 765, 4235, '18.06', 12, 1749512, '0.69', 18, '1.03'),
(29, 'Tlaxcala', 63, 523, '12.05', 3, 658282, '0.46', 2, '0.3'),
(30, 'Veracruz de Ignacio de la Llave', 845, 6165, '13.71', 107, 4203365, '2.55', 80, '1.9'),
(31, 'Yucatán', 374, 3002, '12.46', 6, 1069627, '0.56', 4, '0.37'),
(32, 'Zacatecas', 289, 3057, '9.45', 20, 808841, '2.47', 29, '3.59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_violencia`
--
ALTER TABLE `datos_violencia`
  ADD PRIMARY KEY (`cve_geo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
