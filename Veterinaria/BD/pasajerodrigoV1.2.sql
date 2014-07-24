-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2013 a las 16:59:10
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pasajerodrigo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `mail` varchar(40) DEFAULT NULL,
  `fnac` date DEFAULT NULL,
  `telefono` varchar(40) DEFAULT NULL,
  `domicilio` varchar(40) DEFAULT NULL,
  `activo` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `dni`, `numero`, `apellido`, `nombre`, `mail`, `fnac`, `telefono`, `domicilio`, `activo`) VALUES
(1, 34506774, 1, 'Marinelli', 'Juan', 'juanmarinelli10@gmail.com', '1989-04-10', '4510712', '18 n1134', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE IF NOT EXISTS `locales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `numero`, `nombre`, `descripcion`, `activo`) VALUES
(1, 1, 'Rapsodia', 'Local de ropa', 1),
(2, 2, 'El Cardon', 'Local de ropa de hombre', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) DEFAULT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  `destino` varchar(600) DEFAULT NULL,
  `perfil` varchar(600) DEFAULT NULL,
  `activo` int(1) DEFAULT NULL,
  `padre` int(11) DEFAULT NULL,
  `submenu` int(1) DEFAULT NULL,
  `orden` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `descripcion`, `imagen`, `destino`, `perfil`, `activo`, `padre`, `submenu`, `orden`) VALUES
(1, 'Usuarios', NULL, 'ABM_usuario.php', 'Administrador', 1, 0, 0, 1),
(2, 'Salir', NULL, 'logout.php', 'Administrador', 1, 0, 0, 15),
(3, 'Clientes', NULL, 'ABM_cliente.php', 'Administrador', 1, 0, 0, 2),
(4, 'Locales', NULL, 'ABM_locales.php', 'Administrador', 1, 0, 0, 3),
(5, 'Promociones', NULL, 'ABM_promociones.php', 'Administrador', 1, 0, 0, 4),
(6, 'Tickets', NULL, 'ABM_tickets.php', 'Administrador', 1, 0, 0, 5),
(7, 'Reportes Consumo', NULL, 'repo_consumo.php', 'Administrador', 1, 0, 0, 6),
(8, 'Reportes Clientes', NULL, 'repo_clientes.php', 'Administrador', 1, 0, 0, 7),
(9, 'Reportes Locales', NULL, 'repo_locales.php', 'Administrador', 1, 0, 0, 8),
(10, 'MailChimp', NULL, 'mailchip.php', 'Administrador', 1, 0, 0, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'FBA'),
(3, 'Laboratorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE IF NOT EXISTS `promociones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `monto_minimo` varchar(20) DEFAULT NULL,
  `cantidad_tickets` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `numero`, `nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`, `monto_minimo`, `cantidad_tickets`) VALUES
(1, 1, 'promo primavera', '30% off', '2013-11-11', '2013-12-24', '$700', 2),
(2, 2, 'Promo Verano', 'premio de un 50% en cualquiera de nuestros locales', '2013-11-14', '2013-11-23', '$800', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `monto_compra` double DEFAULT NULL,
  `hora_compra` varchar(30) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_local` int(11) DEFAULT NULL,
  `id_promocion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id_perfil` varchar(30) NOT NULL,
  `activo` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `id_perfil`, `activo`) VALUES
(1, 'anal ito', 'anal ito', '2', 1),
(2, 'admin', 'admin', '1', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
