CREATE DATABASE IF NOT EXISTS `testbank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testbank`;


CREATE TABLE IF NOT EXISTS `answer` (
  `answer_no` int(15) NOT NULL AUTO_INCREMENT,
  `lesson_no` int(15) NOT NULL,
  `question_no` int(15) NOT NULL,
  `subject_no` int(15) NOT NULL,
  `type` varchar(45) NOT NULL,
  `answer` varchar(45) NOT NULL,
  PRIMARY KEY (`answer_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `faculty_subject` (
  `faculty_subject_no` int(11) NOT NULL AUTO_INCREMENT,
  `subject_no` int(11) NOT NULL,
  `user_no` int(11) NOT NULL,
  PRIMARY KEY (`faculty_subject_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `lesson` (
  `lesson_no` int(11) NOT NULL AUTO_INCREMENT,
  `subject_no` int(11) NOT NULL,
  `user_no` int(11) NOT NULL,
  `lesson_name` varchar(45) NOT NULL,
  PRIMARY KEY (`lesson_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `question` (
  `question_no` int(15) NOT NULL AUTO_INCREMENT,
  `lesson_no` int(15) NOT NULL,
  `type` varchar(45) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`question_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `subject` (
  `subject_no` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(45) NOT NULL,
  `subject_name` varchar(45) NOT NULL,
  PRIMARY KEY (`subject_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `user` (
  `user_no` int(15) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `authorization` int(10) NOT NULL,
  PRIMARY KEY (`user_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `user` (`user_no`, `first_name`, `last_name`, `username`, `password`, `authorization`) VALUES
(1, 'Admin', 'User', 'admin', 'password', 1),
(2, 'Faculty', 'User', 'faculty', 'password', 2);
