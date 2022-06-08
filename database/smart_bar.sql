-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 05:42 PM
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
-- Database: `smart_bar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bar`
--

CREATE TABLE `bar` (
  `barId` int(11) NOT NULL,
  `barName` varchar(45) DEFAULT NULL,
  `brellaNumber` varchar(45) DEFAULT NULL,
  `barContact` varchar(45) DEFAULT NULL,
  `barPysicallAdd` varchar(45) DEFAULT NULL,
  `barEmail` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar`
--

INSERT INTO `bar` (`barId`, `barName`, `brellaNumber`, `barContact`, `barPysicallAdd`, `barEmail`) VALUES
(1, 'Kidimbwi', '121222', '0755869646', 'Tegeta', 'kidimbwi2gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerFullName` varchar(45) DEFAULT NULL,
  `customerGender` varchar(45) DEFAULT NULL,
  `customerEmail` varchar(45) DEFAULT NULL,
  `customerContact` varchar(45) DEFAULT NULL,
  `customerPhysicalAdd` varchar(45) DEFAULT NULL,
  `customerPassword` varchar(255) NOT NULL,
  `customerStatus` varchar(45) DEFAULT 'ACTIVE',
  `BarId` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `userRole` int(11) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerFullName`, `customerGender`, `customerEmail`, `customerContact`, `customerPhysicalAdd`, `customerPassword`, `customerStatus`, `BarId`, `createdAt`, `userRole`) VALUES
(1, 'Georgina Lwoga', 'Female', 'lee@gmail.com', '0785414121', NULL, '$2y$10$duJblBfsVgXt5SVMGy4GpO/iDuwu53UggxAGgD4FkbqZraT3juAVO', 'ACTIVE', NULL, '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(11) NOT NULL,
  `employeeFullName` varchar(45) DEFAULT NULL,
  `employeeEmail` varchar(45) DEFAULT NULL,
  `employeePassword` varchar(255) DEFAULT NULL,
  `employeeContact` varchar(45) DEFAULT NULL,
  `employeeGender` varchar(45) DEFAULT NULL,
  `employeeTitle` varchar(45) DEFAULT NULL,
  `employeeDoB` varchar(45) DEFAULT NULL,
  `employeePhysicalAdd` varchar(45) DEFAULT NULL,
  `employeeBar` int(11) DEFAULT NULL,
  `employeeStatus` varchar(45) DEFAULT 'ACTIVE',
  `createdAt` datetime DEFAULT current_timestamp(),
  `userRole` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `employeeFullName`, `employeeEmail`, `employeePassword`, `employeeContact`, `employeeGender`, `employeeTitle`, `employeeDoB`, `employeePhysicalAdd`, `employeeBar`, `employeeStatus`, `createdAt`, `userRole`) VALUES
(1, 'James Weinand', 'james@gmail.com', '$2y$10$TWLWWm0HdaoWuVqkLh91Ze1cIxb.QMzY5x14v4HfV.lMdM1PEEsUy', '0714565656', 'male', NULL, NULL, NULL, 1, 'ACTIVE', '2022-06-08 15:17:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `EmpId` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `TableNumber` int(11) DEFAULT NULL,
  `orderAmount` int(11) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(45) DEFAULT NULL,
  `productDescription` varchar(45) DEFAULT NULL,
  `productClass` varchar(45) DEFAULT NULL,
  `productImage` varchar(45) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `barID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bar`
--
ALTER TABLE `bar`
  ADD PRIMARY KEY (`barId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `BarId` (`BarId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `employeeBar` (`employeeBar`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `EmpId` (`EmpId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `barID` (`barID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bar`
--
ALTER TABLE `bar`
  MODIFY `barId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`BarId`) REFERENCES `bar` (`barId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`employeeBar`) REFERENCES `bar` (`barId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`EmpId`) REFERENCES `employee` (`employeeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`ProductId`) REFERENCES `product` (`productID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`barID`) REFERENCES `bar` (`barId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
