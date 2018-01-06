-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 05, 2018 alle 18:29
-- Versione del server: 10.1.29-MariaDB
-- Versione PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `immagine` varchar(255) DEFAULT NULL,
  `eta` int(11) NOT NULL,
  `descrizioneimg` text NOT NULL,
  `datains` date NOT NULL,
  `idautore` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articolo`
--

INSERT INTO `articolo` (`id`, `titolo`, `sottotitolo`, `descrizione`, `immagine`, `eta`, `descrizioneimg`, `datains`, `idautore`) VALUES
(13, 'aaa', 'bbb', 'ccc', NULL, 111, 'ddd', '2017-11-26', 'dino@dinosauro.it'),
(14, '121', '232', '343', NULL, 454, '565', '2017-12-10', 'admin@admin.it'),
(15, '1', '1', '2', '/img/articleimg/15.png', 3, '4', '2017-12-12', 'admin@admin.it'),
(16, 'asd', 'sdfas', 'asdfas', '/img/articleimg/16.png', 213, 'asdf', '2017-12-12', 'admin@admin.it'),
(17, 'aaa', 'sdfg', 'sdfg', '/img/articleimg/17.jpg', 234523, 'sdfgsdfg', '2017-12-17', 'admin@admin.it'),
(18, 'dddd', 'sdfg', 'sdfb', NULL, 234523, 'wdfgweg', '2017-12-17', 'admin@admin.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `articolodelgiorno`
--

CREATE TABLE `articolodelgiorno` (
  `id` int(11) NOT NULL,
  `idarticolo` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dump dei dati per la tabella `articolodelgiorno`
--

INSERT INTO `articolodelgiorno` (`id`, `idarticolo`, `data`) VALUES
(1, 13, '2017-12-12'),
(2, 15, '2017-12-16'),
(3, 16, '2017-12-17'),
(4, 13, '2017-12-19');

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
  `descrizionebreve` varchar(255) DEFAULT NULL,
  `descrizione` text,
  `curiosita` text,
  `immagine` varchar(255) DEFAULT NULL,
  `datains` date NOT NULL,
  `idautore` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dinosauro`
--

INSERT INTO `dinosauro` (`nome`, `peso`, `altezza`, `lunghezza`, `periodomin`, `periodomax`, `habitat`, `alimentazione`, `tipologiaalimentazione`, `descrizionebreve`, `descrizione`, `curiosita`, `immagine`, `datains`, `idautore`) VALUES
('1', 21, 32, 43, 54, 65, '76', '87', 'erbivoro', '98', '109', '1110', '/img/dinosaurimg/1.jpg', '2017-12-09', 'admin@admin.it'),
('ciao', 123, 2134, 2435, 54, 5644, '57863', 'rtdfgs', 'carnivoro', 'sdfgsdfg', 'sdfg', 'xdfg', '/img/dinosaurimg/ciao.png', '2017-12-12', 'admin@admin.it'),
('dfstr', 563423, 4532, 4567, 5678, 678, 'ghjk', 'brytui', 'carnivoro', 'ytuij', 'yji', 'yuh', NULL, '2017-12-12', 'admin@admin.it'),
('eee', 123, 123, 12312, 12345, 3456, '3efghe', 'ewfgdf', 'erbivoro', 'sdfg', 'sdfg', 'sdfg', '/img/dinosaurimg/eee.jpg', '2017-12-17', 'admin@admin.it'),
('fgbjhknl', 346, 789, 6568798, 4756879, 4756879, '68579', 'ery', 'onnivoro', 'tryuh', 'trfyu', 'trfgyu', NULL, '2017-12-12', 'admin@admin.it'),
('n', 345, 3456, 3456, 345, 3456, '34dfgndfg', 'dfh', 'onnivoro', 'dfgh', 'hdfgh', 'dfgh', NULL, '2017-12-17', 'admin@admin.it'),
('prova', 12, 123, 1234, 2345, 3456, 'aaa', 'asdf', 'onnivoro', 'zcvbn', 'sdgwer', 'sdgdfgndf', '/img/dinosaurimg/prova.png', '2017-11-26', 'dino@dinosauro.it'),
('Stegosaurus', 6000, 350, 700, 120, 100, 'Foreste umide', 'Felci', 'erbivoro', 'Un bel diosauro', 'bla bla jjdjdj djshfskdjhfsjfhsdjkfsdkj', 'Le placche misuravano piÃ¹ di mezzo metro', '/img/dinosaurimg/Stegosaurus.jpg', '2017-12-19', 'admin@admin.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `dinosaurodelgiorno`
--

CREATE TABLE `dinosaurodelgiorno` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dinosaurodelgiorno`
--

INSERT INTO `dinosaurodelgiorno` (`id`, `nome`, `data`) VALUES
(1, 'ciao', '2017-12-15'),
(2, 'prova', '2017-12-16'),
(3, '1', '2017-12-17'),
(4, 'prova', '2017-12-19'),
(5, 'ciao', '2018-01-03'),
(6, 'eee', '2018-01-03');

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
  `tipologia` int(11) NOT NULL DEFAULT '0',
  `immagine` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`email`, `nome`, `cognome`, `datanascita`, `password`, `tipologia`, `immagine`) VALUES
('112@asdf.it', 'qqq', 'www', '2222-02-22', '333', 0, '/img/userimg/112@asdf.it.png'),
('aaa', 'bbb1', 'ccc', '2000-01-01', 'aaa', 0, '/img/userimg/aaa.png'),
('aaa232@asf.it', 'aaa23', 'aaa23', '1111-11-11', 'aaa', 0, '/img/userimg/aaa232@asf.it.png'),
('aaaw', 'aaa', 'aaa', '1992-11-11', 'aaaw', 0, NULL),
('admin@admin.it', 'admin', 'gianni', '1993-10-03', 'admin', 1, NULL),
('aiuto@help.com', 'Quasi', 'Morto', '1997-02-02', 'aaa', 0, '/img/userimg/oneup.png'),
('apple@adamo.it', 'Adamo', 'Il Primo', '1900-01-01', 'aaa', 0, '/img/userimg/apple.png'),
('biancocomeilvino@hotmail.com', 'bianco', 'vino', '1937-01-08', 'bianco', 0, NULL),
('ciccio@gmail.it', 'andrea', 'rossi', '1997-06-25', 'andrea', 0, NULL),
('ddd@dd.it', 'dd', 'dd', '4444-04-04', 'ddd', 0, NULL),
('dino@dinosauro.it', 'dino', 'rex', '1986-03-25', 'dino', 0, NULL),
('dino@killer.org', 'Dino', 'Kill', '0001-01-01', 'aaa', 0, '/img/userimg/killer.jpg'),
('prova@prova.it', 'prova1', 'cosa2', '2003-11-01', 'prova4', 0, NULL),
('provas@provas.com', 'provas1', 'dino2', '2003-03-03', 'provas4', 0, NULL),
('sserts@sss.it', 'aaa1', 'ss2', '2003-03-31', '3334', 0, '/img/userimg/sserts@sss.it.jpg'),
('xxx@xxx.it', 'xxx', 'xxx', '1111-11-11', 'xxx', 0, '/img/userimg/xxx@xxx.it.png'),
('zzzzz@zz.it', 'zzz', 'zzz', '2222-02-22', 'zz', 0, NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articolo`
--
ALTER TABLE `articolo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idautore` (`idautore`);

--
-- Indici per le tabelle `articolodelgiorno`
--
ALTER TABLE `articolodelgiorno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presenzaarticolodg` (`idarticolo`);

--
-- Indici per le tabelle `dinosauro`
--
ALTER TABLE `dinosauro`
  ADD PRIMARY KEY (`nome`),
  ADD KEY `idautore` (`idautore`);

--
-- Indici per le tabelle `dinosaurodelgiorno`
--
ALTER TABLE `dinosaurodelgiorno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presenza` (`nome`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `articolodelgiorno`
--
ALTER TABLE `articolodelgiorno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `dinosaurodelgiorno`
--
ALTER TABLE `dinosaurodelgiorno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `articolo`
--
ALTER TABLE `articolo`
  ADD CONSTRAINT `pubblicazione` FOREIGN KEY (`idautore`) REFERENCES `utente` (`email`);

--
-- Limiti per la tabella `articolodelgiorno`
--
ALTER TABLE `articolodelgiorno`
  ADD CONSTRAINT `presenzaarticolodg` FOREIGN KEY (`idarticolo`) REFERENCES `articolo` (`id`);

--
-- Limiti per la tabella `dinosauro`
--
ALTER TABLE `dinosauro`
  ADD CONSTRAINT `pubblica` FOREIGN KEY (`idautore`) REFERENCES `utente` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `dinosaurodelgiorno`
--
ALTER TABLE `dinosaurodelgiorno`
  ADD CONSTRAINT `presenza` FOREIGN KEY (`nome`) REFERENCES `dinosauro` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
