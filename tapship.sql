-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: b3bu9bb23ikjqsiv8aku-mysql.services.clever-cloud.com:3306
-- Generation Time: May 20, 2021 at 03:21 PM
-- Server version: 8.0.22-13
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b3bu9bb23ikjqsiv8aku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_password`) VALUES
(1, 'admin', 'Gapu@8540');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `u_id` int NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_mobile` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_address` varchar(500) NOT NULL,
  `u_subject` varchar(500) NOT NULL,
  `u_message` text NOT NULL,
  `u_date` varchar(50) NOT NULL,
  `u_time` varchar(30) DEFAULT NULL,
  `u_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`u_id`, `u_name`, `u_mobile`, `u_email`, `u_address`, `u_subject`, `u_message`, `u_date`, `u_time`, `u_status`) VALUES
(1, 'Raunak Choudhary', '9782507934', 'raunakc77@gmail.com', '67, Arbindo Marg, Kalyanpur, Barmer (Rajasthan)', 'Please Help Me. ', 'I am a new user. Help me in making an account.', '2021-04-22', '01:07 AM', '1'),
(2, 'Ganpat Patel', '9672836724', 'gapu.012@gmail.com', '569, Rajiv Nagar, Kundapura, Udupi (Karnataka)', 'Lockdown Problem', 'Help Out, due to lockdown I have doubt whether your platform can still help me to get transport deals. I want to hear from you whether your platform will be active during lockdown state also? ', '2021-04-23 ', '02:00 PM', '1'),
(3, 'Avinash', '9638527410', 'avinash16@gmail.com', '45, 47th Cross, Chickpet, Banglore Urban (Karnataka)', 'Brief me about your platform', 'Hey! I am a new user and I want to use your platform as a customer. So please brief me about process of buying as a customer through your platform.', '2021-04-23', '09:36 PM', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cropbid`
--

CREATE TABLE `cropbid` (
  `cb_id` int NOT NULL,
  `cb_c_mobile` varchar(50) NOT NULL,
  `cb_f_mobile` varchar(50) NOT NULL,
  `cb_cr_id` int NOT NULL,
  `cb_bidprice` int NOT NULL,
  `cb_status` varchar(10) NOT NULL,
  `cb_paytype` varchar(100) NOT NULL,
  `cb_tid` varchar(100) NOT NULL,
  `cb_tproof` varchar(500) NOT NULL,
  `cb_transporttype` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cropdetails`
--

CREATE TABLE `cropdetails` (
  `cro_id` int NOT NULL,
  `cro_name` varchar(50) NOT NULL,
  `cro_type` varchar(25) NOT NULL,
  `cro_costperkg` varchar(25) DEFAULT NULL,
  `cro_msp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cropdetails`
--

INSERT INTO `cropdetails` (`cro_id`, `cro_name`, `cro_type`, `cro_costperkg`, `cro_msp`) VALUES
(1, 'Mango', 'Fruits', '40', 60),
(2, 'Tomato', 'Vegitables', '10', 15),
(3, 'Banana', 'Fruits', '15', 23),
(4, 'Carrot', 'Vegitables', '10', 15),
(5, 'Rice', 'Feed Crops', '10', 15),
(6, 'Onion', 'Vegitables', '12', 18),
(7, 'Cauliflower', 'Vegitables', '12', 18),
(8, 'Orange', 'Fruits', '14', 21),
(9, 'Pomegranate', 'Fruits', '50', 75),
(10, 'Wheat', 'Feed Crops', '16', 24),
(11, 'Corn', 'Feed Crops', '14', 21),
(12, 'Grapes', 'Fruits', '30', 45),
(27, 'Oranges', 'Fruits', '25', 38),
(28, 'Ladies Fingers', 'Vegitables', '22', 33),
(30, 'Chilli', 'Vegitables', '15', 23),
(31, 'Ladies Finger', 'Vegitables', '25', 38);

-- --------------------------------------------------------

--
-- Table structure for table `cropsale`
--

CREATE TABLE `cropsale` (
  `cr_id` int NOT NULL,
  `cr_f_mobile` varchar(10) NOT NULL,
  `cr_cro_id` int NOT NULL,
  `cr_quantity` varchar(10) NOT NULL,
  `cr_img1` varchar(500) NOT NULL,
  `cr_img2` varchar(500) NOT NULL,
  `cr_img3` varchar(500) NOT NULL,
  `cr_mep` varchar(10) NOT NULL,
  `cr_date` date NOT NULL,
  `cr_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_mobile` varchar(25) NOT NULL,
  `c_contactname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `c_gender` varchar(25) NOT NULL,
  `c_age` varchar(10) NOT NULL,
  `c_street` varchar(50) NOT NULL,
  `c_city` varchar(25) NOT NULL,
  `c_state` varchar(25) NOT NULL,
  `c_pincode` varchar(10) NOT NULL,
  `c_type` varchar(25) NOT NULL,
  `c_registration` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `c_aadhar` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `c_aadharpdf` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `c_pan` varchar(25) NOT NULL,
  `c_panpdf` varchar(100) NOT NULL,
  `c_photo` varchar(100) NOT NULL,
  `c_password` varchar(25) NOT NULL,
  `c_approve` varchar(100) NOT NULL,
  `c_tsv_otp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `c_tsv_validity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `c_temppass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_mobile`, `c_contactname`, `c_gender`, `c_age`, `c_street`, `c_city`, `c_state`, `c_pincode`, `c_type`, `c_registration`, `c_aadhar`, `c_aadharpdf`, `c_pan`, `c_panpdf`, `c_photo`, `c_password`, `c_approve`, `c_tsv_otp`, `c_tsv_validity`, `c_temppass`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 'Aditya Chopra', '9672836724', '', 'Male', '32', '56, Akshay Vihar', 'Bagalkot', 'Karnataka', '577001', 'Wholesaler', '', '345647893567', 'assets/documents/aadhar/9672836724-Aditya Chopra-AADHAR.pdf', 'RTVCD6453O', 'assets/documents/pan/9672836724-Aditya Chopra-PAN.pdf', 'assets/documents/photo/9672836724-Aditya Chopra-img3.jpg', 'Gapu@8540', '2', '', '', ''),
(2, 'Surender Singh Pvt. Ltd.', '9782507934', 'Abhimanyu Singh', 'Male', '32', 'DLF Queens Court, Greater Kailash Part 2', 'New Delhi', 'Delhi', '110048', 'Organization', 'assets/documents/registration/9782507934-Surender Singh Pvt. Ltd.-Registration.pdf', '', '', 'KLRTC7320Q', 'assets/documents/pan/9782507934-Surender Singh Pvt. Ltd.-PAN.pdf', 'assets/documents/photo/9782507934-Surender Singh Pvt. Ltd.-pic8.jpg', 'Gapu@8540', '2', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `d_id` int NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_mobile` varchar(25) NOT NULL,
  `d_gender` varchar(25) NOT NULL,
  `d_age` varchar(10) NOT NULL,
  `d_street` varchar(50) NOT NULL,
  `d_city` varchar(25) NOT NULL,
  `d_state` varchar(25) NOT NULL,
  `d_pincode` varchar(10) NOT NULL,
  `d_aadhar` varchar(25) NOT NULL,
  `d_aadharpdf` varchar(100) NOT NULL,
  `d_pan` varchar(25) NOT NULL,
  `d_panpdf` varchar(100) NOT NULL,
  `d_photo` varchar(100) NOT NULL,
  `d_dlnumber` varchar(25) NOT NULL,
  `d_dlpdf` varchar(100) NOT NULL,
  `d_vehiclenumber` varchar(25) NOT NULL,
  `d_vehiclercpdf` varchar(100) NOT NULL,
  `d_lat` varchar(100) DEFAULT NULL,
  `d_long` varchar(100) DEFAULT NULL,
  `d_date` varchar(500) NOT NULL,
  `d_time` varchar(500) NOT NULL,
  `d_password` varchar(25) NOT NULL,
  `d_approve` varchar(10) NOT NULL,
  `d_tsv_otp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `d_tsv_validity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `d_temppass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`d_id`, `d_name`, `d_mobile`, `d_gender`, `d_age`, `d_street`, `d_city`, `d_state`, `d_pincode`, `d_aadhar`, `d_aadharpdf`, `d_pan`, `d_panpdf`, `d_photo`, `d_dlnumber`, `d_dlpdf`, `d_vehiclenumber`, `d_vehiclercpdf`, `d_lat`, `d_long`, `d_date`, `d_time`, `d_password`, `d_approve`, `d_tsv_otp`, `d_tsv_validity`, `d_temppass`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `f_id` int NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_mobile` varchar(25) NOT NULL,
  `f_gender` varchar(25) NOT NULL,
  `f_age` varchar(10) NOT NULL,
  `f_street` varchar(50) NOT NULL,
  `f_city` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `f_state` varchar(25) NOT NULL,
  `f_pincode` varchar(10) NOT NULL,
  `f_aadhar` varchar(25) NOT NULL,
  `f_aadharpdf` varchar(500) NOT NULL,
  `f_pan` varchar(25) NOT NULL,
  `f_panpdf` varchar(500) NOT NULL,
  `f_photo` varchar(500) NOT NULL,
  `f_password` varchar(25) NOT NULL,
  `f_approve` varchar(10) NOT NULL,
  `f_bankholder` varchar(100) NOT NULL,
  `f_bankaccount` varchar(100) NOT NULL,
  `f_bankifsc` varchar(100) NOT NULL,
  `f_bankname` varchar(200) NOT NULL,
  `f_bankbranch` varchar(100) NOT NULL,
  `f_bankpassbook` varchar(200) NOT NULL,
  `f_tsv_otp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `f_tsv_validity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `f_temppass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`f_id`, `f_name`, `f_mobile`, `f_gender`, `f_age`, `f_street`, `f_city`, `f_state`, `f_pincode`, `f_aadhar`, `f_aadharpdf`, `f_pan`, `f_panpdf`, `f_photo`, `f_password`, `f_approve`, `f_bankholder`, `f_bankaccount`, `f_bankifsc`, `f_bankname`, `f_bankbranch`, `f_bankpassbook`, `f_tsv_otp`, `f_tsv_validity`, `f_temppass`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kiosk`
--

CREATE TABLE `kiosk` (
  `k_id` int NOT NULL,
  `k_pincode` varchar(10) NOT NULL,
  `k_district` varchar(50) NOT NULL,
  `k_state` varchar(50) NOT NULL,
  `k_name` varchar(100) NOT NULL,
  `k_mobile` varchar(25) NOT NULL,
  `k_gender` varchar(20) NOT NULL,
  `k_age` varchar(10) NOT NULL,
  `k_aadhar` varchar(25) NOT NULL,
  `k_aadharpdf` varchar(500) NOT NULL,
  `k_address` varchar(500) NOT NULL,
  `k_photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kiosk`
--

INSERT INTO `kiosk` (`k_id`, `k_pincode`, `k_district`, `k_state`, `k_name`, `k_mobile`, `k_gender`, `k_age`, `k_aadhar`, `k_aadharpdf`, `k_address`, `k_photo`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', ''),
(1, '560001', 'Bangalore Urban', 'Karnataka', 'Chethan Shetty', '8422558302', 'Male', '42', '349502596104', 'assets/documents/aadhar/8422558302-Chethan Shetty-AADHAR.pdf', 'Bangalore Head Post Office, Bangalore North', 'assets/documents/photo/8422558302-Chethan Shetty-pic1.jpg'),
(2, '400001', 'Mumbai district (ex Bombay)', 'Maharashtra', 'Sikhar Gupta', '8821008937', 'Male', '35', '259478789130', 'assets/documents/aadhar/8821008937-Sikhar Gupta-AADHAR.pdf', 'Mumbai Head Post Office, Mumbai', 'assets/documents/photo/8821008937-Sikhar Gupta-pic2.jpg'),
(3, '110001', 'New Delhi', 'Delhi', 'Varun Mishra', '9302525387', 'Male', '39', '689845492783', 'assets/documents/aadhar/9302525387-Varun Mishra-AADHAR.pdf', 'Delhi Head Post Office, Delhi Circle, New Delhi', 'assets/documents/photo/9302525387-Varun Mishra-pic3.jpg'),
(4, '700001', 'Kolkata', 'West Bengal', 'Abhishek Bharadwaj', '9961797112', 'Male', '45', '472018910945', 'assets/documents/aadhar/9961797112-Abhishek Bharadwaj-AADHAR.pdf', 'Kolkatta Head Post Office, Kolkata', 'assets/documents/photo/9961797112-Abhishek Bharadwaj-pic4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mepdetails`
--

CREATE TABLE `mepdetails` (
  `id` int NOT NULL,
  `cro_id` int NOT NULL,
  `mep` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mepdetails`
--

INSERT INTO `mepdetails` (`id`, `cro_id`, `mep`) VALUES
(1, 1, 62),
(2, 6, 19);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `otp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `validity` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `mobile`, `otp`, `validity`) VALUES
(1, '9672836724', '345952', 1),
(2, '9672836724', '345952', 1),
(3, '9672836724', '345952', 1),
(4, '9672836724', '345952', 1),
(5, '9672836724', '345952', 1),
(6, '9782507934', '234575', 1),
(7, '9782507934', '234575', 1),
(8, '9782507934', '234575', 1),
(9, '9672836724', '345952', 1),
(10, '9672836724', '345952', 1),
(11, '9672836724', '345952', 1),
(12, '9782507934', '234575', 1),
(13, '9782507934', '234575', 1),
(14, '9672836724', NULL, 0),
(15, '9782507934', '234575', 1),
(16, '9782507934', '234575', 1),
(17, '9661442323', '768836', 1),
(18, '9661442323', '768836', 1),
(19, '9661442323', '768836', 1),
(20, '9661442323', '768836', 1);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `q_id` int NOT NULL,
  `q_subject` varchar(100) NOT NULL,
  `q_message` text NOT NULL,
  `q_by_type` varchar(30) NOT NULL,
  `q_mobile_no` varchar(25) NOT NULL,
  `q_date` varchar(30) DEFAULT NULL,
  `q_time` varchar(30) DEFAULT NULL,
  `q_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`q_id`, `q_subject`, `q_message`, `q_by_type`, `q_mobile_no`, `q_date`, `q_time`, `q_status`) VALUES
(1, 'Crop Minimum Expected Price Update Problem', 'I am having a problem updating the Minimum Expected Price of my crop. Please help me!!', 'Farmer', '9672836724', '2021-05-11', '11:46 AM', '1'),
(2, 'Payment Problem', 'Please help me understand the payment process. How should I complete the payment with Farmer & Driver?', 'Customer', '9113671387', '2021-05-11', '12:08 PM', '1'),
(3, 'Location Update Problem', 'I am facing issues in updating my current location. Kindly help me.', 'Driver', '7042757709', '2021-05-11', '12:10 PM', '0');

-- --------------------------------------------------------

--
-- Table structure for table `transportbid`
--

CREATE TABLE `transportbid` (
  `tb_id` int NOT NULL,
  `tb_d_mobile` varchar(200) NOT NULL,
  `tb_cb_id` int NOT NULL,
  `tb_bid` varchar(100) NOT NULL,
  `tb_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transportself`
--

CREATE TABLE `transportself` (
  `ts_id` int NOT NULL,
  `ts_cb_id` varchar(100) NOT NULL,
  `ts_name` varchar(100) NOT NULL,
  `ts_mobile` varchar(100) NOT NULL,
  `ts_vehiclenumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `id` (`u_id`);

--
-- Indexes for table `cropbid`
--
ALTER TABLE `cropbid`
  ADD PRIMARY KEY (`cb_id`),
  ADD KEY `fkcb_cb_cr_id` (`cb_cr_id`),
  ADD KEY `fk_cb_f_mobile` (`cb_f_mobile`),
  ADD KEY `fk_cb_c_mobile` (`cb_c_mobile`);

--
-- Indexes for table `cropdetails`
--
ALTER TABLE `cropdetails`
  ADD PRIMARY KEY (`cro_id`);

--
-- Indexes for table `cropsale`
--
ALTER TABLE `cropsale`
  ADD PRIMARY KEY (`cr_id`),
  ADD KEY `fkcr_cr_cro_id` (`cr_cro_id`) USING BTREE,
  ADD KEY `fk_cr_f_mobile` (`cr_f_mobile`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_mobile` (`c_mobile`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `d_mobile` (`d_mobile`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`f_id`),
  ADD UNIQUE KEY `f_mobile` (`f_mobile`);

--
-- Indexes for table `kiosk`
--
ALTER TABLE `kiosk`
  ADD PRIMARY KEY (`k_id`),
  ADD UNIQUE KEY `k_unique` (`k_pincode`),
  ADD UNIQUE KEY `k_mobile` (`k_mobile`);

--
-- Indexes for table `mepdetails`
--
ALTER TABLE `mepdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cro_id` (`cro_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`q_id`) USING BTREE,
  ADD UNIQUE KEY `id` (`q_id`);

--
-- Indexes for table `transportbid`
--
ALTER TABLE `transportbid`
  ADD PRIMARY KEY (`tb_id`),
  ADD KEY `fk_tb_cb_id` (`tb_cb_id`),
  ADD KEY `fk_tb_d_mobile` (`tb_d_mobile`);

--
-- Indexes for table `transportself`
--
ALTER TABLE `transportself`
  ADD PRIMARY KEY (`ts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `u_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cropbid`
--
ALTER TABLE `cropbid`
  MODIFY `cb_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cropdetails`
--
ALTER TABLE `cropdetails`
  MODIFY `cro_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cropsale`
--
ALTER TABLE `cropsale`
  MODIFY `cr_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `d_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `f_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kiosk`
--
ALTER TABLE `kiosk`
  MODIFY `k_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mepdetails`
--
ALTER TABLE `mepdetails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `q_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transportbid`
--
ALTER TABLE `transportbid`
  MODIFY `tb_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transportself`
--
ALTER TABLE `transportself`
  MODIFY `ts_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cropbid`
--
ALTER TABLE `cropbid`
  ADD CONSTRAINT `fk_cb_c_mobile` FOREIGN KEY (`cb_c_mobile`) REFERENCES `customer` (`c_mobile`),
  ADD CONSTRAINT `fk_cb_f_mobile` FOREIGN KEY (`cb_f_mobile`) REFERENCES `farmer` (`f_mobile`),
  ADD CONSTRAINT `fkcb_cb_cr_id` FOREIGN KEY (`cb_cr_id`) REFERENCES `cropsale` (`cr_id`);

--
-- Constraints for table `cropsale`
--
ALTER TABLE `cropsale`
  ADD CONSTRAINT `fk_cr_cro_id` FOREIGN KEY (`cr_cro_id`) REFERENCES `cropdetails` (`cro_id`),
  ADD CONSTRAINT `fk_cr_f_mobile` FOREIGN KEY (`cr_f_mobile`) REFERENCES `farmer` (`f_mobile`);

--
-- Constraints for table `mepdetails`
--
ALTER TABLE `mepdetails`
  ADD CONSTRAINT `fk_cro_id` FOREIGN KEY (`cro_id`) REFERENCES `cropdetails` (`cro_id`);

--
-- Constraints for table `transportbid`
--
ALTER TABLE `transportbid`
  ADD CONSTRAINT `fk_tb_cb_id` FOREIGN KEY (`tb_cb_id`) REFERENCES `cropbid` (`cb_id`),
  ADD CONSTRAINT `fk_tb_d_mobile` FOREIGN KEY (`tb_d_mobile`) REFERENCES `driver` (`d_mobile`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
