-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 07, 2018 alle 23:20
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
  `anteprima` text,
  `immagine` varchar(255) DEFAULT NULL,
  `eta` int(11) NOT NULL,
  `descrizioneimg` text NOT NULL,
  `datains` date NOT NULL,
  `idautore` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articolo`
--

INSERT INTO `articolo` (`id`, `titolo`, `sottotitolo`, `descrizione`, `anteprima`, `immagine`, `eta`, `descrizioneimg`, `datains`, `idautore`) VALUES
(13, 'aaa', 'bbb', 'ccc1', NULL, NULL, 111, 'ddd', '2017-11-26', 'dino@dinosauro.it'),
(14, '121', '232', '343', NULL, NULL, 454, '565', '2017-12-10', 'admin@admin.it'),
(15, '1', '1', '2', NULL, '/img/articleimg/15.png', 3, '4', '2017-12-12', 'admin@admin.it'),
(16, 'asd', 'sdfas', 'asdfas', NULL, '/img/articleimg/16.png', 213, 'asdf', '2017-12-12', 'admin@admin.it'),
(17, 'aaa', 'sdfg', 'sdfg', NULL, '/img/articleimg/17.jpg', 234523, 'sdfgsdfg', '2017-12-17', 'admin@admin.it'),
(18, 'dddd', 'sdfg', 'sdfb', NULL, NULL, 234523, 'wdfgweg', '2017-12-17', 'admin@admin.it'),
(21, 'Estinzione', 'Estinzione: diverse teorie', '&lt;figure class=&quot;article-image-right&quot;&gt;\r\n                &lt;img id=&quot;petrified_wood&quot; src=&quot;img/petrified_wood.jpg&quot;\r\n                     alt=&quot;Sezione pietrificata di tronco fossile nel parco nazionale della Foresta Pietrificata in Arizona&quot;&gt;\r\n                &lt;figcaption&gt;\r\n                    &lt;p&gt;\r\n                        Vista aerea del Meteor Crater in Arizona. Questo cratere con diametro di circa 1200 metri &egrave;\r\n                        stato generato circa 50000 anni fa dall&#039;impatto di un meteorite largo 46 metri.\r\n                    &lt;/p&gt;\r\n                &lt;/figcaption&gt;\r\n            &lt;/figure&gt;\r\n\r\n			&lt;p&gt;\r\n				Dopo aver dominato la Terra per 170 milioni di anni, impedendo a tutte le altre forme (pesci, uccelli e soprattutto mammiferi) di affermarsi, i grandi rettili di colpo scomparvero. Sessantacinque milioni di anni fa, sulla Terra si produce un&#039;immensa catastrofe che elimina tutti i dinosauri in ogni angolo del pianeta.&lt;br&gt;\r\n				Non solo: ma anche gran parte della vita si estingue, oltre che sulla terraferma, anche nei mari e nei cieli. Secondo alcune stime il 50-70% delle specie viventi scomparvero. In particolare si estinsero tutti gli animali di una certa taglia, ma anche moltissimi animali microscopici, e buona parte del plancton. Sulla scomparsa dei dinosauri sono state formulate pi&ugrave; di 60 ipotesi. Troppe. Alcune del tutto bizzarre, ma altre pi&ugrave; probabili.\r\n			&lt;/p&gt;\r\n            &lt;figure class=&quot;article-image-left&quot;&gt;\r\n                &lt;img id=&quot;meteor_crater&quot; src=&quot;img/meteor_crater.jpg&quot; alt=&quot;Il Meteor Crater in Arizona&quot;&gt;\r\n                &lt;figcaption&gt;\r\n                    &lt;p&gt;\r\n                        Vista aerea del Meteor Crater in Arizona. Questo cratere con diametro di circa 1200 metri &egrave;\r\n                        stato generato circa 50000 anni fa dall&#039;impatto di un meteorite largo 46 metri.\r\n                    &lt;/p&gt;\r\n                &lt;/figcaption&gt;\r\n            &lt;/figure&gt;\r\n			&lt;p&gt;\r\n				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,\r\n				totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta\r\n				sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia\r\n				consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n			&lt;/p&gt;\r\n			&lt;p&gt;\r\n				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,\r\n				totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta\r\n				sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia\r\n				consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n			&lt;/p&gt;\r\n            &lt;p&gt;\r\n                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,\r\n                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta\r\n                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia\r\n                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n            &lt;/p&gt;\r\n            &lt;p&gt;\r\n                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,\r\n                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta\r\n                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia\r\n                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n            &lt;/p&gt;\r\n            &lt;p&gt;\r\n                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,\r\n                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta\r\n                sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia\r\n                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.\r\n            &lt;/p&gt;\r\n\r\n            &lt;figure class=&quot;article-image-right&quot;&gt;\r\n                &lt;img id=&quot;carboniferous_forest&quot; src=&quot;img/carboniferous_forest.jpg&quot; alt=&quot;Uno scorcio di foresta del periodo Carbonifero&quot;&gt;\r\n                &lt;figcaption&gt;\r\n                    &lt;p&gt;\r\n                        Una raffigurazione di una palude del Carbonifero. Durante questo periodo si sviluppano gli\r\n                        insetti tra i quali la Meganeura, libellula gigante, che raggiunge 70 centimetri d&#039;apertura\r\n                        alare e molte spece di aracnidi. Anche gli anfibi conoscono grande diffusione.\r\n                    &lt;/p&gt;\r\n                &lt;/figcaption&gt;\r\n            &lt;/figure&gt;\r\n\r\n			&lt;h2&gt;Estinzione: e dopo?&lt;/h2&gt;\r\n			&lt;p&gt;\r\n				L&#039;era Cenozoica (che comprende l&#039;attuale periodo Quaternario e il precedente Terziario) fece seguito\r\n                all&#039;estizione di massa della fine del Cretacico, che determin&ograve; la scomparsa dei dinosauri, degli\r\n                pterosauri, dialcuni uccelli e mammiferi e di molte specie marine.\r\n			&lt;/p&gt;\r\n			&lt;p&gt;\r\n				Nel corso del Terziario inferiore, i mammiferi e gli uccelli sopravissuti si diversificarono\r\n                rapidamente, occupando le nicchie ecologiche lasciate libere dai dinosauri. Nel Terziario superiore,\r\n                durante le epoche del Miocene e Pliocene, la diffusione delle praterie condusse all&#039;evoluzione\r\n                di forme moderne di mammiferi erbivori.\r\n			&lt;/p&gt;\r\n\r\n			&lt;p&gt;\r\n				A partire dal Quaternario (le cui epoche sono Pleistocene e Olocene), la vita animale e vegetale\r\n                rassomigliava genericamente alle specie moderne, sebbene alcune, che si erano adattate alla\r\n                sopravvivenza nel corso dei periodi glaciali, non siano sopravvissute fino ai giorni nostri.\r\n                Alcune famiglie invece, sono giunte fino ai nostri giorni: per esempio le pteridofite, la grande\r\n                famiglia delle felci, che fecero la loro apparizione durante il periodo Carbonifero, pi&ugrave; di 300 milioni\r\n                di anni fa.\r\n			&lt;/p&gt;', 'Dopo aver dominato la Terra per 170 milioni di anni, impedendo a tutte le altre forme (pesci, uccelli e soprattutto mammiferi) di affermarsi, i grandi rettili di colpo scomparvero. Sessantacinque milioni di anni fa, sulla Terra si produce un&#039;immensa catastrofe che elimina tutti i dinosauri in ogni angolo del pianeta.', '/img/articleimg/21.jpg', 12, 'Scheletro di dinosauro', '2018-01-07', 'admin@admin.it');

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
(4, 13, '2017-12-19'),
(41, 21, '2018-01-07');

-- --------------------------------------------------------

--
-- Struttura della tabella `commentoarticolo`
--

CREATE TABLE `commentoarticolo` (
  `id` int(11) NOT NULL,
  `idutente` varchar(150) NOT NULL,
  `idarticolo` int(11) NOT NULL,
  `commento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `commentoarticolo`
--

INSERT INTO `commentoarticolo` (`id`, `idutente`, `idarticolo`, `commento`) VALUES
(1, 'admin@admin.it', 21, 'prova'),
(2, 'admin@admin.it', 21, 'prova2'),
(3, 'admin@admin.it', 21, 'prova 3');

-- --------------------------------------------------------

--
-- Struttura della tabella `commentodinosauro`
--

CREATE TABLE `commentodinosauro` (
  `id` int(11) NOT NULL,
  `idutente` varchar(150) NOT NULL,
  `iddinosauro` varchar(255) NOT NULL,
  `commento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('1', 21, 32, 43, 54, 65, '76', '87', 'erbivoro', ' 981', ' 1092', ' 11103', '/img/dinosaurimg/1.jpg', '2017-12-09', 'admin@admin.it'),
('ciao', 123, 2134, 2435, 54, 5644, '57863', 'rtdfgs', 'carnivoro', 'sdfgsdfg', 'sdfg', 'xdfg', '/img/dinosaurimg/ciao.png', '2017-12-12', 'admin@admin.it'),
('Coelophysis', 46, 90, 280, 200, 208, 'Pianure desertiche', 'Rettili, pesci', 'carnivoro', '&lt;p&gt;Lungo fino a tre metri e alto in media poco pi&ugrave; di un metro, il &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt; aveva una struttura leggera e agile, che gli consentiva di catturare luce', '&lt;p&gt;Stando ai ritrovamenti effettuati fin&rsquo;ora, uno dei primi dinosauri a popolare la regione sudoccidentale degli Stati Uniti verso la fine del Triassico (circa 215 milioni di anni fa) &egrave; il &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt; (nome completo &quot;&lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis Bauri&lt;/em&gt;&lt;/span&gt;&quot;). Il suo nome deriva dal greco e significa &quot;forma cava&quot; in riferimento alle sue ossa cave, in particolare a quelle del cranio, che sono dotate di piccole cavit&agrave; per ridurre il peso dell&rsquo;animale. Questa caratteristica lo distingue da altre specie di dinosauri pi&ugrave; primitive come gli herrerasauridi vissuti  met&agrave; del Triassico. Una specializzazione molto particolare del &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt; riguarda la coda, le cui vertebre erano stranamente dotate di strutture allungate che probabilmente limitavano molto il movimento verticale. Infatti si ritiene che servisse per controbilanciare il peso corporeo. Questa semirigidit&agrave; pu&ograve; essere paragonata a quella dei successivi tetanuri, nei quali la coda &egrave; irrigidita dai tendini ossificati.&lt;/p&gt;&lt;br&gt;&lt;p&gt;Lungo fino a tre metri e alto in media poco pi&ugrave; di un metro, il &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt; aveva una struttura leggera e agile, che gli consentiva di catturare lucertole, anfibi e insetti alati per cibarsene. Per individuare e catturare la preda, si ritiene che il &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt; si servisse dei grandi occhi e del collo lungo e serpentiforme, sufficientemente flessibile per girarsi con rapidit&agrave;; la testa era lunga e stretta e le mascelle contenevano denti piccoli, aguzzi e aghiformi, dai bordi seghettati.&lt;br&gt;L&rsquo;analisi dello scheletro suggerisce che il &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt; si spostasse velocemente sulle due agili e magre zampe posteriori. Ciascuno degli arti anteriori, piuttosto corti (misuravano un terzo degli arti posteriori), terminava con quattro dita, tre delle quali funzionali e artigliate. Sono state rinvenute due forme di &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt;: una pi&ugrave; gracile, l&#039;altra pi&ugrave; robusta, e si ritiene che queste differenze rappresentano un caso di dimorfismo sessuale nella stessa specie.&lt;/p&gt;', '&lt;p&gt;&lt;strong&gt; Lo sapevi che... &lt;/strong&gt; nel 1947 una spedizione nel Nuovo Messico (&lt;abbr xml:lang=&quot;en&quot; lang=&quot;en&quot; title=&quot;United States of America&quot;&gt;USA&lt;/abbr&gt;), capitanata da &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;Edwin Colbert&lt;/span&gt;, fece una sensazionale scoperta. In una propriet&agrave; nota col nome di &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;Ghost Ranch&lt;/span&gt; (&ldquo;ranch fantasma&rdquo;) vennero trovati centinaia di scheletri di &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt;, che giacevano gli uni sugli altri. La scoperta era particolarmente eccitante, perch&eacute; riguardava &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt; di et&agrave; e dimensioni differenti. Sembra che l&#039;intero branco fosse andato incontro alla morte nel medesimo tempo. Ci&ograve; fa supporre che il decesso sia stato causato da un&#039;improvvisa calamit&agrave;, per esempio da una violenta inondazione che fece annegare gli animali, sommergendoli.&lt;/p&gt;&lt;br&gt;&lt;p&gt;Nella cassa toracica di alcuni adulti si sono ritrovati resti di piccoli della stessa specie: all&#039;inizio gli esperti pensarono che si trattasse di figli vicini alla nascita, ma non ancora venuti alla luce. Ma i dinosauri deponevano uova e non erano vivipari, perci&ograve; forse si trattava piuttosto degli avanzi di un ultimo pasto. Quegli scheletri, inoltre, erano davvero troppo grandi per poter essere contenuti in un uovo o per passare attraverso le ossa del bacino. Per quanto possa essere stata sorprendente, l&#039;ipotesi che i &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt; non si nutrissero solo di piccole lucertole ma anche dei membri giovanissimi della loro stessa specie sembr&ograve; decisamente realistica.&lt;br&gt;Tuttavia, nonostante questa teoria sia stata pi&ugrave; volte acclamata dalla maggior parte dei paleontologi, di recente &egrave; stata messa in discussione. L&#039;accatastarsi delle ossa le une sulle altre, infatti, potrebbe aver portato &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;Edwin Colbert&lt;/span&gt; e i suoi colleghi a ritenere di aver individuato resti di giovani esemplari nella cavit&agrave; addominale degli adulti, quando essi potevano semplicemente essere stati &quot;schiacciati&quot; sotto un individuo pi&ugrave; grande. In particolare, nel 2005 sono state rinvenute ulteriori prove che derivano dai contenuti dello stomaco fossilizzati in alcuni esemplari di &lt;span xml:lang=&quot;en&quot; lang=&quot;en&quot;&gt;&lt;em&gt;Coelophysis&lt;/em&gt;&lt;/span&gt;: i resti dei presunti &quot;giovani&quot; sarebbero da attribuire ad un&rsquo;altro rettile, il crocodilomorfo Dromomeron.&lt;/p&gt;', '/img/dinosaurimg/Coelophysis.jpg', '2018-01-07', 'admin@admin.it'),
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
(26, 'Stegosaurus', '2018-01-07');

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
-- Indici per le tabelle `commentoarticolo`
--
ALTER TABLE `commentoarticolo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcommnentoarticolo` (`idarticolo`),
  ADD KEY `idcommentoarticolotente` (`idutente`);

--
-- Indici per le tabelle `commentodinosauro`
--
ALTER TABLE `commentodinosauro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcommentodinosaurotente` (`idutente`),
  ADD KEY `idcommentodinosauro` (`iddinosauro`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT per la tabella `articolodelgiorno`
--
ALTER TABLE `articolodelgiorno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT per la tabella `commentoarticolo`
--
ALTER TABLE `commentoarticolo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `commentodinosauro`
--
ALTER TABLE `commentodinosauro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `dinosaurodelgiorno`
--
ALTER TABLE `dinosaurodelgiorno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- Limiti per la tabella `commentoarticolo`
--
ALTER TABLE `commentoarticolo`
  ADD CONSTRAINT `idcommentoarticolotente` FOREIGN KEY (`idutente`) REFERENCES `utente` (`email`),
  ADD CONSTRAINT `idcommnentoarticolo` FOREIGN KEY (`idarticolo`) REFERENCES `articolo` (`id`);

--
-- Limiti per la tabella `commentodinosauro`
--
ALTER TABLE `commentodinosauro`
  ADD CONSTRAINT `idcommentodinosauro` FOREIGN KEY (`iddinosauro`) REFERENCES `dinosauro` (`nome`),
  ADD CONSTRAINT `idcommentodinosaurotente` FOREIGN KEY (`idutente`) REFERENCES `utente` (`email`);

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
