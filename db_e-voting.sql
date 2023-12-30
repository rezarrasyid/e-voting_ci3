-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 03:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e-voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kandidat`
--

CREATE TABLE `tb_kandidat` (
  `id_kandidat` varchar(32) NOT NULL,
  `NIS_kandidat` varchar(32) NOT NULL,
  `nama_kandidat` varchar(128) NOT NULL,
  `kelas_kandidat` varchar(32) NOT NULL,
  `visi_misi` text NOT NULL,
  `foto_kandidat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kandidat`
--

INSERT INTO `tb_kandidat` (`id_kandidat`, `NIS_kandidat`, `nama_kandidat`, `kelas_kandidat`, `visi_misi`, `foto_kandidat`) VALUES
('6562b2a47ffd0', '22050205', 'HABIB ZIKRI', '11 DKV PA', '<h1>Visi</h1><ol><li>mejadi ketua</li><li>mejadi ketua</li><li>mejadi ketua</li><li>mejadi ketua</li></ol><h2>Misi</h2><ol><li>mejadi ketua</li><li>mejadi ketua</li><li>mejadi ketua</li></ol><p><br></p>', '6562b2a47ffd0.jpeg'),
('6562c1605a728', '22050201', 'HENRIZAL', '11 DKV PA', '<h1>Visi</h1><ol><li>mejadi ketua</li><li>mejadi ketua</li><li>mejadi ketua</li><li>mejadi ketua</li></ol><h2>Misi</h2><ol><li>mejadi ketua</li><li>mejadi ketua</li><li>mejadi ketua</li></ol><p><br></p>', '6562c1605a728.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(32) NOT NULL,
  `Nama_kelas` varchar(32) NOT NULL,
  `token` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `Nama_kelas`, `token`) VALUES
('658f6f4774597', '11 DKV PA', 'ASDFG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilih`
--

CREATE TABLE `tb_pemilih` (
  `id_pemilih` varchar(32) NOT NULL,
  `NIS` varchar(32) NOT NULL,
  `Nama` varchar(128) NOT NULL,
  `Kelas` varchar(32) NOT NULL,
  `status` enum('belum','sudah') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemilih`
--

INSERT INTO `tb_pemilih` (`id_pemilih`, `NIS`, `Nama`, `Kelas`, `status`) VALUES
('6583a186d8599', '22050215', 'Robbin', '10 DKV PA', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pilihan`
--

CREATE TABLE `tb_pilihan` (
  `id_pilihan` varchar(32) NOT NULL,
  `NIS` varchar(32) NOT NULL,
  `id_kandidat` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pilihan`
--

INSERT INTO `tb_pilihan` (`id_pilihan`, `NIS`, `id_kandidat`, `created_at`) VALUES
('65842a03e9f8b4.00208021', '22050215', '6562c1605a728', '2023-12-21 06:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolah` varchar(32) NOT NULL,
  `judul_sekolah` varchar(128) NOT NULL,
  `logo_sekolah` varchar(255) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `creted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `judul_sekolah`, `logo_sekolah`, `status`, `creted_at`, `tema`) VALUES
('1', 'MA Assalafiyyah', 'asa_logo_smk_besar.png', 'aktif', '2023-11-21 03:51:06', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_admin` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  `password_updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_admin`, `name`, `email`, `username`, `password`, `avatar`, `created_at`, `last_login`, `password_updated_at`) VALUES
('6118b2a943acc2.78631959', 'Reza Rasyid', 'rezabdul65@gmail.com', 'admin', '$2y$10$S0sSHTeMRjNfNme/xPJOzeBstDPWAeQxpeNLQ46Dg2OOCKK5W2FOa', 'Pfp.jpeg', '2021-08-14 23:22:33', '2023-12-29 19:14:50', '2023-11-21 08:00:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kandidat`
--
ALTER TABLE `tb_kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_pemilih`
--
ALTER TABLE `tb_pemilih`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `tb_pilihan`
--
ALTER TABLE `tb_pilihan`
  ADD PRIMARY KEY (`id_pilihan`);

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
