-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 01:29 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_delor`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikal`
--

CREATE TABLE `artikal` (
  `id_artikla` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `neto_kolicina` int(20) NOT NULL,
  `cijena` int(250) NOT NULL,
  `dostupnost` varchar(250) NOT NULL,
  `slika` longblob,
  `tip` varchar(20) NOT NULL,
  `id_prodavac` int(11) DEFAULT NULL,
  `id_kategorije` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikal`
--

INSERT INTO `artikal` (`id_artikla`, `naziv`, `neto_kolicina`, `cijena`, `dostupnost`, `slika`, `tip`, `id_prodavac`, `id_kategorije`) VALUES
(42, 'Coca cola zero', 1, 2, '100', NULL, 'Gazirana pica', NULL, NULL),
(43, 'Franck kava', 1, 5, '10', NULL, 'Topli napitci', NULL, NULL),
(44, 'Caj kamilica', 0, 2, '100', NULL, 'Topli napitci', NULL, NULL),
(45, 'Brusnica', 0, 2, '80', NULL, 'Negazirana pica', NULL, NULL),
(46, 'Jagoda', 0, 2, '100', NULL, 'Negazirana pica', NULL, NULL),
(47, 'Jana voda bez poruke', 1, 2, '10', NULL, 'Negazirana pica', NULL, NULL),
(48, 'Jana voda s porukom', 1, 2, '100', NULL, 'Negazirana pica', NULL, NULL),
(49, 'Caj indijski', 2, 2, '100', NULL, 'Topli napitci', NULL, NULL),
(50, 'Schweps bitter lemon', 1, 2, '100', NULL, 'Gazirana pica', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detalji_narudzbe`
--

CREATE TABLE `detalji_narudzbe` (
  `id_narudzbe` int(11) NOT NULL,
  `id_artikla` int(11) NOT NULL,
  `cijena` decimal(10,0) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id_kategorije` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `slika` blob NOT NULL,
  `opis` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_kupca` int(11) NOT NULL,
  `korisnicko_ime` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `ime_firme` varchar(30) DEFAULT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `adresa` varchar(50) DEFAULT NULL,
  `grad` varchar(30) DEFAULT NULL,
  `drzava` varchar(30) DEFAULT NULL,
  `postanski_broj` int(10) DEFAULT NULL,
  `broj_telefona` int(13) DEFAULT NULL,
  `faks` int(13) DEFAULT NULL,
  `tip` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_kupca`, `korisnicko_ime`, `email`, `lozinka`, `ime_firme`, `ime`, `prezime`, `adresa`, `grad`, `drzava`, `postanski_broj`, `broj_telefona`, `faks`, `tip`) VALUES
(1, 'dwadwa', 'dwadaw', '$2y$10$/qFbBdUQX7UP41Wt2qJxz.wNjd5BamXF7O/36RnWA60eazQBQYwyO', 'sdffsafvsafvsvsavsa', 'dwadwa', 'wdwadad', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, NULL, 2147483647, ''),
(2, 'leo', 'dsdf', '$2y$10$Hb1D/TboAAbJHahyrY463.048aysqQ8J5EJKzPp65XH/ePrePIZy.', 'sdffsafvsafvsvsavsa', 'lsxv', 'xvx', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, NULL, 2147483647, ''),
(3, 'leoo', 'dsdf', '$2y$10$p5OpBtm/EjoVIdKuIhdfg.I2NKFx8p6P8JOODKdVxO2y4E0Piv9fW', 'sdffsafvsafvsvsavsa', 'lsxv', 'xvx', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, NULL, 2147483647, ''),
(4, 'leoodxf', 'dsdf', '$2y$10$fOoRTQbEL4WhMa2SK2Y2D.KMwh8zETOdTa2Bsha.oGkXhpmKy6BDW', 'sdffsafvsafvsvsavsa', 'lsxv', 'xvx', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, NULL, 2147483647, ''),
(5, 'leoodxfetw', 'dsdf', '$2y$10$KRO2Q0TaOFrgi6hg1XtBtegmZHRELiOcBUD4NefNlaX38DVlKRsna', 'sdffsafvsafvsvsavsa', 'lsxv', 'xvx', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, NULL, 2147483647, ''),
(6, 'val', 'sgsgsd', '$2y$10$jCTQRwrIbwM8bTwrpq5qAO.4vnGJCtT6Lmv00VpfLPU.xgzt2vZ5G', 'sdffsafvsafvsvsavsa', 'asfasf', 'sdgsdg', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, NULL, 2147483647, 'prodavac'),
(7, 'val2', 'sgsgsd', '$2y$10$QWuatGB7pcNEhKvhnszXLeKYytktnQ65OJhHxm4P2uQWSa38cV2eC', 'sdffsafvsafvsvsavsa', 'asfasf', 'sdgsdg', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, NULL, 2147483647, 'kupac'),
(8, 'val3', 'sfsf', '$2y$10$JAEkRlv/vWCrQNMNBvi1gO.Do2AQRh7DVXhW53mbIM9176XLV6bMy', 'sdffsafvsafvsvsavsa', 'vdf', 'fss', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, NULL, 2147483647, 'prodavac'),
(9, 'leo1', 'dfhd', '$2y$10$zTbgMAVFysR4j5mQiHhIx.SD8WcSOyf7djfX3AnoVafrrOootOThW', 'sdffsafvsafvsvsavsa', 'dgsdg', 'dfgdfg', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, NULL, 2147483647, 'kupac'),
(10, 'leo2', 'dfhd', '$2y$10$Q8FWQ94NI9UJge/mfnHeyOQOmiLU0PWD5X2qMoZK1.hHbjDNwJdze', 'sdffsafvsafvsvsavsa', 'dgsdg', 'dfgdfg', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, NULL, 2147483647, 'prodavac'),
(11, 'matic', 'fgdsf', '$2y$10$GAiLX5XKxfZNAM/ovcEGwOA.dQJYGMVhvU7AdkHMwxPWw5bShqdkK', 'Jump', 'matea', 'milicevic', 'hwodhopa', 'soojfÄsj', 'hdfvlhs', 12121, 343, 21323, 'prodavac'),
(12, 'qq', 'dgsd', '$2y$10$FI/rwRIHxn5zbE6t24eqSeuU1cl/cz1W9/YFrF4N/szOKrlcrQf3e', 'sdffsafvsafvsvsavsa', 'sfds', 'xcgx', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, 121, 2147483647, 'kupac'),
(13, 'loo', 'dsggf', '$2y$10$3Ye.O8CrcRv3v/biYqJTfuQnvpbv882j0ed542.00d2u5gXVl1XR6', 'sdffsafvsafvsvsavsa', 'edss', 'sdfsd', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, 2131, 2147483647, 'prodavac'),
(14, 'Korisnik1', 'afaf', '$2y$10$53JOIYswy.T.xSeZUuaZDOF5OwF8rDaCvma0n9Jdkvm2HRBBdSYoi', 'sdffsafvsafvsvsavsa', 'asasfasf', 'asfas', 'xvsvsvsv', 'dvsvsv', 'svfsfvs', 2147483647, 2133, 2147483647, 'prodavac'),
(15, 'lekyluu', 'jvlkvhlxkh', '$2y$10$wUkZHu3AVarpGuINF8QHq.hEokQiWpe3QB70iu4wDOQH4Pwy90/fC', 'delor', 'leky', 'luu', 'aihldhgila', 'sfioiof', 'lkfshfliahd', 1331, 13313, 1531385, 'prodavac');

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE `narudzba` (
  `id_narudzbe` int(11) NOT NULL,
  `broj_narudzbe` int(11) NOT NULL,
  `datum_narudzbe` date NOT NULL,
  `datum_dostave` date NOT NULL,
  `id_kupca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikal`
--
ALTER TABLE `artikal`
  ADD PRIMARY KEY (`id_artikla`),
  ADD KEY `id_prodavac` (`id_prodavac`),
  ADD KEY `id_kategorije` (`id_kategorije`);

--
-- Indexes for table `detalji_narudzbe`
--
ALTER TABLE `detalji_narudzbe`
  ADD KEY `id_artikla` (`id_artikla`),
  ADD KEY `id_narudzbe` (`id_narudzbe`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id_kategorije`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_kupca`);

--
-- Indexes for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD PRIMARY KEY (`id_narudzbe`),
  ADD KEY `id_kupca` (`id_kupca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikal`
--
ALTER TABLE `artikal`
  MODIFY `id_artikla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id_kategorije` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_kupca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `narudzba`
--
ALTER TABLE `narudzba`
  MODIFY `id_narudzbe` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikal`
--
ALTER TABLE `artikal`
  ADD CONSTRAINT `artikal_ibfk_2` FOREIGN KEY (`id_kategorije`) REFERENCES `kategorija` (`id_kategorije`);

--
-- Constraints for table `detalji_narudzbe`
--
ALTER TABLE `detalji_narudzbe`
  ADD CONSTRAINT `detalji_narudzbe_ibfk_1` FOREIGN KEY (`id_artikla`) REFERENCES `artikal` (`id_artikla`),
  ADD CONSTRAINT `detalji_narudzbe_ibfk_2` FOREIGN KEY (`id_narudzbe`) REFERENCES `narudzba` (`id_narudzbe`);

--
-- Constraints for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD CONSTRAINT `narudzba_ibfk_1` FOREIGN KEY (`id_kupca`) REFERENCES `korisnik` (`id_kupca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
