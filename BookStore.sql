-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2019 at 07:41 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BookStore`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`id`, `name`, `price`, `pic`) VALUES
(1, 'Oracle Database ', 199, 'https://www.jarir.com/cdn-cgi/image/fit=contain,width=400,height=400/https://www.jarir.com/media//catalog/product/4/9/495202.jpg?1'),
(2, ' Apple Watch, 2nd Edition', 119, 'https://www.jarir.com/cdn-cgi/image/fit=contain,width=400,height=400/https://www.jarir.com/media//catalog/product/5/3/531617.jpg?1'),
(3, 'Brilliant Office 2010', 135.45, 'https://www.jarir.com/cdn-cgi/image/fit=contain,width=400,height=400/https://www.jarir.com/media//catalog/product/3/6/364620.jpg?1'),
(4, 'Learning How to Program , C', 397.95, 'https://www.jarir.com/cdn-cgi/image/fit=contain,width=400,height=400/https://www.jarir.com/media//catalog/product/3/9/398764.jpg?1'),
(5, 'Treehouse', 156.45, 'https://www.jarir.com/cdn-cgi/image/fit=contain,width=400,height=400/https://www.jarir.com/media//catalog/product/4/0/405918.jpg?1'),
(6, 'In a Nutshell ,Web Design, 2nd Edition', 61.95, 'https://www.jarir.com/cdn-cgi/image/fit=contain,width=400,height=400/https://www.jarir.com/media//catalog/product/1/8/187692.jpg?1'),
(7, 'Bible', 219.45, 'https://www.jarir.com/cdn-cgi/image/fit=contain,width=400,height=400/https://www.jarir.com/media//catalog/product/3/9/395631.jpg?1'),
(8, 'Programming C', 82.95, 'https://www.jarir.com/cdn-cgi/image/fit=contain,width=400,height=400/https://www.jarir.com/media//catalog/product/1/8/187658.jpg?1');

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`cartid`, `userid`, `bookid`, `qty`) VALUES
(17, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`userid`, `name`, `address`, `number`) VALUES
(2, 'REEM ALRASHED', 'RIYADH', 5455555),
(3, 'Haya AlRashed', 'Riyadh', 545553211),
(4, 'SARA', 'KSA , Riyadh', 545500000),
(8, 'Ghada Fahad', 'ksa , riyadh ', 545552911);

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE `Sales` (
  `userid` int(50) NOT NULL,
  `saledate` varchar(200) NOT NULL,
  `saleid` int(11) NOT NULL,
  `totalprice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sales`
--

INSERT INTO `Sales` (`userid`, `saledate`, `saleid`, `totalprice`) VALUES
(2, 'Fri, 06 Dec 2019 13:48:47 +0100', 1, 596.95),
(2, 'Fri, 06 Dec 2019 13:49:04 +0100', 2, 61.95),
(3, 'Fri, 06 Dec 2019 15:58:23 +0100', 3, 397.95),
(4, 'Fri, 06 Dec 2019 15:59:45 +0100', 5, 219.45),
(8, 'Fri, 06 Dec 2019 17:45:14 +0100', 6, 218.4),
(8, 'Sat, 07 Dec 2019 12:52:51 +0100', 7, 156.45);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userid`, `username`, `password`, `usertype`) VALUES
(1, 'admin1', '123', 'Admin'),
(2, 'reem', '123', 'Customer'),
(3, 'haya', '123', 'Customer'),
(4, 'sara', '123', 'Customer'),
(8, 'ghada', '123', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `id_fk` (`userid`),
  ADD KEY `book_fk` (`bookid`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`saleid`),
  ADD KEY `user_fk` (`userid`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userid`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Book`
--
ALTER TABLE `Book`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Sales`
--
ALTER TABLE `Sales`
  MODIFY `saleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `book_fk` FOREIGN KEY (`bookid`) REFERENCES `Book` (`id`),
  ADD CONSTRAINT `id_fk` FOREIGN KEY (`userid`) REFERENCES `User` (`userid`);

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `userid_fk` FOREIGN KEY (`userid`) REFERENCES `User` (`userid`);

--
-- Constraints for table `Sales`
--
ALTER TABLE `Sales`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`userid`) REFERENCES `User` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
