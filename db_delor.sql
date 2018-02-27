-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 02:21 PM
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
  `cijena` varchar(250) NOT NULL,
  `dostupnost` int(250) NOT NULL,
  `slika` longblob,
  `tip` varchar(20) NOT NULL,
  `id_korisnik` int(11) DEFAULT NULL,
  `id_kategorije` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikal`
--

INSERT INTO `artikal` (`id_artikla`, `naziv`, `neto_kolicina`, `cijena`, `dostupnost`, `slika`, `tip`, `id_korisnik`, `id_kategorije`) VALUES
(0, 'sasas', 313, '13131', 1313, NULL, 'Topli napitci', 15, NULL),
(42, 'Coca cola zero', 1, '2', 100, NULL, 'Gazirana pica', 15, NULL),
(43, 'Franck kava', 1, '5', 10, NULL, 'Topli napitci', 15, NULL),
(44, 'Caj kamilica', 0, '2', 100, NULL, 'Topli napitci', 15, NULL),
(45, 'Brusnica', 0, '2', 80, NULL, 'Negazirana pica', 15, NULL),
(46, 'Jagoda', 0, '2', 100, NULL, 'Negazirana pica', 15, NULL),
(47, 'Jana voda bez poruke', 1, '2', 10, NULL, 'Negazirana pica', 15, NULL),
(48, 'Jana voda s porukom', 1, '2', 100, NULL, 'Negazirana pica', 15, NULL),
(49, 'Caj indijski', 2, '2', 100, NULL, 'Topli napitci', 15, NULL),
(50, 'Schweps bitter lemon', 1, '2', 100, NULL, 'Gazirana pica', 15, NULL),
(51, 'qeq', 2323, '3113', 1313, NULL, 'Alkoholna pica', 15, NULL),
(52, 'bla', 123, '12', 12, NULL, 'Topli napitci', 15, NULL),
(53, 'sds', 313, '1313', 1212, NULL, 'Topli napitci', 15, NULL),
(54, 'leo', 12, '12', 12, NULL, 'Topli napitci', 15, NULL),
(55, 'lll', 4424, '2424', 42422, NULL, 'Topli napitci', 15, NULL),
(56, 'eeee', 1231, '31313', 1313, NULL, 'Topli napitci', 15, NULL),
(60, 'wrw', 24234, '24242', 2442, NULL, 'Topli napitci', 15, NULL),
(61, 'yxf', 3434, '24242', 24242, NULL, 'Topli napitci', 15, NULL),
(62, 'weew', 232332, '2323', 2323232, NULL, 'Topli napitci', 15, NULL),
(66, 'Schweps bitter lemon', 2112, '121', 3232, NULL, 'Gazirana pica', 24, NULL),
(70, 'ewe', 2332, '232', 2323, NULL, 'Topli napitci', 24, NULL),
(71, 'sees', 131, '3113', 1313, NULL, 'Topli napitci', 24, NULL),
(72, 'Franck kava', 231, '232', 232, NULL, 'Topli napitci', 24, NULL),
(73, 'luka', 1, '12', 12, NULL, 'Alkoholna pica', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detalji_narudzbe`
--

CREATE TABLE `detalji_narudzbe` (
  `id_dn` int(11) NOT NULL,
  `id_narudzbe` int(11) NOT NULL,
  `id_artikla` int(11) NOT NULL,
  `kolicina_artikala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalji_narudzbe`
--

INSERT INTO `detalji_narudzbe` (`id_dn`, `id_narudzbe`, `id_artikla`, `kolicina_artikala`) VALUES
(11, 98, 66, 1),
(12, 98, 70, 2),
(13, 99, 66, 3),
(14, 99, 42, 4),
(15, 99, 43, 5),
(48, 122, 42, 122),
(49, 122, 0, 10),
(50, 123, 45, 1),
(51, 123, 73, 1),
(52, 124, 45, 1),
(53, 125, 0, 1),
(54, 126, 42, 1);

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
  `postanski_broj` int(10) DEFAULT NULL,
  `broj_telefona` int(13) DEFAULT NULL,
  `faks` int(13) DEFAULT NULL,
  `tip` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `korisnicko_ime`, `email`, `lozinka`, `ime_firme`, `ime`, `prezime`, `adresa`, `grad`, `drzava`, `postanski_broj`, `broj_telefona`, `faks`, `tip`) VALUES
(15, 'lekyluu', 'jvlkvhlxkh', '$2y$10$wUkZHu3AVarpGuINF8QHq.hEokQiWpe3QB70iu4wDOQH4Pwy90/fC', 'delor', 'leky', 'luu', 'aihldhgila', 'sfioiof', 'lkfshfliahd', 1331, 13313, 1531385, 'prodavac'),
(24, 'mat', 'wrrrwr', '$2y$10$t8clQaeQ4kh77xUCpbNIYe5ZeMfDb.WV6oxlqllTV.R0tQGKKEeUG', 'wafawf', 'rwr', 'wrwrw', '22242', '2442', '2424', 24242, 1212, 2424, 'prodavac'),
(29, 'lekyluuk', 'leo', '$2y$10$t0D.qrziH0AUrRBj/05E0.D8kG/CC0paFbpYeAKG0Llq/o6dQ7ToO', 'delor', 'leo', 'primorac', '1 ulica', 'mosatr', 'BIH', 88000, 313131, 3131, 'kupac'),
(30, 'valen', 'ccc', '$2y$10$kHqJ8LfbiWR1aqxtRif8yent2E9IgSoJ/3oTg0BnvIv5UIg6GSf0C', 'asas', 'valen', 'radic', 'qwqw', 'dssa', 'dad', 12121, 31313, 1212, 'kupac');

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
  `datum_dostave` varchar(15) DEFAULT NULL,
  `stanje` varchar(15) NOT NULL,
  `id_kupca` int(11) NOT NULL,
  `id_prodavaca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `narudzba`
--

INSERT INTO `narudzba` (`id_narudzbe`, `ukupna_cijena`, `ukupna_kolicina`, `datum_narudzbe`, `vrijeme`, `datum_dostave`, `stanje`, `id_kupca`, `id_prodavaca`) VALUES
(98, 353, 2, '25/02/2018', '01:48:20pm', NULL, 'zaprimljeno', 29, 24),
(99, 128, 3, '25/02/2018', '01:49:41pm', NULL, 'prodano', 29, 15),
(122, 131554, 132, '26/02/2018', '12:45:31pm', NULL, 'zaprimljeno', 29, 15),
(123, 14, 2, '26/02/2018', '02:33:58pm', NULL, 'potvrdjeno', 29, 15),
(124, 2, 1, '26/02/2018', '02:36:34pm', NULL, 'potvrdjeno', 29, 15),
(125, 13131, 1, '27/02/2018', '02:08:07pm', NULL, 'zaprimljeno', 29, 15),
(126, 2, 1, '27/02/2018', '02:10:37pm', NULL, 'zaprimljeno', 29, 15);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `artikal`
--
ALTER TABLE `artikal`
  MODIFY `id_artikla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `detalji_narudzbe`
--
ALTER TABLE `detalji_narudzbe`
  MODIFY `id_dn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id_kategorije` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `narudzba`
--
ALTER TABLE `narudzba`
  MODIFY `id_narudzbe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikal`
--
ALTER TABLE `artikal`
  ADD CONSTRAINT `artikal_ibfk_2` FOREIGN KEY (`id_kategorije`) REFERENCES `kategorija` (`id_kategorije`),
  ADD CONSTRAINT `artikal_ibfk_3` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE SET NULL ON UPDATE CASCADE;

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
  ADD CONSTRAINT `narudzba_ibfk_1` FOREIGN KEY (`id_kupca`) REFERENCES `korisnik` (`id_korisnik`),
  ADD CONSTRAINT `narudzba_ibfk_2` FOREIGN KEY (`id_prodavaca`) REFERENCES `korisnik` (`id_korisnik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
