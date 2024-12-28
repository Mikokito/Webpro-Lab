-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 11:59 AM
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
-- Database: `notion`
--

-- --------------------------------------------------------

--
-- Table structure for table `citra`
--

CREATE TABLE `citra` (
  `id_task` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `done` enum('not yet started','in progress','done','') NOT NULL DEFAULT 'not yet started'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citra`
--

INSERT INTO `citra` (`id_task`, `task`, `done`) VALUES
(2, 'test', 'not yet started'),
(4, 'coba', 'not yet started'),
(5, 'makan', 'in progress'),
(7, 'Main ke warnet', 'not yet started'),
(8, 'Kerjain tugas', 'in progress'),
(9, 'ngemil', 'not yet started'),
(10, 'main hape', 'not yet started'),
(11, 'buka IG', 'not yet started');

-- --------------------------------------------------------

--
-- Table structure for table `depon`
--

CREATE TABLE `depon` (
  `id_task` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `done` enum('not yet started','in progress','done','') NOT NULL DEFAULT 'not yet started'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `depon`
--

INSERT INTO `depon` (`id_task`, `task`, `done`) VALUES
(1, 'test', 'not yet started');

-- --------------------------------------------------------

--
-- Table structure for table `jessen`
--

CREATE TABLE `jessen` (
  `id_task` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `done` enum('not yet started','in progress','done','') NOT NULL DEFAULT 'not yet started'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jessen`
--

INSERT INTO `jessen` (`id_task`, `task`, `done`) VALUES
(2, 'Jessen bau', 'not yet started');

-- --------------------------------------------------------

--
-- Table structure for table `miko`
--

CREATE TABLE `miko` (
  `id_task` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `done` enum('not yet started','in progress','done','') NOT NULL DEFAULT 'not yet started'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `miko`
--

INSERT INTO `miko` (`id_task`, `task`, `done`) VALUES
(1, 'test', 'not yet started'),
(2, 'YEYYYYY BISAAAAAAAAAAAAA', 'not yet started');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Citra', '$2y$10$G8XklR8FvKsWTpRTXSUjlOFxi4Oe80n7u3V5O2fGwL3fEYYKPp6fC'),
(2, 'Miko', '$2y$10$5gE1e4JVNKcnfvEFf5RZCesHBst9Nw49rmiZZK0i...DMdV2Azzfq'),
(3, 'Jessen', '$2y$10$fpCvoRLAm/lPsauuVqdGEeh2x1n6UwFWcdP1j2bDyhfAh6eb019B6'),
(4, 'Depon', '$2y$10$LEHWYTJhTy.VurgD2BPiveYqlv2BHaVmwOL1.vaO0soiV7GmZVBUu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citra`
--
ALTER TABLE `citra`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `depon`
--
ALTER TABLE `depon`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `jessen`
--
ALTER TABLE `jessen`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `miko`
--
ALTER TABLE `miko`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citra`
--
ALTER TABLE `citra`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `depon`
--
ALTER TABLE `depon`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jessen`
--
ALTER TABLE `jessen`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `miko`
--
ALTER TABLE `miko`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
