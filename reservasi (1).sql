-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 11:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `level_user` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `level_user`, `name`, `email`, `password`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', '123456'),
(2, 2, 'M. Umam Al-Farizi', 'umam@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Engagement'),
(3, 'Pre-Wedding Indoor'),
(4, 'Wedding'),
(7, 'Couple'),
(8, 'Group'),
(9, 'Class Photo'),
(10, 'Pre-Wedding Outdoor');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_paket` varchar(50) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_paket` varchar(128) DEFAULT NULL,
  `harga` varchar(128) DEFAULT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `stock` bigint(20) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `ketentuan` text DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `id_kategori`, `nama_paket`, `harga`, `diskon`, `stock`, `deskripsi`, `ketentuan`, `gambar`) VALUES
(13, 3, 'Prewed Indoor A', '900000', 0, NULL, '<ul><li>2x menggunakan kostum pribadi</li><li>6 foto yang diedit + cetak </li><li>1 foto ukuran 20R</li><li>1 foto ukuran 12R</li><li>1 foto ukuran 10R</li><li>3 foto ukuran 4R </li><li>2 jam sesi foto </li><li>CD seluruh file pemotretan</li></ul>', '<ol><li>Pemotretan dilakukan di studi Selecta Photo &amp; Videography</li><li>Pemotretan dilakukan pada pukul 09:00-16:00</li><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Untuk pemotretan di studio dapat dilakukan 1 hari kerja setelah pembayaran diterima dan dikonfirmasi oleh pihak Selecta.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li></ol>', 'photostudio4.jpg'),
(14, 3, 'Prewed Indoor B', '1000000', 0, NULL, '<ul><li>2x menggunakan kostum pribadi</li><li>9 foto yang diedit + cetak</li><li>1 foto ukuran 20R</li><li>2 foto ukuran 12R</li><li>2 foto ukuran 10R</li><li>4 foto ukuran 4R</li><li>2 jam sesi foto</li><li>CD seluruh file pemotretan</li></ul>', '<ol><li>Pemotretan dilakukan di studi Selecta Photo &amp; Videography</li><li>Pemotretan dilakukan pada pukul 09:00-16:00</li><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Untuk pemotretan di studio dapat dilakukan 1 hari kerja setelah pembayaran diterima dan dikonfirmasi oleh pihak Selecta.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li></ol>', 'photostudio5.jpg'),
(15, 10, 'Prewed Outdoor A', '1300000', 0, NULL, '<ul><li>Minimal H-7 sebelum rencana Outdoor, atur waktu bertemu fotografer dengan menghubungi contact person yang telah disediakan, tentukan tema, lokasi foto dan pemilihan pakaian yang akan digunakan. </li><li>Garansi Cuaca, jika hari H rencana prewed ternyata hujan, maka diundur dilain hari setelahnya.</li><li>Akomodasi makan, minum dan transport ditanggung oleh client.</li><li>9 foto yang diedit + cetak</li><li>2 foto ukuran 20R</li><li>1 foto ukuran 12R</li><li>1 foto ukuran 10R</li><li>1 foto ukuran 5R</li><li>4 fotoukuran 4R</li><li>1 fotografer</li><li>3 jam sesi pemotretan</li><li>File transfer via google drive</li></ul>', '<ol><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Proses pengerjaan untuk pre-wedding outdoor maksimal 1 bulan dari hari pemotretan.</li><li>Apabila pada saat tanggal kegiatan/acara (Hari-H) terjadi pembatalan karena kondisi khusus seperti tempat yang tidak memenuhi syarat untuk peralatan kami, seperti bencana alam dan atau hal lain yang bisa menyebabkan resiko kerugian pada pihak kami, maka biaya transport+biaya dp 10% tidak bisa dikembalikan.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li><li>Selecta tidak bertanggung jawab untuk setiap kerusakan pesanan yang terjadi setelah lewatnya jangka waktu 3 bulan sejak tanggal selesai pesanan.</li></ol>', 'pre2.jpg'),
(16, 10, 'Prewed Outdoor B', '1500000', 0, NULL, '<ul><li>Minimal H-7 sebelum rencana Outdoor, atur waktu bertemu fotografer dengan menghubungi contact person yang telah disediakan, tentukan tema, lokasi foto dan pemilihan pakaian yang akan digunakan. </li><li>Garansi Cuaca, jika hari H rencana prewed ternyata hujan, maka diundur dilain hari setelahnya.</li><li>Akomodasi makan, minum dan transport ditanggung oleh client.</li><li>18 foto yang diedit + cetak</li><li>2 foto ukuran 20R</li><li>2 foto ukuran 12R</li><li>2 foto ukuran 10R</li><li>2 foto ukuran 5R</li><li>10 fotoukuran 4R</li><li>1 fotografer</li><li>3 jam sesi pemotretan</li><li>File transfer via google drive</li></ul>', '<ol><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Proses pengerjaan untuk pre-wedding outdoor maksimal 1 bulan dari hari pemotretan.</li><li>Apabila pada saat tanggal kegiatan/acara (Hari-H) terjadi pembatalan karena kondisi khusus seperti tempat yang tidak memenuhi syarat untuk peralatan kami, seperti bencana alam dan atau hal lain yang bisa menyebabkan resiko kerugian pada pihak kami, maka biaya transport+biaya dp 10% tidak bisa dikembalikan.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li><li><p class=\"MsoNormal\">Selecta tidak bertanggung jawab untuk setiap kerusakan pesanan yang terjadi setelah lewatnya jangka waktu 3 bulan dari sejak tanggal selesai pesanan.</p></li></ol>', 'pre3.jpg'),
(17, 4, 'Paket Hemat ', '1300000', 0, NULL, '<ul><li>Akad dan Resepsi</li><li>1 hari acara</li><li>8 jam liputan di rumahan atau 4 jam liputan di gedung/ hotel/ resto</li><li>Free transport Malausma Majalengka</li><li>Mendapatkan 1 Album 10 sheet poto</li><li>1 Disk Video</li><li>Flashdisk seluruh file pemotretan</li></ul>', '<ol><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Proses pengerjaan untuk wedding maksimal 2 bulan dari hari pemotretan.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li><li><p class=\"MsoNormal\">Selecta tidak bertanggung jawab untuk setiap kerusakan pesanan yang terjadi setelah lewatnya jangka waktu 3 bulan dari sejak tanggal selesai pesanan.</p></li></ol>', 'wedding1.jpg'),
(18, 4, 'Paket Standar', '1800000', 0, NULL, '<ul><li>Akad dan Resepsi</li><li>1 hari acara</li><li>8 jam liputan di rumahan atau 4 jam liputan di gedung/ hotel/ resto</li><li>Free transport Malausma Majalengka</li><li>Mendapatkan 1 Album 10 sheet poto</li><li>2 Disk Video</li><li>Flashdisk seluruh file pemotretan</li></ul>', '<ol><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Proses pengerjaan untuk wedding maksimal 2 bulan dari hari pemotretan.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li><li><p class=\"MsoNormal\">Selecta tidak bertanggung jawab untuk setiap kerusakan pesanan yang terjadi setelah lewatnya jangka waktu 3 bulan dari sejak tanggal selesai pesanan.</p></li></ol>', 'wedding2.jpg'),
(19, 4, 'Paket Cinematic', '3000000', 0, NULL, '<ul><li>Akad dan Resepsi</li><li>1 hari acara</li><li>8 jam liputan di rumahan atau 4 jam liputan di gedung/ hotel/ resto</li><li>Free transport Malausma Majalengka</li><li>Mendapatkan 1 Album 15 sheet poto</li><li>2 Disk Video</li><li>Video Cinematic Full 5-8 menit</li><li>Video Cinematic Klip 1-2 menit</li><li>Flashdisk seluruh file pemotretan</li></ul>', '<ol><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Proses pengerjaan untuk wedding maksimal 2 bulan dari hari pemotretan.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li><li><p class=\"MsoNormal\">Selecta tidak bertanggung jawab untuk setiap kerusakan pesanan yang terjadi setelah lewatnya jangka waktu 3 bulan dari sejak tanggal selesai pesanan.</p></li></ol>', 'wedding4.jpg'),
(20, 2, 'Paket Hemat Tunangan', '700000', 0, NULL, '<ul><li>1 Fotografer</li><li>3 jam liputan di rumah atau di gedung/ hotel/ resto</li><li>Foto only</li><li>File only</li><li>Sudah termasuk foto editing terbaik</li><li>Free transport Malausma Majalengka</li><li>Transfer file via google drive</li></ul>', '<ol><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Untuk pemotretan di studio dapat dilakukan 1 hari kerja setelah pembayaran diterima dan dikonfirmasi oleh pihak Selecta.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li><li><p class=\"MsoNormal\">Selecta tidak bertanggung jawab untuk setiap kerusakan pesanan yang terjadi setelah lewatnya jangka waktu 3 bulan dari sejak tanggal selesai pesanan.</p></li></ol>', 'engagement1.jpg'),
(21, 2, 'Paket Standar Tunangan', '1400000', 0, NULL, '<ul><li>1 Fotografer</li><li>3 jam liputan di rumah atau di gedung/ hotel/ resto</li><li>Foto dan Video Dokumentasi</li><li>Cetak foto ukuran 10R plus frame</li><li>Video dokumentasi</li><li>Sudah termasuk foto editing terbaik</li><li>Free transport Malausma Majalengka</li><li>1 Flashdisk</li></ul>', '<ol><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Untuk pemotretan di studio dapat dilakukan 1 hari kerja setelah pembayaran diterima dan dikonfirmasi oleh pihak Selecta.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li><li><p class=\"MsoNormal\">Selecta tidak bertanggung jawab untuk setiap kerusakan pesanan yang terjadi setelah lewatnya jangka waktu 3 bulan dari sejak tanggal selesai pesanan.</p></li></ol>', 'engagement3.jpg'),
(22, 2, 'Paket Cinematic Tunangan', '1800000', 0, NULL, '<ul><li>1 Fotografer</li><li>1 Videografer</li><li>3 jam liputan di rumah atau di gedung/ hotel/ resto</li><li>Foto dan Video cinematc</li><li>Cetak foto ukuran 12R plus frame</li><li>Video klip cinematic 3 menit</li><li>Sudah termasuk foto editing terbaik</li><li>Free transport Malausma Majalengka</li><li>1 flashdisk</li></ul>', '<ol><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Untuk pemotretan di studio dapat dilakukan 1 hari kerja setelah pembayaran diterima dan dikonfirmasi oleh pihak Selecta.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li><li><p class=\"MsoNormal\">Selecta tidak bertanggung jawab untuk setiap kerusakan\r\npesanan yang terjadi setelah lewatnya jangka waktu 3 bulan dari sejak tanggal\r\nselesai pesanan.<o:p></o:p></p></li></ol>', 'engagement2.jpg'),
(23, 7, 'Paket Studio Couple', '150000', 0, NULL, '<ul><li>2x menggunakan kostum pribadi</li><li>10x shoot</li><li>Bebas pilih warna backdrop (1 warna backdrop)</li><li>5 foto editing terbaik</li><li>1 foto ukuran 5R</li></ul>', '<ol><li>Pemotretan dilakukan di studi Selecta Photo &amp; Videography</li><li>Pemotretan dilakukan pada pukul 09:00-16:00</li><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Untuk pemotretan di studio dapat dilakukan 1 hari kerja setelah pembayaran diterima dan dikonfirmasi oleh pihak Selecta.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li></ol>', 'photostudio2.jpg'),
(24, 8, 'Paket Studio Group A', '120000', 0, NULL, '<ul><li>2-5 orang</li><li>2x menggunakan kostum pribadi</li><li>10x shoot</li><li>5 foto editing terbaik</li><li>1 foto ukuran 5R</li><li>Bebas pilih warna backdrop (1 warna backdrop)</li></ul>', '<ol><li>Pemotretan dilakukan di studi Selecta Photo & Videography</li><li>Pemotretan dilakukan pada pukul 09:00-16:00</li><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Untuk pemotretan di studio dapat dilakukan 1 hari kerja setelah pembayaran diterima dan dikonfirmasi oleh pihak Selecta.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li></ol>', 'group1.jpg'),
(25, 8, 'Paket Studio Group B', '170000', 0, NULL, '<ul style=\"white-space: nowrap;\"><li>6-10 orang</li><li>2x menggunakan kostum pribadi</li><li>10x shoot</li><li>5 foto editing terbaik</li><li>1 foto ukuran 5R</li><li>Bebas pilih warna backdrop (1 warna backdrop)</li></ul>', '<ol><li>Pemotretan dilakukan di studi Selecta Photo & Videography</li><li>Pemotretan dilakukan pada pukul 09:00-16:00</li><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Untuk pemotretan di studio dapat dilakukan 1 hari kerja setelah pembayaran diterima dan dikonfirmasi oleh pihak Selecta.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li></ol>', 'group2.jpg'),
(26, 9, 'Paket Studio Class Photo A', '250000', 0, NULL, '<ul style=\"white-space: nowrap;\"><li>11-20 orang</li><li>2x menggunakan kostum pribadi</li><li>10x shoot</li><li>5 foto editing terbaik</li><li>1 foto ukuran 5R</li><li>Bebas pilih warna backdrop (1 warna backdrop)</li></ul>', '<ol><li>Pemotretan dilakukan di studi Selecta Photo & Videography</li><li>Pemotretan dilakukan pada pukul 09:00-16:00</li><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Untuk pemotretan di studio dapat dilakukan 1 hari kerja setelah pembayaran diterima dan dikonfirmasi oleh pihak Selecta.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li></ol>', 'class.jpg'),
(27, 9, 'Paket Studio Class Photo B', '350000', 0, NULL, '<ul style=\"white-space: nowrap;\"><li>21-30 orang</li><li>2x menggunakan kostum pribadi</li><li>10x shoot</li><li>5 foto editing terbaik</li><li>1 foto ukuran 5R</li><li>Bebas pilih warna backdrop (1 warna backdrop)</li></ul>', '<ol><li>Pemotretan dilakukan di studi Selecta Photo & Videography</li><li>Pemotretan dilakukan pada pukul 09:00-16:00</li><li>Untuk booking paket dikenakan DP/Uang muka 10% dari harga paket.</li><li>Jika client melakukan pembayaran full cash maka akan mendapatkan cashback 10%.</li><li>Apabila ada pembatalan sepihak, maka DP tidak dapat dikembalikan.</li><li>Jika client ada perubahan jadwal maka client harus mengkonfirmasi terlebih dahulu melalui contact person Selecta.</li><li>Untuk pemotretan di studio dapat dilakukan 1 hari kerja setelah pembayaran diterima dan dikonfirmasi oleh pihak Selecta.</li><li>Pemilihan foto hanya dapat dilakukan di studi Selecta.</li><li>Pemilihan foto dapat dilakukan 2-3 hari kerja setelah hari pemotretan syarat dan ketentuan untuk masing-masing paket berlaku.</li><li>File diberikan sesuai dengan fasilitas yang ada pada masing-masing paket.</li><li>Promo, paket, harga dan fasilitas online booking dapat berubah sewaktu – waktu tanpa pemberitahuan sebelumnya.</li><li>Syarat dan ketentuan untuk setiap paket sudah tertera di dalam detail paket masing-masing.</li><li>Tebus pose dan penambahan cetak mengikuti harga yang berlaku di Selecta.</li><li>Client yang sudah melakukan pembookingan online dianggap sudah mengerti syarat dan ketentuan yang sudah berlaku.</li><li>Syarat dan ketentuan tidak dapat diubah.</li></ol>', 'class2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `no_tlpn` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `name`, `no_tlpn`, `email`, `password`) VALUES
(1, 'dilla', '089123762517', 'dilla@gmail.com', '12345678'),
(2, 'julfa', '085741245782', 'julfa@gmial.com', '123456789'),
(3, 'DeyanaAmelia', '08912345678', 'deyana@gmail.com', '12345678'),
(4, 'hana', '0857469821453', 'hana@gmail.com', '123456789'),
(5, 'Dilla Siti Dzulfia', '089657791052', 'dillasdz2803@gmail.com', '12345678'),
(6, 'Syifa Nada', '0897654321543', 'syifanada@gmail.com', 'syifa123');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `no_pesan` varchar(50) DEFAULT NULL,
  `qty` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_paket`, `no_pesan`, `qty`) VALUES
(1, 13, '20211101PYO0B9XS', ''),
(2, 18, '2021110670TY1LFW', ''),
(3, 16, '202111061ZEP07I6', ''),
(4, 14, '202111061ZEP07I6', ''),
(5, 25, '202111061ZEP07I6', ''),
(6, 27, '202111148FB0FC7L', ''),
(7, 26, '20211114QPESOTIY', ''),
(8, 25, '20211114QPESOTIY', ''),
(9, 13, '20211114D16GCUVG', ''),
(10, 26, '20211114FMUEXDVR', ''),
(11, 24, '202111140RPSOMD8', ''),
(12, 26, '20211114WOQ20ZB7', ''),
(13, 27, '20211115OTFWIDNU', ''),
(14, 20, '20211117TM8EZHRA', ''),
(15, 17, '2021111704VMZ1GV', ''),
(16, 25, '20211125RBH58WS7', ''),
(17, 26, '20211129P3ZVSYRB', ''),
(18, 24, '20220130C7XMIG2M', ''),
(19, 25, '20220306KUXFZPCA', ''),
(20, 27, '20220306L1JC9V8O', ''),
(21, 13, '20220306WUPSNRNI', ''),
(22, 27, '202203065OTQJAMU', ''),
(23, 26, '20220306QNZWTWEY', '');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `no_pesan` varchar(50) DEFAULT NULL,
  `nama_pelanggan` varchar(128) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `tanggal_jadwal` date DEFAULT NULL,
  `status_pesan` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `bayar` varchar(128) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `pembayaran` varchar(128) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `catatan_batal` text DEFAULT NULL,
  `followup` text DEFAULT NULL,
  `followup_bayar` varchar(128) DEFAULT NULL,
  `checked` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `id_paket`, `no_pesan`, `nama_pelanggan`, `tgl_order`, `tanggal_jadwal`, `status_pesan`, `status_bayar`, `status`, `jumlah_bayar`, `bayar`, `atas_nama`, `nama_bank`, `no_rek`, `bukti_bayar`, `pembayaran`, `catatan`, `catatan_batal`, `followup`, `followup_bayar`, `checked`) VALUES
(1, 1, NULL, '20211114QPESOTIY', 'wulandari', '2021-11-14', '2021-11-15', 3, 1, NULL, 350000, '100000', 'dilla', 'bni', NULL, 'Alucard_Gloves.jpg', 'DP', 'pembayaran sisa 25000', NULL, 'mohon segera datang besok', 'sisa ayar 250000', 1),
(2, 1, NULL, '20211114D16GCUVG', 'wulandari', '2021-11-14', '2021-11-24', 1, 1, NULL, 900000, '900000', 'dilla', 'bri', NULL, 'Gud0c_on_Twitter2.jpg', 'cashback', NULL, NULL, NULL, NULL, 1),
(3, 1, NULL, '20211114FMUEXDVR', 'wulandari', '2021-11-14', '2021-11-30', 0, 1, NULL, 200000, '50000', 'wulan', 'bca', NULL, 'Shura_by_sXeven_on_DeviantArt.png', 'DP', NULL, NULL, NULL, NULL, 1),
(4, 1, NULL, '202111140RPSOMD8', 'samsul', '2021-11-14', '2021-11-26', 0, 1, NULL, 100000, '100000', 'dilla llla', 'bca', NULL, 'Alucard_Gloves1.jpg', NULL, NULL, NULL, NULL, NULL, 1),
(5, 1, NULL, '20211114WOQ20ZB7', 'jamal', '2021-11-14', '2021-11-23', 1, 1, NULL, 200000, '100000', 'Dillas', 'BCA', NULL, 'waterfall.png', 'cashback', NULL, NULL, NULL, NULL, 1),
(6, 1, NULL, '20211115OTFWIDNU', 'Dilla Siti', '2021-11-15', '2021-11-16', 4, 0, NULL, 300000, NULL, NULL, NULL, NULL, NULL, 'DP', NULL, 'Tidak Jadi', NULL, NULL, 1),
(7, 5, NULL, '20211117TM8EZHRA', 'Dilla Siti Dzulfia', '2021-11-17', '2021-11-27', 3, 1, NULL, 700000, '100000', 'Dilla Siti Dzulfia', 'BCA', NULL, 'waterfall.png', 'DP', NULL, NULL, 'H-1 hubungi kontak admin', 'sisa pembayaran Rp. 600.000', 1),
(8, 5, NULL, '2021111704VMZ1GV', 'Dilla Siti Dzulfia', '2021-11-17', '2021-12-05', 4, 0, NULL, 1300000, NULL, NULL, NULL, NULL, NULL, 'DP', NULL, 'Tidak Jadi', NULL, NULL, 1),
(9, 1, NULL, '20211125RBH58WS7', 'Dilla Siti Dzulfia', '2021-11-25', '2021-12-01', 0, 1, NULL, 150000, '50000', 'Dilla Siti Dzulfia', 'BCA', NULL, 'plankton.jpg', 'DP', NULL, NULL, NULL, NULL, 1),
(10, 1, NULL, '20211129P3ZVSYRB', 'Dilla Siti Dzulfia', '2021-11-29', '2021-12-02', 0, 0, NULL, 200000, NULL, NULL, NULL, NULL, NULL, 'DP', NULL, NULL, NULL, NULL, 1),
(11, 6, NULL, '20220130C7XMIG2M', 'Syifa Nada', '2022-01-30', '2022-02-05', 0, 0, NULL, 120000, NULL, NULL, NULL, NULL, NULL, 'DP', NULL, NULL, NULL, NULL, 1),
(12, 1, NULL, '20220306FLXGD7UO', 'dadi', '2022-03-06', '2022-03-23', 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(13, 1, NULL, '20220306KUXFZPCA', 'dadi', '2022-03-06', '2022-03-17', 0, 0, NULL, 170000, NULL, NULL, NULL, NULL, NULL, 'cashback', NULL, NULL, NULL, NULL, 1),
(14, 1, NULL, '20220306L1JC9V8O', 'jamal', '2022-03-06', '2022-03-28', 1, 1, NULL, 350000, '150000', 'dilla', 'bri', NULL, 'pexels-leonardo-vazquez-3591570.jpg', 'DP', NULL, NULL, NULL, NULL, 1),
(15, 1, NULL, '20220306WUPSNRNI', 'saya', '2022-03-06', '2022-03-26', 0, 0, NULL, 900000, NULL, NULL, NULL, NULL, NULL, 'cashback', NULL, NULL, NULL, NULL, 1),
(16, 1, NULL, '202203065OTQJAMU', NULL, '2022-03-06', '2022-03-25', 0, 0, NULL, 350000, NULL, NULL, NULL, NULL, NULL, 'cashback', NULL, NULL, NULL, NULL, 1),
(17, 1, NULL, '20220306QNZWTWEY', NULL, '2022-03-06', '2022-03-20', 0, 0, NULL, 250000, NULL, NULL, NULL, NULL, NULL, 'DP', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `diskon` varchar(128) DEFAULT NULL,
  `started_at` date DEFAULT NULL,
  `expired_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '32412356453', 'M. Umam Al-Farizi'),
(2, 'BNI', '54235653232', 'M. Umam Al-Farizi');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_riview` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `riview` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_riview`, `id_pelanggan`, `id_paket`, `name`, `tanggal`, `riview`, `status`) VALUES
(1, 1, 6, 'Admin', '2021-10-24', 'bagus', NULL),
(2, 1, 26, 'dilla', '2022-01-29', 'sangat bagus', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_riview`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_riview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
