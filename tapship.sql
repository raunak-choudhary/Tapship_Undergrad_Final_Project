-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 09:31 PM
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
  `a_id` int(11) NOT NULL,
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
(1, 'Raunak Choudhary', '9782507934', 'raunakc77@gmail.com', '67, Arbindo Marg, Kalyanpur, Barmer (Rajasthan)', 'Please Help Me. ', 'I am a new user. Help me in making an account.', '2021-04-22', '01:07 AM', '0'),
(2, 'Ganpat Patel', '9672836724', 'gapu.012@gmail.com', '569, Rajiv Nagar, Kundapura, Udupi (Karnataka)', 'Lockdown Problem', 'Help Out, due to lockdown I have doubt whether your platform can still help me to get transport deals. I want to hear from you whether your platform will be active during lockdown state also? ', '2021-04-23 ', '02:00 PM', '0'),
(3, 'Avinash', '9638527410', 'avinash16@gmail.com', '45, 47th Cross, Chickpet, Banglore Urban (Karnataka)', 'Brief me about your platform', 'Hey! I am a new user and I want to use your platform as a customer. So please brief me about process of buying as a customer through your platform.', '2021-04-23', '09:36 PM', '1');

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
(1, '7042757709', '9672836724', 2, 65, '12', 'IMPS', '78452312012458', 'assets/documents/payment/78452312012458-TRANSPROOF.pdf', '2'),
(2, '7042757709', '9672836724', 1, 20, '12', 'IMPS', '373485485532157488', 'assets/documents/payment/373485485532157488-TRANSPROOF.pdf', '1'),
(3, '9661442323', '9782507934', 5, 28, '0', '0', '0', '0', '0'),
(4, '9661442323', '9782507934', 3, 19, '7', 'IMPS', '4153496845105959651', 'assets/documents/payment/4153496845105959651-TRANSPROOF.pdf', '2'),
(5, '9672836724', '9782507934', 5, 26, '0', '0', '0', '0', '0'),
(6, '9672836724', '9782507934', 3, 20, '2', '0', '0', '0', '0'),
(7, '7042757709', '9782507934', 5, 26, '0', '0', '0', '0', '0'),
(8, '7042757709', '9782507934', 3, 18, '2', '0', '0', '0', '0'),
(9, '9672836724', '7042757709', 7, 27, '6', 'IMPS', '61519846249562048911', 'assets/documents/payment/61519846249562048911-TRANSPROOF.pdf', '2'),
(10, '9661442323', '7042757709', 7, 25, '2', '0', '0', '0', '0'),
(11, '9782507934', '7042757709', 7, 26, '2', '0', '0', '0', '0'),
(12, '7042757709', '7042757709', 7, 25, '2', '0', '0', '0', '0');

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
(11, 'Corn', 'Feed Crops', '14', 21),
(12, 'Grapes', 'Fruits', '30', 45),
(13, 'Guava', 'Fruits', '25', 38),
(14, 'Potato', 'Vegitables', '12', 18),
(15, 'Chilli', 'Vegitables', '15', 23),
(16, 'Ladies Finger', 'Vegitables', '25', 38);

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
(1, '9672836724', 7, '68', 'assets/documents/crop/17112-4043-680-9672836724.png', 'assets/documents/crop/17801-3847-3322-9672836724.png', 'assets/documents/crop/18701-7597-4406-9672836724.png', '17', '2021-05-22', '12'),
(2, '9672836724', 1, '75', 'assets/documents/crop/16755-2817-3221-9672836724.png', 'assets/documents/crop/15977-7845-6615-9672836724.png', 'assets/documents/crop/18476-7406-9097-9672836724.png', '62', '2021-05-22', '12'),
(3, '9782507934', 5, '85', 'assets/documents/crop/13292-3070-6181-9782507934.png', 'assets/documents/crop/16401-4290-3068-9782507934.png', 'assets/documents/crop/11397-4846-2008-9782507934.png', '17', '2021-05-23', '7'),
(5, '9782507934', 15, '75', 'assets/documents/crop/1720-847-7467-9782507934.png', 'assets/documents/crop/13046-3131-9209-9782507934.png', 'assets/documents/crop/15558-8949-9379-9782507934.png', '25', '2021-05-23', '1'),
(6, '9661442323', 12, '100', 'assets/documents/crop/15899-7274-6701-9661442323.png', 'assets/documents/crop/15712-9358-6098-9661442323.png', 'assets/documents/crop/14942-2732-6819-9661442323.png', '47', '2021-05-23', '0'),
(7, '7042757709', 11, '70', 'assets/documents/crop/1221-354-3497-7042757709.png', 'assets/documents/crop/15757-9430-2346-7042757709.png', 'assets/documents/crop/18695-6840-6476-7042757709.png', '24', '2021-05-23', '6');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_mobile` varchar(25) NOT NULL,
  `c_contactname` varchar(50) NOT NULL DEFAULT '',
  `c_gender` varchar(25) NOT NULL,
  `c_age` varchar(10) NOT NULL,
  `c_street` varchar(50) NOT NULL,
  `c_city` varchar(25) NOT NULL,
  `c_state` varchar(25) NOT NULL,
  `c_pincode` varchar(10) NOT NULL,
  `c_type` varchar(25) NOT NULL,
  `c_registration` varchar(100) NOT NULL DEFAULT '',
  `c_aadhar` varchar(25) NOT NULL DEFAULT '',
  `c_aadharpdf` varchar(100) NOT NULL DEFAULT '',
  `c_pan` varchar(25) NOT NULL,
  `c_panpdf` varchar(100) NOT NULL,
  `c_photo` varchar(100) NOT NULL,
  `c_password` varchar(25) NOT NULL,
  `c_approve` varchar(100) NOT NULL,
  `c_tsv_otp` varchar(10) NOT NULL DEFAULT '',
  `c_tsv_validity` varchar(50) NOT NULL DEFAULT '',
  `c_temppass` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_mobile`, `c_contactname`, `c_gender`, `c_age`, `c_street`, `c_city`, `c_state`, `c_pincode`, `c_type`, `c_registration`, `c_aadhar`, `c_aadharpdf`, `c_pan`, `c_panpdf`, `c_photo`, `c_password`, `c_approve`, `c_tsv_otp`, `c_tsv_validity`, `c_temppass`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 'Salman Khan', '9672836724', '', 'Male', '26', '45, Rose Villa', 'Davanagere', 'Karnataka', '577001', 'Wholesaler', '', '345647893567', 'assets/documents/aadhar/9672836724-Salman Khan-AADHAR.pdf', 'RTVCD6453O', 'assets/documents/pan/9672836724-Salman Khan-PAN.pdf', 'assets/documents/photo/9672836724-Salman Khan-img1.jpg', 'Gapu@8540', '2', '', '', ''),
(2, 'Harshad Mehta & Industry Pvt. Ltd.', '7042757709', 'Vinod Mehta', 'Male', '35', 'DLF Mansion, Chandi Chowk', 'West Delhi', 'Delhi', '110015', 'Organization', 'assets/documents/registration/7042757709-Harshad Mehta & Industry Pvt. Ltd.-Registration.pdf', '', '', 'EDCGT9884M', 'assets/documents/pan/7042757709-Harshad Mehta & Industry Pvt. Ltd.-PAN.pdf ', 'assets/documents/photo/7042757709-Harshad Mehta & Industry Pvt. Ltd.-img3.jpeg ', 'Gapu@8540', '2', '', '', ''),
(3, 'Gautam Birla', '9661442323', '', 'Male', '33', 'Shop Number 470, Janta Market, Badla Marg', 'Agra', 'Uttar Pradesh', '282010', 'Wholesaler', '', '700426825413', 'assets/documents/aadhar/9661442323-Gautam Birla-AADHAR.pdf', 'THBNE3498I', 'assets/documents/pan/9661442323-Gautam Birla-PAN.pdf', 'assets/documents/photo/9661442323-Gautam Birla-pic12.jpg', 'Gapu@8540', '2', '', '', ''),
(4, 'Altop Industries Pvt. Ltd.', '9782507934', 'Aalim Akhtar', 'Male', '38', 'HB Colony Road, Near Kanaka Durga Temple', 'Vishakhapatnam', 'Andhra Pradesh', '530022', 'Organization', 'assets/documents/registration/9782507934-Altop Industries Pvt. Ltd.-Registration.pdf', '', '', 'SNMYE2864F', 'assets/documents/pan/9782507934-Altop Industries Pvt. Ltd.-PAN.pdf', 'assets/documents/photo/9782507934-Altop Industries Pvt. Ltd.-pic8.jpg', 'Gapu@8540', '2', '', '', '');

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
  `d_approve` varchar(10) NOT NULL,
  `d_tsv_otp` varchar(10) NOT NULL DEFAULT '',
  `d_tsv_validity` varchar(50) NOT NULL DEFAULT '',
  `d_temppass` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`d_id`, `d_name`, `d_mobile`, `d_gender`, `d_age`, `d_street`, `d_city`, `d_state`, `d_pincode`, `d_aadhar`, `d_aadharpdf`, `d_pan`, `d_panpdf`, `d_photo`, `d_dlnumber`, `d_dlpdf`, `d_vehiclenumber`, `d_vehiclercpdf`, `d_lat`, `d_long`, `d_date`, `d_time`, `d_password`, `d_approve`, `d_tsv_otp`, `d_tsv_validity`, `d_temppass`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', ''),
(1, 'Vivek Singh', '9672836724', 'Male', '27', '90, Old Road, Jamnagar', 'Katihar', 'Bihar', '854311', '984536272167', 'assets/documents/aadhar/9672836724-Vivek Singh-AADHAR.pdf', 'VETYD5632N', 'assets/documents/pan/9672836724-Vivek Singh-PAN.pdf', 'assets/documents/photo/9672836724-Vivek Singh-img2.jpg', 'BR5345362784673', 'assets/documents/dlpdf/9672836724-Vivek Singh-DL.pdf', 'BR02HJ5342', 'assets/documents/rcpdf/9672836724-Vivek Singh-RC.pdf', '26.2726', '73.0345', '2021-05-23', '11:48 PM', 'Gapu@8540', '2', '', '', ''),
(2, 'Bhanu Kumar', '9661442323', 'Male', '27', 'CC-22, Raj Marg, Near Jai Vilas Palace', 'Gwalior', 'Madhya Pradesh', '474004', '751245600352', 'assets/documents/aadhar/9661442323-Bhanu Kumar-AADHAR.pdf', 'NDUCI5349J', 'assets/documents/pan/9661442323-Bhanu Kumar-PAN.pdf', 'assets/documents/photo/9661442323-Bhanu Kumar-img7.jpeg', 'MP6748512784510', 'assets/documents/dlpdf/9661442323-Bhanu Kumar-DL.pdf', 'MP10TS4602', 'assets/documents/rcpdf/9661442323-Bhanu Kumar-RC.pdf', '27.023803599999997', '74.21793260000001', '2021-05-22', '08:46 PM', 'Gapu@8540', '2', '', '', ''),
(3, 'Pankaj Gupta', '9782507934', 'Male', '29', 'Block No. 288, Near Purshottam Farm', 'Surat', 'Gujarat', '394105', '435369867258', 'assets/documents/aadhar/9782507934-Pankaj Gupta-AADHAR.pdf', 'SJKEV9098U', 'assets/documents/pan/9782507934-Pankaj Gupta-PAN.pdf', 'assets/documents/photo/9782507934-Pankaj Gupta-pic10.jpg', 'GJ7528782578285', 'assets/documents/dlpdf/9782507934-Pankaj Gupta-DL.pdf', 'GJ17UV0007', 'assets/documents/rcpdf/9782507934-Pankaj Gupta-RC.pdf', '26.2726', '73.0345', '2021-05-23', '11:47 PM', 'Gapu@8540', '2', '', '', ''),
(4, 'Venkatesh Tej', '7042757709', 'Male', '30', 'CT-255, Rajiv Gandhi Marg, Near Clock Tower ', 'Hyderabad', 'Telangana', '500002', '690725948664', 'assets/documents/aadhar/7042757709-Venkatesh Tej-AADHAR.pdf', 'HWSCA1442P', 'assets/documents/pan/7042757709-Venkatesh Tej-PAN.pdf', 'assets/documents/photo/7042757709-Venkatesh Tej-pic11.jpeg', 'TG7893268429675', 'assets/documents/dlpdf/7042757709-Venkatesh Tej-DL.pdf', 'TG29CC1797', 'assets/documents/rcpdf/7042757709-Venkatesh Tej-RC.pdf', '26.2726', '73.0345', '2021-05-23', '11:45 PM', 'Gapu@8540', '2', '', '', '');

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
  `f_city` varchar(500) NOT NULL,
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
  `f_tsv_otp` varchar(10) NOT NULL DEFAULT '',
  `f_tsv_validity` varchar(50) NOT NULL DEFAULT '',
  `f_temppass` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`f_id`, `f_name`, `f_mobile`, `f_gender`, `f_age`, `f_street`, `f_city`, `f_state`, `f_pincode`, `f_aadhar`, `f_aadharpdf`, `f_pan`, `f_panpdf`, `f_photo`, `f_password`, `f_approve`, `f_bankholder`, `f_bankaccount`, `f_bankifsc`, `f_bankname`, `f_bankbranch`, `f_bankpassbook`, `f_tsv_otp`, `f_tsv_validity`, `f_temppass`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1, 'Aditya Chopra', '9672836724', 'Male', '35', '56, Akshay Vihar', 'Mumbai City (ex Bombay)', 'Maharashtra', '230532', '678746784673', 'assets/documents/aadhar/9672836724-Aditya Chopra-AADHAR.pdf', 'HIOPI7654V', 'assets/documents/pan/9672836724-Aditya Chopra-PAN.pdf', 'assets/documents/photo/9672836724-Aditya Chopra-imag.jfif', 'Gapu@8540', '2', 'Aditya Chopra', '6547389764532', 'SBIN0020852', 'SBI', 'Mumbai', 'assets/documents/passbook/9672836724-Aditya Chopra-PASSBOOK.pdf', '', '', ''),
(2, 'Virat Verma', '9782507934', 'Male', '30', 'BB-20, Near Kadri Manjunath Temple', 'Dakshina Kannada (Mangalore)', 'Karnataka', '574142', '758412358903', 'assets/documents/aadhar/9782507934-Virat Verma-AADHAR.pdf', 'TEDRS5044N', 'assets/documents/pan/9782507934-Virat Verma-PAN.pdf', 'assets/documents/photo/9782507934-Virat Verma-img1.jpeg', 'Gapu@8540', '2', 'Virat Verma', '4865792574100', 'CNRB0000842', 'Canara Bank', 'Shivbagh, Mangalore', 'assets/documents/passbook/9782507934-Virat Verma-PASSBOOK.pdf', '', '', ''),
(3, 'Suyash Bhatia', '7042757709', 'Male', '32', 'DA-28, Sector 27, Near Indian OIL Petrol Pump', 'Chandigarh', 'Chandigarh', '160027', '972030254331', 'assets/documents/aadhar/7042757709-Suyash Bhatia-AADHAR.pdf', 'QRVBT5257M', 'assets/documents/pan/7042757709-Suyash Bhatia-PAN.pdf', 'assets/documents/photo/7042757709-Suyash Bhatia-pic5.jpg', 'Gapu@8540', '2', 'Suyash Bhatia', '7568522000024', 'SBIN0000628', 'SBI', 'Sector 27, Chandigarh', 'assets/documents/passbook/7042757709-Suyash Bhatia-PASSBOOK.pdf', '', '', ''),
(4, 'Sushant Mishra', '9661442323', 'Male', '35', 'AA-49, Near Surya Mandir, Bihar Sarif', 'Nalanda', 'Bihar', '803107', '900373580727', 'assets/documents/aadhar/9661442323-Sushant Mishra-AADHAR.pdf', 'UNFCA8194C', 'assets/documents/pan/9661442323-Sushant Mishra-PAN.pdf', 'assets/documents/photo/9661442323-Sushant Mishra-pic9.jpg', 'Gapu@8540', '2', 'Sushant Mishra', '6787255022537', 'SBIN0000042', 'SBI', 'Bihar Sarif', 'assets/documents/passbook/9661442323-Sushant Mishra-PASSBOOK.pdf', '', '', '');

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
  `id` int(11) NOT NULL,
  `cro_id` int(11) NOT NULL,
  `mep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mepdetails`
--

INSERT INTO `mepdetails` (`id`, `cro_id`, `mep`) VALUES
(1, 1, 62),
(2, 1, 64),
(3, 1, 62),
(4, 1, 65),
(5, 1, 60),
(6, 2, 16),
(7, 2, 18),
(8, 2, 19),
(9, 2, 15),
(10, 2, 18),
(11, 3, 25),
(12, 3, 23),
(13, 3, 28),
(14, 3, 26),
(15, 3, 24),
(16, 4, 16),
(17, 4, 17),
(18, 4, 18),
(19, 4, 15),
(20, 4, 19),
(21, 5, 15),
(22, 5, 17),
(23, 5, 20),
(24, 5, 17),
(25, 5, 18),
(26, 6, 19),
(27, 6, 20),
(28, 6, 19),
(29, 6, 21),
(30, 6, 18),
(31, 7, 19),
(32, 1, 62),
(33, 5, 17),
(34, 15, 25),
(35, 15, 25),
(36, 12, 47),
(37, 11, 24),
(38, 7, 20),
(39, 7, 21),
(40, 7, 22),
(41, 7, 20),
(42, 8, 22),
(43, 8, 24),
(44, 8, 25),
(45, 8, 22),
(46, 8, 23),
(47, 9, 82),
(48, 9, 80),
(49, 9, 85),
(50, 9, 78),
(51, 9, 83),
(52, 10, 25),
(53, 10, 27),
(54, 10, 26),
(55, 10, 25),
(56, 10, 28),
(57, 11, 24),
(58, 11, 22),
(59, 11, 21),
(60, 11, 23),
(61, 12, 46),
(62, 12, 50),
(63, 12, 47),
(64, 12, 50),
(65, 15, 26),
(66, 15, 27),
(67, 15, 24),
(68, 15, 26),
(69, 16, 42),
(70, 16, 40),
(71, 16, 44),
(72, 16, 40),
(73, 16, 41),
(74, 13, 40),
(75, 13, 39),
(76, 13, 43),
(77, 13, 42),
(78, 13, 40),
(79, 14, 19),
(80, 5, 20),
(81, 14, 21),
(82, 14, 19),
(83, 14, 21);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `validity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `mobile`, `otp`, `validity`) VALUES
(1, '9672836724', '948664', 1),
(2, '9672836724', '948664', 1),
(3, '9672836724', '948664', 1),
(4, '9672836724', '948664', 1),
(5, '9672836724', '948664', 1),
(6, '9782507934', '849023', 1),
(7, '9782507934', '849023', 1),
(8, '9782507934', '849023', 1),
(9, '9672836724', '948664', 1),
(10, '9672836724', '948664', 1),
(11, '9672836724', '948664', 1),
(12, '9782507934', '849023', 1),
(14, '9672836724', '948664', 1),
(15, '9782507934', '849023', 1),
(16, '9782507934', '849023', 1),
(17, '9661442323', '448711', 1),
(18, '9661442323', '448711', 1),
(19, '9661442323', '448711', 1),
(20, '9661442323', '448711', 1),
(21, '9672836724', '948664', 1),
(22, '9672836724', '948664', 1),
(23, '9672836724', '948664', 1),
(24, '9672836724', '948664', 1),
(25, '9672836724', '948664', 1),
(26, '9672836724', '948664', 1),
(27, '9672836724', '948664', 1),
(28, '9672836724', '948664', 1),
(29, '9672836724', '948664', 1),
(30, '9672836724', '948664', 1),
(31, '7042757709', '328987', 1),
(32, '9661442323', '448711', 1),
(33, '7042757709', '328987', 1),
(34, '9661442323', '448711', 1),
(35, '7042757709', '328987', 1),
(36, '9661442323', '448711', 1),
(37, '9661442323', '448711', 1),
(38, '9661442323', '448711', 1),
(39, '9661442323', '448711', 1),
(40, '9782507934', '849023', 1),
(41, '7042757709', '328987', 1),
(42, '9661442323', '448711', 1),
(43, '7042757709', '328987', 1),
(44, '9661442323', '448711', 1),
(45, '9782507934', '849023', 1),
(46, '7042757709', '328987', 1),
(47, '9661442323', '448711', 1),
(48, '9782507934', '849023', 1);

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
(1, 'Crop Minimum Expected Price Update Problem', 'I am having a problem updating the Minimum Expected Price of my crop. Please help me!!', 'Farmer', '9672836724', '2021-05-11', '11:46 AM', '1'),
(2, 'Payment Problem', 'Please help me understand the payment process. How should I complete the payment with Farmer & Driver?', 'Customer', '9113671387', '2021-05-11', '12:08 PM', '0'),
(3, 'Location Update Problem', 'I am facing issues in updating my current location. Kindly help me.', 'Driver', '7042757709', '2021-05-11', '12:10 PM', '0');

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
(1, '9661442323', 1, '5000', '1'),
(3, '9672836724', 4, '9500', '0'),
(4, '9782507934', 4, '7200', '0'),
(5, '9661442323', 4, '8300', '0'),
(6, '7042757709', 4, '6150', '0');

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
(1, '2', 'Rajesh Patel', '9113671387', 'DL03BX7423');

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
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cropbid`
--
ALTER TABLE `cropbid`
  MODIFY `cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cropdetails`
--
ALTER TABLE `cropdetails`
  MODIFY `cro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cropsale`
--
ALTER TABLE `cropsale`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kiosk`
--
ALTER TABLE `kiosk`
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mepdetails`
--
ALTER TABLE `mepdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transportbid`
--
ALTER TABLE `transportbid`
  MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transportself`
--
ALTER TABLE `transportself`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
