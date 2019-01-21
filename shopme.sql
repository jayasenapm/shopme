-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 07:47 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopme`
--

-- --------------------------------------------------------

--
-- Table structure for table `buil`
--

CREATE TABLE `buil` (
  `BilNo` varchar(255) NOT NULL,
  `SUID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Amount` int(10) NOT NULL,
  `Discount` int(10) NOT NULL,
  `No` varchar(500) NOT NULL,
  `method` varchar(100) NOT NULL,
  `Payid` int(10) NOT NULL,
  `tax` int(11) NOT NULL,
  `catagrize` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buil`
--

INSERT INTO `buil` (`BilNo`, `SUID`, `Date`, `Amount`, `Discount`, `No`, `method`, `Payid`, `tax`, `catagrize`) VALUES
('4566666', 0, '2019-01-20', 35000, 0, '0', 'Cash', 35000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `bulk`
--

CREATE TABLE `bulk` (
  `bulkid` int(100) NOT NULL,
  `billno` varchar(100) NOT NULL,
  `qun` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulk`
--

INSERT INTO `bulk` (`bulkid`, `billno`, `qun`) VALUES
(1, '4566666', 500);

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `BtransactioId` int(15) NOT NULL,
  `prid` varchar(500) NOT NULL,
  `billNo` varchar(255) NOT NULL,
  `Quan` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `Total` int(10) NOT NULL,
  `catagrize` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`BtransactioId`, `prid`, `billNo`, `Quan`, `Price`, `Total`, `catagrize`) VALUES
(1, 'Rice', '4566666', 500, 70, 35000, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `cashbook`
--

CREATE TABLE `cashbook` (
  `ID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `AccountTitle` varchar(200) NOT NULL,
  `Invoic` varchar(100) NOT NULL,
  `Bank` varchar(100) DEFAULT NULL,
  `Type` varchar(100) NOT NULL,
  `Debit` int(10) NOT NULL,
  `Credit` int(10) NOT NULL,
  `states` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashbook`
--

INSERT INTO `cashbook` (`ID`, `Date`, `AccountTitle`, `Invoic`, `Bank`, `Type`, `Debit`, `Credit`, `states`) VALUES
(1, '2019-01-19', '0', '', NULL, 'Cash', 0, 35000, '');

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `COID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `person` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `InvoiceNo` varchar(100) NOT NULL,
  `CustmerID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Amount` int(10) NOT NULL,
  `Method` varchar(100) NOT NULL,
  `No` varchar(100) NOT NULL,
  `Discount` int(10) NOT NULL,
  `Payid` int(10) NOT NULL,
  `tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prid` varchar(100) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Quanaty` int(10) NOT NULL,
  `discount` int(5) NOT NULL,
  `Price` int(10) NOT NULL,
  `CaId` int(10) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `scale` varchar(100) NOT NULL,
  `MinQun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prid`, `Product_Name`, `Quanaty`, `discount`, `Price`, `CaId`, `Image`, `scale`, `MinQun`) VALUES
('45678900', 'sunlight soap', 10, 0, 55, 1, 'Sri-lanka-Sunlight-Y-281016_tcm1313-495261_w400.jpg', 'unit', 0),
('45789', 'Nipuna keeri samba', 500, 0, 130, 2, '60330.jpg', 'unit', 0),
('4578966', 'Ratthi milk', 0, 0, 235, 3, 'RATHTHI-MILK-POWDER-400-G1456465940.jpg', 'unit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

CREATE TABLE `product_cat` (
  `CaId` int(10) NOT NULL,
  `Cat_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`CaId`, `Cat_Name`) VALUES
(1, 'Soap'),
(2, 'Rice'),
(3, 'Milk powder');

-- --------------------------------------------------------

--
-- Table structure for table `quatation`
--

CREATE TABLE `quatation` (
  `QID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `CID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quitems`
--

CREATE TABLE `quitems` (
  `QIID` int(10) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Quan` decimal(10,2) NOT NULL,
  `QID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quitems`
--

INSERT INTO `quitems` (`QIID`, `Name`, `Price`, `Quan`, `QID`) VALUES
(1, 'Nipuna keeri samba', '130.00', '5.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `TransactioId` int(10) NOT NULL,
  `prid` text NOT NULL,
  `InvoiceNo` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `quanaty` int(10) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SUID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `Contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `password` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`password`, `name`, `position`) VALUES
('123', 'jaya', 'admin'),
('345', 'jayasena', 'cashier'),
('admin', 'admin', 'admin'),
('magwin', 'Ajith', 'Cashier ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buil`
--
ALTER TABLE `buil`
  ADD PRIMARY KEY (`BilNo`);

--
-- Indexes for table `bulk`
--
ALTER TABLE `bulk`
  ADD PRIMARY KEY (`bulkid`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`BtransactioId`);

--
-- Indexes for table `cashbook`
--
ALTER TABLE `cashbook`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`COID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvoiceNo`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prid`);

--
-- Indexes for table `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`CaId`);

--
-- Indexes for table `quatation`
--
ALTER TABLE `quatation`
  ADD PRIMARY KEY (`QID`);

--
-- Indexes for table `quitems`
--
ALTER TABLE `quitems`
  ADD PRIMARY KEY (`QIID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`TransactioId`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulk`
--
ALTER TABLE `bulk`
  MODIFY `bulkid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `BtransactioId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cashbook`
--
ALTER TABLE `cashbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `COID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `CaId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quatation`
--
ALTER TABLE `quatation`
  MODIFY `QID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quitems`
--
ALTER TABLE `quitems`
  MODIFY `QIID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `TransactioId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SUID` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
