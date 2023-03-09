/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: raport
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `raport` (
  `id` varchar(255) NOT NULL,
  `nis_siswa` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `thn_ajaran` int(11) NOT NULL,
  `sakit` int(11) DEFAULT NULL,
  `ijin` int(11) DEFAULT NULL,
  `alpa` int(11) DEFAULT NULL,
  `isNaik` tinyint(1) DEFAULT NULL,
  `naikKelas` varchar(10) DEFAULT NULL,
  `tinggal_di_Kelas` varchar(10) DEFAULT NULL,
  `alasan_tidak_naik` varchar(255) DEFAULT NULL,
  `tgl_kenaikan` date DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nis_siswa` (`nis_siswa`),
  CONSTRAINT `raport_ibfk_1` FOREIGN KEY (`nis_siswa`) REFERENCES `siswa` (`nis_siswa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: raport
# ------------------------------------------------------------


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
