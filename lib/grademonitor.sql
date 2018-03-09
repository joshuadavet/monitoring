-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 03:51 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grademonitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_ID` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `grade_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_ID` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `grade_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_ID` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `grade_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_ID` int(10) NOT NULL,
  `grade` int(3) DEFAULT NULL,
  `grading_period_ID` int(10) NOT NULL,
  `student_subject_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grading_period`
--

CREATE TABLE `grading_period` (
  `grading_period_ID` int(10) NOT NULL,
  `grading_period` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grading_period`
--

INSERT INTO `grading_period` (`grading_period_ID`, `grading_period`) VALUES
(1, 'First Grading'),
(2, 'second Grading'),
(3, 'Third Grading'),
(4, 'Fourth Grading');

-- --------------------------------------------------------

--
-- Table structure for table `oral`
--

CREATE TABLE `oral` (
  `oral_ID` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `grade_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `c_number` bigint(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_ID`, `name`, `c_number`, `username`, `password`) VALUES
(1, 'Evelyne Libetario', 9754886571, 'parent1', 'parent1'),
(2, 'Annie Lim', 9367758001, 'parent2', 'parent2'),
(3, 'Charlene Mae Lim', 9058884773, 'parent3', 'parent3'),
(4, 'Clara Fe Limbo', 9976638900, 'parent4', 'parent4'),
(5, 'Allen Limpag', 9998873011, 'parent5', 'parent5'),
(6, 'Eva Grave Llanera', 9976009212, 'parent6', 'parent6'),
(7, 'Jonathan Loma', 9359310430, 'parent7', 'parent7'),
(8, 'Meriam Lomod', 9366178001, 'parent8', 'parent8'),
(9, 'Ariel Lood', 9157800291, 'parent9', 'parent9'),
(10, 'Danilo Lubaton', 9752217890, 'parent10', 'parent10'),
(11, 'Ernesto Lura', 9067890021, 'parent11', 'parent11'),
(12, 'Reynaldo Lumayosa', 9952800123, 'parent12', 'parent12'),
(13, 'Ernesto Lusica', 9278921542, 'parent13', 'parent13'),
(14, 'Cherry Mabao', 9987400123, 'parent14', 'parent14'),
(15, 'Celia Macaraya', 9357849001, 'parent15', 'parent15');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_ID` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `grade_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seatwork`
--

CREATE TABLE `seatwork` (
  `seatwork_ID` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `grade_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_ID` int(10) NOT NULL,
  `section` varchar(20) NOT NULL,
  `year_level_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_ID`, `section`, `year_level_ID`) VALUES
(1, 'Peace', 1),
(2, 'Generosity', 1),
(3, 'Sampaguitta', 2),
(4, 'Adelfa', 2),
(5, 'Narra', 3),
(6, 'Mahogany', 3),
(7, 'Rizal', 4),
(8, 'Mahogany', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `parent_ID` int(10) NOT NULL,
  `section_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_ID`, `name`, `username`, `password`, `parent_ID`, `section_ID`) VALUES
(1, 'David Libetario Jr', 'student1', 'student1', 1, 1),
(2, 'Edgar Libetario', 'student2', 'student2', 1, 1),
(3, 'Seralyn Lim', 'student3', 'student3', 2, 2),
(4, 'Leah Lim', 'student4', 'student4', 3, 2),
(5, 'Sarah Limbo', 'student5', 'student5', 4, 3),
(6, 'Edie Limpag', 'student6', 'student6', 5, 4),
(7, 'Arthur Llanera', 'student7', 'student7', 6, 5),
(8, 'Dave Loma', 'student8', 'student8', 7, 6),
(9, 'Erikka Loma', 'student9', 'student9', 7, 7),
(10, 'Alan Lomod', 'student10', 'student10', 8, 8),
(11, 'Angela Lood', 'student11', 'student11', 9, 8),
(12, 'Ian Vester Lubaton', 'student12', 'student12', 10, 3),
(13, 'Belen Lura', 'student13', 'student13', 11, 4),
(14, 'Roy Lumayosa', 'student14', 'student14', 12, 5),
(15, 'Joshua Lusica', 'student15', 'student15', 13, 6),
(16, 'Nathan Mabao', 'student16', 'student16', 14, 7),
(17, 'Cecille Macaraya', 'student17', 'student17', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `student_subject_ID` int(10) NOT NULL,
  `student_ID` int(10) NOT NULL,
  `subject_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`student_subject_ID`, `student_ID`, `subject_ID`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 1, 9),
(4, 1, 13),
(5, 1, 17),
(6, 1, 21),
(7, 1, 25),
(8, 1, 29),
(9, 1, 33),
(10, 1, 37),
(11, 2, 1),
(12, 2, 5),
(13, 2, 9),
(14, 2, 13),
(15, 2, 17),
(16, 2, 21),
(17, 2, 25),
(18, 2, 29),
(19, 2, 33),
(20, 2, 37),
(21, 3, 1),
(22, 3, 5),
(23, 3, 9),
(24, 3, 13),
(25, 3, 17),
(26, 3, 21),
(27, 3, 25),
(28, 3, 29),
(29, 3, 33),
(30, 3, 37),
(31, 4, 1),
(32, 4, 5),
(33, 4, 9),
(34, 4, 13),
(35, 4, 17),
(36, 4, 21),
(37, 4, 25),
(38, 4, 29),
(39, 4, 33),
(40, 4, 37),
(41, 5, 2),
(42, 5, 6),
(43, 5, 10),
(44, 5, 14),
(45, 5, 18),
(46, 5, 22),
(47, 5, 26),
(48, 5, 30),
(49, 5, 34),
(50, 5, 38),
(51, 6, 2),
(52, 6, 6),
(53, 6, 10),
(54, 6, 14),
(55, 6, 18),
(56, 6, 22),
(57, 6, 26),
(58, 6, 30),
(59, 6, 34),
(60, 6, 38),
(61, 7, 3),
(62, 7, 7),
(63, 7, 11),
(64, 7, 15),
(65, 7, 19),
(66, 7, 23),
(67, 7, 27),
(68, 7, 31),
(69, 7, 35),
(70, 7, 39),
(71, 8, 3),
(72, 8, 7),
(73, 8, 11),
(74, 8, 15),
(75, 8, 19),
(76, 8, 23),
(77, 8, 27),
(78, 8, 31),
(79, 8, 35),
(80, 8, 39),
(81, 9, 4),
(82, 9, 8),
(83, 9, 12),
(84, 9, 16),
(85, 9, 20),
(86, 9, 24),
(87, 9, 28),
(88, 9, 32),
(89, 9, 36),
(90, 9, 40),
(91, 10, 4),
(92, 10, 8),
(93, 10, 12),
(94, 10, 16),
(95, 10, 20),
(96, 10, 24),
(97, 10, 28),
(98, 10, 32),
(99, 10, 36),
(100, 10, 40),
(101, 11, 4),
(102, 11, 8),
(103, 11, 12),
(104, 11, 16),
(105, 11, 20),
(106, 11, 24),
(107, 11, 28),
(108, 11, 32),
(109, 11, 36),
(110, 11, 40),
(111, 12, 2),
(112, 12, 6),
(113, 12, 10),
(114, 12, 14),
(115, 12, 18),
(116, 12, 22),
(117, 12, 26),
(118, 12, 30),
(119, 12, 34),
(120, 12, 38),
(121, 13, 2),
(122, 13, 6),
(123, 13, 10),
(124, 13, 14),
(125, 13, 18),
(126, 13, 22),
(127, 13, 26),
(128, 13, 30),
(129, 13, 34),
(130, 13, 38),
(131, 14, 3),
(132, 14, 7),
(133, 14, 11),
(134, 14, 15),
(135, 14, 19),
(136, 14, 23),
(137, 14, 27),
(138, 14, 31),
(139, 14, 35),
(140, 14, 39),
(141, 15, 3),
(142, 15, 7),
(143, 15, 11),
(144, 15, 15),
(145, 15, 19),
(146, 15, 23),
(147, 15, 27),
(148, 15, 31),
(149, 15, 35),
(150, 15, 39),
(151, 16, 4),
(152, 16, 8),
(153, 16, 12),
(154, 16, 16),
(155, 16, 20),
(156, 16, 24),
(157, 16, 28),
(158, 16, 32),
(159, 16, 36),
(160, 16, 40),
(161, 17, 1),
(162, 17, 5),
(163, 17, 9),
(164, 17, 13),
(165, 17, 17),
(166, 17, 21),
(167, 17, 25),
(168, 17, 29),
(169, 17, 33),
(170, 17, 37);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_ID`, `name`) VALUES
(1, 'MotherTounque-1'),
(2, 'MotherTounque-2'),
(3, 'MotherTounque-3'),
(4, 'MotherTounque-4'),
(5, 'Filipino-1'),
(6, 'Filipino-2'),
(7, 'Filipino-3'),
(8, 'Filipino-4'),
(9, 'English-1'),
(10, 'English-2'),
(11, 'English-3'),
(12, 'English-4'),
(13, 'Mathematics-1'),
(14, 'Mathematics-2'),
(15, 'Mathematics-3'),
(16, 'Mathematics-4'),
(17, 'Science-1'),
(18, 'Science-2'),
(19, 'Science-3'),
(20, 'Science-4'),
(21, 'Araling Panlipunan-1'),
(22, 'Araling Panlipunan-2'),
(23, 'Araling Panlipunan-3'),
(24, 'Araling Panlipunan-4'),
(25, 'Edukasyon sa Pagkatao-1'),
(26, 'Edukasyon sa Pagkatao-2'),
(27, 'Edukasyon sa Pagkatao-3'),
(28, 'Edukasyon sa Pagkatao-4'),
(29, 'MAPEH-1'),
(30, 'MAPEH-2'),
(31, 'MAPEH-3'),
(32, 'MAPEH-4'),
(33, 'Edukasyong Pantahanan at Pangkabuhayan-1'),
(34, 'Edukasyong Pantahanan at Pangkabuhayan-2'),
(35, 'Edukasyong Pantahanan at Pangkabuhayan-3'),
(36, 'Edukasyong Pantahanan at Pangkabuhayan-4'),
(37, 'Technology and Livelihood Education-1'),
(38, 'Technology and Livelihood Education-2'),
(39, 'Technology and Livelihood Education-3'),
(40, 'Technology and Livelihood Education-4');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_ID`, `name`, `username`, `password`) VALUES
(1, 'Kyle Shunt Tolero', 'teacher1', 'teacher1'),
(2, 'Dave Canonigo', 'teacher2', 'teacher2'),
(3, 'Loyal Castillon', 'teacher3', 'teacher3'),
(4, 'Dorothy Jane Plaza', 'teacher4', 'teacher4'),
(5, 'Jhayrien Daulong', 'teacher5', 'teacher5'),
(6, 'Pat Morin', 'teacher6', 'teacher6'),
(7, 'Ethyl Sumaya', 'teacher7', 'teacher7'),
(8, 'Hazel Marangit', 'teacher8', 'teacher8'),
(9, 'Arthur Cobacha', 'teacher9', 'teacher9'),
(10, 'Timothy John Caburatan', 'teacher10', 'teacher10');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `teacher_subject_ID` int(10) NOT NULL,
  `teacher_ID` int(10) NOT NULL,
  `subject_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`teacher_subject_ID`, `teacher_ID`, `subject_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 3, 9),
(10, 3, 10),
(11, 3, 11),
(12, 3, 12),
(13, 4, 13),
(14, 4, 14),
(15, 4, 15),
(16, 4, 16),
(17, 5, 17),
(18, 5, 18),
(19, 5, 19),
(20, 5, 20),
(21, 6, 21),
(22, 6, 22),
(23, 6, 23),
(24, 6, 24),
(25, 7, 25),
(26, 7, 26),
(27, 7, 27),
(28, 7, 28),
(29, 8, 29),
(30, 8, 30),
(31, 8, 31),
(32, 8, 32),
(33, 9, 33),
(34, 9, 34),
(35, 9, 35),
(36, 9, 36),
(37, 10, 37),
(38, 10, 38),
(39, 10, 39),
(40, 10, 40);

-- --------------------------------------------------------

--
-- Table structure for table `year_level`
--

CREATE TABLE `year_level` (
  `year_level_ID` int(10) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_level`
--

INSERT INTO `year_level` (`year_level_ID`, `year`) VALUES
(1, 'First Year'),
(2, 'Second Year'),
(3, 'Third Year'),
(4, 'Fourth Year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_ID`),
  ADD KEY `fk_assignment` (`grade_ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_ID`),
  ADD KEY `fk_attendance` (`grade_ID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_ID`),
  ADD KEY `fk_exam` (`grade_ID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_ID`),
  ADD KEY `fk_grading_period` (`grading_period_ID`),
  ADD KEY `fk_student_subject_grade` (`student_subject_ID`);

--
-- Indexes for table `grading_period`
--
ALTER TABLE `grading_period`
  ADD PRIMARY KEY (`grading_period_ID`);

--
-- Indexes for table `oral`
--
ALTER TABLE `oral`
  ADD PRIMARY KEY (`oral_ID`),
  ADD KEY `fk_oral` (`grade_ID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_ID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_ID`),
  ADD KEY `fk_quiz` (`grade_ID`);

--
-- Indexes for table `seatwork`
--
ALTER TABLE `seatwork`
  ADD PRIMARY KEY (`seatwork_ID`),
  ADD KEY `fk_seatwork` (`grade_ID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_ID`),
  ADD KEY `fk_yearlevel` (`year_level_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_ID`),
  ADD KEY `fk_parent` (`parent_ID`),
  ADD KEY `fk_section` (`section_ID`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`student_subject_ID`),
  ADD KEY `fk_student_subject` (`student_ID`),
  ADD KEY `fk_subject_subject` (`subject_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_ID`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`teacher_subject_ID`),
  ADD KEY `fk_teacher_subject` (`teacher_ID`),
  ADD KEY `fk_subject_teacher` (`subject_ID`);

--
-- Indexes for table `year_level`
--
ALTER TABLE `year_level`
  ADD PRIMARY KEY (`year_level_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grading_period`
--
ALTER TABLE `grading_period`
  MODIFY `grading_period_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `oral`
--
ALTER TABLE `oral`
  MODIFY `oral_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seatwork`
--
ALTER TABLE `seatwork`
  MODIFY `seatwork_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `student_subject_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `teacher_subject_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `year_level`
--
ALTER TABLE `year_level`
  MODIFY `year_level_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `fk_assignment` FOREIGN KEY (`grade_ID`) REFERENCES `grade` (`grade_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance` FOREIGN KEY (`grade_ID`) REFERENCES `grade` (`grade_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `fk_exam` FOREIGN KEY (`grade_ID`) REFERENCES `grade` (`grade_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `fk_grading_period` FOREIGN KEY (`grading_period_ID`) REFERENCES `grading_period` (`grading_period_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_subject_grade` FOREIGN KEY (`student_subject_ID`) REFERENCES `student_subject` (`student_subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oral`
--
ALTER TABLE `oral`
  ADD CONSTRAINT `fk_oral` FOREIGN KEY (`grade_ID`) REFERENCES `grade` (`grade_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_quiz` FOREIGN KEY (`grade_ID`) REFERENCES `grade` (`grade_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seatwork`
--
ALTER TABLE `seatwork`
  ADD CONSTRAINT `fk_seatwork` FOREIGN KEY (`grade_ID`) REFERENCES `grade` (`grade_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `fk_yearlevel` FOREIGN KEY (`year_level_ID`) REFERENCES `year_level` (`year_level_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_parent` FOREIGN KEY (`parent_ID`) REFERENCES `parent` (`parent_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_section` FOREIGN KEY (`section_ID`) REFERENCES `section` (`section_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `fk_student_subject` FOREIGN KEY (`student_ID`) REFERENCES `student` (`student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subject_subject` FOREIGN KEY (`subject_ID`) REFERENCES `subject` (`subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD CONSTRAINT `fk_subject_teacher` FOREIGN KEY (`subject_ID`) REFERENCES `subject` (`subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_teacher_subject` FOREIGN KEY (`teacher_ID`) REFERENCES `teacher` (`teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
