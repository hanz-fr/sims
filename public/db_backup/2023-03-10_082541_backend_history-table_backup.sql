/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: history
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `history` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `activityName` varchar(255) NOT NULL,
  `activityAuthor` varchar(255) NOT NULL,
  `activityDesc` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: history
# ------------------------------------------------------------

INSERT INTO
  `history` (
    `id`,
    `activityName`,
    `activityAuthor`,
    `activityDesc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '5d4badc8-5831-44c4-8a55-64c0a158b3b7',
    'Delete Mutasi Keluar',
    'Super Admin',
    'Super Admin menghapus data mutasi keluar dengan SK : -',
    '2023-03-10 08:22:55',
    '2023-03-10 08:22:55'
  );
INSERT INTO
  `history` (
    `id`,
    `activityName`,
    `activityAuthor`,
    `activityDesc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'bf5ca5c8-bc8c-4bac-8761-0d2845b1553a',
    'Update Mapel',
    'Super Admin',
    'Super Admin memperbarui Mapel dengan Id Mapel : KEJURUAN',
    '2023-03-10 08:11:21',
    '2023-03-10 08:11:21'
  );
INSERT INTO
  `history` (
    `id`,
    `activityName`,
    `activityAuthor`,
    `activityDesc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'd2d3d769-62c8-47cb-97d9-ee7d0842f641',
    'Delete Mutasi Keluar',
    'Super Admin',
    'Super Admin menghapus data mutasi keluar dengan SK : -',
    '2023-03-10 08:23:02',
    '2023-03-10 08:23:02'
  );
INSERT INTO
  `history` (
    `id`,
    `activityName`,
    `activityAuthor`,
    `activityDesc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'db9154c6-64df-49ca-a4df-6d420d200e37',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : -',
    '2023-03-10 08:22:49',
    '2023-03-10 08:22:49'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
