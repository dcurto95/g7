-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-05-2016 a las 16:31:30
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `G7DB2`
--

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
  `date` varchar(50) NOT NULL,
  `image_small` varchar(200) NOT NULL,
  `image_big` varchar(200) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `id_user` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `stock`, `description`, `date`, `image_small`, `image_big`, `views`, `id_user`) VALUES
  (2, 'producte', 3, 42, '', '23 April, 2016', '', '', 0, 0),
  (6, 'horari', 12, 31, 'This is horari!', '2 May, 2016', 'S2 Horari.png', 'S2 Horari.png', 0, 1);

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
  `valid` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `twitter`, `password`, `image`, `activation_code`, `saldo`, `valid`) VALUES
  (1, 'albert', 'a@a.a', NULL, 'llaurado', 'Animacio_Ref.jpg', '123', 992, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Visit`
--

CREATE TABLE `Visit` (
  `visitas` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Visit`
--

INSERT INTO `Visit` (`visitas`) VALUES
  (18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
ADD PRIMARY KEY (`id_product`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
MODIFY `id_product` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;