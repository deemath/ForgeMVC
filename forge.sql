-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2024 at 09:43 AM
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
(2, 'Baththara Mulle Siila Rathana', 'aapatiyo@gmail.com', 'anehalo', 'Parlimenthuwa', '2024-11-22 00:00:00', NULL, '', 0),
(3, 'Kavisena Rathnapala', 'kavisena@gmail.com', 'securepass1', 'University of Colombo', '2024-11-22 00:00:00', NULL, '', 0),
(4, 'Nisansala Herath', 'nisansala@gmail.com', 'securepass2', 'Ruhuna University', '2024-11-22 00:00:00', NULL, '', 0),
(5, 'Harsha Samarasinghe', 'harsha@gmail.com', 'securepass3', 'Kelaniya University', '2024-11-22 00:00:00', NULL, '', 0),
(6, 'Ruwanthi Perera', 'ruwanthi@gmail.com', 'securepass4', 'Sri Jayewardenepura University', '2024-11-22 00:00:00', NULL, '', 0),
(7, 'Samantha Kumara', 'samantha1@gmail.com', 'securepass5', 'Peradeniya University nice', '2024-11-22 00:00:00', NULL, '', 0),
(8, 'Mihiri Wijesinghe', 'mihiri@gmail.com', 'securepass6', 'Eastern University', '2024-11-22 00:00:00', NULL, '', 0),
(9, 'Ruwan Senanayake', 'ruwan@gmail.com', 'securepass7', 'Wayamba University', '2024-11-22 00:00:00', NULL, '', 0),
(10, 'Thilini Jayasuriya', 'thilini@gmail.com', 'securepass8', 'Uva Wellassa University', '2024-11-22 00:00:00', NULL, '', 0),
(11, 'Sandun Amarasinghe', 'sandun@gmail.com', 'securepass9', 'Sabaragamuwa University', '2024-11-22 00:00:00', NULL, '', 0),
(14, 'upali', 'deemath.ish.55@gmail.com', 'needformed', 'Sabaragamuwa University', '2024-11-30 00:53:59', NULL, 'mathara', 786768882),
(15, 'kamal', 'kamal@gmail.com', 'password123', 'ucsc', '2024-11-30 12:22:40', NULL, 'mirigama', 786768882);

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
(1, 1, 5, 0, 2, '2024-11-30 07:50:50'),
(2, 3, 5, 1, 2, '2024-11-30 07:50:50'),
(3, 4, 5, 2, 2, '2024-11-30 07:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `member-project`
--

CREATE TABLE `member-project` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `createdat` date NOT NULL DEFAULT current_timestamp(),
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'Green Future', 'A project to develop sustainable energy sources for remote communities...', '2024-11-01', '2024-12-15', '2024-11-13', '2024-11-13', 2),
(4, 'EcoHaven', 'An eco-friendly housing development incorporating renewable energy...', '2024-10-15', '2024-11-30', '2024-10-01', '2024-10-15', 3),
(5, 'Smart AgriTech', 'A precision agriculture platform to boost productivity using IoT sensors...', '2024-11-05', '2024-12-05', '2024-11-13', '2024-11-13', 4),
(6, 'Urban Oasis', 'Transforming urban rooftops into lush, green farming spaces...', '2024-09-01', '2024-10-31', '2024-09-01', '2024-09-15', 5),
(7, 'CleanWater Initiative', 'A water purification project for rural areas affected by contamination...', '2024-10-01', '2024-11-10', '2024-10-05', '2024-10-20', 2),
(8, 'SolarUp', 'Providing solar panel installations to low-income households...', '2024-08-01', '2024-09-15', '2024-08-01', '2024-08-30', 3),
(9, 'RecycleWell', 'An innovative recycling system to manage and repurpose urban waste...', '2024-07-10', '2024-08-25', '2024-07-15', '2024-07-30', 4),
(11, 'HealthNet', 'A mobile health application for remote diagnostics and consultations...', '2024-11-01', '2024-12-20', '2024-11-10', '2024-11-20', 5);

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
  `createddate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `createddate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `no`, `title`, `description`, `startdate`, `enddate`, `createdby`, `status`, `projectid`, `createddate`) 
VALUES
(1, 1, 'Design Database', 'Design the database schema for the project.', '2024-01-01', '2024-01-10', 1, 1, 4, '2024-01-01'),
(2, 2, 'Implement Login', 'Develop and test the login functionality.', '2024-01-11', '2024-01-20', 1, 2, 4, '2024-01-02'),
(3, 3, 'Set Up Hosting', 'Set up the hosting environment for deployment.', '2024-01-15', '2024-01-25', 2, 0, 4, '2024-01-05'),
(4, 4, 'Create Frontend', 'Design and code the user interface.', '2024-01-05', '2024-01-12', 1, 1, 4, '2024-01-03'),
(5, 5, 'Test Application', 'Perform end-to-end testing on the application.', '2024-01-20', '2024-01-30', 3, 2, 4, '2024-01-10'),
(6, 6, 'Write Documentation', 'Prepare user and technical documentation.', '2024-01-25', '2024-02-05', 2, 0, 4, '2024-01-20'),
(7, 7, 'Integrate API', 'Connect and integrate the external APIs.', '2024-02-01', '2024-02-10', 3, 1, 4, '2024-01-25'),
(8, 8, 'Finalize Project', 'Compile and finalize the entire project for submission.', '2024-02-05', '2024-02-15', 1, 2, 4, '2024-01-30'),
(9, 9, 'Create Reports', 'Generate necessary reports for analysis.', '2024-01-18', '2024-01-25', 3, 0, 3, '2024-01-15'),
(10, 10, 'Fix Bugs', 'Address issues identified during testing.', '2024-02-10', '2024-02-20', 1, 1, 2, '2024-02-01');



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
    (1, 1, 1, '2024-11-01'),
    (2, 2, 1, '2024-11-01'),
    (3, 3, 1, '2024-11-02'),
    (4, 4, 1, '2024-11-03'),
    (5, 5, 2, '2024-11-04'),
    (6, 6, 3, '2024-11-05'),
    (7, 7, 1, '2024-11-06'),
    (8, 8, 2, '2024-11-07'),
    (9, 9, 1, '2024-11-08'),
    (10, 10, 3, '2024-11-09');


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
(10, 'Chathuni Ranasinghe', 'chathuni@gmail.com', 771012346, 'chathuni@!23', NULL, '2024-11-22', NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projectid3` (`userid`),
  ADD KEY `fk_coordinatorid3` (`coordinatorid`);

--
-- Indexes for table `cosupervisor-project`
--
ALTER TABLE `cosupervisor-project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cosupervisorid` (`userid`),
  ADD KEY `fk_projectid1` (`projectid`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projectid2` (`projectid`),
  ADD KEY `fk_userid2` (`userid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coordinatorId1` (`coordinatorid`);

--
-- Indexes for table `subtask`
--
ALTER TABLE `subtask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor-project`
--
ALTER TABLE `supervisor-project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supervisorId` (`userid`),
  ADD KEY `fk_projectId` (`projectid`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projectid4` (`projectid`),
  ADD KEY `fk_createdby` (`createdby`);

--
-- Indexes for table `taskassign`
--
ALTER TABLE `taskassign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_memberid` (`memberid`),
  ADD KEY `fk_taskid` (`taskid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `coordinator-user`
--
ALTER TABLE `coordinator-user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cosupervisor-project`
--
ALTER TABLE `cosupervisor-project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member-project`
--
ALTER TABLE `member-project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subtask`
--
ALTER TABLE `subtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supervisor-project`
--
ALTER TABLE `supervisor-project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taskassign`
--
ALTER TABLE `taskassign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coordinator-user`
--
ALTER TABLE `coordinator-user`
  ADD CONSTRAINT `fk_coordinatorid3` FOREIGN KEY (`coordinatorid`) REFERENCES `coordinator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_projectid3` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cosupervisor-project`
--
ALTER TABLE `cosupervisor-project`
  ADD CONSTRAINT `fk_cosupervisorid` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_projectid1` FOREIGN KEY (`projectid`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invitation`
--
ALTER TABLE `invitation`
  ADD CONSTRAINT `fk_coordinatorid12` FOREIGN KEY (`coordinatorid`) REFERENCES `coordinator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userid12` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member-project`
--
ALTER TABLE `member-project`
  ADD CONSTRAINT `fk_projectid2` FOREIGN KEY (`projectid`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userid2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_coordinatorId1` FOREIGN KEY (`coordinatorid`) REFERENCES `coordinator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisor-project`
--
ALTER TABLE `supervisor-project`
  ADD CONSTRAINT `fk_projectId` FOREIGN KEY (`projectid`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supervisorId` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_createdby` FOREIGN KEY (`createdby`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_projectid4` FOREIGN KEY (`projectid`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taskassign`
--
ALTER TABLE `taskassign`
  ADD CONSTRAINT `fk_memberid` FOREIGN KEY (`memberid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_taskid` FOREIGN KEY (`taskid`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
