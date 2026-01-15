-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2026 pada 23.04
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Coffee', 'Minuman kopi panas & dingin', '2026-01-09 20:48:06', '2026-01-09 20:48:06'),
(2, 'Non Coffee', 'Minuman tanpa kopi', '2026-01-09 20:48:23', '2026-01-09 20:48:23'),
(3, 'Tea', 'Minuman teh', '2026-01-09 20:48:45', '2026-01-09 20:48:45'),
(4, 'Snack', 'Camilan ringan', '2026-01-09 20:48:57', '2026-01-09 20:48:57'),
(5, 'Main Course', 'Makanan berat', '2026-01-09 20:49:20', '2026-01-09 20:49:20'),
(6, 'Dessert', 'Makanan penutup', '2026-01-09 20:49:36', '2026-01-09 20:49:36'),
(7, 'Juice', 'Jus buah segar', '2026-01-09 20:49:50', '2026-01-09 20:49:50'),
(8, 'Signature', 'Menu khas cafe', '2026-01-09 20:50:02', '2026-01-09 20:50:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `category_id`, `nama`, `harga`, `stok`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Espresso', 18000, 39, '-', 'menu/AkVLoCNNAnX9EYm1qIvZEnTEIWumiDagmpd3mYsp.jpg', '2026-01-09 20:51:26', '2026-01-09 21:39:21'),
(2, 1, 'Americano', 22000, 34, NULL, 'menu/fK8qKGabDGorvqjFo3UTE8SG5mcOTjGk1jw3qCxM.jpg', '2026-01-09 20:52:45', '2026-01-09 21:40:03'),
(3, 1, 'Cappuccino', 25000, 30, NULL, 'menu/rJoBrf5QmDqHQQAZW6KxwaqHJGj5yukjBEomY8xp.jpg', '2026-01-09 20:53:53', '2026-01-09 21:40:34'),
(4, 1, 'Latte', 26000, 28, NULL, 'menu/NfDeY2RBdrIWWEv4lQrQSWvDv1UHEv65RnG2z88u.jpg', '2026-01-09 20:54:13', '2026-01-09 21:41:22'),
(5, 8, 'Caramel Latte', 30000, 20, NULL, 'menu/WmPsA5l4Xi54BNi59fJ6l09WwCxxIzQQ0jzgN0H4.jpg', '2026-01-09 20:54:35', '2026-01-09 21:42:04'),
(6, 2, 'Matcha Latte', 28000, 20, NULL, 'menu/XMSTbzOWrwDvGYMwHRss6uqVyqdrc3ackFflZzOv.jpg', '2026-01-09 20:54:55', '2026-01-09 21:42:30'),
(7, 2, 'Chocolate Drink', 25000, 20, NULL, 'menu/KhobtDqYhKsN0V9ajnltj4oP0lZuFFmxv2TUwz7z.jpg', '2026-01-09 20:55:16', '2026-01-09 21:43:01'),
(8, 3, 'Lemon Tea', 18000, 40, NULL, 'menu/71jSy3tYsxD3QGv4HS94yhAWAnFmK8ERNaEYDRhD.jpg', '2026-01-09 20:55:46', '2026-01-09 21:43:32'),
(9, 3, 'Thai Tea', 22000, 30, NULL, 'menu/zfD5JTcUoSg8DgpG0jgJ3Y6qYBMuNMZlaVZCZYPT.jpg', '2026-01-09 20:56:08', '2026-01-09 21:44:10'),
(10, 4, 'French Fries', 20000, 48, NULL, 'menu/hMqL08In6zhLkvsKsXZmgX9hnx9hK87FEATCDFdP.jpg', '2026-01-09 20:56:31', '2026-01-09 21:45:07'),
(11, 4, 'Chicken Wings', 28000, 25, NULL, 'menu/k8UAqlqj2NIHBzOfN7MGWrM1HnUH1C8g36HZ3qcm.jpg', '2026-01-09 20:56:55', '2026-01-09 21:45:55'),
(12, 5, 'Nasi Goreng', 32000, 19, NULL, 'menu/yBu3tfwNoIH3GE7Z3FfV6UEQAXoIAdF8HawiNUnO.jpg', '2026-01-09 20:57:17', '2026-01-09 21:46:27'),
(13, 5, 'Spaghetti Carbonara', 35000, 14, NULL, 'menu/0epIiUjEtZPCH3Zto74b74DU2aOiSaknSGnQR8Ev.jpg', '2026-01-09 20:57:40', '2026-01-09 21:47:09'),
(14, 6, 'Chocolate Cake', 24000, 16, NULL, 'menu/7TvaTZYkvte1El4jfgubBFxoGNq5tvQGmuWHwS75.jpg', '2026-01-09 20:58:04', '2026-01-09 21:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_08_134809_add_username_to_users_table', 2),
(5, '2026_01_08_141908_create_categories_table', 3),
(6, '2026_01_08_144046_create_menus_table', 4),
(7, '2026_01_08_145626_create_transactions_table', 5),
(8, '2026_01_08_145716_create_transaction_details_table', 6),
(9, '2026_01_08_151307_create_stock_logs_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nB9s3YPyPNCt3vd5o4vBRhlmK9qRb1KsxGDEEwno', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2NybnpmUnNWZFI4V0tQcEhYTFhzUHA3M0V5b1h6d2E1MXVrc1RiMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1767996212);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_logs`
--

CREATE TABLE `stock_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tipe` enum('IN','OUT') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stock_logs`
--

INSERT INTO `stock_logs` (`id`, `menu_id`, `tipe`, `jumlah`, `keterangan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'OUT', 1, 'Penjualan - TRX-AX1N5L', 1, '2026-01-09 21:34:28', '2026-01-09 21:34:28'),
(2, 4, 'OUT', 2, 'Penjualan - TRX-1DYWGG', 1, '2026-01-09 21:35:50', '2026-01-09 21:35:50'),
(3, 13, 'OUT', 1, 'Penjualan - TRX-RU9EIK', 1, '2026-01-09 21:36:08', '2026-01-09 21:36:08'),
(4, 14, 'OUT', 2, 'Penjualan - TRX-8RRB6B', 1, '2026-01-09 21:36:24', '2026-01-09 21:36:24'),
(5, 12, 'OUT', 1, 'Penjualan - TRX-Q66OHD', 1, '2026-01-09 21:36:42', '2026-01-09 21:36:42'),
(6, 2, 'OUT', 1, 'Penjualan - TRX-IHUDYG', 1, '2026-01-09 21:37:09', '2026-01-09 21:37:09'),
(7, 10, 'OUT', 2, 'Penjualan - TRX-MBQ1HR', 1, '2026-01-09 21:37:24', '2026-01-09 21:37:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `kode_transaksi`, `tanggal`, `user_id`, `total_harga`, `created_at`, `updated_at`) VALUES
(25, 'TRX-AX1N5L', '2026-01-10 04:34:28', 1, 18000, '2026-01-09 21:34:28', '2026-01-09 21:34:28'),
(26, 'TRX-1DYWGG', '2026-01-10 04:35:50', 1, 52000, '2026-01-09 21:35:50', '2026-01-09 21:35:50'),
(27, 'TRX-RU9EIK', '2026-01-10 04:36:08', 1, 35000, '2026-01-09 21:36:08', '2026-01-09 21:36:08'),
(28, 'TRX-8RRB6B', '2026-01-10 04:36:24', 1, 48000, '2026-01-09 21:36:24', '2026-01-09 21:36:24'),
(29, 'TRX-Q66OHD', '2026-01-10 04:36:42', 1, 32000, '2026-01-09 21:36:42', '2026-01-09 21:36:42'),
(30, 'TRX-IHUDYG', '2026-01-10 04:37:09', 1, 22000, '2026-01-09 21:37:09', '2026-01-09 21:37:09'),
(31, 'TRX-MBQ1HR', '2026-01-10 04:37:24', 1, 40000, '2026-01-09 21:37:24', '2026-01-09 21:37:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `menu_id`, `qty`, `harga`, `subtotal`, `created_at`, `updated_at`) VALUES
(2, 25, 1, 1, 18000, 18000, '2026-01-09 21:34:28', '2026-01-09 21:34:28'),
(3, 26, 4, 2, 26000, 52000, '2026-01-09 21:35:50', '2026-01-09 21:35:50'),
(4, 27, 13, 1, 35000, 35000, '2026-01-09 21:36:08', '2026-01-09 21:36:08'),
(5, 28, 14, 2, 24000, 48000, '2026-01-09 21:36:24', '2026-01-09 21:36:24'),
(6, 29, 12, 1, 32000, 32000, '2026-01-09 21:36:42', '2026-01-09 21:36:42'),
(7, 30, 2, 1, 22000, 22000, '2026-01-09 21:37:09', '2026-01-09 21:37:09'),
(8, 31, 10, 2, 20000, 40000, '2026-01-09 21:37:24', '2026-01-09 21:37:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Cafe', 'admin', 'admin@cafe.test', NULL, '$2y$12$5MoqI3Gb5ygfdpMhRm02p.MvoziPsQloAHaLAeCEP.U6gPWfWMhNy', NULL, '2026-01-08 06:50:57', '2026-01-08 06:50:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `stock_logs`
--
ALTER TABLE `stock_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_logs_menu_id_foreign` (`menu_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_kode_transaksi_unique` (`kode_transaksi`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_menu_id_foreign` (`menu_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `stock_logs`
--
ALTER TABLE `stock_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `stock_logs`
--
ALTER TABLE `stock_logs`
  ADD CONSTRAINT `stock_logs_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
