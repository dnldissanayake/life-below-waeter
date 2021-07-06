-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 05:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lbwter_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(30) NOT NULL,
  `user_id` bigint(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `email`, `birthday`, `password`) VALUES
(2, 9223372036854775807, 'dnldissanayake', 'vihangadilakshanjyathilaka@gmail.com', '2000-01-01', '123456'),
(3, 6019107625, 'dnldissanayakem', 'vihangadilakshanjyathkilaka@gmail.com', '2000-01-01', '787878'),
(4, 50347894484924, 'RMVDJayathilaka', 'jhfhhgmail.com', '2000-01-01', '78788'),
(5, 6185105237, 'RMVDJayathilaka', 'jhfhhgmail.com', '2000-01-01', '4545'),
(6, 444590, 'chamath sandeepa', 'Bihandilakshan99@gmail.com', '2000-01-02', '789456'),
(7, 9069602832, 'RMVDJayathilaka', 'vihangadilakshanjyathilaka@gmail.com', '2000-01-01', '1245'),
(9, 3077, 'RMVDJayathilaka', '0768106390', '1000-10-01', '1245'),
(18, 9639, 'chamath', 'chamath@gmail.com', '2000-01-01', '123456'),
(19, 97309322750727759, 'pawan', 'chamathcc@gmail.com', '2000-01-01', '129247'),
(20, 2919197667717352, 'chamathss', 'vihanga@gmail.com', '2000-01-01', '456789'),
(21, 16843135782, 'dhulara', 'cddd@gmail.com', '2014-01-02', '741852'),
(22, 18636097, 'harshana dhisanayake', 'harshana@gmail.com', '1998-01-02', '753951');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
