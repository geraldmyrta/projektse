

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibloteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `emri` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`, `emri`) VALUES
(1, 'epoka', 'admin', 'admin');
INSERT INTO `admin` (`ID`, `username`, `password`, `emri`) VALUES
(1, 'oksana', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `huazo`
--

CREATE TABLE `huazo` (
  `id_libri` int(11) NOT NULL,
  `id_perdoruesi` int(11) NOT NULL,
  `statusi` enum('r','m','k') DEFAULT NULL,
  `data_aktuale` date DEFAULT NULL,
  `data_kthimit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `emri` varchar(50) DEFAULT NULL,
  `kat_prind` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`id`, `emri`, `kat_prind`) VALUES
(1, 'Informatike', NULL),
(2, 'Kontabilitet', NULL),
(3, 'Marketing', NULL),
(4, 'Finance', NULL),
(5, 'Manaxhim', NULL),
(6, 'Marketing', NULL),
(7, 'Programim', 7),
(8, 'Siguri Rrjeti', 7),
(9, 'Administrim Publik', 11),
(10, 'Financ Publike', 10),
(11, 'Marketing Global', 12),
(12, 'programim', 7);

-- --------------------------------------------------------

--
-- Table structure for table `libri`
--

CREATE TABLE `libri` (
  `id` int(11) NOT NULL,
  `titulli` varchar(50) NOT NULL,
  `cmimi` int(11) NOT NULL,
  `botimi` int(11) DEFAULT NULL,
  `pershkrimi` text DEFAULT NULL,
  `sasia_inventar` int(11) NOT NULL,
  `sasia_aktuale` int(11) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `viti_publikimit` int(11) DEFAULT NULL,
  `autoret` varchar(255) NOT NULL,
  `kategoria` int(11) DEFAULT NULL,
  `shtepia_botuese` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesi`
--

CREATE TABLE `perdoruesi` (
  `emri` varchar(40) NOT NULL,
  `mbiemri` varchar(40) NOT NULL,
  `vendlindja` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nrtel` varchar(40) NOT NULL,
  `adresa_1` varchar(150) NOT NULL,
  `adresa_2` varchar(150) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passw` varchar(40) NOT NULL,
  `datelindja` date NOT NULL,
  `niveli` varchar(10) NOT NULL,
  `data_regjistrimit` date NOT NULL,
  `data_skadimit` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perdoruesi`
--

INSERT INTO `perdoruesi` (`emri`, `mbiemri`, `vendlindja`, `email`, `nrtel`, `adresa_1`, `adresa_2`, `username`, `passw`, `datelindja`, `niveli`, `data_regjistrimit`, `data_skadimit`, `id`) VALUES
('Oksana', 'Oksana', 'Tirane', 'oksana@yahoo.com', '0698369751', 'Rruga Elbasanit', 'Tregu Elektrik', 'Oksana', 'admin', '2000-04-04', 'admin', '2023-04-01', '2023-04-01', 19);

-- --------------------------------------------------------

--
-- Table structure for table `prenoto`
--

CREATE TABLE `prenoto` (
  `id_libri` int(11) DEFAULT NULL,
  `id_perdoruesi` int(11) DEFAULT NULL,
  `data_aktuale` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publikuesi`
--

CREATE TABLE `publikuesi` (
  `id` int(11) NOT NULL,
  `emri` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikuesi`
--

INSERT INTO `publikuesi` (`id`, `emri`) VALUES
(1, ''),
(2, 'Botimi i Ri'),
(3, 'Erus'),
(4, 'Katedra e Madhe'),
(5, 'Millenium'),
(6, 'Onufri'),
(7, 'Pearson'),
(8, 'PEGI'),
(9, 'Qyteti Ri'),
(10, 'RADIO'),
(11, 'Shtypshkronja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kat_prind` (`kat_prind`);

--
-- Indexes for table `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `kategoria` (`kategoria`),
  ADD KEY `shtepia_botuese` (`shtepia_botuese`);

--
-- Indexes for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `publikuesi`
--
ALTER TABLE `publikuesi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emri` (`emri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `libri`
--
ALTER TABLE `libri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `publikuesi`
--
ALTER TABLE `publikuesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoria`
--
ALTER TABLE `kategoria`
  ADD CONSTRAINT `kategoria_ibfk_1` FOREIGN KEY (`kat_prind`) REFERENCES `kategoria` (`id`);

--
-- Constraints for table `libri`
--
ALTER TABLE `libri`
  ADD CONSTRAINT `libri_ibfk_1` FOREIGN KEY (`kategoria`) REFERENCES `kategoria` (`id`),
  ADD CONSTRAINT `libri_ibfk_2` FOREIGN KEY (`shtepia_botuese`) REFERENCES `publikuesi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
