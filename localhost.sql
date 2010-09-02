-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2010 at 01:37 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Arduino`
--
CREATE DATABASE `Arduino` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `Arduino`;

-- --------------------------------------------------------

--
-- Table structure for table `Couple`
--

CREATE TABLE `Couple` (
  `id` varchar(70) CHARACTER SET utf8 NOT NULL,
  `tilt` tinyint(1) NOT NULL,
  `force1` tinyint(1) NOT NULL,
  `force2` tinyint(1) NOT NULL,
  `temp` tinyint(1) NOT NULL,
  `shake` tinyint(1) NOT NULL,
  `audio` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Couple`
--

INSERT INTO `Couple` VALUES('guest', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Practice`
--

CREATE TABLE `Practice` (
  `id` varchar(70) CHARACTER SET latin1 NOT NULL,
  `resp_shake` tinyint(1) NOT NULL,
  `resp_shout` tinyint(1) NOT NULL,
  `ab_chin` tinyint(1) NOT NULL,
  `ab_breathing` tinyint(1) NOT NULL,
  `ab_telephone` tinyint(1) NOT NULL,
  `cpr_compressions` tinyint(1) NOT NULL,
  `cpr_chin` tinyint(1) NOT NULL,
  `cpr_nose` tinyint(1) NOT NULL,
  `cpr_breaths` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Practice`
--

INSERT INTO `Practice` VALUES('guest', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Results`
--

CREATE TABLE `Results` (
  `id` varchar(70) COLLATE utf8_bin NOT NULL,
  `resp_shake` tinyint(1) NOT NULL,
  `resp_shout` tinyint(1) NOT NULL,
  `ab_chin` tinyint(1) NOT NULL,
  `ab_breathing` tinyint(1) NOT NULL,
  `ab_telephone` tinyint(1) NOT NULL,
  `cpr_compressions` tinyint(1) NOT NULL,
  `cpr_chin` tinyint(1) NOT NULL,
  `cpr_nose` tinyint(1) NOT NULL,
  `cpr_breaths` tinyint(1) NOT NULL,
  `danger` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Results`
--

INSERT INTO `Results` VALUES('guest', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);
