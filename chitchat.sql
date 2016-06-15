-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2016 at 05:40 
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatcuap`
--

-- --------------------------------------------------------

--
-- Table structure for table `logchat`
--

CREATE TABLE `logchat` (
  `id_logchat` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logchat`
--

INSERT INTO `logchat` (`id_logchat`, `author`, `text`, `waktu`) VALUES
(1, '1', 'Hallooo', '2016-06-15 03:35:39'),
(2, '2', 'Apa', '2016-06-15 03:37:54'),
(3, '1', 'ga apa', '2016-06-15 03:38:08'),
(4, '2', 'Hemmm', '2016-06-15 03:38:22'),
(5, '1', 'Asemmmm', '2016-06-15 03:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id_user`, `username`, `password`, `status`, `picture`) VALUES
(1, 'muhajirinlpu', 'lalala', 1, 'mhjr.png'),
(2, 'anonymous', '010101', 0, 'anom.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logchat`
--
ALTER TABLE `logchat`
  ADD PRIMARY KEY (`id_logchat`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logchat`
--
ALTER TABLE `logchat`
  MODIFY `id_logchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
