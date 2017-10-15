-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Okt 2017 pada 11.52
-- Versi Server: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `tgl_daftar_skripsi` varchar(50) NOT NULL,
  `tgl_daftar_sidang` varchar(50) NOT NULL,
  `tgl_sidang` varchar(50) NOT NULL,
  `tgl_daftar_wisuda` varchar(50) NOT NULL,
  `tgl_wisuda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `tgl_daftar_skripsi`, `tgl_daftar_sidang`, `tgl_sidang`, `tgl_daftar_wisuda`, `tgl_wisuda`) VALUES
(0, '01 Agustus 2017', '07 September 2017', '12 September 2017', '01 Oktober 2017', '21 Oktober 2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `kd_daftar` int(15) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `sks` varchar(10) NOT NULL,
  `ipk` varchar(10) DEFAULT NULL,
  `judul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_daftar`
--

INSERT INTO `tb_daftar` (`kd_daftar`, `nim`, `sks`, `ipk`, `judul`) VALUES
(1, 'B001', '1', 'Sangat Bur', ''),
(6, '', '', '80', ''),
(7, '', '', '50', ''),
(8, '', '', '90', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_judul`
--

CREATE TABLE `tb_data_judul` (
  `kd_judul` varchar(15) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_data_judul`
--

INSERT INTO `tb_data_judul` (`kd_judul`, `judul`, `nim`, `nama`, `tahun`) VALUES
('10 maret 2017', '13.30 - 15.00', 'revisi bab 2', '', ''),
('12 mei 2018', '13.30 - 15.00', 'revisi bab I', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nidn` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_telp` text,
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`nidn`, `nama`, `alamat`, `jenis_kelamin`, `no_telp`, `email`) VALUES
('123345', 'tito', 'ciater', 'Pria', '088787', 'tito@gmail.com'),
('2012', 'budi gunawan', 'ciputat', 'Pria', '09878', 'budi@gamil.com'),
('3', 'wahyuni', 'pamulang', 'Wanita', '085790618556', 'Wahyuni@gmail.com'),
('4', 'sri', 'bandung', 'Wanita', '0867', 'sri@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dospem`
--

CREATE TABLE `tb_dospem` (
  `kd_dospem` varchar(15) NOT NULL,
  `nidn` varchar(15) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nilai` varchar(15) NOT NULL,
  `grade` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dospem`
--

INSERT INTO `tb_dospem` (`kd_dospem`, `nidn`, `nim`, `nilai`, `grade`, `status`) VALUES
('11234', '1', '195703221976012', '', '', ''),
('119570322197601', '2013142', '195705051983032', '', '', ''),
('119570505198303', '123', '1234', '', '', ''),
('119620829198403', '15677', '196208291984031', '', '', ''),
('20131421234', '2013142', '1234', '', '', ''),
('201314219570322', '2013142', '195703221976012', '', '', ''),
('201314219570505', '123', '195706051982072', '', '', ''),
('201314219620829', '15677', '195705051983032', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `nama`, `alamat`, `jenis_kelamin`, `no_telp`, `email`) VALUES
(2, '2013142', 'edi optimis', 'topsis ', 'Pria', '3.24'),
(3, '123', 'Edi sutrisno', 'topsis', '124', '3.50'),
(5, '1', 'agus', 'algoritma kmp', '125', '3.25'),
(2013142457, 'Fauzy', 'Bogor', 'Pria', '08892354974', 'mjfauzy@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hak_akses` enum('Admin','Mahasiswa','Dosen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `email`, `hak_akses`) VALUES
(1, 'edi sutrisno', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'edizputra@gmail.com', 'Admin'),
(5, 'bayu', 'bayu', '76e77f9de0f16322181c521512b15542', 'bayu@gmail.com', 'Mahasiswa'),
(7, 'fauzy', 'fauzy', 'b566e74bc2f087f12b6e0d6091941dcf', 'fauzy@gmail.com', 'Dosen'),
(8, 'Aries', 'aries', '381b74369a6fe8a69d3ea2a09b27fa2c', 'aries@gmail.com', 'Dosen'),
(11, 'eman', 'eman', '04ecff4292be7186a9fbfa186e83b87e', 'eman@gmail.com', 'Dosen'),
(12, 'dwi', 'dwi', 'cb6099d84521d8eacbbdc341be87419f', 'dwi@gmail.com', 'Dosen'),
(18, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`kd_daftar`);

--
-- Indexes for table `tb_data_judul`
--
ALTER TABLE `tb_data_judul`
  ADD PRIMARY KEY (`kd_judul`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `tb_dospem`
--
ALTER TABLE `tb_dospem`
  ADD PRIMARY KEY (`kd_dospem`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
