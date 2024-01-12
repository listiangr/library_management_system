-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2022 pada 05.17
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.28

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
-- Struktur dari tabel `biblio`
--

CREATE TABLE `biblio` (
  `id_biblio` int(11) NOT NULL,
  `kode_biblio` varchar(255) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `nama_pengarang` varchar(255) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `jumlah_copy` varchar(255) NOT NULL,
  `sisa_copy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biblio`
--

INSERT INTO `biblio` (`id_biblio`, `kode_biblio`, `judul_buku`, `nama_pengarang`, `nama_penerbit`, `tahun_terbit`, `jumlah_copy`, `sisa_copy`) VALUES
(1, 'BB00001', ' Memahami Film', 'Himawan Pratists', 'Homerian Pustaka', '2008', '3', '3'),
(2, 'BB00002', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', '2005', '3', '3'),
(3, 'BB00003', 'Raksasa dari Jogja', 'Dwitasari', 'Plotpoint Publishing', '2012', '3', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi`
--

CREATE TABLE `koleksi` (
  `id_koleksi` int(11) NOT NULL,
  `id_biblio` int(11) NOT NULL,
  `noreg` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `koleksi`
--

INSERT INTO `koleksi` (`id_koleksi`, `id_biblio`, `noreg`, `status`) VALUES
(1, 1, 'BB1-RG00001', 'Tersedia'),
(2, 1, 'BB1-RG00002', 'Tersedia'),
(3, 1, 'BB1-RG00003', 'Tersedia'),
(4, 2, 'BB2-RG00001', 'Tersedia'),
(5, 2, 'BB2-RG00002', 'Tersedia'),
(6, 2, 'BB2-RG00003', 'Tersedia'),
(7, 3, 'BB3-RG00001', 'Tersedia'),
(8, 3, 'BB3-RG00002', 'Tidak Tersedia'),
(9, 3, 'BB3-RG00003', 'Tidak Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `kode_member` varchar(255) NOT NULL,
  `nama_member` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `alamat_email` varchar(255) NOT NULL,
  `alamat_rumah` varchar(255) NOT NULL,
  `tanggal_gabung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `kode_member`, `nama_member`, `jenis_kelamin`, `nomor_telepon`, `alamat_email`, `alamat_rumah`, `tanggal_gabung`) VALUES
(1, 'MB00001', 'Farrel Alvaro', 'Laki-laki', '089612345678', 'farrelalvaro@gmail.com', 'Jalan Limo, Depok, Jawa Barat.', '2022-06-01'),
(2, 'MB00002', 'Frisila Andini', 'Perempuan', '081234567890', 'frisillaandini@gmail.com', 'Jalan Pinus, Jakarta Selatan.', '2022-06-02'),
(3, 'MB00003', 'Anisa Salsabila', 'Perempuan', '083812345678', 'anisasalsabila@gmail.com', 'Jalan Merak, Bogor, Jawa Barat.', '2022-06-03'),
(4, 'MB00004', 'Haikal David', 'Laki-laki', '087712345678', 'haikaldavid@gmail.com', 'Jalan Bunga, Bekasi, Jawa Barat.', '2022-06-04'),
(5, 'MB00005', 'Adinda Putri', 'Perempuan', '085712345678', 'andiniputri@gmail.com', 'Jalan Matahari, Bekasi, Jawa Barat.', '2022-06-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sirkulasi`
--

CREATE TABLE `sirkulasi` (
  `id_sirkulasi` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_koleksi` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sirkulasi`
--

INSERT INTO `sirkulasi` (`id_sirkulasi`, `id_member`, `id_koleksi`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(1, 1, 1, '2022-06-05', '2022-06-12'),
(2, 3, 5, '2022-06-08', '2022-06-15'),
(3, 5, 9, '2022-06-15', '0000-00-00'),
(4, 4, 8, '2022-06-20', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biblio`
--
ALTER TABLE `biblio`
  ADD PRIMARY KEY (`id_biblio`);

--
-- Indeks untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id_koleksi`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `sirkulasi`
--
ALTER TABLE `sirkulasi`
  ADD PRIMARY KEY (`id_sirkulasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biblio`
--
ALTER TABLE `biblio`
  MODIFY `id_biblio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sirkulasi`
--
ALTER TABLE `sirkulasi`
  MODIFY `id_sirkulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
