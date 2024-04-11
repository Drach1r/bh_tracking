-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 09:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bh_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bh_address`
--

CREATE TABLE `bh_address` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `barangay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bh_address`
--

INSERT INTO `bh_address` (`id`, `district_id`, `barangay`) VALUES
(1, 1, 'BONIFACIO (AREVALO)'),
(2, 1, 'CALAPARAN'),
(3, 1, 'DULONAN'),
(4, 1, 'MOHON'),
(5, 1, 'QUEZON'),
(6, 1, 'SAN JOSE (AREVALO)'),
(7, 1, 'SANTA CRUZ'),
(8, 1, 'SANTA FILOMENA'),
(9, 1, 'SANTO DOMINGO'),
(10, 1, 'SANTO NIﾑO NORTE'),
(11, 1, 'SANTO NIﾑO SUR'),
(12, 1, 'YULO DRIVE'),
(13, 2, 'ARSENAL ADUANA'),
(14, 2, 'BAYBAY TANZA'),
(15, 2, 'BONIFACIO TANZA'),
(16, 2, 'CONCEPCION-MONTES'),
(17, 2, 'DANAO'),
(18, 2, 'DELGADO-JALANDONI-BAGUMBAYAN'),
(19, 2, 'EDGANZON'),
(20, 2, 'FLORES'),
(21, 2, 'GENERAL HUGHES-MONTES'),
(22, 2, 'GLORIA'),
(23, 2, 'HIPODROMO'),
(24, 2, 'INDAY'),
(25, 2, 'JALANDONI-WILSON'),
(26, 2, 'KAHIRUPAN'),
(27, 2, 'KAUSWAGAN'),
(28, 2, 'LEGASPI DELA RAMA'),
(29, 2, 'LIBERATION'),
(30, 2, 'MABOLO-DELGADO'),
(31, 2, 'MAGSAYSAY'),
(32, 2, 'MALIPAYON-DELGADO'),
(33, 2, 'MARIA CLARA'),
(34, 2, 'MONICA BLUMENTRITT'),
(35, 2, 'MUELLE LONEY-MONTES'),
(36, 2, 'NONOY'),
(37, 2, 'ORTIZ'),
(38, 2, 'OSMEﾑA'),
(39, 2, 'PRESIDENT ROXAS'),
(40, 2, 'RIMA-RIZAL'),
(41, 2, 'RIZAL ESTANZUELA'),
(42, 2, 'RIZAL IBARRA'),
(43, 2, 'RIZAL PALAPALA I'),
(44, 2, 'RIZAL PALAPALA II'),
(45, 2, 'ROXAS VILLAGE'),
(46, 2, 'SAMPAGUITA'),
(47, 2, 'SAN AGUSTIN'),
(48, 2, 'SAN FELIX'),
(49, 2, 'SAN JOSE (CITY PROPER)'),
(50, 2, 'SANTO ROSARIO-DURAN'),
(51, 2, 'TANZA-ESPERANZA'),
(52, 2, 'TIMAWA TANZA I'),
(53, 2, 'TIMAWA TANZA II'),
(54, 2, 'VETERANS VILLAGE'),
(55, 2, 'VILLA ANITA'),
(56, 2, 'YULO-ARROYO'),
(57, 2, 'ZAMORA-MELLIZA'),
(58, 3, 'ARGUELLES'),
(59, 3, 'BALABAGO'),
(60, 3, 'BALANTANG'),
(61, 3, 'BENEDICTO (JARO)'),
(62, 3, 'BITO-ON'),
(63, 3, 'BUHANG'),
(64, 3, 'BUNTATALA'),
(65, 3, 'CALUBIHAN'),
(66, 3, 'CAMALIG'),
(67, 3, 'CUARTERO'),
(68, 3, 'CUBAY'),
(69, 3, 'DEMOCRACIA'),
(70, 3, 'DESAMPARADOS'),
(71, 3, 'DUNGON A'),
(72, 3, 'DUNGON B'),
(73, 3, 'EL 98 CASTILLA (CLAUDIO LOPEZ)'),
(74, 3, 'FAJARDO'),
(75, 3, 'JAVELLANA'),
(76, 3, 'LANIT'),
(77, 3, 'LIBERTAD, SANTA ISABEL'),
(78, 3, 'LOPEZ JAENA (JARO)'),
(79, 3, 'LUNA (JARO)'),
(80, 3, 'M. V. HECHANOVA'),
(81, 3, 'MARCELO H. DEL PILAR'),
(82, 3, 'MARIA CRISTINA'),
(83, 3, 'MONTINOLA'),
(84, 3, 'OUR LADY OF FATIMA'),
(85, 3, 'OUR LADY OF LOURDES'),
(86, 3, 'QUINTIN SALAS'),
(87, 3, 'SAMBAG'),
(88, 3, 'SAN ISIDRO (JARO)'),
(89, 3, 'SAN JOSE (JARO)'),
(90, 3, 'SAN PEDRO (JARO)'),
(91, 3, 'SAN ROQUE'),
(92, 3, 'SAN VICENTE'),
(93, 3, 'SEMINARIO (BURGOS JALANDONI)'),
(94, 3, 'SIMON LEDESMA'),
(95, 3, 'TABUC SUBA (JARO)'),
(96, 3, 'TACAS'),
(97, 3, 'TAGBAC'),
(98, 3, 'TAYTAY ZONE II'),
(99, 3, 'UNGKA'),
(100, 4, 'AGUINALDO'),
(101, 4, 'BALDOZA'),
(102, 4, 'BANTUD'),
(103, 4, 'BANUYAO'),
(104, 4, 'BURGOS-MABINI-PLAZA'),
(105, 4, 'CAINGIN'),
(106, 4, 'DIVINAGRACIA'),
(107, 4, 'GUSTILO'),
(108, 4, 'HINACTACAN'),
(109, 4, 'INGORE'),
(110, 4, 'JEREOS'),
(111, 4, 'LAGUDA'),
(112, 4, 'LOPEZ JAENA NORTE'),
(113, 4, 'LOPEZ JAENA SUR'),
(114, 4, 'LUNA (LA PAZ)'),
(115, 4, 'MACARTHUR'),
(116, 4, 'MAGDALO'),
(117, 4, 'MAGSAYSAY VILLAGE'),
(118, 4, 'NABITASAN'),
(119, 4, 'RAILWAY'),
(120, 4, 'RIZAL (LA PAZ)'),
(121, 4, 'SAN ISIDRO (LA PAZ)'),
(122, 4, 'SAN NICOLAS'),
(123, 4, 'TABUC SUBA (LA PAZ)'),
(124, 4, 'TICUD (LA PAZ)'),
(125, 5, 'ALALASAN LAPUZ'),
(126, 5, 'DON ESTEBAN-LAPUZ'),
(127, 5, 'JALANDONI ESTATE-LAPUZ'),
(128, 5, 'LAPUZ NORTE'),
(129, 5, 'LAPUZ SUR'),
(130, 5, 'LIBERTAD-LAPUZ'),
(131, 5, 'LOBOC-LAPUZ'),
(132, 5, 'MANSAYA-LAPUZ'),
(133, 5, 'OBRERO-LAPUZ'),
(134, 5, 'PROGRESO-LAPUZ'),
(135, 5, 'PUNONG-LAPUZ'),
(136, 5, 'SINIKWAY (BANGKEROHAN LAPUZ)'),
(137, 6, 'ABETO MIRASOL TAFT SOUTH (QUIRINO ABETO)'),
(138, 6, 'AIRPORT (TABUCAN AIRPORT)'),
(139, 6, 'BAKHAW'),
(140, 6, 'BOLILAO'),
(141, 6, 'BUHANG TAFT NORTH'),
(142, 6, 'CALAHUNAN'),
(143, 6, 'DUNGON'),
(144, 6, 'GUZMAN-JESENA'),
(145, 6, 'HIBAO-AN NORTE'),
(146, 6, 'HIBAO-AN SUR'),
(147, 6, 'NAVAIS'),
(148, 6, 'OﾑATE DE LEON'),
(149, 6, 'PALE BENEDICTO RIZAL (MANDURRIAO)'),
(150, 6, 'PHHC BLOCK 17'),
(151, 6, 'PHHC BLOCK 22 NHA'),
(152, 6, 'SAN RAFAEL'),
(153, 6, 'SANTA ROSA'),
(154, 6, 'SO-OC'),
(155, 6, 'TABUCAN'),
(156, 7, 'CALUMPANG'),
(157, 7, 'COCHERO'),
(158, 7, 'COMPANIA'),
(159, 7, 'EAST BALUARTE'),
(160, 7, 'EAST TIMAWA'),
(161, 7, 'HABOG-HABOG SALVACION'),
(162, 7, 'INFANTE'),
(163, 7, 'KASINGKASING'),
(164, 7, 'KATILINGBAN'),
(165, 7, 'MOLO BOULEVARD'),
(166, 7, 'NORTH AVANCEﾑA'),
(167, 7, 'NORTH BALUARTE'),
(168, 7, 'NORTH FUNDIDOR'),
(169, 7, 'NORTH SAN JOSE'),
(170, 7, 'POBLACION MOLO'),
(171, 7, 'SAN ANTONIO'),
(172, 7, 'SAN JUAN'),
(173, 7, 'SAN PEDRO (MOLO)'),
(174, 7, 'SOUTH BALUARTE'),
(175, 7, 'SOUTH FUNDIDOR'),
(176, 7, 'SOUTH SAN JOSE'),
(177, 7, 'TAAL'),
(178, 7, 'TAP-OC'),
(179, 7, 'WEST HABOG-HABOG'),
(180, 7, 'WEST TIMAWA');

-- --------------------------------------------------------

--
-- Table structure for table `bh_district`
--

CREATE TABLE `bh_district` (
  `id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bh_district`
--

INSERT INTO `bh_district` (`id`, `district_name`) VALUES
(1, 'AREVALO'),
(2, 'CITY PROPER'),
(3, 'JARO'),
(4, 'LAPAZ'),
(5, 'LAPUZ'),
(6, 'MANDURRIAO'),
(7, 'MOLO');

-- --------------------------------------------------------

--
-- Table structure for table `boarding_house_tracking`
--

CREATE TABLE `boarding_house_tracking` (
  `bh_start` datetime DEFAULT NULL,
  `bh_end` datetime DEFAULT NULL,
  `bh_today` date DEFAULT NULL,
  `bh_device_id` varchar(255) DEFAULT NULL,
  `bh_audit` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) NOT NULL,
  `establishment_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `bh_address` varchar(255) NOT NULL,
  `bh_municipality` varchar(255) NOT NULL,
  `bh_district` int(11) DEFAULT NULL,
  `bh_barangay` int(11) DEFAULT NULL,
  `bh_province` varchar(255) NOT NULL,
  `bh_control_no` varchar(255) NOT NULL,
  `bh_or_num` varchar(255) NOT NULL,
  `date_issued` varchar(255) NOT NULL,
  `amount_paid` float NOT NULL,
  `bh_bpn` varchar(255) NOT NULL,
  `bh_mp` varchar(255) NOT NULL,
  `date_paid` date NOT NULL,
  `bh_period_cover` varchar(255) NOT NULL,
  `bh_complaint` varchar(255) NOT NULL,
  `bh_construction_kind` varchar(255) NOT NULL,
  `bh_specify` varchar(255) DEFAULT NULL,
  `bh_class` varchar(255) NOT NULL,
  `bh_room` int(255) NOT NULL,
  `bh_occupants` int(255) NOT NULL,
  `bh_overcrowded` varchar(255) NOT NULL,
  `bh_rates_charge` varchar(255) NOT NULL,
  `bh_ratescharge_other` varchar(255) DEFAULT NULL,
  `bh_rate` int(255) NOT NULL,
  `bh_water_source` varchar(255) NOT NULL,
  `bh_nawasa` tinyint(1) NOT NULL DEFAULT 0,
  `bh_deepwell` tinyint(1) NOT NULL DEFAULT 0,
  `bh_adequate` varchar(255) NOT NULL,
  `bh_portable` varchar(255) NOT NULL,
  `bh_toilet_type` varchar(255) NOT NULL,
  `bh_toilet_cond` varchar(255) NOT NULL,
  `bh_bath_type` varchar(255) NOT NULL,
  `bh_bath_cond` varchar(255) NOT NULL,
  `bh_cr_num` int(255) NOT NULL,
  `bh_bathroom_num` int(255) NOT NULL,
  `bh_premises_cond` varchar(255) NOT NULL,
  `bh_garbage_disposal` varchar(255) NOT NULL,
  `bh_garbage_other` varchar(255) DEFAULT NULL,
  `bh_dps` int(255) DEFAULT NULL,
  `bh_sewage_disposal` varchar(255) NOT NULL,
  `bh_sewage_other` varchar(255) DEFAULT NULL,
  `bh_sd_dps` int(255) DEFAULT NULL,
  `bh_rodent_disposal` varchar(255) NOT NULL,
  `bh_rodent_other` varchar(255) DEFAULT NULL,
  `light_ventilation` varchar(255) NOT NULL,
  `natural_artificial` varchar(255) NOT NULL,
  `establishment_extension` varchar(255) NOT NULL,
  `specify_txt` varchar(255) DEFAULT NULL,
  `with_permit` varchar(255) NOT NULL,
  `bh_remarks` varchar(255) NOT NULL,
  `office_required` date DEFAULT NULL,
  `inspected_by` varchar(255) NOT NULL,
  `acknowledge_by` varchar(255) NOT NULL,
  `current_loc` varchar(255) NOT NULL,
  `bh_latitude` varchar(255) NOT NULL,
  `bh_longitude` varchar(255) NOT NULL,
  `bh_altitude` varchar(255) NOT NULL,
  `bh_precision` varchar(255) NOT NULL,
  `bh_image` varchar(255) DEFAULT NULL,
  `bh_permit_control` varchar(255) DEFAULT NULL,
  `bh_class_rates` varchar(255) DEFAULT NULL,
  `bh_facilities` varchar(255) DEFAULT NULL,
  `bh_id` int(255) DEFAULT NULL,
  `bh_uuid` varchar(255) DEFAULT NULL,
  `submission_time` datetime DEFAULT current_timestamp(),
  `bh_valid_status` varchar(255) DEFAULT NULL,
  `bh_notes` varchar(255) DEFAULT NULL,
  `bh_status` varchar(255) DEFAULT NULL,
  `submitted_by` varchar(255) DEFAULT NULL,
  `bh_version` varchar(255) DEFAULT NULL,
  `bh_tags` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `registration_date`) VALUES
(1, 'test', 'test', 'test@gmail.com', '$2y$10$xjhiUkdCnKBZVyNTv.178eZ.Su7wo87tIbp6ZA90XcSl6QjvPubJ2', '2024-03-14 03:01:09'),
(2, 'test2', 'test2', 'test2@gmail.com', '$2y$10$Z0wmTNLKqRXvqfI/t9nJs.0NO5GOP2JSCFU6rxz1h4DXPEaA1i7uC', '2024-03-14 03:02:18'),
(3, 'test', 'test', 'test@test.com', '$2y$10$g6qGlLvb0.DlWRPFc9PWbOlRu1jGRcWoscfVPKtcyN9yOIlBpNWsO', '2024-03-14 05:24:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bh_address`
--
ALTER TABLE `bh_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_district` (`district_id`);

--
-- Indexes for table `bh_district`
--
ALTER TABLE `bh_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boarding_house_tracking`
--
ALTER TABLE `boarding_house_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bh_district` (`bh_district`),
  ADD KEY `fk_barangay` (`bh_barangay`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bh_address`
--
ALTER TABLE `bh_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `boarding_house_tracking`
--
ALTER TABLE `boarding_house_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bh_address`
--
ALTER TABLE `bh_address`
  ADD CONSTRAINT `fk_address_district` FOREIGN KEY (`district_id`) REFERENCES `bh_district` (`id`);

--
-- Constraints for table `boarding_house_tracking`
--
ALTER TABLE `boarding_house_tracking`
  ADD CONSTRAINT `fk_barangay` FOREIGN KEY (`bh_barangay`) REFERENCES `bh_address` (`id`),
  ADD CONSTRAINT `fk_bh_district` FOREIGN KEY (`bh_district`) REFERENCES `bh_district` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
