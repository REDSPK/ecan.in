-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2013 at 11:14 PM
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
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `company` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `e_mail_address` varchar(255) DEFAULT NULL,
  `e_mail_display_name` varchar(255) DEFAULT NULL,
  `bounce_back_for_those_who_s_email_address_changes_` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `level`, `first_name`, `middle_name`, `last_name`, `suffix`, `company`, `department`, `section`, `job_title`, `type`, `e_mail_address`, `e_mail_display_name`, `bounce_back_for_those_who_s_email_address_changes_`) VALUES
(1, 'OOP1', 'J.', 'P.', 'Gaspard', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Operations Management', 'Liquidation Escalation Resolution', 'Conventional', 'jean.p.gaspard@wellsfargo.com', 'J. P. Gaspard (jean.p.gaspard@wellsfargo.com)', NULL),
(2, 'OOP1', 'Chad', 'J.', 'Hell', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Operations Management', 'Liquidation Escalation Resolution', 'Conventional', 'Chad.Hell@wellsfargo.com', 'Chad.Hell@wellsfargo.com', NULL),
(3, 'ML2', 'Lisa', NULL, 'Perez', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Closing Department', 'Work Director (Short Sale Closing) ', 'Conventional', 'Lisa.perez3@wellsfargo.com', 'Lisa Perez (Lisa.perez3@wellsfargo.com)', NULL),
(4, 'ML2', 'Tanya', 'M.', 'Jones', NULL, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', NULL, 'Conventional', 'tonya.m.jones@wellsfargo.com', 'Tanya M. Jones (tonya.m.jones@wellsfargo.com)', NULL),
(5, 'ML2', 'Shanan', NULL, 'Owen', NULL, 'US Bank Home Mortgage', 'Short Sale', 'Closing Department', 'Underwriting/Investor Approval/Closing Supervisor', 'Conventional', 'shanan.owen@usbank.com', 'Shanan Owen (shanan.owen@usbank.com)', NULL),
(6, 'ML1', 'Amanda', NULL, 'Millay', NULL, 'US Bank Home Mortgage', 'Short Sale', 'Processing Department', 'Disposition Option Team Lead', 'Conventional', 'amanda.millay@usbank.com', 'Amanda Millay (amanda.millay@usbank.com)', NULL),
(7, 'ML2', 'Juanita', 'M.', 'Moore', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'FHA Short Sale Supervisor', 'FHA', 'Juanita.M.Moore@wellsfargo.com', 'Juanita M. Moore (Juanita.M.Moore@wellsfargo.com)', NULL),
(8, 'ML1', 'justin', NULL, 'Crews', NULL, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'HELOC Short Sale Manager', 'HELOC', 'justin.crews@bankofamerica.com', 'justin Crews (justin.crews@bankofamerica.com)', NULL),
(9, 'ML1', 'Kathryn', NULL, 'Rubio', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', NULL, 'Conventional', 'Kathryn.P.Rubio@wellsfargo.com', 'Kathryn Rubio (Kathryn.P.Rubio@wellsfargo.com)', NULL),
(10, 'ML1', 'Aaron', NULL, 'Jensen', NULL, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'FHA Short Sale DIL Manager', 'FHA', 'Aaron.Jensen@bankofamerica.com ', 'Aaron Jensen (Aaron.Jensen@bankofamerica.com)', NULL),
(11, 'ML1', 'Melanie', NULL, 'Lee', NULL, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'FHA Short Sale DIL Manager', 'FHA', 'Melanie.Lee@bankofamerica.com', 'Melanie Lee (Melanie.Lee@bankofamerica.com', NULL),
(12, 'OOP3', 'Jessica', NULL, 'Del Olmo', NULL, 'Bank of America Home Loans', 'Short Sale', 'Operations Management', 'SVP Escalation Supervisor ', 'Conventional', 'jessica.del.olmo@bankofamerica.com', 'Jessica Del Olmo (jessica.del.olmo@bankofamerica.com)', NULL),
(13, 'OOP2', 'Elizabeth', NULL, 'Fair', NULL, 'Bank of America Home Loans', 'Short Sale', 'Operations Management', 'Assistant to Jessica Del Olmo', 'Conventional', 'elizabeth.fair@bankofamerica.com', 'Elizabeth Fair (elizabeth.fair@bankofamerica.com)', NULL),
(14, 'ML1', 'Zachary', NULL, 'Ward', NULL, 'GMAC ResCap', 'Short Sale', 'Processing Department', 'FHA/VA -Loss Mitigation Supervisor', 'FHA', 'zachary.ward@gmacrescap.com', 'Zachary Ward (zachary.ward@gmacrescap.com)', NULL),
(15, 'ML1', 'Kenton', 'A.', 'Frank', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'FNMA Short Sale Manager', 'FNMA', 'Kenton.A.Frank@WellsFargo.com', 'Kenton A. Frank (Kenton.A.Frank@WellsFargo.com)', NULL),
(16, 'ML1', 'Gloria', NULL, 'Johnson', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'FHA Short Sale Manager', 'FHA', 'gloria.johnson@wellsfargo.com', 'Gloria Johnson (gloria.johnson@wellsfargo.com)', NULL),
(17, 'ML1', 'Cynthia', 'A.', 'Biersma', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'FNMA Short Sale Manager', 'FNMA', 'cynthia.a.biersma@wellsfargo.com', 'Cynthia A. Biersma (cynthia.a.biersma@wellsfargo.com)', NULL),
(18, 'ML1', 'Ryan', 'J.', 'Revier', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Operations Management', 'VA Short Sale Manager', 'VA', 'ryan.j.revier@wellsfargo.com', 'Ryan J. Revier (ryan.j.revier@wellsfargo.com)', NULL),
(19, 'ML1', 'Brett', 'A.', 'Draper', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'Short Sale Manager', 'Conventional', 'Brett.A.Draper@wellsfargo.com', 'Brett A. Draper (Brett.A.Draper@wellsfargo.com)', NULL),
(20, 'ML1', 'Michele', 'L.', 'Matthews', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Setup Department', 'Setup Short Sale Manager', 'Conventional', 'michele.l.matthews@wellsfargo.com', 'Michele L. Matthews (michele.l.matthews@wellsfargo.com)', NULL),
(21, 'ML1', 'James', 'W.', 'Gormley', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'Freddie Mac (FHLMC) Short Sale Manager', 'FHLMC', 'James.W.Gormley@WellsFargo.com', 'James W. Gromley (James.W.Gormley@WellsFargo.com)', NULL),
(22, 'ML1', 'Levi', NULL, 'Cahill', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'FNMA Short Sale Manager', 'FNMA', 'levi.cahill@wellsfargo.com', 'Levi Cahill (levi.cahill@wellsfargo.com)', NULL),
(23, 'ML1', 'David', NULL, 'Ojeda', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Closing Department', 'Short Sale Department Manager', 'Conventional', 'David.Ojeda@WellsFargo.com', 'David Ojeda (David.Ojeda@WellsFargo.com)', NULL),
(24, 'ML2', 'Randy', NULL, 'Denton', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Closing Department', 'Short Sale Fulfillment Executive Management', 'Conventional', 'Randy.Denton@WellsFargo.com', 'Randy Denton (Randy.Denton@WellsFargo.com)', NULL),
(25, 'ML1', 'Juanita', 'M.', 'Moore', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Setup Department', 'FHA Short Sale Manager', 'FHA', 'Juanita.M.Moore@wellsfargo.com', 'Juanita M. Moore (Juanita.M.Moore@wellsfargo.com)', NULL),
(26, 'ML1', 'James', NULL, 'Lewis', NULL, 'Indymac (Servicelink)', 'Short Sale', 'Processing Department', 'Short Sale Supervisor', 'Conventional', 'james.lewis@servicelinkfnf.com', 'James Lewis (james.lewis@servicelinkfnf.com)', NULL),
(27, 'ML1', 'Jennifer', NULL, 'Sandford', NULL, 'Wells Fargo Bank', 'Short Sale', 'Processing Department', 'Short Sale Manager', 'Conventional', 'jennifer.sanford@wellsfargo.com', 'Jennifer Sandford (jennifer.sanford@wellsfargo.com)', NULL),
(28, 'ML1', 'James', 'W.', 'Mooney', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'Short Sale Manager', 'Conventional', 'James.W.Mooney@WellsFargo.com', 'James W. Mooney (James.W.Mooney@WellsFargo.com)', NULL),
(29, 'ML1', 'Maribel', NULL, 'Cabrera', NULL, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'FHA Short Sale Manager', 'FHA', 'maribel.cabrera@bankofamerica.com', 'Maribel Cabrera (maribel.cabrera@bankofamerica.com)', NULL),
(30, 'ML1', 'Nikki', NULL, 'May', NULL, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'FHA Short Sale Manager', 'FHA', 'Nikki.May@bankofamerica.com', 'Nikki May (Nikki.May@bankofamerica.com)', NULL),
(31, 'ML1', 'Amy', NULL, 'Toller', NULL, 'PNC Financial Services Group ', 'Short Sale', NULL, 'Mortgage Escalation Team ', 'Conventional', 'Amy.Toller@PNCMortgage.com', 'Amy Toller (Amy.Toller@PNCMortgage.com)', NULL),
(32, 'ML1', 'Alex', NULL, 'Marshall', NULL, 'U.S. Bank', 'Short Sale', 'Closing Department', 'Supervisor (Denials-File Admin, Holding Tank, Reporting, Non-Approvals )', 'Conventional', 'alex.marshall@usbank.com', 'Alex Marshall (alex.marshall@usbank.com)', NULL),
(33, 'ML1', 'Jennifer', NULL, 'Green', NULL, 'U.S. Bank', 'Short Sale', 'Closing Department', 'Underwriting Supervisor', 'Conventional', 'jennifer.green@usbank.com', 'Jennifer Green (jennifer.green@usbank.com)', NULL),
(34, 'ML1', 'Robin', NULL, 'Gaynor', NULL, 'U.S. Bank', 'Short Sale', 'Closing Department', 'Supervisor', 'Conventional', 'robin.gaynor@usbank.com', 'Robin Gaynor (robin.gaynor@usbank.com)', NULL),
(35, 'OOP1', 'Ruth', NULL, 'Lowe', NULL, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'Presidential Escalation Short Sale Negotiator', 'Conventional', 'ruth.a.lowe@bankofamerica.com', 'Ruth Lowe (ruth.a.lowe@bankofamerica.com)', NULL),
(36, 'OOP2', 'Mary', NULL, 'Adams', NULL, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'Presidential Escalations Manager', 'Conventional', NULL, NULL, NULL),
(37, 'OOP5', 'John', NULL, 'Beggins', NULL, 'Specialized Loan Servicing', 'ALL', 'Operations Management', 'President/CEO', 'ALL', 'john.beggins@specializedloanservicing.com', 'John Beggins (john.beggins@specializedloanservicing.com)', NULL),
(38, 'ML2', 'Beth', NULL, 'Welch', NULL, 'Bank of America Home Loans', 'Loan Modification', NULL, 'Loan Modification Manager (manager to managers)', 'Conventional', 'beth.welch@bankofamerica.com', 'Beth Welch (beth.welch@bankofamerica.com)', NULL),
(39, 'OOP4', 'Bill', NULL, 'Borda', NULL, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'Short Sale Escalations Manager to Presidential Office', 'Conventional', 'bill.borda@bankofamerica.com', 'William "Bill" Borda (bill.borda@bankofamerica.com)', NULL),
(40, 'ML1', 'Joshua', NULL, 'Bell', NULL, 'Wells Fargo Home Mortgage', 'Short Sale', 'Closing Department', 'Loan Admin Manager Claims', 'Conventional', 'joshua.e.bell@wellsfargo.com', 'Joshua Bell (joshua.e.bell@wellsfargo.com)', NULL),
(41, 'ML2', 'Mark', 'W.', 'Wendelberger', NULL, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Closing Department', 'Loan Admin Claims Upper Manager (foreclosure help)', 'Conventional', 'mark.w.wendelberger@wellsfargo.com', 'Mark W. Wendelberger (mark.w.wendelberger@wellsfargo.com)', NULL),
(42, 'ML2', 'Leah', 'M.', 'Gamblel', NULL, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'Short Sale - Loan Admin Manager', 'FHA', 'leah.m.gamlel@wellsfargo.com', 'Leah M. Gamlel (leah.m.gamlel@wellsfargo.com)', NULL),
(43, 'ML2', 'Scott', NULL, 'Mell', NULL, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'Short Sale - Loan Admin Manager', 'FHA', 'Scott.Mell@wellsfargo.com', 'Scott Mell (Scott.Mell@wellsfargo.com)', NULL),
(44, 'ML1', 'Joey ', NULL, 'Ritger', NULL, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'Short Sale - Loan Admin Manager', 'FHA', 'Joey.Ritger@wellsfargo.com', 'Joey Ritger (Joey.Ritger@wellsfargo.com)', NULL),
(45, 'ML2', 'Kim', NULL, 'Humphreys', NULL, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'VA Preforeclosure Work Director', 'VA', 'Kim.Humphreys@wellsfargo.com', 'Kim Humphreys (Kim.Humphreys@wellsfargo.com)', NULL),
(46, 'ML1', 'Bryan', NULL, 'Pena', NULL, 'Wells Fargo (Wachovia)', 'Short Sale', 'Closing Department', 'Short Sale - Loan Admin Manager', 'Conventional', 'Bryan.Pena@wellsfargo.com', 'Bryan Pena (Bryan.Pena@wellsfargo.com)', NULL),
(47, 'ML1', 'Michelle', 'L.', 'Degrave', NULL, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'Short Sale - Loan Admin Manager', 'FHA', 'michelle.l.degrave@wellsfargo.com', 'Michelle L. Degrave (Michelle.l.Degrave@wellsfargo.com', NULL),
(48, 'ML2', 'Jamilah', 'A. ', 'Johnson', NULL, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'Short Sale - Loan Admin Manager', 'FHA', 'jamilah.a.johnson@wellsfargo.com', 'Jamilah A. Johnson (jamilah.a.johnson@wellsfargo.com)', NULL),
(49, 'ML2', 'Patrick', NULL, 'Burchard', NULL, 'Servicelink FNF', 'Short Sale', 'Processing Department', 'Short Sale Manager', 'Conventional', 'patrick.burchard@servicelinkfnf.com', 'Patrick Burchard (patrick.burchard@servicelinkfnf.com)', NULL),
(50, 'ML2', 'Gregory', NULL, 'Lecounte', NULL, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'FHA Short Sale Department Manager', 'FHA', 'gregory.lecounte@bankofamerica.com', 'Gregory Le Counte (gregory.lecounte@bankofamerica.com', NULL),
(51, 'OOP5', 'Brian ', 'T. ', 'Moynihan', NULL, 'Bank of America Home Loans', 'ALL', 'Operations Management', 'President/CEO', 'ALL', 'brian.t.moynihan@bankofamerica.com', 'Brian T. Moynihan (brian.t.moynihan@bankofamerica.com)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subject` varchar(250) NOT NULL,
  `template` text NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `activationcode` varchar(255) NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `first_name`, `last_name`, `username`, `company_telephone`, `direct_telephone`, `company_fax`, `company_name`, `company_street_address`, `company_address_line2`, `company_city`, `company_state`, `company_zip_code`, `company_website`, `password`, `email_address`, `activationcode`, `activated`, `admin`) VALUES
(1, 'zubair', 'ahmad', 'imrantufail', '54343', '3487027', '8475287-', 'NUCES', '34D model town', 'bwn', 'lahore', 'pun', '540', 'www.', '81dc9bdb52d04dc20036dbd8313ed055', 'imrantufail@live.com', '', 1, 0),
(27, 'admin', 'Ecan.in', 'admin', '', '', '', '', '', '', '', '', '', '', '21232f297a57a5a743894a0e4a801fc3', 'admin@ecan.in', '', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
