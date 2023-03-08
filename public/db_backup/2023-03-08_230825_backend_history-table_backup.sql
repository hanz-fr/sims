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
    '07844f2e-c851-41be-9860-05361deaa1b0',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : -',
    '2023-03-02 17:44:32',
    '2023-03-02 17:44:32'
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
    '54934cdf-7f7e-4ba6-9bdd-2cc495c4e183',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : -',
    '2023-03-02 17:51:31',
    '2023-03-02 17:51:31'
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
    '99845449-9638-44f3-a462-26ddb7c34265',
    'Create Kelas',
    'Super Admin',
    'Super Admin membuat kelas dengan Id Kelas : 10RPL3',
    '2023-02-28 17:51:02',
    '2023-02-28 17:51:02'
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
    '9bf6d326-0b04-471e-9621-ea082dbe666b',
    'Update Mutasi Keluar',
    'Super Admin',
    'Super Admin mengupdate mutasi keluar dengan SK Mutasi : -',
    '2023-03-02 18:12:29',
    '2023-03-02 18:12:29'
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
    'b6e13b15-077e-4cc2-adc7-7c3405114d50',
    'Update Mutasi Keluar',
    'Super Admin',
    'Super Admin mengupdate mutasi keluar dengan SK Mutasi : -',
    '2023-03-02 18:12:23',
    '2023-03-02 18:12:23'
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
    'd3fc85db-d847-4bae-9788-d10b8d88ff42',
    'Create Jurusan',
    'Super Admin',
    'Super Admin membuat Jurusan dengan Id Jurusan : ITIL-LELE',
    '2023-03-02 17:41:52',
    '2023-03-02 17:41:52'
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
    'eddb52ae-d30e-463f-ad4a-260b1ce2fcbd',
    'Create Mutasi Masuk',
    'Super Admin',
    'Super Admin membuat mutasi masuk dengan SK Mutasi : SK-9123ij12d',
    '2023-03-02 18:14:55',
    '2023-03-02 18:14:55'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
