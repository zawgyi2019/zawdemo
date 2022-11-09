-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2021 at 02:53 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `peacook`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(50) NOT NULL,
  `catimg` varchar(150) DEFAULT NULL,
  `catparent` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `catname`, `catimg`, `catparent`) VALUES
(1, 'Breakfast', 'mo cup.png', ''),
(3, 'Snack', 'snack.png', ''),
(4, 'Lunch', 'lunch.png', ''),
(6, 'Dinner', 'dinner.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cus_ID` int(11) NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(30) NOT NULL,
  `cus_mail` varchar(40) NOT NULL,
  `cus_pw` varchar(16) NOT NULL,
  `cus_gen` varchar(11) NOT NULL,
  `cus_ph` varchar(25) NOT NULL,
  `cus_address` varchar(200) NOT NULL,
  PRIMARY KEY (`cus_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_ID`, `cus_name`, `cus_mail`, `cus_pw`, `cus_gen`, `cus_ph`, `cus_address`) VALUES
(1, 'mgmg', 'mgmg@gmail.com', '1234', 'Male', '0997547555', 'Tha Mine, Mayangone'),
(2, 'Htun Htun', 'htun@gmail.com', '5678', 'Male', '094588776622', 'Panhlaing Road, Alone Tsp;'),
(4, 'soe', 'soe@gmail.com', 'soe', 'Female', '0945228222', 'hlaing'),
(5, 'hla', 'hla@gmail.com', 'hla', 'Female', '09452245556', 'Thamine'),
(6, 'user', 'user01@gmail.com', '1234', 'Male', '09975472276', 'Thamine');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invo_no` int(11) NOT NULL AUTO_INCREMENT,
  `invo_time` varchar(30) NOT NULL,
  `cus_name` varchar(30) NOT NULL,
  `food_name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `payment_method` varchar(15) NOT NULL,
  `order_no` int(11) NOT NULL,
  `order_time` varchar(30) NOT NULL,
  `cus_ph` varchar(25) NOT NULL,
  `cus_address` varchar(200) NOT NULL,
  PRIMARY KEY (`invo_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invo_no`, `invo_time`, `cus_name`, `food_name`, `price`, `amount`, `total_cost`, `payment_method`, `order_no`, `order_time`, `cus_ph`, `cus_address`) VALUES
(1, '02/11/2020-05:41 PM', 'mgmg', 'á€•á€²á€•á€œá€¬á€á€¬', 600, 2, 1200, 'Cash', 1, '31/10/2020-06:44 PM', '0945776555', 'Alone Tsp;'),
(4, '02/11/2020-06:19 PM', 'mgmg', 'pepsi12', 850, 2, 1700, 'Cash', 6, '31/10/2020-10:40 PM', '0945776555', 'Alone Tsp;'),
(5, '11/11/2020-10:56 PM', 'soe', 'Shan Noodle', 1000, 2, 2000, 'Cash', 8, '11/11/2020-10:55 PM', '0945228222', 'hlaing'),
(7, '14/11/2020-07:21 PM', 'soe', 'Moint Hin Khar', 550, 2, 1100, 'WavePay', 9, '14/11/2020-07:19 PM', '0945228222', 'hlaing'),
(8, '14/11/2020-07:35 PM', 'hla', 'á€žá€˜á€±á€¬á€žá€®á€¸á€‘á€±á€¬á€„á€ºá€¸', 1100, 4, 4400, 'KPay', 10, '14/11/2020-07:33 PM', '09452245556', 'Thamine'),
(9, '19/12/2020-10:12 AM', 'user', 'á€á€±á€«á€€á€ºá€†á€½á€²á€žá€¯á€á€º', 500, 1, 500, 'Cash', 11, '19/12/2020-10:11 AM', '09975472276', 'Thamine');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE IF NOT EXISTS `order1` (
  `order_no` int(11) NOT NULL AUTO_INCREMENT,
  `cus_ids` int(11) NOT NULL,
  `food_ids` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tot_amt` int(11) NOT NULL,
  `tot_cost` int(11) NOT NULL,
  `pay_mth` varchar(30) NOT NULL,
  `order_time` varchar(50) NOT NULL,
  `cus_ph` varchar(50) NOT NULL,
  `cus_address` varchar(150) NOT NULL,
  `cond` varchar(25) NOT NULL,
  PRIMARY KEY (`order_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`order_no`, `cus_ids`, `food_ids`, `price`, `tot_amt`, `tot_cost`, `pay_mth`, `order_time`, `cus_ph`, `cus_address`, `cond`) VALUES
(1, 1, 22, 600, 2, 1200, 'Cash', '31/10/2020-06:44 PM', '0945776555', 'Alone Tsp;', 'received'),
(3, 1, 21, 1100, 3, 3300, 'Cash', '31/10/2020-06:49 PM', '0945776555', 'Alone Tsp;', 'pending'),
(4, 1, 20, 500, 3, 1500, 'Cash', '31/10/2020-06:50 PM', '0945776555', 'Alone Tsp;', 'pending'),
(5, 1, 23, 200, 4, 800, 'Cash', '31/10/2020-10:32 PM', '0945776555', 'Alone Tsp;', 'pending'),
(6, 1, 16, 850, 2, 1700, 'Cash', '31/10/2020-10:40 PM', '0945776555', 'Alone Tsp;', 'received'),
(7, 4, 22, 600, 2, 1200, 'Cash', '07/11/2020-05:49 PM', '0945228222', 'hlaing', 'pending'),
(8, 4, 19, 1000, 2, 2000, 'Cash', '11/11/2020-10:55 PM', '0945228222', 'hlaing', 'received'),
(9, 4, 18, 550, 2, 1100, 'WavePay', '14/11/2020-07:19 PM', '0945228222', 'hlaing', 'received'),
(10, 5, 21, 1100, 4, 4400, 'KPay', '14/11/2020-07:33 PM', '09452245556', 'Thamine', 'received'),
(11, 6, 20, 500, 1, 500, 'Cash', '19/12/2020-10:11 AM', '09975472276', 'Thamine', 'received');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `food_ID` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(40) NOT NULL,
  `category` varchar(15) NOT NULL,
  `food_img` varchar(150) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`food_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`food_ID`, `food_name`, `category`, `food_img`, `price`) VALUES
(1, 'tea', 'Breakfast', 'tea_0.jpg', 500),
(2, 'pepsi', 'Snack', 'pepsi01.png', 800),
(13, 'tea02', 'Snack', 'tea_0.jpg', 550),
(16, 'pepsi12', 'snack', 'pepsi01.png', 850),
(18, 'Moint Hin Khar', 'Breakfast', 'mo cup.png', 550),
(19, 'Shan Noodle', 'Snack', 'shan-noodle.png', 1000),
(20, 'á€á€±á€«á€€á€ºá€†á€½á€²á€žá€¯á€á€º', 'Snack', 'mm_noodle.png', 500),
(21, 'á€žá€˜á€±á€¬á€žá€®á€¸á€‘á€±á€¬á€„á€ºá€¸', 'Snack', 'papaya.jpg', 1100),
(22, 'á€•á€²á€•á€œá€¬á€á€¬', 'Breakfast', 'palartar.png', 600),
(23, 'á€¡á€®á€€á€¼á€¬á€€á€½á€±á€·', 'Breakfast', 'e-kyar.jpg', 200);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `emp_ID` varchar(5) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_mail` varchar(40) NOT NULL,
  `emp_pw` varchar(16) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `emp_marital_status` varchar(10) NOT NULL,
  `emp_nrc` varchar(20) NOT NULL,
  `emp_pos` varchar(25) NOT NULL,
  `emp_ph` varchar(25) NOT NULL,
  `emp_address` varchar(150) NOT NULL,
  PRIMARY KEY (`emp_ID`),
  UNIQUE KEY `emp_ID` (`emp_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`emp_ID`, `emp_name`, `emp_mail`, `emp_pw`, `emp_dob`, `emp_gender`, `emp_marital_status`, `emp_nrc`, `emp_pos`, `emp_ph`, `emp_address`) VALUES
('00001', 'zaw', 'zaw@gmail.com', '1234', '1992-03-26', 'male', 'single', '13/YASANA(N)102762', 'admin', '09420014180', 'No-65, U Aye-2 street, 16-ward, Hlaing Township, Yangon.'),
('00002', 'Kyaw Ye Ko', 'kyaw@gmail.com', 'kyaw', '1995-08-17', 'Male', 'Single', '8/MMS(N)254866', 'Manager', '09450014155', 'No324, Lan Thit Street, Mingalardon Township. Yangon'),
('00003', 'Kyar Nyo Theint', 'kyarnyo92@gmail.com', '3333', '1999-09-03', 'Female', 'Married', '12/LMN(N)254866', 'HR Manager', '09450014155', '   No.65, U Aye-2 Street, 16-ward, Hlaing Tsp; YAngon.'),
('00004', 'Moe Moe', 'moe', 'moe', '0000-00-00', 'Male', 'Single', '6/MLK(N)815776', 'Finance', '2969488335', 'Kyaik Wine'),
('00005', 'Thiha', 'thiha@gmail.com', '1234', '1990-06-08', 'Male', 'Married', '12/UMN(N)123459', 'Security', '09450014155', '  No-62, Thurhitha st; a-ward, North Oakkalar pa'),
('00006', 'admin', 'admin@gmail.com', '1234', '2005-06-08', 'Male', 'Single', '12/MAYAKA(N)123456', 'Admin', '09450014155', '8 mile');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
