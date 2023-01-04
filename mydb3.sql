-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2023 at 06:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb3`
--

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `fid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`fid`, `image`, `title`, `uid`) VALUES
(13, '34.jpg', 'add to fav', 6),
(14, '29.jpg', 'private', 6),
(16, '35.jpg', 'private', 12),
(17, '27.jpg', ' xcvv', 6),
(18, '34.jpg', 'add to fav', 6),
(19, '34.jpg', 'add to fav', 1),
(22, '36.jfif', 'httyh', 19),
(26, '40.jpg', 'klkp', 21),
(27, '41.jpg', 'dvf', 21);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Kumkum Arora', 'krsbarora6@gmail.com', 'kumkum1234', 'kajal222'),
(2, 'Palak', 'Palak@gmail.com', 'Palak21', '12345678'),
(3, 'Rajat', 'Rajat21@gmail.com', 'Rajalarora25', 'kajal213'),
(6, 'saloni', 'saloni@gmail', 'saloni1234', '12345678'),
(7, 'salonisood', 'saloni@gmail', 'saloni12345', '123456'),
(9, 'ishant', 'ishant@gmail.com', 'ishant263', 'ishant123'),
(10, 'sonia', 'sonia@gmail.com', 'soniaarora', 'sony789'),
(11, 'Pooja', 'pooja@gmail.com', 'sweetgirl', 'pooja123'),
(12, 'Rajatarora', 'aroras@gmail.com', 'arora12569', 'rajat456'),
(13, 'pooja ra', 'poojasoii@gmail.com', 'pojjaran85', 'pooja12'),
(14, 'SUNITA', 'sunita@gmail.com', 'sunita253', 'sun25'),
(15, 'sandeep', 'san@gmail.com', 'sun654', 'sun123'),
(18, 'bhaumik', 'bha@gmail.com', 'bha', 'bh123'),
(19, 'kaju', 'kaju@gmail.com', 'kajal arora', '123456'),
(20, 'Jagdeep Singh', 'jagdeep@gmail.com', 'jagdeep', 'jagdeep'),
(21, 'smritit', 'sm@gmail.com', 'smritti', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `privacy` varchar(255) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `image`, `title`, `uid`, `privacy`, `view`) VALUES
(25, '25.jpg', 'kumkum here', 1, 'private', 0),
(29, '29.jpg', 'private', 6, 'private', 0),
(30, '30.jpg', 'private post', 6, 'private', 0),
(32, '32.jpg', 'computer', 9, 'private', 0),
(35, '35.jpg', 'private', 12, 'private', 0),
(37, '37.jpg', 'dbvhewgy', 18, 'private', 0),
(40, '40.jpg', 'klkp', 19, 'public', 6),
(41, '41.jpg', 'dvf', 21, 'public', 1),
(42, '42.jpg', 'gnfg', 21, 'public', 0),
(43, '43.jpg', 'vguhbujhi', 21, 'public', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fav`
--
ALTER TABLE `fav`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
