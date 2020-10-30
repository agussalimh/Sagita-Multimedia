-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Okt 2020 pada 14.39
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_bank`
--

CREATE TABLE `shop_bank` (
  `id_bank` int(11) NOT NULL,
  `name_bank` varchar(100) NOT NULL,
  `logo_bank` varchar(40) NOT NULL,
  `state_bank` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_bank`
--

INSERT INTO `shop_bank` (`id_bank`, `name_bank`, `logo_bank`, `state_bank`) VALUES
(1, 'Bank BCA', 'bca.png', 1),
(2, 'Bank BRI', 'bri.png', 1),
(3, 'Bank BNI', 'bni.png', 1),
(4, 'Bank Mandiri', 'mandiri.jpg', 1),
(5, 'Bank Mega', 'mega.png', 1),
(6, 'Bank Jatim', 'jatim.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_category`
--

CREATE TABLE `shop_category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_category`
--

INSERT INTO `shop_category` (`id_category`, `category`, `state`) VALUES
(1, 'Laptop', 1),
(8, 'Aksesoris Gadged', 1),
(6, 'Smart Phone', 1),
(7, 'Aksesoris Komputer', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_image_product`
--

CREATE TABLE `shop_image_product` (
  `id_image_product` int(11) NOT NULL,
  `id_product` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) NOT NULL DEFAULT '0',
  `token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_image_product`
--

INSERT INTO `shop_image_product` (`id_image_product`, `id_product`, `image`, `token`) VALUES
(2, 58, 'Pendukung2020-09-18-03-39-38.png', '0.9334692893478298');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_options`
--

CREATE TABLE `shop_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_provinsi` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `id_kab` int(11) DEFAULT NULL,
  `state` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_page`
--

CREATE TABLE `shop_page` (
  `how_to_buy` text NOT NULL,
  `about_us` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_page`
--

INSERT INTO `shop_page` (`how_to_buy`, `about_us`) VALUES
('<h3 style=\"text-align: center;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"line-height:2;\"><strong>Beli Lewat Toko Online</strong></span></span></h3>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"line-height:2;\">Pelanggan dapat melakukan pembelian dengan cara memilih produk lalu menambahkan kekeranjang. Setelah selesai pelanggan dapat melakukan pemesanan dengan cara memasukkan biodata diri pelanggan serta memilih kurir dan metode apa yang digunakan. Setelah selesai, pelanggan dapat melakukan pemesanan dengan klik tombol lakukan pemesanan. Setelah itu pelanggan akan mendapatkan kode pembelian anda melalui konfirmasi email. Anda dapat memantau pesanan anda di menu<strong> Cek Pesanan</strong>. Halaman ini juga digunakan untuk upload bukti transaksi yang dilakukan pelanggan (Bila melakukan pembayaran dari bank). Bila bukti transaksi bank telah benar maka pihak toko akan segera mengirim pesanan anda, anda dapat melihatnya melalui menu<strong> Cek Pesanan</strong>, setelah barang sampai pelanggan harus melakukan konfirmasi barang yang pihak toko kirim sudah sampai. Silahkan berbelanja.....</span></span></p>\r\n\r\n<h3 style=\"text-align: center;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"line-height:2;\"><strong>Beli Lewat Kontak Tersedia</strong></span></span></h3>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"line-height:2;\">Selain menggunakan toko online kami juga melayani pembelian melewati kontak. Pelanggan perlu menyebutkan produk apa saja yang mau di beli, keterngannya apa, jumlah berapa, pembayarannya lewat apa. Dan setelah pelanggan selesai. Pelanggan harus melakukan konfirmasi bukti transfer melalui kontak kami. Bila sudah fix maka pihak toko akan segera mengirim pesanan pelanggan. Namun segala &nbsp;transaksi ini tidak bisa pelanggan cek dari toko online kami. Karena toko online hanya khusus untuk pelanggan dengan cara pembelian ke toko online kami. Berbelanja yuk</span></span><span style=\"font-family: arial, helvetica, sans-serif;\">.....</span></p>\r\n', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_payment`
--

CREATE TABLE `shop_payment` (
  `id_payment` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_payment`
--

INSERT INTO `shop_payment` (`id_payment`, `id_bank`, `number`, `name`, `state`) VALUES
(1, 1, '11002299', 'ANGGIT AGUNG', 1),
(2, 2, '33774466', 'DHUTA PAMUNGKAS', 1),
(3, 3, '22993366', 'GALANG YUDA', 1),
(4, 4, '55229966', 'AGUS SALIM H', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_product`
--

CREATE TABLE `shop_product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `information_product` text NOT NULL,
  `price_product` int(11) NOT NULL,
  `discount_product` int(11) NOT NULL,
  `weight_product` int(11) NOT NULL,
  `category_product` int(11) NOT NULL,
  `stock_product` int(11) NOT NULL,
  `image_product` varchar(50) NOT NULL,
  `slug_product` text NOT NULL,
  `state_product` int(1) NOT NULL,
  `state_discount` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_product`
--

INSERT INTO `shop_product` (`id_product`, `name_product`, `information_product`, `price_product`, `discount_product`, `weight_product`, `category_product`, `stock_product`, `image_product`, `slug_product`, `state_product`, `state_discount`) VALUES
(58, 'Samsung A50', 'Spesifikasi Samsung A50<br /><br /><br /><br />\r\nHarga Samsung A50 termurah : Rp 2.887.500<br /><br /><br /><br />\r\nHarga Samsung A50 terbaru : Rp 3.050.000<br /><br /><br /><br />\r\nTanggal rilis: Maret 2019<br /><br /><br /><br />\r\nLayar: 6.4 inci<br /><br /><br /><br />\r\nResolusi layar: 1080 x 2340 pixels<br /><br /><br /><br />\r\nChipset: Exynos 9610<br /><br /><br /><br />\r\nOS: Android 9.0<br /><br /><br /><br />\r\nCPU: Octa-core<br /><br /><br /><br />\r\nGPU: Mali-G72 MP3<br /><br /><br /><br />\r\nRAM: 4GB/6GB<br /><br /><br /><br />\r\nMemori internal: 64GB/128GB<br /><br /><br /><br />\r\nMemori Eksternal: microSDXC<br /><br /><br /><br />\r\nSIM card: Single SIM (Nano-SIM) atau Dual SIM (Nano-SIM, dual stand-by)<br /><br /><br /><br />\r\nBerat: 166 g<br /><br /><br /><br />\r\nKamera Belakang: 25 MP, f/1.7 + 8 MP, f/2.2 (ultrawide) + 5 MP, f/2.2, (depth)<br /><br /><br /><br />\r\nKamera Depan: 25 MP, f/2.0 (wide)<br /><br /><br /><br />\r\nBaterai: Non-removable Li-Po 4000 mAh battery<br /><br /><br /><br />\r\nJack earphone: 3,5mm<br /><br /><br /><br />\r\nVarian warna: Black, White, Blue, Coral', 2999000, 2299000, 10, 6, 20, 'Produk2020-09-18-03-36-45.png', 'samsung_a50', 1, 1),
(60, 'Realme 7 Pro', 'Realme 7 Pro hadir dengan layar Super AMOLED berukuran 6,4 inci dengan resolusi Full HD+ refresh rate 120Hz, baterai berkapasitas 4.500 mAh, dan mendukung fast charging 65W Super Dart 65W.', 4299000, 3799000, 50, 6, 19, 'Produk2020-10-28-13-28-41.png', 'realme_7_pro', 1, 1),
(61, 'Poco X3', 'Poco X3 NFC ini punya kamera depan 20 MP. Sementara bagian belakangnya terdapat empat kamera yang ditempatkan pada modul di tengah atas.<br /><br /><br />\r\n<br /><br /><br />\r\nKamera utamanya 64 MP dengan sensor Sony MX682, ditemani lensa ultra wide 13 MP, lensa makro 2 MP dan depth 2 MP. Fitur AI SkyScraping 3.0, night mode, pro mode, AI scene detection, AI beauty, Google lens, new filters, 120fps 1080p slow-motion video recording, 30fps 4K video recording, dan kaleidoscope mode turut disematkan.', 3999000, 3599000, 50, 6, 7, 'Produk2020-10-28-13-40-06.png', 'poco_x3', 1, 1),
(62, 'ASUS ROG Strix Hero II GL504GM', 'Spesifikasi tentang ASUS ROG Strix Hero II GL504GM<br />\r\nTipe	Tipe Laptop	Notebook , Laptop gaming<br />\r\nSpesifikasi Dasar	CPU	Core i5 , Core i7<br />\r\nModel Prosesor	i7-8750H<br />\r\ni5-8300H<br />\r\nModel GPU	NVIDIA GeForce GTX 1060 (6GB GDDR5 VRAM)<br />\r\nMemori & Penyimpanan	RAM	8GB<br />\r\nTipe Memori	DDR4<br />\r\nMemori Tambahan	up to 32GB<br />\r\nTipe Penyimpanan	HDD , SSD , SSHD<br />\r\nHDD	1TB<br />\r\nFormat HDD	2.5 inches<br />\r\nKecepatan Rotasi	5400 rpm , 7200 rpm<br />\r\nSSD/eMMC	128GB , 256GB , 512GB<br />\r\nDrive Optikal	No<br />\r\nLayar	Ukuran Layar	15.6 inches<br />\r\nResolusi	1920 x 1080 pixels<br />\r\nTipe Panel	Non-glare IPS FHD (144Hz)<br />\r\nNon-glare IPS FHD (60Hz)<br />\r\nNetwork	Ethernet	Yes<br />\r\nWiFi	802.11 ac 2x2 Wave 2 WLAN<br />\r\nKonektifitas	Konektifitas	HDMI , Bluetooth , Card Reader , Thunderbolt , Camera , 10 key , USB Type-C , USB3.1<br />\r\nSoftware	OS	Windows 10<br />\r\nOS Ver	Windows 10 Home<br />\r\nWindows 10 Pro - ASUS recommends Windows 10 Pro<br />\r\nUkuran	Dimensi	36.1 x 26.2 x 2.61 cm<br />\r\nBerat	2.4 kg<br />\r\nPenilaian-penilaian berikut bervariasi di setiap toko. Silahkan periksa setiap toko sebelum Anda melakukan pembelian.<br />\r\nHarga ASUS ROG Strix Hero II GL504GM di Indonesia mulai Rp 21.795.000<br />\r\nHarga termurah ASUS ROG Strix Hero II GL504GM yaitu Rp 21.795.000 di Lazada, dimana 19% lebih murah daripada harga ROG Strix Hero II GL504GM di Lazada (Rp 26.770.000). Harga terbaru ASUS ROG Strix Hero II GL504GM diperbarui pada 19/08/2020 13:03.<br />\r\n<br />\r\nRangkuman Harga ASUS ROG Strix Hero II GL504GM di Indonesia<br />\r\nNama Toko	Harga	Ongkos Kirim<br />\r\nLazada	Rp 21.795.000	Hubungi Toko<br />\r\nDaftar Harga ASUS ROG Strix Hero II GL504GM Berdasarkan Negara<br />\r\nNegara	Harga	Harga Dalam Rupiah<br />\r\nIndonesia	IDR 21.795.000	Rp 21.795.000<br />\r\nFilipina	PHP 61,279	Rp 18.708.684<br />\r\nThailand	THB 50,450	Rp 23.856.325', 25000000, 21999000, 100, 1, 5, 'Produk2020-10-30-20-23-46.png', 'asus_rog_strix_hero_ii_gl504gm', 1, 1),
(63, 'ASUS VivoBook Ultra A412FL', 'Spesifikasi tentang ASUS VivoBook Ultra A412FL<br />\r\nTipe	Tipe Laptop	Notebook , Ultrabook<br />\r\nSpesifikasi Dasar	CPU	Core i3 , Core i5 , Core i7<br />\r\nModel Prosesor	Intel Core i7-10510U<br />\r\nIntel Core i5-10210U<br />\r\nIntel Core i7-8565U<br />\r\nIntel Core i5-8265U<br />\r\nIntel Core i3-8145U<br />\r\nModel GPU	NVIDIA GeForce MX250<br />\r\nMemori & Penyimpanan	RAM	4GB , 8GB , 12GB<br />\r\nTipe Memori	DDR4 SDRAM<br />\r\nKecepatan Memori	2400MHz<br />\r\nMemori Tambahan	Up to 12GB SDRAM<br />\r\nTipe Penyimpanan	SSD<br />\r\nSSD/eMMC	512GB , 1TB<br />\r\nDrive Optikal	No<br />\r\nLayar	Ukuran Layar	14 inches<br />\r\nResolusi	FHD 1920 x 1080 pixels<br />\r\nTipe Panel	LED-backlit Anti-Glare 60Hz Panel with 45% NTSC<br />\r\nNetwork	WiFi	Integrated Wi-Fi 5 (802.11 ac (2x2))<br />\r\nKonektifitas	Konektifitas	HDMI , USB2.0 , USB3.0 , Bluetooth , Card Reader , Camera , Speakers , Microphone , USB Type-C , USB3.1<br />\r\nSoftware	OS	Windows 10<br />\r\nOS Ver	Windows 10 Home<br />\r\nWindows 10 Pro<br />\r\nBaterai	Baterai	2 -Cell 37 Wh<br />\r\nUkuran	Dimensi	322 x 212 x 19.9 mm (WxDxH)<br />\r\nBerat	1.5 kg<br />\r\nPenilaian-penilaian berikut bervariasi di setiap toko. Silahkan periksa setiap toko sebelum Anda melakukan pembelian.<br />\r\nHarga ASUS VivoBook Ultra A412FL di Indonesia mulai Rp 4.959.380<br />\r\nHarga termurah ASUS VivoBook Ultra A412FL yaitu Rp 4.959.380 di Lazada, dimana 57% lebih murah daripada harga VivoBook Ultra A412FL di Bukalapak (Rp 11.570.000). Harga terbaru ASUS VivoBook Ultra A412FL diperbarui pada 27/10/2020 15:24.<br />\r\n<br />\r\nRangkuman Harga ASUS VivoBook Ultra A412FL di Indonesia<br />\r\nNama Toko	Harga	Ongkos Kirim<br />\r\nLazada	Rp 4.959.380	Hubungi Toko<br />\r\nTokopedia	Rp 6.980.550	Hubungi Toko<br />\r\nShopee	Rp 9.176.000	Hubungi Toko<br />\r\nBukalapak	Rp 9.399.000	Hubungi Toko', 6999000, 6499000, 120, 1, 10, 'Produk2020-10-30-20-29-06.png', 'asus_vivobook_ultra_a412fl', 1, 1),
(64, 'Lenovo IdeaPad C340 14', 'Spesifikasi tentang Lenovo IdeaPad C340 14<br />\r\nTipe	Tipe Laptop	Netbook , Ultrabook<br />\r\nSpesifikasi Dasar	CPU	AMD , Core i3 , Core i5 , Core i7 , Pentium Dual Core<br />\r\nModel Prosesor	Model AMD:<br />\r\nSampai dengan AMD Ryzen R5-3500U (2.1 GHz, up to 3.7 GHz)<br />\r\n<br />\r\nModel Intel:<br />\r\nIntel Pentium Gold 5405U (2.3 GHz, 2MB cache)<br />\r\n<br />\r\n8th Gen Intel Core i3-8145U (2.1 GHz, up to 3.9 GHz, 4MB cache)<br />\r\n8th Gen Intel Core i5-8265U (1.6 GHz, up to 3.9 GHz, 6MB cache)<br />\r\n8th Gen Intel Core i7-8565U (1.8 GHz, up to 4.6 GHz, 8MB cache)<br />\r\n<br />\r\n10th Gen Intel Core i3-10110U (2.1 GHz, up to 4.1 GHz, 4MB cache)<br />\r\n10th Gen Intel Core i5-10210U (1.6 GHz, up to 4.2 GHz, 6MB cache)<br />\r\n10th Gen Intel Core i7-10510U (1.8 GHz, up to 4.9 GHz, 8MB cache)<br />\r\nChipset	Intel SoC Platform<br />\r\nAMD SoC Platform<br />\r\nModel GPU	Model AMD:<br />\r\nSampai dengan AMD Radeon Vega 8 Graphics<br />\r\n<br />\r\nModel Intel:<br />\r\nIntel UHD Graphics 610<br />\r\nIntel UHD Graphics 620<br />\r\nNVIDIA GeForce MX230<br />\r\nMemori & Penyimpanan	RAM	4GB , 8GB , 12GB , 16GB<br />\r\nTipe Memori	DDR4<br />\r\nKecepatan Memori	2400MHz , 2666MHz<br />\r\nMemori Tambahan	Up to 16GB (Intel)<br />\r\nUp to 8GB (AMD)<br />\r\nSlot Memori	1x slot<br />\r\nTipe Penyimpanan	SSD , HDD+SSD/eMMC<br />\r\nFormat HDD	2.5 inches<br />\r\nKecepatan Rotasi	5400 rpm<br />\r\nSSD/eMMC	128GB , 256GB , 512GB , 1TB<br />\r\nDrive Optikal	No<br />\r\nLayar	Ukuran Layar	14.00 inches<br />\r\nResolusi	HD 1366 x 768 pixels<br />\r\nFHD 1920 x 1080 pixels<br />\r\nTipe Panel	LED-backlit IPS, Touch<br />\r\nLED-backlit TN, Touch<br />\r\nNetwork	WiFi	802.11ac 1x1 Wi-Fi<br />\r\n802.11ac 2x2 Wi-Fi<br />\r\nKonektifitas	Konektifitas	HDMI , Bluetooth , Card Reader , Speakers , Microphone , Trackpad , USB Type-C , USB3.1<br />\r\nSoftware	OS	Windows 10<br />\r\nOS Ver	Windows 10 Home<br />\r\nWindows 10 Home S<br />\r\nWindows 10 Pro<br />\r\nBaterai	Baterai	4-cell Li-Polymer 45Wh battery<br />\r\n45W or 65W Round Tip AC adapter, 65W adapter supports rapid charge (1 hour 80%)<br />\r\nUkuran	Dimensi	328 x 229 x 17.9 mm / 12.9 x 9.0 x 0.7 inches<br />\r\nBerat	Starting at 1.65 kg<br />\r\nPenilaian-penilaian berikut bervariasi di setiap toko. Silahkan periksa setiap toko sebelum Anda melakukan pembelian.<br />\r\nHarga Lenovo IdeaPad C340 14 di Indonesia mulai Rp 7.000.000<br />\r\nHarga termurah Lenovo IdeaPad C340 14 yaitu Rp 7.000.000 di Tokopedia, dimana 22% lebih murah daripada harga IdeaPad C340 14 di Lazada (Rp 9.029.900). Harga terbaru Lenovo IdeaPad C340 14 diperbarui pada 28/10/2020 09:35.<br />\r\n<br />\r\nRangkuman Harga Lenovo IdeaPad C340 14 di Indonesia<br />\r\nNama Toko	Harga	Ongkos Kirim<br />\r\nTokopedia	Rp 7.000.000	Hubungi Toko<br />\r\nShopee	Rp 8.949.999	Hubungi Toko<br />\r\nLazada	Rp 9.029.900	Hubungi Toko<br />\r\nDaftar Harga Lenovo IdeaPad C340 14 Berdasarkan Negara<br />\r\nNegara	Harga	Harga Dalam Rupiah<br />\r\nIndonesia	IDR 7.000.000	Rp 7.000.000<br />\r\nFilipina	PHP 18,098.99	Rp 5.525.682<br />\r\nThailand	THB 15,990	Rp 7.561.202', 7100000, 6800000, 100, 1, 12, 'Produk2020-10-30-20-32-14.png', 'lenovo_ideapad_c340_14', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_session`
--

CREATE TABLE `shop_session` (
  `id` varchar(200) DEFAULT NULL,
  `ip_address` varchar(18) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `timestamp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_session`
--

INSERT INTO `shop_session` (`id`, `ip_address`, `data`, `timestamp`) VALUES
('968d1214f0ab2bfbc6f0a715c60836dc6095c647', '::1', '__ci_last_regenerate|i:1603864611;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603864611'),
('7a6c2ec90c09f36d01772048e6bfcb21a8f28480', '::1', '__ci_last_regenerate|i:1603865018;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603865018'),
('2275c131a9102edf71c33af50ef24684a70958fe', '::1', '__ci_last_regenerate|i:1603865490;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603865490'),
('41b78a0f847ed91a208996687718b9c21bd46f48', '::1', '__ci_last_regenerate|i:1603865797;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603865797'),
('5fa898f9a02e72d192d692d3c2237079a60c60ac', '::1', '__ci_last_regenerate|i:1603866143;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603866143'),
('bbe3a4e300cfe7c4f4e1a57af4b5d13e1132886b', '::1', '__ci_last_regenerate|i:1603866521;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603866521'),
('f921647610552264705960949f4972dd72064135', '::1', '__ci_last_regenerate|i:1603866945;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603866945'),
('ee7ed168030a9c995c6a3e7ba061e6db79b1c94d', '::1', '__ci_last_regenerate|i:1603867439;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603867439'),
('e0d2efdefafcd74afdcc4a93dc03f981f12166bc', '::1', '__ci_last_regenerate|i:1603867761;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603867761'),
('201c23a6edfb5ff44a999bb1d8a907feff34fd7f', '::1', '__ci_last_regenerate|i:1603868074;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603868074'),
('3817f2620f86f678babcd55723479108d2ccea3d', '::1', '__ci_last_regenerate|i:1603868397;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603868397'),
('bb70834553fb9f3855251b8147e0f21b9f1aaefe', '::1', '__ci_last_regenerate|i:1603868698;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603868698'),
('30ffd5a1f127076012cb400cc79c478b63c99f27', '::1', '__ci_last_regenerate|i:1603869066;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603869066'),
('0e7d9e31aed51771b6ab83e4bf2d106a97111ed6', '::1', '__ci_last_regenerate|i:1603871705;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603871705'),
('73b7298a2bdb88d253c1840a90ef2626dbc099a1', '::1', '__ci_last_regenerate|i:1603872012;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603872012'),
('61d9ebf98a5a1ea1f2161ab724e34afb064d36f9', '::1', '__ci_last_regenerate|i:1603872012;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603872322'),
('5794d93f825a27335a3208de325d7cae007f9356', '::1', '__ci_last_regenerate|i:1603872718;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603872718'),
('0510c2993fdc9edb2432fed415ec5691d004ab9a', '::1', '__ci_last_regenerate|i:1603873079;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603873079'),
('b458905f9910b55f2da05606a9f1e9ebbfcbaddb', '::1', '__ci_last_regenerate|i:1603873770;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603873770'),
('78515fd23fa6ba89ea00560b81637534779e433e', '::1', '__ci_last_regenerate|i:1603874106;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}cart_contents|a:3:{s:10:\"cart_total\";d:3599000;s:11:\"total_items\";d:1;s:32:\"dfe1910cffaf2cee3879160817318648\";a:11:{s:2:\"id\";s:14:\"20201028153304\";s:10:\"id_product\";s:2:\"61\";s:3:\"qty\";d:1;s:4:\"slug\";s:7:\"poco_x3\";s:5:\"price\";d:3599000;s:5:\"berat\";i:50;s:4:\"name\";s:7:\"Poco X3\";s:11:\"information\";s:32:\"[Jumlah : 1] &rarr; <b>w</b><br>\";s:7:\"picture\";s:29:\"Produk2020-10-28-13-40-06.png\";s:5:\"rowid\";s:32:\"dfe1910cffaf2cee3879160817318648\";s:8:\"subtotal\";d:3599000;}}', '1603874106'),
('762cfb119a7e498fdb3342a7df6f4edf7d2488a3', '::1', '__ci_last_regenerate|i:1603874590;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1603874590'),
('c245bf73e8f854d360be0aa1947321dbed84fc98', '::1', '__ci_last_regenerate|i:1603875044;KCFINDER|a:0:{}CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}myAqua|s:1:\"6\";', '1603875044'),
('7369743ea87210551107c20a589f6e76bf550974', '::1', '__ci_last_regenerate|i:1603875365;KCFINDER|a:0:{}CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}myAqua|s:1:\"6\";cart_contents|a:3:{s:10:\"cart_total\";d:3599000;s:11:\"total_items\";d:1;s:32:\"00a55cda11e235da4f944e0c511ae060\";a:11:{s:2:\"id\";s:14:\"20201028155132\";s:10:\"id_product\";s:2:\"61\";s:3:\"qty\";d:1;s:4:\"slug\";s:7:\"poco_x3\";s:5:\"price\";d:3599000;s:5:\"berat\";i:50;s:4:\"name\";s:7:\"Poco X3\";s:11:\"information\";s:32:\"[Jumlah : 1] &rarr; <b>2</b><br>\";s:7:\"picture\";s:29:\"Produk2020-10-28-13-40-06.png\";s:5:\"rowid\";s:32:\"00a55cda11e235da4f944e0c511ae060\";s:8:\"subtotal\";d:3599000;}}', '1603875365'),
('3b5378b5e34c403aedd0d67e4d29dddc9d7db076', '::1', '__ci_last_regenerate|i:1603875365;KCFINDER|a:0:{}CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}myAqua|s:1:\"2\";', '1603875494'),
('06fdaddd8feb8aab2cf101084daa84c96c77f4d7', '127.0.0.1', '__ci_last_regenerate|i:1603878592;', '1603878599'),
('735772ed58cbdfb4d1d4cbd9140ef53759148103', '127.0.0.1', '__ci_last_regenerate|i:1604064303;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1604064303'),
('241b4c23a8a57ff81287ea349386ab22303bcac2', '127.0.0.1', '__ci_last_regenerate|i:1604064734;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1604064734'),
('2c49e400e03be861498a1a669348e39af3f4c0bc', '127.0.0.1', '__ci_last_regenerate|i:1604064734;KCFINDER|a:0:{}myAqua|s:1:\"2\";CIPTASHOP|a:1:{s:8:\"KCFINDER\";a:2:{s:8:\"disabled\";b:0;s:9:\"uploadDir\";s:6:\"upload\";}}', '1604064779');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_setting`
--

CREATE TABLE `shop_setting` (
  `shortname_shop` varchar(20) NOT NULL,
  `longname_shop` varchar(100) NOT NULL,
  `motto_shop` varchar(100) NOT NULL,
  `location_shop` varchar(120) NOT NULL,
  `name_manage` varchar(100) NOT NULL,
  `bbm_contact` varchar(20) NOT NULL,
  `wa_contact` varchar(20) NOT NULL,
  `phone_contact` varchar(20) NOT NULL,
  `email_shop` varchar(30) NOT NULL,
  `propinsi_shop` varchar(20) NOT NULL,
  `kabupaten_shop` varchar(20) NOT NULL,
  `logo_shop` varchar(50) NOT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `twitter` varchar(300) DEFAULT NULL,
  `google` varchar(300) DEFAULT NULL,
  `instagram` varchar(300) DEFAULT NULL,
  `youtube` varchar(300) DEFAULT NULL,
  `pos` int(1) DEFAULT NULL,
  `jne` int(1) DEFAULT NULL,
  `tiki` int(1) DEFAULT NULL,
  `gratis_ongkir_wilayah` int(1) DEFAULT NULL,
  `cod_wilayah` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_setting`
--

INSERT INTO `shop_setting` (`shortname_shop`, `longname_shop`, `motto_shop`, `location_shop`, `name_manage`, `bbm_contact`, `wa_contact`, `phone_contact`, `email_shop`, `propinsi_shop`, `kabupaten_shop`, `logo_shop`, `facebook`, `twitter`, `google`, `instagram`, `youtube`, `pos`, `jne`, `tiki`, `gratis_ongkir_wilayah`, `cod_wilayah`) VALUES
('SAGITA MULTIMEDIA', 'COMPUTER DAN GADGEDS', 'KHUALITAS TERJAMIN', 'Jl setyabudino 19', 'AGUS SALIM H', '', '08515654007', '', 'rian01@gmail.com', '11', '80', 'lidya.png', 'https://facebook.com/Rian', 'https://twitter.com/Rian', '', 'https://instagram.com/Rian', '', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_skin`
--

CREATE TABLE `shop_skin` (
  `id_skin` int(3) NOT NULL,
  `skin` varchar(15) NOT NULL,
  `example` varchar(50) NOT NULL,
  `skin_status` int(2) NOT NULL,
  `ket` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_skin`
--

INSERT INTO `shop_skin` (`id_skin`, `skin`, `example`, `skin_status`, `ket`) VALUES
(1, 'style-1', 'style-1.png', 0, 'tema 1'),
(2, 'style-2', 'style-2.png', 0, 'tema 2'),
(3, 'style-3', 'style-3.png', 0, 'tema 3'),
(4, 'style-4', 'style-4.png', 0, 'tema 4'),
(5, 'style-5', 'style-5.png', 1, 'tema 5'),
(6, 'style-6', 'style-6.png', 0, 'tema 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_slider`
--

CREATE TABLE `shop_slider` (
  `id_slider` int(11) NOT NULL,
  `slider` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_testimoni`
--

CREATE TABLE `shop_testimoni` (
  `id_testimony` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp(),
  `testimony` text DEFAULT NULL,
  `state` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_testimoni`
--

INSERT INTO `shop_testimoni` (`id_testimony`, `email`, `name`, `time`, `testimony`, `state`) VALUES
(1, 'RianBtk@gmail.com', 'RianBtk', '2020-03-26 16:22:30', 'BTK', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_transaction`
--

CREATE TABLE `shop_transaction` (
  `id_transaction` varchar(100) NOT NULL,
  `no_invoice` varchar(40) NOT NULL,
  `kode_pembelian` varchar(40) NOT NULL,
  `name_customer` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `province` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `courier` varchar(5) NOT NULL,
  `packet` varchar(30) DEFAULT NULL,
  `to_customer` varchar(3) DEFAULT NULL,
  `price_ongkir` int(11) NOT NULL,
  `time_transaction` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_transaction` int(11) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `payment_transaction` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `no_resi` varchar(50) DEFAULT NULL,
  `state` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_transaction`
--

INSERT INTO `shop_transaction` (`id_transaction`, `no_invoice`, `kode_pembelian`, `name_customer`, `email`, `province`, `city`, `address`, `courier`, `packet`, `to_customer`, `price_ongkir`, `time_transaction`, `total_transaction`, `bank`, `payment_transaction`, `phone`, `bukti`, `no_resi`, `state`) VALUES
('20201028153724', 'INV-000000001', '4cc4413vmS', 'AGUS SALIM HADJRIANTO', 'Gusalim04@gmail.com', 11, 80, 'Jl setyabudi no 19', 'jne', 'CTC', '3-6', 9000, '2020-10-28 08:37:24', 11006000, '1', 1, '08565678666', 'Bukti2020-10-28-15-38-33.png', '', 2),
('20201028155605', 'INV-000000001', '8jk1LuzIs0', 'RIAN', 'rianbtk@gmail.com', 23, 125, 'Flores kota', 'jne', 'REG', '3-5', 73000, '2020-10-28 08:56:05', 3672000, '4', 1, '08627572527', '', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_transaction_details`
--

CREATE TABLE `shop_transaction_details` (
  `id_transaction` varchar(100) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty_transaction` int(11) NOT NULL,
  `information` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_transaction_details`
--

INSERT INTO `shop_transaction_details` (`id_transaction`, `id_product`, `qty_transaction`, `information`) VALUES
('20201028153724', 60, 1, '[Jumlah : 1] &rarr; <b>Warna Hitam Min</b><br>'),
('20201028153724', 61, 2, '[Jumlah : 2] &rarr; <b>Ram 8 GB Min</b><br>'),
('20201028155605', 61, 1, '[Jumlah : 1] &rarr; <b>2</b><br>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop_user`
--

CREATE TABLE `shop_user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `username_user` varchar(30) NOT NULL,
  `password_user` text NOT NULL,
  `access_user` int(1) NOT NULL,
  `state_user` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shop_user`
--

INSERT INTO `shop_user` (`id_user`, `name_user`, `username_user`, `password_user`, `access_user`, `state_user`) VALUES
(4, 'GALANG', 'admin3', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1),
(2, 'RIAN', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1),
(5, 'ANGGIT', 'admin2', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1),
(7, 'FERY', 'admin4', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1),
(6, 'DHUTA', 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `shop_bank`
--
ALTER TABLE `shop_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `shop_image_product`
--
ALTER TABLE `shop_image_product`
  ADD PRIMARY KEY (`id_image_product`);

--
-- Indeks untuk tabel `shop_options`
--
ALTER TABLE `shop_options`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `shop_payment`
--
ALTER TABLE `shop_payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `shop_product`
--
ALTER TABLE `shop_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `shop_skin`
--
ALTER TABLE `shop_skin`
  ADD PRIMARY KEY (`id_skin`);

--
-- Indeks untuk tabel `shop_slider`
--
ALTER TABLE `shop_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `shop_testimoni`
--
ALTER TABLE `shop_testimoni`
  ADD PRIMARY KEY (`id_testimony`);

--
-- Indeks untuk tabel `shop_transaction`
--
ALTER TABLE `shop_transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indeks untuk tabel `shop_user`
--
ALTER TABLE `shop_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `shop_bank`
--
ALTER TABLE `shop_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `shop_image_product`
--
ALTER TABLE `shop_image_product`
  MODIFY `id_image_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `shop_options`
--
ALTER TABLE `shop_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `shop_payment`
--
ALTER TABLE `shop_payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `shop_product`
--
ALTER TABLE `shop_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `shop_skin`
--
ALTER TABLE `shop_skin`
  MODIFY `id_skin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `shop_slider`
--
ALTER TABLE `shop_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `shop_testimoni`
--
ALTER TABLE `shop_testimoni`
  MODIFY `id_testimony` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `shop_user`
--
ALTER TABLE `shop_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
