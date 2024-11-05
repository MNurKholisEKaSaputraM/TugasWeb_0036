-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 05:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` char(13) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `email` varchar(150) NOT NULL,
  `foto` varchar(455) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `alamat`, `nohp`, `jenis_kelamin`, `email`, `foto`) VALUES
(1, 'Arianto', 'Menjangan Bojong Pekalongan', '085742014272', 'Laki-laki', '', ''),
(2, 'Maharani', 'Binagriya Pekalongan', '085742117500', 'Laki-laki', '', ''),
(3, 'Megantara Wati', 'Wiradesa', '081322456678', 'Laki-laki', '', ''),
(4, 'Panji Setya', 'Podosugih Pekalongan', '081322659901', 'Laki-laki', '', ''),
(5, 'Sulistyawati', 'Kajen Pekalongan', '088211883444', 'Laki-laki', '', ''),
(6, 'Tomas', 'Jakarta', '0856430112', 'Laki-laki', '', ''),
(7, 'Yani', 'Batang', '086588484', 'Laki-laki', '', ''),
(8, 'Lukman', 'Kerawang', '08657377332', 'Laki-laki', '', ''),
(12, 'Ari ', 'Menjangan Bojong', '085742014272', 'Laki-laki', '', ''),
(17, 'utraaa', 'Sampangan', '08826472584', 'Laki-laki', 'utraaa023@gmail.com', ''),
(18, 'putraaa', 'Sampangan', '088276578345', 'Laki-laki', 'utraaa022@gmail.com', 'utraaa.jpg'),
(19, 'Putra', 'Sampangan', '08276382657', 'Laki-laki', 'utraaa022@gmail.com', 'utraaaw.jpg'),
(20, 'utra', 'sampangan', '08657377332', 'Laki-laki', 'utraaa023@gmail.com', 'utraaaw.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
