-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 08:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `ref_no` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `reason` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT 'visited = 1,\r\nnot visited= 0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointments`
--

INSERT INTO `tbl_appointments` (`appointment_id`, `ref_no`, `date`, `time`, `reason`, `status`, `created_at`, `patient_id`) VALUES
(7, '2022-11-28-202217', '2022-12-02', '11:10:00', '', 0, '2022-11-28 14:52:36', 17),
(9, '2022-11-28-203717', '2022-11-29', '10:15:00', '', 0, '2022-11-28 15:07:04', 17),
(10, '2022-11-29-204117', '2022-11-30', '17:00:00', '', 0, '2022-11-29 15:11:15', 17),
(11, '2022-11-29-223217', '2022-11-30', '10:15:00', '', 1, '2022-11-29 17:02:10', 17),
(12, '2022-11-29-223817', '2022-11-30', '11:00:00', '', 0, '2022-11-29 17:08:12', 17),
(13, '2022-12-01-122417', '2022-12-01', '00:23:00', '', 0, '2022-12-01 06:54:02', 17),
(14, '2022-12-01-122417', '2022-12-01', '00:24:00', '', 0, '2022-12-01 06:54:46', 17),
(15, '2022-12-01-122517', '2022-12-01', '00:25:00', '', 0, '2022-12-01 06:55:44', 17),
(17, '2022-12-01-133517', '2022-12-03', '10:30:00', '', 0, '2022-12-01 08:05:43', 17),
(18, '2022-12-01-133717', '2022-12-04', '09:30:00', 'food allergy', 0, '2022-12-01 08:07:32', 17),
(19, '2022-12-01-140417', '2022-12-02', '11:30:00', '', 0, '2022-12-01 08:34:55', 17),
(21, '2022-12-02-015617', '2022-12-04', '13:15:00', '', 0, '2022-12-01 20:26:39', 17),
(22, '2022-12-02-020417', '2022-12-03', '00:15:00', '', 0, '2022-12-01 20:34:07', 17),
(23, '2022-12-05-230917', '2022-12-07', '09:10:00', 'dfdfdf', 0, '2022-12-05 17:39:25', 17),
(24, '2022-12-07-201722', '2022-12-13', '09:20:00', '', 0, '2022-12-07 14:47:38', 22),
(25, '2022-12-15-100517', '2022-12-22', '10:05:00', '', 0, '2022-12-15 04:35:10', 17),
(26, '2022-12-15-135617', '2022-12-20', '15:58:00', '', 0, '2022-12-15 08:26:19', 17),
(27, '2022-12-15-173617', '2022-12-30', '09:30:00', 'oluwe amaruwa', 0, '2022-12-15 12:06:27', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctors`
--

CREATE TABLE `tbl_doctors` (
  `id` int(11) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctors`
--

INSERT INTO `tbl_doctors` (`id`, `NIC`, `phone_no`, `user_id`) VALUES
(1, '986592717v', 717631824, 32);

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
  `verification_status` tinyint(1) NOT NULL COMMENT '1= verified\r\n0 = not verified',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_patients`
--

INSERT INTO `tbl_patients` (`id`, `NIC`, `DOB`, `age`, `gender`, `phone_no`, `address`, `martial_status`, `weight`, `height`, `blood_group`, `reg_no`, `otp_code`, `verification_status`, `user_id`) VALUES
(17, '199935311769', '2006-12-14', 15, 'Male', 712170845, 'NO.22/1A, galpamuna road, kohuwala', 'Married', NULL, NULL, NULL, '2022-11-24-23', NULL, 1, 23),
(19, '199934567890', '1995-07-12', 27, 'Male', 729913456, 'No.22/1, kamil lane, matara', 'not Married', NULL, NULL, NULL, '2022-11-26-25', NULL, 1, 25),
(20, '199967834123', '1992-07-24', 30, 'Male', 719457475, 'No.12/1A, Wayne manor, gotham', 'not Married', NULL, NULL, NULL, '2022-11-26-26', NULL, 1, 26),
(21, '199934567890', '1992-10-26', 30, 'Male', 752385623, 'No.02/B, Clark Residence, Metropolis', 'Married', NULL, NULL, NULL, '2022-11-26-27', NULL, 1, 27),
(22, '931782092v', '1999-06-09', 23, 'Male', 712170845, 'No.22/1A, Wijayamangalarama road, kohuwala', 'Married', NULL, NULL, NULL, '2022-12-07-28', NULL, 1, 28),
(23, '199967834539', '1999-07-15', 23, 'Male', 728956234, 'no.22/1, reid avenue,colombo 07', 'not Married', NULL, NULL, NULL, '2022-12-15-33', NULL, 1, 33),
(24, '78566788565', '1998-06-17', 24, 'Female', 723456789, 'no.22/1, idsidsuds, jisjdjsid', 'not Married', NULL, NULL, NULL, '2022-12-15-34', NULL, 1, 34);

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
-- Table structure for table `tbl_prescription`
--

CREATE TABLE `tbl_prescription` (
  `id` int(11) NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `diagnosis` text NOT NULL,
  `special_note` varchar(255) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_presc_medicine`
--

CREATE TABLE `tbl_presc_medicine` (
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dosage` int(11) NOT NULL,
  `frequency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_remembered`
--

CREATE TABLE `tbl_remembered` (
  `token_hash` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_remembered`
--

INSERT INTO `tbl_remembered` (`token_hash`, `user_id`, `expires_at`) VALUES
('09e0da3d9c4acc0f9ff9608ab4b88cd3a492673cd7f26d0290bba7a337b155fc', 4, '2022-12-08 19:57:36'),
('3d0d4060dc31680dcb0178509dc3952dc19cd34a77546e2f050b7d418b51ab6b', 4, '2022-12-08 08:38:38'),
('47cc6d6beebcdc70ca22a4ace8d368d5946d6e7be484e17c81686fe9b0c65c94', 4, '2022-12-08 08:31:05'),
('5c436d5f5206e77dee4760d7f0f7601d7ea17e533013432e11b3fb5263bd6e49', 4, '2022-12-08 08:28:04');

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
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_reg_no` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1=available, 0=not available',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email`, `username`, `password`, `avatar`, `created_at`, `role_id`) VALUES
(2, 'Jayani', 'Ranasinghe', 'jayani56@gmail.com', 'jayani', '$2y$10$PKYOpFLEJ9gH7iL2BySN3efqrHWsSQyyxVF6pZCB7VTxkQvc25uEa\n', NULL, '2022-12-05 01:31:57', 4),
(4, 'john', 'doe', 'john123@gmail.com', 'johnD123', '$2y$10$U.vXWSpQuOgskwOOLWyciurpSII6uPenYQAZzk1WaxGS/bf5wmRKG', 'http://localhost/ayumed/images/profile.jpg', '2022-12-11 18:09:54', 2),
(12, 'rash', 'sena', 'rashsena@gmail.com', 'rashsena123', '$2y$10$CNB/UEAu9XTIl.O5J2S9vuBatYJT63nQIeQoB6yQ7TVtrWPrq0PNC', NULL, '2022-12-05 08:40:31', 4),
(14, 'Jayani', 'Ivanthika', 'jayeiva123@gmail.com', 'Jayani12345', '$2y$10$dzAhgrQaCc2ikKRPoZf9bux1StU7HZSIpJG0NoeyYRCSklieFIwhe', NULL, '2022-12-13 10:12:11', 4),
(23, 'Dinith', 'Kumudika', 'kumudika2468@gmail.com', 'dinith99', '$2y$10$65bDmfyAbdY9jcS7kGAyMe79OtAH2a1ETk6FHhUt6bERfIS8Ebfv6', 'http://localhost/ayumed/images/profile.jpg', '2022-12-11 18:10:08', 1),
(25, 'Vishwa', 'Rajakaruna', 'dinithwalpitagama@gmail.com', 'vishR123', '$2y$10$hU2f9qfl/TfsgCNjtBuSduMaN0fS5TUSHaNkn7PMNZcYezVoYbTs2', 'http://localhost/ayumed/images/profile.jpg', '2022-12-11 18:10:16', 1),
(26, 'Bruce', 'Wayne', 'walpitagama1999@gmail.com', 'brucewayne12', '$2y$10$EuLxn0A0m5W1RMO24B.xgOoAeVK69ZAVqNAOAUTjQUrR4zSg7kAnK', 'http://localhost/ayumed/images/profile.jpg', '2022-12-11 18:10:24', 1),
(27, 'Clark', 'Kent', 'walpitagama1999@gmail.com', 'clarkKent', '$2y$10$P8vEIXandhDQYnqjo3JK7u2vAzVQ2o3VN6ICbi/15eKOoZmb8E4wC', 'http://localhost/ayumed/images/profile.jpg', '2022-12-11 18:10:32', 1),
(28, 'vishwa', 'rajakaruna', 'vishwarajakaruna.jit@gmail.com', 'vishwa123', '$2y$10$nEeV32vhJTDbZQrms39pteCIECtEl9D2jF4DwwSaM9n.h3UKlNUfS', 'http://localhost/ayumed/images/profile.jpg', '2022-12-11 18:10:42', 1),
(32, 'aa', 'aa', 'hmpabasara99@gmail.com', 'nimal1234', '$2y$10$s7LUBvSvIAT9S1rGeu.Dtuaktv3wGppYQhfIVXfvL9VD7SZ3VE9iS', NULL, '2022-12-14 02:28:55', 2),
(33, 'Pabasara', 'Samaranayake', 'jayaniranasinghe98@gmail.com', 'pabasara123', '$2y$10$tRjNOdBH4cpeSQrQIU9oVOGDGYBCKDbHJ0.2gAF9gy1vFl1hGtWL2', 'http://localhost/ayumed/images/profile.jpg', '2022-12-15 06:28:09', 1),
(34, 'Jayanai', 'Ranasinghe', 'kumudikadinith@gmail.com', 'dinithK1218', '$2y$10$6YamNQFxA0bcx5ad0KpBMeo6uNPn/7fWRFwN2pKglx94q7c2ZX1s.', 'http://localhost/ayumed/images/profile.jpg', '2022-12-15 08:19:37', 1);

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
-- Indexes for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_doctors_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_medicines`
--
ALTER TABLE `tbl_medicines`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_pharmacists`
--
ALTER TABLE `tbl_pharmacists`
  ADD PRIMARY KEY (`pharmacist_id`),
  ADD KEY `Foreign` (`user_id`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `user-staff` (`user_id`);

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
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_medicines`
--
ALTER TABLE `tbl_medicines`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_pharmacists`
--
ALTER TABLE `tbl_pharmacists`
  MODIFY `pharmacist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
-- Constraints for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  ADD CONSTRAINT `tbl_doctors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD CONSTRAINT `tbl_patients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pharmacists`
--
ALTER TABLE `tbl_pharmacists`
  ADD CONSTRAINT `Foreign` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_remembered`
--
ALTER TABLE `tbl_remembered`
  ADD CONSTRAINT `tbl_remembered_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD CONSTRAINT `user-staff` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `user-role` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
