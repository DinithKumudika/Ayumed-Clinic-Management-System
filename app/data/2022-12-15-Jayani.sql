-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 07:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayumed_clinic_mgt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allergy`
--

CREATE TABLE `tbl_allergy` (
  `allergy` varchar(255) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointments`
--

CREATE TABLE `tbl_appointments` (
  `appointment_id` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT 'visited = 1,\r\nnot visited= 0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicines`
--

CREATE TABLE `tbl_medicines` (
  `medicine_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `weight` int(10) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_medicines`
--

INSERT INTO `tbl_medicines` (`medicine_id`, `name`, `weight`, `unit`, `category`, `quantity`) VALUES
(1, 'panadol', 10, 'mg', 'tablet', 10),
(24, 'Vitamin C', 3, 'miligram', 'tablet', 10),
(28, 'penicilin', 100, 'mililletre', 'syrup', 20),
(34, 'panadol syrup', 500, 'mililletre', 'syrup', 5),
(36, 'amoxicillin', 10, 'miligram', 'capsule', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patients`
--

CREATE TABLE `tbl_patients` (
  `id` int(11) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `DOB` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `martial_status` varchar(20) NOT NULL,
  `weight` double(5,2) DEFAULT NULL COMMENT 'in kg',
  `height` double(6,2) DEFAULT NULL COMMENT 'in cm',
  `blood_group` varchar(2) DEFAULT NULL,
  `reg_no` varchar(255) NOT NULL,
  `otp_code` int(11) DEFAULT NULL,
  `verification_status` tinyint(1) NOT NULL COMMENT '1= verified\r\n0 = not verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacists`
--

CREATE TABLE `tbl_pharmacists` (
  `pharmacist_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `Phone_No` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pharmacists`
--

INSERT INTO `tbl_pharmacists` (`pharmacist_id`, `user_id`, `Phone_No`) VALUES
(2, 12, 123456789),
(25, 14, 701234556);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_remembered`
--

CREATE TABLE `tbl_remembered` (
  `token_hash` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`, `description`) VALUES
(1, 'patient', 'stakeholder who resgister to the system to get services of the clinic'),
(2, 'doctor', 'stakeholder who provide treatments to the patient'),
(3, 'clinic_staff_member', 'stakeholder who manages patient details and their medical records'),
(4, 'pharmacist', 'stakeholder who manages the pharmacy and isssue medicines to prescriptions'),
(5, 'admin', 'stakeholder who manages the clinic management system');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email`, `username`, `password`, `created_at`, `role_id`) VALUES
(2, 'Jayani', 'Ranasinghe', 'jayani56@gmail.com', 'jayani', '$2y$10$PKYOpFLEJ9gH7iL2BySN3efqrHWsSQyyxVF6pZCB7VTxkQvc25uEa\n', '2022-12-05 07:01:57', 4),
(4, 'john', 'doe', 'john123@gmail.com', 'johnD123', 'John123', '2022-11-17 15:19:33', 2),
(12, 'rash', 'sena', 'rashsena@gmail.com', 'rashsena123', '$2y$10$CNB/UEAu9XTIl.O5J2S9vuBatYJT63nQIeQoB6yQ7TVtrWPrq0PNC', '2022-12-05 14:10:31', 4),
(14, 'Jayani', 'Ivanthika', 'jayeiva123@gmail.com', 'Jayani12345', '$2y$10$dzAhgrQaCc2ikKRPoZf9bux1StU7HZSIpJG0NoeyYRCSklieFIwhe', '2022-12-13 15:42:11', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_allergy`
--
ALTER TABLE `tbl_allergy`
  ADD PRIMARY KEY (`allergy`,`patient_id`),
  ADD KEY `patient_allergy` (`patient_id`);

--
-- Indexes for table `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `patient-appointment` (`patient_id`);

--
-- Indexes for table `tbl_medicines`
--
ALTER TABLE `tbl_medicines`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pharmacists`
--
ALTER TABLE `tbl_pharmacists`
  ADD PRIMARY KEY (`pharmacist_id`),
  ADD KEY `Foreign` (`user_id`);

--
-- Indexes for table `tbl_remembered`
--
ALTER TABLE `tbl_remembered`
  ADD PRIMARY KEY (`token_hash`),
  ADD KEY `tbl_remembered_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user-role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_medicines`
--
ALTER TABLE `tbl_medicines`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pharmacists`
--
ALTER TABLE `tbl_pharmacists`
  MODIFY `pharmacist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_allergy`
--
ALTER TABLE `tbl_allergy`
  ADD CONSTRAINT `patient_allergy` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patients` (`id`);

--
-- Constraints for table `tbl_appointments`
--
ALTER TABLE `tbl_appointments`
  ADD CONSTRAINT `patient-appointment` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD CONSTRAINT `patient id` FOREIGN KEY (`id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pharmacists`
--
ALTER TABLE `tbl_pharmacists`
  ADD CONSTRAINT `Foreign` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `user-role` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
