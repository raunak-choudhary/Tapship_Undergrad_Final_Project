-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 04:58 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tapship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(25) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_mobile` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_address` varchar(500) NOT NULL,
  `u_subject` varchar(500) NOT NULL,
  `u_message` text NOT NULL,
  `u_date` varchar(50) NOT NULL,
  `u_time` varchar(30) DEFAULT NULL,
  `u_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`u_id`, `u_name`, `u_mobile`, `u_email`, `u_address`, `u_subject`, `u_message`, `u_date`, `u_time`, `u_status`) VALUES
(1, 'Raunak Choudhary', '9782507934', 'raunakc77@gmail.com', '67, Arbindo Marg, Kalyanpur, Barmer (Rajasthan)', 'Please Help Me. ', 'I am a new user. Help me in making an account.', '2021-04-22', '01:07 AM', '1'),
(2, 'Ganpat Patel', '9672836724', 'gapu.012@gmail.com', '569, Rajiv Nagar, Kundapura, Udupi (Karnataka)', 'Lockdown Problem', 'Help Out, due to lockdown I have doubt whether your platform can still help me to get transport deals. I want to hear from you whether your platform will be active during lockdown state also? ', '2021-04-23 ', '02:00 PM', '1'),
(3, 'Avinash', '9638527410', 'avinash16@gmail.com', '45, 47th Cross, Chickpet, Banglore Urban (Karnataka)', 'Brief me about your platform', 'Hey! I am a new user and I want to use your platform as a customer. So please brief me about process of buying as a customer through your platform.', '2021-04-23', '09:36 PM', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cropbid`
--

CREATE TABLE `cropbid` (
  `cb_id` int(11) NOT NULL,
  `cb_c_mobile` varchar(50) NOT NULL,
  `cb_f_mobile` varchar(50) NOT NULL,
  `cb_cr_id` int(11) NOT NULL,
  `cb_bidprice` int(11) NOT NULL,
  `cb_status` varchar(10) NOT NULL,
  `cb_paytype` varchar(100) NOT NULL,
  `cb_tid` varchar(100) NOT NULL,
  `cb_tproof` varchar(500) NOT NULL,
  `cb_transporttype` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cropbid`
--

INSERT INTO `cropbid` (`cb_id`, `cb_c_mobile`, `cb_f_mobile`, `cb_cr_id`, `cb_bidprice`, `cb_status`, `cb_paytype`, `cb_tid`, `cb_tproof`, `cb_transporttype`) VALUES
(1, '9113671387', '9672836724', 1, 65, '12', 'IMPS', 'IMPS-45368293739504', 'assets/documents/payment/IMPS-45368293739504-TRANSPROOF.pdf', '2'),
(2, '9113671388', '9672836724', 1, 64, '2', '0', '0', '0', '0'),
(3, '9113671387', '9672836724', 3, 26, '12', 'IMPS', 'IMPS-78645637892', 'assets/documents/payment/IMPS-78645637892-TRANSPROOF.pdf', '2'),
(4, '9113671387', '9672836724', 2, 19, '12', 'IMPS', 'IMPS-676784247487484', 'assets/documents/payment/IMPS-676784247487484-TRANSPROOF.pdf', '1'),
(5, '9113671387', '9672836725', 5, 20, '8', 'IMPS', 'IMPS-8978798739393', 'assets/documents/payment/IMPS-8978798739393-TRANSPROOF.pdf', '2'),
(6, '9113671388', '9672836724', 3, 27, '2', '0', '0', '0', '0'),
(7, '9113671388', '9672836725', 4, 19, '7', 'IMPS', 'IMPS-24564794444', 'assets/documents/payment/IMPS-24564794444-TRANSPROOF.pdf', '2'),
(8, '9113671388', '9672836725', 5, 21, '2', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cropdetails`
--

CREATE TABLE `cropdetails` (
  `cro_id` int(11) NOT NULL,
  `cro_name` varchar(50) NOT NULL,
  `cro_type` varchar(25) NOT NULL,
  `cro_costperkg` varchar(25) DEFAULT NULL,
  `cro_msp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(11, 'Corn', 'Feed Crops', '14', 21);

-- --------------------------------------------------------

--
-- Table structure for table `cropsale`
--

CREATE TABLE `cropsale` (
  `cr_id` int(11) NOT NULL,
  `cr_f_mobile` varchar(10) NOT NULL,
  `cr_cro_id` int(11) NOT NULL,
  `cr_quantity` varchar(10) NOT NULL,
  `cr_img1` varchar(500) NOT NULL,
  `cr_img2` varchar(500) NOT NULL,
  `cr_img3` varchar(500) NOT NULL,
  `cr_mep` varchar(10) NOT NULL,
  `cr_date` date NOT NULL,
  `cr_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cropsale`
--

INSERT INTO `cropsale` (`cr_id`, `cr_f_mobile`, `cr_cro_id`, `cr_quantity`, `cr_img1`, `cr_img2`, `cr_img3`, `cr_mep`, `cr_date`, `cr_status`) VALUES
(1, '9672836724', 1, '240', 'assets/documents/crop/16104-5383-2609-9672836724.png', 'assets/documents/crop/11914-7901-375-9672836724.png', 'assets/documents/crop/18449-4664-8434-9672836724.png', '64', '2021-05-10', '12'),
(2, '9672836724', 4, '120', 'assets/documents/crop/1692-2628-2834-9672836724.png', 'assets/documents/crop/17398-6373-1564-9672836724.png', 'assets/documents/crop/11241-4982-8629-9672836724.png', '16', '2021-05-10', '12'),
(3, '9672836724', 3, '80', 'assets/documents/crop/12582-4207-5021-9672836724.png', 'assets/documents/crop/17426-3728-9805-9672836724.png', 'assets/documents/crop/19568-6804-5044-9672836724.png', '25', '2021-05-10', '12'),
(4, '9672836725', 2, '145', 'assets/documents/crop/14602-5116-7819-9672836725.png', 'assets/documents/crop/18078-3139-3176-9672836725.png', 'assets/documents/crop/16859-4073-1353-9672836725.png', '18', '2021-05-10', '7'),
(5, '9672836725', 6, '350', 'assets/documents/crop/18651-2615-2792-9672836725.png', 'assets/documents/crop/18254-5771-4106-9672836725.png', 'assets/documents/crop/17982-5794-8537-9672836725.png', '19', '2021-05-10', '8');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_mobile` varchar(25) NOT NULL,
  `c_contactname` varchar(50) NOT NULL,
  `c_gender` varchar(25) NOT NULL,
  `c_age` varchar(10) NOT NULL,
  `c_street` varchar(50) NOT NULL,
  `c_city` varchar(25) NOT NULL,
  `c_state` varchar(25) NOT NULL,
  `c_pincode` varchar(10) NOT NULL,
  `c_type` varchar(25) NOT NULL,
  `c_registration` varchar(100) NOT NULL,
  `c_aadhar` varchar(25) NOT NULL,
  `c_aadharpdf` varchar(100) NOT NULL,
  `c_pan` varchar(25) NOT NULL,
  `c_panpdf` varchar(100) NOT NULL,
  `c_photo` varchar(100) NOT NULL,
  `c_password` varchar(25) NOT NULL,
  `c_approve` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_mobile`, `c_contactname`, `c_gender`, `c_age`, `c_street`, `c_city`, `c_state`, `c_pincode`, `c_type`, `c_registration`, `c_aadhar`, `c_aadharpdf`, `c_pan`, `c_panpdf`, `c_photo`, `c_password`, `c_approve`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 'Raunak Chaudhary', '9113671387', '', 'Male', '22', 'Royal Paradise, Udupi', 'Udupi', 'Karnataka', '576102', 'Wholesaler', '', '689020429366', 'assets/documents/aadhar/9113671387-Raunak Chaudhary-AADHAR.pdf', 'BOMPC6839Q', 'assets/documents/pan/9113671387-Raunak Chaudhary-PAN.pdf', 'assets/documents/photo/9113671387-Raunak Chaudhary-RC.jpg', 'Gapu@8540', '2'),
(2, 'Aarav Jindal', '9113671388', '', 'Male', '27', 'Prahlad Appartment, Udupi', 'Udupi', 'Karnataka', '576101', 'Wholesaler', '', '8760204293998', 'assets/documents/aadhar/9113671388-Aarav Jindal-AADHAR.pdf', 'ACTPC5645I', 'assets/documents/pan/9113671388-Aarav Jindal-PAN.pdf', 'assets/documents/photo/9113671388-Aarav Jindal-AJ.jpg', 'Gapu@8540', '2');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `d_id` int(11) NOT NULL,
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
  `d_approve` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`d_id`, `d_name`, `d_mobile`, `d_gender`, `d_age`, `d_street`, `d_city`, `d_state`, `d_pincode`, `d_aadhar`, `d_aadharpdf`, `d_pan`, `d_panpdf`, `d_photo`, `d_dlnumber`, `d_dlpdf`, `d_vehiclenumber`, `d_vehiclercpdf`, `d_lat`, `d_long`, `d_date`, `d_time`, `d_password`, `d_approve`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', ''),
(1, 'Faheem Ahmad', '7042757709', 'Male', '22', 'Pink House, Near Baroda Bank, Shankarpura', 'Udupi', 'Karnataka', '574115', '506231410194', 'assets/documents/aadhar/7042757709-Faheem Ahmad-AADHAR.pdf', 'BPDPA9672E', 'assets/documents/pan/7042757709-Faheem Ahmad-PAN.pdf', 'assets/documents/photo/7042757709-Faheem Ahmad-faheem.jpeg', 'BR0120170448831', 'assets/documents/dlpdf/7042757709-Faheem Ahmad-DL.pdf', 'KA20CS1267', 'assets/documents/rcpdf/7042757709-Faheem Ahmad-RC.pdf', '13.43488', '74.7470848', '2021-05-10', '08:21 PM', 'Gapu@8540', '2'),
(2, 'Suresh Singh', '7042757710', 'Male', '29', '34, Hemant nagar, Luni', 'Jodhpur', 'Rajasthan', '342802', '873456789256', 'assets/documents/aadhar/7042757710-Suresh Singh-AADHAR.pdf', 'TBFRT6754M', 'assets/documents/pan/7042757710-Suresh Singh-PAN.pdf', 'assets/documents/photo/7042757710-Suresh Singh-suresh.jpg', 'RJ8735672907512', 'assets/documents/dlpdf/7042757710-Suresh Singh-DL.pdf', 'RJ19TR7656', 'assets/documents/rcpdf/7042757710-Suresh Singh-RC.pdf', '13.43488', '74.7470848', '2021-05-10', '08:11 PM', 'Gapu@8540', '2');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_mobile` varchar(25) NOT NULL,
  `f_gender` varchar(25) NOT NULL,
  `f_age` varchar(10) NOT NULL,
  `f_street` varchar(50) NOT NULL,
  `f_city` varchar(25) NOT NULL,
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
  `f_bankpassbook` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`f_id`, `f_name`, `f_mobile`, `f_gender`, `f_age`, `f_street`, `f_city`, `f_state`, `f_pincode`, `f_aadhar`, `f_aadharpdf`, `f_pan`, `f_panpdf`, `f_photo`, `f_password`, `f_approve`, `f_bankholder`, `f_bankaccount`, `f_bankifsc`, `f_bankname`, `f_bankbranch`, `f_bankpassbook`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 'Ganpat Patel', '9672836724', 'Male', '21', '202, Laxmi Plaza, Brahmavara', 'Udupi', 'Karnataka', '576213', '799721133696', 'assets/documents/aadhar/9672836724-Ganpat Patel-AADHAR.pdf', 'EYCPP1502E', 'assets/documents/pan/9672836724-Ganpat Patel-PAN.pdf', 'assets/documents/photo/9672836724-Ganpat Patel-2018_1.jpg', 'Gapu@8540', '2', 'Ganpat Patel', '2342567893456', 'CNRB0000466', 'Canara Bank', 'BVR', 'assets/documents/passbook/9672836724-Ganpat Patel-PASSBOOK.pdf'),
(2, 'Rakesh Sharma', '9672836725', 'Male', '28', '67, Epic Road, Bommanahalli', 'Banglore', 'Karnataka', '560068', '799721133696', 'assets/documents/aadhar/9672836725-Rakesh Sharma-AADHAR.pdf', 'UIBNO1902F', 'assets/documents/pan/9672836725-Rakesh Sharma-PAN.pdf', 'assets/documents/photo/9672836725-Rakesh Sharma-2018_1.jpg', 'Gapu@8540', '2', 'Rakesh Sharma', '7344581863456', 'CNRB0003047', 'Canara Bank', 'Bommanahalli', 'assets/documents/passbook/9672836725-Rakesh Sharma-PASSBOOK.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `kiosk`
--

CREATE TABLE `kiosk` (
  `k_id` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `q_id` int(11) NOT NULL,
  `q_subject` varchar(100) NOT NULL,
  `q_message` text NOT NULL,
  `q_by_type` varchar(30) NOT NULL,
  `q_mobile_no` varchar(25) NOT NULL,
  `q_date` varchar(30) DEFAULT NULL,
  `q_time` varchar(30) DEFAULT NULL,
  `q_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transportbid`
--

CREATE TABLE `transportbid` (
  `tb_id` int(11) NOT NULL,
  `tb_d_mobile` varchar(200) NOT NULL,
  `tb_cb_id` int(11) NOT NULL,
  `tb_bid` varchar(100) NOT NULL,
  `tb_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transportbid`
--

INSERT INTO `transportbid` (`tb_id`, `tb_d_mobile`, `tb_cb_id`, `tb_bid`, `tb_status`) VALUES
(1, '7042757709', 1, '6000', '1'),
(2, '7042757710', 1, '6500', '2'),
(3, '7042757709', 3, '500', '1'),
(4, '7042757709', 5, '4500', '1'),
(5, '7042757710', 7, '20000', '0'),
(6, '7042757710', 3, '17000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `transportself`
--

CREATE TABLE `transportself` (
  `ts_id` int(11) NOT NULL,
  `ts_cb_id` varchar(100) NOT NULL,
  `ts_name` varchar(100) NOT NULL,
  `ts_mobile` varchar(100) NOT NULL,
  `ts_vehiclenumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transportself`
--

INSERT INTO `transportself` (`ts_id`, `ts_cb_id`, `ts_name`, `ts_mobile`, `ts_vehiclenumber`) VALUES
(6, '69', 'Aadesh Pahalwan', '7845327865', 'KA20TR6547'),
(7, '70', 'Ashok Kumar', '8945673456', 'KA20UH3482'),
(9, '74', 'Ashutosh Kumar', '9782507934', 'KA20RT1068'),
(10, '4', 'Aadesh Pahalwan', '7845327865', 'KA20TR6547');

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
  MODIFY `a_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cropbid`
--
ALTER TABLE `cropbid`
  MODIFY `cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cropdetails`
--
ALTER TABLE `cropdetails`
  MODIFY `cro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cropsale`
--
ALTER TABLE `cropsale`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kiosk`
--
ALTER TABLE `kiosk`
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transportbid`
--
ALTER TABLE `transportbid`
  MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transportself`
--
ALTER TABLE `transportself`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `transportbid`
--
ALTER TABLE `transportbid`
  ADD CONSTRAINT `fk_tb_cb_id` FOREIGN KEY (`tb_cb_id`) REFERENCES `cropbid` (`cb_id`),
  ADD CONSTRAINT `fk_tb_d_mobile` FOREIGN KEY (`tb_d_mobile`) REFERENCES `driver` (`d_mobile`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
