-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2014 at 11:25 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dcs_website`
--
CREATE DATABASE IF NOT EXISTS `dcs_website` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dcs_website`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category_group`
--

CREATE TABLE IF NOT EXISTS `category_group` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `category_id` int(225) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `position` varchar(225) NOT NULL,
  `key_area_research` varchar(225) NOT NULL,
  `biography` varchar(225) NOT NULL,
  `interest` varchar(225) NOT NULL,
  `last_updated` date NOT NULL,
  `personal_website` varchar(225) NOT NULL,
  `prof_pic` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `project_id` int(225) NOT NULL,
  `url` varchar(225) NOT NULL,
  `alt` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `u_id` int(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `mname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `contact_num` varchar(225) NOT NULL,
  `email_add` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('website completion', '1%', '2014-01-04 23:25:19'),
('website status', 'Under Construction', '2014-01-04 23:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  `u_id` int(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `status` int(225) NOT NULL,
  `date_uploaded` date NOT NULL,
  `link` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('chickens', 'http://localhost/dcs-website/assets/secrets/chickens/main.js', 1, '2014-01-05 02:48:24'),
('nyancat', 'http://localhost/dcs-website/assets/secrets/nyancat/main.js', 1, '2014-01-12 02:38:01'),
('today', 'http://localhost/dcs-website/assets/secrets/today/main.js', 1, '2014-01-05 19:54:15'),
('unicorn', 'http://localhost/dcs-website/assets/secrets/unicorn/main.js', 1, '2014-01-05 02:48:18'),
('yoda', 'http://localhost/dcs-website/assets/secrets/yoda/main.js', 1, '2014-01-05 04:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `static_content`
--

CREATE TABLE IF NOT EXISTS `static_content` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `password` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `role_id` int(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_group`
--
ALTER TABLE `category_group`
  ADD CONSTRAINT `category_group_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD CONSTRAINT `poll_answers_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
