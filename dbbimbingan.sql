-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2021 pada 07.26
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbimbingan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `no_bimbingan` int(11) NOT NULL,
  `no_kategori` varchar(9) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `waktu` date NOT NULL,
  `proses` varchar(10) NOT NULL,
  `catatan` text NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`no_bimbingan`, `no_kategori`, `nim`, `nip`, `status`, `waktu`, `proses`, `catatan`, `file`) VALUES
(1, '1', '236', '1', 'ACC', '2021-04-01', 'sudah', 'iya', 'Aja.pdf'),
(2, '1', '236', '12345', 'perbaiki', '2021-05-05', 'sudah', 'vdcxxcvxcv', 'asa.pdf'),
(3, '1', '236', '1', 'Pending', '2021-06-01', 'belum', 'belum ada catatan bimbingan.', 'bukti.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(30) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `password_dosen` varchar(50) NOT NULL,
  `no_golongan` varchar(20) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `password_dosen`, `no_golongan`, `pangkat`, `jabatan`, `foto_dosen`) VALUES
('12345', 'Andi', '827ccb0eea8a706c4c34a16891f84e7b', '2', 'Sjdj', 'Fjfjfj', 'IMG-20210421-WA0005.jpg'),
('1', 'Agusa', 'd8578edf8458ce06fbc5bb76a58c5ca4', '3', 'Rektor', 'Presiden', 'Screenshot_20210424_185646.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `no_golongan` int(3) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`no_golongan`, `golongan`, `keterangan`) VALUES
(2, 'IV', 'Golongan IV'),
(3, 'V', 'Golongan V'),
(4, 'III', 'Golongan III');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `no_jadwal` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tentang` text NOT NULL,
  `aktif` varchar(1) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`no_jadwal`, `nip`, `tentang`, `aktif`, `waktu`) VALUES
(1, '1', 'Dhdj', 'Y', '2021-05-05 02:25:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `no_kategori` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`no_kategori`, `nip`, `nim`, `nama_kategori`, `keterangan`) VALUES
(1, '1', '236', 'Bab 1', 'Dhhfjf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `password_mahasiswa` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `foto_mahasiswa` text NOT NULL,
  `baru` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nip`, `nama_mahasiswa`, `password_mahasiswa`, `judul`, `foto_mahasiswa`, `baru`) VALUES
('2361', '', 'Ayu', 'e10adc3949ba59abbe56e057f20f883e', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
('236', '1', 'udinn', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Dhfhfcjj', 'Screenshot (21).png', ''),
('123546', '', 'Dssf', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Ffedd', '', ''),
('111', '12345', 'Sfdd', '662fb41f9b5f6537a914be10afc762cc', 'Rffss', 'IMG-20210425-WA0026.jpg', ''),
('8087', '', 'Wrewsd', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Fghhgfgh', 'IMG-20210425-WA0025.jpg', ''),
('222', '', 'Dhsi', '57e2607071deb1c0cfa0fab4ef1f80f1', 'Sjdj', '', ''),
('333', '', 'Fftdth', '0166baed3db6917edb45d33e01a5e8db', 'Ggfg', 'IMG-20210425-WA0028.jpg', ''),
('2', '', 'ahmad', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'svdjfjkds sfnskdfnsdkj sdfnsdkjfn ds fsnsdngkj snk fsk ', 'IMG-20210113-WA0019.jpg', 't');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `no_pengumuman` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tentang` text NOT NULL,
  `aktif` varchar(1) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`no_pengumuman`, `nip`, `tentang`, `aktif`, `waktu`) VALUES
(1, '1', 'Fggff', 'Y', '2021-05-05 02:22:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `superadmin`
--

CREATE TABLE `superadmin` (
  `id_pengguna` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `password_pengguna` varchar(50) NOT NULL,
  `foto_pengguna` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `superadmin`
--

INSERT INTO `superadmin` (`id_pengguna`, `nama_pengguna`, `password_pengguna`, `foto_pengguna`) VALUES
('12', 'feby', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'IMG-20210421-WA0005.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `nip` varchar(40) NOT NULL,
  `acceess_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id`, `nip`, `acceess_token`) VALUES
(4, '1', 'fdgddf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `zoom`
--

CREATE TABLE `zoom` (
  `no` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `topik` text NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `durasi` int(3) NOT NULL,
  `password` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `zoom`
--

INSERT INTO `zoom` (`no`, `nip`, `nim`, `topik`, `waktu_mulai`, `durasi`, `password`, `link`) VALUES
(2, '1', '236', 'fsdkfbksdb', '2021-06-09 16:53:52', 30, 'fsdfnsdkj', 'dsfsxfbcsdnmxbfhjszhfasvdghcsvfcazghdcvjhzffdsjfnksdbfs');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`no_bimbingan`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`no_golongan`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`no_jadwal`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`no_kategori`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`no_pengumuman`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `zoom`
--
ALTER TABLE `zoom`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `no_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `no_golongan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `no_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `no_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `no_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `zoom`
--
ALTER TABLE `zoom`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
