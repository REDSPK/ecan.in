/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : db_ecan_in

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2013-03-13 01:59:39
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin_awarded_credits`
-- ----------------------------
DROP TABLE IF EXISTS `admin_awarded_credits`;
CREATE TABLE `admin_awarded_credits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user` varchar(255) NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `date_awarded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin_awarded_credits
-- ----------------------------
INSERT INTO `admin_awarded_credits` VALUES ('1', 'imrantufail', 'admin', 'ECAN500', '2013-03-10 01:35:49');
INSERT INTO `admin_awarded_credits` VALUES ('2', 'shfaizanali', 'admin', 'ECAN500', '2013-03-10 02:52:21');
INSERT INTO `admin_awarded_credits` VALUES ('3', 'shfaizanali', 'admin', 'ECAN500', '2013-03-10 15:12:17');

-- ----------------------------
-- Table structure for `companies`
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_type_id` int(11) NOT NULL,
  `company_name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES ('1', '1', 'Wells Fargo Home Mortgage');
INSERT INTO `companies` VALUES ('2', '1', 'US Bank Home Mortgage');
INSERT INTO `companies` VALUES ('3', '1', 'Bank of America Home Loans');
INSERT INTO `companies` VALUES ('4', '1', 'GMAC ResCap');
INSERT INTO `companies` VALUES ('5', '1', 'Indymac (Servicelink)');
INSERT INTO `companies` VALUES ('6', '1', 'Wells Fargo Bank');
INSERT INTO `companies` VALUES ('7', '1', 'PNC Financial Services Group ');
INSERT INTO `companies` VALUES ('8', '1', 'U.S. Bank');
INSERT INTO `companies` VALUES ('9', '1', 'Specialized Loan Servicing');
INSERT INTO `companies` VALUES ('10', '1', 'Wells Fargo (Wachovia)');
INSERT INTO `companies` VALUES ('11', '1', 'Servicelink FNF');
INSERT INTO `companies` VALUES ('12', '1', 'Ocwen');
INSERT INTO `companies` VALUES ('13', '1', 'Sheikh & Co.');
INSERT INTO `companies` VALUES ('14', '1', 'REDS');
INSERT INTO `companies` VALUES ('15', '1', 'REDS');
INSERT INTO `companies` VALUES ('16', '1', 'REDS');
INSERT INTO `companies` VALUES ('17', '1', 'REDS');

-- ----------------------------
-- Table structure for `company_type`
-- ----------------------------
DROP TABLE IF EXISTS `company_type`;
CREATE TABLE `company_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company_type
-- ----------------------------
INSERT INTO `company_type` VALUES ('1', 'Bank');
INSERT INTO `company_type` VALUES ('2', 'Investor');
INSERT INTO `company_type` VALUES ('3', 'Insurer');
INSERT INTO `company_type` VALUES ('4', 'Government');
INSERT INTO `company_type` VALUES ('5', 'Attorney/Trustee');

-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
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
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', 'OOP1', 'J.', 'P.', 'Gaspard', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Operations Management', 'Liquidation Escalation Resolution', 'Conventional', 'jean.p.gaspard@wellsfargo.com', 'J. P. Gaspard (jean.p.gaspard@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('2', 'OOP1', 'Chad', 'J.', 'Hell', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Operations Management', 'Liquidation Escalation Resolution', 'Conventional', 'Chad.Hell@wellsfargo.com', 'Chad.Hell@wellsfargo.com', null);
INSERT INTO `contacts` VALUES ('3', 'ML2', 'Lisa', null, 'Perez', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Closing Department', 'Work Director (Short Sale Closing) ', 'Conventional', 'Lisa.perez3@wellsfargo.com', 'Lisa Perez (Lisa.perez3@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('4', 'ML2', 'Tanya', 'M.', 'Jones', null, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', null, 'Conventional', 'tonya.m.jones@wellsfargo.com', 'Tanya M. Jones (tonya.m.jones@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('5', 'ML2', 'Shanan', null, 'Owen', null, 'US Bank Home Mortgage', 'Short Sale', 'Closing Department', 'Underwriting/Investor Approval/Closing Supervisor', 'Conventional', 'shanan.owen@usbank.com', 'Shanan Owen (shanan.owen@usbank.com)', null);
INSERT INTO `contacts` VALUES ('6', 'ML1', 'Amanda', null, 'Millay', null, 'US Bank Home Mortgage', 'Short Sale', 'Processing Department', 'Disposition Option Team Lead', 'Conventional', 'amanda.millay@usbank.com', 'Amanda Millay (amanda.millay@usbank.com)', null);
INSERT INTO `contacts` VALUES ('7', 'ML2', 'Juanita', 'M.', 'Moore', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'FHA Short Sale Supervisor', 'FHA', 'Juanita.M.Moore@wellsfargo.com', 'Juanita M. Moore (Juanita.M.Moore@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('8', 'ML1', 'justin', null, 'Crews', null, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'HELOC Short Sale Manager', 'HELOC', 'justin.crews@bankofamerica.com', 'justin Crews (justin.crews@bankofamerica.com)', null);
INSERT INTO `contacts` VALUES ('9', 'ML1', 'Kathryn', null, 'Rubio', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', null, 'Conventional', 'Kathryn.P.Rubio@wellsfargo.com', 'Kathryn Rubio (Kathryn.P.Rubio@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('10', 'ML1', 'Aaron', null, 'Jensen', null, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'FHA Short Sale DIL Manager', 'FHA', 'Aaron.Jensen@bankofamerica.com ', 'Aaron Jensen (Aaron.Jensen@bankofamerica.com)', null);
INSERT INTO `contacts` VALUES ('11', 'ML1', 'Melanie', null, 'Lee', null, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'FHA Short Sale DIL Manager', 'FHA', 'Melanie.Lee@bankofamerica.com', 'Melanie Lee (Melanie.Lee@bankofamerica.com', null);
INSERT INTO `contacts` VALUES ('12', 'OOP3', 'Jessica', null, 'Del Olmo', null, 'Bank of America Home Loans', 'Short Sale', 'Operations Management', 'SVP Escalation Supervisor ', 'Conventional', 'jessica.del.olmo@bankofamerica.com', 'Jessica Del Olmo (jessica.del.olmo@bankofamerica.com)', null);
INSERT INTO `contacts` VALUES ('13', 'OOP2', 'Elizabeth', null, 'Fair', null, 'Bank of America Home Loans', 'Short Sale', 'Operations Management', 'Assistant to Jessica Del Olmo', 'Conventional', 'elizabeth.fair@bankofamerica.com', 'Elizabeth Fair (elizabeth.fair@bankofamerica.com)', null);
INSERT INTO `contacts` VALUES ('14', 'ML1', 'Zachary', null, 'Ward', null, 'GMAC ResCap', 'Short Sale', 'Processing Department', 'FHA/VA -Loss Mitigation Supervisor', 'FHA', 'zachary.ward@gmacrescap.com', 'Zachary Ward (zachary.ward@gmacrescap.com)', null);
INSERT INTO `contacts` VALUES ('15', 'ML1', 'Kenton', 'A.', 'Frank', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'FNMA Short Sale Manager', 'FNMA', 'Kenton.A.Frank@WellsFargo.com', 'Kenton A. Frank (Kenton.A.Frank@WellsFargo.com)', null);
INSERT INTO `contacts` VALUES ('16', 'ML1', 'Gloria', null, 'Johnson', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'FHA Short Sale Manager', 'FHA', 'gloria.johnson@wellsfargo.com', 'Gloria Johnson (gloria.johnson@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('17', 'ML1', 'Cynthia', 'A.', 'Biersma', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'FNMA Short Sale Manager', 'FNMA', 'cynthia.a.biersma@wellsfargo.com', 'Cynthia A. Biersma (cynthia.a.biersma@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('18', 'ML1', 'Ryan', 'J.', 'Revier', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Operations Management', 'VA Short Sale Manager', 'VA', 'ryan.j.revier@wellsfargo.com', 'Ryan J. Revier (ryan.j.revier@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('19', 'ML1', 'Brett', 'A.', 'Draper', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'Short Sale Manager', 'Conventional', 'Brett.A.Draper@wellsfargo.com', 'Brett A. Draper (Brett.A.Draper@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('20', 'ML1', 'Michele', 'L.', 'Matthews', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Setup Department', 'Setup Short Sale Manager', 'Conventional', 'michele.l.matthews@wellsfargo.com', 'Michele L. Matthews (michele.l.matthews@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('21', 'ML1', 'James', 'W.', 'Gormley', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'Freddie Mac (FHLMC) Short Sale Manager', 'FHLMC', 'James.W.Gormley@WellsFargo.com', 'James W. Gromley (James.W.Gormley@WellsFargo.com)', null);
INSERT INTO `contacts` VALUES ('22', 'ML1', 'Levi', null, 'Cahill', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'FNMA Short Sale Manager', 'FNMA', 'levi.cahill@wellsfargo.com', 'Levi Cahill (levi.cahill@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('23', 'ML1', 'David', null, 'Ojeda', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Closing Department', 'Short Sale Department Manager', 'Conventional', 'David.Ojeda@WellsFargo.com', 'David Ojeda (David.Ojeda@WellsFargo.com)', null);
INSERT INTO `contacts` VALUES ('24', 'ML2', 'Randy', null, 'Denton', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Closing Department', 'Short Sale Fulfillment Executive Management', 'Conventional', 'Randy.Denton@WellsFargo.com', 'Randy Denton (Randy.Denton@WellsFargo.com)', null);
INSERT INTO `contacts` VALUES ('25', 'ML1', 'Juanita', 'M.', 'Moore', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Setup Department', 'FHA Short Sale Manager', 'FHA', 'Juanita.M.Moore@wellsfargo.com', 'Juanita M. Moore (Juanita.M.Moore@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('26', 'ML1', 'James', null, 'Lewis', null, 'Indymac (Servicelink)', 'Short Sale', 'Processing Department', 'Short Sale Supervisor', 'Conventional', 'james.lewis@servicelinkfnf.com', 'James Lewis (james.lewis@servicelinkfnf.com)', null);
INSERT INTO `contacts` VALUES ('27', 'ML1', 'Jennifer', null, 'Sandford', null, 'Wells Fargo Bank', 'Short Sale', 'Processing Department', 'Short Sale Manager', 'Conventional', 'jennifer.sanford@wellsfargo.com', 'Jennifer Sandford (jennifer.sanford@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('28', 'ML1', 'James', 'W.', 'Mooney', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Processing Department', 'Short Sale Manager', 'Conventional', 'James.W.Mooney@WellsFargo.com', 'James W. Mooney (James.W.Mooney@WellsFargo.com)', null);
INSERT INTO `contacts` VALUES ('29', 'ML1', 'Maribel', null, 'Cabrera', null, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'FHA Short Sale Manager', 'FHA', 'maribel.cabrera@bankofamerica.com', 'Maribel Cabrera (maribel.cabrera@bankofamerica.com)', null);
INSERT INTO `contacts` VALUES ('30', 'ML1', 'Nikki', null, 'May', null, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'FHA Short Sale Manager', 'FHA', 'Nikki.May@bankofamerica.com', 'Nikki May (Nikki.May@bankofamerica.com)', null);
INSERT INTO `contacts` VALUES ('31', 'ML1', 'Amy', null, 'Toller', null, 'PNC Financial Services Group ', 'Short Sale', null, 'Mortgage Escalation Team ', 'Conventional', 'Amy.Toller@PNCMortgage.com', 'Amy Toller (Amy.Toller@PNCMortgage.com)', null);
INSERT INTO `contacts` VALUES ('32', 'ML1', 'Alex', null, 'Marshall', null, 'U.S. Bank', 'Short Sale', 'Closing Department', 'Supervisor (Denials-File Admin, Holding Tank, Reporting, Non-Approvals )', 'Conventional', 'alex.marshall@usbank.com', 'Alex Marshall (alex.marshall@usbank.com)', null);
INSERT INTO `contacts` VALUES ('33', 'ML1', 'Jennifer', null, 'Green', null, 'U.S. Bank', 'Short Sale', 'Closing Department', 'Underwriting Supervisor', 'Conventional', 'jennifer.green@usbank.com', 'Jennifer Green (jennifer.green@usbank.com)', null);
INSERT INTO `contacts` VALUES ('34', 'ML1', 'Robin', null, 'Gaynor', null, 'U.S. Bank', 'Short Sale', 'Closing Department', 'Supervisor', 'Conventional', 'robin.gaynor@usbank.com', 'Robin Gaynor (robin.gaynor@usbank.com)', null);
INSERT INTO `contacts` VALUES ('35', 'OOP1', 'Ruth', null, 'Lowe', null, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'Presidential Escalation Short Sale Negotiator', 'Conventional', 'ruth.a.lowe@bankofamerica.com', 'Ruth Lowe (ruth.a.lowe@bankofamerica.com)', null);
INSERT INTO `contacts` VALUES ('36', 'OOP2', 'Mary', null, 'Adams', null, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'Presidential Escalations Manager', 'Conventional', null, null, null);
INSERT INTO `contacts` VALUES ('37', 'OOP5', 'John', null, 'Beggins', null, 'Specialized Loan Servicing', 'ALL', 'Operations Management', 'President/CEO', 'ALL', 'john.beggins@specializedloanservicing.com', 'John Beggins (john.beggins@specializedloanservicing.com)', null);
INSERT INTO `contacts` VALUES ('38', 'ML2', 'Beth', null, 'Welch', null, 'Bank of America Home Loans', 'Loan Modification', null, 'Loan Modification Manager (manager to managers)', 'Conventional', 'beth.welch@bankofamerica.com', 'Beth Welch (beth.welch@bankofamerica.com)', null);
INSERT INTO `contacts` VALUES ('39', 'OOP4', 'Bill', null, 'Borda', null, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'Short Sale Escalations Manager to Presidential Office', 'Conventional', 'bill.borda@bankofamerica.com', 'William \"Bill\" Borda (bill.borda@bankofamerica.com)', null);
INSERT INTO `contacts` VALUES ('40', 'ML1', 'Joshua', null, 'Bell', null, 'Wells Fargo Home Mortgage', 'Short Sale', 'Closing Department', 'Loan Admin Manager Claims', 'Conventional', 'joshua.e.bell@wellsfargo.com', 'Joshua Bell (joshua.e.bell@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('41', 'ML2', 'Mark', 'W.', 'Wendelberger', null, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Closing Department', 'Loan Admin Claims Upper Manager (foreclosure help)', 'Conventional', 'mark.w.wendelberger@wellsfargo.com', 'Mark W. Wendelberger (mark.w.wendelberger@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('42', 'ML2', 'Leah', 'M.', 'Gamblel', null, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'Short Sale - Loan Admin Manager', 'FHA', 'leah.m.gamlel@wellsfargo.com', 'Leah M. Gamlel (leah.m.gamlel@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('43', 'ML2', 'Scott', null, 'Mell', null, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'Short Sale - Loan Admin Manager', 'FHA', 'Scott.Mell@wellsfargo.com', 'Scott Mell (Scott.Mell@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('44', 'ML1', 'Joey ', null, 'Ritger', null, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'Short Sale - Loan Admin Manager', 'FHA', 'Joey.Ritger@wellsfargo.com', 'Joey Ritger (Joey.Ritger@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('45', 'ML2', 'Kim', null, 'Humphreys', null, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'VA Preforeclosure Work Director', 'VA', 'Kim.Humphreys@wellsfargo.com', 'Kim Humphreys (Kim.Humphreys@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('46', 'ML1', 'Bryan', null, 'Pena', null, 'Wells Fargo (Wachovia)', 'Short Sale', 'Closing Department', 'Short Sale - Loan Admin Manager', 'Conventional', 'Bryan.Pena@wellsfargo.com', 'Bryan Pena (Bryan.Pena@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('47', 'ML1', 'Michelle', 'L.', 'Degrave', null, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'Short Sale - Loan Admin Manager', 'FHA', 'michelle.l.degrave@wellsfargo.com', 'Michelle L. Degrave (Michelle.l.Degrave@wellsfargo.com', null);
INSERT INTO `contacts` VALUES ('48', 'ML2', 'Jamilah', 'A. ', 'Johnson', null, 'Wells Fargo Home Mortgage ', 'Short Sale', 'Processing Department', 'Short Sale - Loan Admin Manager', 'FHA', 'jamilah.a.johnson@wellsfargo.com', 'Jamilah A. Johnson (jamilah.a.johnson@wellsfargo.com)', null);
INSERT INTO `contacts` VALUES ('49', 'ML2', 'Patrick', null, 'Burchard', null, 'Servicelink FNF', 'Short Sale', 'Processing Department', 'Short Sale Manager', 'Conventional', 'patrick.burchard@servicelinkfnf.com', 'Patrick Burchard (patrick.burchard@servicelinkfnf.com)', null);
INSERT INTO `contacts` VALUES ('50', 'ML2', 'Gregory', null, 'Lecounte', null, 'Bank of America Home Loans', 'Short Sale', 'Processing Department', 'FHA Short Sale Department Manager', 'FHA', 'gregory.lecounte@bankofamerica.com', 'Gregory Le Counte (gregory.lecounte@bankofamerica.com', null);
INSERT INTO `contacts` VALUES ('51', 'OOP5', 'Brian ', 'T. ', 'Moynihan', null, 'Bank of America Home Loans', 'ALL', 'Operations Management', 'President/CEO', 'ALL', 'brian.t.moynihan@bankofamerica.com', 'Brian T. Moynihan (brian.t.moynihan@bankofamerica.com)', null);

-- ----------------------------
-- Table structure for `contact_new`
-- ----------------------------
DROP TABLE IF EXISTS `contact_new`;
CREATE TABLE `contact_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(256) NOT NULL,
  `suffix` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `job_title` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `company_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `escalation_level_id` int(11) NOT NULL,
  `loan_type_id` int(11) NOT NULL,
  `departmend_id` int(11) NOT NULL,
  `lien_position` int(11) NOT NULL,
  `added_by` varchar(255) NOT NULL DEFAULT 'csv',
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contact_new
-- ----------------------------
INSERT INTO `contact_new` VALUES ('16', 'Jonathan', 'sheikh', 'aku', 'Software Engineer', 'sm@g.comaaaasas', '18', '1', '1', '1', '1', '1', 'csv', null);
INSERT INTO `contact_new` VALUES ('63', 'a', 'a', 'a', 'a', 'a', '3', '1', '1', '1', '1', '1', 'admin', '2013-03-13 01:45:38');

-- ----------------------------
-- Table structure for `credits_per_escalation`
-- ----------------------------
DROP TABLE IF EXISTS `credits_per_escalation`;
CREATE TABLE `credits_per_escalation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `escalation_level_id` varchar(256) NOT NULL,
  `num_of_credits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of credits_per_escalation
-- ----------------------------
INSERT INTO `credits_per_escalation` VALUES ('6', '1', '275');
INSERT INTO `credits_per_escalation` VALUES ('7', '2', '500');
INSERT INTO `credits_per_escalation` VALUES ('8', '3', '800');
INSERT INTO `credits_per_escalation` VALUES ('9', '4', '900');
INSERT INTO `credits_per_escalation` VALUES ('10', '5', '1250');
INSERT INTO `credits_per_escalation` VALUES ('11', '6', '1000');
INSERT INTO `credits_per_escalation` VALUES ('12', '7', '750');
INSERT INTO `credits_per_escalation` VALUES ('13', '8', '2000');
INSERT INTO `credits_per_escalation` VALUES ('14', '9', '2500');
INSERT INTO `credits_per_escalation` VALUES ('15', '10', '4000');
INSERT INTO `credits_per_escalation` VALUES ('16', '11', '4500');
INSERT INTO `credits_per_escalation` VALUES ('17', '12', '1500');
INSERT INTO `credits_per_escalation` VALUES ('18', '13', '1300');
INSERT INTO `credits_per_escalation` VALUES ('19', '14', '500');
INSERT INTO `credits_per_escalation` VALUES ('20', '15', '2000');
INSERT INTO `credits_per_escalation` VALUES ('21', '16', '1500');
INSERT INTO `credits_per_escalation` VALUES ('22', '17', '1300');
INSERT INTO `credits_per_escalation` VALUES ('23', '18', '500');
INSERT INTO `credits_per_escalation` VALUES ('24', '19', '2000');
INSERT INTO `credits_per_escalation` VALUES ('25', '20', '2000');
INSERT INTO `credits_per_escalation` VALUES ('26', '21', '1000');
INSERT INTO `credits_per_escalation` VALUES ('27', '22', '1500');
INSERT INTO `credits_per_escalation` VALUES ('28', '23', '1300');
INSERT INTO `credits_per_escalation` VALUES ('29', '24', '500');
INSERT INTO `credits_per_escalation` VALUES ('30', '25', '2000');

-- ----------------------------
-- Table structure for `departments`
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `department_name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES ('1', '1', 'Short Sale');
INSERT INTO `departments` VALUES ('2', '1', 'Loan Modification');
INSERT INTO `departments` VALUES ('3', '1', 'ALL');

-- ----------------------------
-- Table structure for `escalation_level`
-- ----------------------------
DROP TABLE IF EXISTS `escalation_level`;
CREATE TABLE `escalation_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_type_id` int(11) NOT NULL,
  `escalation_level` varchar(256) NOT NULL,
  `comments` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of escalation_level
-- ----------------------------
INSERT INTO `escalation_level` VALUES ('1', '1', 'CL1', 'Not a manager but just a contact in the department');
INSERT INTO `escalation_level` VALUES ('2', '1', 'ML1 ', 'A manager to the people on the phones');
INSERT INTO `escalation_level` VALUES ('3', '1', 'ML2', 'Manager to the Managers');
INSERT INTO `escalation_level` VALUES ('4', '1', 'ML3', 'Department Managers');
INSERT INTO `escalation_level` VALUES ('5', '1', 'ML4', 'AVP/VP Level');
INSERT INTO `escalation_level` VALUES ('6', '1', 'OOPG', 'Office of the President Level G - General Inbound Email');
INSERT INTO `escalation_level` VALUES ('7', '1', 'OOP1', 'Office of the President Level 1 - Ground Level Contacts');
INSERT INTO `escalation_level` VALUES ('8', '1', 'OOP2', 'Office of the President Level 2 - Manager to First Level');
INSERT INTO `escalation_level` VALUES ('9', '1', 'OOP3', 'Office of the President Level 3 - Department Manager');
INSERT INTO `escalation_level` VALUES ('10', '1', 'OOP4', 'Office of the President Level 4 - Executive Management');
INSERT INTO `escalation_level` VALUES ('11', '1', 'OOP5', 'Office of the President Level 5 - CEO/President');
INSERT INTO `escalation_level` VALUES ('12', '2', 'INVG', ' General Inbound Email\r\n General Inbound Email\r\nGeneral Inbound Email');
INSERT INTO `escalation_level` VALUES ('13', '2', 'INV1', 'Ground Level Contacts');
INSERT INTO `escalation_level` VALUES ('14', '2', 'INV2', 'Manager to First Level');
INSERT INTO `escalation_level` VALUES ('15', '2', 'INV3', 'General Inbound Email');
INSERT INTO `escalation_level` VALUES ('16', '3', 'MIG', 'General Inbound Email');
INSERT INTO `escalation_level` VALUES ('17', '3', 'MI1', 'Ground Level Contacts');
INSERT INTO `escalation_level` VALUES ('18', '3', 'MI2', 'Manager to First Level');
INSERT INTO `escalation_level` VALUES ('19', '3', 'MI3', 'General Inbound Email');
INSERT INTO `escalation_level` VALUES ('20', '4', 'SAT', 'State Attorney General');
INSERT INTO `escalation_level` VALUES ('21', '4', 'USAG', 'United States Attorney General');
INSERT INTO `escalation_level` VALUES ('22', '5', 'ATTG', 'Trustee Level G');
INSERT INTO `escalation_level` VALUES ('23', '5', 'ATT1', 'Ground Level Contacts');
INSERT INTO `escalation_level` VALUES ('24', '5', 'ATT2', 'Manager to First Level');
INSERT INTO `escalation_level` VALUES ('25', '5', 'ATT3', 'Manager to the Managers');

-- ----------------------------
-- Table structure for `history`
-- ----------------------------
DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subject` varchar(250) NOT NULL,
  `template` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `receiver_email` varchar(255) DEFAULT NULL,
  `loan_no` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of history
-- ----------------------------
INSERT INTO `history` VALUES ('10', '2013-02-28 23:56:08', 'SALE DATE: 2013-02-07 -  - LN#:-', '<strong>Chad J. Hell ,</strong><br/>\r\n                      We hope that this is something you can help us with at the very last minute but we really had no other place to turn to. Previously your input ended up being invaluable and it would be greatly appreciated if there was anything that could still be done. We needed to bring this account to someone\'s attention. We are concerned with the responses we are getting and where the file is at after the time invested.We have a growing concern because we are not hearing back from anyone.We have left various messages with no responses.<br/>We have done everything we can to move the file forward but the file has not moved forward as expected. We attempted all other avenues before getting in contact with you we spoke to the sample type of assitance department and we attempted to bring this to the negotiator\'s attention but there has been stagnation on this file we cannot get past. We have submited a complete sample type of assitance package there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Is this the end of the road or can we do something here? The homeowner has really stuggled to keep things together and requires Faizan Ali will to try to speak to the investor to allow more time for this file to proceed. <br/>  Your time is extremely valuable to us so we greatly appreciate anything you can do. <br/><br/>\r\n                        Sincerely,<br/>\r\n                      <strong>Faizan Ali\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> 923456345682<br><strong>Company:</strong> 1 1 1<br><strong>Email:</strong> sh.faizan.ali@hotmail.com\r\n        ', 'shfaizanali', '2', '1');
INSERT INTO `history` VALUES ('11', '2013-02-28 23:58:13', 'SALE DATE: 2013-02-07 -  - LN#:-', '<strong>Chad J. Hell ,</strong><br/>\r\n                      We apologize to be reaching out to you like this though there is little time for your review but we had few other options. Previously your input ended up being invaluable and we didn\'t know if there were still options to find a resolution to benefit all the parties involved. We needed to bring this account to someone\'s attention. The borrower is very worried with the responses we are getting and the road that it has taken.We have a growing concern because we are not hearing back from anyone.A number of messages have been left for the negotiator with no response.<br/>We have been attempting to move this file forward but the negotiator has not taken the steps to proactively move this forward. Prior to reaching out to you we reached out to the sample type of assitance area and we did all we could to bring attention to this file but there has been stagnation on this file we cannot get past. We have submited a complete sample type of assitance packet there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Is this the end of the road or can we do something here? The borrower is trying to manage that they can to keep this afloat and hopes that Faizan Ali does what it can to transmit to the party that holds the risk on the note to allow more time for this file to proceed. <br/>  As we know how busy you are, we greatly appreciate any efforts you can put into this. <br/><br/>\r\n                        Sincerely,<br/>\r\n                      <strong>Faizan Ali\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> 923456345682<br><strong>Company:</strong> 1 1 1<br><strong>Email:</strong> sh.faizan.ali@hotmail.com\r\n        ', 'shfaizanali', '2', '0');
INSERT INTO `history` VALUES ('12', '2013-02-28 23:56:15', 'SALE DATE: 2013-02-07 -  - LN#:-', '<strong>Chad J. Hell ,</strong><br/>\r\n                      We apologize to be reaching out to you like this though there is little time for your review but we really had no other place to turn to. Previously your input ended up being invaluable and it would be greatly appreciated if there was anything that could still be done. We needed to bring this account to your attention. We are concerned with the lack of clear communcation and the lack of interest shown by the negotiator.We are worried because we are seeing very limited activity.We have left various messages with no responses.<br/>We have done everything we can to move the file forward but the file has not moved forward as expected. Prior to reaching out to you we spoke to the sample type of assitance group and we did all we could to bring attention to this file but file still has yet to move forward. A complete submission of a sample type of assitance packet there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Is there anything that can still be done? The homeowner would like to do what they can to avoid foreclsoure and hopes that Faizan Ali does what it can to transmit to the beneficiary to allow for this processing of this file to continue. <br/>  We understand the volume of work you have so anything that you could do would be great and if there is anyone that can be spoken with we would be more than glad to further explain the details. <br/><br/>\r\n                        Best Regards,<br/>\r\n                      <strong>Faizan Ali\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> 923456345682<br><strong>Company:</strong> 1 1 1<br><strong>Email:</strong> sh.faizan.ali@hotmail.com\r\n        ', 'shfaizanali', '2', '7');
INSERT INTO `history` VALUES ('13', '2013-02-28 23:56:20', 'SALE DATE: 2013-02-07 -  - LN#:-', '<strong>J. P. Gaspard ,</strong><br/>\r\n                      We apologize to be reaching out to you like this though there is little time for your review but we really had no other place to turn to. In the past you had been a great help so it would be greatly appreciated if there was anything that could still be done. We needed to bring this account to your attention. We have lost faith with the lack of clear communcation and the lack of interest shown by the negotiator.We have a growing concern because we are not hearing back from anyone.We have left various messages with no responses.<br/>We have done everything we can to move the file forward but the negotiator has not taken the steps to proactively move this forward. Before we found ourselves here trying to reach out to you we had spoken to the sample type of assitance department and we did all we could to bring attention to this file but there has been stagnation on this file we cannot get past. A complete submission of a sample type of assitance package there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Given the circumstances is there anything we can do or anyone we can reach out to? The borrower is trying to manage that they can to keep this afloat and hopes that Faizan Ali will to try to speak to the party that holds the risk on the note to allow more time for this file to proceed. <br/>  Thank you for your time, we greatly appreciate your efforts. <br/><br/>\r\n                        Best Regards,<br/>\r\n                      <strong>Faizan Ali\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> 923456345682<br><strong>Company:</strong> 1 1 1<br><strong>Email:</strong> sh.faizan.ali@hotmail.com\r\n        ', 'shfaizanali', '1', '2');
INSERT INTO `history` VALUES ('14', '2013-02-28 23:56:22', 'SALE DATE: 2013-02-07 -  - LN#:-', '<strong>Chad J. Hell ,</strong><br/>\r\n                      We apologize to be reaching out to you like this at the very last minute but we had few other options. Since you had been able to be assist in the past it would be greatly appreciated if there was anything that could still be done. We needed to bring this account to someone\'s attention. We are concerned with how this file is being processed and the road that it has taken.We have a growing concern because we are not hearing back from anyone.A number of messages have been left for the negotiator with no response.<br/>We have been attempting to move this file forward but we find ourselves in the same place. Prior to reaching out to you we reached out to the sample type of assitance area and attempted to escalate this to the negotaitor but file still has yet to move forward. A complete submission of a sample type of assitance package there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Is there anything that can still be done? The borrower is trying to manage that they can to keep this afloat and requires Faizan Ali does what it can to transmit to the party that holds the risk on the note to allow more time for this file to proceed. <br/>  As we know how busy you are, we greatly appreciate any efforts you can put into this. <br/><br/>\r\n                        Best Wishes,<br/>\r\n                      <strong>Faizan Ali\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> 923456345682<br><strong>Company:</strong> 1 1 1<br><strong>Email:</strong> sh.faizan.ali@hotmail.com\r\n        ', 'shfaizanali', '2', '0');
INSERT INTO `history` VALUES ('15', '2013-03-01 01:27:26', 'SALE DATE: 2013-03-24 -  - LN#:-', '<strong>Faizan  sh Ali ,</strong><br/>\r\n                      We hope that this is something you can help us with at the very last minute but we had few other options. In the past you had been a great help so it would be greatly appreciated if there are any options still on the table. We needed to bring this account to someone\'s attention. The borrower is very worried with the lack of clear communcation and the lack of interest shown by the negotiator.We are worried because we are seeing very limited activity.<br/>We have been attempting to move this file forward but we find ourselves in the same place. We attempted all other avenues before getting in contact with you we had spoken to the sample type of assitance area and we attempted to bring this to the negotiator\'s attention but file still has yet to move forward. We have submited a complete sample type of assitance package there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Is this the end of the road or can we do something here? The homeowner has really fallen into a tough situation and really needs admin Ecan.in will communicate to the investor to allow more time for this file to proceed. <br/>  Your time is extremely valuable to us so we greatly appreciate anything you can do. <br/><br/>\r\n                        Sincerely,<br/>\r\n                      <strong>admin Ecan.in\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> <br><strong>Company:</strong>   <br><strong>Email:</strong> admin@ecan.in\r\n        ', 'admin', '56', '0');
INSERT INTO `history` VALUES ('16', '2013-03-01 01:29:59', 'SALE DATE:  -  - LN#:-', '<strong>Faizan  sh Ali ,</strong><br/>\r\n                      We are sorry to get you involved at the 11th hour but we really had no other place to turn to. In the past you had been a great help so it would be greatly appreciated if there are any options still on the table. We needed to bring this account to your attention. The borrower is very worried with the lack of clear communcation and the lack of interest shown by the negotiator.We attempted to reach the negotiator\'s manager with no response in return. <br/>We have been attempting to move this file forward but the file has not moved forward as expected. Prior to reaching out to you we had spoken to the sample type of assitance department and we did all we could to bring attention to this file but there has been stagnation on this file we cannot get past. We have submited a complete sample type of assitance package there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Given the circumstances is there anything we can do or anyone we can reach out to? The homeowner has really stuggled to keep things together and hopes that admin Ecan.in will communicate to the party that holds the risk on the note to allow more time for this file to proceed. <br/>  Thank you for your time, we greatly appreciate your efforts. <br/><br/>\r\n                        Regards,<br/>\r\n                      <strong>admin Ecan.in\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> <br><strong>Company:</strong>   <br><strong>Email:</strong> admin@ecan.in\r\n        ', 'admin', '56', '789456');
INSERT INTO `history` VALUES ('17', '2013-03-01 01:33:01', 'SALE DATE:  -  - LN#:789456-', '<strong>Faizan  sh Ali ,</strong><br/>\r\n                      We apologize to be reaching out to you like this at the very last minute but we really had no other place to turn to. Previously your input ended up being invaluable and it would be greatly appreciated if there was anything that could still be done. We needed to bring this account to your attention. We are concerned with the responses we are getting and the lack of interest shown by the negotiator.We have left a message to the manager to notify them but have not heard back. <br/>We have done everything we can to move the file forward but the file has not moved forward as expected. We attempted all other avenues before getting in contact with you we reached out to the sample type of assitance department and attempted to escalate this to the negotaitor but file still has yet to move forward. A complete submission of a sample type of assitance packet there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Given the circumstances is there anything we can do or anyone we can reach out to? The homeowner would like to do what they can to avoid foreclsoure and requires admin Ecan.in will to try to speak to the party that holds the risk on the note to allow for this processing of this file to continue. <br/>  We understand the volume of work you have so anything that you could do would be great and if there is anyone that can be spoken with we would be more than glad to further explain the details. <br/><br/>\r\n                        Best Wishes,<br/>\r\n                      <strong>admin Ecan.in\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> <br><strong>Company:</strong>   <br><strong>Email:</strong> admin@ecan.in\r\n        ', 'admin', '56', '789456');
INSERT INTO `history` VALUES ('18', '2013-03-07 00:15:45', 'SALE DATE:  -  - LN#:123456-', '<strong>Faizan  sh Ali ,</strong><br/>\r\n                      We hope that this is something you can help us with at the very last minute but we had few other options. Since you had been able to be assist in the past it would be greatly appreciated if there was anything that could still be done. We needed to bring this account to someone\'s attention. The borrower is very worried with how this file is being processed and the lack of interest shown by the negotiator.We are worried because we are seeing very limited activity.A number of messages have been left for the negotiator with no response.<br/>We have been attempting to move this file forward but the file has not moved forward as expected. Prior to reaching out to you we had spoken to the sample type of assitance area and we attempted to bring this to the negotiator\'s attention but file still has yet to move forward. We have submited a complete sample type of assitance package there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Is there anything that can still be done? The homeowner would like to do what they can to avoid foreclsoure and requires admin Ecan.in will communicate to the party that holds the risk on the note to allow for this processing of this file to continue. <br/>  We understand the volume of work you have so anything that you could do would be great and if there is anyone that can be spoken with we would be more than glad to further explain the details. <br/><br/>\r\n                        Best Wishes,<br/>\r\n                      <strong>admin Ecan.in\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> <br><strong>Company:</strong>   <br><strong>Email:</strong> admin@ecan.in\r\n        ', 'admin', '56', '123456');
INSERT INTO `history` VALUES ('19', '2013-03-08 23:07:30', 'SALE DATE: 2013-03-11 -  - LN#:1213123-', '<strong>Jonathan sheikh aku ,</strong><br/>\r\n                      We apologize to be reaching out to you like this at the very last minute but we had few other options. Since you had been able to be assist in the past we didn\'t know if there are any options still on the table. We needed to bring this account to your attention. We have lost faith with the responses we are getting and the lack of interest shown by the negotiator.<br/>We have done everything we can to move the file forward but we find ourselves in the same place. Before we found ourselves here trying to reach out to you we reached out to the sample type of assitance area and we did all we could to bring attention to this file but file still has yet to move forward. We have submited a complete sample type of assitance packet there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Given the circumstances is there anything we can do or anyone we can reach out to? The borrower is trying to manage that they can to keep this afloat and requires admin Ecan.in will to try to speak to the investor to allow for this processing of this file to continue. <br/>  Thank you for your time, we greatly appreciate your efforts. <br/><br/>\r\n                        Sincerely,<br/>\r\n                      <strong>admin Ecan.in\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> <br><strong>Company:</strong>   <br><strong>Email:</strong> admin@ecan.in\r\n        ', 'admin', '58', '1213123');
INSERT INTO `history` VALUES ('20', '2013-03-08 23:08:19', 'SALE DATE: 2013-03-11 -  - LN#:1213123-', '<strong>Jonathan sheikh aku ,</strong><br/>\r\n                      We apologize to be reaching out to you like this at the 11th hour but we had few other options. Since you had been able to be assist in the past we didn\'t know if there are any options still on the table. We needed to bring this account to your attention. We have lost faith with the lack of clear communcation and where the file is at after the time invested.<br/>We have done everything we can to move the file forward but we find ourselves in the same place. We attempted all other avenues before getting in contact with you we reached out to the sample type of assitance department and attempted to escalate this to the negotaitor but file still has yet to move forward. We have a complete sample type of assitance packet there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Is there anything that can still be done? The homeowner would like to do what they can to avoid foreclsoure and hopes that admin Ecan.in will communicate to the investor to allow for this processing of this file to continue. <br/>  We understand the volume of work you have so anything that you could do would be great and if there is anyone that can be spoken with we would be more than glad to further explain the details. <br/><br/>\r\n                        Best Wishes,<br/>\r\n                      <strong>admin Ecan.in\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> <br><strong>Company:</strong>   <br><strong>Email:</strong> admin@ecan.in\r\n        ', 'admin', '58', '1213123');
INSERT INTO `history` VALUES ('21', '2013-03-13 01:58:35', 'SALE DATE:  -  - LN#:asd-', '<strong>a a a ,</strong><br/>\r\n                      We apologize to be reaching out to you like this though there is little time for your review but we had few other options. In the past you had been a great help so it would be greatly appreciated if there were still options to find a resolution to benefit all the parties involved. We needed to bring this account to your attention. We are concerned with the responses we are getting and where the file is at after the time invested.We attempted to reach the negotiator\'s manager with no response in return. We disagree with the decision rendered by the negotiator and would like to request another review.<br/>Additionally , asdasd We have done everything we can to move the file forward but we find ourselves in the same place. We attempted all other avenues before getting in contact with you we spoke to the sample type of assitance group and we attempted to bring this to the negotiator\'s attention but there has been stagnation on this file we cannot get past. We have a complete sample type of assitance package there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Is this the end of the road or can we do something here? The homeowner has really stuggled to keep things together and really needs admin Ecan.in will to try to speak to the party that holds the risk on the note to allow more time for this file to proceed. <br/>  Thank you for your time, we greatly appreciate your efforts. <br/><br/>\r\n                        Best Regards,<br/>\r\n                      <strong>admin Ecan.in\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> <br><strong>Company:</strong>   <br><strong>Email:</strong> admin@ecan.in\r\n        ', 'admin', '63', 'asd');

-- ----------------------------
-- Table structure for `loan_type`
-- ----------------------------
DROP TABLE IF EXISTS `loan_type`;
CREATE TABLE `loan_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_type` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of loan_type
-- ----------------------------
INSERT INTO `loan_type` VALUES ('1', 'Conventional');
INSERT INTO `loan_type` VALUES ('2', 'FHA');
INSERT INTO `loan_type` VALUES ('3', 'HELOC');
INSERT INTO `loan_type` VALUES ('4', 'FNMA');
INSERT INTO `loan_type` VALUES ('5', 'VA');
INSERT INTO `loan_type` VALUES ('6', 'FHLMC');
INSERT INTO `loan_type` VALUES ('7', 'ALL');

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
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
  `credits` int(11) NOT NULL DEFAULT '0',
  `user_type` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `date_joined` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'zubair', 'ahmad', 'imrantufail', '54343', '3487027', '8475287-', 'NUCES', '34D model town', 'bwn', 'lahore', 'pun', '540', 'www.', '81dc9bdb52d04dc20036dbd8313ed055', 'imrantufail@live.com', '', '1', '0', '2000', '0', '2013-03-10 01:35:48');
INSERT INTO `member` VALUES ('27', 'admin', 'Ecan.in', 'admin', '', '', '', '', '', '', '', '', '', '', '21232f297a57a5a743894a0e4a801fc3', 'admin@ecan.in', '', '1', '1', '49175', '0', '2013-03-13 01:58:35');
INSERT INTO `member` VALUES ('28', 'Faizan', 'Ali', 'shfaizanali', '923456345682', '923456345682', '1', '1', '1', '1', '1', 'Punjab', '54000', '11', '21232f297a57a5a743894a0e4a801fc3', 'sh.faizan.ali@hotmail.com', '', '1', '0', '51000', '1', '2013-03-10 15:12:17');

-- ----------------------------
-- Table structure for `sections`
-- ----------------------------
DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_type` int(11) NOT NULL,
  `section_name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sections
-- ----------------------------
INSERT INTO `sections` VALUES ('1', '1', 'Operations Management');
INSERT INTO `sections` VALUES ('2', '1', 'Closing Department');
INSERT INTO `sections` VALUES ('3', '1', 'Processing Department');
INSERT INTO `sections` VALUES ('4', '1', 'Setup Department');
INSERT INTO `sections` VALUES ('5', '2', 'ALL');

-- ----------------------------
-- Table structure for `transactions`
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `txn_id` varchar(19) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transactions
-- ----------------------------

-- ----------------------------
-- Table structure for `type_of_assistance`
-- ----------------------------
DROP TABLE IF EXISTS `type_of_assistance`;
CREATE TABLE `type_of_assistance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_of_assistance` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of type_of_assistance
-- ----------------------------
