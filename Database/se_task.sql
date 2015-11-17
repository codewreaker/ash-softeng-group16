-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2015 at 10:01 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

-- Frances Wireko

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `se_task`
--

CREATE TABLE `se_task` (
  `task_id` int(9) NOT NULL,
  `task_name` varchar(338) NOT NULL,
  `start_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(9) NOT NULL,
  `status` int(11) NOT NULL,
  `report` varchar(338) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `se_task`
--

INSERT INTO `se_task` (`task_id`, `task_name`, `start_time`, `end_time`, `user_id`, `status`, `report`) VALUES
(4, 'Daily check of available drugs', '2015-11-17 12:37:55', '2015-11-20 13:22:29', 6564, 1, 'The hospital is out of paracetamol and antibiotics'),
(11, 'Re-evaluate patients', '2015-11-17 12:59:29', '2015-11-17 12:59:29', 2552, 3, 'Patient in wards 5, 23 and 6 have been sent to the emergency ward'),
(25, 'Clean hospital rooms', '2015-11-17 12:35:34', '2015-11-26 09:33:54', 5893, 2, 'Rooms that are occupied could not be cleaned');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `se_task`
--
ALTER TABLE `se_task`
  ADD PRIMARY KEY (`task_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
