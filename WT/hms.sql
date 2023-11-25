-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2023 at 04:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` bigint(20) NOT NULL,
  `pid` bigint(20) NOT NULL,
  `did` bigint(20) NOT NULL,
  `appointmentdate` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `additionalnote` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `pid`, `did`, `appointmentdate`, `status`, `additionalnote`) VALUES
(24, 6, 10, '2023-11-30 00:00:00', 'Confirmed', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctorinfo`
--

CREATE TABLE `doctorinfo` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` datetime NOT NULL,
  `bg` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `degree` varchar(200) NOT NULL,
  `specialist` varchar(100) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctorinfo`
--

INSERT INTO `doctorinfo` (`id`, `firstname`, `lastname`, `email`, `gender`, `dob`, `bg`, `address`, `degree`, `specialist`, `picture`, `password`) VALUES
(10, 'Sadmanur', 'Shishir', 'shishir@gmail.com', 'Male', '1999-11-12 00:00:00', 'B+', 'House no737, Collegegate, Konabari\r\nGazipur', 'MBBS', 'Heart', '387561692_1485135192270761_5649879971994904858_n.png', '1234'),
(11, 'Foysal', 'Rahman', 'foysal@gmail.com', 'Male', '1999-12-27 00:00:00', 'B+', 'Dhaka', 'FBBS', 'Brain', 'dictor1.jpg', '1234'),
(12, 'Ekramul', 'Nibir', 'ar0@gmail.com', 'Male', '2000-06-06 00:00:00', 'O+', 'Dhaka', 'MBBS', 'Eye', 'doctor3.jpg', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) NOT NULL,
  `pid` bigint(20) NOT NULL,
  `did` bigint(20) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `pid`, `did`, `feedback`) VALUES
(1, 6, 3, 'Very good doctor.');

-- --------------------------------------------------------

--
-- Table structure for table `patientinfo`
--

CREATE TABLE `patientinfo` (
  `pid` bigint(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `bg` varchar(20) NOT NULL,
  `dob` datetime NOT NULL,
  `password` varchar(64) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `phoneno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientinfo`
--

INSERT INTO `patientinfo` (`pid`, `firstname`, `lastname`, `email`, `gender`, `bg`, `dob`, `password`, `address`, `picture`, `phoneno`) VALUES
(2, 'Shadin', 'Rahman', 'sadin@gmail.com', 'Male', 'B+', '2013-06-04 00:00:00', '', 'Dhaka', '', 0),
(3, 'Foysal', 'Rahman', 'arfoysal0@gmail.com', 'male', '', '2001-10-22 00:00:00', '@Aa1234', 'Bashundhara ', '', 1821025154),
(9, 'Foysal', 'Rahman', 'arfoysal1@gmail.com', 'male', '', '2001-05-22 00:00:00', '@Aa123', 'Bashundhara ', 'Login.png', 1821025154);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` bigint(20) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  `DOB` datetime NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `picture` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `FirstName`, `LastName`, `gender`, `phoneno`, `DOB`, `Address`, `email`, `password`, `usertype`, `picture`) VALUES
(1, 'Ekramul', 'Nibir', 'Male', 216542156115, '2000-12-01 18:51:34', 'Dhaka', 'nibir@gmail.com', '1234', 'Admin', ''),
(3, 'Sadmanur', 'Shishir', 'Male', 2155185451, '0000-00-00 00:00:00', 'House no737, Collegegate, KonabariGazipur', 'shishir@gmail.com', '1234', 'Doctor', '387561692_1485135192270761_5649879971994904858_n.png'),
(4, 'Foysal', 'Rahman', 'Male', 0, '0000-00-00 00:00:00', 'Dhaka', 'foysal@gmail.com', '1234', 'Doctor', 'dictor1.jpg'),
(5, 'Ekramul', 'Nibir', 'Male', 0, '0000-00-00 00:00:00', 'Dhaka', 'ar0@gmail.com', '1234', 'Doctor', 'doctor3.jpg'),
(6, 'Shadin', 'Rahman', 'Male', 526316854515, '2013-06-04 00:00:00', 'Dhaka', 'sadin@gmail.com', '1234', 'Patient', ''),
(15, 'Foysal', 'Rahman', 'male', 1821025154, '2001-10-22 00:00:00', 'Bashundhara ', 'arfoysal0@gmail.com', '@Aa1234', 'Patient', ''),
(21, 'Foysal', 'Rahman', 'male', 1821025154, '2001-05-22 00:00:00', 'Bashundhara ', 'arfoysal1@gmail.com', '@Aa123', 'Patient', 'Login.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorinfo`
--
ALTER TABLE `doctorinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientinfo`
--
ALTER TABLE `patientinfo`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `doctorinfo`
--
ALTER TABLE `doctorinfo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patientinfo`
--
ALTER TABLE `patientinfo`
  MODIFY `pid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
