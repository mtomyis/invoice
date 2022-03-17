-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Mar 2022 pada 13.27
-- Versi server: 10.5.15-MariaDB-cll-lve
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsitek_invoice`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_invoice`
--

CREATE TABLE `detail_invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `potongan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_invoice` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_invoice`
--

INSERT INTO `detail_invoice` (`id`, `kode`, `barang`, `satuan`, `jumlah`, `harga`, `potongan`, `total`, `keterangan`, `id_invoice`, `created_at`, `updated_at`) VALUES
(4, 'gg', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 0, '2021-11-10 23:21:02', '2021-11-10 23:21:02'),
(5, 'ksadgfsd', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 0, '2021-11-10 23:21:55', '2021-11-10 23:26:45'),
(6, 'hrthytuh', 'h', 'h', 'h', 'h', 'h', 'h', 'h', 0, '2021-11-10 23:23:25', '2021-11-11 01:08:58'),
(7, 'kjhjmkl', 'kkjbh', 'kjhkj', '1215', 'nkj', 'njk', 'j', 'jnj', 2, '2021-11-11 03:18:42', '2021-11-12 22:12:06'),
(8, 'kml', 'jnjkn', 'kj', 'nk', 'jkl', 'll-', 'nl', 'l-', 7, '2022-01-09 20:28:16', '2022-01-09 20:28:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `sales` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kantor` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `nama`, `alamat`, `no_transaksi`, `tgl_transaksi`, `sales`, `id_kantor`, `created_at`, `updated_at`) VALUES
(1, 'l', 'l', 'l', '2021-11-30', NULL, 1, '2021-11-11 02:24:26', '2021-11-11 02:24:26'),
(2, 'jn', 'hn', 'jnj', '2021-11-11', NULL, 1, '2021-11-11 02:35:30', '2021-11-11 02:35:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_invoice`
--
ALTER TABLE `detail_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_invoice`
--
ALTER TABLE `detail_invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
