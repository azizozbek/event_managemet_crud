-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jun 2020 um 10:43
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `eventify`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `f_image_id` varchar(255) NOT NULL,
  `f_kuenstler_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `name`, `content`, `date`, `f_image_id`, `f_kuenstler_id`) VALUES
(11, 'After Partey of IPA in TBZ3.2323223232398080', 'xxccvc gfdgdfg cxcxc123123LEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .', '2020-07-09', '29', 1),
(12, 'Swiss Mande Event', 'The aim of the project is the creation of a collective fonts released under OFL. Each academic year, a dozen students work on the project, developing it further and solving problems. Any type designer interested in the amendment or revision of Titillium is invited to co-operate with us, or develop their own variants of the typeface according to the terms specified in the Open Font license. We also ask all graphic designers who use Titillium in their projects to email us some examples of the typeface family in use, in order to prepare a case histories database.', '2020-06-26', '18,24,27,28', 1),
(13, 'After Partey of IPA in TBZ3.', '123123LEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOW.123123LEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOW.123123LEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOW.123123LEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOW.123123LEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOW.123123LEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOW.123123LEASE KEEP THE FOLLOWING IN MIND WHEN WORKING WITH XAMPP AFTER YOU MAKE THE ABOVE CHANGES: .PLEASE KEEP THE FOLLOW.', '2020-07-03', '26,28', 1),
(14, 'Event von Künstler 2', 'Verschlüsseltes Login mit Sessionüberprüfung\r\n• Benutzerverwaltung mit verschiedenen Rechten\r\n• Online-Administration der Websiteinhalte\r\n• Formularüberprüfung PHP mind. 3x3', '2020-06-26', '18,19,24,25,17222', 8),
(15, 'Mein neues Event', 'Adminseite, Clientseite (PHP7, MySqli)\r\n• Verschlüsseltes Login mit Sessionüberprüfung\r\n• Benutzerverwaltung mit verschiedenen Rechten\r\n• Online-Administration der Websiteinhalte\r\n• Formularüberprüfung PHP mind. 3x3\r\nUserseite\r\n• Abrufen der Dateninhalte\r\n• Sinnvolle Navigation und Sortiermöglichkeit\r\nKurzdokumentation (Von der Idee zum Ergebnis)\r\n2. Erweiterte Anforderungen\r\nVerschiedene Challenges zu', '2020-06-20', '24,25', 9),
(16, 'Create Event2cvcv', 'Create Event\r\nCreate Event\r\nCreate Event\r\nCreate Eventasdasd\r\nCreate Event\r\nCreate Event\r\nCreate Eventasdasd\r\nCreate Event\r\n', '2020-06-24', '25,27,28,29', 10),
(17, 'Mein neues Event23gdg', 'Aufgaben unvollständig.\r\nDaten wurden unvollständig oder gar nicht übernommen.\r\nKeine\r\nResultate sind für eine AnwendungAufgaben unvollständig.\r\nDaten wurden unvollständig oder gar nicht übernommen.\r\nKeine\r\nResultate sind für eine AnwendungAufgaben unvollständig.\r\nDaten wurden unvollständig oder gar nicht übernommen.\r\nKeine\r\nResultate sind für eine AnwendungAufgaben unvollständig.\r\nDaten wurden unvollständig oder gar nicht übernommen.\r\nKeine\r\nResultate sind für eine AnwendungAufgaben unvollständig.\r\nDaten wurden unvollständig oder gar nicht übernommen.\r\nKeine\r\nResultate sind für eine Anwendung', '2020-06-28', '21,25,1800', 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `images`
--

INSERT INTO `images` (`id`, `path`) VALUES
(19, 'igGb8fQVg7.png'),
(20, 'PuIcT7m8Ek.png'),
(21, 'qn5dlYFiuN.png'),
(22, 'Ejkv89LHjA.jpg'),
(23, 'GWKLSP1zwK.jpg'),
(24, 'z9bCKU5cf9.jpg'),
(25, 'C1tzb0FB6r.jpg'),
(26, 'AUiWZD1VZ5.png'),
(27, 'HyEwzb7yyr.png'),
(28, 'vbpR3slEnJ.png'),
(29, '8KmUbQiXa5.jpg'),
(1800, 'H2AKKtMIdW.png'),
(17222, 'GxuGMr1UtW.jpg'),
(17223, 's4jSEb8Bbr.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kuenstler`
--

CREATE TABLE `kuenstler` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `access` tinyint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kuenstler`
--

INSERT INTO `kuenstler` (`id`, `username`, `fullname`, `password`, `email`, `access`) VALUES
(1, 'kotak', 'aziz ozbek', '$2y$10$y0HXrcGbO97dJNLE2/b7u.3sI235BI/vyR0ZB5NzwDXACTlcx3m3q', 'aziz.ozbek@metanet.ch', 0),
(3, 'roottoor', 'asd xc', '$2y$10$OVEAq6f1QdHgKaEcP535eOi0U16zgVZw37gH77awAVi2vkJLOk0S6', 'azo@metanet.ch', 0),
(7, 'azizozbek', 'asd asd', '$2y$10$Y8NRtgqwddr.yfqWSCTGBuyUM9hOZ5E3M6n8FIbvk0KGuJ5MgF/Vm', 'aziza2772@gmail.com', 0),
(8, 'aziz', 'Aziz Ozbek', '$2y$10$iiTQnHBvISA66IxPVV7NIeFIq0bBBntMa2LFczl42LNkdlcOVI3Ni', 'aziza2772@gmail.com', 0),
(9, 'helmina', 'Helmina Jusufi', '$2y$10$Zqa.3gx8224YT0vkhjDHE.FXxQ2sZ3SDwIBDpobvlpEpuhjbxitKS', 'helmina@jusufi.ch', 0),
(10, 'gustav', 'Gustav Dudamel', '$2y$10$XfsQngcyaG3Eve1FZMLiWOQgbN2KOGwgPcuLdC0YM/46oLGl34B..', 'azo@metanet.ch', 0),
(11, 'muhammed', 'muhammed ercan', '$2y$10$LtG98YIKfidl5JQP7ii7GurrpX.BI3rElFcELtQwM6/qdMGWJucrS', 'aziza2772@gmail.com', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `meta`
--

CREATE TABLE `meta` (
  `event_id` int(11) NOT NULL,
  `kuenstler_id` varchar(255) NOT NULL,
  `images_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `meta`
--

INSERT INTO `meta` (`event_id`, `kuenstler_id`, `images_id`) VALUES
(1, '1', '1,2'),
(2, '1', '1,2'),
(3, '3', '3,4');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kuenstler`
--
ALTER TABLE `kuenstler`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `meta`
--
ALTER TABLE `meta`
  ADD UNIQUE KEY `i_event` (`event_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17224;

--
-- AUTO_INCREMENT für Tabelle `kuenstler`
--
ALTER TABLE `kuenstler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
