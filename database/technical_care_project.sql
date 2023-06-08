-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 07:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technical_care_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `ROLE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `firstName`, `lastName`, `phone`, `email`, `pass`, `date`, `ROLE`) VALUES
(231, 'ziad', 'mohamed', 1099475854, 'ziadm57@yahoo.com', '3c2e98e6f6b242d0c59ec85ffabe0359', '2023-03-26 17:31:17', 'USER'),
(232, 'programmer', 'Mohamed', 1099475854, 'Ahmed@yahoo.com', '3c2e98e6f6b242d0c59ec85ffabe0359', '2023-03-26 17:31:33', 'ADMIN'),
(233, 'programmer', 'Mohamed', 1099475854, 'Ahmeddd@yahoo.com', '3c2e98e6f6b242d0c59ec85ffabe0359', '2023-03-26 19:33:55', 'ADMIN'),
(234, 'Manar', 'Ahmed', 1550336792, 'ManarAhmed@yahoo.com', 'e337d5125dae811569e901c2ca25b23d', '2023-03-27 11:37:54', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `client_id` int(255) NOT NULL,
  `technical_id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `client_id`, `technical_id`, `description`) VALUES
(1, 231, 74, 'اريد ان  اشطب غرفة'),
(2, 232, 74, 'تشطيب غرفتين'),
(3, 231, 80, 'نريد احد ان يقوم ب ديكوور كامل وضبط الأضائة'),
(4, 231, 80, 'نريد ضبط الكهرباء');

-- --------------------------------------------------------

--
-- Table structure for table `technical`
--

CREATE TABLE `technical` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `type_of` varchar(255) NOT NULL,
  `phone` int(100) NOT NULL,
  `image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technical`
--

INSERT INTO `technical` (`id`, `firstName`, `lastName`, `email`, `pass`, `date`, `type_of`, `phone`, `image`) VALUES
(74, 'programmer', 'Mohamed', 'Ahmed@yahoo.com', '3c2e98e6f6b242d0c59ec85ffabe0359', '2023-03-26 15:32:43', 'قسم النجاره', 1099475854, 'image/emmanuel-ikwuegbu-xdS9XEoKBLY-unsplash.jpg'),
(75, 'ziad', 'Mohamed', 'caydrox3@gmail.com', '3c2e98e6f6b242d0c59ec85ffabe0359', '2023-03-26 22:41:02', 'قسم السباكه', 1099475854, 'image/1.jpeg'),
(76, 'programmer', 'Mohamed', 'ziadmohamed57@yahoo.com', '3c2e98e6f6b242d0c59ec85ffabe0359', '2023-03-27 00:52:18', 'قسم السباكه', 1099475854, 'image/—Pngtree—professional technicians for repairing and_7257766.png'),
(77, 'programmer', 'Mohamed', 'ziaddm57@yahoo.com', '3c2e98e6f6b242d0c59ec85ffabe0359', '2023-03-27 04:19:51', 'قسم السباكه', 1099475854, 'image/pexels-henrique-cruz-13468026.jpg'),
(78, 'programmer', 'Mohamed', 'mohamed@yahoo.com', '3c2e98e6f6b242d0c59ec85ffabe0359', '2023-03-27 04:27:30', 'قسم النقاشه', 1099475854, 'image/pngwing.com (1).png'),
(79, 'mohamed', 'gaber', 'mohamedgaber@yahoo.com', '3c2e98e6f6b242d0c59ec85ffabe0359', '2023-03-27 04:28:37', 'قسم النجاره', 1048574493, 'image/pngwing.com (2).png'),
(80, 'abdallah', 'Mohamed', 'abdallah@yahoo.com', '3c2e98e6f6b242d0c59ec85ffabe0359', '2023-03-27 07:06:46', 'قسم النقاشه', 1099475854, 'image/4.jpg'),
(81, 'ziad', 'Mohamed', 'ManarAhmed@yahoo.com', 'e337d5125dae811569e901c2ca25b23d', '2023-03-27 09:49:41', 'قسم الجبس', 1099475854, 'image/WhatsApp Image 2023-03-07 at 7.37.44 PM.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `client_order` (`client_id`),
  ADD KEY `technical_order` (`technical_id`);

--
-- Indexes for table `technical`
--
ALTER TABLE `technical`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `technical`
--
ALTER TABLE `technical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `client_order` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `technical_order` FOREIGN KEY (`technical_id`) REFERENCES `technical` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
