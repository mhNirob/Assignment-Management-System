-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2016 at 04:39 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
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
  `Problem` varchar(1024) NOT NULL,
  `Resource_Link` varchar(1024) NOT NULL,
  `Starting_Time` varchar(1024) NOT NULL,
  `Ending_Time` varchar(1024) NOT NULL,
  `Sets` int(11) NOT NULL,
  `Set_ID` int(11) NOT NULL,
  `Variable` varchar(50000) NOT NULL,
  `Ans` varchar(1024) NOT NULL,
  `Password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`ID`, `Assignment_ID`, `Teacher_ID`, `Name`, `Topic`, `Problem`, `Resource_Link`, `Starting_Time`, `Ending_Time`, `Sets`, `Set_ID`, `Variable`, `Ans`, `Password`) VALUES
(5, 2, 1, 'Sum 2 Number', 'summation', 'https://dropbox.com', 'https://www.mathsisfun.com/definitions/sum.html', '19/03/2016 12:00:00 am', '20/03/2016 12:00:00 am', 3, 1, 'x=3, y=4', '7', 'abc'),
(6, 2, 1, 'Sum 2 Number', 'summation', 'https://dropbox.com', 'https://www.mathsisfun.com/definitions/sum.html', '19/03/2016 12:00:00 am', '20/03/2016 12:00:00 am', 3, 2, 'x=5, y=6', '11', 'abc'),
(7, 2, 1, 'Sum 2 Number', 'summation', 'https://dropbox.com', 'https://www.mathsisfun.com/definitions/sum.html', '19/03/2016 12:00:00 am', '20/03/2016 12:00:00 am', 3, 3, 'x=7, y=8', '15', 'abc'),
(17, 3, 1, 'DotA 2', 'Creep Pulling', 'http://www.dota2.com', 'http://www.dotabuff.com', '11', '12', 1, 1, '32', '12', '123'),
(18, 4, 1, 'Habibur Rahman Shopon', 'Creep Pulling', 'http://www.dota2.com', 'http://www.dotabuff.com', '11', '12', 4, 1, '1', '1', '123'),
(19, 4, 1, 'Habibur Rahman Shopon', 'Creep Pulling', 'http://www.dota2.com', 'http://www.dotabuff.com', '11', '12', 4, 2, '2', '2', '123'),
(20, 4, 1, 'Habibur Rahman Shopon', 'Creep Pulling', 'http://www.dota2.com', 'http://www.dotabuff.com', '11', '12', 4, 3, '3', '3', '123'),
(21, 4, 1, 'Habibur Rahman Shopon', 'Creep Pulling', 'http://www.dota2.com', 'http://www.dotabuff.com', '11', '12', 4, 4, '4', '4', '123');

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

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`Row. No.`, `Assignment_ID`, `Teacher_ID`, `Student_ID`, `Student_Reg`, `Set_ID`, `Student_Ans`, `Ans`, `Submission_Time`) VALUES
(1, 2, 1, 1, '2012331030', 1, '1567', '7', '03/18/2016 04:19:10 pm'),
(2, 3, 1, 1, '2012331030', 1, '', '12', ''),
(3, 4, 1, 1, '2012331030', 1, '', '1', '');

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
(1, 'Jack London', 'jack', '1234', 'jacklondon@gmail.com', 'CSE');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `Row. No.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
