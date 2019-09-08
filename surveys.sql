-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 12:13 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quality_eats_surveys`
--

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `quality` int(11) NOT NULL,
  `first_name` text COLLATE utf8_bin NOT NULL,
  `last_name` text COLLATE utf8_bin NOT NULL,
  `return_probability` text COLLATE utf8_bin NOT NULL,
  `suggestions` text COLLATE utf8_bin NOT NULL,
  `submitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`quality`, `first_name`, `last_name`, `return_probability`, `suggestions`, `submitted`) VALUES
(4, 'Barack', 'Obama', 'Likely', 'Simply the best around.', '2019-09-09'),
(4, 'Donald', 'Trump', 'Not Likely', 'They were not YUGE.', '2019-09-09'),
(4, 'Elon', 'Musk', 'Very Likely', 'Better burgers than Mars.', '2019-09-09'),
(3, 'Nick', 'Symmonds', 'Likely', 'Food was slightly raw so it wasn\'t so good, but the bar was amazing.', '2019-09-09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
