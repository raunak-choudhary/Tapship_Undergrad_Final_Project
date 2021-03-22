-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 04:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
-- Table structure for table `cropbid`
--

CREATE TABLE `cropbid` (
  `cb_bid` int(11) NOT NULL,
  `cb_c_id` int(11) NOT NULL,
  `cb_f_id` int(11) NOT NULL,
  `cb_cr_id` int(11) NOT NULL,
  `cb_status` int(11) NOT NULL,
  `cb_transport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cropdetails`
--

CREATE TABLE `cropdetails` (
  `cro_id` int(11) NOT NULL,
  `cro_name` varchar(50) NOT NULL,
  `cro_type` varchar(25) NOT NULL,
  `cro_msp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cropdetails`
--

INSERT INTO `cropdetails` (`cro_id`, `cro_name`, `cro_type`, `cro_msp`) VALUES
(1, 'Mango', 'Fruits', 30),
(2, 'Tomato', 'Vegitables', 25);

-- --------------------------------------------------------

--
-- Table structure for table `cropsale`
--

CREATE TABLE `cropsale` (
  `cr_id` int(11) NOT NULL,
  `cr_f_mobile` varchar(10) NOT NULL,
  `cr_cro_id` int(11) NOT NULL,
  `cr_quantity` varchar(10) NOT NULL,
  `cr_img1` varchar(50) NOT NULL,
  `cr_img2` varchar(50) NOT NULL,
  `cr_img3` varchar(50) NOT NULL,
  `cr_mep` varchar(10) NOT NULL,
  `cr_date` date NOT NULL,
  `cr_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cropsale`
--

INSERT INTO `cropsale` (`cr_id`, `cr_f_mobile`, `cr_cro_id`, `cr_quantity`, `cr_img1`, `cr_img2`, `cr_img3`, `cr_mep`, `cr_date`, `cr_status`) VALUES
(35, '8745123411', 1, '10', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', '30', '2021-03-22', '1'),
(36, '8745123411', 2, '40', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', '20', '2021-03-22', '0');

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
(1, 'Ganpat Patel', '9672836724', '', 'Male', '21', '202, Laxmi Plaza, Brahmavara', 'Udupi', 'Karnataka', '576213', 'wholesaler', '', '799721133696', 'assets/documents/aadhar/aadhar.pdf', 'EYCPP1502E', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo1.png', '12345', '1'),
(2, 'Ram Pvt. LTD.', '9672836728', 'Ram Patel', 'Male', '56', 'Old Fish Market Road, Brahmavara', 'Kundapura', 'karnataka', '576217', 'organization', 'assets/documents/aadhar/aadhar.pdf', '', '', 'RTYTY6756G', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'Gapu@8540', '1'),
(3, 'Ashwin Prabhakar', '9672836730', '', 'Male', '54', '234, Subhas Road', 'Mumbai', 'Maharashtra', '453423', 'wholesaler', '', '784567327436', 'assets/documents/aadhar/aadhar.pdf', 'RTYTY6756G', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'Gapu@8540', '4');

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
  `d_password` varchar(25) NOT NULL,
  `d_approve` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`d_id`, `d_name`, `d_mobile`, `d_gender`, `d_age`, `d_street`, `d_city`, `d_state`, `d_pincode`, `d_aadhar`, `d_aadharpdf`, `d_pan`, `d_panpdf`, `d_photo`, `d_dlnumber`, `d_dlpdf`, `d_vehiclenumber`, `d_vehiclercpdf`, `d_lat`, `d_long`, `d_password`, `d_approve`) VALUES
(1, 'Faheem Ahmad', '9672836725', 'Male', '22', '302, Main Street', 'Patna', 'Bihar', '800001', '675324567892', 'assets/documents/aadhar/aadhar.pdf', 'GYTHI8643T', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo1.jfif', 'BH6754356789076', 'assets/documents/dlpdf/dlpdf.pdf', 'BH14RT7634', 'assets/documents/rcpdf/rcpdf.pdf', '13.3343382', '74.7169643', '12345', '1'),
(2, 'Yash Nayak', '7070414133', 'Male', '24', '4AB, Sardar Vallabhai Patel Road', 'Ahmedabad', 'Gujarat', '320008', '821367489408', 'assets/documents/aadhar/aadhar.pdf', 'SBVXE6360B', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'DL5857254678123', 'assets/documents/dlpdf/dlpdf.pdf', 'DL42RM4763', 'assets/documents/rcpdf/rcpdf.pdf', '13.3343382', '74.7169643', 'Yn123456', '3'),
(3, 'Arjun Pathak', '8228229090', 'Male', '30', '866C, Rajiv Gandhi Road', 'Hyderabad', 'Telangana', '500001', '735194058610', 'assets/documents/aadhar/aadhar.pdf', 'ABQWD4562R', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'TS4562538457562', 'assets/documents/dlpdf/dlpdf.pdf', 'TS02AB0007', 'assets/documents/rcpdf/rcpdf.pdf', '13.3343382', '74.7169643', 'Ap123456', '4');

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
  `f_aadharpdf` varchar(100) NOT NULL,
  `f_pan` varchar(25) NOT NULL,
  `f_panpdf` varchar(100) NOT NULL,
  `f_photo` varchar(100) NOT NULL,
  `f_password` varchar(25) NOT NULL,
  `f_approve` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`f_id`, `f_name`, `f_mobile`, `f_gender`, `f_age`, `f_street`, `f_city`, `f_state`, `f_pincode`, `f_aadhar`, `f_aadharpdf`, `f_pan`, `f_panpdf`, `f_photo`, `f_password`, `f_approve`) VALUES
(1, 'Raunak Chaudhary', '9672836726', 'Male', '21', '405, Gandhi Marg', 'Barmer', 'Rajasthan', '345674', '867345678323', 'assets/documents/aadhar/aadhar.pdf', 'HGYTR7325I', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo1.jfif', '12345', '1'),
(20, 'Ajay Kumar', '8745123411', 'Male', '28', 'C11, RajMarg', 'Jaipur', 'Rajasthan', '302001', '345574855225', 'assets/documents/aadhar/aadhar.pdf', 'AMQVS4065P', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'Ak123456', '1'),
(21, 'Karthik Gupta', '9446552020', 'Male', '40', 'A2145, New Temple Road', 'Ayodhya', 'Uttar Pradesh', '224123', '789025849516', 'assets/documents/aadhar/aadhar.pdf', 'LDKYB6703T', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'Kg123456', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kiosk`
--

CREATE TABLE `kiosk` (
  `k_id` int(11) NOT NULL,
  `k_name` varchar(50) NOT NULL,
  `k_mobile` varchar(25) NOT NULL,
  `k_gender` varchar(25) NOT NULL,
  `k_age` int(11) NOT NULL,
  `k_location` varchar(50) NOT NULL,
  `k_aadhar` varchar(25) NOT NULL,
  `k_aadharpdf` blob NOT NULL,
  `k_photo` blob NOT NULL,
  `k_password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quries`
--

CREATE TABLE `quries` (
  `q_id` int(11) NOT NULL,
  `q_title` varchar(100) NOT NULL,
  `q_des` text NOT NULL,
  `q_by_name` int(11) NOT NULL,
  `q_by_type` varchar(25) NOT NULL,
  `q_by_mobile` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transportbid`
--

CREATE TABLE `transportbid` (
  `tb_id` int(11) NOT NULL,
  `tb_d_id` int(11) NOT NULL,
  `tb_cb_id` int(11) NOT NULL,
  `tb_bid` float NOT NULL,
  `tb_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cropbid`
--
ALTER TABLE `cropbid`
  ADD PRIMARY KEY (`cb_bid`),
  ADD KEY `fkcb_cb_c_id` (`cb_c_id`),
  ADD KEY `fkcb_cb_cr_id` (`cb_cr_id`),
  ADD KEY `fkcb_cb_f_id` (`cb_f_id`);

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
  ADD KEY `fkcr_cr_cro_id` (`cr_cro_id`) USING BTREE;

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
  ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `quries`
--
ALTER TABLE `quries`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `transportbid`
--
ALTER TABLE `transportbid`
  ADD PRIMARY KEY (`tb_id`),
  ADD KEY `fktb_tb_cb_id` (`tb_cb_id`),
  ADD KEY `fktb_tb_d_id` (`tb_d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cropbid`
--
ALTER TABLE `cropbid`
  MODIFY `cb_bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cropdetails`
--
ALTER TABLE `cropdetails`
  MODIFY `cro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cropsale`
--
ALTER TABLE `cropsale`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kiosk`
--
ALTER TABLE `kiosk`
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quries`
--
ALTER TABLE `quries`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transportbid`
--
ALTER TABLE `transportbid`
  MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cropbid`
--
ALTER TABLE `cropbid`
  ADD CONSTRAINT `fkcb_cb_c_id` FOREIGN KEY (`cb_c_id`) REFERENCES `customer` (`c_id`),
  ADD CONSTRAINT `fkcb_cb_cr_id` FOREIGN KEY (`cb_cr_id`) REFERENCES `cropsale` (`cr_id`),
  ADD CONSTRAINT `fkcb_cb_f_id` FOREIGN KEY (`cb_f_id`) REFERENCES `farmer` (`f_id`);

--
-- Constraints for table `cropsale`
--
ALTER TABLE `cropsale`
  ADD CONSTRAINT `fk_cr_cro_id` FOREIGN KEY (`cr_cro_id`) REFERENCES `cropdetails` (`cro_id`);

--
-- Constraints for table `transportbid`
--
ALTER TABLE `transportbid`
  ADD CONSTRAINT `fktb_tb_cb_id` FOREIGN KEY (`tb_cb_id`) REFERENCES `cropbid` (`cb_bid`),
  ADD CONSTRAINT `fktb_tb_d_id` FOREIGN KEY (`tb_d_id`) REFERENCES `driver` (`d_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
