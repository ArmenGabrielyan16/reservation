-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2017 at 04:31 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` int(10) UNSIGNED NOT NULL,
  `rows` int(11) NOT NULL,
  `seats_in_row` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `rows`, `seats_in_row`, `created_at`) VALUES
(1, 10, 8, '2017-11-09 01:08:20'),
(2, 20, 15, '2017-11-09 04:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `hall_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `hall_id`, `title`, `created_at`) VALUES
(1, 1, 'Interstellar', '2017-11-09 01:08:56'),
(2, 1, 'Dark Knight', '2017-11-09 04:04:23'),
(3, 2, 'Inception\r\n', '2017-11-09 04:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `id` int(10) UNSIGNED NOT NULL,
  `hall_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `inactive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`id`, `hall_id`, `movie_id`, `row`, `seat`, `inactive`) VALUES
(2, 1, 1, 2, 6, 0),
(14, 1, 1, 9, 5, 0),
(27, 1, 2, 4, 7, 0),
(28, 1, 2, 2, 4, 0),
(44, 1, 1, 5, 6, 0),
(46, 1, 1, 4, 5, 0),
(47, 1, 1, 4, 8, 0),
(51, 2, 3, 3, 2, 0),
(52, 2, 3, 3, 10, 0),
(53, 2, 3, 8, 10, 0),
(54, 2, 3, 12, 12, 0),
(55, 2, 3, 13, 9, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
