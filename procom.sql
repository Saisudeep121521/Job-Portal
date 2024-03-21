-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 08:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `procom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `jobId` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`id`, `username`, `jobId`, `date`) VALUES
(66, 'sai', 12, '2024-03-18'),
(67, 'sai', 9, '2024-03-18'),
(68, 'user@123', 9, '2024-03-18'),
(69, 'user@123', 12, '2024-03-18'),
(70, 'vinni123', 9, '2024-03-18'),
(71, 'vinni123', 12, '2024-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `jobslist`
--

CREATE TABLE `jobslist` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `location` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `period` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `skills` longtext NOT NULL,
  `lpa` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobslist`
--

INSERT INTO `jobslist` (`id`, `title`, `location`, `role`, `period`, `description`, `skills`, `lpa`) VALUES
(9, 'Cortox', 'Delhi', 'SAP Developer', 'Full Time', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur', 'CSS, Php,Html,Javascript', 5),
(12, 'Procom', 'Delhi', 'PHP Developer', 'Full Time', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae architecto eveniet, dolor quo repellendus pariatur', '', 4),
(14, ' Software Engineer', 'San Francisco, CA', 'UI/UX Developer', 'Full Time', 'We are seeking a skilled Software Engineer to join our team in developing innovative software solutions for our clients. The ideal candidate will have experience in Java development, strong problem-solving skills, and a passion for creating high-quality software products.', '', 5),
(15, 'Marketing', 'Hyderabad', 'Marketing Manager', 'Part Time', ' We are looking for an experienced Marketing Manager to lead our marketing efforts and drive growth for our company. The successful candidate will have proven experience in developing and executing marketing strategies, strong analytical skills, and the ability to manage multiple projects simultaneously.', '', 3),
(16, 'Data Scientist', 'Delhi', 'Python Developer', 'Full Time', 'We are seeking a talented Data Scientist to join our team on a contract basis. The ideal candidate will have a background in statistics, machine learning, and programming languages such as Python or R. Responsibilities include analyzing large datasets, developing predictive models, and communicating findings to stakeholders.', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `phonenumber`) VALUES
(1, 'Sai Sudeep', 'user', 'user', 'saisudeep226@gmail.com', 0),
(2, 'sai sudeep', 'sai', 'sai', 'saisudeep121521@gmail.com', 0),
(6, 'prashanth', 'user@123', '123', 'prashanth@gmail.com', 0),
(7, 'Vinni', 'vinni123', 'vinni', 'vinni@gmail.com', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobslist`
--
ALTER TABLE `jobslist`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `jobslist`
--
ALTER TABLE `jobslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
