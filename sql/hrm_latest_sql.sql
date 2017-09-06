-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2017 at 09:49 PM
-- Server version: 10.0.23-MariaDB-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `emp_code` varchar(30) NOT NULL,
  `emp_name` varchar(250) NOT NULL,
  `date_arrival` date NOT NULL,
  `date_exit_leave` date NOT NULL,
  `date_exit_final` date NOT NULL,
  `date_exit_absc` date NOT NULL,
  `current_status` enum('Joined','resigned','vacation','unpaid leave','Absconding') NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `agency` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `visa_designation` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `joining_date` date NOT NULL,
  `no_of_months_completed` int(11) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `org_id`, `emp_code`, `emp_name`, `date_arrival`, `date_exit_leave`, `date_exit_final`, `date_exit_absc`, `current_status`, `phone1`, `phone2`, `agency`, `designation`, `visa_designation`, `dob`, `age`, `joining_date`, `no_of_months_completed`, `nationality`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(1, 2, 'IZ10002', 'John Doe', '2012-01-25', '2020-01-23', '2020-01-30', '2020-01-09', 'resigned', '9086493434', '3665434', 'ABC', 'Executive', 'dsfgdfhg', '1981-01-21', 37, '2015-01-08', 30, 'US', 1, 1, '2017-01-04 18:15:13', '2017-01-04 13:09:22'),
(2, 1, 'IZ10003', 'Blake jon', '2017-01-04', '2017-01-04', '2017-01-04', '2017-01-04', 'vacation', '9086493434', '3665434', 'XYZ', 'Developer', 'dsfgdfhg', '2017-01-04', 37, '2017-01-04', 25, 'US', 1, 0, '2017-01-04 18:42:34', '2017-01-04 13:12:34'),
(3, 1, 'IZ10004', 'Steve C', '2015-02-07', '2018-06-12', '0000-00-00', '2018-06-12', 'Joined', '9658425359', '', 'SVS', 'Electrician', 'visa2', '1985-06-15', 32, '2014-08-23', 28, 'Us', 1, 0, '2017-02-06 19:57:19', '2017-02-06 14:27:19'),
(4, 1, 'IZ10005', 'Myles a', '2015-02-08', '2018-06-13', '0000-00-00', '2018-06-13', 'vacation', '9658425360', '', 'SVS', 'Electrician', 'visa3', '1985-06-16', 32, '2014-08-23', 28, 'US', 1, 0, '2017-02-06 19:57:19', '2017-02-06 14:27:19'),
(5, 1, 'IZ10006', 'Leena B', '2015-02-09', '2018-06-13', '0000-00-00', '2018-06-13', 'Joined', '9658425361', '', 'SVS', 'Electrician', 'visa4', '1985-06-17', 32, '2014-08-24', 28, 'Us', 1, 0, '2017-02-06 19:57:20', '2017-02-06 14:27:20'),
(6, 1, 'IZ10007', 'Mike A', '2015-02-10', '2018-06-14', '0000-00-00', '2018-06-14', 'Joined', '9658425362', '', 'SVS', 'Electrician', 'visa5', '1985-06-18', 32, '2014-08-24', 28, 'US', 1, 0, '2017-02-06 19:57:20', '2017-02-06 14:27:20'),
(7, 2, 'IZ10008', 'william B', '2015-02-11', '2018-06-14', '0000-00-00', '2018-06-14', 'Joined', '9658425363', '', 'SVS', 'Developer', 'visa6', '1985-06-19', 32, '2014-08-24', 28, 'Us', 1, 0, '2017-02-06 19:57:20', '2017-02-06 14:27:20'),
(8, 2, 'IZ10009', 'John S', '2015-02-12', '2018-06-15', '0000-00-00', '2018-06-15', 'Joined', '9658425364', '', 'SVS', 'Developer', 'visa7', '1985-06-20', 32, '2014-08-25', 28, 'US', 1, 0, '2017-02-06 19:57:20', '2017-02-06 14:27:20'),
(9, 2, 'IZ10010', 'Jom Alex', '2015-02-13', '2018-06-15', '0000-00-00', '2018-06-15', 'vacation', '9658425365', '', 'SVS', 'Developer', 'visa8', '1985-06-21', 32, '2014-08-25', 28, 'Us', 1, 0, '2017-02-06 19:57:20', '2017-02-06 14:27:20'),
(10, 2, 'IZ10011', 'Vetri S', '2015-02-14', '2018-06-16', '0000-00-00', '2018-06-16', 'Joined', '9658425366', '', 'SVS', 'Developer', 'visa9', '1985-06-22', 32, '2014-08-25', 28, 'US', 1, 1, '2017-02-06 19:57:21', '2017-02-06 14:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
`id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `pp_number` varchar(50) NOT NULL,
  `pp_validity` varchar(150) NOT NULL,
  `vp_number` varchar(50) NOT NULL,
  `rp_number` varchar(50) NOT NULL,
  `rp_validity` varchar(100) NOT NULL,
  `ot_rate` double NOT NULL,
  `sot_rate` double NOT NULL,
  `food_allowance` double NOT NULL,
  `food_allowance_deduction` double NOT NULL,
  `accomodation_allowance` double NOT NULL,
  `transport_allowance` double NOT NULL,
  `telephone_allowance` double NOT NULL,
  `special_allowance` double NOT NULL,
  `salary_advance` double NOT NULL,
  `advancce_deduction` double NOT NULL,
  `emp_qid` varchar(100) NOT NULL,
  `emp_visa_id` varchar(100) NOT NULL,
  `emp_bank_short_name` varchar(50) NOT NULL,
  `emp_account` varchar(150) NOT NULL,
  `salary_frequency` varchar(200) NOT NULL,
  `no_working_days` int(11) NOT NULL,
  `net_salary` double NOT NULL,
  `basic_salary` double NOT NULL,
  `extra_hours` int(11) NOT NULL,
  `extra_income` double NOT NULL,
  `deductions` double NOT NULL,
  `payment_type` enum('Account','Cash') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `emp_id`, `pp_number`, `pp_validity`, `vp_number`, `rp_number`, `rp_validity`, `ot_rate`, `sot_rate`, `food_allowance`, `food_allowance_deduction`, `accomodation_allowance`, `transport_allowance`, `telephone_allowance`, `special_allowance`, `salary_advance`, `advancce_deduction`, `emp_qid`, `emp_visa_id`, `emp_bank_short_name`, `emp_account`, `salary_frequency`, `no_working_days`, `net_salary`, `basic_salary`, `extra_hours`, `extra_income`, `deductions`, `payment_type`) VALUES
(1, 1, '675FDGDS', '676DFDG', '346346DF', 'DFG4554', '45SDGF', 45, 67, 2.5, 4, 4, 4, 4, 4, 50, 40, '67DFGFGH', '57665XDGFS', 'john', '43490568664', '4', 15, 10000, 5000, 10, 10000, 560, 'Account'),
(2, 2, '675FDGDS', '676DFDG', '346346DF', 'DFG4554', '45SDGF', 45, 67, 2.5, 4, 4, 4, 0, 0, 0, 40, '', '57665XDGFS', '', '43490568664', '', 0, 15000, 7000, 0, 0, 456, 'Account'),
(3, 3, '42542', '3 years', '567', '7', '1 year', 500, 700, 0, 0, 0, 100, 0, 0, 100, 100, 'IDF3454', 'VIS103', 'steve', '1358694744', '1', 25, 15000, 7000, 0, 0, 100, 'Account'),
(4, 4, '24122', '3 years', '656', '6', '1 year', 500, 700, 0, 0, 0, 100, 0, 0, 300, 300, 'IDF3455', 'VIS104', 'myles ', '1300634563', '1', 25, 15000, 7000, 0, 0, 300, 'Account'),
(5, 5, '42422', '4 years', '455', '7', '1 year', 500, 700, 0, 0, 0, 100, 0, 0, 300, 300, 'IDF3456', 'VIS105', 'leena', '1300874576', '1', 25, 15000, 7000, 0, 0, 300, 'Account'),
(6, 6, '42422', '4 years', '568', '7', '1 year', 500, 700, 0, 0, 0, 100, 0, 0, 300, 300, 'IDF3457', 'VIS106', 'mike', '1300694784', '1', 25, 15000, 7000, 0, 0, 300, 'Account'),
(7, 7, '42424', '4 years', '657', '7', '1 year', 500, 700, 0, 0, 0, 100, 0, 0, 300, 300, 'IDF3458', 'VIS107', 'william', '1365690565', '1', 25, 20000, 9000, 0, 0, 300, 'Account'),
(8, 8, '52324', '5 years', '456', '7', '1 year', 500, 700, 0, 0, 0, 100, 0, 0, 300, 300, 'IDF3459', 'VIS108', 'john', '1367098858', '1', 25, 20000, 9000, 0, 0, 300, 'Account'),
(9, 9, '42422', '5 years', '569', '7', '1 year', 500, 700, 0, 0, 0, 100, 0, 0, 300, 300, 'IDF3460', 'VIS109', 'jom', '1300645947', '1', 25, 20000, 9000, 0, 0, 300, 'Account'),
(10, 10, '56645', '5 years', '658', '7', '1 year', 500, 700, 0, 0, 0, 100, 0, 0, 300, 300, 'IDF3461', 'VIS110', 'ventri', '1560958886', '1', 25, 20000, 9000, 0, 0, 300, 'Account');

-- --------------------------------------------------------

--
-- Table structure for table `employee_note`
--

CREATE TABLE IF NOT EXISTS `employee_note` (
`id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  `future_data1` text NOT NULL,
  `future_data2` text NOT NULL,
  `future_data3` text NOT NULL,
  `future_data4` text NOT NULL,
  `future_data5` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_note`
--

INSERT INTO `employee_note` (`id`, `emp_id`, `comments`, `future_data1`, `future_data2`, `future_data3`, `future_data4`, `future_data5`) VALUES
(1, 1, 'test comment', 'future data', 'future data', 'future data', 'future data', 'future data'),
(2, 2, 'test', '', '', '', '', ''),
(3, 3, 'test comments', 'data', '', '', '', 'test data'),
(4, 4, 'test comments', 'data', '', '', '', 'test data'),
(5, 5, 'test comments', 'data', '', '', '', 'test data'),
(6, 6, 'test comments', 'data', '', '', '', 'test data'),
(7, 7, 'test comments', 'data', '', '', '', 'test data'),
(8, 8, 'test comments', 'data', '', '', '', 'test data'),
(9, 9, 'test comments', 'data', '', '', '', 'test data'),
(10, 10, 'test comments', 'data', '', '', '', 'test data');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
`id` int(11) NOT NULL,
  `org_type` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `short_name` varchar(20) NOT NULL,
  `registration_no` varchar(50) NOT NULL,
  `web_url` varchar(250) NOT NULL,
  `employee_count` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `note` text NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org_type`, `name`, `short_name`, `registration_no`, `web_url`, `employee_count`, `email`, `phone`, `fax`, `address`, `note`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(1, 1, 'XYZ Limited', 'XYZ', 'DFG454367', 'http://myworld.com', 25, 'saravanamot90@gmail.com', '9865656778', '586345323', 'No.1,salem,10001,US', 'Note note', 1, 1, '2017-01-02 22:20:08', '2017-01-03 09:03:00'),
(2, 2, 'Xion Company', 'Xion', '676FG45', 'http://myworld.com', 10, 'saravanan@izaaptech.in', '9865656778', '45674577', '!st street,xion tech,10002,US', 'additional info', 1, 0, '2017-01-03 15:33:52', '2017-01-03 10:03:52'),
(3, 2, 'Izaap pvt ltd', 'Izaap', '76546DFGHR', 'http://example.com', 34, 'test@gmail.com', '98656567654', '45674577', '2nd street', 'Note', 1, 0, '2017-01-03 22:22:59', '2017-01-03 16:52:59'),
(4, 3, 'ABC Pvt ltd', 'ABC', '677DFDG', 'http://test.com', 25, 'test@gmail.com', '9865656774', '45674577', '1st street,US', 'notes', 1, 1, '2017-01-04 00:20:15', '2017-01-28 12:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `org_type`
--

CREATE TABLE IF NOT EXISTS `org_type` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `org_type`
--

INSERT INTO `org_type` (`id`, `name`) VALUES
(1, 'Internal'),
(2, 'Contract'),
(3, 'Subcontract');

-- --------------------------------------------------------

--
-- Table structure for table `page_titles`
--

CREATE TABLE IF NOT EXISTS `page_titles` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `controller` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `status`, `created_date`) VALUES
(1, 'Test new project', 'test', '1', '2017-01-10 00:00:00'),
(2, 'ABC construction project', 'construction', '1', '2017-01-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'HR'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `role_access`
--

CREATE TABLE IF NOT EXISTS `role_access` (
`id` int(11) NOT NULL,
  `page_title_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `access-level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE IF NOT EXISTS `timesheet` (
`id` int(11) NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `hour` double NOT NULL,
  `type` enum('Present','Absent','Idle','Weekend') NOT NULL DEFAULT 'Present',
  `project` int(11) NOT NULL,
  `purpose` varchar(250) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`id`, `emp_code`, `date`, `hour`, `type`, `project`, `purpose`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(1, 'IZ10002', '2017-01-05', 8, 'Present', 0, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(2, 'IZ10002', '2017-01-06', 8, 'Present', 0, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(3, 'IZ10002', '2017-01-09', 8, 'Present', 0, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(4, 'IZ10002', '2017-01-10', 8, 'Present', 0, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(6, 'IZ10003', '2017-01-05', 8, 'Present', 0, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(7, 'IZ10003', '2017-01-06', 8, 'Present', 0, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(8, 'IZ10003', '2017-01-09', 8, 'Present', 0, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(9, 'IZ10003', '2017-01-10', 8, 'Present', 0, '', 1, 1, '2017-01-11 18:22:58', '2017-01-11 12:52:58'),
(16, 'IZ10002', '2017-01-12', 8, 'Present', 0, '', 1, 1, '2017-01-12 19:44:13', '2017-01-12 14:14:13'),
(17, 'IZ10003', '2017-01-12', 8, 'Present', 0, '', 1, 1, '2017-01-12 19:44:13', '2017-01-12 14:14:13'),
(18, 'IZ10002', '2017-01-23', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:00', '2017-01-28 15:02:00'),
(19, 'IZ10002', '2017-01-24', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:00', '2017-01-28 15:02:00'),
(20, 'IZ10002', '2017-01-25', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:01', '2017-01-28 15:02:01'),
(21, 'IZ10002', '2017-01-26', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:01', '2017-01-28 15:02:01'),
(22, 'IZ10002', '2017-01-27', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:01', '2017-01-28 15:02:01'),
(23, 'IZ10002', '2017-01-02', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:19', '2017-01-28 15:02:19'),
(24, 'IZ10002', '2017-01-03', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:19', '2017-01-28 15:02:19'),
(25, 'IZ10002', '2017-01-04', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:19', '2017-01-28 15:02:19'),
(26, 'IZ10002', '2017-01-11', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:19', '2017-01-28 15:02:19'),
(27, 'IZ10002', '2017-01-13', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:19', '2017-01-28 15:02:19'),
(28, 'IZ10002', '2017-01-16', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:19', '2017-01-28 15:02:19'),
(29, 'IZ10002', '2017-01-17', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(30, 'IZ10002', '2017-01-18', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(31, 'IZ10002', '2017-01-19', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(32, 'IZ10002', '2017-01-20', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(33, 'IZ10002', '2017-01-30', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(34, 'IZ10002', '2017-01-31', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(35, 'IZ10003', '2017-01-02', 8, 'Absent', 1, 'test tetst', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(36, 'IZ10003', '2017-01-03', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(37, 'IZ10003', '2017-01-04', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(38, 'IZ10003', '2017-01-11', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(39, 'IZ10003', '2017-01-13', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(40, 'IZ10003', '2017-01-16', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:20', '2017-01-28 15:02:20'),
(41, 'IZ10003', '2017-01-17', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(42, 'IZ10003', '2017-01-18', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(43, 'IZ10003', '2017-01-19', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(44, 'IZ10003', '2017-01-20', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(45, 'IZ10003', '2017-01-23', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(46, 'IZ10003', '2017-01-24', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(47, 'IZ10003', '2017-01-25', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(48, 'IZ10003', '2017-01-26', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(49, 'IZ10003', '2017-01-27', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(50, 'IZ10003', '2017-01-30', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(51, 'IZ10003', '2017-01-31', 8, 'Present', 0, '', 1, 1, '2017-01-28 20:32:21', '2017-01-28 15:02:21'),
(52, 'IZ10002', '2017-02-13', 7, 'Absent', 0, '', 1, 1, '2017-02-13 14:19:23', '2017-02-13 08:49:23'),
(53, 'IZ10003', '2017-02-13', 7, 'Absent', 0, '', 1, 1, '2017-02-13 14:19:23', '2017-02-13 08:49:23'),
(54, 'IZ10004', '2017-02-13', 7, 'Absent', 0, '', 1, 1, '2017-02-13 14:19:23', '2017-02-13 08:49:23'),
(55, 'IZ10005', '2017-02-13', 7, 'Absent', 0, '', 1, 1, '2017-02-13 14:19:23', '2017-02-13 08:49:23'),
(56, 'IZ10006', '2017-02-13', 7, 'Absent', 0, '', 1, 1, '2017-02-13 14:19:23', '2017-02-13 08:49:23'),
(57, 'IZ10007', '2017-02-13', 7, 'Absent', 0, '', 1, 1, '2017-02-13 14:19:23', '2017-02-13 08:49:23'),
(58, 'IZ10008', '2017-02-13', 7, 'Absent', 0, '', 1, 1, '2017-02-13 14:19:23', '2017-02-13 08:49:23'),
(59, 'IZ10009', '2017-02-13', 7, 'Absent', 0, '', 1, 1, '2017-02-13 14:19:24', '2017-02-13 08:49:24'),
(60, 'IZ10010', '2017-02-13', 7, 'Absent', 0, '', 1, 1, '2017-02-13 14:19:24', '2017-02-13 08:49:24'),
(61, 'IZ10011', '2017-02-13', 7, 'Absent', 0, '', 1, 1, '2017-02-13 14:19:24', '2017-02-13 08:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `status`, `created_date`, `updated_date`) VALUES
(1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 1, '1', '2016-12-27 00:00:00', '2016-12-27 16:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

CREATE TABLE IF NOT EXISTS `working_days` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `working_days`
--

INSERT INTO `working_days` (`id`, `name`, `status`) VALUES
(1, 'Monday', '1'),
(2, 'Tuesday', '1'),
(3, 'Wednesday', '1'),
(4, 'Thursday', '1'),
(5, 'Friday', '1'),
(6, 'Saturday', '1'),
(7, 'Sunday', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `pp_number` (`id`);

--
-- Indexes for table `employee_note`
--
ALTER TABLE `employee_note`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_type`
--
ALTER TABLE `org_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_titles`
--
ALTER TABLE `page_titles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_access`
--
ALTER TABLE `role_access`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_days`
--
ALTER TABLE `working_days`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `employee_note`
--
ALTER TABLE `employee_note`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `org_type`
--
ALTER TABLE `org_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `page_titles`
--
ALTER TABLE `page_titles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `working_days`
--
ALTER TABLE `working_days`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
