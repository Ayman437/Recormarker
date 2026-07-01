-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2026 at 01:48 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `win4`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `numofst` int(11) NOT NULL,
  `presences` int(11) NOT NULL,
  `absences` int(11) NOT NULL,
  `dropouts` int(11) NOT NULL,
  `date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `class`, `teacher`, `numofst`, `presences`, `absences`, `dropouts`, `date`, `lesson`, `code`) VALUES
(1, 49, 1, 12, 9, 1, 2, '2026-07-01 04:11:09', '2', '2_,yes-1,yes-2,yes-3,yes-4,dro-5,yes-6,yes-7,no-8,yes-9,yes-10,yes-11,dro-12');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `pass`, `date`) VALUES
(1, 'admin2', 'K2hDM0VLVDdSQVd1RmMxWVJzREM0QT09', '2024-2-17'),
(6, 'root4', 'U0NYWVlpTVZ0WkxMMmZqUDluY3FVQT09', '2025-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forstage` int(11) NOT NULL,
  `numofst` int(11) NOT NULL,
  `date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `forstage`, `numofst`, `date`) VALUES
(26, '2/1', 11, 0, '2025-02-21'),
(27, '2/2', 11, 0, '2025-02-21'),
(28, '2/3', 11, 0, '2025-02-22'),
(29, '2/4', 11, 0, '2025-02-22'),
(30, '2/5', 11, 0, '2025-02-22'),
(31, '2/6', 11, 0, '2025-02-22'),
(32, '2/7', 11, 0, '2025-02-22'),
(33, '2/8', 11, 0, '2025-02-22'),
(34, '2/9', 11, 0, '2025-02-22'),
(35, '2/10', 11, 0, '2025-02-22'),
(36, '2/11', 11, 0, '2025-02-22'),
(37, '1/1', 10, 0, '2025-02-22'),
(38, '1/2', 10, 0, '2025-02-22'),
(39, '1/3', 10, 0, '2025-02-22'),
(40, '1/4', 10, 0, '2025-02-22'),
(41, '1/5', 10, 0, '2025-02-22'),
(42, '1/6', 10, 0, '2025-02-22'),
(43, '1/7', 10, 0, '2025-02-22'),
(44, '1/8', 10, 0, '2025-02-22'),
(45, '1/9', 10, 0, '2025-02-22'),
(46, '1/10', 10, 0, '2025-02-22'),
(47, '1/11', 10, 0, '2025-02-22'),
(49, '3/1', 13, 12, '2025-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `schooldata`
--

CREATE TABLE `schooldata` (
  `id` int(11) NOT NULL,
  `schoolname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headteacher` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `absencesupervisor` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directorate` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `governorate` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schooldata`
--

INSERT INTO `schooldata` (`id`, `schoolname`, `headteacher`, `absencesupervisor`, `directorate`, `governorate`) VALUES
(1, 'Green Valley High School', 'Sarah Johnson', 'Michael Carter', 'Giza Educational Directorate', 'Giza');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numofc` int(11) NOT NULL,
  `numofst` int(11) NOT NULL,
  `date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`, `numofc`, `numofst`, `date`) VALUES
(10, 'Grade 10', 22, 21, '2025-02-17'),
(11, 'Grade 11', 11, 0, '2025-02-21'),
(13, 'Grade 12', 1, 2, '2025-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `seclanguage` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentcode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borndate` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presence` int(11) NOT NULL,
  `absence` int(11) NOT NULL,
  `dropout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `class`, `seclanguage`, `religion`, `studentcode`, `borndate`, `date`, `presence`, `absence`, `dropout`) VALUES
(1, 'Ahmed Ali', 49, 'German', 'Muslim', 'STU001', '2008-03-12', '2026-07-01', 1, 0, 0),
(2, 'Mina Samir', 49, 'French', 'Christian', 'STU002', '2007-11-05', '2026-07-01', 1, 0, 0),
(3, 'Omar Hassan', 49, 'German', 'Muslim', 'STU003', '2008-01-22', '2026-07-01', 0, 1, 0),
(4, 'Youssef Adel', 49, 'German', 'Muslim', 'STU004', '2007-09-18', '2026-07-01', 1, 0, 0),
(5, 'Mark Nabil', 49, 'German', 'Christian', 'STU005', '2008-06-30', '2026-07-01', 1, 0, 0),
(6, 'Karim Tarek', 49, 'French', 'Muslim', 'STU006', '2007-12-14', '2026-07-01', 0, 1, 0),
(7, 'John Ashraf', 49, 'German', 'Christian', 'STU007', '2008-02-09', '2026-07-01', 1, 0, 0),
(8, 'Hassan Mostafa', 49, 'German', 'Muslim', 'STU008', '2007-10-03', '2026-07-01', 1, 0, 0),
(9, 'Peter George', 49, 'French', 'Christian', 'STU009', '2008-05-27', '2026-07-01', 0, 1, 0),
(10, 'Ali Mahmoud', 49, 'German', 'Muslim', 'STU010', '2007-08-11', '2026-07-01', 1, 0, 0),
(11, 'Alex Adam', 49, 'French', 'Muslim', 'STU011', '2007-08-02', '2026-07-01', 0, 0, 0),
(12, 'Michael Albert', 49, 'French', 'Christian', 'STU011', '2007-08-01', '2026-07-01', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastdate` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `fullname`, `pass`, `subject`, `date`, `lastdate`) VALUES
(1, 'alexMark12', 'Alex Mark', 'RWFTV0lQTlVYUmk4bXdhMjEwbmtvdz09', 'Physics', '2025-2-17', '2026-07-01 04:35:56'),
(2, 'MaxWell13', 'Maxwell Scott', 'T25xOG4rdkw2L0MxVFpYRCtCWUxCUT09', 'English', '2025-02-22', '2025-02-23 02:02:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schooldata`
--
ALTER TABLE `schooldata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
