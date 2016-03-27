-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2016 at 10:19 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `user` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_user` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_gambar`
--

CREATE TABLE `db_gambar` (
  `nama_ga` varchar(40) NOT NULL,
  `kode_tempat_wisata` int(5) NOT NULL,
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_gambar`
--

INSERT INTO `db_gambar` (`nama_ga`, `kode_tempat_wisata`, `tipe`) VALUES
('1.jpeg', 2, ''),
('1424404316896.jpg', 2, ''),
('a.JPG', 2, ''),
('aa.JPG', 123, ''),
('Avenged.JPG', 121, ''),
('BlankPackage_Main.png', 123, ''),
('Capture.JPG', 123, ''),
('curva.jpg', 121, ''),
('email4.JPG', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_wisata`
--

CREATE TABLE `tempat_wisata` (
  `kode_tempat_wisata` int(5) NOT NULL,
  `nama_tempat_wisata` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `jenis_tempat` varchar(20) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `nama_ga` varchar(40) NOT NULL,
  `lat` varchar(60) NOT NULL,
  `lng` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat_wisata`
--

INSERT INTO `tempat_wisata` (`kode_tempat_wisata`, `nama_tempat_wisata`, `kota`, `provinsi`, `jenis_tempat`, `deskripsi`, `nama_ga`, `lat`, `lng`) VALUES
(2, 'ads', 'sfsdasadfsdf', 'Bengkulu', 'Hotel', 'asfdsafdsfsdf', '', '', ''),
(121, 'asdsadsda', 'asdasddsa', 'Aceh', 'Restaurant', 'sadasdsdasdassdzxccvzxc', 'curva.jpg', '', ''),
(777, 'asdsadsda', 'asdsadasd', 'Jawa Barat', 'Restaurant', 'asdsadasdsadsadsada', '', '-6.690106262218086', '107.79602045193315');

-- --------------------------------------------------------

--
-- Table structure for table `usradmin`
--

CREATE TABLE `usradmin` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usradmin`
--

INSERT INTO `usradmin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `db_gambar`
--
ALTER TABLE `db_gambar`
  ADD PRIMARY KEY (`nama_ga`),
  ADD KEY `kode_tempat_wisata` (`kode_tempat_wisata`);

--
-- Indexes for table `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  ADD PRIMARY KEY (`kode_tempat_wisata`);

--
-- Indexes for table `usradmin`
--
ALTER TABLE `usradmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  MODIFY `kode_tempat_wisata` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=778;
--
-- AUTO_INCREMENT for table `usradmin`
--
ALTER TABLE `usradmin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
