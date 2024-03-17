-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 07:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renew_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT '0.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Plastic', '1.jpg', '2024-03-16 15:32:36', '2024-03-16 15:33:02'),
(2, 'Paper', '2.jpg', '2024-03-16 15:32:36', '2024-03-16 15:33:13'),
(3, 'Glass', 'glass_image_url', '2024-03-16 15:32:36', '2024-03-16 15:32:36'),
(4, 'Metal', 'metal_image_url', '2024-03-16 15:32:36', '2024-03-16 15:32:36'),
(5, 'Organic', 'organic_image_url', '2024-03-16 15:32:36', '2024-03-16 15:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT '0.jpg',
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `user_id`, `category_id`, `name`, `status`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Recyclable Plastic Bottle', '1', 'This plastic can be recycled and used to benefit nature', '1.png', 1500.00, '2016-03-24 04:35:22', '2024-03-16 18:13:09'),
(2, 1, 5, 'Autumn Pitts', '1', 'Commodi consequuntur', '0.jpg', 878.00, '2016-03-24 05:11:50', '2024-03-16 18:23:53'),
(3, 1, 5, 'Lacy Berry', '1', 'Possimus dolore neq', '0.jpg', 36.00, '2016-03-24 05:13:33', '2024-03-16 18:24:46'),
(4, 1, 4, 'Raw Metal', '0', ' Solid Metal', '4.png', 10000.00, '2017-03-24 06:14:13', '2024-03-16 18:14:13'),
(5, 2, 4, 'Soldering Irons', '1', 'Rerum perspiciatis ', '0.jpg', 1100.00, '2017-03-24 06:32:07', '2024-03-16 18:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'avatar1.svg',
  `role` int(100) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `image`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$6P.ITgPLm9k5nbeJeGNnmub78R8xoq72ftncI70EyijggD5rO6C1G', 'avatar1.svg', 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'admin1@gmail.com', '$2y$10$O2dYar.UZ6BGTfAoUOLYKuHA/dD3ykKcFVPX.3Nt.W1yJjhL.RVU.', 'avatar1.svg', 1, '2024-03-16 06:00:00.000000', '2024-03-16 06:00:00.000000'),
(3, 'admin2@gmail.com', '$2y$10$O2dYar.UZ6BGTfAoUOLYKuHA/dD3ykKcFVPX.3Nt.W1yJjhL.RVU.', 'avatar1.svg', 1, '2024-03-16 06:01:00.000000', '2024-03-16 06:01:00.000000'),
(4, 'admin3@gmail.com', '$2y$10$O2dYar.UZ6BGTfAoUOLYKuHA/dD3ykKcFVPX.3Nt.W1yJjhL.RVU.', 'avatar1.svg', 2, '2024-03-16 06:02:00.000000', '2024-03-16 06:02:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
