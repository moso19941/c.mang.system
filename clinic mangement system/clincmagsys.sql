-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 11:33 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clincmagsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `past` mediumtext NOT NULL,
  `present` mediumtext NOT NULL,
  `medical` mediumtext NOT NULL,
  `family` mediumtext NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`past`, `present`, `medical`, `family`, `id`) VALUES
('Broke his leg ', 'pain in cheast', 'no medical recored', 'no family history', 123),
('', '', '', '', 212),
('', 'low blood presure', '', '', 123),
('', 'sdafdsa', '', '', 123),
('', '', '', 'his father has diabetes', 123);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fn` varchar(80) NOT NULL,
  `ln` varchar(80) NOT NULL,
  `age` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fn`, `ln`, `age`, `type`, `phone`) VALUES
(123, 'sulaiman', 'aloraini', 23, 'student', ''),
(212, 'Ali', 'Omar', 22, 'Staff', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `comment` mediumtext NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `comment`, `type`) VALUES
(123, 'any thing test', 'report'),
(123, 'dsafdsafdsafdsa', 'Sick Leave'),
(123, 'sdafdsafdsafdsafds', 'Report');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `Complaint` mediumtext NOT NULL,
  `Diagnosis` mediumtext NOT NULL,
  `Comments` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `No`, `Complaint`, `Diagnosis`, `Comments`) VALUES
(123, 1, 'headache', '', NULL),
(123, 2, 'leg injury', 'Pulled hamstring', 'Rest 3 week at home'),
(123, 5, 'dsfdsa', 'sdafdsa', 'sadfdsafdsafds'),
(123, 6, 'feel dazy', 'low blood presure', 'Rest for one day'),
(123, 7, 'sadfsda', 'sdafdsa', 'sadfdsfs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
