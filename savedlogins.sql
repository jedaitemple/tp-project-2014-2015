-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Време на генериране: 
-- Версия на сървъра: 5.5.27
-- Версия на PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `ureg`
--

-- --------------------------------------------------------

--
-- Структура на таблица `savedlogins`
--

CREATE TABLE IF NOT EXISTS `savedlogins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `loggedacc` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Ссхема на данните от таблица `savedlogins`
--

INSERT INTO `savedlogins` (`id`, `url`, `username`, `email`, `password`, `loggedacc`) VALUES
(3, 'b', 'b', 'b@b', 'b', 'maikati'),
(5, 'aa', 'asdasdasd', 'asdasdada@12121212', 'aa', 'maikati'),
(7, 'http://zamunda.net', 'marti1111', 'porsheto_2@abv.bg', 'qqqqqqqqq', 'maikati'),
(10, 'sprint', 'apolon', 'bikes@thebest.com', 'sprint', 'maikati'),
(12, 'zamunda.net', 'kosio', 'kosio@abv.bg', 'kosio', 'kosio'),
(13, 'asd', 'asd', 'asd@abv.bg', 'asd', 'kosio');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
