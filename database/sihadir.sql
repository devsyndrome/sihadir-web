-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 04:36 PM
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

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_credits`, `created_at`, `updated_at`) VALUES
(1, 'Informatics Project', 4, '2020-08-12 06:35:20', '2020-08-11 23:35:20'),
(2, 'Network Security', 3, '2020-08-11 23:35:28', '2020-08-11 23:35:28'),
(3, 'English #6', 2, '2020-08-11 23:36:18', '2020-08-11 23:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `generators`
--

CREATE TABLE `generators` (
  `generator_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `generator_date` date NOT NULL,
  `generator_status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generators`
--

INSERT INTO `generators` (`generator_id`, `schedule_id`, `generator_date`, `generator_status`, `created_at`, `updated_at`) VALUES
(1, 6, '2020-08-15', 'ss', '2020-08-15 08:14:39', '0000-00-00 00:00:00'),
(7, 5, '2020-08-15', 'ok', '2020-08-15 12:24:54', '2020-08-15 12:24:54');

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
('123321', 'Ms. Yuni', '1988-12-12', 'cirebon', 'Female', 'edaasd', '3123123', 'dsda97@gmail.com', '2020-08-12 10:09:54', '2020-08-12 03:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0c8ae8de10ccf5748bf3d0a96d040ec0068f3a49b6c11c745b62a779d47f2e84fc5782562a5fc0b4', 18, 1, 'user', '[]', 0, '2020-08-16 14:31:16', '2020-08-16 14:31:16', '2021-08-16 21:31:16'),
('2ccaf7b97919b03f72bdbc39044a5f3922bf19a3c29fb31b021b072840603a4f3307d8eb3f456ebc', 18, 1, 'user', '[]', 0, '2020-08-16 04:31:43', '2020-08-16 04:31:43', '2021-08-16 11:31:43'),
('6d258848a6c4db2a7a17a331608601c025db0a29caa91a3ee31755fad5f1bbeaefd4e87d2473a98e', 18, 1, 'user', '[]', 0, '2020-08-16 04:25:03', '2020-08-16 04:25:03', '2021-08-16 11:25:03'),
('72b8dfab755981ae42e14704c6b052b0d79c1c118a02ff2b30224e5b5829a68f9dc3d2794adb5901', 18, 1, 'user', '[]', 0, '2020-08-16 14:24:31', '2020-08-16 14:24:31', '2021-08-16 21:24:31'),
('753a3a20afb3a4f09879b19df47810ac9d91bcb471b88164aa969a2cfdb6afc64c51237c8752c3b3', 18, 1, 'user', '[]', 0, '2020-08-16 14:32:05', '2020-08-16 14:32:05', '2021-08-16 21:32:05'),
('f8417e8995bee9d57489fc02c4f48202abc4efa88ebd344114dfcfea30d8983facf723304dc4fece', 18, 1, 'user', '[]', 0, '2020-08-16 14:32:13', '2020-08-16 14:32:13', '2021-08-16 21:32:13'),
('fcc485ead01b1d7a0a242e581fb68577637d25b4cab6f272da8ac21c8c11993a8fa8dff394c7360a', 18, 1, 'user', '[]', 0, '2020-08-16 14:32:09', '2020-08-16 14:32:09', '2021-08-16 21:32:09'),
('fe660846798723e940a4f99a8497bdaca12c8aaae5f2e49b6bfa13e2b0f5a42acfa68fbf364f8131', 18, 1, 'user', '[]', 0, '2020-08-16 14:15:57', '2020-08-16 14:15:57', '2021-08-16 21:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'SiHadir Personal Access Client', 'xAm34EAivKug2TvMdQPtsZIg6lQYYbJDgPljYV43', NULL, 'http://localhost', 1, 0, 0, '2020-08-16 03:39:51', '2020-08-16 03:39:51'),
(2, NULL, 'SiHadir Password Grant Client', 'HuHSQ4EVj9mY28W4vyiOVImCflr2Dxg9AE1vze7c', 'users', 'http://localhost', 0, 1, 0, '2020-08-16 03:39:52', '2020-08-16 03:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-08-16 03:39:52', '2020-08-16 03:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presences`
--

CREATE TABLE `presences` (
  `presence_id` int(11) NOT NULL,
  `generator_id` int(11) NOT NULL,
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

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `classroom_id`, `course_id`, `class_id`, `lecturer_id`, `schedule_start`, `schedule_end`, `schedule_day`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 101010, '09:00:00', '10:00:00', 'Monday', '2020-08-15 07:52:04', '2020-08-15 07:52:04'),
(2, 1, 3, 1, 123321, '14:00:00', '15:00:00', 'Monday', '2020-08-15 07:50:53', '2020-08-15 07:50:53'),
(3, 1, 3, 3, 123321, '14:30:00', '15:30:00', 'Monday', '2020-08-12 02:57:55', '2020-08-12 02:57:55'),
(5, 1, 2, 1, 101010, '18:00:00', '19:30:00', 'Saturday', '2020-08-15 12:04:11', '2020-08-15 12:04:11'),
(6, 1, 1, 3, 101010, '12:00:00', '15:22:00', 'Saturday', '2020-08-15 08:20:34', '2020-08-15 08:20:34');

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
-- Indexes for table `generators`
--
ALTER TABLE `generators`
  ADD PRIMARY KEY (`generator_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `classroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `generators`
--
ALTER TABLE `generators`
  MODIFY `generator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
