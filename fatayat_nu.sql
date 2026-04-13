-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2026 pada 05.49
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
-- Database: `fatayat_nu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Ramadhan Ke - 30', 'ramadhan-ke-30', '*Selamat Menunaikan Ibadah Puasa*\r\n\r\n_Pergi pagi memetik melati_\r\n_Harumnya sampai ke dalam rumah_\r\n_Ramadhan pergi sedih di hati_\r\n_Semoga berkahnya tetap melimpah_\r\n\r\n💚💚💚💚💚💚💚💚💚\r\n\r\n*Pimpinan Anak Cabang Fatayat NU Tahunan*\r\n\r\n#Safari1447H\r\n#MediaPACFNUTahunan\r\n#PACFNUTahunan\r\n#Ramadhankareem', 'articles/Jx6wMOpWPWDfsqUeoRCbRbzNd54EF1tHm4UgyzpP.png', 'published', '2026-03-01 13:37:49', '2026-04-11 00:29:25'),
(3, '1 Syawal 1447 H', '1-syawal-1447-h', '*Selamat Hari Raya Idul Fitri*\r\n\r\n_Pergi berlayar menuju seberang_\r\n_Singgah sebentar di pulau bahari_\r\n_Ramadhan telah kita lewati dengan tenang_\r\n_Kini Idul Fitri menyucikan diri dan hati_\r\n\r\n💚💚💚💚💚💚💚💚💚\r\n\r\n*Pimpinan Anak Cabang Fatayat NU Tahunan*\r\n\r\n#Safari1447H\r\n#MediaPACFNUTahunan\r\n#PACFNUTahunan\r\n#Ramadhankareem', 'articles/yYFc4Jjg2CgXXSU0O0WfcVIgMIszdBfWXWHyvnWZ.png', 'published', '2026-04-10 22:16:16', '2026-04-11 00:28:59'),
(5, 'Ramadhan Ke-29', 'ramadhan-ke-29', '*Selamat Menunaikan Ibadah Puasa*\r\n\r\n_Beli madu di toko seberang_\r\n_Jangan lupa membeli kurma juga_\r\n_Puasa membuat tubuh lebih tenang_\r\n_Sehat raga bahagia jiwa_\r\n\r\n💚💚💚💚💚💚💚💚💚\r\n\r\n*Pimpinan Anak Cabang Fatayat NU Tahunan*\r\n\r\n#Safari1447H\r\n#MediaPACFNUTahunan\r\n#PACFNUTahunan\r\n#Ramadhankareem', 'articles/tSv8MeXzzTSQK3nGhXSMlCzXDhtYHeJMVG2r6GO1.png', 'published', '2026-04-11 00:29:57', '2026-04-11 00:29:57'),
(6, 'Ramadhan Ke-28', 'ramadhan-ke-28', '*Selamat Menunaikan Ibadah Puasa*\r\n\r\n_Burung merpati terbang ke Mekkah_\r\n_Hinggap sebentar di pohon kurma_\r\n_Indahnya Islam mengajarkan ukhuwah_\r\n_Silaturrahmi mempererat rasa_\r\n\r\n💚💚💚💚💚💚💚💚💚\r\n\r\n*Pimpinan Anak Cabang Fatayat NU Tahunan*\r\n\r\n#Safari1447H\r\n#MediaPACFNUTahunan\r\n#PACFNUTahunan\r\n#Ramadhankareem', 'articles/azWCiXmQ7G1W9DrxgFJyZtGWslIOnQC55rx4Xasb.png', 'published', '2026-04-11 00:30:29', '2026-04-11 00:30:29'),
(7, 'Kabar duka', 'kabar-duka', 'Inna lillahi wa inna ilaihi raji’un.\r\n\r\nKeluarga Besar PAC Fatayat NU Tahunan turut berduka cita atas wafatnya\r\n*BAPAK MUHAMMAD NUR AINI BIN MBAH MUSLIKHAN*\r\n(Ayahanda dari M.Bayu Nugroho Ketua PAC IPNU Kecamatan Tahunan).\r\n\r\nSemoga Allah SWT menerima seluruh amal ibadahnya dan menempatkannya di tempat terbaik di sisi-Nya.\r\n\r\nAl-Fatihah…\r\n\r\n#BerdukaCita\r\n#Innalillahi\r\n#FatayatNU\r\n#IPNUIPPNU\r\n#KhidmahNU', 'articles/7OafvVTVHazEbEZHuYr8rpYAG1cT7zUDERUgFuC5.png', 'draft', '2026-04-11 00:30:51', '2026-04-11 00:30:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `event_date` datetime NOT NULL,
  `status` enum('upcoming','completed') NOT NULL DEFAULT 'upcoming',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `location`, `event_date`, `status`, `created_at`, `updated_at`) VALUES
(3, 'adam', 'dadwadawda', 'demak', '2026-04-01 15:24:00', 'upcoming', '2026-04-11 01:25:06', '2026-04-11 01:25:06'),
(4, 'dawda', 'awdadwad', 'demak', '2026-04-01 16:25:00', 'upcoming', '2026-04-11 01:25:19', '2026-04-11 01:25:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2026_03_01_144021_create_articles_table', 1),
(5, '2026_03_01_144029_create_events_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('bnjEItyU4yHvyqZOatBB7azBmEOpVlqgGRjPOiqN', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid3h4N0hOYWMzMWxzdWYxaWZzekw4RHgydEpnalRSV0FZWk41THNXNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1775899192);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$ta/lUbdLWf2M3ydAdcu9xORMjui4SL1XnsF978VUyf8AWDxe/Yuxy', NULL, '2026-03-01 12:44:16', '2026-03-01 12:44:16'),
(2, 'admin', 'adminadam@gmail.com', NULL, '$2y$12$ZfwoAosrXLYBeclE/3N8xuXQln2KkS8KhF/yFdrO33488/ndEteP.', 've9NlVAhknMzLLn1n6FgpsSRHjVkUW8gE9xsCyScdhAzlprwkgE0rhbIPiL5', '2026-03-11 17:24:19', '2026-03-11 17:24:19'),
(3, 'Admin Fatayat', 'admin@fatayat.com', NULL, '$2y$12$F2eWjj0QbFX6FT6NSGzGMePoDFURXyqsvZxb1FRsafHnwfaxuS6EG', NULL, '2026-04-10 21:30:32', '2026-04-10 21:30:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
