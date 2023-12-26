-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2023 at 12:22 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_step`
--

CREATE TABLE `additional_step` (
  `id` int NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `amount` varchar(191) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m2_cash`
--

CREATE TABLE `m2_cash` (
  `id` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `buyer_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m2_gold`
--

CREATE TABLE `m2_gold` (
  `id` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `buyer_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturing_step`
--

CREATE TABLE `manufacturing_step` (
  `id` int NOT NULL,
  `vendor_id` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `image` text,
  `details` text,
  `type` varchar(191) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `purity` varchar(255) DEFAULT NULL,
  `purity_text` varchar(255) NOT NULL,
  `unpolish_weight` float DEFAULT NULL,
  `polish_weight` float DEFAULT NULL,
  `rate` int DEFAULT NULL,
  `wastage` float DEFAULT NULL,
  `unpure_weight` float DEFAULT NULL,
  `pure_weight` float DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Active',
  `tValues` float NOT NULL,
  `barcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metal`
--

CREATE TABLE `metal` (
  `id` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `issued_weight` float NOT NULL,
  `purity` float NOT NULL,
  `pure_weight` float NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polisher_step`
--

CREATE TABLE `polisher_step` (
  `id` int NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `product_id` varchar(191) DEFAULT NULL,
  `vendor_id` varchar(255) DEFAULT NULL,
  `image` text,
  `details` text,
  `difference` float DEFAULT NULL,
  `rate` float NOT NULL,
  `Wastage` float DEFAULT NULL,
  `Payable` float DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Active',
  `polisherbarcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasing`
--

CREATE TABLE `purchasing` (
  `id` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `total` int NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchasing`
--

INSERT INTO `purchasing` (`id`, `vendor_id`, `total`, `date`, `status`) VALUES
('existing', 'existing', 0, '2023-10-29 13:19:44', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_details`
--

CREATE TABLE `purchasing_details` (
  `id` int NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `price_per` varchar(255) NOT NULL,
  `quantity` int DEFAULT NULL,
  `remaining_quantity` int DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `remaining_weight` float DEFAULT NULL,
  `rate` float NOT NULL,
  `total_amount` float NOT NULL,
  `remaining_total_amount` float NOT NULL,
  `barcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returned_item`
--

CREATE TABLE `returned_item` (
  `id` int NOT NULL,
  `code` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `weight` float NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returned_stone_step`
--

CREATE TABLE `returned_stone_step` (
  `id` int NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `received_weight` float NOT NULL,
  `stone_weight` float NOT NULL,
  `stone_quantity` int NOT NULL,
  `total_weight` float NOT NULL,
  `rate` int NOT NULL,
  `shruded_quantity` float NOT NULL,
  `wastage` float NOT NULL,
  `grand_weight` float NOT NULL,
  `payable` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `p_id`, `total`, `date`, `status`) VALUES
('SI-0001', 'existing', 12758, '2023-11-03 11:32:01', 'Active'),
('SI-0002', 'existing', 20545, '2023-11-04 12:58:28', 'Active'),
('SI-0003', 'existing', 58783, '2023-11-04 12:59:35', 'Active'),
('SI-0005', 'existing', 0, '2023-11-04 14:21:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `id` int NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `price_per` varchar(255) NOT NULL,
  `quantity` int DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `rate` float NOT NULL,
  `total_amount` float NOT NULL,
  `barcode` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`id`, `s_id`, `type`, `detail`, `price_per`, `quantity`, `weight`, `rate`, `total_amount`, `barcode`) VALUES
(105, 'SI-0001', 'Natural Stone ', 'Emerald String ', 'K', 0, 17.01, 150, 12758, 1698929896781),
(106, 'SI-0002', 'Natural Stone ', 'Ruby String ', 'K', 0, 41.09, 100, 20545, 1699101990547),
(107, 'SI-0002', 'Natural Stone ', 'Turmaline Pearl Shape ', 'K', 0, 67.36, 700, 235760, 1699102055798),
(108, 'SI-0002', 'Natural Stone ', 'Emerald String', 'K', 0, 70.26, 120, 42156, 1699102055972),
(109, 'SI-0002', 'Natural Stone ', 'Amethyst String', 'K', 0, 16.1, 80, 6440, 1699102056162),
(110, 'SI-0002', 'Natural Stone ', 'Turmaline Cabachon', 'K', 0, 171.07, 500, 427675, 1699102056335),
(111, 'SI-0002', 'Natural Stone ', 'Emerald String', 'K', 0, 29.38, 120, 17628, 1699102056504),
(112, 'SI-0002', 'Natural Stone ', 'Pearls String', 'Tola', 0, 19.13, 2500, 4100, 1699102056679),
(113, 'SI-0002', 'Natural Stone ', 'Sunsitara String', 'K', 0, 37.06, 60, 11118, 1699102056847),
(114, 'SI-0002', 'Natural Stone ', 'Ruby String ', 'K', 0, 23.23, 150, 17423, 1699102057023),
(115, 'SI-0002', 'Natural Stone ', 'Ruby Baguette', 'K', 0, 12.71, 800, 50840, 1699102057212),
(116, 'SI-0002', 'Natural Stone ', 'Sapphire Round', 'K', 0, 33.71, 350, 58993, 1699102057766),
(117, 'SI-0002', 'Crystal', 'Purple Fancy String ', 'K', 0, 32.51, 35, 5689, 1699102058138),
(118, 'SI-0002', 'Crystal', 'Champion Fancy String ', 'K', 0, 45.51, 35, 7964, 1699102058298),
(119, 'SI-0002', 'Crystal', 'Green Fancy String ', 'K', 0, 38.87, 35, 6802, 1699102058513),
(120, 'SI-0003', 'Natural Stone ', 'Turmaline Mix Size ', 'K', 0, 33.59, 350, 58783, 1699102710100),
(123, 'SI-0005', 'Natural Stone ', 'Feroza String ', 'K', 0, 60.14, 300, 90210, 1699102754952),
(124, 'SI-0005', 'Natural Stone ', 'Feroza String', 'K', 0, 31.16, 200, 31160, 1699102755140),
(125, 'SI-0005', 'Natural Stone ', 'Gray String ', 'K', 0, 47.5, 60, 14250, 1699102755319),
(126, 'SI-0005', 'Natural Stone ', 'Pink String ', 'K', 0, 114.59, 60, 34377, 1699102755548),
(127, 'SI-0005', 'Natural Stone ', 'SunSitara Mix Size ', 'K', 0, 6.34, 50, 1585, 1699102755710),
(128, 'SI-0005', 'Natural Stone ', 'Red Coral String', 'K', 0, 18.7, 200, 18700, 1699102755935),
(129, 'SI-0005', 'Zircon', 'Carrat Princesses ', 'K', 0, 15.48, 20, 1548, 1699102996342),
(130, 'SI-0005', 'Zircon', 'Purple Mix Size', 'K', 0, 19.1, 20, 1910, 1699102996507),
(131, 'SI-0005', 'Zircon', 'Purple Fancy Cut ', 'K', 0, 15.13, 20, 1513, 1699102996668),
(132, 'SI-0005', 'Zircon', 'Purple Fancy Cut ', 'K', 0, 6.83, 20, 683, 1699102996836),
(133, 'SI-0005', 'Natural Stone ', 'Gomedhikam', 'K', 0, 9.55, 100, 4775, 1699102997005),
(134, 'SI-0005', 'Natural Stone ', 'Turmaline Green Round ', 'K', 0, 15.88, 350, 27790, 1699102997175);

-- --------------------------------------------------------

--
-- Table structure for table `stone`
--

CREATE TABLE `stone` (
  `id` int NOT NULL,
  `code` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `weight` float NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stone_setter_step`
--

CREATE TABLE `stone_setter_step` (
  `Ssid` int NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `vendor_id` varchar(255) DEFAULT NULL,
  `image` text,
  `detail` varchar(200) DEFAULT NULL,
  `retained_weight` float NOT NULL,
  `total_weight` float NOT NULL,
  `Issued_weight` float DEFAULT NULL,
  `z_total_weight` float DEFAULT NULL,
  `z_total_quantity` int DEFAULT NULL,
  `s_total_weight` float DEFAULT NULL,
  `s_total_quantity` int DEFAULT NULL,
  `grand_weight` float NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_per` varchar(255) NOT NULL,
  `rate` float NOT NULL,
  `barcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `price_per`, `rate`, `barcode`) VALUES
(1, 'Zircon', 'Tola', 22, '1700322217340');

-- --------------------------------------------------------

--
-- Table structure for table `universal_product`
--

CREATE TABLE `universal_product` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `UserEmail` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `UserLogInDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UserLogOutDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Token` varchar(255) DEFAULT NULL,
  `UserStatus` varchar(45) DEFAULT 'Active',
  `AddedBy` varchar(100) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserEmail`, `Password`, `UserLogInDate`, `UserLogOutDate`, `Token`, `UserStatus`, `AddedBy`, `Date`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$vC41AOMLc.nfBlZFOwukkuN/44tpQIlIjnGdRMMOVdlzOTf5fT5zq', '2022-09-26 05:31:11', '2022-09-26 05:31:11', '754bcf4b23f6b6f887e30182f22ac0b7bd577256d26e7e744546ac8403ee855a3aa236909dd98571731913e85f8dd1b1e7c9', 'Active', NULL, '2020-09-24 12:53:37'),
(8, 'faisal', 'faisal@yahoo.com', '$2y$10$vC41AOMLc.nfBlZFOwukkuN/44tpQIlIjnGdRMMOVdlzOTf5fT5zq', '2022-10-15 07:36:32', '2022-10-15 07:36:32', 'c46cfab94d3716025904f1d56a5c94675caa51b576509f68f585ad72604487e624705aa5f152d76225351d4a1c9b6b3c42de', 'Active', NULL, '2022-10-15 07:36:32'),
(9, 'masood', 'masood@gmail.com', '$2y$10$eUxlPA542YDKdrxQby0DteriQYPv70waERO0LFLtPJ/c5K7JkWoTG', '2022-10-29 16:26:33', '2022-10-29 16:26:33', '8f12620ae6e8851c8bfa5f2075b84e8f05ddef1a11551d44341c38980accbc60dafe6dd8f91ce90b6c7f1592eaa787f09bdf', 'Active', NULL, '2022-10-29 16:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `18k` float NOT NULL,
  `21k` float NOT NULL,
  `22k` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `type`, `name`, `18k`, `21k`, `22k`, `status`, `date`) VALUES
('existing', 'existing', 'existing', 0, 0, 0, 'inactive', '');

-- --------------------------------------------------------

--
-- Table structure for table `zircon`
--

CREATE TABLE `zircon` (
  `id` int NOT NULL,
  `code` varchar(255) NOT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `weight` float NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_step`
--
ALTER TABLE `additional_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `m2_cash`
--
ALTER TABLE `m2_cash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `m2_gold`
--
ALTER TABLE `m2_gold`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `manufacturing_step`
--
ALTER TABLE `manufacturing_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturing_step_ibfk_1` (`vendor_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `metal`
--
ALTER TABLE `metal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `polisher_step`
--
ALTER TABLE `polisher_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasing`
--
ALTER TABLE `purchasing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `purchasing_details`
--
ALTER TABLE `purchasing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returned_item`
--
ALTER TABLE `returned_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `returned_stone_step`
--
ALTER TABLE `returned_stone_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `stone`
--
ALTER TABLE `stone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `stone_setter_step`
--
ALTER TABLE `stone_setter_step`
  ADD PRIMARY KEY (`Ssid`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universal_product`
--
ALTER TABLE `universal_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zircon`
--
ALTER TABLE `zircon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_step`
--
ALTER TABLE `additional_step`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m2_cash`
--
ALTER TABLE `m2_cash`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m2_gold`
--
ALTER TABLE `m2_gold`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manufacturing_step`
--
ALTER TABLE `manufacturing_step`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `metal`
--
ALTER TABLE `metal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `polisher_step`
--
ALTER TABLE `polisher_step`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `purchasing_details`
--
ALTER TABLE `purchasing_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `returned_item`
--
ALTER TABLE `returned_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `returned_stone_step`
--
ALTER TABLE `returned_stone_step`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `stone`
--
ALTER TABLE `stone`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `stone_setter_step`
--
ALTER TABLE `stone_setter_step`
  MODIFY `Ssid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zircon`
--
ALTER TABLE `zircon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_step`
--
ALTER TABLE `additional_step`
  ADD CONSTRAINT `additional_step_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `additional_step_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `cash`
--
ALTER TABLE `cash`
  ADD CONSTRAINT `cash_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `m2_cash`
--
ALTER TABLE `m2_cash`
  ADD CONSTRAINT `m2_cash_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `m2_gold`
--
ALTER TABLE `m2_gold`
  ADD CONSTRAINT `m2_gold_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `manufacturing_step`
--
ALTER TABLE `manufacturing_step`
  ADD CONSTRAINT `manufacturing_step_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`),
  ADD CONSTRAINT `manufacturing_step_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `metal`
--
ALTER TABLE `metal`
  ADD CONSTRAINT `metal_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `polisher_step`
--
ALTER TABLE `polisher_step`
  ADD CONSTRAINT `polisher_step_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`),
  ADD CONSTRAINT `polisher_step_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `purchasing`
--
ALTER TABLE `purchasing`
  ADD CONSTRAINT `purchasing_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `returned_item`
--
ALTER TABLE `returned_item`
  ADD CONSTRAINT `returned_item_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `returned_item_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `returned_stone_step`
--
ALTER TABLE `returned_stone_step`
  ADD CONSTRAINT `returned_stone_step_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `returned_stone_step_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `purchasing` (`id`);

--
-- Constraints for table `stock_details`
--
ALTER TABLE `stock_details`
  ADD CONSTRAINT `stock_details_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `stock` (`id`);

--
-- Constraints for table `stone`
--
ALTER TABLE `stone`
  ADD CONSTRAINT `stone_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `stone_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `stone_setter_step`
--
ALTER TABLE `stone_setter_step`
  ADD CONSTRAINT `stone_setter_step_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`),
  ADD CONSTRAINT `stone_setter_step_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `zircon`
--
ALTER TABLE `zircon`
  ADD CONSTRAINT `zircon_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `zircon_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
