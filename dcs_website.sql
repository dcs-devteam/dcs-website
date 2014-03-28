-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2014 at 04:36 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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

INSERT INTO `contact` (`id`, `contact_number`, `facebook`, `twitter`, `email`, `u_id`) VALUES
(0, '09229365294', 'https://www.facebook.com/nameANAD', 'https://twitter.com/nameanad', 'name3anad@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `body` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `heading`, `body`) VALUES
(1, 'Message from the Chair', '<p>The Department of Computer Science (DCS) is one of only 9 Centers of Excellence in IT Education in the entire Philippines awarded by the Commission on Higher Education (CHED).  </p>\n      <p>It has almost two decades of history in nurturing young minds into being the most-sought computer science graduates in the ICT industry and in research and development companies.</p>\n<p>The curriculum provides the students with a solid background on the theoretical foundations of computer science and its mathematical aspects and practitioner’s approach in the applied courses. The specialization courses in software engineering and intelligent systems give them extensive experience in research.</p>      '),
(2, 'History', '<p>The department has been around for almost two decades. It started as a BS Computer Science program and in 2007 it became the first department in UP Cebu. The MS Computer Science started in 2009. The department continues to make history in teaching, research and extension activities.</p>'),
(3, 'Vision', '<p>A world-class institution in computer science research and education that shapes and transforms the region into a dynamic and technology-driven society</p>'),
(4, 'Mission', '<ol>\r\n          <li>To advance knowledge in computer science through novel and innovative interdisciplinary research that improves the quality of life and society </li>\r\n          <li>To produce graduates who are technically competent and socially responsible leaders in CS research and in the ICT industry </li>\r\n          <li>To optimize the use of ICT by strengthening partnership with the different stakeholders</li>\r\n        </ol>'),
(5, 'Faculty', '<div class="tile clearfix">\n        <div class="image" style="background-image: url(''<?= base_url() . ''assets/images/sample-project.jpg'' ?>'');"></div>\n        <div class="information-container clearfix">\n          <div class="field">          \n            <p>Kurt Junshean Espinosa</p>\n          </div>\n          <div class="field">          \n            <p>Department Chair</p>\n          </div>\n          <div class="field">          \n            <p>name@mail.com</p>\n          </div>\n          <div class="field">          \n            <ul>\n              <li>Masters in Computer Science at The University of the Philippines</li>\n            </ul>\n          </div>\n          <div class="field">\n            <p>AI, Modeling and Simulation</p>\n          </div>\n        </div>\n      </div>'),
(6, 'Faculty', '<div class="tile clearfix">\n        <div class="image" style="background-image: url(''<?= base_url() . ''assets/images/sample-project.jpg'' ?>'');"></div>\n        <div class="information-container clearfix">\n          <div class="field">          \n            <p>Ryan Ciriaco Dulaca</p>\n          </div>\n          <div class="field">          \n            <p>Undergraduate Director</p>\n          </div>\n          <div class="field">          \n            <p>name@mail.com</p>\n          </div>\n          <div class="field">          \n            <ul>\n              <li>Masters in Computer Science at The University of the Philippines</li>\n            </ul>\n          </div>\n          <div class="field">\n            <p>AI, Modeling and Simulation</p>\n          </div>\n        </div>\n      </div>'),
(7, 'Faculty', '<div class="tile clearfix">\r\n        <div class="image" style="background-image: url(''<?= base_url() . ''assets/images/sample-project.jpg'' ?>'');"></div>\r\n        <div class="information-container clearfix">\r\n          <div class="field">          \r\n            <p>Sandra Famador</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>Graduate Director</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>name@mail.com</p>\r\n          </div>\r\n          <div class="field">          \r\n            <ul>\r\n              <li>Masters in Computer Science at The University of the Philippines</li>\r\n            </ul>\r\n          </div>\r\n          <div class="field">\r\n            <p>AI, Modeling and Simulation</p>\r\n          </div>\r\n        </div>\r\n      </div>'),
(8, 'Faculty', '<div class="tile clearfix">\r\n        <div class="image" style="background-image: url(''<?= base_url() . ''assets/images/sample-project.jpg'' ?>'');"></div>\r\n        <div class="information-container clearfix">\r\n          <div class="field">          \r\n            <p>Fritzie Cantos</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>Infrastructure Director</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>name@mail.com</p>\r\n          </div>\r\n          <div class="field">          \r\n            <ul>\r\n              <li>Masters in Computer Science at The University of the Philippines</li>\r\n            </ul>\r\n          </div>\r\n          <div class="field">\r\n            <p>AI, Modeling and Simulation</p>\r\n          </div>\r\n        </div>\r\n      </div>'),
(9, 'Faculty', '<div class="tile clearfix">\r\n        <div class="image" style="background-image: url(''<?= base_url() . ''assets/images/sample-project.jpg'' ?>'');"></div>\r\n        <div class="information-container clearfix">\r\n          <div class="field">          \r\n            <p>Florian Miksch</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>Visiting Professor</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>name@mail.com</p>\r\n          </div>\r\n          <div class="field">          \r\n            <ul>\r\n              <li>Masters in Computer Science at The University of the Philippines</li>\r\n            </ul>\r\n          </div>\r\n          <div class="field">\r\n            <p>AI, Modeling and Simulation</p>\r\n          </div>\r\n        </div>\r\n      </div>'),
(10, 'Faculty', '<div class="tile clearfix">\r\n        <div class="image" style="background-image: url(''<?= base_url() . ''assets/images/sample-project.jpg'' ?>'');"></div>\r\n        <div class="information-container clearfix">\r\n          <div class="field">          \r\n            <p>Paulo Juan Cabral</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>Lecturer II</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>name@mail.com</p>\r\n          </div>\r\n          <div class="field">          \r\n            <ul>\r\n              <li>Masters in Computer Science at The University of the Philippines</li>\r\n            </ul>\r\n          </div>\r\n          <div class="field">\r\n            <p>AI, Modeling and Simulation</p>\r\n          </div>\r\n        </div>\r\n      </div>'),
(11, 'Faculty', '<div class="tile clearfix">\r\n        <div class="image" style="background-image: url(''<?= base_url() . ''assets/images/sample-project.jpg'' ?>'');"></div>\r\n        <div class="information-container clearfix">\r\n          <div class="field">          \r\n            <p>Abigail Beryl Navaja Fuentes</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>Lecturer</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>name@mail.com</p>\r\n          </div>\r\n          <div class="field">          \r\n            <ul>\r\n              <li>Bachelors in Computer Science at The University of the Philippines</li>\r\n            </ul>\r\n          </div>\r\n          <div class="field">\r\n            <p>Web Engineering</p>\r\n          </div>\r\n        </div>\r\n      </div>'),
(12, 'Faculty', '<div class="tile clearfix">\r\n        <div class="image" style="background-image: url(''<?= base_url() . ''assets/images/sample-project.jpg'' ?>'');"></div>\r\n        <div class="information-container clearfix">\r\n          <div class="field">          \r\n            <p>Chito Patiño</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>Faculty</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>name@mail.com</p>\r\n          </div>\r\n          <div class="field">          \r\n            <ul>\r\n              <li>Masters in Computer Science at The University of the Philippines</li>\r\n            </ul>\r\n          </div>\r\n          <div class="field">\r\n            <p></p>\r\n          </div>\r\n        </div>\r\n      </div>'),
(13, 'Faculty', '<div class="tile clearfix">\r\n        <div class="image" style="background-image: url(''<?= base_url() . ''assets/images/sample-project.jpg'' ?>'');"></div>\r\n        <div class="information-container clearfix">\r\n          <div class="field">          \r\n            <p>Van Owen Sesaldo</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>Faculty</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>name@mail.com</p>\r\n          </div>\r\n          <div class="field">          \r\n            <ul>\r\n              <li>Masters in Computer Science at The University of the Philippines</li>\r\n            </ul>\r\n          </div>\r\n          <div class="field">\r\n            <p></p>\r\n          </div>\r\n        </div>\r\n      </div>'),
(14, 'Programming Contest', '<ul>\r\n<li>CodeJam 2014</li>\r\n</ul>'),
(15, 'Codetabai', '<ul>\n<li>Android 101 by Ruffy Heredia</li>\n<li>RoR by Heinrich Lee Yu</li>\n<li>Python Sessions by Daryl Yu</li>\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'BS Computer Science');

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
('website completion', '1%', '2014-01-04 07:25:19'),
('website status', 'Under Construction', '2014-01-04 07:24:55');

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
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('chickens', 'http://localhost/dcs-website/assets/secrets/chickens/main.js', 1, '2014-01-04 10:48:24'),
('nyancat', 'http://localhost/dcs-website/assets/secrets/nyancat/main.js', 1, '2014-01-11 10:38:01'),
('today', 'http://localhost/dcs-website/assets/secrets/today/main.js', 1, '2014-01-05 03:54:15'),
('unicorn', 'http://localhost/dcs-website/assets/secrets/unicorn/main.js', 1, '2014-01-04 10:48:18'),
('yoda', 'http://localhost/dcs-website/assets/secrets/yoda/main.js', 1, '2014-01-04 12:42:46');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `username`, `role_id`) VALUES
(1, '7dbdf5d880c5e3a824d538875eebeab4', 'kevcal', 1),
(2, 'de58792868d680d5d6a3f6aac7a29534', 'kevcal123', 1),
(3, '47bc696e3aa19fcd5e2d147231a72b0c', 'Kevz', 1),
(4, '1a1dc91c907325c69271ddf0c944bc72', 'eman', 404);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE IF NOT EXISTS `user_information` (
  `user_id` int(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `course_id` int(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `studentnumber` varchar(255) DEFAULT NULL,
  `yearlevel` int(255) DEFAULT NULL,
  `description` text,
  `profpic` text,
  PRIMARY KEY (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`user_id`, `firstname`, `middlename`, `lastname`, `course_id`, `address`, `age`, `birthday`, `studentnumber`, `yearlevel`, `description`, `profpic`) VALUES
(4, 'Emmanuel', 'Tanduyan', 'Lodovice', 1, 'Jampang', 19, '2014-03-12', '2011-37666', 3, NULL, 'assets/images/profile-images/3m11aak3l5sqzce.jpg');

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

INSERT INTO `user_privileges` (`user_id`, `privilege_id`) VALUES
(4, 1);

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
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `user_information`
--
ALTER TABLE `user_information`
  ADD CONSTRAINT `user_information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_information_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD CONSTRAINT `user_privileges_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_privileges_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
