/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: mapel_jurusan
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `mapel_jurusan` (
  `mapelJurusanId` varchar(50) NOT NULL,
  `MapelId` varchar(50) NOT NULL,
  `JurusanId` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`mapelJurusanId`),
  KEY `MapelId` (`MapelId`),
  KEY `JurusanId` (`JurusanId`),
  CONSTRAINT `mapel_jurusan_ibfk_1` FOREIGN KEY (`MapelId`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mapel_jurusan_ibfk_2` FOREIGN KEY (`JurusanId`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: mapel_jurusan
# ------------------------------------------------------------

INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_B.INDONESIA',
    'B.INDONESIA',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_B.INGGRIS',
    'B.INGGRIS',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_INFORMATIKA',
    'INFORMATIKA',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_IPAS',
    'IPAS',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_KEJURUAN',
    'KEJURUAN',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_MATEMATIKA',
    'MATEMATIKA',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_PAI',
    'PAI',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_PENJAS',
    'PENJAS',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_PPKN',
    'PPKN',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_SEJARAH',
    'SEJARAH',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL_SENIMUSIK',
    'SENIMUSIK',
    'PPLG-RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_B.INDONESIA',
    'B.INDONESIA',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_B.INGGRIS',
    'B.INGGRIS',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_B.JEPANG',
    'B.JEPANG',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_B.SUNDA',
    'B.SUNDA',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_BD',
    'BD',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_DDG',
    'DDG',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_FISIKA',
    'FISIKA',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_KIMIA',
    'KIMIA',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_KJD',
    'KJD',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_MATEMATIKA',
    'MATEMATIKA',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_PAI',
    'PAI',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_PBO',
    'PBO',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_PJOK',
    'PJOK',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_PKK',
    'PKK',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_PPKN',
    'PPKN',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_PPL',
    'PPL',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_PROGDAS',
    'PROGDAS',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_PWPB',
    'PWPB',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_SEJARAH',
    'SEJARAH',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_SENBUD',
    'SENBUD',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_SISKOM',
    'SISKOM',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel_jurusan` (
    `mapelJurusanId`,
    `MapelId`,
    `JurusanId`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL_SISKOMDIG',
    'SISKOMDIG',
    'RPL',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
