-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 06:44 PM
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
  `id_tipepaket` int(11) NOT NULL,
  `jumlah_tayang` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detailpaket`
--

INSERT INTO `tbl_detailpaket` (`id_detail`, `id_paket`, `id_tipepaket`, `jumlah_tayang`, `harga`) VALUES
(1, 1, 1, 1, 100000),
(2, 1, 1, 4, 300000),
(3, 1, 1, 8, 500000),
(4, 2, 1, 1, 200000),
(5, 2, 1, 3, 450000),
(6, 2, 1, 6, 850000),
(7, 2, 2, 1, 250000),
(8, 2, 3, 2, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_tayang` varchar(25) NOT NULL,
  `jam` varchar(25) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_pembayaran`, `tanggal_tayang`, `jam`, `keterangan`) VALUES
(1, 3, '2020', '07:30', 'Mantapp'),
(2, 6, '2020-08-21', '20:34', 'Waktu yang pas.');

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
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `kode_pembayaran` varchar(25) NOT NULL,
  `invoice` varchar(128) NOT NULL DEFAULT '-',
  `bukti_pembayaran` varchar(255) NOT NULL DEFAULT '-',
  `tanggal` int(11) NOT NULL,
  `status_p` varchar(20) NOT NULL DEFAULT 'Belum Lunas',
  `tgl_terakhir` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_pengajuan`, `id_pengguna`, `id_rekening`, `kode_pembayaran`, `invoice`, `bukti_pembayaran`, `tanggal`, `status_p`, `tgl_terakhir`) VALUES
(3, 6, 2, 1, 'KB0002', 'AC2008200001', 'bukti-20082020-b242d74239.jpg', 20200820, 'Lunas', '2020-08-20 10:58:49'),
(6, 9, 6, 2, 'KB0003', 'AC2008200002', 'bukti-20082020-7c6fbb0b47.jpg', 20200820, 'Lunas', '2020-08-20 15:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `kode_pengajuan` varchar(25) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `konten` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Pending',
  `keterangan` varchar(255) NOT NULL DEFAULT '-',
  `update_pada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_pengajuan`, `kode_pengajuan`, `id_pengguna`, `id_detail`, `konten`, `caption`, `tanggal`, `status`, `keterangan`, `update_pada`) VALUES
(1, 'KP0001', 6, 1, 'IMAGE.jpg', 'Ini adalah caption', 20200817, 'Diterima', 'Bagus sekaliii', '2020-08-19 17:09:34'),
(2, 'KP0002', 1, 6, 'konten-19082020-655d2bde15.jpg', '6', 19, 'Ditolak', 'Iklan kamu mengandung sar', '2020-08-19 17:09:34'),
(3, 'KP0003', 1, 3, 'konten-19082020-78653ab31d.jpg', '3', 19082020, 'Ditolak', 'adasdas', '2020-08-19 17:09:34'),
(4, 'KP0004', 1, 3, 'konten-19082020-24257456c1.jpg', ' asddgdsghsgs', 20200819, 'Diterima', 'Ini sangat bagus sekalii', '2020-08-19 17:09:34'),
(5, 'KP0005', 2, 5, 'konten-19082020-290a2863cc.jpg', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi necessitatibus suscipit saepe eum eaque consequatur autem in pariatur praesentium. Distinctio rem illum excepturi laborum dicta molestiae? Explicabo eaque ullam omnis.', 20200819, 'Ditolak', 'Iklan kamu mengandung Provokasiii ! silahkan ganti', '2020-08-19 17:09:34'),
(6, 'KP0006', 2, 7, 'konten-20082020-6218ad4aa1.jpg', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim ab deleniti alias id, magni impedit praesentium placeat aut dolorem voluptatem exercitationem, quod incidunt pariatur possimus quidem! Ipsam illum soluta quis!\r\n    }', 20200820, 'Diterima', 'Sangat bagus sekali', '2020-08-20 07:05:11'),
(7, 'KP0007', 1, 5, 'konten-20082020-61d31c7533.jpg', ' zvnfgmghjf', 20200820, 'Pending', '-', '2020-08-20 15:04:52'),
(8, 'KP0008', 1, 3, 'konten-20082020-32cb534a84.jpg', ' kgjgtgut', 20200820, 'Pending', '-', '2020-08-20 15:05:11'),
(9, 'KP0009', 6, 3, 'konten-20082020-611d5dab2c.jpg', ' dbfn bcvbcvb', 20200820, 'Diterima', 'Iklannya menarik', '2020-08-20 15:16:06');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rekening`, `atas_nama`) VALUES
(1, 'BCA', '3740250824', 'Agus Sapiyullah'),
(2, 'Mandiri', '1340005695951', 'Agus Sapiyullah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipepaket`
--

CREATE TABLE `tbl_tipepaket` (
  `id_tipepaket` int(11) NOT NULL,
  `tipe_paket` varchar(50) NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tipepaket`
--

INSERT INTO `tbl_tipepaket` (`id_tipepaket`, `tipe_paket`, `tgl_dibuat`) VALUES
(1, 'Standard', '2020-08-18 05:22:36'),
(2, 'Medium', '2020-08-18 05:23:41'),
(3, 'Premium', '2020-08-18 05:23:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detailpaket`
--
ALTER TABLE `tbl_detailpaket`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_tipepaket`
--
ALTER TABLE `tbl_tipepaket`
  ADD PRIMARY KEY (`id_tipepaket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detailpaket`
--
ALTER TABLE `tbl_detailpaket`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tipepaket`
--
ALTER TABLE `tbl_tipepaket`
  MODIFY `id_tipepaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
