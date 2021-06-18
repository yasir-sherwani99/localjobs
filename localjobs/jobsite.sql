-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2015 at 03:20 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobsite`
--
CREATE DATABASE IF NOT EXISTS `jobsite` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jobsite`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` text NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  `admin_role` text NOT NULL,
  `admin_status` text NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_role`, `admin_status`, `reg_date`) VALUES
(1, 'Yasir Naeem', 'yasir.sherwani@gmail.com', 'hongkong99', 'Administrator', 'Active', '2015-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `business_type`
--

CREATE TABLE IF NOT EXISTS `business_type` (
  `buss_id` int(10) NOT NULL AUTO_INCREMENT,
  `buss_type` text NOT NULL,
  PRIMARY KEY (`buss_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `business_type`
--

INSERT INTO `business_type` (`buss_id`, `buss_type`) VALUES
(1, 'Sole Prorietorship'),
(2, 'Partnership'),
(3, 'SME (Pvt. Ltd)'),
(4, 'Private Limited Company (Pvt. Ltd)'),
(5, 'Public Limited Company (Listed)'),
(6, 'Public Limited Company (Unlisted)'),
(7, 'Nonprofit'),
(8, 'Joint Venture'),
(9, 'Inc. (Incorporated)'),
(10, 'LLC (Limited Liability Company)'),
(11, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Admin / Management'),
(3, 'Sales / Markeing'),
(4, 'Human Resources'),
(6, 'Engineering'),
(7, 'Customer Service'),
(8, 'Medical / Health Care'),
(9, 'Technology / IT'),
(11, 'Logistics'),
(12, 'Legal / Law'),
(13, 'Arhcitecture'),
(14, 'Others'),
(15, 'Advertising'),
(16, 'Agriculture and Forestry'),
(17, 'Arts &amp; Entertainment'),
(18, 'Construction &amp; Maintenance'),
(20, 'Design'),
(21, 'Energy'),
(22, 'Food &amp; Related products'),
(23, 'Hospitality'),
(24, 'Import and Export'),
(25, 'Industrial Supply'),
(26, 'Insurance'),
(27, 'Maritime'),
(28, 'Mining and Drilling'),
(29, 'Printing and Publishing'),
(30, 'Real Estate'),
(31, 'Security'),
(32, 'Telecom'),
(33, 'Transportation'),
(34, 'Banking / Finance'),
(38, 'Education / Training'),
(39, 'Accounting'),
(40, 'Defence'),
(41, 'Language / Translation'),
(42, 'Aviation'),
(43, 'Pharma / Biotech'),
(44, 'Government'),
(46, 'Warehouse'),
(47, 'Sports'),
(48, 'Journalism');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT,
  `city_name` text NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(2, 'Lahore'),
(3, 'Karachi'),
(4, 'Peshwar'),
(5, 'Quetta'),
(7, 'Sailkot'),
(8, 'Multan'),
(9, 'Mardan'),
(10, 'Abbotabad'),
(11, 'Gawadar'),
(12, 'Murree'),
(13, 'Rawalpindi'),
(14, 'Faisalabad'),
(15, 'Gujranawala'),
(16, 'Daska'),
(17, 'Bahawalpur'),
(18, 'D.G. Khan'),
(19, 'D.I. Khan'),
(20, 'Rahim Yaar Khan'),
(21, 'Hyderabad'),
(22, 'Islamabad'),
(23, 'Sukker'),
(24, 'Taxilla'),
(26, 'Jehlum'),
(27, 'Larkana'),
(28, 'Others'),
(30, 'Wah Cantt');

-- --------------------------------------------------------

--
-- Table structure for table `company_jobs`
--

CREATE TABLE IF NOT EXISTS `company_jobs` (
  `job_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_desc` varchar(5000) NOT NULL,
  `job_skills` varchar(200) NOT NULL,
  `min_exp` int(10) NOT NULL,
  `max_exp` int(10) NOT NULL,
  `job_location` int(11) NOT NULL,
  `other_city` varchar(200) NOT NULL,
  `job_ctry` int(10) NOT NULL,
  `expiry_date` date NOT NULL,
  `expiry_day` int(11) NOT NULL,
  `expiry_month` int(11) NOT NULL,
  `expiry_year` int(11) NOT NULL,
  `min_salary` int(10) NOT NULL,
  `max_salary` int(10) NOT NULL,
  `job_qual` varchar(300) NOT NULL,
  `emp_type` text NOT NULL,
  `emp_status` text NOT NULL,
  `vacancies` text NOT NULL,
  `contact_name` text NOT NULL,
  `contact_no` bigint(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `job_keywords` text NOT NULL,
  `post_date` date NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `company_jobs`
--

INSERT INTO `company_jobs` (`job_id`, `cat_id`, `comp_id`, `job_title`, `job_desc`, `job_skills`, `min_exp`, `max_exp`, `job_location`, `other_city`, `job_ctry`, `expiry_date`, `expiry_day`, `expiry_month`, `expiry_year`, `min_salary`, `max_salary`, `job_qual`, `emp_type`, `emp_status`, `vacancies`, `contact_name`, `contact_no`, `company_email`, `job_keywords`, `post_date`, `status`) VALUES
(16, 38, 3, 'Assistant Professor', 'The University of Lahore is seeking Assistant Professor for its computer science department to teach MS and P.hD related courses. In the following discipline Software Engineering, Cyber Space Forensics and Security, Artificial Intelligence, Embedded Systems and Robotics.\r\nEligibility criteria given by HEC is followed', 'Software Engineering, Cyber Space Forensics and Security, Artificial Intelligence, Embedded Systems and Robotics', 4, 8, 2, '', 1, '2015-06-22', 22, 7, 2015, 100000, 120000, 'PhD in related fields', 'Permanent', 'Full Time', '12', 'Dr. Adnan Hashmi', 4234403895, 'jobs@cs.uol.edu.pk', 'Assistant Professor, University of Lahore, Education', '2015-05-24', 'on'),
(17, 9, 6, 'Abstract Writers/Content Editors', 'Ensuring all contents is consistent in terms of style, quality and tone of voice. Ability to manage multiple responsibilities in a high volume, deadline-driven environment.\r\nMust be up-to-date with all content mediums.\r\nAttention to detail and dedication to work of the highest quality.', 'Excellent written skills and proper knowledge of sentence structures/grammer/tenses with an adaptibility of providing content on international standards.\r\nAbility to quickly grasp the concept behind t', 2, 5, 28, 'Dubai', 11, '2015-06-23', 25, 7, 2015, 90000, 100000, 'Master''s degree in English/Journalism or equivalen', 'Permanent', 'Full Time', '1', 'Muhammad Ramzan Alsisi', 9345356777, 'jobs@innovativesolutions.ae', 'Abstract Writer, Content Editors', '2015-05-24', 'on'),
(18, 38, 3, 'Lecturer', 'The University of Lahore is seeking Lecturers for their computer science department in following discipline: Mobile Application Development, Software Engineering and Web Engineering', 'Android, Eclipse, PHP, JavaScript, CSS, jQuery, AJAX', 2, 4, 2, '', 1, '2015-06-24', 28, 7, 2015, 45000, 55000, 'MS CS from HEC recognized University', 'Permanent', 'Full Time', '5', 'Yasir Mehmood', 3005557788, 'jobs@cs.uol.edu.pk', 'Lecturer, University of Lahore, Education', '2015-05-24', 'on'),
(19, 9, 6, 'Senior Software Engineer', 'I have a MS Degree in computational sciences from Uppsala University, Sweden. Beside this, I also have a Master Degree in computer sciences from University of the Punjab, I have done graduation with majors in mathematics and statistics from Government College University, Lahore-Pakistan. In summary, I am able to offer you great enthusiasm, passion and strong capabilities for advancement in education sector. Currently, I am working as Senior Lecturer of computer sciences at University of Lahore, here I am responsible to teach computer sciences related courses.', 'PHP, CodeIginator, MySQL and MVC', 5, 7, 28, 'Sharjah', 11, '2015-06-30', 30, 7, 2015, 75000, 100000, 'B.Sc in Computer Science, Information Systems or I', 'Contract', 'Full Time', '4', 'Idrees Zaigham', 234335033338, 'hrs@innsol.com', 'Senior Software Engineer, IT', '2015-06-05', 'on'),
(20, 9, 6, 'Senior IOS/Andriod App Developers', 'I have a MS Degree in computational sciences from Uppsala University, Sweden. Beside this, I also have a Master Degree in computer sciences from University of the Punjab, I have done graduation with majors in mathematics and statistics from Government College University, Lahore-Pakistan. In summary, I am able to offer you great enthusiasm, passion and strong capabilities for advancement in education sector. Currently, I am working as Senior Lecturer of computer sciences at University of Lahore, here I am responsible to teach computer sciences related courses.', 'Ecllipse, Java', 4, 6, 28, 'Sharjah', 11, '2015-06-29', 29, 7, 2015, 85000, 95000, 'B.Sc in Computer Science, Information Systems or I', 'Permanent', 'Full Time', '3', 'Idrees Zaigham', 234335033338, 'hrs@innsol.com', 'IOS/Andriod Developer', '2015-06-05', 'on'),
(21, 9, 6, 'Senior Web Developer', 'I have a MS Degree in computational sciences from Uppsala University, Sweden. Beside this, I also have a Master Degree in computer sciences from University of the Punjab, I have done graduation with majors in mathematics and statistics from Government College University, Lahore-Pakistan. In summary, I am able to offer you great enthusiasm, passion and strong capabilities for advancement in education sector. Currently, I am working as Senior Lecturer of computer sciences at University of Lahore, here I am responsible to teach computer sciences related courses.', '.NET framework, good knowledge of MVC', 10, 12, 28, 'Sharjah', 11, '2015-06-30', 30, 7, 2015, 120000, 150000, 'B.Sc in Computer Science, Information Systems or I', 'Permanent', 'Full Time', '5', 'Idrees Zaigham', 234335033338, 'hrs@innsol.com', 'Senior Web Developer', '2015-06-05', 'on'),
(22, 34, 7, 'Branch Managers', 'The incumbent will be responsible to manage the overall affairs of the Branch. The candidate should possess excellent Sales &amp; Marketing skills and the ability to:\r\n\r\nStrengthen deposit base of the Bank specifically through marketing of Islamic Banking Products.\r\nHave the ability to manage and lead a team in order to achieve Business Targets Effectively and effeciently.\r\nDevelop a versatile customer base etc.', 'Possess good knowledge of Islamic Mode of Financing', 8, 10, 26, '', 1, '2015-07-08', 26, 7, 2015, 75000, 85000, 'Minimum graduate, preference will be given to MBA', 'Contract', 'Full Time', '2', 'Muhammad Adeel', 3005557788, 'hr@sbp.org.pk', 'Branch Managers, State Bank of Pakistan', '2015-06-07', 'on'),
(23, 34, 7, 'Branch Operation Manager', 'The ideal candidate will be responsible for Branch operations. The incumbent should possess strong operational knowledge of Islamic Banking along with acquaintance of:\r\n\r\nSmooth running of branch operations according to operational procedures of the Bank and guidelines provided by SBP.\r\n\r\nProvision of excellent services to our valued customers.', 'Possess good knowledge of branch operation', 5, 7, 14, '', 1, '2015-07-15', 25, 7, 2015, 70000, 80000, 'Minimum graduate, preference will be given to MBA', 'Permanent', 'Full Time', '5', 'Muhammad Adeel', 3005557788, 'hr@sbp.org.pk', 'Operation Manager, State Bank of Pakistan', '2015-06-07', 'on'),
(24, 34, 7, 'Operations Support Officers', 'An ideal incumbent must have a through knowledge of Islamic Banking operations and must have ability to:\r\nEnsure smooth running of assigned tasks according to operational procedures of the bank and guidelines provided by SBP.\r\nProvide excellent service to our valued customers.', 'Possess excellent knowledge of routine banking operations', 2, 5, 19, '', 1, '2015-07-15', 29, 7, 2015, 55000, 60000, 'Minimum graduate, preference will be given to MBA', 'Contract', 'Full Time', '3', 'Muhammad Adeel', 3005557788, 'hr@sbp.org.pk', 'Operation Support Officer, State bank of Pakistan, D.I.Khan', '2015-06-07', 'on'),
(25, 34, 7, 'Marketing Managers', 'Suitable candidate must have leadership skills and will responsible for:\r\nAchievement of assigned deposit targets on monthly basis.\r\nContribute towards achievement of profit targets on monthly basis by way of soliciting deposits, fee income and advances in liaison with credit marketing team.\r\nEnsure full compliance with operational risk, management policies and procedures, extending full support to operational staff, adopting problem solving approach to achieve branch''s operational goals.', 'Possess excellent knowledge of sales and marketing strategies', 4, 5, 8, '', 1, '2015-07-15', 29, 7, 2015, 45000, 55000, 'Minimum graduate, preference will be given to MBA', 'Contract', 'Full Time', '5', 'Muhammad Adeel', 3005557788, 'hr@sbp.org.pk', 'Marketing Managers, Multan, State bank of Pakistan', '2015-06-07', 'on'),
(27, 28, 8, 'Senior Security Officer', 'He/She should be able to carry out security risk assessments of the areas of operation, investigate security accidents and formally report to management. Develop security procedures and carry out inspections and audit.\r\nThe incumbent should have relations with Law Enforcement Agencies(LEA) and capable of handling security matters of all areas where KUFPEC has operations or interest within Pakistan in close coordination with LEA.', 'Excellent Management skills, time management skills, good written and verbal communication skills.  Adequate computer skills that includes MS office to communicate with management.', 15, 17, 22, '', 1, '2015-07-17', 30, 7, 2015, 80000, 85000, 'Bachelor''s degree Professional certification is Se', 'Permanent', 'Full Time', '2', 'Arif Ullah Khan', 3005557788, 'info@kufpec.com', 'Security officer, Kuwait Petroleum Corporation', '2015-06-08', 'on'),
(28, 44, 9, 'Dupty Director Vigilance', 'The incumbent should have field operations experience in intelligence setups and clean service record.\r\nMust be intelligence course qualified.', 'Intelligence course qualified', 5, 8, 4, '', 1, '2015-07-22', 30, 7, 2015, 45000, 55000, 'Master, Bachelor Degree from HEC recognized Univer', 'Permanent', 'Full Time', '4', 'Zulfiqar Bilal', 3224747578, 'hr@nadra.gov.pk', 'Vigilance Director, NADRA', '2015-06-08', 'on'),
(29, 44, 9, 'Intelligence Officer', 'The incumbent should have field experience in intelligence setups and clean service record.\r\n\r\nMust be intelligence course qualified.', 'Must be intelligence course qualified.', 4, 5, 23, '', 1, '2015-07-22', 28, 7, 2015, 35000, 40000, 'Bachelor Degree, Intermediate for Retired JCOs/NCO', 'Contract', 'Full Time', '8', 'Zulfiqar Bilal', 3224747578, 'hr@nadra.gov.pk', 'Intelligence Officer, Nadra', '2015-06-08', 'on'),
(30, 25, 10, 'Manager Administration', 'All administration duties, Liaison with all government departments, Security arrangements, managing vehicles, Timely execution of repair &amp; maintenance activities, Supervising official international &amp; Domestic travelling arrangements, Administrative Procurement, Ensuring error free dispatch handling, Recommending and devising SOPs', 'Adequate knowledge of computer including MS office to communicate with management', 3, 5, 16, '', 1, '2015-07-22', 20, 7, 2015, 40000, 50000, 'Retired Army Officer', 'Contract', 'Full Time', '2', 'Waqar Nawaz', 3134534217, 'hrncpl@nishat.net', 'Manager Administration, Nishat Chunian', '2015-06-08', 'on'),
(31, 6, 10, 'Sales Engineer', 'Having full knowledge of basic refrigeration, HVACR, Cold Storages, Should be able to win and execute projects independently.', 'Good communication skills', 5, 10, 17, '', 1, '2015-07-22', 30, 7, 2015, 70000, 80000, 'Mechanical Engineer/B-Tech in HVACR', 'Permanent', 'Full Time', '1', 'Asif Ali Bajwa', 32144332212, 'hrncpl@nishat.net', 'Sales Engineer, Mechanical', '2015-06-08', 'on'),
(33, 38, 6, 'Program Manager - Monitoring &amp; Evaluation', 'Coordinate the monitoring &amp; evaluation activities of the project as per Monitoring &amp; Evaluation framework by developing appropriate tools and instruments.\r\nFacilitate M&amp;E capacity building activities, including building technical capacity of team.\r\nFacilitate consultation and collaboration with donors and other stakeholders over monitoring &amp; evaluation, data and information. Prepare relevant technical briefing papers, and status updates for the project management team.', 'Understanding of technical, social and institutional issues relating to global development programs.', 7, 8, 22, '', 1, '0000-00-00', 5, 8, 2015, 70000, 90000, 'Master Degree in Economics, Statistics or Social S', 'Permanent', 'Full Time', '2', 'Saad ur Rehman Khan', 3224747578, 'hrs@innsol.com', 'Program Managers, Education', '2015-06-28', 'on'),
(35, 9, 12, 'Senior PHP Developer', 'The incumbent should lead a team of developers, coordinate with the team of PHP developers. \r\nFacilitate developers capacity building activities, including building technical capacity of team. \r\n\r\nPrepare relevant technical briefing papers, and status updates for the project management team.', 'Having 5 years experience in PHP, JavaScript, JQuery, AJAX, CodeIginator Framework and Responsive Design Framework Bootstrap or Foundation', 5, 8, 2, '', 1, '0000-00-00', 27, 7, 2015, 60000, 85000, 'B.Sc in Computer Science, Information Systems or IT', 'Permanent', 'Full Time', '2', 'Mr. Yasir Naeem', 3234403895, 'yasir.sherwani@gmail.com', 'PHP Developer, IT Jobs', '2015-06-29', 'on'),
(36, 9, 6, 'Android App Developer', 'The incumbent should lead a team of developers, coordinate with the team of Android developers.\r\n \r\nFacilitate developers capacity building activities, including building technical capacity of team. \r\n\r\nPrepare relevant technical briefing papers, and status updates for the project management team.', 'Java, Eclipse, Sound knowledge of MVC', 5, 7, 28, 'Sharjah', 11, '0000-00-00', 5, 8, 2015, 200000, 230000, 'B.Sc in Computer Science, Information Systems or IT', 'Contract', 'Full Time', '5', 'Hussni Mubarik', 2434243323332, 'hrs@innsol.com', 'Android, Mobile App Developer', '2015-07-02', 'on'),
(37, 28, 8, 'Well Site Leader', 'Possess extensive experience as incharge of supervising drilling rigs and well operations, preferably in operationally difficult areas.\r\n\r\nHaving hands-on experience of drilling HPHT and H2S wells.\r\n\r\nAble to analyze well problems and troubleshoot in operationally difficult areas.\r\n\r\nHaving experience in supervising maintenance of drilling equipment.', 'Possess valid IWCF supervisory level certification.\r\nWell versed with QMS and HSE regulations to ensure compliance', 15, 17, 5, '', 1, '0000-00-00', 10, 8, 2015, 60000, 75000, 'Intermediate with IWCF, QMS certification', 'Permanent', 'Full Time', '1', 'Mr. Abdul Ghani', 32144332212, 'info@kufpec.com', 'Well Site Leader, Mining and Drilling', '2015-07-02', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `ctry_id` int(10) NOT NULL AUTO_INCREMENT,
  `ctry_name` text NOT NULL,
  PRIMARY KEY (`ctry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ctry_id`, `ctry_name`) VALUES
(1, 'Pakistan'),
(3, 'Iran'),
(4, 'India'),
(5, 'Sweden'),
(6, 'United Kindom'),
(8, 'Germany'),
(9, 'Ukraine'),
(10, 'Kuwait'),
(11, 'United Arab Emirates'),
(12, 'Bangladesh'),
(13, 'Afghanistan'),
(14, 'Nepal'),
(15, 'Sri Lanka'),
(16, 'Denmark'),
(17, 'Norway'),
(18, 'Finnland'),
(19, 'Spain'),
(20, 'Italy'),
(21, 'Canada'),
(22, 'Oman'),
(23, 'Qatar'),
(24, 'China'),
(25, 'Thailand'),
(26, 'Japan'),
(27, 'South Korea'),
(28, 'North Korea'),
(29, 'Taiwan'),
(30, 'Indoneshia'),
(31, 'Malaysia'),
(32, 'Saudia Arabia'),
(33, 'Australia'),
(34, 'New Zealand'),
(35, 'South Africa'),
(36, 'Nigeria'),
(37, 'Egypt'),
(38, 'Iraq'),
(39, 'Ghana'),
(41, 'United States of America');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE IF NOT EXISTS `day` (
  `day_id` int(10) NOT NULL AUTO_INCREMENT,
  `day_day` int(10) NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day_id`, `day_day`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31);

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `comp_id` int(10) NOT NULL AUTO_INCREMENT,
  `comp_email` varchar(100) NOT NULL,
  `comp_pass` varchar(30) NOT NULL,
  `contact_person` text NOT NULL,
  `designation` text NOT NULL,
  `area_code` int(10) NOT NULL,
  `land_line` bigint(20) NOT NULL,
  `extn` int(10) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `comp_name` text NOT NULL,
  `comp_addr` varchar(500) NOT NULL,
  `comp_type` text NOT NULL,
  `location` int(10) NOT NULL,
  `other_city` varchar(200) NOT NULL,
  `country` int(10) NOT NULL,
  `business_type` text NOT NULL,
  `category` text NOT NULL,
  `profile` text NOT NULL,
  `website` varchar(50) NOT NULL,
  `comp_logo` varchar(200) NOT NULL,
  `creation_date` date NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`comp_id`, `comp_email`, `comp_pass`, `contact_person`, `designation`, `area_code`, `land_line`, `extn`, `mobile`, `comp_name`, `comp_addr`, `comp_type`, `location`, `other_city`, `country`, `business_type`, `category`, `profile`, `website`, `comp_logo`, `creation_date`, `status`) VALUES
(3, 'hr@uol.edu.pk', 'uol12345', 'Amil Anjum', 'Manager HR', 423, 5321457, 60, 3214444771, 'The University of Lahore', '1-KM Defence Road Off Raiwind Road, Bhobatain Chowk', 'Corporate', 2, '', 0, '4', '38', 'The University of Lahore start Ibadat Educational Trust, It is leading private sector university of Lahore. It is highest ranked W category university. Offer degree programs in IT, Engineering, Medicine, Law, Business, Pharmacy', 'http://www.uol.edu.pk', 'University_of_Lahore_logo2.jpg', '2015-05-15', 'Active'),
(6, 'hrs@innsol.ae', 'dubai', 'Muhammad Ramzan Alsisi', 'HR Manager', 423, 1234444, 47, 934356871234, 'Innovative Solutions', 'Plaza 34, Alnahiyan Street, Zayed Square', 'Corporate', 28, '', 0, '3', '9', 'http://facebook.com/innovativesolutions\r\nhttp://linkedin.com/company/343434', 'http://www.innovativesolutions.ae', '', '2015-05-24', 'Active'),
(7, 'hr@sbp.org.pk', 'state', 'Moazzam Ali Malik', 'Director Human Resources', 21, 2009966, 70, 3214444771, 'State Bank of Pakistan', 'SBP Banking Services Corporation, Head Office I.I Chundrigar Road', 'Corporate', 3, 'Karaci', 1, '6', '34', 'www.sbp.org.pk/profile,\r\nwww.linkedin.com/company/234453', 'http://www.sbp.org.pk', '', '2015-06-05', 'Active'),
(8, 'info@kufpec.com', 'kuwait', 'Muhammad Marsi', 'Director Human Resources', 234, 1234567, 70, 342455553333, 'Kuwait Foreign Petroleum Exploration Company', '3rd floor, Ufone Towers,\r\n55-C Jinnah Avenue', 'Placement Consultants', 22, '', 1, '8', '28', 'Kuwait Foreign Petroleum Exploration Company, a subsidiary of Kuwait Petroleum Corporation (KPC).\r\n\r\nhttp://www.facebook.com/kufpec\r\nhttp://www.linkedin.com/company/235533', 'http://www.kufpec.com', '', '2015-06-08', 'Active'),
(9, 'hr@nadra.gov.pk', 'databases', 'Rana Shamshad Akhtar', 'Director Human Resources', 51, 9234343, 45, 3004381909, 'National Database and Registration Authority', 'NADRA Headquarter\r\nState Bank of Pakistan building\r\nShahrah-e-Jamhuriat G-5/2', 'Corporate', 22, '', 1, '6', '44', 'NADRA is one of the largest IT Organization in the country. A young and dynamic setup with most sophisticated information and communication technology infrastructure coupled with a highly qualified and dedicated IT workforce. Complete company profile may be check through these websites:\r\nwww.facebook.com/nadra\r\nwww.linkedin.com/company/123232', 'http://www.nadra.gov.pk', '', '2015-06-08', 'Active'),
(10, 'hrncpi@nishat.net', 'nishat', 'Muhammad Usman Gill', 'Manager HR', 21, 1222323, 25, 3212227745, 'Nishat Chunain Group', 'Nishat chunain Road,', 'Corporate', 16, '', 1, '4', '25', 'Nishat Chunain Group\r\nhttp://facebook.com/nishatchunain/\r\nhttp://linkedin.com/company/453421', 'http://www.nishat.net', '', '2015-06-08', 'Active'),
(11, 'admin@naveena.com', 'naveena', 'M Awabeen Danish', 'Admin Officer', 0, 0, 0, 3214444771, 'Naveena Textile Mills Pvt Ltd', '4-km Defence road near Jubalee Town', 'Corporate', 2, '', 1, '4', '25', 'http://www.facebook.com/naveena\r\nhttp://www.linkedin.con/company/4299124', 'http://www.naveena.com', '', '2015-06-21', 'Active'),
(12, 'support@yeetech.com', 'bahriatown', 'Yasir Naeem', 'CEO', 0, 0, 0, 3234403895, 'Yee Technologies Pvt Limted', 'H # 79, Nargis Block, Sector C\r\nBahria Town', 'Placement Consultants', 2, '', 1, '4', '9', 'http://www.linkedin.com/company/123459', 'http://www.yeetech.com', '', '2015-06-22', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `exp_id` int(10) NOT NULL AUTO_INCREMENT,
  `exp_years` varchar(10) NOT NULL,
  `exp_months` int(10) DEFAULT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`exp_id`, `exp_years`, `exp_months`) VALUES
(1, 'Fresh', 0),
(2, '1', 1),
(3, '2', 2),
(4, '3', 3),
(5, '4', 4),
(6, '5', 5),
(7, '6', 6),
(8, '7', 7),
(9, '8', 8),
(10, '9', 9),
(11, '10', 10),
(12, '11', 11),
(13, '12', 12),
(14, '13', NULL),
(15, '14', NULL),
(16, '15', NULL),
(17, '16', NULL),
(18, '17', NULL),
(19, '18', NULL),
(20, '19', NULL),
(21, '20', NULL),
(22, '21', NULL),
(23, '22', NULL),
(24, '23', NULL),
(25, '24', NULL),
(26, '25', NULL),
(27, '26', NULL),
(28, '27', NULL),
(29, '28', NULL),
(30, '29', NULL),
(31, '30', NULL),
(32, '31', NULL),
(33, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `job_title` text NOT NULL,
  `post_date` date NOT NULL,
  `positions` int(10) NOT NULL,
  `job_type` text NOT NULL,
  `job_status` text NOT NULL,
  `gender` text NOT NULL,
  `job_company` varchar(100) NOT NULL,
  `company_profile` text NOT NULL,
  `location` text NOT NULL,
  `job_img` text NOT NULL,
  `job_exp` varchar(100) NOT NULL,
  `job_qual` varchar(100) NOT NULL,
  `job_desc` text NOT NULL,
  `job_skills` text NOT NULL,
  `min_exp` int(10) NOT NULL,
  `max_exp` int(10) NOT NULL,
  `min_salary` int(10) NOT NULL,
  `max_salary` int(10) NOT NULL,
  `job_apply` varchar(200) NOT NULL,
  `expiry_date` date NOT NULL,
  `job_add` varchar(200) NOT NULL,
  `job_keywords` text NOT NULL,
  `status` text NOT NULL,
  `viewed` int(11) NOT NULL,
  `apply` int(11) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `cat_id`, `job_title`, `post_date`, `positions`, `job_type`, `job_status`, `gender`, `job_company`, `company_profile`, `location`, `job_img`, `job_exp`, `job_qual`, `job_desc`, `job_skills`, `min_exp`, `max_exp`, `min_salary`, `max_salary`, `job_apply`, `expiry_date`, `job_add`, `job_keywords`, `status`, `viewed`, `apply`) VALUES
(4, 6, 'Assistant Manager Electrical & Instrumentation', '2015-03-23', 1, 'Full Time', '', 'Any Male or Female', 'Dynamic Equipment & Controls', '', 'Lahore', '', '5 - 6 years of experience', 'B.Sc/B.E (Mechatronics)', 'The incumbent should be able to carry out installations, preventive maintenance and trouble shooting of all electrical and electronic equipments. The candidate should be able to lead a team of engineers/technicians in an effective manner.', '', 0, 0, 0, 0, 'Send your resume at: hrd@dec.com.pk ', '2015-04-02', '', 'Assistant Manager', 'on', 0, 0),
(5, 5, 'Assistant Professor', '2015-03-23', 2, 'Full Time', '', 'Any Male or Female', 'Liaquat National Hospital & Medical College', '', 'Karachi', '', 'As per PMDC requirement', 'As per PMDC requirement', 'Community Medice', '', 0, 0, 0, 0, 'Director Human Resource at HR department, Liaquat National Hospital & Medical College, National Stadium Road, Karachi', '2015-03-30', '', 'Assistant Professor, Liaquat Medical College', 'on', 0, 0),
(6, 6, 'Project Manager', '2015-03-23', 1, 'Contract', '', 'Male', 'Dynamic Equipment & Controls', '', 'Lahore', '', '10-12 years ', 'B.Sc (Mechanical Engineering)', '5 years in Industrial Refrigeration projects and 3 years in Project Sales Management', '', 0, 0, 0, 0, 'CVs should be submitted at hrd@dec.com.pk', '2015-03-29', '', 'Project Manager, Dynamic Equipment & Controls, ', 'on', 0, 0),
(7, 5, 'Academic Director', '2015-03-23', 1, 'Full Time', '', 'Male', 'Confidential Company', '', 'Karachi', '', 'Career experience in Higher Education', 'UK postgraduate (preferable)', 'Have the ability to lead, inspire and support academic community. Have excellent communication skills.', '', 0, 0, 0, 0, 'A letter of Application with full CV and a recent photograph should be sent to: hr@csn.edu.pk', '2015-04-05', '', 'Academic Director, Higher Education, Academics', 'on', 0, 0),
(8, 20, 'Textile Designer', '2015-03-23', 1, 'Internship', '', 'Any Male or Female', 'Tristar', '', 'Multiple Cities', '', '5 years in lawn prints', 'Bachelor Degree in Textile Designing', 'Looking for textile designer', '', 0, 0, 0, 0, 'Eligible candidates may apply at careers@tristar.com.pk', '2015-03-27', '', 'Textile Designer, Tristar', 'on', 0, 0),
(9, 5, 'Senior Curriculum Developer', '2015-03-23', 1, 'Part Time', '', 'Any Male or Female', 'The Citizen Archive of Pakistan', '', 'Karachi', '', '4 year of Teaching and Curriculum Development', 'Master Degree in Education, Social Sciences', 'Will be required to develop and implement content for educational programmes and manage core team.', '', 0, 0, 0, 0, 'Send Application to jobsatcap@gmail.com', '2015-03-20', '', 'Curriculum Developer, Academics, Citizen Archive of Pakistan', 'on', 0, 0),
(10, 14, 'Research Analyst', '2015-03-23', 1, 'Full Time', '', 'Any Male or Female', 'The Citizen Archive of Pakistan', '', 'Karachi', '', '2 years related work experience', 'Bachelor Degree in Social Sciences or Mathematics', 'will be required to interpret data, formulate statistical reports and implement monitoring and evaluation process for cultural and educational projects', '', 0, 0, 0, 0, 'send application to jobsatcap@gmail.com', '2015-03-24', '', 'Research Analyst, Citizen Archive of Pakistan', 'on', 0, 0),
(11, 1, 'Accountant', '2015-03-23', 1, 'Full Time', '', 'Any Male or Female', 'LPG Marketing Company', '', 'Multiple Cities', '', '3 years working experience', 'ACCA qualified or finalist', 'The candidate should possess good interpersonal skills and have sound knowledge of function finance. Preferred age group 25 - 30 years. Preferred gender Female.', '', 0, 0, 0, 0, 'Send CV by email to jobslpgfinance@yahoo.com', '2015-03-28', '', 'Accountant, Accounting, ACCA', 'on', 0, 0),
(12, 2, 'Management Trainee', '2015-03-23', 10, 'Internship', '', 'Any Male or Female', 'Textile Industry ', '', 'Dhaka -  Bangladesh', '', 'Fresh', '4 years Bachelor degree from IBA/LUMS', 'Proficient in English.\r\nFree Furnished accommodation.\r\nAir Ticket, Transport, Bonus and Benefits\r\n', '', 0, 0, 0, 0, 'Send CV & Photograph to email: shahab@acstextiles.com, tareque@acstextiles.com or hr@acstextiles.com The interview will held within May, 2015 at our Karachi liaison office.', '2015-04-20', '', 'Management Trainee, Textile, Bangladesh', 'on', 0, 0),
(13, 6, 'Construction Manager', '2015-03-23', 1, 'Part Time', '', 'Male', 'The Aga Khan University', '', 'Karachi', '', '10 years experience of project management', 'B.Sc (Civil Engineering)', 'The incumbent will be responsible for the overall monitoring and progress of on-going construction activities, ensuring quality, review of construction schedules with minimum disruption to the hospital operations. Arrange adequate manpower and other resources, coordinate with design team, consultants and other stakeholders for timely completion of the project within the budget.', '', 0, 0, 0, 0, 'For further details, please visit out website:\r\nwww.aku.edu/vacancies', '2015-04-24', '', 'Construction Manager, Aga Khan University, Karachi', 'on', 0, 0),
(14, 3, 'General Manager Sales', '2015-03-23', 1, 'Full Time', '', 'Any Male or Female', 'Dysin Automobiles Limited', '', 'Lahore', '', '15 years of experience', 'MBA (marketing)', 'He is required to have substantial experience in sales, market analysis and trends, business development, key account management, branding strategies and B2B in national market place', '', 0, 0, 0, 0, 'Plot # 8, Sikka Street, 8-km Raiwind road, Lahore.\r\nhrd@dysin.com.pk, www.dysin.com.pk', '2015-03-28', '', 'General Manager Sales, Sales, Dysin Automobiles', 'on', 0, 0),
(15, 3, 'National Manager Product Support', '2015-03-24', 1, 'Full Time', '', 'Any Male or Female', 'Dysin Automobiles Limited', '', 'Lahore', '', '15 years of relevant experience', 'B.Sc (Mechanical Engineering) or B.Tech', 'He should be well-versed in after sales services.', '', 0, 0, 0, 0, 'Plot # 8, Sikka Street, 8-km Raiwind Road, Lahore-Pakistan.\r\nhrd@dysin.com.pk. www.dysin.com.pk', '2015-03-28', '', 'National Manager Product Support, Manager, Sales, Car Sales', 'on', 0, 0),
(16, 3, 'Area Sales Manager', '2015-03-24', 1, 'Full Time', '', 'Male', 'Dysin Automobiles Limited', '', 'Multiple Cities', '', '5-8 years of experience', 'MBA (marketing)', 'The incumbent will be responsible for developing new business and key accounts management.', '', 0, 0, 0, 0, 'Plot # 8, Sikka Street, 8-km Raiwind Road, Lahore-Pakistan, hrd@dysin.com.pk, www.dysin.com.pk', '2015-03-28', '', 'Sales Manager, Sales, Area Sales Manager', 'on', 0, 0),
(17, 7, 'Service Engineer', '2015-03-24', 1, 'Full Time', '', 'Male', 'Dysin Automobiles Limited', '', 'Multiple Cities', '', '5 years of experience in relevant field', 'B.Sc. (Mechanical Engineering) or B.Tech', 'The selected candidate will be responsible for supporting customers in the technical service, maintenance, trouble shooting and repair of heavy & light commercial vehicles.', '', 0, 0, 0, 0, 'Plot # 8, Sikka Street, 8-km Raiwind Road, Lahore-Pakistan, hrd@dysin.com.pk, www.dysin.com.pk', '2015-03-28', '', 'Service Engineer, Customer Service', 'on', 0, 0),
(18, 3, 'Marketing Executive', '2015-03-24', 1, 'Full Time', '', 'Male', 'Dysin Automobiles Limited', '', 'Lahore', '', '2-3 years of experience', 'MBA (marketing)', 'The candidate will be responsible for planning, advertising, public relations, event management, ATL & BTL activities and market research', '', 0, 0, 0, 0, 'Plot # 8, Sikka Street, 8-km Raiwind Road, Lahore-Pakistan, hrd@dysin.com.pk, www.dysin.com.pk', '2015-03-28', '', 'Marketing Executive, Sales, Marketing', 'on', 0, 0),
(19, 1, 'Head of Compliance', '2015-03-25', 1, 'Full Time', '', 'Any Male or Female', 'Asset Management Company', '', 'Karachi', '', '6 years of relevant experience in Compliance & Internal Audit', 'Chartered Accountant', 'Establish effective relationships with all levels of management in terms of execution on compliance matters and for the purpose of determining risks associated with the role and functions of the department. To identify key compliance breaches in a timely way for rectification and advises on improvements. Also to design and implement compliance procedures, compliance plan, compliance manual and all other compliance related documents.', '', 0, 0, 0, 0, 'Interested candidates should send their updated resume to resumeamcpk@gmail.com', '2015-03-30', '', 'Head of Compliance, Charter Accountants', 'on', 0, 0),
(20, 8, 'Doctors', '2015-03-25', 1, 'Full Time', '', 'Females', 'Jubilee Life Insurance', '', 'Lahore', '', '1-2 Years', 'MBBS (must be registered with PMDC)', 'For its health insurance business, Jubilee Life is looking for capable and enthusiastic doctors in Lahore who fulfill the criteria.', '', 0, 0, 0, 0, 'Interested candidates are requested to come for a walk-in-interview along with their updated resume and copy of CNIC on Tuesday, March 26, 2015.', '2015-03-26', 'Lahore Regional Office, Jubilee Life Insurance Company Ltd, 56-A Tufail Plaza, 2nd Floor, Shadman Market, Lahore', 'doctors, Insurance', 'on', 0, 0),
(21, 6, 'Engineers', '2015-04-11', 1, 'Full Time', '', 'Both Male or Female', 'Descon Pvt Ltd', '', 'Multiple Cities', '', '5 years work experience', 'Graduate', 'Graduate engineers with minimum 5 years work experience on BMS related works. designing/implementing BMS system and experience in integrating a highly desired. \r\n\r\nSystem software awareness will be an added qualification', '', 0, 0, 0, 0, 'Interested candidates meeting the above criteria may send their updated resume at hr_apply@yahoo.com', '2015-04-29', '', 'engineer', 'on', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_apply`
--

CREATE TABLE IF NOT EXISTS `jobs_apply` (
  `apply_id` int(10) NOT NULL AUTO_INCREMENT,
  `job_id` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `mem_id` int(10) NOT NULL,
  `apply_date` date NOT NULL,
  `job_status` text NOT NULL,
  PRIMARY KEY (`apply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=277 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `mem_id` int(10) NOT NULL AUTO_INCREMENT,
  `mem_first_name` text NOT NULL,
  `mem_last_name` text NOT NULL,
  `mem_email` varchar(50) NOT NULL,
  `mem_pass` varchar(25) NOT NULL,
  `mem_gender` text NOT NULL,
  `mem_cell` bigint(20) NOT NULL,
  `mem_home_ph` bigint(20) NOT NULL,
  `dob_day` smallint(10) NOT NULL,
  `dob_month` int(10) NOT NULL,
  `dob_year` int(10) NOT NULL,
  `mem_addr` varchar(255) NOT NULL,
  `mem_city` text NOT NULL,
  `mem_city_other` text NOT NULL,
  `mem_country` int(10) NOT NULL,
  `degree_level` text NOT NULL,
  `degree_title` text NOT NULL,
  `degree_city` text NOT NULL,
  `degree_ctry` int(10) NOT NULL,
  `majors` text NOT NULL,
  `institution` text NOT NULL,
  `completion_year` year(4) NOT NULL,
  `work_exp` text NOT NULL,
  `mem_it_skills` varchar(1000) DEFAULT NULL,
  `mem_other_skills` varchar(1000) NOT NULL,
  `first_job_day` smallint(10) NOT NULL,
  `first_job_month` int(10) NOT NULL,
  `first_job_year` int(10) NOT NULL,
  `mem_exp_year` int(10) NOT NULL,
  `mem_exp_month` int(10) NOT NULL,
  `profession_industry` int(10) NOT NULL,
  `current_job` varchar(100) NOT NULL,
  `current_job_day` int(10) NOT NULL,
  `current_job_month` int(10) NOT NULL,
  `current_job_year` int(10) NOT NULL,
  `current_end_date` varchar(30) NOT NULL,
  `comp_name` text NOT NULL,
  `comp_ctry` text NOT NULL,
  `comp_city` text NOT NULL,
  `cv_headline` text NOT NULL,
  `mem_cv` varchar(200) NOT NULL,
  `mem_image` text NOT NULL,
  `creation_date` date NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`mem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `mem_first_name`, `mem_last_name`, `mem_email`, `mem_pass`, `mem_gender`, `mem_cell`, `mem_home_ph`, `dob_day`, `dob_month`, `dob_year`, `mem_addr`, `mem_city`, `mem_city_other`, `mem_country`, `degree_level`, `degree_title`, `degree_city`, `degree_ctry`, `majors`, `institution`, `completion_year`, `work_exp`, `mem_it_skills`, `mem_other_skills`, `first_job_day`, `first_job_month`, `first_job_year`, `mem_exp_year`, `mem_exp_month`, `profession_industry`, `current_job`, `current_job_day`, `current_job_month`, `current_job_year`, `current_end_date`, `comp_name`, `comp_ctry`, `comp_city`, `cv_headline`, `mem_cv`, `mem_image`, `creation_date`, `status`) VALUES
(48, 'Yasir', 'Naeem', 'yasir.sherwani@gmail.com', 'sherkhan99', 'Male', 3234403895, 423554578, 15, 3, 1981, 'H # 79, Nargis Block, Sector-C, Bahria Town', '28', '    Uppsala', 5, 'Post Graduation/MS/M.Phil', 'MS (Computational Science)', 'Uppsala', 5, 'Web Engineering', 'Uppsala University', 2007, 'Yes', 'HTML5, CSS, JavaScript, jQuery, AJAX, PHP, MySQL, C++, Dreamweaver CS5, Bootstrap, C++, MS SQL Server 2008', 'Good Communication & Interpersonal Skills', 24, 1, 2008, 6, 10, 38, 'Senior Lecturer', 27, 8, 2013, 'Present', 'The University of Lahore', '1', 'Lahore', 'Lecturer and Freelance Web Developer', 'YSCV.docx', 'Yasir.JPG', '2015-06-01', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE IF NOT EXISTS `months` (
  `month_id` int(10) NOT NULL AUTO_INCREMENT,
  `month_name` text NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`month_id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `sal_id` int(10) NOT NULL AUTO_INCREMENT,
  `sal_sal` int(20) NOT NULL,
  PRIMARY KEY (`sal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sal_id`, `sal_sal`) VALUES
(1, 5000),
(2, 10000),
(3, 15000),
(4, 20000),
(5, 25000),
(6, 30000),
(7, 35000),
(8, 40000),
(9, 45000),
(10, 50000),
(11, 55000),
(12, 60000),
(13, 65000),
(14, 70000),
(15, 75000),
(16, 80000),
(17, 85000),
(18, 90000),
(19, 95000),
(20, 100000),
(21, 110000),
(22, 120000),
(23, 130000),
(24, 140000),
(25, 150000),
(26, 160000),
(27, 170000),
(28, 180000),
(29, 190000),
(30, 200000),
(31, 210000),
(32, 220000),
(33, 230000),
(34, 240000),
(35, 250000),
(36, 260000);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` text NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_name`) VALUES
(1, 'Permanent'),
(2, 'Contract'),
(3, 'Project'),
(4, 'Temporary'),
(5, 'Daily Wages'),
(6, 'Internship'),
(8, 'Freelance');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `year_id` int(10) NOT NULL AUTO_INCREMENT,
  `year_year` int(10) NOT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2016 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`year_id`, `year_year`) VALUES
(1950, 1950),
(1951, 1951),
(1952, 1952),
(1953, 1953),
(1954, 1954),
(1955, 1955),
(1956, 1956),
(1957, 1957),
(1958, 1958),
(1959, 1959),
(1960, 1960),
(1961, 1961),
(1962, 1962),
(1963, 1963),
(1964, 1964),
(1965, 1965),
(1966, 1966),
(1967, 1967),
(1968, 1968),
(1969, 1969),
(1970, 1970),
(1971, 1971),
(1972, 1972),
(1973, 1973),
(1974, 1974),
(1975, 1975),
(1976, 1976),
(1977, 1977),
(1978, 1978),
(1979, 1979),
(1980, 1980),
(1981, 1981),
(1982, 1982),
(1983, 1983),
(1984, 1984),
(1985, 1985),
(1986, 1986),
(1987, 1987),
(1988, 1988),
(1989, 1989),
(1990, 1990),
(1991, 1991),
(1992, 1992),
(1993, 1993),
(1994, 1994),
(1995, 1995),
(1996, 1996),
(1997, 1997),
(1998, 1998),
(1999, 1999),
(2000, 2000),
(2001, 2001),
(2002, 2002),
(2003, 2003),
(2004, 2004),
(2005, 2005),
(2006, 2006),
(2007, 2007),
(2008, 2008),
(2009, 2009),
(2010, 2010),
(2011, 2011),
(2012, 2012),
(2013, 2013),
(2014, 2014),
(2015, 2015);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
