-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 10:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interviewresult`
--

-- --------------------------------------------------------

--
-- Table structure for table `chairmancred`
--

CREATE TABLE `chairmancred` (
  `ID` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chairmancred`
--

INSERT INTO `chairmancred` (`ID`, `Username`, `Password`) VALUES
('C1', 'c@1', 'c1'),
('C2', 'c@2', 'c2');

-- --------------------------------------------------------

--
-- Table structure for table `membercred`
--

CREATE TABLE `membercred` (
  `ID` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membercred`
--

INSERT INTO `membercred` (`ID`, `Username`, `Password`) VALUES
('M11', 'Sahuyash128@gmail.com', 'S11'),
('M12', 'm@12', 'm12'),
('M13', 'm@13', 'm13'),
('M21', 'm@21', 'm21'),
('M22', 'm@22', 'm22'),
('M23', 'm@23', 'm23');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `MemberId` varchar(10) NOT NULL,
  `PanelId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`MemberId`, `PanelId`) VALUES
('C1', 'P1'),
('C2', 'P2'),
('M11', 'P1'),
('M12', 'P1'),
('M13', 'P1'),
('M21', 'P2'),
('M22', 'P2'),
('M23', 'P2');

-- --------------------------------------------------------

--
-- Table structure for table `studentmarks`
--

CREATE TABLE `studentmarks` (
  `RollNo` varchar(20) NOT NULL,
  `M1` int(10) NOT NULL,
  `M2` int(10) NOT NULL,
  `M3` int(10) NOT NULL,
  `check1` varchar(10) NOT NULL,
  `check2` varchar(10) NOT NULL,
  `check3` varchar(10) NOT NULL,
  `PassedExam` varchar(30) DEFAULT NULL,
  `PanelId` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentmarks`
--

INSERT INTO `studentmarks` (`RollNo`, `M1`, `M2`, `M3`, `check1`, `check2`, `check3`, `PassedExam`, `PanelId`) VALUES
('19/BCS/100', 51, 35, 55, 'false', 'false', 'true', 'exam1', 'P1'),
('19/BCS/101', 40, 20, 40, 'true', 'true', 'true', 'exam1', 'P1'),
('19/BCS/102', 10, 5, 10, 'true', 'true', 'true', 'exam3', 'P1'),
('19/BCS/103', 10, 5, 10, 'true', 'true', 'true', 'exam2', 'P1'),
('19/BCS/104', 0, 0, 0, 'true', 'true', 'true', 'exam3', 'P1'),
('19/BCS/105', 0, 0, 0, 'true', 'true', 'true', 'exam1', 'P2'),
('19/BCS/106', 0, 0, 0, 'true', 'true', 'true', 'exam3', 'P2'),
('19/BCS/107', 0, 0, 0, 'true', 'true', 'true', 'exam3', 'P2'),
('19/BCS/108', 0, 0, 0, 'false', 'true', 'false', 'exam2', 'P2'),
('19/BCS/109', 0, 0, 0, 'true', 'true', 'true', 'exam1', 'P2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chairmancred`
--
ALTER TABLE `chairmancred`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- Indexes for table `membercred`
--
ALTER TABLE `membercred`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`MemberId`);

--
-- Indexes for table `studentmarks`
--
ALTER TABLE `studentmarks`
  ADD PRIMARY KEY (`RollNo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chairmancred`
--
ALTER TABLE `chairmancred`
  ADD CONSTRAINT `chairmancred_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `panel` (`MemberId`);

--
-- Constraints for table `membercred`
--
ALTER TABLE `membercred`
  ADD CONSTRAINT `membercred_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `panel` (`MemberId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
