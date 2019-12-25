-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 06:26 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenismeja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `level` enum('pelatih','admin') NOT NULL DEFAULT 'pelatih'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'ByNSJQVjBCMHJQRwAjNSIQRm', 'Admin TTC', 'admin'),
(2, 'luffy', 'ByNSJQVjBCMHJQRwAjNSIQRm', 'Luffy', 'pelatih');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `idevaluasi` int(11) NOT NULL,
  `idatlet` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `kategori_nilai` varchar(100) NOT NULL,
  `pesan evaluasi` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `backhand` int(11) NOT NULL,
  `forehand` int(11) NOT NULL,
  `chop` int(11) NOT NULL,
  `blok` int(11) NOT NULL,
  `spin` int(11) NOT NULL,
  `gerakankaki` int(11) NOT NULL,
  `fisik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi`
--

INSERT INTO `evaluasi` (`idevaluasi`, `idatlet`, `total_nilai`, `kategori_nilai`, `pesan evaluasi`, `tanggal`, `backhand`, `forehand`, `chop`, `blok`, `spin`, `gerakankaki`, `fisik`) VALUES
(1, 1, 80, 'Baik', '', '2019-12-17 10:38:16', 10, 10, 10, 20, 10, 10, 10),
(2, 3, 100, 'Sangat Baik', '', '2019-12-25 10:17:36', 20, 30, 40, 40, 20, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idjadwal` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idjadwal`, `hari`, `waktu`) VALUES
(3, 'Senin', '10:00 AM'),
(4, 'Selasa', '6:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis` enum('pemula','kadet','senior') NOT NULL DEFAULT 'pemula',
  `nik` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `nama`, `password`, `jenis`, `nik`, `tanggal_lahir`, `jenis_kelamin`, `phone`) VALUES
(1, 'tapisdev', 'Tapisdev', 'ByNSJQVjBCMHJQRwAjNSIQRm', 'pemula', '1224343434345', '1995-10-02', 'L', '08972626262'),
(3, 'zoro', 'Zoro', 'ACRVIlI0DygHJVImVmcEdwBi', 'senior', '134343434', '2000-12-06', 'L', '9038348834');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`idevaluasi`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idjadwal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `idevaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
