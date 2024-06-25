-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 04:13 PM
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
-- Database: `igdtuw_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Admin', 'admin@1234');

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

CREATE TABLE `allotment` (
  `aid` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `paperCode` varchar(10) DEFAULT NULL,
  `startNo` bigint(11) DEFAULT NULL,
  `endNo` bigint(11) DEFAULT NULL,
  `total` int(11) GENERATED ALWAYS AS (`endNo` - `startNo` + 1) VIRTUAL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allotment`
--

INSERT INTO `allotment` (`aid`, `cid`, `date`, `paperCode`, `startNo`, `endNo`, `start_time`, `end_time`, `block`) VALUES
(1148, 4, '2024-05-23', 'BEC 306', 101, 155, '10:00:00', '01:00:00', 'ARCHITECTURE'),
(1149, 2, '2024-05-23', 'HMC 112', 181, 200, '02:00:00', '05:00:00', 'IT'),
(1150, 6, '2024-05-24', 'BIT 202', 201, 270, '10:00:00', '01:00:00', 'CSE'),
(1151, 5, '2024-05-24', 'BCS - 202', 301, 345, '02:00:00', '05:00:00', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `cid` int(11) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `block` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`cid`, `roomNo`, `block`, `floor`, `capacity`) VALUES
(1, 101, 'IT', 'Ground Floor', 50),
(2, 102, 'IT', 'Ground Floor', 45),
(3, 103, 'IT', 'Ground Floor', 50),
(4, 104, 'ARCHITECTURE', 'Ground Floor', 45),
(5, 205, 'IT', 'Second Floor', 50),
(6, 201, 'CSE', 'First Floor', 50),
(7, 202, 'ECE', 'First Floor', 50),
(8, 203, 'MECHANICAL', 'First Floor', 50),
(9, 106, 'MECHANICAL', 'Ground Floor', 50),
(10, 210, 'IT', 'Second Floor', 25),
(11, 211, 'IT', 'First Floor', 50),
(12, 212, 'IT', 'First Floor', 50),
(13, 213, 'IT', 'First Floor', 35),
(14, 204, 'ECE', 'Second Floor', 50),
(15, 301, 'ECE', 'Second Floor', 60);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `rollNo` bigint(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollNo`, `name`, `course`, `year`, `semester`) VALUES
(101, 'Priya Sharma', 'B-ARCH', 1, 1),
(102, 'Shivani Mishra', 'B-ARCH', 2, 1),
(103, 'Nisha Singh', 'B-ARCH', 1, 1),
(104, 'Simran Yadav', 'B-ARCH', 2, 1),
(105, 'Ananya Singh', 'B-ARCH', 3, 1),
(106, 'Kritika Verma', 'B-ARCH', 1, 1),
(107, 'Poonam Singh', 'B-ARCH', 1, 1),
(108, 'Tanisha Singh', 'B-ARCH', 3, 1),
(109, 'Priya Singh', 'B-ARCH', 1, 1),
(110, 'Aarohi Yadav', 'B-ARCH', 2, 1),
(111, 'Shreya Patel', 'B-ARCH', 3, 1),
(112, 'Ishika Patel', 'B-ARCH', 2, 1),
(113, 'Anjali Yadav', 'B-ARCH', 3, 1),
(114, 'Shreya Mishra', 'B-ARCH', 2, 1),
(115, 'Preeti Singh', 'B-ARCH', 3, 1),
(116, 'Roshni Das', 'B-ARCH', 1, 3),
(117, 'Pragya Singh', 'B-ARCH', 3, 1),
(118, 'Alisha Saha', 'B-ARCH', 2, 3),
(119, 'Nisha Singh', 'B-ARCH', 2, 1),
(120, 'Muskan Gupta', 'B-ARCH', 3, 1),
(121, 'Ishita Singh', 'B-ARCH', 2, 1),
(122, 'Aditi Mishra', 'B-ARCH', 3, 1),
(123, 'Shreya Patel', 'B-ARCH', 2, 1),
(124, 'Shivani Sharma', 'B-ARCH', 3, 1),
(125, 'Riya Yadav', 'B-ARCH', 1, 1),
(126, 'Anushka Sharma', 'B-ARCH', 1, 2),
(127, 'Poonam Singh', 'B-ARCH', 3, 1),
(128, 'Priya Singh', 'B-ARCH', 1, 1),
(129, 'Aarohi Chatterjee', 'B-ARCH', 3, 3),
(130, 'Khushi Sharma', 'B-ARCH', 1, 1),
(131, 'Ritika Reddy', 'B-ARCH', 2, 2),
(132, 'Simran Sharma', 'B-ARCH', 2, 2),
(133, 'Isha Mishra', 'B-ARCH', 3, 1),
(134, 'Shreya Sen', 'B-ARCH', 1, 2),
(135, 'Sakshi Verma', 'B-ARCH', 1, 2),
(136, 'Riya Gupta', 'B-ARCH', 3, 1),
(137, 'Aditi Mishra', 'B-ARCH', 1, 2),
(138, 'Anjali Singh', 'B-ARCH', 2, 1),
(139, 'Ritika Saha', 'B-ARCH', 2, 3),
(140, 'Kavya Singh', 'B-ARCH', 3, 1),
(141, 'Anushka Rajput', 'B-ARCH', 1, 2),
(142, 'Jyoti Singh', 'B-ARCH', 3, 1),
(143, 'Megha Patel', 'B-ARCH', 1, 2),
(144, 'Ananya Rajput', 'B-ARCH', 2, 1),
(145, 'Aarti Patel', 'B-ARCH', 3, 1),
(146, 'Shreya Sharma', 'B-ARCH', 1, 2),
(147, 'Ankita Saha', 'B-ARCH', 3, 1),
(148, 'Aaradhya Sharma', 'B-ARCH', 2, 1),
(149, 'Shweta Sharma', 'B-ARCH', 2, 3),
(150, 'Deepika Das', 'B-ARCH', 3, 1),
(151, 'Neha Gupta', 'Btech - IT', 2, 3),
(152, 'Riya Saha', 'Btech - IT', 3, 3),
(153, 'Riya Das', 'Btech - IT', 1, 3),
(154, 'Sakshi Mishra', 'Btech - IT', 3, 2),
(155, 'Trisha Sharma', 'Btech - IT', 1, 2),
(156, 'Sara Reddy', 'Btech - IT', 2, 3),
(157, 'Ankita Verma', 'Btech - IT', 3, 2),
(158, 'Aarohi Chatterjee', 'Btech - IT', 3, 3),
(159, 'Alisha Saha', 'Btech - IT', 2, 3),
(160, 'Ritika Das', 'Btech - IT', 1, 3),
(161, 'Isha Chatterjee', 'Btech - IT', 3, 3),
(162, 'Ankita Yadav', 'Btech - IT', 3, 2),
(163, 'Roshni Das', 'Btech - IT', 1, 3),
(164, 'Shweta Sharma', 'Btech - IT', 2, 3),
(165, 'Prachi Saha', 'Btech - IT', 2, 3),
(166, 'Ritika Sharma', 'Btech - IT', 2, 3),
(167, 'Sakshi Verma', 'Btech - IT', 3, 2),
(168, 'Khushi Das', 'Btech - IT', 1, 3),
(169, 'Aditi Chatterjee', 'Btech - IT', 3, 3),
(170, 'Pooja Sharma', 'Btech - IT', 1, 2),
(171, 'Isha Yadav', 'Btech - IT', 3, 2),
(172, 'Ankita Saha', 'Btech - IT', 2, 3),
(173, 'Aaradhya Singh', 'Btech - IT', 1, 2),
(174, 'Anjali Singh', 'Btech - IT', 2, 3),
(175, 'Ritika Verma', 'Btech - IT', 1, 2),
(176, 'Aditi Singh', 'Btech - IT', 3, 2),
(177, 'Pooja Yadav', 'Btech - IT', 1, 2),
(178, 'Riya Sharma', 'Btech - IT', 3, 2),
(179, 'Ananya Yadav', 'Btech - IT', 1, 3),
(180, 'Kritika Sharma', 'Btech - IT', 2, 3),
(181, 'Jyoti Das', 'Btech - IT', 1, 3),
(182, 'Kavya Saha', 'Btech - IT', 2, 3),
(183, 'Ananya Sharma', 'Btech - IT', 3, 2),
(184, 'Ananya Saha', 'Btech - IT', 2, 3),
(185, 'Neha Sharma', 'Btech - IT', 1, 3),
(186, 'Muskan Yadav', 'Btech - IT', 3, 2),
(187, 'Aarti Yadav', 'Btech - IT', 1, 3),
(188, 'Preeti Saha', 'Btech - IT', 2, 3),
(189, 'Anjali Das', 'Btech - IT', 1, 3),
(190, 'Riya Saha', 'Btech - IT', 2, 3),
(191, 'Khushi Saha', 'Btech - IT', 3, 2),
(192, 'Ananya Saha', 'Btech - IT', 1, 3),
(193, 'Simran Sharma', 'Btech - IT', 3, 2),
(194, 'Anushka Saha', 'Btech - IT', 2, 3),
(195, 'Aaradhya Sharma', 'Btech - IT', 1, 3),
(196, 'Anushka Yadav', 'Btech - IT', 3, 2),
(197, 'Ritika Yadav', 'Btech - IT', 2, 3),
(198, 'Sakshi Saha', 'Btech - IT', 1, 3),
(199, 'Aaradhya Yadav', 'Btech - IT', 3, 2),
(200, 'Riya Sharma', 'Btech - IT', 1, 3),
(201, 'Anjali Singh', 'Btech - CSE', 3, 2),
(202, 'Ankita Verma', 'Btech - CSE', 1, 2),
(203, 'Ananya Verma', 'Btech - CSE', 3, 2),
(204, 'Anushka Rajput', 'Btech - CSE', 1, 2),
(205, 'Ritika Sharma', 'Btech - CSE', 2, 2),
(206, 'Anjali Sharma', 'Btech - CSE', 3, 2),
(207, 'Riya Singh', 'Btech - CSE', 2, 2),
(208, 'Ritika Yadav', 'Btech - CSE', 3, 2),
(209, 'Isha Yadav', 'Btech - CSE', 3, 2),
(210, 'Simran Sharma', 'Btech - CSE', 2, 2),
(211, 'Khushi Saha', 'Btech - CSE', 1, 2),
(212, 'Ritika Das', 'Btech - CSE', 3, 2),
(213, 'Ankita Sharma', 'Btech - CSE', 2, 2),
(214, 'Sakshi Sharma', 'Btech - CSE', 3, 2),
(215, 'Riya Saha', 'Btech - CSE', 2, 2),
(216, 'Aaradhya Saha', 'Btech - CSE', 1, 2),
(217, 'Ankita Singh', 'Btech - CSE', 3, 2),
(218, 'Isha Saha', 'Btech - CSE', 2, 2),
(219, 'Sneha Singh', 'Btech - CSE', 3, 2),
(220, 'Ritika Verma', 'Btech - CSE', 1, 2),
(221, 'Aaradhya Sharma', 'Btech - CSE', 3, 2),
(222, 'Simran Singh', 'Btech - CSE', 2, 2),
(223, 'Ankita Das', 'Btech - CSE', 1, 2),
(224, 'Ananya Saha', 'Btech - CSE', 3, 2),
(225, 'Riya Das', 'Btech - CSE', 2, 2),
(226, 'Ritika Singh', 'Btech - CSE', 3, 2),
(227, 'Anushka Yadav', 'Btech - CSE', 2, 2),
(228, 'Ananya Singh', 'Btech - CSE', 1, 2),
(229, 'Aaradhya Saha', 'Btech - CSE', 3, 2),
(230, 'Riya Sharma', 'Btech - CSE', 2, 2),
(231, 'Ankita Saha', 'Btech - CSE', 1, 2),
(232, 'Simran Singh', 'Btech - CSE', 3, 2),
(233, 'Anushka Das', 'Btech - CSE', 2, 2),
(234, 'Ritika Singh', 'Btech - CSE', 3, 2),
(235, 'Riya Saha', 'Btech - CSE', 1, 2),
(236, 'Ankita Sharma', 'Btech - CSE', 3, 2),
(237, 'Ritika Verma', 'Btech - CSE', 2, 2),
(238, 'Isha Saha', 'Btech - CSE', 3, 2),
(239, 'Sneha Singh', 'Btech - CSE', 2, 2),
(240, 'Ritika Sharma', 'Btech - CSE', 3, 2),
(241, 'Ankita Das', 'Btech - CSE', 2, 2),
(242, 'Anushka Yadav', 'Btech - CSE', 3, 2),
(243, 'Ananya Saha', 'Btech - CSE', 2, 2),
(244, 'Ritika Singh', 'Btech - CSE', 3, 2),
(245, 'Ankita Singh', 'Btech - CSE', 2, 2),
(246, 'Aaradhya Saha', 'Btech - CSE', 3, 2),
(247, 'Riya Sharma', 'Btech - CSE', 2, 2),
(248, 'Ankita Saha', 'Btech - CSE', 3, 2),
(249, 'Simran Singh', 'Btech - CSE', 2, 2),
(250, 'Anushka Das', 'Btech - CSE', 3, 2),
(251, 'Ritika Singh', 'Btech - CSE', 2, 2),
(252, 'Riya Saha', 'Btech - CSE', 3, 2),
(253, 'Ankita Sharma', 'Btech - CSE', 2, 2),
(254, 'Isha Saha', 'Btech - CSE', 3, 2),
(255, 'Sneha Singh', 'Btech - CSE', 2, 2),
(256, 'Ritika Sharma', 'Btech - CSE', 3, 2),
(257, 'Ankita Das', 'Btech - CSE', 2, 2),
(258, 'Anushka Yadav', 'Btech - CSE', 3, 2),
(259, 'Ananya Saha', 'Btech - CSE', 2, 2),
(260, 'Ritika Singh', 'Btech - CSE', 3, 2),
(261, 'Riya Saha', 'Btech - CSE', 2, 2),
(262, 'Ankita Sharma', 'Btech - CSE', 3, 2),
(263, 'Ritika Verma', 'Btech - CSE', 2, 2),
(264, 'Isha Saha', 'Btech - CSE', 3, 2),
(265, 'Sneha Singh', 'Btech - CSE', 2, 2),
(266, 'Ritika Sharma', 'Btech - CSE', 3, 2),
(267, 'Ankita Das', 'Btech - CSE', 2, 2),
(268, 'Anushka Yadav', 'Btech - CSE', 3, 2),
(269, 'Ananya Saha', 'Btech - CSE', 2, 2),
(270, 'Ritika Singh', 'Btech - CSE', 3, 2),
(271, 'Riya Saha', 'Btech - CSE', 2, 2),
(272, 'Ankita Sharma', 'Btech - CSE', 3, 2),
(273, 'Ritika Verma', 'Btech - CSE', 2, 2),
(274, 'Isha Saha', 'Btech - CSE', 3, 2),
(275, 'Sneha Singh', 'Btech - CSE', 2, 2),
(276, 'Ritika Sharma', 'Btech - CSE', 3, 2),
(277, 'Ankita Das', 'Btech - CSE', 2, 2),
(278, 'Anushka Yadav', 'Btech - CSE', 3, 2),
(279, 'Ananya Saha', 'Btech - CSE', 2, 2),
(280, 'Ritika Singh', 'Btech - CSE', 3, 2),
(281, 'Riya Saha', 'Btech - CSE', 2, 2),
(282, 'Ankita Sharma', 'Btech - CSE', 3, 2),
(283, 'Ritika Verma', 'Btech - CSE', 2, 2),
(284, 'Isha Saha', 'Btech - CSE', 3, 2),
(285, 'Sneha Singh', 'Btech - CSE', 2, 2),
(286, 'Ritika Sharma', 'Btech - CSE', 3, 2),
(287, 'Ankita Das', 'Btech - CSE', 2, 2),
(288, 'Anushka Yadav', 'Btech - CSE', 3, 2),
(289, 'Ananya Saha', 'Btech - CSE', 2, 2),
(290, 'Ritika Singh', 'Btech - CSE', 3, 2),
(291, 'Riya Saha', 'Btech - CSE', 2, 2),
(292, 'Ankita Sharma', 'Btech - CSE', 3, 2),
(293, 'Ritika Verma', 'Btech - CSE', 2, 2),
(294, 'Isha Saha', 'Btech - CSE', 3, 2),
(295, 'Sneha Singh', 'Btech - CSE', 2, 2),
(296, 'Ritika Sharma', 'Btech - CSE', 3, 2),
(297, 'Ankita Das', 'Btech - CSE', 2, 2),
(298, 'Anushka Yadav', 'Btech - CSE', 3, 2),
(299, 'Ananya Saha', 'Btech - CSE', 2, 2),
(300, 'Ritika Singh', 'Btech - CSE', 3, 2),
(301, 'Ayesha Patel', 'MBA', 1, 1),
(302, 'Megha Patel', 'MBA', 2, 1),
(303, 'Nisha Patel', 'MBA', 3, 1),
(304, 'Khushi Patel', 'MBA', 1, 1),
(305, 'Shivani Patel', 'MBA', 2, 1),
(306, 'Ananya Patel', 'MBA', 3, 1),
(307, 'Priya Patel', 'MBA', 1, 1),
(308, 'Anjali Patel', 'MBA', 2, 1),
(309, 'Kavya Patel', 'MBA', 3, 1),
(310, 'Riya Patel', 'MBA', 1, 1),
(311, 'Simran Patel', 'MBA', 2, 1),
(312, 'Shreya Patel', 'MBA', 3, 1),
(313, 'Sakshi Patel', 'MBA', 1, 1),
(314, 'Aarti Patel', 'MBA', 2, 1),
(315, 'Pooja Patel', 'MBA', 3, 1),
(316, 'Trisha Patel', 'MBA', 1, 1),
(317, 'Anushka Patel', 'MBA', 2, 1),
(318, 'Ritika Patel', 'MBA', 3, 1),
(319, 'Isha Patel', 'MBA', 1, 1),
(320, 'Roshni Patel', 'MBA', 2, 1),
(321, 'Anjali Patel', 'MBA', 3, 1),
(322, 'Shreya Patel', 'MBA', 1, 1),
(323, 'Shivani Patel', 'MBA', 2, 1),
(324, 'Priya Patel', 'MBA', 3, 1),
(325, 'Aarohi Patel', 'MBA', 1, 1),
(326, 'Shreya Patel', 'MBA', 2, 1),
(327, 'Sakshi Patel', 'MBA', 3, 1),
(328, 'Ananya Patel', 'MBA', 1, 1),
(329, 'Khushi Patel', 'MBA', 2, 1),
(330, 'Ritika Patel', 'MBA', 3, 1),
(331, 'Deepika Sharma', 'MCA', 1, 1),
(332, 'Shreya Gupta', 'MCA', 2, 1),
(333, 'Shivani Singh', 'MCA', 3, 1),
(334, 'Tanvi Patel', 'MCA', 1, 1),
(335, 'Aarohi Gupta', 'MCA', 2, 1),
(336, 'Anushka Singh', 'MCA', 3, 1),
(337, 'Ritika Sharma', 'MCA', 1, 1),
(338, 'Nisha Gupta', 'MCA', 2, 1),
(339, 'Khushi Singh', 'MCA', 3, 1),
(340, 'Isha Patel', 'MCA', 1, 1),
(341, 'Riya Gupta', 'MCA', 2, 1),
(342, 'Shivani Singh', 'MCA', 3, 1),
(343, 'Aishwarya Patel', 'MCA', 1, 1),
(344, 'Ankita Gupta', 'MCA', 2, 1),
(345, 'Tanvi Singh', 'MCA', 3, 1),
(346, 'Priya Patel', 'MCA', 1, 1),
(347, 'Ananya Gupta', 'MCA', 2, 1),
(348, 'Shreya Singh', 'MCA', 3, 1),
(349, 'Ishika Patel', 'MCA', 1, 1),
(350, 'Roshni Gupta', 'MCA', 2, 1),
(351, 'Anjali Singh', 'MCA', 3, 1),
(352, 'Aaradhya Patel', 'MCA', 1, 1),
(353, 'Anushka Gupta', 'MCA', 2, 1),
(354, 'Sakshi Singh', 'MCA', 3, 1),
(355, 'Neha Patel', 'MCA', 1, 1),
(356, 'Shivani Gupta', 'MCA', 2, 1),
(357, 'Riya Singh', 'MCA', 3, 1),
(358, 'Aarti Patel', 'MCA', 1, 1),
(359, 'Anjali Gupta', 'MCA', 2, 1),
(360, 'Khushi Singh', 'MCA', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `paperCode` varchar(10) NOT NULL,
  `course` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`paperCode`, `course`, `subject`) VALUES
('BAP 101', 'B-Arch', 'Introduction to Architectural Design - I'),
('BAP 105', 'B-Arch', ' Architectural Drawing - I '),
('BAP 109', 'B-Arch', 'History of Architecture- I'),
('BAP 117', 'B-Arch', 'Mathematics in Architecture'),
('BCS - 202', 'Btech - CSE', 'Computer Organization and Architecture'),
('BCS - 301', 'Btech - CSE', 'Artificial Intelligence '),
('BCS 204', 'Btech - CSE', 'Design and Analysis of Algorithms'),
('BCS 305', 'Btech - ECE', 'Microprocessors &amp; Microcontrollers'),
('BEC 306', 'Btech - ECE', 'VLSI Design'),
('BEC 310', 'Btech - ECE', 'Digital Signal Processing'),
('BEP 101', 'Btech - ECE', 'Digital System Design'),
('BIT 202', 'Btech - CSE', 'Operating Systems'),
('BIT 306', 'Btech - IT', 'Data Mining and Machine Learning'),
('BIT 310', 'Btech - IT', ' Internet of Things'),
('BIT 316', 'Btech - IT', 'Computer Vision'),
('BIT 419', 'Btech - IT', 'Cyber Security and Forensics'),
('BMS 103', 'BBA', 'Financial Accounting'),
('BMS 106', 'BBA', 'Macro Economics '),
('BMS 112', 'BBA', 'Management Accounting'),
('BMS 302', 'BBA', 'Project Management'),
('HMC 112', 'MBA', 'Soft Skills'),
('MCA 102', 'MCA', 'Oops withJAVA'),
('MCA 104', 'MCA', 'Machine Learning'),
('MCA 106', 'MCA', 'Programming with Python'),
('MCA 108', 'MCA', 'Data communication and computer networks'),
('MIT 133', 'Mtech', 'Cloud Computing and IOT'),
('MMS 112', 'MBA', 'Operations Management'),
('MMS 242', 'MBA', 'E-governance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `allotment`
--
ALTER TABLE `allotment`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `paperCodeFK` (`paperCode`),
  ADD KEY `cidFK` (`cid`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollNo`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`paperCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allotment`
--
ALTER TABLE `allotment`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1153;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allotment`
--
ALTER TABLE `allotment`
  ADD CONSTRAINT `cidFK` FOREIGN KEY (`cid`) REFERENCES `classroom` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
