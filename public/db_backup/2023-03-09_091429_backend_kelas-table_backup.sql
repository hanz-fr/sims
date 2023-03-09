/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: kelas
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `kelas` (
  `id` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `rombel` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `JurusanId` varchar(50) NOT NULL,
  `walikelas` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `JurusanId` (`JurusanId`),
  CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`JurusanId`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: kelas
# ------------------------------------------------------------

INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10AKL1',
    '10',
    '1',
    'AKL',
    'AKL-A',
    '0000000022',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10AKL2',
    '10',
    '2',
    'AKL',
    'AKL-A',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10AKL4',
    '10',
    '4',
    'AKL',
    'AKL-A',
    NULL,
    '2023-02-27 22:08:45',
    '2023-02-27 22:08:45'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10AKL5',
    '10',
    '5',
    'AKL',
    'AKL-A',
    NULL,
    '2023-02-27 22:20:40',
    '2023-02-27 22:20:40'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10BDP1',
    '10',
    '1',
    'BDP',
    'BDP-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10BDP2',
    '10',
    '2',
    'BDP',
    'BDP-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10DKV1',
    '10',
    '1',
    'DKV',
    'DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10DKV2',
    '10',
    '2',
    'DKV',
    'DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10MLOG1',
    '10',
    '1',
    'MLOG',
    'MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10MLOG2',
    '10',
    '2',
    'MLOG',
    'MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10MM1',
    '10',
    '1',
    'MM',
    'MM-DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10MM2',
    '10',
    '2',
    'MM',
    'MM-DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10MPLB1',
    '10',
    '1',
    'MPLB',
    'MPLB-MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10MPLB2',
    '10',
    '2',
    'MPLB',
    'MPLB-MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10OTKP1',
    '10',
    '1',
    'OTKP',
    'OTKP-MP',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10OTKP2',
    '10',
    '2',
    'OTKP',
    'OTKP-MP',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10PM1',
    '10',
    '1',
    'PM',
    'PM-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10PM2',
    '10',
    '2',
    'PM',
    'PM-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10PPLG1',
    '10',
    '1',
    'PPLG',
    'PPLG-RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10PPLG2',
    '10',
    '2',
    'PPLG',
    'PPLG-RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10RPL1',
    '10',
    '1',
    'RPL',
    'RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10RPL2',
    '10',
    '2',
    'RPL',
    'RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10RPL3',
    '10',
    '3',
    'RPL',
    'RPL',
    NULL,
    '2023-02-27 22:03:44',
    '2023-02-27 22:03:44'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10TJKT1',
    '10',
    '1',
    'TJKT',
    'TJKT-TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10TJKT2',
    '10',
    '2',
    'TJKT',
    'TJKT-TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10TJKT3',
    '10',
    '3',
    'TJKT',
    'TJKT-TKJ',
    NULL,
    '2023-02-27 21:38:00',
    '2023-02-27 21:38:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10TKJ1',
    '10',
    '1',
    'TKJ',
    'TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '10TKJ2',
    '10',
    '2',
    'TKJ',
    'TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11AKL1',
    '11',
    '1',
    'AKL',
    'AKL-A',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11AKL2',
    '11',
    '2',
    'AKL',
    'AKL-A',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11BDP1',
    '11',
    '1',
    'BDP',
    'BDP-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11BDP2',
    '11',
    '2',
    'BDP',
    'BDP-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11DKV1',
    '11',
    '1',
    'DKV',
    'DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11DKV2',
    '11',
    '2',
    'DKV',
    'DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11MLOG1',
    '11',
    '1',
    'MLOG',
    'MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11MLOG2',
    '11',
    '2',
    'MLOG',
    'MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11MM1',
    '11',
    '1',
    'MM',
    'MM-DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11MM2',
    '11',
    '2',
    'MM',
    'MM-DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11MPLB1',
    '11',
    '1',
    'MPLB',
    'MPLB-MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11MPLB2',
    '11',
    '2',
    'MPLB',
    'MPLB-MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11OTKP1',
    '11',
    '1',
    'OTKP',
    'OTKP-MP',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11OTKP2',
    '11',
    '2',
    'OTKP',
    'OTKP-MP',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11PM1',
    '11',
    '1',
    'PM',
    'PM-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11PM2',
    '11',
    '2',
    'PM',
    'PM-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11PPLG1',
    '11',
    '1',
    'PPLG',
    'PPLG-RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11PPLG2',
    '11',
    '2',
    'PPLG',
    'PPLG-RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11RPL1',
    '11',
    '1',
    'RPL',
    'RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11RPL2',
    '11',
    '2',
    'RPL',
    'RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11TJKT1',
    '11',
    '1',
    'TJKT',
    'TJKT-TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11TJKT2',
    '11',
    '2',
    'TJKT',
    'TJKT-TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11TKJ1',
    '11',
    '1',
    'TKJ',
    'TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '11TKJ2',
    '11',
    '2',
    'TKJ',
    'TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12AKL1',
    '12',
    '1',
    'AKL',
    'AKL-A',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12AKL2',
    '12',
    '2',
    'AKL',
    'AKL-A',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12BDP1',
    '12',
    '1',
    'BDP',
    'BDP-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12BDP2',
    '12',
    '2',
    'BDP',
    'BDP-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12DKV1',
    '12',
    '1',
    'DKV',
    'DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12DKV2',
    '12',
    '2',
    'DKV',
    'DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12MLOG1',
    '12',
    '1',
    'MLOG',
    'MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12MLOG2',
    '12',
    '2',
    'MLOG',
    'MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12MM1',
    '12',
    '1',
    'MM',
    'MM-DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12MM2',
    '12',
    '2',
    'MM',
    'MM-DKV',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12MPLB1',
    '12',
    '1',
    'MPLB',
    'MPLB-MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12MPLB2',
    '12',
    '2',
    'MPLB',
    'MPLB-MLOG',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12OTKP1',
    '12',
    '1',
    'OTKP',
    'OTKP-MP',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12OTKP2',
    '12',
    '2',
    'OTKP',
    'OTKP-MP',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12PM1',
    '12',
    '1',
    'PM',
    'PM-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12PM2',
    '12',
    '2',
    'PM',
    'PM-BD',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12PPLG1',
    '12',
    '1',
    'PPLG',
    'PPLG-RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12PPLG2',
    '12',
    '2',
    'PPLG',
    'PPLG-RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12RPL1',
    '12',
    '1',
    'RPL',
    'RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12RPL2',
    '12',
    '2',
    'RPL',
    'RPL',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12TJKT1',
    '12',
    '1',
    'TJKT',
    'TJKT-TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12TJKT2',
    '12',
    '2',
    'TJKT',
    'TJKT-TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12TKJ1',
    '12',
    '1',
    'TKJ',
    'TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `kelas` (
    `id`,
    `kelas`,
    `rombel`,
    `jurusan`,
    `JurusanId`,
    `walikelas`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    '12TKJ2',
    '12',
    '2',
    'TKJ',
    'TKJ',
    NULL,
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
