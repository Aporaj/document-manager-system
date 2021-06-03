-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 12:44 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_office`
--

-- --------------------------------------------------------

--
-- Table structure for table `department_o`
--

CREATE TABLE `department_o` (
  `ref` int(11) NOT NULL,
  `dpt_name` varchar(100) NOT NULL,
  `dpt_code` varchar(100) NOT NULL,
  `dated` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_o`
--

INSERT INTO `department_o` (`ref`, `dpt_name`, `dpt_code`, `dated`) VALUES
(3, 'Accountancy', '738173000', 'Aug 27,2019'),
(4, 'Agribusiness', '808423240', 'Oct 29,2019'),
(5, 'ICT', '281873445', 'Nov 11,2019');

-- --------------------------------------------------------

--
-- Table structure for table `files_x`
--

CREATE TABLE `files_x` (
  `ref` int(11) NOT NULL,
  `ftitle` text NOT NULL,
  `fcaption` text NOT NULL,
  `ffile` text NOT NULL,
  `ffile_type` varchar(100) NOT NULL,
  `ffile_code` varchar(100) NOT NULL,
  `fdate` varchar(100) NOT NULL,
  `ffrom` varchar(100) NOT NULL,
  `fto` varchar(100) NOT NULL,
  `fwhere` varchar(100) NOT NULL,
  `fseen` varchar(100) NOT NULL,
  `fworkedon` varchar(100) NOT NULL,
  `fstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files_x`
--

INSERT INTO `files_x` (`ref`, `ftitle`, `fcaption`, `ffile`, `ffile_type`, `ffile_code`, `fdate`, `ffrom`, `fto`, `fwhere`, `fseen`, `fworkedon`, `fstatus`) VALUES
(3, 'Still Testing fah', 'Still doing it...', '5db95a4d10a216.36508126.docx', 'pdf', '78657', 'Oct 30,2019', '12', '13', 'nill', '0', '0', '2'),
(4, 'Test 3rd', 'Trying the desk...', '5db9848e3bf8f1.20892479.docx', 'docx', '98234', 'Oct 30,2019', '12', '14', 'nill', '0', '0', '600'),
(5, '3D testing boot', 'My my test', '5db996af407a28.83864104.docx', 'docx', '86255', 'Oct 30,2019', '13', '14', 'nill', '0', '0', '0'),
(6, '3D testing boot', 'My my test', '5db996c42107c1.44656420.docx', 'docx', '31764', 'Oct 30,2019', '13', '14', 'nill', '0', '0', '0'),
(7, 'Testing UPL', 'Still de test am', '5db9a188f0d5f7.62032443.csv', 'csv', '62835', 'Oct 30,2019', '12', '14', 'nill', '0', '0', '600'),
(8, 'Test the DOC', 'Still firing.....', '5db9a20a5625f6.30949022.docx', 'docx', '13675', 'Oct 30,2019', '12', '13', 'nill', '0', '0', '200'),
(9, 'Tracker V7', 'Doing....', '5db9ef40846bd1.93021675.docx', 'docx', '64755', 'Oct 30,2019', '13', '14', 'nill', '0', '0', '0'),
(10, 'Tracker V7', 'Doing....', '5db9ef5f96ebf5.97914873.docx', 'docx', '86471', 'Oct 30,2019', '13', '14', 'nill', '0', '0', '0'),
(11, 'Leave Request', 'For 2019 annual Leave', '5dba8f597225e3.07722319.docx', 'docx', '41863', 'Oct 31,2019', '12', '14', 'nill', '0', '0', '600'),
(12, 'Transfer Request', 'To make it quick', '5dba9c9c40dfa8.46301655.csv', 'csv', '85585', 'Oct 31,2019', '12', '13', 'nill', '0', '0', '0'),
(13, 'Travel Request', 'To test PDF', '5dba9cec17c082.47464193.pdf', 'pdf', '43532', 'Oct 31,2019', '12', '13', 'nill', '0', '0', '0'),
(14, 'Maternity Leave', 'The is to notify you for the .....', '5dc946c5d40299.49886428.docx', 'docx', '55673', 'Nov 11,2019', '17', '19', 'nill', '0', '0', '200');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `ref` int(11) NOT NULL,
  `purpose_title` text NOT NULL,
  `purpose_caption` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  `owner_ref` varchar(100) NOT NULL,
  `dated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ref` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `oname` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `pob` varchar(100) NOT NULL,
  `current_address` text NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `height` varchar(10) NOT NULL,
  `blood_group` varchar(90) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `maiden_name` varchar(100) NOT NULL,
  `next_kin` varchar(100) NOT NULL,
  `dated` varchar(100) NOT NULL,
  `place` text NOT NULL,
  `state` varchar(100) NOT NULL,
  `lga` varchar(100) NOT NULL,
  `rc_num` varchar(100) NOT NULL,
  `sequence_number` varchar(100) NOT NULL,
  `id_formnum` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `nin` varchar(100) NOT NULL,
  `exp_date` varchar(100) NOT NULL,
  `passport` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ref`, `sname`, `oname`, `sex`, `dob`, `pob`, `current_address`, `occupation`, `height`, `blood_group`, `marital_status`, `maiden_name`, `next_kin`, `dated`, `place`, `state`, `lga`, `rc_num`, `sequence_number`, `id_formnum`, `email_address`, `nin`, `exp_date`, `passport`) VALUES
(1, 'Olayemi', 'Olawuyi', 'M', '2019-08-07', 'Ilorin', 'Agbadam, Gaa akanbi', 'Student', '1.22', 'AA', 'single', 'Dada', 'Mr. Olayemi', '09, Aug, 2019', 'Taiwo Isale', 'Kwara', 'Ilorin West', '1353408686247010', '', '', 'olayemi@gmail.com', '31983006621', '2019-08-20', '5d4d5db23ac703.13205650.jpg'),
(2, 'Isreal', 'Paul', 'M', '2019-08-21', 'Uyo', 'Adewole, ilorin', 'Student', '1.22', 'AA', 'single', 'Ayowole', 'Mr. Ayeni', '13, Aug, 2019', 'Paramount', 'Kwara', 'Ilorin West', '5641174197587889', '', '', 'paul@gmail.com', '86627728516', '2019-08-29', '5d5288024fd9a0.10657776.jpg'),
(3, 'Unachukwu', 'Patrick', 'M', '2019-08-29', 'Ilorin', 'Adewole, ilorin', 'Student', '1.22', 'AA', 'single', 'Favour', 'Mr. Unachukwu', '13, Aug, 2019', 'Paramount', 'Kwara', 'Ilorin West', '5197056368472093', '', '', 'patrik123@gmail.com', '72447046543', '2019-08-30', '5d5294ac044484.42370056.jpg'),
(4, 'Faruq', 'Animashaun', 'M', '2019-08-15', 'Ajashe', 'Fabulous', 'Engineer', '1.55', 'AA', 'single', 'Ayowole', 'Mr. Olayemi', '21, Aug, 2019', 'Fabulous', 'Kwara', 'Ilorin West', '1421824682312250', '', '', 'faruq@gmail.com', '50549656632', '2019-08-30', '5d5d09caae40e0.80729748.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff_rank`
--

CREATE TABLE `staff_rank` (
  `ref` int(11) NOT NULL,
  `rank_name` varchar(50) NOT NULL,
  `rank_code` varchar(30) NOT NULL,
  `dated` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_rank`
--

INSERT INTO `staff_rank` (`ref`, `rank_name`, `rank_code`, `dated`) VALUES
(5, 'Junior Cadet', '663505998', 'Aug 27,2019'),
(6, 'Senior Cadet', '038500005', 'Aug 27,2019');

-- --------------------------------------------------------

--
-- Table structure for table `staff_role`
--

CREATE TABLE `staff_role` (
  `ref` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_code` varchar(30) NOT NULL,
  `dated` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_role`
--

INSERT INTO `staff_role` (`ref`, `role_name`, `role_code`, `dated`) VALUES
(7, 'HOD', '554063294', 'Oct 29,2019'),
(8, 'Director', '252689413', 'Oct 29,2019');

-- --------------------------------------------------------

--
-- Table structure for table `tracker_o`
--

CREATE TABLE `tracker_o` (
  `ref` int(11) NOT NULL,
  `file_code` varchar(100) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_by` varchar(100) NOT NULL,
  `file_to` varchar(100) NOT NULL,
  `worked_by` varchar(100) NOT NULL,
  `worked_date` varchar(100) NOT NULL,
  `worked_time` varchar(100) NOT NULL,
  `worked_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracker_o`
--

INSERT INTO `tracker_o` (`ref`, `file_code`, `file_type`, `file_by`, `file_to`, `worked_by`, `worked_date`, `worked_time`, `worked_status`) VALUES
(1, '86471', 'docx', '13', '', 'none', 'Oct 30,2019', '09:15:27 pm', '0'),
(2, '62835', 'csv', '12', '14', '13', 'Oct 30,2019', '09:30:17 pm', '600'),
(3, '13675', 'docx', '12', 'none', '13', 'Oct 30,2019', '09:35:01 pm', '2'),
(4, '13675', 'docx', '12', 'none', '13', 'Oct 30,2019', '09:36:59 pm', '200'),
(5, '41863', 'docx', '12', '13', 'none', 'Oct 31,2019', '08:38:01 am', '0'),
(6, '41863', 'docx', '12', '14', '13', 'Oct 31,2019', '08:42:45 am', '600'),
(7, '85585', 'csv', '12', '13', 'none', 'Oct 31,2019', '09:34:36 am', '0'),
(8, '43532', 'pdf', '12', '13', 'none', 'Oct 31,2019', '09:35:56 am', '0'),
(9, '55673', 'docx', '17', '18', 'none', 'Nov 11,2019', '12:32:22 pm', '0'),
(10, '55673', 'docx', '17', '19', '18', 'Nov 11,2019', '12:38:27 pm', '600'),
(11, '55673', 'docx', '17', 'none', '19', 'Nov 11,2019', '12:40:18 pm', '200');

-- --------------------------------------------------------

--
-- Table structure for table `xgenta`
--

CREATE TABLE `xgenta` (
  `ref` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `marital` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `role_name` text NOT NULL,
  `dpt` text NOT NULL,
  `access_code` varchar(100) NOT NULL,
  `passport` text NOT NULL,
  `dated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xgenta`
--

INSERT INTO `xgenta` (`ref`, `fname`, `lname`, `email`, `phone`, `dob`, `marital`, `gender`, `rank`, `role`, `role_name`, `dpt`, `access_code`, `passport`, `dated`) VALUES
(12, 'John', 'Piper', 'pp@gmail.com', '09087654321', '2019-10-09', 'single', 'male', '663505998', 'none', '', '808423240', 'G87H62', '5db9436ea78dd2.87770830.jpg', '30, Oct, 2019'),
(13, 'Rainbow', 'Juliet', 'jj@gmail.com', '09021324354', '2019-10-31', 'single', 'female', '038500005', '554063294', 'HOD', '808423240', '0939HG', '5db946bbb70449.32319233.jpg', '30, Oct, 2019'),
(14, 'Alao', 'Bashket', 'bas@gmail.com', '07021324354', '2019-10-20', 'single', 'female', '038500005', '252689413', 'Director', '808423240', '77966H', '5db9473c97db71.25248686.jpg', '30, Oct, 2019'),
(15, 'Adeyemi', 'Philip', 'ady@gmail.com', '09088778877', '2019-10-25', 'single', 'female', '038500005', '554063294', 'HOD', '738173000', 'F68UH7', '5db950575aa6a4.28014208.jpg', '30, Oct, 2019'),
(16, 'Kunle', 'Olayinka', 'kunle@gmail.com', '08132435465', '2019-10-25', 'single', 'male', '038500005', '252689413', 'Director', '738173000', 'FK675J', '5dba8d79528a82.52108119.jpg', '31, Oct, 2019'),
(17, 'Tolu', 'Ajiboye', 'toluajiboye@gmail.com', '08152320828', '2019-11-27', 'single', 'male', '663505998', 'none', '', '281873445', 'K2J539', '5dc94555047e04.21679199.jpg', '11, Nov, 2019'),
(18, 'Kemi', 'Olaniyi', 'olan@gmail.com', '090887826738', '2019-11-26', 'married', 'female', '038500005', '554063294', 'HOD', '281873445', 'H38JH7', '5dc9465ae36f24.05858138.png', '11, Nov, 2019'),
(19, 'Olagunju', 'Deborah', 'olagunju@gmail.com', '0812345656', '2019-11-22', 'married', 'male', '038500005', '252689413', 'Director', '281873445', 'U85HH7', '5dc948050c2bd1.18038870.png', '11, Nov, 2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_o`
--
ALTER TABLE `department_o`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `files_x`
--
ALTER TABLE `files_x`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `staff_rank`
--
ALTER TABLE `staff_rank`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `staff_role`
--
ALTER TABLE `staff_role`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `tracker_o`
--
ALTER TABLE `tracker_o`
  ADD PRIMARY KEY (`ref`);

--
-- Indexes for table `xgenta`
--
ALTER TABLE `xgenta`
  ADD PRIMARY KEY (`ref`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department_o`
--
ALTER TABLE `department_o`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `files_x`
--
ALTER TABLE `files_x`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_rank`
--
ALTER TABLE `staff_rank`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_role`
--
ALTER TABLE `staff_role`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tracker_o`
--
ALTER TABLE `tracker_o`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `xgenta`
--
ALTER TABLE `xgenta`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
