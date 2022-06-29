-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2022 at 02:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carparking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` char(30) DEFAULT NULL,
  `pass` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'gazi@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `carowner`
--

CREATE TABLE `carowner` (
  `id` int(10) NOT NULL,
  `firstname` char(30) DEFAULT NULL,
  `lastname` char(30) DEFAULT NULL,
  `gender` char(6) DEFAULT NULL,
  `email` char(40) DEFAULT NULL,
  `pass` char(40) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `car` char(15) DEFAULT NULL,
  `loc` char(60) DEFAULT NULL,
  `img` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carowner`
--

INSERT INTO `carowner` (`id`, `firstname`, `lastname`, `gender`, `email`, `pass`, `phone`, `car`, `loc`, `img`) VALUES
(2, 'Mehedi', 'Hasan', 'Male', 'mehedi@pmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '+8801704526324', 'Ga327180', NULL, NULL),
(5, 'Sajib', 'Mia', 'Male', 'sajib@pmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '01673898323', '1234', NULL, NULL),
(6, 'Rownok', 'Mahbub', 'Male', 'rownok@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '013214982347', '123123', NULL, NULL),
(7, 'Rownok', 'Mahbub2', 'Male', 'rownok@pmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '12345678', 'Ga327181', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parkingowner`
--

CREATE TABLE `parkingowner` (
  `id` int(10) NOT NULL,
  `firstname` char(30) DEFAULT NULL,
  `lastname` char(30) DEFAULT NULL,
  `gender` char(6) DEFAULT NULL,
  `email` char(40) DEFAULT NULL,
  `pass` char(40) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `loc` char(60) DEFAULT NULL,
  `nid` char(40) NOT NULL,
  `occ` char(30) NOT NULL,
  `img` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkingowner`
--

INSERT INTO `parkingowner` (`id`, `firstname`, `lastname`, `gender`, `email`, `pass`, `phone`, `loc`, `nid`, `occ`, `img`) VALUES
(1, 'Rohomot', 'Mia', 'Male', 'rohomot@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '12345', 'DMD 2', '', '0', NULL),
(2, 'Mehedi', 'Hasan', 'Male', 'mehedi@pmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '+8801704526324', 'Mohammadpur', '1232123232', 'Student', NULL),
(3, 'Navely', 'Hossain', 'Female', 'navely@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '32331231231', 'DMD', '5323234331', 'Model', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parkingspace`
--

CREATE TABLE `parkingspace` (
  `id` int(6) NOT NULL,
  `ownerid` int(6) NOT NULL,
  `district` varchar(15) NOT NULL,
  `area` varchar(20) NOT NULL,
  `road1` varchar(30) NOT NULL,
  `road2` varchar(30) DEFAULT NULL,
  `house` varchar(10) NOT NULL,
  `spacenum` int(3) NOT NULL,
  `rent` int(4) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parkingspace`
--

INSERT INTO `parkingspace` (`id`, `ownerid`, `district`, `area`, `road1`, `road2`, `house`, `spacenum`, `rent`, `img`) VALUES
(1, 2, 'Dhaka', 'Dhanmondi', '9A', '', '45', 8, 100, 'img/parking/Dhanmondi12-A45.jpg'),
(2, 2, 'Dhaka', 'Gulshan-2', '131', '', '122', 2, 30, ''),
(3, 2, 'Dhaka', 'Mohammadpur', 'Adabor', '1', '273', 2, 200, ''),
(4, 2, 'Dhaka', 'Mirpur-10', '2', '', '22', 6, 50, ''),
(7, 2, 'Dhaka', 'North Badda', '5', '', '23', 3, 60, ''),
(12, 2, 'Dhaka', 'Mohammadpur', 'Ring Road', '', '22', 4, 40, 'img/parking/MohammadpurRing Road22.jpg'),
(14, 2, 'Dhaka', 'Banani', '11', '', '9', 10, 70, 'img/parking/Banani119.jpg'),
(15, 2, 'Dhaka', 'Dhanmondi', '8A', '', '32', 1, 100, 'img/parking/Dhanmondi8A32.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carowner`
--
ALTER TABLE `carowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkingowner`
--
ALTER TABLE `parkingowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkingspace`
--
ALTER TABLE `parkingspace`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownerid` (`ownerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carowner`
--
ALTER TABLE `carowner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parkingowner`
--
ALTER TABLE `parkingowner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parkingspace`
--
ALTER TABLE `parkingspace`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parkingspace`
--
ALTER TABLE `parkingspace`
  ADD CONSTRAINT `parkingspace_ibfk_1` FOREIGN KEY (`ownerid`) REFERENCES `parkingowner` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
