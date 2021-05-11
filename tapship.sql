-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 08:32 PM
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
-- Database: `hostel_management_system`
--
CREATE DATABASE IF NOT EXISTS `hostel_management_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hostel_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `Application_id` int(100) NOT NULL,
  `Student_id` varchar(255) NOT NULL,
  `Hostel_id` int(10) NOT NULL,
  `Application_status` tinyint(1) DEFAULT NULL,
  `Room_No` int(10) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`Application_id`, `Student_id`, `Hostel_id`, `Application_status`, `Room_No`, `Message`) VALUES
(4, '1234', 1, 0, 1, 'Allot me room'),
(7, '147', 2, 0, 101, 'allot me room'),
(8, '123', 3, 0, 201, 'allot me room.'),
(9, '234', 4, 0, 14, 'Allot Me Room.'),
(10, '456', 6, 0, 28, 'Allot Me Room.'),
(11, '567', 7, 0, 129, 'Allot Me Room.'),
(12, '678', 8, 0, 215, 'Allot Me Room.'),
(13, '789', 8, 0, 216, 'Allot Me Room.'),
(14, '120', 2, 0, 102, 'xxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `Hostel_id` int(10) NOT NULL,
  `Hostel_name` varchar(255) NOT NULL,
  `current_no_of_rooms` varchar(255) DEFAULT NULL,
  `No_of_rooms` varchar(255) DEFAULT NULL,
  `No_of_students` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`Hostel_id`, `Hostel_name`, `current_no_of_rooms`, `No_of_rooms`, `No_of_students`) VALUES
(0, 'Admin_Hostel', NULL, '10', NULL),
(1, 'Boys Hostel 1 GF', NULL, '13', NULL),
(2, 'Boys Hostel 1 FF', NULL, '14', NULL),
(3, 'Boys Hostel 1 SF', NULL, '14', NULL),
(4, 'Boys Hostel 2 GF', NULL, '14', NULL),
(5, 'Boys Hostel 2 FF', NULL, '14', NULL),
(6, 'Girls Hostel 1 GF', NULL, '13', NULL),
(7, 'Girls Hostel 1 FF', NULL, '14', NULL),
(8, 'Girls Hostel 1 SF', NULL, '14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_manager`
--

CREATE TABLE `hostel_manager` (
  `Hostel_man_id` int(10) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Mob_no` varchar(255) NOT NULL,
  `Hostel_id` int(10) NOT NULL,
  `Pwd` longtext NOT NULL,
  `Isadmin` tinyint(1) DEFAULT 0,
  `Email` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel_manager`
--

INSERT INTO `hostel_manager` (`Hostel_man_id`, `Username`, `Fname`, `Lname`, `Mob_no`, `Hostel_id`, `Pwd`, `Isadmin`, `Email`) VALUES
(456, 'ashutosh', 'Ashutosh', 'Kumar', '4758691450', 0, '$2y$10$p5z2NiWS001x8pwKg4I.ze05AZqBfEXluCGy9rLYX4GVhXRrEA/C.', 1, 'ashutosh@sode-edu.in'),
(458, 'saurabh', 'Saurabh', 'Shetty', '4567891234', 1, '$2y$10$hSBz/5bWcG2imZQ9BYKy4OBQM.24GhBPIGdLnmEe7nOa7Ww26wlHu', 0, 'saurabh@sode-edu.in'),
(460, 'ganpat', 'Ganpat', 'Patel', '4561231232', 2, '$2y$10$9TV4SsagyI9IwOr5GTp0KuoV1MXugQEF5nHSmJo97vfeB401Qg9sq', 0, 'ganpat@sode-edu.in'),
(461, 'suhas', 'Suhas', 'Kashyap', '7531594568', 3, '$2y$10$Bg1hl5AW5iuqq3m.RCSjz.K3ZahF2/xhO7oINGvLpi3/vT1pWJrva', 0, 'suhas@sode-edu.in'),
(462, 'shubham', 'Shubham', 'Poojary', '4445556662', 4, '$2y$10$cROtTF0uqXHA9bBSRgD1M.PZionYAo39lOSc5TR7Funzgga35gWru', 0, 'shubham@sode-edu.in'),
(463, 'pranav', 'Pranav ', 'Nayak', '6665557779', 5, '$2y$10$bovt4p969CzfbAI/xJELt.z9VDE.0w2S6q93H2n4KJpv3oVTpuP9m', 0, 'pranav@sode-edu.in'),
(464, 'shloka', 'Shloka', 'Shetty', '9998887771', 6, '$2y$10$kJe54ja2eTKtOmyMjEvcnOkeHGKtfVcVxSsfp6POdNx/EsC738C9S', 0, 'shloka@sode-edu.in'),
(465, 'prajna', 'Prajna', 'Nayak', '9966338524', 7, '$2y$10$ULfpdQZ8eIr9C.nJq/hP9eP9BewkU5vTOizsTE1raKMcr7ESEVtoK', 0, 'prajna@sode-edu.in'),
(466, 'sania', 'Sania', 'Khan', '9514568520', 8, '$2y$10$tWTHDWzYNQOW6QeO42Rbl.kOzPN/HfmlTvL9OdOq7XA5TxEmW7Gpu', 0, 'sania@sode-edu.in');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(10) NOT NULL,
  `sender_id` varchar(255) DEFAULT NULL,
  `receiver_id` varchar(255) DEFAULT NULL,
  `hostel_id` int(10) DEFAULT NULL,
  `subject_h` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `msg_date` varchar(255) DEFAULT NULL,
  `msg_time` varchar(255) DEFAULT NULL,
  `sender_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `sender_id`, `receiver_id`, `hostel_id`, `subject_h`, `message`, `msg_date`, `msg_time`, `sender_name`) VALUES
(22, '456', '458', 1, 'Hello Saurabh', 'Welcome as a New Hostel Manager.', '2020-12-11', '06:10 AM', 'Ashutosh Kumar'),
(23, '1234', '458', 1, 'Food Issues', 'Have a lot food Issues. Please Resolve that.', '2020-12-11', '06:13 AM', 'Raunak Choudhary'),
(24, '458', '1234', 1, 'Food Issues', 'We will Solve that very soon.', '2020-12-11', '06:14 AM', 'Saurabh Shetty');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_id` int(10) NOT NULL,
  `Hostel_id` int(10) NOT NULL,
  `Room_No` int(10) NOT NULL,
  `Allocated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_id`, `Hostel_id`, `Room_No`, `Allocated`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0),
(3, 1, 3, 0),
(14, 2, 101, 1),
(15, 2, 102, 1),
(16, 2, 103, 0),
(28, 3, 201, 1),
(29, 3, 202, 0),
(30, 3, 203, 0),
(42, 4, 14, 1),
(43, 4, 15, 0),
(44, 4, 16, 0),
(56, 5, 115, 0),
(57, 5, 116, 0),
(58, 5, 117, 0),
(70, 6, 28, 1),
(71, 6, 29, 0),
(72, 6, 30, 0),
(83, 7, 129, 1),
(84, 7, 130, 0),
(85, 7, 131, 0),
(97, 8, 215, 1),
(98, 8, 216, 1),
(99, 8, 217, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_id` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Mob_no` varchar(255) NOT NULL,
  `Dept` varchar(255) NOT NULL,
  `Year_of_study` varchar(255) NOT NULL,
  `Pwd` longtext NOT NULL,
  `Hostel_id` int(10) DEFAULT NULL,
  `Room_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_id`, `Fname`, `Lname`, `Mob_no`, `Dept`, `Year_of_study`, `Pwd`, `Hostel_id`, `Room_id`) VALUES
('120', 'abc', 'xyz', '1234567890', 'MECH', '2016', '$2y$10$Ie426oCs/mbNhbWNYVM8muKaszCjF20WpFR.QT.ss6rKW9iNqtwi2', 2, 15),
('123', 'Abhidev', 'V', '7894461230', 'MECH', '2019', '$2y$10$MTPtYc/o3ncojNx8Qi/tTOrnrGNlNom8uzskPtyWOtLuiYHIBIlBK', 3, 28),
('1234', 'Raunak', 'Choudhary', '1234567890', 'CSE', '2017', '$2y$10$nOwyL0bV/PE9/EK0vzXcZekE2OAzcjz9MPyCG6w5Wh6bUENef/0tu', 1, 1),
('147', 'Mahith', 'Hegde', '7531594658', 'ECE', '2018', '$2y$10$EsEpddue5LDHzBH4XFFFseH9X4Il.9maaEXfqBadCYvGdsgNg0z12', 2, 14),
('234', 'Ullas', 'Kundar', '4567891230', 'CIVIL', '2020', '$2y$10$ElDnfPA8DnktzEJkaM9EiO/bpEapGCddog0rdnmP8KTYF39peziX6', 4, 42),
('345', 'Faheem', 'Ahmed', '3456789120', 'ECE', '2020', '$2y$10$NB6UoTefr.pNpG.MhA.myuyrynogHFvxAxmqlBKPkYXVWMVO.Oji6', NULL, NULL),
('456', 'Rakshita', 'Kotian', '4789561230', 'CIVIL', '2017', '$2y$10$HpVZMfyEL/gaonKqfu51uexSG.4auB9Fkt5amHB.4tNrGkwDeBm.O', 6, 70),
('567', 'Samreen', 'Shaikh', '2345678910', 'CSE', '2018', '$2y$10$Xga2rHafO77OGI8QdxU/S.hmvGOFNzF2/VQ1YADNDyN53.iySuq6S', 7, 83),
('678', 'Samskriti', 'Jain', '4123789560', 'ECE', '2019', '$2y$10$MztFdMNaP6c0Dlrz/xtLGOxP4Ot4171KyMmxbCzCg6Yx49AdKly1m', 8, 97),
('789', 'Srinidhi', 'N', '647891230', 'CSE', '2020', '$2y$10$u/CMRS8nHWbMNAQBtGNX9eeRAAq7AotpzSANLHFI3c78XCGe/7GCm', 8, 98);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`Application_id`),
  ADD KEY `Student_id` (`Student_id`),
  ADD KEY `Hostel_id` (`Hostel_id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`Hostel_id`);

--
-- Indexes for table `hostel_manager`
--
ALTER TABLE `hostel_manager`
  ADD PRIMARY KEY (`Hostel_man_id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `Hostel_id` (`Hostel_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `hostel_id` (`hostel_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_id`),
  ADD KEY `Hostel_id` (`Hostel_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_id`),
  ADD KEY `Hostel_id` (`Hostel_id`),
  ADD KEY `Room_id` (`Room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `Application_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `Hostel_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hostel_manager`
--
ALTER TABLE `hostel_manager`
  MODIFY `Hostel_man_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=467;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `Application_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`),
  ADD CONSTRAINT `Application_ibfk_2` FOREIGN KEY (`Hostel_id`) REFERENCES `hostel` (`Hostel_id`);

--
-- Constraints for table `hostel_manager`
--
ALTER TABLE `hostel_manager`
  ADD CONSTRAINT `Hostel_Manager_ibfk_1` FOREIGN KEY (`Hostel_id`) REFERENCES `hostel` (`Hostel_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`Hostel_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `Room_ibfk_1` FOREIGN KEY (`Hostel_id`) REFERENCES `hostel` (`Hostel_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`Hostel_id`) REFERENCES `hostel` (`Hostel_id`),
  ADD CONSTRAINT `Student_ibfk_2` FOREIGN KEY (`Room_id`) REFERENCES `room` (`Room_id`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"tapship\",\"table\":\"farmer\"},{\"db\":\"tapship1\",\"table\":\"farmer\"},{\"db\":\"tapship\",\"table\":\"kiosk\"},{\"db\":\"tapship\",\"table\":\"queries\"},{\"db\":\"tapship\",\"table\":\"kioskold\"},{\"db\":\"tapship\",\"table\":\"cropbid\"},{\"db\":\"tapship\",\"table\":\"cropsale\"},{\"db\":\"tapship\",\"table\":\"cropdetails\"},{\"db\":\"tapship\",\"table\":\"contactus\"},{\"db\":\"tapship\",\"table\":\"admin\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2021-05-11 18:24:10', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `tapship`
--
CREATE DATABASE IF NOT EXISTS `tapship` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tapship`;

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
(7, '9113671388', '9672836725', 4, 19, '12', 'IMPS', 'IMPS-24564794444', 'assets/documents/payment/IMPS-24564794444-TRANSPROOF.pdf', '1'),
(8, '9113671388', '9672836725', 5, 21, '2', '0', '0', '0', '0'),
(9, '9113671387', '9672836724', 6, 30, '12', 'IMPS', '852752785287523', 'assets/documents/payment/852752785287523-TRANSPROOF.pdf', '2'),
(10, '9113671388', '9672836724', 6, 32, '2', '0', '0', '0', '0');

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
(4, '9672836725', 2, '145', 'assets/documents/crop/14602-5116-7819-9672836725.png', 'assets/documents/crop/18078-3139-3176-9672836725.png', 'assets/documents/crop/16859-4073-1353-9672836725.png', '18', '2021-05-10', '12'),
(5, '9672836725', 6, '350', 'assets/documents/crop/18651-2615-2792-9672836725.png', 'assets/documents/crop/18254-5771-4106-9672836725.png', 'assets/documents/crop/17982-5794-8537-9672836725.png', '19', '2021-05-10', '8'),
(6, '9672836724', 10, '500', 'assets/documents/crop/12779-3436-1873-9672836724.png', 'assets/documents/crop/14197-9250-8566-9672836724.png', 'assets/documents/crop/12248-9120-7665-9672836724.png', '25', '2021-05-10', '12'),
(7, '9672836724', 11, '80', 'assets/documents/crop/16673-457-2800-9672836724.png', 'assets/documents/crop/18678-9982-6439-9672836724.png', 'assets/documents/crop/15953-3782-6072-9672836724.png', '23', '2021-05-10', '0'),
(8, '9672836724', 9, '90', 'assets/documents/crop/11849-8483-9729-9672836724.png', 'assets/documents/crop/17613-9426-9015-9672836724.png', 'assets/documents/crop/12623-6791-8804-9672836724.png', '85', '2021-05-11', '0');

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
(1, 'Faheem Ahmad', '7042757709', 'Male', '22', 'Pink House, Near Baroda Bank, Shankarpura', 'Udupi', 'Karnataka', '574115', '506231410194', 'assets/documents/aadhar/7042757709-Faheem Ahmad-AADHAR.pdf', 'BPDPA9672E', 'assets/documents/pan/7042757709-Faheem Ahmad-PAN.pdf', 'assets/documents/photo/7042757709-Faheem Ahmad-faheem.jpeg', 'BR0120170448831', 'assets/documents/dlpdf/7042757709-Faheem Ahmad-DL.pdf', 'KA20CS1267', 'assets/documents/rcpdf/7042757709-Faheem Ahmad-RC.pdf', '27.023803599999997', '74.21793260000001', '2021-05-11', '10:14 AM', 'Gapu@8540', '2'),
(2, 'Suresh Singh', '7042757710', 'Male', '29', '34, Hemant nagar, Luni', 'Jodhpur', 'Rajasthan', '342802', '873456789256', 'assets/documents/aadhar/7042757710-Suresh Singh-AADHAR.pdf', 'TBFRT6754M', 'assets/documents/pan/7042757710-Suresh Singh-PAN.pdf', 'assets/documents/photo/7042757710-Suresh Singh-suresh.jpg', 'RJ8735672907512', 'assets/documents/dlpdf/7042757710-Suresh Singh-DL.pdf', 'RJ19TR7656', 'assets/documents/rcpdf/7042757710-Suresh Singh-RC.pdf', '13.43488', '74.7470848', '2021-05-11', '12:26 AM', 'Gapu@8540', '2');

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
  `f_bankpassbook` varchar(200) NOT NULL,
  `f_tsv_otp` varchar(10) NOT NULL,
  `f_tsv_validity` varchar(50) NOT NULL,
  `f_av_otp` varchar(10) NOT NULL,
  `f_av_status` varchar(50) NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`f_id`, `f_name`, `f_mobile`, `f_gender`, `f_age`, `f_street`, `f_city`, `f_state`, `f_pincode`, `f_aadhar`, `f_aadharpdf`, `f_pan`, `f_panpdf`, `f_photo`, `f_password`, `f_approve`, `f_bankholder`, `f_bankaccount`, `f_bankifsc`, `f_bankname`, `f_bankbranch`, `f_bankpassbook`, `f_tsv_otp`, `f_tsv_validity`, `f_av_otp`, `f_av_status`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'INACTIVE'),
(1, 'Ganpat Patel', '9672836724', 'Male', '21', '202, Laxmi Plaza, Brahmavara', 'Udupi', 'Karnataka', '576213', '799721133696', 'assets/documents/aadhar/9672836724-Ganpat Patel-AADHAR.pdf', 'EYCPP1502E', 'assets/documents/pan/9672836724-Ganpat Patel-PAN.pdf', 'assets/documents/photo/9672836724-Ganpat Patel-2018_1.jpg', 'Gapu@8540', '2', 'Ganpat Patel', '2342567893456', 'CNRB0000466', 'Canara Bank', 'BVR', 'assets/documents/passbook/9672836724-Ganpat Patel-PASSBOOK.pdf', '', '0', '', 'INACTIVE'),
(2, 'Rakesh Sharma', '9672836725', 'Male', '28', '67, Epic Road, Bommanahalli', 'Banglore', 'Karnataka', '560068', '799721133696', 'assets/documents/aadhar/9672836725-Rakesh Sharma-AADHAR.pdf', 'UIBNO1902F', 'assets/documents/pan/9672836725-Rakesh Sharma-PAN.pdf', 'assets/documents/photo/9672836725-Rakesh Sharma-2018_1.jpg', 'Gapu@8540', '2', 'Rakesh Sharma', '7344581863456', 'CNRB0003047', 'Canara Bank', 'Bommanahalli', 'assets/documents/passbook/9672836725-Rakesh Sharma-PASSBOOK.pdf', '', '', '', 'INACTIVE');

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
(1, '7042757709', 1, '6000', '1'),
(2, '7042757710', 1, '6500', '2'),
(3, '7042757709', 3, '500', '1'),
(4, '7042757709', 5, '4500', '1'),
(5, '7042757710', 7, '20000', '0'),
(6, '7042757710', 3, '17000', '2'),
(7, '7042757709', 9, '1000', '1'),
(8, '7042757710', 9, '20000', '2');

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
(1, '4', 'Aadesh Pahalwan', '7845327865', 'KA20TR6547'),
(2, '7', 'Avesh Khan', '6756346728', 'RJ19UY8747'),
(3, '11', 'Amit Kumar', '9782507934', 'RJ04RV5241');

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
  MODIFY `cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cropdetails`
--
ALTER TABLE `cropdetails`
  MODIFY `cro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cropsale`
--
ALTER TABLE `cropsale`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transportbid`
--
ALTER TABLE `transportbid`
  MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transportself`
--
ALTER TABLE `transportself`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
