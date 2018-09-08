-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 04:42 PM
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
-- Database: `gurisa_geofriendly`
--

-- --------------------------------------------------------

--
-- Table structure for table `acquisition`
--

CREATE TABLE `acquisition` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acquisition`
--

INSERT INTO `acquisition` (`id`, `name`, `description`) VALUES
(1, 'Imbalan Jasa', ''),
(2, 'Hadiah/Sumbangan/Hibah', ''),
(3, 'Pinjaman', ''),
(4, 'Pertukaran', ''),
(5, 'Ekskavasi/Hasil Penggalian', ''),
(6, 'Sitaan', ''),
(99, '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE `age` (
  `id` int(10) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`id`, `name`, `description`) VALUES
(1, 'Eosen Tengah', ''),
(2, 'Late Pliocene', ''),
(3, 'Miosen', ''),
(4, 'Miosen - Pliosen', ''),
(5, 'Miosen Akhir (Ciodeng/Odengian)', 'Turritella angulata cramatensis'),
(6, 'Miosen Akhir - Pliosen Kuart', ''),
(7, 'Miosen Akhir - Pliosen', ''),
(8, 'Miosen Awal (Rembangian)', 'Turritella subulata'),
(9, 'Miosen Awal - Pliosen', ''),
(10, 'Miosen Tengah (Preangerian)', 'Turritella angulata angulata\r\nSiphoceypraea caputviperae\r\nVicarya vemeuilli callosa'),
(11, 'Miosen - Pliosen', ''),
(12, 'Pliosen', ''),
(13, 'Pliosen (Cheribonian)', ''),
(14, 'Pliosen - Kuarter', ''),
(15, 'Pliosen Akhir - Plistosen Awal', ''),
(16, 'Pliosen - Kuarter', ''),
(17, 'Pliosen - Plistosen', ''),
(18, 'Pliosen - Plistosen Awal', ''),
(19, 'Plistosen', ''),
(20, 'Plistosen Awal (Bantamian)', 'Turritella (angulata) bantamensis\r\nClavus Malingpingensis'),
(21, 'Preangeurian', ''),
(22, 'Tersier', ''),
(23, 'Neogen', ''),
(24, 'Pliosen - Resen', ''),
(25, 'Miosen - Pliosen - Resen', ''),
(26, 'Resen', ''),
(27, 'Pliosen Akhir', ''),
(28, 'Pliosen Atas - Pliosen Bawah', ''),
(29, 'Kambrium', ''),
(30, 'Kambrium Tengah', ''),
(40, 'Trias Tengah', ''),
(41, 'Trias Awal', ''),
(42, 'Trias Bawah', ''),
(43, 'Jura', ''),
(44, 'Jura Akhir', ''),
(45, 'Jura Tengah', ''),
(46, 'Jura Awal', ''),
(47, 'Kapur', ''),
(48, 'Kapur Bawah', ''),
(49, 'Kapur Awal', ''),
(50, 'Kapur Akhir', ''),
(51, 'Jura Atas', ''),
(52, 'Paleosen Akhir', ''),
(53, 'Eosen Awal', ''),
(54, 'Eosen', ''),
(55, 'Eosen Akhir', ''),
(56, 'Oligosen', ''),
(57, 'Oligosen Akhir', ''),
(58, 'Oligosen Tengah', ''),
(59, 'Oligosen Awal', ''),
(60, 'Pliosen Awal (Cirebonian)', 'Turritella angulata acuticarinata'),
(61, 'Miosen Atas', ''),
(62, 'Pliosen Akhir (Sondian)', 'Turritella angulata tjikumpalensis\r\nTerebra verbeeki\r\nTerebra insulinidae\r\nConus sondelanus'),
(63, 'Plistosen Akhir', ''),
(64, 'Trias Atas', ''),
(65, 'Silur', ''),
(66, 'Pliosen Atas - Plistosen Bawah', ''),
(67, 'Plio - Plistosen', ''),
(68, 'Pliosen Bawah - Plistosen Atas', ''),
(999, '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`id`, `name`, `description`) VALUES
(1, 'User', ''),
(2, 'Administrator', ''),
(3, 'Super Administrator', '');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `description`) VALUES
('-', '-', ''),
('A', 'Aplacophora', ''),
('B', 'Bivalvia', ''),
('C', 'Cephalopoda', ''),
('G', 'Gastropada', ''),
('M', 'Monoplacophora', ''),
('P', 'Polyplacophora', ''),
('S', 'Scaphopoda', '');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `name`, `description`) VALUES
(1, 'Moluska', ''),
(2, 'Flora', ''),
(3, 'Etnografi', ''),
(4, 'Arkeologi', ''),
(5, 'Batuan', '');

-- --------------------------------------------------------

--
-- Table structure for table `drawer`
--

CREATE TABLE `drawer` (
  `id` int(10) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `rack_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `class_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`id`, `code`, `name`, `description`, `class_id`) VALUES
('1', 'MOB15', 'ANOMIIDAE', '', 'B'),
('11', 'MOGB42', 'COLUMBELLIDAE', '', 'G'),
('12', 'MOGB51', 'CONIDAE', '', 'G'),
('13', 'MOB43', 'CORBICULIDAE', '', 'B'),
('14', 'MOB48', 'CORBULIDAE', '', 'B'),
('15', 'MOGB48', 'COSTELLARIDAE', '', 'G'),
('16', 'MOB27', 'CRASSATELLIDAE', '', 'B'),
('17', 'MOGB23', 'CYPRAEIDAE', '', 'G'),
('18', 'MOGB37', 'EULIMIDAE', '', 'G'),
('2', 'MOGB53', 'ARCHITECTONICIDAE', '', 'G'),
('20', 'MOGB45', 'HARPIDAE', '', 'G'),
('21', 'MOB6', 'LIMOPSIDAE', '', 'B'),
('22', 'MOB19', 'LUCINIDAE', '', 'B'),
('23', 'MOB30', 'MACTRIDAE', '', 'B'),
('24', 'MOGB46', 'MARGINELLIDAE', '', 'G'),
('25', 'MOGB8', 'MELANOPSIDAE', '', 'G'),
('26', 'MOGB47', 'MITRIDAE', '', 'G'),
('27', 'MOGB38', 'MURICIDAE', '', 'G'),
('28', 'MOB8', 'MYTILIDAE', '', 'B'),
('29', 'MOGB26', 'NATICIDAE', '', 'G'),
('30', 'MOB5', 'NOETIIDAE', '', 'B'),
('31', 'MOB1', 'NUCULIDAE', '', 'B'),
('32', 'MOGB44', 'OLIVIDAE', '', 'G'),
('33', 'MOB17', 'OSTREIDAE', '', 'B'),
('34', 'MOGC11', 'PLEURODONTIDAE', '', 'G'),
('35', 'MOGB6', 'POTAMIDIDAE', '', 'G'),
('36', 'MOGB55', 'PYRAMIDELLIDAE', '', 'G'),
('37', 'MOGA9', 'SKENEIDAE', '', 'G'),
('38', 'MOGB16', 'STROMBIIDAE', '', 'G'),
('39', 'MOB34', 'TELLINIDAE', '', 'B'),
('4', 'MOGB40', 'BUCCINIDAE', '', 'G'),
('40', 'MOGB52', 'TEREBRIDAE', '', 'G'),
('41', 'MOGB7', 'THIARIDAE', '', 'G'),
('42', 'MOGA11', 'TORNIDAE', '', 'G'),
('43', 'MOGB35', 'TRIPHORIDAE', '', 'G'),
('44', 'MOGA6', 'TROCHIDAE', '', 'G'),
('45', 'MOGB39', 'TURBINELLIDAE', '', 'G'),
('46', 'MOGA8', 'TURBINIDAE', '', 'G'),
('47', 'MOGB50', 'TURRIDAE', '', 'G'),
('48', 'MOGB11', 'TURRITELLIDAE', '', 'G'),
('49', 'MOB18', 'UNIONIDAE', '', 'B'),
('5', 'MOGC3', 'CAMAENIDAE', '', 'G'),
('50', 'MOB45', 'VENERIDAE', '', 'B'),
('51', 'MOGB22', 'VERMETIDAE', '', 'G'),
('52', 'MOGB30', 'RANELLIDAE', '', 'G'),
('53', 'MOB2', 'NUCULANIDAE', '', 'B'),
('56', 'MOGA19', 'BULLIDAE', '', 'G'),
('57', 'MOGB43', 'VOLUTIDAE', '', 'G'),
('58', 'MOGA16', 'RINGICULIDAE', '', 'G'),
('59', 'MOGB29', 'FICIDAE', '', 'G'),
('6', 'MOGB49', 'CANCELLARIDAE', '', 'G'),
('60', 'MOB22', 'CHAMIDAE', '', 'B'),
('61', 'MOGA5', 'ACMAEIDAE', '', 'G'),
('63', 'MOGB12', 'LITTORINIDAE', '', 'G'),
('64', 'MOGB19', 'CALYPTRAEIDAE', '', 'G'),
('65', 'MOGB28', 'TONNIDAE', '', 'G'),
('66', 'MOGC6', 'ELLOBIIDAE', '', 'G'),
('67', 'MOB13', 'SPONDILIDAE', '', 'B'),
('68', 'MOB16', 'LIMIDAE', '', 'B'),
('69', 'MOB35', 'DONACIDAE', '', 'B'),
('7', 'MOB28', 'CARDIIDAE', '', 'B'),
('70', 'MOGB17', 'HIPPONICIDAE', '', 'G'),
('71', 'MOGA4', 'PATELLIDAE', '', 'G'),
('72', 'MOGA10', 'PHASIANELLIDAE', '', 'G'),
('73', 'MOGA13', 'NERITIDAE', '', 'G'),
('74', 'MOGA2', 'HALIOTIDAE', '', 'G'),
('75', 'MOB11', 'PECTINIDAE', '', 'B'),
('78', 'MOGB21', 'XENOPHORIDAE', '', 'G'),
('79', 'MOGB31', 'BURSINIDAE', '', 'G'),
('8', 'MOB26', 'CARDITIDAE', '', 'B'),
('80', 'MOB36', 'PSAMMOBIIDAE', '', 'B'),
('9', 'MOGB27', 'CASSIDAE', '', 'G'),
('999', '-', '-', '', '-'),
('MOB10', 'MOB10', 'PTERIIDAE', '', 'B'),
('MOB12', 'MOB12', 'PLICATULIDAE', '', 'B'),
('MOB14', 'MOB14', 'DIMYDAE', '', 'B'),
('MOB20', 'MOB20', 'THYSARIDAE/THYASIRA', '', 'B'),
('MOB21', 'MOB21', 'UNGULINDAE', '', 'B'),
('MOB23', 'MOB23', 'ERYCINIDAE', '', 'B'),
('MOB24', 'MOB24', 'KELLIIDAE', '', 'B'),
('MOB25', 'MOB25', 'SPORTELLIDAE', '', 'B'),
('MOB29', 'MOB29', 'TRIDACNIDAE', '', 'B'),
('MOB3', 'MOB3', 'ARCIDAE', '', 'B'),
('MOB31', 'MOB31', 'MESODESMATIDAE', '', 'B'),
('MOB32', 'MOB32', 'SOLENIDAE', '', 'B'),
('MOB33', 'MOB33', 'CULTELLIDAE', '', 'B'),
('MOB37', 'MOB37', 'SCROBICULLARIIDAE', '', 'B'),
('MOB38', 'MOB38', 'ARTICIDAE', '', 'B'),
('MOB39', 'MOB39', 'KELLIELLIDAE', '', 'B'),
('MOB4', 'MOB4', 'CUCULLAEIDAE', '', 'B'),
('MOB40', 'MOB40', 'TRAPEZIDAE', '', 'B'),
('MOB41', 'MOB41', 'GLOSSIDAE', '', 'B'),
('MOB42', 'MOB42', 'VESICOMYIDAE', '', 'B'),
('MOB44', 'MOB44', 'PISIDIIDAE', '', 'B'),
('MOB46', 'MOB46', 'GLAUCONOMIDAE', '', 'B'),
('MOB47', 'MOB47', 'MYIDAE', '', 'B'),
('MOB49', 'MOB49', 'GASTROCHAENIDAE', '', 'B'),
('MOB50', 'MOB50', 'HIATELLIDAE', '', 'B'),
('MOB51', 'MOB51', 'PHOLADIDAE', '', 'B'),
('MOB52', 'MOB52', 'TEREDINIDAE', '', 'B'),
('MOB53', 'MOB53', 'PHOLADOMYACEA', '', 'B'),
('MOB54', 'MOB54', 'CUSPIDARIIDAE', '', 'B'),
('MOB55', 'MOB55', 'VERTICORDIIDAE', '', 'B'),
('MOB56', 'MOB56', 'CLAVAGELLIDAE', '', 'B'),
('MOB7', 'MOB7', 'GLYCYMERIDIDAE', '', 'B'),
('MOB9', 'MOB9', 'PINNIDAE', '', 'B'),
('MOGA1', 'MOGA1', 'SCISSURELLIDAE', '', 'G'),
('MOGA12', 'MOGA12', 'NERITOPSIDAE', '', 'G'),
('MOGA14', 'MOGA14', 'HELICIDAE', '', 'G'),
('MOGA15', 'MOGA15', 'ACTEONIDAE', '', 'G'),
('MOGA17', 'MOGA17', 'SCAPHANDRIDAE', '', 'G'),
('MOGA18', 'MOGA18', 'ATYIDAE', '', 'G'),
('MOGA3', 'MOGA3', 'FISSURELLIDAE', '', 'G'),
('MOGA7', 'MOGA7', 'STOMATELLIDAE', '', 'G'),
('MOGB1', 'MOGB1', 'CYCLOPHORIDAE', '', 'G'),
('MOGB10', 'MOGB10', 'MODULIDAE', '', 'G'),
('MOGB13', 'MOGB13', 'POMATIASIDAE', '', 'G'),
('MOGB14', 'MOGB14', 'RISSOIDAE', '', 'G'),
('MOGB15', 'MOGB15', 'HYDROBIIDAE', '', 'G'),
('MOGB18', 'MOGB18', 'VANIKORIDAE', '', 'G'),
('MOGB2', 'MOGB2', 'VIVIPARIDAE', '', 'G'),
('MOGB20', 'MOGB20', 'CAPULIDAE', '', 'G'),
('MOGB24', 'MOGB24', 'TRIVIIDAE', '', 'G'),
('MOGB25', 'MOGB25', 'AMPULLINIDAE', '', 'G'),
('MOGB3', 'MOGB3', 'AMPULLARIIDAE', '', 'G'),
('MOGB32', 'MOGB32', 'ATLANTIDAE', '', 'G'),
('MOGB33', 'MOGB33', 'TRIFORIDAE', '', 'G'),
('MOGB34', 'MOGB34', 'CERITHIOPSIDAE', '', 'G'),
('MOGB36', 'MOGB36', 'EPITONIIDAE', '', 'G'),
('MOGB4', 'MOGB4', 'OBTORTIONIDAE', '', 'G'),
('MOGB41', 'MOGB41', 'FASCIOLARIIDAE', '', 'G'),
('MOGB5', 'MOGB5', 'CERITHIIDAE', '', 'G'),
('MOGB54', 'MOGB54', 'MATHILDIDAE', '', 'G'),
('MOGB9', 'MOGB9', 'PLANAXIDAE', '', 'G'),
('MOGC1', 'MOGC1', 'AEORBIDAE', '', 'G'),
('MOGC10', 'MOGC10', 'PLANORBIDAE', '', 'G'),
('MOGC12', 'MOGC12', 'TORNATINIDAE', '', 'G'),
('MOGC13', 'MOGC13', 'VOLEMIDAE', '', 'G'),
('MOGC2', 'MOGC2', 'AURICULIDAE', '', 'G'),
('MOGC4', 'MOGC4', 'CAVOLINIIDAE', '', 'G'),
('MOGC5', 'MOGC5', 'ELIMIDAE', '', 'G'),
('MOGC7', 'MOGC7', 'ERATOIDAE', '', 'G'),
('MOGC8', 'MOGC8', 'LYMNAEIDAE', '', 'G'),
('MOGC9', 'MOGC9', 'PHYSIDAE', '', 'G'),
('MOS1', 'MOS1', 'DENTALIIDAE', '', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `island`
--

CREATE TABLE `island` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `island`
--

INSERT INTO `island` (`id`, `name`, `description`) VALUES
('-', '-', ''),
('F', 'Flores', ''),
('I', 'Irian Jaya', ''),
('IT', 'Indonesia Timur Belanda', ''),
('J', 'Jawa', ''),
('JB', 'Jawa Belanda', ''),
('JR', 'Jawa Timur', ''),
('JT', 'Jawa Tengah', ''),
('K', 'Kalimantan', ''),
('KB', 'Kalimantan Belanda', ''),
('L', 'Sulawesi', ''),
('LN', 'Luar Negeri', ''),
('M', 'Maluku', ''),
('N', 'Nusa Tenggara', ''),
('S', 'Sumatera', ''),
('SB', 'Sumatera Belanda', ''),
('T', 'Timor', '');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` int(10) NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `island_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `scale_id` int(10) NOT NULL,
  `collection_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

CREATE TABLE `rack` (
  `id` int(10) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scale`
--

CREATE TABLE `scale` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scale`
--

INSERT INTO `scale` (`id`, `name`, `amount`, `description`) VALUES
(1, '1:25.000', 25000, ''),
(2, '1:50.000', 50000, ''),
(3, '1:100.000', 100000, ''),
(4, '1:250.000', 250000, ''),
(5, '1:1.000.000', 1000000, ''),
(99, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `specimen`
--

CREATE TABLE `specimen` (
  `id` int(10) NOT NULL,
  `registration` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `inventory` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `synonym` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `founder` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `collector` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `coordinate` text COLLATE utf8_unicode_ci NOT NULL,
  `formation` text COLLATE utf8_unicode_ci NOT NULL,
  `determination` text COLLATE utf8_unicode_ci NOT NULL,
  `redetermination` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `high` float NOT NULL,
  `environment` text COLLATE utf8_unicode_ci NOT NULL,
  `reference` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `family_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `age_id` int(10) NOT NULL,
  `drawer_id` int(10) NOT NULL,
  `map_id` int(10) NOT NULL,
  `acquisition_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `taken_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `authority_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `status`, `authority_id`, `created_at`, `updated_at`) VALUES
(1, 'root', '$2y$10$z0nKfpXMpMGZVQSDHzLFmeoJ2CxGv1kt.PtFhLiKy3hv4jAZl8BVO', 'Root', 1, 1, '2017-07-21 17:00:00', '2018-06-25 06:00:32'),
(2, 'user', '$2y$10$wuMJrN5f47QXwkz2pXf1iuwQXoEdqrp9mps6zAyrB2S7mIbAG4rCe', 'User', 0, 1, '2018-02-18 17:00:00', '2018-06-27 02:42:49'),
(3, 'admin', '$2y$10$3fI1xxq5hO7wDf5goYnsXuUt9Zjul09S/tekn7YTPTRmQz/SCRhTm', 'Administrator', 0, 1, '2018-06-25 05:22:32', '2018-07-17 11:41:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acquisition`
--
ALTER TABLE `acquisition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drawer`
--
ALTER TABLE `drawer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drawer_id` (`rack_id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `island`
--
ALTER TABLE `island`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scale_id` (`scale_id`),
  ADD KEY `island_id` (`island_id`),
  ADD KEY `collection_id` (`collection_id`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scale`
--
ALTER TABLE `scale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specimen`
--
ALTER TABLE `specimen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration` (`registration`,`inventory`),
  ADD KEY `map_id` (`map_id`),
  ADD KEY `age_id` (`age_id`),
  ADD KEY `family_id` (`family_id`),
  ADD KEY `drawer_id` (`drawer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `acquisition_id` (`acquisition_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`username`),
  ADD KEY `authority_id` (`authority_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acquisition`
--
ALTER TABLE `acquisition`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `age`
--
ALTER TABLE `age`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drawer`
--
ALTER TABLE `drawer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rack`
--
ALTER TABLE `rack`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scale`
--
ALTER TABLE `scale`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `specimen`
--
ALTER TABLE `specimen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drawer`
--
ALTER TABLE `drawer`
  ADD CONSTRAINT `drawer_ibfk_1` FOREIGN KEY (`rack_id`) REFERENCES `rack` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `family_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `map`
--
ALTER TABLE `map`
  ADD CONSTRAINT `map_ibfk_1` FOREIGN KEY (`scale_id`) REFERENCES `scale` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `map_ibfk_2` FOREIGN KEY (`island_id`) REFERENCES `island` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `map_ibfk_3` FOREIGN KEY (`collection_id`) REFERENCES `collection` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `specimen`
--
ALTER TABLE `specimen`
  ADD CONSTRAINT `specimen_ibfk_10` FOREIGN KEY (`family_id`) REFERENCES `family` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `specimen_ibfk_11` FOREIGN KEY (`map_id`) REFERENCES `map` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `specimen_ibfk_12` FOREIGN KEY (`acquisition_id`) REFERENCES `acquisition` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `specimen_ibfk_4` FOREIGN KEY (`age_id`) REFERENCES `age` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `specimen_ibfk_8` FOREIGN KEY (`drawer_id`) REFERENCES `drawer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `specimen_ibfk_9` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`authority_id`) REFERENCES `authority` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
