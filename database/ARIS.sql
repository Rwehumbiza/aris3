-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 12, 2022 at 06:44 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ARIS`
--
CREATE DATABASE IF NOT EXISTS `ARIS` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ARIS`;

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
CREATE TABLE `Admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Belong`
--

DROP TABLE IF EXISTS `Belong`;
CREATE TABLE `Belong` (
  `CourseCode` varchar(10) DEFAULT NULL,
  `ModuleCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `College`
--

DROP TABLE IF EXISTS `College`;
CREATE TABLE `College` (
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

DROP TABLE IF EXISTS `Course`;
CREATE TABLE `Course` (
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `DepartmentCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

DROP TABLE IF EXISTS `Department`;
CREATE TABLE `Department` (
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `CollegeCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Lecturer`
--

DROP TABLE IF EXISTS `Lecturer`;
CREATE TABLE `Lecturer` (
  `IDNo` varchar(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `profilepic` varchar(20) DEFAULT NULL,
  `salary` varchar(10) DEFAULT NULL,
  `DepatmentCode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Managers`
--

DROP TABLE IF EXISTS `Managers`;
CREATE TABLE `Managers` (
  `DepartmentCode` varchar(10) DEFAULT NULL,
  `ManagerID` varchar(20) DEFAULT NULL,
  `startdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Module`
--

DROP TABLE IF EXISTS `Module`;
CREATE TABLE `Module` (
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `LecturerID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Principal`
--

DROP TABLE IF EXISTS `Principal`;
CREATE TABLE `Principal` (
  `IDNo` varchar(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `profilepic` varchar(20) DEFAULT NULL,
  `salary` varchar(10) DEFAULT NULL,
  `CollegeCode` varchar(20) DEFAULT NULL,
  `startdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Smartcard`
--

DROP TABLE IF EXISTS `Smartcard`;
CREATE TABLE `Smartcard` (
  `username` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `priviledge` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Smartcard`
--

INSERT INTO `Smartcard` (`username`, `password`, `priviledge`) VALUES
('adolf', '$2y$10$Qc0Rdg3LF0Z7OL1hmnSDfOqYaKXgFb2x/NYONBa9/wjVtqAT61Pma', 'admin'),
('Kelvin', '$2y$10$mfCcYB52aZkAJYGSmhJpWeEHH.Pe4trY8vXoDjVIf7aCMoAm1qmMC', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
CREATE TABLE `Student` (
  `RegNo` varchar(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `profilepic` varchar(20) DEFAULT NULL,
  `CourseCode` varchar(10) DEFAULT NULL,
  `fees` varchar(10) DEFAULT NULL,
  `GPA` decimal(1,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Study`
--

DROP TABLE IF EXISTS `Study`;
CREATE TABLE `Study` (
  `StudentID` varchar(20) DEFAULT NULL,
  `ModuleCode` varchar(10) DEFAULT NULL,
  `assignment` decimal(3,2) DEFAULT NULL,
  `test1` decimal(3,2) DEFAULT NULL,
  `test2` decimal(3,2) DEFAULT NULL,
  `UE` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `Belong`
--
ALTER TABLE `Belong`
  ADD KEY `course` (`CourseCode`),
  ADD KEY `ModuleCode` (`ModuleCode`);

--
-- Indexes for table `College`
--
ALTER TABLE `College`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`code`),
  ADD KEY `DepartmentCode` (`DepartmentCode`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`code`),
  ADD KEY `CollegeCode` (`CollegeCode`);

--
-- Indexes for table `Lecturer`
--
ALTER TABLE `Lecturer`
  ADD PRIMARY KEY (`IDNo`),
  ADD KEY `DepatmentCode` (`DepatmentCode`);

--
-- Indexes for table `Managers`
--
ALTER TABLE `Managers`
  ADD KEY `DepartmentCode` (`DepartmentCode`),
  ADD KEY `ManagerID` (`ManagerID`);

--
-- Indexes for table `Module`
--
ALTER TABLE `Module`
  ADD PRIMARY KEY (`code`),
  ADD KEY `LecturerID` (`LecturerID`);

--
-- Indexes for table `Principal`
--
ALTER TABLE `Principal`
  ADD PRIMARY KEY (`IDNo`),
  ADD KEY `CollegeCode` (`CollegeCode`);

--
-- Indexes for table `Smartcard`
--
ALTER TABLE `Smartcard`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`RegNo`),
  ADD KEY `CourseCode` (`CourseCode`);

--
-- Indexes for table `Study`
--
ALTER TABLE `Study`
  ADD KEY `student` (`StudentID`),
  ADD KEY `module` (`ModuleCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Belong`
--
ALTER TABLE `Belong`
  ADD CONSTRAINT `belong_ibfk_1` FOREIGN KEY (`ModuleCode`) REFERENCES `Module` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course` FOREIGN KEY (`CourseCode`) REFERENCES `Course` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Course`
--
ALTER TABLE `Course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`DepartmentCode`) REFERENCES `Department` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Department`
--
ALTER TABLE `Department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`CollegeCode`) REFERENCES `College` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Lecturer`
--
ALTER TABLE `Lecturer`
  ADD CONSTRAINT `lecturer_ibfk_1` FOREIGN KEY (`DepatmentCode`) REFERENCES `Department` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Managers`
--
ALTER TABLE `Managers`
  ADD CONSTRAINT `managers_ibfk_1` FOREIGN KEY (`DepartmentCode`) REFERENCES `Department` (`code`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `managers_ibfk_2` FOREIGN KEY (`ManagerID`) REFERENCES `Lecturer` (`IDNo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `Module`
--
ALTER TABLE `Module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`LecturerID`) REFERENCES `Lecturer` (`IDNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Principal`
--
ALTER TABLE `Principal`
  ADD CONSTRAINT `principal_ibfk_1` FOREIGN KEY (`CollegeCode`) REFERENCES `College` (`code`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`CourseCode`) REFERENCES `Course` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Study`
--
ALTER TABLE `Study`
  ADD CONSTRAINT `module` FOREIGN KEY (`ModuleCode`) REFERENCES `Module` (`code`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `student` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`RegNo`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
