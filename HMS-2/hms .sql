-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 04:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Ashwin', 'hashwin381@gmail.com', 'Ashwin', '2022-05-12 19:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `announcement_subject` varchar(250) NOT NULL,
  `announcement_text` text NOT NULL,
  `announcement_status` int(1) NOT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `announcement_subject`, `announcement_text`, `announcement_status`, `created_at`) VALUES
(75, 'Water Issue', 'No water for two days', 0, '2022-05-13'),
(76, 'Meeting', 'For increasing maintenance bill', 0, '2022-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(30) NOT NULL,
  `billing_date` date NOT NULL DEFAULT current_timestamp(),
  `member_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending,1=paid',
  `total_amount` double NOT NULL,
  `amount_payed` double NOT NULL,
  `amount_change` double NOT NULL,
  `invoice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `billing_date`, `member_id`, `status`, `total_amount`, `amount_payed`, `amount_change`, `invoice`) VALUES
(1, '2020-08-23', 2, 1, 9500, 10000, 500, ''),
(2, '2020-08-23', 1, 1, 8500, 10000, 1500, ''),
(3, '2020-09-23', 2, 0, 8000, 0, 0, ''),
(5, '2020-09-01', 1, 0, 6500, 0, 0, ''),
(5, '2020-08-23', 4, 1, 9500, 10000, 500, ''),
(6, '2020-08-23', 3, 1, 8500, 10000, 1500, ''),
(7, '2020-09-23', 4, 0, 8000, 0, 0, ''),
(8, '2020-09-01', 3, 0, 6500, 0, 0, ''),
(0, '2022-05-01', 1, 1, 2500, 2000, -500, '');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(30) NOT NULL,
  `billing_id` int(30) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1= block rent, 2= electricity,3=water',
  `reading` int(30) NOT NULL,
  `consumption` int(30) NOT NULL,
  `rate` double NOT NULL,
  `previous_reading` int(30) NOT NULL,
  `previous_consumption` int(30) NOT NULL,
  `amount` double NOT NULL,
  `previous_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `billing_id`, `type`, `reading`, `consumption`, `rate`, `previous_reading`, `previous_consumption`, `amount`, `previous_amount`) VALUES
(1, 1, 1, 0, 0, 5000, 0, 0, 5000, 5000),
(2, 1, 2, 100, 100, 15, 0, 0, 1500, 0),
(3, 1, 3, 300, 300, 10, 0, 0, 3000, 0),
(4, 2, 1, 0, 0, 3000, 0, 0, 3000, 3000),
(5, 2, 2, 300, 300, 15, 0, 0, 4500, 0),
(6, 2, 3, 100, 100, 10, 0, 0, 1000, 0),
(7, 3, 1, 0, 0, 5000, 0, 0, 5000, 5000),
(8, 3, 2, 100, 200, 15, 100, 100, 1500, 1),
(9, 3, 3, 150, 450, 10, 300, 300, 1500, 3),
(13, 5, 1, 0, 0, 3000, 0, 0, 3000, 3000),
(14, 5, 2, 100, 400, 15, 300, 300, 1500, 4),
(15, 5, 3, 200, 300, 10, 100, 100, 2000, 1),
(0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 2, 100, 500, 15, 100, 400, 1500, 1),
(0, 0, 3, 100, 400, 10, 200, 300, 1000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `email`, `password`, `address`, `phone`, `created_at`) VALUES
(1, 'Frederick J Baker', 'baker@gmail.com', 'password', '1488 Franklin Street', 2147483647, '2022-05-12 20:46:35'),
(2, 'Antonio Dominguez', 'ashwin@gmail.com', 'password', '3961 Sycamore Lake Road', 2147483647, '2022-05-12 20:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `registry`
--

CREATE TABLE `registry` (
  `id` int(11) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registry`
--

INSERT INTO `registry` (`id`, `person_name`, `created_at`) VALUES
(1, 'ramesh', '2022-05-13 10:32:20'),
(2, 'jayesh', '2022-05-13 10:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Baburao', 'baburao@gmail.com', 'password', '2022-05-12 21:01:59'),
(2, 'Ram', 'ram@gmail.com', 'password', '2022-05-12 21:01:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `registry`
--
ALTER TABLE `registry`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `person_name` (`person_name`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registry`
--
ALTER TABLE `registry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
