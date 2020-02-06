-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 01:06 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halime_sultan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'test', 'ds');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `price_after_sale` double DEFAULT NULL,
  `weight` double NOT NULL,
  `sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `price`, `price_after_sale`, `weight`, `sub_category_id`) VALUES
(31, 'itemtest1', 'ds', 12, 2, 135, 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_color`
--

CREATE TABLE `item_color` (
  `id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_color`
--

INSERT INTO `item_color` (`id`, `color`, `item_id`) VALUES
(31, 'red', 31);

-- --------------------------------------------------------

--
-- Table structure for table `item_feadback`
--

CREATE TABLE `item_feadback` (
  `id` int(11) NOT NULL,
  `feadback` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_photo`
--

CREATE TABLE `item_photo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_photo`
--

INSERT INTO `item_photo` (`id`, `name`, `item_id`) VALUES
(4, '10572aed-f940-4872-a4d7-78c0add33176_nav_bar.png', 31),
(6, '5932e887-a0d9-4153-8dee-3e0320a768db_authorization_of_market_place.png', 31);

-- --------------------------------------------------------

--
-- Table structure for table `item_shipping_price`
--

CREATE TABLE `item_shipping_price` (
  `id` int(11) NOT NULL,
  `price` double NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_shipping_price`
--

INSERT INTO `item_shipping_price` (`id`, `price`, `item_id`) VALUES
(4, 12, 31);

-- --------------------------------------------------------

--
-- Table structure for table `item_size`
--

CREATE TABLE `item_size` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_size`
--

INSERT INTO `item_size` (`id`, `size`, `item_id`) VALUES
(35, 'lg', 31),
(39, 'md', 31);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1579945723),
('m130524_201442_init', 1579945725),
('m190124_110200_add_verification_token_column_to_user_table', 1579945725);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `base_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `description`, `base_category_id`) VALUES
(1, 'test', 'ds', 1),
(2, 'test2', 'ds', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transaction_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cost` double NOT NULL,
  `status` enum('success','failed') NOT NULL,
  `card_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `item_weight` double NOT NULL,
  `price` double NOT NULL,
  `user_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  `phone_number` varchar(255) NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `access_token` varchar(255) NOT NULL,
  `picture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `type`, `phone_number`, `verification_code`, `verified`, `access_token`, `picture_id`) VALUES
(1, 'root', 'Amr', 'Abu Aza', '', '$2y$13$xbFbJe68DGP9Tnkg/QW0S.APSPk6UU/EiKCRA4txbZ4BjrxRFCVvO', NULL, 'root@hotmail.com', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin', '', NULL, 0, '', NULL),
(2, 'ahmad', 'ahmad', 'magableh', '', '$2y$13$x8/zRwVRCVVV8fzn6yeAhOCD6Ov6mBeNYM/rNaKsDgB2/8aTG7d/6', NULL, 'ahmad@hotmail.com', 10, '0000-00-00 00:00:00', '2020-02-05 17:53:15', 'admin', '12', NULL, 0, '', NULL),
(11, 'amr', '', '', 'lxf3K6F11p-nYm636rChXnoOZgmsWBCf9f92ce1b-a789-4c0f-a39d-b6ff51c623ce', '$2y$13$pvr7LFezPOvxQiQ1BdYr7uv8UW8z7AYiQ4fxCU4/GxaFN6PtQZGbm', NULL, 'amr@hotmail.com', 10, '2020-02-01 01:10:48', '2020-02-01 17:27:31', 'user', '12', NULL, 1, '7YtgoXcgopX_QC6rEEJt4paXX3NbUZDZ3a12826f-2fcf-4433-a810-26620739016c', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `building_number_or_name` varchar(255) NOT NULL,
  `floor_number` int(11) NOT NULL,
  `apartment_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `status` enum('inprogress','inTheWay','delivered','canceled') NOT NULL,
  `total` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_address_id` int(11) NOT NULL,
  `promo_code_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `transfer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_order_hestory`
--

CREATE TABLE `user_order_hestory` (
  `id` int(11) NOT NULL,
  `status` enum('inprogress','inTheWay','delivered','canceled') NOT NULL,
  `total` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_address_id` int(11) NOT NULL,
  `promo_code_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `transfer_id` int(11) NOT NULL,
  `user_order_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_item_sub_category` (`sub_category_id`);

--
-- Indexes for table `item_color`
--
ALTER TABLE `item_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_item_color_item` (`item_id`);

--
-- Indexes for table `item_feadback`
--
ALTER TABLE `item_feadback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_item_feadback_item` (`item_id`),
  ADD KEY `con_item_feadback_order` (`order_id`);

--
-- Indexes for table `item_photo`
--
ALTER TABLE `item_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_item_photo_item` (`item_id`);

--
-- Indexes for table `item_shipping_price`
--
ALTER TABLE `item_shipping_price`
  ADD PRIMARY KEY (`id`,`item_id`),
  ADD KEY `con_item_shipping_item` (`item_id`);

--
-- Indexes for table `item_size`
--
ALTER TABLE `item_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_item_size_item` (`item_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_order_items_item` (`item_id`),
  ADD KEY `con_user_items_user_order` (`order_id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_sub_category_base_category` (`base_category_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_transaction_user` (`user_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_transfer_user` (`user_address_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_user_address_user` (`user_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_user_order_promo_code` (`promo_code_id`),
  ADD KEY `con_user_order_transaction` (`transaction_id`),
  ADD KEY `con_user_order_transfer` (`transfer_id`),
  ADD KEY `con_user_order_user_address` (`user_address_id`),
  ADD KEY `con_user_order_user` (`user_id`);

--
-- Indexes for table `user_order_hestory`
--
ALTER TABLE `user_order_hestory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_user_order_hestory_promo_code` (`promo_code_id`),
  ADD KEY `con_user_order_hestory_transaction` (`transaction_id`),
  ADD KEY `con_user_order_hestory_transfer` (`transfer_id`),
  ADD KEY `con_user_order_hestory_user` (`user_id`),
  ADD KEY `con_user_order_hestory_user_address` (`user_address_id`),
  ADD KEY `con_user_order_hestory_user_order` (`user_order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `item_color`
--
ALTER TABLE `item_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `item_feadback`
--
ALTER TABLE `item_feadback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_photo`
--
ALTER TABLE `item_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_shipping_price`
--
ALTER TABLE `item_shipping_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_size`
--
ALTER TABLE `item_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_order_hestory`
--
ALTER TABLE `user_order_hestory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `con_item_sub_category` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_color`
--
ALTER TABLE `item_color`
  ADD CONSTRAINT `con_item_color_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_feadback`
--
ALTER TABLE `item_feadback`
  ADD CONSTRAINT `con_item_feadback_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_item_feadback_order` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_photo`
--
ALTER TABLE `item_photo`
  ADD CONSTRAINT `con_item_photo_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_shipping_price`
--
ALTER TABLE `item_shipping_price`
  ADD CONSTRAINT `con_item_shipping_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_size`
--
ALTER TABLE `item_size`
  ADD CONSTRAINT `con_item_size_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `con_order_items_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_items_user_order` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `con_sub_category_base_category` FOREIGN KEY (`base_category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `con_transaction_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `con_transfer_user` FOREIGN KEY (`user_address_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `con_user_address_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `con_user_order_promo_code` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_code` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_order_transaction` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_order_transfer` FOREIGN KEY (`transfer_id`) REFERENCES `transfer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_order_user_address` FOREIGN KEY (`user_address_id`) REFERENCES `user_address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_order_hestory`
--
ALTER TABLE `user_order_hestory`
  ADD CONSTRAINT `con_user_order_hestory_promo_code` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_code` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `con_user_order_hestory_transaction` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `con_user_order_hestory_transfer` FOREIGN KEY (`transfer_id`) REFERENCES `transfer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `con_user_order_hestory_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `con_user_order_hestory_user_address` FOREIGN KEY (`user_address_id`) REFERENCES `user_address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `con_user_order_hestory_user_order` FOREIGN KEY (`user_order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
