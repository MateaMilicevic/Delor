-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 05:06 PM
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
-- Table structure for table `arhiv`
--

CREATE TABLE `arhiv` (
  `id_arhiv` int(11) NOT NULL,
  `ime_firme_kupca` varchar(150) NOT NULL,
  `ime_firme_prodavaca` varchar(150) NOT NULL,
  `id_kupca` int(11) NOT NULL,
  `id_prodavaca` int(11) NOT NULL,
  `id_artikla` int(11) NOT NULL,
  `naziv` varchar(150) NOT NULL,
  `cijena` double NOT NULL,
  `kolicina_artikla` int(11) NOT NULL,
  `ukupna_cijena` double NOT NULL,
  `ukupna_kolicina` int(11) NOT NULL,
  `datum_narudzbe` varchar(150) NOT NULL,
  `datum_dostave` varchar(150) NOT NULL,
  `vrijeme` varchar(150) NOT NULL,
  `id_narudzbe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arhiv`
--

INSERT INTO `arhiv` (`id_arhiv`, `ime_firme_kupca`, `ime_firme_prodavaca`, `id_kupca`, `id_prodavaca`, `id_artikla`, `naziv`, `cijena`, `kolicina_artikla`, `ukupna_cijena`, `ukupna_kolicina`, `datum_narudzbe`, `datum_dostave`, `vrijeme`, `id_narudzbe`) VALUES
(187, 'Kupac1 caffe', 'delor', 33, 15, 43, 'Franck kava', 5, 1, 11, 4, '02/03/2018', '2.3.2018', '11:49:01am', 140),
(188, 'Kupac1 caffe', 'delor', 33, 15, 46, 'Jagoda', 2, 3, 11, 4, '02/03/2018', '2.3.2018', '11:49:01am', 140),
(189, 'Kupac1 caffe', 'Prodavac caffe ', 33, 15, 74, 'Jana', 0.5, 1, 0.5, 1, '02/03/2018', '2.3.2018', '03:06:04pm', 141);

-- --------------------------------------------------------

--
-- Table structure for table `artikal`
--

CREATE TABLE `artikal` (
  `id_artikla` int(11) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `neto_kolicina` int(20) NOT NULL,
  `cijena` varchar(250) NOT NULL,
  `slika` longblob,
  `tip` varchar(20) NOT NULL,
  `id_korisnik` int(11) DEFAULT NULL,
  `id_kategorije` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikal`
--

INSERT INTO `artikal` (`id_artikla`, `naziv`, `neto_kolicina`, `cijena`, `slika`, `tip`, `id_korisnik`, `id_kategorije`) VALUES
(75, 'Leda', 0, '0.40', NULL, 'Negazirana pica', 15, NULL),
(76, 'OÅ¾ujsko pivo', 1, '1.80', NULL, 'Alkoholna pica', 15, NULL),
(77, 'KarlovaÄko pivo', 1, '1.90', NULL, 'Alkoholna pica', 15, NULL),
(78, 'Kiseljak', 0, '0.80', NULL, 'Gazirana pica', 15, NULL),
(79, 'Coca-Cola', 0, '1', NULL, 'Gazirana pica', 15, NULL),
(80, 'ÄŒaj Menta', 1, '1', NULL, 'Topli napitci', 15, NULL),
(81, 'ÄŒaj Kamilica', 1, '1', NULL, 'Topli napitci', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detalji_narudzbe`
--

CREATE TABLE `detalji_narudzbe` (
  `id_dn` int(11) NOT NULL,
  `id_narudzbe` int(11) NOT NULL,
  `id_artikla` int(11) NOT NULL,
  `kolicina_artikala` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `cijena` double DEFAULT NULL,
  `naziv` varchar(150) DEFAULT NULL
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
  `id_korisnik` int(11) NOT NULL,
  `korisnicko_ime` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `ime_firme` varchar(30) DEFAULT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `adresa` varchar(50) DEFAULT NULL,
  `grad` varchar(30) DEFAULT NULL,
  `drzava` varchar(30) DEFAULT NULL,
  `postanski_broj` varchar(10) DEFAULT NULL,
  `broj_telefona` varchar(13) DEFAULT NULL,
  `faks` varchar(13) DEFAULT NULL,
  `tip` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `korisnicko_ime`, `email`, `lozinka`, `ime_firme`, `ime`, `prezime`, `adresa`, `grad`, `drzava`, `postanski_broj`, `broj_telefona`, `faks`, `tip`) VALUES
(15, 'Prodavac', 'drugi.korisnik@gmail.com', '$2y$10$wUkZHu3AVarpGuINF8QHq.hEokQiWpe3QB70iu4wDOQH4Pwy90/fC', 'Prodavac caffe ', 'Drugi', 'Korisnik', 'Balinovac 23A', 'Mostar', 'Bosna i Hercegovina', '88000', '063111222', '036222333', 'prodavac'),
(33, 'Kupac', 'prvi.korisnik@gmail.com', '$2y$10$9fhVEIr716Fs6UQnak80jOgrOJFx1t2IyRxOixzJdjdDRgP2Jet/q', 'Kupac1 caffe', 'Prvi ', 'Korisnik', 'Balinovac 21A', 'Mostar', 'Bosna i Hercegovina', '88000', '063111222', '036111222', 'kupac'),
(36, 'admin', 'admin@admin.com', '$2y$10$y/hm84OxLvA0LksNMWHDzuvO6NviYsst8okWgYPm.7dWBmAuonEla', 'Delor', 'Admin', 'Admin', 'Mostar', 'MOsatr', 'BiH', '88000', '63664705', '063664055', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE `narudzba` (
  `id_narudzbe` int(11) NOT NULL,
  `ukupna_cijena` double NOT NULL,
  `ukupna_kolicina` int(11) NOT NULL,
  `datum_narudzbe` varchar(15) NOT NULL,
  `vrijeme` varchar(150) NOT NULL,
  `datum_dostave` varchar(150) DEFAULT NULL,
  `stanje` varchar(15) NOT NULL,
  `id_kupca` int(11) NOT NULL,
  `id_prodavaca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `narudzba`
--

INSERT INTO `narudzba` (`id_narudzbe`, `ukupna_cijena`, `ukupna_kolicina`, `datum_narudzbe`, `vrijeme`, `datum_dostave`, `stanje`, `id_kupca`, `id_prodavaca`) VALUES
(140, 11, 4, '02/03/2018', '11:49:01am', '2.3.2018', 'prodano', 33, 15),
(141, 0.5, 1, '02/03/2018', '03:06:04pm', '2.3.2018', 'prodano', 33, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arhiv`
--
ALTER TABLE `arhiv`
  ADD PRIMARY KEY (`id_arhiv`);

--
-- Indexes for table `artikal`
--
ALTER TABLE `artikal`
  ADD PRIMARY KEY (`id_artikla`),
  ADD KEY `id_prodavac` (`id_korisnik`),
  ADD KEY `id_kategorije` (`id_kategorije`);

--
-- Indexes for table `detalji_narudzbe`
--
ALTER TABLE `detalji_narudzbe`
  ADD PRIMARY KEY (`id_dn`),
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
  ADD PRIMARY KEY (`id_korisnik`);

--
-- Indexes for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD PRIMARY KEY (`id_narudzbe`),
  ADD KEY `id_kupca` (`id_kupca`),
  ADD KEY `id_prodavaca` (`id_prodavaca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arhiv`
--
ALTER TABLE `arhiv`
  MODIFY `id_arhiv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `artikal`
--
ALTER TABLE `artikal`
  MODIFY `id_artikla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `detalji_narudzbe`
--
ALTER TABLE `detalji_narudzbe`
  MODIFY `id_dn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id_kategorije` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `narudzba`
--
ALTER TABLE `narudzba`
  MODIFY `id_narudzbe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikal`
--
ALTER TABLE `artikal`
  ADD CONSTRAINT `artikal_ibfk_2` FOREIGN KEY (`id_kategorije`) REFERENCES `kategorija` (`id_kategorije`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artikal_ibfk_3` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalji_narudzbe`
--
ALTER TABLE `detalji_narudzbe`
  ADD CONSTRAINT `detalji_narudzbe_ibfk_2` FOREIGN KEY (`id_narudzbe`) REFERENCES `narudzba` (`id_narudzbe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalji_narudzbe_ibfk_3` FOREIGN KEY (`id_artikla`) REFERENCES `artikal` (`id_artikla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD CONSTRAINT `narudzba_ibfk_1` FOREIGN KEY (`id_kupca`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `narudzba_ibfk_2` FOREIGN KEY (`id_prodavaca`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
