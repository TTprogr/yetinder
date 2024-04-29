-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 29. dub 2024, 12:23
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `yetinder`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240424143052', '2024-04-27 11:38:57', 48);

-- --------------------------------------------------------

--
-- Struktura tabulky `hodnoceni`
--

CREATE TABLE `hodnoceni` (
  `id` int(11) NOT NULL,
  `yeti_id` int(11) NOT NULL,
  `hodnoceni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `yeti_id` int(11) DEFAULT NULL,
  `rating` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `rating`
--

INSERT INTO `rating` (`id`, `yeti_id`, `rating`) VALUES
(1, 0, NULL),
(2, 0, NULL),
(3, 0, NULL),
(4, 0, NULL),
(5, 0, NULL),
(6, 0, NULL),
(8, NULL, NULL),
(9, NULL, NULL),
(10, NULL, NULL),
(11, NULL, NULL),
(12, NULL, NULL),
(13, NULL, NULL),
(14, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'pepin@seznam.cz', '[]', '$2y$13$e4jvZVsPeB4kJgMFpcNfe.DEf.ZHjOmCtulmswLP1HdmstQEK3POu'),
(2, 'Yeti@host.com', '[]', '$2y$13$n6HptvhC5eYYfdyHb0xJe.BEtJU2kTS3J67qTJbD4S776lNY5NxBi');

-- --------------------------------------------------------

--
-- Struktura tabulky `yeti`
--

CREATE TABLE `yeti` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(255) NOT NULL,
  `vyska` int(11) NOT NULL,
  `vaha` int(11) NOT NULL,
  `kozich` varchar(255) NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `vytvoreni` datetime NOT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `hodnoceni_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `yeti`
--

INSERT INTO `yeti` (`id`, `jmeno`, `vyska`, `vaha`, `kozich`, `adresa`, `vytvoreni`, `rating_id`, `hodnoceni_id`) VALUES
(1, 'Yennifer', 250, 220, 'Fialovy', 'U Labe', '2024-04-27 17:17:00', 0, 0),
(2, 'Igor', 280, 290, 'Bronz', 'Za Vltavou', '2024-04-25 16:16:00', 0, 0),
(3, 'Otakar', 290, 280, 'Černý', 'Před Duunajem', '2024-04-20 14:23:00', NULL, NULL),
(4, 'Tomáš', 301, 220, 'Zlatý', 'U Labe', '2023-12-12 12:12:00', NULL, NULL),
(5, 'Bob', 201, 330, 'Hnědý', 'Neznámá', '2024-03-14 13:13:00', NULL, NULL),
(6, 'Oliver', 249, 231, 'Černohnědý', 'Pod mostem', '2023-04-13 10:52:00', NULL, NULL),
(7, 'Chlupík', 155, 130, 'Bílý', 'U maminky', '2024-02-14 12:00:00', NULL, NULL),
(8, 'Štefan', 286, 264, 'Stříbrný', 'Sázava', '2024-04-18 20:23:00', NULL, NULL),
(9, 'Karel', 208, 244, 'Hnědý', 'Za Labem', '2024-04-17 15:24:00', NULL, NULL),
(10, 'Eleanor', 284, 231, 'Blond', 'Odra', '2024-04-12 19:34:00', NULL, NULL),
(11, 'Tonda', 305, 285, 'Mourkový', 'Vltava', '2024-04-23 18:35:00', NULL, NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexy pro tabulku `hodnoceni`
--
ALTER TABLE `hodnoceni`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yeti_id` (`yeti_id`);

--
-- Indexy pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- Indexy pro tabulku `yeti`
--
ALTER TABLE `yeti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `hodnoceni`
--
ALTER TABLE `hodnoceni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `yeti`
--
ALTER TABLE `yeti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`yeti_id`) REFERENCES `yeti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
