--
-- Database: `new_saw2`
--
CREATE DATABASE IF NOT EXISTS `new_saw2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `new_saw2`;

-- --------------------------------------------------------

--
-- Table structure for table `analisa`
--

CREATE TABLE `analisa` (
  `id_analisa` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa`
--

INSERT INTO `analisa` (`id_analisa`, `id_pegawai`, `id_kriteria`, `nilai`) VALUES
(62, 1, 1, '46.50'),
(63, 1, 2, '6.10'),
(64, 1, 3, '10.00'),
(65, 1, 4, '9.50'),
(66, 1, 5, '10.00'),
(67, 1, 6, '10.00'),
(68, 2, 1, '50.00'),
(69, 2, 2, '10.00'),
(70, 2, 3, '6.90'),
(71, 2, 4, '10.00'),
(72, 2, 5, '6.70'),
(73, 2, 6, '9.50');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(30) DEFAULT NULL,
  `bobot` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `bobot`) VALUES
(1, 'Hasil Kinerja', '50'),
(2, 'Kedisiplinan', '10'),
(3, 'Kepribadian', '10'),
(4, 'Kreativitas', '10'),
(5, 'Keaktifan', '10'),
(6, 'Kepedulian', '10');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_pegawai`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, '65'),
(2, 1, 2, '55'),
(3, 1, 3, '72'),
(4, 1, 4, '90'),
(5, 1, 5, '75'),
(6, 1, 6, '60'),
(7, 2, 1, '70'),
(8, 2, 2, '90'),
(9, 2, 3, '50'),
(10, 2, 4, '95'),
(11, 2, 5, '50'),
(12, 2, 6, '57');

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi`
--

CREATE TABLE `normalisasi` (
  `id_normalisasi` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai_normalisasi` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `normalisasi`
--

INSERT INTO `normalisasi` (`id_normalisasi`, `id_pegawai`, `id_kriteria`, `nilai_normalisasi`) VALUES
(97, 1, 1, '0.93'),
(98, 1, 2, '0.61'),
(99, 1, 3, '1.00'),
(100, 1, 4, '0.95'),
(101, 1, 5, '1.00'),
(102, 1, 6, '1.00'),
(103, 2, 1, '1.00'),
(104, 2, 2, '1.00'),
(105, 2, 3, '0.69'),
(106, 2, 4, '1.00'),
(107, 2, 5, '0.67'),
(108, 2, 6, '0.95');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(15) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(40) DEFAULT NULL,
  `bagian` varchar(30) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `cabang` varchar(20) DEFAULT NULL,
  `tanggal_masuk` varchar(15) DEFAULT NULL,
  `nilai_analisa` varchar(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `jabatan`, `bagian`, `grade`, `cabang`, `tanggal_masuk`, `nilai_analisa`) VALUES
(1, '478573432', 'Drs. Bambang Setya Sudarmo', 'Kepala Divisi', 'Marketing', '6', 'Pusat', '2017-12-31', '92.1'),
(2, '6734734643', 'Faisal Heriyanto', 'Kepala Divisi', 'Funding', '6', 'Pusat', '2017-12-03', '93.1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa`
--
ALTER TABLE `analisa`
  ADD PRIMARY KEY (`id_analisa`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id_normalisasi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisa`
--
ALTER TABLE `analisa`
  MODIFY `id_analisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id_normalisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
