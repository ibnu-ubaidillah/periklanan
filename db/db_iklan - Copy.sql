-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 12:45 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iklan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpaket`
--

CREATE TABLE `tbl_detailpaket` (
  `id_detail` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `tipe_paket` varchar(128) NOT NULL,
  `jumlah_tayang` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detailpaket`
--

INSERT INTO `tbl_detailpaket` (`id_detail`, `id_paket`, `tipe_paket`, `jumlah_tayang`, `harga`) VALUES
(1, 1, 'Standard', 1, 100000),
(2, 1, 'Standard', 4, 300000),
(3, 1, 'Standard', 8, 500000),
(4, 2, 'Standard', 1, 200000),
(5, 2, 'Standard', 3, 450000),
(6, 2, 'Standard', 6, 850000),
(7, 2, 'Medium', 1, 250000),
(8, 2, 'Premium', 2, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(45) NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `nama_paket`, `tgl_dibuat`) VALUES
(1, 'Paket Tanpa ADS', '2020-08-08 09:11:39'),
(2, 'Paket Dengan ADS (Metode Iklan Powerful)', '2020-08-08 09:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:atasan, 3:pelanggan',
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aktif` int(11) NOT NULL,
  `terakhir_diubah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `username`, `password`, `email`, `nama`, `alamat`, `no_telp`, `jenis_kelamin`, `level`, `tanggal_dibuat`, `aktif`, `terakhir_diubah`) VALUES
(1, 'Ibnuu', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ibnu048@gmail.com', 'Ibnu Ubaidillah', 'Cirebon', '082130146458', 'Laki-laki', 1, '2020-08-10 10:11:27', 1, '2020-08-10 10:11:27'),
(2, 'Annes', '6467baa3b187373e3931422e2a8ef22f3e447d77', 'annes134@gmail.com', 'Yohannes Julius', 'Cirebon', '089765678654', 'Laki-laki', 3, '2020-08-10 10:11:31', 1, '2020-08-10 10:11:31'),
(3, 'Khairun', '585b2f7c7b45e93a7934ba3a95e059413a08d06a', 'nnas54@gmail.com', 'Khairunnas', 'Cirebon', '083234278654', 'Laki-laki', 2, '2020-08-10 10:11:35', 1, '2020-08-10 10:11:35'),
(4, 'Dandi', '6467baa3b187373e3931422e2a8ef22f3e447d77', 'Dandi_@hotmail.com', 'Dandi Agustian Syah', '   Surabaya', '089245345678', 'Laki-laki', 3, '2020-08-10 10:11:39', 1, '2020-08-10 10:11:39'),
(6, 'Faisal', 'a6addb9ffb18bd870b260590177a30e43a3d218d', 'Zafkhiell444@yahoo.co.id', 'Akhmad Faisall', 'Cirebon', '089234211245', 'Laki-laki', 3, '2020-08-10 09:34:14', 1, '2020-08-10 09:34:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detailpaket`
--
ALTER TABLE `tbl_detailpaket`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detailpaket`
--
ALTER TABLE `tbl_detailpaket`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
