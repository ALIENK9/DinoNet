-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 10, 2017 alle 01:21
-- Versione del server: 10.1.21-MariaDB
-- Versione PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tecweb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articolo`
--

CREATE TABLE `articolo` (
  `id` int(11) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `sottotitolo` varchar(255) NOT NULL,
  `descrizione` text NOT NULL,
  `immagine` varchar(255) NOT NULL,
  `eta` int(11) NOT NULL,
  `descrizioneimg` text NOT NULL,
  `datains` date NOT NULL,
  `idautore` varchar(150) NOT NULL,
  `iddinosauro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articolo`
--

INSERT INTO `articolo` (`id`, `titolo`, `sottotitolo`, `descrizione`, `immagine`, `eta`, `descrizioneimg`, `datains`, `idautore`, `iddinosauro`) VALUES
(13, 'aaa', 'bbb', 'ccc', '', 111, 'ddd', '2017-11-26', 'dino@dinosauro.it', NULL),
(14, '121', '232', '343', '', 454, '565', '2017-12-10', 'admin@admin.it', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `dinosauro`
--

CREATE TABLE `dinosauro` (
  `nome` varchar(255) NOT NULL,
  `peso` int(11) DEFAULT NULL COMMENT 'Kg',
  `altezza` int(11) DEFAULT NULL COMMENT 'cm',
  `lunghezza` int(11) DEFAULT NULL COMMENT 'cm',
  `periodomin` int(11) DEFAULT NULL COMMENT 'milioni di anni',
  `periodomax` int(11) DEFAULT NULL COMMENT 'milioni di anni',
  `habitat` text,
  `alimentazione` text,
  `tipologiaalimentazione` enum('carnivoro','onnivoro','erbivoro','') NOT NULL DEFAULT 'onnivoro',
  `descrizioneautore` varchar(255) DEFAULT NULL,
  `descrizione` text,
  `curiosita` text,
  `immagine` varchar(255) DEFAULT NULL,
  `datains` date NOT NULL,
  `idautore` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dinosauro`
--

INSERT INTO `dinosauro` (`nome`, `peso`, `altezza`, `lunghezza`, `periodomin`, `periodomax`, `habitat`, `alimentazione`, `tipologiaalimentazione`, `descrizioneautore`, `descrizione`, `curiosita`, `immagine`, `datains`, `idautore`) VALUES
('1', 21, 32, 43, 54, 65, '76', '87', 'erbivoro', '98', '109', '1110', NULL, '2017-12-09', 'admin@admin.it'),
('prova', 12, 123, 1234, 2345, 3456, 'aaa', 'asdf', 'onnivoro', 'zcvbn', 'sdgwer', 'sdgdfgndf', NULL, '2017-11-26', 'dino@dinosauro.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `email` varchar(150) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(150) NOT NULL,
  `datanascita` date DEFAULT NULL,
  `password` char(32) NOT NULL,
  `tipologia` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`email`, `nome`, `cognome`, `datanascita`, `password`, `tipologia`) VALUES
('aaa', 'bbb1', 'ccc', '2000-01-01', 'ddd', 0),
('aaaw', 'aaa', 'aaa', '1992-11-11', 'aaaw', 0),
('admin@admin.it', 'admin', 'gianni', '1993-10-03', 'admin', 1),
('biancocomeilvino@hotmail.com', 'bianco', 'vino', '1937-01-08', 'bianco', 0),
('ciccio@gmail.it', 'andrea', 'rossi', '1997-06-25', 'andrea', 0),
('dino@dinosauro.it', 'dino', 'rex', '1986-03-25', 'dino', 0),
('prova@prova.it', 'prova1', 'cosa2', '2003-11-01', 'prova4', 0),
('provas@provas.com', 'provas1', 'dino2', '2003-03-03', 'provas4', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articolo`
--
ALTER TABLE `articolo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idautore` (`idautore`),
  ADD KEY `riferimento` (`iddinosauro`);

--
-- Indici per le tabelle `dinosauro`
--
ALTER TABLE `dinosauro`
  ADD PRIMARY KEY (`nome`),
  ADD KEY `idautore` (`idautore`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articolo`
--
ALTER TABLE `articolo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `articolo`
--
ALTER TABLE `articolo`
  ADD CONSTRAINT `pubblicazione` FOREIGN KEY (`idautore`) REFERENCES `utente` (`email`),
  ADD CONSTRAINT `riferimento` FOREIGN KEY (`iddinosauro`) REFERENCES `dinosauro` (`nome`);

--
-- Limiti per la tabella `dinosauro`
--
ALTER TABLE `dinosauro`
  ADD CONSTRAINT `pubblica` FOREIGN KEY (`idautore`) REFERENCES `utente` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
