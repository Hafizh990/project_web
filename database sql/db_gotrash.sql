-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 05:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_traveloka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
(1, 'AHMAD SAYUTI', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `nama_customer` varchar(128) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(128) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `active` varchar(2) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `no_ktp`, `nama_customer`, `gender`, `email`, `password`, `no_hp`, `active`, `level`) VALUES
(18, '367455241193002', 'ELVIRA AYU', 'Female', 'devops384@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '08124447207', '1', '2'),
(31, '367455242001004', 'EVI RAHMAWATI ', 'Female', 'syahdillaabiezy@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '085156343592', '1', '2'),
(33, '367455241193003', 'MEDI BAGASKORO ', 'Male', 'edi@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '085967789003', '1', '2'),
(34, '367455241193103', 'SRI SURYANINGSIH', 'Female', 'srisurya@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '087816265543', '0', '2'),
(37, '367600541999002', 'Heri Sanjaya', 'Male', 'ngojeks.online@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '087899228803', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` int(11) NOT NULL,
  `no_ktp` varchar(50) DEFAULT NULL,
  `nama_driver` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `active` varchar(2) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `no_ktp`, `nama_driver`, `gender`, `email`, `password`, `no_hp`, `active`, `level`) VALUES
(4, '367516260002', 'Fahmi Yulianto', 'Male', 'fahmiyulianto@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '087877665582', '1', '4'),
(5, '367516260003', 'Muhammad Nurdin', 'Male', 'mnurdin@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '087877665521', '1', '4'),
(7, '367516260004', 'Irvan Sulistianto', 'Male', 'irvansulis@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '087877665582', '1', '4'),
(8, '367516260008', 'Abimanyu Arisatya', 'Male', 'abimanyu@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '087877665587', '1', '4'),
(9, '367516260005', 'Ahmad Ghofur', 'Male', 'ghofurahmd@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '0857662813124', '1', '4'),
(11, '367516260006', 'Soni Darmanto', 'Male', 'soni@gmail.com', '9e56c9dd07ad431ba42bba6555c31667', '089677820003', '1', '4');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `no_pol` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `id_driver`, `merk`, `jenis`, `tahun`, `no_pol`, `created_at`) VALUES
(18, 4, 'Toyota Avanza', 'Mobil', '2019', 'B 6620 WIN', '2023-01-23 03:03:34'),
(19, 5, 'Daihatsu Alya', 'Mobil', '2018', 'B 6659 WGF', '2023-01-23 03:03:54'),
(20, 7, 'Toyota Rush', 'Mobil', '2020', 'B 6221 WJR', '2023-01-23 03:04:22'),
(21, 8, 'Honda Beat', 'Motor', '2017', 'B 6689 UKY', '2023-01-23 03:04:56'),
(22, 9, 'Honda Vario', 'Motor', '2019', 'B 6649 WUF', '2023-01-23 03:05:21'),
(23, 11, 'Honda PCX-125', 'Motor', '2021', 'B 6652 WGJ	', '2023-01-23 03:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `id_merchant` int(11) NOT NULL,
  `nama_merchant` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `active` varchar(2) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `pickup_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `id_driver`, `id_kendaraan`, `title`, `keterangan`, `discount`, `harga`, `pickup_time`, `created_at`) VALUES
(7, 5, 4, 'CAR EKONOMIS', 'Lebih Dekat Lebih Hemat', 0, 23000, '00:15:00', '2023-01-23 08:20:05'),
(8, 4, 5, 'BIKE STANDARD', 'Lebih Jauh Harga Terjangkau', 1500, 16000, '00:12:00', '2023-01-23 08:20:21'),
(9, 7, 14, 'CAR STANDARD', 'Lebih Jauh Harga Terjangkau', 1000, 26000, '00:13:00', '2023-01-23 08:20:43'),
(10, 8, 15, 'CAR EXPRESS', 'Lebih Cepat Lebih Baik', 0, 32000, '00:10:00', '2023-01-23 08:20:57'),
(11, 9, 16, 'BIKE EKONOMIS', 'Lebih Dekat Lebih Hemat', 0, 10000, '00:15:00', '2023-01-23 02:22:56'),
(13, 4, 18, 'CAR EKONOMIS', 'Lebih Dekat Lebih Hemat', 0, 23000, '00:20:00', '2023-01-23 09:06:53'),
(14, 5, 19, 'CAR STANDARD', 'Lebih Jauh Harga Terjangkau', 1000, 29000, '00:15:00', '2023-01-23 03:07:42'),
(15, 7, 20, 'CAR EXPRESS', 'Lebih Cepat Lebih Baik', 0, 32000, '00:10:00', '2023-01-23 03:08:21'),
(16, 8, 21, 'BIKE EKONOMIS', 'Lebih Dekat Lebih Hemat', 0, 10000, '00:25:00', '2023-01-23 03:08:55'),
(17, 9, 22, 'BIKE STANDARD', 'Lebih Jauh Harga Terjangkau', 500, 15000, '00:12:00', '2023-01-23 03:09:50'),
(18, 11, 23, 'BIKE EXPRESS', 'Lebih Cepat Lebih Baik', 1000, 20000, '00:08:00', '2023-01-23 03:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `no_pesanan` char(20) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `id_merchant` int(11) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `lokasi_jemput` varchar(200) DEFAULT NULL,
  `lokasi_antar` varchar(200) DEFAULT NULL,
  `paid_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`no_pesanan`, `id_paket`, `id_customer`, `id_driver`, `id_kendaraan`, `id_merchant`, `discount`, `harga`, `total_amount`, `status`, `lokasi_jemput`, `lokasi_antar`, `paid_at`, `created_at`) VALUES
('TRSC20230001', 16, 18, 8, 21, NULL, 0, 10000, 10000, 1, 'RS Hermina Ciputat, Tangerang Selatan', 'Perumahan Pondok Hijau, Pisangan, Ciputat Timur, Tangerang Selatan', '2023-01-23 15:03:17', '2023-01-23 15:03:17'),
('TRSC20230002', 14, 31, 5, 19, NULL, 1000, 29000, 28000, 1, 'Lobi Utama Pondok Indah Mall 2 ', 'Cirendeu Permai No. IV, Lebak Bulus, Jakarta Selatan', '2023-01-23 16:44:43', '2023-01-23 16:44:43'),
('TRSC20230003', 15, 18, 7, 20, NULL, 0, 32000, 32000, 1, 'Pondok Indah Mall 2', 'ITC Fatmawati, Jakarta Selatan', '2023-01-23 15:08:17', '2023-01-23 15:08:17'),
('TRSC20230004', 14, 18, 5, 19, NULL, 1000, 29000, 28000, 1, 'ITC Fatmawati, Jakarta Selatan', 'RS UIN Syarif Hidayatullah', '2023-01-23 15:07:32', '2023-01-23 15:07:32'),
('TRSC20230005', 14, 31, 5, 19, NULL, 1000, 29000, 28000, 1, 'Bintaro Plaza Mall', 'JL. Raya Kompas', '2023-01-25 15:39:14', '2023-01-25 15:39:14'),
('TRSC20230006', 17, 31, 9, 22, NULL, 500, 15000, 14500, 1, 'Bintaro Plaza Mall ', 'Perumahan Cinere Mas', '2023-01-25 15:37:28', '2023-01-25 15:37:28'),
('TRSC20230007', 15, 33, 7, 20, NULL, 0, 32000, 32000, 1, 'Pintu Utama Stasiun Sudimara', 'Perumahan Brimob, Kedaung, Tangerang Selatan', '2023-01-25 15:46:36', '2023-01-25 15:46:36'),
('TRSC20230008', 17, 31, 9, 22, NULL, 500, 15000, 14500, 1, 'Masjid Agung Ciputat', 'Perumahan Villa Pamulang', '2023-01-25 16:11:30', '2023-01-25 16:11:30'),
('TRSC20230009', 18, 37, 11, 23, NULL, 1000, 20000, 19000, 1, 'Mall Bintaro Jaya Exchange', 'Perumahan Villa Dago, Pamulang, Tangerang Selatan', '2023-01-25 16:33:40', '2023-01-25 16:33:40');

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
   UPDATE saldo SET jumlah = jumlah - NEW.total_amount
   WHERE id_customer = NEW.id_customer;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `topup_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `id_customer`, `jumlah`, `topup_at`) VALUES
(8, 18, 5000, '2023-01-25 14:07:54'),
(12, 31, 25000, '2023-01-25 10:14:46'),
(13, 33, 18000, '2023-01-25 15:44:27'),
(14, 37, 16000, '2023-01-25 16:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `topup_history`
--

CREATE TABLE `topup_history` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `topup_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topup_history`
--

INSERT INTO `topup_history` (`id`, `id_customer`, `jumlah`, `topup_at`) VALUES
(1, 18, 20000, '2023-01-22 08:33:14'),
(2, 18, 10000, '2023-01-22 08:33:40'),
(3, 30, 50000, '2023-01-22 08:34:09'),
(4, 18, 10000, '2023-01-22 08:44:06'),
(5, 32, 25000, '2023-01-22 08:44:15'),
(6, 31, 25000, '2023-01-22 09:42:45'),
(7, 18, 25000, '2023-01-23 02:26:39'),
(8, 31, 35000, '2023-01-23 03:20:28'),
(9, 18, 25000, '2023-01-23 03:21:15'),
(10, 18, 50000, '2023-01-23 09:01:44'),
(11, 31, 50000, '2023-01-23 09:01:52'),
(12, 33, 50000, '2023-01-25 09:43:05'),
(13, 31, 25000, '2023-01-25 10:14:46'),
(14, 37, 35000, '2023-01-25 10:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(30, 'srisurya@gmail.com', 'WMmlI2JDKMd3S0Pj/qeSIX5XBqq+KzbO3zphcNBAOhs=', 1674384805);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id_merchant`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_pesanan`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `topup_history`
--
ALTER TABLE `topup_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id_merchant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `topup_history`
--
ALTER TABLE `topup_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
