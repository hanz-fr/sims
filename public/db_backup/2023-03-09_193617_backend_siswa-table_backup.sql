/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# ------------------------------------------------------------
# SCHEMA DUMP FOR TABLE: siswa
# ------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis_siswa` varchar(10) NOT NULL,
  `KelasId` varchar(50) DEFAULT NULL,
  `nisn_siswa` varchar(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L', 'P') NOT NULL,
  `agama` varchar(255) NOT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `status` enum('AA', 'AK', 'AT') DEFAULT NULL,
  `alamat_siswa` varchar(255) NOT NULL,
  `email_siswa` varchar(255) DEFAULT NULL,
  `no_telp_siswa` varchar(20) NOT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `semester_diterima` int(11) DEFAULT NULL,
  `diterima_di_kelas` varchar(255) NOT NULL,
  `thn_ajaran` varchar(255) DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `status_siswa` enum('aktif', 'non-aktif') NOT NULL,
  `sekolah_asal` varchar(255) NOT NULL,
  `alamat_sekolah_asal` varchar(255) DEFAULT NULL,
  `thn_ijazah_smp` varchar(10) DEFAULT NULL,
  `no_ijazah_smp` varchar(255) DEFAULT NULL,
  `thn_skhun_smp` varchar(10) DEFAULT NULL,
  `no_skhun_smp` varchar(255) DEFAULT NULL,
  `tgl_meninggalkan_sekolah` date DEFAULT NULL,
  `alasan_meninggalkan_sekolah` varchar(255) DEFAULT NULL,
  `no_ijazah_smk` varchar(255) DEFAULT NULL,
  `tgl_ijazah_smk` date DEFAULT NULL,
  `keterangan_lain` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `lingkar_kepala` int(11) DEFAULT NULL,
  `golongan_darah` varchar(255) DEFAULT NULL,
  `isAlumni` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`nis_siswa`),
  UNIQUE KEY `id` (`id`),
  KEY `KelasId` (`KelasId`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`KelasId`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4;

# ------------------------------------------------------------
# DATA DUMP FOR TABLE: siswa
# ------------------------------------------------------------

INSERT INTO
  `siswa` (
    `id`,
    `nis_siswa`,
    `KelasId`,
    `nisn_siswa`,
    `nama_siswa`,
    `tmp_lahir`,
    `tgl_lahir`,
    `jenis_kelamin`,
    `agama`,
    `anak_ke`,
    `status`,
    `alamat_siswa`,
    `email_siswa`,
    `no_telp_siswa`,
    `tgl_diterima`,
    `semester_diterima`,
    `diterima_di_kelas`,
    `thn_ajaran`,
    `angkatan`,
    `status_siswa`,
    `sekolah_asal`,
    `alamat_sekolah_asal`,
    `thn_ijazah_smp`,
    `no_ijazah_smp`,
    `thn_skhun_smp`,
    `no_skhun_smp`,
    `tgl_meninggalkan_sekolah`,
    `alasan_meninggalkan_sekolah`,
    `no_ijazah_smk`,
    `tgl_ijazah_smk`,
    `keterangan_lain`,
    `foto`,
    `berat_badan`,
    `tinggi_badan`,
    `lingkar_kepala`,
    `golongan_darah`,
    `isAlumni`,
    `createdAt`,
    `updatedAt`
  )
VALUES
  (
    1,
    '0012930129',
    '10AKL1',
    '0012939123',
    'Kankei',
    '-',
    '2000-09-09',
    'L',
    '-',
    1,
    'AK',
    '-',
    NULL,
    '-',
    '2015-09-09',
    1,
    '10PPLG1',
    '-',
    2018,
    'aktif',
    '-',
    '-',
    '-',
    '-',
    '-',
    '-',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '',
    0,
    0,
    0,
    NULL,
    1,
    '2023-03-09 19:26:50',
    '2023-03-09 19:30:00'
  );

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
