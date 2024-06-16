-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 10:29 PM
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
(1, 'admin', 'Admin*123', '16-06-2024 06:12:49 PM');

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
(6, 'Ortopedie, Chirurgie și Medicină Internă', 1, 2, 50, '2024-06-17', '9:00 AM', '2024-06-16 15:58:39', 1, 1, NULL);

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

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `phoneNumber`, `message`, `PostingDate`, `AdminRemark`, `LastupdateDate`, `IsRead`) VALUES
(3, 'Marinescu Rebeca', 'rebeca.marinescu@gmail.com', 7714888999, 'Buna ziua,\r\ncainele meu s-a ranit la laba piciorului stang si nu mai poate calca norma. Nu stiu ce sa fac! Sunt plecata din localitate, va rog sa ma contactati pe mobil! Multumesc!', '2024-06-13 12:56:57', 'citit, va fii sunat', '2024-06-13 13:00:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `Pulse` varchar(200) DEFAULT NULL,
  `Breathe` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `Pulse`, `Breathe`, `Weight`, `Temperature`, `MedicalPres`, `CreateDate`) VALUES
(1, 1, '75', '25', '45', '38', 'stare normala', '2024-06-17 06:11:18');

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
  `PatientAge` varchar(100) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreateDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `VetDocid`, `PatientName`, `PatientRECS`, `PatientOwnerName`, `PatientOwnerCNP`, `PatientOwnerPhoneNumber`, `PatientOwnerEmail`, `PatientSpecies`, `PatientGender`, `PatientAddress`, `PatientAge`, `PatientMedhis`, `CreateDate`, `UpdateDate`) VALUES
(1, 1, 'Lucky', 625040058529459, 'Vladimir Ioan', 190814020093, '07714255344', 'ioan.vladimir@gmail.com', 'canin ciobanesc german', 'mascul', 'Str. Stefan Cel Mare nr.3, Arad', '2 ani', 'sanatos', '2024-06-16 15:48:09', NULL),
(4, 14, 'Happy', 6650400585272, 'Marinescu Ioana', 290121020045, '774152035', 'ioana.marinescu@gmail.com', 'canin, bishon maltez', 'female', 'Str. Caransebes nr.9, Arad', '8 luni', 'sanatoasa', '2024-06-16 16:23:13', NULL);

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
(1, 1, 'ioana.marinescu@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-16 14:25:41', '16-06-2024 05:32:07 PM', 1),
(19, 2, 'ioan.vladimir@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-16 15:57:28', NULL, 1);

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
(1, 'Marinescu Ioana', 'Str. Caransebes nr. 9', 'Arad', 'feminin', 'ioana.marinescu@gmail.com', '819f7cca8ad8a65fcdbcc85e5f3e053e48da5ce030c19910872c0817f8e03867', '2024-06-16 14:19:33', NULL),
(2, 'Vladimir Ioan', 'Str. Stefan Cel Mare nr. 3', 'Arad', 'masculin', 'ioan.vladimir@gmail.com', '70aed02327eed81fd0e57e2cb29269dce740c039eb9b759404f8ad49df1c6e41', '2024-06-16 15:46:33', NULL);

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
(1, 'Ortopedie, Chirurgie și Medicină Internă', 'Gruia Mihai', 'Str. Magherean nr.17, Arad, 310241, Romania', '50', 7741255780, 'gruia.mymedvet@gmail.com', 'b84127ead41537aff575a49e375ab81de748a555b0b0c1eb15e21ad82e7adebb', '2024-06-16 15:30:26', '2024-06-16 15:51:18'),
(14, 'Oncologie, Chirurgie și Medicină Internă', 'Vent Mirabela', 'Str. Magherean nr.17, Arad, 310241 Romania', '60', 7741255781, 'vent.mymedvet@gmail.com', '9b3523231acd48f54e232948d8bc9c8fa93c9f00c3957761bd4f65f6767452ad', '2024-06-16 16:06:30', '2024-06-16 16:14:37');

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

--
-- Dumping data for table `vetdoclog`
--

INSERT INTO `vetdoclog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(13, NULL, 'gruia.mymedvet@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-16 15:30:53', NULL, 0),
(14, 13, 'gruia.mymedvet@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-16 15:37:48', NULL, 1),
(15, NULL, 'gruia.mymedvet@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-16 16:00:13', NULL, 0),
(16, 1, 'gruia.mymedvet@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-16 16:00:35', '16-06-2024 07:03:37 PM', 1),
(17, NULL, 'vent.mymedvet@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-16 16:06:51', NULL, 0),
(18, NULL, 'vent.mymedvet@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-16 16:12:31', NULL, 0),
(19, NULL, 'vent.mymedvet@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-16 16:13:58', NULL, 0),
(20, 14, 'vent.mymedvet@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-16 16:15:43', '16-06-2024 07:29:46 PM', 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VetDocid` (`VetDocid`),
  ADD KEY `PatientOwnerName` (`PatientOwnerName`),
  ADD KEY `PatientOwnerEmail` (`PatientOwnerEmail`),
  ADD KEY `PatientAddress` (`PatientAddress`(768));

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
  ADD KEY `email` (`email`),
  ADD KEY `fullName` (`fullName`),
  ADD KEY `address` (`address`(768));

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vetdoc`
--
ALTER TABLE `vetdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vetdoclog`
--
ALTER TABLE `vetdoclog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vetdocspecialization`
--
ALTER TABLE `vetdocspecialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
