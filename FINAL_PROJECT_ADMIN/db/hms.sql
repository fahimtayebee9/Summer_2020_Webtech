-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 08:14 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cookbook`
--

CREATE TABLE `cookbook` (
  `id` int(11) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `process` varchar(1000) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `itemName` varchar(200) NOT NULL,
  `chefId` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cookbook`
--

INSERT INTO `cookbook` (`id`, `ingredients`, `process`, `picture`, `itemName`, `chefId`, `status`) VALUES
(4, 'fgggggggggggggg    		', ' seeeeeeeeeee', 'users.PNG', 'awffffff', 9, 'requested'),
(5, 'potato', 'pahihdffhiwfif', 'companies.PNG', 'porota', 0, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `empfeedback`
--

CREATE TABLE `empfeedback` (
  `id` int(11) NOT NULL,
  `rating` int(15) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `empId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empfeedback`
--

INSERT INTO `empfeedback` (`id`, `rating`, `comment`, `empId`) VALUES
(1, 8, 'hdgbsfgbd', 12);

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(11) NOT NULL,
  `balance` int(30) NOT NULL,
  `bonus` int(30) NOT NULL,
  `rating` int(15) NOT NULL,
  `role` varchar(10) NOT NULL,
  `salary` int(30) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `empschedule`
--

CREATE TABLE `empschedule` (
  `date` varchar(10) NOT NULL,
  `startTime` varchar(6) NOT NULL,
  `endTime` varchar(6) NOT NULL,
  `workingHour` int(15) NOT NULL,
  `id` int(11) NOT NULL,
  `empId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empschedule`
--

INSERT INTO `empschedule` (`date`, `startTime`, `endTime`, `workingHour`, `id`, `empId`) VALUES
('05/05/2019', '07:00 ', '12:00 ', 19, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE `foodorder` (
  `id` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `price` int(5) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodorder`
--

INSERT INTO `foodorder` (`id`, `itemName`, `quantity`, `picture`, `price`, `status`) VALUES
(1, 'ttt', 1, 'aff.jpg', 34, 'processing'),
(2, 'tala', 3, 'jash.jpg', 56, 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `picture` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product`, `amount`, `price`, `picture`) VALUES
(1, 'tto', 500, 50, 'gsdaf.jpg'),
(2, 'tgtt', 100, 50, 'final3.jpg'),
(3, 'bfd', 111, 50, 'hotel3.jpg'),
(4, 'fgg', 200, 50, 'hotel3.jpg'),
(5, 'hd', 160, 90, 'final4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `id` int(10) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `position` varchar(10) NOT NULL,
  `cv_file` varchar(50) NOT NULL,
  `expected_salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roomservice`
--

CREATE TABLE `roomservice` (
  `id` int(10) NOT NULL,
  `roomNumber` int(10) NOT NULL,
  `service` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomservice`
--

INSERT INTO `roomservice` (`id`, `roomNumber`, `service`) VALUES
(1, 1203, 'gvfybeedney fg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cookbook`
--
ALTER TABLE `cookbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empfeedback`
--
ALTER TABLE `empfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empschedule`
--
ALTER TABLE `empschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodorder`
--
ALTER TABLE `foodorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomservice`
--
ALTER TABLE `roomservice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cookbook`
--
ALTER TABLE `cookbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `empfeedback`
--
ALTER TABLE `empfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `empschedule`
--
ALTER TABLE `empschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foodorder`
--
ALTER TABLE `foodorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomservice`
--
ALTER TABLE `roomservice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
