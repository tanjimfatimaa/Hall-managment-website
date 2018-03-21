-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 11:55 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `muna`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `link`) VALUES
(1, 'upload/14265334448943_778269805592531_7744968282476521340_n.jpg'),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, 'upload/142658728610929089_757501114334914_2842160616574427129_n (1).jpg'),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, 'userUplaod/142658774110929089_757501114334914_2842160616574427129_n (1).jpg'),
(31, ''),
(32, ''),
(33, ''),
(34, ''),
(35, 'userUplaod/142658786510929089_757501114334914_2842160616574427129_n (1).jpg'),
(36, ''),
(37, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `salt` varchar(256) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `roll` varchar(15) NOT NULL,
  `department` varchar(50) NOT NULL,
  `boarder` varchar(10) NOT NULL,
  `room` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `address`, `roll`, `department`, `boarder`, `room`, `email`, `contact_no`, `image`) VALUES
(1, 'abcd', '81dc1ce9e100732244a65b2692a7a48cfba051de9e45e3a7b34ace4a80cac354', 'Ôõã®~˜T%Ç¸§Ã¦”^Ë ¦d‘ÄÑÉ_ø¬7y', 'muna', 'KUETabc', '1207008', 'CSE', '105', '101', 'a@gmail.com', '0123456', 'userUpload/142658927810929089_757501114334914_2842160616574427129_n (1).jpg'),
(2, 'ovi123', 'f57f70890f13bdf9d37abc30fafb479c924deb984ee1eb395ca2585adea40e67', 'Ï›Åç›â¢@¬z­¢lÓ\r''®‘N_;ÐU•¢\\¿', 'alalala', 'KUET', '1007008', 'C.S.E', '104', '103', 'a@gmail.com', '0123456', ''),
(3, 'imon', '9040d6943ba19f577b51f8883de8c2279837304056ea2d56565d42b0cf18a79b', 'D@Û‚±z±µUòîoÑ\rÁ_<~¯ÈÕ@}þ˜]ÊSnÑ', 'imon', 'KUET', '1007008', 'CSE', '102', '108', 'a@gmail.com', '0123456', ''),
(4, 'admin', 'd55888f9a4e9e983a19c46e78035a85f8fe38b99122a9e2dcf91b601b394ba7e', '2‡ä~\n¬9^F¹“Ü)¡~Ô#×¦È©–dnž/ûy“=', 'admin', 'KUET', '1007008', 'CSE', '105', '102', 'a@gmail.com', '0123456', ''),
(5, 'abcde', '0ce7b110453356b3a09cb38941504e4a3ecbacb3c5a01e26bbcd1521502c3686', 'ìC\ZöÿåHut:0‹ö·\Z}qŽ­¯D•Ò³–5žØ', 'abcde', 'hji kljd', '107890', 'CSE', '123', '142', '', '', ''),
(6, 'babla', '9f0fe26117900723520ff86fd4506bd167f7ac3a06931419b3b724fa22ea2aea', '5K\0M[ë/|s®¿¾¸SãÚ*;PïÔ\rÙ', 'abcde', 'hji kljd', 'abcde', 'CSE', '123', '142', 'mhrsazal@gmail.com', '019163452', ''),
(7, 'babla1', '3e448a14899da203717576930e3f83b0b2d8b206d03465397a6eddc80a0a8d1b', '_QKçy9u7Ì·QIš >ÏË¯"“&G_¯Ç³', 'handh', 'ajgsdhg', '1093298', 'cde', '123', '303', 'hgdsf', '43678 5', ''),
(11, '', '', '', '', '', '', '', '', '', '', '', ''),
(12, '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '', '', '', '', '', '', '', '', '', '', '', 'userUplaod/14265888598943_778269805592531_7744968282476521340_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
