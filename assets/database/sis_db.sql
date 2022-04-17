-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 01:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
(1, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', '2022-04-15 03:09:22 PM'),
(2, 2, 'U22000002', 'account has been logged in', 'Registrar Administrator', '::1', 'Unknown', '2022-04-15 03:09:59 PM'),
(3, 0, 'U22000002', 'account has been logged out', 'Marvin Marilao', '::1', 'Unknown', '2022-04-15 03:31:26 PM'),
(4, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', '2022-04-15 03:34:31 PM'),
(5, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', '2022-04-15 03:34:53 PM'),
(6, 2, 'U22000002', 'account has been logged in', 'Registrar Administrator', '::1', 'Unknown', '2022-04-15 03:35:12 PM'),
(7, 0, 'U22000002', 'account has been logged out', 'Marvin Marilao', '::1', 'Unknown', '2022-04-15 03:36:37 PM'),
(8, 1, '22010001', 'account has been logged in', '', '::1', 'Unknown', '2022-04-15 03:36:48 PM'),
(9, 22010001, '22010001', 'account has been logged out', 'John Marvin Marilao', '::1', 'Unknown', '2022-04-15 03:42:19 PM'),
(10, 2, 'U22000002', 'account has been logged in', 'Registrar Administrator', '::1', 'Unknown', '2022-04-15 03:42:28 PM'),
(11, 0, 'U22000002', 'account has been logged out', 'Marvin Marilao', '::1', 'Unknown', '2022-04-15 03:43:12 PM'),
(12, 6, 'U22000006', 'account has been logged in', 'DATMS Approver', '::1', 'Unknown', '2022-04-15 03:43:20 PM'),
(13, 0, 'U22000006', 'account has been logged out', 'Approver Account', '::1', 'Unknown', '2022-04-15 04:03:06 PM'),
(14, 1, '22010001', 'account has been logged in', '', '::1', 'Unknown', '2022-04-15 04:03:15 PM'),
(15, 22010001, '22010001', 'account has been logged out', 'John Marvin Marilao', '::1', 'Unknown', '2022-04-15 04:24:21 PM'),
(16, 1, 'T22000001', 'account has been logged in', 'Teacher Teacher', '::1', 'Unknown', '2022-04-15 04:24:31 PM'),
(17, 0, 'T22000001', 'account has been logged out', 'Teacher Teacher', '::1', 'Unknown', '2022-04-15 04:25:27 PM'),
(18, 1, '22010001', 'account has been logged in', '', '::1', 'Unknown', '2022-04-15 04:34:21 PM'),
(19, 22010001, '22010001', 'account has been logged out', 'John Marvin Marilao', '::1', 'Unknown', '2022-04-15 04:34:27 PM'),
(20, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', '2022-04-15 04:34:37 PM'),
(21, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', '2022-04-15 04:35:44 PM'),
(22, 3, 'U22000003', 'account has been logged in', 'Admission', '::1', 'Unknown', '2022-04-15 04:35:50 PM'),
(23, 0, 'U22000003', 'account has been logged out', 'Admission Department', '::1', 'Unknown', '2022-04-15 04:36:30 PM'),
(24, 4, 'U22000004', 'account has been logged in', 'Cashier', '::1', 'Unknown', '2022-04-15 04:36:40 PM'),
(25, 0, 'U22000004', 'account has been logged out', 'Cashier department', '::1', 'Unknown', '2022-04-15 04:37:32 PM'),
(26, 1, 'U22000001', 'account has been logged in', 'User Management Administrator', '::1', 'Unknown', '2022-04-15 04:37:59 PM'),
(27, 6, 'U22000006', 'account has been logged in', 'DATMS Approver', '::1', 'Unknown', '2022-04-15 04:38:34 PM'),
(28, 0, 'U22000006', 'account has been logged out', 'Approver Account', '::1', 'Unknown', '2022-04-15 04:38:50 PM'),
(29, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', '2022-04-16 10:53:24 AM'),
(30, 1, '22010001', 'account has been logged in', '', '::1', 'Unknown', '2022-04-16 08:42:26 PM'),
(31, 22010001, '22010001', 'account has been logged out', 'John Marvin Marilao', '::1', 'Unknown', '2022-04-16 08:43:13 PM'),
(32, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', '2022-04-17 12:24:59 AM'),
(33, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', '2022-04-17 12:41:38 AM'),
(34, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', '2022-04-17 01:09:11 PM'),
(35, 5, 'U22000005', 'account has been logged in', 'SuperAdmin', '::1', 'Unknown', '2022-04-17 01:12:11 PM'),
(36, 0, 'U22000005', 'account has been logged out', 'Super Admin', '::1', 'Unknown', '2022-04-17 01:22:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
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
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `account_no`, `action`, `actor`, `affected`, `ip`, `host`, `date`) VALUES
(1, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSPsy', '::1', 'Unknown', '2022-04-15 03:13:16 PM'),
(2, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSAIS', '::1', 'Unknown', '2022-04-15 03:13:32 PM'),
(3, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSEntrep', '::1', 'Unknown', '2022-04-15 03:13:45 PM'),
(4, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSTM', '::1', 'Unknown', '2022-04-15 03:14:18 PM'),
(5, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BLIS', '::1', 'Unknown', '2022-04-15 03:14:29 PM'),
(6, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSCE', '::1', 'Unknown', '2022-04-15 03:14:47 PM'),
(7, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BPEeD', '::1', 'Unknown', '2022-04-15 03:14:56 PM'),
(8, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BTLeD', '::1', 'Unknown', '2022-04-15 03:15:20 PM'),
(9, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSEd Major in Values', '::1', 'Unknown', '2022-04-15 03:15:37 PM'),
(10, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSEd Major in Social', '::1', 'Unknown', '2022-04-15 03:16:03 PM'),
(11, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSEd Major in Mathematics', '::1', 'Unknown', '2022-04-15 03:17:02 PM'),
(12, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSEd Major in Filipino', '::1', 'Unknown', '2022-04-15 03:17:37 PM'),
(13, 'U22000002', 'Program has been created', 'Registrar Administrator', 'Bachelor of Secondary Education Major in Filipino', '::1', 'Unknown', '2022-04-15 03:17:49 PM'),
(14, 'U22000002', 'Program has been delete', 'DATMS', 'Bachelor of Secondary Education Major in Filipino', '::1', 'Unknown', '2022-04-15 03:18:34 PM'),
(15, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSEd Major in English', '::1', 'Unknown', '2022-04-15 03:18:49 PM'),
(16, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BEEd', '::1', 'Unknown', '2022-04-15 03:19:03 PM'),
(17, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSCriM', '::1', 'Unknown', '2022-04-15 03:19:21 PM'),
(18, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSBA Major in Marketing', '::1', 'Unknown', '2022-04-15 03:19:34 PM'),
(19, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSBA Major in HRM', '::1', 'Unknown', '2022-04-15 03:19:49 PM'),
(20, 'U22000002', 'Program has been delete', 'DATMS', 'BSBA Major in HRM', '::1', 'Unknown', '2022-04-15 03:19:53 PM'),
(21, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSBA Major in HRM', '::1', 'Unknown', '2022-04-15 03:20:04 PM'),
(22, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSOA', '::1', 'Unknown', '2022-04-15 03:20:20 PM'),
(23, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSHM', '::1', 'Unknown', '2022-04-15 03:20:32 PM'),
(24, 'U22000002', 'Program has been created', 'Registrar Administrator', 'BSIT', '::1', 'Unknown', '2022-04-15 03:20:42 PM'),
(25, 'U22000002', 'document type has been created', 'Registrar Administrator', 'Transferring Form', '::1', 'Unknown', '2022-04-15 03:21:27 PM'),
(26, 'U22000002', 'document type has been created', 'Registrar Administrator', 'Shifting form', '::1', 'Unknown', '2022-04-15 03:21:58 PM'),
(27, 'U22000002', 'document type has been created', 'Registrar Administrator', 'Dropping form', '::1', 'Unknown', '2022-04-15 03:22:28 PM'),
(28, 'U22000002', 'document type has been created', 'Registrar Administrator', 'Submission of Grades', '::1', 'Unknown', '2022-04-15 03:23:39 PM'),
(29, 'U22000002', 'document type has been created', 'Registrar Administrator', 'Schedule', '::1', 'Unknown', '2022-04-15 03:23:59 PM'),
(30, 'U22000002', 'document type has been created', 'Registrar Administrator', 'Certificate of Registration', '::1', 'Unknown', '2022-04-15 03:24:08 PM'),
(31, 'U22000002', 'document type has been created', 'Registrar Administrator', 'Application for Graduation', '::1', 'Unknown', '2022-04-15 03:24:20 PM'),
(32, 'U22000002', 'department has been created', 'Registrar Administrator', 'Scholarship Department', '::1', 'Unknown', '2022-04-15 03:24:59 PM'),
(33, 'U22000002', 'department has been created', 'Registrar Administrator', 'Medical Department', '::1', 'Unknown', '2022-04-15 03:25:16 PM'),
(34, 'U22000002', 'department has been created', 'Registrar Administrator', 'MOODLE Department', '::1', 'Unknown', '2022-04-15 03:25:33 PM'),
(35, 'U22000002', 'department has been created', 'Registrar Administrator', 'Health Check Monitoring Department', '::1', 'Unknown', '2022-04-15 03:26:03 PM'),
(36, 'U22000002', 'department has been created', 'Registrar Administrator', 'Student Services (Grievances/Discipline) Department', '::1', 'Unknown', '2022-04-15 03:26:21 PM'),
(37, 'U22000002', 'department has been created', 'Registrar Administrator', 'Clearance Department', '::1', 'Unknown', '2022-04-15 03:26:40 PM'),
(38, 'U22000002', 'department has been created', 'Registrar Administrator', 'EDMODO Department', '::1', 'Unknown', '2022-04-15 03:27:01 PM'),
(39, 'U22000002', 'department has been created', 'Registrar Administrator', 'Internship Department', '::1', 'Unknown', '2022-04-15 03:27:17 PM'),
(40, 'U22000002', 'department has been created', 'Registrar Administrator', 'HelpDesk Department', '::1', 'Unknown', '2022-04-15 03:27:38 PM'),
(41, 'U22000002', 'department has been created', 'Registrar Administrator', 'Administrator Department', '::1', 'Unknown', '2022-04-15 03:27:51 PM'),
(42, 'U22000002', 'department has been created', 'Registrar Administrator', 'School Cashier', '::1', 'Unknown', '2022-04-15 03:28:30 PM'),
(43, 'U22000002', 'department has been created', 'Registrar Administrator', 'Admission Department', '::1', 'Unknown', '2022-04-15 03:28:51 PM'),
(44, 'U22000002', 'department has been created', 'Registrar Administrator', 'CCS Department', '::1', 'Unknown', '2022-04-15 03:29:09 PM'),
(45, 'U22000002', 'department has been created', 'Registrar Administrator', 'Registrar Department', '::1', 'Unknown', '2022-04-15 03:29:18 PM'),
(46, 'U22000005', 'Program has been created', 'SuperAdmin', 'TRY', '::1', 'Unknown', '2022-04-16 11:16:59 AM'),
(47, 'U22000005', 'Program has been created', 'SuperAdmin', 'asd', '::1', 'Unknown', '2022-04-16 11:25:44 AM'),
(48, 'U22000005', 'Program has been created', 'SuperAdmin', 'zxczxc', '::1', 'Unknown', '2022-04-16 11:29:40 AM'),
(49, 'U22000005', 'Program has been delete', 'SuperUser', 'zxczxc', '::1', 'Unknown', '2022-04-16 11:30:16 AM'),
(50, 'U22000005', 'Program has been delete', 'SuperUser', 'asd', '::1', 'Unknown', '2022-04-16 11:30:19 AM'),
(51, 'U22000005', 'Program has been delete', 'SuperUser', 'TRY', '::1', 'Unknown', '2022-04-16 11:30:23 AM');

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
(3, 0, 'Add new clearance requirement named: \'Registrar Record\'', '2022-04-13 10:36:42', 'Registrar Coordinator'),
(4, 0, 'Add new clearance requirement named: \'aasdasd\'', '2022-04-14 10:20:20', 'Registrar Coordinator'),
(5, 0, 'Add new clearance requirement named: \'asdasd\'', '2022-04-14 10:20:28', 'Registrar Coordinator'),
(6, 0, 'Add new clearance requirement named: \'asdsad\'', '2022-04-14 10:20:34', 'Registrar Coordinator'),
(7, 0, 'Add new clearance requirement named: \'asdsad\'', '2022-04-14 10:20:45', 'Registrar Coordinator'),
(8, 0, 'Add new clearance requirement named: \'asdsad\'', '2022-04-14 10:20:49', 'Registrar Coordinator'),
(9, 0, 'Add new clearance requirement named: \'asdsad\'', '2022-04-14 10:20:55', 'Registrar Coordinator'),
(10, 0, 'Add new clearance requirement named: \'asdasd\'', '2022-04-14 10:20:59', 'Registrar Coordinator'),
(11, 0, 'Add new clearance requirement named: \'asdasd\'', '2022-04-14 10:21:05', 'Registrar Coordinator'),
(12, 0, 'Add new clearance requirement named: \'Form 137\'', '2022-04-15 04:18:47', 'Registrar Coordinator'),
(13, 0, 'Add new clearance requirement named: \'Certificate of Good Moral\'', '2022-04-15 04:18:57', 'Registrar Coordinator'),
(14, 0, 'Add new clearance requirement named: \'PSA Authenticated Birth Certificate\'', '2022-04-15 04:19:08', 'Registrar Coordinator'),
(15, 0, 'Add new clearance requirement named: \'Barangay Clearance\'', '2022-04-15 04:19:16', 'Registrar Coordinator');

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
(4, 'Registrar Coordinator');

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
(2, 'Registrar Coordinator', 'Passport Size ID Picture (White Background, Formal Attire) - 2pcs', 'File Submission Soft Copy (Can be submitted online) or Hard Copy (Optional to submit the original copy)', 'Active'),
(12, 'Registrar Coordinator', 'Form 137', 'File Submission Hard Copy (Original Copy must be submitted)', 'Active'),
(13, 'Registrar Coordinator', 'Certificate of Good Moral', 'File Submission Hard Copy (Original Copy must be submitted)', 'Active'),
(14, 'Registrar Coordinator', 'PSA Authenticated Birth Certificate', 'File Submission Hard Copy (Original Copy must be submitted)', 'Active'),
(15, 'Registrar Coordinator', 'Barangay Clearance', 'File Submission Hard Copy (Original Copy must be submitted)', 'Active');

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
(15, 22010001, 2, '2022-04-29', 'Registrar Coordinator', '6257cf1048325318403046');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_student_appointment_limit`
--

CREATE TABLE `clearance_student_appointment_limit` (
  `id` int(11) NOT NULL,
  `appointment` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_student_appointment_limit`
--

INSERT INTO `clearance_student_appointment_limit` (`id`, `appointment`, `department_id`, `department`) VALUES
(1, 20, 2, 'Registrar Coordinator');

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
(1, 2, 'Database', 22010001, 'Completed', 4, '2022-04-15 09:38:50', '625920f970d11382323516.pdf', NULL),
(2, 1, 'Office', 22010001, 'Completed', 4, '2022-04-15 09:40:01', NULL, NULL),
(3, 13, 'Office', 22010001, 'Completed', 4, '2022-04-15 09:40:05', NULL, NULL);

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
(1, 'doc202271574306', 'Scholarship Department', 'academic study or achievement; learning of a high level.', '2022-04-15 03:24:59 PM'),
(2, 'doc202297992481', 'Medical Department', 'relating to the science of medicine, or to the treatment of illness and injuries.', '2022-04-15 03:25:16 PM'),
(3, 'doc202241442064', 'MOODLE Department', 'The word Moodle was originally an acronym for Modular Object-Oriented Dynamic Learning Environment, which is mostly useful to programmers and education theorists.', '2022-04-15 03:25:33 PM'),
(4, 'doc202269913371', 'Health Check Monitoring Department', 'Health monitoring can allow near-real-time information about the state of your containers and microservices.', '2022-04-15 03:26:03 PM'),
(5, 'doc202290770180', 'Student Services (Grievances/Discipline) Department', 'Office of Students Affairs ensures that the rights, privileges and responsibilities of students in the university are recognized, respected, and properly fulfilled to promote a healthy academic relations and successful academic journey among students.', '2022-04-15 03:26:21 PM'),
(6, 'doc202290926951', 'Clearance Department', 'the action or process of removing or getting rid of something or of something\\\'s dispersing.', '2022-04-15 03:26:40 PM'),
(7, 'doc202229642974', 'EDMODO Department', 'Edmodo is an educational website that takes the ideas of a social network and refines them and makes it appropriate for a classroom. Using Edmodo, students and teachers can reach out to one another and connect by sharing ideas, problems, and helpful tips.', '2022-04-15 03:27:01 PM'),
(8, 'doc202265423458', 'Internship Department', 'a period of time during which a student works for a company or organization in order to get experience of a particular type of work: The business students often do an internship during their long vacation in e-commerce companies. a paid/summer internship.', '2022-04-15 03:27:17 PM'),
(9, 'doc202299688106', 'HelpDesk Department', 'a service providing information and support to computer users, especially within a company.', '2022-04-15 03:27:38 PM'),
(10, 'doc202233352438', 'Administrator Department', 'Administrator Department', '2022-04-15 03:27:51 PM'),
(11, 'doc202271145501', 'School Cashier', 'Cashier works under the supervision of the any assigned administrators which act as a backbone, operator, and receptionist for a school, bank, and shop etc. They give information’s to callers and also perform their clerical duties.', '2022-04-15 03:28:30 PM'),
(12, 'doc202245571685', 'Admission Department', 'Admissions Office means an office within a community college or State university responsible for recruiting and communicating with new and transfer students.', '2022-04-15 03:28:51 PM'),
(13, 'doc202230788799', 'CCS Department', 'College of Computer Studies', '2022-04-15 03:29:09 PM'),
(14, 'doc202221841571', 'Registrar Department', 'an officer of an educational institution responsible for registering students, keeping academic records, and corresponding with applicants and evaluating their credentials.', '2022-04-15 03:29:18 PM');

-- --------------------------------------------------------

--
-- Table structure for table `datms_doctype`
--

CREATE TABLE `datms_doctype` (
  `dt_id` int(20) NOT NULL,
  `dt_code` varchar(50) NOT NULL,
  `dt_name` varchar(50) NOT NULL,
  `dt_desc` varchar(255) NOT NULL,
  `dt_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_doctype`
--

INSERT INTO `datms_doctype` (`dt_id`, `dt_code`, `dt_name`, `dt_desc`, `dt_date`) VALUES
(1, 'doc202211765408', 'Transferring Form', 'Transferring from another school to BCP', '2022-04-15 03:21:27 PM'),
(2, 'doc202243822028', 'Shifting form', 'Switching programs in college when you’ve already started means another transition phase to prepare for. Deciding to shift for a variety of reasons can be daunting and complicated as picking a program could be. Before getting into the process of selecting', '2022-04-15 03:21:58 PM'),
(3, 'doc202265657623', 'Dropping form', 'Dropping form (With 2 weeks duration)', '2022-04-15 03:22:28 PM'),
(4, 'doc202222882969', 'Submission of Grades', 'Submission of Grades', '2022-04-15 03:23:39 PM'),
(5, 'doc202266016260', 'Schedule', 'Schedule', '2022-04-15 03:23:59 PM'),
(6, 'doc202260846412', 'Certificate of Registration', 'Certificate of Registration', '2022-04-15 03:24:08 PM'),
(7, 'doc202215402755', 'Application for Graduation', 'Application for Graduation', '2022-04-15 03:24:20 PM');

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
(1, 'doc20226601', '22010001', 'Marvin(Shifting Form).pdf', '41136', 1, 'Shifting form', 'Approved', 'Shifting form\r\n', 'Approver Account', 'Registrar Department', '2022-04-15 03:42:59 PM', 'Approver Account', 'Registrar Department', '2022-04-15 03:44:11 PM', 'Super Admin', 'Administrator', '2022-04-15 03:30:38 PM', 'Your shifting form is validated claim your hardcopy to the registrar office'),
(2, 'doc20228862', 'T22000001', 'Memo.pdf', '25063', 0, 'Submission of Grades', 'Created', 'aasdas', 'Super Admin', 'Administrator', '2022-04-16 10:54:24 AM', 'Super Admin', '', '', 'Super Admin', 'Administrator', '2022-04-16 10:54:24 AM', '');

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
(1, 'BSPsy', 'BS Psychology', '2022-04-15 03:13:16 PM'),
(2, 'BSAIS', 'BS Accounting Information System', '2022-04-15 03:13:32 PM'),
(3, 'BSEntrep', 'BS Entrepreneurship', '2022-04-15 03:13:45 PM'),
(4, 'BSTM', 'BS Tourism Management', '2022-04-15 03:14:18 PM'),
(5, 'BLIS', 'Bachelor of Library in Information Science', '2022-04-15 03:14:29 PM'),
(6, 'BSCE', 'BS Computer Engineering', '2022-04-15 03:14:47 PM'),
(7, 'BPEeD', 'Bachelor of Physical Education', '2022-04-15 03:14:56 PM'),
(8, 'BTLeD', 'Bachelor of Technology and Livelihood Education', '2022-04-15 03:15:20 PM'),
(9, 'BSEd Major in Values', 'Bachelor of Secondary Education Major in Values Education', '2022-04-15 03:15:37 PM'),
(10, 'BSEd Major in Social', 'Bachelor of Secondary Education Major in Social Studies', '2022-04-15 03:16:03 PM'),
(11, 'BSEd Major in Mathematics', 'Bachelor of Secondary Education Major in Mathematics', '2022-04-15 03:17:02 PM'),
(12, 'BSEd Major in Filipino', 'Bachelor of Secondary Education Major in Filipino', '2022-04-15 03:17:37 PM'),
(14, 'BSEd Major in English', 'Bachelor of Secondary Education Major in English', '2022-04-15 03:18:49 PM'),
(15, 'BEEd', 'Bachelor of Elementary Education', '2022-04-15 03:19:03 PM'),
(16, 'BSCriM', 'BS Criminology', '2022-04-15 03:19:21 PM'),
(17, 'BSBA Major in Marketing', 'BS Business Administration Major in Marketing', '2022-04-15 03:19:34 PM'),
(19, 'BSBA Major in HRM', 'BS Business Administration Major in Human Resource Management', '2022-04-15 03:20:04 PM'),
(20, 'BSOA', 'BS Office Administration', '2022-04-15 03:20:20 PM'),
(21, 'BSHM', 'BS Hospitality Management', '2022-04-15 03:20:32 PM'),
(22, 'BSIT', 'BS Information Technology', '2022-04-15 03:20:42 PM');

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
(1, 'doc20226601', '22010001', 'Marvin(Shifting Form).pdf', '41136', 'Shifting form', 'Created', 'Shifting form\r\n', 'Super Admin', 'Administrator', '2022-04-15 03:30:38 PM', '', '', '2022-04-15 03:30:38 PM', 'Tracking Document is Created by'),
(2, 'doc20226601', '22010001', 'Marvin(Shifting Form).pdf', '41136', 'Shifting form', 'Outgoing', 'Shifting form\r\n', 'Marvin Marilao', 'Registrar Department', '2022-04-15 03:42:09 PM', 'Super Admin', 'Administrator', '2022-04-15 03:30:38 PM', 'Document is submitted to'),
(3, 'doc20226601                    ', '22010001', 'Marvin(Shifting Form).pdf', '41136', 'Shifting form', 'Received', 'Shifting form\r\n', 'Marvin Marilao', 'Registrar Department', '2022-04-15 03:42:36 PM', 'Marvin Marilao', 'Registrar Department', '2022-04-15 03:42:09 PM', 'Document is Recieved by'),
(4, 'doc20226601', '22010001', 'Marvin(Shifting Form).pdf', '41136', 'Shifting form', 'Outgoing', 'Shifting form\r\n', 'Approver Account', 'Registrar Department', '2022-04-15 03:42:59 PM', 'Marvin Marilao', 'Registrar Department', '2022-04-15 03:42:09 PM', 'Document is submitted to'),
(5, 'doc20226601                    ', '22010001', 'Marvin(Shifting Form).pdf', '41136', 'Shifting form', 'Received', 'Shifting form\r\n', 'Approver Account', 'Registrar Department', '2022-04-15 03:43:25 PM', 'Approver Account', 'Registrar Department', '2022-04-15 03:42:59 PM', 'Document is Recieved by'),
(6, 'doc20226601', '22010001', 'Marvin(Shifting Form).pdf', '41136', 'Shifting form', 'Approved', 'Shifting form\r\n', 'Approver Account', 'Registrar Department', '2022-04-15 03:44:11 PM', 'Approver Account', 'Registrar Department', '2022-04-15 03:42:59 PM', 'Document is Approved by'),
(7, 'doc20228862', 'T22000001', 'Memo.pdf', '25063', 'Submission of Grades', 'Created', 'aasdas', 'Super Admin', 'Administrator', '2022-04-16 10:54:24 AM', '', '', '2022-04-16 10:54:24 AM', 'Tracking Document is Created by');

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
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) NOT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `attempt_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(33, 4, 'Clinic Coordinator');

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
(4, '23855945', 'Olivert', 'Jamito', 'San Buenaventura', 'olivertjr17@gmail.com', '09278792464', 'Robes 1, Area A, Camarin Caloocan City  Caloocan City 1422', 'BSIT', 'Male', '2000-03-17', 'philippines', 'Roman Catholic', 'Single', 'Enrolled', 'Apr-13-2022 05:30:40 PM'),
(5, '35770958', 'john lester', 'villamor', 'versoza', 'lestervillamor025@gmail.com', '09469515599', '#  187 Saint peter street barangay holy spirit quezon city 1127', 'BSIT', 'Male', '2000-07-25', 'philippines', 'Roman Catholic', 'Single', 'Unpaid', 'Apr-14-2022 01:35:16 PM');

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
(1, '22010001', 'John Marvin', 'Marilao', 'Luna', 'marvinmarilao92@gmail.com', '09202966614', 'Ph. 2 Pkg. 2 Blk. 30 Lot 16 Bagong Silang Caloocan City 1428', 'BSIT', '1st Year', '1101', '2020-2021', 'Male', '1999-10-09', 'philippines', 'Roman Catholic', 'Single', 'Official', '2022-04-11 18:18:34'),
(2, '22010002', 'Sofie', 'Luna', '', 'Sofie@gmail.com', '09202938283', 'Ph. 2 pkg. 2 blk 30 lot 16 Bagong Silang Caloocan City 1428', 'BSBA Major in Marketing', '1st Year', '1101', '2021-2022', 'Male', '2000-09-20', 'philippines', 'Roman Catholic', 'Single', 'Official', '2022-04-12 14:40:01'),
(4, '22010003', 'Jienavin', 'Marilao', 'Luna', 'Jienavin@gmail.com', '09723762378', 'Ph. 2 Pkg. 2 Blk. 30 Lot 16 Bagong Silang Caloocan City 1428', 'BSPsy', '1st Year', '1101', '2021-2022', 'Male', '2002-07-11', 'philippines', 'Roman Catholic', 'Single', 'Official', '2022-04-13 12:44:14'),
(5, '22010005', 'Olivert', 'Jamito', 'San Buenaventura', 'olivertjr17@gmail.com', '09278792464', 'Robes 1, Area A, Camarin Caloocan City  Caloocan City 1422', 'BSIT', '4th Year', '4211', '2021-2022', 'Male', '2000-03-17', 'philippines', 'Roman Catholic', 'Single', 'Official', '2022-04-13 17:32:22');

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
(1, 'U22000001', '$2y$12$t0Yi3z6kcE5tispTKbkvlOVVBUQVj9H733Zlr7ds1yovkr4V9r6fa', 'bTOTMlXVp8B86sasFazqlGuHUblWvRDQBpk', '2022-04-15 08:37:59'),
(2, 'U22000002', '$2y$12$kg.ViBwY1tJPjE8HUWEsKeoKTtOfLOHwwtewqzuhzAkkyFw91hydO', 'd42lWB6LMQwdWdl9RzAW2cPqofsjiC6Wsxu', '2022-04-15 07:42:28'),
(3, 'U22000003', '$2y$12$bMKqT4XhuVAnTj34r8UKGuDGXVwTQ86484E1XOo2vSrnch/WPHFgm', 'fUmcYAep8k4IgAUk2XnB5H8X1w5xqMPRkWJ', '2022-04-15 08:35:50'),
(4, 'U22000004', '$2y$12$1QOWygYX1TZFIc55AawM5.Wk3hfvYf3yLrH68CkXjbLR8iz1VxqfC', 'bXtKmjXM84V4weGIugE0dwUQsKbMngaKIqt', '2022-04-15 08:36:40'),
(10, 'U22000005', '$2y$12$aRerCwv2zjANbOZ15RGby.MMIBnxN2Qtlp0oSyv03waQsxA9vypoq', 'Lo9Au17gmxZjFfgY0maoOZcbi6boEDC4d2d', '2022-04-17 05:12:12'),
(13, 'U22000006', '$2y$12$qZckoHg5HkSw3efLZAZl7.JM.Rj9w0XOmYgGBVHGup6KPgSda3FpC', 'Le3R25xAux4ApWvNaEKUHgUnnGHpYuVoA8w', '2022-04-15 08:38:35'),
(30, 'U22000007', '$2y$12$utzyv5yF.uw4.6PUjg2nf.lofJVsWFUcidvGrobcJS2vyss9oYhq6', 'GxfXILcBj7AMaeXKkFdMmzl2k4yXq3nbvrt', '2022-04-04 10:58:15'),
(31, 'U22000008', '$2y$12$iMXBUJXZdVqY33P4iUxLQOFxhRmnnudkyoLV7jfhzFVAiJ/dWWag6', 'P9j5nsLeYqOSOtE3SDHhkrnGCzUDed5vbWH', '2022-04-04 10:59:47'),
(32, 'U22000009', '$2y$12$4xoFNO4kIr9Nq98LtGDtt.pZx9Pn1.aBaMzQ6JVW65EAe/dLX/lIO', 'WZPmahyHwyyTwmnXWOutw12agkY3ZQpzqSy', '2022-04-04 11:01:06'),
(34, 'U22000010', '$2y$12$6auhOPsq61ZVod21bQz0wuBvzIhLP4GyAOioaA3CFpXsxdgO/rJZW', 'FWnR8MU1AafloLc47NrMYIujWO1zLBvJNSz', '2022-04-04 11:17:52'),
(51, 'T22000001', '$2y$12$CF/DAJdJ5SrbJ3exUF0lw.xTbcKFm9omD5jG5Ur46DV5G/jCgY436', 'JkKhOemajtbdvRJqaefRQHkRA7J6bMW2Sku', '2022-04-15 08:24:32'),
(107, '22010001', '$2y$12$blte8K.DLmm2w.h1XkGid.sPHAfL6BAYYQ1./UrdLgY896MTNQ1qO', 'vs6r5VZNMM7DpQ3Hfiw5dHHu1A2YZ6RVLdb', '2022-04-16 12:42:27'),
(109, '22010002', '$2y$12$uHHxdnj3TfnQMe5UB2VTXug6xJUoKe8cQU5qRrRoNb2lI0L5hdrAi', 'fsQHaXI36fXWTmZ5zwy0bjkia7JqRjOIdZC', '2022-04-12 06:40:01'),
(110, '22010003', '$2y$12$Zb0rnOsBZGWcLY0Io91zQeAkoMAbcxfU97d/Vy9i30kWgTR0KuZZu', 'PwU7c5InLISGgvt6SwUMRUxhVGeXdZ3oBJR', '2022-04-13 04:46:09'),
(111, 'U22000011', '$2y$12$agq6hHxm/8HLZ7QwLj7uy.NfCLTJjl0P6xkYldxO6U2Urv5mA8.AW', 'bxVePJuTnxHq5DwhcOz5B0d9rgiOKjIyPG0', '2022-04-13 06:13:28'),
(112, 'U22000012', '$2y$12$lbsqC26mcCyqEkbCyZ6VROEbuJoEufWF5nZpv/3m9ypypB9s3w1W.', 'KCUy8zK2CK7l1JOMWCAO5DByqcbEwHFETMm', '2022-04-13 06:13:55'),
(113, '22010005', '$2y$12$/7UckZprpqwYEFpwWEnrmeRVRe.oaDVVjZyxvytlEQGOBdflr/YHe', 'a6BqHex64PpEg4VyG8PpUi8BTFkGBk16jYQ', '2022-04-13 09:32:41'),
(114, 'U22000013', '$2y$12$dhr1hGKXetEPfYdFXiBVBOwxRRnRtyKUFmeYqy6EbGz8P1.KaoDdm', 'JmbLjaFaZjAZthx3pq44KBCe36J65JsFu5o', '2022-04-13 11:59:12'),
(115, 'U22000014', '$2y$12$FFX.ORW.6VYPoZ58sv1ziOV5jDGTwzCWAkrPeIc5lrVtz.pu11z82', 'qzZypUM4LRLRedHfCdITUwFTSCURgnhw8Ui', '2022-04-13 12:15:51');

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
  `admin` varchar(11) NOT NULL,
  `user_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `office`, `department`, `role`, `account_status`, `about`, `admin`, `user_img`) VALUES
(1, 'U22000001', 'User', 'Management', NULL, 'UM@gmail.com', '09202345672', 'NONE', 'Administrator', 'User Management', 'User Management Administrator', 'Active', 'NONE', '1', NULL),
(2, 'U22000002', 'Marvin', 'Marilao', 'Luna', 'marvinmarilao92@gmail.com', '9202966614', 'Ph. 2 Pkg. 2 Black 30 Lot 14 Bagong Silang Caloocan City', 'Registrar Department', 'DATMS', 'Registrar Administrator', 'Active', 'napaka pogi ko', '', NULL),
(3, 'U22000003', 'Admission', 'Department', 'A', 'Admission@gmail.com', '9756238657', 'none', 'Admission', 'DATMS', 'Admission', 'Active', 'NONE', '', NULL),
(4, 'U22000004', 'Cashier', 'department', '', 'Cashier@gmail.com', '9236263521', 'NONE', 'Cashier', 'DATMS', 'Cashier', 'Active', 'NONE', '', NULL),
(5, 'U22000005', 'Super', 'Admin', '', 'superadmin@gmail.com', '9202966625', 'NONE', 'Administrator', 'SuperUser', 'SuperAdmin', 'Active', 'NONE', '', NULL),
(6, 'U22000006', 'Approver', 'Account', '', 'approver@gmail.com', '9283672753', 'NONE', 'Registrar Department', 'DATMS', 'DATMS Approver', 'Active', 'NONE', '', NULL),
(7, 'U22000007', 'TEST', 'TEST', 'T', 'TEST@gmailc.com', '9293872897', 'TEST', 'Cashier', 'DATMS', 'Cashier', 'Active', 'TEST', '', NULL),
(8, 'U22000008', 'haha', 'Haha', 'H', 'Haha@gmail.com', '8929836218', 'Haha', 'Cashier', 'OJT System', 'OJT Administrator', 'Active', 'asdad', '', NULL),
(9, 'U22000009', 'asdasd', 'asdasd', 'a', 'asdasd@gmail.com', '9872837613', 'sdasdasd', 'CASE', 'User Management', 'User Management Administrator', 'Active', 'asdsad', '', NULL),
(10, 'U22000010', 'asd', 'asd', 'a', 'Asd@gmail.com', '9239871287', 'asdsad', 'BSIT', 'User Management', 'User Management Administrator', 'Active', 'asdsad', '', NULL),
(11, 'U22000011', 'Khristian', 'Hosena', '', 'khristian@gmail.com', '9823826837', 'Metro Manila', 'Clearance Department', 'Clearance System', 'Clearance Administrator', 'Active', 'NONE', '', NULL),
(12, 'U22000012', 'Registrar', 'Coor', '', 'Coor@gmail.com', '9273286387', 'Bagong Silang Caloocan City', 'Registrar Department', 'Clearance System', 'Registrar Coordinator', 'Active', 'NONE', '', NULL),
(13, 'U22000013', 'User', 'User', '', 'User@gmail.com', '9237823861', 'UserUserUser', 'Clearance Department', 'Clearance System', 'Guidance Coordinator', 'Active', 'asdsad', '', NULL),
(14, 'U22000014', 'test', 'Test', 'Test', 'Test@gmail.com', '9823872873', 'TestTest', 'Registrar Department', 'Clearance System', 'Cashier Coordinator', 'Active', 'asdsad', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
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
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`id_number`);

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clearance_audit_trail`
--
ALTER TABLE `clearance_audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clearance_department_students`
--
ALTER TABLE `clearance_department_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clearance_department_teachers`
--
ALTER TABLE `clearance_department_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clearance_requirements_students`
--
ALTER TABLE `clearance_requirements_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clearance_student_appointment`
--
ALTER TABLE `clearance_student_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clearance_student_appointment_limit`
--
ALTER TABLE `clearance_student_appointment_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clearance_student_status`
--
ALTER TABLE `clearance_student_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datms_dept`
--
ALTER TABLE `datms_dept`
  MODIFY `off_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `datms_doctype`
--
ALTER TABLE `datms_doctype`
  MODIFY `dt_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `datms_documents`
--
ALTER TABLE `datms_documents`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datms_program`
--
ALTER TABLE `datms_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT for table `datms_tracking`
--
ALTER TABLE `datms_tracking`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student_application`
--
ALTER TABLE `student_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher_information`
--
ALTER TABLE `teacher_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
