/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: mapel
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `mapel` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: mapel
# ------------------------------------------------------------

INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'B.INDONESIA',
    'Bahasa Indonesia',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'B.INGGRIS',
    'Bahasa Inggris',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'B.JEPANG',
    'Bahasa Jepang',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'B.MANDARIN',
    'Bahasa Mandarin',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'B.SUNDA',
    'Bahasa Mandarin',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'BD',
    'Basis Data',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'DDG',
    'Dasar Desain Grafis',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'FISIKA',
    'Fisika',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'INFORMATIKA',
    'Informatika',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'IPAS',
    'Project Ilmu Pengetahuan Alam dan Sosial',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'KEJURUAN',
    '?',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'KIMIA',
    'Kimia',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'KJD',
    'Komputer dan Jaringan Dasar',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'MAT-MINAT',
    'Matematika Minat',
    '2023-03-09 19:57:25',
    '2023-03-09 19:57:25'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'MATEMATIKA',
    'Matematika',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'PAI',
    'Pendidikan Agama Islam',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'PBO',
    'Pemrograman Berorientasi Objek',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'PENJAS',
    'Pendidikan Jasmani',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'PJOK',
    'Pendidikan Jasmani dan Rohani Kesehatan',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'PKK',
    'Produk Kreatif dan Kewirausahaan',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'PPKN',
    'Pendidikan Pancasila dan Kewarganegaraan',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'PPL',
    'Pemodelan Perangkat Lunak',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'PROGDAS',
    'Pemrograman Dasar',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'PWPB',
    'Pemrograman Web dan Perangkat Bergerak',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'SEJARAH',
    'Sejarah',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'SENBUD',
    'Seni Budaya',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'SENIMUSIK',
    'Seni Musik',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'SISKOM',
    'Sistem Komputer',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );
INSERT INTO
  `mapel` (`id`, `nama`, `createdAt`, `updatedAt`)
VALUES
  (
    'SISKOMDIG',
    'Simulasi dan Komunikasi Digital',
    '0000-00-00 00:00:00',
    '0000-00-00 00:00:00'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
