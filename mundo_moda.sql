-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-02-2020 a las 01:27:36
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mundo_moda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `code`, `category`) VALUES
(47, '001', 'Acostumbradores'),
(48, '002', 'Bermudas'),
(49, '003', 'Blumeres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_excel`
--

DROP TABLE IF EXISTS `inventario_excel`;
CREATE TABLE IF NOT EXISTS `inventario_excel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cod_inv` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cod_pro` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nom_pro` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inventario_excel`
--

INSERT INTO `inventario_excel` (`id`, `cod_inv`, `cod_pro`, `nom_pro`) VALUES
(175, '003', '0001', 'Para NiÃ±o ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
