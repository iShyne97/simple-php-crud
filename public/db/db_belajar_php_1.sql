-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2025 pada 14.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_belajar_php_1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Brendan', '0987654321', 'brendan@gmail.com', 'Mathematics', 'assets/img/brendan.jpg', '2025-06-02 10:58:26', '2025-06-03 12:32:04'),
(7, 'Rasmus Lerdorf', '0987651234', 'rasmus@gmail.com', 'Systems Design Engineering', 'assets/img/rasmusler.jpg', '2025-06-03 11:38:54', '2025-06-03 12:32:18'),
(8, 'Elon Musk', '24534657467', 'elon@gmail.com', 'Physics', 'assets/img/elonmusk.jpg', '2025-06-03 11:41:04', '2025-06-03 12:29:51'),
(10, 'James Gosling', '8579696434', 'jamesgosling@gmail.com', 'Computer Science', 'assets/img/jamesgosling.jpg', '2025-06-03 12:07:09', NULL),
(11, 'Mark Zuckerberg', '24526457568', 'markzucker@gmail.com', 'Computer Science', 'assets/img/markzucker.jpg', '2025-06-03 12:28:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
