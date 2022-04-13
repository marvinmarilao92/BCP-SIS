-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 01:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u692894633_sis6a`
--

-- --------------------------------------------------------

--
-- Table structure for table `agun`
--

CREATE TABLE `agun` (
  `id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agun`
--

INSERT INTO `agun` (`id`, `id_number`, `firstname`, `lastname`) VALUES
(1, 22000001, 'Olivert', 'Jamito');

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
(1, 106, 'Add new clearance requirement named: \'Form 137\'', '2022-03-15 18:03:33', 'Registrar Coordinator'),
(2, 106, 'Add new clearance requirement named: \'Birth Certificate\'', '2022-03-24 14:01:23', 'Registrar Coordinator'),
(3, 106, 'Add new clearance requirement named: \'2x2 Picture\'', '2022-04-01 12:33:39', 'Registrar Coordinator'),
(4, 105, 'Add new clearance requirement named: \'Miscellaneous Fee Balance\'', '2022-04-01 12:46:03', 'Cashier Coordinator'),
(5, 106, 'Add new clearance requirement named: \'Registrar\\\'s Clearance\'', '2022-04-05 15:56:47', 'Registrar Coordinator'),
(6, 106, 'Add new clearance requirement named: \'Registrar Clearance\'', '2022-04-05 15:57:41', 'Registrar Coordinator');

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
(1, 'Department Head'),
(6, 'Cashier Coordinator'),
(7, 'Registrar Coordinator'),
(8, 'VP for Academic affairs');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_department_teachers`
--

CREATE TABLE `clearance_department_teachers` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance_department_teachers`
--

INSERT INTO `clearance_department_teachers` (`id`, `department_name`) VALUES
(2, 'Laboratory Coordinator'),
(4, 'Cashier Coordinator');

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
(1, 'Registrar Coordinator', 'Form 137', 'File Submission Hard Copy (Original Copy must be submitted)', 'Active'),
(2, 'Registrar Coordinator', 'Birth Certificate', 'File Submission Hard Copy (Original Copy must be submitted)File Submission ', 'Active'),
(3, 'Registrar Coordinator', '2x2 Picture', 'File Submission Soft Copy (Can be submitted online) or Hard Copy (Optional to submit the original copy)', 'Active'),
(4, 'Cashier Coordinator', 'Miscellaneous Fee Balance', 'Account Balance (Pending Payment)', 'Active'),
(6, 'Registrar Coordinator', 'Registrar Clearance', 'Clearance Record (Pending Record)', 'Active');

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
(1, 1, 'Office', 18012300, 'Completed', 7, '2022-04-04 12:21:28', '', NULL),
(4, 3, 'Database', 18012300, 'Completed', 7, '2022-04-04 23:44:12', '624ad1be8de586.06597352.jpg', NULL),
(5, 2, 'Office', 18012300, 'Completed', 7, '2022-04-04 23:45:21', NULL, NULL),
(6, 1, 'Office', 123456789, 'Completed', 7, '2022-04-04 23:48:59', NULL, NULL),
(11, 2, 'Office', 123456789, 'Completed', 7, '2022-04-05 01:29:46', NULL, NULL),
(12, 3, 'Office', 123456789, 'Completed', 7, '2022-04-05 01:33:30', NULL, NULL),
(15, 6, 'Office', 18010827, 'Completed', 7, '2022-04-06 19:38:34', NULL, ''),
(19, 3, 'Database', 18010827, 'Completed', 7, '2022-04-05 21:05:34', '624c3b2cd6f499.25705072.png', NULL),
(27, 6, 'Office', 123456789, 'Completed', 7, '2022-04-06 19:44:36', NULL, '');

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
(8, 4, 'Library Coordinator'),
(9, 4, 'Cashier Coordinator'),
(10, 4, 'Registrar Coordinator'),
(11, 4, 'Guidance Coordinator'),
(12, 4, 'Department Head'),
(13, 5, 'Guidance and Counselling Administrator'),
(14, 6, 'DATMS Administrator'),
(15, 7, 'Student Service Administrator'),
(16, 8, 'Health Check Monitoring Administrator'),
(17, 9, 'LMS Moodle Administrator'),
(18, 10, 'Medical System Administrator'),
(19, 11, 'Scholarship Administrator'),
(20, 12, 'User Management Administrator'),
(21, 4, 'MIS Coordinator'),
(22, 4, 'Clinic Coordinator'),
(23, 4, 'Safety and Security Coordinator'),
(24, 4, 'HR Coordinator'),
(25, 4, 'VP for Academic affairs'),
(26, 4, 'VP for Administration');

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
  `account_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `course`, `year_level`, `section`, `school_year`, `gender`, `birthday`, `nationality`, `religion`, `civil_status`, `account_status`) VALUES
(12, '18012301', 'John Luis', 'Jamito', 'San Buenaventura', 'luis@gmail.com', '123456', 'Camarin Caloocan City', 'BS Criminology', '1st Year', '1101', '2021-2022', 'Male', '2010-11-07', 'filipino', 'Christianity', 'Single', 'Active'),
(13, '18012300', 'Olivert', 'Jamito', 'San Buenaventura', 'olivertjr17@gmail.com', '9278792464', 'Camarin Caloocan City', 'BS Information Technology', '4th Year', '4107', '2021-2022', 'Male', '2000-03-17', 'filipino', 'Christianity', 'Single', 'Active'),
(14, '18012894', 'Jerald', 'Docil', 'L', 'jrlddcl03@gmail.com', '9103949077', 'Ph8B Pck4 BLk4 Lot9 Bagong Silang Caloocan City', 'BS Information Technology', '4th Year', '4104', '2020-2021', 'Male', '1999-11-03', 'filipino', 'Christianity', 'Single', 'Active'),
(15, '123456789', 'Marvin', 'Marilao', '', 'marvin@marilao', '2135646546', 'Metro Manila', 'BS Information Technology', '4th Year', '4108', '2021-2022', 'Male', '2021-11-29', 'filipino', 'Christianity', 'Single', 'Active'),
(16, '18010827', 'Kira', 'Magallanes', '', 'kira@magallanes', '123123', 'Metro Manila', 'BS Psychology', '4th Year', '4107', '2021-2022', 'Male', '2000-03-12', 'filipino', 'Islam', 'Widowed', 'Active'),
(17, '18012302', 'Aaron', 'Delacruz', '', 'aaron@gmail.com', '123123', 'Caloocan City', 'BS Information Technology', '1st Year', '1103', '2021-2022', 'Male', '2022-01-04', 'filipino', 'Christianity', 'Single', 'Active'),
(18, '18013200', 'Analyn', 'Jamito', '', 'ana@gmail.com', '123123', 'Robes 1, Area A, Camarin Caloocan City', 'BS Business Administration Major in Marketing', '1st Year', '1103', '2021-2022', 'Female', '2003-02-26', 'filipino', 'Christianity', 'Single', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_information`
--

CREATE TABLE `teacher_information` (
  `id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
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
  `account_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_information`
--

INSERT INTO `teacher_information` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `course`, `gender`, `birthday`, `nationality`, `religion`, `civil_status`, `account_status`) VALUES
(1, 789789, 'Jorge', 'Lucero', '', 'jorge@lucero.com', '123123', 'Metro Manila', 'BS Information Technology', 'Male', '2022-01-01', 'filipino', 'Christianity', 'Single', 'Active'),
(2, 987987, 'Andy', 'Adovas', '', 'andy@adovas.com', '123123', 'Metro Manila', 'BS Information Technology', 'Male', '2021-12-31', 'filipino', 'Christianity', 'Married', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_access` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_number`, `password`, `last_access`) VALUES
(2, '18012301', '#ChangeMe01!', '2021-11-24 15:13:03'),
(3, '18012300', '#ChangeMe01!', '2021-11-25 11:41:38'),
(4, '123456', '#ChangeMe01!', '2021-11-26 13:40:33'),
(5, '321456', '#ChangeMe01!', '2021-11-28 17:04:10'),
(6, '18012894', '#ChangeMe01!', '2021-11-29 07:57:41'),
(7, '18012564', '#ChangeMe01!', '2021-11-29 08:04:58'),
(8, '123456789', '#ChangeMe01!', '2021-11-29 11:37:12'),
(9, '321654987', '#ChangeMe01!', '2021-11-29 11:40:42'),
(10, '18010827', '#ChangeMe01!', '2021-12-04 17:38:08'),
(11, '18010828', '#ChangeMe01!', '2021-12-04 17:46:49'),
(12, '789789', '#ChangeMe01!', '2022-01-02 12:59:17'),
(13, '987987', '#ChangeMe01!', '2022-01-02 13:00:40'),
(14, '18012302', '#ChangeMe01!', '2022-01-04 12:22:06'),
(15, '102', '#ChangeMe01!', '2022-01-04 13:46:04'),
(16, '103', '#ChangeMe01!', '2022-01-04 13:57:35'),
(17, '104', '#ChangeMe01!', '2022-01-04 13:58:33'),
(18, '105', '#ChangeMe01!', '2022-01-04 14:00:09'),
(19, '106', '#ChangeMe01!', '2022-01-04 14:01:10'),
(20, '107', '#ChangeMe01!', '2022-01-04 14:01:52'),
(21, '108', '#ChangeMe01!', '2022-01-04 14:02:45'),
(22, '109', '#ChangeMe01!', '2022-01-04 14:03:18'),
(23, '110', '#ChangeMe01!', '2022-01-04 14:03:49'),
(24, '111', '#ChangeMe01!', '2022-01-04 14:04:36'),
(25, '112', '#ChangeMe01!', '2022-01-04 14:05:26'),
(29, '113', '#ChangeMe01!', '2022-01-04 16:49:34'),
(30, '114', '#ChangeMe01!', '2022-01-04 16:50:35'),
(31, '18013200', '#ChangeMe01!', '2022-01-05 18:15:02');

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
  `department` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `department`, `role`, `account_status`) VALUES
(1, '123456', 'John', 'Doe', 'bugnoy', 'John@doe', '123456', 'Metro Manila', 'Clearance System', 'Clearance Administrator', 'Active'),
(2, '321456', 'bcp', 'admin', '', 'bcp@admin.com', '123123', 'Metro Manila', 'User Management', 'User Management Administrator', 'Active'),
(3, '18012564', 'James', 'Gutay', '', 'jamesalbertgutay23@gmail.com', '9460206627', '19 Genoveva St. Gulod Novaliches Quezon City', 'Clearance System', 'Clearance Administrator', 'Active'),
(4, '321654987', 'Khristian', 'Hoseña', '', 'khristian@gmail.com', '1231231', 'Metro Manila', 'DATMS', 'DATMS Administrator', 'Active'),
(5, '18010828', 'olinad', 'ohcac', 'raul', 'olinad@gmail.com', '123123123', 'Metro Manila', 'User Management', 'User Management Administrator', 'Active'),
(6, '102', 'Laboratory', 'Coordinator', '', 'laboratory@gmail.com', '123123', 'Metro Manila', 'Clearance System', 'Laboratory Coordinator', 'Active'),
(7, '103', 'Book', 'Coordinator', '', 'book@gmail.com', '123123', 'Metro Manila', 'Clearance System', 'Book Coordinator', 'Active'),
(8, '104', 'Library', 'Coordinator', '', 'library@gmail.com', '123123', 'Metro Manila', 'Clearance System', 'Library Coordinator', 'Active'),
(9, '105', 'Cashier', 'Coordinator', '', 'cashier@gmail.com', '123123', 'Metro Manila', 'Clearance System', 'Cashier Coordinator', 'Active'),
(10, '106', 'Registrar', 'Coordinator', '', 'registrar@gmail.com', '123123', 'Metro Manila', 'Clearance System', 'Registrar Coordinator', 'Active'),
(11, '107', 'Guidance', 'Coordinator', '', 'guidance@gmail.com', '123123', 'Metro Manila', 'Clearance System', 'Guidance Coordinator', 'Active'),
(12, '108', 'Department', 'Head', '', 'department@gmail.com', '123123', 'Metro Manila', 'Clearance System', 'Department Head', 'Active'),
(13, '109', 'MIS', 'Coordinator', '', 'mis@gnail.com', '123123', 'Metro Manila', 'Clearance System', 'MIS Coordinator', 'Active'),
(14, '110', 'Clinic', 'Coordinator', '', 'clinic@gmail.com', '123123', 'Metro Manila', 'Clearance System', 'Clinic Coordinator', 'Active'),
(15, '111', 'Safety', 'Security', '', 'safety@gmail.com', '123123', 'Metro Manila', 'Clearance System', 'Safety and Security Coordinator', 'Active'),
(16, '112', 'HR', 'Coordinator', '', 'hr@gmail.com', '123123', 'Metro Manila', 'Clearance System', 'HR Coordinator', 'Active'),
(20, '113', 'vp', 'academic', '', 'vp@academic.com', '123123', 'Metro Manila', 'Clearance System', 'VP for Academic affairs', 'Active'),
(21, '114', 'vp', 'Administration', '', 'vp@administration.com', '123123', 'Metro Manila', 'Clearance System', 'VP for Administration', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agun`
--
ALTER TABLE `agun`
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
-- Indexes for table `clearance_student_status`
--
ALTER TABLE `clearance_student_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department` (`department`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

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
-- AUTO_INCREMENT for table `agun`
--
ALTER TABLE `agun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clearance_audit_trail`
--
ALTER TABLE `clearance_audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clearance_department_students`
--
ALTER TABLE `clearance_department_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clearance_department_teachers`
--
ALTER TABLE `clearance_department_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clearance_requirements_students`
--
ALTER TABLE `clearance_requirements_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clearance_student_status`
--
ALTER TABLE `clearance_student_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teacher_information`
--
ALTER TABLE `teacher_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
