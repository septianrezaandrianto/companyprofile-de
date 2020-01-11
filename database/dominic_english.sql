-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 10:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dominic_english`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `username_admin` varchar(32) NOT NULL,
  `password_admin` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `username_admin`, `password_admin`, `akses_level`, `tanggal`) VALUES
(3, 'Septian Reza Andrianto', 'septianreza.bahana@gmail.com', 'rezaonline', 'rezaboys', 'Admin', '2019-12-29 11:03:10'),
(4, 'Dwi Purnomo', 'dwipurnomo@yahoo.com', 'dwipurnomo', '123456', 'User', '2019-12-30 12:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
`id_artikel` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `slug_artikel` varchar(255) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `gambar_artikel` varchar(255) NOT NULL,
  `status_artikel` enum('Publish','Draft','','') NOT NULL,
  `jenis_artikel` varchar(20) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_admin`, `id_kategori`, `slug_artikel`, `judul_artikel`, `isi_artikel`, `gambar_artikel`, `status_artikel`, `jenis_artikel`, `keywords`, `tanggal_post`, `tanggal`) VALUES
(6, 3, 2, 'beasiswa-tahfidz-gratis-belajar-selama-3-bulan', 'Beasiswa Tahfidz Gratis Belajar Selama 3 Bulan', '<p><strong>Beasiswa Tahfidz Gratis Belajar Selama 3 Bulan</strong></p>\r\n<p><em>Beasiswa Tahfidz Gratis Belajar Selama 3 Bulan</em></p>\r\n<p><span style="text-decoration: underline;">Beasiswa Tahfidz Gratis Belajar Selama 3 Bulan</span></p>', 'dec_logo.png', 'Publish', 'Profile', '<p>Beasiswa Tahfidz Gratis Belajar Selama 3 Bulan</p>', '2019-12-30 17:06:56', '2020-01-01 00:53:47'),
(8, 3, 1, 'beasiswa-buas-2', 'Beasiswa BUAS 2', '<p><em>Beasiswa BUAS</em></p>\r\n<p><strong>Beasiswa BUAS</strong></p>\r\n<p><span style="text-decoration: underline;">Beasiswa BUAS</span></p>', '74649508_2483192045261219_4309200873832062418_n.jpg', 'Publish', 'Artikel', '<p>Beasiswa BUAS</p>', '2019-12-30 17:56:51', '2020-01-01 06:57:15'),
(9, 3, 2, 'artikel-1', 'Artikel 1', '<p>Artikel 1</p>\r\n<p>v</p>\r\n<p>Artikel 1</p>\r\n<p>&nbsp;</p>\r\n<p>Artikel 1</p>\r\n<p>Artikel 1Artikel 1</p>', 'IMG_2489.jpg', 'Publish', 'Artikel', 'Artikel 1', '2020-01-02 08:01:24', '2020-01-02 07:01:24'),
(10, 3, 1, 'artikel-2', 'artikel 2', '<p>artikel 2</p>\r\n<p>a</p>\r\n<p>s</p>\r\n<p>sd</p>\r\n<p>s</p>\r\n<p>&nbsp;</p>\r\n<p>f</p>\r\n<p>dg</p>\r\n<p>&nbsp;</p>', 'IMG_2481.jpg', 'Publish', 'Artikel', 'artikel 2', '2020-01-02 08:01:58', '2020-01-02 07:01:58'),
(11, 3, 1, 'artikel-3', 'artikel 3', '<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '23621242_1854915264538010_1621021992962437807_n.jpg', 'Publish', 'Artikel', 'artikel 3', '2020-01-02 08:03:35', '2020-01-02 07:03:35'),
(12, 3, 1, 'artikel-4', 'Artikel 4', '<p style="text-align: justify;"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</strong><br /><strong>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</strong><br /><strong>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</strong><br /><strong>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</strong><br /><strong>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</strong><br /><strong>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</strong></p>\r\n<p style="text-align: center;"><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</em><br /><em>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</em><br /><em>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</em><br /><em>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</em><br /><em>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</em><br /><em>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</em></p>\r\n<div><span style="text-decoration: underline;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</span></div>\r\n<div><span style="text-decoration: underline;">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span></div>\r\n<div><span style="text-decoration: underline;">quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</span></div>\r\n<div><span style="text-decoration: underline;">consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</span></div>\r\n<div><span style="text-decoration: underline;">cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</span></div>\r\n<div>\r\n<p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</strong><br /><strong>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</strong><br /><strong>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</strong><br /><strong>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</strong><br /><strong>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</strong><br /><strong>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</strong></p>\r\n<p>&nbsp;</p>\r\n</div>', 'logo_png.png', 'Publish', 'Artikel', 'artikel 4', '2020-01-02 08:04:39', '2020-01-02 07:04:39'),
(13, 3, 2, 'buas', 'buas', '<p>// Total kategori artikel main page<br />&nbsp;public function total_kategori($id_kategori)<br />&nbsp;{<br />&nbsp; $this-&gt;db-&gt;select(''artikel.*,<br />&nbsp; &nbsp; &nbsp; &nbsp;kategori.nama_kategori, kategori.slug_kategori,<br />&nbsp; &nbsp; &nbsp; &nbsp;admin.nama_admin'');<br />&nbsp; $this-&gt;db-&gt;from(''artikel'');<br />&nbsp; // Start join<br />&nbsp; $this-&gt;db-&gt;join(''kategori'',''kategori.id_kategori = artikel.id_kategori'',''LEFT'');<br />&nbsp; $this-&gt;db-&gt;join(''admin'',''admin.id_admin = artikel.id_admin'',''LEFT'');<br />&nbsp; // End join<br />&nbsp; $this-&gt;db-&gt;where(array(''status_artikel'' &nbsp; =&gt;''Publish'',<br />&nbsp; &nbsp; &nbsp; &nbsp; ''artikel.id_kategori'' =&gt; $id_kategori));<br />&nbsp; $this-&gt;db-&gt;order_by(''id_artikel'',''DESC'');<br />&nbsp; $query = $this-&gt;db-&gt;get();<br />&nbsp; return $query-&gt;result();<br />&nbsp;}</p>', 'PicsArt_11-29-07_20_43.jpg', 'Publish', 'Artikel', 'buas', '2020-01-02 09:21:39', '2020-01-02 08:21:39'),
(14, 4, 2, 'artkel-3', 'Artkel 3', '<p>&lt;?php if($&lt;?php if($this-&gt;session-&gt;userdata(''akses_level'') == ''Admin'') { ?&gt;&lt;?php if($this-&gt;session-&gt;userdata(''akses_level'') == ''Admin'') { ?&gt;this-&gt;session-&gt;userdata(''akses_level'') == ''Admin'') { ?&gt;</p>', '76873291_2499446486937836_5182643200406672176_n1.jpg', 'Publish', 'Artikel', '<?php if($this->session->userdata(''akses_level'') == ''Admin'') { ?>', '2020-01-03 00:28:14', '2020-01-02 23:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
`id_galeri` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul_galeri` varchar(255) NOT NULL,
  `isi_galeri` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `gambar_galeri` varchar(255) NOT NULL,
  `posisi_galeri` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_admin`, `judul_galeri`, `isi_galeri`, `website`, `gambar_galeri`, `posisi_galeri`, `tanggal_post`, `tanggal`) VALUES
(2, 3, 'Dominic English 2', '<p>Dominic English</p>\r\n<p>Dominic English</p>\r\n<p>Dominic English</p>\r\n<p>Dominic English</p>', 'http://dominicenglish2.com', '76873291_2499446486937836_5182643200406672176_n.jpg', 'Homepage', '2019-12-31 14:15:26', '2019-12-31 13:24:15'),
(3, 3, 'Dominic English', '<p>asasasasa</p>', 'http://dominicenglish.com', '75476788_839132726507195_1361983986488192231_n1.jpg', 'Homepage', '2020-01-02 18:51:42', '2020-01-02 17:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan_kategori` int(11) DEFAULT NULL,
  `tangal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan_kategori`, `tangal`) VALUES
(1, 'beasiswa-tahfidz', 'Beasiswa Tahfidz', 1, '2019-12-30 09:29:41'),
(2, 'beasiswa-buas', 'Beasiswa BUAS', 2, '2019-12-30 16:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE IF NOT EXISTS `konfigurasi` (
`id_konfigurasi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `namaweb` varchar(50) NOT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(24) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `metatext` text,
  `maps` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_admin`, `namaweb`, `tagline`, `email`, `no_telepon`, `alamat`, `website`, `deskripsi`, `keywords`, `metatext`, `maps`, `logo`, `icon`, `facebook`, `instagram`, `tanggal`) VALUES
(1, 3, 'Dominic English', 'Speak english or get out of here!', 'kampunginggrisde@gmail.com', '081327632201', 'Jl. Brawijaya no. 100 C, Kampung Inggris Pare, Kediri, Jawa Timur', 'http://dominicenglish.com', 'deskripsi lembaga', 'keywords', 'metatext (from google analytics)', ' <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.3160137672767!2d112.178691714154!3d-7.756269479062138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785c4f17cfe107%3A0x5bff084bd98ba119!2sJl.%20Brawijaya%20No.100c%2C%20Mangunrejo%2C%20Tulungrejo%2C%20Kec.%20Pare%2C%20Kediri%2C%20Jawa%20Timur%2064212!5e0!3m2!1sid!2sid!4v1576579294246!5m2!1sid!2sid" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 'dec_logo3.png', 'logo_dominic_putih2.png', 'https://www.facebook.com/kampunginggrispare.kediri_', 'https://www.instagram.com/kampunginggrispare.kediri_', '2020-01-03 13:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
`id_layanan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `slug_layanan` varchar(255) NOT NULL,
  `judul_layanan` varchar(255) NOT NULL,
  `isi_layanan` text NOT NULL,
  `harga_layanan` int(11) NOT NULL,
  `gambar_layanan` varchar(255) NOT NULL,
  `status_layanan` varchar(20) NOT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `id_admin`, `slug_layanan`, `judul_layanan`, `isi_layanan`, `harga_layanan`, `gambar_layanan`, `status_layanan`, `keywords`, `tanggal_post`, `tanggal`) VALUES
(2, 3, 'program-1-tahun', 'Program 1 tahun', '<p>Program 1 tahun</p>\r\n<p><strong>Program 1 tahun</strong></p>\r\n<p><em>Program 1 tahun</em></p>\r\n<p><span style="text-decoration: underline;">Program 1 tahun</span></p>', 12000000, '79837823_133166771441463_3861613131862597613_n.jpg', 'Publish', '<p>Program 1 tahunProgram 1 tahunProgram 1 tahunProgram 1 tahunProgram 1 tahunProgram 1 tahunProgram 1 tahunProgram 1 tahunProgram 1 tahunProgram 1 tahunProgram 1 tahunProgram 1 tahun</p>', '2019-12-31 13:02:06', '2019-12-31 12:02:06'),
(3, 3, 'program-1-bulan', 'Program 1 bulan', '<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>Program 1 bulan</p>\r\n<p>&nbsp;</p>', 1000000, 'dec_logo1.png', 'Publish', 'Program 1 bulan', '2020-01-01 00:44:34', '2019-12-31 23:44:34'),
(4, 3, 'program-2-bulan', 'Program 2 bulan', '<p>Program 2 bulan</p>\r\n<p>Program 2 bulan</p>\r\n<p>Program 2 bulan</p>\r\n<p>Program 2 bulan</p>\r\n<p>Program 2 bulan</p>\r\n<p>Program 2 bulan</p>\r\n<p>Program 2 bulan</p>\r\n<p>&nbsp;</p>', 1500000, '75476788_839132726507195_1361983986488192231_n.jpg', 'Publish', 'Program 2 bulan', '2020-01-01 00:46:08', '2019-12-31 23:46:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`), ADD UNIQUE KEY `username_user` (`username_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
 ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
 ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
 ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
 ADD PRIMARY KEY (`id_layanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
