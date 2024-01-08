-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 03:21 PM
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
-- Database: `complaints_suggestions_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `feedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `title`, `description`, `status`, `feedback`) VALUES
(1, 2, 'Noisy Neighbors', 'The constant noise from my neighbors is disrupting my peace. I kindly request you to address this issue and ensure a quieter living environment.', 1, 'We apologize for the inconvenience caused by the noise. Our team will investigate and address the issue promptly to ensure a peaceful living environment.'),
(3, 2, 'Water Leakage in Bathroom', 'There is a persistent water leakage issue in my bathroom, causing damage to the ceiling. Urgent attention is needed to fix the problem and prevent further damage.', 1, 'We understand the urgency of the situation. Our maintenance team will prioritize the repair to prevent further damage. Thank you for bringing this to our attention.'),
(4, 3, 'Potholes on Street', 'The street in front of my house is filled with potholes, making it difficult to drive. It\'s a safety concern, and I request that the road be repaired at the earliest.', 1, 'Your safety is our priority. We will schedule road maintenance to address the potholes and ensure a smooth and secure driving experience. Thank you for reporting.'),
(6, 2, 'Garbage Collection Delays', 'Garbage collection has been consistently delayed in our area, leading to a buildup of waste. This needs immediate attention to maintain cleanliness and hygiene.', 0, ''),
(7, 3, 'Inadequate Street Lighting', 'The street lighting in our neighborhood is inadequate, especially in the evenings. Improved lighting is crucial for the safety of residents. Please address this concern promptly.', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `feedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `user_id`, `title`, `description`, `status`, `feedback`) VALUES
(1, 2, 'Recycling Program', 'Implementing a community-wide recycling program would contribute to environmental sustainability. I suggest providing separate bins for recyclables and organizing awareness campaigns.', 1, 'Your suggestion aligns with our commitment to sustainability. We will explore the implementation of a recycling program and promote awareness in the community. Thank you for your proactive idea.'),
(4, 2, 'Public Transportation Expansion', 'To ease traffic congestion, consider expanding public transportation services. This could include additional bus routes and improved connectivity to key areas in the city.', 0, NULL),
(5, 3, 'Green Spaces Enhancement', 'Enhancing existing green spaces and creating new ones can improve the overall well-being of residents. Planting more trees and adding benches would create inviting outdoor areas.', 1, 'We appreciate your suggestion for enhancing green spaces. Our urban planning team will explore opportunities to plant more trees and create inviting outdoor areas for residents to enjoy.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `password`, `user_type`) VALUES
(1, 'Admin', 'Admin', 'admin123', 'admin'),
(2, 'Ahmed', 'Ahmed Mohammed', 'ahmed123', 'user'),
(3, 'Mohammed', 'Mohammed Taha', 'mohammed123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
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
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
