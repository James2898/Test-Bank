-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 01:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `testbank`
--
CREATE DATABASE IF NOT EXISTS `testbank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testbank`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answer_no` int(15) NOT NULL AUTO_INCREMENT,
  `lesson_no` int(15) NOT NULL,
  `question_no` int(15) NOT NULL,
  `subject_no` int(15) NOT NULL,
  `type` varchar(45) NOT NULL,
  `answer` varchar(45) NOT NULL,
  PRIMARY KEY (`answer_no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_no`, `lesson_no`, `question_no`, `subject_no`, `type`, `answer`) VALUES
(1, 8, 100, 3, 'identification', 'Twice');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_subject`
--

CREATE TABLE IF NOT EXISTS `faculty_subject` (
  `faculty_subject_no` int(11) NOT NULL AUTO_INCREMENT,
  `subject_no` int(11) NOT NULL,
  `user_no` int(11) NOT NULL,
  PRIMARY KEY (`faculty_subject_no`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_subject`
--

INSERT INTO `faculty_subject` (`faculty_subject_no`, `subject_no`, `user_no`) VALUES
(27, 1, 1),
(28, 3, 1),
(29, 3, 11),
(30, 1, 11),
(31, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `lesson_no` int(11) NOT NULL AUTO_INCREMENT,
  `subject_no` int(11) NOT NULL,
  `user_no` int(11) NOT NULL,
  `lesson_name` varchar(45) NOT NULL,
  PRIMARY KEY (`lesson_no`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_no`, `subject_no`, `user_no`, `lesson_name`) VALUES
(10, 3, 1, 'Lesson 1'),
(11, 3, 1, 'Lesson 2');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_no` int(15) NOT NULL AUTO_INCREMENT,
  `lesson_no` int(15) NOT NULL,
  `type` varchar(45) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`question_no`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_no`, `lesson_no`, `type`, `question`, `answer`) VALUES
(165, 10, 'identification', 'Lesson 1 - Identification', 'Lesson 1 - Identification'),
(167, 10, 'enumeration', 'Lesson 1 - Enumeration', 'one, two, three, four. five'),
(174, 10, 'trueorfalse', 'Lesson 1 - True or False 1', 'true'),
(175, 10, 'trueorfalse', 'Lesson 1 - True or False 2', 'false'),
(176, 10, 'trueorfalse', 'Lesson 1 - True or False 3', 'true'),
(177, 10, 'trueorfalse', 'Lesson 1 - True or False 4', 'true'),
(178, 10, 'trueorfalse', 'Lesson 1 - True or False 5', 'true'),
(179, 10, 'essay', 'Lesson 1 - Essay 1', ''),
(180, 10, 'essay', 'Lesson 1 - Essay 2', ''),
(181, 11, 'identification', 'Lesson 2 - Identification 1', 'Lesson 2 - Identification 1'),
(182, 11, 'enumeration', 'Lesson 2 - Enumeration 1', 'One, Two, Three, Four'),
(183, 11, 'trueorfalse', 'Lesson 2 - True or False 1', 'true'),
(184, 11, 'essay', 'Lesson 2 - Essay 1', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_no` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(45) NOT NULL,
  PRIMARY KEY (`subject_no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_no`, `subject_name`) VALUES
(1, 'Filipino'),
(2, 'Math'),
(3, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_no` int(15) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `authorization` int(10) NOT NULL,
  PRIMARY KEY (`user_no`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_no`, `first_name`, `last_name`, `username`, `password`, `authorization`) VALUES
(1, 'Admin', 'User', 'Admin', 'password', 1),
(11, 'Faculty', 'User', 'faculty', 'password', 2);
