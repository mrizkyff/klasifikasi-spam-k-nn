-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2021 at 08:12 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klastering`
--




-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `tanggal`) VALUES
(1, 'admin', 'sasageyo', '2021-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `sms_fix`
--

CREATE TABLE `sms_fix` (
  `id` int(11) NOT NULL,
  `teks` varchar(255) NOT NULL,
  `stem` varchar(255) DEFAULT NULL,
  `cluster` int(11) NOT NULL DEFAULT -1,
  `cluster_predict` int(11) NOT NULL DEFAULT -1,
  `jarak_euclid` float NOT NULL DEFAULT -1,
  `tanggal` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_fix`
--

INSERT INTO `sms_fix` (`id`, `teks`, `stem`, `cluster`, `cluster_predict`, `jarak_euclid`, `tanggal`) VALUES
(2, 'Selamat Nomo Anda Resmi Mendapatkan Hadiah Ke-2 Cek Tunai Rp.175jt Kode ID pemenang', 'selamat nomo resmi hadiah -2 cek tunai rp 175jt kode id menang', 1, -1, -1, '12/12/13'),
(3, 'Assalamualaikum,(BUTUH M0DAL USAHA DLL.)MINAT TLP/CHAT WHATSAP: +6282211244113', 'assalamualaikum butuh m0dal usaha dll minat tlp chat whatsap 6282211244113', 1, -1, -1, '12/12/14'),
(4, 'Pelanggan 085712420668, +1000 KOIN PULSA mu Masih Belum Diambil? Hub *858*22# utk Ambil. Bisa Ditukar Pulsa, Sayang Jangan Sampai Hangus. Hub *858*22# Sekarang!', 'langgan 085712420668 1000 koin pulsa mu ambil hub 858 22 utk tukar sayang hangus', 1, -1, -1, '12/12/15'),
(5, 'Assalamualaikum butuh pinjaman dana tanpa agunan? 5juta sampai 500juta Untuk info chat Whatsapp:081543173313', 'assalamualaikum butuh pinjam dana agun 5juta 500juta info chat whatsapp 081543173313', 1, -1, -1, '12/12/16'),
(6, 'SeIamat Anda Mendapatkan Cek Tunai Rp.125 juta dari LAZADA INDONESIA Dengan PIN Pemenang (CK64Z77) Untuk Info Klik: www.gebyar-undian-ptlazada.gq', 'seiamat cek tunai rp 125 juta lazada indonesia pin menang ck64z77 info klik www gebyar-undian-ptlazada gq', 1, -1, -1, '12/12/17'),
(7, 'Selamat Anda yang telah resmi terpilih sebagai pemenang dari SHOPEE INDONESIA Dengan Kode Pin [AD25MD47] Untuk info klik : bit.ly/shopee-bigsale2021', 'selamat resmi pilih bagai menang shopee indonesia kode pin ad25md47 info klik bit ly shopee-bigsale2021', 1, -1, -1, '12/12/18'),
(8, 'maaf mengganggu waktunya mba/mas kami menawarkan pinjaman berbasis online dengan bunga 02% jika minat Whatsapp 081524388712', 'maaf ganggu mba mas tawar pinjam bas online bunga 02 minat whatsapp 081524388712', 1, -1, -1, '12/12/19'),
(9, 'Assalamu alaikum wr,wb. BAPAK/IBU Mohon maaf mengganggu waktunya, jika butu M0DAL Usaha Dan lain lain nya silahkan Chat kami ke WA : 0852-2621-9409', 'assalamu alaikum wr wb mohon maaf ganggu butu m0dal usaha nya silah chat wa 0852-2621-9409', 1, -1, -1, '12/12/20'),
(10, 'Selamat Nomor Anda Resmi Mendapatkan Hadiah Ke-2 Cek Tunai Rp.175juta Kode ID pemenang', 'selamat nomor resmi hadiah -2 cek tunai rp 175juta kode id menang', 1, -1, -1, '12/12/21'),
(11, 'selamat simcard anda resmi terpilih sebagai pemenang ke 2 dari PT.LEN INDUSTRI 4G Nomor pin(25E477R) untuk info click: bit.ly/undian-ptleg4g', 'selamat simcard resmi pilih bagai menang 2 pt len industri 4g nomor pin 25e477r info click bit ly undian-ptleg4g', 1, -1, -1, '12/12/22'),
(12, 'BUTUH MODAL buat usaha kami SIAP membantu dari AGEN PIN-OL aman TERPERCAYA WHATSAPP 082189283388', 'butuh modal usaha siap bantu agen pin-ol aman percaya whatsapp 082189283388', 1, -1, -1, '12/12/23'),
(13, 'Situs ASIATARUHAN Cashback bola 7% Cashback casino 3% +roling 0,8% Rollingan Slot 0,8% Rollingan Poker, Domino 0,5% Whatsapp: wa.me/85516983359 www.asiataruhan8.com', 'situs asiataruhan cashback bola 7 casino 3 roling 0 8 rollingan slot poker domino 5 whatsapp wa me 85516983359 www asiataruhan8 com', 1, -1, -1, '12/12/24'),
(14, 'SHOPEE Selamat Nomor +6285712xxxxxx Anda resmi Mendapatkan hadiah Ke-2 cek tunai Rp.175 juta KODE ID PEMENANG:(AD25MD47) Untuk info hadiah Klik. www.hadiahresmi-jkt39.online', 'shopee selamat nomor 6285712xxxxxx resmi hadiah -2 cek tunai rp 175 juta kode id menang ad25md47 info klik www hadiahresmi-jkt39 online', 1, -1, -1, '12/12/25'),
(15, 'UNDIAN RESMI!!! SELAMAT NO ANDA TERPILIH JADI PEMENANG KE 2 CEK TUNAI 175 JUTA DENGAN KODE PIN: AD25MD47 UNTUK INFO HADIAH KILIK: bit.ly/big-sale11-11', 'undi resmi selamat no pilih menang 2 cek tunai 175 juta kode pin ad25md47 info hadiah kilik bit ly big-sale11-11', 1, -1, -1, '12/12/26'),
(16, 'bagi bapak/ibu yang lagi pusing untuk keperluan<U A N G> kami siap membantu solusi ke U A N G anda info lebih lanjut WA 085241521257 terimakasi', 'pusing perlu a n g siap bantu solusi info wa 085241521257 terimakasi', 1, -1, -1, '12/12/27'),
(17, 'maaf saya kabari lewat sms apabila kontrakannya masih dilanjutkan pembayarannya lewat adik saya pak Fauzy no.wa 082311220357 soalnya sudah atas nama dia.', 'maaf kabar sms kontra lanjut bayar adik fauzy no wa 082311220357 soal nama', 1, -1, -1, '12/12/28'),
(18, 'penyampaian terakhir kepada anda sebagai pemenang ke-2 shopee 12.12 cek 175 juta pin: J7K2B59 untuk info Hadiah Klik', 'sampai bagai menang -2 shopee 12 cek 175 juta pin j7k2b59 info hadiah klik', 1, -1, -1, '12/12/29'),
(19, 'SELAMAT!!! Anda telah terpilih sebagai pemenang HADIAH AKHIR TAHUN MOBOINDOSAT Dengab Kode PIN [AD25MD47] Untuk info klik : bit.ly/pesta-moboindosat2020', 'selamat pilih bagai menang hadiah moboindosat dengab kode pin ad25md47 info klik bit ly pesta-moboindosat2020', 1, -1, -1, '12/12/30'),
(20, 'selamat nomor anda terpilih mendapatkan hadiah ke-3 dari PT PERTAMINA dengan kode PIN (ER94098) Untuk info cek langsung di', 'selamat nomor pilih hadiah -3 pt pertamina kode pin er94098 info cek langsung', 1, -1, -1, '12/12/31'),
(21, 'Selamat...Nomor anda terpilih Sebagai pemenang ke-2 Rp.100 juta dari Gebyar Hadiah WhatsApp PIN PEMENANG A577B299 Untuk info klik: bit.ly/promowhatsapp1', 'selamat nomor pilih bagai menang -2 rp 100 juta gebyar hadiah whatsapp pin a577b299 info klik bit ly promowhatsapp1', 1, -1, -1, '12/12/32'),
(22, 'Selamat Nomor WhatsApp Anda Meraih Hadiah Cek 175 juta pin (WHA012) Silahkan Cek. pin anda klik. bit.ly/whatsapp-jkt129', 'selamat nomor whatsapp raih hadiah cek 175 juta pin wha012 silah klik bit ly whatsapp-jkt129', 1, -1, -1, '12/12/33'),
(23, 'Selamat nomor anda 085712xxx mendapat hadiah Rp175 juta dari shopee indonesia kode id pemenang AD25MD47 info klik hadiahptshopee1111.blogspot.com', 'selamat nomor 085712xxx hadiah rp175 juta shopee indonesia kode id menang ad25md47 info klik hadiahptshopee1111 blogspot com', 1, -1, -1, '12/12/34'),
(24, 'Selamat !!! Nomor Anda Terpilih Sebagai Pemenang Jutawan SHOPEE Dari Program Undian Awal Tahun Cek Senilai Rp.175 juta PIN: J7K2B59 Untuk Info Klik: www.gebyarundianshopee.cf', 'selamat nomor pilih bagai menang jutawan shopee program undi cek nila rp 175 juta pin j7k2b59 info klik www gebyarundianshopee cf', 1, -1, -1, '12/12/35'),
(25, 'yaya sering gitu wkwk', 'yaya gitu wkwk', 2, -1, -1, '12/12/36'),
(26, 'alhamdulillah, gimana gimana', 'alhamdulillah gimana', 2, -1, -1, '12/12/37'),
(27, 'udah mulai gila', 'udah gila', 2, -1, -1, '12/12/38'),
(28, 'iya terserah kamu aja.', 'iya serah aja', 2, -1, -1, '12/12/39'),
(29, 'cari ga dibeli?', 'cari ga beli', 2, -1, -1, '12/12/40'),
(30, 'baru ditinggal subuh', 'tinggal subuh', 2, -1, -1, '12/12/41'),
(31, 'ayok bobok', 'ayok bobok', 2, -1, -1, '12/12/42'),
(32, 'yaudah deh isiin 100 dulu ajaa. nanti kuganti', 'yaudah deh isiin 100 ajaa ganti', 2, -1, -1, '12/12/43'),
(33, 'lahya lewat apa? transfer?', 'lahya transfer', 2, -1, -1, '12/12/44'),
(34, 'bosen idup?', 'bosen idup', 2, -1, -1, '12/12/45'),
(35, 'Boleh minta review dan tag di IG ya kak @caseyvit.co', 'review tag ig ya kak caseyvit co', 2, -1, -1, '12/12/46'),
(36, 'biar nanti bisa dibuat review', 'biar review', 2, -1, -1, '12/12/47'),
(37, 'ya ampun penuh revisi ya', 'ya ampun penuh revisi', 2, -1, -1, '12/12/48'),
(38, 'Masa revisi banyak?', 'revisi', 2, -1, -1, '12/12/49'),
(39, 'Bapaknya revisi terus', 'bapak revisi', 2, -1, -1, '12/12/50'),
(40, 'Gak papa, aku revisi', 'gak papa revisi', 2, -1, -1, '12/12/51'),
(41, 'Habis sidang butuh REVISI', 'habis sidang butuh revisi', 2, -1, -1, '12/12/52'),
(42, 'Udah di revisi skripsi kamu?', 'udah revisi skripsi', 2, -1, -1, '12/12/53'),
(43, 'Udah di revisi itu berarti', 'udah revisi', 2, -1, -1, '12/12/54'),
(44, 'Revisi nya banyak apa sedikit emang?', 'revisi nya emang', 2, -1, -1, '12/12/55'),
(45, 'Apa gak ada revisi kali sa', 'apa gak revisi kali sa', 2, -1, -1, '12/12/56'),
(46, 'Wkwk aku belum revisi', 'wkwk revisi', 2, -1, -1, '12/12/57'),
(47, 'emang, cuma kita yang revisi', 'emang revisi', 2, -1, -1, '12/12/58'),


-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `teks` text DEFAULT NULL,
  `stem` text DEFAULT NULL,
  `cluster` int(11) NOT NULL DEFAULT -1,
  `cluster_predict` int(11) NOT NULL DEFAULT -1,
  `jarak_euclid` int(11) NOT NULL DEFAULT -1,
  `tanggal` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `teks`, `stem`, `cluster`, `cluster_predict`, `jarak_euclid`, `tanggal`) VALUES
(2, 'Cabai Rawit di Cimahi Meroket Menjadi Rp 120.000 per Kilogram', 'cabai rawit cimahi roket rp 120 000 kilogram', 1, -1, -1, '12/12/20'),
(3, 'Akibat Cuaca Buruk, Harga Cabai di Cirebon Naik', 'akibat cuaca buruk harga cabai cirebon', 1, -1, -1, '12/13/20'),
(4, 'Cabai Rawit Hijau Pimpin Kenaikan Harga Pangan Awal Pekan Ini', 'cabai rawit hijau pimpin naik harga pangan pekan', 1, -1, -1, '12/14/20'),
(5, 'Mendag Khawatir Harga Cabai Anjlok Saat Ramadan dan Lebaran', 'mendag khawatir harga cabai anjlok ramadan lebaran', 1, -1, -1, '12/15/20'),
(6, 'Harga Cabai Ngamuk ke Rp 100 Ribu, Mendag Ungkap Pemicunya', 'harga cabai ngamuk rp 100 ribu mendag picu', 1, -1, -1, '12/16/20'),
(7, 'Harga Cabai Meroket, Ikatan Pedagang Pasar Sentil Pemerintah', 'harga cabai roket ikat dagang pasar sentil perintah', 1, -1, -1, '12/17/20'),
(8, 'Harga Cabai Rawit di Yogyakarta Capai Rp 120 Ribu per Kg', 'harga cabai rawit yogyakarta capai rp 120 ribu kg', 1, -1, -1, '12/18/20'),
(9, 'Akibat Gagal Panen, Harga Cabai Rawit Merah Naik', 'akibat gagal panen harga cabai rawit merah', 1, -1, -1, '12/19/20'),
(10, 'Terus Naik, Harga Cabai Rawit Merah Tembus 120/Kg', 'harga cabai rawit merah tembus 120 kg', 1, -1, -1, '12/20/20'),
(11, 'Harga Cabai Rawit Merah Masih Naik, Operasi Pasar Akan Digelar di 3 Pasar di Jakbar', 'harga cabai rawit merah operasi pasar gelar 3 jakbar', 1, -1, -1, '12/21/20'),
(12, 'Cetak Gol ke-770, Ronaldo Kirim Pesan Emosional kepada Peler', 'cetak gol -770 ronaldo kirim pesan emosional peler', 2, -1, -1, '12/22/20'),
(13, 'Direktur Olahraga Juventus Membela Ronaldo', 'direktur olahraga juventus bela ronaldo', 2, -1, -1, '12/23/20'),
(14, 'Juventus Salah Membeli Ronaldo', 'juventus salah beli ronaldo', 2, -1, -1, '12/24/20'),
(15, 'Olahraga di Masa New Normal : Aturan dan Ragam Kekeliruan', 'olahraga new normal atur ragam keliru', 2, -1, -1, '12/25/20'),
(16, 'Olahraga yang bisa dilakukan selama pandemi COVID-19', 'olahraga pandemi covid-19', 2, -1, -1, '12/26/20'),
(17, 'Jenis Olahraga yang Direkomendasikan WHO Selama Pandemi Virus COVID', 'jenis olahraga rekomendasi pandemi virus covid', 2, -1, -1, '12/27/20'),
(18, 'Vaksinasi Covid-19 Tak Diwajibkan bagi Atlet', 'vaksinasi covid-19 wajib atlet', 2, -1, -1, '12/28/20'),
(19, 'Olahraga di Masa Pandemi Covid-19 Hambar Penuaan Sel Tubuh', 'olahraga pandemi covid-19 hambar tua sel tubuh', 2, -1, -1, '12/29/20'),
(20, 'Olahraga Aman di Masa Pandemi Covid-19', 'olahraga aman pandemi covid-19', 2, -1, -1, '12/30/20'),
(21, 'Jangan Lupa 3M Saat Olahraga di Masa Pandemi Covid-19', 'lupa 3m olahraga pandemi covid-19', 2, -1, -1, '12/31/20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sms`
--

CREATE TABLE `tb_sms` (
  `id` int(11) NOT NULL,
  `teks` text DEFAULT NULL,
  `stem` text DEFAULT NULL,
  `cluster` int(11) NOT NULL DEFAULT -1,
  `cluster_predict` int(11) NOT NULL DEFAULT -1,
  `jarak_euclid` int(11) NOT NULL DEFAULT -1,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sms`
--

INSERT INTO `tb_sms` (`id`, `teks`, `stem`, `cluster`, `cluster_predict`, `jarak_euclid`, `tanggal`) VALUES
(2, 'penyakit mata', 'sakit mata', -1, -1, -1, '2021-03-24'),
(3, 'pencurian uang adalah penyakit masyarakat', 'curi uang sakit masyarakat', -1, -1, -1, '2021-03-12'),
(4, 'penyakit kekurangan uang', 'sakit kurang uang', -1, -1, -1, '2021-03-23');

-
--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_fix`
--
ALTER TABLE `sms_fix`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sms`
--
ALTER TABLE `tb_sms`
  ADD PRIMARY KEY (`id`);



--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_fix`
--
ALTER TABLE `sms_fix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;


--
-- AUTO_INCREMENT for table `tb_sms`
--
ALTER TABLE `tb_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;