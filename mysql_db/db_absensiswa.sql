-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Feb 2018 pada 23.10
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Alfa','Izin','Sakit','Hadir') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `siswa_id`, `kelas_id`, `tanggal`, `status`, `keterangan`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 1, 12, '2017-12-14', 'Izin', 'Izin', '2017-12-13 17:29:46', '2017-12-13 17:29:46', NULL),
(3, 3, 12, '2017-12-14', 'Sakit', 'Sakit', '2017-12-13 17:34:03', '2017-12-13 17:34:03', NULL),
(11, 1, 12, '2018-02-08', 'Sakit', 'Sakit', '2018-02-07 10:53:18', '2018-02-07 10:53:18', NULL),
(12, 2, 12, '2018-02-08', 'Sakit', 'Sakit', '2018-02-07 10:53:18', '2018-02-07 10:53:18', NULL),
(13, 3, 12, '2018-02-08', 'Alfa', 'Alfa', '2018-02-07 10:53:18', '2018-02-07 10:53:18', NULL),
(14, 4, 12, '2018-02-08', 'Izin', 'Izin', '2018-02-07 11:13:12', '2018-02-07 11:13:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(10) UNSIGNED NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `tingkat_kelas` enum('X','XI','XII') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` enum('RPL','TKJ','MM') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `tahun_keluar` year(4) NOT NULL,
  `wali_kelas` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tingkat_kelas`, `jurusan`, `nama_kelas`, `kuota`, `tahun_masuk`, `tahun_keluar`, `wali_kelas`) VALUES
(9, 'X', 'RPL', '1', 40, 2017, 2018, NULL),
(10, 'X', 'RPL', '2', 40, 2017, 2018, NULL),
(11, 'XI', 'RPL', '1', 40, 2017, 2018, NULL),
(12, 'XII', 'RPL', '1', 40, 2017, 2018, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2017_10_27_142219_create_table_siswa', 1),
(10, '2017_10_27_142653_create_table_kelas', 1),
(11, '2017_10_27_143125_create_table_absensi', 1),
(12, '2017_10_27_144836_create_table_siswa_kelas', 1),
(13, '2017_11_04_063824_create_pdf_table', 1),
(14, '2017_11_07_163530_create_table_user', 2),
(15, '2017_11_09_131335_create_table_guru', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pdf`
--

CREATE TABLE `pdf` (
  `id_pdf` int(10) UNSIGNED NOT NULL,
  `jenis` enum('H','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) UNSIGNED NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan','L','P') NOT NULL,
  `tingkat_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `jenis_kelamin`, `tingkat_kelas`) VALUES
(1, '151610382', 'Andrian Firmansyah', 'L', 'XII'),
(2, '151610383', 'Arif Nurdiansyah', 'L', 'XII'),
(3, '151610386', 'Citra Fitri Pratiwi', 'P', 'XII'),
(4, '151610387', 'Deri Komara', 'L', 'XII'),
(5, '151610388', 'Devid Alfian', 'L', 'XII'),
(6, '151610390', 'Diky Badar Saputra', 'L', 'XII'),
(7, '151610393', 'Fahrul Septiana', 'L', 'XII'),
(8, '151610397', 'Fikri Dzulfiqar Zain', 'L', 'XII'),
(9, '151610402', 'Irfan Saepur Rohman', 'L', 'XII'),
(10, '151610405', 'Mila Amalia', 'P', 'XII'),
(11, '151610413', 'Sekar Mawardi Utomo', 'L', 'XII'),
(12, '151610422', 'Bagoes Cahya Ardhana', 'L', 'XII'),
(13, '151610426', 'Fahriza Vita Akbar', 'P', 'XII'),
(14, '151610434', 'Ikhsan Rahmadsyah', 'L', 'XII'),
(15, '151610440', 'Mochamad Febryan Putra Herawan', 'L', 'XII'),
(16, '151610441', 'Muhammad Luthfi Hizbulloh', 'L', 'XII'),
(17, '151610444', 'Rani Triani Gustia', 'P', 'XII'),
(18, '151610448', 'Ronald Rizki Akbar Ambarisan', 'L', 'XII'),
(19, '151610450', 'Shavira Ariyani', 'P', 'XII'),
(20, '151610455', 'Adityawan Chandra', 'P', 'XII'),
(21, '151610464', 'Fajar Nursidiq', 'L', 'XII'),
(22, '151610475', 'Muhammad Arief Kurnianto', 'L', 'XII'),
(23, '151610481', 'Novan Kurniansyah', 'L', 'XII'),
(24, '151610484', 'Ripaldi Sabarno', 'L', 'XII'),
(25, '151610500', 'Farhan Rizky Fauzi Setiawan', 'L', 'XII'),
(26, '151610501', 'Fikri Fauzan Akbar', 'L', 'XII'),
(27, '151610504', 'Gusnandi Arafi Azhar', 'L', 'XII'),
(28, '151610511', 'Kurniawan Wijaya', 'L', 'XII'),
(29, '151610517', 'Risma Artha Melvia Arofi', 'P', 'XII'),
(30, '151610518', 'Rivaldi Palermo', 'L', 'XII'),
(31, '151610522', 'Sendy Dzikri Ferdiansyah', 'L', 'XII'),
(32, '151610523', 'Syahrul Daffa Mahesa', 'L', 'XII'),
(33, '151610550', 'Luthfi Sukmawardhani', 'L', 'XII'),
(34, '151610552', 'Mochamad Fiqri Ardiansyah', 'L', 'XII'),
(35, '151610558', 'Muhammad Ramadhan Maulana Asyarief', 'L', 'XII'),
(36, '151610565', 'Roy Ryando Roni Habeahan', 'L', 'XII'),
(37, '161710470', 'David Fauzi Shidqie', 'L', 'XI'),
(38, '161710474', 'Fathur Rachman Aryanto', 'L', 'XI'),
(39, '161710475', 'Fitri Nuraini', 'P', 'XI'),
(40, '161710476', 'Gefy Aqillah Aqshal', 'L', 'XI'),
(41, '161710478', 'Ilham Hambali Nasrulloh', 'L', 'XI'),
(42, '161710479', 'Kaleb Adi Pramono', 'L', 'XI'),
(43, '161710480', 'Leni Aulia Ayu', 'P', 'XI'),
(44, '161710486', 'Muhamad Faisal Akbar', 'L', 'XI'),
(45, '161710488', 'Nisrina Indah Rahmantyah', 'P', 'XI'),
(46, '161710490', 'Rahmi Attifah', 'P', 'XI'),
(47, '161710494', 'Rizky Subagja Sopandi', 'L', 'XI'),
(48, '161710499', 'Tedi Maulana', 'L', 'XI'),
(49, '161710500', 'Yudistira Viandy', 'L', 'XI'),
(50, '161710502', 'Afni Zahrotulmuna Syaro', 'P', 'XI'),
(51, '161710510', 'Ekatama Ilham Prayoga', 'L', 'XI'),
(52, '161710517', 'Lia Emilia', 'P', 'XI'),
(53, '161710521', 'Mochamad Raffi Ramdhani', 'L', 'XI'),
(54, '161710534', 'Silviana Wahyuningrum Sidik', 'L', 'XI'),
(55, '161710537', 'Tio Hardadi Somantri', 'L', 'XI'),
(56, '161710540', 'Agis Tamami Wasfika', 'L', 'XI'),
(57, '161710542', 'Anisa Pradasurya', 'P', 'XI'),
(58, '161710549', 'Fadilah Muhamad Riantino Akbar', 'L', 'XI'),
(59, '161710551', 'Fawwaz Baahir Hidayatulloh', 'L', 'XI'),
(60, '161710553', 'Giustry Fadh Wirannapoera', 'L', 'XI'),
(61, '161710556', 'Lia Nurjanah', 'P', 'XI'),
(62, '161710558', 'Mahmud Hamdani', 'L', 'XI'),
(63, '161710559', 'Mochamad Alif Yasin Mubarok', 'L', 'XI'),
(64, '161710564', 'Nugraha Agung', 'L', 'XI'),
(65, '161710566', 'Renita Geby Nababan', 'P', 'XI'),
(66, '161710568', 'Rivan Mochammad Fauzi', 'L', 'XI'),
(67, '161710572', 'Silvy Novia Vanjily', 'P', 'XI'),
(68, '161710574', 'Sylvania Diva Jezreelia', 'P', 'XI'),
(69, '161710582', 'Candra Ramdhan', 'L', 'XI'),
(70, '161710590', 'Haris Rachman', 'L', 'XI'),
(71, '161710599', 'Muhammad Rizal Supriadi', 'L', 'XI'),
(72, '161710604', 'Resa Agustin', 'P', 'XI'),
(73, '161710606', 'Rizal Awal Suhada', 'L', 'XI'),
(74, '161710608', 'Sherly Oktaviani', 'P', 'XI'),
(75, '161710610', 'Siti Ashifa Miya Paramita', 'P', 'XI'),
(76, '161710611', 'Sri Wulandari', 'P', 'XI'),
(77, '161710612', 'Tarisa Refiana', 'P', 'XI'),
(78, '161710615', 'Akhdan Musyaffa Firdaus', 'L', 'XI'),
(79, '161710618', 'Anisa Oktaviani Rusmana', 'P', 'XI'),
(80, '161710622', 'Diki Farhan', 'L', 'XI'),
(81, '161710623', 'Eka Lestari', 'P', 'XI'),
(82, '161710627', 'Hanna Maudy Salsabila', 'P', 'XI'),
(83, '161710628', 'Helmi Fachry Aeymadu Rahman', 'L', 'XI'),
(84, '161710633', 'Michael Christensen Bonar Kaspar', 'L', 'XI'),
(85, '161710635', 'Muchammad Rivan Renaldy', 'L', 'XI'),
(86, '161710638', 'Nining Nur Fadilah', 'P', 'XI'),
(87, '161710644', 'Rizal Miftahul Falah', 'L', 'XI'),
(88, '161710650', 'Tiara Nur Haerani', 'P', 'XI'),
(89, '161710652', 'Yuni Nurlaela', 'P', 'XI'),
(90, '161710653', 'Al Fikri Shafar Hanif', 'L', 'XI'),
(91, '161710654', 'Andini Aulia Sari', 'P', 'XI'),
(92, '161710655', 'Anissa Nur Asyifaya', 'P', 'XI'),
(93, '161710656', 'Anwar Muhamad Sidiq', 'L', 'XI'),
(94, '161710657', 'Briliana Rosalin', 'P', 'XI'),
(95, '161710660', 'Dimas Pranakusumah', 'L', 'XI'),
(96, '161710662', 'Falih Naufal', 'L', 'XI'),
(97, '161710664', 'Garda Anggara Dwi Pangga S', 'L', 'XI'),
(98, '161710667', 'Intan Maulani', 'P', 'XI'),
(99, '161710669', 'Lutfiah Miftah Nur Fadillah', 'P', 'XI'),
(100, '161710677', 'Raditya Rizqy Rahmanda', 'L', 'XI'),
(101, '161710679', 'Riana Putri Agustin', 'P', 'XI'),
(102, '161710685', 'Sofy Fulpia', 'P', 'XI'),
(103, '161710688', 'Tivani Febriana Nurohmat', 'P', 'XI'),
(104, '171810001', 'Abdul Hafizh Fazrin', 'L', 'X'),
(105, '171810002', 'Adi Pratama', 'L', 'X'),
(106, '171810003', 'Alamsyah Wirayudha Hidayat', 'L', 'X'),
(107, '171810004', 'Andre Firmansyah', 'L', 'X'),
(108, '171810005', 'Anisa Febriani Puspa Kirana', 'P', 'X'),
(109, '171810006', 'Annisa Nurhasanah Nadia', 'P', 'X'),
(110, '171810007', 'Asep Ilham Setiadi', 'L', 'X'),
(111, '171810008', 'Dewa Putra Prijowedar', 'L', 'X'),
(112, '171810009', 'Dian Sri Utami', 'P', 'X'),
(113, '171810010', 'Dipa Awaliah Hasanah', 'P', 'X'),
(114, '171810011', 'Faizal Ramadhan', 'L', 'X'),
(115, '171810012', 'Faza Malik Al Hakim', 'L', 'X'),
(116, '171810013', 'Fitria Suprianti', 'P', 'X'),
(117, '171810014', 'Hadaina Dhiyaul Arsy', 'L', 'X'),
(118, '171810015', 'Hanif Abdurrouf Ramdhan', 'L', 'X'),
(119, '171810016', 'Hilmi Zein', 'L', 'X'),
(120, '171810017', 'Iman Wiguna', 'L', 'X'),
(121, '171810018', 'Intan Sahwal Fadilah Haq', 'P', 'X'),
(122, '171810019', 'Lucky Tri Bhakti', 'L', 'X'),
(123, '171810020', 'Mochamad Prasetyo', 'L', 'X'),
(124, '171810021', 'Muhamad Wendi Narizal Prasetio', 'L', 'X'),
(125, '171810022', 'Muhammad Harry Rizky', 'L', 'X'),
(126, '171810023', 'Muhammad Makmur Yahya', 'L', 'X'),
(127, '171810024', 'Muhammad Rafli Nugraha', 'L', 'X'),
(128, '171810025', 'Nadillathul Jannah', 'P', 'X'),
(129, '171810026', 'Rafi Dzaky Darmawan', 'L', 'X'),
(130, '171810027', 'Restu Akmal AL-Hunafa', 'L', 'X'),
(131, '171810028', 'Rihan Didan', 'L', 'X'),
(132, '171810029', 'Rio Giallorossi Riscky', 'L', 'X'),
(133, '171810030', 'Rizki Aryandi', 'L', 'X'),
(134, '171810031', 'Suci Novi Rahmawati', 'P', 'X'),
(135, '171810032', 'Tegar Aryadi', 'L', 'X'),
(136, '171810033', 'Tsara Azizah Nurul Andiki', 'P', 'X'),
(137, '171810034', 'Ujang Najib', 'L', 'X'),
(138, '171810035', 'Yusron Fauzan Nasrullah', 'L', 'X'),
(139, '171810036', 'Adi Mustopa Yusup', 'L', 'X'),
(140, '171810037', 'Akmal Fauzi Salman', 'L', 'X'),
(141, '171810038', 'Alfina Septrianti', 'P', 'X'),
(142, '171810039', 'Andi Permadi', 'L', 'X'),
(143, '171810040', 'Angga Saeful Prayoga', 'L', 'X'),
(144, '171810041', 'Annisa Frida Mardianti', 'P', 'X'),
(145, '171810042', 'Deiana Auli Dwi Putri', 'P', 'X'),
(146, '171810043', 'Denis Firmansyah Ramadhan', 'L', 'X'),
(147, '171810044', 'Dika Ruli Ulfiana', 'L', 'X'),
(148, '171810045', 'Dina K', 'P', 'X'),
(149, '171810046', 'Fajar Ramadhan', 'L', 'X'),
(150, '171810047', 'Faza Kamila Khoirunnisa', 'P', 'X'),
(151, '171810048', 'Gan Gan Ahmad Setriawan', 'L', 'X'),
(152, '171810049', 'Hafidz Rabbani', 'L', 'X'),
(153, '171810050', 'Hanannisa Fitrianindita', 'P', 'X'),
(154, '171810051', 'Harfin Taufik', 'L', 'X'),
(155, '171810052', 'Ihsan Rasidin', 'L', 'X'),
(156, '171810053', 'Ksatria Bagus Ramadhan', 'L', 'X'),
(157, '171810054', 'Lisdania Nurul Zannaty', 'P', 'X'),
(158, '171810055', 'Mochamad Insan', 'L', 'X'),
(159, '171810056', 'Muhamad Fathul Umam', 'L', 'X'),
(160, '171810057', 'Muhammad Abdul Aziz', 'L', 'X'),
(161, '171810058', 'Muhammad Iqbal Alamsah Sanjaya', 'L', 'X'),
(162, '171810059', 'Muhammad Rafli Jatnika', 'L', 'X'),
(163, '171810060', 'Muhammad Rafli Santana', 'L', 'X'),
(164, '171810061', 'Neng Sekar Arum Nurpuspita Mulya', 'P', 'X'),
(165, '171810062', 'Raga Puteraku Dermawan', 'L', 'X'),
(166, '171810063', 'Rifqi Rifaldi', 'L', 'X'),
(167, '171810064', 'Riko Hendrawan', 'L', 'X'),
(168, '171810065', 'Risma Septiani', 'P', 'X'),
(169, '171810066', 'Rivalda Fatah Rachman H', 'L', 'X'),
(170, '171810067', 'Surya Putra Pratama', 'L', 'X'),
(171, '171810068', 'Syifa Shintawati Azizah', 'P', 'X'),
(172, '171810069', 'Thoriq Asa Nurhanif', 'L', 'X'),
(173, '171810070', 'Yudi Maulana', 'L', 'X'),
(174, '171810071', 'Zhahra Sahira', 'P', 'X'),
(175, '171814565', 'Anezka Rahadatul Aisy', 'P', 'XI'),
(176, '192010456', 'Maryam Ammara Nur Ghadati Al - Amin', 'P', 'XI'),
(177, '192010675', 'Khawla Syifa Putri ', 'P', 'XI'),
(178, '192010876', 'Fakhira Sidqi Kholifah', 'P', 'XI'),
(179, '192010987', 'Syabilla Khoerunnisa Al Ghazali', 'P', 'XI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `id_siswa_kelas` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`id_siswa_kelas`, `siswa_id`, `kelas_id`) VALUES
(1, 1, 12),
(2, 2, 12),
(3, 3, 12),
(4, 4, 12),
(5, 5, 12),
(6, 6, 12),
(7, 7, 12),
(8, 8, 12),
(9, 9, 12),
(10, 10, 12),
(11, 11, 12),
(12, 12, 12),
(13, 13, 12),
(14, 14, 12),
(15, 15, 12),
(16, 20, 12),
(17, 36, 12),
(18, 125, 9),
(19, 119, 9),
(20, 120, 9),
(21, 117, 9),
(22, 114, 9),
(23, 112, 9),
(24, 113, 9),
(25, 105, 9),
(26, 137, 9),
(27, 108, 9),
(28, 128, 9),
(29, 109, 9),
(30, 138, 9),
(31, 139, 10),
(32, 140, 10),
(33, 141, 10),
(34, 142, 10),
(35, 143, 10),
(36, 144, 10),
(37, 145, 10),
(38, 37, 11),
(39, 38, 11),
(40, 40, 11),
(41, 41, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` enum('Admin','Piket','Ortu','Siswa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_siswa` int(10) UNSIGNED DEFAULT NULL,
  `id_guru` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `akses`, `remember_token`, `id_siswa`, `id_guru`) VALUES
(2, 'Piket', '$2y$10$gZTy10YM2sCMMn7oPBU8peZ2nJ25qwTp3gwYlsgpJz.b5mN78y0r2', 'Piket', 'q289IUDHYMZu94omJR6kUULynqok5pirqrcLVqYbbhg4Ko7BH3ZVVVA9sRN9', NULL, NULL),
(3, 'Admin', '$2y$10$0f5yKIcWpE8b/sA/uqKM5OUEl5kRHHjbMVXbj4sEuFQ6DIzq/OCV2', 'Admin', 's1DLmtVFBTLPWWqqgFXfDxDsYTY7CFz9kwoXxtaBd6yX7aqMOrxjpF8zmGel', NULL, NULL),
(4, '151610383', '$2y$10$0f5yKIcWpE8b/sA/uqKM5OUEl5kRHHjbMVXbj4sEuFQ6DIzq/OCV2', 'Siswa', 'lGUpyDGIPINslLViAWga1T7pLeShGW1RMWQvba3DdyK5BAPYWTHQMnKYx2PV', NULL, NULL),
(5, 'ortu', '$2y$10$0f5yKIcWpE8b/sA/uqKM5OUEl5kRHHjbMVXbj4sEuFQ6DIzq/OCV2', 'Ortu', 'eNOSfXnKeMTAyX68PgSLczXv7K5jAfO5OQwKJKbNBf9Nu5CGTGLo8oiDI2nL', 2, NULL),
(6, 'Jana', '$2y$10$tKrQGK5hLpbPYvQ567ME7.yt4bM3xHBtsl0zrdZ.qHGffAj3DzjtK', 'Ortu', 'xUEZaGjMyH8wELL458Vj63ON9ahd7YoKoYIVMrnSLlhFT9qiboM3P4l2VqQ5', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `guru_nip_unique` (`nip`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `wali_kelas` (`wali_kelas`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id_pdf`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`id_siswa_kelas`),
  ADD KEY `siswa_kelas_kelas_id_foreign` (`kelas_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_username_unique` (`username`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_guru` (`id_guru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id_pdf` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `id_siswa_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`wali_kelas`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD CONSTRAINT `siswa_kelas_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_kelas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
