-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 09:30 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himpanabdg`
--

-- --------------------------------------------------------

--
-- Table structure for table `iuran_anggota`
--

CREATE TABLE `iuran_anggota` (
  `id` int(11) NOT NULL,
  `nopen` varchar(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `jmlh_bayar` int(15) NOT NULL,
  `bln_lunas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iuran_anggota`
--

INSERT INTO `iuran_anggota` (`id`, `nopen`, `nama`, `tgl_pembayaran`, `jmlh_bayar`, `bln_lunas`) VALUES
(1, '01-9-128345-10', 'wiha nur alim', '2020-01-09', 36000, '2020-02-29'),
(3, '01-9-657876-12', 'abdul', '2020-01-11', 36000, '2020-01-10'),
(4, '01-9-256798-11', 'rizky', '2020-02-05', 36000, '2020-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `pensiunan`
--

CREATE TABLE `pensiunan` (
  `id` int(11) NOT NULL,
  `nopen` varchar(14) NOT NULL,
  `namapensiun` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota_kab` varchar(30) NOT NULL,
  `tgl_pensiun` date NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `emailpen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pensiunan`
--

INSERT INTO `pensiunan` (`id`, `nopen`, `namapensiun`, `tempat_lahir`, `tgl_lahir`, `alamat`, `kota_kab`, `tgl_pensiun`, `nohp`, `notelp`, `emailpen`) VALUES
(2, '44444', 'ayu', 'garut', '2020-09-07', 'cikaso', 'bandung', '2020-09-08', '787877777', '666666', 'fg'),
(16, '987678', 'Ana NY', 'garut', '2020-09-07', 'cikaso', 'bandung', '2020-09-08', '787877777', '666666', 'fg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `idsk` int(11) NOT NULL,
  `nomor_surat` varchar(128) NOT NULL,
  `perihal` varchar(128) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_kirim` date NOT NULL,
  `surat` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `biaya_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`idsk`, `nomor_surat`, `perihal`, `tgl_surat`, `tgl_kirim`, `surat`, `lampiran`, `biaya_kirim`) VALUES
(5, '001/HCB/VII/2020', 'Permohonan ruangan', '2020-01-17', '2020-01-17', '11)_INDIHOME.pdf', '010-Surat_Ijin_Jalan_Populasi_Yakes_Pertamina.pdf', 2000),
(6, '002/HCB/I/2020', 'permohonan bantuan', '2020-01-17', '2020-01-17', '091-P02.pdf', '2056-4370-1-SM.pdf', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `idsm` int(11) NOT NULL,
  `nomor_surat` varchar(128) NOT NULL,
  `perihal` varchar(128) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `surat` varchar(128) NOT NULL,
  `lampiran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`idsm`, `nomor_surat`, `perihal`, `tgl_surat`, `tgl_terima`, `surat`, `lampiran`) VALUES
(20, '004/HCB/I/2020', 'permohonan bws', '2020-01-17', '2020-01-17', '091-P02.pdf', '11)_INDIHOME.pdf'),
(21, '005/HCB/XII/2020', 'anak ayam sayur', '2020-01-17', '2020-01-17', 'Motode_1.pdf', 'File_16-Surat-Keterangan-Riset.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Wiha Nur Alim', 'wihanuralim74@gmail.com', 'wiha_nur_alim_17160062.jpg', '$2y$10$pIvZCl4tuq33HTvhJtxxyeB75WMTTHMItsZpcfBQMm3wfTBi7Z/Zq', 1, 1, 1575990612),
(3, 'oces', 'himpana.bandung@yahoo.com', 'dd.jpg', '$2y$10$MjgL/fyEOj/QZ8ehu3rpUOvlrRuRuMLZLtC8Mvfg7hPX6QrxQVCjW', 2, 1, 1576061232);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(14, 2, 5),
(21, 1, 5),
(22, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'Menu'),
(5, 'Himpana');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 5, 'Surat Masuk', 'suratmasuk', 'fas fa-fw fa-envelope-open', 1),
(9, 5, 'Surat Keluar', 'suratkeluar', 'fas fa-fw fa-envelope-square', 1),
(10, 5, 'Pensiunan', 'pensiunan', 'fas fa-fw fa-book', 1),
(11, 5, 'Iuran Anggota', 'iuran', 'fas fa-fw fa-money-check-alt', 1),
(12, 5, 'Laporan', 'laporan', 'fas fa-fw fa-file-alt\"', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iuran_anggota`
--
ALTER TABLE `iuran_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pensiunan`
--
ALTER TABLE `pensiunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`idsk`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`idsm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iuran_anggota`
--
ALTER TABLE `iuran_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pensiunan`
--
ALTER TABLE `pensiunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `idsk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `idsm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
