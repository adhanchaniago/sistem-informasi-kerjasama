-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2019 at 03:56 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_kerjasama`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_company`
--

CREATE TABLE `tb_company` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_company`
--

INSERT INTO `tb_company` (`id`, `name`, `address`) VALUES
(1, 'a', '1'),
(4, 'b', '2'),
(5, 'aaaa', '1'),
(6, 'bdasdad', '2asdas'),
(7, 'aaa', '1'),
(8, 'WaroenASDASdg Spesial Sambal', 'Jl. Kaliurang KM. 4,5 Gg. Jinanti No. 19 Sinduadi, Sleman, Yogyakarta'),
(9, 'Waroeng Spesial Sambal', 'Jl. Kaliurang KM. 4,5 Gg. Jinanti No. 19 Sinduadi, Sleman, Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_coop`
--

CREATE TABLE `tb_coop` (
  `id` int(11) NOT NULL,
  `fk_company` int(11) NOT NULL,
  `coop_number` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `fk_coop_type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_coop`
--

INSERT INTO `tb_coop` (`id`, `fk_company`, `coop_number`, `description`, `start_date`, `end_date`, `status`, `fk_coop_type`, `created_by`, `created_date`) VALUES
(1, 8, '007/HPDS/BDSR/II/18     2531/PL2.4/HK/2018', 'Perjanjian tentang \"Bantuan dana sosial regular bagi mahasiswa\" di POLINEMA', '2018-02-21', '2022-02-21', 2, 3, 3, '2019-09-02 12:26:38'),
(2, 9, '007/HPDS/BDSR/II/18     2531/PL2.4/HK/2018', 'Perjanjian tentang \"Bantuan dana sosial regular bagi mahasiswa\" di POLINEMA', '2018-02-21', '2019-02-21', 2, 3, 3, '2019-09-02 12:26:38'),
(3, 9, '007/HPDS/BDSR/II/18     2531/PL2.4/HK/2018', 'Perjanjian tentang \"Bantuan dana sosial regular bagi mahasiswa\" di POLINEMA', '2018-02-21', '2019-02-21', 0, 3, 3, '2019-09-02 12:26:52'),
(4, 8, '007/HPDS/BDSR/II/18     2531/PL2.4/HK/2018', 'Perjanjian tentang \"Bantuan dana sosial regular bagi mahasiswa\" di POLINEMA', '2018-02-21', '2019-02-21', 0, 3, 3, '2019-09-02 12:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_coop_type`
--

CREATE TABLE `tb_coop_type` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_coop_type`
--

INSERT INTO `tb_coop_type` (`id`, `name`) VALUES
(3, 'SPK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `type` varchar(16) NOT NULL,
  `crud_user` tinyint(1) NOT NULL,
  `crud_coop_type` tinyint(1) NOT NULL,
  `crud_coop` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `type`, `crud_user`, `crud_coop_type`, `crud_coop`) VALUES
(1, 'admin', 1, 1, 1),
(3, 'pd4', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(64) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `address`, `phone`, `email`, `username`, `password`) VALUES
(3, 'Aldhan Biuzar Yahya', 'Jl Jend Hariyono no 161 Lumajang', '0811111111', 'aby@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(27, 'a', '2', '2', '2', '2', 'c81e728d9d4c2f636f067f89cc14862c'),
(28, 'a', '3', '3', '3', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(29, 'a', '4', '4', '4', '4', 'a87ff679a2f3e71d9181a67b7542122c'),
(30, 'aa', '5', '5', '5', '5', 'e4da3b7fbbce2345d7772b0674a318d5');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_coop`
-- (See below for the actual view)
--
CREATE TABLE `vw_coop` (
`id` int(11)
,`fk_company` int(11)
,`coop_number` varchar(64)
,`description` text
,`start_date` date
,`end_date` date
,`fk_coop_type` int(11)
,`created_by` int(11)
,`created_date` datetime
,`status` int(1)
,`remind_date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `_config`
--

CREATE TABLE `_config` (
  `id` int(11) NOT NULL,
  `key_name` varchar(32) NOT NULL,
  `value_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_config`
--

INSERT INTO `_config` (`id`, `key_name`, `value_name`) VALUES
(1, 'email_username', 'assetmanagementsai@gmail.com'),
(2, 'email_password', 'assetmanagementsai123'),
(3, 'email_subject', 'NEW EMAIL 2'),
(4, 'email_from_cc', 'si_kerjasama@polinema.ac.id'),
(5, 'email_from_text', 'Sistem Informasi Kerjasama'),
(6, 'email_protocol', 'smtp'),
(7, 'email_smtp_host', 'ssl://smtp.googlemail.com'),
(8, 'email_smtp_port', '465');

-- --------------------------------------------------------

--
-- Table structure for table `_user_ci`
--

CREATE TABLE `_user_ci` (
  `fk_user` int(11) NOT NULL,
  `ci_session_id` varchar(64) DEFAULT NULL,
  `ci_session_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_user_ci`
--

INSERT INTO `_user_ci` (`fk_user`, `ci_session_id`, `ci_session_ts`) VALUES
(3, 'b4cp18bslqng7pn0ls2klol22vpt5t1f', '2019-09-29 01:09:45'),
(27, NULL, '2019-09-14 13:02:56'),
(28, NULL, '2019-09-14 13:03:11'),
(29, NULL, '2019-09-29 00:57:30'),
(30, NULL, '2019-09-29 00:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `_user_role`
--

CREATE TABLE `_user_role` (
  `fk_user` int(11) NOT NULL,
  `fk_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_user_role`
--

INSERT INTO `_user_role` (`fk_user`, `fk_role`) VALUES
(3, 1),
(27, 3),
(29, 1),
(30, 3);

-- --------------------------------------------------------

--
-- Structure for view `vw_coop`
--
DROP TABLE IF EXISTS `vw_coop`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_coop`  AS  select `tb_coop`.`id` AS `id`,`tb_coop`.`fk_company` AS `fk_company`,`tb_coop`.`coop_number` AS `coop_number`,`tb_coop`.`description` AS `description`,`tb_coop`.`start_date` AS `start_date`,`tb_coop`.`end_date` AS `end_date`,`tb_coop`.`fk_coop_type` AS `fk_coop_type`,`tb_coop`.`created_by` AS `created_by`,`tb_coop`.`created_date` AS `created_date`,`tb_coop`.`status` AS `status`,(`tb_coop`.`end_date` - interval 6 month) AS `remind_date` from `tb_coop` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_coop`
--
ALTER TABLE `tb_coop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `tb_coop_type` (`fk_coop_type`),
  ADD KEY `fk_company` (`fk_company`);

--
-- Indexes for table `tb_coop_type`
--
ALTER TABLE `tb_coop_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `_config`
--
ALTER TABLE `_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key_name` (`key_name`);

--
-- Indexes for table `_user_ci`
--
ALTER TABLE `_user_ci`
  ADD KEY `fk_user` (`fk_user`);

--
-- Indexes for table `_user_role`
--
ALTER TABLE `_user_role`
  ADD KEY `fk_role` (`fk_role`),
  ADD KEY `fk_user` (`fk_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_company`
--
ALTER TABLE `tb_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_coop`
--
ALTER TABLE `tb_coop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_coop_type`
--
ALTER TABLE `tb_coop_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `_config`
--
ALTER TABLE `_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_coop`
--
ALTER TABLE `tb_coop`
  ADD CONSTRAINT `tb_coop_ibfk_1` FOREIGN KEY (`fk_company`) REFERENCES `tb_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_coop_ibfk_2` FOREIGN KEY (`fk_coop_type`) REFERENCES `tb_coop_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `_user_ci`
--
ALTER TABLE `_user_ci`
  ADD CONSTRAINT `_user_ci_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `_user_role`
--
ALTER TABLE `_user_role`
  ADD CONSTRAINT `_user_role_ibfk_1` FOREIGN KEY (`fk_role`) REFERENCES `tb_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `_user_role_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
