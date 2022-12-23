-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 09:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project101`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(255) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fname`, `lname`, `email`, `password`, `account_created`) VALUES
(1, 'Abdul Rauf', 'Sultan', 'ars_employee@mail', '12345678', '2022-12-02 20:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `queu`
--

CREATE TABLE `queu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `queu_no` int(11) NOT NULL DEFAULT 1000,
  `dpt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queu`
--

INSERT INTO `queu` (`id`, `name`, `email`, `queu_no`, `dpt`) VALUES
(35, 'Abdul Rauf M. Sultan', 'ars@mail.com', 1001, 'GC Clinic'),
(37, 'Abdul Sultan', 'ars@mail.com', 1002, 'GC Clinic'),
(38, 'Kiane Dave Alceso', 'kda@mail.com', 1003, 'GC Clinic'),
(39, 'Treisha Mae Monteza', 'tmm@mail.com', 1004, 'REGISTRAR');

--
-- Triggers `queu`
--
DELIMITER $$
CREATE TRIGGER `queue_number` BEFORE INSERT ON `queu` FOR EACH ROW SET NEW.queu_no = (SELECT MAX(queu_no) FROM queu) + 1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `stud_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stud_id`, `fname`, `lname`) VALUES
(1, 201910399, 'Abdul Rauf', 'Sultan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `archived` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `student_id`, `password`, `date_created`, `archived`) VALUES
(41, 'Kiane', 'Alceso', '201910320@mail.com', 201910320, '$2y$10$7GieoUqHx/kMlw.t.kFx6Oo3L.Y.EscdEauWo4krRNyD8fvmJwzV2', '2022-12-02 18:03:15', 0),
(43, 'Kiane', 'Alceso', '201910320@mail.com', 201910320, '$2y$10$0DI6LxCBkNHTpRjoQuEP4eKx0riuqnL2E2A.flb8ky6i8sw1662wy', '2022-12-04 00:26:02', 0),
(44, 'bria', 'vane', '201110320@mail.com', 201110320, '$2y$10$6vEpTwcRCHmTdHt3uJvwauXAuwFmYkniNCTNobqCROr3qzgDSURkW', '2022-12-07 23:58:29', 0),
(45, 'Kiane', 'Alceso', '201910320@mail.com', 201910320, '$2y$10$j5z867z7BlBpWH/3nipK6.Sv8jy0hmBDCSJ8viwRYVicdep6fVfiG', '2022-12-23 10:31:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queu`
--
ALTER TABLE `queu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `queu`
--
ALTER TABLE `queu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
