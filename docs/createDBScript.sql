-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generaciÃ³n: 12-05-2016 a las 18:15:22
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `compres`
--

INSERT INTO `compres` (`id_compres`, `comprador`, `producte`, `nom_producte`, `cost`, `nom_venedor`) VALUES
(8, 1, 6, 'horari', 12, 'albert'),
(9, 1, 34, 'p24', 30, 'albert'),
(10, 1, 12, 'p2', 30, 'albert'),
(11, 1, 6, 'horari', 12, 'albert');

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
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `stock`, `description`, `date`, `image_small`, `image_big`, `views`, `user`, `id_user`, `ventes`) VALUES
(6, 'horari', 12, 24, 'This is horari!', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 64, 0, 1, 7),
(8, 'doge guau', 23, 28, '<p>Much wow!</p>\r\n', '2016-06-16', 'doge.jpg', 'doge.jpg', 5, 0, 1, 4),
(11, 'p1', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(12, 'p2', 30, 1, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 13, 0, 1, 3),
(13, 'p3', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(14, 'p4', 30, 0, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 15, 0, 1, 4),
(15, 'p5', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(16, 'p6', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(17, 'p7', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 11, 0, 1, 0),
(18, 'p8', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(19, 'p9', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(20, 'p10', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(21, 'p11', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(22, 'p12', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(23, 'p13', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(24, 'p14', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(25, 'p15', 30, 3, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 12, 0, 1, 1),
(26, 'p16', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(27, 'p17', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(28, 'p18', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(29, 'p19', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(30, 'p20', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(31, 'p21', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(32, 'p22', 30, 4, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(33, 'p23', 30, 0, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(34, 'p24', 30, 0, 'Lorem Ipsum ÃƒÂ©s un text de farciment usat per la indÃƒÂºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃƒÂ ndard de la indÃƒÂºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃƒÂ fiques.', '2016-06-16', 'S2 Horari.png', 'S2 Horari.png', 18, 0, 1, 4),
(35, 'barret', 30, 0, '<p>gdsfaksldajsdkashdaUIDHAJSAHUDJq</p>\r\n', '2016-06-16', 'barret.jpg', 'barret.jpg', 660, 0, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `url_old_new`
--

INSERT INTO `url_old_new` (`id`, `old_name`, `new_name`, `id_product`) VALUES
(1, 'SquirtleOld', 'SquirtleMeme', 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `twitter`, `password`, `image`, `activation_code`, `saldo`, `sold_products`, `valid`) VALUES
(1, 'albert', 'a@a.a', NULL, 'llaurado', 'Animacio_Ref.jpg', '123', 1000, 23, 1),
(2, 'davidc', 'hola@hola.com', '', 'holaho', 'Papallona.jpg', 'AC573053d41b884', 0, 0, 0),
(3, 'holaaaaa', 'hola@hola.com', '', 'hola12', '', 'AC57305598d26b4', 0, 0, 0),
(4, 'dcurtoooo', 'dcurto95@gmail.com', '', 'holadc', '', 'AC5730a5b37575a', 0, 0, 0),
(5, 'davidccc', 'dcurto95@gmail.com', '', 'asdasda', 'Papallona.jpg', 'AC5730a60fd2121', 0, 0, 0),
(6, 'davidccc', 'dcurto95@gmail.com', '', 'hola12', 'Papallona.jpg', 'AC57335ba38ee58', 0, 0, 0),
(7, 'davidccc', 'dcurto95@gmail.com', '', 'hola12', 'Papallona.jpg', 'AC57335c0e288dc', 0, 0, 0),
(8, 'davidc', 'dcurto95@gmail.com', '', 'hola12', '', 'AC57335f426f780', 0, 0, 0),
(9, 'davidc', 'dcurto95@gmail.com', '', 'hola12', '', 'AC57335f67aaf08', 0, 0, 0);

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
