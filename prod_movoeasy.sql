-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 01:15 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prod_movoeasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_order` int(5) NOT NULL,
  `menu_icon` varchar(20) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `is_active` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `menu_url`, `menu_order`, `menu_icon`, `controller`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Services', '', 2, 'fa fa-laptop', 'AdminmasterController', 'Y', '0000-00-00 00:00:00', '2016-05-27 20:56:15'),
(6, 'Dashboard', 'censor/dashboard', 1, 'fa fa-home', 'CensorController', 'Y', '2016-05-27 20:55:49', '2016-05-27 20:55:49'),
(12, 'User Management', '', 5, 'fa fa-users', 'UsersettingController.php', 'Y', '2016-07-13 19:02:01', '2016-07-26 21:52:38'),
(16, 'Coupons', '', 3, 'fa fa-file-text', 'FilemanagementController', 'Y', '2017-01-25 01:01:50', '2017-01-25 01:01:50'),
(17, 'Report Management', '', 4, 'fa fa-file-excel-o', 'ReportmanagementController', 'Y', '2017-03-02 06:54:20', '2017-03-02 06:54:20'),
(18, 'Setting', '', 6, 'fa fa-cogs', 'SettingController', 'Y', '2018-03-18 00:15:39', '2018-03-18 00:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `name` varchar(175) NOT NULL,
  `email` varchar(175) NOT NULL,
  `mobile` varchar(35) NOT NULL,
  `trans_from` varchar(125) NOT NULL,
  `trans_to` varchar(125) NOT NULL,
  `mover_date` date NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `mobile`, `trans_from`, `trans_to`, `mover_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Rashmi R', 'Rashmir@yopmail.com', '123456789', 'Belgium', 'Indonesia', '2018-05-12', 'A', '2018-05-07 04:10:06', '2018-05-07 04:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `id` bigint(20) NOT NULL,
  `organisation_name` varchar(75) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `organisation_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MovoEasy', 'Y', '2018-04-22 12:31:15', '2016-08-09 06:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `organisation_id` bigint(20) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `organisation_id`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Packers', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Enduser', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_menus`
--

CREATE TABLE `role_menus` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) DEFAULT NULL,
  `sub_menu_id` bigint(20) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_menus`
--

INSERT INTO `role_menus` (`id`, `role_id`, `menu_id`, `sub_menu_id`, `status`, `created_at`, `updated_at`) VALUES
(712, 3, 6, NULL, '', '2018-02-01 09:42:22', '2018-02-01 09:42:22'),
(713, 3, 16, 52, '', '2018-02-01 09:42:22', '2018-02-01 09:42:22'),
(714, 3, 17, 53, '', '2018-02-01 09:42:22', '2018-02-01 09:42:22'),
(715, 3, 12, 37, '', '2018-02-01 09:42:22', '2018-02-01 09:42:22'),
(716, 4, 6, NULL, '', '2018-02-01 09:42:48', '2018-02-01 09:42:48'),
(717, 4, 16, 52, '', '2018-02-01 09:42:49', '2018-02-01 09:42:49'),
(744, 1, 6, NULL, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(745, 1, 1, 1, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(746, 1, 1, 2, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(747, 1, 1, 3, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(748, 1, 1, 4, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(749, 1, 1, 5, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(750, 1, 1, 50, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(751, 1, 16, 49, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(752, 1, 16, 52, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(753, 1, 17, 51, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(754, 1, 17, 53, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(755, 1, 12, 37, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(756, 1, 18, 54, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(757, 1, 18, 55, '', '2018-03-20 07:33:12', '2018-03-20 07:33:12'),
(758, 2, 6, NULL, '', '2018-03-20 07:34:01', '2018-03-20 07:34:01'),
(759, 2, 1, 50, '', '2018-03-20 07:34:01', '2018-03-20 07:34:01'),
(760, 2, 16, 49, '', '2018-03-20 07:34:01', '2018-03-20 07:34:01'),
(761, 2, 16, 52, '', '2018-03-20 07:34:01', '2018-03-20 07:34:01'),
(762, 2, 17, 51, '', '2018-03-20 07:34:01', '2018-03-20 07:34:01'),
(763, 2, 12, 37, '', '2018-03-20 07:34:01', '2018-03-20 07:34:01'),
(764, 2, 18, 54, '', '2018-03-20 07:34:01', '2018-03-20 07:34:01'),
(765, 2, 18, 55, '', '2018-03-20 07:34:01', '2018-03-20 07:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `sub_menu_name` varchar(70) NOT NULL,
  `sub_menu_url` varchar(200) NOT NULL,
  `sub_menu_order` int(2) NOT NULL,
  `action` varchar(50) NOT NULL,
  `is_active` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `menu_id`, `sub_menu_name`, `sub_menu_url`, `sub_menu_order`, `action`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Add Organisation', 'adminmaster/addorganisation', 1, 'getAddorganisation', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Add Role', 'adminmaster/addrole', 2, 'getAddrole', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Add Menu', 'adminmaster/addmenu', 3, 'getAddmenu', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'Add Submenu', 'adminmaster/addsubmenu', 4, 'getAddsubmenu', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'Assign Role Menu', 'adminmaster/assignrolemenu', 5, 'getAssignrolemenu', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 12, 'Users List', 'usersetting/userlist', 1, 'getUserlist', 'Y', '2016-07-13 19:11:41', '2016-07-13 19:11:41'),
(49, 16, 'Upload Coupon', 'filemanagement/uploadcsv', 1, 'getUploadcsv', 'Y', '2017-01-25 01:04:25', '2018-01-10 12:00:09'),
(50, 1, 'Add Service', 'adminmaster/addcupon', 6, 'getAddcupon', 'Y', '2017-02-02 06:39:18', '2017-02-02 06:39:18'),
(51, 17, 'Message Report', 'reportmanagement/messagereport', 1, 'getMessagereport', 'Y', '2017-03-02 06:55:39', '2017-03-02 06:55:39'),
(52, 16, 'Assign Cupon', 'filemanagement/assigncupon', 2, 'getAssigncupon', 'Y', '2017-10-21 09:17:00', '2017-10-21 09:17:00'),
(53, 17, 'Report', 'reportmanagement/report', 2, 'getReport', 'Y', '2017-10-21 09:18:27', '2017-10-21 09:18:27'),
(54, 18, 'Message Template', 'setting/messagetemplate', 1, 'getMessagetemplate', 'Y', '2018-03-18 00:16:35', '2018-03-18 00:16:35'),
(55, 18, 'Sms Config', 'setting/smsconfig', 2, 'getSmsconfig', 'Y', '2018-03-18 00:17:25', '2018-03-18 00:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `organisation_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `re_password` varchar(75) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `packer_name` varchar(225) DEFAULT NULL,
  `remember_token` varchar(100) NOT NULL,
  `is_active` varchar(1) NOT NULL,
  `is_reset_req` varchar(1) NOT NULL,
  `expired_date` varchar(25) DEFAULT '0000-00-00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `organisation_id`, `role_id`, `password`, `re_password`, `fullname`, `email`, `mobile`, `packer_name`, `remember_token`, `is_active`, `is_reset_req`, `expired_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '$2y$10$qb8Dmbu.Z07w03fwYaOmZuxbmq0/TgWXG1onHtwi3cUyYBF7CweYu', '', 'Test Admin', 'admin@gmail.com', '', NULL, 'luodX8XAR4klidOP4K4jJYyGJTTkaFjuT5Sm1PxBEAHX4sRAclzDOQ7Rjn3t', 'Y', 'N', '0000-00-00', '2018-05-06 06:28:33', '2018-04-15 01:07:51'),
(2, 1, 1, '$2y$10$qb8Dmbu.Z07w03fwYaOmZuxbmq0/TgWXG1onHtwi3cUyYBF7CweYu', '', 'Test User', 'ranok@gmail.com', '8763115545', '', 'tZbdPvkbQwSl9IHAlcMpCBFoZB0Ex6UlVru71Be5GqupUp6uMOVHNnTuVeoL', 'Y', 'N', '0000-00-00', '2018-05-06 06:24:03', '2018-05-05 23:41:36'),
(4, 1, 2, '$2y$10$xo2iAX/.P1.ztpP6XOhngelC.YX6VIkrdTd5/n1SRsM0/UlkNlBvi', '1234567', 'dlvd', 'rashmi@yopmail.com', 'cdb', 'ascvsdasscdsv', 'EaF2TQMzdrtFhaqlAJzS2Yxma9GLTJDb3F5kOkeElQZm0MDrlkryeE0dHhff', 'Y', 'N', '0000-00-00', '2018-05-08 04:46:53', '2018-05-07 23:15:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisation_id` (`organisation_id`),
  ADD KEY `organisation_id_2` (`organisation_id`),
  ADD KEY `organisation_id_3` (`organisation_id`);

--
-- Indexes for table `role_menus`
--
ALTER TABLE `role_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designatin_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `sub_menu_id` (`sub_menu_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id_2` (`menu_id`),
  ADD KEY `sub_menu_id_2` (`sub_menu_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `menu_id_2` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_ins_institute_id` (`organisation_id`),
  ADD KEY `t_deg_designation_id` (`role_id`),
  ADD KEY `t_ins_institute_id_2` (`organisation_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `organisation_id` (`organisation_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_menus`
--
ALTER TABLE `role_menus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=766;
--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
