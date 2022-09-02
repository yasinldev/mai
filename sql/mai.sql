-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 01:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mai`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauthID` varchar(50) NOT NULL,
  `uname` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `banner` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `password` varchar(155) NOT NULL,
  `agent` text NOT NULL,
  `ip` text NOT NULL,
  `registerDate` text NOT NULL,
  `following` int(11) NOT NULL,
  `followers` int(11) NOT NULL,
  `postcount` int(11) NOT NULL,
  `unniq` varchar(150) NOT NULL,
  `repo` text NOT NULL,
  `perm` varchar(50) NOT NULL,
  `private` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauthID`, `uname`, `username`, `picture`, `banner`, `email`, `bio`, `password`, `agent`, `ip`, `registerDate`, `following`, `followers`, `postcount`, `unniq`, `repo`, `perm`, `private`) VALUES
(11, '0', 'example', 'example', 'https://bedavainternet.com.tr/wp-content/uploads/2022/05/Anime-PP-2022-%E2%80%93-Sosyal-Medya-Havali-Anime-Kiz-ve-Erkek-Fotograflar-69.jpg', '', 'qwe@gmail.com', '', '31knmk0ibEB449lDe8Z01w==', 'A51pAz/JFkV+565Ah6uZCStptokgGqYF/HxONM4t6wq723lUx7xj0uj9VkWL9RklCsNR0kDmA/SIr7cp2y5nHgQmdaVi4cRQVbIJj4EbJ9t6IgKZVHcqp8MFJLnVrEcaoyjX5I/lvPgF4KekGpYwZ4laXFB6zGYLU2aE+jH1YKE=', 'SkAnISmdanpl9EDdc+wgvg==', '08/29/2022 11:06:41 pm', 0, 0, 0, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
