-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2019 at 07:19 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanced_mobile_store_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobile_admin`
--

CREATE TABLE `mobile_admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_admin`
--

INSERT INTO `mobile_admin` (`username`, `password`, `type`) VALUES
('admin', '1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_brands`
--

CREATE TABLE `mobile_brands` (
  `brand_id` int(3) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_brands`
--

INSERT INTO `mobile_brands` (`brand_id`, `brand_name`) VALUES
(4, 'Realme'),
(5, 'Xaomi'),
(6, 'Vivo'),
(7, 'Oppo');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_orders`
--

CREATE TABLE `mobile_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `quantity` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_orders`
--

INSERT INTO `mobile_orders` (`order_id`, `user_id`, `product_id`, `date`, `quantity`) VALUES
(88, 12, '60', 'Jul,12,2019 12:37:39 PM', '2'),
(89, 12, '53', 'Jul,12,2019 12:47:43 PM', '1'),
(83, 12, '60,53', 'Jul,09,2019 02:47:56 PM', '1,1'),
(81, 17, '59', 'Jul,07,2019 06:06:37 PM', '1'),
(79, 13, '36', 'Jul,06,2019 05:36:31 PM', '2'),
(87, 18, '39', 'Jul,11,2019 07:57:44 PM', '2');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_products`
--

CREATE TABLE `mobile_products` (
  `prod_id` int(3) NOT NULL,
  `brand_id` int(3) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_price` varchar(11) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `prod_img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_products`
--

INSERT INTO `mobile_products` (`prod_id`, `brand_id`, `prod_name`, `prod_price`, `prod_desc`, `prod_img`) VALUES
(36, 5, 'Redmi Note 7 Pro (Space Black, 64 GB)  (4 GB RAM)', '13999', '4 GB RAM | 64 GB ROM | Expandable up to 256 GB.<br>\r\n16.0 cm (6.3 inch) FHD+ Display.<br>\r\n48MP + 5MP | 13MP Front Camera.<br>\r\n4000 mAh Li-polymer Battery.\r\n', '190618045408.jpeg,190618045409.jpeg,190618045410.jpeg'),
(53, 5, 'Redmi Note 7 Pro (Nebula Red, 64 GB) (4 GB RAM)', '15999', 'Xaomi	4 GB RAM | 64 GB ROM | Expandable Upto 256 GB.<br>\r\n16.0 cm (6.3 inch) FHD+ Display.<br>\r\n48MP + 5MP | 13MP Front Camera.<br>\r\n4000 mAh Li-polymer Battery.<br>\r\nQualcomm Snapdragon 675 Processor', '190620054412.jpeg,190620054413.jpeg,190620054414.jpeg'),
(38, 4, 'Realme 3 Pro (Lightning Purple, 64 GB)  (6 GB RAM)', '15999', '6 GB RAM | 64 GB ROM | Expandable Upto 256 GB.<br>\r\n16.0 cm (6.3 inch) FHD+ Display.<br>\r\n16MP + 5MP | 25MP Front Camera.<br>\r\n4045 mAh Battery.<br>\r\nQualcomm Snapdragon 710 Octa Core 2.2 GHz AIE Processor', '190618053516.jpeg,190618053517.jpeg,190618053518.jpeg'),
(39, 7, 'OPPO A3s (Lavish Purple, 64 GB)  (4 GB RAM) ', '9990', '4 GB RAM | 64 GB ROM | Expandable Upto 256 GB.<br>\r\n15.75 cm (6.2 inch) HD+ Display.<br>\r\n13MP + 2MP | 8MP Front Camera.<br>\r\n4230 mAh Battery.<br>\r\nQualcomm Snapdragon 450 Processor', '190618053616.jpeg,190618053617.jpeg,190618053618.jpeg'),
(41, 5, 'Redmi Note 7S (Sapphire Blue, 32 GB)  (3 GB RAM)', '10999', '3 GB RAM | 32 GB ROM | Expandable Upto 256 GB.<br>\r\n16.0 cm (6.3 inch) FHD+ Display.<br>\r\n48MP + 5MP | 13MP Front Camera.<br>\r\n4000 mAh Battery\r\n', '190618054053.jpeg,190618054054.jpeg,190618054055.jpeg'),
(43, 4, 'Realme 3 Pro (Nitro Blue, 64 GB)  (4 GB RAM)', '10999', '4 GB RAM | 64 GB ROM | Expandable Upto 256 GB.<br>\r\n16.0 cm (6.3 inch) FHD+ Display.<br>\r\n16MP + 5MP | 25MP Front Camera.<br>\r\n4045 mAh Battery.<br>\r\nQualcomm Snapdragon 710 Octa Core 2.2 GHz AIE Processor', '190619013841.jpeg,190619013842.jpeg,190619013843.jpeg'),
(59, 6, 'Vivo Y91 (Nebula Purple, 32 GB)  (3 GB RAM)', '9900', '3 GB RAM | 32 GB ROM | Expandable Upto 256 GB.<br>\n15.8 cm (6.22 inch) HD+ Display.<br>\n13MP + 2MP | 8MP Front Camera\n4030 mAh Battery.<br>\nQualcomm Snapdragon 439 Processor', '190706125324.jpeg,190706125325.jpeg'),
(60, 6, 'Vivo Y15 (Aqua Blue, 64 GB)  (4 GB RAM)', '13990', '4 GB RAM | 64 GB ROM | Expandable Upto 256 GB.<br>\n16.13 cm (6.35 inch) HD+ Display.<br>\n13MP + 2, 8MP | 16MP Front Camera.<br>\n5000 mAh Battery\nMediaTek Helio P22 Processor', '190706125856.jpeg,190706125857.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_users`
--

CREATE TABLE `mobile_users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_users`
--

INSERT INTO `mobile_users` (`user_id`, `name`, `gender`, `email`, `contact`, `address`, `city`, `pincode`, `user_name`, `password`) VALUES
(12, 'Neelam Chaubey', 'Female', 'neelamchaubey28@gmail.com', '08208312971', '2A/101, Shiv Shakti Darshan, Hanuman Nagar, Nalasopara(W)', 'Mumbai', '401203', 'neelam', 'Neel@1996'),
(13, 'Ritika Singh', 'Female', 'ritika@gmail.com', '9876543210', 'B/204, Bhagyoday Complex, Hanuman Nagar, Nalasopara(W), 401203', 'Mumbai', '401203', 'ritika', 'Ritika@123'),
(17, 'Laxmi ', 'Female', 'laxmi@gmail.com', '1234567890', 'Nalasopara', 'Mumbai', '123456', 'laxmi', 'Laxmi@123'),
(16, 'Sumit Singh', 'Male', 'sumit@gmail.com', '7894561230', 'Bhayandar', 'Mumbai', '789456', 'Sumit', 'Sumit@1234'),
(18, 'Gong Yoo', 'Male', 'gong@gmail.com', '9876543210', 'South Korea', 'Seoul', '123456', 'gong', 'Gong@1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobile_brands`
--
ALTER TABLE `mobile_brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `mobile_orders`
--
ALTER TABLE `mobile_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `mobile_products`
--
ALTER TABLE `mobile_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `mobile_users`
--
ALTER TABLE `mobile_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_name_2` (`user_name`),
  ADD UNIQUE KEY `user_name_3` (`user_name`),
  ADD UNIQUE KEY `user_name_4` (`user_name`),
  ADD UNIQUE KEY `email_2` (`email`,`contact`,`user_name`),
  ADD UNIQUE KEY `email_4` (`email`,`contact`,`user_name`),
  ADD UNIQUE KEY `user_name_6` (`user_name`),
  ADD KEY `user_name_5` (`user_name`),
  ADD KEY `email_3` (`email`,`contact`,`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobile_brands`
--
ALTER TABLE `mobile_brands`
  MODIFY `brand_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mobile_orders`
--
ALTER TABLE `mobile_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `mobile_products`
--
ALTER TABLE `mobile_products`
  MODIFY `prod_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `mobile_users`
--
ALTER TABLE `mobile_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
