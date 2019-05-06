-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 11:46 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_code`, `product_name`, `product_desc`, `price`, `units`, `total`, `date`, `email`) VALUES
(34, 'BOLT2', 'Running Shoes', 'For More Comfort Running an perfect price.', 650, 3, 1950, '2018-04-25 08:09:50', 'mirna'),
(35, 'BOLT2', 'Running Shoes', 'For More Comfort Running an perfect price.', 650, 50, 32500, '2018-04-25 08:10:48', 'mirna'),
(33, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 1, 200, '2018-04-23 13:00:25', 'mirna');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'BOLT1', 'Sports Shoes', 'Sportive Shoes that allow you to play in comfort way.', 'images\\products\\sports_shoes.jpg', 20, '500.00'),
(5, 'BOLT2', 'Running Shoes', 'For More Comfort Running an perfect price.', 'images\\products\\sh5.jpg	', 50, '650.00'),
(6, 'BOLT3', 'Pink Shoes', 'For Perfect Running and walking.', 'images\\products\\sh6.jpg	', 50, '250.00'),
(7, 'BOLT4', 'Grey Cap', 'Provided with perfect matirial.', 'images\\products\\cap9.jpg', 50, '150.00'),
(8, 'BOLT5', 'Cap', 'We Provide for you perfect materials.', 'images\\products\\cap8.jpg', 50, '200.00'),
(9, 'BOLT6', 'Cap', 'Provided with best materials for you .', 'images\\products\\cap7.jpg', 50, '350.00'),
(10, 'BOLT7', 'Polo T-shirt', 'Sports T-shirt ', 'images\\products\\shirt1.png', 50, '600.00'),
(11, 'BOLT8', 'Grey T-shirt', 'Sports T-shirt ', 'images\\products\\shirt2.jpg', 50, '350.00'),
(12, 'BOLT9', 'Red T-shirt', 'Sports T-shirt ', 'images\\products\\shirt3.jpg', 50, '400.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `address` varchar(60) NOT NULL,
  `phonenum` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `address`, `phonenum`, `email`, `password`, `type`) VALUES
(109, 'admin1', 'Haram', '0123456789', 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'admin'),
(113, 'mirna', 'El-Haram', '01116923145', 'mirnamourad411@gmail.com', '10c248ba417154af2bcbe85b58f86446', 'user'),
(114, 'mayar', 'Gisr El-Swis', '012000000000', 'maiarmostafa98@gmail.com', '9e2b4e0d138a868e32b6f3486b77ed82', 'user'),
(115, 'hazem', 'aaa', '012346852', 'hazem@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(116, 'Ashrakat', 'Masr El-Gdida', '011208745678', 'ashrakat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
