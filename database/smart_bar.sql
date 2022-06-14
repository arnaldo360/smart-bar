-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 11:27 PM
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
  `barPhysicalAddress` varchar(45) DEFAULT NULL,
  `barEmail` varchar(45) DEFAULT NULL,
  `numberOfEmployees` int(11) DEFAULT NULL,
  `barOwner` varchar(45) DEFAULT NULL,
  `barStatus` varchar(45) NOT NULL DEFAULT 'PENDING',
  `createAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `customerPassword` varchar(255) DEFAULT NULL,
  `customerStatus` varchar(45) DEFAULT 'ACTIVE',
  `BarId` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `userRole` int(11) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `fullname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `feedbackSubject` varchar(45) DEFAULT NULL,
  `feedbackMessage` varchar(500) DEFAULT NULL,
  `feedbackStatus` varchar(45) DEFAULT 'PENDING',
  `createdAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `managerId` int(11) NOT NULL,
  `managerFullName` varchar(45) DEFAULT NULL,
  `managerEmail` varchar(45) DEFAULT NULL,
  `managerContact` varchar(45) DEFAULT NULL,
  `managerDoB` datetime DEFAULT NULL,
  `managerPhysicalAdd` varchar(45) DEFAULT NULL,
  `managerPassword` varchar(255) DEFAULT NULL,
  `managerBar` int(11) DEFAULT NULL,
  `managerGender` varchar(45) DEFAULT NULL,
  `managerStatus` varchar(45) DEFAULT 'ACTIVE',
  `createdAt` datetime DEFAULT current_timestamp(),
  `userRole` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `orderId` int(11) NOT NULL,
  `employeeId` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `tableNumber` int(11) DEFAULT NULL,
  `orderAmount` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `orderStatus` varchar(45) DEFAULT 'PENDING',
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(45) DEFAULT NULL,
  `productDescription` varchar(45) DEFAULT NULL,
  `productType` varchar(45) DEFAULT NULL,
  `productCategory` varchar(45) DEFAULT NULL,
  `productImage` varchar(45) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productQuantity` int(11) DEFAULT NULL,
  `productUnit` varchar(45) NOT NULL,
  `productVolume` varchar(45) NOT NULL,
  `alcoholPercentage` varchar(45) NOT NULL,
  `barID` int(11) DEFAULT NULL,
  `productStatus` varchar(45) NOT NULL DEFAULT 'ACTIVE',
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `superAdminId` int(10) NOT NULL,
  `superAdminFullName` varchar(255) NOT NULL,
  `superAdminEmail` varchar(255) NOT NULL,
  `superAdminPassword` varchar(255) NOT NULL,
  `superAdminContact` varchar(255) NOT NULL,
  `status` varchar(45) DEFAULT 'ACTIVE',
  `createdAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`superAdminId`, `superAdminFullName`, `superAdminEmail`, `superAdminPassword`, `superAdminContact`, `status`, `createdAt`) VALUES
(1, 'Smart  Bar Admin', 'admin@admin.com', '$2y$10$uMM2kOKQ3jk8pKCqVy5blOzq1IFSYP9FjEysqs1u/wFuQZ74gywa2', '0755 111 000', 'ACTIVE', '2022-06-11 15:28:50');

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerId`),
  ADD KEY `managerBar` (`managerBar`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `EmpId` (`employeeId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `ProductId` (`productId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `barID` (`barID`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`superAdminId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bar`
--
ALTER TABLE `bar`
  MODIFY `barId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `managerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `superAdminId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`managerBar`) REFERENCES `bar` (`barId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_table_ibfk_2` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_table_ibfk_3` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`barID`) REFERENCES `bar` (`barId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
