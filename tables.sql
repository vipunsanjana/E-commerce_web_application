-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 02:04 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(3, 'admin', 'admin@gmail.com', '$2y$10$Jm2pzhJpGPynCQbarHPIu.JEmTwaCqhLAUfK0NIXZ23ZSe2VlPqWK');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, '0.00', 'shipped', 1, 0, 'ssssssssssssssss', 'aaa', '2023-09-23 21:06:59'),
(2, '2333.00', 'not paid', 1, 0, 'ccccccccccccccccc', 'fewgfe', '2023-09-23 21:40:45'),
(3, '2333.00', 'not paid', 1, 0, 'ccccccccccccccccc', 'fewgfe', '2023-09-23 21:41:16'),
(4, '2333.00', 'not paid', 1, 0, 'ccccccccccccccccc', 'fewgfe', '2023-09-23 21:41:44'),
(5, '2333.00', 'paid', 1, 0, 'ssssssssssssssss', 'fewgfe', '2023-09-23 23:30:25'),
(6, '2456.00', 'not paid', 1, 0, 'ddddddddd', 'fewgfe', '2023-09-24 10:38:56'),
(7, '0.00', 'shipped', 1, 0, 'ssssssssssssssss', 'fewgfe', '2023-09-24 14:46:15'),
(8, '933.00', 'paid', 1, 0, 'ssssssssssssssss', 'fewgfe', '2023-09-24 21:47:01'),
(9, '123.00', 'not paid', 6, 0, 'ssssssssssssssss', 'fewgfe', '2023-09-24 22:19:59'),
(12, '123.00', 'paid', 1, 0, 'ssssssssssssssss', 'fewgfe', '2023-09-27 10:00:22'),
(13, '933.00', 'paid', 7, 0, 'ssssssssssssssss', 'dddddddd', '2023-09-30 11:25:32'),
(14, '1689.00', 'not paid', 8, 0, 'ssssssssssssssss', 'fewgfe', '2023-09-30 15:43:17'),
(15, '123.00', 'paid', 7, 0, 'ccccccccccccccccc', 'dddddddd', '2023-10-06 06:39:59'),
(16, '123.00', 'paid', 10, 777, ' nm ', 'ddd', '2023-12-02 15:11:26'),
(17, '563.00', 'not paid', 13, 1231, ' bv', 'wvvcr', '2024-01-07 16:40:35'),
(18, '563.00', 'not paid', 13, 21321, 'b  ', 'n', '2024-01-07 16:41:13'),
(19, '123.00', 'not paid', 14, 5345, 'wdv', 'hwveh', '2024-01-27 18:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quatity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quatity`, `user_id`, `order_date`) VALUES
(1, 4, 2, 'laptop', 'logo.png', '2333.00', 1, 1, '2023-09-23 21:41:44'),
(2, 5, 2, 'laptop', 'logo.png', '2333.00', 1, 1, '2023-09-23 23:30:25'),
(3, 6, 1, 'pc', 'one.avif', '123.00', 1, 1, '2023-09-24 10:38:56'),
(4, 6, 2, 'laptop', 'logo.png', '2333.00', 1, 1, '2023-09-24 10:38:56'),
(5, 7, 1, 'pc', 'one.avif', '123.00', 1, 1, '2023-09-24 14:46:15'),
(6, 8, 2, 'laptop', 'logo.png', '933.00', 1, 1, '2023-09-24 21:47:01'),
(7, 9, 1, 'pc', 'one.avif', '123.00', 1, 6, '2023-09-24 22:19:59'),
(8, 10, 1, 'pc', 'one.avif', '123.00', 1, 1, '2023-09-25 21:06:55'),
(9, 11, 2, 'laptop', 'logo.png', '933.00', 1, 1, '2023-09-26 10:51:39'),
(10, 12, 4, 'pc', 'one.avif', '123.00', 1, 1, '2023-09-27 10:00:22'),
(11, 13, 11, 'laptop', 'logo.png', '933.00', 1, 7, '2023-09-30 11:25:32'),
(12, 14, 3, 'laptop', 'laptop1.jpeg', '563.00', 3, 8, '2023-09-30 15:43:17'),
(13, 15, 4, 'pc', 'one.avif', '123.00', 1, 7, '2023-10-06 06:39:59'),
(14, 16, 7, 'pc', 'one.avif', '123.00', 1, 10, '2023-12-02 15:11:26'),
(15, 17, 3, 'laptop', 'laptop1.jpeg', '563.00', 1, 13, '2024-01-07 16:40:35'),
(16, 18, 3, 'laptop', 'laptop1.jpeg', '563.00', 1, 13, '2024-01-07 16:41:13'),
(17, 19, 15, 'pc', 'one.avif', '123.00', 1, 14, '2024-01-27 18:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `user_id`, `transaction_id`, `payment_date`) VALUES
(1, 10, 1, '7FS58243WM238772K', '2023-09-26 10:39:15'),
(2, 8, 1, '2A190559ME1224602', '2023-09-26 10:40:09'),
(3, 5, 1, '79B94367PJ4377228', '2023-09-26 10:41:39'),
(4, 11, 1, '1HB16744CC381994P', '2023-09-26 22:02:53'),
(5, 12, 1, '52U39839NW6893333', '2023-09-27 10:02:40'),
(6, 13, 7, '23J63367K2002993A', '2023-09-30 11:29:15'),
(7, 15, 7, '9YV40814M1865842C', '2023-10-06 06:40:26'),
(8, 16, 10, '7DV04472V5033793U', '2023-12-02 15:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(11) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(3, 'laptop', 'laptop', 'laptop', 'laptop1.jpeg', 'laptop2.jpeg', 'laptop3.jpeg', 'laptop4.jpeg', '563.00', 2000, 'black'),
(4, 'pc', 'pc', 'pc', 'one.avif', 'one.avif', 'one.avif', 'one.avif', '123.00', 120, 'black'),
(7, 'pc', 'pc', 'pc', 'one.avif', 'one.avif', 'one.avif', 'one.avif', '123.00', 120, 'black'),
(8, 'laptop', 'laptop', 'laptop', 'logo.png', 'logo.png', 'logo.png', 'logo.png', '933.00', 2000, 'black'),
(14, 'laptop', 'pc', 'laptop', 'laptop1.jpeg', 'laptop2.jpeg', 'laptop3.jpeg', 'laptop4.jpeg', '563.00', 2000, 'white'),
(15, 'pc', 'pc', 'pc', 'one.avif', 'one.avif', 'one.avif', 'one.avif', '123.00', 120, 'black'),
(17, 'laptop', 'pc', 'fgggg', 'logo.png', 'logo.png', 'logo.png', 'logo.png', '563.00', 2000, 'black djxvnj'),
(18, 'pc', 'pc', 'pc', 'one.avif', 'one.avif', 'one.avif', 'one.avif', '123.00', 120, 'black'),
(19, 'laptop', 'laptop', 'laptop', 'logo.png', 'logo.png', 'logo.png', 'logo.png', '933.00', 2000, 'black'),
(20, 'laptop', 'laptop', 'laptop', 'logo.png', 'logo.png', 'logo.png', 'logo.png', '563.00', 2000, 'black'),
(21, '', '', '', '', NULL, '', '', '0.00', 0, ''),
(22, 'laptop', 'laptop', 'laptop', 'logo.png', 'logo.png', 'logo.png', 'logo.png', '933.00', 2000, 'black'),
(23, 'laptop', 'laptop', 'laptop', 'logo.png', 'logo.png', 'logo.png', 'logo.png', '563.00', 2000, 'black'),
(24, 'laptop', 'laptop', 'laptop', 'logo.png', 'logo.png', 'logo.png', 'logo.png', '933.00', 2000, 'black'),
(26, 'pv dxvd', 'pc', 'hdvbzh zhvhdsb hzbvjhsbd zbhjvbshzb fffffffffffffffffffffffffffffffffffffffff', 'pv dxvd1.jpeg', 'pv dxvd2.jpeg', 'pv dxvd3.jpeg', 'pv dxvd4.jpeg', '1233.00', 1222, 'black djxvnj eeeeeee');

-- --------------------------------------------------------

--
-- Table structure for table `pwd_reset`
--

CREATE TABLE `pwd_reset` (
  `id` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `token` longtext NOT NULL,
  `expires` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(2, 'vipunddddd', 'vipunsvvvanjana34@gmail.com', '$2y$10$qsT0SyHvTRvXYm6Np5s8C.kirT/4puFGXLJvCQX2nqjSWQlUS6NQ.'),
(3, 'new_one', 'vipunsanjqqqana34@gmail.com', '$2y$10$wKL7z0DGeIaKnNZLOI8gv.qQl62TzOpKhInVpuO.yg3.OyoMf1zam'),
(4, 'new_one', 'vipunsanjqqqssana34@gmail.com', '$2y$10$nDDM2nqQAPYOimrMD6twI.s8fU6utuKSOHnVw3GKbkxw2OMXafQLK'),
(5, 'day_one', 'idno22382@gmail.com', '$2y$10$vmKAeDkO1bFpkkaHFVwlRuTpbUiHWH26tp0mY9UNf/BkJwaH2XWVe'),
(6, 'vipun', 'fdnfgjnj@gmail.com', '$2y$10$wd.qpJbxapX37yu2gGU6Vu0DRsl5DjnlwsOnhuq2i288GsoPzA3l.'),
(7, 'vipun', 'vipunsanjana34@gmail.com', '$2y$10$9Lb8J2yrRPREJ5lli6LSOOfAH3.bvbgXS7Uww5Jgp5aKVOGVcu4Tq'),
(9, 'vipun', 'vipunsanjacccccna34@gmail.com', '$2y$10$n1YZZG0FWdYPUBdeMrXASOgF4sifmenX/ZcQIzo4lArdZZtlzkB3G'),
(10, 'vipun', 'vipunggggsanjana34@gmail.com', '$2y$10$EFskjZzzXtjJ7kVDnK1ysO7mppoxmberuv5TOursQaDdxYGjVJT/S'),
(11, 'vipun', 'idno22fbbbbbbb382@gmail.com', '$2y$10$yk3e96jD3cmFNL8aFpxevuCBd4DQhjoFSTcVW//Xbrtsr21hGYbXy'),
(12, 'vipun', 'vipunsanjana34f@gmail.com', '$2y$10$D6jC4Gpd/JgSTQ8UdWUJh.uCH1/HzSf8Ca4oXfchzSirQdXvhXKWa'),
(13, 'vipun', 'vipunsanjana444444@gmail.com', '$2y$10$8J/2b49tQizPoyrfvg6z8.zwZFZ1kIgFkvnd9WziNhInb1ZMHdHlq'),
(14, 'qhsgchj', 'csfqsg@gmail.com', '$2y$10$L7z3VwjhotWEpckbTFeWkuUNi5X/MheO.ls.L45aJo63K2yUac3Iu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pwd_reset`
--
ALTER TABLE `pwd_reset`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
