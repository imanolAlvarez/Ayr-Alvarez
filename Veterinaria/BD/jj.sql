/*
SQLyog Ultimate v8.8 
MySQL - 5.5.24-log : Database - pasajerodrigo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pasajerodrigo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pasajerodrigo`;

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`descripcion`,`imagen`,`destino`,`perfil`,`activo`,`padre`,`submenu`,`orden`) values (1,'Usuarios',NULL,'ABM_usuario.php','Administrador',1,0,0,1),(2,'Salir',NULL,'logout.php','Administrador',1,0,0,15),(3,'Clientes',NULL,'ABM_clientes.php','Administrador',1,0,0,2),(4,'Locales',NULL,'ABM_locales.php','Administrador',1,0,0,3),(5,'Promociones',NULL,'ABM_promociones.php','Administrador',1,0,0,4),(6,'Tickets',NULL,'ABM_tickets.php','Administrador',1,0,0,5),(7,'Reportes Consumo',NULL,'repo_consumo.php','Administrador',1,0,0,6),(8,'Reportes Clientes',NULL,'repo_clientes.php','Administrador',1,0,0,7),(9,'Reportes Locales',NULL,'repo_locales.php','Administrador',1,0,0,8),(10,'MailChimp',NULL,'mailchip.php','Administrador',1,0,0,9);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
