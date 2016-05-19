-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--

-- Servidor: localhost
-- Tiempo de generaciÃ³n: 19-05-2016 a las 17:51:00
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `id_usr_src`, `id_usr_dst`, `comment`, `date`) VALUES
(3, 1, 2, '<p>Hola David!</p>\r\n', '2016-05-26'),
(4, 1, 2, '<p>Provando provando... Va o no?</p>\r\n', '2016-05-26'),
(5, 1, 2, '<p>Avera si ara va...</p>\r\n', '2016-05-26'),
(6, 1, 1, '<p>Bien por mi!</p>\r\n', '2016-05-26'),
(7, 1, 1, '<p>Hola a mi mismo mismamente!</p>\r\n', '2016-05-14'),
(12, 3, 1, '<p>Hola hola!</p>\r\n', '2016-05-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compres`
--

CREATE TABLE IF NOT EXISTS `compres` (
  `id_compres` int(11) NOT NULL AUTO_INCREMENT,
  `comprador` int(11) DEFAULT NULL,
  `producte` int(11) DEFAULT NULL,
  `nom_producte` varchar(50) NOT NULL,
  `cost` float NOT NULL,
  `nom_venedor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_compres`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `compres`
--

INSERT INTO `compres` (`id_compres`, `comprador`, `producte`, `nom_producte`, `cost`, `nom_venedor`) VALUES
(8, 1, 6, 'horari', 12, 'albert'),
(9, 1, 34, 'p24', 30, 'albert'),
(10, 10, 12, 'p2', 30, 'albert'),
(11, 10, 36, 'super doge', 12, 'mailTest'),
(12, 1, 36, 'producte de prova', 12, 'albert'),
(13, 28, 36, 'producte de prova', 12, 'albert'),
(14, 28, 36, 'producte de prova', 12, 'albert'),
(15, 1, 12, 'p2', 30, 'albert'),
(16, 1, 25, 'p15', 30, 'albert'),
(17, 1, 12, 'p2', 30, 'usrtest'),
(18, 0, 25, 'p15', 30, 'usrtest'),
(19, 0, 30, 'p20', 30, 'usrtest'),
(20, 0, 30, 'p20', 30, 'usrtest'),
(21, 0, 17, 'p7', 30, 'usrtest'),
(22, 0, 25, 'p15', 30, 'usrtest'),
(23, 0, 30, 'p20', 30, 'usrtest'),
(24, 0, 22, 'p12', 30.25, 'usrtest'),
(27, 3, 22, 'p12', 30.25, 'holare');

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
  `user` int(11) NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `ventes` int(10) unsigned NOT NULL,
  `valoracioPositiva` int(11) NOT NULL DEFAULT '0',
  `valoracioNegativa` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `stock`, `description`, `date`, `image_small`, `image_big`, `views`, `user`, `id_user`, `ventes`, `valoracioPositiva`, `valoracioNegativa`) VALUES
(11, 'p1', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(12, 'p2', 30, 0, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 21, 0, 1, 4, 3, 2),
(13, 'p3', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(14, 'p4', 30, 0, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 15, 0, 1, 4, 0, 0),
(15, 'p5', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(16, 'p6', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(17, 'p7', 30, 3, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 17, 0, 1, 1, 0, 0),
(18, 'p8', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(19, 'p9', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(20, 'p10', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(21, 'p11', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(22, 'p12', 30.25, 1, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 26, 0, 1, 3, 4, 2),
(23, 'p13', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(24, 'p14', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(25, 'p15', 30, 0, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 25, 0, 1, 4, 2, 1),
(26, 'p16', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(27, 'p17', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(28, 'p18', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(29, 'p19', 30, 4, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 10, 0, 1, 0, 0, 0),
(30, 'p20', 30, 1, 'Descripcio :D', '2016-05-26', 'gorro.jpg', 'gorro.jpg', 18, 0, 1, 3, 0, 0),
(39, 'Barret', 10, 10, '<p>p</p>\r\n', '2016-05-20', 'barret1.jpg', 'barret1.jpg', 1, 0, 0, 0, 0, 0),
(41, 'Yolo', 4.69, 12, '<p>Hola</p>\r\n', '2016-05-27', 'gorra.jpg', 'gorra.jpg', 1, 0, 1, 0, 0, 0),
(43, 'hol', 1, 1, '<p>1</p>\r\n', '2016-06-22', 'gorra2.jpg', 'gorra2.jpg', 4, 0, 1, 0, 0, 0),
(44, 'cara', 0.14, 0, '<p>Para</p>\r\n', '2016-05-27', 'gorra2.jpg', 'gorra2.jpg', 1, 0, 3, 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `url_old_new`
--

INSERT INTO `url_old_new` (`id`, `old_name`, `new_name`, `id_product`) VALUES
(1, 'SquirtleOld', 'SquirtleMeme', 9),
(2, 'super doge', 'superdoge', 36),
(3, 'Hi ', 'Hi Hola', 38),
(4, 'Cara', 'cara', 44);

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
(1, 'holare', 'dare@dare.com', '', 'holaro', 'default.jpg', 'AC573df091a8ebc', 146.25, 2, 1),
(2, 'holaro', 'hol@hol.com', '', 'holare', 'default.jpg', 'AC573df496bf21e', 0, 0, 0),
(3, 'holaro2', 'hol@hola.com', '', 'holare', 'default.jpg', 'AC573df4d805987', 34.75, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
