-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2016 at 07:17 অপরাহ্ণ
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `ID` int(11) NOT NULL,
  `Assignment_ID` int(11) NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Topic` varchar(64) NOT NULL,
  `fLink` tinyint(1) NOT NULL,
  `Problem` varchar(25000) NOT NULL,
  `rLink` tinyint(1) NOT NULL,
  `Resource_Link` varchar(25000) NOT NULL,
  `Starting_Time` varchar(1024) NOT NULL,
  `Ending_Time` varchar(1024) NOT NULL,
  `Sets` int(11) NOT NULL,
  `Set_ID` int(11) NOT NULL,
  `nVariable` int(11) NOT NULL,
  `Variable` varchar(1024) NOT NULL,
  `Ans` varchar(1024) NOT NULL,
  `Password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`ID`, `Assignment_ID`, `Teacher_ID`, `Name`, `Topic`, `fLink`, `Problem`, `rLink`, `Resource_Link`, `Starting_Time`, `Ending_Time`, `Sets`, `Set_ID`, `nVariable`, `Variable`, `Ans`, `Password`) VALUES
(24, 9, 1, 'Assignment4', 'datacom', 1, 'solve this', 1, 'resource', '2016/01/01 00:00', '2016/01/01 00:00', 4, 1, 3, 'variable1 = 170 variable2 = 2 variable3 = 3 ', '123', '456'),
(25, 9, 1, 'Assignment4', 'datacom', 1, 'solve this', 1, 'resource', '2016/01/01 00:00', '2016/01/01 00:00', 4, 2, 3, 'variable1 = 256 variable2 = 13 variable3 = 1 ', '234', '456'),
(26, 9, 1, 'Assignment4', 'datacom', 1, 'solve this', 1, 'resource', '2016/01/01 00:00', '2016/01/01 00:00', 4, 3, 3, 'variable1 = 294 variable2 = 2 variable3 = 3 ', '23', '456'),
(27, 9, 1, 'Assignment4', 'datacom', 1, 'solve this', 1, 'resource', '2016/01/01 00:00', '2016/01/01 00:00', 4, 4, 3, 'variable1 = 273 variable2 = 10 variable3 = 2 ', '19', '456');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `Row. No.` int(11) NOT NULL,
  `Assignment_ID` int(11) NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Student_Reg` varchar(1024) NOT NULL,
  `Set_ID` int(11) NOT NULL,
  `Student_Ans` varchar(1024) NOT NULL,
  `Ans` varchar(1024) NOT NULL,
  `Submission_Time` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Reg` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Department` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Name`, `Username`, `Reg`, `Password`, `Email`, `Department`) VALUES
(1, 'Mehedi Hasan Nirob', 'nirob', '2012331030', '4321', 'smh.nirob@gmail.com', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Department` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `Name`, `Username`, `Password`, `Email`, `Department`) VALUES
(1, 'Jack London', 'jack', '1234', 'jacklondon@gmail.com', 'CSE'),
(2, 'abc def', 'abc', '12', 'abc@gmail.com', 'EEE'),
(3, 'teacher1', 't1', '1', 't1@yahoo.com', 'GEB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`Row. No.`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `Row. No.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
