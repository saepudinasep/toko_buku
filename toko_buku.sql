-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2020 pada 13.46
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `noisbn` varchar(20) NOT NULL,
  `penulis` varchar(60) NOT NULL,
  `penerbit` varchar(60) NOT NULL,
  `tahun` year(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `ppn`, `diskon`) VALUES
(1, 'Codeighniter', '8967123', 'Muhammad Massa', 'Erlangga', 1997, 98, 90000, 100000, 10000, 20000),
(2, 'Laravel', '23232', 'Ahmadi', 'Erlangga', 1998, 106, 62000, 60000, 6000, 4000),
(3, 'Bahasa Arab', '12356', 'Muhammad Faisal', 'Erlangga', 1989, 92, 25000, 30000, 2000, 3000),
(5, 'Web Programming', '65234', 'Yuniar Supardi', 'Defri Faizal Maulana', 1989, 94, 30000, 35000, 2000, 3000),
(6, 'Laravel Versi 2', '766617', 'Muhammad', 'Erlangga', 1990, 92, 40000, 45000, 3000, 3000),
(7, 'Sinau', '323232', 'Muhammad Masahu', 'Erlangga', 1998, 92, 40000, 45000, 3000, 4000),
(8, 'Sekolah Ajaib', '566565', 'Mamat Samsudin', 'Erlangga', 1990, 94, 30000, 35000, 2000, 3000),
(9, 'Pemrograman Berorientasi Objek', '78878199', 'Muhammad Nasidin', 'Erlangga', 1993, 90, 46000, 50000, 4000, 3000),
(10, 'Belajar PHP', '126781', 'Ahmadi', 'Erlangga', 0000, 92, 34000, 40000, 3000, 2000),
(11, 'Belajar Bootstrap', '8900198', 'Muhammadin', 'Erlangga', 1994, 94, 36000, 40000, 3000, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_distributor`
--

CREATE TABLE `tb_distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_distributor`
--

INSERT INTO `tb_distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(1, 'PT Indosat', 'Jln. Cikeusik Cidahu', '087821485664'),
(2, 'PT Complate Seluler', 'Ciledug, Kecamatan Ciledug', '087821485664'),
(3, 'PT Abadi Jaya', 'Jl. Ciredug Kec. Ciledug Kab. Cirebon', '081356738910'),
(4, 'PT Cipta Rasa', 'Jl Raya Tuparev Cirebon', '087823427861'),
(5, 'PT Gemar Membaca', 'Jln. Siliwangi, Kec. Gunungjati Kab. Cirebon', '081721486723'),
(6, 'PT Toko Eceran', 'Jln. Cidahu Kec. Cidahu Kab. Cirebon', '081789162453');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jual`
--

CREATE TABLE `tb_jual` (
  `id_jual` varchar(10) NOT NULL,
  `total` varchar(50) NOT NULL,
  `uang` varchar(50) NOT NULL,
  `kembali` varchar(50) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jual`
--

INSERT INTO `tb_jual` (`id_jual`, `total`, `uang`, `kembali`, `id_kasir`, `tanggal`) VALUES
('PJN0001', '248000', '300000', '52000', 5, '2020-05-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kasir`
--

CREATE TABLE `tb_kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kasir`
--

INSERT INTO `tb_kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `akses`) VALUES
(1, 'Asep Saepudin', 'Desa Ciuyah, Kecamatan Waled, Kab Cirebon', '085721485664', 'aktif', 'mas_asep', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Adib Nur Malik', 'Desa Ciuyah, Kec. Waled', '081821485664', 'aktif', 'kasir', 'de28f8f7998f23ab4194b51a6029416f', 'kasir'),
(5, 'Yunan Kali', 'Desa Kananga', '0896752435786', 'aktif', 'yunan', '78679de03259b1667267002a9c58888e', 'kasir'),
(6, 'Chintya Sari', 'Desa Darmaguna', '0895372310562', 'aktif', 'chintya', 'chintya123', 'kasir'),
(7, 'Kasdiri', 'Desa Mekarsari', '082130142958', 'aktif', 'kasdiri', 'kasdiri123', 'kasir'),
(8, 'Fahmi Solihin', 'Desa Ciuyah, Kec. Waled Kab. Cirebon', '087821345682', 'aktif', 'fahmi_solihin', '41851c2c39e9729d51870dc74e098950', 'kasir'),
(9, 'Fachrudin Ariyanto', 'Desa Pasaleman Kecamatan Waled Kabupaten Cirebon', '083178931234', 'aktif', 'ariyanto', '564bbcf07eb8a6c0c05613df8b7e23e3', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `jumlah` varchar(40) NOT NULL,
  `jumlah_harga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_buku`, `id_kasir`, `jumlah`, `jumlah_harga`) VALUES
(5, 1, 2, '2', '180000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasok`
--

CREATE TABLE `tb_pasok` (
  `id_pasok` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasok`
--

INSERT INTO `tb_pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(8, 1, 1, 7, '05-05-2020'),
(10, 1, 1, 9, '05-05-2020'),
(11, 1, 2, 10, '05-05-2020'),
(12, 2, 2, 5, '05-05-2020'),
(13, 4, 6, 10, '06-05-2020'),
(14, 5, 3, 10, '06-05-2020'),
(15, 6, 5, 15, '06-05-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_harga` varchar(50) NOT NULL,
  `id_jual` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `id_buku`, `jumlah`, `jumlah_harga`, `id_jual`) VALUES
(33, 2, 2, '124000', 'PJN0001'),
(34, 2, 2, '124000', 'PJN0001');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_distributor`
--
ALTER TABLE `tb_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indeks untuk tabel `tb_jual`
--
ALTER TABLE `tb_jual`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indeks untuk tabel `tb_kasir`
--
ALTER TABLE `tb_kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indeks untuk tabel `tb_pasok`
--
ALTER TABLE `tb_pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_distributo` (`id_distributor`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_jual` (`id_jual`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_distributor`
--
ALTER TABLE `tb_distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_kasir`
--
ALTER TABLE `tb_kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pasok`
--
ALTER TABLE `tb_pasok`
  MODIFY `id_pasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pasok`
--
ALTER TABLE `tb_pasok`
  ADD CONSTRAINT `tb_pasok_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `tb_distributor` (`id_distributor`),
  ADD CONSTRAINT `tb_pasok_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`);

--
-- Ketidakleluasaan untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
