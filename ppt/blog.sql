-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 05:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(7, 'itaharis'),
(9, 'Kathmandu'),
(10, 'Damakk'),
(12, 'bhaktapur');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_description` longtext NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_contact` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_description`, `food_image`, `owner_name`, `owner_contact`, `city`, `address`, `donor_id`, `date`) VALUES
(20, 'T shirt for men', 'Music video by X Ambassadors performing Renegades. (C) 2015 KIDinaKORNER/Interscope Records', 'tshirt.jpg', 'Derek Duke', 1111111111, 'Kathmandu', 'Culpa ea unde tempo', 4, '2024-01-15 13:19:17.363712'),
(29, 'Trouser paints for boys', 'Dexter Mccarty', 'tshirt.jpg', 'Kato Hebert', 511, 'itaharis', 'Jacob Strickland', 12, '2024-01-20 08:21:39.435493');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_phone` int(11) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `request_detail` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `post_id`, `client_name`, `client_phone`, `client_email`, `request_detail`, `status`) VALUES
(10, 20, 'admin', 2147483647, '', 'charity', 1),
(12, 16, 'BlockGallery', 2147483647, '', 'charity', 0),
(13, 16, 'Rhona Barron', 44, '', 'Wendy Gates', 0),
(15, 26, 'request to admin', 66, '', 'Wendy Hamilton', 1),
(16, 27, 'need food from donor 1', 46, '', 'Breanna Glenn', 1),
(17, 27, 'donor 1 request', 81, '', 'Hyacinth Gillespie', 0),
(18, 16, 'Tyler Figueroa', 7, '', 'Blaine Vega', 1),
(19, 16, 'Candice Moses', 30, '', 'Carter Lucas', 1),
(20, 16, 'Grady Chandler', 3, '', 'Margaret Donovan', 1),
(21, 16, 'fenugoq', 94, 'juzax@mailinator.com', 'xomyganyba', 1),
(22, 16, 'sujan ban', -1, 'bansujan@gmail.com', 'help', 1),
(23, 16, 'Sujan ban', 2147483647, 'bansujan525@gmail.com', 'hi', 1),
(24, 16, 'lavuto@mailinator.com', 90, 'vodromitro@gufum.com', 'tufyfy@mailinator.com', 0),
(25, 16, 'sam', 485465536, 'bansujan@gmail.com', 'i need food', 1),
(26, 16, 'sujan', 2147483647, 'bansujan525@gmail.com', 'hi need clothing', 1),
(27, 29, 'Sarika Khadka', 982351726, 'sarikakhadka59@gmail.com', 'Hello there i run a charity from in itahari and i am in need of clothes.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`, `donor_id`) VALUES
(4, 'sujan', 'bansujan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 0),
(9, 'donor', 'donor@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 0),
(10, 'ticosyci', 'wonije@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 0, 0),
(11, 'donor1', 'donor1@gmail.com', '4d7c54e256af9a58aaccb0e20311f69e85d4b5bb', 0, 0),
(12, 'demo', 'demo@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
