-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 05:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `republish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `category`, `republish`) VALUES
(1, 'The Pilgrim\'s Progress', 'John Bunyan', 'Novel', 4),
(2, 'Midaq Alley', 'Naguib Mahfouz', 'Fictional', 1),
(3, 'Journey to the Alcarria: Travels Through the Spanish Countryside', 'Camilo José Cela', 'Non-fiction', 7),
(4, 'The Crime of Father Amaro', 'Eça de Queirós', 'Romance', 2),
(5, 'To Kill a Mockingbird', 'Harper Lee', 'Historical', 3),
(6, 'Melmoth the Wanderer', 'Charles Robert Maturin', 'Novel', 6),
(7, 'Cry, the Beloved Country', 'Alan Paton', 'Political', 2),
(8, 'Promise at Dawn', 'Romain Gary', 'Romance', 1),
(9, 'Persuasion', 'Jane Austen', 'Novel', 3),
(10, 'Story of the Eye', 'Georges Bataille', 'Adult', 8);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230303014722', '2023-03-03 02:48:09', 801),
('DoctrineMigrations\\Version20230303024150', '2023-03-03 03:41:57', 70),
('DoctrineMigrations\\Version20230303025009', '2023-03-03 03:50:14', 192),
('DoctrineMigrations\\Version20230303031008', '2023-03-03 04:10:14', 153);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `phone_num`, `email`, `birth_date`) VALUES
(1, 'ribbontroubling', '12345678', '(848)37923707', 'haidang84@hotmail.com', '2005-11-27'),
(2, 'southerngolden', '12345678', '(848)39605209', 'duymy.dinh97@yahoo.com', '2005-07-21'),
(3, 'injurychance', '12345678', '(844)38243564', 'luongthien.tran11@gmail.com', '2005-11-27'),
(4, 'simplisticparent', '12345678', '(848)38940662', 'viendong.truong@gmail.com', '1986-05-17'),
(5, 'trainedput', '12345678', '(848)38420541', 'kieumy_lam21@yahoo.com', '1995-05-08'),
(6, 'wheneverbadelynge', '12345678', '(844)37199267', 'quanglinh92@yahoo.com', '2000-10-10'),
(7, 'globaldamaged', '12345678', '(848)38943785', 'dinhphu59@yahoo.com', '1999-12-03'),
(8, 'cotermine', '12345678', '08.39.163.120', 'hanlam43@gmail.com', '1984-03-31'),
(9, 'overlookedlice', '12345678', '(848)38221758', 'vanhuong0@yahoo.com', '1994-02-07'),
(10, 'agilediscussion', '12345678', '(848)39491199', 'thanhbinh_phan21@hotmail.com', '1980-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `rent_date` date NOT NULL,
  `return_date` date NOT NULL,
  `rent_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2784DCC43676E6` (`mem_id`),
  ADD KEY `IDX_2784DCC16A2B381` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `FK_2784DCC16A2B381` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `FK_2784DCC43676E6` FOREIGN KEY (`mem_id`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
