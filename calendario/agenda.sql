-- phpMyAdmin SQL Dump
-- version 2.11.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2018 at 09:34 PM
-- Server version: 1.0.110
-- PHP Version: 5.6.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `eve_id` int(11) NOT NULL AUTO_INCREMENT,
  `eve_usu_id` int(11) NOT NULL,
  `eve_titulo` varchar(150) NOT NULL,
  `eve_fechaini` varchar(50) NOT NULL,
  `eve_fechater` varchar(50) NOT NULL,
  `eve_horaini` varchar(50) NOT NULL,
  `eve_horater` varchar(50) NOT NULL,
  `eve_dia` int(11) NOT NULL,
  `eve_estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`eve_id`),
  UNIQUE KEY `eve_id` (`eve_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`eve_id`, `eve_usu_id`, `eve_titulo`, `eve_fechaini`, `eve_fechater`, `eve_horaini`, `eve_horater`, `eve_dia`, `eve_estado`) VALUES
(1, 1, 'otro2', '2018-09-19', '2018-09-19', '07:30:00', '08:00:00', 0, 1),
(2, 0, 'otro2', '2018-09-19', '2018-09-19', '07:30:00', '08:00:00', 0, 1),
(3, 1, 'cinco', '2018-09-12', '2018-09-12', '07:00:00', '07:30:00', 0, 1),
(13, 1, 'ocho', '2018-09-30', '2018-09-30', '07:00:00', '07:30:00', 0, 1),
(5, 1, 'cinco', '2018-09-12', '2018-09-12', '07:00:00', '07:30:00', 0, 1),
(11, 1, 'seis', '2018-09-23', '2018-09-23', '07:00:00', '07:30:00', 0, 1),
(7, 1, 'cinco', '2018-09-13', '', ':00', ':00', 1, 1),
(8, 1, 'uno', '2018-09-07', '2018-09-07', '07:00:00', '08:00:00', 0, 1),
(12, 1, 'siete', '2018-09-10', '2018-09-10', '07:00:00', '07:30:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_mail` varchar(100) NOT NULL,
  `usu_nombre` varchar(150) NOT NULL,
  `usu_password` varchar(100) NOT NULL,
  `usu_fecnac` date NOT NULL,
  `usu_estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `usu_id` (`usu_id`,`usu_mail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_mail`, `usu_nombre`, `usu_password`, `usu_fecnac`, `usu_estado`) VALUES
(1, 'cherrera@pradi.cl', 'Carlos Herrera', '$2y$10$QWbgW/mizNF7g4/2crHwaO8A1gwTIIW0zIxBDjcX.P5OgWT9Kleha', '2018-09-22', 1),
(2, 'admin@aestudiar.cl', 'Herrera Carlos', '$2y$10$QWbgW/mizNF7g4/2crHwaO8A1gwTIIW0zIxBDjcX.P5OgWT9Kleha', '2018-09-22', 1),
(3, 'c_herrera_m@hotmail.com', 'Carlos Andres', '$2y$10$QWbgW/mizNF7g4/2crHwaO8A1gwTIIW0zIxBDjcX.P5OgWT9Kleha', '2018-09-22', 1),
(4, 'carlos.herrera@ticmega.cl', 'Andres Herrera', '$2y$10$QWbgW/mizNF7g4/2crHwaO8A1gwTIIW0zIxBDjcX.P5OgWT9Kleha', '2018-09-22', 1);
