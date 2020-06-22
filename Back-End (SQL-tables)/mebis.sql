-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 10:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mebis`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `library_name` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `book_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`library_name`, `book_name`, `author`, `book_status`) VALUES
('North Campus Library', 'Basics of Database', 'Reda Alhajj', 'Unavailable'),
('North Campus Library', 'Harry Potter', 'J. K. Rowling', 'Available'),
('North Campus Library', 'Lord of The Rings', 'J.R.R Tolkien', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_name` varchar(255) NOT NULL,
  `AKTS` int(255) NOT NULL,
  `class_no` varchar(255) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `lecturer` varchar(255) NOT NULL,
  `prerequisite` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_name`, `AKTS`, `class_no`, `course_type`, `lecturer`, `prerequisite`, `semester`) VALUES
('Algorithm', 8, 'C-210', 'Technical', 'Reda Alhajj', 'Data Structures', 'Spring'),
('Calculus 1', 8, 'CZ-16', 'Technical', 'Mehmed Rafet ÖZDEMİR', 'NULL', 'Spring'),
('Calculus 2', 8, 'CZ-16', 'Technical', 'Mehmed Rafet ÖZDEMİR', 'Calculus 1', 'Fall'),
('Data Structures', 8, 'C-310', 'Technical', 'Hasan Fehmi Ateş', 'Object Oriented Programming', 'Fall'),
('Database', 8, 'C-210', 'Technical', 'Reda Alhajj', 'Object Oriented Programming', 'Spring'),
('Introduction to Programming', 6, 'C-211', 'Technical', 'Selim Akyokuş', 'NULL', 'Fall'),
('Machine Learning', 6, 'C-313', 'Non-Technical', 'Bahadır Kürşat Güntürk', 'NULL', 'Fall'),
('Microprocessor', 6, 'C-210', 'Technical', 'Mehmet Kocatürk', 'Introduction to Programming', 'Fall'),
('Object Oriented Programming', 8, 'C-212', 'Technical', 'Selim Akyokuş', 'Introduction to Programming', 'Spring'),
('Probability', 8, 'CZ-12', 'Technical', 'Mehmet Kemal Özdemir', 'Calculus 2', 'Spring'),
('Web Design', 8, 'C-315', 'Non technical', 'Muhsin Zahid Uğur', 'NULL', 'Spring');

-- --------------------------------------------------------

--
-- Table structure for table `dining`
--

CREATE TABLE `dining` (
  `date` date NOT NULL,
  `dining_name` varchar(255) NOT NULL,
  `soup` varchar(255) NOT NULL,
  `main_dish` varchar(255) NOT NULL,
  `side_dish` varchar(255) NOT NULL,
  `dessert` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dining`
--

INSERT INTO `dining` (`date`, `dining_name`, `soup`, `main_dish`, `side_dish`, `dessert`) VALUES
('2020-06-19', 'North Campus Dining Hall', 'Mercimek Çorbası', 'Tas Kebabı', 'Pirinç Pilavı', 'Fıstıklı Baklava'),
('2020-06-20', 'North Campus Dining Hall', 'Yayla Çorbası', 'Kuru Fasulye', 'Bulgur Pilavı', 'Puding');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `course_name` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`course_name`, `exam_name`) VALUES
('Algorithm', 'Algorithm Final'),
('Algorithm', 'Algorithm Midterm'),
('Database', 'Database Final'),
('Database', 'Database Midterm');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecturer_name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `advised_st_id` int(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_name`, `website`, `birthdate`, `email`, `degree`, `role`, `course_name`, `advised_st_id`, `department`) VALUES
('Mehmet Kemal Özdemir', 'https://sens.medipol.edu.tr/m-kemal-ozdemir/', '1967-11-12', 'mkozdemir@medipol.edu.tr', 'Prof.', 'Deputy Dean', 'Probability', 0, 'EEE'),
('Mehmet Rafet Özdemir', '', '0000-00-00', 'mrozdemir@medipol.edu.tr', 'Dr', 'Lecturer', 'Calculus 1', 0, 'CoE');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_name` varchar(255) NOT NULL,
  `est_semester_duration` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `other_uni_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_name`, `est_semester_duration`, `student_id`, `other_uni_name`) VALUES
('Erasmus', 2, 64160002, 'Harvard University'),
('Mevlana', 1, 64160001, 'Standford University');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `advisor_name` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `scholarship` varchar(255) NOT NULL,
  `grade` int(255) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `birthdate`, `course_code`, `advisor_name`, `degree`, `scholarship`, `grade`, `emp_type`, `department`, `email`) VALUES
(64160001, 'Mustafa Aktaş', '1998-10-17', 'Database', 'Mehmet Kemal Özdemir', 'Undergrad', 'Full Scholarship', 3, 'Advanced Programming TA', 'Computer Science & Engineering', 'mustafaaktas@st.medipol.edu.tr'),
(64160002, 'Mert Can Çakmak', '1998-06-16', 'Algorithm', 'Mehmet Kemal Özdemir', 'Undergrad', 'Full Scholarship', 3, 'Probability TA', 'Computer Science & Engineering', 'mccakmak@st.medipol.edu.tr'),
(64160018, 'Ali Yılmaz', '1997-06-09', 'Machine Learning', 'Mehmet Kemal Özdemir', 'Grad', 'Half Scholarship', 1, 'NULL', 'Computer Science & Engineering', 'aliyilmaz@st.medipol.edu.tr'),
(64160022, 'Ayşe Sönmez', '1998-06-16', 'Microprocessor', 'Mehmet Kemal Özdemir', 'Phd', 'Full Scholarship', 4, 'Probability TA', 'Computer Science & Engineering', 'aysesonmez@st.medipol.edu.tr');

-- --------------------------------------------------------

--
-- Table structure for table `student_book`
--

CREATE TABLE `student_book` (
  `student_id` int(255) NOT NULL,
  `book_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_book`
--

INSERT INTO `student_book` (`student_id`, `book_name`) VALUES
(64160001, 'Lord of The Rings'),
(64160002, 'Harry Potter');

-- --------------------------------------------------------

--
-- Table structure for table `student_club`
--

CREATE TABLE `student_club` (
  `club_name` varchar(255) NOT NULL,
  `leader_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_club`
--

INSERT INTO `student_club` (`club_name`, `leader_id`) VALUES
('Girişimcilik Kulübü', 61170008),
('IEEE', 63150012),
('Kızılay', 64160014),
('Management and Economics Club', 62160008);

-- --------------------------------------------------------

--
-- Table structure for table `student_club_participants`
--

CREATE TABLE `student_club_participants` (
  `leader_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_club_participants`
--

INSERT INTO `student_club_participants` (`leader_id`, `participant_id`) VALUES
(61170008, 64160001),
(63150012, 64160002),
(64160014, 64160002);

-- --------------------------------------------------------

--
-- Table structure for table `student_current_course`
--

CREATE TABLE `student_current_course` (
  `course_name` varchar(255) NOT NULL,
  `student_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_current_course`
--

INSERT INTO `student_current_course` (`course_name`, `student_id`) VALUES
('Algorithm', 64160002),
('Database', 64160001);

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE `student_exam` (
  `exam_name` varchar(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `grade` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_exam`
--

INSERT INTO `student_exam` (`exam_name`, `student_id`, `grade`) VALUES
('Algorithm Final', 64160002, 80),
('Algorithm Midterm', 64160002, 90),
('Database Final', 64160001, 95),
('Database Midterm', 64160001, 85);

-- --------------------------------------------------------

--
-- Table structure for table `student_past_courses`
--

CREATE TABLE `student_past_courses` (
  `student_id` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `final_grade` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_past_courses`
--

INSERT INTO `student_past_courses` (`student_id`, `course_name`, `final_grade`) VALUES
(64160001, 'Introduction to Programing', 87),
(64160001, 'Object Oriented Programming', 86),
(64160002, 'Data Structures', 70),
(64160002, 'Introduction to Programming', 89),
(64160002, 'Object Oriented Programming', 98);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`email`, `name`, `password`, `phone`, `type`) VALUES
('mccakmak@st.medipol.edu.tr', 'Mert Can Çakmak', '827ccb0eea8a706c4c34a16891f84e7b', '5351234546', 'student'),
('mkozdemir@medipol.edu.tr', 'Mehmet Kemal Özdemir', '827ccb0eea8a706c4c34a16891f84e7b', '5351234546', 'lecturer'),
('redajj@medipol.edu.tr', 'Reda Alhajj', '827ccb0eea8a706c4c34a16891f84e7b', '12312312', 'lecturer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`library_name`,`book_name`,`author`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_name`);

--
-- Indexes for table `dining`
--
ALTER TABLE `dining`
  ADD PRIMARY KEY (`date`,`dining_name`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`course_name`,`exam_name`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_book`
--
ALTER TABLE `student_book`
  ADD PRIMARY KEY (`student_id`,`book_name`);

--
-- Indexes for table `student_club`
--
ALTER TABLE `student_club`
  ADD PRIMARY KEY (`club_name`);

--
-- Indexes for table `student_club_participants`
--
ALTER TABLE `student_club_participants`
  ADD PRIMARY KEY (`leader_id`,`participant_id`);

--
-- Indexes for table `student_current_course`
--
ALTER TABLE `student_current_course`
  ADD PRIMARY KEY (`course_name`);

--
-- Indexes for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD PRIMARY KEY (`exam_name`,`student_id`);

--
-- Indexes for table `student_past_courses`
--
ALTER TABLE `student_past_courses`
  ADD PRIMARY KEY (`student_id`,`course_name`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
