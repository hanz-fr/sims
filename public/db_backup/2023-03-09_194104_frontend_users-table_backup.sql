/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: users
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_no_telp_unique` (`no_telp`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: users
# ------------------------------------------------------------

INSERT INTO
  `users` (
    `id`,
    `nip`,
    `nama`,
    `email`,
    `no_telp`,
    `email_verified_at`,
    `token`,
    `password`,
    `role`,
    `is_admin`,
    `remember_token`,
    `timezone`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    1,
    '123123123',
    'Super Admin',
    'contactsims11@gmail.com',
    NULL,
    NULL,
    'GxEfGhB0odH9AQzsqVJCxLrKvQc0HAZH0PXInN3b',
    '$2y$10$hIbyVwfG5b4YCkvDkmO.MOOcSq4umVAL9icdxRiAYhgVlAQQkrlzy',
    1,
    1,
    NULL,
    'America/New_York',
    '2023-02-19 14:00:06',
    '2023-02-19 14:00:41'
  );
INSERT INTO
  `users` (
    `id`,
    `nip`,
    `nama`,
    `email`,
    `no_telp`,
    `email_verified_at`,
    `token`,
    `password`,
    `role`,
    `is_admin`,
    `remember_token`,
    `timezone`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    2,
    '0000000011',
    'Walikelas 1',
    'walkel1@gmail.com',
    '0891',
    NULL,
    'rHy91Auq3HorRaYO5gzwofdrgZ4jpyc9F3FsVc3W',
    '$2y$10$aA3ecp/WpEel7c9Wllxgw.kNDQrA8XOfwytqMA/Uh2z5m/4YE/fSa',
    4,
    0,
    NULL,
    'America/New_York',
    '2023-02-28 18:32:00',
    '2023-02-28 18:33:27'
  );
INSERT INTO
  `users` (
    `id`,
    `nip`,
    `nama`,
    `email`,
    `no_telp`,
    `email_verified_at`,
    `token`,
    `password`,
    `role`,
    `is_admin`,
    `remember_token`,
    `timezone`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    3,
    '0000000022',
    'Walikelas 2',
    'walkel2@gmail.com',
    '0892',
    NULL,
    'Xn08WWVUjpxzJTsx7A7n0Dh0ETMCp6AMEhnwVTHG',
    '$2y$10$EEgYZJWnNAIQNQJzZOva5Ordt3h5ryInX4a2IgWY.KmiX//SpHHvO',
    4,
    0,
    NULL,
    'America/New_York',
    '2023-02-28 18:32:29',
    '2023-02-28 18:48:40'
  );
INSERT INTO
  `users` (
    `id`,
    `nip`,
    `nama`,
    `email`,
    `no_telp`,
    `email_verified_at`,
    `token`,
    `password`,
    `role`,
    `is_admin`,
    `remember_token`,
    `timezone`,
    `created_at`,
    `updated_at`
  )
VALUES
  (
    4,
    '0000000033',
    'Kurikulum 1',
    'kurikulum1@gmail.com',
    '0893',
    NULL,
    'E4VHkeYFDo8x3wldn7gvQteCBqWOWlrkpM4X9bEA',
    '$2y$10$wM7y4NWcDNHPLtAxZ7r17OX.ZmfSvWkSBdzGsrQoCsDpGfZd4Ocfq',
    3,
    0,
    NULL,
    'America/New_York',
    '2023-02-28 19:58:11',
    '2023-03-07 20:33:12'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
