-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 02:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi_ruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `nama_mata_kuliah` varchar(100) DEFAULT NULL,
  `smt` varchar(10) DEFAULT NULL,
  `kelas` varchar(15) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `urutan_hari` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `ruangan_id`, `nama_dosen`, `nama_mata_kuliah`, `smt`, `kelas`, `jam_mulai`, `jam_akhir`, `hari`, `urutan_hari`) VALUES
(1, 2, 'Asep Kurniawan, S.Pd., M.Kom.', 'Jaringan Komputer', '1', 'TMJ 1A', '07:30:00', '10:50:00', 'SENIN', 1),
(2, 2, 'Indra Hermawan, S.Kom., M.Kom.', 'Piranti Komputer', '1', 'TMJ 1A', '10:50:00', '15:00:00', 'SENIN', 1),
(4, 2, 'Dinda Kadarwati, M.Pd.', 'Bahasa Indonesia', '1', 'TMJ 1A', '10:50:00', '15:00:00', 'SELASA', 2),
(5, 2, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Inggris TI K1', '1', 'TMJ CCIT S', '15:00:00', '18:20:00', 'SELASA', 2),
(6, 2, 'Euis Oktavianti,S.Si.,M.T.I.', 'Matematika Diskrit', '1', 'TI CCIT 1B', '07:30:00', '10:50:00', 'SELASA', 2),
(7, 2, 'Deffana Arnaldy, S.Tp., M.Si.', 'Keamanan Komputer', '3', 'TI 3B', '12:30:00', '15:50:00', 'RABU', 3),
(8, 2, 'Ariawan Andi Suhandana, S.Kom., M.Ti.', 'Algoritma dan Pemrograman', '1', 'TMJ 1A', '07:30:00', '10:50:00', 'KAMIS', 4),
(9, 2, 'Deffana Arnaldy, S.Tp., M.Si.', 'Keamanan Komputer', '3', 'TMJ 3A', '10:50:00', '15:00:00', 'KAMIS', 4),
(10, 2, 'Fachroni Arbi Murad, S.Kom., M.Kom.', 'Sistem Operasi', '1', 'TMJ 1A', '07:30:00', '10:50:00', 'JUMAT', 5),
(21, 2, 'Asep Kurniawan, S.Pd., M.Kom.', 'Infrastruktur Jaringan/ perutean dan penyambungan', '3', 'TMJ 3B', '13:20:00', '16:40:00', 'JUMAT', 5),
(22, 1, 'Fachroni Arbi Murad, S.Kom., M.Kom.', 'Infrastruktur Jaringan/ perutean dan penyambungan', '3', 'TMJ 3A', '07:30:00', '10:50:00', 'SENIN', 1),
(23, 1, 'Dr. Anita Hidayati, S.Kom., M.Kom.', 'Rekayasa Perangkat Lunak', '3', 'TMJ 3A', '10:50:00', '15:00:00', 'SENIN', 1),
(24, 1, 'Ayu Rosyida Zain, M.T', 'Piranti Komputer', '1', 'TMJ CCIT SEC 1A', '07:30:00', '10:50:00', 'SELASA', 2),
(25, 1, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris untuk TIK', '1', 'TMJ CCIT SEC 1A', '10:50:00', '13:20:00', 'SELASA', 2),
(26, 1, 'Fachroni Arbi Murad, S.Kom., M.Kom.', 'Sistem Operasi', '1', 'TMJ 1B', '13:20:00', '16:40:00', 'SELASA', 2),
(27, 1, 'Iik Muhammad Malik Matin, S.Kom., M.T.', 'Teknologi Multimedia', '1', 'TMJ 1B', '07:30:00', '10:50:00', 'RABU', 3),
(28, 1, 'Drs. Agus Setiawan, M.Kom.', 'Matematika diskrit', '1', 'TI 1A', '07:30:00', '10:50:00', 'KAMIS', 4),
(29, 1, 'Dr. Prihatin Oktivasari, S.Si., M.Si', 'Sistem Embedded', '3', 'TMJ 3B', '12:30:00', '17:30:00', 'KAMIS', 4),
(30, 1, 'Ayres Pradiptyas, S.ST., M.M.', 'Kewarganegaraan', '1', 'TMJ 1B', '07:30:00', '10:50:00', 'JUMAT', 5),
(31, 1, 'Ariawan Andi Suhandana, S.Kom., M.T.', 'Algoritma dan Pemrograman', '1', 'TMJ 1B', '10:50:00', '15:00:00', 'JUMAT', 5),
(32, 5, 'Rizki Elisa Nalawati, S.T., M.T.', 'Kecerdasan Buatan', '3', 'TI CCIT 3B', '07:30:00', '10:50:00', 'SENIN', 1),
(33, 5, 'Sinnatrya Feranti Anindya, S.T., M.T.', 'Pengantar Multimedia', '1', 'TMD 1B', '10:50:00', '15:00:00', 'SENIN', 1),
(34, 5, 'Mira Rosalina, S.Pd., M.T.', 'Pemodelan 3D', '3', 'TMD 3B', '07:30:00', '10:50:00', 'SELASA', 2),
(35, 5, 'Asep Taufik Muharram, S.Kom., M.Kom.', 'Pemrograman Web Lanjut', '3', 'TI 3A', '12:30:00', '15:50:00', 'RABU', 3),
(36, 5, 'Irawati, S.T., M.T.', 'Organisasi & Arsitektur Komputer', '1', 'TI 1B', '07:30:00', '10:50:00', 'RABU', 3),
(37, 5, 'Asep Taufik Muharram, S.Kom., M.Kom.', 'Pemrograman Web Lanjutan', '3', 'TI CCIT 3B', '07:30:00', '10:50:00', 'KAMIS', 4),
(38, 5, 'Chandra Wirawan, M.Kom.', 'Pemrograman Visual', '3', 'TI 3A', '10:50:00', '15:00:00', 'KAMIS', 4),
(39, 5, 'Iklima Ermis Ismail, S.Kom., M.Kom.', 'Algoritma & Pemrograman', '1', 'TI 1A', '07:30:00', '10:50:00', 'JUMAT', 5),
(40, 5, 'Rizki Elisa Nalawati, S.T., M.T.', 'Kecerdasan Buatan', '3', 'TI 3B', '12:30:00', '15:00:00', 'JUMAT', 5),
(41, 6, 'Ade Rahma Yuly, S.Kom., M.Ds.', 'Desain Web', '3', 'TMD 3B', '07:30:00', '10:50:00', 'SENIN', 1),
(42, 6, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Hukum dan Etika', '3', 'TMD 3B', '10:50:00', '15:00:00', 'SENIN', 1),
(43, 6, 'Indah Sari Mukarramah, M.T.', 'Pancasila', '3', 'TMD 3B', '15:00:00', '18:20:00', 'SENIN', 1),
(44, 6, 'Maudy Laya, S.Kom., M.Kom.', 'Grafika Komputer', '3', 'TI 3B', '07:30:00', '10:50:00', 'SELASA', 2),
(45, 6, 'Indah Sari Mukarramah, M.T.', 'Kewarganegaraan', '1', 'TMD 1B', '12:30:00', '16:40:00', 'SELASA', 2),
(46, 6, 'Noorlela Marheta, S.Kom., M.Kom./ Dr. Anita Hidayati, S.Kom., M.Kom.', 'Pengantar Multimedia', '1', 'TMD 1A', '07:30:00', '10:50:00', 'RABU', 3),
(47, 6, 'Iik Muhammad Malik Matin, S.Kom., M.T.', 'Pengantar Jaringan Komputer', '1', 'TMD 1A', '10:50:00', '16:40:00', 'RABU', 3),
(48, 6, 'Maria Agustina, S.Kom., M.Kom.', 'Pemrograman Web (Front, Back End)', '3', 'TMJ 3A', '07:30:00', '10:50:00', 'KAMIS', 4),
(49, 6, 'Ratna Widyawara, S.Pd., M.Pd.', 'Bahasa Indonesia', '1', 'TMJ 1B', '10:50:00', '15:00:00', 'KAMIS', 4),
(50, 6, 'Mera Kartika D., S.Si., M.T., Ph.D', 'Matematika Diskrit', '1', 'TI 1B', '07:30:00', '10:50:00', 'JUMAT', 5),
(51, 6, 'Maria Agustina, S.Kom., M.Kom.', 'Teknologi Multimedia', '1', 'TMJ 1A', '12:30:00', '15:50:00', 'JUMAT', 5),
(52, 6, 'Ade Rahma Yuly, S.Kom., M.Ds.', 'Seminar', '7', 'TMD 7A', '07:30:00', '10:50:00', 'SABTU', 6),
(53, 6, 'Hatta Maulana, S.Si., M.Ti.', 'Kapita Selekta 1', '7', 'TMD 7A', '10:50:00', '15:00:00', 'SABTU', 6),
(54, 7, 'Iwan Sonjaya, S.T., M.T.', 'Desain UI/UX', '3', 'TI 3B', '07:30:00', '10:50:00', 'SENIN', 1),
(55, 7, 'Anggi Mardiyono, S.Kom., M.Kom.', 'Pemrograman Web Lanjut', '3', 'TI 3B', '12:30:00', '15:50:00', 'SENIN', 1),
(56, 7, 'Chandra Wirawan, M.Kom.', 'Pemrograman Web Lanjut', '3', 'TI 3B', '07:30:00', '10:50:00', 'SELASA', 2),
(57, 7, 'Bambang Warsuta, S.Kom., M.T.I.', 'Desain UI/UX', '3', 'TI CCIT 3A', '10:50:00', '13:20:00', 'SELASA', 2),
(58, 7, 'Sinnatrya Feranti Anindya, S.T., M.T.', 'Grafika Komputer', '3', 'TMD 3B', '14:10:00', '17:30:00', 'SELASA', 2),
(59, 7, 'Rizki Elisa Nalawati, S.T., M.T.', 'Pemrograman Visual', '3', 'TI 3A', '07:30:00', '10:50:00', 'RABU', 3),
(60, 7, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Inggris Untuk TIK', '1', 'TMJ 1B', '10:50:00', '15:00:00', 'RABU', 3),
(61, 7, 'Chandra Wirawan, M.Kom.', 'Pemrograman Visual', '3', 'TI 3B', '07:30:00', '10:50:00', 'KAMIS', 4),
(62, 7, 'Bambang Warsuta, S.Kom., M.T.I.', 'Desain UI/UX', '3', 'TI CCIT 3B', '10:50:00', '13:20:00', 'KAMIS', 4),
(63, 7, 'Iklima Ermis Ismail, S.Kom., M.Kom.', 'Pemrograman Basis Data', '3', 'TI 3B', '13:20:00', '16:40:00', 'KAMIS', 4),
(64, 7, 'Risna Sari, S.Kom., M.T.J.', 'Pemrograman Basis Data', '3', 'TI 3A', '07:30:00', '10:50:00', 'JUMAT', 5),
(65, 7, 'Anggi Mardiyono, S.Kom., M.Kom.', 'Grafika Komputer', '3', 'TI 3A', '12:30:00', '16:40:00', 'JUMAT', 5),
(66, 8, 'Bambang Warsuta, S.Kom., M.T.I.', 'Desain UI/UX', '3', 'TI CCIT 3A', '07:30:00', '10:50:00', 'SENIN', 1),
(67, 8, 'Ade Rahma Yuly, S.Kom., M.Ds.', 'Desain Web', '3', 'TMD 3A', '10:50:00', '15:00:00', 'SENIN', 1),
(68, 8, 'Fitria Nugraheni, S.Pd., M.Si.', 'Bahasa Inggris untuk TIK', '1', 'TMD 1B', '07:30:00', '10:50:00', 'SELASA', 2),
(69, 8, 'Malisa Huzaifa, S.Kom., M.T.', 'Pemrograman Berbasis Objek', '3', 'TMD 3A', '12:30:00', '15:50:00', 'SELASA', 2),
(70, 8, 'Eriya, S.Kom., M.T.', 'Rekayasa Perangkat Lunak Multimedia', '3', 'TMD 3A', '07:30:00', '10:50:00', 'RABU', 3),
(71, 8, 'Hatta Maulana, S.Si., M.Ti.', 'Sistem Operasi', '3', 'TMD 3A', '10:50:00', '15:00:00', 'RABU', 3),
(72, 8, 'Eriya, S.Kom., M.T.', 'Pengantar TIK', '1', 'TI MD 1B', '07:30:00', '10:50:00', 'KAMIS', 4),
(73, 8, 'Ade Rahma Yuly, S.Kom., M.Ds.', 'Pengantar Desain Komunikasi Visual', '1', 'TMD 1A', '12:30:00', '15:50:00', 'KAMIS', 4),
(74, 8, 'Ratna Widya Iswara, S.Pd., M.Pd.', 'Bahasa Indonesia', '1', 'TMJ CCIT SEC 1A', '07:30:00', '10:50:00', 'JUMAT', 5),
(75, 8, 'Euis Oktavianti,S.Si.,M.T.I.', 'Matematika Diskrit', '3', 'TI CCIT 3B', '10:50:00', '13:20:00', 'JUMAT', 5),
(76, 8, 'Dr. Eng. Feri Fahrianto, S.T., M.Sc', 'Metode Numerik', '3', 'TMJ 3A', '13:20:00', '16:40:00', 'JUMAT', 5),
(77, 9, 'Hatta Maulana, S.Si., M.Ti.', 'Pengujian dan Evaluasi', '5', 'TMD 5A', '09:10:00', '15:00:00', 'SENIN', 1),
(78, 9, 'Dr. Prihatin Oktivassari, S.Si., M.Si', 'Etika Profesional', '5', 'TMJ 5', '07:30:00', '13:20:00', 'SELASA', 2),
(79, 9, 'Indra Hermawan, S.Kom., M.Kom.', 'Seminar', '7', 'TMJ 7', '07:30:00', '13:20:00', 'JUMAT', 5),
(80, 9, 'Deffana Arnaldy, S.Tp., M.Si.', 'Kapita Selekta I', '7', 'TMJ 7', '13:20:00', '18:20:00', 'JUMAT', 5),
(81, 9, 'Dinda Kadarwati, M.Pd.', 'Praktek Kerja Lapangan', '7', 'TMJ 7', '07:30:00', '18:20:00', 'SABTU', 6),
(82, 18, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris TI K1', '1', 'TI 1A', '07:30:00', '10:50:00', 'SENIN', 1),
(83, 18, 'Maria Agustin, S.Kom., M.Kom.', 'Komunikasi Profesional', '5', 'TMJ 5', '15:00:00', '18:20:00', 'SENIN', 1),
(84, 18, 'Iwan Sonjaya, S.T., M.T.', 'Desain UI/UX', '3', 'TI 3A', '07:30:00', '10:50:00', 'SELASA', 2),
(85, 18, 'Asep Kurniawan, S.Pd., M.Kom.', 'Perencanaan Jaringan', '5', 'TMJ 5', '13:20:00', '18:20:00', 'SELASA', 2),
(86, 18, 'Iwan Sonjaya, S.T., M.T.', 'Teknologi Multimedia', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'RABU', 3),
(87, 18, 'Fachroni Arbi Murad, S.Kom., M.Kom.', 'Sistem Terdistribusi', '1', 'TI 1B', '10:50:00', '13:20:00', 'RABU', 3),
(88, 18, 'Chandra Wirawan, M.Kom.', 'Organisasi & Arsitektur Komputer', '1', 'TI 1B', '15:00:00', '18:20:00', 'RABU', 3),
(89, 18, 'Melisa Gustiarna, M.Pd.', 'Pendidikan Agama', '1', 'TI 1B', '07:30:00', '10:50:00', 'KAMIS', 4),
(90, 18, 'Mira Rosalina, S.Pd., M.T.', 'Pengantar dan  Desain Komunikasi Visual', '1', 'TMD 1B', '07:30:00', '10:50:00', 'JUMAT', 5),
(91, 18, 'Ayres Pradiptyas, S.ST., M.M.', 'Pancasila', '1', 'TI 1A', '10:50:00', '15:00:00', 'JUMAT', 5),
(92, 18, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris TI K1', '1', 'TI CCIT 1A', '09:10:00', '13:20:00', 'SABTU', 6),
(93, 19, 'Indah Sari Mukarramah, M.T.', 'Pancasila', '3', 'TMD 3A', '07:30:00', '10:50:00', 'SENIN', 1),
(94, 19, 'Fitria Nugraheni, S.Pd., M.Si.', 'Bahasa Indonesia', '1', 'TI CCIT 1A', '10:50:00', '13:20:00', 'SENIN', 1),
(95, 19, 'Fachroni Arbi Murad, S.Kom., M.Kom.', 'Sistem Terdistribusi', '3', 'TI 3A', '13:20:00', '15:50:00', 'SENIN', 1),
(96, 19, 'Iik Muhammad Malik Matin, S.Kom., M.T.', 'Metode Numerik', '3', 'TMJ 3B', '07:30:00', '10:50:00', 'SELASA', 2),
(97, 19, 'Asep Kurniawan, S.Pd., M.Kom.', 'Organisasi & Arsitektur Komputer', '1', 'TI CCIT 1A', '10:50:00', '13:20:00', 'SELASA', 2),
(98, 19, 'Euis Oktavianti, S.Si., M.Ti.', 'Metode Numerik', '3', 'TI 3A', '13:20:00', '16:40:00', 'SELASA', 2),
(99, 19, 'Hatta Maulana, S.Si., M.Ti.', 'Matematika Diskrit', '1', 'TMD 1B', '07:30:00', '10:50:00', 'RABU', 3),
(100, 19, 'Eriya, S.Kom., M.T.', 'Rekayasa Perangkat Lunak Multimedia', '3', 'TMD 3B', '10:50:00', '15:00:00', 'RABU', 3),
(101, 19, 'Ady Arman, S.Pd., M.Kom.I', 'Pendidikan Agama', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'KAMIS', 4),
(102, 19, 'Euis Oktavianti, S.Si., M.Ti.', 'Metode Numerik', '3', 'TI CCIT 3B', '10:50:00', '14:10:00', 'KAMIS', 4),
(103, 19, 'Eriya, S.Kom., M.T.', 'Teknologi Multimedia', '1', 'TI CCIT 1B', '07:30:00', '10:50:00', 'JUMAT', 5),
(104, 19, 'Fitria Nugraheni, S.Pd., M.Si', 'Komunikasi Profesional', '5', 'TMD 5A', '13:20:00', '17:30:00', 'JUMAT', 5),
(105, 20, 'Melisa Gustiarna, M.Pd.', 'Pendidikan Agama', '1', 'TI CCIT 1B', '07:30:00', '10:50:00', 'SENIN', 1),
(106, 20, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris Untuk TIK', '1', 'TI CCIT 1B', '10:50:00', '14:20:00', 'SENIN', 1),
(107, 20, 'Ratna Widya Iswara, S.Pd., M.Pd.', 'English for IT Professional', '3', 'TMJ 3B', '13:20:00', '16:40:00', 'SENIN', 1),
(108, 20, 'Noorlela Marcheta, S.Kom., M.Kom.', 'Hukum dan Etika', '1', 'TMJ 3A', '07:30:00', '10:50:00', 'SELASA', 2),
(109, 20, 'Ariawan Andi Suhandana, S.Kom., M.T.', 'Pemrograman Berorientasi Objek', '3', 'TMJ 3B', '10:50:00', '15:50:00', 'SELASA', 2),
(110, 20, 'Maudy Laya, S.Kom., M.Kom.', 'Grafika Komputer', '3', 'TI CCIT 3A', '07:30:00', '10:50:00', 'RABU', 3),
(111, 20, 'Ayres Pradiptyas, S.ST., M.M.', 'Pancasila', '1', 'TI CCIT 1B', '10:50:00', '13:20:00', 'RABU', 3),
(112, 20, 'Ayu Rosyida Zain, M.T.', 'Pemodelan Jaringan', '5', 'TMJ 5', '13:20:00', '17:30:00', 'RABU', 3),
(113, 20, 'Bambang Warsuta, S.Kom., M.T.I.', 'Manajemen Proyek', '3', 'TI 3A', '07:30:00', '10:50:00', 'KAMIS', 4),
(114, 20, 'Melisa Gustiarna, M.Pd.', 'Pendidikan Agama', '3', 'TMD 3A', '10:50:00', '14:10:00', 'KAMIS', 4),
(115, 20, 'Dinda Kadarwati, M.Pd.', 'Pancasila', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'JUMAT', 5),
(116, 20, 'Iwan Sonjaya, S.T., M.T.', 'Perancangan dan Pengembangan Game', '3', 'TMD 3A', '12:30:00', '16:40:00', 'JUMAT', 5),
(117, 21, 'Susana Dwi Yulianti, M.Kom.', 'Rekayasa Perangkat Lunak', '3', 'TMD 3B', '07:30:00', '10:50:00', 'SENIN', 1),
(118, 21, 'Mera Kartika D., S.Si., M.T., Ph.D', 'Pengantar TIK', '1', 'TMD 1A', '10:50:00', '15:50:00', 'SENIN', 1),
(119, 21, 'Bambang Warsuta, S.Kom., M.T.I.', 'Pengantar TIK', '1', 'TMD 1A', '07:30:00', '10:50:00', 'SELASA', 2),
(120, 21, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Indonesia', '1', 'TMJ CCIT SEC 1B', '10:50:00', '14:20:00', 'SELASA', 2),
(121, 21, 'Dr. Anita Hidayati, S.Kom., M.Kom.', 'Analisa dan Desain Sistem Informasi', '3', 'TI CCIT 3B', '07:30:00', '10:50:00', 'RABU', 3),
(122, 21, 'Euis Oktavianti, S.Si., M.T.I.', 'Metode Numerik', '3', 'TI CCIT 3B', '10:50:00', '15:50:00', 'RABU', 3),
(123, 21, 'Malisa Huzaifa, S.Kom., M.T.', 'Pemrograman Berbasis Objek', '3', 'TMD 3B', '07:30:00', '10:50:00', 'KAMIS', 4),
(124, 21, 'Hatta Maulana, S.Si., M.Ti.', 'Sistem Operasi', '3', 'TMD 3B', '12:30:00', '15:50:00', 'KAMIS', 4),
(125, 21, 'Fitria Nugraheni, S.Pd., M.Si.', 'Bahasa Indonesia', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'JUMAT', 5),
(126, 21, 'Sinantya Feranti Anindya, S.T., M.T.', 'Grafika Komputer', '3', 'TMD 3A', '10:50:00', '15:50:00', 'JUMAT', 5),
(127, 22, 'Drs. Agus Setiawan, M.Kom.', 'Matematika Diskrit', '1', 'TI CCIT 1A', '07:30:00', '10:50:00', 'SENIN', 1),
(128, 22, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Inggris TIK 1', '1', 'TMD 1A', '15:00:00', '18:20:00', 'SENIN', 1),
(129, 22, 'Ariawan Andi Suhandana, S.Kom., M.Ti.', 'Pemrograman Berorientasi Objek', '3', 'TMJ 3A', '07:30:00', '10:50:00', 'SELASA', 2),
(130, 22, 'Indra Hermawan, S.Kom., M.Kom.', 'Sistem Embedded', '3', 'TMJ 3A', '10:50:00', '15:50:00', 'SELASA', 2),
(131, 22, 'Maria Agustin, S.Kom., M.Kom.', 'Pemrograman Web(Front, Back End)', '3', 'TMJ 3B', '07:30:00', '10:50:00', 'RABU', 3),
(132, 22, 'Malisa Huzaifa, S.Kom., M.T.', 'Algoritma dan Pemrograman', '1', 'TMD 1B', '10:50:00', '15:00:00', 'RABU', 3),
(133, 22, 'Irawati, S.T., M.T.', 'Organisasi & Arsitektur Komputer', '1', 'TI CCIT 1B', '07:30:00', '10:50:00', 'KAMIS', 4),
(134, 22, 'Iik Muhammad Malik Matin, S.Kom., M.T.', 'Pengantar Jaringan Komputer', '1', 'TMD 1B', '10:50:00', '16:40:00', 'KAMIS', 4),
(135, 22, 'Indah Sari Mukarramah, M.T.', 'Kewarganegaraan', '1', 'TMD 1A', '07:30:00', '10:50:00', 'JUMAT', 5),
(136, 22, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Indonesia', '1', 'TMD 1B', '13:20:00', '16:40:00', 'JUMAT', 5),
(137, 22, 'Yoyok Sabar Waluyo, S.S., M.Hum.', 'Bahasa Indonesia', '1', 'TMJ CCIT SEC 1B', '10:50:00', '13:20:00', 'JUMAT', 5),
(138, 23, 'Iik Muhammad Malik Matin, S.Kom., M.T.', 'Jaringan Komputer', '1', 'TMJ CCIT SEC 1B', '07:30:00', '10:50:00', 'SENIN', 1),
(139, 23, 'Anggi Mardiyono, S.Kom., M.Kom.', 'Grafika Komputer', '3', 'TI CCIT 3B', '07:30:00', '10:50:00', 'SELASA', 2),
(140, 23, 'Mira Rosalina, S.Pd., M.T.', 'Matematika Diskrit', '1', 'TMD 1A', '13:20:00', '16:40:00', 'SELASA', 2),
(141, 23, 'Melisa Gustiarna, M.Pd.', 'Pendidikan Agama', '1', 'TI CCIT 1B', '07:30:00', '10:50:00', 'RABU', 3),
(142, 23, 'Rizki Elisa Nalawati, S.T., M.T.', 'Teknologi Multimedia', '3', 'TMJ 3B', '07:30:00', '10:50:00', 'RABU', 3),
(143, 23, 'Mira Rosalina, S.Pd., M.T.', 'Pemodelan 3D', '3', 'TMD 3A', '07:30:00', '13:20:00', 'KAMIS', 4),
(144, 23, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris Untuk TIK', '1', 'TI CCIT 1B', '10:50:00', '13:20:00', 'JUMAT', 5),
(145, 17, 'Dinda Kadarwati, M.Pd.', 'Bahasa Indonesia', '1', 'TI 1B', '07:30:00', '10:50:00', 'SENIN', 1),
(146, 17, 'Ayres Pradiptyas, S.ST., M.M.', 'Pancasila', '1', 'TI 1A', '10:50:00', '15:00:00', 'SENIN', 1),
(147, 17, 'Dinda Kadarwati, M.Pd.', 'Bahasa Indonesia', '1', 'TI 1A', '07:30:00', '10:50:00', 'SELASA', 2),
(148, 17, 'Rizki Elisa Nalawati, S.T., M.T.', 'Teknologi Multimedia', '1', 'TI 1A', '10:50:00', '15:00:00', 'SELASA', 2),
(149, 17, 'Ayu Rosyida Zain, M.T', 'Organisasi & Arsitektur Komputer', '1', 'TI 1A', '13:20:00', '16:40:00', 'RABU', 3),
(150, 17, 'Ratna Widya Iswara, S.Pd., M.Pd.', 'English for IT Professional', '3', 'TMJ 3A', '13:20:00', '16:40:00', 'RABU', 3),
(151, 17, 'Anggi Mardiyono, S.Kom., M.Kom.', 'Sistem Operasi', '1', 'TI 1A', '10:50:00', '15:00:00', 'KAMIS', 4),
(152, 17, 'Asep Kurniawan, S.Pd., M.Kom.', 'Jaringan Komputer', '1', 'TMJ 1B', '07:30:00', '10:50:00', 'KAMIS', 4),
(153, 17, 'Euis Oktavianti, S.Si., M.T.I.', 'Metode Numerik', '3', 'TI 3B', '07:30:00', '10:50:00', 'JUMAT', 5),
(154, 17, 'Hata Maulana, S.Si., M.T.I.', 'Sistem Operasi', '1', 'TI 1B', '10:50:00', '15:00:00', 'JUMAT', 5),
(155, 17, 'Hata Maulana, S.Si., M.T.I.', 'Seminar', '7', 'TI CCIT 7', '07:30:00', '13:20:00', 'SABTU', 6),
(156, 17, 'Bambang Warsuta, S.Kom., M.T.I.', 'Kapita Selekta I', '7', 'TI CCIT 7', '13:20:00', '18:20:00', 'SABTU', 6),
(157, 22, 'Eriya, S.Kom., M.T.', 'Seminar', '7', 'TMD 7B', '07:30:00', '13:20:00', 'SABTU', 6),
(158, 22, 'Iwan Sonjaya, S.T.,M.T.', 'Kapita Selekta 1', '7', 'TMD 7B', '13:20:00', '18:20:00', 'SABTU', 6),
(159, 2, 'Susana Dwi Yulianti, M.Kom.', 'Matematika Diskrit', '1', 'TMJ CCIT SEC 1B', '07:30:00', '10:50:00', 'RABU', 3),
(160, 5, 'Dr. Dewi Yanti Liliana, S.Kom,. M.Kom.', 'Algoritma dan Pemgrograman', '1', 'TI 1B', '13:20:00', '16:40:00', 'SELASA', 2),
(161, 19, 'Dewi Kurniawati, S.S., M.Pd.', 'Bahasa Inggris untuk TIK', '1', 'TI CCIT 1A', '07:30:00', '09:10:00', 'SABTU', 6),
(162, 23, 'Herlino Nanang', 'Sistem Terdistribusi', '3', 'TI CCIT 3B', '07:30:00', '10:50:00', 'JUMAT', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `ruangan_id` int(11) NOT NULL,
  `nama_ruangan` varchar(10) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `jenis_ruangan` varchar(50) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ruangan_id`, `nama_ruangan`, `kapasitas`, `jenis_ruangan`, `lokasi`) VALUES
(1, 'AA204', 30, 'Kelas', 'Lantai 2, Gedung AA'),
(2, 'AA205', 30, 'Kelas', 'Lantai 2, Gedung AA'),
(5, 'AA301', 30, 'Kelas', 'Lantai 3, Gedung AA'),
(6, 'AA302', 30, 'Kelas', 'Lantai 3, Gedung AA'),
(7, 'AA303', 30, 'Kelas', 'Lantai 3, Gedung AA'),
(8, 'AA304', 30, 'Kelas', 'Lantai 3, Gedung AA'),
(9, 'AA305', 30, 'Kelas', 'Lantai 3, Gedung AA'),
(17, 'GSG202', 30, 'Kelas', 'Gedung GSG'),
(18, 'GSG206', 30, 'Kelas', 'Gedung GSG'),
(19, 'GSG207', 30, 'Kelas', 'Gedung GSG'),
(20, 'GSG208', 30, 'Kelas', 'Gedung GSG'),
(21, 'GSG209', 30, 'Kelas', 'Gedung GSG'),
(22, 'GSG210', 30, 'Kelas', 'Gedung GSG'),
(23, 'GSG212', 30, 'Kelas', 'Gedung GSG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `ruangan_id` (`ruangan_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`ruangan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
