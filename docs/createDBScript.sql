-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generaciÃ³n: 16-05-2016 a las 15:10:24
-- VersiÃ³n del servidor: 5.5.47-0ubuntu0.14.04.1
-- VersiÃ³n de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `G7DB2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usr_src` int(11) NOT NULL,
  `id_usr_dst` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `id_usr_src`, `id_usr_dst`, `comment`, `date`) VALUES
(1, 1, 1, '<p>Hola soc el 1st comment</p>\r\n', '2016-05-14'),
(2, 1, 1, '<p>2nd comment</p>\r\n', '2016-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compres`
--

CREATE TABLE IF NOT EXISTS `compres` (
  `id_compres` int(11) NOT NULL AUTO_INCREMENT,
  `comprador` int(11) DEFAULT NULL,
  `producte` int(11) DEFAULT NULL,
  `nom_producte` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `nom_venedor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_compres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `compres`
--

INSERT INTO `compres` (`id_compres`, `comprador`, `producte`, `nom_producte`, `cost`, `nom_venedor`) VALUES
(8, 1, 6, 'horari', 12, 'albert'),
(9, 1, 34, 'p24', 30, 'albert'),
(10, 1, 12, 'p2', 30, 'albert'),
(11, 1, 6, 'horari', 12, 'albert'),
(12, 1, 25, 'p15', 30, 'albert'),
(13, 1, 12, 'p2', 30, 'albert'),
(14, 1, 11, 'p1', 30, 'albert'),
(15, 1, 11, 'p1', 30, 'albert'),
(16, 1, 11, 'p1', 30, 'albert'),
(17, 1, 11, 'p1', 30, 'albert'),
(18, 2, 6, 'horari', 12, 'albert'),
(19, 1, 2, 'Sombrero Guay', 50, 'davidc'),
(20, 2, 3, 'Sombrero Guay', 50, 'Usuaria'),
(21, 2, 4, 'hola', 10, 'davidc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` float unsigned NOT NULL,
  `stock` int(10) unsigned NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `image_small` varchar(200) NOT NULL,
  `image_big` varchar(200) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `id_user` int(10) unsigned NOT NULL,
  `ventes` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `stock`, `description`, `date`, `image_small`, `image_big`, `views`, `id_user`, `ventes`) VALUES
(4, 'hola', 10, 9, '<p>hola</p>\r\n', '2016-05-25', 'hat1.jpg', 'hat1.jpg', 7, 2, 1),
(5, 'hola12', 50, 12, '<p>Holllaaaaaa</p>\r\n', '2016-05-18', 'gorro.jpg', 'gorro.jpg', 7, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `url_old_new`
--

CREATE TABLE IF NOT EXISTS `url_old_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `old_name` varchar(20) NOT NULL,
  `new_name` varchar(20) NOT NULL,
  `id_product` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `url_old_new`
--

INSERT INTO `url_old_new` (`id`, `old_name`, `new_name`, `id_product`) VALUES
(1, 'SquirtleOld', 'SquirtleMeme', 9),
(2, 'Sombrero', 'Sombrero Guay', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `activation_code` varchar(30) NOT NULL,
  `saldo` float DEFAULT '0',
  `sold_products` int(10) unsigned NOT NULL,
  `valid` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `twitter`, `password`, `image`, `activation_code`, `saldo`, `sold_products`, `valid`) VALUES
(1, 'albert', 'a@a.a', NULL, 'llaurado', 'Animacio_Ref.jpg', '123', 750, 30, 1),
(2, 'davidc', 'hola@hola.com', '', 'password', 'doge.jpg', 'AC573053d41b884', 83, 2, 1),
(3, 'Usuaria', 'd@d.com', '', 'hola12', 'gorra2.jpg', 'AC5737671ed8201', 99, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Visit`
--

CREATE TABLE IF NOT EXISTS `Visit` (
  `visitas` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Visit`
--

INSERT INTO `Visit` (`visitas`) VALUES
(22);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
