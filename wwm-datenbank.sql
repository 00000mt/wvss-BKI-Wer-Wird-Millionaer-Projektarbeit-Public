-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Apr 2024 um 09:41
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wwm-datenbank`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `accounts`
--

CREATE TABLE `accounts` (
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `spielgeld` bigint(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `accounts`
--

INSERT INTO `accounts` (`USERNAME`, `PASSWORD`, `spielgeld`) VALUES
('ADMIN', '$2y$10$IhNmiYJl9Z1FnQJj.wxFleivqi9h2eG0NNDbcJx6qOUItPcrkmVDK', 9223372036854775807),
('MaxVerstappen', '$2y$10$EY.wuKfBu559gebLXRD5fOQnYWVtvleNgrpL5RjfqUpwXX5LnZ20a', 100000000),
('Test', '$2y$10$cSiftpJlKhI21lQi8l6v8.Uk.ZA4pOVG3.1ii7lC63kXmptDYIglu', 555),
('PasswortIst1', '$2y$10$oK1mYEDxl1lpx5mUzYst1OGf4dUOMrJedjJukNSYdhVlMFSCE10u6', 500000),
('Papaplatte', '$2y$10$Uf1iYDq/sjMfC8UNXOvtI.7rwf9aq.0N2jFMt.cFuP.aqvztXS/1S', 19000000),
('Elias', '$2y$10$GYSn.HWeM/FBdZNbWuZin.64O2Rpyx5T07W3vzZYjer6EwPwxJzSS', 4),
('Alex', '$2y$10$6CnLOUGR932F6hZe3rJtwuCKEuZBt44f7oqxLw5J3IaGzSuPFw/PS', 3),
('2BKI21', '$2y$10$EUmVVJgroUCmXDFRxZHgOuKmlz.VbuoBpnW8pNMfuyQsNADJnuiT2', 2),
('3macs', '$2y$10$Tm9W4err9xGL9Oypewn36en0egd93LQurP8ZxWug57UfElCBc9X.m', 1500000),
('Nr.10', '$2y$10$Vh89AZabyQKA6b62HET.1u9J1dk/VhkKJHpdGyy6OipjdlnLOTU5m', 1),
('Nr.11', '$2y$10$u6b/cGAEyA8Z5dlbeJpDK.tsiCg.EBWpmbRniIYlB9tg0KxD8mfke', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questions1`
--

CREATE TABLE `questions1` (
  `question_id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `questions1`
--

INSERT INTO `questions1` (`question_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
(1, 'Wenn man als Patient schon Tabletten nehmen muss, dann bitte welche ...?', 'an Teilnahme', 'bei Stand', 'unter Stützung', 'mit Wirkung', 'D'),
(2, 'Wer beim Sprechen plötzlich nicht mehr weiterweiß, verliert redensartlich den ...?', 'Faden', 'Öden', 'Schalen', 'Tristen', 'A'),
(3, 'Welche Nachricht sorgt bei Aktienbesitzern schon mal für schlechte Laune?', 'Mahrder im Bad', 'Dax im Keller', 'Wisel im Flur', 'Fux in der Küche', 'B'),
(4, 'Kostet bei der Kosmetikerin das Wimpernkleben noch mal extra, ist das sozusagen ...?', 'eine Seh-Schwäche', 'ein Blick-Kontakt', 'eine Linsen-Trübung', 'ein Augen-Aufschlag', 'D'),
(5, 'Zu welcher „Wirtschaft“ gibt es im allgemeinen Sprachgebrauch keinen gleichnamigen Wirt?', 'Landwirtschaft', 'Gastwirtschaft', 'Betriebswirtschaft', 'Vetternwirtschaft', 'D'),
(6, 'Wer die Porta Nigra in Trier bewacht, kann sich auch ohne fußballerisches Talent mit Fug und Recht wie bezeichnen?', 'Torhüter', 'Libero', 'Spielmacher', 'Mittelstürmer', 'A'),
(7, 'Was findet immer mehr Abnehmer?', 'Heißluftwaschmaschinen', 'Heißluftstaubsauger', 'Heißluftfritteusen', 'Heißluftzahnbürsten', 'C'),
(8, 'Mit welchem Begriff wird einer der zentralen Punkte von Charles Darwins Evolutionstheorie zusammengefasst?', 'Selection of the Smartest', 'Battle of the Strongest', 'Survival of the Fittest', 'Draft of the Biggest', 'C'),
(9, 'Bei welchen Karnevalskostümen muss man aufpassen, nicht mit § 42a des entsprechenden Gesetzes in Konflikt zu kommen?', 'Prinzessin und Fee', 'Sheriff und Pirat', 'Hexe und Clown', 'Micky und Minnie Maus', 'B'),
(10, '1984 folgte als bundesdeutsche First Lady ...?', 'Wilhelmine auf Elly', 'Mildred auf Hilda', 'Marianne auf Veronica', 'Christina auf Christiane', 'C'),
(11, 'Was wird üblicherweise gebraut und nicht gebrannt?', 'Whisky', 'Tequila', 'Sake', 'Ouzo', 'C'),
(12, 'Wo gewann Lukas Dauser den Weltmeistertitel, der ausschlaggebend für seine Wahl zu Deutschlands „Sportler des Jahres 2023? war?', 'am Barren', 'auf dem Basketballfeld', 'an der Tischtennisplatte', 'auf der Biathlonstrecke', 'A'),
(13, 'Eine normale Klarinette besteht in der Regel aus fünf Einzelteilen: Mundstück, Oberstück, Unterstück, Schallbecher und ...?', 'Apfel', 'Birne ', 'Kirsche', 'Banane', 'B'),
(14, 'Welche Handwerker attestieren vielen ihrer Produkte eine sogenannte Ringfestigkeit?', 'Tischler und Lackierer', 'Schneider und Schuhmacher', 'Bäcker und Konditoren', 'Maurer und Dachdecker', 'A'),
(15, 'Welches Land änderte Ende 2023 das Motiv auf seiner Nationalflagge ab, weil die bisherige Version zu sehr an eine Sonnenblume erinnere?', 'Chile', 'Nigeria', 'Bhutan', 'Kirgisistan', 'D');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questions2`
--

CREATE TABLE `questions2` (
  `question_id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `questions2`
--

INSERT INTO `questions2` (`question_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
(1, 'Um Abgaben, die man an den Staat abführen muss, handelt es sich ...?', 'dazu Geben', 'mit Wirken', 'unter Stützen', 'bei Steuern', 'D'),
(2, 'Alle waren dem Anlass entsprechend festlich gekleidet – nur einer erschien mal wieder in einem unmöglichen ...?', 'Aufzug', 'Fahrstuhl', 'Lift', 'Paternoster', 'A'),
(3, 'Wird unmittelbar nach dem Anpfiff sogleich ein Treffer erzielt, handelt es sich sozusagen um ein ...?', 'Inspekt-Tor', 'Detekt-Tor', 'Diktat-Tor', 'Direkt-Tor', 'D'),
(4, 'Wer mit jemandem keinerlei Interessen oder Eigenschaften teilt, hat mit ihm nichts ...?', 'ekelhaft', 'gemein', 'fies', 'widerlich', 'B'),
(5, 'Begegnet die frühere Miss Middleton dem 43. US-Präsidenten, dann trifft ...?', 'Bonnie Tyler', 'Kim Wilde', 'Annie Lennox', 'Kate Bush', 'D'),
(6, 'War die Maßnahme erfolgreich, dann ist die Technik durch ein ...?', 'Back-up back to up', 'Plug-in plug to in', 'Update up to date', 'Download down to load', 'C'),
(7, 'Was macht man für gewöhnlich mit einem Petit Four?', 'anziehen', 'essen', 'fahren', 'hören', 'B'),
(8, 'Stößt man auf das Kürzel „LotR“, ist in der Regel was das Thema?', 'Fluch der Karibik', 'Harry Potter', 'Krieg der Sterne', 'Der Herr der Ringe', 'D'),
(9, 'Was zählt mit rund 80.000 Einwohnern zu den fünf größten Städten eines deutschen Bundeslandes?', 'Neuchemnitz', 'Neuaugsburg', 'Neumünster', 'Neukassel', 'C'),
(10, 'Welcher Megahit klingt mit einem markanten letzten Einsatz der Panflöte aus?', 'Poker Face', 'La Isla Bonita', 'Whenever, Wherever', 'My Heart Will Go On', 'C'),
(11, 'Als die Presse im Januar 2024 von „A23a“ berichtete – mit rund 4.000 km² etwas größer als Mallorca –, ging es um den größten existierenden ...?', 'Meteoritenkrater', 'Eisberg', 'Zwergplaneten', 'lebenden Organismus', 'B'),
(12, 'Wo sind Berufsbezeichnungen wie „best boy“, „swing gang“ und „key grip“ geläufig?', 'an Filmsets', 'in Freizeitparks', 'bei Raumfahrtbehörden', 'in Sterneküchen', 'A'),
(13, 'Wobei handelt es sich um ein sogenanntes Unterscheidungszeichen?', 'PB für Paderborn', 'PK für Polizeikommissar', 'Pt für Platin', 'PS für Pferdestärke', 'A'),
(14, 'Wo löste die Juristin Nataša Pirc Musar Ende 2022 den sogenannten Instagram-Präsidenten Borut Pahor als Staatsoberhaupt ab?', 'Montenegro', 'Bosnien und Herzegowina', 'Kroatien', 'Slowenien', 'D'),
(15, 'Die erste bezahlte Fracht, die im Jahr 1836 auf einer deutschen Eisenbahnlinie befördert wurde, bestand aus ...?', 'einem Ballen Leder', 'zwei Fässern Bier', 'drei Kisten Schrauben', 'vier Sack Kartoffeln', 'B');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `accounts`
--
ALTER TABLE `accounts`
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- Indizes für die Tabelle `questions1`
--
ALTER TABLE `questions1`
  ADD PRIMARY KEY (`question_id`);

--
-- Indizes für die Tabelle `questions2`
--
ALTER TABLE `questions2`
  ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `questions1`
--
ALTER TABLE `questions1`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `questions2`
--
ALTER TABLE `questions2`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
