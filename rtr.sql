-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 07:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtr`
--

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `cid` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `pt1` varchar(256) DEFAULT NULL,
  `pt2` varchar(256) DEFAULT NULL,
  `pt3` varchar(256) DEFAULT NULL,
  `main_content` text DEFAULT NULL,
  `img1` varchar(256) NOT NULL DEFAULT 'def-3.jpeg',
  `img2` varchar(256) NOT NULL DEFAULT 'def-2.jpeg',
  `img3` varchar(256) NOT NULL DEFAULT 'def-1.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`id`, `cid`, `description`, `pt1`, `pt2`, `pt3`, `main_content`, `img1`, `img2`, `img3`) VALUES
(4, '91901', 'All of us have leisure time and we all have our own way of spending it. The best way perhaps to kill our leisure time is to involve in a Rotaract club. Rotaract Club not only ensures that you had a whale of your time in leisure; it also molds you into a citizen for the society. You get equipped with good leadership development skills, thorough knowledge on community\'s woes and solutions and thereby emerge as a person of great value.', 'Combo pack of personality & skill development with extra coupons of gaining knowledge', 'Small acts multiplied by hundreds is the formula for a better community', 'Expanding connections till the world feels small', 'Rotaract Club of Coimbatore Uptown was constructed and concreted its foundation by Rotary Club of Coimbatore Uptown on 24th August, 2014. Always a new star glows brighter. Similarly, we done good years of rotaraction at the start. As streams found its lake we stayed inactive for a short period. We taken up responsbilities to retreat rotaraction with fellowship again. Uptowners Projects of Perseverance lifted up the club. Phenomenal elevation in rotaraction we have been through for the past few years have given us fulfillness in serving society with love and care. By Grooming our career with inculcating ourselves the strengths and weakness, uptown have been a pillar. We came back stronger and that\'s what we known for.', '611f985c17ccd3.27733948.jpg', '611f94cb75c3b8.84582531.jpg', '611f94cb75b359.42396943.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `club_management`
--

CREATE TABLE `club_management` (
  `id` int(11) NOT NULL,
  `cid` varchar(256) NOT NULL,
  `rid` varchar(256) NOT NULL,
  `groups` varchar(256) NOT NULL DEFAULT '1',
  `designation` varchar(256) NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `fb` varchar(256) NOT NULL,
  `insta` varchar(256) NOT NULL,
  `linked` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club_management`
--

INSERT INTO `club_management` (`id`, `cid`, `rid`, `groups`, `designation`, `pdate`, `fb`, `insta`, `linked`) VALUES
(442, '91901', '91901_003', '3', 'Vice President', '2022-05-20 13:53:51', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `club_projects`
--

CREATE TABLE `club_projects` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `cid` varchar(256) DEFAULT NULL,
  `event_chairman` varchar(256) DEFAULT NULL,
  `from_date` varchar(256) DEFAULT NULL,
  `post_date` varchar(256) DEFAULT NULL,
  `avenue` varchar(256) DEFAULT NULL,
  `project_with` varchar(256) DEFAULT NULL,
  `groups` varchar(256) DEFAULT NULL,
  `venue` varchar(256) DEFAULT NULL,
  `type` varchar(256) DEFAULT 'project',
  `time` varchar(256) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `conclusion` text NOT NULL DEFAULT 'Project completed successfully',
  `project_poster` varchar(256) NOT NULL DEFAULT 'def_poster.png',
  `rtr_count` varchar(256) DEFAULT NULL,
  `rtn_count` varchar(256) DEFAULT NULL,
  `poster_2` varchar(255) DEFAULT NULL,
  `poster_3` varchar(255) NOT NULL DEFAULT 'def_poster.png',
  `mail` tinyint(1) NOT NULL DEFAULT 0,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `report` tinyint(1) NOT NULL DEFAULT 0,
  `report_submitted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `club_projects`
--

INSERT INTO `club_projects` (`id`, `name`, `cid`, `event_chairman`, `from_date`, `post_date`, `avenue`, `project_with`, `groups`, `venue`, `type`, `time`, `description`, `conclusion`, `project_poster`, `rtr_count`, `rtn_count`, `poster_2`, `poster_3`, `mail`, `pdate`, `report`, `report_submitted`) VALUES
(1, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', '<p>Project completed successfully</p>\r\n', 'def_poster.png', '15', '21', '628b0f0727bd90.80123439.jpg', '628b0f0727ecb6.66590422.jpg', 1, '2022-05-16 12:28:21', 0, 0),
(2, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', 'Project completed successfully', 'def_poster.png', NULL, NULL, NULL, 'def_poster.png', 0, '2022-05-16 12:28:21', 0, 0),
(3, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', 'Project completed successfully', 'def_poster.png', NULL, NULL, NULL, 'def_poster.png', 0, '2022-05-16 12:28:21', 0, 0),
(4, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', 'Project completed successfully', 'def_poster.png', NULL, NULL, NULL, 'def_poster.png', 0, '2022-05-16 12:28:21', 0, 0),
(5, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', 'Project completed successfully', 'def_poster.png', NULL, NULL, NULL, 'def_poster.png', 0, '2022-05-16 12:28:21', 0, 0),
(6, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', 'Project completed successfully', 'def_poster.png', NULL, NULL, NULL, 'def_poster.png', 0, '2022-05-16 12:28:21', 0, 0),
(7, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', 'Project completed successfully', 'def_poster.png', NULL, NULL, NULL, 'def_poster.png', 0, '2022-05-16 12:28:21', 0, 0),
(8, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', 'Project completed successfully', 'def_poster.png', NULL, NULL, NULL, 'def_poster.png', 0, '2022-05-16 12:28:21', 0, 0),
(9, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', 'Project completed successfully', 'def_poster.png', NULL, NULL, NULL, 'def_poster.png', 0, '2022-05-16 12:28:21', 0, 0),
(10, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', 'Project completed successfully', 'def_poster.png', NULL, NULL, NULL, 'def_poster.png', 0, '2022-05-16 12:28:21', 0, 0),
(11, 'Test', '91901', 'Nil', '2022-05-16', '2022-05-16', 'Club_Service', 'rotaract', '3', 'Google Meet', 'project', '18:00', '<p>Hii</p>\r\n', 'Project completed successfully', 'def_poster.png', NULL, NULL, NULL, 'def_poster.png', 0, '2022-05-16 12:28:21', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deleted_members`
--

CREATE TABLE `deleted_members` (
  `id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rid` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cid` varchar(256) DEFAULT NULL,
  `del_reason` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dist_event`
--

CREATE TABLE `dist_event` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `xiv_rotaract` varchar(256) NOT NULL,
  `venue` varchar(256) NOT NULL,
  `map_location` varchar(256) NOT NULL,
  `event_chairman` varchar(256) NOT NULL,
  `event_secretary` varchar(256) NOT NULL,
  `host_club` varchar(256) NOT NULL,
  `date` varchar(256) NOT NULL,
  `time` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `description` text NOT NULL,
  `banner` varchar(256) NOT NULL,
  `host_chairman` varchar(256) DEFAULT NULL,
  `host_secretary` varchar(256) DEFAULT NULL,
  `host_conveyer` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dist_event_poster`
--

CREATE TABLE `dist_event_poster` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `poster` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dist_gallery`
--

CREATE TABLE `dist_gallery` (
  `id` int(11) NOT NULL,
  `event_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cid` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `pdate` varchar(255) DEFAULT NULL,
  `udate` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `del` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `iclub`
--

CREATE TABLE `iclub` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `family_rotaract` varchar(256) DEFAULT NULL,
  `cid` varchar(255) DEFAULT NULL,
  `president_name` varchar(256) NOT NULL,
  `secretary_name` varchar(256) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `grp_email` varchar(256) DEFAULT NULL,
  `rtr_email` varchar(256) DEFAULT NULL,
  `fb` varchar(256) DEFAULT NULL,
  `insta` varchar(256) DEFAULT NULL,
  `linked` varchar(256) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `groups` varchar(256) NOT NULL DEFAULT '1',
  `password` varchar(256) NOT NULL,
  `base` varchar(256) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'rtrlogo1.png',
  `udate` varchar(255) DEFAULT NULL,
  `main_content` text NOT NULL DEFAULT 'Rotaract District Organisation 3201 has always been and continues to be the epitome of professionalism and a repository of dynamic minds decorating its proud community',
  `description` text DEFAULT 'All of us have leisure time and we all have our own way of spending it. The best way perhaps to kill our leisure time is to involve in a Rotaract club. Rotaract Club not only ensures that you had a whale of your time in leisure; it also molds you into a citizen for the society. You get equipped with good leadership development skills, thorough knowledge on community\'s woes and solutions and thereby emerge as a person of great value.',
  `pt1` text DEFAULT 'Combo pack of personality & skill development with extra coupons of gaining knowledge',
  `pt2` text DEFAULT 'Small acts multiplied by hundreds is the formula for a better community',
  `pt3` text DEFAULT 'Expanding connections till the world feels small',
  `img1` varchar(255) DEFAULT 'def-1.jpg',
  `img2` varchar(255) DEFAULT 'def-2.jpeg',
  `img3` varchar(255) DEFAULT 'def-3.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iclub`
--

INSERT INTO `iclub` (`id`, `name`, `family_rotaract`, `cid`, `president_name`, `secretary_name`, `email`, `grp_email`, `rtr_email`, `fb`, `insta`, `linked`, `phone`, `groups`, `password`, `base`, `logo`, `udate`, `main_content`, `description`, `pt1`, `pt2`, `pt3`, `img1`, `img2`, `img3`) VALUES
(29, 'Coimbatore Uptown', 'Coimbatore Uptown', '91901', 'Rtr. Monal', 'Rtr. Barath kumar', 'rac.cbe.uptown.91901@gmail.com', 'group3.impactyear@gmail.com', 'asivamurugan001@gmail.com', 'https://www.facebook.com/cbeuptown', 'https://www.instagram.com/rac_cbe_uptown/', 'https://www.linkedin.com/in/rotaract-club-of-coimbatoreuptown-899749212', '8220277456', '3', '12345', 'community', '612f3b799ed155.36508329.png', '2022-05-23', 'Rotaract District Organisation 3201 has always been and continues to be the epitome of professionalism and a repository of dynamic minds decorating its proud community', 'All of us have leisure time and we all have our own way of spending it. The best way perhaps to kill our leisure time is to involve in a Rotaract club. Rotaract Club not only ensures that you had a whale of your time in leisure; it also molds you into a citizen for the society. You get equipped with good leadership development skills, thorough knowledge on community\'s woes and solutions and thereby emerge as a person of great value.', 'Combo pack of personality & skill development with extra coupons of gaining knowledge', 'Small acts multiplied by hundreds is the formula for a better community', 'Expanding connections till the world feels small', 'def-1.jpg', 'def-2.jpeg', 'def-3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `image_slider`
--

CREATE TABLE `image_slider` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_slider`
--

INSERT INTO `image_slider` (`id`, `name`, `pdate`) VALUES
(7, 'dis_slider-4.jpeg', '2021-07-28 07:04:37'),
(8, 'dis_slider3.jpg', '2021-08-07 11:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `clubid` varchar(255) DEFAULT NULL,
  `cid` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `del` varchar(255) DEFAULT '0',
  `active_status` varchar(255) DEFAULT NULL,
  `dateofjoin` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `postdate` varchar(255) DEFAULT NULL,
  `updatedate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `name`, `clubid`, `cid`, `email`, `phone`, `description`, `status`, `del`, `active_status`, `dateofjoin`, `destination`, `postdate`, `updatedate`) VALUES
(1, '', '1', '', '', '', '', '0', '0', '', '', '', '22-04-2021', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `management_1`
--

CREATE TABLE `management_1` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `rid` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `fb_id` varchar(256) NOT NULL,
  `insta` varchar(246) NOT NULL,
  `linked` varchar(256) NOT NULL,
  `profile_pic` varchar(256) NOT NULL,
  `designation` varchar(256) NOT NULL,
  `post_date` varchar(256) NOT NULL,
  `update_date` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management_1`
--

INSERT INTO `management_1` (`id`, `name`, `rid`, `email`, `phone`, `fb_id`, `insta`, `linked`, `profile_pic`, `designation`, `post_date`, `update_date`) VALUES
(52, 'Rtr. PP. Kishore Babu', '9287520', 'rtrkishore3201@gmail.com', '+91 77086 85483', '', 'its_me_kisb', 'kishore-babu-5b263790', '61407fc8558672.67419497.jpg', 'District Rotaract Representative', '', ''),
(53, 'Rtr. Keerthi Vivek S', '8632506', 'abc@xyz.com', '+91-97899 01034', '', 'keerthi_vivek', 'keerthi-vivek-5a3949146', '611219b3d62428.88032517.jpg', 'Immediate Past District Rotaract Representative ', '', ''),
(55, 'Rtr. PP. Kishore Babu', '9287520', 'rtrkishore3201@gmail.com', '+91 77086 85483', '', 'its_me_kisb', 'kishore-babu-5b263790', '61407fc8558672.67419497.jpg', 'District Rotaract Representative', '', ''),
(78, 'Rtr. PP. Mohamed Afsar M I', '9731988', 'abc@xyz.com', '+91 96774 76692', '', '_affbhai_', 'mohamed-afsar-395594104', '6140e3b617f3d1.21113845.jpg', ' District Secretary', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cid` varchar(255) DEFAULT NULL,
  `groups` varchar(256) NOT NULL DEFAULT '1',
  `meetingtype` varchar(255) DEFAULT NULL,
  `post_date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `project_poster` varchar(255) DEFAULT NULL,
  `poster2` varchar(255) DEFAULT NULL,
  `rtr_count` varchar(255) DEFAULT NULL,
  `rtn_count` varchar(255) DEFAULT NULL,
  `type` varchar(256) DEFAULT 'meeting',
  `report` tinyint(4) NOT NULL DEFAULT 0,
  `report_submitted` tinyint(4) NOT NULL DEFAULT 0,
  `conclusion` text NOT NULL DEFAULT 'Meeting conducted successfully',
  `del` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `name`, `cid`, `groups`, `meetingtype`, `post_date`, `time`, `venue`, `purpose`, `description`, `project_poster`, `poster2`, `rtr_count`, `rtn_count`, `type`, `report`, `report_submitted`, `conclusion`, `del`, `status`, `pdate`) VALUES
(424, 'Test', '91901', '3', 'General_Body_Meeting', '2022-05-19', '15:00', 'office', 'Discussed our upcoming Projects ', '<p>Hii</p>\r\n', NULL, NULL, NULL, NULL, 'meeting', 0, 0, 'Meeting conducted successfully', NULL, NULL, '2022-05-20 03:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mid` varchar(255) DEFAULT NULL,
  `rid` varchar(255) DEFAULT NULL,
  `cid` varchar(255) DEFAULT NULL,
  `groups` varchar(256) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `clg_name` varchar(255) DEFAULT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `doj` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `blood` varchar(255) DEFAULT NULL,
  `blooddonor` varchar(255) DEFAULT NULL,
  `foodprefer` varchar(255) DEFAULT NULL,
  `duestatus` varchar(255) DEFAULT NULL,
  `del_reason` text DEFAULT NULL,
  `del_stat` tinyint(1) NOT NULL DEFAULT 0,
  `photo` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `del` varchar(255) DEFAULT '0',
  `postdate` varchar(255) DEFAULT NULL,
  `updatedate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `name`, `mid`, `rid`, `cid`, `groups`, `dob`, `occupation`, `clg_name`, `dept_name`, `email`, `gender`, `doj`, `phone`, `blood`, `blooddonor`, `foodprefer`, `duestatus`, `del_reason`, `del_stat`, `photo`, `status`, `del`, `postdate`, `updatedate`) VALUES
(4, 'Rtr. Amith Ravichandran', NULL, '91901_003', '91901', '3', '1995-09-28', 'Business', 'SREC', 'CSE', 'amithrsv@gmail.com', 'Male', '2016-07-20', '8667543621', 'O+', 'Yes', 'Non-Veg', 'Paid', NULL, 0, NULL, 'Active', '0', NULL, NULL),
(5, 'Rtr. Sivamurugan.A', '91901002', '91901_004', '91901', '3', '1996-07-01', 'Business', 'SR Mediatech', 'TL', 'asivamurugan001@gmail.com', 'Male', '2017-07-20', '8220277456', 'O+', 'Yes', 'Veg', 'Paid', NULL, 0, NULL, 'Active', '0', NULL, NULL),
(8, 'Rtr. Suriya.P', '91901003', '91901_007', '91901', '3', '1997-12-25', 'Business', 'SR Mediatech', 'Business Head', 'oviyasuriya2511@gmail.com', 'Male', '2016-07-20', '9789658446', 'A+', 'Yes', 'Non-Veg', 'Paid', NULL, 0, NULL, 'Active', '0', NULL, NULL),
(7351, 'Rtr Monal', '031321984984', '91901123', '91901', '3', '2022-06-23', 'Student', 'SREC', 'Student', 'admin@admin.com', 'Female', '2022-06-23', '09500808250', 'O+', 'Yes', 'Non-Veg', 'Paid', 'sdddsdf', 1, NULL, 'Inactive', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_admin`
--

CREATE TABLE `personal_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_admin`
--

INSERT INTO `personal_admin` (`id`, `username`, `password`) VALUES
(1, 'personal_admin', 'personal_admin');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submitted_count`
--

CREATE TABLE `submitted_count` (
  `id` int(11) NOT NULL,
  `cid` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groups` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `community` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professional` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `international` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpp` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tot_members` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tot_meetings` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_members` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rotary` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rotaract` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interact` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submitted_count`
--

INSERT INTO `submitted_count` (`id`, `cid`, `month`, `club`, `groups`, `community`, `professional`, `international`, `dpp`, `tot_members`, `tot_meetings`, `new_members`, `rotary`, `rotaract`, `interact`, `other`, `status`, `pdate`) VALUES
(13, '91901', 'August', '5', '3', '2', '1', '2', '0', '33', '2', '2', '0', '4', '0', '0', 1, '2021-09-03 11:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `submitted_tb`
--

CREATE TABLE `submitted_tb` (
  `id` int(11) NOT NULL,
  `month` varchar(256) DEFAULT NULL,
  `groups` varchar(256) NOT NULL DEFAULT '1',
  `proj_id` varchar(256) DEFAULT NULL,
  `cid` varchar(256) DEFAULT NULL,
  `submit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submitted_tb`
--

INSERT INTO `submitted_tb` (`id`, `month`, `groups`, `proj_id`, `cid`, `submit_date`) VALUES
(5, 'August', '3', '1', '91901', '2022-05-16 14:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `submitted_tm`
--

CREATE TABLE `submitted_tm` (
  `id` int(11) NOT NULL,
  `meet_id` varchar(256) DEFAULT NULL,
  `month` varchar(256) DEFAULT NULL,
  `cid` varchar(256) DEFAULT NULL,
  `groups` varchar(256) NOT NULL DEFAULT '1',
  `submitted_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submitted_tm`
--

INSERT INTO `submitted_tm` (`id`, `meet_id`, `month`, `cid`, `groups`, `submitted_date`) VALUES
(1, '1', 'August', '91901', '3', '2022-05-16 14:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(11) NOT NULL,
  `user_id` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groups` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `user_id`, `groups`, `password`) VALUES
(1, 'Super Admin', '4', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Group-1', '1', '4f55b1f936c3fb375c7623689b0b3a91'),
(3, 'Group-2', '2', '4f55b1f936c3fb375c7623689b0b3a91'),
(4, 'Group-3', '3', '4f55b1f936c3fb375c7623689b0b3a91'),
(5, 'Group-3', '3', '4f55b1f936c3fb375c7623689b0b3a91');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rid` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_id` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linked` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `rid`, `club_name`, `email`, `fb_id`, `insta`, `linked`, `phone`, `profile_pic`, `pdate`) VALUES
(6, 'PDRR. Rtr. Vivek Baskar', '11211', 'Rotaract Club of Coimbatore Symphony', 'abc@xyz.com', NULL, '#', '#', '123852963', '60ce438812a7b4.72266364.jpg', NULL),
(7, 'Rtr. PP. Sanjay Gera', '852369', 'Rotaract Club of Coimbatore Symphony', 'abc@xyz.com', NULL, NULL, NULL, '123456789', '60ce43c75b0338.93146496.jpg', NULL),
(8, 'PDRR. Rtr. Ajai S', '01236', 'Rotaract Club of Covai User Group', 'demo@mail.com', NULL, NULL, NULL, '8526931236', '60ce441e635bb0.93827287.jpg', NULL),
(9, 'Rtr. PP. Khumaravelu AT', '741852', 'Rotaract Club of Covai User Group', 'abc@xyz.com', NULL, NULL, NULL, '852963741', '60ce44460e7620.78676702.jpg', NULL),
(17, 'Rtr. PP Abhijeet VB', '-', 'Rotaract Club of Coimbatore Millennium', 'rtrabhijeetbalaji@gmail.com', NULL, 'alchemist_official', 'rtrabhijeetvenkatramanbalaji', '9597696003', '614cb537f2e176.69675985.jpg', NULL),
(18, 'PDRR Rtr. Ajay Chandran', '-', 'Rotaract Club of Coimbatore CACIL', 'ajayrccacil@gmail.com', NULL, 'ajayrccacil', 'ajay-chandran-259b9366', '9600178492', '614cb615c64f12.86129893.jpg', NULL),
(19, 'Rtr. PP Anita Sherlin S', '-', 'Rotaract Club of Coimbatore Millennium', 'rtranitasherlin3201@gmail.com', NULL, 'anita_sherlin_charles', 'anita-sherlin', '7708373754', '614cb6d00d7907.68579807.jpg', NULL),
(20, 'Rtr. Aravind Raj', '-', 'Rotaract club of Cochin East', 'aravindraj5075@gmail.com', NULL, '-', 'aravind-raj-a025b0197/', '7561835075', '614cb7f80d0c95.32857543.jpg', NULL),
(21, 'Rtr. PP Arshad L', '-', 'Rotaract Club of Saibaba Colony', 'rtrarshad3201@gmail.com', NULL, 'arshad_laxman', 'puruslaxman', '9597564956', '614cb85f189743.48885303.jpg', NULL),
(22, 'Rtr. IPP Arthi.K', '-', 'Rotaract club of Coimbatore Vadavalli', 'rtrarthi3201@gmail.com', NULL, ' the_acrobat_01_', 'arthi-krishnasamy-05b591135', '9789738070', '614cba1e9d7294.72235860.jpg', NULL),
(23, 'PDRR Rtn. Arun', '-', 'Rotary club of Coimbatore Millennium', 'rtn.arunparasuraman@gmail.com', NULL, 'arunparasuraman', 'arunparasuraman01/', '9994980403', '614cbb92359e68.55555940.jpg', NULL),
(24, 'Rtr. Balamurugan S', '-', 'Rotaract Club of SaibabaColony', 'rtrbala3201@gmail.com', NULL, 'mr_bala_rider', '-', '9597314587', '614cbc58c2a3c6.41519439.jpg', NULL),
(25, 'Rtr. Dhanya Sree A', '-', 'Rotaract club of Coimbatore Spectrum', 'dhanyaa001@gmail.com', NULL, ' _hallowed_bee_', 'dhanya-sree-a-48060b1a9/', '8870950003', '614cbcede79ea3.78825589.jpg', NULL),
(26, 'Rtr. PP Gowtham Kalyan', '-', 'The Rotaract club of Coimbatore Unity', 'gowthamkalyancse@gmail.com', NULL, 'gowtham_kalyan', 'gowtham-kalyan', '9789739432', '614cbda90b2d34.38513795.jpg', NULL),
(27, 'Rtr. PP. Gowtham Karthik', '-', 'Rotaract Club of Coimbatore Spectrum', 'rtrgowthamkarthik96@gmail.com', NULL, ' __gowtham_karthick__', '-', '7092564825', '614cbe55baf818.52720531.jpg', NULL),
(28, 'Rtr. PP. Hari Prasad', '-', 'Rotaract Club of Coimbatore Crystals', 'rtrhariprasad2000@gmail.com', NULL, 'harry____potterr', '-', '6369642036', '614cbec6190879.96319492.jpg', NULL),
(29, 'Rtr. PP. Hariharan S', '-', 'Rotaract Club of Coimbatore Millennium', 'hari.rcmillennium@gmail.com', NULL, ' hari_smuthu', 'hariharan-sonaimuthu-26112a11a/', '8220398993', '614cbf29a76a40.52705548.jpg', NULL),
(30, 'Rtr. IPP Haritha. B', '-', 'Rotaract club of Coimbatore Cosmopolitan', 'harithabalamurali@gmail.com', NULL, 'haritha.balamurali', 'haritha-balamurali-8466151a0/', '9443385073', '614cbfedc88a19.01741350.jpg', NULL),
(31, 'Rtr. IPP Harshananda', '-', 'Rotaract Club of Lead College of Management, Dhoni ', 'nandaharsha8@gmail.com', NULL, ' harshanandanarayanan', 'harsha-nanda-85a530190/', '+919846281887', '614cc063cd9db9.81639403.jpg', NULL),
(32, 'Rtr. PP. Kannan C', '-', 'Rotaract Club of Cug (Covai User Group)', 'kichaokannan@gmail.com', NULL, 'kanna_d_humdinger', 'kannan-chandrasekar-557aa3118/', '9994546958', '614cc78d586ee1.35990173.jpg', NULL),
(33, 'Rtr. PP. Karthik Gonsalvez', '-', 'Rotaract Club of Coimbatore Sunrise', 'iphotoreporter@gmail.com', NULL, 'karthikgonsalvez', 'karthikgonsalvez?utm_medium=copy_link', '9786498231', '614cca1867f947.34624597.jpg', NULL),
(35, 'Rtr. Laxminarayanan', '-', 'Rotaract club of Coimbatore Comito', 'laxminarayanan3005@gmail.com', NULL, 'laxmi_narayanan._', '-', '9363013709', '614ccb0cc0eb66.56162361.jpg', NULL),
(36, 'Rtr. Malavika J', '-', 'Rotaract Club of Lead College of Management, Dhoni ', 'malavikacjayan@gmail.com', NULL, 'malavika_jayan', '-', '7012159685', '614ccc49cc1096.36238026.jpg', NULL),
(37, 'Rtr. PP. Muthu Prasanna AS ', '-', 'Rotaract Club of Cug (Covai User Group)', 'abc@xyz.com', NULL, '_muthuprasanna_', 'muthu-prasanna-9ab406121/', '+91 97892 68978', '614ccdf62acc68.02291576.jpg', NULL),
(38, 'Rtr. Nandhitha M', '-', 'Rotaract Club of Coimbatore Crystals', 'rtrnandhitharacpsgcas@gmail.com', NULL, '__.nandhitha.__', 'nandhitha-m-6638231b0', '+918489895078', '614ccf384e16b5.14734634.jpg', NULL),
(39, 'Rtr. PP. Prashanth Sridhar', '-', '-', 'prashanthsridhar95@gmail.com', NULL, ' prashanthsridhar95', '-', '8056433341', '614cd0461e57c2.51692369.jpg', NULL),
(40, ' Rtr. PP. Premakanthii K', '-', 'Rotaract Club of Coimbatore Metro', 'rtrpremakanthiik@gmail.com', NULL, 'premakanthii', 'premakanthii-k-a6808015b', '9894010033', '614cd0c2d7d705.60730992.jpg', NULL),
(41, 'Rtr. IPP. Punitha', '-', 'Rotaract Club of Coimbatore Manchester', 'punikumar2511@gmail.com', NULL, '-', 'punitha-ashok-kumar-681422115', '9489801133', '614cd241d065b8.89187236.jpg', NULL),
(42, 'Rtr. PP. Premkumar', '10384187', 'Rotaract Club of Coimbatore Unique', 'rtr.premkumarpk@gmail.com', NULL, 'prem_kumar_rpk', 'premkumar-rajendran-ab78921b1', '9698794983', '614d72fa7efd57.19994578.jpg', NULL),
(43, 'Rtr. Rishab Adarsh', '-', 'Rotaract Club of Saibaba Colony', 'abc@xyz.com', NULL, 'rishab_adarsh', 'rishab-adarsh-86b30313a', '9865176342', '614d7acec97e24.68840735.jpg', NULL),
(44, 'Rtr. Ritesh PR', '-', 'Rotaract Club of Coimbatore Gaalaxy', 'rtr.ritesh@outlook.com', NULL, 'riitessh', 'riitessh', '7708171861', '614d74a01829e7.69516125.jpg', NULL),
(45, 'Rtr. Sabarinathan', '-', 'Rotaract Club of Coimbatore Cacil', 'sabarirccacil@gmail.com', NULL, 'sabarinathan_sridharan', 'sabarinathan-sridharan-14ba71213', '8098406173', '614d75513a36f0.84646305.jpg', NULL),
(46, 'Rtr. IPP Sakthi Sridevi N', '-', 'Rotaract club of JSS INYS', 'abc@xyz.com', NULL, 'sakthi_sridevi_', 'sakthi-sridevi-61ba44214', '7904339912', '614d773e6e2425.56766662.jpg', NULL),
(47, 'Rtr.IPP.Sangar Ganesh S', '-', 'Rotaract Club of Saibaba Colony', 'rtrsangarganesh@gmail.com', NULL, 'its_shankarganesh', 'sangar-ganesh-730803158', '8344692104', '614d7853da2a91.18418619.jpg', NULL),
(48, 'Rtr. PP Sanjay.S', '-', 'Rotaract club  of Coimbatore Gaalaxy', 'abc@xyz.com', NULL, 'sanjaypremsanjay', 'sanjay-prem-2aaa60215', '7339015902', '614d7b1b18a568.53608095.jpg', NULL),
(49, 'Rtr. K R Sanjula', '-', 'Rotaract Club of Coimbatore Institute Of Technology', 'abc@xyz.com', NULL, 'sanjula_08', 'sanjularajendran', '7010634008', '614d7a8d6b5ad5.35215783.jpg', NULL),
(50, 'Rtr. PP Sathish B', '-', 'Rotaract Club of Cug (Covai User Group)', 'rtrsathish3201@gmail.com', NULL, 'sathish_bmks', 'sathish-balakrishan-161050130', '8190952731', '614d7bc1725ef9.76396109.jpg', NULL),
(51, 'Rtr. IPP. Suparna M', '-', 'Rotaract Club of Rising stars', 'suparnababu95@gmail.com', NULL, '__suparna_m', 'suparna-babu-9b6174167', '8157050466', '614d7c8f53ac52.78968632.jpg', NULL),
(52, 'Rtr. PP. Thanghapantieyaan', '-', 'Rotaract Club of Coimbatore Texcity', 'thanghahicas@gmail.com', NULL, 'thangha_tp', 'thangha-pantieyaan', '9092195426', '614d7d4493f842.81192515.jpg', NULL),
(53, 'Rtr. PP Vijay Adith', '-', 'Rotaract Club of Coimbatore Main', 'rtrvijayadith@gmail.com', NULL, ' manly.mr', 'vijay-adith', '8122470548', '614df0ed115267.07758075.jpg', NULL),
(54, 'Rtr. PP. Vijay Vignesh VK', '-', 'Rotaract club of Coimbatore Gaalaxy', 'vijayvigneshk7@gmail.com', NULL, '_vijayvignesh', 'vijay-vignesh-vk-8197461a2', '9994447657', '614df1a04c24f9.71399777.jpg', NULL),
(55, 'Rtr. Hema', '-', 'Rotaract Club of Coimbatore Cacil', 'rtrhema3201@gmail.com', NULL, '_.l.i.n.i_', 'hema-p-822a4216b', '8870166228', '614df241386fa9.20608878.jpg', NULL),
(56, 'Rtr. IPP. Indhujaa', '-', 'Rotaract club of Coimbatore unity', 'unity_rtr.indhujaa@outlook.com', NULL, ' indalz', 'indhu-jaa-7850b8b7', '7200572110', '614df3e2a4ccb0.97056638.jpg', NULL),
(57, 'IPDRR. Rtr. Janani Mani', '-', 'Rotaract Club of Coimbatore Cacil', 'jananirccacil@gmail.com', NULL, ' janani_mani', '-', '9500646628', '614df45abde423.07590571.jpg', NULL),
(58, 'Rtr. Jeni Feona', '-', 'Rotaract Club of Coimbatore Majestic', 'jenifeonac@gmail.com', NULL, 'jen_eeeeeeeeeeeeee', 'jenifeonac', '9677607891', '614df4f6b4ac87.19447721.jpg', NULL),
(59, 'Rtr. PP. Vikash S', '-', 'Rotaract Club of Coimbatore Cacil', 'rtrvikashrccacil@gmail.com', NULL, 'vikash_subramani', 'vikash-subramani-5b4493169', '9585539182', '614df5a7d88a10.89947750.jpg', NULL),
(60, 'Rtr. PP. Vishnu B', '-', 'Rotaract club of coimbatore Sunrise', 'vishnu.skasc@gmail.com', NULL, ' vishnupirates', '-', '9047138186', '614df65bde9ec2.61529258.jpg', NULL),
(61, 'PDRR. Jimry Henry', '-', '-', 'jim.hermon@gmail.com', NULL, ' jimryhenry', '-', '9677968888', '614df7ac775685.44324345.jpeg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_management`
--
ALTER TABLE `club_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_projects`
--
ALTER TABLE `club_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleted_members`
--
ALTER TABLE `deleted_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dist_event`
--
ALTER TABLE `dist_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dist_event_poster`
--
ALTER TABLE `dist_event_poster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dist_gallery`
--
ALTER TABLE `dist_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iclub`
--
ALTER TABLE `iclub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_slider`
--
ALTER TABLE `image_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_1`
--
ALTER TABLE `management_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_admin`
--
ALTER TABLE `personal_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submitted_count`
--
ALTER TABLE `submitted_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submitted_tb`
--
ALTER TABLE `submitted_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submitted_tm`
--
ALTER TABLE `submitted_tm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `club_management`
--
ALTER TABLE `club_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `club_projects`
--
ALTER TABLE `club_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2183;

--
-- AUTO_INCREMENT for table `deleted_members`
--
ALTER TABLE `deleted_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `dist_event`
--
ALTER TABLE `dist_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dist_event_poster`
--
ALTER TABLE `dist_event_poster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `dist_gallery`
--
ALTER TABLE `dist_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iclub`
--
ALTER TABLE `iclub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `image_slider`
--
ALTER TABLE `image_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `management_1`
--
ALTER TABLE `management_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7352;

--
-- AUTO_INCREMENT for table `personal_admin`
--
ALTER TABLE `personal_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submitted_count`
--
ALTER TABLE `submitted_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT for table `submitted_tb`
--
ALTER TABLE `submitted_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1343;

--
-- AUTO_INCREMENT for table `submitted_tm`
--
ALTER TABLE `submitted_tm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
