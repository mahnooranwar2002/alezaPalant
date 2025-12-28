-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2025 at 09:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_image` varchar(250) NOT NULL,
  `qunatity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `p_id`, `user_id`, `p_name`, `p_image`, `qunatity`, `price`, `total`) VALUES
(3, 8, 7, 'Conifers', '2.jpg', 6, 750, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `is_active`) VALUES
(5, 'ff', 1),
(8, 'Flowering plants', 1),
(9, ' Conifers', 1),
(10, ' Ferns', 1),
(11, 'Gymnosperms', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `product_image` varchar(250) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_name`, `description`, `product_image`, `cate_id`, `status`, `price`, `quantity`) VALUES
(7, ' Flowering plants', 'Flowering plants, also known as angiosperms, are the most diverse and widespread group of plants on Earth. They are easily recognized by their ability to produce flowers, which serve as their reproductive structures. After pollination and fertilization, these flowers often develop into fruits that contain seeds. The seeds then grow into new plants, allowing the species to reproduce and spread. Like other vascular plants, flowering plants have roots to absorb water and nutrients, stems to support the plant and transport substances, and leaves to carry out photosynthesis. They are typically classified into two main groups: monocots, which have one seed leaf and parallel leaf veins, and dicots, which have two seed leaves and net-like veins. Flowering plants are essential to life on Earth, providing food, oxygen, medicine, and habitats for many living organisms.', '1.jpg', 8, 1, 500, 5),
(8, 'Conifers', 'Flowering plants, also known as angiosperms, are the most diverse and widespread group of plants on Earth. They are easily recognized by their ability to produce flowers, which serve as their reproductive structures. After pollination and fertilization, these flowers often develop into fruits that contain seeds. The seeds then grow into new plants, allowing the species to reproduce and spread. Like other vascular plants, flowering plants have roots to absorb water and nutrients, stems to support the plant and transport substances, and leaves to carry out photosynthesis. They are typically classified into two main groups: monocots, which have one seed leaf and parallel leaf veins, and dicots, which have two seed leaves and net-like veins. Flowering plants are essential to life on Earth, providing food, oxygen, medicine, and habitats for many living organisms.\r\n', '2.jpg', 9, 1, 750, 7),
(9, ' Ferns', 'Flowering plants, also known as angiosperms, are the most diverse and widespread group of plants on Earth. They are easily recognized by their ability to produce flowers, which serve as their reproductive structures. After pollination and fertilization, these flowers often develop into fruits that contain seeds. The seeds then grow into new plants, allowing the species to reproduce and spread. Like other vascular plants, flowering plants have roots to absorb water and nutrients, stems to support the plant and transport substances, and leaves to carry out photosynthesis. They are typically classified into two main groups: monocots, which have one seed leaf and parallel leaf veins, and dicots, which have two seed leaves and net-like veins. Flowering plants are essential to life on Earth, providing food, oxygen, medicine, and habitats for many living organisms.\r\n', '4.jpg', 10, 1, 500, 28),
(10, 'Gymnosperms', 'Flowering plants, also known as angiosperms, are the most diverse and widespread group of plants on Earth. They are easily recognized by their ability to produce flowers, which serve as their reproductive structures. After pollination and fertilization, these flowers often develop into fruits that contain seeds. The seeds then grow into new plants, allowing the species to reproduce and spread. Like other vascular plants, flowering plants have roots to absorb water and nutrients, stems to support the plant and transport substances, and leaves to carry out photosynthesis. They are typically classified into two main groups: monocots, which have one seed leaf and parallel leaf veins, and dicots, which have two seed leaves and net-like veins. Flowering plants are essential to life on Earth, providing food, oxygen, medicine, and habitats for many living organisms.\r\n', '10.jpg', 11, 1, 596, 20),
(11, 'ff', '   xcc', '1.jpg', 5, 1, 596, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `is_verify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `email`, `password`, `status`, `is_admin`, `otp`, `is_verify`) VALUES
(2, 'ff', 'aag@gmail.com', '$2y$10$W4bSWNd9OJoI.t9AfnfH3eZ2IaqeE3w4ZvIgusEh8gk8KIAevGNU.', 0, 0, '', 0),
(3, 'mahnoor', 'mahnooranwar@gmail.com', '$2y$10$e4NaInRHWOeTxCmtSYg0ie4KontAjWgObVYsUvgkq5MCgudjhAWQu', 1, 0, '', 0),
(5, 'admin', 'admin@gmail.com', '$2y$10$3I/MfPyGhx/BkoqWuO9RDu6lhSLwDKgiJWRt/2LBcysy7Yh5ix0Ry', 1, 1, '', 1),
(6, 'aaa', 'aas@gmail.com', '$2y$10$uJWRt1Gm/QUuVahIiuMn0.mOBprphSZ1P/yo0eutBzXGxXMjTv.s6', 1, 0, '246313', 0),
(7, 'mahnoor anwar', 'mahnooranwar192002@gmail.com', '$2y$10$QH8FD2DWF7gcGhPUOzUt7u.VZzfAbcW.jp5aFAht6rz8FyyGnu6HO', 1, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_key` (`cate_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `fk_key` FOREIGN KEY (`cate_id`) REFERENCES `tbl_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
