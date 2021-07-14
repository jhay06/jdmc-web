-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2021 at 08:58 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmdcdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `prod_code` varchar(10) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_class` varchar(20) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`prod_code`, `prod_name`, `prod_class`, `prod_desc`, `prod_img`) VALUES
('001', 'Product 1', 'class1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'no-image.jpg'),
('002', 'Product 2', 'class2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'no-image.jpg'),
('003', 'Product 3', 'class3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'no-image.jpg'),
('004', 'Product 4', 'class3', 'This is Product 4. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'no-image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userinformation`
--

CREATE TABLE `tbl_userinformation` (
  `ID` int(5) NOT NULL,
  `EmployeeNo` varchar(10) DEFAULT NULL,
  `LastName` varchar(20) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `MiddleName` varchar(20) DEFAULT NULL,
  `ContactNumber` varchar(11) DEFAULT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `ProfileId` int(1) NOT NULL,
  `AffiliateId` int(1) DEFAULT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userinformation`
--

INSERT INTO `tbl_userinformation` (`ID`, `EmployeeNo`, `LastName`, `FirstName`, `MiddleName`, `ContactNumber`, `EmailAddress`, `ProfileId`, `AffiliateId`, `Username`, `Password`) VALUES
(1, '001', 'Amurao', 'Jordan', '', '', '', 1, 0, 'jordan.amurao', 'jordan123'),
(2, '002', 'De Guzman', 'Bernard Jesnic', '', '', '', 1, 0, 'bernard.deguzman', 'bernard123'),
(3, '003', 'Fadrigo', 'Ryan Allan', '', '', '', 1, 0, 'ryan.fadrigo', 'ryan123');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`username`, `password`, `user_type`) VALUES
('admin', 'admin123', 'admin'),
('dentist1', 'dentist123', 'dentist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`prod_code`);

--
-- Indexes for table `tbl_userinformation`
--
ALTER TABLE `tbl_userinformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
