-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2019 at 05:32 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `das`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `hospital_id` int(5) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `hospital_id`, `password`) VALUES
('admin', 111, '1234'),
('admin', 222, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `apnmnt_history`
--

CREATE TABLE `apnmnt_history` (
  `date` int(5) NOT NULL,
  `month` int(5) NOT NULL,
  `year` int(5) NOT NULL,
  `doc_id` int(5) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `time_slot` varchar(30) NOT NULL,
  `h_code` int(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(5) NOT NULL,
  `serial` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apnmnt_history`
--

INSERT INTO `apnmnt_history` (`date`, `month`, `year`, `doc_id`, `shift`, `time_slot`, `h_code`, `status`, `username`, `serial`) VALUES
(24, 2, 19, 222, 'morning1', '8:40 AM - 8:55 AM', 222, 'checked', 'chan', 2),
(24, 2, 19, 222, 'morning1', '8:20 AM - 8:35 AM', 222, 'Absent', 'rabbi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `apointment`
--

CREATE TABLE `apointment` (
  `date` int(5) NOT NULL,
  `month` int(5) NOT NULL,
  `year` int(5) NOT NULL,
  `doc_id` int(5) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `time_slot` varchar(30) NOT NULL,
  `h_code` int(5) NOT NULL,
  `status` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `serial` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apointment`
--

INSERT INTO `apointment` (`date`, `month`, `year`, `doc_id`, `shift`, `time_slot`, `h_code`, `status`, `username`, `serial`) VALUES
(26, 2, 19, 222, 'morning1', '8 AM - 8:15 AM', 222, 'not checked', 'chan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `full_name` varchar(30) NOT NULL,
  `doc_id` int(20) NOT NULL,
  `h_code` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `degree1` varchar(30) NOT NULL,
  `degree2` varchar(30) NOT NULL,
  `degree3` varchar(30) NOT NULL,
  `degree4` varchar(30) NOT NULL,
  `degree5` varchar(30) NOT NULL,
  `specalist` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `availability` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`full_name`, `doc_id`, `h_code`, `username`, `degree1`, `degree2`, `degree3`, `degree4`, `degree5`, `specalist`, `email`, `contact_no`, `password`, `availability`) VALUES
('Dr. Rana Khandakar', 222, 222, 'ranaana', 'degree1', 'degree2', 'degre3', 'degree4', 'degree5', 'specalist', 'rana@gmail.com', '0123456', '1234', 'available'),
('Dr. kalam', 111, 222, 'kalam', 'degree1', 'degree2', 'degre3', 'degree4', 'degree5', 'specalist', 'dfdsfdsf@gmail.com', '0123456', '1234', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `doc_hospital`
--

CREATE TABLE `doc_hospital` (
  `doc_id` int(5) NOT NULL,
  `h_code` int(5) NOT NULL,
  `shift` varchar(30) NOT NULL,
  `availability` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_hospital`
--

INSERT INTO `doc_hospital` (`doc_id`, `h_code`, `shift`, `availability`) VALUES
(222, 222, 'morning1', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `h_name` varchar(20) NOT NULL,
  `h_code` int(5) NOT NULL,
  `address` varchar(10) NOT NULL,
  `road` varchar(30) NOT NULL,
  `poat` varchar(10) NOT NULL,
  `block` varchar(10) NOT NULL,
  `section` varchar(30) NOT NULL,
  `city` varchar(10) NOT NULL,
  `division` varchar(10) NOT NULL,
  `phon1` varchar(11) NOT NULL,
  `phon2` varchar(11) NOT NULL,
  `phon3` varchar(11) NOT NULL,
  `hotline` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `website` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`h_name`, `h_code`, `address`, `road`, `poat`, `block`, `section`, `city`, `division`, `phon1`, `phon2`, `phon3`, `hotline`, `email`, `website`) VALUES
('LABAID', 111, 'Mirpure-01', 'Road-02', 'Ploat-2/A', 'Block-02', 'Section-C', 'Mirpure-1', 'Dhaka-1216', '0123456789', '01234567981', '01234567894', '12345678', 'labaid@gmaol.hosp.co', 'labaid.com'),
('DELTA', 222, 'Mirpure-02', 'Road-03', 'Ploat-2/A', 'Block-05', 'Section-C', 'Mirpure-02', 'Dhaka-1216', '012456789', '012456789', '0123456789', '12345689', 'delta@yahoo.hosp.com', 'delta.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `full_name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phon_no` varchar(11) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`full_name`, `username`, `phon_no`, `age`, `gender`, `email`, `password`) VALUES
('Taufiq Hasan', 'Taufiq', '0123456789', 25, 'male', 'drsalam@gmail.com', '1234'),
('Golam Rabbi', 'rabbi', '0123456789', 25, 'male', 'rabbi@gmail.com', '1234'),
('Mono Chandan', 'chan', '0123456789', 25, 'male', 'chandan@gmail.com', '1234'),
('Apu mazumder', 'Apu', '0123456789', 25, 'male', 'apu@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `username` varchar(20) NOT NULL,
  `doc_id` int(5) NOT NULL,
  `hosp_id` int(5) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `date` int(5) NOT NULL,
  `month` int(5) NOT NULL,
  `year` int(5) NOT NULL,
  `problem` varchar(400) NOT NULL,
  `medicine1` varchar(30) NOT NULL,
  `time1` varchar(5) NOT NULL,
  `medicine2` varchar(30) NOT NULL,
  `time2` varchar(5) NOT NULL,
  `medicine3` varchar(30) NOT NULL,
  `time3` varchar(5) NOT NULL,
  `test1` varchar(30) NOT NULL,
  `test2` varchar(30) NOT NULL,
  `extra1` varchar(30) NOT NULL,
  `extra2` varchar(30) NOT NULL,
  `extra3` varchar(30) NOT NULL,
  `next_meet` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`username`, `doc_id`, `hosp_id`, `shift`, `date`, `month`, `year`, `problem`, `medicine1`, `time1`, `medicine2`, `time2`, `medicine3`, `time3`, `test1`, `test2`, `extra1`, `extra2`, `extra3`, `next_meet`) VALUES
('chan', 222, 222, 'morning1', 24, 2, 19, 'When patient meets doctor, as well as engaging in a transaction with a clinical purpose, they react to one another as people. Their personalities and ability to make relationships in general also affect the professional interaction. As with other relationships, things can go wrong. The outcome of the consultation may not then be what was hoped for or intended on either side. This 1994 book conside', 'medicine1', '1-0-1', 'medicine2', '1-1-1', 'medicine3', '0-0-1', 'test1', 'test2', 'medicine4          1-1-0', 'test3', '', '26-2-19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
