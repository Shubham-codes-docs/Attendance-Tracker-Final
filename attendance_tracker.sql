-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 08:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`, `type`) VALUES
(1, 'admin@gmail.com', '$2y$10$UtFC5Js/Sy1ohjSDoW8Nnef.KtxAk5hXBTNHFj.EG1xXJ6WCw4l4.', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `adminmeet`
--

CREATE TABLE `adminmeet` (
  `id` int(11) NOT NULL,
  `meetName` varchar(255) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminmeet`
--

INSERT INTO `adminmeet` (`id`, `meetName`, `startTime`, `endTime`) VALUES
(42, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00'),
(44, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00'),
(45, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `totalAtten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `roll`, `email`, `branch`, `pass`, `totalAtten`) VALUES
(1, 'Shubham Tiwary', '2020UGME054', 'shubhut17@gmail.com', 'Mech', '1234', 0),
(2, 'Sshlok', '2020UGME040', 'sshlok21@gmail.com', 'Mech', '1234', 0),
(3, 'Naruto', '2020UCS011', 'naruto@gmail.com', 'Cs', '1234', 0),
(4, 'Nihal Sharma', '2020UCS012', 'nihal@gmail.com', 'Cs', '1234', 0),
(6, 'John', '2020UGEE012', 'john@gmail.com', 'Cs', '1234', 1),
(7, ' Jane Doe', '2020UGEE005', 'jane@gmail.com', 'ECE', '4567', 0),
(8, ' Peter', '2020UGME012', 'peter@email.com', 'Mech', '$2y$10$2jvqoDXfNBRWcsW9VZhwTerUYy1Og/GRlnTVfj3Y9UWoBzAqBDoj6', 4),
(9, 'MOHIT', '2020UGCS012', 'mohit@email.com', 'CSE', '$2y$10$T6t3TjgBHXetFOGkmfLuweEKK6DQ3SK5u3DwI/3Sab0nBmnjk.k06', 0),
(10, 'Tap', '2020UGEE042', 'tap@email.com', 'ECE', '$2y$10$LaUFhvqP4Vfk3wkbWRbhy.Dz8kVdQI/ED10ktMl2AHlGUkfV069m2', 0),
(11, 'Shahshank', '2020UGCS97', 'shashank@email.com', 'CSE', '$2y$10$1lyLHh9zAKvZibZ3ield/eGdjU1uFXTijNT2I/mv0VAbPejh.RMEa', 1),
(12, 'Pratibha', '2020UGME040', 'pratibha@gmail.com', 'ME', '$2y$10$OBEVWawSzhzVv3j8F4rS/udnIQSA6nFOiu9TS/6bqhMASHRFrgD4u', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usermeet`
--

CREATE TABLE `usermeet` (
  `meetid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `meetName` varchar(255) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `attend` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermeet`
--

INSERT INTO `usermeet` (`meetid`, `userid`, `meetName`, `startTime`, `endTime`, `attend`) VALUES
(42, 1, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', NULL),
(42, 2, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', NULL),
(42, 3, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', NULL),
(42, 4, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', NULL),
(42, 6, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', NULL),
(42, 7, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', NULL),
(42, 8, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', '1'),
(42, 9, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', NULL),
(44, 1, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(44, 2, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(44, 3, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(44, 4, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(44, 6, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(44, 7, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(44, 8, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', '1'),
(44, 9, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(45, 1, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(45, 2, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(45, 3, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(45, 4, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(45, 6, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(45, 7, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(45, 8, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', '1'),
(45, 9, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(42, 10, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', NULL),
(44, 10, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(45, 10, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(42, 11, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', NULL),
(44, 11, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(45, 11, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(42, 12, 'Meet on php', '2021-04-20 09:30:00', '2021-04-20 10:05:00', NULL),
(44, 12, 'Meet On Babel', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL),
(45, 12, 'Meet On File structuring', '2021-04-20 11:30:00', '2021-04-20 12:30:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminmeet`
--
ALTER TABLE `adminmeet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermeet`
--
ALTER TABLE `usermeet`
  ADD KEY `meetid` (`meetid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminmeet`
--
ALTER TABLE `adminmeet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
