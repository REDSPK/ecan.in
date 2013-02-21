/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : db_ecan_in

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2013-02-20 23:34:10
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `companies`
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_type_id` int(11) NOT NULL,
  `company_name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contact_new
-- ----------------------------
INSERT INTO `contact_new` VALUES ('1', 'J.', 'P.', 'Gaspard', 'Liquidation Escalation Resolution', 'jean.p.gaspard@wellsfargo.com', '1', '1', '7', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('2', 'Chad', 'J.', 'Hell', 'Liquidation Escalation Resolution', 'Chad.Hell@wellsfargo.com', '1', '1', '7', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('3', 'Lisa', '', 'Perez', 'Work Director (Short Sale Closing) ', 'Lisa.perez3@wellsfargo.com', '1', '2', '3', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('4', 'Tanya', 'M.', 'Jones', '', 'tonya.m.jones@wellsfargo.com', '1', '3', '3', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('5', 'Shanan', '', 'Owen', 'Underwriting/Investor Approval/Closing Supervisor', 'shanan.owen@usbank.com', '2', '2', '3', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('6', 'Amanda', '', 'Millay', 'Disposition Option Team Lead', 'amanda.millay@usbank.com', '2', '3', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('7', 'Juanita', 'M.', 'Moore', 'FHA Short Sale Supervisor', 'Juanita.M.Moore@wellsfargo.com', '1', '3', '3', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('8', 'justin', '', 'Crews', 'HELOC Short Sale Manager', 'justin.crews@bankofamerica.com', '3', '3', '2', '3', '1', '1');
INSERT INTO `contact_new` VALUES ('9', 'Kathryn', '', 'Rubio', 'Research & Remediation Analyst', 'Kathryn.P.Rubio@wellsfargo.com', '1', '3', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('10', 'Aaron', '', 'Jensen', 'FHA Short Sale DIL Manager', 'Aaron.Jensen@bankofamerica.com ', '3', '3', '2', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('11', 'Melanie', '', 'Lee', 'FHA Short Sale DIL Manager', 'Melanie.Lee@bankofamerica.com', '3', '3', '2', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('12', 'Jessica', '', 'Del Olmo', 'SVP Escalation Supervisor ', 'jessica.del.olmo@bankofamerica.com', '3', '1', '9', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('13', 'Elizabeth', '', 'Fair', 'Assistant to Jessica Del Olmo', 'elizabeth.fair@bankofamerica.com', '3', '1', '8', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('14', 'Zachary', '', 'Ward', 'FHA/VA -Loss Mitigation Supervisor', 'zachary.ward@gmacrescap.com', '4', '3', '2', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('15', 'Kenton', 'A.', 'Frank', 'FNMA Short Sale Manager', 'Kenton.A.Frank@WellsFargo.com', '1', '3', '2', '4', '1', '1');
INSERT INTO `contact_new` VALUES ('16', 'Gloria', '', 'Johnson', 'FHA Short Sale Manager', 'gloria.johnson@wellsfargo.com', '1', '3', '2', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('17', 'Cynthia', 'A.', 'Biersma', 'FNMA Short Sale Manager', 'cynthia.a.biersma@wellsfargo.com', '1', '3', '2', '4', '1', '1');
INSERT INTO `contact_new` VALUES ('18', 'Ryan', 'J.', 'Revier', 'VA Short Sale Manager', 'ryan.j.revier@wellsfargo.com', '1', '1', '2', '5', '1', '1');
INSERT INTO `contact_new` VALUES ('19', 'Brett', 'A.', 'Draper', 'Short Sale Manager', 'Brett.A.Draper@wellsfargo.com', '1', '3', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('20', 'Michele', 'L.', 'Matthews', 'Setup Short Sale Manager', 'michele.l.matthews@wellsfargo.com', '1', '4', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('21', 'James', 'W.', 'Gormley', 'Freddie Mac (FHLMC) Short Sale Manager', 'James.W.Gormley@WellsFargo.com', '1', '3', '2', '6', '1', '1');
INSERT INTO `contact_new` VALUES ('22', 'Levi', '', 'Cahill', 'FNMA Short Sale Manager', 'levi.cahill@wellsfargo.com', '1', '3', '2', '4', '1', '1');
INSERT INTO `contact_new` VALUES ('23', 'David', '', 'Ojeda', 'Short Sale Department Manager', 'David.Ojeda@WellsFargo.com', '1', '2', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('24', 'Randy', '', 'Denton', 'Short Sale Fulfillment Executive Management', 'Randy.Denton@WellsFargo.com', '1', '2', '3', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('25', 'Juanita', 'M.', 'Moore', 'FHA Short Sale Manager', 'Juanita.M.Moore@wellsfargo.com', '1', '4', '2', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('26', 'James', '', 'Lewis', 'Short Sale Supervisor', 'james.lewis@servicelinkfnf.com', '5', '3', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('27', 'Jennifer', '', 'Sandford', 'Short Sale Manager', 'jennifer.sanford@wellsfargo.com', '6', '3', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('28', 'James', 'W.', 'Mooney', 'Short Sale Manager', 'James.W.Mooney@WellsFargo.com', '1', '3', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('29', 'Maribel', '', 'Cabrera', 'FHA Short Sale Manager', 'maribel.cabrera@bankofamerica.com', '3', '3', '2', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('30', 'Nikki', '', 'May', 'FHA Short Sale Manager', 'Nikki.May@bankofamerica.com', '3', '3', '2', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('31', 'Amy', '', 'Toller', 'Mortgage Escalation Team ', 'Amy.Toller@PNCMortgage.com', '7', '5', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('32', 'Alex', '', 'Marshall', 'Supervisor (Denials-File Admin, Holding Tank, Reporting, Non-Approvals )', 'alex.marshall@usbank.com', '8', '2', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('33', 'Jennifer', '', 'Green', 'Underwriting Supervisor', 'jennifer.green@usbank.com', '8', '2', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('34', 'Robin', '', 'Gaynor', 'Supervisor', 'robin.gaynor@usbank.com', '8', '2', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('35', 'Ruth', '', 'Lowe', 'Presidential Escalation Short Sale Negotiator', 'ruth.a.lowe@bankofamerica.com', '3', '3', '7', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('36', 'Mary', '', 'Adams', 'Presidential Escalations Manager', '', '3', '3', '8', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('37', 'John', '', 'Beggins', 'President/CEO', 'john.beggins@specializedloanservicing.com', '9', '1', '11', '7', '3', '1');
INSERT INTO `contact_new` VALUES ('38', 'Beth', '', 'Welch', 'Loan Modification Manager (manager to managers)', 'beth.welch@bankofamerica.com', '3', '5', '3', '1', '2', '1');
INSERT INTO `contact_new` VALUES ('39', 'Bill', '', 'Borda', 'Short Sale Escalations Manager to Presidential Office', 'bill.borda@bankofamerica.com', '3', '3', '10', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('40', 'Joshua', '', 'Bell', 'Loan Admin Manager Claims', 'joshua.e.bell@wellsfargo.com', '1', '2', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('41', 'Mark', 'W.', 'Wendelberger', 'Loan Admin Claims Upper Manager (foreclosure help)', 'mark.w.wendelberger@wellsfargo.com', '1', '2', '3', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('42', 'Leah', 'M.', 'Gamblel', 'Short Sale - Loan Admin Manager', 'leah.m.gamlel@wellsfargo.com', '1', '3', '3', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('43', 'Scott', '', 'Mell', 'Short Sale - Loan Admin Manager', 'Scott.Mell@wellsfargo.com', '1', '3', '3', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('44', 'Joey ', '', 'Ritger', 'Short Sale - Loan Admin Manager', 'Joey.Ritger@wellsfargo.com', '1', '3', '2', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('45', 'Kim', '', 'Humphreys', 'VA Preforeclosure Work Director', 'Kim.Humphreys@wellsfargo.com', '1', '3', '3', '5', '1', '1');
INSERT INTO `contact_new` VALUES ('46', 'Bryan', '', 'Pena', 'Short Sale - Loan Admin Manager', 'Bryan.Pena@wellsfargo.com', '10', '2', '2', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('47', 'Michelle', 'L.', 'Degrave', 'Short Sale - Loan Admin Manager', 'michelle.l.degrave@wellsfargo.com', '1', '3', '2', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('48', 'Jamilah', 'A. ', 'Johnson', 'Short Sale - Loan Admin Manager', 'jamilah.a.johnson@wellsfargo.com', '1', '3', '3', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('49', 'Patrick', '', 'Burchard', 'Short Sale Manager', 'patrick.burchard@servicelinkfnf.com', '11', '3', '3', '1', '1', '1');
INSERT INTO `contact_new` VALUES ('50', 'Gregory', '', 'Lecounte', 'FHA Short Sale Department Manager', 'gregory.lecounte@bankofamerica.com', '3', '3', '3', '2', '1', '1');
INSERT INTO `contact_new` VALUES ('51', 'Brian ', 'T. ', 'Moynihan', 'President/CEO', 'brian.t.moynihan@bankofamerica.com', '3', '1', '11', '7', '3', '2');
INSERT INTO `contact_new` VALUES ('52', 'Katherine', '', 'Faucett', 'Unknown', 'Katherine.Faucett@ocwen.com', '12', '1', '7', '7', '3', '2');
INSERT INTO `contact_new` VALUES ('53', 'Tiffany', '', 'Drexel', '', 'tiffany.drexel@ocwen.com', '12', '1', '8', '7', '3', '2');
INSERT INTO `contact_new` VALUES ('54', 'Joanne', '', 'Perez', '', 'joanne.perez@ocwen.com', '12', '1', '8', '7', '3', '2');
INSERT INTO `contact_new` VALUES ('55', 'Faizan', 'sheikh', 'Ali', 'Software Engineer', 'sh.faizan.ali@gmail.com', '1', '1', '1', '1', '1', '1');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of history
-- ----------------------------
INSERT INTO `history` VALUES ('1', '2013-02-05 11:56:12', 'SALE DATE: 2013-02-20 - Loan Modification - LN#:789-Faizan Ali', '<strong>J. P. Gaspard ,</strong><br/>\r\n                      We apologize to be reaching out to you like this at the 11th hour but we had few other options. Previously your input ended up being invaluable and we didn\'t know if there are any options still on the table. We needed to bring this account to someone\'s attention. The borrower is very worried with the lack of clear communcation and the lack of interest shown by the negotiator.We have a growing concern because we are not hearing back from anyone.We have left various messages with no responses.We attempted to reach the negotiator\'s manager with no response in return. <br/>Additionally , Really need to work this out We have done everything we can to move the file forward but the file has not moved forward as expected. We attempted all other avenues before getting in contact with you we had spoken to the sample type of assitance group and we attempted to bring this to the negotiator\'s attention but file still has yet to move forward. We have submited a complete sample type of assitance package there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Given the circumstances is there anything we can do or anyone we can reach out to? The homeowner has really stuggled to keep things together and requires admin Ecan.in does what it can to transmit to the investor to allow for this processing of this file to continue. <br/>  We understand the volume of work you have so anything that you could do would be great and if there is anyone that can be spoken with we would be more than glad to further explain the details. <br/><br/>\r\n                        Best Wishes,<br/>\r\n                      <strong>admin Ecan.in\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> <br><strong>Company:</strong>   <br><strong>Email:</strong> admin@ecan.in\r\n        ', 'admin', null);
INSERT INTO `history` VALUES ('2', '2013-02-05 11:56:12', 'SALE DATE: 2013-02-20 - Loan Modification - LN#:789-Faizan Ali', '<strong>Chad J. Hell ,</strong><br/>\r\n                      We are sorry to get you involved though there is little time for your review but we had few other options. Since you had been able to be assist in the past it would be greatly appreciated if there were still options to find a resolution to benefit all the parties involved. We needed to bring this account to your attention. We are concerned with the responses we are getting and the road that it has taken.We have a growing concern because we are not hearing back from anyone.A number of messages have been left for the negotiator with no response.We have left a message to the manager to notify them but have not heard back. <br/>Additionally , Really need to work this out We have done everything we can to move the file forward but the file has not moved forward as expected. Before we found ourselves here trying to reach out to you we reached out to the sample type of assitance area and we attempted to bring this to the negotiator\'s attention but there has been stagnation on this file we cannot get past. A complete submission of a sample type of assitance packet there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. Is there anything that can still be done? The homeowner has really stuggled to keep things together and hopes that admin Ecan.in will to try to speak to the investor to allow more time for this file to proceed. <br/>  We understand the volume of work you have so anything that you could do would be great and if there is anyone that can be spoken with we would be more than glad to further explain the details. <br/><br/>\r\n                        Best Regards,<br/>\r\n                      <strong>admin Ecan.in\r\n                      </strong><br/>\r\n                      <strong>Phone:</strong> <br><strong>Company:</strong>   <br><strong>Email:</strong> admin@ecan.in\r\n        ', 'admin', null);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'zubair', 'ahmad', 'imrantufail', '54343', '3487027', '8475287-', 'NUCES', '34D model town', 'bwn', 'lahore', 'pun', '540', 'www.', '81dc9bdb52d04dc20036dbd8313ed055', 'imrantufail@live.com', '', '1', '0', '0');
INSERT INTO `member` VALUES ('27', 'admin', 'Ecan.in', 'admin', '', '', '', '', '', '', '', '', '', '', '21232f297a57a5a743894a0e4a801fc3', 'admin@ecan.in', '', '0', '1', '0');
INSERT INTO `member` VALUES ('28', 'Faizan', 'Ali', 'shfaizanali', '923456345682', '923456345682', '1', '1', '1', '1', '1', 'Punjab', '54000', '11', 'fdf51da2878f7a97a0d16c69cf52e6b6', 'sh.faizan.ali@hotmail.com', 'yBD1AqYGj53', '0', '0', '0');

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
