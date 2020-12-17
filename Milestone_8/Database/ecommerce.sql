-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2020 at 06:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'human@cord.edu', 'Human');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `comment_status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `product_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `comment_status`, `date`) VALUES
(72, 16, 0, 'dbskjckdahjsbvncjknjsbdvkjbfh', 'shristi', 'Approved', '2020-12-16 04:41:43'),
(73, 21, 0, 'lcbsdhcbkjdsbvhbnsdjbvgasdvchbsdhjc', 'trey', 'Approved', '2020-12-16 04:42:04'),
(74, 21, 0, 'udgsvfchjklhbdhjsvcdgjsvchdjsv', 'gyanendra', 'Approved', '2020-12-16 04:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` bigint(20) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `country` text NOT NULL,
  `department` text NOT NULL,
  `feedbackType` text NOT NULL,
  `wayOfContact` text NOT NULL,
  `message` text NOT NULL,
  `receiveNotifications` text NOT NULL,
  `resolve_status` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `firstName`, `lastName`, `email`, `phone`, `country`, `department`, `feedbackType`, `wayOfContact`, `message`, `receiveNotifications`, `resolve_status`, `date`) VALUES
(68, 'Shristi', 'Chapagain', 'schapaga@cord.edu', '234567890', 'United States', 'Sales', 'Complaint', 'Email, Phone', 'afkbdjcbasdkjvnasjkfbnvkbdfanklsnvbfadbsvdnjnfajkdbnvlknfsjkv', 'disagrees', 'NotResolved', '2020-12-15'),
(69, 'asvchjaDJB', '', 'gkarn@cord.edu', '35678987654', 'Anguilla', 'Technical', 'Complaint', 'Email', 'aslkjhvchjalkJSCNBKJDHSVBVNJKSD VN', 'agrees', 'NotResolved', '2020-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES
(12, '::1', 'Lindsay J Schneider', 'gkarn@cord.edu', 'Babe', 'United States of America', 'Moorhead', '3453345324', '42045140_716973291988754_2654171114686644224_o.jpg', '901 8th St. S');

-- --------------------------------------------------------

--
-- Table structure for table `kids`
--

CREATE TABLE `kids` (
  `kids_id` int(100) NOT NULL,
  `kids_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`kids_id`, `kids_title`) VALUES
(9, 'Shirts'),
(10, 'Pants'),
(11, 'Dress'),
(12, 'Undergarments'),
(13, 'Shoes'),
(14, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `men`
--

CREATE TABLE `men` (
  `men_id` int(100) NOT NULL,
  `men_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `men`
--

INSERT INTO `men` (`men_id`, `men_title`) VALUES
(17, 'Shirts'),
(18, 'Pants'),
(19, 'Dress'),
(20, 'Undergarments'),
(21, 'Shoes'),
(22, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_men` int(100) NOT NULL,
  `product_women` int(100) NOT NULL,
  `product_kids` int(100) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_descrip` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_men`, `product_women`, `product_kids`, `product_title`, `product_price`, `product_descrip`, `product_image`, `product_keywords`) VALUES
(16, 17, 0, 0, 'Shirt', 200, '<p>sfsd</p>', 'shirt.jpg', 'sfs'),
(17, 18, 0, 0, 'Pant', 325, '<p>sdfd</p>', 'pants.jpg', 'sdf'),
(18, 19, 0, 0, 'Dress', 500, '<p>dfgd</p>', 'mendress.jpg', 'sd'),
(19, 0, 11, 0, 'Shirt', 350, '<p>fdf</p>', 'womenshirt.jpg', 'dsd'),
(20, 0, 12, 0, 'Pant', 320, '<p>sdfsd</p>', 'womenpant.jpg', 'sdf'),
(21, 0, 13, 0, 'Dress', 725, '<p>sdfsdf</p>', 'womennewarrival.jpg', 'fsd'),
(22, 0, 0, 9, 'Shirt', 200, '<p>sdfsdf</p>', 'kidshirt.jpg', 'fsdf'),
(23, 0, 0, 10, 'Pant', 180, '<p>sdfsf</p>', 'kidpant.jpg', 'fsd'),
(24, 0, 0, 11, 'Dress', 320, '<p>dg</p>', 'kidsdress.jpg', 'dfg');

-- --------------------------------------------------------

--
-- Table structure for table `scart`
--

CREATE TABLE `scart` (
  `pr_id` int(10) NOT NULL,
  `ip_addr` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scart`
--

INSERT INTO `scart` (`pr_id`, `ip_addr`, `qty`) VALUES
(2, '::1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `home_address` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `email`, `home_address`, `phone`, `password`) VALUES
(46, 'aa', 'aa', 'aa', 'aa@aa', '', '', '$2y$10$nUz3FuZHxv8zr8RhPy2SLOnBgCZnu/AuZQYOBpK1JuAxXFcEcBt2u'),
(47, 'bb', 'bb', 'bb', 'bb@bb', '', '', '$2y$10$EWx4qHO3qKV4/ew9rjThqOkUgpNQ2thMuHjhrAxP.lOUWZd1liTqm'),
(48, 'ss', 'kbschugv dhjk;ckljfbev', 'ss', 'ss@ss', '', '', '$2y$10$4Z77CBEKGvjgGB7XMX.n6OOEAtfTeGSW12V/AAtfix2bQ5GNEc.06'),
(49, 'bbb', '', 'bb', 'bbb@bbb', '', '', '$2y$10$Gxja6BdXxLP77eQtbxPjGOzlDH1IGm0IC8WVZVlOSMZcSnFyXGngW');

-- --------------------------------------------------------

--
-- Table structure for table `women`
--

CREATE TABLE `women` (
  `women_id` int(100) NOT NULL,
  `women_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `women`
--

INSERT INTO `women` (`women_id`, `women_title`) VALUES
(11, 'Shirts'),
(12, 'Pants'),
(13, 'Dress'),
(14, 'Undergarments'),
(15, 'Shoes'),
(16, 'Accessories');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `kids`
--
ALTER TABLE `kids`
  ADD PRIMARY KEY (`kids_id`);

--
-- Indexes for table `men`
--
ALTER TABLE `men`
  ADD PRIMARY KEY (`men_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `scart`
--
ALTER TABLE `scart`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `women`
--
ALTER TABLE `women`
  ADD PRIMARY KEY (`women_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kids`
--
ALTER TABLE `kids`
  MODIFY `kids_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `men`
--
ALTER TABLE `men`
  MODIFY `men_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `women`
--
ALTER TABLE `women`
  MODIFY `women_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
