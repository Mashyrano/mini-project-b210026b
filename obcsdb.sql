-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2023 at 06:05 AM
-- Server version: 8.0.11
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obcsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dthapplication`
--

CREATE TABLE `dthapplication` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ApplicationID` int(11) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `DateofBirth` varchar(100) NOT NULL,
  `MaritalStatus` varchar(100) NOT NULL,
  `Occupation` varchar(100) NOT NULL,
  `PermanentAdd` varchar(100) NOT NULL,
  `DateofDeath` varchar(100) NOT NULL,
  `PlaceofDeath` varchar(100) NOT NULL,
  `CauseOfDeath` varchar(100) NOT NULL,
  `Certifier` varchar(100) NOT NULL,
  `Dateofapply` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dthapplication`
--

INSERT INTO `dthapplication` (`ID`, `UserID`, `ApplicationID`, `Gender`, `FullName`, `DateofBirth`, `MaritalStatus`, `Occupation`, `PermanentAdd`, `DateofDeath`, `PlaceofDeath`, `CauseOfDeath`, `Certifier`, `Dateofapply`, `Remark`, `Status`, `UpdationDate`) VALUES
(2, 5, 615524502, 'Male', 'Gabriel Goredema', '2003-06-30', 'Maried', 'Docter', 'Mbare', '2037-11-23', 'Chinhoyi ColdStream', 'Cancer', 'Chimbwido Tareedzera', '2023-05-25 23:52:13', 'Very Very Verified', 'Verified', NULL),
(3, 5, 849620491, 'Female', 'Abigail Trow', '2005-02-25', 'Maried', 'Flight Attendant', 'Hwedza', '2027-02-02', 'ChinaTown', 'Air Crash', 'Lindsay Bushu', '2023-05-26 08:37:09', NULL, NULL, NULL),
(6, 5, 569047087, 'Male', 'Gregory Gaba', '2016-01-06', 'Single', 'Soccer player', 'Mbizo', '2042-10-12', 'ChinaTown', 'Cholera', 'Kyla Rep', '2023-06-02 05:00:54', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(3, 'Linnon Mudamburi', 'Igwee', 773456223, 'mahupete@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2023-06-02 05:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblapplication`
--

CREATE TABLE `tblapplication` (
  `ID` int(10) NOT NULL,
  `UserID` int(5) NOT NULL,
  `ApplicationID` varchar(200) DEFAULT NULL,
  `DateofBirth` varchar(200) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `PlaceofBirth` varchar(200) DEFAULT NULL,
  `NameofFather` varchar(200) DEFAULT NULL,
  `NameOfMother` varchar(120) DEFAULT NULL,
  `PermanentAdd` mediumtext,
  `PostalAdd` mediumtext,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Dateofapply` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblapplication`
--

INSERT INTO `tblapplication` (`ID`, `UserID`, `ApplicationID`, `DateofBirth`, `Gender`, `FullName`, `PlaceofBirth`, `NameofFather`, `NameOfMother`, `PermanentAdd`, `PostalAdd`, `MobileNumber`, `Email`, `Dateofapply`, `Remark`, `Status`, `UpdationDate`) VALUES
(6, 5, '577047666', '2023-06-14', 'Male', 'Marshall Take', 'Bindura', 'T Ross', 'Elina', 'Chinhoye', 'pbag225', 772797021, 'shirano@gmail.com', '2023-05-15 23:54:06', 'T Ross haasi baba wemunhu', 'Rejected', '2023-05-15 23:56:40'),
(7, 5, '873630608', '2023-05-15', 'Female', 'Abigail Trow', 'Ruwa', 'Brian', 'Elina', 'Gweru', '1233 PBag ', 76366211, 'abintosh@gmail.com', '2023-05-25 23:54:34', 'I verify', 'Verified', '2023-05-26 09:21:28'),
(8, 5, '117129079', '1999-06-03', 'Male', 'takunda', 'Bindura', 'tafara', 'mercy', 'Harare', 'Bindura', 772797022, 'mahupete@gmail.com', '2023-05-27 07:04:44', 'Wanyanya kubara', 'Rejected', '2023-05-27 19:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext,
  `Password` varchar(200) NOT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Address`, `Password`, `RegDate`) VALUES
(3, 'Rahul ', 'Yadav', 4752632145, 'New Delhi India-110091', 'f925916e2754e5e03f75dd58a5733251', '2023-01-07 04:31:56'),
(4, 'Amita ', 'Singh', 789412536, 'Ghaziabad UP -201017', 'f925916e2754e5e03f75dd58a5733251', '2023-01-07 04:44:43'),
(5, 'Marshall', 'Taku', 772797021, 'Bindura', '81dc9bdb52d04dc20036dbd8313ed055', '2023-05-15 23:51:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dthapplication`
--
ALTER TABLE `dthapplication`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblapplication`
--
ALTER TABLE `tblapplication`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dthapplication`
--
ALTER TABLE `dthapplication`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblapplication`
--
ALTER TABLE `tblapplication`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
