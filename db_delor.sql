-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 10:36 AM
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
(170, 'delor', 'delor', 29, 15, 43, 'Franck kava', 5, 12, 82, 23, '01/03/2018', '2/3/2018', '04:15:12pm', 135),
(171, 'delor', 'delor', 29, 15, 46, 'Jagoda', 2, 11, 82, 23, '01/03/2018', '2/3/2018', '04:15:12pm', 135),
(172, 'delor', 'delor', 29, 15, 50, 'Schweps bitter lemon', 2, 10, 220, 110, '28/02/2018', '20/12/2018', '11:08:07pm', 133),
(173, 'delor', 'delor', 29, 15, 47, 'Jana voda bez poruke', 2, 100, 220, 110, '28/02/2018', '20/12/2018', '11:08:07pm', 133),
(174, 'delor', 'delor', 29, 15, 43, 'Franck kava', 5, 1, 5, 1, '28/02/2018', '29/02/2018', '08:40:00pm', 128),
(175, 'delor', 'delor', 29, 15, 51, 'qeq', 3113, 1, 34426, 2, '01/03/2018', '12112212', '04:35:52pm', 138),
(176, 'delor', 'delor', 29, 15, 56, 'eeee', 31313, 1, 34426, 2, '01/03/2018', '12112212', '04:35:52pm', 138),
(177, 'asas', 'delor', 30, 15, 43, 'Franck kava', 5, 11, 77, 22, '01/03/2018', '12121', '04:34:50pm', 136),
(178, 'asas', 'delor', 30, 15, 47, 'Jana voda bez poruke', 2, 11, 77, 22, '01/03/2018', '12121', '04:34:50pm', 136),
(179, 'asas', 'wafawf', 30, 24, 43, 'Franck kava', 5, 1, 7, 2, '01/03/2018', '12121', '04:35:30pm', 137),
(180, 'asas', 'wafawf', 30, 24, 47, 'Jana voda bez poruke', 2, 1, 7, 2, '01/03/2018', '12121', '04:35:30pm', 137),
(181, 'asas', 'wafawf', 30, 24, 43, 'Franck kava', 5, 1, 7, 2, '01/03/2018', '232323', '04:35:30pm', 137),
(182, 'asas', 'wafawf', 30, 24, 47, 'Jana voda bez poruke', 2, 1, 7, 2, '01/03/2018', '232323', '04:35:30pm', 137),
(183, 'delor', 'delor', 29, 15, 43, 'Franck kava', 5, 12, 82, 23, '01/03/2018', '21212221', '04:15:12pm', 135),
(184, 'delor', 'delor', 29, 15, 46, 'Jagoda', 2, 11, 82, 23, '01/03/2018', '21212221', '04:15:12pm', 135),
(185, 'delor', 'delor', 29, 15, 47, 'Jana voda bez poruke', 2, 1, 22, 11, '02/03/2018', '89889877', '01:19:10am', 139),
(186, 'delor', 'delor', 29, 15, 50, 'Schweps bitter lemon', 2, 10, 22, 11, '02/03/2018', '89889877', '01:19:10am', 139);

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
(43, 'Franck kava', 1, '5', 10, NULL, 'Topli napitci', 15, NULL),
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
(72, 'Franck kava', 231, '232', 232, NULL, 'Topli napitci', 24, NULL);

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

--
-- Dumping data for table `detalji_narudzbe`
--

INSERT INTO `detalji_narudzbe` (`id_dn`, `id_narudzbe`, `id_artikla`, `kolicina_artikala`, `id`, `cijena`, `naziv`) VALUES
(16, 127, 43, 1, NULL, NULL, NULL),
(17, 127, 46, 1, NULL, NULL, NULL),
(18, 127, 47, 1, NULL, NULL, NULL),
(19, 127, 48, 1, NULL, NULL, NULL),
(20, 127, 48, 10, NULL, NULL, NULL),
(21, 128, 43, 1, NULL, NULL, NULL),
(31, 133, 50, 10, NULL, NULL, NULL),
(32, 133, 47, 100, NULL, NULL, NULL),
(33, 134, 43, 10, NULL, NULL, NULL),
(34, 134, 49, 10, NULL, NULL, NULL),
(35, 134, 50, 5, NULL, NULL, NULL),
(36, 135, 43, 12, NULL, NULL, NULL),
(37, 135, 46, 11, NULL, NULL, NULL),
(38, 136, 43, 11, NULL, NULL, NULL),
(39, 136, 47, 11, NULL, NULL, NULL),
(40, 137, 43, 1, NULL, NULL, NULL),
(41, 137, 47, 1, NULL, NULL, NULL),
(42, 138, 51, 1, NULL, NULL, NULL),
(43, 138, 56, 1, NULL, NULL, NULL),
(44, 139, 47, 1, NULL, NULL, NULL),
(45, 139, 50, 10, NULL, NULL, NULL);

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
  `broj_telefona` varchar(13) DEFAULT NULL,
  `faks` int(13) DEFAULT NULL,
  `tip` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `korisnicko_ime`, `email`, `lozinka`, `ime_firme`, `ime`, `prezime`, `adresa`, `grad`, `drzava`, `postanski_broj`, `broj_telefona`, `faks`, `tip`) VALUES
(15, 'lekyluu', 'jvlkvhlxkh', '$2y$10$wUkZHu3AVarpGuINF8QHq.hEokQiWpe3QB70iu4wDOQH4Pwy90/fC', 'delor', 'sdvv', 'luu', 'aihldhgila', 'sfioiof', 'lkfshfliahd', 1331, '13313', 1531385, 'prodavac'),
(24, 'mat', 'wrrrwr', '$2y$10$t8clQaeQ4kh77xUCpbNIYe5ZeMfDb.WV6oxlqllTV.R0tQGKKEeUG', 'wafawf', 'rwr', 'wrwrw', '22242', '2442', '2424', 24242, '1212', 2424, 'prodavac'),
(29, 'lekyluuk', 'leo', '$2y$10$t0D.qrziH0AUrRBj/05E0.D8kG/CC0paFbpYeAKG0Llq/o6dQ7ToO', 'delor', 'leo', 'primorac', '1 ulica', 'mosatr', 'BIH', 88000, '313131', 3131, 'kupac'),
(30, 'valen', 'ccc', '$2y$10$kHqJ8LfbiWR1aqxtRif8yent2E9IgSoJ/3oTg0BnvIv5UIg6GSf0C', 'asas', 'valen', 'radic', 'qwqw', 'dssa', 'dad', 12121, '31313', 1212, 'kupac'),
(31, 'lll', 'll@gmail.com', '$2y$10$.ifMk2T4pzac0zzpSG30ROd9PsPOBjN21VA24WY7EckqfgHXnSxnK', NULL, 'll', 'll', NULL, NULL, NULL, NULL, '255', NULL, 'kupac'),
(32, 'llll', 'll@gmail.com', '$2y$10$/NGG0/t8rnDSa5C.2WpyCeJS5gFyt6RbMbxwEcKcPWy6GuQP0WG4u', NULL, 'lll', 'll', NULL, NULL, NULL, NULL, '255', NULL, 'kupac');

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
(127, 31, 14, '28/02/2018', '03:54:39pm', '21/8/2019', 'prodano', 29, 15),
(128, 5, 1, '28/02/2018', '08:40:00pm', '29/02/2018', 'prodano', 29, 15),
(133, 220, 110, '28/02/2018', '11:08:07pm', '20/12/2018', 'prodano', 29, 15),
(134, 80, 25, '28/02/2018', '11:37:07pm', '29/2/2018', 'prodano', 29, 15),
(135, 82, 23, '01/03/2018', '04:15:12pm', '21212221', 'prodano', 29, 15),
(136, 77, 22, '01/03/2018', '04:34:50pm', '12121', 'prodano', 30, 15),
(137, 7, 2, '01/03/2018', '04:35:30pm', '232323', 'prodano', 30, 24),
(138, 34426, 2, '01/03/2018', '04:35:52pm', '12112212', 'prodano', 29, 15),
(139, 22, 11, '02/03/2018', '01:19:10am', '89889877', 'prodano', 29, 15);

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
  MODIFY `id_arhiv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `artikal`
--
ALTER TABLE `artikal`
  MODIFY `id_artikla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `detalji_narudzbe`
--
ALTER TABLE `detalji_narudzbe`
  MODIFY `id_dn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id_kategorije` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `narudzba`
--
ALTER TABLE `narudzba`
  MODIFY `id_narudzbe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

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
