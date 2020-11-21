-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 08:36 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(100) NOT NULL,
  `announcement` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `announcement`) VALUES
(3, 'Tomorrow is a holiday!');

-- --------------------------------------------------------

--
-- Table structure for table `attdn`
--

CREATE TABLE `attdn` (
  `student_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `class_date` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attdn`
--

INSERT INTO `attdn` (`student_id`, `name`, `class_date`, `status`, `subject`) VALUES
('RA1711003010356', 'Jaywrat', '2020-10-31', 'Present', 'Web Programming'),
('RA1711003010400', 'Himanshu', '2020-10-31', 'Present', 'Web Programming'),
('RA1711003010330', 'Akshaan', '2020-10-31', 'Absent', 'Web Programming'),
('RA1711003010356', 'Jaywrat', '2020-10-31', 'Present', 'Theory of Computation'),
('RA1711003010400', 'Himanshu', '2020-10-31', 'Absent', 'Theory of Computation'),
('RA1711003010330', 'Akshaan', '2020-10-31', 'Present', 'Theory of Computation');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pswd` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `fname`, `lname`, `email`, `pswd`, `subject`) VALUES
(1, 'John', 'Singh', 'lorem@ipsum.com', '4122ea4f5490094a33d7cdba65136cf8', 'Theory of Computation'),
(2, 'Mark', 'Zucc', 'mark@gmail.com', '4122ea4f5490094a33d7cdba65136cf8', 'Web Programming');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`fname`, `lname`, `email`, `pswd`, `batch`, `branch`, `gender`, `regno`, `id`) VALUES
('Jaywrat', 'Singh', 'js5231@srmist.edu.in', '4122ea4f5490094a33d7cdba65136cf8', '1', 'cse', 'male', 'RA1711003010356', 3),
('Himanshu', 'Rattan', 'himanshu@gmail.com', '4122ea4f5490094a33d7cdba65136cf8', '1', 'CSE', 'male', 'RA1711003010400', 5),
('Akshaan', 'Khanna', 'akshaan@gmail.com', '4122ea4f5490094a33d7cdba65136cf8', '1', 'CSE', 'male', 'RA1711003010330', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
