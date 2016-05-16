-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-05-2016 a las 15:36:59
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `G7DB2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_usr_src` int(11) NOT NULL,
  `id_usr_dst` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `id_usr_src`, `id_usr_dst`, `comment`, `date`) VALUES
(3, 1, 2, '<p>Hola David!</p>\r\n', '2016-05-26'),
(4, 1, 2, '<p>Provando provando... Va o no?</p>\r\n', '2016-05-26'),
(5, 1, 2, '<p>Avera si ara va...</p>\r\n', '2016-05-26'),
(6, 1, 1, '<p>Bien por mi!</p>\r\n', '2016-05-26'),
(7, 1, 1, '<p>Hola a mi mismo mismamente!</p>\r\n', '2016-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compres`
--

CREATE TABLE `compres` (
  `id_compres` int(11) NOT NULL,
  `comprador` int(11) DEFAULT NULL,
  `producte` int(11) DEFAULT NULL,
  `nom_producte` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `nom_venedor` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
(14, 28, 36, 'producte de prova', 12, 'albert');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id_product` int(10) unsigned NOT NULL,
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
  `ventes` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `stock`, `description`, `date`, `image_small`, `image_big`, `views`, `user`, `id_user`, `ventes`) VALUES
(6, 'horari', 12, 25, 'This is horari!', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 79, 0, 1, 6),
(8, 'doge guau', 23, 28, '<p>Much wow!</p>\r\n', '2016-05-26', 'doge.jpg', 'doge.jpg', 4, 0, 1, 4),
(11, 'p1', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(12, 'p2', 30, 2, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 12, 0, 1, 2),
(13, 'p3', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(14, 'p4', 30, 0, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 15, 0, 1, 4),
(15, 'p5', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(16, 'p6', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(17, 'p7', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 11, 0, 1, 0),
(18, 'p8', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(19, 'p9', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(20, 'p10', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(21, 'p11', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(22, 'p12', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(23, 'p13', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(24, 'p14', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(25, 'p15', 30, 3, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 12, 0, 1, 1),
(26, 'p16', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(27, 'p17', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(28, 'p18', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(29, 'p19', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(30, 'p20', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(31, 'p21', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(32, 'p22', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(33, 'p23', 30, 4, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 10, 0, 1, 0),
(34, 'p24', 30, 0, 'Lorem Ipsum Ã©s un text de farciment usat per la indÃºstria de la tipografia i la impremta. Lorem Ipsum ha estat el text estÃ ndard de la indÃºstria des de any 1500 quan un impressor desconegut va fer servir una galerada de text i la va mesclar per crear un llibre de mostres tipogrÃ fiques.', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 18, 0, 1, 4),
(35, 'barret', 30, 0, '<p>gdsfaksldajsdkashdaUIDHAJSAHUDJq</p>\r\n', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 660, 0, 1, 0),
(36, 'producte de prova', 12, 31, '<p>Aix&oacute; es una prova!</p>\r\n', '2016-05-26', 'S2 Horari.png', 'S2 Horari.png', 116, 0, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `url_old_new`
--

CREATE TABLE `url_old_new` (
  `id` int(11) NOT NULL,
  `old_name` varchar(20) NOT NULL,
  `new_name` varchar(20) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `url_old_new`
--

INSERT INTO `url_old_new` (`id`, `old_name`, `new_name`, `id_product`) VALUES
(1, 'SquirtleOld', 'SquirtleMeme', 9),
(2, 'super doge', 'superdoge', 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `activation_code` varchar(30) NOT NULL,
  `saldo` float DEFAULT '0',
  `sold_products` int(10) unsigned NOT NULL,
  `valid` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `twitter`, `password`, `image`, `activation_code`, `saldo`, `sold_products`, `valid`) VALUES
(1, 'albert', 'a@a.a', NULL, 'llaurado', 'Animacio_Ref.jpg', '123', 932, 25, 1),
(2, 'davidc', 'hola@hola.com', '', 'holaho', 'doge.jpg', 'AC573053d41b884', 0, 0, 0),
(28, 'bydepth', 'depthdesigns95@gmail.com', '', 'llaurado', '', 'AC5738333430026', 0, 0, 1);

-- --------------------------------------------------------
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compres`
--
ALTER TABLE `compres`
  ADD PRIMARY KEY (`id_compres`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indices de la tabla `url_old_new`
--
ALTER TABLE `url_old_new`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `compres`
--
ALTER TABLE `compres`
  MODIFY `id_compres` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `url_old_new`
--
ALTER TABLE `url_old_new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
