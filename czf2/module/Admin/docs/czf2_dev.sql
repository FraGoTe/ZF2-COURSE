-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-03-2014 a las 19:47:55
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `czf2_dev`
--
CREATE DATABASE IF NOT EXISTS `czf2_dev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `czf2_dev`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(245) NOT NULL,
  `creado` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `creado`, `activo`) VALUES
(1, 'electro', '0000-00-00 00:00:00', 1),
(2, 'fashion', '0000-00-00 00:00:00', 0),
(3, 'Cat EDIT 842', '2014-02-14 03:37:19', 0),
(4, 'telefonia', '0000-00-00 00:00:00', 0),
(6, 'Cat 718', '2014-02-14 03:36:37', 1),
(7, 'Cat 983', '2014-02-14 03:36:46', 1),
(8, 'Cat 808', '2014-02-14 03:36:47', 0),
(9, 'categ', '2014-02-28 03:53:37', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE IF NOT EXISTS `familia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_padre` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`id`, `id_padre`, `nombre`) VALUES
(1, NULL, 'electro'),
(2, NULL, 'fashion'),
(3, 1, 'tv'),
(4, 1, 'celular'),
(5, 2, 'dama'),
(6, 2, 'caballero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fh` varchar(100) NOT NULL,
  `mensaje` varchar(100) NOT NULL,
  `prioridad` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `fh`, `mensaje`, `prioridad`, `nombre`) VALUES
(1, '2014-03-02T00:36:54+00:00', '', '1', 'ALERT'),
(2, '2014-03-02T00:42:47+00:00', '', '1', 'ALERT'),
(3, '2014-03-02T00:53:23+00:00', '', '1', 'ALERT'),
(4, '2014-03-02T00:55:43+00:00', '1', '1', 'ALERT'),
(5, '2014-03-02T01:00:32+00:00', '', '1', 'ALERT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `nombre` varchar(145) NOT NULL,
  `precio_compra` float DEFAULT NULL,
  `precio_venta` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_categoria_idx` (`categoria_id`),
  KEY `fk_producto_proveedor1_idx` (`proveedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `categoria_id`, `proveedor_id`, `nombre`, `precio_compra`, `precio_venta`) VALUES
(1, 1, 1, 'iPod touch 64Gb', 897, 1242),
(2, 1, 2, 'Smart Watch', 400, 550),
(3, 1, 2, 'proyector', 250, 299),
(4, 1, 1, 'kldslkm', 87, 887),
(5, 1, 1, 'lknasd', 1001, 93),
(6, 1, 1, 'ksmk', 2000, 2323),
(7, 1, 1, 'knlskan', 3333, 3334);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `creado` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `ruc`, `email`, `creado`, `activo`) VALUES
(0, 'Procter & Gamble 4', '10123456780', 'DNS@PG.COM', '0000-00-00 00:00:00', 0),
(1, 'apple', '12345678901', 'a@e.com', '2014-02-18 00:00:00', 1),
(2, 'lg', '12345678905', 'lg@lg.com', '2014-02-12 00:00:00', 1),
(3, 'nlskdn', '20122456780', 'klsam@zcz.com', '2014-03-01 21:56:34', 1),
(4, 'kjas', '10123456780', 'qnsa@asd.com', '2014-03-01 22:01:00', 1),
(5, 'epson', '8738738787', 'asda@asdsa.com', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_album`
--

CREATE TABLE IF NOT EXISTS `t_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `t_album`
--

INSERT INTO `t_album` (`id`, `artist`, `title`) VALUES
(1, 'The  Military  Wives', 'In  My  Dreams'),
(2, 'Adeleee', '210'),
(3, 'Bruce  Springsteen', 'Wrecking Ball (Deluxe)'),
(4, 'Lana  Del  Rey', 'Born  To  Die'),
(6, 'Red Hot Chilli Peppers', 'Californication'),
(7, 'Lady Gaga', 'Art Pop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` enum('admin','agencia','vendedor') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `tipo`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(2, 'eanaya', 'e10adc3949ba59abbe56e057f20f883e', 'agencia'),
(3, 'jortiz', 'e10adc3949ba59abbe56e057f20f883e', 'vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ndoc` varchar(200) NOT NULL,
  `ruc` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `ndoc`, `ruc`, `fecha`) VALUES
(4, '001-34234', '102345672', '2014-03-16 19:39:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_detalle`
--

CREATE TABLE IF NOT EXISTS `venta_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cantidad` (`cantidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `venta_detalle`
--

INSERT INTO `venta_detalle` (`id`, `id_venta`, `id_producto`, `cantidad`) VALUES
(1, 4, 3, 3),
(2, 4, 1, 6),
(3, 4, 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_proveedor1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
