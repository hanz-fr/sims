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
    '01e90250-aa00-4e1b-9440-0df9ea6e69be',
    'Delete Mutasi Keluar',
    'Super Admin',
    'Super Admin menghapus data mutasi keluar dengan SK : -',
    '2023-03-10 09:38:53',
    '2023-03-10 09:38:53'
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
    '067cc7c4-5e05-442e-9e1a-51c55c669623',
    'Update Data Siswa',
    'Super Admin',
    'Super Admin mengupdate data siswa dengan NIS : 1088499623',
    '2023-03-10 08:40:42',
    '2023-03-10 08:40:42'
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
    '1a7c4e42-4d73-48f5-b4b6-73eeacd51505',
    'Update Data Siswa',
    'Super Admin',
    'Super Admin mengupdate data siswa dengan NIS : 1088499623',
    '2023-03-10 08:40:41',
    '2023-03-10 08:40:41'
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
    '26320f06-d744-4006-bb31-8b3ad8617577',
    'Update Mutasi Keluar',
    'Super Admin',
    'Super Admin mengupdate mutasi keluar dengan SK Mutasi : -',
    '2023-03-10 09:52:20',
    '2023-03-10 09:52:20'
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
    '2668c9ce-23c2-4af8-b3fd-05ab4de48d44',
    'Update Data Siswa',
    'Super Admin',
    'Super Admin mengupdate data siswa dengan NIS : 0213910239',
    '2023-03-10 08:52:26',
    '2023-03-10 08:52:26'
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
    '38eb0d3b-3bc3-4fa3-8d3c-679eba639425',
    'Update Data Siswa',
    'Super Admin',
    'Super Admin mengupdate data siswa dengan NIS : 4376596494',
    '2023-03-10 09:55:40',
    '2023-03-10 09:55:40'
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
    '392c3f06-f729-4a28-a785-c1761510aa40',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : -',
    '2023-03-10 09:39:38',
    '2023-03-10 09:39:38'
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
    '51d68443-4366-49c4-83fd-5498d46cd6b0',
    'Update Mutasi Keluar',
    'Super Admin',
    'Super Admin mengupdate mutasi keluar dengan SK Mutasi : -',
    '2023-03-10 10:00:03',
    '2023-03-10 10:00:03'
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
    '60206b55-bd92-4b06-a8e1-51d75cb106ae',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : SMMk N FUH FBHASB',
    '2023-03-10 10:29:48',
    '2023-03-10 10:29:48'
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
    '61b291c5-240f-4a96-9fb1-9c351e90ccf4',
    'Update Data Siswa',
    'Super Admin',
    'Super Admin mengupdate data siswa dengan NIS : 1088499623',
    '2023-03-10 08:40:40',
    '2023-03-10 08:40:40'
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
    '70ff0bfb-a689-4159-833b-13b95d1fd845',
    'Create Data Siswa',
    'Super Admin',
    'Super Admin membuat data siswa baru dengan NIS : 0000000800',
    '2023-03-10 09:04:00',
    '2023-03-10 09:04:00'
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
    '9507a1a1-31ac-4e58-ad79-858087807c93',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : -',
    '2023-03-10 09:56:40',
    '2023-03-10 09:56:40'
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
    'a26aabf4-1c6e-4888-a3d5-1073c1378557',
    'Update Data Siswa',
    'Super Admin',
    'Super Admin mengupdate data siswa dengan NIS : 3349521107',
    '2023-03-10 10:01:04',
    '2023-03-10 10:01:04'
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
    'aad5e19e-7efc-4019-bd4d-1a2d8cd93713',
    'Create Kelas',
    'Super Admin',
    'Super Admin membuat kelas dengan Id Kelas : 10AKL3',
    '2023-03-10 08:47:30',
    '2023-03-10 08:47:30'
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
    'afeb3e2e-864f-4b7f-8e77-5aa9498d4de3',
    'Create Data Siswa',
    'Super Admin',
    'Super Admin membuat data siswa baru dengan NIS : 0213910239',
    '2023-03-10 08:49:16',
    '2023-03-10 08:49:16'
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
    'bfa5b290-bfd1-4fca-b198-f184dd1277dd',
    'Create Mutasi Keluar',
    'Super Admin',
    'Super Admin membuat mutasi keluar dengan SK Mutasi : -',
    '2023-03-10 09:53:11',
    '2023-03-10 09:53:11'
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
    'd2f2e0b0-6108-4049-8a28-d4beda8b4a30',
    'Update Data Siswa',
    'Super Admin',
    'Super Admin mengupdate data siswa dengan NIS : 1088499623',
    '2023-03-10 08:36:10',
    '2023-03-10 08:36:10'
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
    'd6d0a7dc-a657-48d8-8753-7ed86ac6b50e',
    'Update Data Siswa',
    'Super Admin',
    'Super Admin mengupdate data siswa dengan NIS : 1088499623',
    '2023-03-10 08:40:22',
    '2023-03-10 08:40:22'
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
    'dd523640-e977-4e00-971f-ce1eb0a467c8',
    'Create Kelas',
    'Super Admin',
    'Super Admin membuat kelas dengan Id Kelas : 12PPLG3',
    '2023-03-10 09:00:58',
    '2023-03-10 09:00:58'
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
    'fbd25bf7-54fc-4d51-a7ab-66712dda4f8c',
    'Update Data Siswa',
    'Super Admin',
    'Super Admin mengupdate data siswa dengan NIS : 3349521107',
    '2023-03-10 09:54:42',
    '2023-03-10 09:54:42'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
