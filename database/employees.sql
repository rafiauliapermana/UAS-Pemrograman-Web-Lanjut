-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2022 pada 18.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transkip_nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id`, `id_pengguna`, `ktp`, `transkip_nilai`, `ijazah`, `npwp`, `created_at`, `updated_at`) VALUES
(1, 3, 'berkas_4KA31_Rafi Priatna Kasbiantoro_KTP_20220526030637.pdf', 'berkas_4KA31_Rafi Priatna Kasbiantoro_TranskipNilai_20220526030637.pdf', 'berkas_4KA31_Rafi Priatna Kasbiantoro_Ijazah_20220526030637.pdf', 'berkas_4KA31_Rafi Priatna Kasbiantoro_NPWP_20220526030637.pdf', '2022-05-25 20:06:37', '2022-05-25 20:06:37'),
(2, 8, 'berkas_Inug11_KTP_20220606161922.pdf', 'berkas_Inug11_TranskipNilai_20220606161922.pdf', 'berkas_Inug11_Ijazah_20220606161922.pdf', 'berkas_Inug11_NPWP_20220606161922.pdf', '2022-06-06 09:19:22', '2022-06-06 09:19:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_instansi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id`, `nama_instansi`, `alamat_instansi`, `no_telp_instansi`, `link_instansi`, `created_at`, `updated_at`) VALUES
(2, 'Badan Kepegawaian Daerah Provinsi Jawa Timur', 'Jl Jemur Handayani 1 Surabaya', '031 8477551', 'http://bkd.jatimprov.go.id', '2022-06-06 09:16:14', '2022-06-06 09:16:14'),
(3, 'Badan Komisi Penanggulangan AIDS Provinsi Jawa Timur', 'Jl. Dharma Husada Utara VII/07 Surabaya', '031-5952751', 'http://www.aids-ina.org/', '2022-06-06 09:16:40', '2022-06-06 09:16:40'),
(4, 'Badan Narkotika Provinsi Jawa Timur', 'Jl. Ngagel Madya V No. 22, RT 04 / RW 01 Kelurahan Barata Jaya Kecamatan Gubeng Kota Surabaya, Kode', '(031)5023947', 'http://jatim.bnn.go.id/', '2022-06-06 09:17:07', '2022-06-06 09:17:07'),
(5, 'Badan Penanaman Modal Provinsi Jawa Timur', 'Jl Rajawali 6-8 Surabaya', '031-3537537', 'http://bpm.jatimprov.go.id/', '2022-06-06 09:17:32', '2022-06-06 09:17:32'),
(6, 'Badan Penanggulangan Bencana Daerah Provinsi Jawa Timur', 'Jl. S Parman No 55 Waru Sidoarjo', '031 8550222', 'http://bpbd.jatimprov.go.id/', '2022-06-06 09:17:57', '2022-06-06 09:17:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2022_05_20_145822_create_pengguna_table', 1),
(24, '2022_05_22_031339_create_instansi_table', 1),
(25, '2022_05_22_042322_create_penerimaan_table', 1),
(26, '2022_05_22_090634_create_berkas_table', 1),
(27, '2022_05_24_041245_create_pengumuman_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_penerimaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `catatan_penerimaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penerimaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berkas_penerimaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `kode_penerimaan`, `tanggal_penerimaan`, `catatan_penerimaan`, `status_penerimaan`, `berkas_penerimaan`, `created_at`, `updated_at`) VALUES
(2, '001', '2022-06-01', 'Cetak sebagai Bukti', 'Terima', 'berkas_penerimaan_20220606161826pdf', '2022-06-06 09:18:26', '2022-06-06 09:18:26'),
(3, '002', '2022-06-07', 'Mohon bersabar sedang di proses', 'Proses', 'berkas_penerimaan_20220606161837pdf', '2022-06-06 09:18:37', '2022-06-06 09:18:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `level` enum('admin','karyawan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'karyawan',
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `alamat`, `email`, `password`, `tanggal_lahir`, `level`, `google_id`, `created_at`, `updated_at`) VALUES
(3, '4KA31_Rafi Priatna Kasbiantoro', '', 'rafipriatnak@gmail.com', '0', NULL, 'karyawan', '114238783166827498073', '2022-05-25 06:42:08', '2022-05-25 06:42:08'),
(4, 'Bejir gais', 'Jl. Bejir', 'bejir@gmail.com', '$2y$10$9bYyrYlekMYW5jN9ct2oK.f5S3U0fQGvVExuJaDFvb0PnNyG8oVNm', '2022-05-10', 'karyawan', NULL, '2022-05-25 20:08:19', '2022-05-25 20:08:19'),
(6, 'Nugroho Dwi Riyanto', '', 'nugrohodwi158@gmail.com', '0', NULL, 'karyawan', '110642590830363371592', '2022-06-06 09:04:48', '2022-06-06 09:04:48'),
(7, 'Nugroho Dwi Riyanto', 'Desa Bibrik Rt 06 Rw 03', 'nugroho@gmail.com', '$2y$10$W5a/Zb8bQdySXiqnw8LxeOPuv0aIjNipQoaG/QLGdIRmp8z4rbEL.', '2001-12-06', 'admin', NULL, '2022-06-06 09:09:18', '2022-06-06 09:09:18'),
(8, 'Inug11', 'Desa Bibrik Rt 06 Rw 03', 'inug@gmai.com', '$2y$10$i2V2hOzc9Phi.IinyLDRAeWovYEyPqTxjzfkd1rB1vb8IGMNp7WCy', '2022-06-14', 'karyawan', NULL, '2022-06-06 09:10:33', '2022-06-06 09:10:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_berkas` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `pelaksanaan_ujian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `id_berkas`, `tanggal`, `waktu`, `pelaksanaan_ujian`, `tempat`, `created_at`, `updated_at`) VALUES
(2, 2, '2022-06-09', '18:00:00', 'OFFLINE', 'Gedung Pemerintah Surabaya', '2022-06-06 09:19:59', '2022-06-06 09:19:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berkas_id_pengguna_foreign` (`id_pengguna`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengguna_email_unique` (`email`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumuman_id_berkas_foreign` (`id_berkas`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_id_berkas_foreign` FOREIGN KEY (`id_berkas`) REFERENCES `berkas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
