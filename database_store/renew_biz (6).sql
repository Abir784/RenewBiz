-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 06:16 AM
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
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_industry` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `user_id`, `name`, `address`, `phone_number`, `business_name`, `business_industry`, `created_at`, `updated_at`) VALUES
(1, 2, 'Jerry Booker', 'Anim itaque omnis re', '6546512', 'Basia Townsend', 'Dolor aliquam ration', '2027-04-23 19:00:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buyer_feedback`
--

CREATE TABLE `buyer_feedback` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT '0.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Plastic', '1.png', '2024-04-27 06:14:27', '2024-04-27 06:20:12'),
(2, 'Metal', '2.jpg', '2024-04-27 06:14:36', '2024-04-27 06:33:50'),
(5, 'Electronics', '0.jpg', '2024-04-27 06:15:11', NULL),
(6, 'Paper', '6.jpg', '2024-04-27 06:15:24', '2024-04-27 06:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `weight`, `created_at`, `updated_at`) VALUES
(1, 1, 100.00, '2024-04-27 06:40:34', '2024-04-27 06:44:55'),
(2, 2, 25.00, '2024-04-27 06:41:12', '2024-04-27 06:51:54'),
(3, 3, 50.00, '2024-04-27 06:47:37', NULL),
(4, 5, 50.00, '2024-04-27 06:58:41', NULL),
(5, 4, 20.00, '2024-04-27 06:59:06', NULL),
(6, 6, 20.00, '2024-04-27 06:59:19', NULL),
(7, 7, 20.00, '2024-04-27 06:59:25', NULL),
(8, 8, 20.00, '2024-04-27 06:59:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `user_id`, `category_id`, `name`, `status`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Biodegradable plastics', '1', '  Biodegradable plastic cups are eco-friendly alternatives to traditional plastic cups. Made from plant-based materials like cornstarch or sugarcane, they break down naturally over time, reducing environmental impact. These cups are designed to decompose into harmless organic matter, water, and carbon dioxide, leaving behind no harmful residues. They offer a sustainable solution for single-use items, minimizing pollution and helping to preserve the planet for future generations ', '1.jpg', 200.00, '2024-04-27 06:40:22', '2024-04-27 06:57:12'),
(2, 1, 1, 'Iron alloy', '1', ' Iron alloy is a material formed by combining iron with one or more other elements, typically to enhance its properties for specific applications. Common alloying elements include carbon, chromium, nickel, and manganese. ', '0.jpg', 20.00, '2024-04-27 06:41:04', '2024-04-27 06:54:20'),
(3, 1, 6, 'Paper Bags', '1', '  Biodegradable paper bags are environmentally friendly alternatives to traditional plastic bags. Made from renewable resources like wood pulp or recycled paper, these bags are designed to break down naturally when discarded, reducing waste and pollution. They decompose into organic materials, water, and carbon dioxide, leaving behind minimal environmental impact. Biodegradable paper bags offer a sustainable option for packaging and carrying items, helping to protect ecosystems and wildlife ', '3.jpeg', 50.00, '2024-04-27 06:43:17', '2024-04-27 06:57:25'),
(4, 1, 5, 'Recycled cardboard', '1', 'Recycled cardboard is a sustainable material created from reclaimed paper fibers, primarily sourced from used cardboard boxes and packaging materials.', '0.jpg', 667.00, '2024-04-27 06:49:54', '2024-04-27 06:52:51'),
(5, 1, 1, 'Polypropylene', '1', 'Polypropylene is a versatile thermoplastic polymer widely used in various industries for its excellent combination of properties. It is lightweight, durable, and resistant to moisture, chemicals, and fatigue, making it suitable for applications ranging from packaging and textiles to automotive parts and medical devices. ', '0.jpg', 294.00, '2024-04-27 06:50:06', '2024-04-27 06:54:04'),
(6, 1, 2, 'Aluminium', '1', '  In illo natus numqua  ', '6.jpeg', 165.00, '2024-04-27 06:50:19', '2024-04-27 06:58:18'),
(7, 1, 2, 'Copper', '1', '  Aliquam nesciunt ni  ', '7.jpeg', 859.00, '2024-04-27 06:50:22', '2024-04-27 06:57:57'),
(8, 1, 2, 'Brass', '1', 'Ad obcaecati atque d', '8.jpeg', 2500.00, '2024-04-27 06:56:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_industry` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `user_id`, `name`, `address`, `phone_number`, `business_name`, `business_industry`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Doe', 'Badda', '954788215', 'Eco Poly creations', 'Polythin Recycling', '2027-04-24 06:13:36', NULL);

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
(1, 'seller@gmail.com', '$2y$10$qcJ9PD1ZoATzmaq5DwBNkuVPEDgdeDVwJZgmHwLlvAudsOF/UplSi', 'avatar1.svg', 1, NULL, NULL),
(2, 'buyer@gmail.com', '$2y$10$cakIsLIPCix878lmNGOWsOvZmvAQaBw89gQYzj0eJDczwmEXwKioC', 'avatar1.svg', 2, '2027-04-24 06:12:26.000000', NULL),
(3, 'buywe@gmail.com', '$2y$10$EN8XWz7zBYa7Jb69DSmsDeA7EcQqc3oOQjNXe3CcpxfsKjMgR3EdW', 'avatar1.svg', 2, '2027-04-23 19:00:08.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_feedback`
--
ALTER TABLE `buyer_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer_feedback`
--
ALTER TABLE `buyer_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer_feedback`
--
ALTER TABLE `buyer_feedback`
  ADD CONSTRAINT `buyer_feedback_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
