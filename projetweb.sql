-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Juin 2014 à 10:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `loginAdmin` varchar(255) NOT NULL,
  `mdpAdmin` varchar(40) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `loginAdmin`, `mdpAdmin`) VALUES
(1, 'CallMeGod', 'Iamanadministrator');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `nomArticle` varchar(255) NOT NULL,
  `descripArticle` varchar(16000) NOT NULL,
  `prixArticle` float NOT NULL,
  `nbStockArticle` int(11) NOT NULL,
  `etatArticle` enum('disponible','nouveauté','hors stock') NOT NULL,
  `dateArticle` datetime NOT NULL,
  `auteurArticle` varchar(255) NOT NULL,
  `addrImgArticle` varchar(255) NOT NULL,
  `idType` int(11) NOT NULL,
  `editeurArticle` varchar(255) NOT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `idType` (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idArticle`, `nomArticle`, `descripArticle`, `prixArticle`, `nbStockArticle`, `etatArticle`, `dateArticle`, `auteurArticle`, `addrImgArticle`, `idType`, `editeurArticle`) VALUES
(1, 'Ghost Stories', 'CD (19 mai 2014)\r\n', 15.96, 5, 'disponible', '2014-06-23 10:00:00', 'coldplay', 'Image_CD/GhostStoriesbyColdplay.jpg', 1, ''),
(2, 'La Bande a Renaud', 'CD (9 juin 2014)\nLabel: UNIVERSAL\nASIN : B00K0NDTWI', 22.99, 30, 'nouveauté', '2014-06-23 10:20:00', 'Benjamin Biolay (Artiste), Bénabar (Artiste), Carla Bruni (Artiste), Coeur de Pirate (Artiste), Disiz (Artiste)', 'Image_CD/La_bande_%C3%A0_renaud.png', 1, ''),
(3, 'Racine Carrée (Boitier Cristal)', 'CD (19 août 2013)\r\nLabel: Vertigo\r\nASIN : B00DQVSTI0', 19.99, 20, 'disponible', '2014-06-23 10:34:00', 'Stromae', 'Image_CD/stromae_racine_carree.jpg', 1, ''),
(4, 'Ultraviolence - Edition Deluxe', 'CD (16 juin 2014)\r\nLabel: Polydor\r\nASIN : B00K5T1LXG', 19.99, 20, 'nouveauté', '2014-06-23 12:14:00', 'Lana Del Rey', 'Image_CD/ultraviolence_edition_deluxe.jpg', 1, ''),
(6, 'Mini World', 'CD (24 février 2014)\r\nLabel: Capitol\r\nASIN : B00HSOXKD0', 19.99, 20, 'disponible', '2014-06-23 13:25:00', 'Indila', 'Image_CD/Mini_World.jpg', 1, ''),
(8, 'The Hunting Party', 'CD (16 juin 2014)\r\nLabel: Warner Bros\r\nASIN : B00K03VZ1K', 19.99, 20, 'disponible', '2014-06-23 13:46:00', 'Linkin Park', 'Image_CD/linkin_park_the_hunting_party.jpg', 1, ''),
(9, 'Combats Ordinaires', 'CD (2 juin 2014)\r\nLabel: Sony Music Catalogue\r\nASIN : B00JQCE5AE', 21.99, 10, 'disponible', '2014-06-23 14:21:14', 'Yannick Noah', 'Image_CD/YannickNoah_MaCol%C3%A8re.jpg', 1, ''),
(10, 'Merci Serge Reggiani', 'CD (19 mai 2014)\r\nLabel: UNIVERSAL\r\nASIN : B00JJ6QE6K', 16.99, 20, 'disponible', '2014-06-23 14:44:36', 'Isabelle Boulay', 'Image_CD/Reggiani_CD_FR_05.jpg', 1, ''),
(11, 'Last Dance', 'CD (17 juin 2014)\r\nLabel: ADELPHI\r\nASIN : B00JQHOFD6', 16.99, 10, 'nouveauté', '2014-06-23 15:30:00', 'Keith Jarrett, Charlie Haden, Keith Jarrett & Charlie Haden', 'Image_CD/Last_danse.jpg', 1, ''),
(12, 'Chaleur Humaine', 'CD (2 juin 2014)\r\nLabel: WEA\r\nASIN : B00JOOT7IO', 12.99, 10, 'nouveauté', '2014-06-23 14:43:24', 'Christine and the Queens', 'Image_CD/Christine-and-The-Queens.jpg', 1, ''),
(13, 'True Detective - Saison 1', 'Acteurs : Matthew McConaughey, Woody Harrelson, Michelle Monaghan, Michael Potts, Tory Kittles\r\nRéalisateurs : Cary Fukunaga\r\nFormat : Couleur, Plein écran, Cinémascope, PAL\r\nAudio : Tchèque (Dolby Digital 2.0), Anglais (Dolby Digital 5.1), Polonais (Dolb', 30.99, 20, 'nouveauté', '2014-06-23 13:23:23', 'Matthew McConaughey (Acteur), Woody Harrelson (Acteur), Cary Fukunaga (Réalisateur)', 'Image_DVD/True_Detective_Saison_1.jpg', 2, ''),
(15, 'Game of Thrones (Le Trône de Fer) - Saison 4 [Blu-ray]', 'Acteurs : Peter Dinklage, Emilia Clarke, Kit Harrington\r\nRéalisateurs : David Benioff\r\nStudio : Warner\r\nASIN: B00L1B60LA', 60.69, 30, 'nouveauté', '2014-06-23 13:40:18', 'Peter Dinklage (Acteur), Emilia Clarke (Acteur), David Benioff (Réalisateur) ', 'Image_DVD/Game_of_Thrones_Saison_4.JPG', 2, ''),
(16, 'House of cards - Saison 2 DVD + DIGITAL Ultraviolet', 'Acteurs : Kevin Spacey, Robin Wright, Michael Kelly, Mahershala Ali, Kate Mara\r\nRéalisateurs : Robin Wright, Carl Franklin, James Foley, John David Coles, Jodie Foster\r\nFormat : Couleur, PAL\r\nAudio : Anglais (Dolby Digital 5.1), Français (Dolby Digital 5.', 30.96, 20, 'nouveauté', '2014-06-16 00:00:00', 'Acteurs : Kevin Spacey, Robin Wright, Michael Kelly, Mahershala Ali, Kate Mara\r\nRéalisateurs : Robin Wright, Carl Franklin, James Foley, John David Coles, Jodie Foster', 'Image_DVD/dvd-house-of-cards-saison-1.jpg', 2, ''),
(17, 'Supercondriaque', 'Acteurs : Dany Boon, Kad Merad, Alice Pol, Jean-Yves Berteloot, Judith El Zein\r\nRéalisateurs : Dany Boon\r\nFormat : Couleur, Plein écran, Cinémascope, PAL\r\nAudio : Français (Dolby Digital 5.1)\r\nRégion : Région 2 (Ce DVD ne pourra probablement pas être visu', 20.99, 20, 'nouveauté', '2014-06-23 00:00:00', 'Dany Boon (Acteur), Kad Merad (Acteur), Dany Boon (Réalisateur)', 'Image_DVD/Supercondriaque.jpg', 2, ''),
(18, 'Dexter - Saison 8 (la saison finale complète)', 'Acteurs : Michael C. Hall, Jennifer Carpenter, Desmond Harrington, C.S. Lee, David Zayas\r\nRéalisateurs : Michael C. Hall, Keith Gordon, Ernest R. Dickerson, Stefan Schwartz, Romeo Tirone\r\nFormat : Couleur, Plein écran, Cinémascope, PAL\r\nAudio : Allemand (', 39.99, 20, 'disponible', '2014-06-23 13:00:00', 'Michael C. Hall (Acteur), Jennifer Carpenter (Acteur), Michael C. Hall (Réalisateur), Keith Gordon (Réalisateur)', 'Image_DVD/Dexter_Saison%208.jpg', 2, ''),
(19, 'Pompéi - Combo Blu-ray 3D + Blu-ray 2D', 'Acteurs : Kit Harington, Carrie-Anne Moss, Emily Browning, Adewale Akinnuoye-Agbaje, Jessica Lucas\r\nRéalisateurs : Paul W.S. Anderson\r\nFormat : Couleur, Cinémascope\r\nAudio : Anglais (DTS-HD 5.1), Français (DTS-HD 5.1)\r\nSous-titres : Français\r\nSous-titres ', 29.99, 30, 'nouveauté', '2014-06-23 16:19:00', 'Kit Harington (Acteur), Carrie-Anne Moss (Acteur), Paul W.S. Anderson (Réalisateur)', 'Image_DVD/Pomp%C3%A9i_Combo.jpg', 2, ''),
(20, 'La Grande aventure Lego', 'Acteurs : Arnaud Ducret, Chris Pratt, Tal, Will Ferrell, Elizabeth Banks\r\nRéalisateurs : Phil Lord, Christopher Miller\r\nFormat : Couleur, Plein écran, Cinémascope, PAL\r\nAudio : Islandais (Dolby Digital 5.1), Anglais (Dolby Digital 5.1), Français (Dolby Di', 29.99, 10, 'nouveauté', '2014-06-23 00:00:00', 'Arnaud Ducret (Acteur), Chris Pratt (Acteur), Phil Lord (Réalisateur), Christopher Miller (Réalisateur)', 'Image_DVD/La_Grande_aventure_Lego.jpg', 2, ''),
(21, 'Man of Steel - Blu-Ray + DIGITAL Ultraviolet', 'Acteurs : Henry Cavill, Amy Adams, Michael Shannon, Diane Lane, Russell Crowe\nRéalisateurs : Zack Snyder\nFormat : Couleur, Cinémascope\nAudio : Anglais (DTS-HD 7.1), Italien (Dolby Digital 5.1), Français (Dolby Digital 5.1), Espagnol (Dolby Digital 5.1)', 19.99, 10, 'nouveauté', '2014-06-23 00:00:00', 'Henry Cavill (Acteur), Amy Adams (Acteur), Zack Snyder (Réalisateur)', 'Image_DVD/Man_of_Steel.jpeg', 2, ''),
(22, 'Qu''est-ce qu''on a fait au Bon Dieu ?', 'Acteurs : Christian Clavier, Chantal Lauby, Ary Abittan, Medi Sadoun, Frédéric Chau\r\nRéalisateurs : Philippe de Chauveron\r\nFormat : PAL\r\nAudio : Français (Dolby Digital 2.0), Français (Dolby Digital 5.1)\r\nRégion : Région 2 (Ce DVD ne pourra probablement p', 29.99, 10, 'nouveauté', '2014-06-23 00:00:00', 'Christian Clavier (Acteur), Chantal Lauby (Acteur), Philippe de Chauveron (Réalisateur)', 'Image_DVD/Qu''est-ce_qu''on_a_fait_au_Bon_Dieu.jpg', 2, ''),
(23, 'Godzilla [Blu-ray 3D]', '', 39.99, 20, 'nouveauté', '2014-06-23 00:00:00', 'Aaron Taylor-Johnson (Acteur), Bryan Cranston (Acteur), Gareth Edwards (Réalisateur)', 'Image_DVD/Godzilla.jpg', 2, ''),
(24, 'Maléfique - Combo Blu-ray 3D', 'Acteurs : Angelina Jolie, Elle Fanning\r\nRéalisateurs : Robert Stromberg\r\nStudio : Disney\r\nASIN: B00HYJRHKQ', 29.99, 10, 'nouveauté', '2014-06-23 00:00:00', 'Acteurs : Angelina Jolie, Elle Fanning\r\nRéalisateurs : Robert Stromberg', 'Image_DVD/Mal%C3%A9fique_Combo.jpg', 2, ''),
(25, 'X-Men : Days of Future Past [Blu-ray 3D]', 'Acteurs : Hugh Jackman, James McAvoy, Michael Fassbender, Jennifer Lawrence, Ian McKellen\r\nRéalisateurs : Bryan Singer\r\nAudio : Anglais (DTS-HD 5.1), Français (DTS 5.1)\r\nSous-titres : Français, Anglais\r\nRégion : Région B/2 (Plus d''informations sur les for', 30.99, 20, 'nouveauté', '2014-06-23 00:00:00', 'Acteurs : Hugh Jackman, James McAvoy, Michael Fassbender, Jennifer Lawrence, Ian McKellen\r\nRéalisateurs : Bryan Singer', 'Image_DVD/X-Men_Days_of_Future_Past.jpg', 2, ''),
(26, 'Edge of Tomorrow - Blu-ray 3D + Blu-ray + Digital Ultraviolet', 'Acteurs : Tom Cruise, Emily Blunt\r\nRéalisateurs : Doug Liman\r\nDate de sortie du DVD : 4 octobre 2014\r\nASIN: B00KQH1ZF6', 29.99, 0, 'nouveauté', '2014-06-23 00:00:00', 'Acteurs : Tom Cruise, Emily Blunt\r\nRéalisateurs : Doug Liman', 'Image_DVD/Edge_of_Tomorrow.jpg', 2, '');

-- --------------------------------------------------------

--
-- Structure de la table `articlecommande`
--

CREATE TABLE IF NOT EXISTS `articlecommande` (
  `idArticle` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `qteArticleCommande` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`,`idCommande`),
  KEY `idCommande` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `articlegenre`
--

CREATE TABLE IF NOT EXISTS `articlegenre` (
  `idArticle` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`,`idGenre`),
  KEY `idGenre` (`idGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articlegenre`
--

INSERT INTO `articlegenre` (`idArticle`, `idGenre`) VALUES
(19, 1),
(21, 1),
(23, 1),
(24, 1),
(26, 1),
(20, 2),
(19, 5),
(20, 5),
(21, 5),
(23, 5),
(17, 10),
(22, 10),
(13, 17),
(16, 17),
(18, 17),
(15, 22),
(21, 22),
(24, 22),
(23, 46),
(24, 46),
(26, 46),
(15, 52),
(16, 52),
(18, 52),
(13, 53),
(18, 53),
(3, 113),
(11, 119),
(1, 129),
(4, 129),
(6, 129),
(8, 129),
(12, 129),
(2, 131),
(6, 131),
(9, 131),
(10, 131),
(12, 131);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` datetime NOT NULL,
  `statutCommande` enum('en cours','prête','envoyée') DEFAULT NULL,
  `qteCommande` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `addrLivraison` varchar(255) NOT NULL,
  `cpLivraison` varchar(5) NOT NULL,
  `villeLivraison` varchar(255) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `idGenre` int(11) NOT NULL AUTO_INCREMENT,
  `nomGenre` varchar(255) NOT NULL,
  `idType` int(11) NOT NULL,
  PRIMARY KEY (`idGenre`,`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=132 ;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`idGenre`, `nomGenre`, `idType`) VALUES
(1, 'Action', 0),
(2, 'Animation', 0),
(3, 'Arts', 0),
(4, 'Arts Martiaux', 0),
(5, 'Aventure', 0),
(6, 'Ballet', 0),
(7, 'Biopic', 0),
(8, 'Chorégraphie', 0),
(9, 'Classique', 0),
(10, 'Comédie', 0),
(11, 'Court-métrage', 0),
(12, 'Culinaire', 0),
(13, 'Danse contemporaine', 0),
(14, 'Découverte', 0),
(15, 'Divers', 0),
(16, 'Documentaire', 0),
(17, 'Drame - Comédie drama.', 0),
(18, 'Enquête', 0),
(19, 'Epouvante - Horreur', 0),
(20, 'Espionnage', 0),
(21, 'Famille', 0),
(22, 'Fantastique', 0),
(23, 'Fiction', 0),
(24, 'Film Noir', 0),
(25, 'Gore', 0),
(26, 'Guerre', 0),
(27, 'Historique', 0),
(28, 'Humour', 0),
(29, 'Intéractif', 0),
(30, 'Judiciaire', 0),
(31, 'Litterature', 0),
(32, 'Manga', 0),
(33, 'Musical', 0),
(34, 'Nanar', 0),
(35, 'Nature', 0),
(36, 'Opéra', 0),
(37, 'Opéra Rock', 0),
(38, 'Pédagogie', 0),
(39, 'Péplum', 0),
(40, 'Philosophie', 0),
(41, 'Policier', 0),
(42, 'Politique - Géopolitique', 0),
(43, 'Religions - Croyances', 0),
(44, 'Romance', 0),
(45, 'Santé - Bien-être', 0),
(46, 'Science fiction', 0),
(47, 'Sciences - Technologies', 0),
(48, 'Société', 0),
(49, 'Sports - Loisirs', 0),
(50, 'Télé-Réalité', 0),
(51, 'Théatre', 0),
(52, 'Thriller', 0),
(53, 'Variétés TV', 0),
(54, 'Voyages - Tourisme', 0),
(55, 'Western', 0),
(101, 'Black metal', 0),
(102, 'Blues', 0),
(103, 'Classique', 0),
(104, 'Compilation', 0),
(105, 'Country', 0),
(106, 'Dance Pop', 0),
(107, 'Dark Metal', 0),
(108, 'Death metal', 0),
(109, 'Disco', 0),
(110, 'Divers', 0),
(111, 'Doom Metal', 0),
(112, 'Dubstep', 0),
(113, 'Electro', 0),
(114, 'Hard Core', 0),
(115, 'Hard Rock', 0),
(116, 'Hip-Hop', 0),
(117, 'House', 0),
(118, 'Industriel', 0),
(119, 'Jazz', 0),
(120, 'Metal', 0),
(121, 'Musiques du monde', 0),
(122, 'Old School', 0),
(123, 'Pop Rock', 0),
(124, 'Punk', 0),
(125, 'Rap', 0),
(126, 'Reggae', 0),
(127, 'Relaxation', 0),
(128, 'Remix', 0),
(129, 'Rock', 0),
(130, 'Techno', 0),
(131, 'Variété française', 0);

-- --------------------------------------------------------

--
-- Structure de la table `typearticle`
--

CREATE TABLE IF NOT EXISTS `typearticle` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `nomType` varchar(255) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typearticle`
--

INSERT INTO `typearticle` (`idType`, `nomType`) VALUES
(1, 'CD'),
(2, 'DVD');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `loginUser` varchar(255) NOT NULL,
  `nomUser` varchar(255) NOT NULL,
  `pnomUser` varchar(255) NOT NULL,
  `mdpUser` varchar(40) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `addrUser` varchar(255) NOT NULL,
  `cpUser` varchar(5) NOT NULL,
  `villeUser` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `loginUser`, `nomUser`, `pnomUser`, `mdpUser`, `emailUser`, `addrUser`, `cpUser`, `villeUser`) VALUES
(1, 'the_kid', 'dejoncheere', 'stéphane', '604ca285bce4223bb1e2cefc4c6fc52fc147abc1', 'stephane.dejoncheere@viacesi.fr', 'nope', '0', 'nope'),
(2, 'test', 'Test', 'Test', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'sdhgsfdjg@fgfdsgdsf.ds', '1 rue du test', '51100', 'Test'),
(3, 'switch', 'Viot', 'Sebastien', '8f6dee384b6d4e9a885d3c6f4c6a1e0f01070b05', 'sebastien.viot@gmail.com', '', '', ''),
(4, 'KxL', 'Le Brun', 'Jordan', 'e17b98ee65b4527b60f68b721fe10ec60a5c8ca3', 'jecpas@gmail.com', '', '', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typearticle` (`idType`);

--
-- Contraintes pour la table `articlecommande`
--
ALTER TABLE `articlecommande`
  ADD CONSTRAINT `articlecommande_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `articlecommande_ibfk_2` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`);

--
-- Contraintes pour la table `articlegenre`
--
ALTER TABLE `articlegenre`
  ADD CONSTRAINT `articlegenre_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `articlegenre_ibfk_2` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
