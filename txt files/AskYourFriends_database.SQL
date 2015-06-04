-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2015 at 01:48 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a8267023_akurfnd`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `institution` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `place` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `mail_id` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `time` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `friends` mediumtext COLLATE latin1_general_ci NOT NULL,
  `password` varchar(35) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `accounts`
--


-- --------------------------------------------------------

--
-- Table structure for table `adding_friedns`
--

CREATE TABLE `adding_friedns` (
  `sender_id` text COLLATE latin1_general_ci NOT NULL,
  `reciever_id` text COLLATE latin1_general_ci NOT NULL,
  `request_id` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `time` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `adding_friedns`
--

INSERT INTO `adding_friedns` VALUES('', '', 'request_id', 'May 28, 2015, 10:50 pm');

-- --------------------------------------------------------

--
-- Table structure for table `check_table`
--

CREATE TABLE `check_table` (
  `name_id` text COLLATE latin1_general_ci NOT NULL,
  `value_value` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `check_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `logged_in`
--

CREATE TABLE `logged_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_no` bigint(20) NOT NULL,
  `pdate` char(40) COLLATE latin1_general_ci DEFAULT NULL,
  `uid` char(100) COLLATE latin1_general_ci DEFAULT NULL,
  `name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `logged_in`
--


-- --------------------------------------------------------

--
-- Table structure for table `new_questions`
--

CREATE TABLE `new_questions` (
  `user_id` bigint(20) unsigned NOT NULL,
  `grouping_id` bigint(20) unsigned NOT NULL,
  `question` text COLLATE latin1_general_ci NOT NULL,
  `optionA` text COLLATE latin1_general_ci NOT NULL,
  `optionB` text COLLATE latin1_general_ci NOT NULL,
  `optionC` text COLLATE latin1_general_ci NOT NULL,
  `optionD` text COLLATE latin1_general_ci NOT NULL,
  `answer` text COLLATE latin1_general_ci NOT NULL,
  KEY `grouping_id` (`grouping_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `new_questions`
--


-- --------------------------------------------------------

--
-- Table structure for table `new_questions_log`
--

CREATE TABLE `new_questions_log` (
  `group_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `friends_to_send` text COLLATE latin1_general_ci NOT NULL,
  `time` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `new_questions_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `new_question_info`
--

CREATE TABLE `new_question_info` (
  `user_id` bigint(20) unsigned NOT NULL,
  `grouping_id` bigint(20) unsigned NOT NULL,
  `friends_to_send` text COLLATE latin1_general_ci NOT NULL,
  FULLTEXT KEY `friends_to_send_index` (`friends_to_send`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `new_question_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_no` bigint(20) NOT NULL,
  `pdate` char(40) COLLATE latin1_general_ci DEFAULT NULL,
  `uid` char(35) COLLATE latin1_general_ci DEFAULT NULL,
  `name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `uniq_id_index` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `online`
--


-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE `password_recovery` (
  `sno` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_no` bigint(20) NOT NULL,
  `uid` varchar(35) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`sno`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `password_recovery`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_user`
--

CREATE TABLE `temp_user` (
  `temp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `institution` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `place` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `mail_id` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `time` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ccode` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(35) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_user`
--

