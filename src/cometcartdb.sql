-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 06:42 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cometcartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'School supplies'),
(3, 'Electronics'),
(4, 'Dorm Equipment'),
(5, 'School Merchandise');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_address`, `customer_ip`, `user_type`) VALUES
(1, 'admin', 'admin@cometcart.com', '123', '1234567890', 'utd', '', 0),
(2, 'user', 'user@gmail.com', '123', '0092334566931', 'new york', '::1', 1),
(3, 'lady gaga', 'gaga@gaga.com', 'gaga', '1234567890', 'dfgsdfg', '', 1),
(4, 'John', 'john@123.com', 'dada', '1234567890', 'UTD', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `cust_id`, `due_amount`, `invoice_no`, `qty`, `order_date`) VALUES
(22, 2, 600, 1474092797, 3, '2020-12-06 11:29:28'),
(23, 2, 0, 1667486349, 0, '2020-12-06 13:01:42'),
(24, 2, 98, 448311290, 1, '2020-12-06 13:03:40'),
(25, 3, 450, 86780215, 3, '2020-12-06 17:35:37'),
(26, 3, 4, 1463378372, 1, '2020-12-07 03:27:23'),
(27, 1, 80, 81608171, 4, '2020-12-07 03:44:43'),
(28, 3, 120, 982522660, 4, '2020-12-07 05:24:43'),
(29, 4, 140, 1744531397, 2, '2020-12-07 05:33:53'),
(30, 1, 80, 1581253198, 1, '2020-12-07 05:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `cust_id`, `invoice_no`, `product_id`, `qty`) VALUES
(16, 2, 1715523401, '2', 3),
(17, 2, 1715523401, '9', 2),
(18, 2, 1715523401, '11', 1),
(19, 2, 1068059025, '7', 1),
(20, 2, 909940689, '6', 3),
(21, 2, 909940689, '11', 2),
(22, 2, 1474092797, '11', 3),
(23, 2, 1667486349, '9', 0),
(24, 2, 448311290, '3', 1),
(25, 3, 86780215, '7', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` text NOT NULL,
  `img` text NOT NULL,
  `price` int(10) NOT NULL,
  `url` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `date`, `title`, `img`, `price`, `url`, `status`) VALUES
(15, 4, '2020-12-07 03:32:05', 'UTD Blanket', 'Blanket.jpg', 20, 'utd-blanket', 1),
(16, 4, '2020-12-07 04:23:51', 'UTD coffee mug - 2 Pack', 'Mug.jpg', 30, 'cfee-mug', 1),
(17, 4, '2020-12-07 03:33:44', 'UTD Stickersheet', 'Stickersheet.jpg', 5, 'utd-sticksheet', 1),
(18, 4, '2020-12-07 03:34:16', 'UTD Water bottle', 'Tumbler.jpg', 15, 'utd-tmblr', 1),
(19, 4, '2020-12-07 03:34:56', 'Wireless charger', 'Wireless-charger.jpg', 15, 'wrless-chrgr', 1),
(20, 3, '2020-12-07 03:35:32', 'Apple Airpods', 'Airpods.jpg', 80, 'appl-airpods', 1),
(21, 3, '2020-12-07 03:36:02', 'Apple watch', 'Apple-watch.jpg', 150, 'appl-wtch', 1),
(22, 3, '2020-12-07 03:36:31', 'Apple iPad', 'Ipad.jpg', 200, 'appl-ipad', 1),
(23, 3, '2020-12-07 03:36:57', '1080p Monitor', 'Monitor.jpg', 60, 'monitor', 1),
(24, 3, '2020-12-07 03:37:28', 'Gaming mouse', 'Mouse.jpg', 70, 'gmg-mouse', 1),
(25, 5, '2020-12-07 03:38:09', 'UTD Sackpack', 'Sackpack.jpg', 20, 'utd-sckpck', 1),
(26, 5, '2020-12-07 03:38:44', 'UTD hat', 'UTD-Cap.jpg', 25, 'utd-hat', 1),
(27, 5, '2020-12-07 03:39:11', 'UTD insignia hoodie', 'UTD-hoodie.jpg', 50, 'utd-hoodie', 1),
(28, 5, '2020-12-07 03:39:42', 'UTD Sweatshirt', 'UTD-Sweatshirt.jpg', 80, 'utd-ss', 1),
(29, 5, '2020-12-07 03:40:10', 'UTD T-shirt', 'UTD-T-shirt.jpg', 25, 'utd-tee', 1),
(30, 2, '2020-12-07 03:40:47', 'UTD Bookmark', 'Bookmark.jpg', 10, 'utd-bkmk', 1),
(31, 2, '2020-12-07 03:41:19', 'UTD Journal', 'Journal.jpg', 20, 'utd-jrnl', 1),
(32, 2, '2020-12-07 03:41:45', 'UTD notepad', 'Notepad.jpg', 15, 'utd-ntpd', 1),
(33, 2, '2020-12-07 03:42:13', 'UTD Ball-point pen', 'Pen.jpg', 25, 'utd-pen', 1),
(34, 2, '2020-12-07 03:42:37', 'UTD Pen Holder', 'Pen-stand.jpg', 30, 'utd-penstand', 1),
(35, 3, '2020-12-07 05:35:49', 'TI calculator', '682px-TI-81_Calculator_on_Graph_Screen.jpg', 80, 'ti-calculate', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
