-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2023 at 09:00 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfc-support`
--

-- --------------------------------------------------------

--
-- Table structure for table `raw_soy_sauce`
--

CREATE TABLE `raw_soy_sauce` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `reccord_date` date DEFAULT NULL,
  `tank_id` int(11) DEFAULT NULL,
  `simple_id` int(11) DEFAULT NULL,
  `ph` decimal(5,2) DEFAULT NULL,
  `nacl_t1` decimal(5,2) DEFAULT NULL,
  `nacl_t2` decimal(5,2) DEFAULT NULL,
  `nacl_t_avr` decimal(5,2) DEFAULT NULL,
  `nacl_p1` decimal(5,2) DEFAULT NULL,
  `nacl_p2` decimal(5,2) DEFAULT NULL,
  `nacl_p_avr` decimal(5,2) DEFAULT NULL,
  `tn_t1` decimal(5,2) DEFAULT NULL,
  `th_t2` decimal(5,2) DEFAULT NULL,
  `tn_t_avr` decimal(5,2) DEFAULT NULL,
  `tn_p1` decimal(5,2) DEFAULT NULL,
  `tn_p2` decimal(5,2) DEFAULT NULL,
  `th_p_avr` decimal(5,2) DEFAULT NULL,
  `cal` decimal(5,2) DEFAULT NULL,
  `alc_t` decimal(5,2) DEFAULT NULL,
  `alc_p` decimal(5,2) DEFAULT NULL,
  `ppm` decimal(5,2) DEFAULT NULL,
  `brix` decimal(5,2) DEFAULT NULL,
  `remask` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `simple`
--

CREATE TABLE `simple` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `simple`
--

INSERT INTO `simple` (`id`, `code`, `name`, `description`, `color`) VALUES
(1, 'KO', NULL, NULL, NULL),
(2, 'LS', NULL, NULL, NULL),
(3, 'TA-R', NULL, NULL, NULL),
(4, 'LS-OR-FT', NULL, NULL, NULL),
(5, 'TA-OR', NULL, NULL, NULL),
(6, 'TA-OR-FT', NULL, NULL, NULL),
(7, 'TA', NULL, NULL, NULL),
(8, 'TAMARI', NULL, NULL, NULL),
(9, 'LS-R', NULL, NULL, NULL),
(10, 'LEES', 'ตะกอน', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tank`
--

CREATE TABLE `tank` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tank`
--

INSERT INTO `tank` (`id`, `code`, `name`, `description`, `color`) VALUES
(1, 'S01', '', NULL, NULL),
(2, 'S01', '', NULL, NULL),
(3, 'S02', '', NULL, NULL),
(4, 'S04', '', NULL, NULL),
(5, 'S05', NULL, NULL, NULL),
(6, 'S06', NULL, NULL, NULL),
(7, 'S07', NULL, NULL, NULL),
(8, 'S08', NULL, NULL, NULL),
(9, 'S09', NULL, NULL, NULL),
(10, 'S10', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `raw_soy_sauce`
--
ALTER TABLE `raw_soy_sauce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_raw_soy_sauce_simple_idx` (`simple_id`),
  ADD KEY `fk_raw_soy_sauce_tank1_idx` (`tank_id`);

--
-- Indexes for table `simple`
--
ALTER TABLE `simple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tank`
--
ALTER TABLE `tank`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `raw_soy_sauce`
--
ALTER TABLE `raw_soy_sauce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `simple`
--
ALTER TABLE `simple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tank`
--
ALTER TABLE `tank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `raw_soy_sauce`
--
ALTER TABLE `raw_soy_sauce`
  ADD CONSTRAINT `fk_raw_soy_sauce_simple` FOREIGN KEY (`simple_id`) REFERENCES `simple` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_raw_soy_sauce_tank1` FOREIGN KEY (`tank_id`) REFERENCES `tank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
