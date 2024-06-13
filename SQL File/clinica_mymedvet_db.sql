-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 09:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinica_mymedvet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updateDate`) VALUES
(1, 'admin', 'Admin*123', '06-06-2024 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `vetdocSpecialization` varchar(255) DEFAULT NULL,
  `vetdocId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `vetdocStatus` int(11) DEFAULT NULL,
  `updateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `vetdocSpecialization`, `vetdocId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `vetdocStatus`, `updateDate`) VALUES
(4, 'Ortopedie, Chirurgie și Medicină Internă', 1, 5, 50, '2024-06-14', '12:30 PM', '2024-06-12 21:19:11', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `Breathe` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdateDate` timestamp NULL DEFAULT current_timestamp(),
  `OpeningTime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdateDate`, `OpeningTime`) VALUES
(1, 'aboutus', 'Despre Noi', '<ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.313em; margin-left: 1.655em;\" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" center;=\"\" background-color:=\"\" rgb(255,=\"\" 246,=\"\" 246);\"=\"\"><li style=\"text-align: left;\"><font color=\"#000000\"><strong>Scopul</strong> nostru este să prevenim apariția problemelor de sănătate ale animalelor de companie, însă dacă acestea au apărut deja, să le ajutăm să treacă peste acestea cât mai sigur și confortabil posibil.<br></font></li><li style=\"text-align: left;\"><font color=\"#000000\"><br><strong>Suntem pregătiți</strong> să îngrijim, să prevenim și să tratăm o mulțime de probleme la diferite specii, de la câini și pisici, la reptile, broaște țestoase, hamsteri sau alte pufoșenii.<br></font></li><li style=\"text-align: left;\"><font color=\"#000000\"><br><strong>\r\nViziunea </strong> noastră constă în crearea unui ambient plăcut atât pentru animale cât și pentru oameni.\r\n<br></font></li><li style=\"text-align: left;\"><font color=\"#000000\"><br>\r\n<strong>Valorile </strong> nostre care stau la baza activităților noastre zilnice sunt:\r\n<br>\r\n*Atenție<br>\r\n*Profesionalism<br>\r\n*Grijă pentru animale<p></p>&nbsp;</font></li></ul>', NULL, NULL, '2024-06-05 07:21:52', NULL),
(2, 'contactus', 'Detalii Contact', 'Adresa: Str. Magheran nr. 17,\r\n<br>Arad 310241 Romania', 'info.mymedvet@gmail.com', 771222333, '2024-06-05 07:24:07', '<br>\r\n07:00 la 20:00 (Luni-Vineri) \r\n<br>\r\n08:00 la 14:00 (Sambata) \r\n<br>\r\nUrgente - sunat inainte (Duminica)');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `VetDocid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientRECS` bigint(15) DEFAULT NULL,
  `PatientOwnerName` varchar(45) DEFAULT NULL,
  `PatientOwnerCNP` bigint(13) DEFAULT NULL,
  `PatientOwnerPhoneNumber` varchar(15) DEFAULT NULL,
  `PatientOwnerEmail` varchar(200) DEFAULT NULL,
  `PatientSpecies` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAddress` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreateDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(4, 4, 'gruia.marin@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-11 17:10:18', '11-06-2024 08:17:59 PM', 1),
(5, 5, 'maria.irimia@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-12 19:41:55', '13-06-2024 12:03:47 AM', 1),
(6, 5, 'maria.irimia@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-12 21:08:19', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updateDate`) VALUES
(4, 'Gruia Marian', 'Str. Paris Nr. 5', 'Arad', 'male', 'gruia.marin@gmail.com', 'f082ac9ea6e6781af1b4c9fd7dfa2189', '2024-06-11 17:10:00', NULL),
(5, 'Maria Irimia', 'Str. Maslinului nr.4', 'Arad', 'female', 'maria.irimia@gmail.com', '488c553ff5e963e7452adc0fa51e49ad', '2024-06-12 19:41:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vetdoc`
--

CREATE TABLE `vetdoc` (
  `id` int(11) NOT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `vetdocName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `vetdocFees` varchar(255) DEFAULT NULL,
  `phoneNumber` bigint(12) DEFAULT NULL,
  `vetdocEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `createDate` timestamp NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vetdoc`
--

INSERT INTO `vetdoc` (`id`, `specialization`, `vetdocName`, `address`, `vetdocFees`, `phoneNumber`, `vetdocEmail`, `password`, `createDate`, `updateDate`) VALUES
(1, 'Ortopedie, Chirurgie și Medicină Internă', 'Dr. Vet. Abrudan Sergiu', 'Str. Magheran nr. 17, Arad 310241 Romania', '50', 741555333, 'abrudan.mymedvet@gmail.com', 'ec0736457cdff0181b65fcbb9e166058', '2024-06-11 17:47:19', '2024-06-12 20:46:09'),
(9, 'Oncologie, Chirurgie și Medicină Internă', 'Dr.Vet. Miriam Ferencz', 'Str. Magheran nr.17, Arad, Romania', '50', 7745220441, 'miriam.mymedvet@gmail.com', 'db2321cd5bc124b6145c902277efdd32', '2024-06-12 21:08:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vetdoclog`
--

CREATE TABLE `vetdoclog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vetdocspecialization`
--

CREATE TABLE `vetdocspecialization` (
  `id` int(11) NOT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `createDate` timestamp NULL DEFAULT current_timestamp(),
  `updateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vetdocspecialization`
--

INSERT INTO `vetdocspecialization` (`id`, `specialization`, `createDate`, `updateDate`) VALUES
(1, 'Ortopedie, Chirurgie și Medicină Internă', '2024-06-06 18:09:16', '2024-06-11 17:50:49'),
(2, 'Oncologie, Chirurgie și Medicină Internă', '2024-06-06 18:10:46', '2024-06-11 17:51:48'),
(3, 'Stomatologie, Estetică și Dermatologie', '2024-06-06 18:11:05', '2024-06-11 17:52:53'),
(4, 'Animale Exotice, Medicină Internă și Anestezie', '2024-06-06 18:12:14', '2024-06-11 17:53:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `vetdoc`
--
ALTER TABLE `vetdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vetdoclog`
--
ALTER TABLE `vetdoclog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vetdocspecialization`
--
ALTER TABLE `vetdocspecialization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vetdoc`
--
ALTER TABLE `vetdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vetdoclog`
--
ALTER TABLE `vetdoclog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vetdocspecialization`
--
ALTER TABLE `vetdocspecialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
