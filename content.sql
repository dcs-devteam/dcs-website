-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2014 at 03:37 PM
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
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) NOT NULL,
  `body` varchar(2048) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
(13, 'Faculty', '<div class="tile clearfix">\r\n        <div class="image" style="background-image: url(''<?= base_url() . ''assets/images/sample-project.jpg'' ?>'');"></div>\r\n        <div class="information-container clearfix">\r\n          <div class="field">          \r\n            <p>Van Owen Sesaldo</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>Faculty</p>\r\n          </div>\r\n          <div class="field">          \r\n            <p>name@mail.com</p>\r\n          </div>\r\n          <div class="field">          \r\n            <ul>\r\n              <li>Masters in Computer Science at The University of the Philippines</li>\r\n            </ul>\r\n          </div>\r\n          <div class="field">\r\n            <p></p>\r\n          </div>\r\n        </div>\r\n      </div>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
