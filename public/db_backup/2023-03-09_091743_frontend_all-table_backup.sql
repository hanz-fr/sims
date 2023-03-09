/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: failed_jobs
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: migrations
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: password_resets
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: personal_access_tokens
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: user_data
# ------------------------------------------------------------

CREATE OR REPLACE VIEW `user_data` AS
select
  `users`.`id` AS `id`,
  `users`.`nip` AS `nip`,
  `users`.`nama` AS `nama`,
  `users`.`email` AS `email`,
  `users`.`no_telp` AS `no_telp`,
  `users`.`email_verified_at` AS `email_verified_at`,
  `users`.`token` AS `token`,
  `users`.`password` AS `password`,
  `users`.`role` AS `role`,
  `users`.`is_admin` AS `is_admin`,
  `users`.`remember_token` AS `remember_token`,
  `users`.`timezone` AS `timezone`,
  `users`.`created_at` AS `created_at`,
  `users`.`updated_at` AS `updated_at`
from
  `users`;

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: failed_jobs
# ------------------------------------------------------------


# ------------------------------------------------------------
# DATA DUMP FOR TABLE: migrations
# ------------------------------------------------------------

INSERT INTO
  `migrations` (`id`, `migration`, `batch`)
VALUES
  (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO
  `migrations` (`id`, `migration`, `batch`)
VALUES
  (
    2,
    '2014_10_12_100000_create_password_resets_table',
    1
  );
INSERT INTO
  `migrations` (`id`, `migration`, `batch`)
VALUES
  (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO
  `migrations` (`id`, `migration`, `batch`)
VALUES
  (
    4,
    '2019_12_14_000001_create_personal_access_tokens_table',
    1
  );
INSERT INTO
  `migrations` (`id`, `migration`, `batch`)
VALUES
  (
    5,
    '2023_02_09_110643_add_timezone_column_to_users_table',
    1
  );
INSERT INTO
  `migrations` (`id`, `migration`, `batch`)
VALUES
  (6, '2023_02_12_194954_create_view_user', 1);

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: password_resets
# ------------------------------------------------------------


# ------------------------------------------------------------
# DATA DUMP FOR TABLE: personal_access_tokens
# ------------------------------------------------------------


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
    '2wphCuP98MDpWdDlTTCDfmzDcDPhPLp3BQpRqsPc',
    '$2y$10$GRlGePKeLZ4g0WDPOMUhoOqIbLHRSxkQpwV.WD7smJrIQcadWuSsu',
    0,
    1,
    NULL,
    'America/New_York',
    '2023-02-14 22:02:54',
    '2023-02-14 22:03:25'
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
    '000000001',
    'Usep bin Usman',
    'usepbinusman@gmail.com',
    '088293823891',
    NULL,
    'ARn02l2xwcIgiTKIxX69GKGEI187IURhPdKpiyC9',
    '$2y$10$zgzoMpLsLS4o9ySvu5BWz.Elu2MSh6pMT4Q89anNNOUEQKR0QoQBG',
    1,
    1,
    NULL,
    'America/New_York',
    '2023-02-15 13:04:19',
    '2023-02-27 20:58:09'
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
    '000000002',
    'Asep bin Ujang',
    'asepbinujang@gmail.com',
    '0882391283',
    NULL,
    '4QNLYDX93kQY6dJFccXnWoIwKeQznJaIsrOZQOG0',
    '$2y$10$H8GTIPfZBHV9RnSv1SUk0.gXxGaFvmZPS1uzA2g4vQlRYUqpku0Jq',
    2,
    0,
    NULL,
    'America/New_York',
    '2023-02-15 13:05:12',
    '2023-02-15 15:05:18'
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
    '0000000022',
    'Jonathan',
    'jonathansamuel@gmail.com',
    '0889898278',
    NULL,
    'ty91ZdgCZ8rNGgJoKDGHh7d7I46IDtw6AYyuBmeB',
    '$2y$10$zMmoIvZ/86vfbsHNTnQnre2ATQBaakfCU7SX6ipJcJ2RNmgwcezsC',
    4,
    0,
    NULL,
    'America/New_York',
    '2023-02-23 08:06:06',
    '2023-02-23 08:06:38'
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
    5,
    '0000000033',
    'Joseph Samuel',
    'josephsamuel@gmail.com',
    '088239812387',
    NULL,
    'aL7SzNG0Bv3rftfdAWDNZtwAEnXKUPhdgaOOO5NU',
    '$2y$10$TXjBsaqI1h43SWLNi4yfJuxc0S..unX901jvR7RtmZ1FxItNouLHW',
    4,
    0,
    NULL,
    'America/New_York',
    '2023-02-23 09:10:21',
    '2023-02-23 09:11:15'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
