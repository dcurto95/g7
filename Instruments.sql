-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-03-2016 a las 15:05:07
-- Versión del servidor: 5.5.47-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `G7DB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Instruments`
--

CREATE TABLE IF NOT EXISTS `Instruments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT 'DEFAULT',
  `type` int(1) unsigned DEFAULT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Volcado de datos para la tabla `Instruments`
--

INSERT INTO `Instruments` (`id`, `name`, `type`, `url`) VALUES
(1, 'Violi', 1, 'http://www.joanllongueres.cat/wp-content/uploads/INS-Violi.jpg'),
(2, 'Bateria', 3, 'http://vignette4.wikia.nocookie.net/inciclopedia/images/0/0c/Bateria.jpg/revision/latest?cb=20090606002156'),
(3, 'Trompeta', 2, 'http://www.instrumentomania.com/12-4624/trompeta-si-b-jupiter-jtr-408l.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
