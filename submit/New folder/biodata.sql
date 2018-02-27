-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 01:54 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax-jquery-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `fname`, `lname`, `email`, `phone`) VALUES
(1, 'Azhari', 'Marzan', 'azhari@marzan.com', '2147483647'),
(2, 'Pevita', 'Pearce', 'pevpearce@gmail.com', '2147483647'),
(3, 'Rangsang', 'Kumuda', 'sangkumuda@gmail.com', '2147483647'),
(4, 'Raden', 'Kudamerta', 'kudamerta@gmail.com', '2147483647'),
(5, 'Raden', 'Cakradara', 'cakradara@gmail.com', '2147483647'),
(6, 'Monkey D', 'Luffy', 'luffy@mugiwara.com', '2147483647'),
(7, 'Lembu', 'Anabrang', 'lembuanabrang@gmail.com', '2147483647'),
(8, 'Wirota', 'Wiragati', 'wirowira@gmail.com', '2147483647'),
(9, 'Wiro', 'Sableng', 'sableng@gmail.com', '2147483647'),
(10, 'Ebiet ', 'Kaka', 'ebiet@gmail.com', '2147483647'),
(11, 'God', 'Usopp', 'usop@gmail.com', '2147483647'),
(12, 'Tony', 'Chopper', 'chopper@gmail.com', '2147483647'),
(13, 'Hello', 'There', 'hi@there.com', '085674837456'),
(14, 'Nico', 'Robin', 'nirobin@mugiwara.com', '085674837465'),
(15, 'lklkdalk', 'lkldkgnalkn', 'knlkgnaln', 'lnalgknlg'),
(16, 'aklkalg', 'lnalgna', 'lnadlganlnl', 'lknalglakgd'),
(18, 'Johnathan', 'Saputra', 'saputra@gmail.com', '087762536478'),
(19, 'lakdglk', 'lkndlkasl', 'lkandsdlkan', 'lkadsnlkbal'),
(20, 'dsgasd', 'adgag', 'adgadg', 'adgasd'),
(21, 'dgasdg', 'dgasdga', 'dgagag', 'adgad'),
(22, 'dasgsd', 'dagdasgdg', 'adgdag', 'adgasdgsdgd'),
(23, 'dasgsdgsa', 'adgadga', 'adgag', 'adgadggga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
