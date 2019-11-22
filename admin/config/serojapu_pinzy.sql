-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2019 at 04:55 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serojapu_pinzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$0Q0fjXZtQ8FkC4JemDnEMOS3R.hzPRtmHjn5MrGAky6kG7GwxZdNS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_area`
--

CREATE TABLE `tb_area` (
  `id_area` int(11) NOT NULL,
  `nama_area` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_area`
--

INSERT INTO `tb_area` (`id_area`, `nama_area`) VALUES
(1, 'SUMATERA BARAT'),
(2, 'BENGKULU');

-- --------------------------------------------------------

--
-- Table structure for table `tb_brand`
--

CREATE TABLE `tb_brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(50) NOT NULL,
  `gambar_brand` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_brand`
--

INSERT INTO `tb_brand` (`id_brand`, `nama_brand`, `gambar_brand`) VALUES
(1, 'Vivan', 'vivan.jpg'),
(2, 'Dji', 'dji.jpg'),
(3, 'Ezviz', 'ezviz.png'),
(4, 'Samsung', '20191111044044samsung_logo_PNG14.png'),
(5, 'Sandisk', 'sandisk.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `id_gambar` int(11) NOT NULL,
  `gambar_produk` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gambar`
--

INSERT INTO `tb_gambar` (`id_gambar`, `gambar_produk`, `id_produk`) VALUES
(10, '20191116101303sm1.jpg', 6),
(9, '20191116095643V3.jpg', 5),
(8, '20191116095643V2.jpg', 5),
(7, '20191116095643V1.jpg', 5),
(22, '20191116104722sn4.jpg', 9),
(21, '20191116104722sn3.jpg', 9),
(20, '20191116104722sn2.jpg', 9),
(19, '20191116104721sn1.jpg', 9),
(15, '20191121104437cv1.jpg', 8),
(16, '20191121104450cv2.jpg', 8),
(17, '20191121104458cv3.jpg', 8),
(18, '20191121104517cv4.jpg', 8),
(23, '20191116040625sm09h.jpg', 10),
(24, '20191116041259sm878.jpg', 11),
(25, '20191116041259sm980.jpg', 11),
(26, '20191116042326smhed898.jpg', 12),
(27, '20191116043316v11h.jpg', 13),
(28, '20191116043316svbhb87.jpg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tb_iklan`
--

CREATE TABLE `tb_iklan` (
  `id_iklan` int(11) NOT NULL,
  `gambar_iklan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_iklan`
--

INSERT INTO `tb_iklan` (`id_iklan`, `gambar_iklan`) VALUES
(1, 'iklan1.jpg'),
(2, 'iklan2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `gambar_kategori` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(1, 'Power Bank', 'pbank.jpg'),
(2, 'Mini Fan', 'kat2.jpg'),
(4, 'Headset', 'kat4.jpg'),
(6, 'Charger', 'charger.jpg'),
(7, 'Softcase', '4.jpg'),
(8, 'Flashdisk', '20191116102405flashdisk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pemilik` varchar(191) NOT NULL,
  `kode` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `alamat` text NOT NULL,
  `kode_sales` varchar(191) NOT NULL,
  `id_area` int(11) NOT NULL,
  `nohp` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `jenis_pelanggan` varchar(191) NOT NULL,
  `kota` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pemilik`, `kode`, `password`, `alamat`, `kode_sales`, `id_area`, `nohp`, `email`, `jenis_pelanggan`, `kota`) VALUES
(1, 'Rafi sahendra', 'K002', 'kitiang098', 'Padang barat', 'K003', 1, '085363229539', 'rafisahendra@gmail.com', 'Y', 'Padang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga_prioritas` int(11) NOT NULL,
  `harga_reguler` int(11) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `perusahaan` varchar(120) NOT NULL,
  `rekomendasi` varchar(5) NOT NULL,
  `flash_sale` varchar(5) NOT NULL,
  `terjual` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `purna_jual` text NOT NULL,
  `kode_produk` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `id_kategori`, `kuantitas`, `harga_prioritas`, `harga_reguler`, `merk`, `tgl_masuk`, `perusahaan`, `rekomendasi`, `flash_sale`, `terjual`, `id_area`, `deskripsi`, `purna_jual`, `kode_produk`) VALUES
(5, 'VIVAN VPB-A10S Power Delivery & Quick Charge 3.0 Powerbank - Hitam [10000 mAh] ', 1, 17, 179000, 189000, '1', '2019-11-16', 'Vivan', 'Y', 'Y', 0, 1, '<div data-v-9b1163a8=\"\" class=\"product__detail-info--left\"><div data-v-9b1163a8=\"\" class=\"product__image\"><div data-v-0f458d27=\"\" class=\"product__features\"><div data-v-5e4b55b2=\"\" id=\"mainProductImage\" class=\"product__image-large image-preview\"><div data-v-cd0bf226=\"\" data-v-5e4b55b2=\"\" class=\"vue-h-zoom\"> </div></div><label data-v-0f458d27=\"\" class=\"product__section-label\"></label> <div data-v-0f458d27=\"\" class=\"product__section-list\"><ul><li>Original Vivan 100%</li><li>Fitur PD+QC3.0</li><li>Type-C Input/Output</li><li>Battery polimer 10000 mAh</li><li>Mendukung berbagai macam protokol fast charging</li></ul></div></div></div></div>', '<ol><li data-v-0f458d27=\"\">\r\n        Garansi: Garansi Resmi 1 Tahun&nbsp; </li><li data-v-0f458d27=\"\"> 15 hari Pengembalian Produk&nbsp;</li></ol>', 'Viv001n'),
(6, 'SAMSUNG headset bluetooth ', 4, 19, 81000, 91000, '4', '2019-11-16', 'Samsung', 'Y', 'Y', 0, 1, '<div data-v-0f458d27=\"\" class=\"product__section-list\"><div class=\"form-group-label col-sm-9 ng-scope\">\r\n<ul><li>Bluetooth&nbsp; Headset</li><li>Kualitas suara stereo yang jernih</li><li>Standbay Time Handsfree dan Talk Time lebih lama</li><li>Dapat dikoneksikan secara wireless menggunakan teknologi Bluetooth \r\nke perangkat handset mobile seperti handphone, smartphone, Blackberry, \r\niPhone, atau PDA yang sudah terintegrasi Bluetooth didalamnya</li></ul>\r\n</div></div>', '<ol><li>Garansi 6 Bulan</li><li>Garansi tidak berlaku jika terjadi kerusakan terjadi pada saat peengiriman karena sebelum dikirim barang kami cek terlebih dahulu<br></li><li>15 hari Pengembalian Produk </li></ol>', 'SM001ng'),
(9, 'SanDisk - Ultra Dual Drive m3.0 Drive OTG-enabled [16 GB/SDDD3-016G-G46] ', 8, 87, 69000, 79000, '5', '2019-11-18', 'Sandisk', 'Y', 'Y', 0, 1, '<div data-v-0f458d27=\"\" class=\"product__section-list\"><ul><li>Kapasitas : 16GB</li><li>Transfer speed (up to) : 130MB/s</li><li>Photos (10 megapixel) + : 900 photos +</li><li>Video (1080 video AVCHD) + :&nbsp; 40 minutes +</li><li>Music (MP3 songs) + : 1,000 songs</li><li>Office Files : 4GB</li></ul></div>', '<ol><li data-v-0f458d27=\"\">\r\n        Garansi: Garansi Resmi 3 Tahun&nbsp; </li><li data-v-0f458d27=\"\"> 15 hari Pengembalian Produk&nbsp;</li><li data-v-0f458d27=\"\">Tersedia Cash On Delivery</li></ol>', 'Sn001sk'),
(8, 'VIVAN Power Oval Charger - Putih [2A/ Single Output]', 6, 85, 37000, 39000, '1', '2019-11-12', 'Vivan', 'Y', 'Y', 0, 1, '<div data-v-0f458d27=\"\" class=\"product__section-list\"><ul><li>Single USB Charger (EU plug)</li><li>Input : 100-240V, 50-60Hz</li><li>Output : 5V, 2A</li><li>Material : ABS + PC housing, PCBA board IC overcurrent protection, stainless steel nickel-plated pin plug</li><li>Comply with ROHS environmental requirements, through CE certification</li></ul></div>', '<ol><li>Garansi Resmi</li><li>15 hari pengembalian produk<br></li></ol>', 'Viv002n'),
(10, 'Samsung Araree A Casing for Samsung A50 ', 7, 45, 99000, 109000, '4', '2019-11-16', 'Samsung', 'Y', 'Y', 0, 1, '<div data-v-0f458d27=\"\" class=\"product__section-list\"><ul><li>Casing</li><li>Desain ergonomis</li><li>Melindungi gadget dari benturan, goresan dan debu</li><li>Memiliki bentuk presisi</li><li>Mudah unutk mengakses ke semua tombol atau port</li></ul></div>', '<ol><li data-v-0f458d27=\"\">\r\n        Garansi: No Warranty&nbsp; </li><li data-v-0f458d27=\"\"> 15 hari Pengembalian Produk </li></ol>', 'Sm002ng'),
(11, 'Samsung Power Bank - Silver [Real Capacity/5200 mAh] Brand: Samsung 5 ulasan produk', 1, 32, 290000, 299000, '4', '2019-11-16', 'Samsung', 'Y', 'Y', 0, 1, '<div data-v-0f458d27=\"\" class=\"product__section-list\"><ul><li>100% Produk Samsung ASli</li><li>5200 mAh Real Capacity</li><li>Premium, metal look battery pack</li><li>Slim, lightweight design</li><li>four-level LED battery indicator</li></ul></div>', '<ol><li>15 hari Pengembalian Produk</li><li>Garansi Produk<br></li></ol>', 'Sm003ng'),
(12, 'Samsung Handsfree Headset Earphone Samsung S6 Edge - Black', 4, 120, 145000, 165000, '4', '2019-11-16', 'Samsung', 'Y', 'Y', 0, 1, '<div data-v-0f458d27=\"\" class=\"product__section-list\"><ul><li>Headset</li><li>Kualitas suara yang jernih dan detail</li><li>Dilengkapi tombol untuk menjawab dan mengakhiri telepon</li><li>Dapat digunakan untuk smartphone dengan jack A/V 3.5mm</li><li>Cocok untuk menemani aktivitas Anda, dalam mendengar musik, berkomunikasi, dan lainya</li></ul></div>', '<ul data-v-0f458d27=\"\" class=\"product__section-list\"><li data-v-0f458d27=\"\">\r\n        Garansi resmi dari pabrik </li><li data-v-0f458d27=\"\"> 15 hari Pengembalian Produk</li></ul>', 'Sm004ng'),
(13, 'Vivan VE-M50 Earphone ', 4, 45, 105000, 115000, '1', '2019-11-16', 'Vivan', 'Y', 'Y', 0, 1, '<h2 data-v-ea94faa8=\"\" class=\"content--name\">Vivan VE-M50 Earphone</h2> <p>&nbsp;&nbsp;&nbsp;&nbsp;Vivan\r\n VE-M50 Earphone with Mic - Hitam Gold [3.5mm] merupakan earphone super \r\nbass yang hadir dengan desain brushed metal + CD pattern. Kabel flat \r\ndengan bahan kawat yang tebal dan tidak mudah kusut. Ukurannya yang \r\nmini, memudahkan Anda untuk membawa dan menyimpannya. Built-in \r\nmicrophone untuk panggilan hands-free. Standard 3.5 mm plug, cocok untuk\r\n semua perangkat dengan jack 3.5mm seperti handphone, Tablet, dan PC.</p><p><br></p>', '<ol><li>15 hari Pengembalian Produk </li><li>Garansi Toko<br></li></ol>', 'Viv003n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sales`
--

CREATE TABLE `tb_sales` (
  `id_sales` int(11) NOT NULL,
  `nama_sales` varchar(191) NOT NULL,
  `id_area` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(191) NOT NULL,
  `no_terdekat` varchar(191) NOT NULL,
  `plat_kendaraan` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sales`
--

INSERT INTO `tb_sales` (`id_sales`, `nama_sales`, `id_area`, `tgl_masuk`, `alamat`, `no_telepon`, `no_terdekat`, `plat_kendaraan`) VALUES
(1, 'Gema Fajar', 2, '2019-10-30', '<p>Padang Barat<br></p>', '085378670987', '085365786543', 'Ba 8779 H'),
(7, 'Rafi Sahendra2', 2, '2019-11-16', '<p>Padang<br></p>', '09', '09', 'BA  7867 Q'),
(15, 'Gema Fajar M', 1, '2019-11-21', '<p>Padang barat<br></p>', '085363229539', '085363229536', 'BA 0976 Q');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(11) NOT NULL,
  `gambar_slider` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id_slider`, `gambar_slider`) VALUES
(1, 'slide8.jpg'),
(2, 'slide4a.jpg'),
(3, 'slide6.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spesifikasi`
--

CREATE TABLE `tb_spesifikasi` (
  `id_spesifikasi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jenis_spek` varchar(191) NOT NULL,
  `spesifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_spesifikasi`
--

INSERT INTO `tb_spesifikasi` (`id_spesifikasi`, `id_produk`, `jenis_spek`, `spesifikasi`) VALUES
(10, 5, 'Battery polimer', '10000 mAh'),
(11, 5, 'Kualitas', 'Original Vivan 100%'),
(12, 5, 'Port', 'Type-C Input/Output'),
(13, 6, 'Bluetooth  Headset', 'Bluetooth  Headset Connection'),
(14, 6, 'Dikoneksikan secara wireless ', 'Dapat dikoneksikan secara wireless menggunakan teknologi Bluetooth ke perangkat handset mobile seperti handphone, smartphone, Blackberry, iPhone, atau PDA yang sudah terintegrasi Bluetooth didalamnya'),
(18, 8, 'Single USB ', 'Single USB Charger (EU plug)'),
(19, 8, 'Input ', 'Input : 100-240V, 50-60Hz'),
(20, 8, 'Output ', 'Output : 5V, 2A'),
(21, 8, 'Material : ABS + PC housing', 'Material : ABS + PC housing, PCBA board IC overcurrent protection, stainless steel nickel-plated pin plug'),
(22, 9, 'Kapasitas ', 'Kapasitas : 16GB'),
(23, 9, 'Transfer speed', 'Transfer speed (up to) : 130MB/s'),
(24, 9, 'Office Files ', 'Office Files : 4GB'),
(25, 10, 'Casing', 'Samsung Ori'),
(26, 10, 'Desain ', 'Desain ergonomis'),
(27, 11, 'Produk', '100% Produk Samsung ASli'),
(28, 11, 'Kapasitas', '5200 mAh Real Capacity'),
(29, 11, 'Bahan', 'Premium, metal look battery pack'),
(30, 12, 'Headset', 'Headset Samsung Ori'),
(31, 12, 'Kualitas suara ', 'Kualitas suara samsung yang jernih dan detail'),
(32, 12, 'Input devices', 'Dapat digunakan untuk smartphone dengan jack A/V 3.5mm'),
(33, 13, 'Panjang Kabel', '1.2m'),
(34, 13, 'MIC', 'ada'),
(35, 13, 'Koneksi', 'Kabel 3.5 mm'),
(36, 13, 'Input Device', 'Kompatibel handphone, Tablet, dan PC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tgl_input_stok` date NOT NULL,
  `jml_input_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `id_produk`, `tgl_input_stok`, `jml_input_stok`) VALUES
(1, 8, '2019-11-22', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tb_iklan`
--
ALTER TABLE `tb_iklan`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_sales`
--
ALTER TABLE `tb_sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tb_spesifikasi`
--
ALTER TABLE `tb_spesifikasi`
  ADD PRIMARY KEY (`id_spesifikasi`);

--
-- Indexes for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_iklan`
--
ALTER TABLE `tb_iklan`
  MODIFY `id_iklan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_sales`
--
ALTER TABLE `tb_sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_spesifikasi`
--
ALTER TABLE `tb_spesifikasi`
  MODIFY `id_spesifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
