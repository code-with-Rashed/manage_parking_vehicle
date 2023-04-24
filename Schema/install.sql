-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 08:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `username`, `password`) VALUES
(1, 'Rashed islam', 'Rashed@gmail.com', '01921083421', 'admin', '$2y$10$7khojr2Xm3sFSsIcGHU2HuU/NaNEW5QwZv7bcgUjx7XkZR3V7RA.2');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `parking_number` int(11) NOT NULL,
  `vehicle_category` int(11) NOT NULL,
  `vehicle_company` varchar(200) NOT NULL,
  `registration_number` varchar(100) NOT NULL,
  `owner_name` varchar(60) NOT NULL,
  `owner_contact` varchar(15) NOT NULL,
  `vehicle_intime` varchar(50) NOT NULL,
  `vehicle_outtime` varchar(50) DEFAULT NULL,
  `parking_charges` int(11) DEFAULT NULL,
  `vehicle_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `parking_number`, `vehicle_category`, `vehicle_company`, `registration_number`, `owner_name`, `owner_contact`, `vehicle_intime`, `vehicle_outtime`, `parking_charges`, `vehicle_status`) VALUES
(1, 736960596, 9, 'YAMAHA', 'DHAKA -A 103', 'Rashed alam', '01860497831', '2023-04-04 03:14 PM', '2023-04-05 11:08 AM', 1990, 0),
(2, 593408277, 8, 'BD BICYCLE', 'CY - 123', 'Mujahid islam', '01921042138', '2023-04-04 03:15 PM', '2023-04-05 11:08 AM', 199, 0),
(4, 531715840, 11, 'TATA', 'BD -  502', 'Rahat islam', '01537597063', '2023-04-04 03:17 PM', '2023-04-05 11:08 AM', 9926, 0),
(5, 645541161, 8, 'BMW', 'N - 101', 'Noman ahmed', '01537123456', '2023-04-05 11:10 AM', '2023-04-10 04:12 PM', 1251, 0),
(6, 703592095, 11, 'VOLVO', 'BD - ALL - 194', 'Abu Darda', '01537597063', '2023-04-10 03:41 PM', NULL, NULL, 1),
(7, 279416311, 16, 'Mahendra', 'BD - METRO - 404', 'Affan shek', '01811180982', '2023-04-14 11:32 AM', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_category`
--

CREATE TABLE `vehicle_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `parking_charge` int(11) NOT NULL,
  `category_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_category`
--

INSERT INTO `vehicle_category` (`id`, `category_name`, `parking_charge`, `category_status`) VALUES
(8, 'Bicycle', 10, 1),
(9, 'Motor Cycle', 100, 1),
(10, 'Texi', 200, 1),
(11, 'Truck', 500, 1),
(16, 'Pickup', 400, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_category` (`vehicle_category`);

--
-- Indexes for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_category`
--
ALTER TABLE `vehicle_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`vehicle_category`) REFERENCES `vehicle_category` (`id`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`vehicle_category`) REFERENCES `vehicle_category` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
