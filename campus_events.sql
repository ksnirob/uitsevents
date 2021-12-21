-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 06:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_price` int(11) DEFAULT NULL,
  `participents` int(11) DEFAULT 0,
  `img_link` text DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_price`, `participents`, `img_link`, `type_id`) VALUES
(1, 'Programming Contest', 0, 2, 'images/coding.jpg', 1),
(2, 'Photography Contest', 0, 1, 'images/6.jpg', 3),
(3, 'Programming 101', 0, 0, 'images/programing2.jpg', 1),
(4, 'Dance Competition', 0, 1, 'images/2.jpg', 3),
(5, 'Cricket Tournament', 0, 2, 'images/cricket.jpg', 4),
(6, 'Pubg Battle', 0, 1, 'images/pubg.jpg', 2),
(7, 'Singing Competition', 0, 2, 'images/sing.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE `event_info` (
  `event_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`event_id`, `date`, `time`, `location`) VALUES
(1, '2022-01-11', '10:20', '501 Lab'),
(2, '2021-12-24', '22:24', '401 Lab'),
(3, '2021-12-22', '22:25', '618 Lab'),
(4, '2021-12-20', '12:30', 'Hall Room'),
(5, '2021-12-20', '22:30', 'UITS Field'),
(6, '2021-12-22', '10:30', '402 Lab'),
(7, '2022-01-25', '12:36', 'Hall Room');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `type_id` int(11) NOT NULL,
  `type_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`type_id`, `type_title`) VALUES
(1, 'Technical Events'),
(2, 'Gaming Events'),
(3, 'Cultural Events'),
(4, 'Sports Events');

-- --------------------------------------------------------

--
-- Table structure for table `participent`
--

CREATE TABLE `participent` (
  `usn` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `batch` varchar(11) DEFAULT NULL,
  `sem` varchar(12) DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participent`
--

INSERT INTO `participent` (`usn`, `name`, `batch`, `sem`, `email`, `phone`, `dept`, `password`) VALUES
('1814351102', 'Khaled Saifullah', '20', '8', 'ksnirobasia@gmail.com', '0987644', 'cse', 'MTIzNDU2'),
('1814351082', 'Tarek Mahmud', '43', '8', 'mobarak@gmail.com', '01830681075', 'cse', 'MTIzNDU2');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `rid` int(11) NOT NULL,
  `usn` varchar(20) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`rid`, `usn`, `event_id`) VALUES
(46, '1814351102', 1),
(47, '1814351102', 6),
(48, '1814351082', 1),
(49, '1814351082', 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff_coordinator`
--

CREATE TABLE `staff_coordinator` (
  `stid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_coordinator`
--

INSERT INTO `staff_coordinator` (`stid`, `name`, `phone`, `event_id`) VALUES
(190, 'Bathen', '0183068107', 1),
(191, 'Bathen', '0183068107', 2),
(192, 'Bathen', '0183068107', 3),
(193, 'Bathen', '0183068107', 4),
(194, 'Monir', '0183068107', 5),
(195, 'Bathen', '0183068107', 6),
(196, 'Bathen', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student_coordinator`
--

CREATE TABLE `student_coordinator` (
  `sid` int(11) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_coordinator`
--

INSERT INTO `student_coordinator` (`sid`, `st_name`, `phone`, `event_id`) VALUES
(190, 'Khaled', '0183068107', 1),
(191, 'Nowshad', '0183068107', 2),
(192, 'Khaled', '0183068107', 3),
(193, 'Nowshad', '0183068107', 4),
(194, 'Mobarak', '0183068107', 5),
(195, 'Nayeem', '0183068107', 6),
(196, 'Mobarak', NULL, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `participent`
--
ALTER TABLE `participent`
  ADD PRIMARY KEY (`email`,`usn`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `staff_coordinator`
--
ALTER TABLE `staff_coordinator`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `student_coordinator`
--
ALTER TABLE `student_coordinator`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `registered`
--
ALTER TABLE `registered`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `staff_coordinator`
--
ALTER TABLE `staff_coordinator`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `student_coordinator`
--
ALTER TABLE `student_coordinator`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
