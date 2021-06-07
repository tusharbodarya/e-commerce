-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 08:29 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `password`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Tushar', '9876543210', 'admin@gmail.com', 'admin@gmail.com', 0, '2021-01-23 11:45:53', '2021-01-23 11:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `banner_1` text NOT NULL,
  `banner_2` text NOT NULL,
  `banner_3` text NOT NULL,
  `name` text NOT NULL,
  `offer` text NOT NULL,
  `tag` text NOT NULL DEFAULT 'NEW',
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_1`, `banner_2`, `banner_3`, `name`, `offer`, `tag`, `is_active`) VALUES
(1, 'banner1.jpg', 'banner2.jpg', 'banner3.jpg', '<font color=\"#ff0000\">New Mens Fashion</font>', '<b>Save up to <font color=\"#ffff00\">40%</font> off</b>', 'NEW', 0);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tagname` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `images` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `product_id`, `tagname`, `name`, `description`, `images`, `created_at`, `is_active`) VALUES
(1, 7, 'New Puma', '<p><span style=\"font-size: 36px;\">﻿</span><font color=\"#ffff00\" style=\"\"><b><span style=\"font-size: 36px;\">Women Winter Wear</span></b></font><span style=\"font-size: 36px;\">﻿</span></p>', '<p><font color=\"#00ff00\"><b>Puma`s New Winter Sale For Women Only This Sale Avelable Only Few Days.</b></font></p>', 'download (44).jpg', '2021-02-15 10:10:46', 0),
(2, 2, 'New Adidas Sale', '<font color=\"#ff0000\"><b><u>Man Adidas Shirt`s</u></b></font>', '<p><font color=\"#ffff00\"><b>Adidas New&nbsp;Man&nbsp; Shirt`s on sale For few days.</b></font></p>', 'images (42).jpg', '2021-02-15 10:17:27', 0),
(3, 4, 'Iphone 12 Pro', '<p><b style=\"\"><font color=\"#00ffff\">New Iphone 12 Pro&nbsp;</font></b></p>', '<p><b style=\"\"><font color=\"#00ffff\">New Offer`s In phone Series For Few Days</font></b></p>', 'download (14).jpg', '2021-02-22 12:07:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `is_deleted`, `created_at`, `update_at`) VALUES
(1, 'Clothing', 0, 0, '2021-02-06 09:23:07', '2021-02-06 09:23:07'),
(2, 'Electronics', 0, 0, '2021-02-06 09:23:19', '2021-02-06 09:23:19'),
(3, 'Health & Beauty', 0, 0, '2021-02-06 09:23:43', '2021-02-06 09:23:43'),
(4, 'Watches', 0, 0, '2021-02-06 09:24:10', '2021-02-06 09:24:10'),
(5, 'Jewellery', 0, 0, '2021-02-06 09:24:23', '2021-02-06 09:24:23'),
(6, 'Shoes', 0, 0, '2021-02-06 09:24:34', '2021-02-06 09:24:34'),
(7, 'Kids & Girls', 0, 0, '2021-02-06 09:24:44', '2021-02-06 09:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `child_category`
--

CREATE TABLE `child_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `upadated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `child_category`
--

INSERT INTO `child_category` (`id`, `category_id`, `sub_category_id`, `name`, `status`, `is_deleted`, `created_at`, `upadated_at`) VALUES
(1, 1, 1, 'Dresses', 0, 0, '2021-02-06 09:32:17', '2021-02-08 10:07:24'),
(2, 1, 1, 'Shoes', 0, 0, '2021-02-06 09:32:38', '2021-02-08 10:07:24'),
(3, 1, 1, 'Jackets', 0, 0, '2021-02-06 09:32:48', '2021-02-08 10:07:24'),
(4, 1, 1, 'Sunglasses', 0, 0, '2021-02-06 09:33:02', '2021-02-08 10:07:24'),
(5, 1, 1, 'Sport Wear', 0, 0, '2021-02-06 09:33:16', '2021-02-08 10:07:24'),
(6, 1, 1, 'Blazers', 0, 0, '2021-02-06 09:33:27', '2021-02-08 10:07:24'),
(7, 1, 1, 'Shirts', 0, 0, '2021-02-06 09:33:38', '2021-02-08 10:07:24'),
(8, 1, 2, 'Handbags', 0, 0, '2021-02-06 09:33:51', '2021-02-08 10:07:24'),
(9, 1, 2, 'Jwellery', 0, 0, '2021-02-06 09:34:11', '2021-02-08 10:07:24'),
(10, 1, 2, 'Swimwear', 0, 0, '2021-02-06 09:34:23', '2021-02-08 10:07:24'),
(11, 1, 2, 'Tops', 0, 0, '2021-02-06 09:34:33', '2021-02-08 10:07:24'),
(12, 1, 2, 'Flats', 0, 0, '2021-02-06 09:34:45', '2021-02-08 10:07:24'),
(13, 1, 2, 'Shoes', 0, 0, '2021-02-06 09:34:59', '2021-02-08 10:07:24'),
(14, 1, 2, 'Winter Wear', 0, 0, '2021-02-06 09:35:13', '2021-02-08 10:07:24'),
(15, 1, 3, 'Jeans', 0, 0, '2021-02-06 09:35:39', '2021-02-08 10:07:24'),
(16, 1, 3, 'Shirts', 0, 0, '2021-02-06 09:35:54', '2021-02-08 10:07:24'),
(17, 1, 3, 'Blazers', 0, 0, '2021-02-06 09:36:39', '2021-02-08 10:07:24'),
(18, 1, 3, 'Sport Wear', 0, 0, '2021-02-06 09:36:58', '2021-02-08 10:07:24'),
(19, 1, 3, 'Jackets', 0, 0, '2021-02-06 09:37:19', '2021-02-08 10:07:24'),
(20, 1, 4, 'Shorts', 0, 0, '2021-02-06 09:37:51', '2021-02-08 10:07:24'),
(21, 1, 4, 'Dresses', 0, 0, '2021-02-06 09:38:08', '2021-02-08 10:07:24'),
(22, 1, 4, 'Night Dress', 0, 0, '2021-02-06 09:38:25', '2021-02-08 10:07:24'),
(23, 1, 4, 'Swim Wear', 0, 0, '2021-02-06 09:38:40', '2021-02-08 10:07:24'),
(24, 2, 5, 'Gaming', 0, 0, '2021-02-06 09:39:15', '2021-02-08 10:08:26'),
(25, 2, 5, 'Laptop Skins', 0, 0, '2021-02-06 09:39:30', '2021-02-08 10:08:26'),
(26, 2, 5, 'Apple', 0, 0, '2021-02-06 09:39:41', '2021-02-08 10:08:26'),
(27, 2, 5, 'Dell', 0, 0, '2021-02-06 09:39:52', '2021-02-08 10:08:26'),
(28, 2, 5, 'Lenovo', 0, 0, '2021-02-06 09:40:02', '2021-02-08 10:08:26'),
(29, 2, 5, 'Microsoft', 0, 0, '2021-02-06 09:40:12', '2021-02-08 10:08:26'),
(30, 2, 5, 'Asus', 0, 0, '2021-02-06 09:40:22', '2021-02-08 10:08:26'),
(31, 2, 5, 'Adapters', 0, 0, '2021-02-06 09:40:31', '2021-02-08 10:08:26'),
(32, 2, 5, 'Batteries', 0, 0, '2021-02-06 09:40:51', '2021-02-08 10:08:26'),
(33, 2, 5, 'Cooling Pads', 0, 0, '2021-02-06 09:41:04', '2021-02-08 10:08:26'),
(34, 2, 6, 'Routers & Modems', 0, 0, '2021-02-06 09:41:19', '2021-02-08 10:08:26'),
(35, 2, 6, 'CPU Processors', 0, 0, '2021-02-06 09:42:24', '2021-02-08 10:08:26'),
(36, 2, 6, 'PC Gaming Store', 0, 0, '2021-02-06 09:42:41', '2021-02-08 10:08:26'),
(37, 2, 6, 'Graphics Cards', 0, 0, '2021-02-06 09:42:56', '2021-02-08 10:08:26'),
(38, 2, 6, 'Components', 0, 0, '2021-02-06 09:43:09', '2021-02-08 10:08:26'),
(39, 2, 6, 'Webcam', 0, 0, '2021-02-06 09:43:22', '2021-02-08 10:08:26'),
(40, 2, 6, 'Memory (RAM)', 0, 0, '2021-02-06 09:45:48', '2021-02-08 10:08:26'),
(41, 2, 6, 'Motherboards', 0, 0, '2021-02-06 09:45:59', '2021-02-08 10:08:26'),
(42, 2, 6, 'Keyboards', 0, 0, '2021-02-06 09:46:10', '2021-02-08 10:08:26'),
(43, 2, 6, 'Headphones', 0, 0, '2021-02-06 09:46:24', '2021-02-08 10:08:26'),
(44, 2, 7, 'Accessories', 0, 0, '2021-02-06 09:46:37', '2021-02-08 10:08:26'),
(45, 2, 7, 'Binoculars', 0, 0, '2021-02-06 09:46:53', '2021-02-08 10:08:26'),
(46, 2, 7, 'Telescopes', 0, 0, '2021-02-06 09:47:07', '2021-02-08 10:08:26'),
(47, 2, 7, 'Camcorders', 0, 0, '2021-02-06 09:47:19', '2021-02-08 10:08:26'),
(48, 2, 7, 'Digital', 0, 0, '2021-02-06 09:47:33', '2021-02-08 10:08:26'),
(49, 2, 7, 'Film Cameras', 0, 0, '2021-02-06 09:47:46', '2021-02-08 10:08:26'),
(50, 2, 7, 'Flashes', 0, 0, '2021-02-06 09:47:57', '2021-02-08 10:08:26'),
(51, 2, 7, 'Lenses', 0, 0, '2021-02-06 09:48:08', '2021-02-08 10:08:26'),
(52, 2, 7, 'Surveillance', 0, 0, '2021-02-06 09:48:19', '2021-02-08 10:08:26'),
(53, 2, 7, 'Tripods', 0, 0, '2021-02-06 09:48:30', '2021-02-08 10:08:26'),
(54, 2, 8, 'Apple', 0, 0, '2021-02-06 09:48:51', '2021-02-08 10:08:26'),
(55, 2, 8, 'Samsung', 0, 0, '2021-02-06 09:49:09', '2021-02-08 10:08:26'),
(56, 2, 8, 'Lenovo', 0, 0, '2021-02-06 09:49:22', '2021-02-08 10:08:26'),
(57, 2, 8, 'Motorola', 0, 0, '2021-02-06 09:49:33', '2021-02-08 10:08:26'),
(58, 2, 8, 'LeEco', 0, 0, '2021-02-06 09:49:47', '2021-02-08 10:08:26'),
(59, 2, 8, 'Asus', 0, 0, '2021-02-06 09:49:59', '2021-02-08 10:08:26'),
(60, 2, 8, 'Acer', 0, 0, '2021-02-06 09:50:10', '2021-02-08 10:08:26'),
(61, 2, 8, 'Accessories', 0, 0, '2021-02-06 09:50:23', '2021-02-08 10:08:26'),
(62, 2, 8, 'Headphones', 0, 0, '2021-02-06 09:50:35', '2021-02-08 10:08:26'),
(63, 2, 8, 'Memory Cards', 0, 0, '2021-02-06 09:50:51', '2021-02-08 10:08:26'),
(64, 3, 9, 'Acne', 0, 0, '2021-02-06 11:00:07', '2021-02-08 10:08:54'),
(65, 3, 9, 'Botox', 0, 0, '2021-02-06 11:00:17', '2021-02-08 10:08:54'),
(66, 3, 9, 'Facial', 0, 0, '2021-02-06 11:00:33', '2021-02-08 10:08:54'),
(67, 3, 9, 'Microdermabrasion', 0, 0, '2021-02-06 11:00:45', '2021-02-08 10:08:54'),
(68, 3, 9, 'NuFace', 0, 0, '2021-02-06 11:00:55', '2021-02-08 10:08:54'),
(69, 3, 10, 'Electrolysis', 0, 0, '2021-02-06 11:01:11', '2021-02-08 10:08:54'),
(70, 3, 10, 'Hair bleaching', 0, 0, '2021-02-06 11:01:23', '2021-02-08 10:08:54'),
(71, 3, 10, 'Laser', 0, 0, '2021-02-06 11:01:35', '2021-02-08 10:08:54'),
(72, 3, 10, 'Shaving', 0, 0, '2021-02-06 11:01:53', '2021-02-08 10:08:54'),
(73, 3, 10, 'Waxing', 0, 0, '2021-02-06 11:02:06', '2021-02-08 10:08:54'),
(74, 4, 11, 'Automatic watches', 0, 0, '2021-02-06 12:29:40', '2021-02-08 10:09:18'),
(75, 4, 12, 'Dress watches', 0, 0, '2021-02-06 12:29:58', '2021-02-08 10:09:18'),
(76, 4, 14, 'Dress watches', 0, 0, '2021-02-06 12:30:08', '2021-02-08 10:09:18'),
(77, 4, 13, 'Smartwatches', 0, 0, '2021-02-06 12:30:37', '2021-02-08 10:09:18'),
(78, 1, 4, 'Sport Wear', 0, 0, '2021-02-08 09:44:25', '2021-02-08 10:07:24'),
(79, 1, 2, 'Sport Wear', 0, 0, '2021-02-08 09:45:58', '2021-02-08 09:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `offer` int(11) NOT NULL,
  `date` date NOT NULL,
  `curr_price` int(11) NOT NULL,
  `prev_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `multi_image` text NOT NULL,
  `stock_status` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `upadated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `product_id`, `name`, `offer`, `date`, `curr_price`, `prev_price`, `stock`, `description`, `image`, `multi_image`, `stock_status`, `status`, `created_at`, `upadated_at`, `is_deleted`) VALUES
(1, 4, 'Iphon', 10, '2021-02-28', 54322, 67543, 100, 'this offer valid for 28   feb', 'images (10).jpg', 'download (13).jpg,download (14).jpg,download (15).jpg', 'stockin', 0, '2021-02-04 09:35:14', '2021-02-25 09:23:08', 0),
(2, 4, 'Iphon11', 10, '2021-03-28', 54322, 67543, 100, 'This offer valid For 28 feb.', 'images (10).jpg', 'download (13).jpg,download (14).jpg,download (15).jpg', 'stockin', 0, '2021-02-04 09:46:51', '2021-02-25 09:23:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`id`, `user_id`, `name`, `address`, `state`, `city`, `pincode`, `email`, `phone`, `created_at`, `is_deleted`) VALUES
(1, 1, 'Tushar', '4343444', 'GOA', 'Goa', 394101, 'thsgg@gmail.com', '987 543 4567', '2021-03-02 17:00:50', 0),
(2, 1, 'raj', '4343444', 'GUJARAT', 'Baroda', 394101, 'thsgg@gmail.com', '345 654 3212', '2021-03-02 17:03:06', 0),
(4, 1, 'Tushar', '4343444', 'GUJARAT', 'Patan', 394101, 'thsgg@gmail.com', '876 567 7554', '2021-03-03 17:34:40', 0),
(5, 1, 'New', '4343444', 'KARNATAKA', 'Malappuram', 394101, 'thsgg@gmail.com', '876 567 7554', '2021-03-03 18:00:41', 0),
(6, 1, 'Newsss', '65,hgfdaeexfxgfcbfvjhjh', 'KERALA', 'Bijapur', 394101, 'thsgg@gmail.com', '543 344 1234', '2021-03-09 13:52:22', 0),
(7, 1, 'Kighfdg', '98,mnbhgjkiutchgcdf', 'BIHAR', 'Khagaria', 876980, 'jhggtyv@gmail.com', '987 546 1234', '2021-03-09 13:54:10', 0),
(8, 1, 'Kighfdg', '98,mnbhgjkiutchgcdf', 'BIHAR', 'Khagaria', 876980, 'jhggtyv@gmail.com', '987 546 1234', '2021-03-09 13:55:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orginzation`
--

CREATE TABLE `orginzation` (
  `id` int(11) NOT NULL,
  `orginzationname` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `phone1` text NOT NULL,
  `phone2` text NOT NULL,
  `logo` text NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orginzation`
--

INSERT INTO `orginzation` (`id`, `orginzationname`, `address`, `email`, `phone1`, `phone2`, `logo`, `icon`) VALUES
(1, 'FlipMart', '19,Panvel Point,Near Panvel,New Mumbai,Maharshtra,MH-654732.', 'flipcart@shop.gmail.com', '0123456789', '9876543210', 'logo.png', 'icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `sociallinks`
--

CREATE TABLE `sociallinks` (
  `id` int(11) NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `youtube` text NOT NULL,
  `google` text NOT NULL,
  `pinterest` text NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `facebook`, `instagram`, `youtube`, `google`, `pinterest`, `is_active`) VALUES
(1, 'https://www.facebook.com/', 'https://instagram.com/', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://in.pinterest.com/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `name`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Men', 0, 0, '2021-02-06 09:28:25', '2021-02-06 09:28:25'),
(2, 1, 'Women', 0, 0, '2021-02-06 09:28:51', '2021-02-06 09:28:51'),
(3, 1, 'Boys', 0, 0, '2021-02-06 09:29:09', '2021-02-06 09:29:09'),
(4, 1, 'Girls', 0, 0, '2021-02-06 09:29:22', '2021-02-06 09:29:22'),
(5, 2, 'Laptops', 0, 0, '2021-02-06 09:29:44', '2021-02-06 09:29:44'),
(6, 2, 'Desktops', 0, 0, '2021-02-06 09:30:03', '2021-02-06 09:30:03'),
(7, 2, 'Cameras', 0, 0, '2021-02-06 09:30:16', '2021-02-06 09:30:16'),
(8, 2, 'Mobile Phones', 0, 0, '2021-02-06 09:30:31', '2021-02-06 09:30:31'),
(9, 3, 'Face treatments', 0, 0, '2021-02-06 10:53:16', '2021-02-06 10:53:16'),
(10, 3, 'Hair removal', 0, 0, '2021-02-06 10:53:28', '2021-02-06 10:53:28'),
(11, 4, 'Men', 0, 0, '2021-02-06 12:25:52', '2021-02-06 12:28:10'),
(12, 4, 'Women', 0, 0, '2021-02-06 12:26:06', '2021-02-06 12:28:05'),
(13, 4, 'Boy', 0, 0, '2021-02-06 12:26:19', '2021-02-06 12:28:18'),
(14, 4, 'Girls', 0, 0, '2021-02-06 12:26:33', '2021-02-06 12:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `name`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Samsung Galaxy', 0, 0, '2021-01-29 13:07:54', '2021-01-29 13:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `order_info_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `order_status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `order_info_id`, `user_id`, `product_id`, `product_name`, `product_qty`, `product_price`, `order_status`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 1, 1, 3, 'Women Top`s', 1, 599, 'pending', '2021-03-02 11:30:50', '2021-03-02 11:30:50', 0),
(2, 1, 1, 8, 'Women Top`s', 1, 999, 'pending', '2021-03-02 11:30:50', '2021-03-02 11:30:50', 0),
(3, 2, 1, 2, 'Man Shirt`s', 1, 599, 'pending', '2021-03-02 11:33:06', '2021-03-02 11:33:06', 0),
(4, 4, 1, 5, 'Canon 300-PF', 1, 54322, 'pending', '2021-03-03 12:04:40', '2021-03-03 12:04:40', 0),
(5, 0, 1, 5, 'Canon 300-PF', 1, 54322, 'pending', '2021-03-03 12:21:16', '2021-03-03 12:21:16', 0),
(6, 0, 1, 5, 'Canon 300-PF', 1, 54322, 'pending', '2021-03-03 12:22:15', '2021-03-03 12:22:15', 0),
(7, 0, 1, 5, 'Canon 300-PF', 1, 54322, 'pending', '2021-03-03 12:25:04', '2021-03-03 12:25:04', 0),
(8, 5, 1, 1, 'VC-800', 1, 22000, 'Paid', '2021-03-03 12:30:41', '2021-03-03 12:30:41', 0),
(9, 0, 1, 3, 'Women Top`s', 1, 599, 'pending', '2021-03-03 13:15:36', '2021-03-03 13:15:36', 0),
(10, 6, 1, 7, 'Women Winter Wear', 1, 999, 'Paid', '2021-03-09 08:22:25', '2021-03-09 08:22:25', 0),
(11, 7, 1, 5, 'Canon 300-PF', 1, 54322, 'pending', '2021-03-09 08:24:10', '2021-03-09 08:24:10', 0),
(12, 8, 1, 18, 'Girl`s Night Dress', 2, 699, 'Paid', '2021-03-09 08:25:29', '2021-03-09 08:25:29', 0),
(13, 8, 1, 2, 'Man Shirt`s', 2, 599, 'Paid', '2021-03-09 08:25:29', '2021-03-09 08:25:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `child_category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `tag` text NOT NULL,
  `color` text NOT NULL,
  `off` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_status` text NOT NULL,
  `description` text NOT NULL,
  `curr_price` int(11) NOT NULL,
  `prev_price` int(11) NOT NULL,
  `image` text NOT NULL,
  `multi_img` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `category_id`, `sub_category_id`, `child_category_id`, `name`, `tag`, `color`, `off`, `stock`, `stock_status`, `description`, `curr_price`, `prev_price`, `image`, `multi_img`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3, 9, 68, 'VC-800', 'sale', '#ff0000', 20, 1000, 'stockin', '<p><b><i><u style=\"background-color: rgb(255, 0, 0);\">VC-800</u></i></b><br></p>', 22000, 24099, 'download (25).jpg', 'breaking-news-background-world-global-260nw-719766118.png,images (13).jpg,images (14).jpg,images (15).jpg', 0, 0, '2021-02-08 10:16:05', '2021-02-08 10:16:05'),
(2, 1, 1, 6, 'Man Shirt`s', 'sale', '#181616', 20, 100, 'stockin', '<p>Man Shirt`s<br></p>', 599, 799, 'images (42).jpg', 'images (24).jpg,images (25).jpg,images (26).jpg,images.jpg,images.png', 0, 0, '2021-02-08 11:36:29', '2021-02-08 11:36:29'),
(3, 1, 2, 11, 'Women Top`s', 'new', '#421ea4', 20, 100, 'stockin', '<p><b><font color=\"#ff0000\">Women Top`s</font></b><br></p>', 599, 799, 'download (44).jpg', 'download (18).jpg,download (44).jpg,images (13).jpg,images (40).jpg', 0, 0, '2021-02-08 11:42:55', '2021-02-18 09:14:09'),
(4, 2, 8, 54, 'Iphone 12 Pro', 'new', '#fffafa', 0, 100, 'stockin', '<p><b><u>Iphone 12 </u><sup style=\"\">Pro</sup></b><br></p>', 54322, 67543, 'download (14).jpg', 'download (13).jpg,download (14).jpg,download (15).jpg', 0, 0, '2021-02-08 11:44:52', '2021-02-18 09:09:06'),
(5, 2, 7, 48, 'Canon 300-PF', 'sale', '#3d3838', 10, 190, 'stockin', '<p>Canon 300-PF<br></p>', 54322, 67543, 'download (42).jpg', 'download (35).jpg,download (36).jpg,images (5).jpg', 0, 0, '2021-02-09 11:03:39', '2021-02-09 11:03:39'),
(6, 2, 7, 48, 'Canon 300-PF', 'sale', '#3d3838', 10, 190, 'stockin', '<p>Canon 300-PF<br></p>', 54322, 67543, 'download (42).jpg', 'download (35).jpg,download (36).jpg,images (5).jpg', 0, 0, '2021-02-09 12:50:01', '2021-02-09 12:50:01'),
(7, 1, 2, 14, 'Women Winter Wear', 'hot', '#eb0000', 0, 59, 'stockin', '<p>Women Winter Wear<br></p>', 999, 1299, 'download.jpg', 'download (1).jpg,download (7).jpg,download.jpg,images (2).jpg,images (3).jpg', 0, 0, '2021-02-09 12:53:04', '2021-02-09 12:53:04'),
(8, 1, 2, 14, 'Women Top`s', 'sale', '#ff0000', 20, 190, 'stockin', '<p>Women Winter Wear<br></p>', 999, 1299, 'download (1).jpg', 'download (44).jpg,download (45).jpg,download (65).jpg', 0, 0, '2021-02-09 12:56:36', '2021-02-09 12:56:36'),
(9, 1, 2, 14, 'Women Top`s', 'sale', '#ff0000', 20, 190, 'stockin', '<p>Women Winter Wear<br></p>', 999, 1299, 'download (1).jpg', 'download (44).jpg,download (45).jpg,download (65).jpg', 0, 0, '2021-02-09 12:56:59', '2021-02-09 12:56:59'),
(10, 1, 2, 14, 'Women Top`s', 'sale', '#ff0000', 20, 190, 'stockin', '<p>Women Winter Wear<br></p>', 999, 1299, 'download (1).jpg', 'download (44).jpg,download (45).jpg,download (65).jpg', 0, 0, '2021-02-09 12:57:05', '2021-02-09 12:57:05'),
(11, 1, 2, 14, 'Women Top`s', 'sale', '#ff0000', 20, 190, 'stockin', '<p>Women Winter Wear<br></p>', 999, 1299, 'download (1).jpg', 'download (44).jpg,download (45).jpg,download (65).jpg', 0, 0, '2021-02-09 12:57:12', '2021-02-09 12:57:12'),
(12, 1, 2, 14, 'Women Top`s', 'sale', '#ff0000', 20, 190, 'stockin', '<p>Women Winter Wear<br></p>', 999, 1299, 'download (1).jpg', 'download (44).jpg,download (45).jpg,download (65).jpg', 0, 0, '2021-02-09 12:57:18', '2021-02-09 12:57:18'),
(13, 1, 2, 14, 'Women Top`s', 'sale', '#ff0000', 20, 190, 'stockin', '<p>Women Winter Wear<br></p>', 999, 1299, 'download (1).jpg', 'download (44).jpg,download (45).jpg,download (65).jpg', 0, 0, '2021-02-09 12:57:26', '2021-02-09 12:57:26'),
(14, 1, 2, 14, 'Women Top`s', 'sale', '#ff0000', 20, 190, 'stockin', '<p>Women Winter Wear<br></p>', 999, 1299, 'download (1).jpg', 'download (44).jpg,download (45).jpg,download (65).jpg', 0, 0, '2021-02-09 12:57:39', '2021-02-09 12:57:39'),
(15, 1, 4, 22, 'Girl`s Night Dress', 'hot', '#ff0000', 10, 100, 'stockin', '<p><b><i><u>Girl`s Night Dress</u></i></b><br></p>', 699, 799, 'download (65).jpg', 'images (13).jpg,images (40).jpg,images (41).jpg', 0, 0, '2021-02-09 12:59:49', '2021-02-09 12:59:49'),
(16, 1, 4, 22, 'Girl`s Night Dress', 'hot', '#ff0000', 10, 100, 'stockin', '<p><b><i><u>Girl`s Night Dress</u></i></b><br></p>', 699, 799, 'download (65).jpg', 'images (13).jpg,images (40).jpg,images (41).jpg', 0, 0, '2021-02-09 12:59:54', '2021-02-09 12:59:54'),
(17, 1, 4, 22, 'Girl`s Night Dress', 'hot', '#ff0000', 10, 100, 'stockin', '<p><b><i><u>Girl`s Night Dress</u></i></b><br></p>', 699, 799, 'download (65).jpg', 'images (13).jpg,images (40).jpg,images (41).jpg', 0, 0, '2021-02-09 12:59:58', '2021-02-09 12:59:58'),
(18, 1, 4, 22, 'Girl`s Night Dress', 'hot', '#ff0000', 10, 100, 'stockin', '<p><b><i><u>Girl`s Night Dress</u></i></b><br></p>', 699, 799, 'download (65).jpg', 'images (13).jpg,images (40).jpg,images (41).jpg', 0, 0, '2021-02-09 13:00:03', '2021-02-09 13:00:03'),
(19, 1, 4, 22, 'Girl`s Night Dress', 'hot', '#ff0000', 10, 100, 'stockin', '<p><b><i><u>Girl`s Night Dress</u></i></b><br></p>', 699, 799, 'download (65).jpg', 'images (13).jpg,images (40).jpg,images (41).jpg', 0, 0, '2021-02-12 08:46:44', '2021-02-12 08:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_comparison`
--

CREATE TABLE `tbl_product_comparison` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_comparison`
--

INSERT INTO `tbl_product_comparison` (`id`, `user_id`, `product_id`, `is_deleted`) VALUES
(3, 1, 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `user_id`, `product_id`, `is_deleted`) VALUES
(8, 1, 17, 0),
(9, 1, 11, 0),
(10, 1, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `email`, `password`, `date`, `is_deleted`) VALUES
(1, 'admin', 987654321, 'admin@yahoo.com', '$2y$10$qVXhxyIQI8oFx6Cr2kPd1elOGE.ChsJL8Y0DLU.a/X34XQfWzVdMa', '2021-01-29 12:23:56', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_category`
--
ALTER TABLE `child_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_comparison`
--
ALTER TABLE `tbl_product_comparison`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `child_category`
--
ALTER TABLE `child_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_product_comparison`
--
ALTER TABLE `tbl_product_comparison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
