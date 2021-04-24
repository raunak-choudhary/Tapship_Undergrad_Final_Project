-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 06:08 PM
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
  `u_address` varchar(50) NOT NULL,
  `u_subject` varchar(50) NOT NULL,
  `u_message` text NOT NULL,
  `u_date` varchar(50) NOT NULL,
  `u_time` varchar(30) DEFAULT NULL,
  `u_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`u_id`, `u_name`, `u_mobile`, `u_email`, `u_address`, `u_subject`, `u_message`, `u_date`, `u_time`, `u_status`) VALUES
(1, 'Raunak Choudhary', '9782507934', 'raunakc77@gmail.com', '344001', 'Please Help Me. ', 'I am a new user. Help me in making an account.', '2021-04-22', '01:07 AM', '1'),
(5, 'Ganpat Patel', '9672836724', 'gapu.patel.012@gmail.com', '576213', 'Lockdown Problem', 'Help Out!!', '2021-04-23 ', '02:00 PM', '0'),
(6, 'rc', '9638527410', 'rc@xyz.com', '344125', 'hii', 'hiii', '2021-04-23', '09:36 PM', '0');

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
  `cb_transporttype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cropbid`
--

INSERT INTO `cropbid` (`cb_id`, `cb_c_mobile`, `cb_f_mobile`, `cb_cr_id`, `cb_bidprice`, `cb_status`, `cb_paytype`, `cb_tid`, `cb_tproof`, `cb_transporttype`) VALUES
(11, '9672836728', '8745123411', 35, 100, '6', '0', '0', '0', '0'),
(12, '9672836728', '8745123411', 46, 300, '2', '0', '0', '0', '0'),
(13, '9672836728', '8745123411', 42, 500, '7', 'NEFT', 'HJGJKI7385954034HGHJH', 'assets/documents/payment/payment.pdf', '1'),
(14, '9672836730', '8745123411', 36, 600, '6', '0', '0', '0', '0'),
(15, '9672836730', '9672836722', 47, 25, '6', '0', '0', '0', '0'),
(24, '9672836728', '9446552020', 44, 44, '6', '0', '0', '0', '0'),
(25, '9672836728', '9672836726', 46, 30, '6', '0', '0', '0', '0');

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
(2, 'Tomato', 'Vegitables', 25),
(3, 'Banana', 'Fruits', 20),
(4, 'Carrot', 'Vegitables', 20),
(5, 'Rice', 'Feed Crops', 15);

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
(35, '9446552020', 4, '10', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', '30', '2021-03-22', '0'),
(36, '9672836722', 2, '40', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', '20', '2021-03-22', '0'),
(42, '8745123411', 1, '100', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', '20', '2021-03-22', '0'),
(44, '9446552020', 4, '500', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', '42', '2021-03-25', '6'),
(46, '9672836726', 3, '50', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', '25', '2021-03-25', '0'),
(47, '9672836722', 4, '30', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', 'assets/documents/crop/demo.png', '28', '2021-03-25', '6');

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
(1, 'Ganpat Patel', '9672836724', '', 'Male', '21', '202, Laxmi Plaza, Brahmavara', 'Udupi', 'Karnataka', '576213', 'Wholesaler', '', '799721133696', 'assets/documents/aadhar/aadhar.pdf', 'EYCPP1502E', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo1.png', 'Gapu@8540', '2'),
(2, 'Ram Pvt. LTD.', '9672836728', 'Ram Patel', 'Male', '56', 'Old Fish Market Road, Brahmavara', 'Kundapura', 'karnataka', '576217', 'Organization', 'assets/documents/aadhar/aadhar.pdf', '', '', 'RTYTY6756G', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'Gapu@8540', '2'),
(3, 'Ashwin Prabhakar', '9672836730', '', 'Male', '54', '234, Subhas Road', 'Mumbai', 'Maharashtra', '453423', 'Wholesaler', '', '784567327436', 'assets/documents/aadhar/aadhar.pdf', 'RTYTY6756G', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'Gapu@8540', '2');

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
(1, 'Faheem Ahmad', '9672836725', 'Male', '22', '302, Main Street', 'Patna', 'Bihar', '800001', '675324567892', 'assets/documents/aadhar/aadhar.pdf', 'GYTHI8643T', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo1.jfif', 'BH6754356789076', 'assets/documents/dlpdf/dlpdf.pdf', 'BH14RT7634', 'assets/documents/rcpdf/rcpdf.pdf', '28.6327', '77.2196', 'Gapu@8540', '2'),
(2, 'Yash Nayak', '7070414133', 'Male', '24', '4AB, Sardar Vallabhai Patel Road', 'Ahmedabad', 'Gujarat', '320008', '821367489408', 'assets/documents/aadhar/aadhar.pdf', 'SBVXE6360B', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'DL5857254678123', 'assets/documents/dlpdf/dlpdf.pdf', 'DL42RM4763', 'assets/documents/rcpdf/rcpdf.pdf', '13.3343382', '74.7169643', 'Yn123456', '2'),
(3, 'Arjun Pathak', '8228229090', 'Male', '30', '866C, Rajiv Gandhi Road', 'Hyderabad', 'Telangana', '500001', '735194058610', 'assets/documents/aadhar/aadhar.pdf', 'ABQWD4562R', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'TS4562538457562', 'assets/documents/dlpdf/dlpdf.pdf', 'TS02AB0007', 'assets/documents/rcpdf/rcpdf.pdf', '13.3343382', '74.7169643', 'Ap123456', '2');

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
(1, 'Raunak Chaudhary', '9672836726', 'Male', '21', '405, Gandhi Marg', 'Barmer', 'Rajasthan', '344001', '867345678323', 'assets/documents/aadhar/aadhar.pdf', 'HGYTR7325I', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo1.jfif', 'Gapu@8540', '2', 'Raunak Choudhary', '8823456782345', 'CNRB0000466', 'Canera Bank', 'BVR', 'assets/documents/passbook/passbook.pdf'),
(20, 'Ajay Kumar', '8745123411', 'Male', '30', 'C11, RajMarg', 'Jaipur', 'Rajasthan', '302001', '345574855267', 'assets/documents/aadhar/8745123411-Ajay Kumar-aadhar.pdf', 'AMQVS4065P', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'Gapu@8540', '2', 'Ajay Kumar', '9823456782345', 'CNRB0000468', 'Canera Bank', 'BVR', 'assets/documents/passbook/8745123411-Ajay Kumar-passbook.pdf'),
(21, 'Karthik Gupta', '9446552020', 'Male', '40', 'A2145, New Temple Road', 'Ayodhya', 'Uttar Pradesh', '224123', '789025849516', 'assets/documents/aadhar/aadhar.pdf', 'LDKYB6703T', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'Gapu@8540', '2', 'Karthik Gupta', '47823456782345', 'CNRB0000466', 'Canera Bank', 'BVR', 'assets/documents/passbook/passbook.pdf'),
(61, 'Anish Sharma', '9672836722', 'Male', '78', '202, Laxmi Plaza, Old Fish Market Road, Brahmavara', 'Udupi', 'Karnataka', '576213', '643436728767', 'assets/documents/aadhar/aadhar.pdf', 'TTHUO8765U', 'assets/documents/pan/pan.pdf', 'assets/documents/photo/photo2.png', 'Gapu@8654', '2', 'Anish Sharma', '7823456782345', 'CNRB0000466', 'Canera Bank', 'BVR', 'assets/documents/passbook/passbook.pdf');

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

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`q_id`, `q_subject`, `q_message`, `q_by_type`, `q_mobile_no`, `q_date`, `q_time`, `q_status`) VALUES
(4, 'Hel', 'Hel', 'Farmer', '9672836726', '2021-04-24', '12:44 AM', '0'),
(5, 'cust', 'cust', 'Customer', '9672836724', '2021-04-24', '01:05 AM', '0'),
(6, 'cust1', 'cust1', 'Customer', '9672836728', '2021-04-24', '01:06 AM', '1'),
(7, 'driver', 'driver', 'Driver', '9672836725', '2021-04-24', '01:07 AM', '1');

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
(1, '9672836725', 13, '2000', '1'),
(3, '9672836725', 13, '3000', '0'),
(4, '9672836725', 13, '3000', '0');

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
(4, '13', 'Arvind', '9672836778', 'KA45TR6820');

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
  ADD KEY `fk_tb_cb_id` (`tb_cb_id`);

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
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cropbid`
--
ALTER TABLE `cropbid`
  MODIFY `cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `cropdetails`
--
ALTER TABLE `cropdetails`
  MODIFY `cro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cropsale`
--
ALTER TABLE `cropsale`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transportbid`
--
ALTER TABLE `transportbid`
  MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transportself`
--
ALTER TABLE `transportself`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `fk_tb_cb_id` FOREIGN KEY (`tb_cb_id`) REFERENCES `cropbid` (`cb_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
