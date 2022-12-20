-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2022 at 03:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelmaterial`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve_kertas_kerja`
--

CREATE TABLE `approve_kertas_kerja` (
  `id` int(11) NOT NULL,
  `id_pkpt` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `approve_kertas_kerja`
--

INSERT INTO `approve_kertas_kerja` (`id`, `id_pkpt`, `file`, `status`) VALUES
(1, 2, '20221209191857.pdf', 3),
(2, 2, '20221209191907.pdf', 1),
(3, 4, '20221209191917.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `header_pkpt`
--

CREATE TABLE `header_pkpt` (
  `id` int(11) NOT NULL,
  `nomor_pkpt` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `header_pkpt`
--

INSERT INTO `header_pkpt` (`id`, `nomor_pkpt`) VALUES
(1, 'PKPT01'),
(2, 'PKPT02'),
(3, 'PKPT03');

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan_hp`
--

CREATE TABLE `kebutuhan_hp` (
  `id_kh` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kertas_kerja`
--

CREATE TABLE `kertas_kerja` (
  `id` int(11) NOT NULL,
  `id_pkpt` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `kertas_kerja`
--

INSERT INTO `kertas_kerja` (`id`, `id_pkpt`, `file`, `status`) VALUES
(1, 3, '20221209191400.pdf', 1),
(2, 6, '20221209191413.pdf', 3),
(3, 7, '20221209191427.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_bulan`
--

CREATE TABLE `m_bulan` (
  `id` int(11) NOT NULL,
  `no` varchar(255) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_bulan`
--

INSERT INTO `m_bulan` (`id`, `no`, `bulan`) VALUES
(1, '01', 'Januari'),
(2, '02', 'Februari'),
(3, '03', 'Maret'),
(4, '04', 'April'),
(5, '05', 'Mei'),
(6, '06', 'Juni'),
(7, '07', 'Juli'),
(8, '08', 'Agustus'),
(9, '09', 'September'),
(10, '10', 'Oktober'),
(11, '11', 'November'),
(12, '12', 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `m_jenis_pengawasan`
--

CREATE TABLE `m_jenis_pengawasan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_jenis_pengawasan`
--

INSERT INTO `m_jenis_pengawasan` (`id`, `jenis`, `aktif`) VALUES
(1, 'Peer Reviu', 1),
(2, 'Monitoring', 1),
(3, 'Audit', 1),
(4, 'Audit Vaksinasi', 0),
(5, 'Test', 0),
(6, 'Test', 0),
(7, 'Konstruksi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_opd`
--

CREATE TABLE `m_opd` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_opd`
--

INSERT INTO `m_opd` (`id`, `nama`, `aktif`) VALUES
(1, 'Inspektorat', 1),
(2, 'BPRS', 1),
(3, 'PDAM', 1),
(4, 'Dinkes', 1),
(5, 'Fasyankes', 1),
(6, 'test', 0),
(7, 'test', 0),
(8, 'Riski Ramadhan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_role`
--

CREATE TABLE `m_role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `aktif` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_role`
--

INSERT INTO `m_role` (`id`, `nama`, `aktif`) VALUES
(1, 'Admin', '1'),
(2, 'Ketua Team', '1'),
(3, 'Pengendali Teknis', '1'),
(4, 'Inspektur Pembantu (Irban)', '1'),
(5, 'Sekretariat', '1'),
(6, 'Inspektur', '1');

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE `m_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `m_status`
--

INSERT INTO `m_status` (`id`, `status`) VALUES
(1, 'Menunggu'),
(2, 'Approve Dalnis'),
(3, 'Approve Irban'),
(4, 'Approve Sekretariat'),
(5, 'Approve Inspektur');

-- --------------------------------------------------------

--
-- Table structure for table `m_tahun`
--

CREATE TABLE `m_tahun` (
  `id` int(11) NOT NULL,
  `tahun` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `m_tahun`
--

INSERT INTO `m_tahun` (`id`, `tahun`) VALUES
(1, '2022'),
(2, '2023'),
(3, '2024'),
(4, '2025'),
(5, '2026'),
(6, '2027'),
(7, '2028'),
(8, '2029'),
(9, '2030');

-- --------------------------------------------------------

--
-- Table structure for table `m_tingkat_resiko`
--

CREATE TABLE `m_tingkat_resiko` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `m_tingkat_resiko`
--

INSERT INTO `m_tingkat_resiko` (`id`, `name`) VALUES
(1, 'Tinggi'),
(2, 'Sedang'),
(3, 'Rendah');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `pkpt`
--

CREATE TABLE `pkpt` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `area_pengawasan` varchar(255) DEFAULT NULL,
  `jenis_pengawasan` varchar(255) DEFAULT NULL,
  `opd` varchar(255) DEFAULT NULL,
  `rmp` varchar(255) DEFAULT NULL,
  `rpl` varchar(255) DEFAULT NULL,
  `sarana_prasarana` varchar(255) DEFAULT NULL,
  `tingkat_resiko` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `koorwas` varchar(255) DEFAULT NULL,
  `pt` varchar(255) DEFAULT NULL,
  `kt` varchar(255) DEFAULT NULL,
  `at` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `jumlah_laporan` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pkpt`
--

INSERT INTO `pkpt` (`id`, `jenis`, `area_pengawasan`, `jenis_pengawasan`, `opd`, `rmp`, `rpl`, `sarana_prasarana`, `tingkat_resiko`, `keterangan`, `tujuan`, `koorwas`, `pt`, `kt`, `at`, `jumlah`, `jumlah_laporan`, `tahun`, `kategori`) VALUES
(1, 'PKPT01', 'Melaksanakan Peny Stok Opname Vaksin Covid-19 \nPer 31 Desember 2021', 'Audit Stock Vaksin C0vid-19', 'Dinkes dan Fasyankes', 'Januari', 'Januari', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memberikan keyakinan bahwa pelaksanaan Opname vaksin Covid-19 sesuai ketentuan', '1.25', '1', '3', '6', '11.25', '1', '2022', 'Laporan'),
(2, 'PKPT01', 'Melaksanakan Reviu Laporan Keuangan Pemerintah Daerah (LKPD) TA.2021', 'Reviu', 'BPKAD', 'Februari', 'Maret', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memberikan keyakinan yang memadai laporan keuangan sesuai dengan Prosedur dan SPI', '2.5', '3.3333333333333', '10', '10', '25.833333333333', '1', '2022', 'Laporan'),
(3, 'PKPT01', 'Melaksanakan Evaluasi atas Penyerapan Anggaran dan Pengadaan Barang dan Jasa Triwulan 2 Tahun .2022 ', 'Reviu', 'Barjas', 'Mei', 'Mei', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memperoleh gambaran\npostur APBD, realisasi\npendapatan dan\npenyerapan anggaranl\n', '2.5', '3.3333333333333', '10', '40', '55.833333333333', '1', '2022', 'Laporan'),
(4, 'PKPT01', 'Melaksanakan Evaluasi atas Penyerapan Anggaran dan Pengadaan Barang dan Jasa Triwulan 4 Tahun .2022 ', 'Reviu', 'Barjas', 'Nopember', 'Nopember', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memperoleh gambaran\npostur APBD, realisasi\npendapatan dan\npenyerapan anggaranl\n', '2.5', '3.3333333333333', '10', '40', '55.833333333333', '1', '2022', 'Laporan'),
(5, 'PKPT01', 'Melaksanakan Rapat Monitoring evaluasi Tindak Lanjut Internal dan Eksternal', 'Monitoring', 'BPKAD, Dishub, Dinsos', 'Juli', 'Juli', 'Laptop, ATK', 'Tinggi', 'Irban II', 'Memberikan keyakinan pelaksanaan TL hasil pengawasan', '0.75', '1', '3', '24', '28.75', '1', '2022', 'Laporan'),
(6, 'PKPT01', 'Melaksanakan Monitoring Administrasi Tindak Lanjut Laporan Hasil Pemeriksaan  APIP dan BPK Perwakilan Provinsi banten', 'Monitoring', 'BPKAD, Dishub, Dinsos', 'Juli', 'Juli', 'Laptop, ATK', 'Tinggi', 'Irban II', 'Memberikan keyakinan melalui pembandingan atas capaian kinerja sesuai yg diperjanjikan', '1.25', '1.6666666666667', '5', '20', '27.916666666667', '1', '2022', 'Laporan'),
(7, 'PKPT01', 'Melaksanakan Monitoring Pengelolaan Vaksin Covid-19  rusak dan/ kadaluarsa Tahun 2022', 'Monitoring', 'Dinkes Fasyankes', 'September', 'September', 'Laptop, ATK', 'Tinggi', 'Irban II', 'Memberikan keyakinan pelaksanaan Pengelolaan Vaksin Covid-19  rusak/ kadaluarsa', '1.25', '1.6666666666667', '5', '15', '22.916666666667', '1', '2022', 'Laporan'),
(8, 'PKPT01', 'Melaksanakan Probity audit atas paket pekerjaan pengadaan dan Pemasangan lampu field of play (FOP) Stadio Geger Cilegon', 'Probity', 'Dispora', 'September', 'Desember', 'Laptop, ATK', 'Tinggi', 'Irban II', 'Memberikan keyakinan pelaksanaan kegiatan sesuai ketentuan', '5', '6.6666666666667', '20', '160', '191.66666666667', '1', '2022', 'Laporan'),
(9, 'PKPT01', 'Melaksanakan Evaluasi LKj OPD TA 2021 TESTING', 'Evaluasi', 'OPD', 'Maret', 'Matret', 'Laptop, ATK', 'Tinggi', 'Irban II', 'Memberikan keyakinan LAKIP OPD Sesuai ketentuan', '2.5', '3.3333333333333', '10', '80', '95.833333333333', '1', '2022', 'Laporan'),
(29, 'PKPT01', 'pppp', 'Evaluasi', 'OPD', 'Maret', 'Matret', 'Laptop, ATK', 'Tinggi', 'Irban II', 'Memberikan keyakinan LAKIP OPD Sesuai ketentuan', '2.5', '3.3333333333333', '10', '80', '95.833333333333', '1', '2022', 'Laporan'),
(30, 'PKPT02', 'Melaksanakan Peny Stok Opname Vaksin Covid-19 \nPer 31 Desember 2021', 'Audit Stock Vaksin C0vid-19', 'Dinkes dan Fasyankes', 'Januari', 'Januari', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memberikan keyakinan bahwa pelaksanaan Opname vaksin Covid-19 sesuai ketentuan', '1.25', '1', '3', '6', '11.25', '1', '2022', 'Laporan'),
(31, 'PKPT02', 'Melaksanakan Reviu Laporan Keuangan Pemerintah Daerah (LKPD) TA.2021', 'Reviu', 'BPKAD', 'Februari', 'Maret', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memberikan keyakinan yang memadai laporan keuangan sesuai dengan Prosedur dan SPI', '2.5', '3.3333333333333', '10', '10', '25.833333333333', '1', '2022', 'Laporan'),
(32, 'PKPT02', 'Melaksanakan Evaluasi atas Penyerapan Anggaran dan Pengadaan Barang dan Jasa Triwulan 2 Tahun .2022 ', 'Reviu', 'Barjas', 'Mei', 'Mei', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memperoleh gambaran\npostur APBD, realisasi\npendapatan dan\npenyerapan anggaranl\n', '2.5', '3.3333333333333', '10', '40', '55.833333333333', '1', '2022', 'Laporan'),
(33, 'PKPT02', 'Melaksanakan Evaluasi atas Penyerapan Anggaran dan Pengadaan Barang dan Jasa Triwulan 4 Tahun .2022 ', 'Reviu', 'Barjas', 'Nopember', 'Nopember', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memperoleh gambaran\npostur APBD, realisasi\npendapatan dan\npenyerapan anggaranl\n', '2.5', '3.3333333333333', '10', '40', '55.833333333333', '1', '2022', 'Laporan'),
(34, 'PKPT02', 'Melaksanakan Rapat Monitoring evaluasi Tindak Lanjut Internal dan Eksternal', 'Monitoring', 'BPKAD, Dishub, Dinsos', 'Juli', 'Juli', 'Laptop, ATK', 'Tinggi', 'Irban II', 'Memberikan keyakinan pelaksanaan TL hasil pengawasan', '0.75', '1', '3', '24', '28.75', '1', '2022', 'Laporan'),
(35, 'PKPT03', 'Melaksanakan Peny Stok Opname Vaksin Covid-19 \nPer 31 Desember 2021', 'Audit Stock Vaksin C0vid-19', 'Dinkes dan Fasyankes', 'Januari', 'Januari', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memberikan keyakinan bahwa pelaksanaan Opname vaksin Covid-19 sesuai ketentuan', '1.25', '1', '3', '6', '11.25', '1', '2022', 'Laporan'),
(36, 'PKPT03', 'Melaksanakan Reviu Laporan Keuangan Pemerintah Daerah (LKPD) TA.2021', 'Reviu', 'BPKAD', 'Februari', 'Maret', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memberikan keyakinan yang memadai laporan keuangan sesuai dengan Prosedur dan SPI', '2.5', '3.3333333333333', '10', '10', '25.833333333333', '1', '2022', 'Laporan'),
(37, 'PKPT03', 'Melaksanakan Evaluasi atas Penyerapan Anggaran dan Pengadaan Barang dan Jasa Triwulan 2 Tahun .2022 ', 'Reviu', 'Barjas', 'Mei', 'Mei', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memperoleh gambaran\npostur APBD, realisasi\npendapatan dan\npenyerapan anggaranl\n', '2.5', '3.3333333333333', '10', '40', '55.833333333333', '1', '2022', 'Laporan'),
(38, 'PKPT03', 'Melaksanakan Evaluasi atas Penyerapan Anggaran dan Pengadaan Barang dan Jasa Triwulan 4 Tahun .2022 ', 'Reviu', 'Barjas', 'Nopember', 'Nopember', 'Laptop, ATK', 'Tinggi', 'Koorwas Irban II', 'Memperoleh gambaran\npostur APBD, realisasi\npendapatan dan\npenyerapan anggaranl\n', '2.5', '3.3333333333333', '10', '40', '55.833333333333', '1', '2022', 'Laporan'),
(39, 'PKPT03', 'Melaksanakan Rapat Monitoring evaluasi Tindak Lanjut Internal dan Eksternal', 'Monitoring', 'BPKAD, Dishub, Dinsos', 'Juli', 'Juli', 'Laptop, ATK', 'Tinggi', 'Irban II', 'Memberikan keyakinan pelaksanaan TL hasil pengawasan', '0.75', '1', '3', '24', '28.75', '1', '2022', 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `program_kerja`
--

CREATE TABLE `program_kerja` (
  `id` int(11) NOT NULL,
  `id_pkpt` int(11) DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `pkp` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `nota_dinas` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `program_kerja`
--

INSERT INTO `program_kerja` (`id`, `id_pkpt`, `jenis`, `pkp`, `nota_dinas`, `status`) VALUES
(1, 31, 'PKPT02', '20221213205721.pdf', '20221213205721.pdf', 1),
(2, 40, 'PKPT03', '20221213223807.pdf', '20221213223807.pdf', 1),
(3, 4, 'PKPT01', '20221213224912.pdf', '20221213224912.pdf', 1),
(4, 38, 'PKPT03', 'PKP20221213225232.pdf', 'NotaDinas20221213225232.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_approve`
--

CREATE TABLE `riwayat_approve` (
  `id` int(11) NOT NULL,
  `program_kerja_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_bin DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `surat_perintah`
--

CREATE TABLE `surat_perintah` (
  `id` int(11) NOT NULL,
  `id_program_kerja` int(11) DEFAULT NULL,
  `id_pkpt` int(11) DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `pkp` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `nota_dinas` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `surat_perintah`
--

INSERT INTO `surat_perintah` (`id`, `id_program_kerja`, `id_pkpt`, `jenis`, `pkp`, `nota_dinas`) VALUES
(1, 1, NULL, NULL, NULL, NULL),
(2, 4, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(4, 'Bagus Sanjaya Pratama', 'bagus@gmail.com', '1', '$2y$10$UEykamBaUB7K9E5TnXnW/.ZrWZT0a/duqnwZ/Uk285aJHwvObKdT2', NULL, '2022-11-26 13:51:00', '2022-12-13 13:15:17', 1),
(5, 'Galang', 'galang@gmail.com', '6', '$2y$10$QjIP199U/MB/x1PgNkOvOeWrKwMZTR0AqdMpALhE1ASOqsnEHCQzS', NULL, '2022-11-28 03:14:53', '2022-12-13 13:15:04', 6),
(8, 'Nanang', 'nanang@gmail.com', '4', '$2y$10$L/bpnEC3G.ptpONMeLa2KOOMWFOFaM590eHE9FTJfxn1QftXCbR6y', NULL, '2022-12-09 15:07:13', '2022-12-13 13:14:50', 4),
(9, 'Nugroho', 'coba@gmail.com', '3', '$2y$10$HBBGtoWn3w0XtH.4sTjHCeiaUUwXAdhNVjeUneio9dIxaQ7doqV/m', NULL, '2022-12-10 05:19:44', '2022-12-13 13:14:38', 3),
(10, 'Ketua Team', 'ketuateam@gmail.com', '2', '$2y$10$rt0V.D0TvYc7qnXZRHB4.OaadKLrI7hogSMOjWHt6CjhsGQtlc.Ra', NULL, '2022-12-13 06:42:00', '2022-12-13 13:14:17', 2),
(11, 'Sekretariat', 'sekretariat@gmail.com', '5', '$2y$10$xxaNgWTRbnLtZ//ttQKHNOcWAezI12/TUS7uSuzy0JAXMqIORDIsO', NULL, '2022-12-13 06:42:31', '2022-12-13 13:15:11', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve_kertas_kerja`
--
ALTER TABLE `approve_kertas_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `header_pkpt`
--
ALTER TABLE `header_pkpt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebutuhan_hp`
--
ALTER TABLE `kebutuhan_hp`
  ADD PRIMARY KEY (`id_kh`) USING BTREE;

--
-- Indexes for table `kertas_kerja`
--
ALTER TABLE `kertas_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `m_bulan`
--
ALTER TABLE `m_bulan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `m_jenis_pengawasan`
--
ALTER TABLE `m_jenis_pengawasan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `m_opd`
--
ALTER TABLE `m_opd`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `m_role`
--
ALTER TABLE `m_role`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_tahun`
--
ALTER TABLE `m_tahun`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `m_tingkat_resiko`
--
ALTER TABLE `m_tingkat_resiko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `pkpt`
--
ALTER TABLE `pkpt`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `program_kerja`
--
ALTER TABLE `program_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_approve`
--
ALTER TABLE `riwayat_approve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_perintah`
--
ALTER TABLE `surat_perintah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve_kertas_kerja`
--
ALTER TABLE `approve_kertas_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_pkpt`
--
ALTER TABLE `header_pkpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kebutuhan_hp`
--
ALTER TABLE `kebutuhan_hp`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kertas_kerja`
--
ALTER TABLE `kertas_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_bulan`
--
ALTER TABLE `m_bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_jenis_pengawasan`
--
ALTER TABLE `m_jenis_pengawasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_opd`
--
ALTER TABLE `m_opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_role`
--
ALTER TABLE `m_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_tahun`
--
ALTER TABLE `m_tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_tingkat_resiko`
--
ALTER TABLE `m_tingkat_resiko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pkpt`
--
ALTER TABLE `pkpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riwayat_approve`
--
ALTER TABLE `riwayat_approve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_perintah`
--
ALTER TABLE `surat_perintah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
