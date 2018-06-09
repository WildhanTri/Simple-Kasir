-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Jun 2018 pada 21.23
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori_barang` int(11) NOT NULL,
  `stok_barang` int(40) NOT NULL,
  `harga_barang` int(40) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori_barang`, `stok_barang`, `harga_barang`, `created_on`, `updated_on`, `deleted_on`) VALUES
('0C8KL', 'Mentos', 1, 50, 4000, '2018-04-25 16:12:30', NULL, NULL),
('EHYBO', 'Silver Queen', 1, 45, 11000, '2018-04-22 23:05:00', NULL, NULL),
('JWUDO', 'Cheetos Ukuran kecil', 1, 45, 3000, '2018-04-22 23:03:13', NULL, NULL),
('PHXPS', 'Pocari Sweet', 1, 50, 6000, '2018-04-22 23:03:31', NULL, NULL),
('ZM3TX', 'Aqua 200ml', 1, 50, 4000, '2018-04-22 14:20:34', NULL, NULL),
('ZQN7Q', 'Beng Beng', 1, 100, 2000, '2018-04-22 23:03:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_kategori`
--

CREATE TABLE `barang_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_kategori`
--

INSERT INTO `barang_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan & Minuman'),
(2, 'Alat Kebersihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `total_harga_belanja` int(50) NOT NULL,
  `jumlah_bayar` int(50) NOT NULL,
  `jumlah_kembali` int(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total_harga_belanja`, `jumlah_bayar`, `jumlah_kembali`, `id_user`, `created_on`, `deleted_on`) VALUES
(4, 31000, 35000, 4000, 1, '2018-04-25 18:51:34', NULL),
(5, 14000, 20000, 6000, 1, '2018-05-05 00:36:07', NULL),
(6, 14000, 20000, 6000, 1, '2018-05-05 00:37:27', NULL),
(7, 11000, 20000, 9000, 1, '2018-05-05 00:41:04', NULL),
(8, 9000, 20000, 11000, 1, '2018-05-05 00:41:15', NULL),
(9, 0, 0, 0, 1, '2018-05-05 00:41:29', NULL),
(10, 2000, 15000, 13000, 1, '2018-05-05 00:41:47', NULL),
(11, 8000, 10000, 2000, 1, '2018-05-05 00:42:13', NULL),
(12, 6000, 10000, 4000, 1, '2018-05-05 00:42:24', NULL),
(13, 0, 0, 0, 1, '2018-05-05 00:42:31', NULL),
(14, 0, 0, 0, 1, '2018-05-05 00:42:32', NULL),
(15, 19000, 20000, 1000, 1, '2018-05-12 11:29:33', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `qty_barang` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_barang`, `qty_barang`) VALUES
(4, 4, 'ehybo', 1),
(5, 4, 'zm3tx', 5),
(6, 6, 'ehybo', 1),
(7, 6, 'jwudo', 1),
(8, 7, 'ehybo', 1),
(9, 8, 'jwudo', 3),
(10, 10, 'zqn7q', 1),
(11, 11, '0C8KL', 1),
(12, 11, 'zm3tx', 1),
(13, 12, 'phxps', 1),
(14, 15, 'ehybo', 1),
(15, 15, '0C8KL ', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kategori_barang` (`kategori_barang`);

--
-- Indexes for table `barang_kategori`
--
ALTER TABLE `barang_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_kategori`
--
ALTER TABLE `barang_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_barang`) REFERENCES `barang_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
