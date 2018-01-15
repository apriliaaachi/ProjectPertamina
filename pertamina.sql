-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jan 2018 pada 05.57
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertamina`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pertaminapabx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `equ`
--

CREATE TABLE `equ` (
  `no_equ` varchar(15) NOT NULL,
  `tipe_1` char(5) NOT NULL,
  `tipe_2` char(5) NOT NULL,
  `dir` char(5) NOT NULL,
  `tsr` float NOT NULL,
  `huruf` char(2) NOT NULL,
  `angka` int(5) NOT NULL,
  `klem` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `equ`
--

INSERT INTO `equ` (`no_equ`, `tipe_1`, `tipe_2`, `dir`, `tsr`, `huruf`, `angka`, `klem`) VALUES
('00624005', '2', 'EL 6', '5560', 1.2, 'E', 6, 2),
('00624006', '2', 'EL 6', '6879', 1.2, 'E', 6, 3),
('00624007', '2', 'EL 6', '6880', 1.2, 'E', 6, 4),
('00624200', '2', 'EL 6', '6881', 1.3, 'E', 7, 1),
('00624201', '2', 'EL 6', '6882', 1.3, 'E', 7, 2),
('00624202', '2', 'EL 6', '6883', 1.3, 'E', 7, 3),
('00624203', '2', 'EL 6', '6888', 1.3, 'E', 7, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `uname`, `pass`) VALUES
(5, 'user', 'pertaminaplg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equ`
--
ALTER TABLE `equ`
  ADD PRIMARY KEY (`no_equ`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
