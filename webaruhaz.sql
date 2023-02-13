-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 08:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webaruhaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `kosar`
--

CREATE TABLE `kosar` (
  `id` int(11) NOT NULL,
  `nev` varchar(256) NOT NULL,
  `vevo` varchar(256) NOT NULL,
  `termekar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rendelesek`
--

CREATE TABLE `rendelesek` (
  `id` int(11) NOT NULL,
  `nev` varchar(256) NOT NULL,
  `darab` int(11) DEFAULT NULL,
  `ar` bigint(20) NOT NULL,
  `vevo` varchar(256) NOT NULL,
  `ido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rendelesek`
--

INSERT INTO `rendelesek` (`id`, `nev`, `darab`, `ar`, `vevo`, `ido`) VALUES
(1, 'Acer monitor', 1, 129990, 'ddd@ddd.ddd', '2023-02-13 03:14:58'),
(2, 'LG monitor', 2, 999980, 'ddd@ddd.ddd', '2023-02-13 03:14:58'),
(3, 'Republic of Gamers monitor', 1, 199990, 'ddd@ddd.ddd', '2023-02-13 03:14:58'),
(4, 'Samsung monitor', 1, 149990, 'ddd@ddd.ddd', '2023-02-13 03:14:58'),
(5, 'Samsung monitor', 1, 149990, 'ddd@ddd.ddd', '2023-02-13 03:57:41'),
(6, 'Acer monitor', 1, 129990, 'ddd@ddd.ddd', '2023-02-13 04:49:38'),
(7, 'Samsung monitor', 1, 149990, 'ddd@ddd.ddd', '2023-02-13 04:49:38'),
(8, 'Acer monitor', 2, 259980, 'alma@gmail.com', '2023-02-13 08:00:38'),
(9, 'Republic of Gamers monitor', 1, 199990, 'alma@gmail.com', '2023-02-13 08:00:38'),
(10, 'Samsung monitor', 1, 149990, 'alma@gmail.com', '2023-02-13 08:00:38'),

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(256) NOT NULL,
  `password` char(40) DEFAULT NULL,
  `admin` int(1) NOT NULL DEFAULT 0,
  `balance` int(11) NOT NULL DEFAULT 1000000
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `admin`, `balance`) VALUES
('a@a.a', '1a1ac4178c7b4e4a17ed71903e24c4b62cb0f988', 0, 100000),
('aaa@aaa.aaa', '37e7f41f1dadce2e74464a509a5e6a7aac3ed187', 0, 100000),
('alma@gmail.com', '6ffd5316b7be113316fff0f92f98814db2a5ee3c', 0, 390040),
('bbb@aaa.aaa', '37e7f41f1dadce2e74464a509a5e6a7aac3ed187', 0, 100000),
('ccc@ccc.cc', '37e7f41f1dadce2e74464a509a5e6a7aac3ed187', 0, 100000),
('ddd@ddd.ddd', '37e7f41f1dadce2e74464a509a5e6a7aac3ed187', 0, 91370290),
('q@q.qq', '32e86407f969b3f27d72c54e8101005d8d6feffd', 0, 100000),
('qw@qw.qw', 'd1c68c846306fbee27cca12327746a816408c3c1', 0, 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kosar`
--
ALTER TABLE `kosar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kosar_users_email_fk` (`vevo`);

--
-- Indexes for table `rendelesek`
--
ALTER TABLE `rendelesek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kosar`
--
ALTER TABLE `kosar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `rendelesek`
--
ALTER TABLE `rendelesek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kosar`
--
ALTER TABLE `kosar`
  ADD CONSTRAINT `kosar_users_email_fk` FOREIGN KEY (`vevo`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
