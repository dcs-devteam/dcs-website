-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2014 at 01:56 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dcs_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE IF NOT EXISTS `developers` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`username`, `password`) VALUES
('admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE IF NOT EXISTS `metas` (
  `property` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`property`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`property`, `value`, `created_at`) VALUES
('website completion', '1%', '2014-01-04 15:25:19'),
('website status', 'Under Construction', '2014-01-04 15:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `polls`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll_answers`
--

CREATE TABLE IF NOT EXISTS `poll_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `poll_answers`
--

-- --------------------------------------------------------

--
-- Table structure for table `secrets`
--

CREATE TABLE IF NOT EXISTS `secrets` (
  `command` varchar(50) NOT NULL,
  `script_path` varchar(255) NOT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`command`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secrets`
--

INSERT INTO `secrets` (`command`, `script_path`, `enabled`, `created_at`) VALUES
('chickens', 'http://localhost/dcs-website/assets/secrets/chickens/main.js', 1, '2014-01-04 18:48:24'),
('nyancat', 'http://localhost/dcs-website/assets/secrets/nyancat/main.js', 1, '2014-01-11 18:38:01'),
('today', 'http://localhost/dcs-website/assets/secrets/today/main.js', 1, '2014-01-05 11:54:15'),
('unicorn', 'http://localhost/dcs-website/assets/secrets/unicorn/main.js', 1, '2014-01-04 18:48:18'),
('yoda', 'http://localhost/dcs-website/assets/secrets/yoda/main.js', 1, '2014-01-04 20:42:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD CONSTRAINT `poll_answers_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
