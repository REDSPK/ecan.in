-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2013 at 06:40 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ecan_in`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `company_telephone` varchar(50) NOT NULL,
  `direct_telephone` varchar(50) NOT NULL,
  `company_fax` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_street_address` varchar(250) NOT NULL,
  `company_address_line2` varchar(250) NOT NULL,
  `company_city` varchar(50) NOT NULL,
  `company_state` varchar(50) NOT NULL,
  `company_zip_code` varchar(20) NOT NULL,
  `company_website` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `first_name`, `last_name`, `username`, `company_telephone`, `direct_telephone`, `company_fax`, `company_name`, `company_street_address`, `company_address_line2`, `company_city`, `company_state`, `company_zip_code`, `company_website`, `password`, `email_address`) VALUES
(1, 'imran', 'tufail', 'imrantufail', '', '', '', '', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 'imrantufail@live.com'),
(2, 'faizan', 'faizan', 'faizanali', '', '', '', '', '', '', '', '', '', '', '744cf14ef3a45a73677f68867e5ac40c', 'sh.faizan.ali@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
