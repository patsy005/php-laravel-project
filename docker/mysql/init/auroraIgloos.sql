-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql_container:3306
-- Generation Time: Cze 19, 2025 at 05:32 PM
-- Wersja serwera: 9.3.0
-- Wersja PHP: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `auroraIgloos`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `booking`
--

CREATE TABLE `booking` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `igloo_id` bigint UNSIGNED NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `payment_method_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `booking_date` date NOT NULL DEFAULT '2025-06-12',
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `early_check_in` tinyint(1) NOT NULL DEFAULT '0',
  `late_check_out` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `booking`
--

INSERT INTO `booking` (`id`, `created_at`, `updated_at`, `igloo_id`, `check_in_date`, `check_out_date`, `payment_method_id`, `amount`, `booking_date`, `notes`, `user_id`, `employee_id`, `early_check_in`, `late_check_out`) VALUES
(1, '2025-06-14 20:25:10', NULL, 1, '2025-06-14', '2025-06-16', 6, 400.00, '2025-06-12', NULL, 1, 1, 0, 0),
(2, '2025-06-14 20:26:06', NULL, 2, '2025-06-25', '2025-06-26', 2, 300.00, '2025-06-12', NULL, 10, 4, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customer`
--

CREATE TABLE `customer` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `customer`
--

INSERT INTO `customer` (`id`, `created_at`, `updated_at`, `name`, `surname`, `email`, `phone`, `street`, `street_number`, `house_number`, `city`, `country`, `nationality`, `postal_code`) VALUES
(1, '2025-06-12 16:18:43', NULL, 'Anna', 'Nowak', 'anna@example.pl', '500600700', 'Długa', '10', '1A', 'Kraków', 'Poland', 'Polish', '30-001'),
(2, '2025-06-12 16:18:43', NULL, 'John', 'Smith', 'john@example.com', '111222333', 'Main', '5', '2', 'New York', 'USA', 'American', '10001'),
(3, '2025-06-12 16:18:43', NULL, 'Maria', 'Gonzalez', 'maria@example.es', '444555666', 'Calle Falsa', '123', 'B', 'Madryt', 'Spain', 'Spanish', '28001'),
(4, '2025-06-12 16:18:43', NULL, 'Liam', 'O’Brien', 'liam@example.ie', '777888999', 'Green Rd', '8', '4', 'Dublin', 'Ireland', 'Irish', 'D02'),
(5, '2025-06-12 16:18:43', NULL, 'Yuki', 'Tanaka', 'yuki@example.jp', '09012345678', 'Sakura', '3', '9', 'Tokyo', 'Japan', 'Japanese', '100-0001'),
(6, '2025-06-12 16:18:43', NULL, 'Hans', 'Müller', 'hans@example.de', '01511234567', 'Bahnhofstr.', '7', 'C', 'Berlin', 'Germany', 'German', '10115'),
(7, '2025-06-12 16:18:43', NULL, 'Sara', 'Nilsen', 'sara@example.no', '98432100', 'Fjellgata', '22', 'D', 'Oslo', 'Norway', 'Norwegian', '0150'),
(8, '2025-06-12 16:18:43', NULL, 'Fatima', 'Ali', 'fatima@example.sa', '0555000111', 'Al Malaz', '9', '1', 'Riyadh', 'Saudi Arabia', 'Saudi', '11564'),
(9, '2025-06-12 16:18:43', NULL, 'Chen', 'Wei', 'chen@example.cn', '13800138000', 'Zhongshan', '12', '3', 'Beijing', 'China', 'Chinese', '100000'),
(10, '2025-06-12 16:18:43', NULL, 'Sophie', 'Dupont', 'sophie@example.fr', '0612345678', 'Rue de Rivoli', '4', '5B', 'Paris', 'France', 'French', '75001');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `discount`
--

CREATE TABLE `discount` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `igloo_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percentage` int NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `discount`
--

INSERT INTO `discount` (`id`, `created_at`, `updated_at`, `igloo_id`, `name`, `discount_percentage`, `description`, `valid_from`, `valid_to`) VALUES
(1, '2025-06-12 16:37:07', NULL, 1, 'Spring Special', 15, '15% off for early spring bookings', '2025-03-01', '2025-04-15'),
(2, '2025-06-12 16:37:34', NULL, 7, 'Family Discount', 20, '20% off for families with children', '2025-06-01', '2026-09-21'),
(3, '2025-06-12 16:37:56', NULL, 2, 'Summer Escape', 10, '10% off during summer season', '2025-06-21', '2025-09-21'),
(4, '2025-06-12 16:38:24', NULL, 8, 'Winter Wonderland', 10, '10% off during winter peak', '2025-01-01', '2025-01-31');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee`
--

CREATE TABLE `employee` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `employee`
--

INSERT INTO `employee` (`id`, `created_at`, `updated_at`, `name`, `surname`, `email`, `phone`, `street`, `street_number`, `house_number`, `city`, `country`, `postal_code`, `role_id`, `image`) VALUES
(1, '2025-06-12 16:20:58', NULL, 'Sophie', 'Wonderland', 's.wonderland@aurora.com', '6666666', '7701234', '12', '1B', 'Reykjavík', 'Iceland', '108', 1, 'sophie.jpg'),
(2, '2025-06-12 16:22:06', NULL, 'Gunnar', 'Jónsson', 'g.jonsson@aurora.com', '7804567', 'Laugavegur', '8', '3A', 'Reykjavík', 'Iceland', '101', 3, 'gunnar.jpg'),
(3, '2025-06-12 16:23:16', NULL, 'Magnus', 'Guðmundsson', 'm.gudmundsson@aurora.com', '7907890', 'Skólavörðustígur', '5', '2', 'Reykjavík', 'Iceland', '110', 2, 'Magnus.jpg'),
(4, '2025-06-12 16:24:25', NULL, 'Anne', 'Doe', 'a.doe@aurora.com', '7503211', 'Austurstræti', '15', '1', 'Reykjavík', 'Iceland', '107', 4, 'anne.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee_role`
--

CREATE TABLE `employee_role` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `employee_role`
--

INSERT INTO `employee_role` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2025-06-12 16:19:15', NULL, 'admin'),
(2, '2025-06-12 16:19:15', NULL, 'receptionist'),
(3, '2025-06-12 16:19:15', NULL, 'manager'),
(4, '2025-06-12 16:19:15', NULL, 'cleaner');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `igloos`
--

CREATE TABLE `igloos` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int NOT NULL DEFAULT '0',
  `price_per_night` decimal(8,2) NOT NULL DEFAULT '0.00',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `igloos`
--

INSERT INTO `igloos` (`id`, `created_at`, `updated_at`, `name`, `capacity`, `price_per_night`, `image`) VALUES
(1, '2025-06-12 16:35:26', NULL, 'Cozy Cabin', 4, 200.00, 'igloo_1.png'),
(2, '2025-06-12 16:35:26', NULL, 'Arctic Retreat', 2, 200.00, 'igloo_2.png'),
(3, '2025-06-12 16:35:26', NULL, 'Snowy Lodge', 3, 200.00, 'igloo_3.png'),
(4, '2025-06-12 16:35:26', NULL, 'Frosty Hideaway', 2, 200.00, 'igloo_4.jpg'),
(5, '2025-06-12 16:35:26', NULL, 'Icy Haven', 5, 200.00, 'igloo_6.jpg'),
(6, '2025-06-12 16:35:26', NULL, 'Northern Lights Lodge', 3, 200.00, 'igloo_7.jpg'),
(7, '2025-06-12 16:35:26', NULL, 'Polar Palace', 6, 500.00, 'igloo_1.png'),
(8, '2025-06-12 16:35:26', NULL, 'Aurora Escape', 2, 170.00, 'igloo_2.png'),
(9, '2025-06-12 16:35:26', NULL, 'Glacial Getaway', 4, 340.00, 'igloo_3.png'),
(10, '2025-06-12 16:35:26', NULL, 'Frozen Fortress', 3, 200.00, 'igloo_4.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_30_18001_create_employee-role_table', 1),
(5, '2025_05_30_182551_create_employee_table', 1),
(6, '2025_05_30_182611_create_payment_method_table', 1),
(7, '2025_05_30_191339_create_igloos_table', 1),
(8, '2025_05_30_192508_create_booking_table', 1),
(9, '2025_05_30_192539_create_customer_table', 1),
(10, '2025_05_30_192626_create_discount_table', 1),
(11, '2025_06_12_164037_add_name_to_payment_methods_table', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2025-06-12 16:42:13', NULL, 'Transfer'),
(2, '2025-06-12 16:42:20', NULL, 'PayPal'),
(3, '2025-06-12 16:42:26', NULL, 'ApplePay'),
(4, '2025-06-12 16:42:30', NULL, 'GooglePay'),
(5, '2025-06-12 16:42:35', NULL, 'Klarna'),
(6, '2025-06-12 16:42:51', NULL, 'Credit Card');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('spJ5sJErcr4hpaQtFTWZC8nI7ylNelAMPsRFnQDd', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUdjU1l3bXhUNGtCdUtZdEU2c0Z2MlY2SEZNajFhZWtIZUZiTWF4TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29raW5ncz9zb3J0PW5hbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1750354212);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_igloo_id_foreign` (`igloo_id`),
  ADD KEY `booking_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `booking_employee_id_foreign` (`employee_id`),
  ADD KEY `booking_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeksy dla tabeli `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeksy dla tabeli `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_email_unique` (`email`);

--
-- Indeksy dla tabeli `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_igloo_id_foreign` (`igloo_id`);

--
-- Indeksy dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_email_unique` (`email`),
  ADD KEY `employee_role_id_foreign` (`role_id`);

--
-- Indeksy dla tabeli `employee_role`
--
ALTER TABLE `employee_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_role_name_unique` (`name`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `igloos`
--
ALTER TABLE `igloos`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeksy dla tabeli `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeksy dla tabeli `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `discount`
--
ALTER TABLE `discount`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `employee_role`
--
ALTER TABLE `employee_role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `igloos`
--
ALTER TABLE `igloos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `booking_igloo_id_foreign` FOREIGN KEY (`igloo_id`) REFERENCES `igloos` (`id`),
  ADD CONSTRAINT `booking_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`),
  ADD CONSTRAINT `booking_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`);

--
-- Ograniczenia dla tabeli `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_igloo_id_foreign` FOREIGN KEY (`igloo_id`) REFERENCES `igloos` (`id`);

--
-- Ograniczenia dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `employee_role` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
