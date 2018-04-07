-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 06 avr. 2018 à 08:49
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lafleur`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `cat_code` char(3) NOT NULL DEFAULT '',
  `cat_libelle` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`cat_code`, `cat_libelle`) VALUES
('bul', 'Bulbes'),
('mas', 'Plantes à massif'),
('ros', 'Rosiers');

-- --------------------------------------------------------

--
-- Structure de la table `clientconnu`
--

DROP TABLE IF EXISTS `clientconnu`;
CREATE TABLE IF NOT EXISTS `clientconnu` (
  `clt_code` varchar(5) NOT NULL DEFAULT '',
  `clt_nom` varchar(30) NOT NULL DEFAULT '',
  `clt_adresse` varchar(50) NOT NULL DEFAULT '',
  `clt_tel` varchar(20) NOT NULL DEFAULT '',
  `clt_email` varchar(50) NOT NULL DEFAULT '',
  `clt_motPasse` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`clt_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clientconnu`
--

INSERT INTO `clientconnu` (`clt_code`, `clt_nom`, `clt_adresse`, `clt_tel`, `clt_email`, `clt_motPasse`) VALUES
('c0001', 'Dupont', '12, rue haute 75001 Paris', '01 05 22 35 97', 'dupont@wanadoo.fr', '47bce5c74f589f4867dbd57e9ca9f808'),
('c0002', 'Dubois', '4, bld d\'Alsace 75002 Paris', '01 44 97 62 54', 'dubois@club-internet.fr', '08f8e0260c64418510cefb2b06eee5cd'),
('c0003', 'Durand', '5, all?e des Ifs 80000 Amiens', '03 22 79 64 56', 'durand@free.fr', '9df62e693988eb4e1e1444ece0578579'),
('admin', 'admin', 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `cde_moment` varchar(20) NOT NULL DEFAULT '',
  `cde_client` varchar(5) NOT NULL DEFAULT '',
  `cde_date` varchar(10) NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`cde_moment`,`cde_client`),
  KEY `FK2` (`cde_client`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `cde_moment` varchar(20) NOT NULL DEFAULT '',
  `cde_client` varchar(5) NOT NULL DEFAULT '',
  `produit` char(3) NOT NULL DEFAULT '',
  `quantite` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cde_moment`,`cde_client`,`produit`),
  KEY `FK4` (`cde_client`),
  KEY `FK5` (`produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `pdt_ref` char(3) NOT NULL DEFAULT '',
  `pdt_designation` varchar(50) NOT NULL DEFAULT '',
  `pdt_prix` decimal(5,2) NOT NULL DEFAULT '0.00',
  `pdt_image` varchar(50) NOT NULL DEFAULT '',
  `pdt_categorie` char(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`pdt_ref`),
  KEY `FK1` (`pdt_categorie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`pdt_ref`, `pdt_designation`, `pdt_prix`, `pdt_image`, `pdt_categorie`) VALUES
('b01', '3 bulbes de bégonias', '5.00', 'bulbes_begonia', 'bul'),
('b02', '10 bulbes de dahlias', '12.00', 'bulbes_dahlia', 'bul'),
('b03', '50 glaïeuls', '9.00', 'bulbes_glaieul', 'bul'),
('m01', 'Lot de 3 marguerites', '5.00', 'massif_marguerite', 'mas'),
('m02', 'Pour un bouquet de 6 pensées', '6.00', 'massif_pensee', 'mas'),
('m03', 'Mélange varié de 10 plantes à massif', '15.00', 'massif_melange', 'mas'),
('r03', 'Rosier arbuste', '8.00', 'rosiers_arbuste', 'ros'),
('r02', 'Une variété sélectionnée pour son parfum', '9.00', 'rosiers_parfum', 'ros'),
('r01', '1 pied spécial grandes fleurs', '20.00', 'rosiers_gdefleur', 'ros'),
('r04', 'Rosier bleu', '13.00', 'rosier_bleu.jpg', 'ros');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
