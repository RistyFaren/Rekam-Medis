-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 02:41 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `id_poli` varchar(20) NOT NULL,
  `id_dokter` varchar(20) NOT NULL,
  `diagnosa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `id_pasien`, `id_poli`, `id_dokter`, `diagnosa`) VALUES
('RM-001', 'PS_001', 'PL-001', 'P001', 'Demam'),
('RM001', 'PS002', 'PL-002', 'P005', 'Demam'),
('RM002', 'PS003', 'PL-001', 'P001', 'Demam tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_datadiri`
--

CREATE TABLE `tbl_datadiri` (
  `id_pasien` varchar(20) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tgl_lahir` text NOT NULL,
  `umur` varchar(20) NOT NULL,
  `kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_datadiri`
--

INSERT INTO `tbl_datadiri` (`id_pasien`, `nama_pasien`, `tgl_lahir`, `umur`, `kelamin`, `alamat`, `no_telp`) VALUES
('PS001', 'Risty Farentina', '02/05/2002', '21', 'P', 'Jl. Buncitan', '089676432242'),
('PS002', 'Dimas Fajri', '07/09/2001', '22', 'L', 'Jl. Candi, Sidoarjo', '08354317289'),
('PS003', 'Bobby Suhendra', '23/06/2000', '23', 'L', 'Jl. Wonokromo', '08123451243'),
('PS004', 'Tri Asmiati', '06/04/1980', '43', 'P', 'Jl. Kendangsari', '08577723451'),
('PS005', 'Joko Anwar', '24/01/1979', '44', 'L', 'Jl. KedungAsem no 29', '08999933312'),
('PS006', 'Revalina Nabila', '20/10/2020', '3', 'P', 'Jl. Medayu Utara 45', '0897666542'),
('PS007', 'Gabriella', '08/02/2018', '5', 'P', 'Jl. Wonorejo selatan 04', '08765444312'),
('PS008', 'Lintang Ayu', '29/05/2002', '21', 'P', 'Perum Mandala Jaya  01', '08512344415'),
('PS009', 'Soeparno', '06/09/1960', '63', 'L', 'Griya Tawangalun', '08562221223'),
('PS010', 'Eko Jaya', '07/08/1970', '53', 'L', 'Jl. Banyumas', '08567774321'),
('PS011', 'Dendi Sumargo', '23/10/1985', '38', 'L', 'Jl. Tenggilis Mulya', '08145672881'),
('PS012', 'Anna Lestari', '26/08/1999', '24', 'P', 'Jl. Gununganyar Emas ', '08675432128'),
('PS013', 'Bambang Pamungkas', '22/07/2002', '21', 'L', 'Jl. Wonokromo selatan', '08976889867'),
('PS014', 'Ali Raharja', '15/02/2003', '20', 'L', 'Jl. Pakuwon City', '08765777875'),
('PS015', 'Sinta Natalia', '09/06/2003', '20', 'P', 'Perum Pabean', '08976654221'),
('PS016', 'Ririn Anggraini', '15/01/2002', '21', 'P', 'Jl. Siwalankerto', '08676432342'),
('PS017', 'Rochmawati', '22/03/2003', '20', 'P', 'Jl Brigjen katamso', '08981237621'),
('PS018', 'Nadiya Nur Rosyidah', '15/06/2003', '20', 'P', 'Jl Sawotratap', '08976234712'),
('PS019', 'Reynaldi Dwi ', '14/09/2003', '20', 'L', 'Jl. Waru permai', '08765423455'),
('PS020', 'Rina Nur Aini', '20/05/2002', '21', 'P', 'Jl. Wonokoyo', '08676544321');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `tgl_lahir` text NOT NULL,
  `kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `tgl_lahir`, `kelamin`, `alamat`, `no_telp`) VALUES
('P001', 'Imelda Audina', 'Anak', '01/08/2002', 'P', 'JL. Tengger Rejo Mulyo-I/24, Surabaya', '082264359459'),
('P002', 'dr. SARI MARINA, M.Biomed, Sp.M', 'Mata', '05/06/1979', 'P', 'Jl. Tegalsari', '08976567652'),
('P003', 'dr. I KETUT MUDANAYASA,Sp.S, MARS', 'Saraf', '14/06/1976', 'L', 'Jl. Singamaraja', '0857654321'),
('P004', 'Diah Mira Indramaya, dr., Sp.KK', 'Kulit ', '22/09/1985', 'P', 'Jl. A. Yani', '08976543678'),
('P005', 'Dr. Muhammad Ikhsan Chan ', 'Umum', '20/04/1988', 'L', 'Jl. Hayam Muruk', '0819871234'),
('P006', 'Christinari Ratih, drg., Sp.KGA.', 'Gigi & Mulut', '22/07/1968', 'P', 'Jl. Sedati Agung', '0834516789'),
('P007', 'Ari Baskoro, dr., Sp.PD-KAI', 'Jantung', '24/08/1980', 'L', 'Jl. Surabaya malang 01', '08198726532');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kunjungan`
--

CREATE TABLE `tbl_kunjungan` (
  `id_kunjungan` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `nama_pasien` varchar(50) DEFAULT NULL,
  `nama_poli` varchar(50) DEFAULT NULL,
  `tgl_janji` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kunjungan`
--

INSERT INTO `tbl_kunjungan` (`id_kunjungan`, `id_pasien`, `nama_pasien`, `nama_poli`, `tgl_janji`) VALUES
('K001', 'PS001', 'Risty Farentina', 'Umum', '13/06/2023'),
('K002', 'PS002', 'Dimas Fajri', 'Umum', '13/06/2023'),
('K003', 'PS003', 'Bobby Suhendra', 'Mata', '13/06/2023'),
('K004', 'PS004', 'Tri Asmiati', 'Saraf', '13/06/2023'),
('K005', 'PS005', 'Joko Anwar', 'Jantung', '13/06/2023'),
('K006', 'PS006', 'Revalina', 'Kulit', '13/06/2023'),
('K007', 'PS007', 'Gabriella', 'Gigi', '13/06/2023'),
('K008', 'PS008', 'Lintang', 'Anak', '13/06/2023'),
('K009', 'PS009', 'Soeparno', 'Saraf', '13/06/2023'),
('K010', 'PS010', 'Eko', 'Mata', '13/06/2023'),
('K011', 'PS011', 'Dendi', 'Gigi', '13/06/2023'),
('K012', 'PS012', 'Anna Lestari', 'Mata', '13/06/2023'),
('K013', 'PS013', 'Bambang Pamungkas', 'Jantung', '13/06/2023'),
('K014', 'PS013', 'Bambang Pamungkas', 'Saraf', '13/06/2023'),
('K015', 'PS014', 'Ali Raharja', 'Umum', '13/06/2023'),
('K016', 'PS016', 'Ririn Anggraini', 'Anak', '13/06/2023'),
('K017', 'PS017', 'Rochmawati', 'Mata', '13/06/2023'),
('K018', 'PS018', 'Nadiya Nur Rosyidah', 'Umum', '13/06/2023'),
('K019', 'PS019', 'Reynaldi Dwi ', 'Jantung', '13/06/2023'),
('K020', 'PS020', 'Rina Nur Aini', 'Umum', '13/06/2023'),
('K021', 'PS002', 'Dimas Fajri', 'Umum', '14/06/2023'),
('K022', 'PS015', 'Sinta Natalia', 'Kulit', '14/06/2023'),
('K023', 'PS007', 'Gabriella', 'Gigi', '14/06/2023'),
('K024', 'PS010', 'Eko Jaya', 'Umum', '14/06/2023'),
('K025', 'PS017', 'Rochmawati', 'Kulit', '14/06/2023'),
('K026', 'PS012', 'Anna Lestari', 'Umum', '16/06/2023'),
('K027', 'PS008', 'Lintang Ayu', 'Umum', '16/06/2023'),
('K028', 'PS018', 'Nadiya Nur Rosyidah', 'Kulit', '16/06/2023'),
('K029', 'PS002', 'Dimas Fajri', 'Mata', '16/06/2023');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga_obat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`id_obat`, `nama_obat`, `keterangan`, `harga_obat`) VALUES
('OB001', 'Panadol Biru', 'Demam', 7700),
('OB002', 'Paramex', 'Obat penurun panas', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poli`
--

CREATE TABLE `tbl_poli` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(100) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poli`
--

INSERT INTO `tbl_poli` (`id_poli`, `nama_poli`, `id_dokter`, `waktu`) VALUES
('PL-001', 'Anak', 'P001', '07:30 - 15:00'),
('PL-002', 'Umum', 'P005', '09.00-15.00'),
('PL-003', 'Mata', 'P002', '09.00-16.00'),
('PL-004', 'Saraf', 'P003', '08.00-15.00'),
('PL-005', 'Jantung', 'P007', '08.00-15.00'),
('PL-006', 'Gigi & Mulut', 'P006', '08.00-15.00'),
('PL-007', 'Kulit', 'P004', '07.30-16.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resepobat`
--

CREATE TABLE `tbl_resepobat` (
  `id_resep` varchar(20) NOT NULL,
  `id_pasien` varchar(20) NOT NULL,
  `id_obat` varchar(20) NOT NULL,
  `tgl_resep` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_obat` double NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_resepobat`
--

INSERT INTO `tbl_resepobat` (`id_resep`, `id_pasien`, `id_obat`, `tgl_resep`, `jumlah`, `harga_obat`, `sub_total`) VALUES
('INV001', 'PS001', 'OB001', '13/06/2023', 2, 7700, 15400),
('INV002', 'PS002', 'OB001', '16/06/2023', 3, 7700, 23100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`Username`, `password`) VALUES
('Risty', '0897'),
('Risty', '0897'),
('Risty', 'rstyfrn02'),
('Dimas', 'dmsfajri'),
('', ''),
('', ''),
('Bobby', 'bby123'),
('Fajri', '09871'),
('Dimas', 'Dms123'),
('Risty', 'rst45'),
('Risty', 'rst45'),
('Rsty', '0982'),
('Ahsan', 'ahsan123'),
('Suparno', 'parno123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`);

--
-- Indexes for table `tbl_datadiri`
--
ALTER TABLE `tbl_datadiri`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tbl_resepobat`
--
ALTER TABLE `tbl_resepobat`
  ADD PRIMARY KEY (`id_resep`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
