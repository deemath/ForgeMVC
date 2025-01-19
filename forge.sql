-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2025 at 07:43 PM
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
-- Database: `forge`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp(),
  `image` longblob DEFAULT NULL,
  `address` varchar(300) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`id`, `name`, `email`, `password`, `institute`, `createdat`, `image`, `address`, `phone`) VALUES
(3, 'Kavisena Rathnapala', 'kavisena@gmail.com', 'securepass1', 'University of Colombo', '2024-11-22 00:00:00', NULL, '', 0),
(4, 'Nisansala Herath', 'nisansala@gmail.com', 'securepass2', 'Ruhuna University', '2024-11-22 00:00:00', NULL, '', 0),
(5, 'Harsha Samarasinghe', 'harsha@gmail.com', 'securepass3', 'Kelaniya University', '2024-11-22 00:00:00', NULL, '', 0),
(6, 'Ruwanthi Perera', 'ruwanthi@gmail.com', 'securepass4', 'Sri Jayewardenepura University', '2024-11-22 00:00:00', NULL, '', 0),
(7, 'Samantha Kumara', 'samantha1@gmail.com', 'securepass5', 'Peradeniya University nice', '2024-11-22 00:00:00', NULL, '', 0),
(8, 'Mihiri Wijesinghe', 'mihiri@gmail.com', 'securepass6', 'Eastern University', '2024-11-22 00:00:00', NULL, '', 0),
(10, 'Thilini Jayasuriya', 'thilini@gmail.com', 'securepass8', 'Uva Wellassa University', '2024-11-22 00:00:00', NULL, '', 0),
(11, 'Sandun Amarasinghe', 'sandun@gmail.com', 'securepass9', 'Sabaragamuwa University', '2024-11-22 00:00:00', NULL, '', 0),
(21, 'deshan', 'uoc@gmail.com', 'qwertyuiop', 'uoc', '2024-12-02 14:21:01', NULL, 'mathara', 787878999),
(22, 'isuru', 'deemath.ish@gmail.com', 'qwertyuiop', 'Sabaragamuwa University', '2024-12-02 14:25:10', NULL, 'mathara', 786768882),
(23, 'kamal', 'kamal@gmail.com', 'password123', 'uov', '2024-12-02 14:35:48', NULL, 'colombo', 786768882);

-- --------------------------------------------------------

--
-- Table structure for table `coordinator-user`
--

CREATE TABLE `coordinator-user` (
  `id` int(11) NOT NULL,
  `coordinatorid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `createdat` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinator-user`
--

INSERT INTO `coordinator-user` (`id`, `coordinatorid`, `userid`, `createdat`) VALUES
(13, 1, 9, '2024-12-02 05:29:42'),
(14, 1, 2, '2024-12-02 05:29:42'),
(15, 1, 11, '2024-12-02 05:30:18'),
(17, 1, 1, '2024-12-02 05:31:14'),
(19, 4, 1, '2024-12-02 09:06:22'),
(20, 5, 1, '2024-12-02 09:06:25'),
(21, 6, 1, '2024-12-05 09:35:19'),
(22, 23, 7, '2025-01-19 07:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `cosupervisor-project`
--

CREATE TABLE `cosupervisor-project` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `uploadby` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `coordinatorid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invitation`
--

INSERT INTO `invitation` (`id`, `userid`, `coordinatorid`, `status`, `role`, `date`) VALUES
(11, 1, 3, 1, 1, '2024-12-02 05:28:20'),
(12, 1, 6, 1, 1, '2024-12-02 05:28:29'),
(13, 1, 4, 1, 1, '2024-12-02 05:28:40'),
(14, 1, 5, 1, 1, '2024-12-02 05:28:54'),
(20, 7, 23, 1, 1, '2025-01-19 07:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `member-project`
--

CREATE TABLE `member-project` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member-project`
--

INSERT INTO `member-project` (`id`, `userid`, `projectid`, `createdat`) VALUES
(2, 7, 4, '2025-01-09 06:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(2555) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `createdat` date NOT NULL DEFAULT current_timestamp(),
  `updatedat` date NOT NULL,
  `coordinatorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `description`, `startdate`, `enddate`, `createdat`, `updatedat`, `coordinatorid`) VALUES
(4, 'EcoHaven', 'An eco-friendly housing development incorporating renewable energy...', '2024-10-15', '2024-11-30', '2024-10-01', '2024-10-15', 4),
(5, 'Smart AgriTech', 'A precision agriculture platform to boost productivity using IoT sensors...', '2024-11-05', '2024-12-05', '2024-11-13', '2024-11-13', 1),
(9, 'RecycleWell', 'An innovative recycling system to manage and repurpose urban waste...', '2024-07-10', '2024-08-25', '2024-07-15', '2024-07-30', 1),
(32, 'adfsf', 'sdfdsfsd', '1222-12-21', '2323-02-01', '2024-11-30', '2024-11-30', 15),
(33, 'adfsf', 'sdfdsfsd', '1222-12-21', '2323-02-01', '2024-11-30', '2024-11-30', 15),
(34, 'adfsf', 'sdfdsfsd', '1222-12-21', '2323-02-01', '2024-11-30', '2024-11-30', 15);

-- --------------------------------------------------------

--
-- Table structure for table `subtask`
--

CREATE TABLE `subtask` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `projectid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subtask`
--

INSERT INTO `subtask` (`id`, `title`, `description`, `startdate`, `enddate`, `projectid`, `taskid`, `createdat`) VALUES
(1, 'sub', 'Description for task 1', '2024-11-01', '2024-11-10', 1, 21, '2024-12-01 09:39:43'),
(2, 'Task 2', 'Description for task 2', '2024-11-02', '2024-11-11', 1, 20, '2024-12-01 09:39:43'),
(3, 'Task 3', 'Description for task 3', '2024-11-03', '2024-11-12', 1, 21, '2024-12-01 09:39:43'),
(4, 'Task 4', 'Description for task 4', '2024-11-04', '2024-11-13', 1, 21, '2024-12-01 09:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor-project`
--

CREATE TABLE `supervisor-project` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `createdat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor-project`
--

INSERT INTO `supervisor-project` (`id`, `userid`, `projectid`, `createdat`) VALUES
(6, 1, 1, '2024-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(2555) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `createdby` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `no`, `title`, `description`, `startdate`, `enddate`, `createdby`, `status`, `projectid`, `createddate`) VALUES
(1, 1, 'Draw er diagrams', 'description for task 1', '2024-12-03', '2024-12-11', 3, 0, 1, '2024-12-02 05:16:38'),
(2, 2, 'Task 2', 'Description for task 02', '2024-12-03', '2024-12-19', 3, 1, 1, '2024-12-02 05:18:01'),
(3, 3, 'Draw figma', 'description for figma drawing', '2024-12-04', '2024-12-27', 2, 2, 1, '2024-12-02 05:20:10'),
(4, 4, 'task 04', 'Description for task 04', '2024-12-04', '2024-12-20', 2, 2, 1, '2024-12-02 05:20:10'),
(5, 5, 'task forge', 'dummy data for testing', '1211-12-02', '2112-01-21', 1, 1, 1, '2024-12-02 05:38:02'),
(24, 1, 'deemath', 'testing task', '2025-01-14', '2025-01-14', 1, 1, 4, '2025-01-01 04:55:24'),
(25, 2, 'task twsting', 'this is a testing task', '2022-03-23', '2024-06-12', 1, 1, 4, '2025-01-09 04:48:59'),
(26, 3, 'task', 'testing 123', '2022-08-12', '2014-08-13', 1, 1, 4, '2025-01-09 07:29:37'),
(27, 4, 'task', 'dummy', '2022-12-12', '2023-11-11', 1, 1, 4, '2025-01-10 07:07:18'),
(28, 5, 'task', 'dummy', '2022-12-12', '2023-11-11', 1, 1, 4, '2025-01-10 07:16:44'),
(29, 6, 'task', 'dummy', '2022-12-12', '2023-11-11', 1, 1, 4, '2025-01-10 07:32:37'),
(30, 7, 'task', 'dummy', '2022-12-12', '2023-11-11', 1, 1, 4, '2025-01-10 07:39:01'),
(31, 8, 'task', 'dummy', '2022-12-12', '2023-11-11', 1, 1, 4, '2025-01-10 07:55:31'),
(32, 9, 'task', 'dummy', '2022-12-12', '2023-11-11', 1, 1, 4, '2025-01-10 08:06:35'),
(33, 10, 'task', 'dummy', '2022-12-12', '2023-11-11', 1, 1, 4, '2025-01-10 08:07:32'),
(34, 11, 'task', 'dummy', '2022-12-12', '2023-11-11', 1, 1, 4, '2025-01-10 08:12:35'),
(35, 12, 'fsdf', 'fsdfdsf', '2022-11-12', '2022-12-11', 1, 1, 4, '2025-01-10 08:17:00'),
(36, 13, 'fsdf', 'fsdfdsf', '2022-11-12', '2022-12-11', 1, 1, 4, '2025-01-10 08:17:36'),
(37, 14, 'fsdf', 'fsdfdsf', '2022-11-12', '2022-12-11', 1, 1, 4, '2025-01-10 08:25:32'),
(39, 16, 'fsdf', 'fsdfdsf', '2022-11-12', '2022-12-11', 1, 1, 4, '2025-01-10 08:28:22'),
(40, 17, 'fsdf', 'fsdfdsf', '2022-11-12', '2022-12-11', 1, 1, 4, '2025-01-10 08:41:00'),
(41, 18, 'fsdf', 'fsdfdsf', '2022-11-12', '2022-12-11', 1, 1, 4, '2025-01-10 08:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `taskassign`
--

CREATE TABLE `taskassign` (
  `id` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taskassign`
--

INSERT INTO `taskassign` (`id`, `taskid`, `memberid`, `created`) VALUES
(3, 1, 4, '2024-12-02'),
(4, 2, 7, '2024-12-02'),
(5, 3, 4, '2024-12-02'),
(6, 4, 7, '2024-12-02'),
(7, 1, 7, '2025-01-10'),
(8, 43, 7, '2025-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` longblob DEFAULT NULL,
  `createdat` date NOT NULL DEFAULT current_timestamp(),
  `coordinatorid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `image`, `createdat`, `coordinatorid`) VALUES
(1, 'Kamal Perera', 'kamal@gmail.com', 771234567, 'password123', NULL, '2024-11-22', NULL),
(2, 'Nimali Jayasuriya', 'nimali@gmail.com', 772345678, 'nimali2024', NULL, '2024-11-22', NULL),
(3, 'Sandun Silva', 'sandun@gmail.com', 773456789, 'sandun@secure', NULL, '2024-11-22', NULL),
(4, 'Ruwanthi Fernando', 'ruwanthi@gmail.com', 774567890, 'ruwanthi@pass', NULL, '2024-11-22', NULL),
(5, 'Janith Wickramasinghe', 'janith@gmail.com', 775678901, 'janith@123', NULL, '2024-11-22', NULL),
(6, 'Pasan Herath', 'pasan@gmail.com', 776789012, 'pasan@2024', NULL, '2024-11-22', NULL),
(7, 'Mihiri Wijesinghe', 'mihiri@gmail.com', 777890123, 'mihiri@secure', NULL, '2024-11-22', NULL),
(8, 'Ashen Kumara', 'ashen@gmail.com', 778901234, 'ashen@1234', NULL, '2024-11-22', NULL),
(9, 'Tharindu Perera', 'tharindu@gmail.com', 779012345, 'tharindu@pw', NULL, '2024-11-22', NULL),
(10, 'Chathuni Ranasinghe', 'chathuni@gmail.com', 771012346, 'chathuni@!23', NULL, '2024-11-22', NULL),
(11, 'wdfw fwewfer', 'sdsd@gmail.com', 786768882, 'qwertyuiop', NULL, '2024-12-01', NULL),
(12, 'dee', 'dee1@gmail.com', 787878999, 'qwertyuiop', NULL, '2024-12-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`id`, `userid`, `projectid`, `role`) VALUES
(4, 3, 1, 2),
(5, 4, 1, 2),
(6, 4, 1, 4),
(7, 7, 1, 4),
(8, 1, 1, 2),
(9, 1, 4, 3),
(10, 1, 5, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinator-user`
--
ALTER TABLE `coordinator-user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cosupervisor-project`
--
ALTER TABLE `cosupervisor-project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid12` (`userid`),
  ADD KEY `fk_coordinatorid12` (`coordinatorid`);

--
-- Indexes for table `member-project`
--
ALTER TABLE `member-project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtask`
--
ALTER TABLE `subtask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor-project`
--
ALTER TABLE `supervisor-project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taskassign`
--
ALTER TABLE `taskassign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coordinator`
--
ALTER TABLE `coordinator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `coordinator-user`
--
ALTER TABLE `coordinator-user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cosupervisor-project`
--
ALTER TABLE `cosupervisor-project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `member-project`
--
ALTER TABLE `member-project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `subtask`
--
ALTER TABLE `subtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supervisor-project`
--
ALTER TABLE `supervisor-project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `taskassign`
--
ALTER TABLE `taskassign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coordinator-user`
--
ALTER TABLE `coordinator-user`
  ADD CONSTRAINT `fk_projectid3` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invitation`
--
ALTER TABLE `invitation`
  ADD CONSTRAINT `fk_coordinatorid12` FOREIGN KEY (`coordinatorid`) REFERENCES `coordinator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userid12` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisor-project`
--
ALTER TABLE `supervisor-project`
  ADD CONSTRAINT `fk_supervisorId` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_createdby` FOREIGN KEY (`createdby`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taskassign`
--
ALTER TABLE `taskassign`
  ADD CONSTRAINT `fk_memberid` FOREIGN KEY (`memberid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_coordinatorId` FOREIGN KEY (`coordinatorid`) REFERENCES `coordinator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
