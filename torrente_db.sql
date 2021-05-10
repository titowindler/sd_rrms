-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 12:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `torrente_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreement_details`
--

CREATE TABLE `agreement_details` (
  `agreement_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `contactNumber` varchar(250) NOT NULL,
  `rentalRate` float NOT NULL,
  `checkedInDate` date NOT NULL,
  `checkedOutDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agreement_details`
--

INSERT INTO `agreement_details` (`agreement_id`, `booking_id`, `address`, `city`, `contactNumber`, `rentalRate`, `checkedInDate`, `checkedOutDate`) VALUES
(9, 17, 'One Wilson Place, Lahug', 'Cebu', '+639328734193', 500, '2021-05-05', '2021-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `bookingStatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `user_id`, `room_id`, `startDate`, `endDate`, `bookingStatus`) VALUES
(17, 2, 5, '2021-05-05', '2021-06-05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pay_details`
--

CREATE TABLE `pay_details` (
  `pay_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sender_fname` varchar(250) NOT NULL,
  `sender_lname` varchar(250) NOT NULL,
  `remittance` varchar(50) NOT NULL,
  `transaction_code` varchar(250) NOT NULL,
  `transaction_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_details`
--

INSERT INTO `pay_details` (`pay_id`, `user_id`, `sender_fname`, `sender_lname`, `remittance`, `transaction_code`, `transaction_image`) VALUES
(8, 2, 'Connie', 'Torrente', 'pp', '1231231', '../images/_angle-left-solid (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_details`
--

CREATE TABLE `receipt_details` (
  `receipt_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `room_id` int(11) NOT NULL,
  `room_number` varchar(250) NOT NULL,
  `room_price` float NOT NULL,
  `location` varchar(250) NOT NULL,
  `room_type` enum('Single','Double','Triple','Quad','Queen','King','Twin','Double-double','Studio') NOT NULL,
  `room_description` varchar(250) NOT NULL,
  `room_img` varchar(250) NOT NULL,
  `room_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`room_id`, `room_number`, `room_price`, `location`, `room_type`, `room_description`, `room_img`, `room_status`) VALUES
(1, '1', 2500, '5th Green Avenue Mt View North Side Cebu City', 'Single', 'A room assigned to one person. May have one or more beds', '../images/1_room1.jpg', 1),
(2, '2', 50000, 'Near Country Mall, SM Seaside By the beach ', 'Double', 'A room assigned to two people. May have one or more beds.', '../images/2_room2.jpg', 1),
(5, '1', 500, 'ada', 'Single', 'A room assigned to one person. May have one or more beds', '../images/1_fullcalendar.png', 1),
(16, '123', 123, '123', 'Double', 'A room assigned to two people. May have one or more beds.', '../images/123_bh-methdology-new.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `userType` tinyint(1) NOT NULL,
  `userStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `password`, `firstName`, `lastName`, `userType`, `userStatus`) VALUES
(1, 'owner', '72122ce96bfec66e2396d2e25225d70a', 'Rose', 'Torrente', 2, 1),
(2, 'connie', '153c85c8e79935c59b3c0c51ae886947', 'Connie', 'Torrente', 1, 1),
(6, 'test', '098f6bcd4621d373cade4e832627b4f6', 'John', 'Doe', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreement_details`
--
ALTER TABLE `agreement_details`
  ADD PRIMARY KEY (`agreement_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `pay_details`
--
ALTER TABLE `pay_details`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `receipt_details`
--
ALTER TABLE `receipt_details`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agreement_details`
--
ALTER TABLE `agreement_details`
  MODIFY `agreement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pay_details`
--
ALTER TABLE `pay_details`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receipt_details`
--
ALTER TABLE `receipt_details`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
