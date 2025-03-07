-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 07:49 AM
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
-- Database: `lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(255) NOT NULL,
  `blog_name` varchar(255) NOT NULL,
  `blog_publish_date` varchar(255) NOT NULL,
  `blog_user_name` varchar(255) NOT NULL,
  `blog_description` mediumtext NOT NULL,
  `blog_tag` varchar(255) NOT NULL,
  `blog_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_crud`
--

CREATE TABLE `lawyer_crud` (
  `id` int(255) NOT NULL,
  `lawyer_name` varchar(255) NOT NULL,
  `lawyer_type` varchar(255) NOT NULL,
  `lawyer_biography` mediumtext NOT NULL,
  `lawyer_research` mediumtext NOT NULL,
  `lawyer_address` varchar(255) NOT NULL,
  `lawyer_picture` varchar(255) NOT NULL,
  `day_1` varchar(255) NOT NULL,
  `start_time_1` varchar(255) NOT NULL,
  `end_time_1` varchar(500) NOT NULL,
  `day_2` varchar(255) NOT NULL,
  `start_time_2` varchar(255) NOT NULL,
  `end_time_2` varchar(255) NOT NULL,
  `day_3` varchar(255) NOT NULL,
  `start_time_3` varchar(255) NOT NULL,
  `end_time_3` varchar(255) NOT NULL,
  `day_4` varchar(255) NOT NULL,
  `start_time_4` varchar(255) NOT NULL,
  `end_time_4` varchar(255) NOT NULL,
  `day_5` varchar(255) NOT NULL,
  `start_time_5` varchar(255) NOT NULL,
  `end_time_5` varchar(255) NOT NULL,
  `day_6` varchar(255) NOT NULL,
  `start_time_6` varchar(255) NOT NULL,
  `end_time_6` varchar(255) NOT NULL,
  `education_qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_image`
--

CREATE TABLE `lawyer_image` (
  `id` int(255) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_list_type`
--

CREATE TABLE `lawyer_list_type` (
  `id` int(255) NOT NULL,
  `lawyer_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_video`
--

CREATE TABLE `lawyer_video` (
  `id` int(255) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(255) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `project_description` varchar(1000) NOT NULL,
  `project_picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_title`, `project_link`, `project_description`, `project_picture`) VALUES
(10, 'Portrait Of Adult Male Working From Home At Night', 'https://ihedu.teamcipher.co.uk/', 'Education', 'portfolio-img-1.png'),
(11, 'Portrait Of Adult Male Working From Home At Night', 'https://ihedu.teamcipher.co.uk/', 'Education', 'portfolio-img-2.png'),
(12, 'Portrait Of Adult Male Working From Home At Night', 'https://ihedu.teamcipher.co.uk/', 'Education', 'portfolio-img-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`) VALUES
(4, 'Iqbal Hossen', 'admin@hms.com', '123456', 'admin', 'iqbalhossen-facebook-profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_crud`
--
ALTER TABLE `lawyer_crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_image`
--
ALTER TABLE `lawyer_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_list_type`
--
ALTER TABLE `lawyer_list_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_video`
--
ALTER TABLE `lawyer_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyer_crud`
--
ALTER TABLE `lawyer_crud`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyer_image`
--
ALTER TABLE `lawyer_image`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyer_list_type`
--
ALTER TABLE `lawyer_list_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyer_video`
--
ALTER TABLE `lawyer_video`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
