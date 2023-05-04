-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2023 at 06:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `AnswerOption`
--

CREATE TABLE `AnswerOption` (
  `OptionID` int(11) NOT NULL,
  `OptionName` varchar(255) NOT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `AnswerOption`
--

INSERT INTO `AnswerOption` (`OptionID`, `OptionName`, `QuestionID`) VALUES
(64, 'Los angeles', 94),
(65, 'new York', 94),
(66, 'San diego ', 94),
(67, 'Miami ', 94),
(68, 'True', 95),
(69, 'False', 95),
(70, 'True', 96),
(71, 'False', 96),
(72, 'True', 97),
(73, 'False', 97),
(74, 'library ', 98),
(75, 'student center', 98),
(76, 'startbuch', 98),
(77, 'outside', 98),
(78, 'True', 99),
(79, 'False', 99),
(80, 'True', 100),
(81, 'False', 100),
(82, 'Los angeles', 101),
(83, 'new York', 101),
(84, 'San diego ', 101),
(85, 'Miami ', 101),
(86, 'True', 102),
(87, 'False', 102);

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `QuestionID` int(11) NOT NULL,
  `QuestionName` varchar(255) NOT NULL,
  `Descriptionn` text DEFAULT NULL,
  `Typee` varchar(20) NOT NULL,
  `SurveyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`QuestionID`, `QuestionName`, `Descriptionn`, `Typee`, `SurveyID`) VALUES
(94, 'Where do you want to live', 'Dream city ', '2', 57),
(95, 'can you pay your rent', 'income', '1', 57),
(96, 'is your major cs', 'major', '1', 57),
(97, 'do you like fullerton state', 'campus', '1', 57),
(98, 'where do like hang out in compus', 'campus', '2', 57),
(99, '', '', '1', 63),
(100, 'asdsd', 'sadas', '1', 68),
(101, 'sdfdsf', 'sdfdfsd', '2', 68),
(102, 'sdfdsfdsfsd', 'sdfdfsd', '1', 68),
(103, 'fhgjj', 'fghjgh', '2', 69);

-- --------------------------------------------------------

--
-- Table structure for table `Response`
--

CREATE TABLE `Response` (
  `ResponseID` int(11) NOT NULL,
  `Answer` text DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `QuestionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Response`
--

INSERT INTO `Response` (`ResponseID`, `Answer`, `Timestamp`, `UserID`, `QuestionID`) VALUES
(10, 'San diego ', '2023-05-02 23:09:50', 52, 94),
(11, 'True', '2023-05-02 23:10:52', 52, 95),
(12, 'Miami ', '2023-05-02 23:17:55', 54, 94),
(13, 'True', '2023-05-04 02:00:02', 52, 100);

-- --------------------------------------------------------

--
-- Table structure for table `Survey`
--

CREATE TABLE `Survey` (
  `SurveyID` int(11) NOT NULL,
  `SurveyName` varchar(255) NOT NULL,
  `SurveyCode` varchar(10) NOT NULL,
  `Descriptionn` text DEFAULT NULL,
  `StartDateTime` datetime NOT NULL,
  `EndDateTime` datetime NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Survey`
--

INSERT INTO `Survey` (`SurveyID`, `SurveyName`, `SurveyCode`, `Descriptionn`, `StartDateTime`, `EndDateTime`, `UserID`) VALUES
(57, 'CSUF Student', '#123', NULL, '2022-05-01 09:00:00', '2022-05-31 17:00:00', 52),
(63, 'xxxx', 'xxxx', NULL, '2022-05-01 09:00:00', '2022-05-31 17:00:00', 55),
(68, 'asdasd', 'dsaas', NULL, '2022-05-01 09:00:00', '2022-05-31 17:00:00', 52),
(69, 'jgfjfgjh', 'fhjhj', NULL, '2022-05-01 09:00:00', '2022-05-31 17:00:00', 52);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Passwordd` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `FirstName`, `LastName`, `Email`, `Passwordd`, `PhoneNumber`) VALUES
(52, 'Nebil S Gokdemir', 'Gokdemir', 'NEBILGOKDEMIR1@GMAIL.COM', '123', '6195519637'),
(54, 'mehmet', 'karatas', 'mehmet@GMAIL.COM', '123', '6195519637'),
(55, 'john ', 'fd', 'x@gmail.com', '123', '6195519637');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AnswerOption`
--
ALTER TABLE `AnswerOption`
  ADD PRIMARY KEY (`OptionID`),
  ADD KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`QuestionID`),
  ADD KEY `SurveyID` (`SurveyID`);

--
-- Indexes for table `Response`
--
ALTER TABLE `Response`
  ADD PRIMARY KEY (`ResponseID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `QuestionID` (`QuestionID`);

--
-- Indexes for table `Survey`
--
ALTER TABLE `Survey`
  ADD PRIMARY KEY (`SurveyID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AnswerOption`
--
ALTER TABLE `AnswerOption`
  MODIFY `OptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `Response`
--
ALTER TABLE `Response`
  MODIFY `ResponseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Survey`
--
ALTER TABLE `Survey`
  MODIFY `SurveyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AnswerOption`
--
ALTER TABLE `AnswerOption`
  ADD CONSTRAINT `answeroption_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `Question` (`QuestionID`);

--
-- Constraints for table `Question`
--
ALTER TABLE `Question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`SurveyID`) REFERENCES `Survey` (`SurveyID`);

--
-- Constraints for table `Response`
--
ALTER TABLE `Response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
  ADD CONSTRAINT `response_ibfk_2` FOREIGN KEY (`QuestionID`) REFERENCES `Question` (`QuestionID`);

--
-- Constraints for table `Survey`
--
ALTER TABLE `Survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
