/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: jurusan
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `konsentrasi` varchar(100) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: jurusan
# ------------------------------------------------------------

INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'AKL-A',
    'AKL',
    'A',
    'Program keahlian Akuntansi dan Keuangan Lembaga dengan konsentrasi Akuntansi',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'AKL-LP',
    'AKL',
    'LP',
    'Program keahlian Akuntansi dan Keuangan Lembaga dengan konsentrasi Layanan Perbankan',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'AKL-LPS',
    'AKL',
    'LPS',
    'Program keahlian Akuntansi dan Keuangan Lembaga dengan konsentrasi Layanan Perbankan Syariah',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'BDP-BD',
    'BDP',
    'BD',
    'Program keahlian Bisnis Daring Pemasaran dengan konsentrasi Bisnis Digital',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'BM-DM',
    'BM',
    'DM',
    'Program keahlian Business Marketing dengan konsentrasi keahlian Digital Marketing',
    '2023-03-02 07:54:21',
    '2023-03-02 07:54:21'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'DKV',
    'DKV',
    '',
    'Program keahlian Desain Komunikasi Visual dengan konsentrasi Desain Komunikasi Visual',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'MLOG',
    'MLOG',
    '',
    'Program keahlian Manajemen Logistik dengan konsentrasi Manajemen Logistik',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'MM-DKV',
    'MM',
    'DKV',
    'Program keahlian Multimedia dengan konsentrasi Desain Komunikasi Visual',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'MPLB-MLOG',
    'MPLB',
    'MLOG',
    'Program keahlian Manajemen Perkantoran dan Layanan Bisnis dengan konsentrasi Manajemen Logistik',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'MPLB-MP',
    'MPLB',
    'MP',
    'Program keahlian Manajemen Perkantoran dan Layanan Bisnis dengan konsentrasi Manajemen Perkantoran',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'OTKP-MP',
    'OTKP',
    'MP',
    'Program keahlian Otomatisasi dan Tata Kelola Perkantoran dengan konsentrasi Manajemen Perkantoran',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PM-BD',
    'PM',
    'BD',
    'Program keahlian Pemasaran dengan konsentrasi Bisnis Digital',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PM-BR',
    'PM',
    'BR',
    'Program keahlian Pemasaran dengan konsentrasi Bisnis Retail',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-PG',
    'PPLG',
    'PG',
    'Program keahlian Pengembangan Perangkat Lunak dan Gim dengan konsentrasi Pengembangan Gim',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-RPL',
    'PPLG',
    'RPL',
    'Program keahlian Pengembangan Perangkat Lunak dan Gim dengan konsentrasi Rekayasa Perangkat Lunak',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'PPLG-SIJA',
    'PPLG',
    'SIJA',
    'Program keahlian Pengembangan Perangkat Lunak dan Gim dengan konsentrasi Sistem Informasi, Jaringan dan Aplikasi',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'RPL',
    'RPL',
    '',
    'Program keahlian Rekayasa Perangkat Lunak dengan konsentrasi Rekayasa Perangkat Lunak',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'SI-K',
    'SI',
    'K',
    'Sistem Informasi Komputer',
    '2023-03-01 11:20:40',
    '2023-03-01 11:20:40'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'TJKT-TJAT',
    'TJKT',
    'TJAT',
    'Program keahlian Teknik Jaringan Komputer dan Telekomunikasi dengan konsentrasi Teknik Jaringan Akses Telekomunikasi',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'TJKT-TKJ',
    'TJKT',
    'TKJ',
    'Program keahlian Teknik Jaringan Komputer dan Telekomunikasi dengan konsentrasi Teknik Komputer dan Jaringan',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'TJKT-TTT',
    'TJKT',
    'TTT',
    'Program keahlian Teknik Jaringan Komputer dan Telekomunikasi dengan konsentrasi Teknik Transmisi dan Telekomunikasi',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `jurusan` (
    `id`,
    `nama`,
    `konsentrasi`,
    `desc`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    'TKJ',
    'TKJ',
    '',
    'Program keahlian Teknik Komputer dan Jaringan dengan konsentrasi Teknik Komputer dan Jaringan',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
