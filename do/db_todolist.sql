-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2025 pada 07.56
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_todolist`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'work'),
(2, 'personal'),
(3, 'other');

-- --------------------------------------------------------

--
-- Struktur dari tabel `todo`
--

CREATE TABLE `todo` (
  `id_todo` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Pending','Done') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `is_favorite` tinyint(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `todo`
--

INSERT INTO `todo` (`id_todo`, `title`, `description`, `status`, `created_at`, `updated_at`, `id_user`, `id_category`, `is_favorite`) VALUES
(5, 'tht', 'aku\r\n', 'Done', '2025-12-16 01:35:13', '2025-12-17 06:38:20', 2, 3, 1),
(6, 'uutrewqwe', 'ergvdftgrcsd', 'Pending', '2025-12-16 01:35:22', '2025-12-17 06:38:14', 2, 2, 1),
(12, 'edqwqew', 'dfewde', 'Done', '2025-12-16 04:40:51', '2025-12-17 06:38:10', 2, 1, 0),
(16, 'ewwfeewr', 'ewrrewew', 'Pending', '2025-12-17 03:50:32', '2025-12-17 06:07:55', 2, 2, 1),
(17, 'wre', 'ewr4ew', 'Done', '2025-12-17 06:08:23', '2025-12-17 06:08:32', 3, 3, 1),
(18, 'etrew', 'rewre', 'Pending', '2025-12-17 06:08:29', '2025-12-17 06:08:29', 3, 1, 0),
(19, 'egtrt', 'rgr', 'Done', '2025-12-17 06:36:50', '2025-12-17 06:36:50', 2, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `email`, `birth_date`) VALUES
(2, 'aku', '871237bf25ba34556a2755fdf2f0ee44', 'aku', 'aku@gmail.com', '2025-12-15'),
(3, 'a', '80c9ef0fb86369cd25f90af27ef53a9e', 'a', 'a@gmail.com', '2025-12-08'),
(4, 'a', '80c9ef0fb86369cd25f90af27ef53a9e', 'a', 'a@gmail.com', '2025-12-07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id_todo`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `todo`
--
ALTER TABLE `todo`
  MODIFY `id_todo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `todo_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
