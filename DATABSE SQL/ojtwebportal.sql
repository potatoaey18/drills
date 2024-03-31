-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 04:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojtwebportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `uniqueID` varchar(150) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `admin_profile_picture` varchar(200) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `verification_code` int(8) NOT NULL,
  `verify_status` varchar(50) NOT NULL DEFAULT 'Not Verified',
  `online_offlineStatus` varchar(50) NOT NULL DEFAULT 'Offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `uniqueID`, `first_name`, `middle_name`, `last_name`, `id_number`, `position`, `address`, `phone_number`, `admin_profile_picture`, `admin_email`, `admin_password`, `verification_code`, `verify_status`, `online_offlineStatus`) VALUES
(1, '655742434d3325158', 'Ramon', 'G', 'Gwapo', '3213-9898', 'CEO', 'new york', '09652314574', '../student_file_images/655742434d337-d23088c295c2c703a9be63cc9f6a0408.jpg', 'romanoespiritu146@gmail.com', '202cb962ac59075b964b07152d234b70', 666368, 'Verified', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `admin_system_notification`
--

CREATE TABLE `admin_system_notification` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `logs` varchar(150) NOT NULL,
  `logs_date` varchar(50) NOT NULL,
  `logs_time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_system_notification`
--

INSERT INTO `admin_system_notification` (`id`, `admin_id`, `logs`, `logs_date`, `logs_time`, `status`) VALUES
(1, 1, 'You successfully logged in to your account.', 'November / 19 Sunday / 2023', '10:24 AM', 'Read'),
(2, 1, 'You successfully logged out to your account.', 'November / 19 Sunday / 2023', '10:25 AM', 'Read'),
(3, 1, 'You successfully logged in to your account.', 'December / 06 Wednesday / 2023', '11:29 AM', 'Read'),
(4, 1, 'You successfully logged out to your account.', 'December / 06 Wednesday / 2023', '11:30 AM', 'Read'),
(5, 1, 'You successfully logged in to your account.', 'February / 07 Wednesday / 2024', '10:28 AM', 'Read'),
(6, 1, 'You successfully logged out to your account.', 'February / 07 Wednesday / 2024', '10:29 AM', 'Read'),
(7, 1, 'You successfully logged in to your account.', 'February / 07 Wednesday / 2024', '10:30 AM', 'Read'),
(8, 1, 'You successfully logged out to your account.', 'February / 07 Wednesday / 2024', '10:35 AM', 'Read'),
(9, 1, 'You successfully logged in to your account.', 'February / 12 Monday / 2024', '11:07 PM', 'Read'),
(10, 1, 'You successfully logged out to your account.', 'February / 12 Monday / 2024', '11:07 PM', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `chat_system`
--

CREATE TABLE `chat_system` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(200) NOT NULL,
  `receiver_id` varchar(200) NOT NULL,
  `messages` text NOT NULL,
  `images` varchar(500) NOT NULL,
  `date_only` varchar(100) NOT NULL,
  `time_only` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Sent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_system`
--

INSERT INTO `chat_system` (`id`, `sender_id`, `receiver_id`, `messages`, `images`, `date_only`, `time_only`, `status`) VALUES
(1, '653b132b1325d9158', '623b852b1325d4613', '', 'chatMessages_images/65c2e77525faa-Untitled.png', 'February 07, 2024', '10:14 AM', 'Seen'),
(2, '653b132b1325d9158', '623b852b1325d4613', '', 'chatMessages_images/65c2e78469fb6-figure3.jpg', 'February 07, 2024', '10:14 AM', 'Seen'),
(3, '653b852b1325d4513', '653b132b1325d9158', '', 'chatMessages_images/65c2e7d403528-figure1.jpg', 'February 07, 2024', '10:15 AM', 'Seen'),
(4, '653b852b1325d4513', '653b132b1325d9158', 'dsadasdasdasdasdasdsad', '', 'February 07, 2024', '10:16 AM', 'Seen');

-- --------------------------------------------------------

--
-- Table structure for table `company_skills_requirements`
--

CREATE TABLE `company_skills_requirements` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `skills_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_skills_requirements`
--

INSERT INTO `company_skills_requirements` (`id`, `company_name`, `skills_name`) VALUES
(1, 'Google Company', 'Programmer'),
(3, 'Google Company', 'Hardware Technician');

-- --------------------------------------------------------

--
-- Table structure for table `coordinatorsystemnotification`
--

CREATE TABLE `coordinatorsystemnotification` (
  `id` int(11) NOT NULL,
  `coordinator_id` int(12) NOT NULL,
  `logs` varchar(200) NOT NULL,
  `logs_date` varchar(50) NOT NULL,
  `logs_time` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinatorsystemnotification`
--

INSERT INTO `coordinatorsystemnotification` (`id`, `coordinator_id`, `logs`, `logs_date`, `logs_time`, `status`) VALUES
(1, 1, 'You successfully logged in to your account.', 'December / 06 Wednesday / 2023', '11:30 AM', 'Unread'),
(2, 1, 'You successfully logged out to your account.', 'December / 06 Wednesday / 2023', '11:31 AM', 'Unread'),
(3, 1, 'You successfully logged in to your account.', 'February / 07 Wednesday / 2024', '10:17 AM', 'Unread'),
(4, 1, 'You successfully logged out to your account.', 'February / 07 Wednesday / 2024', '10:21 AM', 'Unread'),
(5, 1, 'You successfully logged in to your account.', 'February / 08 Thursday / 2024', '7:36 PM', 'Unread'),
(6, 1, 'You successfully logged in to your account.', 'February / 12 Monday / 2024', '11:06 PM', 'Unread'),
(7, 1, 'You successfully logged out to your account.', 'February / 12 Monday / 2024', '11:06 PM', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `coordinators_account`
--

CREATE TABLE `coordinators_account` (
  `id` int(11) NOT NULL,
  `uniqueID` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `faculty_id` varchar(20) NOT NULL,
  `course_handled` varchar(200) NOT NULL,
  `complete_address` varchar(300) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `coordinators_email` varchar(200) NOT NULL,
  `coordinators_password` varchar(200) NOT NULL,
  `coordinators_profile_picture` varchar(500) NOT NULL,
  `verification_code` int(8) NOT NULL,
  `verify_status` varchar(80) NOT NULL DEFAULT 'Not Verified',
  `online_offlineStatus` varchar(50) NOT NULL DEFAULT 'Offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinators_account`
--

INSERT INTO `coordinators_account` (`id`, `uniqueID`, `first_name`, `middle_name`, `last_name`, `faculty_id`, `course_handled`, `complete_address`, `phone_number`, `coordinators_email`, `coordinators_password`, `coordinators_profile_picture`, `verification_code`, `verify_status`, `online_offlineStatus`) VALUES
(1, '653b2dc7b33da7716', 'Ramon', 'G', 'Gwapo', '332312434', 'Bachelor of Science in Information Technology', 'new york', '09652314574', 'romanoespiritu146@gmail.com', '202cb962ac59075b964b07152d234b70', '../student_file_images/653b2dc7b33df-images.jpeg', 246101, 'Verified', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `deployed_students`
--

CREATE TABLE `deployed_students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deployed_students`
--

INSERT INTO `deployed_students` (`id`, `student_id`, `company_name`) VALUES
(1, 1, 'Google Company'),
(2, 2, 'Google Company'),
(3, 3, 'Google Company'),
(4, 4, 'Google Company'),
(5, 5, 'Google Company'),
(6, 6, 'Google Company');

-- --------------------------------------------------------

--
-- Table structure for table `narrative_reports`
--

CREATE TABLE `narrative_reports` (
  `id` int(11) NOT NULL,
  `student_id` int(12) NOT NULL,
  `dateOFSubmit` varchar(50) NOT NULL,
  `objectives` varchar(2000) NOT NULL,
  `accomplishments` varchar(2000) NOT NULL,
  `reflections` varchar(2000) NOT NULL,
  `realizations` varchar(2000) NOT NULL,
  `knowledge` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_hours`
--

CREATE TABLE `ojt_hours` (
  `id` int(11) NOT NULL,
  `total_hours` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ojt_hours`
--

INSERT INTO `ojt_hours` (`id`, `total_hours`) VALUES
(1, 400.00);

-- --------------------------------------------------------

--
-- Table structure for table `ojt_requirements`
--

CREATE TABLE `ojt_requirements` (
  `id` int(11) NOT NULL,
  `student_id` int(12) NOT NULL,
  `document_name` varchar(500) NOT NULL,
  `document_fileName` varchar(500) NOT NULL,
  `document_location` varchar(1000) NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ojt_requirements`
--

INSERT INTO `ojt_requirements` (`id`, `student_id`, `document_name`, `document_fileName`, `document_location`, `status`) VALUES
(4, 1, 'Parents Consent', 'Vecteezy-License-Information.pdf', '../ojt_Requirements_Docs/65c2e8afd50c3-Vecteezy-License-Information.pdf', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `students_data`
--

CREATE TABLE `students_data` (
  `id` int(11) NOT NULL,
  `uniqueID` varchar(200) NOT NULL,
  `first_name` varchar(70) NOT NULL,
  `middle_name` varchar(70) NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `student_ID` varchar(50) NOT NULL,
  `stud_course` varchar(150) NOT NULL,
  `stud_section` varchar(150) NOT NULL,
  `complete_address` varchar(200) NOT NULL,
  `stud_gender` varchar(100) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `stud_email` varchar(200) NOT NULL,
  `stud_password` varchar(200) NOT NULL,
  `guardians_name` varchar(200) NOT NULL,
  `guardians_cpNumber` varchar(20) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `verification_code` int(8) NOT NULL,
  `verify_status` varchar(80) NOT NULL DEFAULT 'Not Verified',
  `online_offlineStatus` varchar(80) NOT NULL DEFAULT 'Offline',
  `ojt_status` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_data`
--

INSERT INTO `students_data` (`id`, `uniqueID`, `first_name`, `middle_name`, `last_name`, `student_ID`, `stud_course`, `stud_section`, `complete_address`, `stud_gender`, `phone_number`, `stud_email`, `stud_password`, `guardians_name`, `guardians_cpNumber`, `profile_picture`, `verification_code`, `verify_status`, `online_offlineStatus`, `ojt_status`) VALUES
(1, '653b132b1325d9158', 'Ramon', 'G', 'Gwapo', '12343', 'Bachelor of Science in Information Technology', 'Sarutobi', 'new york', 'male', '09652314578', 'romanoespiritu146@gmail.com', '202cb962ac59075b964b07152d234b70', 'ewqewqeqwe', '09657856324', '../student_file_images/653b132b13269-download.png', 243388, 'Verified', 'Offline', 'Deployed'),
(2, '623b852b1325d4613', 'Naruto', 'Hokage', 'Uzumaki', '12343', 'Bachelor of Science in Information Technology', 'Kazekage', 'new york', 'male', '09652314578', 'naruto146@gmail.com', '202cb962ac59075b964b07152d234b70', 'ewqewqeqwe', '09657856324', '../student_file_images/653b132b13269-download.png', 243388, 'Verified', 'Offline', 'Deployed'),
(3, '653b852b7624d4873', 'Sasuke', 'a', 'Uchiha', '12343', 'Bachelor of Science in Information Technology', 'Hokage', 'new york', 'male', '09652314578', 'sasuke146@gmail.com', '202cb962ac59075b964b07152d234b70', 'ewqewqeqwe', '09657856324', '../student_file_images/653b132b13269-download.png', 243388, 'Verified', 'Offline', 'Deployed'),
(4, '653b852b1325d6239', 'Itachi', 'B', 'Uchiha', '12343', 'Bachelor of Science in Information Technology', 'Mizukage', 'new york', 'male', '09652314578', 'itachi146@gmail.com', '202cb962ac59075b964b07152d234b70', 'ewqewqeqwe', '09657856324', '../student_file_images/653b132b13269-download.png', 243388, 'Verified', 'Offline', 'Deployed'),
(5, '653b852b1745d1735', 'Madara', 'B', 'Uchiha', '12343', 'Bachelor of Science in Information Technology', 'Raikage', 'new york', 'male', '09652314578', 'madara146@gmail.com', '202cb962ac59075b964b07152d234b70', 'ewqewqeqwe', '09657856324', '../student_file_images/653b132b13269-download.png', 243388, 'Verified', 'Offline', 'Deployed'),
(6, '653b852b1325d4513', 'Minato', 'Hokage', 'Namikaze', '12343', 'Bachelor of Science in Information Technology', 'Shadow Hokage', 'new york', 'male', '09652314578', 'naruto146@gmail.com', '202cb962ac59075b964b07152d234b70', 'ewqewqeqwe', '09657856324', '../student_file_images/653b132b13269-download.png', 243388, 'Verified', 'Offline', 'Deployed'),
(7, '655a0842e31152045', 'Naruto', 'G', 'Uchiha', '32131-09', 'Bachelor of Science in Information System', 'qwerty', 'new york', 'male', '09652314574', 'espirituramongauiran@gmail.com', '202cb962ac59075b964b07152d234b70', 'ewqewqeqwe', '09563245877', '../student_file_images/655a0842e311a-334-3347460_academic-writing-cartoon-clipart.png', 627660, 'Not Verified', 'Offline', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stud_daily_time_records`
--

CREATE TABLE `stud_daily_time_records` (
  `id` int(11) NOT NULL,
  `stud_id` int(13) NOT NULL,
  `recordDate` date NOT NULL,
  `AM_time_IN` time NOT NULL,
  `AM_time_OUT` time NOT NULL,
  `PM_time_IN` time NOT NULL,
  `PM_time_OUT` time NOT NULL,
  `total_working_hours` decimal(10,2) NOT NULL,
  `recordStatus` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_daily_time_records`
--

INSERT INTO `stud_daily_time_records` (`id`, `stud_id`, `recordDate`, `AM_time_IN`, `AM_time_OUT`, `PM_time_IN`, `PM_time_OUT`, `total_working_hours`, `recordStatus`) VALUES
(1, 1, '2023-11-04', '07:30:00', '11:30:00', '13:00:00', '18:30:00', 9.50, 'Pending'),
(2, 1, '2023-11-05', '07:45:00', '11:50:00', '13:00:00', '19:30:00', 10.58, 'Pending'),
(3, 1, '2023-11-16', '06:15:00', '11:30:00', '13:15:00', '20:16:00', 12.27, 'Pending'),
(4, 1, '2024-02-07', '07:10:00', '10:10:00', '13:11:00', '18:12:00', 8.02, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `stud_evaluation`
--

CREATE TABLE `stud_evaluation` (
  `id` int(15) NOT NULL,
  `stud_id` int(15) NOT NULL,
  `week` varchar(30) NOT NULL,
  `job_knowledge` int(15) NOT NULL,
  `dependability` int(15) NOT NULL,
  `communication_skills` int(15) NOT NULL,
  `conduct` int(15) NOT NULL,
  `initiative_and_creativity` int(15) NOT NULL,
  `cooperatives_and_relationship` int(15) NOT NULL,
  `attendance_and_punctuality` int(15) NOT NULL,
  `total_points` int(12) NOT NULL,
  `comments_suggestions` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_evaluation`
--

INSERT INTO `stud_evaluation` (`id`, `stud_id`, `week`, `job_knowledge`, `dependability`, `communication_skills`, `conduct`, `initiative_and_creativity`, `cooperatives_and_relationship`, `attendance_and_punctuality`, `total_points`, `comments_suggestions`) VALUES
(1, 1, '1', 13, 14, 15, 15, 15, 15, 9, 96, 'Your communication skills, both verbal and written, have shown continual improvement. Your ability to express ideas clearly and engage effectively with colleagues has been noticeable. Your professionalism in handling interactions with clients or customers has been particularly noteworthy.'),
(2, 1, '2', 14, 14, 15, 13, 12, 15, 10, 93, 'Your initiative in seeking solutions and tackling problems independently has been impressive. You\'ve demonstrated a proactive approach in addressing issues and finding innovative solutions. Your ability to analyze situations and propose viable alternatives has been a notable strength.'),
(3, 1, '3', 1, 2, 2, 3, 4, 2, 3, 17, 'Your contributions to team projects and your willingness to collaborate have been invaluable. Your positive attitude and willingness to support team members have fostered a cooperative environment. You\'ve effectively communicated ideas and contributed meaningfully to group discussions, showcasing excellent teamwork skills.'),
(4, 2, '1', 12, 13, 12, 13, 13, 13, 10, 86, 'Mabait at masipag siya'),
(5, 2, '2', 13, 12, 15, 14, 14, 13, 10, 91, 'Caring and Lovable worker'),
(6, 2, '3', 12, 12, 11, 14, 15, 14, 9, 87, 'Madaling makausap'),
(7, 3, '1', 13, 13, 12, 15, 15, 15, 9, 92, 'Mabait'),
(8, 3, '2', 13, 15, 15, 15, 14, 14, 10, 96, 'Mabait at masipag, lovable '),
(9, 3, '3', 14, 14, 14, 12, 13, 15, 10, 92, 'masipag at responsable sa lahat ng gawain'),
(10, 4, '1', 14, 14, 15, 15, 15, 15, 10, 98, 'Responsible at may disiplina sa sarili at masipag'),
(11, 4, '2', 14, 14, 15, 12, 12, 13, 9, 89, 'masipag at maalaga'),
(12, 4, '3', 14, 14, 13, 13, 14, 13, 8, 89, 'responsable sa lahat ng bagay'),
(13, 5, '1', 12, 12, 10, 12, 12, 12, 7, 77, 'di gaanong masipag sa mga gawain'),
(14, 5, '2', 13, 13, 13, 13, 12, 14, 9, 87, 'tamad sa lahat ng gawain'),
(15, 5, '3', 15, 15, 15, 15, 14, 15, 10, 99, 'very helpful'),
(16, 6, '1', 14, 13, 14, 14, 15, 15, 10, 95, 'matulungin sa lahat, may disiplina sa sarili'),
(17, 6, '2', 14, 14, 13, 14, 15, 15, 10, 95, 'may disiplina sa sarili'),
(18, 6, '3', 15, 15, 15, 15, 15, 15, 10, 100, 'masipag at matulungin sa kanyang mga kaklase at meron siyang disiplina');

-- --------------------------------------------------------

--
-- Table structure for table `stud_skills`
--

CREATE TABLE `stud_skills` (
  `id` int(11) NOT NULL,
  `stud_id` int(13) NOT NULL,
  `skills_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stud_task_list`
--

CREATE TABLE `stud_task_list` (
  `id` int(11) NOT NULL,
  `stud_id` int(13) NOT NULL,
  `task_date_of_deployed` date NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `TASK_description` text NOT NULL,
  `task_date` date NOT NULL,
  `task_priority` varchar(100) NOT NULL,
  `task_status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_task_list`
--

INSERT INTO `stud_task_list` (`id`, `stud_id`, `task_date_of_deployed`, `task_name`, `TASK_description`, `task_date`, `task_priority`, `task_status`) VALUES
(1, 1, '2023-11-17', 'Fix Computer', ' frweqrqwetrrqtrewtrew frweqrqwetrrqtrewtrew frweqrqwetrrqtrewtrew frweqrqwetrrqtrewtrew frweqrqwetrrqtrewtrew frweqrqwetrrqtrewtrew', '2023-11-18', 'Medium', 'Finished'),
(2, 1, '2023-11-18', 'Fix Computer2', 'dasdasdqweqwe', '2023-11-24', 'High', 'Finished'),
(3, 1, '2023-11-17', 'Fix Computer3', '321wrterwterwtwertwertgfdsgssdfgdfs', '2023-11-23', 'Medium', 'Finished');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `uniqueID` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `position` varchar(200) NOT NULL,
  `company_address` varchar(150) NOT NULL,
  `supervisor_email` varchar(150) NOT NULL,
  `supervisor_password` varchar(150) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `supervisor_profile_picture` varchar(150) NOT NULL,
  `verification_code` int(8) NOT NULL,
  `verify_status` varchar(150) NOT NULL DEFAULT 'Not Verified',
  `online_offlineStatus` varchar(150) NOT NULL DEFAULT 'Offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `uniqueID`, `first_name`, `middle_name`, `last_name`, `company_name`, `position`, `company_address`, `supervisor_email`, `supervisor_password`, `phone_number`, `supervisor_profile_picture`, `verification_code`, `verify_status`, `online_offlineStatus`) VALUES
(1, '653b3b7244d312760', 'Ramon', 'G', 'Gwapo', 'Google Company', 'CEO', 'Tallungan New york', 'romanoespiritu146@gmail.com', '202cb962ac59075b964b07152d234b70', '09652314574', '../student_file_images/653b3b7244d34-images.jpeg', 669661, 'Verified', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_system_notification`
--

CREATE TABLE `supervisor_system_notification` (
  `id` int(11) NOT NULL,
  `supervisor_id` int(13) NOT NULL,
  `logs` varchar(200) NOT NULL,
  `logs_date` varchar(50) NOT NULL,
  `logs_time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor_system_notification`
--

INSERT INTO `supervisor_system_notification` (`id`, `supervisor_id`, `logs`, `logs_date`, `logs_time`, `status`) VALUES
(1, 1, 'You successfully logged in to your account.', 'February / 07 Wednesday / 2024', '10:21 AM', 'Read'),
(2, 1, 'You successfully logged out to your account.', 'February / 07 Wednesday / 2024', '10:26 AM', 'Read'),
(3, 1, 'You successfully logged in to your account.', 'February / 12 Monday / 2024', '11:04 PM', 'Read'),
(4, 1, 'You successfully logged out to your account.', 'February / 12 Monday / 2024', '11:04 PM', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `system_notification`
--

CREATE TABLE `system_notification` (
  `id` int(11) NOT NULL,
  `student_id` int(12) NOT NULL,
  `logs` varchar(200) NOT NULL,
  `logs_date` varchar(50) NOT NULL,
  `logs_time` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_notification`
--

INSERT INTO `system_notification` (`id`, `student_id`, `logs`, `logs_date`, `logs_time`, `status`) VALUES
(1, 1, 'You successfully logged in to your account.', 'December / 06 Wednesday / 2023', '11:31 AM', 'Read'),
(2, 1, 'You successfully logged out to your account.', 'December / 06 Wednesday / 2023', '11:34 AM', 'Read'),
(3, 1, 'You successfully logged in to your account.', 'February / 05 Monday / 2024', '11:39 AM', 'Read'),
(4, 1, 'You successfully logged out to your account.', 'February / 05 Monday / 2024', '11:40 AM', 'Read'),
(5, 1, 'You successfully logged in to your account.', 'February / 07 Wednesday / 2024', '10:07 AM', 'Read'),
(6, 6, 'You successfully logged in to your account.', 'February / 07 Wednesday / 2024', '10:15 AM', 'Unread'),
(7, 6, 'You successfully logged out to your account.', 'February / 07 Wednesday / 2024', '10:17 AM', 'Unread'),
(8, 1, 'You successfully submitted your Parents Consent form.', 'February / 07 Wednesday / 2024', '10:19 AM', 'Read'),
(9, 1, 'You successfully logged out to your account.', 'February / 07 Wednesday / 2024', '10:22 AM', 'Read'),
(10, 1, 'You successfully logged in to your account.', 'February / 08 Thursday / 2024', '7:31 PM', 'Read'),
(11, 1, 'You successfully logged out to your account.', 'February / 08 Thursday / 2024', '7:36 PM', 'Unread'),
(12, 1, 'You successfully logged in to your account.', 'February / 12 Monday / 2024', '10:22 PM', 'Unread'),
(13, 1, 'You successfully logged out to your account.', 'February / 12 Monday / 2024', '10:28 PM', 'Unread'),
(14, 1, 'You successfully logged in to your account.', 'February / 12 Monday / 2024', '10:40 PM', 'Unread'),
(15, 1, 'You successfully logged out to your account.', 'February / 12 Monday / 2024', '11:02 PM', 'Unread');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_system_notification`
--
ALTER TABLE `admin_system_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_system`
--
ALTER TABLE `chat_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_skills_requirements`
--
ALTER TABLE `company_skills_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinatorsystemnotification`
--
ALTER TABLE `coordinatorsystemnotification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinators_account`
--
ALTER TABLE `coordinators_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deployed_students`
--
ALTER TABLE `deployed_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narrative_reports`
--
ALTER TABLE `narrative_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_hours`
--
ALTER TABLE `ojt_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojt_requirements`
--
ALTER TABLE `ojt_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_data`
--
ALTER TABLE `students_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_daily_time_records`
--
ALTER TABLE `stud_daily_time_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_evaluation`
--
ALTER TABLE `stud_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_skills`
--
ALTER TABLE `stud_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_task_list`
--
ALTER TABLE `stud_task_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor_system_notification`
--
ALTER TABLE `supervisor_system_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_notification`
--
ALTER TABLE `system_notification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_system_notification`
--
ALTER TABLE `admin_system_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat_system`
--
ALTER TABLE `chat_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_skills_requirements`
--
ALTER TABLE `company_skills_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coordinatorsystemnotification`
--
ALTER TABLE `coordinatorsystemnotification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coordinators_account`
--
ALTER TABLE `coordinators_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deployed_students`
--
ALTER TABLE `deployed_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `narrative_reports`
--
ALTER TABLE `narrative_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ojt_hours`
--
ALTER TABLE `ojt_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ojt_requirements`
--
ALTER TABLE `ojt_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students_data`
--
ALTER TABLE `students_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stud_daily_time_records`
--
ALTER TABLE `stud_daily_time_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stud_evaluation`
--
ALTER TABLE `stud_evaluation`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stud_skills`
--
ALTER TABLE `stud_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stud_task_list`
--
ALTER TABLE `stud_task_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supervisor_system_notification`
--
ALTER TABLE `supervisor_system_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_notification`
--
ALTER TABLE `system_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
