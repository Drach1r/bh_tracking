-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 04:44 AM
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
-- Table structure for table `boarding_house_tracking`
--

CREATE TABLE `boarding_house_tracking` (
  `id` int(11) NOT NULL,
  `bh_start` datetime NOT NULL,
  `bh_end` datetime NOT NULL,
  `bh_today` date NOT NULL,
  `bh_device_id` varchar(255) NOT NULL,
  `bh_audit` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `establishment_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `bh_address` varchar(255) NOT NULL,
  `bh_municipality` varchar(255) NOT NULL,
  `bh_district` varchar(255) NOT NULL,
  `bh_barangay` varchar(255) NOT NULL,
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
  `bh_specify` varchar(255) NOT NULL,
  `bh_class` varchar(255) NOT NULL,
  `bh_room` int(255) NOT NULL,
  `bh_occupants` int(255) NOT NULL,
  `bh_overcrowded` varchar(255) NOT NULL,
  `bh_rates_charge` varchar(255) NOT NULL,
  `bh_rate` int(255) NOT NULL,
  `bh_water_source` varchar(255) NOT NULL,
  `bh_nawasa` int(255) NOT NULL,
  `bh_deepwell` int(255) NOT NULL,
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
  `bh_dps` int(255) NOT NULL,
  `bh_sewage_disposal` varchar(255) NOT NULL,
  `bh_sd_dps` int(255) NOT NULL,
  `bh_rodent_disposal` varchar(255) NOT NULL,
  `light_ventilation` varchar(255) NOT NULL,
  `natural_artificial` varchar(255) NOT NULL,
  `establishment_extension` varchar(255) NOT NULL,
  `specify_ext` varchar(255) NOT NULL,
  `with_permit` varchar(255) NOT NULL,
  `bh_remarks` varchar(255) NOT NULL,
  `office_required` varchar(255) NOT NULL,
  `inspected_by` varchar(255) NOT NULL,
  `acknowledge_by` varchar(255) NOT NULL,
  `current_loc` varchar(255) NOT NULL,
  `bh_latitude` varchar(255) NOT NULL,
  `bh_longitude` varchar(255) NOT NULL,
  `bh_altitude` varchar(255) NOT NULL,
  `bh_precision` varchar(255) NOT NULL,
  `bh_image` varchar(255) NOT NULL,
  `bh_permit_control` varchar(255) NOT NULL,
  `bh_class_rates` varchar(255) NOT NULL,
  `bh_facilities` varchar(255) NOT NULL,
  `bh_id` int(255) NOT NULL,
  `bh_uuid` varchar(255) NOT NULL,
  `submission_time` datetime NOT NULL,
  `bh_valid_status` varchar(255) NOT NULL,
  `bh_notes` varchar(255) NOT NULL,
  `bh_status` varchar(255) NOT NULL,
  `submitted_by` varchar(255) NOT NULL,
  `bh_version` varchar(255) NOT NULL,
  `bh_tags` varchar(255) NOT NULL
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
(2, 'test2', 'test2', 'test2@gmail.com', '$2y$10$Z0wmTNLKqRXvqfI/t9nJs.0NO5GOP2JSCFU6rxz1h4DXPEaA1i7uC', '2024-03-14 03:02:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boarding_house_tracking`
--
ALTER TABLE `boarding_house_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boarding_house_tracking`
--
ALTER TABLE `boarding_house_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
