-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 08:14 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sihadir`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `prody_id` int(11) NOT NULL,
  `class_semester` int(11) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `prody_id`, `class_semester`, `class_name`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'TI SCN 1', '2020-08-12 05:28:14', '2020-08-11 22:28:14'),
(2, 2, 6, 'SIKA 1', '2020-08-12 05:28:20', '2020-08-11 22:28:20'),
(3, 1, 6, 'TI SE 1', '2020-08-12 05:28:32', '2020-08-11 22:28:32'),
(4, 1, 1, 'TI 1', '2020-08-11 22:26:06', '2020-08-11 22:26:06'),
(5, 1, 1, 'TI 2', '2020-08-12 05:28:40', '2020-08-11 22:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `classroom_id` int(11) NOT NULL,
  `classroom_name` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`classroom_id`, `classroom_name`, `created_at`, `updated_at`) VALUES
(1, 'Auditorium', '2020-08-11 04:56:07', '2020-08-10 21:56:07'),
(2, 'R. 101', '2020-08-11 04:56:12', '2020-08-10 21:56:12'),
(3, 'R. 102', '2020-08-11 04:56:16', '2020-08-10 21:56:16'),
(5, 'R. 103', '2020-08-11 04:56:24', '2020-08-10 21:56:24'),
(6, 'R. 105', '2020-08-11 08:07:55', '2020-08-11 01:07:55'),
(7, 'R. 201', '2020-08-11 06:51:37', '2020-08-10 23:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_credits` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `lecturer_id` char(20) NOT NULL,
  `lecturer_name` varchar(30) NOT NULL,
  `lecturer_birthdate` date NOT NULL,
  `lecturer_birthplace` varchar(30) NOT NULL,
  `lecturer_gender` varchar(10) NOT NULL,
  `lecturer_address` text NOT NULL,
  `lecturer_phonenumber` char(15) NOT NULL,
  `lecturer_email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lecturer_id`, `lecturer_name`, `lecturer_birthdate`, `lecturer_birthplace`, `lecturer_gender`, `lecturer_address`, `lecturer_phonenumber`, `lecturer_email`, `created_at`, `updated_at`) VALUES
('101010', 'Kusnadi', '1988-11-11', 'cirebon', 'Male', 'Perum', '0812123334', 'dosen2@cic.ac.id', '2020-08-10 12:05:47', '2020-08-10 05:05:47'),
('123321', 'dosen', '1988-12-12', 'cirebon', 'Female', 'edaasd', '3123123', 'dsda97@gmail.com', '2020-08-10 05:14:16', '2020-08-10 05:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `presences`
--

CREATE TABLE `presences` (
  `presence_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `students_id` char(11) NOT NULL,
  `presence_time` time NOT NULL,
  `presence_status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programstudies`
--

CREATE TABLE `programstudies` (
  `prody_id` int(11) NOT NULL,
  `prody_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programstudies`
--

INSERT INTO `programstudies` (`prody_id`, `prody_name`, `created_at`, `updated_at`) VALUES
(1, 'Informatics Engineering', '2020-08-10 13:39:07', '0000-00-00 00:00:00'),
(2, 'Information System', '2020-08-10 13:38:30', '0000-00-00 00:00:00'),
(3, 'Visual Communication Design', '2020-08-10 13:39:35', '0000-00-00 00:00:00'),
(4, 'Accounting', '2020-08-11 01:46:39', '2020-08-11 01:46:39'),
(6, 'Web Programming', '2020-08-11 02:32:51', '2020-08-11 02:32:51'),
(7, 'Management Business', '2020-08-11 02:34:27', '2020-08-11 02:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `schedule_start` time NOT NULL,
  `schedule_end` time NOT NULL,
  `schedule_day` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staff_id` char(11) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `staff_birthdate` date NOT NULL,
  `staff_birthplace` varchar(30) NOT NULL,
  `staff_gender` varchar(10) NOT NULL,
  `staff_address` text NOT NULL,
  `staff_phonenumber` char(15) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staff_id`, `staff_name`, `staff_birthdate`, `staff_birthplace`, `staff_gender`, `staff_address`, `staff_phonenumber`, `staff_email`, `created_at`, `updated_at`) VALUES
('123123', 'Arie A', '1222-12-12', 'cirebon', 'Male', 'perum', '43432', 'ariearbiansyah05@gmail.com', '2020-08-10 10:25:06', '2020-08-10 03:25:06'),
('5111998', 'Arie Arbiansyah', '1998-11-05', 'Pemalang', 'Male', 'Perum', '31123', 'devsyndrome@gmail.com', '2020-08-10 10:31:32', '2020-08-10 03:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` char(11) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `student_birthdate` date NOT NULL,
  `student_birthplace` varchar(30) NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `student_address` text NOT NULL,
  `student_phonenumber` char(15) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_birthdate`, `student_birthplace`, `student_gender`, `student_address`, `student_phonenumber`, `student_email`, `class_id`, `created_at`, `updated_at`) VALUES
('2017102001', 'Yohanes Julius', '1999-11-11', 'Tangerang', 'Male', 'Cirebon', '082123', 'nes@gmail.com', 1, '2020-08-12 06:11:36', '2020-08-11 23:11:36'),
('2017102002', 'Ahmad Nurohim', '1996-11-11', 'Indramayu', 'Male', 'asdasd', '213123', 'pakel@gmail.com', 1, '2020-08-10 06:47:13', '2020-08-10 06:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','lecturer','student') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arie Arbiansyah', '2017102008', 'ariearbiansyah05@gmail.com', NULL, '$2y$10$kjClRfzRSwh/RkSI8MrobeeYFUKsX5dveMrJVL4Q0MuHvm2h.pkgK', 'admin', NULL, '2020-08-07 01:26:32', '2020-08-07 01:26:32'),
(2, 'dosen', 'dosen', 'dosen@cic.ac.id', NULL, '$2y$12$Ecwncxip9RQht/Ie4tBase0jCIvapchCvYk.DoDViG1ZTxV43W8lG', 'lecturer', NULL, NULL, NULL),
(6, 'Arie Arbiansyah', '5111998', 'devsyndrome@gmail.com', NULL, '$2y$10$eFUTZFdEQtT8eY1dQFq3PeO9JBPDY439Jwwvg6pj5y3QLrHaj5wu.', 'admin', NULL, '2020-08-10 03:19:57', '2020-08-10 03:19:57'),
(11, 'asdasd', '123123', 'ariearbiansyah05@gmail.com', NULL, '$2y$10$XwIRlqYddZiKJUNKFG6TSOmZXOZp.3XPhcSZYUPNklgYFfHBaHNu.', 'admin', NULL, '2020-08-10 03:24:55', '2020-08-10 03:24:55'),
(15, 'Kusnadi', '101010', 'dosen2@cic.ac.id', NULL, '$2y$10$ynyf31Zl5ecU5aQt3xRXkuJHaca2zZhjdm4gOW3V7sNz0yDlQg3NW', 'lecturer', NULL, '2020-08-10 05:05:27', '2020-08-10 05:05:27'),
(17, 'dosen', '123321', 'dsda97@gmail.com', NULL, '$2y$10$/khVM0QcI9Esxa4LVcYJpeoBSKJWvdliwHhb9XhQph5hK6GvroABC', 'lecturer', NULL, '2020-08-10 05:14:16', '2020-08-10 05:14:16'),
(18, 'Yohanes Julius', '2017102001', 'yohanes@gmail.com', NULL, '$2y$10$DUiiNFnBB2TmBAhSgE.Nseur7FHKRx/ictp3IBnXv5BiXeBJ/zNAS', 'student', NULL, '2020-08-10 06:44:41', '2020-08-10 06:44:41'),
(21, 'Ahmad Nurohim', '2017102002', 'pakel@gmail.com', NULL, '$2y$10$93UacnlwwEW.Lgz.avC90.niJXVmBAMOk3s.I65expxCp1x5Eew2S', 'student', NULL, '2020-08-10 06:47:13', '2020-08-10 06:47:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`classroom_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`presence_id`);

--
-- Indexes for table `programstudies`
--
ALTER TABLE `programstudies`
  ADD PRIMARY KEY (`prody_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `classroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presences`
--
ALTER TABLE `presences`
  MODIFY `presence_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programstudies`
--
ALTER TABLE `programstudies`
  MODIFY `prody_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
