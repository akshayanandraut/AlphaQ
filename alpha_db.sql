-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 05:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ost`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `quesadder` (`quesname` VARCHAR(2000), `o1` VARCHAR(2000), `o2` VARCHAR(2000), `o3` VARCHAR(2000), `o4` VARCHAR(2000), `correct` INT) RETURNS INT(11) BEGIN 
INSERT INTO ques(ques_name,op1,op2,op3,op4,correct_op) VALUES (quesname,o1,o2,o3,o4,correct); 
RETURN (SELECT max(quesid) as ques_id FROM ques); 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `quizadder` (`qname` VARCHAR(2000), `uname` VARCHAR(10), `qmarks` INT, `qtime` INT) RETURNS INT(11) BEGIN 
INSERT INTO quiz(qname, uname, marks, time) VALUES (qname,uname,qmarks,qtime); 
RETURN (SELECT max(qid) as qid FROM quiz); 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `score_updater` (`quizid` INT, `user_name` VARCHAR(10), `quiz_score` INT) RETURNS INT(11) BEGIN 
update user_details set score=score+quiz_score where uname=user_name;
INSERT INTO quiz_score(qid,uname,qscore) VALUES (quizid,user_name,quiz_score);
RETURN 0; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ques`
--

CREATE TABLE `ques` (
  `quesid` int(10) NOT NULL,
  `ques_name` varchar(2000) NOT NULL,
  `op1` varchar(2000) NOT NULL,
  `op2` varchar(2000) NOT NULL,
  `op3` varchar(2000) NOT NULL,
  `op4` varchar(2000) NOT NULL,
  `correct_op` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ques`
--

INSERT INTO `ques` (`quesid`, `ques_name`, `op1`, `op2`, `op3`, `op4`, `correct_op`) VALUES
(1, 'What is an Interface ?', 'An interface is a collection of abstract methods.', 'Interface is an abstract class.', 'Interface is an concrete class.', 'None of the above.', 3),
(2, 'What is the size of byte variable?', '8 bit', '16 bit', '32 bit', '64 bit', 1),
(3, 'Which of the following is true about protected access modifier?', 'Variables, methods and constructors which are declared protected can be accessed by any class.', 'Variables, methods and constructors which are declared protected can be accessed by any class lying in same package.', 'Variables, methods and constructors which are declared protected in the superclass can be accessed only by its child class.', 'None of the above.', 3),
(4, 'What is the default value of long variable?', '0', '0.0', '0L', 'not defined', 3),
(5, 'Which is the way in which a thread can enter the waiting state?', 'Invoke its sleep method', 'invoke wait method.', 'Invoke its suspend method', 'All of the above', 4),
(6, 'When finally block gets executed?', 'Always when try block get executed, no matter exception occured or not.', 'Always when a method get executed, no matter exception occured or not.', 'Always when a try block get executed, if exception do not occur.', 'Only when exception occurs in try block code.', 1),
(7, 'This is the parent of Error and Exception classes.', 'Throwable', 'Catchable', 'MainError', 'MainException', 1),
(8, 'What is the size of char variable?', '8 bit', '16 bit', '32 bit', '64 bit', 2),
(9, 'What is Encapsulation?', 'Encapsulation is a technique to define different methods of same type', 'Encapsulation is the ability of an object to take on many forms', 'Encapsulation is the technique of making the fields in a class private and providing access to the fields via public methods', 'None of the above', 3),
(10, 'Method Overloading is an example of', 'Static Binding', 'Dynamic Binding', 'Both of the above', 'None of the above', 1),
(11, 'What of the following is the default value of a local variable?', 'null', '0', 'Depends upon the type of variable', 'Not assigned', 4),
(12, 'What is the default value of Boolean variable?', 'true', 'false', 'null', 'not defined', 2),
(13, 'Which of the following function convert a string to an int in python?', 'int(x [,base])', 'long(x [,base] )', 'float(x)', 'str(x)', 1),
(14, 'What is the following function compares elements of both dictionaries dict1, dict2?', 'max(dict)', 'min(dict)', 'len(dict)', 'None of the above.', 3),
(15, 'What is the following function gives the total length of the list?', 'cmp(list)', 'len(list)', 'max(list)', 'min(list)', 2),
(16, 'Which of the following operator in python performs the division on operands where the result is the quotient in which the digits after the decimal point are removed?', '**', '//', 'is', 'not in', 2),
(17, 'Which of the following function checks in a string that all characters are titlecased?', 'islower()', 'isnumeric()', 'isspace()', 'istitle()', 4),
(18, 'What is the following function reverses objects of list in place?', 'list.reverse()', 'list.sort([func])', 'list.pop(obj=list[-1])', 'list.remove(obj)', 1),
(19, 'Which of the following is true about php.ini file?', 'The PHP configuration file php.ini  is the final and most immediate way to affect PHPs functionality.', 'The php.ini file is read each time PHP is initialized.', 'Both of the above.', 'None of the above.', 3),
(20, 'Which of the following is used to get information sent via get method in PHP?', '$_GET', '$GET', '$GETREQUEST', 'None of the above.', 1),
(21, 'Which of the following function is used to check if a file exists or not?', 'fopen()', 'fread()', 'filesize()', 'file_exist()', 4),
(22, 'Which of the following is correct about preg_match() function?', 'The preg_match() function searches a string specified by string for a string specified by pattern, returning true if the pattern is found, and false otherwise.', 'The preg_match() function searches throughout a string specified by pattern for a string specified by string. The search is not case sensitive.', 'The preg_match() function searches string for pattern, returning true if pattern exists, and false otherwise.', 'None of the above', 3),
(23, 'Which of the following is true about php variables?', 'Variables can, but do not need, to be declared before assignment.', 'Variables in PHP do not have intrinsic types - a variable does not know in advance whether it will be used to store a number or a string of characters.', 'Variables used before they are assigned have default values.', 'All of the above.', 4),
(24, 'Which of the following is used to check if session variable is already set or not in PHP?', 'session_start() function', '$_SESSION[]', 'isset() function', 'session_destroy() function', 3);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `qid` int(10) NOT NULL,
  `qname` varchar(2000) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `marks` int(11) NOT NULL DEFAULT '2',
  `time` int(11) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`qid`, `qname`, `uname`, `marks`, `time`) VALUES
(1, 'Java 1', 'sidrai97', 5, 3),
(2, 'Java 2', 'sidrai97', 2, 2),
(3, 'Java 3', 'sidrai97', 3, 5),
(4, 'Python 1', 'sid2', 4, 6),
(5, 'PHP 1', 'sid2', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_ques`
--

CREATE TABLE `quiz_ques` (
  `qid` int(10) NOT NULL,
  `quesid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_ques`
--

INSERT INTO `quiz_ques` (`qid`, `quesid`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 17),
(4, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_score`
--

CREATE TABLE `quiz_score` (
  `uname` varchar(10) NOT NULL,
  `qid` int(10) NOT NULL,
  `qscore` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_score`
--

INSERT INTO `quiz_score` (`uname`, `qid`, `qscore`) VALUES
('sid1', 5, 10),
('sid1', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `tid` int(10) NOT NULL,
  `tname` varchar(600) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_ques`
--

CREATE TABLE `test_ques` (
  `tid` int(10) NOT NULL,
  `quesid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_score`
--

CREATE TABLE `test_score` (
  `uname` varchar(10) NOT NULL,
  `tid` int(10) NOT NULL,
  `tscore` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uname` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `score` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uname`, `name`, `email`, `city`, `password`, `score`) VALUES
('sid1', 'Siddhant', 'eg123@gmail.com', 'Mumbai', 'sid1', 15),
('sid2', 'Siddhant Rai', 'siddhantrai97@gmail.com', 'Mumbai', '123456', 0),
('sid4', 'SIddhant', 'siddhantraisgr1@gmail.com', 'Mumbai', '123456', 0),
('sidrai97', 'Siddhant Rai', 'siddhantraisgr@gmail.com', 'Mumbai', 'sid', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ques`
--
ALTER TABLE `ques`
  ADD PRIMARY KEY (`quesid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `quiz_ques`
--
ALTER TABLE `quiz_ques`
  ADD KEY `qid` (`qid`),
  ADD KEY `quesid` (`quesid`);

--
-- Indexes for table `quiz_score`
--
ALTER TABLE `quiz_score`
  ADD KEY `uname` (`uname`),
  ADD KEY `qid` (`qid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `test_ques`
--
ALTER TABLE `test_ques`
  ADD KEY `tid` (`tid`),
  ADD KEY `quesid` (`quesid`);

--
-- Indexes for table `test_score`
--
ALTER TABLE `test_score`
  ADD KEY `uname` (`uname`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ques`
--
ALTER TABLE `ques`
  MODIFY `quesid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `qid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `user_details` (`uname`);

--
-- Constraints for table `quiz_ques`
--
ALTER TABLE `quiz_ques`
  ADD CONSTRAINT `quiz_ques_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `quiz` (`qid`),
  ADD CONSTRAINT `quiz_ques_ibfk_2` FOREIGN KEY (`quesid`) REFERENCES `ques` (`quesid`);

--
-- Constraints for table `quiz_score`
--
ALTER TABLE `quiz_score`
  ADD CONSTRAINT `quiz_score_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `user_details` (`uname`),
  ADD CONSTRAINT `quiz_score_ibfk_2` FOREIGN KEY (`qid`) REFERENCES `quiz` (`qid`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `user_details` (`uname`);

--
-- Constraints for table `test_ques`
--
ALTER TABLE `test_ques`
  ADD CONSTRAINT `test_ques_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `test` (`tid`),
  ADD CONSTRAINT `test_ques_ibfk_2` FOREIGN KEY (`quesid`) REFERENCES `ques` (`quesid`);

--
-- Constraints for table `test_score`
--
ALTER TABLE `test_score`
  ADD CONSTRAINT `test_score_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `user_details` (`uname`),
  ADD CONSTRAINT `test_score_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `test` (`tid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
