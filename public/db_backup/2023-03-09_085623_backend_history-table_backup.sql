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
    '34f1c065-a986-4503-b80b-08dad4442b45',
    'Delete Kelas',
    'Super Admin',
    'Super Admin menghapus kelas dengan Id Kelas : 10Akuntansi3',
    '2023-02-27 21:36:17',
    '2023-02-27 21:36:17'
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
    '43408219-6290-4a7f-84ce-cd426e00278f',
    'Create Kelas',
    'Super Admin',
    'Super Admin membuat kelas dengan Id Kelas : 10TJKT3',
    '2023-02-27 21:38:00',
    '2023-02-27 21:38:00'
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
    '456e4403-b8f0-49fd-a602-8672f02add59',
    'Create Jurusan',
    'Super Admin',
    'Super Admin membuat Jurusan dengan Id Jurusan : SI-K',
    '2023-03-01 11:20:40',
    '2023-03-01 11:20:40'
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
    '599e1e8e-2480-4107-b0a5-c91c3187c7b2',
    'Delete Kelas',
    'Super Admin',
    'Super Admin menghapus kelas dengan Id Kelas : 10TKJ3',
    '2023-02-27 21:28:36',
    '2023-02-27 21:28:36'
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
    '7cbfac14-9c6f-42ec-b958-2c48ec4d9123',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : -',
    '2023-03-02 08:21:28',
    '2023-03-02 08:21:28'
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
    '8158fba4-82df-4b30-81f9-fdf753432d7a',
    'Create Kelas',
    'Super Admin',
    'Super Admin membuat kelas dengan Id Kelas : 10RPL3',
    '2023-02-27 22:03:44',
    '2023-02-27 22:03:44'
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
    '9517a7b8-8970-437b-8fbd-6a2e6d4ddfff',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : SK-lksdkasidj',
    '2023-03-02 08:25:14',
    '2023-03-02 08:25:14'
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
    '9746a4de-b093-42bd-9304-c9056e148384',
    'Create Mapel',
    'Super Admin',
    'Super Admin membuat mapel dengan Id Mapel : DS',
    '2023-03-06 19:08:15',
    '2023-03-06 19:08:15'
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
    '9b42e76a-43f0-4b1b-9328-b94986ca56fa',
    'Create Kelas',
    'Super Admin',
    'Super Admin membuat kelas dengan Id Kelas : 10AKL5',
    '2023-02-27 22:20:40',
    '2023-02-27 22:20:40'
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
    'a30effc2-3ca4-473c-9a4c-2f2564119238',
    'Create Kelas',
    'Super Admin',
    'Super Admin membuat kelas dengan Id Kelas : 10AKL4',
    '2023-02-27 22:08:45',
    '2023-02-27 22:08:45'
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
    'c00faf0c-0120-4d5a-8d47-6ba9dfc8be29',
    'Create Jurusan',
    'Super Admin',
    'Super Admin membuat Jurusan dengan Id Jurusan : BM-DM',
    '2023-03-02 07:54:21',
    '2023-03-02 07:54:21'
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
    'c8d9436a-cba1-4798-acc4-98530aee02cb',
    'Create Mapel',
    'Super Admin',
    'Super Admin membuat mapel dengan Id Mapel : MTK-MINAT',
    '2023-03-07 08:44:58',
    '2023-03-07 08:44:58'
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
    'd01a47fa-5726-4ae7-a563-932d3400898e',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : -',
    '2023-03-02 08:12:20',
    '2023-03-02 08:12:20'
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
    'de5b5660-1eec-4ae9-b6c8-380c846fb1fb',
    'Create Kelas',
    'Super Admin',
    'Super Admin membuat kelas dengan Id Kelas : 10Akuntansi3',
    '2023-02-27 21:35:48',
    '2023-02-27 21:35:48'
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
    'e30c0c46-f9f6-4636-8dce-219722ec4766',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : SK/MSMSMM02/P[0934]',
    '2023-03-02 08:04:09',
    '2023-03-02 08:04:09'
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
    'e3fe6289-1fe5-4268-acd9-0a716fdb3eb9',
    'Create Kelas',
    'Super Admin',
    'Super Admin membuat kelas dengan Id Kelas : 10TKJ3',
    '2023-02-27 21:26:36',
    '2023-02-27 21:26:36'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
