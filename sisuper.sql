-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Mar 2021 pada 09.14
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisuper`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_rt`
--

CREATE TABLE `daftar_rt` (
  `idRT` int(3) NOT NULL,
  `namaRT` varchar(3) NOT NULL,
  `ttdRT` varchar(255) NOT NULL,
  `capRT` varchar(255) NOT NULL,
  `idUser` int(3) NOT NULL,
  `idRW` int(3) NOT NULL,
  `keteranganRT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_rt`
--

INSERT INTO `daftar_rt` (`idRT`, `namaRT`, `ttdRT`, `capRT`, `idUser`, `idRW`, `keteranganRT`) VALUES
(1, '003', 'ttd-RT003.png', 'cap-RT003.png', 3, 1, '');

--
-- Trigger `daftar_rt`
--
DELIMITER $$
CREATE TRIGGER `idRT` BEFORE INSERT ON `daftar_rt` FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT idRT AS Nomer
FROM daftar_rt ORDER BY Nomer DESC LIMIT 1);
 

 
IF(NEW.idRT IS NULL OR NEW.idRT = '')
 THEN SET NEW.idRT =i+1;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_rw`
--

CREATE TABLE `daftar_rw` (
  `idRW` int(3) NOT NULL,
  `namaRW` varchar(3) NOT NULL,
  `ttdRW` varchar(255) NOT NULL,
  `capRW` varchar(255) DEFAULT NULL,
  `idUser` int(3) NOT NULL,
  `keteranganRW` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_rw`
--

INSERT INTO `daftar_rw` (`idRW`, `namaRW`, `ttdRW`, `capRW`, `idUser`, `keteranganRW`) VALUES
(1, '005', 'ttd-RW005.png', 'cap-RW005.png', 2, '');

--
-- Trigger `daftar_rw`
--
DELIMITER $$
CREATE TRIGGER `idRW` BEFORE INSERT ON `daftar_rw` FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT idRW AS Nomer
FROM daftar_rw ORDER BY Nomer DESC LIMIT 1);
 

 
IF(NEW.idRW IS NULL OR NEW.idRW = '')
 THEN SET NEW.idRW =i+1;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `idPenduduk` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `tempatLahir` varchar(25) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `kewarganegaraan` varchar(5) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `idRW` int(3) NOT NULL,
  `idRT` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`idPenduduk`, `nama`, `NIK`, `jenisKelamin`, `tempatLahir`, `tanggalLahir`, `kewarganegaraan`, `agama`, `status`, `pendidikan`, `pekerjaan`, `alamat`, `idRW`, `idRT`) VALUES
(1, 'Angga Dharma Iswara', '3374121509990001', 'L', 'Semarang', '1999-09-15', 'WNI', 'Islam', 'Belum Kawin', 'SMA / SMK / MA / Sederajat', 'Pelajar / Mahasiswa', 'Jalan Gatotkaca', 1, 1);

--
-- Trigger `penduduk`
--
DELIMITER $$
CREATE TRIGGER `idPenduduk` BEFORE INSERT ON `penduduk` FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT idPenduduk AS Nomer
FROM penduduk ORDER BY Nomer DESC LIMIT 1);
 

 
IF(NEW.idPenduduk IS NULL OR NEW.idPenduduk = '')
 THEN SET NEW.idPenduduk =i+1;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_pengantar`
--

CREATE TABLE `surat_pengantar` (
  `idSurat` int(6) NOT NULL,
  `nomorSurat` varchar(25) NOT NULL,
  `idPenduduk` int(6) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `idRT` int(3) NOT NULL,
  `validasiRT` varchar(15) NOT NULL,
  `idRW` int(3) NOT NULL,
  `validasiRW` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `surat_pengantar`
--
DELIMITER $$
CREATE TRIGGER `idSurat` BEFORE INSERT ON `surat_pengantar` FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT idSurat AS Nomer
FROM surat_pengantar ORDER BY Nomer DESC LIMIT 1);
 

 
IF(NEW.idSurat IS NULL OR NEW.idSurat = '')
 THEN SET NEW.idSurat =i+1;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nomorTelepon` varchar(16) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `nama`, `username`, `password`, `nomorTelepon`, `level`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 1),
(2, ' Mustagfirin', 'ketuarw', '62b24570785838eb7c7dc9f00138cde1', '', 2),
(3, ' Jupri', 'ketuart', '0106e31bafb7e819308a2ea4ebeb3c02', '', 3),
(4, ' Angga', 'angga', '8479c86c7afcb56631104f5ce5d6de62', '', 2);

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `idUser` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
DECLARE s VARCHAR(5);
DECLARE i INTEGER;
 
SET i = (SELECT idUser AS Nomer
FROM user ORDER BY Nomer DESC LIMIT 1);
 

 
IF(NEW.idUser IS NULL OR NEW.idUser = '')
 THEN SET NEW.idUser =i+1;
END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_rt`
--
ALTER TABLE `daftar_rt`
  ADD PRIMARY KEY (`idRT`),
  ADD KEY `fk_user` (`idUser`),
  ADD KEY `fk_rw` (`idRW`);

--
-- Indeks untuk tabel `daftar_rw`
--
ALTER TABLE `daftar_rw`
  ADD PRIMARY KEY (`idRW`),
  ADD UNIQUE KEY `namaRW` (`namaRW`),
  ADD KEY `fk_user` (`idUser`) USING BTREE;

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`idPenduduk`),
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD KEY `fk_rt` (`idRT`),
  ADD KEY `fk_rw2` (`idRW`);

--
-- Indeks untuk tabel `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  ADD PRIMARY KEY (`idSurat`),
  ADD UNIQUE KEY `nomorSurat` (`nomorSurat`),
  ADD KEY `fk_rt2` (`idRT`),
  ADD KEY `fk_rw3` (`idRW`),
  ADD KEY `fk_penduduk` (`idPenduduk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_rt`
--
ALTER TABLE `daftar_rt`
  MODIFY `idRT` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `daftar_rw`
--
ALTER TABLE `daftar_rw`
  MODIFY `idRW` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `idPenduduk` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  MODIFY `idSurat` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_rt`
--
ALTER TABLE `daftar_rt`
  ADD CONSTRAINT `fk_rw` FOREIGN KEY (`idRW`) REFERENCES `daftar_rw` (`idRW`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Ketidakleluasaan untuk tabel `daftar_rw`
--
ALTER TABLE `daftar_rw`
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Ketidakleluasaan untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `fk_rt` FOREIGN KEY (`idRT`) REFERENCES `daftar_rt` (`idRT`),
  ADD CONSTRAINT `fk_rw2` FOREIGN KEY (`idRW`) REFERENCES `daftar_rw` (`idRW`);

--
-- Ketidakleluasaan untuk tabel `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  ADD CONSTRAINT `fk_penduduk` FOREIGN KEY (`idPenduduk`) REFERENCES `penduduk` (`idPenduduk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
