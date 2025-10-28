-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2025 at 05:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytrojanbank`
--
CREATE DATABASE IF NOT EXISTS `mytrojanbank` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mytrojanbank`;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--
-- Creation: Oct 23, 2025 at 12:11 PM
--

DROP TABLE IF EXISTS `hostel`;
CREATE TABLE `hostel` (
  `name` varchar(250) NOT NULL,
  `population` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `hostel`:
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--
-- Creation: Oct 23, 2025 at 12:00 AM
-- Last update: Oct 25, 2025 at 03:01 PM
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `Firstname` varchar(250) NOT NULL,
  `Surname` varchar(250) NOT NULL,
  `Room_number` int(11) NOT NULL,
  `Hostel` varchar(250) NOT NULL,
  `ID` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `students`:
--

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Firstname`, `Surname`, `Room_number`, `Hostel`, `ID`, `username`, `password`) VALUES
('randolph', 'Cooper', 5, 'Ankobrah', 1, 'coops', 'pass123'),
('', '', 0, 'Volta', 2, '', ''),
('', '', 0, 'Ankobra', 3, '', ''),
('Stanislav', 'Egyir', 6, 'Ankobra', 4, 'stan', 'pass234'),
('Mark', 'Davids', 1, 'Mano', 5, 'markod', 'pass345'),
('david', 'opoku', 2, 'mano', 12, 'davido', 'pass456');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--
-- Creation: Oct 16, 2025 at 05:51 PM
-- Last update: Oct 25, 2025 at 03:03 PM
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `ID` int(11) NOT NULL,
  `Type` varchar(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `transactions`:
--   `Student_ID`
--       `students` -> `ID`
--

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`ID`, `Type`, `Amount`, `Student_ID`, `Balance`) VALUES
(1, 'deposit', 200, 4, 200),
(3, 'withdraw', 20, 4, 180),
(4, 'withdraw', 10, 4, 170),
(7, 'withdraw', 0, 4, 170),
(8, 'deposit', 10, 4, 180),
(9, 'withdraw', 20, 4, 160),
(10, 'withdraw', 20, 4, 140),
(11, 'withdraw', 20, 4, 120),
(12, 'withdraw', 20, 4, 100),
(13, 'withdraw', 20, 4, 80),
(14, 'withdraw', 20, 4, 60),
(15, 'deposit', 10, 4, 70),
(16, 'deposit', 10, 4, 80),
(17, 'withdraw', 10, 4, 80),
(18, 'withdraw', 10, 4, 70),
(19, 'deposit', 20, 4, 90),
(20, 'deposit', 100, 4, 190),
(21, 'deposit', 200, 4, 390),
(22, 'deposit', 200, 1, 200),
(23, 'deposit', 200, 1, 400),
(24, 'deposit', 100, 1, 500),
(25, 'deposit', 100, 12, 100),
(26, 'withdraw', 10, 12, 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
