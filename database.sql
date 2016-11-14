-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2016 at 02:02 PM
-- Server version: 5.1.67
-- PHP Version: 5.3.29-pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sn1145_scouts`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activiteiten`
--

DROP TABLE IF EXISTS `Activiteiten`;
CREATE TABLE IF NOT EXISTS `Activiteiten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tak` varchar(60) NOT NULL,
  `Datum` varchar(60) DEFAULT NULL,
  `Naam` varchar(255) DEFAULT NULL,
  `Beschrijving` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `Activity_log`
--

DROP TABLE IF EXISTS `Activity_log`;
CREATE TABLE IF NOT EXISTS `Activity_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Gebruiker` varchar(255) DEFAULT NULL,
  `Bericht` text,
  `Datum` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_logs`
--

DROP TABLE IF EXISTS `ci_logs`;
CREATE TABLE IF NOT EXISTS `ci_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` varchar(125) NOT NULL,
  `log_message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Logs table' AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  `userid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Drive`
--

DROP TABLE IF EXISTS `Drive`;
CREATE TABLE IF NOT EXISTS `Drive` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The file ID',
  `Naam` varchar(255) NOT NULL,
  `Tag` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_extension` varchar(50) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `Inschrijvingen_ontbijt`
--

DROP TABLE IF EXISTS `Inschrijvingen_ontbijt`;
CREATE TABLE IF NOT EXISTS `Inschrijvingen_ontbijt` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(120) DEFAULT NULL,
  `Voornaam` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Maand` int(2) DEFAULT NULL,
  `Aantal_Personen` int(10) DEFAULT NULL,
  `Te_betalen` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `Log_archive`
--

DROP TABLE IF EXISTS `Log_archive`;
CREATE TABLE IF NOT EXISTS `Log_archive` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(255) NOT NULL,
  `Month` varchar(255) NOT NULL,
  `Log_file` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

-- --------------------------------------------------------

--
-- Table structure for table `Mailing`
--

DROP TABLE IF EXISTS `Mailing`;
CREATE TABLE IF NOT EXISTS `Mailing` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(255) DEFAULT NULL,
  `Achternaam` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Vzw` int(1) DEFAULT NULL,
  `Ouders` int(1) DEFAULT NULL,
  `Leiding` int(1) DEFAULT NULL,
  `Oudervergadering` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Notifications`
--

DROP TABLE IF EXISTS `Notifications`;
CREATE TABLE IF NOT EXISTS `Notifications` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(244) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Verhuur` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `Ontbijt_datums`
--

DROP TABLE IF EXISTS `Ontbijt_datums`;
CREATE TABLE IF NOT EXISTS `Ontbijt_datums` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Month` varchar(20) DEFAULT NULL,
  `Month_nr` varchar(5) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `Deathline` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `Permissions`
--

DROP TABLE IF EXISTS `Permissions`;
CREATE TABLE IF NOT EXISTS `Permissions` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `verhuur` varchar(2) DEFAULT NULL,
  `mailinglist` varchar(2) DEFAULT NULL,
  `drive` varchar(2) DEFAULT NULL,
  `profiles` varchar(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `Photo_Gallery`
--

DROP TABLE IF EXISTS `Photo_Gallery`;
CREATE TABLE IF NOT EXISTS `Photo_Gallery` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(40) DEFAULT NULL,
  `Tak` varchar(60) NOT NULL,
  `File_path` varchar(500) NOT NULL,
  `File_name` varchar(250) NOT NULL,
  `Web_url` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `Takken`
--

DROP TABLE IF EXISTS `Takken`;
CREATE TABLE IF NOT EXISTS `Takken` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tak` varchar(30) DEFAULT NULL,
  `Beschrijving` text,
  `Title` varchar(255) DEFAULT NULL,
  `Sub_title` varchar(60) DEFAULT NULL,
  `Last_edited` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Tak` (`Tak`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Admin_role` varchar(2) NOT NULL,
  `Tak` varchar(60) NOT NULL,
  `Blocked` varchar(5) NOT NULL,
  `GSM` varchar(255) NOT NULL,
  `Theme` int(2) NOT NULL,
  `online` varchar(2) NOT NULL,
  `last_seen` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `User_logs`
--

DROP TABLE IF EXISTS `User_logs`;
CREATE TABLE IF NOT EXISTS `User_logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `User` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=295 ;

-- --------------------------------------------------------

--
-- Table structure for table `Verhuur`
--

DROP TABLE IF EXISTS `Verhuur`;
CREATE TABLE IF NOT EXISTS `Verhuur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Start_datum` varchar(255) DEFAULT NULL,
  `Eind_datum` varchar(255) DEFAULT NULL,
  `Groep` varchar(255) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `GSM` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
