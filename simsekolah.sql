-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2019 at 11:22 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simsekolah`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_guru_mapel`
-- (See below for the actual view)
--
CREATE TABLE `detail_guru_mapel` (
`idgurumapel` varchar(255)
,`kodemapel` varchar(255)
,`mapel` varchar(255)
,`NIK` varchar(255)
,`Nama` varchar(255)
,`tahunmapel` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_kd`
-- (See below for the actual view)
--
CREATE TABLE `detail_kd` (
`idkd` varchar(255)
,`idmapel` varchar(255)
,`kdpengetahuan` varchar(255)
,`kdketerampilan` varchar(255)
,`mapel` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_siswa`
-- (See below for the actual view)
--
CREATE TABLE `detail_siswa` (
`NISN` varchar(255)
,`Nama` varchar(255)
,`idkelas` varchar(255)
,`kelas` varchar(255)
,`FlagMutasi` int(11)
,`NIPD` varchar(255)
,`JK` varchar(255)
,`TempatLahir` varchar(255)
,`TanggalLahir` date
,`Agama` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_wali_kelas`
-- (See below for the actual view)
--
CREATE TABLE `detail_wali_kelas` (
`idwalikelas` varchar(255)
,`idkelas` varchar(255)
,`kelas` varchar(255)
,`NIK` varchar(255)
,`Nama` varchar(255)
,`ketwalikelas` varchar(255)
,`tahun` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `iddetailpinjam`
--

CREATE TABLE `iddetailpinjam` (
  `iddetailpinjam` varchar(255) NOT NULL,
  `idbuku` varchar(255) DEFAULT NULL,
  `idpinjam` varchar(255) DEFAULT NULL,
  `statusdetailpinjam` int(11) DEFAULT '0',
  `tglkembali` datetime DEFAULT NULL,
  `ketkembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `idmutasi`
--

CREATE TABLE `idmutasi` (
  `idmutasi` varchar(255) NOT NULL,
  `idtahun` varchar(255) DEFAULT NULL,
  `idkelas` varchar(255) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `tglmutasi` date DEFAULT NULL,
  `statusmutasi` int(11) DEFAULT '0',
  `keteranganmutasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `idmutasi`
--

INSERT INTO `idmutasi` (`idmutasi`, `idtahun`, `idkelas`, `nisn`, `tglmutasi`, `statusmutasi`, `keteranganmutasi`) VALUES
('201910260211271', '20191016063954', '20191020104908', '12764871267', '2019-10-26', 0, ''),
('201910260211272', '20191016063954', '20191020104908', '4561346', '2019-10-26', 0, ''),
('201910260505551', '20191016063954', '20191020104949', '23472347', '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblbuku`
--

CREATE TABLE `tblbuku` (
  `idbuku` varchar(255) NOT NULL,
  `idklasifikasi` varchar(255) DEFAULT NULL,
  `idsubjek` varchar(255) DEFAULT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `tglpengadaan` datetime DEFAULT NULL,
  `GMD` varchar(255) DEFAULT NULL,
  `kolom` varchar(255) DEFAULT NULL,
  `ISBN` varchar(255) DEFAULT NULL,
  `Penerbit` varchar(255) DEFAULT NULL,
  `Tahunterbit` varchar(255) DEFAULT NULL,
  `kolasi` varchar(255) DEFAULT NULL,
  `kolomkolasi` varchar(255) DEFAULT NULL,
  `callnumber` varchar(255) DEFAULT NULL,
  `Bahasa` varchar(255) DEFAULT NULL,
  `kotaterbit` varchar(255) DEFAULT NULL,
  `kolomklasifikasi` varchar(255) DEFAULT NULL,
  `gambarsampul` varchar(255) DEFAULT NULL,
  `lokasifile` varchar(255) DEFAULT NULL,
  `kolomlokasi` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `itemkoleksi` varchar(255) DEFAULT NULL,
  `jumlahbuku` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblgrup`
--

CREATE TABLE `tblgrup` (
  `idgrup` varchar(255) NOT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `statusmenu` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblguru`
--

CREATE TABLE `tblguru` (
  `NIK` varchar(255) NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `NUPTK` varchar(255) DEFAULT NULL,
  `JK` varchar(255) DEFAULT NULL,
  `TempatLahir` varchar(255) DEFAULT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `NIP` varchar(255) DEFAULT NULL,
  `StatusKepegawaian` varchar(255) DEFAULT NULL,
  `JenisPTK` varchar(255) DEFAULT NULL,
  `Agama` varchar(255) DEFAULT NULL,
  `AlamatJalan` varchar(255) DEFAULT NULL,
  `RT` varchar(255) DEFAULT NULL,
  `RW` varchar(255) DEFAULT NULL,
  `NamaDusun` varchar(255) DEFAULT NULL,
  `DesaKelurahan` varchar(255) DEFAULT NULL,
  `Kecamatan` varchar(255) DEFAULT NULL,
  `KodePos` varchar(255) DEFAULT NULL,
  `Telepon` varchar(255) DEFAULT NULL,
  `HP` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `TugasTambahan` varchar(255) DEFAULT NULL,
  `SKCPNS` varchar(255) DEFAULT NULL,
  `TanggalCPNS` date DEFAULT NULL,
  `SKPengangkatan` varchar(255) DEFAULT NULL,
  `TMTPengangkatan` varchar(255) DEFAULT NULL,
  `LembagaPengangkatan` varchar(255) DEFAULT NULL,
  `PangkatGolongan` varchar(255) DEFAULT NULL,
  `SumberGaji` varchar(255) DEFAULT NULL,
  `NamaIbuKandung` varchar(255) DEFAULT NULL,
  `StatusPerkawinan` varchar(255) DEFAULT NULL,
  `NamaSuamiIstri` varchar(255) DEFAULT NULL,
  `NIPSuamiIstri` varchar(255) DEFAULT NULL,
  `PekerjaanSuamiIstri` varchar(255) DEFAULT NULL,
  `TMTPNS` varchar(255) DEFAULT NULL,
  `SudahLisensiKepalaSekolah` varchar(255) DEFAULT NULL,
  `PernahDiklatKepengawasan` varchar(255) DEFAULT NULL,
  `KeahlianBraille` varchar(255) DEFAULT NULL,
  `KeahlianBahasaIsyarat` varchar(255) DEFAULT NULL,
  `NPWP` varchar(255) DEFAULT NULL,
  `NamaWajibPajak` varchar(255) DEFAULT NULL,
  `Kewarganegaraan` varchar(255) DEFAULT NULL,
  `Bank` varchar(255) DEFAULT NULL,
  `NomorRekeningBank` varchar(255) DEFAULT NULL,
  `RekeningAtasNama` varchar(255) DEFAULT NULL,
  `KodeGuru` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblguru`
--

INSERT INTO `tblguru` (`NIK`, `Nama`, `NUPTK`, `JK`, `TempatLahir`, `TanggalLahir`, `NIP`, `StatusKepegawaian`, `JenisPTK`, `Agama`, `AlamatJalan`, `RT`, `RW`, `NamaDusun`, `DesaKelurahan`, `Kecamatan`, `KodePos`, `Telepon`, `HP`, `Email`, `TugasTambahan`, `SKCPNS`, `TanggalCPNS`, `SKPengangkatan`, `TMTPengangkatan`, `LembagaPengangkatan`, `PangkatGolongan`, `SumberGaji`, `NamaIbuKandung`, `StatusPerkawinan`, `NamaSuamiIstri`, `NIPSuamiIstri`, `PekerjaanSuamiIstri`, `TMTPNS`, `SudahLisensiKepalaSekolah`, `PernahDiklatKepengawasan`, `KeahlianBraille`, `KeahlianBahasaIsyarat`, `NPWP`, `NamaWajibPajak`, `Kewarganegaraan`, `Bank`, `NomorRekeningBank`, `RekeningAtasNama`, `KodeGuru`) VALUES
('23562346536', 'Pamungkas', '46234632655', 'L', 'Sidoarjo', '2019-09-16', '125435342653546', NULL, NULL, 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Siti', 'Sudah', 'Cantik', '1327497823', '-', NULL, 'Ya', 'Tidak', 'Tidak', 'Ya', NULL, NULL, NULL, NULL, NULL, NULL, '34278'),
('2891739173', 'Jimmy', NULL, 'P', 'Blitar', '2016-01-01', '28173987123', NULL, NULL, 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '213273'),
('423534563262356', 'Gofar', NULL, 'L', 'Gresik', '1994-10-19', '125265324632', NULL, NULL, 'Kristen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '283914');

-- --------------------------------------------------------

--
-- Table structure for table `tblgurumapel`
--

CREATE TABLE `tblgurumapel` (
  `idgurumapel` varchar(255) NOT NULL,
  `idmapel` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `tahunmapel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblgurumapel`
--

INSERT INTO `tblgurumapel` (`idgurumapel`, `idmapel`, `nik`, `tahunmapel`) VALUES
('20191018171936', '20191018171624', '23562346536', '2018'),
('20191018172023', '20191018171624', '423534563262356', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `tblidentitas`
--

CREATE TABLE `tblidentitas` (
  `NamaSekolah` varchar(255) NOT NULL,
  `NPSN` varchar(255) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabkota` varchar(255) DEFAULT NULL,
  `propinsi` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `kepalasekolah` varchar(255) DEFAULT NULL,
  `nipkepala` varchar(255) DEFAULT NULL,
  `persenkd` int(11) DEFAULT '0',
  `persenuts` int(11) DEFAULT '0',
  `persenuas` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblkd`
--

CREATE TABLE `tblkd` (
  `idkd` varchar(255) NOT NULL,
  `idmapel` varchar(255) DEFAULT NULL,
  `kdpengetahuan` varchar(255) DEFAULT NULL,
  `kdketerampilan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblkd`
--

INSERT INTO `tblkd` (`idkd`, `idmapel`, `kdpengetahuan`, `kdketerampilan`) VALUES
('20191026044435', '20191018164252', 'KD1', 'KD1'),
('20191026044436', '20191018164252', 'KD2', 'KD2'),
('20191026044437', '20191018164252', 'KD3', 'KD3'),
('20191026044438', '20191018164252', 'KD4', 'KD4'),
('20191026044439', '20191018164252', 'KD5', 'KD5');

-- --------------------------------------------------------

--
-- Table structure for table `tblkegiatan`
--

CREATE TABLE `tblkegiatan` (
  `idkegiatan` varchar(255) NOT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `ketkegiatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblkegiatansiswa`
--

CREATE TABLE `tblkegiatansiswa` (
  `idkegiatansiswa` varchar(255) NOT NULL,
  `idmutasi` varchar(255) DEFAULT NULL,
  `idkegiatan` varchar(255) DEFAULT NULL,
  `nilaikegiatan` int(11) DEFAULT '0',
  `semesterkegiatan` varchar(255) DEFAULT NULL,
  `predikatkegiatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblkelas`
--

CREATE TABLE `tblkelas` (
  `idkelas` varchar(255) NOT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `tingkat` int(11) DEFAULT '0',
  `ketkelas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblkelas`
--

INSERT INTO `tblkelas` (`idkelas`, `kelas`, `tingkat`, `ketkelas`) VALUES
('1', 'XII APK', 12, '---'),
('20191018030238', 'X APK', 10, 'awerwer'),
('20191020104908', 'XI APK', 11, 'asdasdas'),
('20191020104949', 'X RPL', 10, '-'),
('20191020104956', 'XI RPL', 11, '-'),
('20191020105002', 'XII RPL', 12, '-'),
('20191020132606', 'Alumni', 0, 'Alumni'),
('20191020132629', 'Pindah Sekolah', 0, 'Pindah Sekolah'),
('20191020132646', 'Mengundurkan Diri', 0, 'Mengundurkan Diri'),
('20191020132657', 'Dikeluarkan', 0, 'Dikeluarkan');

-- --------------------------------------------------------

--
-- Table structure for table `tblklasifikasi`
--

CREATE TABLE `tblklasifikasi` (
  `idklasifikasi` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblmapel`
--

CREATE TABLE `tblmapel` (
  `idmapel` varchar(255) NOT NULL,
  `kodemapel` varchar(255) DEFAULT NULL,
  `mapel` varchar(255) DEFAULT NULL,
  `kelompokmapel` varchar(255) DEFAULT NULL,
  `ketmapel` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT '0',
  `tahun` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmapel`
--

INSERT INTO `tblmapel` (`idmapel`, `kodemapel`, `mapel`, `kelompokmapel`, `ketmapel`, `urutan`, `tahun`) VALUES
('20191018164252', '6312', 'Matematika', 'B', 'D', 1, '2018-2019'),
('20191018171624', '3172', 'Fisika', 'ewtewq', 'sagsdgsdg', 3, ''),
('20191026024901', '1238', 'Bahasa Indonesia', 'C1', '-', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblnilaikd`
--

CREATE TABLE `tblnilaikd` (
  `idnilaikd` varchar(255) NOT NULL,
  `idmutasi` varchar(255) DEFAULT NULL,
  `semesterkd` varchar(255) DEFAULT NULL,
  `idkd` varchar(255) DEFAULT NULL,
  `ketkdpengetahuan` varchar(255) DEFAULT NULL,
  `ketkdketerampilan` varchar(255) DEFAULT NULL,
  `nilaikdpengetahuan` int(11) DEFAULT '0',
  `nilaikdketerampilan` int(11) DEFAULT '0',
  `sikap` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblnilaikd`
--

INSERT INTO `tblnilaikd` (`idnilaikd`, `idmutasi`, `semesterkd`, `idkd`, `ketkdpengetahuan`, `ketkdketerampilan`, `nilaikdpengetahuan`, `nilaikdketerampilan`, `sikap`) VALUES
('20191026044925', '201910260211271', '1', '20191026044435', NULL, NULL, 1, 6, NULL),
('20191026044926', '201910260211271', '1', '20191026044436', NULL, NULL, 2, 7, NULL),
('20191026044927', '201910260211271', '1', '20191026044437', NULL, NULL, 3, 8, NULL),
('20191026044928', '201910260211271', '1', '20191026044438', NULL, NULL, 4, 9, NULL),
('20191026044930', '201910260211271', '1', '20191026044439', NULL, NULL, 5, 10, NULL),
('20191026044931', '201910260211272', '1', '20191026044435', NULL, NULL, 11, 16, NULL),
('20191026044932', '201910260211272', '1', '20191026044436', NULL, NULL, 12, 17, NULL),
('20191026044933', '201910260211272', '1', '20191026044437', NULL, NULL, 13, 18, NULL),
('20191026044934', '201910260211272', '1', '20191026044438', NULL, NULL, 14, 19, NULL),
('20191026044935', '201910260211272', '1', '20191026044439', NULL, NULL, 15, 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblnilairaport`
--

CREATE TABLE `tblnilairaport` (
  `idraport` varchar(255) NOT NULL,
  `idmutasi` varchar(255) DEFAULT NULL,
  `idmapel` varchar(255) DEFAULT NULL,
  `semesterraport` varchar(255) DEFAULT NULL,
  `ratakd` varchar(255) DEFAULT NULL,
  `uts` varchar(255) DEFAULT NULL,
  `uas` varchar(255) DEFAULT NULL,
  `raport` varchar(255) DEFAULT NULL,
  `predikat` varchar(255) DEFAULT NULL,
  `sakit` varchar(255) DEFAULT NULL,
  `ijin` varchar(255) DEFAULT NULL,
  `alpa` varchar(255) DEFAULT NULL,
  `tanpaketerangan` varchar(255) DEFAULT NULL,
  `catatanwalikelas` varchar(255) DEFAULT NULL,
  `walikelas` varchar(255) DEFAULT NULL,
  `nipwalikelas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblnilairaport`
--

INSERT INTO `tblnilairaport` (`idraport`, `idmutasi`, `idmapel`, `semesterraport`, `ratakd`, `uts`, `uas`, `raport`, `predikat`, `sakit`, `ijin`, `alpa`, `tanpaketerangan`, `catatanwalikelas`, `walikelas`, `nipwalikelas`) VALUES
('20191026085110', '201910260211271', '20191018164252', '1', '5.50', '80', '85', NULL, NULL, '3', '2', '2', NULL, NULL, NULL, NULL),
('20191026085111', '201910260211272', '20191018164252', '1', '10.50', '85', '75', NULL, NULL, '2', '3', '2', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblperusahaan`
--

CREATE TABLE `tblperusahaan` (
  `idperusahaan` varchar(255) NOT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kontakperson` varchar(255) DEFAULT NULL,
  `telpperusahaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblpinjam`
--

CREATE TABLE `tblpinjam` (
  `idpinjam` varchar(255) NOT NULL,
  `idmutasi` varchar(255) DEFAULT NULL,
  `tglpinjam` datetime DEFAULT NULL,
  `statuspinjam` varchar(255) DEFAULT NULL,
  `ketpinjam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblprakerin`
--

CREATE TABLE `tblprakerin` (
  `idprakerin` varchar(255) NOT NULL,
  `idmutasi` varchar(255) DEFAULT NULL,
  `idperusahaan` varchar(255) DEFAULT NULL,
  `tglmulaiprakerin` varchar(255) DEFAULT NULL,
  `tglselesaiprakerin` varchar(255) DEFAULT NULL,
  `nilaiprakerin` varchar(255) DEFAULT NULL,
  `ketprakerin` varchar(255) DEFAULT NULL,
  `statusprakerin` int(11) DEFAULT '0',
  `lamaprakerin` int(11) DEFAULT '0',
  `lokasiprakerin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblsiswa`
--

CREATE TABLE `tblsiswa` (
  `NISN` varchar(255) NOT NULL,
  `idkelas` varchar(255) DEFAULT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `NIPD` varchar(255) DEFAULT NULL,
  `JK` varchar(255) DEFAULT NULL,
  `TempatLahir` varchar(255) DEFAULT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `NIK` varchar(255) DEFAULT NULL,
  `Agama` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `RT` varchar(255) DEFAULT NULL,
  `RW` varchar(255) DEFAULT NULL,
  `Dusun` varchar(255) DEFAULT NULL,
  `Kelurahan` varchar(255) DEFAULT NULL,
  `Kecamatan` varchar(255) DEFAULT NULL,
  `KodePos` varchar(255) DEFAULT NULL,
  `JenisTinggal` varchar(255) DEFAULT NULL,
  `AlatTransportasi` varchar(255) DEFAULT NULL,
  `Telepon` varchar(255) DEFAULT NULL,
  `HP` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SKHUN` varchar(255) DEFAULT NULL,
  `PenerimaKPS` varchar(255) DEFAULT NULL,
  `NoKPS` varchar(255) DEFAULT NULL,
  `AyahNama` varchar(255) DEFAULT NULL,
  `AyahTahunLahir` varchar(255) DEFAULT NULL,
  `AyahJenjangPendidikan` varchar(255) DEFAULT NULL,
  `AyahPekerjaan` varchar(255) DEFAULT NULL,
  `AyahPenghasilan` varchar(255) DEFAULT NULL,
  `AyahNIK` varchar(255) DEFAULT NULL,
  `IbuNama` varchar(255) DEFAULT NULL,
  `IbuTahunLahir` varchar(255) DEFAULT NULL,
  `IbuJenjangPendidikan` varchar(255) DEFAULT NULL,
  `IbuPekerjaan` varchar(255) DEFAULT NULL,
  `IbuPenghasilan` varchar(255) DEFAULT NULL,
  `IbuNIK` varchar(255) DEFAULT NULL,
  `WaliNama` varchar(255) DEFAULT NULL,
  `WaliTahunLahir` varchar(255) DEFAULT NULL,
  `WaliJenjangPendidikan` varchar(255) DEFAULT NULL,
  `WaliPekerjaan` varchar(255) DEFAULT NULL,
  `WaliPenghasilan` varchar(255) DEFAULT NULL,
  `WaliNIK` varchar(255) DEFAULT NULL,
  `NoPesertaUjianNasional` varchar(255) DEFAULT NULL,
  `NoSeriIjazah` varchar(255) DEFAULT NULL,
  `PenerimaKIP` varchar(255) DEFAULT NULL,
  `NomorKIP` varchar(255) DEFAULT NULL,
  `NamadiKIP` varchar(255) DEFAULT NULL,
  `NomorKKS` varchar(255) DEFAULT NULL,
  `NoRegistrasiAktaLahir` varchar(255) DEFAULT NULL,
  `Bank` varchar(255) DEFAULT NULL,
  `NomorRekeningBank` varchar(255) DEFAULT NULL,
  `RekeningAtasNama` varchar(255) DEFAULT NULL,
  `LayakPIP` varchar(255) DEFAULT NULL,
  `AlasanLayakPIP` varchar(255) DEFAULT NULL,
  `KebutuhanKhusus` varchar(255) DEFAULT NULL,
  `SekolahAsal` varchar(255) DEFAULT NULL,
  `Anakkeberapa` varchar(255) DEFAULT NULL,
  `Lintang` varchar(255) DEFAULT NULL,
  `Bujur` varchar(255) DEFAULT NULL,
  `NoKK` varchar(255) DEFAULT NULL,
  `BeratBadan` varchar(255) DEFAULT NULL,
  `TinggiBadan` varchar(255) DEFAULT NULL,
  `LingkarKepala` varchar(255) DEFAULT NULL,
  `JmlSaudara` varchar(255) DEFAULT NULL,
  `JarakRumah` varchar(255) DEFAULT NULL,
  `FlagMutasi` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsiswa`
--

INSERT INTO `tblsiswa` (`NISN`, `idkelas`, `Nama`, `NIPD`, `JK`, `TempatLahir`, `TanggalLahir`, `NIK`, `Agama`, `Alamat`, `RT`, `RW`, `Dusun`, `Kelurahan`, `Kecamatan`, `KodePos`, `JenisTinggal`, `AlatTransportasi`, `Telepon`, `HP`, `Email`, `SKHUN`, `PenerimaKPS`, `NoKPS`, `AyahNama`, `AyahTahunLahir`, `AyahJenjangPendidikan`, `AyahPekerjaan`, `AyahPenghasilan`, `AyahNIK`, `IbuNama`, `IbuTahunLahir`, `IbuJenjangPendidikan`, `IbuPekerjaan`, `IbuPenghasilan`, `IbuNIK`, `WaliNama`, `WaliTahunLahir`, `WaliJenjangPendidikan`, `WaliPekerjaan`, `WaliPenghasilan`, `WaliNIK`, `NoPesertaUjianNasional`, `NoSeriIjazah`, `PenerimaKIP`, `NomorKIP`, `NamadiKIP`, `NomorKKS`, `NoRegistrasiAktaLahir`, `Bank`, `NomorRekeningBank`, `RekeningAtasNama`, `LayakPIP`, `AlasanLayakPIP`, `KebutuhanKhusus`, `SekolahAsal`, `Anakkeberapa`, `Lintang`, `Bujur`, `NoKK`, `BeratBadan`, `TinggiBadan`, `LingkarKepala`, `JmlSaudara`, `JarakRumah`, `FlagMutasi`) VALUES
('12764871267', '20191020104908', 'Ilzam', '12321', 'L', 'Sidoarjo', '2019-10-09', NULL, 'Kong Hu Cu', NULL, NULL, NULL, NULL, NULL, 'Waru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tidak', '343215', 'A', NULL, NULL, NULL, NULL, NULL, 'B', NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tidak', '42342', 'Ilzam', '521353', NULL, 'Mandiri', '981272714971289', 'Ilzam', 'Tidak', 'fasfasdf', 'Tidak', NULL, '1', NULL, NULL, NULL, '60', '165', '30', '1', NULL, 0),
('23472347', '20191020104949', 'Indra', '821979814', 'L', 'Lamongan', '1998-01-01', NULL, 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('4561346', '20191020104908', 'Khafido', '46324635', 'L', 'Sidoarjo', '2016-05-15', NULL, 'Hindu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjek`
--

CREATE TABLE `tblsubjek` (
  `idsubjek` varchar(255) NOT NULL,
  `subjek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltahun`
--

CREATE TABLE `tbltahun` (
  `idtahun` varchar(255) NOT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltahun`
--

INSERT INTO `tbltahun` (`idtahun`, `tahun`, `status`) VALUES
('20191016063954', '2018-2019', 1),
('20191016064001', '2019-2020', 0),
('20191016122803', '2017-2018', 0),
('20191016123850', '2016-2017', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltugas`
--

CREATE TABLE `tbltugas` (
  `idtugas` varchar(255) NOT NULL,
  `tugas` varchar(255) DEFAULT NULL,
  `jumlahjam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltugastambahan`
--

CREATE TABLE `tbltugastambahan` (
  `idtugastambahan` varchar(255) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `idtugas` varchar(255) DEFAULT NULL,
  `jamtugas` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `iduser` varchar(255) NOT NULL,
  `idgrup` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `statususer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblwalikelas`
--

CREATE TABLE `tblwalikelas` (
  `idwalikelas` varchar(255) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `idkelas` varchar(255) DEFAULT NULL,
  `ketwalikelas` varchar(255) DEFAULT NULL,
  `tahun` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblwalikelas`
--

INSERT INTO `tblwalikelas` (`idwalikelas`, `nik`, `idkelas`, `ketwalikelas`, `tahun`) VALUES
('1', '423534563262356', '1', 'wefwetgwetwet', '2018'),
('20191018151936', '23562346536', '20191018030238', 'wetwtwertgg', '2019'),
('20191020140806', '23562346536', '20191020104949', '-', '2018-2019'),
('20191026015720', '23562346536', '20191020104956', 'x', '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer_copyright` text NOT NULL,
  `footer_address` text NOT NULL,
  `footer_email` text NOT NULL,
  `footer_phone` text NOT NULL,
  `footer_recent_news_item` varchar(5) NOT NULL,
  `footer_recent_portfolio_item` varchar(5) NOT NULL,
  `newsletter_text` text NOT NULL,
  `cta_text` text NOT NULL,
  `cta_button_url` varchar(255) NOT NULL,
  `cta_background` varchar(255) NOT NULL,
  `top_bar_email` varchar(255) NOT NULL,
  `top_bar_phone` varchar(255) NOT NULL,
  `send_email_from` varchar(255) NOT NULL,
  `receive_email_to` varchar(255) NOT NULL,
  `banner_about` varchar(255) NOT NULL,
  `banner_faq` varchar(255) NOT NULL,
  `banner_service` varchar(255) NOT NULL,
  `banner_testimonial` varchar(255) NOT NULL,
  `banner_news` varchar(255) NOT NULL,
  `banner_event` varchar(255) NOT NULL,
  `banner_contact` varchar(255) NOT NULL,
  `banner_search` varchar(255) NOT NULL,
  `banner_terms` varchar(255) NOT NULL,
  `banner_privacy` varchar(255) NOT NULL,
  `banner_team` varchar(255) NOT NULL,
  `banner_portfolio` varchar(255) NOT NULL,
  `banner_verify_subscriber` varchar(255) NOT NULL,
  `banner_pricing` varchar(255) NOT NULL,
  `banner_photo_gallery` varchar(255) NOT NULL,
  `front_end_color` varchar(20) NOT NULL,
  `sidebar_total_recent_post` varchar(5) NOT NULL,
  `sidebar_total_upcoming_event` varchar(5) NOT NULL,
  `sidebar_total_past_event` varchar(5) NOT NULL,
  `admin_login_heading` text NOT NULL,
  `language_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `logo`, `favicon`, `footer_copyright`, `footer_address`, `footer_email`, `footer_phone`, `footer_recent_news_item`, `footer_recent_portfolio_item`, `newsletter_text`, `cta_text`, `cta_button_url`, `cta_background`, `top_bar_email`, `top_bar_phone`, `send_email_from`, `receive_email_to`, `banner_about`, `banner_faq`, `banner_service`, `banner_testimonial`, `banner_news`, `banner_event`, `banner_contact`, `banner_search`, `banner_terms`, `banner_privacy`, `banner_team`, `banner_portfolio`, `banner_verify_subscriber`, `banner_pricing`, `banner_photo_gallery`, `front_end_color`, `sidebar_total_recent_post`, `sidebar_total_upcoming_event`, `sidebar_total_past_event`, `admin_login_heading`, `language_status`) VALUES
(1, 'logo.png', 'favicon.png', 'Copyright © 2019, multix. All Rights Reserved.', '3153 Foley Street\r\nMiami, FL 33176', 'sales@yourwebsite.com\r\nsupport@yourwebsite.com', 'Sales: 954-648-1802\r\nSupport: 963-612-1782', '4', '9', 'Detracto contentiones te est, brute ipsum consul an vis. Mea ei regione blandit ullamcorper, definiebas constituam vix ei.', 'Do you want to get our quality service for your business?', '#', 'cta_background.jpg', 'info@yourwebsite.com', '954-648-1802', 'contact@demosly.com', 'info@yourwebsite.com', 'banner_about.jpg', 'banner_faq.jpg', 'banner_service.jpg', 'banner_testimonial.jpg', 'banner_news.jpg', 'banner_event.jpg', 'banner_contact.jpg', 'banner_search.jpg', 'banner_terms.jpg', 'banner_privacy.jpg', 'banner_team.jpg', 'banner_portfolio.jpg', 'banner_verify_subscriber.jpg', 'banner_pricing.jpg', 'banner_photo_gallery.jpg', '3367C1', '3', '5', '5', 'SIM Sekolah- Admin Panel', 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `password`, `photo`, `token`, `role`, `status`) VALUES
(1, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user-.jpg', '5a9015567006d6afc894b004d393f910', 'Admin', 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_mutasi`
-- (See below for the actual view)
--
CREATE TABLE `view_mutasi` (
`idmutasi` varchar(255)
,`idtahun` varchar(255)
,`idkelas` varchar(255)
,`nisn` varchar(255)
,`tglmutasi` date
,`statusmutasi` int(11)
,`keteranganmutasi` varchar(255)
,`kelas` varchar(255)
,`tingkat` int(11)
,`ketkelas` varchar(255)
,`tahun` varchar(255)
,`status` int(11)
,`Nama` varchar(255)
,`NIPD` varchar(255)
,`JK` varchar(255)
,`TempatLahir` varchar(255)
,`TanggalLahir` date
,`NIK` varchar(255)
,`Agama` varchar(255)
,`Alamat` varchar(255)
,`RT` varchar(255)
,`RW` varchar(255)
,`Dusun` varchar(255)
,`Kelurahan` varchar(255)
,`Kecamatan` varchar(255)
,`KodePos` varchar(255)
,`JenisTinggal` varchar(255)
,`AlatTransportasi` varchar(255)
,`Telepon` varchar(255)
,`HP` varchar(255)
,`EMail` varchar(255)
,`SKHUN` varchar(255)
,`PenerimaKPS` varchar(255)
,`NoKPS` varchar(255)
,`AyahNama` varchar(255)
,`AyahTahunLahir` varchar(255)
,`AyahJenjangPendidikan` varchar(255)
,`AyahPekerjaan` varchar(255)
,`AyahPenghasilan` varchar(255)
,`AyahNIK` varchar(255)
,`IbuNama` varchar(255)
,`IbuTahunLahir` varchar(255)
,`IbuJenjangPendidikan` varchar(255)
,`IbuPekerjaan` varchar(255)
,`IbuPenghasilan` varchar(255)
,`IbuNIK` varchar(255)
,`WaliNama` varchar(255)
,`WaliTahunLahir` varchar(255)
,`WaliJenjangPendidikan` varchar(255)
,`WaliPekerjaan` varchar(255)
,`WaliPenghasilan` varchar(255)
,`WaliNIK` varchar(255)
,`NoPesertaUjianNasional` varchar(255)
,`NoSeriIjazah` varchar(255)
,`PenerimaKIP` varchar(255)
,`NomorKIP` varchar(255)
,`NamadiKIP` varchar(255)
,`NomorKKS` varchar(255)
,`NoRegistrasiAktaLahir` varchar(255)
,`Bank` varchar(255)
,`NomorRekeningBank` varchar(255)
,`RekeningAtasNama` varchar(255)
,`LayakPIP` varchar(255)
,`AlasanLayakPIP` varchar(255)
,`KebutuhanKhusus` varchar(255)
,`SekolahAsal` varchar(255)
,`Anakkeberapa` varchar(255)
,`Lintang` varchar(255)
,`Bujur` varchar(255)
,`NoKK` varchar(255)
,`BeratBadan` varchar(255)
,`TinggiBadan` varchar(255)
,`LingkarKepala` varchar(255)
,`JmlSaudara` varchar(255)
,`JarakRumah` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_nilaikd`
-- (See below for the actual view)
--
CREATE TABLE `view_nilaikd` (
`idnilaikd` varchar(255)
,`idmutasi` varchar(255)
,`semesterkd` varchar(255)
,`idkd` varchar(255)
,`ketkdpengetahuan` varchar(255)
,`ketkdketerampilan` varchar(255)
,`nilaikdpengetahuan` int(11)
,`nilaikdketerampilan` int(11)
,`sikap` varchar(255)
,`idmapel` varchar(255)
,`kdpengetahuan` varchar(255)
,`kdketerampilan` varchar(255)
,`kodemapel` varchar(255)
,`mapel` varchar(255)
,`kelompokmapel` varchar(255)
,`ketmapel` varchar(255)
,`urutan` int(11)
,`idtahun` varchar(255)
,`idkelas` varchar(255)
,`nisn` varchar(255)
,`tglmutasi` date
,`statusmutasi` int(11)
,`keteranganmutasi` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `detail_guru_mapel`
--
DROP TABLE IF EXISTS `detail_guru_mapel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_guru_mapel`  AS  select `m`.`idgurumapel` AS `idgurumapel`,`l`.`kodemapel` AS `kodemapel`,`l`.`mapel` AS `mapel`,`g`.`NIK` AS `NIK`,`g`.`Nama` AS `Nama`,`m`.`tahunmapel` AS `tahunmapel` from ((`tblgurumapel` `m` join `tblguru` `g` on((`m`.`nik` = `g`.`NIK`))) join `tblmapel` `l` on((`m`.`idmapel` = `l`.`idmapel`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_kd`
--
DROP TABLE IF EXISTS `detail_kd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_kd`  AS  select `k`.`idkd` AS `idkd`,`k`.`idmapel` AS `idmapel`,`k`.`kdpengetahuan` AS `kdpengetahuan`,`k`.`kdketerampilan` AS `kdketerampilan`,`m`.`mapel` AS `mapel` from (`tblkd` `k` join `tblmapel` `m`) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_siswa`
--
DROP TABLE IF EXISTS `detail_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_siswa`  AS  select `s`.`NISN` AS `NISN`,`s`.`Nama` AS `Nama`,`k`.`idkelas` AS `idkelas`,`k`.`kelas` AS `kelas`,`s`.`FlagMutasi` AS `FlagMutasi`,`s`.`NIPD` AS `NIPD`,`s`.`JK` AS `JK`,`s`.`TempatLahir` AS `TempatLahir`,`s`.`TanggalLahir` AS `TanggalLahir`,`s`.`Agama` AS `Agama` from (`tblsiswa` `s` join `tblkelas` `k` on((`s`.`idkelas` = `k`.`idkelas`))) ;

-- --------------------------------------------------------

--
-- Structure for view `detail_wali_kelas`
--
DROP TABLE IF EXISTS `detail_wali_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_wali_kelas`  AS  select `w`.`idwalikelas` AS `idwalikelas`,`k`.`idkelas` AS `idkelas`,`k`.`kelas` AS `kelas`,`g`.`NIK` AS `NIK`,`g`.`Nama` AS `Nama`,`w`.`ketwalikelas` AS `ketwalikelas`,`w`.`tahun` AS `tahun` from ((`tblwalikelas` `w` join `tblkelas` `k` on((`w`.`idkelas` = `k`.`idkelas`))) join `tblguru` `g` on((`w`.`nik` = `g`.`NIK`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_mutasi`
--
DROP TABLE IF EXISTS `view_mutasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mutasi`  AS  select `idmutasi`.`idmutasi` AS `idmutasi`,`idmutasi`.`idtahun` AS `idtahun`,`idmutasi`.`idkelas` AS `idkelas`,`idmutasi`.`nisn` AS `nisn`,`idmutasi`.`tglmutasi` AS `tglmutasi`,`idmutasi`.`statusmutasi` AS `statusmutasi`,`idmutasi`.`keteranganmutasi` AS `keteranganmutasi`,`tblkelas`.`kelas` AS `kelas`,`tblkelas`.`tingkat` AS `tingkat`,`tblkelas`.`ketkelas` AS `ketkelas`,`tbltahun`.`tahun` AS `tahun`,`tbltahun`.`status` AS `status`,`tblsiswa`.`Nama` AS `Nama`,`tblsiswa`.`NIPD` AS `NIPD`,`tblsiswa`.`JK` AS `JK`,`tblsiswa`.`TempatLahir` AS `TempatLahir`,`tblsiswa`.`TanggalLahir` AS `TanggalLahir`,`tblsiswa`.`NIK` AS `NIK`,`tblsiswa`.`Agama` AS `Agama`,`tblsiswa`.`Alamat` AS `Alamat`,`tblsiswa`.`RT` AS `RT`,`tblsiswa`.`RW` AS `RW`,`tblsiswa`.`Dusun` AS `Dusun`,`tblsiswa`.`Kelurahan` AS `Kelurahan`,`tblsiswa`.`Kecamatan` AS `Kecamatan`,`tblsiswa`.`KodePos` AS `KodePos`,`tblsiswa`.`JenisTinggal` AS `JenisTinggal`,`tblsiswa`.`AlatTransportasi` AS `AlatTransportasi`,`tblsiswa`.`Telepon` AS `Telepon`,`tblsiswa`.`HP` AS `HP`,`tblsiswa`.`Email` AS `EMail`,`tblsiswa`.`SKHUN` AS `SKHUN`,`tblsiswa`.`PenerimaKPS` AS `PenerimaKPS`,`tblsiswa`.`NoKPS` AS `NoKPS`,`tblsiswa`.`AyahNama` AS `AyahNama`,`tblsiswa`.`AyahTahunLahir` AS `AyahTahunLahir`,`tblsiswa`.`AyahJenjangPendidikan` AS `AyahJenjangPendidikan`,`tblsiswa`.`AyahPekerjaan` AS `AyahPekerjaan`,`tblsiswa`.`AyahPenghasilan` AS `AyahPenghasilan`,`tblsiswa`.`AyahNIK` AS `AyahNIK`,`tblsiswa`.`IbuNama` AS `IbuNama`,`tblsiswa`.`IbuTahunLahir` AS `IbuTahunLahir`,`tblsiswa`.`IbuJenjangPendidikan` AS `IbuJenjangPendidikan`,`tblsiswa`.`IbuPekerjaan` AS `IbuPekerjaan`,`tblsiswa`.`IbuPenghasilan` AS `IbuPenghasilan`,`tblsiswa`.`IbuNIK` AS `IbuNIK`,`tblsiswa`.`WaliNama` AS `WaliNama`,`tblsiswa`.`WaliTahunLahir` AS `WaliTahunLahir`,`tblsiswa`.`WaliJenjangPendidikan` AS `WaliJenjangPendidikan`,`tblsiswa`.`WaliPekerjaan` AS `WaliPekerjaan`,`tblsiswa`.`WaliPenghasilan` AS `WaliPenghasilan`,`tblsiswa`.`WaliNIK` AS `WaliNIK`,`tblsiswa`.`NoPesertaUjianNasional` AS `NoPesertaUjianNasional`,`tblsiswa`.`NoSeriIjazah` AS `NoSeriIjazah`,`tblsiswa`.`PenerimaKIP` AS `PenerimaKIP`,`tblsiswa`.`NomorKIP` AS `NomorKIP`,`tblsiswa`.`NamadiKIP` AS `NamadiKIP`,`tblsiswa`.`NomorKKS` AS `NomorKKS`,`tblsiswa`.`NoRegistrasiAktaLahir` AS `NoRegistrasiAktaLahir`,`tblsiswa`.`Bank` AS `Bank`,`tblsiswa`.`NomorRekeningBank` AS `NomorRekeningBank`,`tblsiswa`.`RekeningAtasNama` AS `RekeningAtasNama`,`tblsiswa`.`LayakPIP` AS `LayakPIP`,`tblsiswa`.`AlasanLayakPIP` AS `AlasanLayakPIP`,`tblsiswa`.`KebutuhanKhusus` AS `KebutuhanKhusus`,`tblsiswa`.`SekolahAsal` AS `SekolahAsal`,`tblsiswa`.`Anakkeberapa` AS `Anakkeberapa`,`tblsiswa`.`Lintang` AS `Lintang`,`tblsiswa`.`Bujur` AS `Bujur`,`tblsiswa`.`NoKK` AS `NoKK`,`tblsiswa`.`BeratBadan` AS `BeratBadan`,`tblsiswa`.`TinggiBadan` AS `TinggiBadan`,`tblsiswa`.`LingkarKepala` AS `LingkarKepala`,`tblsiswa`.`JmlSaudara` AS `JmlSaudara`,`tblsiswa`.`JarakRumah` AS `JarakRumah` from (`tblsiswa` join (`tbltahun` join (`tblkelas` join `idmutasi` on((`tblkelas`.`idkelas` = `idmutasi`.`idkelas`))) on((`tbltahun`.`idtahun` = `idmutasi`.`idtahun`))) on(((`tblkelas`.`idkelas` = `tblsiswa`.`idkelas`) and (`tblsiswa`.`NISN` = `idmutasi`.`nisn`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_nilaikd`
--
DROP TABLE IF EXISTS `view_nilaikd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nilaikd`  AS  select `tblnilaikd`.`idnilaikd` AS `idnilaikd`,`tblnilaikd`.`idmutasi` AS `idmutasi`,`tblnilaikd`.`semesterkd` AS `semesterkd`,`tblnilaikd`.`idkd` AS `idkd`,`tblnilaikd`.`ketkdpengetahuan` AS `ketkdpengetahuan`,`tblnilaikd`.`ketkdketerampilan` AS `ketkdketerampilan`,`tblnilaikd`.`nilaikdpengetahuan` AS `nilaikdpengetahuan`,`tblnilaikd`.`nilaikdketerampilan` AS `nilaikdketerampilan`,`tblnilaikd`.`sikap` AS `sikap`,`tblkd`.`idmapel` AS `idmapel`,`tblkd`.`kdpengetahuan` AS `kdpengetahuan`,`tblkd`.`kdketerampilan` AS `kdketerampilan`,`tblmapel`.`kodemapel` AS `kodemapel`,`tblmapel`.`mapel` AS `mapel`,`tblmapel`.`kelompokmapel` AS `kelompokmapel`,`tblmapel`.`ketmapel` AS `ketmapel`,`tblmapel`.`urutan` AS `urutan`,`idmutasi`.`idtahun` AS `idtahun`,`idmutasi`.`idkelas` AS `idkelas`,`idmutasi`.`nisn` AS `nisn`,`idmutasi`.`tglmutasi` AS `tglmutasi`,`idmutasi`.`statusmutasi` AS `statusmutasi`,`idmutasi`.`keteranganmutasi` AS `keteranganmutasi` from (`tblmapel` join ((`tblkd` join `tblnilaikd` on((`tblkd`.`idkd` = `tblnilaikd`.`idkd`))) join `idmutasi` on((`tblnilaikd`.`idmutasi` = `idmutasi`.`idmutasi`))) on((`tblmapel`.`idmapel` = `tblkd`.`idmapel`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iddetailpinjam`
--
ALTER TABLE `iddetailpinjam`
  ADD PRIMARY KEY (`iddetailpinjam`),
  ADD KEY `idbuku` (`idbuku`),
  ADD KEY `iddetailpinjam` (`iddetailpinjam`),
  ADD KEY `idpinjam` (`idpinjam`);

--
-- Indexes for table `idmutasi`
--
ALTER TABLE `idmutasi`
  ADD PRIMARY KEY (`idmutasi`),
  ADD KEY `idkelas` (`idkelas`),
  ADD KEY `idmutasi` (`idmutasi`),
  ADD KEY `idtahun` (`idtahun`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `tblbuku`
--
ALTER TABLE `tblbuku`
  ADD PRIMARY KEY (`idbuku`),
  ADD KEY `idbuku` (`idbuku`),
  ADD KEY `idklasifikasi` (`idklasifikasi`),
  ADD KEY `idsubjek` (`idsubjek`);

--
-- Indexes for table `tblgrup`
--
ALTER TABLE `tblgrup`
  ADD PRIMARY KEY (`idgrup`),
  ADD KEY `idgrup` (`idgrup`);

--
-- Indexes for table `tblguru`
--
ALTER TABLE `tblguru`
  ADD PRIMARY KEY (`NIK`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `tblgurumapel`
--
ALTER TABLE `tblgurumapel`
  ADD PRIMARY KEY (`idgurumapel`),
  ADD KEY `idgurumapel` (`idgurumapel`),
  ADD KEY `idmapel` (`idmapel`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tblidentitas`
--
ALTER TABLE `tblidentitas`
  ADD PRIMARY KEY (`NamaSekolah`);

--
-- Indexes for table `tblkd`
--
ALTER TABLE `tblkd`
  ADD PRIMARY KEY (`idkd`),
  ADD KEY `idkd` (`idkd`),
  ADD KEY `idmapel` (`idmapel`);

--
-- Indexes for table `tblkegiatan`
--
ALTER TABLE `tblkegiatan`
  ADD PRIMARY KEY (`idkegiatan`),
  ADD KEY `idkegiatan` (`idkegiatan`);

--
-- Indexes for table `tblkegiatansiswa`
--
ALTER TABLE `tblkegiatansiswa`
  ADD PRIMARY KEY (`idkegiatansiswa`),
  ADD KEY `idkegiatan` (`idkegiatan`),
  ADD KEY `idkegiatansiswa` (`idkegiatansiswa`),
  ADD KEY `idmutasi` (`idmutasi`);

--
-- Indexes for table `tblkelas`
--
ALTER TABLE `tblkelas`
  ADD PRIMARY KEY (`idkelas`),
  ADD KEY `idkelas` (`idkelas`);

--
-- Indexes for table `tblklasifikasi`
--
ALTER TABLE `tblklasifikasi`
  ADD PRIMARY KEY (`idklasifikasi`),
  ADD KEY `idklasifikasi` (`idklasifikasi`);

--
-- Indexes for table `tblmapel`
--
ALTER TABLE `tblmapel`
  ADD PRIMARY KEY (`idmapel`),
  ADD KEY `idmapel` (`idmapel`);

--
-- Indexes for table `tblnilaikd`
--
ALTER TABLE `tblnilaikd`
  ADD PRIMARY KEY (`idnilaikd`),
  ADD KEY `idkd` (`idkd`),
  ADD KEY `idmutasi` (`idmutasi`),
  ADD KEY `idnilaikd` (`idnilaikd`);

--
-- Indexes for table `tblnilairaport`
--
ALTER TABLE `tblnilairaport`
  ADD PRIMARY KEY (`idraport`),
  ADD KEY `idmapel` (`idmapel`),
  ADD KEY `idmutasi` (`idmutasi`),
  ADD KEY `idraport` (`idraport`);

--
-- Indexes for table `tblperusahaan`
--
ALTER TABLE `tblperusahaan`
  ADD PRIMARY KEY (`idperusahaan`),
  ADD KEY `idperusahaan` (`idperusahaan`);

--
-- Indexes for table `tblpinjam`
--
ALTER TABLE `tblpinjam`
  ADD PRIMARY KEY (`idpinjam`),
  ADD KEY `idmutasi` (`idmutasi`),
  ADD KEY `idpinjam` (`idpinjam`);

--
-- Indexes for table `tblprakerin`
--
ALTER TABLE `tblprakerin`
  ADD PRIMARY KEY (`idprakerin`),
  ADD KEY `idmutasi` (`idmutasi`),
  ADD KEY `idperusahaan` (`idperusahaan`),
  ADD KEY `idprakerin` (`idprakerin`);

--
-- Indexes for table `tblsiswa`
--
ALTER TABLE `tblsiswa`
  ADD PRIMARY KEY (`NISN`),
  ADD KEY `idkelas` (`idkelas`);

--
-- Indexes for table `tblsubjek`
--
ALTER TABLE `tblsubjek`
  ADD PRIMARY KEY (`idsubjek`),
  ADD KEY `idsubjek` (`idsubjek`);

--
-- Indexes for table `tbltahun`
--
ALTER TABLE `tbltahun`
  ADD PRIMARY KEY (`idtahun`),
  ADD KEY `idtahun` (`idtahun`);

--
-- Indexes for table `tbltugas`
--
ALTER TABLE `tbltugas`
  ADD PRIMARY KEY (`idtugas`),
  ADD KEY `idtugas` (`idtugas`);

--
-- Indexes for table `tbltugastambahan`
--
ALTER TABLE `tbltugastambahan`
  ADD PRIMARY KEY (`idtugastambahan`),
  ADD KEY `idtugastambahan` (`idtugastambahan`),
  ADD KEY `idtugas` (`idtugas`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `idgrup` (`idgrup`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tblwalikelas`
--
ALTER TABLE `tblwalikelas`
  ADD PRIMARY KEY (`idwalikelas`),
  ADD KEY `idkelas` (`idkelas`),
  ADD KEY `idwalikelas` (`idwalikelas`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iddetailpinjam`
--
ALTER TABLE `iddetailpinjam`
  ADD CONSTRAINT `iddetailpinjam_ibfk_2` FOREIGN KEY (`idbuku`) REFERENCES `tblbuku` (`idbuku`) ON UPDATE CASCADE,
  ADD CONSTRAINT `iddetailpinjam_ibfk_3` FOREIGN KEY (`idpinjam`) REFERENCES `tblpinjam` (`idpinjam`) ON UPDATE CASCADE;

--
-- Constraints for table `idmutasi`
--
ALTER TABLE `idmutasi`
  ADD CONSTRAINT `idmutasi_ibfk_1` FOREIGN KEY (`idtahun`) REFERENCES `tbltahun` (`idtahun`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idmutasi_ibfk_2` FOREIGN KEY (`idkelas`) REFERENCES `tblkelas` (`idkelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idmutasi_ibfk_3` FOREIGN KEY (`nisn`) REFERENCES `tblsiswa` (`NISN`);

--
-- Constraints for table `tblbuku`
--
ALTER TABLE `tblbuku`
  ADD CONSTRAINT `tblbuku_ibfk_1` FOREIGN KEY (`idsubjek`) REFERENCES `tblsubjek` (`idsubjek`);

--
-- Constraints for table `tblgurumapel`
--
ALTER TABLE `tblgurumapel`
  ADD CONSTRAINT `tblgurumapel_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tblguru` (`NIK`),
  ADD CONSTRAINT `tblgurumapel_ibfk_2` FOREIGN KEY (`idmapel`) REFERENCES `tblmapel` (`idmapel`) ON UPDATE CASCADE;

--
-- Constraints for table `tblkd`
--
ALTER TABLE `tblkd`
  ADD CONSTRAINT `tblkd_ibfk_1` FOREIGN KEY (`idmapel`) REFERENCES `tblmapel` (`idmapel`) ON UPDATE CASCADE;

--
-- Constraints for table `tblkegiatansiswa`
--
ALTER TABLE `tblkegiatansiswa`
  ADD CONSTRAINT `tblkegiatansiswa_ibfk_1` FOREIGN KEY (`idmutasi`) REFERENCES `idmutasi` (`idmutasi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblkegiatansiswa_ibfk_2` FOREIGN KEY (`idkegiatan`) REFERENCES `tblkegiatan` (`idkegiatan`) ON UPDATE CASCADE;

--
-- Constraints for table `tblnilaikd`
--
ALTER TABLE `tblnilaikd`
  ADD CONSTRAINT `tblnilaikd_ibfk_1` FOREIGN KEY (`idkd`) REFERENCES `tblkd` (`idkd`) ON UPDATE CASCADE;

--
-- Constraints for table `tblnilairaport`
--
ALTER TABLE `tblnilairaport`
  ADD CONSTRAINT `tblnilairaport_ibfk_1` FOREIGN KEY (`idmutasi`) REFERENCES `idmutasi` (`idmutasi`) ON UPDATE CASCADE;

--
-- Constraints for table `tblpinjam`
--
ALTER TABLE `tblpinjam`
  ADD CONSTRAINT `tblpinjam_ibfk_1` FOREIGN KEY (`idmutasi`) REFERENCES `idmutasi` (`idmutasi`) ON UPDATE CASCADE;

--
-- Constraints for table `tblprakerin`
--
ALTER TABLE `tblprakerin`
  ADD CONSTRAINT `tblprakerin_ibfk_1` FOREIGN KEY (`idmutasi`) REFERENCES `idmutasi` (`idmutasi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblprakerin_ibfk_2` FOREIGN KEY (`idperusahaan`) REFERENCES `tblperusahaan` (`idperusahaan`) ON UPDATE CASCADE;

--
-- Constraints for table `tbltugastambahan`
--
ALTER TABLE `tbltugastambahan`
  ADD CONSTRAINT `tbltugastambahan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tblguru` (`NIK`),
  ADD CONSTRAINT `tbltugastambahan_ibfk_2` FOREIGN KEY (`idtugas`) REFERENCES `tbltugas` (`idtugas`) ON UPDATE CASCADE;

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tblguru` (`NIK`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbluser_ibfk_2` FOREIGN KEY (`idgrup`) REFERENCES `tblgrup` (`idgrup`) ON UPDATE CASCADE;

--
-- Constraints for table `tblwalikelas`
--
ALTER TABLE `tblwalikelas`
  ADD CONSTRAINT `tblwalikelas_ibfk_1` FOREIGN KEY (`idkelas`) REFERENCES `tblkelas` (`idkelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblwalikelas_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tblguru` (`NIK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
