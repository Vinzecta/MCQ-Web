-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 02:14 PM
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
-- Database: `mcq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_ID`, `User_ID`) VALUES
(1, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `Question_ID` int(11) NOT NULL,
  `Choice_Number` int(11) NOT NULL,
  `Content` text NOT NULL,
  `Is_answer` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`Question_ID`, `Choice_Number`, `Content`, `Is_answer`) VALUES
(67, 1, '56', 0),
(67, 2, '84', 0),
(67, 3, '35', 0),
(67, 4, '46', 1),
(68, 1, '5', 0),
(68, 2, '6', 0),
(68, 3, '3', 1),
(68, 4, '4', 0),
(69, 1, 'Image oriented data', 0),
(69, 2, 'Text, files containing data', 0),
(69, 3, 'Data in the form of audio or video', 0),
(69, 4, 'All of the above', 1),
(70, 1, 'No-backup for the data stored', 0),
(70, 2, 'User interface provided', 1),
(70, 3, 'Lack of Authentication', 0),
(70, 4, 'Store data in multiple locations', 0),
(71, 1, 'Collection of Records', 0),
(71, 2, 'Collection of Keys', 0),
(71, 3, 'Collection of Tables', 0),
(71, 4, 'Collection of Fields', 0),
(72, 1, 'Drop table', 1),
(72, 2, 'Delete', 0),
(72, 3, 'Purge', 0),
(72, 4, 'Remove', 0),
(73, 1, 'binary search', 1),
(73, 2, 'linear search', 0),
(73, 3, 'jump search', 0),
(73, 4, 'all are equally fast', 0),
(74, 1, 'Jump search', 0),
(74, 2, 'Fibonacci Search', 0),
(74, 3, 'Linear search', 0),
(74, 4, 'Binary search', 1),
(75, 1, 'O(n)', 0),
(75, 2, 'O(m)', 0),
(75, 3, 'O(n + m)', 1),
(75, 4, 'O(m * n)', 0),
(76, 1, 'int number;', 0),
(76, 2, 'float rate;', 0),
(76, 3, 'int variable_count;', 0),
(76, 4, 'int $main;', 1),
(77, 1, 'Managing stored data', 0),
(77, 2, 'Manipulating data', 0),
(77, 3, 'Security for stored data', 0),
(77, 4, 'Analysing code', 1),
(78, 1, 'Hyper data', 0),
(78, 2, 'Tera data', 0),
(78, 3, 'Meta data', 1),
(78, 4, 'Relations', 0),
(79, 1, 'Backup', 0),
(79, 2, 'Data Loading', 0),
(79, 3, 'Process Organization', 1),
(79, 4, 'File organization', 0),
(80, 1, 'Clears entries from relation', 0),
(80, 2, 'Deletes relation', 0),
(80, 3, 'Deletes particular tuple from relation', 1),
(80, 4, 'All of the mentioned', 0),
(81, 1, '2', 1),
(81, 2, '3', 0),
(81, 3, '5', 0),
(81, 4, '4', 0),
(82, 1, '4NF', 0),
(82, 2, '3NF', 1),
(82, 3, '2NF', 0),
(82, 4, '5NF', 0),
(83, 1, '1', 1),
(83, 2, '2', 0),
(83, 3, '33', 0),
(83, 4, '4', 0),
(84, 1, '410', 1),
(84, 2, '2343', 0),
(84, 3, '43676', 0),
(84, 4, '23453', 0),
(85, 1, 'It is an open system', 0),
(85, 2, 'It is a closed system', 0),
(85, 3, 'It is an isolated system', 1),
(85, 4, 'It is an international system', 0),
(86, 1, 'Gravity', 0),
(86, 2, 'Isotropy', 0),
(86, 3, 'Nuclear force', 0),
(86, 4, 'Homogeneity of time', 1),
(87, 1, 'Dimensionless', 1),
(87, 2, 'm/s2', 0),
(87, 3, 'N/m3', 0),
(87, 4, ' Kg/m3', 0),
(88, 1, '2', 0),
(88, 2, '5', 0),
(88, 3, '0.5', 0),
(88, 4, '1', 1),
(89, 1, 'Entropy', 1),
(89, 2, 'Heat', 0),
(89, 3, 'Work', 0),
(89, 4, 'None of the mentioned', 0),
(90, 1, '540 Kj/g', 1),
(90, 2, '580 kJ/g', 0),
(90, 3, '1060 J/g', 0),
(90, 4, '600 kJ/g', 0),
(91, 1, '2', 1),
(91, 2, '3', 0),
(91, 3, '4', 0),
(91, 4, '5', 0),
(92, 1, '33', 0),
(92, 2, '4', 1),
(92, 3, '5', 0),
(92, 4, '6', 0),
(93, 1, '4', 0),
(93, 2, '5', 0),
(93, 3, '6', 1),
(93, 4, '7', 0),
(94, 1, '5', 0),
(94, 2, '6', 0),
(94, 3, '7', 0),
(94, 4, '8', 1),
(95, 1, '6', 0),
(95, 2, '7', 0),
(95, 3, '8', 0),
(95, 4, '10', 1),
(96, 1, '18', 1),
(96, 2, '3323', 0),
(96, 3, '2323', 0),
(96, 4, '2323', 0),
(97, 1, '6', 1),
(97, 2, '4', 0),
(97, 3, '34', 0),
(97, 4, '453636', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Contact_ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Messages` text DEFAULT NULL,
  `Contact_Date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Contact_ID`, `Email`, `Title`, `Messages`, `Contact_Date`) VALUES
(1, 'user1@example.com', 'ewfqwereqrw', 'eqwreqwreqw', '2025-04-10 20:54:24'),
(2, 'user1@example.com', 'Hello', 'Thiz website iz amazing', '2025-04-10 20:55:20'),
(3, 'holaamigos@hcmut.edu.vn', 'Hiiiii', 'I LABVE UUUUUUUUUU', '2025-04-10 20:56:07'),
(4, 'user6@example.com', 'CONCAC', 'NO CHILL', '2025-04-11 16:07:32'),
(5, 'admin2@example.com', 'concac', 'du ma mayy', '2025-04-11 22:03:14'),
(6, 'admin1@example.com', 'hê hê', 'con cac', '2025-04-14 18:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Question_ID` int(11) NOT NULL,
  `Question_name` text NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Question_URL` varchar(255) DEFAULT NULL,
  `Admin_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Question_ID`, `Question_name`, `Category`, `Question_URL`, `Admin_ID`) VALUES
(67, 'Find the odd one out from the given set of numbers.', 'Logical Reasoning', '../images/question/default_question.png', 1),
(68, 'In a certain code “564” means “study very hard”, “736” means “hard work pays” and “423” means “study and work”. Which of the following is the code for “work”?', 'Logical Reasoning', '../images/question/default_question.png', 1),
(69, 'Which type of data can be stored in the database?', 'Database', '../images/question/default_question.png', 1),
(70, 'Which of the following is a feature of the database?', 'Database', '../images/question/default_question.png', 1),
(71, 'What does an RDBMS consist of?', 'Database', '../images/question/default_question.png', 1),
(72, 'Which command is used to remove a relation from an SQL?', 'Database', '../images/question/default_question.png', 1),
(73, 'Which of the following searching algorithm is fastest?', 'Algorithms', '../images/question/default_question.png', 1),
(74, 'Which of the following searching algorithm is used with exponential sort after finding the appropriate range?', 'Algorithms', '../images/question/default_question.png', 1),
(75, 'What is the time complexity of Z algorithm for pattern searching (m = length of text, n = length of pattern)?', 'Algorithms', '../images/question/default_question.png', 1),
(76, 'Which of the following is not a valid C variable name?', 'C', '../images/question/default_question.png', 1),
(77, 'Which of the following is not a function of the database?', 'Database', '../images/question/default_question.png', 1),
(78, 'What is information about data called?', 'Database', '../images/question/default_question.png', 1),
(79, 'Which of the following is not the utility of DBMS?', 'Database', '../images/question/default_question.png', 1),
(80, 'What is the function of the following command? Delete from r where P;', 'Database', '../images/question/default_question.png', 1),
(81, '1+1 ?', 'Math', '../images/question/default_question.png', 1),
(82, 'For designing a normal RDBMS which of the following normal form is considered adequate?', 'Database', '../images/question/default_question.png', 1),
(83, '3/3', 'Math', '../images/question/default_question.png', 1),
(84, '442 - 32', 'Math', '../images/question/default_question.png', 1),
(85, 'Which of the following is true about the universe?', 'Physics', '../images/question/default_question.png', 1),
(86, 'Which of the following leads to the law of conservation of energy?', 'Physics', '../images/question/default_question.png', 1),
(87, 'What is the unit of specific gravity?', 'Chemistry', '../images/question/default_question.png', 1),
(88, 'What is the specific gravity of 5 Kg of water occupied in 10 m3 with respect to 500 g/m3?', 'Chemistry', '../images/question/default_question.png', 1),
(89, 'Which of the following is a state function?', 'Chemistry', '../images/question/default_question.png', 1),
(90, 'The heat of vaporization of water is ________', 'Biochemistry', '../images/question/default_question.png', 1),
(91, '1+1', 'Math', '../images/question/default_question.png', 1),
(92, '2+2', 'Math', '../images/question/default_question.png', 1),
(93, '3+3', 'Math', '../images/question/default_question.png', 1),
(94, '4+4', 'Math', '../images/question/default_question.png', 1),
(95, '5+5', 'Math', '../images/question/default_question.png', 1),
(96, '9+9', 'Math', '../images/question/default_question.png', 2),
(97, '3 x 2', 'Math', '../images/question/default_question.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_attempt`
--

CREATE TABLE `question_attempt` (
  `Question_Attempt_ID` int(11) NOT NULL,
  `Attempt_ID` int(11) NOT NULL,
  `Question_ID` int(11) NOT NULL,
  `Choice_Number` int(11) NOT NULL,
  `Is_correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_attempt`
--

INSERT INTO `question_attempt` (`Question_Attempt_ID`, `Attempt_ID`, `Question_ID`, `Choice_Number`, `Is_correct`) VALUES
(1, 6, 69, 4, 1),
(2, 6, 71, 1, 0),
(3, 6, 72, 1, 1),
(4, 6, 73, 1, 1),
(5, 6, 74, 2, 0),
(6, 7, 69, 4, 1),
(7, 7, 71, 1, 0),
(8, 7, 72, 1, 1),
(9, 7, 73, 3, 0),
(10, 7, 74, 4, 1),
(11, 8, 69, 2, 0),
(12, 8, 71, 4, 0),
(13, 8, 72, 2, 0),
(14, 8, 73, 3, 0),
(15, 8, 74, 2, 0),
(16, 9, 83, 1, 1),
(17, 9, 84, 1, 1),
(18, 9, 91, 1, 1),
(19, 9, 92, 2, 1),
(20, 9, 93, 3, 1),
(21, 9, 94, 4, 0),
(22, 9, 95, 4, 0),
(23, 10, 83, 1, 1),
(24, 10, 84, 1, 1),
(25, 10, 91, 1, 1),
(26, 10, 92, 2, 1),
(27, 10, 93, 3, 1),
(28, 10, 94, 4, 0),
(29, 10, 95, 4, 0),
(30, 11, 83, 1, 1),
(31, 11, 84, 1, 1),
(32, 11, 91, 1, 1),
(33, 11, 92, 2, 1),
(34, 11, 93, 3, 1),
(35, 11, 94, 4, 1),
(36, 11, 95, 4, 1),
(37, 12, 83, 1, 1),
(38, 12, 84, 2, 0),
(39, 12, 91, 1, 1),
(40, 12, 92, 4, 0),
(41, 12, 93, 3, 1),
(42, 12, 94, 4, 1),
(43, 12, 95, 4, 1),
(44, 13, 83, 3, 0),
(45, 13, 84, 4, 0),
(46, 13, 91, 4, 0),
(47, 13, 92, 3, 0),
(48, 13, 93, 4, 0),
(49, 13, 94, 3, 0),
(50, 13, 95, 1, 0),
(51, 14, 83, 2, 0),
(52, 14, 84, 1, 1),
(53, 14, 91, 1, 1),
(54, 14, 92, 2, 1),
(55, 14, 93, 4, 0),
(56, 14, 94, 1, 0),
(57, 14, 95, 2, 0),
(58, 16, 83, 1, 1),
(59, 16, 84, 1, 1),
(60, 16, 91, 1, 1),
(61, 16, 92, 2, 1),
(62, 16, 93, 1, 0),
(63, 16, 94, 1, 0),
(64, 16, 95, 1, 0),
(65, 17, 83, 2, 0),
(66, 17, 84, 2, 0),
(67, 17, 91, 3, 0),
(68, 17, 92, 1, 0),
(69, 17, 93, 2, 0),
(70, 17, 94, 4, 1),
(71, 17, 95, 1, 0),
(72, 18, 83, 1, 1),
(73, 18, 84, 1, 1),
(74, 18, 91, 2, 0),
(75, 18, 92, 1, 0),
(76, 18, 93, 1, 0),
(77, 18, 94, 3, 0),
(78, 18, 95, 1, 0),
(80, 22, 83, 4, 0),
(81, 22, 84, 4, 0),
(82, 22, 91, 4, 0),
(83, 22, 92, 4, 0),
(84, 22, 93, 4, 0),
(85, 22, 94, 4, 0),
(86, 22, 95, 4, 0),
(87, 23, 83, 4, 0),
(88, 23, 84, 4, 0),
(89, 23, 91, 4, 0),
(90, 23, 92, 4, 0),
(91, 23, 93, 4, 0),
(92, 23, 94, 4, 0),
(93, 23, 95, 4, 0),
(94, 24, 83, 4, 0),
(95, 24, 84, 4, 0),
(96, 24, 91, 4, 0),
(97, 24, 92, 4, 0),
(98, 24, 93, 4, 0),
(99, 24, 94, 4, 0),
(100, 24, 95, 4, 0),
(101, 25, 69, 3, 0),
(102, 25, 71, 1, 0),
(103, 25, 77, 4, 1),
(104, 25, 78, 3, 1),
(105, 25, 80, 2, 0),
(106, 25, 82, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Student_status` enum('active','banned') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `User_ID`, `Student_status`) VALUES
(1, 1, 'active'),
(2, 2, 'active'),
(3, 3, 'banned'),
(4, 4, 'active'),
(5, 5, 'active'),
(6, 6, 'active'),
(7, 7, 'active'),
(8, 8, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Test_ID` int(11) NOT NULL,
  `Test_name` varchar(50) NOT NULL,
  `Time_allowed` int(11) DEFAULT NULL,
  `Category` varchar(50) NOT NULL,
  `Admin_ID` int(11) NOT NULL,
  `descriptions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`Test_ID`, `Test_name`, `Time_allowed`, `Category`, `Admin_ID`, `descriptions`) VALUES
(4, 'Random test', 10, 'All', 1, ''),
(5, 'Computer science', 5, 'All', 1, ''),
(6, 'Database 1', 10, 'Database', 1, 'Database test'),
(7, 'Random knowledge', 15, 'All', 1, ''),
(8, 'Random knowledge 2', 5, 'All', 1, ''),
(9, 'Math easy', 5, 'All', 1, ''),
(10, 'Math easy 2', 5, 'Math', 2, ''),
(11, 'Database 2', 3, 'Database', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `testquestions`
--

CREATE TABLE `testquestions` (
  `Test_ID` int(11) NOT NULL,
  `Question_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testquestions`
--

INSERT INTO `testquestions` (`Test_ID`, `Question_ID`) VALUES
(4, 67),
(4, 68),
(4, 69),
(4, 70),
(4, 71),
(4, 76),
(5, 69),
(5, 71),
(5, 72),
(5, 73),
(5, 74),
(6, 69),
(6, 70),
(6, 71),
(6, 72),
(6, 77),
(6, 79),
(7, 67),
(7, 68),
(7, 69),
(7, 76),
(7, 77),
(7, 79),
(7, 82),
(8, 67),
(8, 68),
(8, 75),
(8, 76),
(8, 77),
(8, 82),
(8, 84),
(9, 83),
(9, 84),
(9, 91),
(9, 92),
(9, 93),
(9, 94),
(9, 95),
(10, 81),
(10, 84),
(10, 95),
(10, 96),
(10, 97),
(11, 69),
(11, 71),
(11, 77),
(11, 78),
(11, 80),
(11, 82);

-- --------------------------------------------------------

--
-- Table structure for table `test_attempt`
--

CREATE TABLE `test_attempt` (
  `Attempt_ID` int(11) NOT NULL,
  `Test_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  `Attempt_Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_attempt`
--

INSERT INTO `test_attempt` (`Attempt_ID`, `Test_ID`, `Student_ID`, `Score`, `Attempt_Date`) VALUES
(6, 5, 3, 3, '2025-04-13 21:13:31'),
(7, 5, 3, 3, '2025-04-13 21:14:58'),
(8, 5, 3, 0, '2025-04-13 21:15:20'),
(9, 9, 2, 5, '2025-04-13 21:32:44'),
(10, 9, 2, 5, '2025-04-13 21:33:44'),
(11, 9, 2, 7, '2025-04-13 21:35:25'),
(12, 9, 2, 5, '2025-04-14 00:14:36'),
(13, 9, 2, 0, '2025-04-14 07:05:32'),
(14, 9, 3, 3, '2025-04-14 07:14:24'),
(15, 9, 3, 0, '2025-04-14 07:14:33'),
(16, 9, 3, 4, '2025-04-14 07:15:00'),
(17, 9, 3, 1, '2025-04-14 07:24:11'),
(18, 9, 3, 2, '2025-04-14 07:25:04'),
(19, 9, 3, 0, '2025-04-14 08:11:14'),
(20, 9, 3, 0, '2025-04-14 08:11:21'),
(21, 9, 3, 0, '2025-04-14 08:12:15'),
(22, 9, 3, 0, '2025-04-14 08:14:19'),
(23, 9, 4, 0, '2025-04-14 08:15:51'),
(24, 9, 2, 0, '2025-04-14 18:34:11'),
(25, 11, 2, 3, '2025-04-14 18:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `Password_hash` varchar(255) NOT NULL,
  `PFP_URL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Email`, `User_name`, `Password_hash`, `PFP_URL`) VALUES
(1, 'viet.nguyenlodaunv1@hcmut.edu.vn', 'concacnhor', '6ebfb5228bf3d703596f78f80efdea35', '../images/account/user.png'),
(2, 'user1@example.com', 'UserOne1', '9152104419fedb3149fe390b291c0f81', '../images/account/User_2PFP.png'),
(3, 'user2@example.com', 'UserTwo2', 'df92c3c0c9eda77a955650e8b586c932', '../images/account/user.png'),
(4, 'user3@example.com', 'UserThree3', '1037993a38576af0fda819227ea4913e', '../images/account/user.png'),
(5, 'user4@example.com', 'UserFour4', 'fad37100531a5e632a789d6a88529dbe', '../images/account/user.png'),
(6, 'user5@example.com', 'UserFive5', '7c4a48ccfb1ecc969b929b327296ea2f', '../images/account/user.png'),
(7, 'holaamigos@hcmut.edu.vn', 'holaamigos', '7c4a48ccfb1ecc969b929b327296ea2f', '../images/account/user.png'),
(8, 'user6@example.com', 'UserSix6', '488052caa2583c634e846d859e6dbde8', '../images/account/User_8PFP.jpg'),
(9, 'admin1@example.com', 'AdminOne1', 'da1625f520080ea03e852cba65dbc118', '../images/account/User_9PFP.png'),
(10, 'admin2@example.com', 'AdminTwo2', '551bebf9d48563c04f839ca54a4f7823', '../images/account/User_10PFP.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`Question_ID`,`Choice_Number`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Contact_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Question_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `question_attempt`
--
ALTER TABLE `question_attempt`
  ADD PRIMARY KEY (`Question_Attempt_ID`),
  ADD KEY `Attempt_ID` (`Attempt_ID`),
  ADD KEY `Question_ID` (`Question_ID`,`Choice_Number`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`Test_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `testquestions`
--
ALTER TABLE `testquestions`
  ADD PRIMARY KEY (`Test_ID`,`Question_ID`),
  ADD KEY `Question_ID` (`Question_ID`);

--
-- Indexes for table `test_attempt`
--
ALTER TABLE `test_attempt`
  ADD PRIMARY KEY (`Attempt_ID`),
  ADD KEY `Test_ID` (`Test_ID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Contact_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Question_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `question_attempt`
--
ALTER TABLE `question_attempt`
  MODIFY `Question_Attempt_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `Test_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `test_attempt`
--
ALTER TABLE `test_attempt`
  MODIFY `Attempt_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `choice_ibfk_1` FOREIGN KEY (`Question_ID`) REFERENCES `question` (`Question_ID`) ON DELETE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admins` (`Admin_ID`);

--
-- Constraints for table `question_attempt`
--
ALTER TABLE `question_attempt`
  ADD CONSTRAINT `question_attempt_ibfk_1` FOREIGN KEY (`Attempt_ID`) REFERENCES `test_attempt` (`Attempt_ID`),
  ADD CONSTRAINT `question_attempt_ibfk_2` FOREIGN KEY (`Question_ID`,`Choice_Number`) REFERENCES `choice` (`Question_ID`, `Choice_Number`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admins` (`Admin_ID`);

--
-- Constraints for table `testquestions`
--
ALTER TABLE `testquestions`
  ADD CONSTRAINT `testquestions_ibfk_1` FOREIGN KEY (`Test_ID`) REFERENCES `test` (`Test_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `testquestions_ibfk_2` FOREIGN KEY (`Question_ID`) REFERENCES `question` (`Question_ID`) ON DELETE CASCADE;

--
-- Constraints for table `test_attempt`
--
ALTER TABLE `test_attempt`
  ADD CONSTRAINT `test_attempt_ibfk_1` FOREIGN KEY (`Test_ID`) REFERENCES `test` (`Test_ID`),
  ADD CONSTRAINT `test_attempt_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
