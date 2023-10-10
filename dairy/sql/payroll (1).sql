-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2017 at 09:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `databaseschema`
--

CREATE TABLE `databaseschema` (
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `databaseschema`
--

INSERT INTO `databaseschema` (`count`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `deduction_id` int(5) NOT NULL,
  `philhealth` int(20) NOT NULL,
  `bir` int(20) NOT NULL,
  `gsis` int(20) NOT NULL,
  `pag_ibig` int(20) NOT NULL,
  `loans` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`deduction_id`, `philhealth`, `bir`, `gsis`, `pag_ibig`, `loans`) VALUES
(1, 500, 300, 20, 1000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `emp_type` varchar(20) NOT NULL,
  `division` varchar(30) NOT NULL,
  `deduction` int(10) NOT NULL,
  `overtime` int(10) NOT NULL,
  `bonus` int(10) NOT NULL,
  `user_type` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `lname`, `fname`, `gender`, `emp_type`, `division`, `deduction`, `overtime`, `bonus`, `user_type`, `password`) VALUES
(1, 'Brian', 'Kimani', 'Male', 'Casual', 'Single', 1000, 2, 300, 'user', '12345'),
(12, 'Juma', 'Adams', 'Male', 'Regular', 'Single', 300, 9, 1122, 'user', '12345'),
(17, 'ASD', 'ASD', 'Female', 'Regular', 'ADA', 0, 0, 0, '', ''),
(18, 'ASD', 'ASD', 'Female', 'Regular', 'ADA', 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `ot_id` int(10) NOT NULL,
  `rate` int(10) NOT NULL,
  `none` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`ot_id`, `rate`, `none`) VALUES
(1, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(10) NOT NULL,
  `salary_rate` int(10) NOT NULL,
  `none` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `salary_rate`, `none`) VALUES
(1, 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cows`
--

CREATE TABLE `tbl_cows` (
  `cow_id` int(30) NOT NULL,
  `cow_name` varchar(255) NOT NULL,
  `cow_breed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cows`
--

INSERT INTO `tbl_cows` (`cow_id`, `cow_name`, `cow_breed`) VALUES
(1, 'Bravo', 'Fresian'),
(2, 'Rango', 'Guernsey');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disease`
--

CREATE TABLE `tbl_disease` (
  `dis_id` int(25) NOT NULL,
  `dis_name` varchar(255) NOT NULL,
  `dis_symptoms` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_disease`
--

INSERT INTO `tbl_disease` (`dis_id`, `dis_name`, `dis_symptoms`) VALUES
(1, 'Mastitis', 'swollen-udder lack-of-appetite watery-milk'),
(2, 'anthrax', 'bloody-diarrhea high-temperature '),
(3, 'Mouth and foot', ' mouth-sores'),
(4, 'Eye Problem', 'sunken-eyes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_milk`
--

CREATE TABLE `tbl_milk` (
  `milk_id` int(100) NOT NULL,
  `cow_name` text NOT NULL,
  `milk_date` text NOT NULL,
  `milk_time` text NOT NULL,
  `period` text NOT NULL,
  `employee` text NOT NULL,
  `milk_amount` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_milk`
--

INSERT INTO `tbl_milk` (`milk_id`, `cow_name`, `milk_date`, `milk_time`, `period`, `employee`, `milk_amount`) VALUES
(2, 'lelmet', '2017-02-03', ' 01:34:07', 'morning', 'Juma', '12.00'),
(3, 'bravo', '2017-02-03', ' 01:37:46', 'morning', 'Kamau', '3.50'),
(4, 'Bravo', '2017-02-03', ' 01:51:34', 'morning', 'Renz', '34.00'),
(5, 'Rango', '2017-02-03', ' 03:41:20', 'evening', 'Kimani', '12.50'),
(6, 'Bravo', '2017-02-06', ' 09:53:42', 'morning', 'Kimani', '12.00'),
(7, 'Rango', '2017-02-06', ' 04:09:50', 'evening', 'Kimani', '12.30'),
(8, 'Bravo', '2017-04-16', ' 08:45:31', 'morning', 'Kimani', '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poultry`
--

CREATE TABLE `tbl_poultry` (
  `eggs_id` int(20) NOT NULL,
  `egg_date` text NOT NULL,
  `egg_time` text NOT NULL,
  `period` text NOT NULL,
  `employee` text NOT NULL,
  `egg_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poultry`
--

INSERT INTO `tbl_poultry` (`eggs_id`, `egg_date`, `egg_time`, `period`, `employee`, `egg_number`) VALUES
(3, '2017-04-17', ' 12:05:19', 'morning', 'Kimani', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccination`
--

CREATE TABLE `tbl_vaccination` (
  `vacc_id` int(26) NOT NULL,
  `vacc_name` varchar(30) NOT NULL,
  `vacc_date` text NOT NULL,
  `vacc_time` text NOT NULL,
  `vacc_cow` varchar(30) NOT NULL,
  `vacc_doctor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vaccination`
--

INSERT INTO `tbl_vaccination` (`vacc_id`, `vacc_name`, `vacc_date`, `vacc_time`, `vacc_cow`, `vacc_doctor`) VALUES
(7, 'Foot rot', '2017-03-02', '08:59:07', 'Bravo', 'Kimani'),
(8, 'Bird Flu ', '2017-03-04', '10:43:47', 'Poultry', 'Juma');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'Colins', 'sabit', 'admin'),
(2, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databaseschema`
--
ALTER TABLE `databaseschema`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`deduction_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `tbl_cows`
--
ALTER TABLE `tbl_cows`
  ADD PRIMARY KEY (`cow_id`);

--
-- Indexes for table `tbl_disease`
--
ALTER TABLE `tbl_disease`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `tbl_milk`
--
ALTER TABLE `tbl_milk`
  ADD PRIMARY KEY (`milk_id`);

--
-- Indexes for table `tbl_poultry`
--
ALTER TABLE `tbl_poultry`
  ADD PRIMARY KEY (`eggs_id`);

--
-- Indexes for table `tbl_vaccination`
--
ALTER TABLE `tbl_vaccination`
  ADD PRIMARY KEY (`vacc_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `deduction_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `ot_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_cows`
--
ALTER TABLE `tbl_cows`
  MODIFY `cow_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_disease`
--
ALTER TABLE `tbl_disease`
  MODIFY `dis_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_milk`
--
ALTER TABLE `tbl_milk`
  MODIFY `milk_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_poultry`
--
ALTER TABLE `tbl_poultry`
  MODIFY `eggs_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_vaccination`
--
ALTER TABLE `tbl_vaccination`
  MODIFY `vacc_id` int(26) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
