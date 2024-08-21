-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 06:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `price` int(11) NOT NULL,
  `purchases` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`price`, `purchases`, `gid`, `sid`) VALUES
(2500, 19, 2, 1),
(1929, 5, 3, 2),
(3949, 2, 4, 3),
(3999, 2, 5, 4),
(1499, 6, 6, 5),
(750, 2, 7, 6),
(2495, 1, 8, 7),
(3999, 1, 9, 8),
(690, 1, 10, 9),
(5399, 2, 11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `game_data`
--

CREATE TABLE `game_data` (
  `gid` int(11) NOT NULL,
  `game` varchar(100) NOT NULL,
  `company` varchar(50) NOT NULL,
  `ratings` double NOT NULL,
  `mode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_data`
--

INSERT INTO `game_data` (`gid`, `game`, `company`, `ratings`, `mode`) VALUES
(2, 'Grand Theft Auto VI', 'Rockstar Games', 4.9, 'CD/Download'),
(3, 'Red Dead Redemption II', 'Rockstar Games', 4.9, 'CD/Download'),
(4, 'God of War Ragnarok', 'Santa Monica Studio', 4.7, 'CD/Download'),
(5, 'Resident Evil Village', 'Capcom', 4.8, 'CD/Download'),
(6, 'Subnautica : Below Zero', 'Unknown Worlds Entertainment', 4.5, 'CD/Download'),
(7, 'Fall Guys', 'Epic games', 4.2, 'Download'),
(8, 'Minecraft Java version', 'Mojhang Studios', 4, 'Download'),
(9, 'Hitman 3', 'IO Interactive', 4.4, 'CD/Download'),
(10, 'The Walking Dead', 'Telltale and Skybound games', 4.3, 'CD/Download'),
(11, 'Forza Horizon 5', 'Playground Games', 4.3, 'CD/Download');

-- --------------------------------------------------------

--
-- Table structure for table `game_stock`
--

CREATE TABLE `game_stock` (
  `sid` int(11) NOT NULL,
  `stock` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_stock`
--

INSERT INTO `game_stock` (`sid`, `stock`) VALUES
(1, 0),
(2, 10),
(3, 62),
(4, 27),
(5, 126),
(6, 10),
(7, 10),
(8, 10),
(9, 10),
(10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_price` int(11) DEFAULT NULL,
  `rent_period` int(11) DEFAULT NULL,
  `rents` int(11) DEFAULT NULL,
  `gid` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_price`, `rent_period`, `rents`, `gid`, `sid`) VALUES
(1010, 3, 8, 2, 1),
(1020, 3, 5, 3, 2),
(1030, 3, 3, 4, 3),
(1040, 3, 3, 5, 4),
(1050, 3, 1, 6, 5),
(1060, 3, 1, 7, 6),
(1070, 3, 1, 8, 7),
(1080, 3, 1, 9, 8),
(1090, 3, 1, 10, 9),
(1100, 3, 2, 11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobilenumber` varchar(10) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `username`, `mobilenumber`, `emailid`, `birthdate`, `password`, `address`) VALUES
(1, 'nishant dholakia', '8320829412', 'nishantdholakia2020@gmail.com', '2006-04-18', 'nish123', 'hello baby\r\n'),
(4, 'prince desai', '1234567890', 'princevip@gmail.com', '2005-09-07', 'prince', 'hello guys, chai pi lo'),
(19, 'prince09', '9090909098', 'desaiprince401@gmail.com', '2005-09-07', '12345', 'upleta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `gid` (`gid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `game_data`
--
ALTER TABLE `game_data`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `game_stock`
--
ALTER TABLE `game_stock`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `gid` (`sid`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `gid` (`gid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `game_data`
--
ALTER TABLE `game_data`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `game_stock`
--
ALTER TABLE `game_stock`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `game_data` (`gid`);

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `game_data` (`gid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
