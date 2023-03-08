/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: mutasi
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `mutasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis_siswa` varchar(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L', 'P') DEFAULT NULL,
  `alasan_mutasi` varchar(255) DEFAULT NULL,
  `pindah_dari` varchar(255) DEFAULT NULL,
  `keluar_di_kelas` varchar(255) DEFAULT NULL,
  `pindah_ke` varchar(255) DEFAULT NULL,
  `diterima_di_kelas` varchar(255) DEFAULT NULL,
  `tgl_mutasi` date NOT NULL,
  `sk_mutasi` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nis_siswa` (`nis_siswa`),
  CONSTRAINT `mutasi_ibfk_1` FOREIGN KEY (`nis_siswa`) REFERENCES `siswa` (`nis_siswa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4;

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: mutasi
# ------------------------------------------------------------

INSERT INTO
  `mutasi` (
    `id`,
    `nis_siswa`,
    `nama_siswa`,
    `jenis_kelamin`,
    `alasan_mutasi`,
    `pindah_dari`,
    `keluar_di_kelas`,
    `pindah_ke`,
    `diterima_di_kelas`,
    `tgl_mutasi`,
    `sk_mutasi`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    1,
    '8624559215',
    'Aaron Schamberger',
    'P',
    '-',
    NULL,
    '10OTKP2',
    '-',
    NULL,
    '2022-09-09',
    '-',
    '2023-03-02 17:44:32',
    '2023-03-02 17:44:32'
  );
INSERT INTO
  `mutasi` (
    `id`,
    `nis_siswa`,
    `nama_siswa`,
    `jenis_kelamin`,
    `alasan_mutasi`,
    `pindah_dari`,
    `keluar_di_kelas`,
    `pindah_ke`,
    `diterima_di_kelas`,
    `tgl_mutasi`,
    `sk_mutasi`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    2,
    '3459668686',
    'Aaron Schuster',
    'P',
    'Pengen jadi cyborg :D',
    NULL,
    '10PPLG2',
    'SMK Muhajirin 2077',
    NULL,
    '2022-02-02',
    '-',
    '2023-03-02 17:51:31',
    '2023-03-02 17:51:31'
  );
INSERT INTO
  `mutasi` (
    `id`,
    `nis_siswa`,
    `nama_siswa`,
    `jenis_kelamin`,
    `alasan_mutasi`,
    `pindah_dari`,
    `keluar_di_kelas`,
    `pindah_ke`,
    `diterima_di_kelas`,
    `tgl_mutasi`,
    `sk_mutasi`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    3,
    '9952856516',
    'Abel Cummerata',
    'L',
    'Gatauw',
    'SMKN 10 Subang',
    NULL,
    NULL,
    '11TJKT2',
    '2022-09-09',
    'SK-9123ij12d',
    '2023-03-02 18:14:55',
    '2023-03-02 18:14:55'
  );

# ------------------------------------------------------------
# TRIGGER DUMP FOR: mutasi_keluar
# ------------------------------------------------------------

DROP TRIGGER IF EXISTS mutasi_keluar;
DELIMITER ;;
CREATE TRIGGER `mutasi_keluar` AFTER INSERT ON `mutasi` FOR EACH ROW UPDATE siswa
SET 
	`status_siswa` = "non-aktif",
    `tgl_meninggalkan_sekolah` = NEW.tgl_mutasi,
    `alasan_meninggalkan_sekolah` = NEW.alasan_mutasi
WHERE
	nis_siswa = NEW.nis_siswa
AND
	NEW.keluar_di_kelas IS NOT NULL
AND
	status_siswa = "aktif";;
DELIMITER ;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
