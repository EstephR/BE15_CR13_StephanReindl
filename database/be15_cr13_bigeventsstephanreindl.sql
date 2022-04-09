-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Apr 2022 um 17:42
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be15_cr13_bigeventsstephanreindl`
--
CREATE DATABASE IF NOT EXISTS `be15_cr13_bigeventsstephanreindl` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be15_cr13_bigeventsstephanreindl`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220408205146', '2022-04-08 22:52:05', 102);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagethumbnail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `name`, `date`, `time`, `description`, `imagethumbnail`, `image`, `capacity`, `email`, `phone`, `address`, `website`, `type`) VALUES
(1, 'Ai Weiwei', '2022-04-27', '09:00:00', 'In search of humanity', 'aiweiweithumb.png', 'aiweiwei.jpg', 2300, 'office@albertina.at', '0664/1043234', 'Karlsplatz 5, 1010 Wien', 'www.albertina.at', 'exhibition'),
(2, 'Cats', '2022-05-14', '20:00:00', 'The outstanding musical', 'catsthumb.png', 'cats.jpg', 1400, 'office@ronacher.at', '0664/104234890', 'Seilerstätte 9, 1010 Wien', 'https://www.musicalvienna.at/de/die-theater/ronacher', 'musical'),
(3, 'Freak Valley', '2022-06-04', '14:00:00', 'Europes finest Underground Rock Festival', 'freakvalleythumb.png', 'freakvalley.jpg', 3500, 'office@freakvalley.de', '0664/1382013', 'AWO-Gelände 203, 32923 Netphen', 'www.freakvalley.de', 'festival'),
(4, 'Hellfest', '2022-06-27', '14:00:00', 'The Extreme Metal Fest', 'hellfestthumb.png', 'hellfest.jpg', 75000, 'office@hellest.fr', '0664/19238481', 'Place du Hellfest, 101140 Clisson', 'www.hellfest.fr', 'festival'),
(5, 'Lake on Fire', '2022-08-05', '14:00:00', 'Austrias finest Lake Festival', 'lakeonfirethumb.png', 'lakeonfire.jpg', 1500, 'office@lakeonfirefestival.com', '0664/7863512', 'Schlossberg 2, 4391 Waldhausen', 'www.lakeonfirefestival.com', 'festival'),
(6, 'Torsten Sträter', '2022-04-27', '19:00:00', 'Schneefall überm Ceranfeld', 'torstenstraeterthumb.png', 'torstenstraeter.jpg', 800, 'office@flucc.at', '0664/2342345', 'Pratersterm 5, 1020 Wien', 'www.fluc.at', 'comedy');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
