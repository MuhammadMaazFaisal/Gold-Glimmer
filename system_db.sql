-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2024 at 06:14 AM
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
-- Table structure for table `inventory_item`
--

CREATE TABLE `inventory_item` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
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
  `product_type` int DEFAULT NULL,
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `gold_vendor` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `o_id` int NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `status` int NOT NULL
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
  `polishing_type` int NOT NULL,
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
-- Table structure for table `polishing_type`
--

CREATE TABLE `polishing_type` (
  `id` int NOT NULL,
  `name` int NOT NULL,
  `status` int NOT NULL
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
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_details`
--

CREATE TABLE `purchasing_details` (
  `id` int NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `item_id` int NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE `stock_details` (
  `id` int NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `item_id` int NOT NULL,
  `detail` varchar(255) NOT NULL,
  `price_per` varchar(255) NOT NULL,
  `quantity` int DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `rate` float NOT NULL,
  `total_amount` float NOT NULL,
  `barcode` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stone`
--

CREATE TABLE `stone` (
  `id` int NOT NULL,
  `item_id` int NOT NULL,
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
(1, 'admin', 'admin@gmail.com', '$2y$10$vC41AOMLc.nfBlZFOwukkuN/44tpQIlIjnGdRMMOVdlzOTf5fT5zq', '2022-09-26 05:31:11', '2022-09-26 05:31:11', '754bcf4b23f6b6f887e30182f22ac0b7bd577256d26e7e744546ac8403ee855a3aa236909dd98571731913e85f8dd1b1e7c9', 'Active', NULL, '2020-09-24 12:53:37');

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
  `item_id` int NOT NULL,
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
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturing_step`
--
ALTER TABLE `manufacturing_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturing_step_ibfk_1` (`vendor_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_type` (`product_type`);

--
-- Indexes for table `metal`
--
ALTER TABLE `metal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `o_id` (`o_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `polisher_step`
--
ALTER TABLE `polisher_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `polishing_type` (`polishing_type`);

--
-- Indexes for table `polishing_type`
--
ALTER TABLE `polishing_type`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

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
  ADD KEY `s_id` (`s_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `stone`
--
ALTER TABLE `stone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `stone_setter_step`
--
ALTER TABLE `stone_setter_step`
  ADD PRIMARY KEY (`Ssid`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `product_id` (`product_id`);

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
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `item_id` (`item_id`);

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
-- AUTO_INCREMENT for table `inventory_item`
--
ALTER TABLE `inventory_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturing_step`
--
ALTER TABLE `manufacturing_step`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `metal`
--
ALTER TABLE `metal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polisher_step`
--
ALTER TABLE `polisher_step`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `polishing_type`
--
ALTER TABLE `polishing_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasing_details`
--
ALTER TABLE `purchasing_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `returned_item`
--
ALTER TABLE `returned_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `returned_stone_step`
--
ALTER TABLE `returned_stone_step`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `stone`
--
ALTER TABLE `stone`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `stone_setter_step`
--
ALTER TABLE `stone_setter_step`
  MODIFY `Ssid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zircon`
--
ALTER TABLE `zircon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

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
-- Constraints for table `manufacturing_step`
--
ALTER TABLE `manufacturing_step`
  ADD CONSTRAINT `manufacturing_step_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`),
  ADD CONSTRAINT `manufacturing_step_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `manufacturing_step_ibfk_3` FOREIGN KEY (`product_type`) REFERENCES `inventory_item` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `metal`
--
ALTER TABLE `metal`
  ADD CONSTRAINT `metal_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `polisher_step`
--
ALTER TABLE `polisher_step`
  ADD CONSTRAINT `polisher_step_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`),
  ADD CONSTRAINT `polisher_step_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `polisher_step_ibfk_3` FOREIGN KEY (`polishing_type`) REFERENCES `polishing_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `purchasing`
--
ALTER TABLE `purchasing`
  ADD CONSTRAINT `purchasing_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `purchasing_details`
--
ALTER TABLE `purchasing_details`
  ADD CONSTRAINT `purchasing_details_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory_item` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `stock_details_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `stock` (`id`),
  ADD CONSTRAINT `stock_details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory_item` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `stone`
--
ALTER TABLE `stone`
  ADD CONSTRAINT `stone_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `stone_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`),
  ADD CONSTRAINT `stone_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `inventory_item` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `zircon_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`),
  ADD CONSTRAINT `zircon_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `inventory_item` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
