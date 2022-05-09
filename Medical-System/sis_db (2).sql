-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 05:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `action_name` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `login_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_id`, `account_no`, `action`, `action_name`, `ip`, `host`, `login_time`) VALUES
(1, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-05-2022 05:09:18 PM'),
(2, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-05-2022 05:10:33 PM'),
(3, 0, 'U22000002', 'account has been logged out', 'Marvin Marilao', '::1', 'Unknown', 'Apr-05-2022 05:12:00 PM'),
(4, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-05-2022 05:12:27 PM'),
(5, 8, '22010002', 'account has been logged in', '', '::1', 'Unknown', 'Apr-05-2022 06:39:25 PM'),
(6, 22010002, '22010002', 'account has been logged out', 'Test Test', '::1', 'Unknown', 'Apr-05-2022 06:39:29 PM'),
(7, 9, '22010009', 'account has been logged in', '', '::1', 'Unknown', 'Apr-05-2022 06:39:44 PM'),
(8, 22010009, '22010009', 'account has been logged out', 'TEST TEST', '::1', 'Unknown', 'Apr-05-2022 07:00:29 PM'),
(9, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-05-2022 07:02:13 PM'),
(10, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-05-2022 07:02:20 PM'),
(11, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-05-2022 07:02:37 PM'),
(12, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-05-2022 07:04:03 PM'),
(13, 3, 'U22000003', 'account has been logged in', 'Admission', '::1', 'Unknown', 'Apr-05-2022 07:04:14 PM'),
(14, 6, 'U22000006', 'account has been logged in', 'DATMS Approver', '::1', 'Unknown', 'Apr-05-2022 07:07:14 PM'),
(15, 0, 'U22000003', 'account has been logged out', 'Admission Department', '::1', 'Unknown', 'Apr-05-2022 07:11:19 PM'),
(16, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-05-2022 09:19:32 PM'),
(17, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-05-2022 11:09:45 PM'),
(18, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-05-2022 11:11:20 PM'),
(19, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-05-2022 11:12:11 PM'),
(20, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-05-2022 11:57:45 PM'),
(21, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-06-2022 12:02:49 AM'),
(22, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-06-2022 12:04:07 AM'),
(23, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-06-2022 12:05:22 AM'),
(24, 0, 'U22000002', 'account has been logged out', 'Marvin Marilao', '::1', 'Unknown', 'Apr-06-2022 12:05:27 AM'),
(25, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-06-2022 12:14:19 AM'),
(26, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-06-2022 12:33:48 AM'),
(27, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-06-2022 12:45:49 AM'),
(28, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-06-2022 01:15:05 AM'),
(29, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-06-2022 03:04:17 AM'),
(30, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-06-2022 03:09:01 AM'),
(31, 4, 'T22000004', 'account has been logged in', 'aaa aaa', '::1', 'Unknown', 'Apr-06-2022 03:09:20 AM'),
(32, 0, 'T22000004', 'account has been logged out', 'aaa aaa', '::1', 'Unknown', 'Apr-06-2022 03:09:25 AM'),
(33, 6, 'U22000006', 'account has been logged in', 'DATMS Approver', '::1', 'Unknown', 'Apr-06-2022 03:09:37 AM'),
(34, 0, 'U22000006', 'account has been logged out', 'Approver Account', '::1', 'Unknown', 'Apr-06-2022 03:10:15 AM'),
(35, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-06-2022 03:10:58 AM'),
(36, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-06-2022 03:17:16 AM'),
(37, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-06-2022 11:04:15 AM'),
(38, 25, '22010025', 'account has been logged in', '', '::1', 'Unknown', 'Apr-06-2022 02:01:49 PM'),
(39, 25, '22010025', 'account has been logged in', '', '::1', 'Unknown', 'Apr-06-2022 02:11:06 PM'),
(40, 22010025, '22010025', 'account has been logged out', 'John Marvin Marilao', '::1', 'Unknown', 'Apr-06-2022 02:25:16 PM'),
(41, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-06-2022 09:37:33 PM'),
(42, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-06-2022 09:50:41 PM'),
(43, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-07-2022 10:19:57 AM'),
(44, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-07-2022 07:42:22 PM'),
(45, 14, '22010014', 'account has been logged in', '', '::1', 'Unknown', 'Apr-07-2022 08:23:41 PM'),
(46, 22010014, '22010014', 'account has been logged out', 'try try', '::1', 'Unknown', 'Apr-07-2022 08:27:14 PM'),
(47, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-07-2022 11:59:02 PM'),
(48, 0, 'U22000002', 'account has been logged out', 'Marvin Marilao', '::1', 'Unknown', 'Apr-08-2022 12:27:58 AM'),
(49, 6, 'U22000006', 'account has been logged in', 'DATMS Approver', '::1', 'Unknown', 'Apr-08-2022 12:56:30 AM'),
(50, 0, 'U22000006', 'account has been logged out', 'Approver Account', '::1', 'Unknown', 'Apr-08-2022 01:15:11 AM'),
(51, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-08-2022 01:15:20 AM'),
(52, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-08-2022 01:40:01 AM'),
(53, 1, '22010001', 'account has been logged in', '', '::1', 'Unknown', 'Apr-08-2022 12:17:40 PM'),
(54, 22010001, '22010001', 'account has been logged out', 'John Marvin Marilao', '::1', 'Unknown', 'Apr-08-2022 12:26:19 PM'),
(55, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-08-2022 02:41:46 PM'),
(56, 6, 'U22000006', 'account has been logged in', 'DATMS Approver', '::1', 'Unknown', 'Apr-08-2022 03:08:38 PM'),
(57, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-08-2022 03:09:12 PM'),
(58, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-08-2022 03:18:35 PM'),
(59, 6, 'U22000006', 'account has been logged in', 'DATMS Approver', '::1', 'Unknown', 'Apr-08-2022 03:18:46 PM'),
(60, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-11-2022 10:44:20 AM'),
(61, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-11-2022 02:45:19 PM'),
(62, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-11-2022 11:17:34 PM'),
(63, 2, 'U22000002', 'account has been logged in', 'DATMS Administrator', '::1', 'Unknown', 'Apr-11-2022 11:41:17 PM'),
(64, 0, 'U22000002', 'account has been logged out', 'Marvin Marilao', '::1', 'Unknown', 'Apr-11-2022 11:57:47 PM'),
(65, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 10:22:07 AM'),
(66, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 02:18:13 PM'),
(67, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 02:51:27 PM'),
(68, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-12-2022 02:51:51 PM'),
(69, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-12-2022 02:52:47 PM'),
(70, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 02:53:07 PM'),
(71, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 02:54:38 PM'),
(72, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-12-2022 03:08:09 PM'),
(73, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 03:08:18 PM'),
(74, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 10:53:11 PM'),
(75, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-12-2022 11:07:50 PM'),
(76, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 11:08:00 PM'),
(77, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-12-2022 11:14:13 PM'),
(78, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 11:14:21 PM'),
(79, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-12-2022 11:20:20 PM'),
(80, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 11:20:26 PM'),
(81, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-12-2022 11:26:40 PM'),
(82, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 11:26:53 PM'),
(83, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-12-2022 11:27:45 PM'),
(84, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 11:27:52 PM'),
(85, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-12-2022 11:29:07 PM'),
(86, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-12-2022 11:37:48 PM'),
(87, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', 'Apr-12-2022 11:38:56 PM'),
(88, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-13-2022 10:59:38 AM'),
(89, 4, '22010003', 'account has been logged in', '', '::1', 'Unknown', 'Apr-13-2022 12:46:08 PM'),
(90, 22010003, '22010003', 'account has been logged out', 'Jienavin Marilao', '::1', 'Unknown', 'Apr-13-2022 12:54:58 PM'),
(91, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-13-2022 02:01:49 PM'),
(92, 11, 'U22000011', 'account has been logged in', 'Clearance Administrator', '::1', 'Unknown', 'Apr-13-2022 02:09:55 PM'),
(93, 11, 'U22000011', 'account has been logged in', 'Clearance Administrator', '::1', 'Unknown', 'Apr-13-2022 02:13:28 PM'),
(94, 12, 'U22000012', 'account has been logged in', 'Registrar Coordinator', '::1', 'Unknown', 'Apr-13-2022 02:13:54 PM'),
(95, 1, '22010001', 'account has been logged in', '', '::1', 'Unknown', 'Apr-13-2022 02:17:37 PM'),
(96, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-13-2022 03:49:35 PM'),
(97, 22010001, '22010001', 'account has been logged out', 'John Marvin Marilao', '::1', 'Unknown', 'Apr-13-2022 05:27:16 PM'),
(98, 5, '22010005', 'account has been logged in', '', '::1', 'Unknown', 'Apr-13-2022 05:32:40 PM'),
(99, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', 'Apr-13-2022 07:41:12 PM'),
(100, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-13-2022 08:09:20 PM'),
(101, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-13-2022 08:22:04 PM'),
(102, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-13-2022 09:40:01 PM'),
(103, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-13-2022 09:41:36 PM'),
(104, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-13-2022 09:43:23 PM'),
(105, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-13-2022 09:45:07 PM'),
(106, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-13-2022 10:11:48 PM'),
(107, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-13-2022 10:12:10 PM'),
(108, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-13-2022 10:12:19 PM'),
(109, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 12:09:15 AM'),
(110, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 08:26:45 AM'),
(111, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 09:17:09 AM'),
(112, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 09:20:39 AM'),
(113, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 09:42:40 AM'),
(114, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 09:45:43 AM'),
(115, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 09:58:02 AM'),
(116, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 09:59:42 AM'),
(117, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 10:19:39 AM'),
(118, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 10:20:06 AM'),
(119, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 12:31:56 PM'),
(120, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 05:35:10 PM'),
(121, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 07:03:26 PM'),
(122, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 08:38:15 PM'),
(123, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-14-2022 10:26:47 PM'),
(124, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 08:58:22 AM'),
(125, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 10:05:53 AM'),
(126, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 10:36:28 AM'),
(127, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:13:00 PM'),
(128, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:32:59 PM'),
(129, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:33:58 PM'),
(130, 15, 'U22000015', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:34:05 PM'),
(131, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:36:56 PM'),
(132, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:40:37 PM'),
(133, 1, 'U22000001', 'account has been logged in', 'User Management Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:41:00 PM'),
(134, 4, 'U22000004', 'account has been logged in', 'Cashier', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:41:47 PM'),
(135, 0, 'U22000004', 'account has been logged out', 'Cashier department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:41:51 PM'),
(136, 3, 'U22000003', 'account has been logged in', 'Admission', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:42:04 PM'),
(137, 0, 'U22000003', 'account has been logged out', 'Admission Department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-15-2022 11:48:51 PM'),
(138, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 08:54:13 AM'),
(139, 4, 'U22000004', 'account has been logged in', 'Cashier', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 09:00:20 AM'),
(140, 0, 'U22000004', 'account has been logged out', 'Cashier department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 09:00:36 AM'),
(141, 3, 'U22000003', 'account has been logged in', 'Admission', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 09:00:47 AM'),
(142, 3, 'U22000003', 'account has been logged in', 'Admission', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 09:00:48 AM'),
(143, 0, 'U22000003', 'account has been logged out', 'Admission Department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 09:13:05 AM'),
(144, 3, 'U22000003', 'account has been logged in', 'Admission', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 09:13:24 AM'),
(145, 0, 'U22000003', 'account has been logged out', 'Admission Department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 09:14:10 AM'),
(146, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 09:14:36 AM'),
(147, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 09:17:27 AM'),
(148, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 09:17:41 AM'),
(149, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 12:43:13 PM'),
(150, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 01:25:39 PM'),
(151, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 10:06:34 PM'),
(152, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 11:38:19 PM'),
(153, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 11:39:04 PM'),
(154, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 11:39:14 PM'),
(155, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-17-2022 05:56:45 PM'),
(156, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-17-2022 09:03:50 PM'),
(157, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-17-2022 11:45:05 PM'),
(158, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 04:14:01 AM'),
(159, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 04:59:48 AM'),
(160, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 05:02:44 AM'),
(161, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 05:03:14 AM'),
(162, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 05:03:22 AM'),
(163, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 10:36:56 AM'),
(164, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 05:04:08 PM'),
(165, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:03:42 PM'),
(166, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:04:40 PM'),
(167, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:04:43 PM'),
(168, 1, 'U22000001', 'account has been logged in', 'User Management Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:04:55 PM'),
(169, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:06:14 PM'),
(170, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:07:29 PM'),
(171, 1, 'U22000001', 'account has been logged in', 'User Management Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:26:46 PM'),
(172, 16, 'U22000016', 'account has been logged in', 'Health Check Monitoring Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:30:21 PM'),
(173, 0, 'U22000016', 'account has been logged out', 'Jamaine Cayan', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:31:19 PM'),
(174, 3, 'U22000003', 'account has been logged in', 'Admission', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:31:32 PM'),
(175, 0, 'U22000003', 'account has been logged out', 'Admission Department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:31:51 PM'),
(176, 3, 'U22000003', 'account has been logged in', 'Admission', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:31:59 PM'),
(177, 0, 'U22000003', 'account has been logged out', 'Admission Department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:32:04 PM'),
(178, 4, 'U22000004', 'account has been logged in', 'Cashier', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:32:11 PM'),
(179, 0, 'U22000004', 'account has been logged out', 'Cashier department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:34:20 PM'),
(180, 16, 'U22000016', 'account has been logged in', 'Health Check Monitoring Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 06:35:02 PM'),
(181, 0, 'U22000016', 'account has been logged out', 'Clinic Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 07:19:02 PM'),
(182, 16, 'U22000016', 'account has been logged in', 'Health Check Monitoring Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 07:19:25 PM'),
(183, 0, 'U22000016', 'account has been logged out', 'Clinic Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 07:19:30 PM'),
(184, 16, 'U22000016', 'account has been logged in', 'Health Check Monitoring Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 07:19:39 PM'),
(185, 16, 'U22000016', 'account has been logged in', 'Health Check Monitoring Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 07:51:14 PM'),
(186, 0, 'U22000016', 'account has been logged out', 'Clinic Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 07:54:21 PM'),
(187, 1, 'U22000001', 'account has been logged in', 'User Management Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 07:55:01 PM'),
(188, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 08:21:07 PM'),
(189, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 09:40:31 PM'),
(190, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 09:40:48 PM'),
(191, 16, 'U22000016', 'account has been logged in', 'Health Check Monitoring Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-19-2022 09:56:41 AM'),
(192, 16, 'U22000016', 'account has been logged in', 'Health Check Monitoring Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-19-2022 09:56:42 AM'),
(193, 0, 'U22000016', 'account has been logged out', 'Clinic Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-19-2022 09:57:03 AM'),
(194, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-19-2022 09:57:14 AM'),
(195, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-19-2022 02:29:34 PM'),
(196, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-19-2022 04:55:18 PM'),
(197, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-19-2022 04:55:34 PM'),
(198, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-19-2022 11:44:23 PM'),
(199, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:03:05 AM'),
(200, 4, 'U22000004', 'account has been logged in', 'Cashier', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:03:52 AM'),
(201, 4, 'U22000004', 'account has been logged in', 'Cashier', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:03:53 AM'),
(202, 0, 'U22000004', 'account has been logged out', 'Cashier department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:05:12 AM'),
(203, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:05:21 AM'),
(204, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:13:57 AM'),
(205, 16, 'U22000016', 'account has been logged in', 'Health Check Monitoring Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:14:28 AM'),
(206, 0, 'U22000016', 'account has been logged out', 'Clinic Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:28:17 AM'),
(207, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:31:19 AM'),
(208, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:57:25 AM'),
(209, 16, 'U22000016', 'account has been logged in', 'Health Check Monitoring Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:57:37 AM'),
(210, 0, 'U22000016', 'account has been logged out', 'Clinic Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 01:10:15 AM'),
(211, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 01:11:23 AM'),
(212, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 10:35:32 AM'),
(213, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 03:05:17 PM'),
(214, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 06:03:58 PM'),
(215, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-21-2022 04:41:47 AM'),
(216, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-21-2022 05:28:22 AM'),
(217, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-21-2022 05:28:33 AM'),
(218, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-21-2022 05:30:23 AM'),
(219, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-21-2022 01:09:59 PM'),
(220, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-21-2022 01:18:16 PM'),
(221, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-21-2022 01:18:28 PM'),
(222, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 08:43:30 AM'),
(223, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 11:37:40 AM'),
(224, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 06:56:23 PM'),
(225, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 07:03:44 PM'),
(226, 15, 'U22000015', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 07:04:01 PM'),
(227, 0, 'U22000015', 'account has been logged out', 'Jamaine Cayan', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 07:04:10 PM'),
(228, 16, 'U22000016', 'account has been logged in', 'Health Check Monitoring Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 07:04:21 PM'),
(229, 0, 'U22000016', 'account has been logged out', 'Clinic Assistant', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 07:05:38 PM'),
(230, 4, 'U22000004', 'account has been logged in', 'Cashier', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 07:06:01 PM'),
(231, 0, 'U22000004', 'account has been logged out', 'Cashier department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 07:06:34 PM'),
(232, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 07:14:14 PM'),
(233, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 08:18:59 PM'),
(234, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 08:20:25 PM'),
(235, 2, 'U22000002', 'account has been logged in', 'Registrar Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 08:20:46 PM'),
(236, 0, 'U22000002', 'account has been logged out', 'Marvin Marilao', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 08:21:31 PM'),
(237, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 08:21:40 PM'),
(238, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 08:22:01 PM'),
(239, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-22-2022 08:22:16 PM'),
(240, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 01:00:34 PM'),
(241, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 06:13:26 PM'),
(242, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 06:21:58 PM'),
(243, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 06:37:12 PM'),
(244, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 06:38:32 PM'),
(245, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 06:42:34 PM'),
(246, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 06:47:09 PM'),
(247, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 06:47:18 PM'),
(248, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 07:18:23 PM'),
(249, 4, 'U22000004', 'account has been logged in', 'Cashier', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 07:18:41 PM'),
(250, 0, 'U22000004', 'account has been logged out', 'Cashier department', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 07:22:57 PM'),
(251, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 07:26:56 PM'),
(252, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 08:42:26 PM'),
(253, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-23-2022 11:55:50 PM'),
(254, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 07:25:34 AM'),
(255, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 12:18:05 PM'),
(256, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 05:16:38 PM'),
(257, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 05:19:08 PM'),
(258, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 05:19:21 PM'),
(259, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 05:25:30 PM'),
(260, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 05:26:07 PM'),
(261, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 05:29:55 PM'),
(262, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 05:30:06 PM'),
(263, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 05:35:31 PM'),
(264, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 05:35:48 PM'),
(265, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 12:37:44 AM'),
(266, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 03:33:59 AM'),
(267, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 03:34:06 AM'),
(268, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 03:39:37 AM'),
(269, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 03:39:45 AM'),
(270, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 11:12:11 AM'),
(271, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 11:12:41 AM'),
(272, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 11:13:34 AM'),
(273, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 11:13:47 AM'),
(274, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 12:05:54 PM'),
(275, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 12:12:48 PM'),
(276, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 12:12:58 PM'),
(277, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 02:50:34 PM'),
(278, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 03:09:30 PM'),
(279, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 03:09:38 PM'),
(280, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 04:19:29 PM'),
(281, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 04:21:26 PM'),
(282, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-25-2022 04:21:56 PM'),
(283, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-26-2022 01:42:22 AM'),
(284, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-26-2022 07:45:04 AM'),
(285, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-26-2022 02:11:59 PM'),
(286, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-26-2022 02:12:13 PM'),
(287, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-26-2022 09:40:12 PM'),
(288, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-26-2022 09:48:25 PM'),
(289, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-26-2022 09:48:33 PM'),
(290, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 12:42:48 AM'),
(291, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 02:47:32 AM'),
(292, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 02:47:38 AM'),
(293, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 03:36:12 AM'),
(294, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 03:36:31 AM'),
(295, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 05:11:26 AM'),
(296, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 10:19:36 AM'),
(297, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 07:29:25 PM'),
(298, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 09:11:10 PM'),
(299, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 09:18:54 PM'),
(300, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 09:19:02 PM'),
(301, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 09:20:07 PM'),
(302, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 09:23:04 PM'),
(303, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-27-2022 11:29:51 PM'),
(304, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'BowAcademy-PC', 'Apr-28-2022 03:53:41 AM'),
(305, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'BowAcademy-PC', 'Apr-28-2022 08:51:10 AM'),
(306, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 12:20:27 PM'),
(307, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 01:57:11 PM'),
(308, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 02:21:06 PM'),
(309, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 02:30:12 PM'),
(310, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 02:30:21 PM'),
(311, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 03:32:44 PM'),
(312, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 03:34:37 PM'),
(313, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 03:34:57 PM'),
(314, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 03:36:04 PM'),
(315, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 03:36:18 PM'),
(316, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 03:36:21 PM'),
(317, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 03:38:45 PM'),
(318, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 03:39:13 PM'),
(319, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-28-2022 11:38:39 PM'),
(320, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 01:01:07 AM'),
(321, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 01:01:44 AM'),
(322, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 01:32:48 AM'),
(323, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 01:33:43 AM'),
(324, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 01:35:31 AM'),
(325, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 01:35:46 AM'),
(326, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 01:45:53 AM'),
(327, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 12:19:18 PM'),
(328, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 12:20:06 PM'),
(329, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 12:20:13 PM'),
(330, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 02:09:25 PM'),
(331, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 02:09:40 PM'),
(332, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 03:26:59 PM'),
(333, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 03:27:21 PM'),
(334, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 03:29:39 PM'),
(335, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 03:29:50 PM'),
(336, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 06:43:08 PM'),
(337, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 06:44:56 PM'),
(338, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 06:55:28 PM'),
(339, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 06:58:20 PM'),
(340, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 07:00:32 PM'),
(341, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 07:05:05 PM'),
(342, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 11:37:48 PM'),
(343, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-29-2022 11:57:01 PM'),
(344, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-30-2022 02:01:20 AM'),
(345, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'Apr-30-2022 06:17:44 PM'),
(346, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-01-2022 10:52:53 AM'),
(347, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-01-2022 05:02:00 PM'),
(348, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-02-2022 01:35:45 AM'),
(349, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-02-2022 07:58:38 AM'),
(350, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-02-2022 02:21:03 PM'),
(351, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-02-2022 06:06:34 PM'),
(352, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-02-2022 09:03:30 PM'),
(353, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 10:22:26 AM'),
(354, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 11:52:49 AM'),
(355, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 11:57:24 AM'),
(356, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 11:58:22 AM'),
(357, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 12:01:10 PM'),
(358, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 12:01:16 PM'),
(359, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 12:01:37 PM'),
(360, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 02:52:11 PM'),
(361, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 02:53:33 PM'),
(362, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 04:44:43 PM'),
(363, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 04:44:54 PM'),
(364, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 04:45:11 PM'),
(365, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 04:45:18 PM'),
(366, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 08:44:52 PM'),
(367, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 09:49:36 PM'),
(368, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-03-2022 09:49:48 PM'),
(369, 2, 'U22000002', 'account has been logged in', 'Registrar Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-04-2022 09:12:51 AM'),
(370, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-04-2022 11:43:31 AM'),
(371, 1, 'T22000001', 'account has been logged in', 'Teacher Teacher', '::1', 'LAPTOP-6VOSFL7I', 'May-04-2022 12:11:45 PM'),
(372, 0, 'T22000001', 'account has been logged out', 'Teacher Teacher', '::1', 'LAPTOP-6VOSFL7I', 'May-04-2022 12:11:53 PM'),
(373, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', 'May-04-2022 12:23:42 PM'),
(374, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'May-04-2022 12:49:57 PM'),
(375, 2, '22010002', 'account has been logged in', '', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 12:56:15 PM'),
(376, 2, '22010002', 'account has been logged in', '', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 12:56:15 PM'),
(377, 22010002, '22010002', 'account has been logged out', 'test test', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 12:56:28 PM'),
(378, 1, '22010001', 'account has been logged in', '', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 12:56:56 PM'),
(379, 1, '22010001', 'account has been logged in', '', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 12:56:56 PM'),
(380, 22010001, '22010001', 'account has been logged out', 'Marvin Marilao', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:00:28 PM'),
(381, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:04:43 PM'),
(382, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'May-04-2022 01:21:02 PM'),
(383, 1, '22010001', 'account has been logged in', '', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:21:24 PM'),
(384, 1, '22010001', 'account has been logged in', '', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:21:24 PM'),
(385, 22010001, '22010001', 'account has been logged out', 'Marvin Marilao', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:23:42 PM'),
(386, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:23:50 PM'),
(387, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'May-04-2022 01:26:06 PM'),
(388, 1, '22010001', 'account has been logged in', '', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:28:13 PM'),
(389, 1, '22010001', 'account has been logged in', '', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:28:13 PM'),
(390, 22010001, '22010001', 'account has been logged out', 'Marvin Marilao', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:29:56 PM');
INSERT INTO `audit_logs` (`id`, `user_id`, `account_no`, `action`, `action_name`, `ip`, `host`, `login_time`) VALUES
(391, 14, 'U22000014', 'account has been logged in', 'Health Check Monitoring Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:30:07 PM'),
(392, 0, 'U22000014', 'account has been logged out', 'Reiniel Andres', '::1', 'LAPTOP-6VOSFL7I', 'May-04-2022 01:39:06 PM'),
(393, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 01:39:15 PM'),
(394, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'May-04-2022 09:27:49 PM'),
(395, 2, 'U22000002', 'account has been logged in', 'Registrar Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 09:28:09 PM'),
(396, 0, 'U22000002', 'account has been logged out', 'Marvin Marilao', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 09:29:17 PM'),
(397, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-04 09:29:27 PM'),
(398, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-05 09:49:35 AM'),
(399, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-05 04:06:24 PM'),
(400, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'May-05-2022 10:38:34 PM'),
(401, 4, 'U22000004', 'account has been logged in', 'Cashier', '::1', 'LAPTOP-6VOSFL7I', '2022-05-05 10:39:24 PM'),
(402, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-05 11:08:23 PM'),
(403, 0, 'U22000004', 'account has been logged out', 'Cashier department', '::1', 'LAPTOP-6VOSFL7I', '2022-05-05 11:16:31 PM'),
(404, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-05 11:16:40 PM'),
(405, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'May-06-2022 01:00:07 AM'),
(406, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-06 08:35:05 AM'),
(407, 0, 'U22000017', 'account has been logged out', 'Richville Villasfer', '::1', 'LAPTOP-6VOSFL7I', 'May-06-2022 08:36:19 AM'),
(408, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-06 11:01:00 AM'),
(409, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-06 12:09:09 PM'),
(410, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-06 12:09:10 PM'),
(411, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-06 01:03:17 PM'),
(412, 17, 'U22000017', 'account has been logged in', 'Medical System Administrator', '::1', 'LAPTOP-6VOSFL7I', '2022-05-06 02:41:54 PM');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `id` int(20) NOT NULL,
  `adm_num` varchar(50) NOT NULL,
  `or_num` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`id`, `adm_num`, `or_num`, `date`) VALUES
(1, '25132887', 'A210512', '2022-04-04 11:10:38'),
(2, '29941539', 'A214125', '2022-04-04 12:52:04'),
(3, '62067357', 'A231112', '2022-04-05 05:34:31'),
(4, '15444340', 'A231122', '2022-04-05 05:38:28'),
(5, '36776022', 'A2936187', '2022-04-05 10:35:42'),
(6, '82276531', 'A213122', '2022-04-05 12:58:27'),
(7, '45023330', 'A9237211', '2022-04-05 13:02:23'),
(8, '34018247', 'A211231', '2022-04-11 07:26:44'),
(9, '15052166', 'A213122', '2022-04-11 09:52:51'),
(10, '41143226', 'A2201821', '2022-04-12 06:36:18'),
(11, '39277642', 'A209021', '2022-04-13 04:42:15'),
(12, '23855945', 'a123123', '2022-04-13 09:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_audit_trail`
--

CREATE TABLE `clearance_audit_trail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_audit_trail`
--

INSERT INTO `clearance_audit_trail` (`id`, `user_id`, `action`, `date`, `department`) VALUES
(1, 0, 'Add new clearance requirement named: \'Form 138 (Report Card)\'', '2022-04-13 08:14:58', 'Registrar Coordinator'),
(2, 0, 'Add new clearance requirement named: \'2x2 picture\'', '2022-04-13 09:14:12', 'Registrar Coordinator'),
(3, 0, 'Add new clearance requirement named: \'Registrar Record\'', '2022-04-13 10:36:42', 'Registrar Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_department_students`
--

CREATE TABLE `clearance_department_students` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_department_students`
--

INSERT INTO `clearance_department_students` (`id`, `department_name`) VALUES
(1, 'Book Coordinator'),
(2, 'Registrar Coordinator'),
(3, 'Cashier Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_department_teachers`
--

CREATE TABLE `clearance_department_teachers` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clearance_requirements_students`
--

CREATE TABLE `clearance_requirements_students` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `clearance_name` varchar(255) NOT NULL,
  `clearance_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_requirements_students`
--

INSERT INTO `clearance_requirements_students` (`id`, `department`, `clearance_name`, `clearance_type`, `status`) VALUES
(1, 'Registrar Coordinator', 'Form 138 (Report Card)', 'File Submission Hard Copy (Original Copy must be submitted)', 'Active'),
(2, 'Registrar Coordinator', '2x2 picture', 'File Submission Soft Copy (Can be submitted online) or Hard Copy (Optional to submit the original copy)', 'Active'),
(3, 'Registrar Coordinator', 'Registrar Record', 'Clearance Record (Pending Record)', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_student_appointment`
--

CREATE TABLE `clearance_student_appointment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `department` varchar(255) NOT NULL,
  `appointment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_student_appointment`
--

INSERT INTO `clearance_student_appointment` (`id`, `student_id`, `department_id`, `appointment_date`, `department`, `appointment_id`) VALUES
(1, 22010001, 2, '2022-04-14', 'Registrar Coordinator', '625679aea52e2381893442');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_student_appointment_limit`
--

CREATE TABLE `clearance_student_appointment_limit` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `appointment` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clearance_student_status`
--

CREATE TABLE `clearance_student_status` (
  `id` int(11) NOT NULL,
  `clearance_requirement_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `clearance_department_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `file_link` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_student_status`
--

INSERT INTO `clearance_student_status` (`id`, `clearance_requirement_id`, `location`, `student_id`, `status`, `clearance_department_id`, `date`, `file_link`, `remarks`) VALUES
(1, 1, 'Office', 22010001, 'Completed', 2, '2022-04-13 08:16:44', NULL, NULL),
(2, 2, 'Database', 22010001, 'Completed', 2, '2022-04-13 09:19:04', '62567869663c5055345460.pdf', NULL),
(3, 3, 'Office', 22010001, 'Completed', 2, '2022-04-13 10:58:09', NULL, NULL),
(15, 2, 'Database', 22010005, 'Completed', 2, '2022-04-13 12:41:46', '6256a14036b41845000677.pdf', NULL),
(16, 1, 'Office', 22010005, 'Completed', 2, '2022-04-13 12:34:10', NULL, NULL),
(25, 1, 'Office', 22010003, 'Completed', 2, '2022-04-13 12:46:51', NULL, NULL),
(26, 1, 'Office', 22010003, 'Completed', 2, '2022-04-13 12:48:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clinic_program`
--

CREATE TABLE `clinic_program` (
  `prog_id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `authority` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_program`
--

INSERT INTO `clinic_program` (`prog_id`, `program`, `descr`, `date_start`, `authority`, `status`) VALUES
(1, 'Heart', 'sdasdsad', 'April 22, 2022', 'Physician', 'Closed'),
(2, 'Eye Check', 'For All BCP STUDENTS', 'April 21, 2022', 'Nurse', 'Open'),
(3, 'Dental Check-up', 'Free Dental Checkup for all Students', 'April 22, 2022', 'Dental', 'Open'),
(5, 'BMI CHECK', 'Free BMI Check for all', 'April 22, 2022', 'Nurse', 'Open'),
(6, 'bullshit', 'Para sa mga tnga lang', 'April 24, 2022', 'School Physician', 'Open'),
(7, 'bullshit3', 'asdsadsad', 'April 19, 2022', 'Dentist', 'Open'),
(9, 'phits', 'asdasdsd', 'April 29, 2022', 'Dentist', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `datms_dept`
--

CREATE TABLE `datms_dept` (
  `off_id` int(100) NOT NULL,
  `off_code` varchar(100) NOT NULL,
  `off_name` varchar(255) NOT NULL,
  `off_location` varchar(255) NOT NULL,
  `off_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_dept`
--

INSERT INTO `datms_dept` (`off_id`, `off_code`, `off_name`, `off_location`, `off_date`) VALUES
(1, 'doc202224726989', 'College of Computer Studies', 'Program for logical people', 'Mar-04-2022 01:37:42 AM'),
(3, 'doc202289852304', 'Registrar Department', 'A registrar\'s department is an essential unit within a college, university, or secondary school. The registrar\'s office provides a variety of services and supports for prospective students, current students, faculty, and staff related to: Marketing and re', 'Mar-04-2022 02:17:36 PM'),
(16, 'doc202256758736', 'Admission', 'Admission', 'Apr-05-2022 05:17:51 PM'),
(18, 'doc202268657789', 'Clearance Department', 'Clearance Department', 'Apr-13-2022 02:07:24 PM');

-- --------------------------------------------------------

--
-- Table structure for table `datms_doctype`
--

CREATE TABLE `datms_doctype` (
  `dt_id` int(20) NOT NULL,
  `dt_code` varchar(50) NOT NULL,
  `dt_name` varchar(50) NOT NULL,
  `dt_desc` varchar(255) NOT NULL,
  `dt_kind` varchar(100) NOT NULL,
  `dt_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_doctype`
--

INSERT INTO `datms_doctype` (`dt_id`, `dt_code`, `dt_name`, `dt_desc`, `dt_kind`, `dt_date`) VALUES
(1, 'doc202211765408', 'Transferring Form', 'Students', 'Hardcopy', '2022-04-27 12:25:16 PM'),
(2, 'doc202243822028', 'Shifting form', 'Students', 'Hardcopy', '2022-04-27 12:25:11 PM'),
(3, 'doc202265657623', 'Dropping form', 'Students', 'Hardcopy', '2022-04-27 12:25:05 PM'),
(4, 'doc202222882969', 'Submission of Grades', 'Teachers', 'Softcopy', '2022-04-27 12:24:58 PM'),
(5, 'doc202266016260', 'Schedule', 'Teachers', 'Softcopy', '2022-04-27 12:24:52 PM'),
(6, 'doc202260846412', 'Certificate of Registration', 'Students', 'Hardcopy', '2022-04-27 12:24:41 PM'),
(7, 'doc202215402755', 'Application for Graduation', 'Students', 'Softcopy', '2022-04-27 12:24:34 PM'),
(9, 'doc202268573040', 'TRY', 'Teachers', 'Hardcopy', '2022-05-04 12:30:41 AM');

-- --------------------------------------------------------

--
-- Table structure for table `datms_documents`
--

CREATE TABLE `datms_documents` (
  `doc_id` int(20) NOT NULL,
  `doc_code` varchar(50) NOT NULL,
  `doc_title` varchar(225) NOT NULL,
  `doc_name` varchar(225) NOT NULL,
  `doc_size` varchar(100) NOT NULL,
  `doc_dl` int(20) NOT NULL,
  `doc_type` varchar(100) NOT NULL,
  `doc_status` varchar(50) NOT NULL,
  `doc_desc` varchar(255) NOT NULL,
  `doc_actor1` varchar(100) NOT NULL,
  `doc_off1` varchar(100) NOT NULL,
  `doc_date1` varchar(100) NOT NULL,
  `doc_actor2` varchar(100) NOT NULL,
  `doc_off2` varchar(100) NOT NULL,
  `doc_date2` varchar(100) NOT NULL,
  `doc_actor3` varchar(200) NOT NULL,
  `doc_off3` varchar(200) NOT NULL,
  `doc_date3` varchar(200) NOT NULL,
  `doc_remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_documents`
--

INSERT INTO `datms_documents` (`doc_id`, `doc_code`, `doc_title`, `doc_name`, `doc_size`, `doc_dl`, `doc_type`, `doc_status`, `doc_desc`, `doc_actor1`, `doc_off1`, `doc_date1`, `doc_actor2`, `doc_off2`, `doc_date2`, `doc_actor3`, `doc_off3`, `doc_date3`, `doc_remarks`) VALUES
(1, 'doc20222358', '22010001', 'Requirements(Marvin).pdf', '25063', 0, 'Shifting form', 'Hold', 'TRY', 'Super Admin', 'Administrator', 'Apr-13-2022 11:54:56 AM', 'Super Admin', 'Administrator', 'Apr-14-2022 10:27:16 PM', 'Super Admin', 'Administrator', 'Apr-13-2022 11:54:56 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `datms_notification`
--

CREATE TABLE `datms_notification` (
  `id` int(20) NOT NULL,
  `act1` varchar(100) NOT NULL,
  `stat1` varchar(20) NOT NULL,
  `act2` varchar(100) NOT NULL,
  `stat2` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `notif` varchar(255) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_notification`
--

INSERT INTO `datms_notification` (`id`, `act1`, `stat1`, `act2`, `stat2`, `subject`, `notif`, `dept`, `status`, `date`) VALUES
(1, 'Marvin Marilao', '1', '', '0', 'Created Document', 'You successfully created tracking document', 'Registrar Department', 'Active', '2022-05-03 04:44:55 PM'),
(2, '', '0', '22010001', '1', 'Created Document', 'Your Tracking for Shifting form is successfully created by Marvin Marilao', '', 'Active', '2022-05-03 04:44:55 PM'),
(3, 'Approver Account', '1', '', '0', 'Submitted Document', 'You have incoming document', 'Registrar Department', 'Active', '2022-05-03 04:45:23 PM'),
(4, '', '0', '22010001', '1', 'Submitted Document', 'Your Shifting form is submitted to Approver Account', 'Registrar Department', 'Active', '2022-05-03 04:45:23 PM'),
(5, 'Approver Account', '1', '', '0', 'Received Document', 'You successfully received the document', 'Registrar Department', 'Active', '2022-05-03 04:45:42 PM'),
(6, '', '0', '22010001', '1', 'Received Document', 'Your Shifting form is received by Approver Account', 'Registrar Department', 'Active', '2022-05-03 04:45:42 PM'),
(7, 'Marvin Marilao', '1', '', '0', 'Approved Document', 'Your document has been approved', 'Registrar Department', 'Active', '2022-05-03 04:46:08 PM'),
(8, 'Approver Account', '1', '', '0', 'Approved Document', 'You approved Shifting form of 22010001', 'Registrar Department', 'Active', '2022-05-03 04:46:08 PM'),
(9, '', '0', '22010001', '1', 'Approved Document', 'Your Shifting form is approved by Approver Account', 'Registrar Department', 'Active', '2022-05-03 04:46:08 PM'),
(10, 'Marvin Marilao', '1', '', '0', 'Created Document', 'You successfully created tracking document', 'Registrar Department', 'Active', '2022-05-03 04:46:59 PM'),
(11, '', '0', 'T22000001', '1', 'Created Document', 'Your Tracking for Submission of Grades is successfully created by Marvin Marilao', '', 'Active', '2022-05-03 04:46:59 PM'),
(12, 'Approver Account', '1', '', '0', 'Submitted Document', 'You have incoming document', 'Registrar Department', 'Active', '2022-05-03 04:47:27 PM'),
(13, '', '0', 'T22000001', '1', 'Submitted Document', 'Your Submission of Grades is submitted to Approver Account', 'Registrar Department', 'Active', '2022-05-03 04:47:27 PM'),
(14, 'Approver Account', '1', '', '0', 'Received Document', 'You successfully received the document', 'Registrar Department', 'Active', '2022-05-03 04:47:35 PM'),
(15, '', '0', 'T22000001', '1', 'Received Document', 'Your Submission of Grades is received by Approver Account', 'Registrar Department', 'Active', '2022-05-03 04:47:35 PM'),
(16, 'Marvin Marilao', '1', '', '0', 'Rejected Document', 'Your document has been rejected', 'Registrar Department', 'Active', '2022-05-03 04:48:37 PM'),
(17, 'Approver Account', '1', '', '0', 'Rejected Document', 'You rejected Submission of Grades of T22000001', 'Registrar Department', 'Active', '2022-05-03 04:48:37 PM'),
(18, '', '0', 'T22000001', '1', 'Rejected Document', 'Your Submission of Grades is rejected by Approver Account', 'Registrar Department', 'Active', '2022-05-03 04:48:37 PM'),
(21, '', '0', '22010001', '1', 'Request Submitted', 'You successfully Submit your request for Shifting form', 'BSIT', 'Active', '2022-05-04 01:44:06 AM'),
(22, 'Registrar Department', '1', '', '0', 'Incoming Request', 'You have incoming request for Shifting form', 'BSIT', 'Active', '2022-05-04 01:44:06 AM');

-- --------------------------------------------------------

--
-- Table structure for table `datms_program`
--

CREATE TABLE `datms_program` (
  `id` int(11) NOT NULL,
  `p_code` varchar(50) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_program`
--

INSERT INTO `datms_program` (`id`, `p_code`, `p_name`, `date`) VALUES
(1, 'BSPsy', 'BS Psychology', 'Apr-11-2022 12:12:07 PM'),
(2, 'BSAIS', 'BS Accounting Information System', 'Apr-11-2022 12:12:15 PM'),
(3, 'BSEntrep', 'BS Entrepreneurship', 'Apr-11-2022 12:12:57 PM'),
(4, 'BSTM', 'BS Tourism Management', 'Apr-11-2022 12:13:07 PM'),
(5, 'BLIS', 'Bachelor of Library in Information Science', 'Apr-11-2022 12:13:17 PM'),
(6, 'BSCE', 'BS Computer Engineering', 'Apr-11-2022 12:13:30 PM'),
(7, 'BPEeD', 'Bachelor of Physical Education', 'Apr-11-2022 12:13:41 PM'),
(8, 'BTLeD', 'Bachelor of Technology and Livelihood Education', 'Apr-11-2022 12:13:52 PM'),
(9, 'BSEd Major in Values', 'Bachelor of Secondary Education Major in Values Education', 'Apr-11-2022 12:14:06 PM'),
(10, 'BSEd Major in Social', 'Bachelor of Secondary Education Major in Social Studies', 'Apr-11-2022 12:14:24 PM'),
(11, 'BSEd Major in Mathematics', 'Bachelor of Secondary Education Major in Mathematics', 'Apr-11-2022 12:17:42 PM'),
(13, 'BSEd Major in English', 'Bachelor of Secondary Education Major in English', 'Apr-11-2022 12:18:17 PM'),
(14, 'BEEd', 'Bachelor of Elementary Education', 'Apr-11-2022 12:18:30 PM'),
(15, 'BSCriM', 'BS Criminology', 'Apr-11-2022 12:18:42 PM'),
(16, 'BSBA Major in Marketing', 'BS Business Administration Major in Marketing', 'Apr-11-2022 12:18:54 PM'),
(22, 'BSIT', 'BS Information Technology', 'Apr-13-2022 11:20:12 AM'),
(23, 'BSHM', 'BS Hospitality Management', 'Apr-13-2022 11:20:20 AM'),
(24, 'BSOA', 'BS Office Administration', 'Apr-13-2022 11:20:28 AM'),
(25, 'BSBA Major in HRM', 'BS Business Administration Major in Human Resource Management', 'Apr-13-2022 11:20:40 AM'),
(26, 'BSEd Major in Filipino', 'Bachelor of Secondary Education Major in Filipino', 'Apr-13-2022 11:20:50 AM');

-- --------------------------------------------------------

--
-- Table structure for table `datms_req`
--

CREATE TABLE `datms_req` (
  `id` int(11) NOT NULL,
  `req_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_req`
--

INSERT INTO `datms_req` (`id`, `req_name`) VALUES
(1, 'Form 138 (Report Card)'),
(2, 'Form 137'),
(3, 'Certificate of Good Moral'),
(4, 'PSA Authenticated Birth Certificate'),
(5, 'Passport Size ID Picture (White Background, Formal Attire) - 2pcs'),
(6, 'Barangay Clearance'),
(7, 'Transcript of Records(TOR)'),
(8, 'Honorable Dismissal');

-- --------------------------------------------------------

--
-- Table structure for table `datms_studreq`
--

CREATE TABLE `datms_studreq` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `req` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_studreq`
--

INSERT INTO `datms_studreq` (`id`, `id_number`, `req`, `date`) VALUES
(1, '22010001', 'Form 138 (Report Card)', '2022-04-11 10:18:22'),
(2, '22010002', 'Form 137', '2022-04-12 07:29:38'),
(3, '22010001', 'Certificate of Good Moral', '2022-04-12 07:29:36'),
(4, '22010002', 'PSA Authenticated Birth Certificate', '2022-04-12 07:29:12'),
(26, '22010002', 'Passport Size ID Picture (White Background, Formal Attire) - 2pcs', '2022-04-12 15:38:30'),
(30, '22010003', 'Form 138 (Report Card)', '2022-04-13 04:43:08'),
(31, '22010003', 'PSA Authenticated Birth Certificate', '2022-04-13 04:43:08'),
(32, '22010003', 'Passport Size ID Picture (White Background, Formal Attire) - 2pcs', '2022-04-13 04:43:08'),
(33, '22010005', 'Form 138 (Report Card)', '2022-04-13 09:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `datms_tempreq`
--

CREATE TABLE `datms_tempreq` (
  `id` int(50) NOT NULL,
  `req_code` varchar(100) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `program` varchar(150) NOT NULL,
  `docu` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `datms_tracking`
--

CREATE TABLE `datms_tracking` (
  `doc_id` int(20) NOT NULL,
  `doc_code` varchar(50) NOT NULL,
  `doc_title` varchar(225) NOT NULL,
  `doc_name` varchar(225) NOT NULL,
  `doc_size` varchar(100) NOT NULL,
  `doc_type` varchar(100) NOT NULL,
  `doc_status` varchar(50) NOT NULL,
  `doc_desc` varchar(255) NOT NULL,
  `doc_actor1` varchar(100) NOT NULL,
  `doc_off1` varchar(100) NOT NULL,
  `doc_date1` varchar(100) NOT NULL,
  `doc_actor2` varchar(100) NOT NULL,
  `doc_off2` varchar(100) NOT NULL,
  `doc_date2` varchar(100) NOT NULL,
  `doc_remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_tracking`
--

INSERT INTO `datms_tracking` (`doc_id`, `doc_code`, `doc_title`, `doc_name`, `doc_size`, `doc_type`, `doc_status`, `doc_desc`, `doc_actor1`, `doc_off1`, `doc_date1`, `doc_actor2`, `doc_off2`, `doc_date2`, `doc_remarks`) VALUES
(1, 'doc20222358', '22010001', 'Requirements(Marvin).pdf', '25063', 'Shifting form', 'Created', 'TRY', 'Super Admin', 'Administrator', 'Apr-13-2022 11:54:56 AM', '', '', 'Apr-13-2022 11:54:56 AM', 'Tracking Document is Created by'),
(2, 'doc20222358', '22010001', 'Requirements(Marvin).pdf', '25063', 'Shifting form', 'Hold', 'TRY', 'Super Admin', 'Administrator', 'Apr-14-2022 10:27:16 PM', 'Super Admin', 'Administrator', 'Apr-13-2022 11:54:56 AM', 'Document is Hold by');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(4, 'Clearance System'),
(6, 'DATMS'),
(5, 'Guidance and Counselling'),
(8, 'Health Check Monitoring'),
(1, 'Help Desk System'),
(3, 'LMS Edmodo'),
(9, 'LMS Moodle'),
(10, 'Medical System'),
(2, 'OJT System'),
(11, 'Scholarship System'),
(7, 'Student Services'),
(12, 'User Management');

-- --------------------------------------------------------

--
-- Table structure for table `hcms_audit_trail`
--

CREATE TABLE `hcms_audit_trail` (
  `id` int(50) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `affected` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hcms_audit_trail`
--

INSERT INTO `hcms_audit_trail` (`id`, `account_no`, `action`, `actor`, `affected`, `ip`, `host`, `date`) VALUES
(1, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-16-2022 03:11:40 PM'),
(2, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', '2022'),
(3, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', '2022'),
(4, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', '2022'),
(5, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', '2022'),
(6, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', '2022'),
(7, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', '2022'),
(8, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', '2022'),
(9, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', '2022'),
(10, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', '2022'),
(11, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 03:49:09 AM'),
(12, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 04:01:11 AM'),
(13, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', ''),
(14, 'U22000014', 'Record Registered', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', ''),
(15, 'U22000014', 'Record Registered', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', ''),
(16, 'U22000014', 'Record Registered', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 02:02:04 PM'),
(17, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 05:06:00 PM'),
(18, 'U22000016', 'User Profile has been updated', 'Health Check Monitoring Assistant', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-18-2022 07:53:17 PM'),
(19, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-19-2022 02:43:11 PM'),
(20, 'U22000014', 'Record Registered', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-19-2022 03:24:57 PM'),
(21, 'U22000016', 'Record Registered', 'Health Check Monitoring Assistant', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:25:01 AM'),
(22, 'U22000017', 'User Profile has been updated', 'Medical System Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-20-2022 12:38:02 AM'),
(23, 'U22000014', 'User Profile has been updated', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-21-2022 04:44:01 AM'),
(24, 'U22000014', 'Record Registered', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-21-2022 05:16:06 AM'),
(25, 'U22000014', 'Record Registered', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-21-2022 05:18:20 AM'),
(26, 'U22000014', 'Record Registered', 'Health Check Monitoring Administrator', '', '::1', 'LAPTOP-6VOSFL7I', 'Apr-24-2022 05:20:59 PM');

-- --------------------------------------------------------

--
-- Table structure for table `hcms_faculty_records`
--

CREATE TABLE `hcms_faculty_records` (
  `id` int(255) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `full_n` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `assess_date` varchar(255) NOT NULL,
  `file_id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `appr_name` varchar(255) NOT NULL,
  `cons_name` varchar(255) DEFAULT NULL,
  `cons_role` varchar(255) NOT NULL,
  `cons_date` varchar(255) NOT NULL,
  `cons_dept` varchar(255) NOT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hcms_faculty_records`
--

INSERT INTO `hcms_faculty_records` (`id`, `stud_id`, `full_n`, `status`, `assess_date`, `file_id`, `file_name`, `appr_name`, `cons_name`, `cons_role`, `cons_date`, `cons_dept`, `remarks`, `type`) VALUES
(15, 'T22000001', 'Teacher Teacher Teacher', 'Approved', 'Apr-17-2022 01:15:04 AM', 'MED2022-77282', '49782-contracts.pdf', 'Reiniel Andres', NULL, 'Health Check Monitoring Administrator', '', 'Health Check Monitoring', '2312321', 'Direct');

-- --------------------------------------------------------

--
-- Table structure for table `hcms_health_services`
--

CREATE TABLE `hcms_health_services` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `full_n` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `serv_descr` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `last_c` varchar(255) DEFAULT NULL,
  `next_c` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hcms_health_services`
--

INSERT INTO `hcms_health_services` (`id`, `id_number`, `full_n`, `service`, `serv_descr`, `dept`, `file_name`, `date`, `title`, `last_c`, `next_c`, `created_at`, `updated_at`) VALUES
(1, '18013888', 'Reiniel P Andres', 'Health Check Services', 'Yes it is ', 'Student', 'sample.pdf', 'April 24, 2022', NULL, NULL, NULL, NULL, NULL),
(2, '18012935', 'Kim Julius Marin', 'Blood Pressure Check', 'ssadadasdsad', 'Student', 'sample.pdf', 'April 27, 2022', 'egop problem', NULL, NULL, NULL, NULL),
(3, '18012935', 'Kim Julius Marin', 'Blood Pressure Check', 'asdasdasdsad', 'Student', 'sample.pdf', 'April 24, 2022', NULL, NULL, NULL, NULL, NULL),
(4, 'T22000001', 'Jhun Villalon', 'BP Check', 'asdasdasdsad', 'Teacher', 'sample.pdf', 'April 28, 2022', 'BP Check', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hcms_incidents_logs`
--

CREATE TABLE `hcms_incidents_logs` (
  `id` int(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `classified` varchar(255) NOT NULL,
  `personnel` varchar(255) DEFAULT NULL,
  `cons_name` varchar(255) NOT NULL,
  `cons_role` varchar(255) NOT NULL,
  `cons_date` varchar(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_quantity` int(255) NOT NULL,
  `aid` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hcms_incidents_logs`
--

INSERT INTO `hcms_incidents_logs` (`id`, `id_number`, `fullname`, `title`, `classified`, `personnel`, `cons_name`, `cons_role`, `cons_date`, `prod_name`, `prod_quantity`, `aid`, `file`, `created_at`, `updated_at`) VALUES
(1, '18013888', 'Reiniel P. Andres', 'Pogi eto', 'Major', 'Student', 'Richville Villasfer', 'Medical System Administrator', 'April 20, 2022', 'Biogesic', 3, NULL, NULL, NULL, NULL),
(2, 'T22000001', 'Jhune Villalon\r\n', 'Head Injury\n', 'Minor', 'Faculty', 'Jamaine Cayan', 'Medical System School Physician', 'April 23, 2022', 'Medicol', 2, NULL, NULL, NULL, NULL),
(3, '18013999', 'Jamaine Cayan', 'Broken teeth, three-tooth front', 'Major', 'Non-Teaching', 'Richville Villasfer', 'Medical System Dentist', 'April 24, 2022', 'Amoxicilin', 7, NULL, NULL, NULL, NULL),
(4, '18012935', 'Kim Julius Marin', 'Briuses', 'Minor', 'Student', 'Richville Villasfer', 'School Physician', 'April 26, 2022', 'Mighty Bond', 3, 'First Aid', 'PureAction.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hcms_items`
--

CREATE TABLE `hcms_items` (
  `prod_id` int(11) NOT NULL,
  `med_name` varchar(255) NOT NULL,
  `med_sci` varchar(255) NOT NULL,
  `manifactured` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hcms_items`
--

INSERT INTO `hcms_items` (`prod_id`, `med_name`, `med_sci`, `manifactured`, `exp_date`, `img`, `quantity`) VALUES
(1, 'BIOGESIC', 'acetaminophen, dexbrompheniramine maleate', 'April 20, 2022', 'April 20, 2025', 'biogesic.png', '50'),
(2, 'MEDICOL', 'Nonsteroidal Anti-Inflammatory Drugs (NSAIDs)', 'April 02, 2022', 'April 02, 2025', 'medicol.png', '100'),
(3, 'AMOXICILIN', 'penicillin antibiotic', 'April 25, 2022', 'April 25, 2025', 'amoxicillin.png', '55'),
(4, 'ALAXAN', 'Ibuprofen, paracetamol', 'April 26, 2022', 'April 26, 2025', 'alaxan.png', '66'),
(5, 'KALACHCUCHI', 'asdasdasdas', 'April 28, 2022', 'April 28, 2025', 'yeah.jpg', '26');

-- --------------------------------------------------------

--
-- Table structure for table `hcms_request`
--

CREATE TABLE `hcms_request` (
  `id` int(255) NOT NULL,
  `req_id` int(255) NOT NULL,
  `req_desc` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `assess_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hcms_request`
--

INSERT INTO `hcms_request` (`id`, `req_id`, `req_desc`, `status`, `sender`, `assess_date`) VALUES
(1, 18013888, 'Pending', 'Approved', 'Jamaine P Cayan', 'Apr-21-2022 04:52:28 AM'),
(2, 18013889, 'Ulyanin na tong bobong to', 'Approved', 'Hilaw', 'Apr-16-2022 11:22:16 AM'),
(3, 18013810, 'May toyo', 'Approved', 'Reiniel', 'Apr-16-2022 11:22:49 AM'),
(4, 18013811, 'May sapak', 'Approved', 'Nyel', 'Apr-16-2022 11:23:19 AM');

-- --------------------------------------------------------

--
-- Table structure for table `hdms_tickets`
--

CREATE TABLE `hdms_tickets` (
  `id` int(11) NOT NULL,
  `student_number` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=new_ticket,1=waiting_reply_status,2= closed_status',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_department` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hdms_tickets`
--

INSERT INTO `hdms_tickets` (`id`, `student_number`, `ticket_id`, `status`, `email`, `subject`, `ticket_department`, `message`, `date`) VALUES
(1, '22010003', 'f238a0f6c36e1221d602', 2, 'bHM1NkpVSTN4RnUrbUo3NnZLdGxOUT09OjoaJAep57Xcf6rShB4JbCCR', 'WnZKNmNSQmxCNGxBSU45Y2t4R2J5UT09OjroPfuR6r98IboQcotLZQ/U', 'HDMS Department', 'T1VzZjhreWQ5MWFrRUhGa2pobnArZz09OjoVwi2FfP2EAe2KF09BC53Q', '2022-05-06 03:00:49'),
(2, '22010001', '635c0e8527a4a50a4dc2', 0, 'Vmp4K1F2a0NYWUw5dlR6a243MTRFa2NFUGlMU2Zzeks2WlovNlFCTCtwWT06OlyuPM9M+JbNESezohsPWPg=', 'aUo2bUx6NlNRcFcwcDRXdVE2blBzUT09OjqJdo1AJmluY8fHLlgtwhjj', 'HDMS Program', 'MW1LZ21HYlRiMlJ5UUlUK0dLZytBUT09Ojr4gzpkMtS6TPirp4TNIWrq', '2022-05-06 03:03:41'),
(3, '22010001', '7871af743c9ddbc95971', 0, 'cEpqMEc4TWtsSXFmMmIySTJxWThVZz09OjrXix0fb+2XkdmcaTN/bPmi', 'ZE9wcnJNVzI4NFB2aGlNb3FqdVFJdz09OjqTEA+fDO5zypiELK9mjvF7', '10', 'SkF5cUhIRU5GUFU4WVFJa2NTTm1Sdz09OjpyIFBw7H1HXfWm9XznHG15', '2022-05-06 03:42:52'),
(4, '22010001', '535f764c3fa9ab82ebcd', 0, 'Y1ZUTFR4T1c2SitTU3V4T3ZSSURrUT09Ojp+BCW4qefHHVE6LT2K9ugt', 'bHBxeWd4c20rSDJFY0RBOFRhbjNZN2tyUkZBVG94MnBWbzRWdTRpVjBBQT06OkoP8i5VJC4MUx/XNyL3gck=', '10', 'a3ptV255ZlVsdzRWMkNZaW00dlZZZz09Ojotug4gSxZU75prZktf6IUV', '2022-05-06 03:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) NOT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `attempt_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ms_cashier`
--

CREATE TABLE `ms_cashier` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `ticket` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_cashier`
--

INSERT INTO `ms_cashier` (`id`, `id_number`, `name`, `course`, `year`, `ticket`, `payment`, `date`, `create_at`) VALUES
(1, '18013888', 'Reiniel Andres', 'BSED', '3rd year', NULL, 'Paid', 'May 1, 2022', '2022-05-01 07:18:15'),
(2, '18013999', 'Jamaine Cayan', 'BSIT', '4th year', 'yeah', 'Paid', 'May 1, 2022', '2022-05-01 11:31:05'),
(3, '18013111', 'Kim Juliet', 'BSEntrep', '2nd Year', NULL, 'Paid', 'April 6, 2022', '2022-05-05 16:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `ms_labtest`
--

CREATE TABLE `ms_labtest` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `full_n` varchar(255) DEFAULT NULL,
  `datetime` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `yr_lvl` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_labtest`
--

INSERT INTO `ms_labtest` (`id`, `id_number`, `full_n`, `datetime`, `file_name`, `course`, `yr_lvl`, `contact`, `created_at`, `updated_at`) VALUES
(6, '18013888', 'Reiniel Andres', '2022-05-03 10:39:35', '8923-HRMemo.pdf', 'BSIT', '4th Year', '+63 910 784 4633', '2022-05-03 02:39:35', '2022-05-03 02:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `ms_program_logs`
--

CREATE TABLE `ms_program_logs` (
  `id` int(255) NOT NULL,
  `prog_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `progs_name` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `cons_name` varchar(255) NOT NULL,
  `cons_role` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_program_logs`
--

INSERT INTO `ms_program_logs` (`id`, `prog_id`, `full_name`, `progs_name`, `id_number`, `descr`, `cons_name`, `cons_role`, `file_name`, `date`) VALUES
(1, 1, 'Reiniel P Andres', 'Dental Check-up', '18013888', 'Pogi at maganda ipin', 'Jamaine Cayan', 'Dentist', 'yeah.pdf', 'April 18, 2022'),
(2, 1, 'Jamaine Cayan', 'Eye Check', '18013444', 'Masyadong maganda', 'Reiniel Andres', 'Nurse', 'jigs.pdf', 'April 21, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `ms_schedule`
--

CREATE TABLE `ms_schedule` (
  `id` int(11) NOT NULL,
  `course` varchar(355) DEFAULT NULL,
  `yr_lvl` varchar(255) DEFAULT NULL,
  `sched_from` varchar(255) DEFAULT NULL,
  `sched_to` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL ON UPDATE current_timestamp(6),
  `creator` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_schedule`
--

INSERT INTO `ms_schedule` (`id`, `course`, `yr_lvl`, `sched_from`, `sched_to`, `created_at`, `creator`) VALUES
(54, 'BSIT', '4th Year', '2022-05-12T23:13', '2022-05-13T23:13', '2022-05-05 15:13:45.000000', 'RichvilleVillasfer');

-- --------------------------------------------------------

--
-- Table structure for table `ms_valid`
--

CREATE TABLE `ms_valid` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_valid`
--

INSERT INTO `ms_valid` (`id`, `id_number`, `name`, `course`, `date`, `created_at`, `updated_at`) VALUES
(1, '18013888', 'Reiniel Andres', 'BSIT', 'May 1, 2022', '2022-05-02 14:48:05', '2022-05-02 14:48:05'),
(15, '18013999', 'Jamaine Cayan', 'BSIT', 'May 1, 2022', '2022-05-03 06:35:54', '2022-05-03 06:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `department_id`, `role`) VALUES
(1, 1, 'Help Desk Administrator'),
(3, 2, 'OJT Administrator'),
(4, 3, 'LMS Edmodo Administrator'),
(5, 4, 'Clearance Administrator'),
(6, 4, 'Laboratory Coordinator'),
(7, 4, 'Book Coordinator'),
(8, 4, 'Library Coordinator'),
(9, 4, 'Cashier Coordinator'),
(10, 4, 'Registrar Coordinator'),
(11, 4, 'Guidance Coordinator'),
(12, 4, 'Department Head'),
(13, 5, 'Guidance and Counselling Administrator'),
(14, 6, 'Registrar Administrator'),
(15, 7, 'Student Service Administrator'),
(16, 8, 'Health Check Monitoring Administrator'),
(17, 9, 'LMS Moodle Administrator'),
(18, 10, 'Medical System Administrator'),
(19, 11, 'Scholarship Administrator'),
(20, 12, 'User Management Administrator'),
(21, 6, 'DATMS Approver'),
(22, 6, 'Assistant Registrar'),
(24, 6, 'Cashier'),
(25, 6, 'Admission'),
(27, 6, 'Registrar Officer'),
(33, 4, 'Clinic Coordinator'),
(34, 8, 'Health Check Monitoring Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `student_application`
--

CREATE TABLE `student_application` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL,
  `stud_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_application`
--

INSERT INTO `student_application` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `course`, `gender`, `birthday`, `nationality`, `religion`, `civil_status`, `account_status`, `stud_date`) VALUES
(1, '15052166', 'John Marvin', 'Marilao', 'Luna', 'marvinmarilao92@gmail.com', '09202966614', 'Ph. 2 Pkg. 2 Blk. 30 Lot 16 Bagong Silang Caloocan City 1428', 'BSIT', 'Male', '1999-10-09', 'philippines', 'Roman Catholic', 'Single', 'Enrolled', 'Apr-11-2022 05:52:31 PM'),
(2, '41143226', 'Sofie', 'Luna', '', 'Sofie@gmail.com', '09202938283', 'Ph. 2 pkg. 2 blk 30 lot 16 Bagong Silang Caloocan City 1428', 'BSBA Major in Marketing', 'Male', '2000-09-20', 'philippines', 'Roman Catholic', 'Single', 'Enrolled', 'Apr-12-2022 02:35:40 PM'),
(3, '39277642', 'Jienavin', 'Marilao', 'Luna', 'Jienavin@gmail.com', '09723762378', 'Ph. 2 Pkg. 2 Blk. 30 Lot 16 Bagong Silang Caloocan City 1428', 'BSPsy', 'Male', '2002-07-11', 'philippines', 'Roman Catholic', 'Single', 'Enrolled', 'Apr-13-2022 11:04:22 AM'),
(4, '23855945', 'Olivert', 'Jamito', 'San Buenaventura', 'olivertjr17@gmail.com', '09278792464', 'Robes 1, Area A, Camarin Caloocan City  Caloocan City 1422', 'BSIT', 'Male', '2000-03-17', 'philippines', 'Roman Catholic', 'Single', 'Enrolled', 'Apr-13-2022 05:30:40 PM');

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL,
  `stud_date` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `course`, `year_level`, `section`, `school_year`, `gender`, `birthday`, `nationality`, `religion`, `civil_status`, `account_status`, `stud_date`) VALUES
(1, '22010001', 'Marvin', 'Marilao', 'L', 'marvinmarilao92@gmail.com', '09202966614', 'Ph. 2 Pkg. 2 Blk. 30 Lot 16 Bagong Silang Caloocan City 1428', 'BSIT', '4th Year', '4212', '2020-2021', 'Male', '1999-10-09', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-26 10:35:23'),
(2, '22010002', 'test', 'test', 'T', 'test@gmail.com', '098293861873', 'test test test 1231', 'BSEntrep', '1st Year', '1101', '2021-2022', 'Male', '2022-03-03', 'philippines', 'Roman Catholic', 'Single', 'Unoffical', '2022-03-26 10:39:06'),
(3, '22010003', 'test', 'test', 'T', 'test@gmail.com', '098293861873', 'test test test 1231', 'BSEntrep', '1st Year', '1101', '2021-2022', 'Male', '2022-03-03', 'philippines', 'Roman Catholic', 'Single', 'Unoffical', '2022-03-26 10:39:14'),
(4, '22000004', 'asd', 'asd', 'A', 'asd@gmail.com', '09782367189', 'asd asd asd 1231', 'BSIT', '1st Year', '1102', '2029-2030', 'Male', '2022-03-03', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-26 10:50:27'),
(5, '22010005', 'qwe', 'qwe', 'Q', 'qwe@gmail.com', '12312312312', 'qwe qwe qwe `1231', 'BSIT', '1st Year', '1211', '2031-2032', 'Male', '2022-03-05', 'philippines', 'Roman Catholic', 'Single', 'Unoffical', '2022-03-26 10:57:32'),
(6, '22010006', 'TEST', 'TEST', 'T', 'TEST@gmail.com', '09238721783', 'TEST TEST TEST 1231', 'BSEntrep', '1st Year', '1101', '2021-2022', 'Male', '2022-03-01', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-26 19:22:57'),
(7, '22010007', 'TRY', 'TRY', 'TRY', 'TRY@GMAIL.COM', '09202966614', 'TRY TRY TRY 1231', 'BSHM', '1st Year', '4111', '2021-2022', 'Male', '2022-03-08', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-27 19:29:33'),
(8, '22010008', 'asda', 'asd', 'asd', 'asd@gmail.com', '09239776237', 'asd asd asd 1231', 'BSHM', '1st Year', '1101', '2021-2022', 'Male', '2022-03-02', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-28 15:12:42'),
(9, '22010009', 'Olivert', 'Jamito', 'San Buenaventura', 'olivertjr17@gmail.com', '09238462874', 'ph. 1  pkg. 1 Blk. 30 Camarin Caloocan City 1422', 'BSHM', '1st Year', '1101', '2021-2022', 'Male', '2000-03-17', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-30 12:02:54'),
(10, '22010010', 'asdas', 'asdasd', 'asdsad', 'asdas@gmail.com', '09283767826', 'asdsa asdasd asdasd 1231', 'BSTM', '1st Year', '1101', '2020-2021', 'Male', '2022-03-02', 'philippines', 'Rastafarianism', 'Married', 'Transferee', '2022-03-31 02:50:45'),
(1, '22010001', 'Marvin', 'Marilao', 'L', 'marvinmarilao92@gmail.com', '09202966614', 'Ph. 2 Pkg. 2 Blk. 30 Lot 16 Bagong Silang Caloocan City 1428', 'BSIT', '4th Year', '4212', '2020-2021', 'Male', '1999-10-09', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-26 10:35:23'),
(2, '22010002', 'test', 'test', 'T', 'test@gmail.com', '098293861873', 'test test test 1231', 'BSEntrep', '1st Year', '1101', '2021-2022', 'Male', '2022-03-03', 'philippines', 'Roman Catholic', 'Single', 'Unoffical', '2022-03-26 10:39:06'),
(3, '22010003', 'test', 'test', 'T', 'test@gmail.com', '098293861873', 'test test test 1231', 'BSEntrep', '1st Year', '1101', '2021-2022', 'Male', '2022-03-03', 'philippines', 'Roman Catholic', 'Single', 'Unoffical', '2022-03-26 10:39:14'),
(4, '22000004', 'asd', 'asd', 'A', 'asd@gmail.com', '09782367189', 'asd asd asd 1231', 'BSIT', '1st Year', '1102', '2029-2030', 'Male', '2022-03-03', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-26 10:50:27'),
(5, '22010005', 'qwe', 'qwe', 'Q', 'qwe@gmail.com', '12312312312', 'qwe qwe qwe `1231', 'BSIT', '1st Year', '1211', '2031-2032', 'Male', '2022-03-05', 'philippines', 'Roman Catholic', 'Single', 'Unoffical', '2022-03-26 10:57:32'),
(6, '22010006', 'TEST', 'TEST', 'T', 'TEST@gmail.com', '09238721783', 'TEST TEST TEST 1231', 'BSEntrep', '1st Year', '1101', '2021-2022', 'Male', '2022-03-01', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-26 19:22:57'),
(7, '22010007', 'TRY', 'TRY', 'TRY', 'TRY@GMAIL.COM', '09202966614', 'TRY TRY TRY 1231', 'BSHM', '1st Year', '4111', '2021-2022', 'Male', '2022-03-08', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-27 19:29:33'),
(8, '22010008', 'asda', 'asd', 'asd', 'asd@gmail.com', '09239776237', 'asd asd asd 1231', 'BSHM', '1st Year', '1101', '2021-2022', 'Male', '2022-03-02', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-28 15:12:42'),
(9, '22010009', 'Olivert', 'Jamito', 'San Buenaventura', 'olivertjr17@gmail.com', '09238462874', 'ph. 1  pkg. 1 Blk. 30 Camarin Caloocan City 1422', 'BSHM', '1st Year', '1101', '2021-2022', 'Male', '2000-03-17', 'philippines', 'Roman Catholic', 'Single', 'Offical', '2022-03-30 12:02:54'),
(10, '22010010', 'asdas', 'asdasd', 'asdsad', 'asdas@gmail.com', '09283767826', 'asdsa asdasd asdasd 1231', 'BSTM', '1st Year', '1101', '2020-2021', 'Male', '2022-03-02', 'philippines', 'Rastafarianism', 'Married', 'Transferee', '2022-03-31 02:50:45'),
(0, '18013888', 'Reiniel', 'Andres', 'Pardines', 'Kneeljamwidme@gmail.com', '09107844633', '#147 Area 5 Luzon Ave. Quezon City', 'BSIT', '4th Year', '4212', '2018-2022', 'Male', '0000-00-00', '', '', '', '', 'current_timestamp()'),
(18, '18013888', 'Reiniel', 'Andres', 'Pardines', 'Kneeljamwidme@gmail.com', '09107844633', '#147 Area 5 Luzon Ave. Quezon City', 'BSIT', '4th Year', '4212', '2018-2022', 'Male', '2022-02-18', 'Filipino', 'INC', 'Single', 'Active', 'current_timestamp()');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_information`
--

CREATE TABLE `teacher_information` (
  `id` int(11) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_information`
--

INSERT INTO `teacher_information` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `course`, `gender`, `birthday`, `nationality`, `religion`, `civil_status`, `account_status`, `date`) VALUES
(1, 'T22000001', 'Teacher', 'Teacher', 'Teacher', 'Teacher@gmail.com', '09239817238', 'TeacherTeacher', 'BSHM', 'Male', '2022-03-31', 'mozambican', 'Baha\\\'i', 'Single', 'Active', '2022-04-07 16:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_key` varchar(50) NOT NULL,
  `last_access` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_number`, `password`, `login_key`, `last_access`) VALUES
(1, 'U22000001', '$2y$12$t0Yi3z6kcE5tispTKbkvlOVVBUQVj9H733Zlr7ds1yovkr4V9r6fa', 'ewF656rS22j49m8zML5w9EQtcs6fsumX5Iq', '2022-04-18 11:55:01'),
(2, 'U22000002', '$2y$12$kg.ViBwY1tJPjE8HUWEsKeoKTtOfLOHwwtewqzuhzAkkyFw91hydO', 'O59BbkBAbD4s834lULSqRXZLDOwCDfrHiAR', '2022-05-04 13:28:09'),
(3, 'U22000003', '$2y$12$bMKqT4XhuVAnTj34r8UKGuDGXVwTQ86484E1XOo2vSrnch/WPHFgm', 'DWHx8x7pALTQDcVIbUanQtUmIQpqw8aTDEj', '2022-04-18 10:31:59'),
(4, 'U22000004', '$2y$12$1QOWygYX1TZFIc55AawM5.Wk3hfvYf3yLrH68CkXjbLR8iz1VxqfC', 'X6MgMnH3lh8zzCloUa6FJWPy3x3kbzkgLjF', '2022-05-05 14:39:25'),
(10, 'U22000005', '$2y$12$aRerCwv2zjANbOZ15RGby.MMIBnxN2Qtlp0oSyv03waQsxA9vypoq', 'kGfv5pfnAhG7GogiN9wjzw4lmQ4PnMCCTB0', '2022-04-23 10:42:34'),
(13, 'U22000006', '$2y$12$qZckoHg5HkSw3efLZAZl7.JM.Rj9w0XOmYgGBVHGup6KPgSda3FpC', 'xxStn0EI9JfWVdBRXk6hBuEdpPYCpdvDHpg', '2022-04-08 07:18:47'),
(30, 'U22000007', '$2y$12$utzyv5yF.uw4.6PUjg2nf.lofJVsWFUcidvGrobcJS2vyss9oYhq6', 'GxfXILcBj7AMaeXKkFdMmzl2k4yXq3nbvrt', '2022-04-04 10:58:15'),
(31, 'U22000008', '$2y$12$iMXBUJXZdVqY33P4iUxLQOFxhRmnnudkyoLV7jfhzFVAiJ/dWWag6', 'P9j5nsLeYqOSOtE3SDHhkrnGCzUDed5vbWH', '2022-04-04 10:59:47'),
(32, 'U22000009', '$2y$12$4xoFNO4kIr9Nq98LtGDtt.pZx9Pn1.aBaMzQ6JVW65EAe/dLX/lIO', 'WZPmahyHwyyTwmnXWOutw12agkY3ZQpzqSy', '2022-04-04 11:01:06'),
(34, 'U22000010', '$2y$12$6auhOPsq61ZVod21bQz0wuBvzIhLP4GyAOioaA3CFpXsxdgO/rJZW', 'FWnR8MU1AafloLc47NrMYIujWO1zLBvJNSz', '2022-04-04 11:17:52'),
(51, 'T22000001', '$2y$12$CF/DAJdJ5SrbJ3exUF0lw.xTbcKFm9omD5jG5Ur46DV5G/jCgY436', 'Mi3KTM3VpbEr6H9W5bKuXPaNFzZLyBmPLWl', '2022-05-04 04:11:46'),
(107, '22010001', '$2y$12$blte8K.DLmm2w.h1XkGid.sPHAfL6BAYYQ1./UrdLgY896MTNQ1qO', 'IzUK1BnYj4xFDEBkSKt5ue9k8PPO0yMNjgf', '2022-05-04 05:28:14'),
(109, '22010002', '$2y$12$uHHxdnj3TfnQMe5UB2VTXug6xJUoKe8cQU5qRrRoNb2lI0L5hdrAi', 'cECQxNmuhhdFbaSHS1WuBNKRyTwihOrjlSn', '2022-05-04 04:56:16'),
(110, '22010003', '$2y$12$Zb0rnOsBZGWcLY0Io91zQeAkoMAbcxfU97d/Vy9i30kWgTR0KuZZu', 'PwU7c5InLISGgvt6SwUMRUxhVGeXdZ3oBJR', '2022-04-13 04:46:09'),
(111, 'U22000011', '$2y$12$agq6hHxm/8HLZ7QwLj7uy.NfCLTJjl0P6xkYldxO6U2Urv5mA8.AW', 'bxVePJuTnxHq5DwhcOz5B0d9rgiOKjIyPG0', '2022-04-13 06:13:28'),
(112, 'U22000012', '$2y$12$lbsqC26mcCyqEkbCyZ6VROEbuJoEufWF5nZpv/3m9ypypB9s3w1W.', 'KCUy8zK2CK7l1JOMWCAO5DByqcbEwHFETMm', '2022-04-13 06:13:55'),
(113, '22010005', '$2y$12$/7UckZprpqwYEFpwWEnrmeRVRe.oaDVVjZyxvytlEQGOBdflr/YHe', 'a6BqHex64PpEg4VyG8PpUi8BTFkGBk16jYQ', '2022-04-13 09:32:41'),
(114, 'U22000013', '$2y$12$dhr1hGKXetEPfYdFXiBVBOwxRRnRtyKUFmeYqy6EbGz8P1.KaoDdm', 'JmbLjaFaZjAZthx3pq44KBCe36J65JsFu5o', '2022-04-13 11:59:12'),
(115, 'U22000014', '$2y$12$OhpWTRi4vndxLcxJAGLeUOYzJFlnENiummRNBYdx/zhimkWP7jDK6', 'RiqeXJkAiKkHseSLirKBbISpVJOraHILZ8c', '2022-05-04 05:30:08'),
(116, 'U22000015', '$2y$12$VMyrCQkOhkpAbUT6TGn.fOwuQwmSYdPufgpliS/FWYfYJJJUfi3Vm', 'pORoqMrWp18kS03BOlCVLOJkcbOnHNXzpXv', '2022-04-22 11:04:02'),
(117, 'U22000016', '$2y$12$XFzK.LcPjf1ebRHsnvF6AuqRBENKfjMxZOcOj9dMwSAaZ99IFtg8q', 'm2XNw7RcoXDtI330gfXmlq7zhHUKBnKsusO', '2022-04-22 11:04:21'),
(118, 'U22000017', '$2y$12$9.vXcT5aGueUqJSX.1CuSufWpZwtjZsbTLZS5ermULjzK4dnqknOy', '7uKNB5Uu2AO3lNWfgVaV0JBccqK6ApnEo7o', '2022-05-06 06:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `office` varchar(50) NOT NULL,
  `department` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `admin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `office`, `department`, `role`, `account_status`, `about`, `user_img`, `admin`) VALUES
(1, 'U22000001', 'User', 'Management', NULL, 'UM@gmail.com', '09202345672', 'NONE', 'Administrator', 'User Management', 'User Management Administrator', 'Active', 'NONE', '', '1'),
(2, 'U22000002', 'Marvin', 'Marilao', 'Luna', 'marvinmarilao92@gmail.com', '9202966614', 'Ph. 2 Pkg. 2 Black 30 Lot 14 Bagong Silang Caloocan City', 'Registrar Department', 'DATMS', 'Registrar Administrator', 'Active', 'napaka pogi ko', '', ''),
(3, 'U22000003', 'Admission', 'Department', 'A', 'Admission@gmail.com', '9756238657', 'none', 'Admission', 'DATMS', 'Admission', 'Active', 'NONE', '', ''),
(4, 'U22000004', 'Cashier', 'department', '', 'Cashier@gmail.com', '9236263521', 'NONE', 'Cashier', 'DATMS', 'Cashier', 'Active', 'NONE', '', ''),
(5, 'U22000005', 'Super', 'Admin', '', 'superadmin@gmail.com', '9202966625', 'NONE', 'Administrator', 'SuperUser', 'SuperAdmin', 'Active', 'NONE', '', ''),
(6, 'U22000006', 'Approver', 'Account', '', 'approver@gmail.com', '9283672753', 'NONE', 'Registrar Department', 'DATMS', 'DATMS Approver', 'Active', 'NONE', '', ''),
(7, 'U22000007', 'TEST', 'TEST', 'T', 'TEST@gmailc.com', '9293872897', 'TEST', 'Cashier', 'DATMS', 'Cashier', 'Active', 'TEST', '', ''),
(8, 'U22000008', 'haha', 'Haha', 'H', 'Haha@gmail.com', '8929836218', 'Haha', 'Cashier', 'OJT System', 'OJT Administrator', 'Active', 'asdad', '', ''),
(9, 'U22000009', 'asdasd', 'asdasd', 'a', 'asdasd@gmail.com', '9872837613', 'sdasdasd', 'CASE', 'User Management', 'User Management Administrator', 'Active', 'asdsad', '', ''),
(10, 'U22000010', 'asd', 'asd', 'a', 'Asd@gmail.com', '9239871287', 'asdsad', 'BSIT', 'User Management', 'User Management Administrator', 'Active', 'asdsad', '', ''),
(11, 'U22000011', 'Khristian', 'Hosena', '', 'khristian@gmail.com', '9823826837', 'Metro Manila', 'Clearance Department', 'Clearance System', 'Clearance Administrator', 'Active', 'NONE', '', ''),
(12, 'U22000012', 'Registrar', 'Coor', '', 'Coor@gmail.com', '9273286387', 'Bagong Silang Caloocan City', 'Registrar Department', 'Clearance System', 'Registrar Coordinator', 'Active', 'NONE', '', ''),
(13, 'U22000013', 'User', 'User', '', 'User@gmail.com', '9237823861', 'UserUserUser', 'Clearance Department', 'Clearance System', 'Guidance Coordinator', 'Active', 'asdsad', '', ''),
(14, 'U22000014', 'Reiniel', 'Andres', 'Pardines', 'nyatnyatandy@gmail.com', '9107844633', '#146 Area 5 Luzon ave. quezon city', 'Admission', 'Health Check Monitoring', 'Health Check Monitoring Administrator', 'Active', 'Yeahboi.', '71927-rich.jpg', ''),
(15, 'U22000015', 'Jamaine', 'Cayan', 'Plateros', 'Jcayan27@gmail.com', '9107844633', '#146 Palayan Dulo Brgy. Culiat Quezon City', 'Admission', 'Health Check Monitoring', 'Health Check Monitoring Administrator', 'Active', 'I love you andres', '', ''),
(16, 'U22000016', 'Clinic', 'Assistant', '', 'Jcayan27@gmail.com', '9107844633', '#146 Palayan Dulo Brgy. Culiat Quezon City', 'Admission', 'Health Check Monitoring', 'Health Check Monitoring Assistant', 'Active', 'Bakit ganon yung Department', '34018-attachment-machine-gun-kelly-2022.jpg', ''),
(17, 'U22000017', 'Richville', 'Villasfer', '', 'richvillevillasfer@gmail.com', 'sadasdasdasd12', 'dasdasdasd', 'Admission', 'Medical System', 'Medical System Administrator', 'Active', 'asdasdas..', '1651814105.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_audit_trail`
--
ALTER TABLE `clearance_audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_department_students`
--
ALTER TABLE `clearance_department_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_department_teachers`
--
ALTER TABLE `clearance_department_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_requirements_students`
--
ALTER TABLE `clearance_requirements_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_student_appointment`
--
ALTER TABLE `clearance_student_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_student_appointment_limit`
--
ALTER TABLE `clearance_student_appointment_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_student_status`
--
ALTER TABLE `clearance_student_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic_program`
--
ALTER TABLE `clinic_program`
  ADD PRIMARY KEY (`prog_id`),
  ADD UNIQUE KEY `progname` (`program`);

--
-- Indexes for table `datms_dept`
--
ALTER TABLE `datms_dept`
  ADD PRIMARY KEY (`off_id`);

--
-- Indexes for table `datms_doctype`
--
ALTER TABLE `datms_doctype`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `datms_documents`
--
ALTER TABLE `datms_documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `datms_notification`
--
ALTER TABLE `datms_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datms_program`
--
ALTER TABLE `datms_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datms_req`
--
ALTER TABLE `datms_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datms_studreq`
--
ALTER TABLE `datms_studreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datms_tempreq`
--
ALTER TABLE `datms_tempreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datms_tracking`
--
ALTER TABLE `datms_tracking`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `hcms_audit_trail`
--
ALTER TABLE `hcms_audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hcms_faculty_records`
--
ALTER TABLE `hcms_faculty_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stud_id` (`stud_id`);

--
-- Indexes for table `hcms_health_services`
--
ALTER TABLE `hcms_health_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hcms_incidents_logs`
--
ALTER TABLE `hcms_incidents_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hcms_items`
--
ALTER TABLE `hcms_items`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `hcms_request`
--
ALTER TABLE `hcms_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hdms_tickets`
--
ALTER TABLE `hdms_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_cashier`
--
ALTER TABLE `ms_cashier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_labtest`
--
ALTER TABLE `ms_labtest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `ms_program_logs`
--
ALTER TABLE `ms_program_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prog_id` (`prog_id`);

--
-- Indexes for table `ms_schedule`
--
ALTER TABLE `ms_schedule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course` (`course`);

--
-- Indexes for table `ms_valid`
--
ALTER TABLE `ms_valid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `student_application`
--
ALTER TABLE `student_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_information`
--
ALTER TABLE `teacher_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clearance_audit_trail`
--
ALTER TABLE `clearance_audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clearance_department_students`
--
ALTER TABLE `clearance_department_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clearance_department_teachers`
--
ALTER TABLE `clearance_department_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clearance_requirements_students`
--
ALTER TABLE `clearance_requirements_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clearance_student_appointment`
--
ALTER TABLE `clearance_student_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clearance_student_appointment_limit`
--
ALTER TABLE `clearance_student_appointment_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clearance_student_status`
--
ALTER TABLE `clearance_student_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `clinic_program`
--
ALTER TABLE `clinic_program`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `datms_dept`
--
ALTER TABLE `datms_dept`
  MODIFY `off_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `datms_doctype`
--
ALTER TABLE `datms_doctype`
  MODIFY `dt_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `datms_documents`
--
ALTER TABLE `datms_documents`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datms_notification`
--
ALTER TABLE `datms_notification`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `datms_program`
--
ALTER TABLE `datms_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `datms_req`
--
ALTER TABLE `datms_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `datms_studreq`
--
ALTER TABLE `datms_studreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `datms_tempreq`
--
ALTER TABLE `datms_tempreq`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datms_tracking`
--
ALTER TABLE `datms_tracking`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hcms_audit_trail`
--
ALTER TABLE `hcms_audit_trail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hcms_faculty_records`
--
ALTER TABLE `hcms_faculty_records`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hcms_health_services`
--
ALTER TABLE `hcms_health_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hcms_incidents_logs`
--
ALTER TABLE `hcms_incidents_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hcms_items`
--
ALTER TABLE `hcms_items`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hcms_request`
--
ALTER TABLE `hcms_request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hdms_tickets`
--
ALTER TABLE `hdms_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `ms_cashier`
--
ALTER TABLE `ms_cashier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ms_labtest`
--
ALTER TABLE `ms_labtest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ms_program_logs`
--
ALTER TABLE `ms_program_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ms_schedule`
--
ALTER TABLE `ms_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `ms_valid`
--
ALTER TABLE `ms_valid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student_application`
--
ALTER TABLE `student_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_information`
--
ALTER TABLE `teacher_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ms_program_logs`
--
ALTER TABLE `ms_program_logs`
  ADD CONSTRAINT `ms_program_logs_ibfk_1` FOREIGN KEY (`prog_id`) REFERENCES `clinic_program` (`prog_id`) ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
