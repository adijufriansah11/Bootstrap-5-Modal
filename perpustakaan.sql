-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 02:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_user` int(11) NOT NULL,
  `identitas` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_user`, `identitas`, `nama`, `username`, `password`, `level`, `jk`, `alamat`, `tempat_lahir`, `status`, `foto`) VALUES
(36, '753316853', 'ARDIL, S.Sos', 'Ardil', '65e40e160bbde5a370e01b6789ea40c2', 'admin', 'Laki-Laki', 'Pemana', 'Maumere, 22 Juni 2022', 'Kepala Perpus', '1726299498_nain.jpeg'),
(39, '663633', 'Andi Ashar', 'Ashar', 'fea739e6e47c4afe8cbc904a9c38e281', 'pengguna', 'laki-laki', 'Bebeng', 'Kupang, 20 Maret 2021', 'siswa/i', '1190503709_foto1.png'),
(42, '23626262', 'Khaidir, S. Ag. M. Pd', 'kepsek', 'd724ff7a24e1ad29a39c004bbd32bd18', 'kepsek', 'laki-laki', 'Waioti', 'Kupang, 20 Maret 2021', 'kepsek', '334802507_WhatsApp Image 2024-04-18 at 08.35.53.jpeg'),
(47, '7756444', 'Noval Hidayat', 'Noval', '04720ff49add66b86a9ad19cd446c995', 'pengguna', 'laki-laki', 'kilo 2', 'mof, 20 julin2021', 'siswa/i', '1317655506_WhatsApp Image 2024-04-18 at 08.35.53.jpeg'),
(48, '2455345', 'Irvan Ahmad J,', 'Irvan', 'a9eab45b9accdbd967f7fbbf79759bcd', 'pengguna', 'laki-laki', 'Waioty', 'Pemana, 20 maret 1990', 'siswa/i', '907799180_WhatsApp Image 2024-04-18 at 08.35.53.jpeg'),
(49, '98588', 'Arif Aji santoso', 'Arif', 'f344210efa183585b8bdd225a4c6f399', 'pengguna', 'laki-laki', 'Perumnas', 'Alok, 20 Juli 1997', 'siswa/i', '1819858908_foto2.png'),
(50, '0987654678', 'Nabil Hidayat', 'Nabil', '095a2eb71a5d7f2a75216649914786ec', 'pengguna', 'laki-laki', 'kilo 2', 'Pemana, 20 maret 1990', 'siswa/i', '2083529054_WhatsApp Image 2024-04-18 at 08.35.53.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(10) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `id_kategori` int(15) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(6) NOT NULL,
  `stok_buku` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `id_kategori`, `pengarang`, `penerbit`, `tahun`, `stok_buku`) VALUES
(1, 'biologi', 2, 'Fajar Ali', 'mof', 2023, 10),
(2, 'IPS', 1, 'Langke', 'bonerate', 2019, 9),
(3, 'TIK', 1, 'Fajar Ali', 'Surabaya', 2024, 10),
(4, 'biologi', 1, 'Fajar Ali', 'Ngolo', 2024, 15),
(5, 'IPA', 1, 'andi', 'mof', 2024, 0),
(6, 'Fisiki MTK', 1, 'Syamsul Debat', 'Surabaya', 2022, 10),
(7, 'sistem informasi', 2, 'yosafat', 'univ nusa nipa', 2020, 10),
(8, 'B arab', 1, 'Fajar Ali', 'Surabaya', 2022, 9),
(9, 'Sejarah', 1, 'andi', 'bonerate', 2022, 48),
(10, 'Geografis', 1, 'Isnain', 'UNIPA', 2019, 10),
(11, 'Sistem Pendukung Keputusan', 1, 'Isnain', 'Maumere Express', 2022, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(15) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Mata Pelajaran'),
(2, 'Filsafat'),
(3, 'novel'),
(4, 'Cerpen'),
(5, 'Sejarah'),
(6, 'Agama Islam'),
(7, 'Penjaskes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id_kembali` int(5) NOT NULL,
  `kode_pinjam` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id_kembali`, `kode_pinjam`) VALUES
(3, 3),
(4, 4),
(13, 5),
(5, 14),
(9, 18),
(8, 19),
(7, 20),
(21, 45);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `identitas` varchar(50) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `nama`, `identitas`, `judul_buku`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 'Andi Ashar', '663633', 'biologi', '22-05-2024', '29-05-2024', 'Buku Telah Dikembalikan'),
(2, 'Andi Ashar', '663633', 'biologi', '22-05-2024', '29-05-2024', 'Buku Telah Dikembalikan'),
(3, 'Andi Ashar', '663633', 'biologi', '22-05-2024', '29-05-2024', 'Buku Telah Dikembalikan'),
(4, 'ananda putra', '778899', 'biologi', '22-05-2024', '29-05-2024', 'Buku Telah Dikembalikan'),
(5, 'Andi Ashar', '663633', 'Sejarah', '22-05-2024', '29-05-2024', 'Buku Telah Dikembalikan'),
(6, 'Noval', '6533355', 'Sejarah', '22-05-2024', '29-05-2024', 'Buku Masih Dipinjam'),
(7, 'Fajar Ali', '5758568', 'Fisiki MTK', '22-05-2024', '29-05-2024', 'Buku Masih Dipinjam'),
(8, 'Amrullah', '89875433', 'Geografis', '22-05-2024', '29-05-2024', 'Buku Masih Dipinjam'),
(9, 'Nadia Yusran, S', '673414143', 'biologi', '22-05-2024', '29-05-2024', 'Buku Masih Dipinjam'),
(10, 'ananda putra', '778899', 'sistem informasi', '22-05-2024', '29-05-2024', 'Buku Masih Dipinjam'),
(11, 'Irvan Ahmad J,', '2455345', 'Sistem Pendukung Keputusan', '30-05-2024', '06-06-2024', 'Buku Masih Dipinjam'),
(12, 'Noval Hidayat', '7756444', 'Geografis', '30-05-2024', '06-06-2024', 'Buku Masih Dipinjam'),
(13, 'Andi Ashar', '663633', 'biologi', '30-05-2024', '06-06-2024', 'Buku Masih Dipinjam'),
(14, 'Irvan Ahmad J,', '2455345', 'Sistem Pendukung Keputusan', '30-05-2024', '06-06-2024', 'Buku Telah Dikembalikan'),
(15, 'Andi Ashar', '663633', 'biologi', '30-05-2024', '06-06-2024', 'Buku Masih Dipinjam'),
(16, 'Noval Hidayat', '7756444', 'Fisiki MTK', '30-05-2024', '06-06-2024', 'Buku Masih Dipinjam'),
(17, 'Andi Ashar', '663633', 'biologi', '30-05-2024', '06-06-2024', 'Buku Masih Dipinjam'),
(18, 'Irvan Ahmad J,', '2455345', 'Geografis', '30-05-2024', '06-06-2024', 'Buku Telah Dikembalikan'),
(19, 'Andi Ashar', '663633', 'biologi', '30-05-2024', '06-06-2024', 'Buku Telah Dikembalikan'),
(20, 'Irvan Ahmad J,', '2455345', 'Sistem Pendukung Keputusan', '30-05-2024', '06-06-2024', 'Buku Telah Dikembalikan'),
(45, 'Nabil Hidayat', '0987654678', 'Sistem Pendukung Keputusan', '30-05-2024', '06-06-2024', 'Buku Telah Dikembalikan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `kode_pinjam` (`kode_pinjam`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id_kembali` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD CONSTRAINT `tb_pengembalian_ibfk_1` FOREIGN KEY (`kode_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
