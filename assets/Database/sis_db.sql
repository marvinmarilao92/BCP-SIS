-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 07:08 AM
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
(1, '0001DocType', 'Department Memo', 'Department Memo', 'Jan-02-2022 12:50:01 PM'),
(2, '0002DocType', 'Contract', 'BCP Contract', 'Jan-02-2022 12:51:37 PM'),
(3, '0003DocType', 'HR Memo', 'BCP HR Memo\n', 'Jan-02-2022 12:57:07 PM');

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
(1, 'doc20227622', 'Department Memo', 'HRMemoSample.pdf', '25063', 0, 'HR Memo', 'Deleted', 'Memo For Ms Juvell Alquero', 'Marvin Marilao', 'CCS Office', 'Jan-05-2022 05:17 PM', 'Rogel Quintero', 'VP Office', 'Jan-05-2022 10:21:06 PM', '', '', '', 'Your Document is rejected'),
(2, 'doc20224369', 'Department Memo', 'Sample Legal Memo.pdf', '90480', 0, 'Department Memo', 'Created', 'BCP Memo For Department', 'Juvell Alquero', 'Accounting Office', 'Jan-05-2022 05:18 PM', 'Juvell Alquero', 'Accounting Office', 'Jan-05-2022 05:18 PM', '', '', '', ''),
(3, 'doc20227298', 'HR Memo', 'Sample Memo Format.pdf', '397658', 0, 'HR Memo', 'Created', 'BCP HR Memo For CCS Department', 'Aldrin De Guzman', 'Faculty Office', 'Jan-05-2022 05:19 PM', 'Aldrin De Guzman', 'Faculty Office', 'Jan-05-2022 05:19 PM', '', '', '', ''),
(4, 'doc20222796', 'Memo For Department', 'Staff Memo 2.pdf', '149605', 0, 'Department Memo', 'Created', 'BCP Memo for staff', 'Catherine Flaviano', 'HR Office', 'Jan-05-2022 05:19 PM', 'Catherine Flaviano', 'HR Office', 'Jan-05-2022 05:19 PM', '', '', '', ''),
(6, 'doc20225000', 'HR Memo', 'Staff Memo 2.pdf', '149605', 0, 'HR Memo', 'Created', 'HR Memo For Staff', 'Rogel Quintero', 'VP Office', 'Jan-05-2022 05:25 PM', 'Rogel Quintero', 'VP Office', 'Jan-05-2022 05:25 PM', '', '', '', ''),
(8, 'doc20223651', 'test1', 'contracts_6jun16.pdf', '41136', 0, 'Contract', 'Rejected', 'bcp contract ', 'Marvin Marilao', 'CCS Office', 'Feb-06-2022 07:19 PM', 'Marvin Marilao', 'CCS Office', 'Feb-06-2022 07:25:12 PM', 'Rogel Quintero', 'VP Office', 'Feb-06-2022 07:22:59 PM', 'wrong file'),
(9, 'doc20221556', 'asd', 'BSIT_January 5_7PM.pdf', '2811496', 0, 'HR Memo', 'Outgoing', 'asdasdasd', 'Juvell Alquero', 'Accounting Office', 'Mar-01-2022 04:28 PM', 'Juvell Alquero', 'Accounting Office', 'Mar-01-2022 04:28 PM', 'Aldrin De Guzman', 'Faculty Office', 'Mar-01-2022 04:31:10 PM', 'capstone');

-- --------------------------------------------------------

--
-- Table structure for table `datms_office`
--

CREATE TABLE `datms_office` (
  `off_id` int(100) NOT NULL,
  `off_code` varchar(100) NOT NULL,
  `off_name` varchar(255) NOT NULL,
  `off_location` varchar(255) NOT NULL,
  `off_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datms_office`
--

INSERT INTO `datms_office` (`off_id`, `off_code`, `off_name`, `off_location`, `off_date`) VALUES
(1, '0001Office', 'CCS Office', '5th Floor BCP MV Campus', 'Jan-02-2022 12:43:41 PM'),
(2, '0002Office', 'Faculty Office', '5th Floor BCP MV Campus\n', 'Jan-02-2022 12:45:03 PM'),
(3, '0003Office', 'Accounting Office', 'Ground Floor BCP Main Campus', 'Jan-02-2022 07:12:42 PM'),
(4, '0004Office', 'VP Office', '3rd Floor BCP Main Campus', 'Jan-02-2022 12:46:45 PM'),
(5, '0005Office', 'CEO Office', 'Main Campus', 'Jan-02-2022 12:47:21 PM'),
(6, '0006Office', 'HR Office', 'Ground Floor BCP Main Campus\n', 'Jan-02-2022 12:57:45 PM');

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
(7, 4, 'Book Coordinator'),
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
(21, 6, 'DATMS Approver'),
(22, 6, 'DATMS Secretary'),
(23, 6, 'DATMS Faculty');

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
(1, '47415379', 'John Marvin', 'Marilao', 'L.', 'marvinmarilao92@gmail.com', '9202966614', 'Ph. 2 Pkg. 2 Blk. 30 Lot 16 Bagong Silang Caloocan City 1428', 'BS Information Technology', 'Male', '1999-10-09', 'philippines', 'Roman Catholic', 'Single', 'Active', 'Mar-02-2022 04:04:23 PM'),
(3, '68285834', 'asdsad', 'asdasd', 'asdsad', 'asdsa@gmail.com', '92029232322', 'asdasd asdasd 123213 123123', 'BS Entrepreneurship', 'Male', '2022-04-01', 'philippines', 'Roman Catholic', 'Single', 'Active', 'Mar-02-2022 05:30:21 PM'),
(5, '30118110', 'asd', 'asd', 's', 'asdsad@gmail.com', '929039293781', 'asdas asdsad asdsad 3122', 'BS Entrepreneurship', 'Male', '2022-03-03', 'philippines', 'Roman Catholic', 'Single', 'Active', 'Mar-02-2022 08:02:57 PM'),
(6, '87162645', 'asd', 'asd', 'a', 'asdasd@gmail.com', '92837289', 'asd asd asd 1231', 'BS Information Technology', 'Male', '2022-03-08', 'philippines', 'Roman Catholic', 'Single', 'Active', 'Mar-02-2022 08:07:34 PM'),
(7, '91738169', 'asd', 'asd', 'a', 'marvin@gmail.com', '934234243', 'asd asd asd 3214', 'BS Information Technology', 'Male', '2022-03-09', 'philippines', 'Roman Catholic', 'Single', 'Active', 'Mar-02-2022 09:09:40 PM');

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
  `stud_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `course`, `year_level`, `section`, `school_year`, `gender`, `birthday`, `nationality`, `religion`, `civil_status`, `account_status`, `stud_date`) VALUES
(12, '18012301', 'John Luis', 'Jamito', 'San Buenaventura', 'luis@gmail.com', '123456', 'Camarin Caloocan City', 'BS Criminology', '1st Year', '1101', '2021-2022', 'Male', '2010-11-07', 'filipino', 'Christianity', 'Single', 'Active', ''),
(13, '18012300', 'Olivert', 'Jamito', 'San Buenaventura', 'olivertjr17@gmail.com', '9278792464', 'Camarin Caloocan City', 'BS Information Technology', '4th Year', '4107', '2021-2022', 'Male', '2000-03-17', 'filipino', 'Christianity', 'Single', 'Active', ''),
(14, '18012894', 'Jerald', 'Docil', 'L', 'jrlddcl03@gmail.com', '9103949077', 'Ph8B Pck4 BLk4 Lot9 Bagong Silang Caloocan City', 'BS Information Technology', '4th Year', '4104', '2020-2021', 'Male', '1999-11-03', 'filipino', 'Christianity', 'Single', 'Active', ''),
(15, '123456789', 'Marvin', 'Marilao', '', 'marvin@marilao', '2135646546', 'Metro Manila', 'BS Information Technology', '4th Year', '4108', '2021-2022', 'Male', '2021-11-29', 'filipino', 'Christianity', 'Single', 'Active', ''),
(16, '18010827', 'Kira', 'Magallanes', '', 'kira@magallanes', '123123', 'Metro Manila', 'BS Psychology', '4th Year', '4107', '2021-2022', 'Male', '2000-03-12', 'filipino', 'Islam', 'Widowed', 'Active', '');

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
(5, '321456', '#ChangeMe01!', '2022-01-13 13:46:50'),
(6, '18012894', '#ChangeMe01!', '2021-11-29 07:57:41'),
(7, '18012564', '#ChangeMe01!', '2021-11-29 08:04:58'),
(8, '123456789', '#ChangeMe01!', '2021-11-29 11:37:12'),
(9, '321654987', '#ChangeMe01!', '2021-11-29 11:40:42'),
(10, '18010827', '#ChangeMe01!', '2021-12-04 17:38:08'),
(11, '18010828', '#ChangeMe01!', '2021-12-04 17:46:49'),
(12, '123123123', '#ChangeMe01!', '2021-12-28 16:45:18'),
(15, '111', '#ChangeMe01!', '2021-12-29 03:14:22'),
(16, '100001', '#ChangeMe01!', '2022-01-02 05:06:51'),
(17, '100002', '#ChangeMe01!', '2022-01-02 11:06:40'),
(18, '100003', '#ChangeMe01!', '2022-01-03 14:24:43'),
(19, '2022001', '#ChangeMe01!', '2022-01-04 19:26:39'),
(20, '2022002', '#ChangeMe01!', '2022-01-04 19:27:53'),
(21, '2022003', '#ChangeMe01!', '2022-01-04 19:29:15'),
(22, '2022004', '#ChangeMe01!', '2022-01-04 19:31:44'),
(23, '2022005', '#ChangeMe01!', '2022-01-04 19:34:30'),
(24, '2022006', '#ChangeMe01!', '2022-01-13 13:46:26'),
(42, '202250881731', '#ChangeMe01!', '2022-03-01 17:40:26'),
(43, '202245539710', '#ChangeMe01!', '2022-03-01 17:42:28'),
(44, '202298269610', '#ChangeMe01!', '2022-03-01 17:44:14'),
(45, '123111', '#ChangeMe01!', '2022-03-03 05:36:06');

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
  `about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `id_number`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `office`, `department`, `role`, `account_status`, `about`) VALUES
(1, '123456', 'John', 'Doe', 'bugnoy', 'John@doe', '123456', 'Metro Manila', '', 'Clearance System', 'Clearance Administrator', 'Active', ''),
(2, '321456', 'bcp', 'admin', '', 'bcp@admin.com', '123123', 'Metro Manila', '', 'User Management', 'User Management Administrator', 'Active', ''),
(3, '18012564', 'James', 'Gutay', '', 'jamesalbertgutay23@gmail.com', '9460206627', '19 Genoveva St. Gulod Novaliches Quezon City', '', 'Clearance System', 'Clearance Administrator', 'Active', ''),
(5, '18010828', 'olinad', 'ohcac', 'raul', 'olinad@gmail.com', '123123123', 'Metro Manila', '', 'User Management', 'User Management Administrator', 'Active', ''),
(13, '2022001', 'Marvin', 'Marilao', 'Luna', 'Marvinmarilao@gmail.com', '9202966614', 'Bagong SIlang Caloocan City', 'CCS Office', 'DATMS', 'DATMS Administrator', 'Active', ''),
(14, '2022002', 'Juvell', 'Alquero', 'A', 'Juvell@gmail.com', '9232736178', 'Bagumbong City', 'Accounting Office', 'DATMS', 'DATMS Administrator', 'Active', ''),
(15, '2022003', 'Aldrin', 'De Guzman', '', 'aldrin@gmail.com', '9293729372', 'Caloocan City', 'Faculty Office', 'DATMS', 'DATMS Administrator', 'Active', ''),
(16, '2022004', 'Catherine', 'Flaviano', '', 'catherine@gmail.com', '9283674738', 'Caloocan City', 'HR Office', 'DATMS', 'DATMS Administrator', 'Active', ''),
(17, '2022005', 'Rogel', 'Quintero', '', 'rogel@gmail.com', '9836473627', 'Metro Manila', 'VP Office', 'DATMS', 'DATMS Approver', 'Active', ''),
(18, '2022006', 'Rommel', 'Constantino', '', 'Rommel@gmail.com', '9273387263', 'Confidencial', 'CCS Office', 'DATMS', 'DATMS Administrator', 'Active', ''),
(19, '123111', 'asdasd asdasd', 'asdasdas', 'b', 'asdsad@gmail.com', '12312321312', 'asdsadasd', 'HR Office', 'DATMS', 'DATMS Administrator', 'Active', 'asdasdasd');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `datms_office`
--
ALTER TABLE `datms_office`
  ADD PRIMARY KEY (`off_id`);

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
-- AUTO_INCREMENT for table `datms_doctype`
--
ALTER TABLE `datms_doctype`
  MODIFY `dt_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datms_documents`
--
ALTER TABLE `datms_documents`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `datms_office`
--
ALTER TABLE `datms_office`
  MODIFY `off_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_application`
--
ALTER TABLE `student_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
