-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 09:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silt`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `catatan` text NOT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `location_in` varchar(255) DEFAULT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `location_out` varchar(255) DEFAULT NULL,
  `um` float DEFAULT NULL,
  `ut` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `nama`, `username`, `catatan`, `check_in`, `location_in`, `check_out`, `location_out`, `um`, `ut`) VALUES
(2, 'Sopyan Sauri', 'sopyan', '', '2022-04-03 15:18:46', '', '2022-04-15 15:48:21', 'Latitude: -6.9173248 Longitude: 107.610112', 12500, 5000),
(3, 'Sopyan Sauri', 'sopyan', '', '2022-04-04 15:36:27', '', '2022-04-15 15:48:21', 'Latitude: -6.9173248 Longitude: 107.610112', 12500, 5000),
(4, 'Sopyan Sauri', 'sopyan', '', '2022-04-05 14:37:27', '', '2022-04-15 15:48:21', 'Latitude: -6.9173248 Longitude: 107.610112', 12500, 5000),
(5, 'Sopyan Sauri', 'sopyan', '', '2022-04-06 21:31:16', '', '2022-04-15 15:48:21', 'Latitude: -6.9173248 Longitude: 107.610112', 12500, 5000),
(6, 'Sopyan Sauri', 'sopyan', '', '2022-04-14 09:22:23', '', '2022-04-15 15:48:21', 'Latitude: -6.9173248 Longitude: 107.610112', 12500, 5000),
(12, 'Sopyan Sauri', 'sopyan', '', '2022-04-15 15:47:58', '-6.9173248,107.610112', '2022-04-15 15:48:21', 'Latitude: -6.9173248 Longitude: 107.610112', 12500, 12500),
(13, 'Riju', 'riju', '', '2022-04-15 16:43:59', '-6.9173248,107.610112', '2022-04-15 16:44:01', '-6.9173248,107.610112', 12500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `divisi`) VALUES
(1, 'FHRD'),
(2, 'ICT'),
(3, 'Akademik'),
(4, 'CNP'),
(5, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan_makan`
--

CREATE TABLE `tunjangan_makan` (
  `id` int(11) NOT NULL,
  `uang_makan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tunjangan_makan`
--

INSERT INTO `tunjangan_makan` (`id`, `uang_makan`) VALUES
(1, 12500);

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan_transport`
--

CREATE TABLE `tunjangan_transport` (
  `id` int(11) NOT NULL,
  `uang_transport` float NOT NULL,
  `jam_absen` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tunjangan_transport`
--

INSERT INTO `tunjangan_transport` (`id`, `uang_transport`, `jam_absen`) VALUES
(1, 12500, '07:33:00'),
(2, 5000, '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `color1` varchar(7) NOT NULL DEFAULT '#083470',
  `color2` varchar(7) NOT NULL DEFAULT '#083470',
  `gradient` varchar(3) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fullname`, `level`, `foto`, `id_divisi`, `color1`, `color2`, `gradient`) VALUES
('200226003', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Yahya, SE.', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('200226006', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'H. Rudi Kurniawan, ST., MM.', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('200626036', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Rheda Adrian', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('200826047', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Arif Budiman, ST, M.Pd', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('200926056', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Ernawati, SE., M. M.', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('200926058', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Indri Fitrianasari, S. Kom', 'karyawan', 'user-img.jpg', 5, '#083470', '#083470', 'off'),
('200926059', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Aep Saepudin, S. Pd.I', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('201026062', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Sugianti Melawati, SE', 'hrd', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('201026063', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Rani Ligar Fitriani, M. Pd.', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('201026066', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Dendi Gunawan', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('201126068', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Andri Irawan', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('201126071', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'R. Asep Mucharam S, A.Md', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('201126072', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Ratna Sopiah, S. Ab', 'karyawan', 'user-img.jpg', 5, '#083470', '#083470', 'off'),
('201226083', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Muhamad Aripin, A.Md', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('201326085', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Untung Eko Setyasari, S. Sos, MA', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('201326087', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Yudi Kurniadi, S. Pd.', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('201326088', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Yovi Fernando, ST', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('201326091', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Yanti Fadila Wahab, S. Pd.', 'karyawan', 'user-img.jpg', 5, '#083470', '#083470', 'off'),
('201326095', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Ade Fuad Hasan , M.Kom', 'karyawan', 'user-img.jpg', 2, '#083470', '#083470', 'off'),
('201426097', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Bini Hasbiani, ST', 'karyawan', 'user-img.jpg', 4, '#083470', '#083470', 'off'),
('201426099', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Djoko Handoyo ', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('201426102', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Nurul Ahyar A.Md', 'karyawan', 'user-img.jpg', 5, '#083470', '#083470', 'off'),
('201526103', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Asep Dadan, SE.,MM', 'karyawan', 'user-img.jpg', 4, '#083470', '#083470', 'off'),
('201526106', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Rijal ', 'karyawan', 'user-img.jpg', 5, '#083470', '#083470', 'off'),
('201826117', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Roni Nugraha , SE', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('201926119', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Fara Novelya Anisa , SE', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('201926120', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Beni Suryadi Rahman, SE', 'karyawan', 'user-img.jpg', 5, '#083470', '#083470', 'off'),
('201926121', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Sopyan Sauri ', 'karyawan', 'user-img.jpg', 2, '#083470', '#083470', 'off'),
('201926123', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Adzka Rossa Sanjayyana, SE.,Ak.,M.Ak', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('201926124', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'M Fajar fadilah ', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('201926125', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Lerian ', 'karyawan', 'user-img.jpg', 5, '#083470', '#083470', 'off'),
('201926126', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'M Kamaludin ', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('202026127', '$2y$10$zUktwUigrwNYPvELzMgut.tk31y84P6G71YspSQA.iQf3f7RpMIt2', 'M Rijki Juhara', 'karyawan', 'user-img.jpg', 2, '#002f70', '#5583c3', 'on'),
('202026128', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Asep Manarul ', 'karyawan', 'user-img.jpg', 2, '#083470', '#083470', 'off'),
('202126129', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Kamaludi rigai', 'karyawan', 'user-img.jpg', 5, '#083470', '#083470', 'off'),
('202126130', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Santi Permatasari', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('202226132', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Nizma', 'karyawan', 'user-img.jpg', 5, '#083470', '#083470', 'off'),
('202226133', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Galih', 'karyawan', 'user-img.jpg', 5, '#083470', '#083470', 'off'),
('202226134', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Eggi Indriani Pratami, SE.,MM', 'karyawan', 'user-img.jpg', 3, '#083470', '#083470', 'off'),
('202226135', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Gina Shofa Kamila', 'karyawan', 'user-img.jpg', 4, '#083470', '#083470', 'off'),
('202226136', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Elfin yuliani', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'off'),
('202226137', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Monika Sutarsa, S.Ak.,MM', 'karyawan', '', 3, '#083470', '#083470', 'off'),
('202226138', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Nijar Kurnia Romdoni, SE.M.Ak.', 'karyawan', '', 3, '#083470', '#083470', 'off'),
('riju', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Riju', 'hrd', '1650071156379.jpg', 2, '#087241', '#b3ecac', 'on'),
('sopyan', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'Sopyan Sauri', 'karyawan', 'user-img.jpg', 2, '#083470', '#083470', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tunjangan_makan`
--
ALTER TABLE `tunjangan_makan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tunjangan_transport`
--
ALTER TABLE `tunjangan_transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tunjangan_makan`
--
ALTER TABLE `tunjangan_makan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tunjangan_transport`
--
ALTER TABLE `tunjangan_transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
