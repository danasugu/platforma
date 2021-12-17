-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2021 at 02:41 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `platforma`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(33) NOT NULL,
  `invoice_prefix` varchar(33) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `invoice_prefix`, `total`) VALUES
(158, 3333, 'EEE', 1),
(165, 1234, 'AWE', 14);

-- --------------------------------------------------------

--
-- Table structure for table `invoices_lines`
--

DROP TABLE IF EXISTS `invoices_lines`;
CREATE TABLE IF NOT EXISTS `invoices_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `vat_percentage` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices_lines`
--

INSERT INTO `invoices_lines` (`id`, `invoice_id`, `description`, `price`, `qty`, `vat_percentage`) VALUES
(185, 158, 'rerwere', 0, 0, '0.00'),
(186, 158, 'rerwere', 0, 0, '0.00'),
(187, 158, '1', 0, 0, '0.00'),
(188, 188, 'des', 2, 2, '1.70'),
(189, 189, 'twer', 2, 2, '2.40'),
(190, 190, 'ukyuyi', 3, 1, '3.40'),
(191, 191, 'aaaa', 6, 3, '3.40'),
(192, 192, '2', 6, 3, '3.40'),
(193, 193, 'aaaaaaaa', 6, 3, '3.40'),
(206, 165, '1', 1, 1, '1.40'),
(207, 165, '2', 2, 2, '2.40'),
(208, 165, '3', 3, 3, '3.40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_email` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_pass`) VALUES
(1, 'ds@ds.com', '202cb962ac59075b964b07152d234b70'),
(2, 'dana.sugu@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'test@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'ds@dsds.com', '202cb962ac59075b964b07152d234b70'),
(5, 'admin@admin.com', '202cb962ac59075b964b07152d234b70'),
(6, 'wee@we.com', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
