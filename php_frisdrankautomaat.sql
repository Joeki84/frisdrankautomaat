-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 28 aug 2014 om 13:42
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `php_frisdrankautomaat`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mvc_frisdrank`
--

CREATE TABLE IF NOT EXISTS `mvc_frisdrank` (
  `frisdrankId` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(20) NOT NULL,
  `prijs` int(3) NOT NULL,
  `aantal` int(2) NOT NULL,
  PRIMARY KEY (`frisdrankId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden geëxporteerd voor tabel `mvc_frisdrank`
--

INSERT INTO `mvc_frisdrank` (`frisdrankId`, `naam`, `prijs`, `aantal`) VALUES
(1, 'Coca-Cola', 60, 20),
(2, 'Fanta', 60, 20),
(3, 'Sprite', 60, 19),
(4, 'Chaudfontaine', 50, 20),
(5, 'Minute-Maid', 80, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mvc_gebruiker`
--

CREATE TABLE IF NOT EXISTS `mvc_gebruiker` (
  `gebruikerId` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(50) DEFAULT NULL,
  `wachtwoord` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`gebruikerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `mvc_gebruiker`
--

INSERT INTO `mvc_gebruiker` (`gebruikerId`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'admin', 'a87c9f7493e17b6aaa1b0ff155ce5765');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mvc_geldlade`
--

CREATE TABLE IF NOT EXISTS `mvc_geldlade` (
  `waarde` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `afbeelding` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`waarde`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `mvc_geldlade`
--

INSERT INTO `mvc_geldlade` (`waarde`, `aantal`, `afbeelding`) VALUES
(10, 18, '10cent.gif'),
(20, 5, '20cent.gif'),
(50, 19, '50cent.gif'),
(100, 16, '1euro.gif'),
(200, 9, '2euro.gif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
