-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 04:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeorge`
--
CREATE DATABASE IF NOT EXISTS `jeorge` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jeorge`;

-- --------------------------------------------------------

--
-- Table structure for table `online_order_tbl`
--

CREATE TABLE `online_order_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `image` longblob NOT NULL,
  `paymentRef` varchar(255) NOT NULL,
  `orders` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`orders`)),
  `total` decimal(10,2) NOT NULL,
  `transactionRef` varchar(255) NOT NULL,
  `date_Created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_order_tbl`
--

INSERT INTO `online_order_tbl` (`id`, `name`, `address`, `email`, `contact`, `image`, `paymentRef`, `orders`, `total`, `transactionRef`, `date_Created`) VALUES
(1, 'John Joshua Lozada', '96 Congressional Road Sitio 3', 'johnjoshualozada@gmail.com', '09392918404', 0x4d7a4d794f4463334f544530587a63794e4445334d6a59304f5449304f44637a4f5638324e6a63784e7a6b324d5467784d44677a4d544d314d544d3058323475616e426e, '23342', '{\"items\":[{\"name\":\"RED VELVET\",\"price\":165,\"quantity\":1},{\"name\":\"TIRAMISU\",\"price\":230,\"quantity\":1}]}', 495.00, '85044', '2025-02-11 14:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `reservations_tbl`
--

CREATE TABLE `reservations_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `time` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `number_of_people` int(2) NOT NULL,
  `cp_number` varchar(10) NOT NULL,
  `email_address` varchar(25) NOT NULL,
  `transactionRef` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations_tbl`
--

INSERT INTO `reservations_tbl` (`id`, `name`, `time`, `date`, `number_of_people`, `cp_number`, `email_address`, `transactionRef`) VALUES
(15, 'John Joshua Lozada', '12:00 PM', '2025-02-10', 2, '0939291840', 'johnjoshualozada@gmail.co', ''),
(16, 'John Joshua Lozada', '2:00 PM', '2025-02-10', 5, '0939291840', 'johnjoshualozada@gmail.co', ''),
(17, 'John Joshua Lozada', '12:00 PM', '2025-02-10', 5, '0939291840', 'johnjoshualozada@gmail.co', ''),
(18, 'John Joshua Lozada', '4:00 PM', '2025-02-10', 2, '0939291840', 'johnjoshualozada@gmail.co', ''),
(19, 'John Joshua Lozada', '4:00 PM', '2025-02-10', 4, '0939291840', 'johnjoshualozada@gmail.co', ''),
(20, 'John Joshua Lozada', '6:00 PM', '2025-02-10', 2, '0939291840', 'johnjoshualozada@gmail.co', ''),
(21, 'John Joshua Lozada', '12:00 PM', '2025-02-11', 2, '0939291840', 'johnjoshualozada@gmail.co', ''),
(22, 'John Joshua Lozada', '2:00 PM', '2025-02-11', 5, '0939291840', 'johnjoshualozada@gmail.co', ''),
(23, 'John Joshua Lozada', '4:00 PM', '2025-02-11', 5, '0939291840', 'johnjoshualozada@gmail.co', ''),
(24, 'John Joshua Lozada', '6:00 PM', '2025-02-11', 2, '0939291840', 'johnjoshualozada@gmail.co', '#RSV825637'),
(25, 'John Joshua Lozada', '8:00 PM', '2025-02-11', 24, '0939291840', 'johnjoshualozada@gmail.co', '#RSV452355'),
(26, 'John Joshua Lozada', '12:00 PM', '2025-02-11', 2, '0939291840', 'johnjoshualozada@gmail.co', '#RSV255995'),
(27, 'John Joshua Lozada', '12:00 PM', '2025-02-11', 20, '0939291840', 'johnjoshualozada@gmail.co', '#RSV718220');

-- --------------------------------------------------------

--
-- Table structure for table `reservations_with_adv_order_tbl`
--

CREATE TABLE `reservations_with_adv_order_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `people` int(2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `paymentRef` varchar(255) NOT NULL,
  `orders` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`orders`)),
  `total` decimal(10,2) NOT NULL,
  `transactionRef` varchar(255) NOT NULL,
  `image` longblob NOT NULL,
  `date_Created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations_with_adv_order_tbl`
--

INSERT INTO `reservations_with_adv_order_tbl` (`id`, `name`, `date`, `time`, `people`, `email`, `contact`, `message`, `paymentRef`, `orders`, `total`, `transactionRef`, `image`, `date_Created`) VALUES
(3, 'John Joshua Lozada', '2025-02-11', '4:00 PM', 2, 'johnjoshualozada@gmail.com', '0939291840', ' test', 'asdasd', '{\"items\":[{\"name\":\"RED VELVET\",\"price\":165,\"quantity\":1},{\"name\":\"TIRAMISU\",\"price\":230,\"quantity\":1}]}', 395.00, '#RSV138730', 0x4d7a4d794f4463334f544530587a63794e4445334d6a59304f5449304f44637a4f5638324e6a63784e7a6b324d5467784d44677a4d544d314d544d3058323475616e426e, '2025-02-11 13:15:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `online_order_tbl`
--
ALTER TABLE `online_order_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations_tbl`
--
ALTER TABLE `reservations_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations_with_adv_order_tbl`
--
ALTER TABLE `reservations_with_adv_order_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `online_order_tbl`
--
ALTER TABLE `online_order_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations_tbl`
--
ALTER TABLE `reservations_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reservations_with_adv_order_tbl`
--
ALTER TABLE `reservations_with_adv_order_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
