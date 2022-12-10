-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 02:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musichub`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `album` varchar(30) NOT NULL,
  `singer` varchar(30) NOT NULL,
  `composer` varchar(30) NOT NULL,
  `songwriter` varchar(30) NOT NULL,
  `label` varchar(30) NOT NULL,
  `starring` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `name`, `album`, `singer`, `composer`, `songwriter`, `label`, `starring`, `link`, `images`) VALUES
(1, 'Tum Hi Ho', 'Aqshiqui 2', 'Arjit Singh', 'Mithoon Sharma', 'Mithoon Sharma', 'T-series', 'Aditya Roy Kapoor,Shraddha kapoor', '01. Tum Hi Ho.mp3', 'tum-hi-ho.jpg'),
(2, 'Thank God', 'Thank God', 'Arjit Singh', 'Rochak Kohli', 'Manoj Muntasir', 'T-series', 'Rakul Preet Singh,Sidharth Malhotra', 'Thank God - Arijit Singh.mp3', 'thank-god.jpg'),
(5, 'Manike', 'Thank God', 'yohani', 'yohani', 'yohani', 'T-series', 'Nora Fatehi,Sidharth Malhotra', 'Manike - Thank God.mp3', 'maanike.jpg'),
(6, 'Dil De Diya', 'Thank God', 'Anand Raaj Anand', 'Rochak Kohli, Anand Raaj Anand', 'Rashmi Virag, Sameer', 'T-series', 'Sidharth Malhotra, Rakul Preet Singh', 'Dil De Diya Thank God.mp3', 'dil-de-diya.webp'),
(7, 'Haaniya Ve', 'Thank God', 'Jubin Nautiyal', 'Tanishk Bagchi', 'Rashmi Virag', 'T-series', 'Sidharth Malhotra, Rakul Preet Singh', 'Haaniya Ve - Jubin Nautiyal.mp3', 'haaniya-ve.jpg'),
(8, 'Tum Mere Ho', 'Tum Mere Ho', 'Darshan Raval', 'Lijo George', 'Gurpreet Saini, Gautam G Sharm', 'Indie Music', 'Darshan Raval', 'Tum Mere - Darshan Raval.mp3', 'tum-mere-ho.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('aditya', 'aditya@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$VkxWanVvZVVCQ0VHNEdTaQ$gMlzCE6F25FN6BkTsiek7Ib62HPkTWO2zLxB3fwVaiQ'),
('yash', 'yash@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$NDNxS3JuMmFRdUxGS1B0bw$zQuxiC3VSRE0ZdZJqom0YEmgaDuHoc52OJEwe4a1BEQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
