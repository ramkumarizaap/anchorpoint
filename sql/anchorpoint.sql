-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 04:01 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anchorpoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(255) NOT NULL,
  `po_no` varchar(255) NOT NULL,
  `officer_name` varchar(255) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `executive_id` int(11) NOT NULL,
  `occupancy` enum('Single','Twin') NOT NULL,
  `room_id` int(11) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `vessel_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout_date` date NOT NULL,
  `checkout_time` time NOT NULL,
  `e_checkout_date` date NOT NULL,
  `e_checkout_time` time NOT NULL,
  `breakfast` int(11) NOT NULL,
  `lunch` int(11) NOT NULL,
  `snacks` int(11) NOT NULL,
  `laundry` int(11) NOT NULL,
  `printout` int(11) NOT NULL,
  `inv_address_id` int(11) NOT NULL,
  `checked_in` enum('Yes','No') NOT NULL,
  `logistics` int(11) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `status` enum('Open','Closed') NOT NULL DEFAULT 'Open',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `invoice_amount` decimal(10,2) NOT NULL,
  `invoice_link` varchar(255) NOT NULL,
  `pdf_downloaded` enum('Yes','No','-') NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `inv_no`, `po_no`, `officer_name`, `rank_id`, `executive_id`, `occupancy`, `room_id`, `purpose`, `vessel_id`, `course_name`, `checkin_date`, `checkin_time`, `checkout_date`, `checkout_time`, `e_checkout_date`, `e_checkout_time`, `breakfast`, `lunch`, `snacks`, `laundry`, `printout`, `inv_address_id`, `checked_in`, `logistics`, `discount`, `status`, `created_date`, `updated_date`, `invoice_amount`, `invoice_link`, `pdf_downloaded`) VALUES
(1, 'APH-1718-286', '3232', 'Ram', 3, 2, 'Single', 2, 'Training', 5, 'RR', '2017-09-05', '18:35:00', '2017-09-06', '18:35:00', '2017-09-06', '08:00:00', 1, 1, 1, 1, 0, 9, 'Yes', 1, '0.00', 'Closed', '2017-09-04 10:52:05', '0000-00-00 00:00:00', '0.00', 'http://localhost/anchorpoint/booking/invoice/1', '-'),
(2, 'APH-1718-486', '3232', 'Ram', 3, 2, 'Single', 2, 'Training', 5, 'RR', '2017-09-05', '18:35:00', '2017-09-05', '18:35:00', '2017-09-05', '18:35:00', 1, 1, 1, 1, 0, 9, 'Yes', 1, '0.00', 'Closed', '2017-09-04 10:52:05', '0000-00-00 00:00:00', '0.00', 'http://localhost/anchorpoint/booking/invoice/2', '-');

-- --------------------------------------------------------

--
-- Table structure for table `executives`
--

CREATE TABLE `executives` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `executives`
--

INSERT INTO `executives` (`id`, `name`, `created_date`, `updated_date`) VALUES
(1, 'Ex 1', '2017-09-04 07:54:04', '0000-00-00 00:00:00'),
(2, 'Ex 2', '2017-09-04 07:54:04', '0000-00-00 00:00:00'),
(3, 'Ex 3', '2017-09-04 07:54:04', '0000-00-00 00:00:00'),
(4, 'Ex 4', '2017-09-04 07:54:04', '0000-00-00 00:00:00'),
(5, 'Ex 5', '2017-09-04 07:54:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_address`
--

CREATE TABLE `invoice_address` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_address`
--

INSERT INTO `invoice_address` (`id`, `address`, `status`, `created_date`) VALUES
(1, 'Ahead Quality Assurance Services (Singapore) #33, Uni Avenue3, #01-55 Vertex Singapore - 408868 Email: accounts@aheadQAS.sg', 1, '2017-09-05 13:00:44'),
(2, 'Ahead Quality Services Pvt Ltd', 1, '2017-09-05 13:00:44'),
(3, 'C/O. Synergy Oceanic Services India Private Limited (AS Agents) Cochin 6th Floor, Arya Bhangy Pinnacle, Suite No. C.C. 37/993 J, Cochin - 682020 Tel No. - 0484 - 4255 9999', 1, '2017-09-05 13:00:44'),
(4, 'Foodale India Pvt Ltd', 1, '2017-09-05 13:00:44'),
(5, 'Global United Chartering & Shipbroking Solutions Pvt Ltd', 1, '2017-09-05 13:00:44'),
(6, 'Global United Shipping India Pvt Ltd', 1, '2017-09-05 13:00:44'),
(7, 'GU CRUDE CARRIERS PRIVATE LIMITED\" (GST No. 33AAGCG2681Q1Z5)', 1, '2017-09-05 13:00:44'),
(8, 'Indioc Synergy Shipping Pvt Ltd, 4th Floor, AKDR Towers, 3/381, OMR Road, Chennai', 1, '2017-09-05 13:00:44'),
(9, 'Personal', 1, '2017-09-05 13:00:44'),
(10, 'Synergy Marine Private Limited (Singapore), 1 Kim Seng Promenade, #10-11/12 Great World City West Tower Singapore - 237994 Tel No: 65 6278 8233', 1, '2017-09-05 13:00:44'),
(11, 'Synergy Maritime Private Limited (Chennai), 4th Floor, AKDR Towers, 3/381 Rajiv Gandhi Salai (OMR), Mettukuppam; Chennai, 600097, Tel No. - 044 - 4050 7777 / 6621 5555', 1, '2017-09-05 13:00:44'),
(12, 'Synergy Maritime Recruitment Services Private Limited, 3/381 Rajiv Gandhi Salai, Mettukuppam; Chennai, 600097, Chennai, Tamil Nadu', 1, '2017-09-05 13:00:44'),
(13, 'Synergy Navis Marine Private Limited (Pune) 902, ONYX, North Main Road, Koregaon Park, Pune - 411001 Tel No. - 020 - 6707 3000', 1, '2017-09-05 13:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`id`, `name`, `created_date`, `updated_date`) VALUES
(1, 'Other', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(2, 'Suptd', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(3, 'TE', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(4, 'Office Staff', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(5, 'Jr.Cadet', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(6, 'Ecdt', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(7, 'GE', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(8, 'GME', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(9, 'TME', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(10, 'Tr3/E', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(11, 'TrE/O', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(12, 'TrGE', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(13, 'E/O', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(14, 'DC', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(15, 'A/4E', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(16, 'A2/E', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(17, 'A2/O', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(18, '4/O', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(19, '4/E', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(20, '2/O', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(21, '3/E', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(22, '3/O', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(23, 'A3/E', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(24, 'A3/O', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(25, 'C/E', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(26, 'C/O', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(27, 'Capt', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(28, 'AMast', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(29, 'Airbnb', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(30, 'ABIC', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(31, 'AC/O', '2017-09-04 10:14:41', '0000-00-00 00:00:00'),
(32, '2/E', '2017-09-04 10:14:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `tariff` decimal(10,2) NOT NULL,
  `type` enum('Single','Twin') NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `rank`, `tariff`, `type`, `created_date`, `updated_date`) VALUES
(1, '3A Prapancha - Amber', '3/O', '2500.00', 'Single', '2017-09-04 08:12:04', '0000-00-00 00:00:00'),
(2, '3B Prapancha - Indigo', '2/O', '2450.00', 'Single', '2017-09-04 08:12:04', '0000-00-00 00:00:00'),
(3, '3A Prapancha - Ivory 1', '2/O', '2000.00', 'Twin', '2017-09-04 08:12:04', '0000-00-00 00:00:00'),
(4, '3A Prapancha - Ivory 2', '3/O', '1750.00', 'Twin', '2017-09-04 08:12:04', '0000-00-00 00:00:00'),
(5, '3C Prapancha - Azure 1', '3/O', '1890.00', 'Twin', '2017-09-04 08:12:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, 'ramkumar.izaap@gmail.com', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vessels`
--

CREATE TABLE `vessels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vessels`
--

INSERT INTO `vessels` (`id`, `name`, `created_date`, `updated_date`) VALUES
(1, 'African Spoonbill', '2017-09-04 08:15:52', '0000-00-00 00:00:00'),
(2, 'Aditya', '2017-09-04 08:15:52', '0000-00-00 00:00:00'),
(3, 'African Turaco', '2017-09-04 08:15:52', '0000-00-00 00:00:00'),
(4, 'Ace Spain', '2017-09-04 08:15:52', '0000-00-00 00:00:00'),
(5, 'Bursa', '2017-09-04 08:15:52', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `executives`
--
ALTER TABLE `executives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_address`
--
ALTER TABLE `invoice_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vessels`
--
ALTER TABLE `vessels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `executives`
--
ALTER TABLE `executives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoice_address`
--
ALTER TABLE `invoice_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vessels`
--
ALTER TABLE `vessels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
