-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 19, 2020 at 10:04 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `net_banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary1`
--

DROP TABLE IF EXISTS `beneficiary1`;
CREATE TABLE IF NOT EXISTS `beneficiary1` (
  `benef_id` int(11) NOT NULL AUTO_INCREMENT,
  `benef_cust_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`benef_id`),
  UNIQUE KEY `benef_cust_id` (`benef_cust_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_no` (`phone_no`),
  UNIQUE KEY `account_no` (`account_no`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary1`
--

INSERT INTO `beneficiary1` (`benef_id`, `benef_cust_id`, `email`, `phone_no`, `account_no`) VALUES
(1, 3, 'jalltu@gmail.com', '4444444444', 1234567893),
(4, 4, 'brown.d@gmail.com', '6666666666', 1234567894),
(5, 2, 'fad.divya@gmail.com', '88888888', 1234567891),
(6, 5, 'ali_karan@gmail.com', '7777777777', 1234567892);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `aadhar_no` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `branch` varchar(30) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  `pin` int(4) DEFAULT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `aadhar_no` (`aadhar_no`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone_no` (`phone_no`),
  UNIQUE KEY `account_no` (`account_no`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `gender`, `dob`, `aadhar_no`, `email`, `phone_no`, `address`, `branch`, `account_no`, `pin`, `uname`, `pwd`) VALUES
(1, 'Tara', 'Shah', 'Female', '1994-11-28', 123456789, 'tara.s@gmail.com', '9999999999', 'Villa Parvaz, Rail Road, Jamnanagar - 110098', 'New Delhi', 1234567890, 1111, 'stara', 'P@ssw0rd'),
(2, 'Divya', 'Fadnavis', 'Other', '1994-10-11', 987654321, 'fad.divya@gmail.com', '88888888', 'B-108, Melapur, Ganga Vihar - 110076', 'New Delhi', 1234567891, 2222, 'divfad', 'J@nsev@div'),
(3, 'Tushar', 'Jalota', 'Male', '1995-02-03', 1263549873, 'jalltu@gmail.com', '4444444444', '12A/VK, Pawal Chowk - 400008', 'Jagdalpur', 1234567893, 4444, 'tushjal', 'tushar123'),
(4, 'Davies', 'Brown', 'Male', '1985-02-03', 1482961094, 'brown.d@gmail.com', '6666666666', 'C - 505, Brunei Road - 789537', 'Pune', 1234567894, 5555, 'dave', 'D@vebank1'),
(5, 'Karan', 'Ali', 'Male', '1995-02-03', 1234987610, 'ali_karan@gmail.com', '7777777777', '56-B, Maria Avenue - 560045', 'Goa', 1234567892, 3333, 'alik', 'G0aB@nk'),
(6, 'Parul', 'Das', 'Female', '2000-05-14', 1234982041, 'parul00@gmail.com', '5555555555', '12/90, Vishwas Nagar - 110041', 'New Delhi', 1234567895, 6666, 'paruld', 'B@nk!!!!!!');

-- --------------------------------------------------------

--
-- Table structure for table `passbook1`
--

DROP TABLE IF EXISTS `passbook1`;
CREATE TABLE IF NOT EXISTS `passbook1` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook1`
--

INSERT INTO `passbook1` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2020-10-01 22:18:36', 'Opening Balance', 0, 10000, 10000),
(2, '2020-10-02 18:49:26', 'Received from: Divya Fadnavis, A/C No: 1234567891', 0, 20000, 30000),
(3, '2020-10-02 21:02:32', 'Sent to: Karan Ali, A/C No: 1234567892', 10000, 0, 20000),
(4, '2020-10-05 20:11:33', 'Received from: Divya Fadnavis, A/C No: 1234567891', 0, 69000, 89000),
(5, '2020-10-18 17:00:35', 'Cash Deposit', 0, 2000000, 2089000),
(6, '2020-10-18 17:01:09', 'Sent to: Karan Ali, A/C No: 1234567892', 15000, 0, 2074000),
(7, '2020-10-18 17:02:29', 'Cash to Self', 25000, 0, 2049000),
(8, '2020-10-18 17:03:45', 'Sent to: Divya Fadnavis, A/C No: 1234567891', 50000, 0, 1999000),
(9, '2020-10-18 17:26:45', 'Received from: Divya Fadnavis, A/C No: 1234567891', 0, 6123, 2005123),
(10, '2020-10-19 09:22:38', 'Sent to: Tushar Jalota, A/C No: 1234567893', 100, 0, 2005023),
(11, '2020-10-19 09:35:33', 'Sent to: Tushar Jalota, A/C No: 1234567893', 100, 0, 2004923),
(12, '2020-10-19 09:36:24', 'Sent to: Tushar Jalota, A/C No: 1234567893', 100, 0, 2004823),
(13, '2020-10-19 09:36:49', 'Sent to: Davies Brown, A/C No: 1234567894', 1000, 0, 2003823),
(37, '2020-10-19 11:13:18', 'Sent to: Tushar Jalota, A/C No: 1234567893', 1234, 0, 2002589),
(38, '2020-10-19 11:14:01', 'Sent to: Divya Fadnavis, A/C No: 1234567891', 9876, 0, 1992713);

-- --------------------------------------------------------

--
-- Table structure for table `passbook2`
--

DROP TABLE IF EXISTS `passbook2`;
CREATE TABLE IF NOT EXISTS `passbook2` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook2`
--

INSERT INTO `passbook2` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2020-10-19 11:14:01', 'Received from: Tara Shah, A/C No: 1234567890', 0, 9876, 9876);

-- --------------------------------------------------------

--
-- Table structure for table `passbook3`
--

DROP TABLE IF EXISTS `passbook3`;
CREATE TABLE IF NOT EXISTS `passbook3` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook3`
--

INSERT INTO `passbook3` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2020-10-19 09:35:33', 'Received from: Tara Shah, A/C No: 1234567890', 0, 100, 2005123),
(2, '2020-10-19 09:36:24', 'Received from: Tara Shah, A/C No: 1234567890', 0, 100, 2005223),
(3, '2020-10-19 11:13:18', 'Received from: Tara Shah, A/C No: 1234567890', 0, 1234, 2006457);

-- --------------------------------------------------------

--
-- Table structure for table `passbook4`
--

DROP TABLE IF EXISTS `passbook4`;
CREATE TABLE IF NOT EXISTS `passbook4` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook4`
--

INSERT INTO `passbook4` (`trans_id`, `trans_date`, `remarks`, `debit`, `credit`, `balance`) VALUES
(1, '2020-10-19 09:36:49', 'Received from: Tara Shah, A/C No: 1234567890', 0, 1000, 1000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
