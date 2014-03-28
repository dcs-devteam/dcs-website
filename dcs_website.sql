-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2014 at 07:54 AM
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `category`
--


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

--
-- Dumping data for table `category_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(225) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  KEY `contact_ibfk_1` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
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

--
-- Dumping data for table `faculty`
--


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

--
-- Dumping data for table `images`
--


-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `u_id` int(225) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `middlename` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `age` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `studentnumber` varchar(255) NOT NULL,
  `yearlevel` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `profpic` varchar(255) NOT NULL,
  `backgroundimage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `u_id`, `firstname`, `middlename`, `lastname`, `address`, `age`, `course`, `birthday`, `studentnumber`, `yearlevel`, `description`, `profpic`, `backgroundimage`) VALUES
(1, 1, 'Kevin', 'Eltagunde', 'Calingacion', 'Taloot, Argao, Cebu', '18', 'Bachelor of Science in Computer Science ', '1995-11-11', '2011-66721', '3rd Year', 'Lorem ipsum Nulla non amet officia sunt dolore dolore magna nostrud ad sit aute ea ea. Lorem ipsum Esse occaecat amet quis ea deserunt exercitation in exercitation esse adipisicing elit in id fugiat fugiat proident pariatur ea id dolore eu voluptate mollit Excepteur incididunt in Duis.', 'assets/images/profile-image/profile-id-1/prof-pic/p1.jpg', 'assets/images/profile-image/profile-id-1/bg-pic/b1.png'),
(2, 2, 'Kev', 'Elta Gunde', 'Cal', 'Lahug, Cebu', '19', 'Bachelor of Science in Computer Science', '1994-03-20', '2011-44321', '3rd Year', 'Lorem ipsum Nulla non amet officia sunt dolore dolore magna nostrud ad sit aute ea ea. Lorem ipsum Esse occaecat amet quis ea deserunt exercitation in exercitation esse adipisicing elit in id fugiat fugiat proident pariatur ea id dolore eu voluptate mollit Excepteur incididunt in Duis.', '', ''),
(3, 3, 'Keli', 'Dwarf', 'Oakenshield', 'Moria, Middle Earth', '17', 'Bachelor of Science in Computer Science', '1996-09-09', '2013-68972', '1st Year', 'Lorem ipsum Nulla non amet officia sunt dolore dolore magna nostrud ad sit aute ea ea. Lorem ipsum Esse occaecat amet quis ea deserunt exercitation in exercitation esse adipisicing elit in id fugiat fugiat proident pariatur ea id dolore eu voluptate mollit Excepteur incididunt in Duis.', '', '');

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
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `u_id` int(225) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `content`, `u_id`, `slug`) VALUES
(30, 'eman''s year', '2014-03-27 23:51:35', '<p>yeah</p>', 4, 'emans-year'),
(31, 'Eman''s year', '2014-03-27 23:52:15', '<p>dasdasdas</p>', 4, 'Emans-year-1');

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE IF NOT EXISTS `news_images` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `news_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `poll_answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE IF NOT EXISTS `privileges` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `name`) VALUES
(1, 'create news');

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

--
-- Dumping data for table `project`
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

--
-- Dumping data for table `static_content`
--


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

--
-- Dumping data for table `tags`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `username`, `role_id`) VALUES
(1, '7dbdf5d880c5e3a824d538875eebeab4', 'kevcal', 1),
(2, 'de58792868d680d5d6a3f6aac7a29534', 'kevcal123', 1),
(3, '47bc696e3aa19fcd5e2d147231a72b0c', 'Kevz', 1),
(4, '1a1dc91c907325c69271ddf0c944bc72', 'eman', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE IF NOT EXISTS `user_privileges` (
  `user_id` int(255) NOT NULL,
  `privilege_id` int(255) NOT NULL,
  PRIMARY KEY (`user_id`,`privilege_id`),
  KEY `privilege_id` (`privilege_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_privileges`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_group`
--
ALTER TABLE `category_group`
  ADD CONSTRAINT `category_group_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_images`
--
ALTER TABLE `news_images`
  ADD CONSTRAINT `news_images_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD CONSTRAINT `poll_answers_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD CONSTRAINT `user_privileges_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_privileges_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
