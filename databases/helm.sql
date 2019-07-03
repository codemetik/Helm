-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 04:06 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helm`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_master`
--

CREATE TABLE `data_master` (
  `id_master` char(20) NOT NULL,
  `id_produk` varchar(225) NOT NULL,
  `id_ukuran` varchar(225) NOT NULL,
  `stok` int(30) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_master`
--

INSERT INTO `data_master` (`id_master`, `id_produk`, `id_ukuran`, `stok`, `harga`) VALUES
('M001', 'PR0001', 'U001', 5, 450000),
('M002', 'PR0001', 'U002', 10, 455000),
('M003', 'PR0002', 'U001', 9, 350000),
('M004', 'PR0002', 'U002', 7, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_faktur` char(20) NOT NULL,
  `tanggal` varchar(225) NOT NULL,
  `id_master` char(20) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `harga` int(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_faktur`, `tanggal`, `id_master`, `nama_produk`, `harga`, `jumlah`, `total`) VALUES
('FA001', '09 - Jun - 2019', 'M002', 'Arai,M', 455000, 1, 455000),
('FA002', '09 - Jun - 2019', 'M001', 'Arai,S', 450000, 1, 450000),
('FA003', '09 - Jun - 2019', 'M001', 'Arai,S', 450000, 1, 450000),
('FA004', '09 - Jun - 2019', 'M002', 'Arai,M', 455000, 1, 455000);

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
	update data_master set stok = stok - new.jumlah where id_master = new.id_master;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(20) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `gambar`, `nama`) VALUES
('PR0001', 'Arai.jpg', 'Arai'),
('PR0002', 'Cargloss.jpg', 'Cargloss'),
('PR0003', 'Gm.jpg', 'Gm'),
('PR0004', 'INK.jpg', 'Ink'),
('PR0005', 'KBC.jpg', 'KBC'),
('PR0006', 'KYT.jpg', 'KYT'),
('PR0007', 'Ls2.jpg', 'Ls2'),
('PR0008', 'MDS.png', 'MDS'),
('PR0009', 'Nolan.jpg', 'Nolan'),
('PR0010', 'Rsv.jpg', 'Rsv'),
('PR0011', 'Shark.jpg', 'Shark'),
('PR0012', 'Shoei.jpg', 'Shoei'),
('PR0013', 'TRX Helmet.jpg', 'TRX Helmet');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_helm`
--

CREATE TABLE `ukuran_helm` (
  `id_ukuran` char(20) NOT NULL,
  `nama_ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran_helm`
--

INSERT INTO `ukuran_helm` (`id_ukuran`, `nama_ukuran`) VALUES
('U001', 'S'),
('U002', 'M'),
('U003', 'L'),
('U004', 'XL'),
('U005', 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'arman', '66059a527018b32e4597dd27574929f6'),
(6, 'helm', 'e7d07ed8aa8dd8cafce4a527a523d6c5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_master`
--
ALTER TABLE `data_master`
  ADD PRIMARY KEY (`id_master`),
  ADD KEY `id_produk` (`id_produk`,`id_ukuran`),
  ADD KEY `ukuran_master` (`id_ukuran`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_faktur`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `ukuran_helm`
--
ALTER TABLE `ukuran_helm`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_master`
--
ALTER TABLE `data_master`
  ADD CONSTRAINT `master_id` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE,
  ADD CONSTRAINT `ukuran_master` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran_helm` (`id_ukuran`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
