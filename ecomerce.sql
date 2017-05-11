-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Jeu 11 Mai 2017 à 22:00
-- Version du serveur :  5.7.15-log
-- Version de PHP :  5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecomerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(10) UNSIGNED NOT NULL,
  `a_username` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`a_id`, `a_username`, `a_email`, `a_pass`) VALUES
(1, 'ilyassking', 'ilyas.ariba@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `article_id` int(10) UNSIGNED NOT NULL,
  `article_prix` float NOT NULL,
  `article_qte` int(255) NOT NULL,
  `cmd_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`article_id`, `article_prix`, `article_qte`, `cmd_id`, `p_id`) VALUES
(8, 80, 1, 4, 1),
(9, 167.62, 7, 4, 7),
(10, 188.37, 9, 5, 9),
(11, 1605.27, 10, 6, 10),
(12, 80, 1, 7, 1),
(13, 80, 1, 8, 1),
(14, 80, 1, 9, 1),
(15, 188.37, 9, 10, 9),
(16, 188.37, 3, 11, 9),
(17, 188.37, 3, 12, 9),
(18, 1605.27, 2, 13, 10),
(19, 188.37, 1, 14, 9),
(20, 80, 2, 15, 1),
(21, 1605.27, 1, 16, 10),
(22, 1605.27, 1, 17, 10),
(23, 188.37, 1, 17, 9),
(24, 167.62, 1, 17, 7),
(25, 80, 1, 17, 1),
(26, 188.37, 1, 18, 9),
(27, 1605.27, 1, 18, 10),
(28, 167.62, 1, 18, 7),
(29, 19700.9, 1, 18, 14),
(30, 188.37, 1, 19, 9);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(10) UNSIGNED NOT NULL,
  `title_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `title_cat`) VALUES
(1, 'vitement'),
(2, 'phones'),
(3, 'ordinateures'),
(4, 'Cuisine &amp; Electrom&eacute;nager'),
(5, 'Mode Femme'),
(6, 'Mode Homme'),
(7, 'Beaut&eacute;, Hygi&egrave;ne &amp; Sant&eacute;'),
(8, 'MAISON &amp; JARDIN');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `c_id` int(10) UNSIGNED NOT NULL,
  `c_nom` varchar(30) NOT NULL,
  `c_prenom` varchar(30) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_pass` varchar(255) NOT NULL,
  `c_sex` varchar(30) NOT NULL,
  `c_avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `c_contry` varchar(30) NOT NULL,
  `c_ville` varchar(30) NOT NULL,
  `c_tele` varchar(30) NOT NULL,
  `c_fax` varchar(30) NOT NULL,
  `c_adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`c_id`, `c_nom`, `c_prenom`, `c_email`, `c_pass`, `c_sex`, `c_avatar`, `c_contry`, `c_ville`, `c_tele`, `c_fax`, `c_adresse`) VALUES
(3, 'ARIBA', 'ILYAS', 'ilyas.ariba@gmail.com', '3691308f2a4c2f6983f2880d32e29c84', 'homme', 'avatar.png', 'MOROCCO', 'RISSANI', '0273548590', '092374859', 'errachidia rue34 , 345'),
(10, 'Ali', 'Alaoui', 'Ali@Alaoui.com', '2ee297f81b8675e0e8a2304412bdcefc', 'homme', 'avatar.png', '', '', '', '', ''),
(11, 'AHMED', 'Ali', 'AHMED.Ali@gmail.com', '4645266533780f7fd23e318adcdb31af', 'homme', 'avatar.png', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE `command` (
  `cmd_id` int(10) UNSIGNED NOT NULL,
  `cmd_date` datetime NOT NULL,
  `cmd_stat` int(30) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `command`
--

INSERT INTO `command` (`cmd_id`, `cmd_date`, `cmd_stat`, `c_id`) VALUES
(4, '2017-02-07 20:39:43', 0, 3),
(5, '2017-02-13 19:47:46', 0, 10),
(6, '2017-02-13 19:49:16', 0, 10),
(7, '2017-02-13 19:53:52', 0, 10),
(8, '2017-02-13 19:53:56', 0, 10),
(9, '2017-02-13 19:53:57', 0, 10),
(10, '2017-02-13 19:55:22', 0, 10),
(11, '2017-02-13 19:59:50', 0, 3),
(12, '2017-02-13 20:00:12', 0, 3),
(13, '2017-02-13 20:02:39', 0, 3),
(14, '2017-02-14 09:37:09', 0, 10),
(15, '2017-02-14 23:19:45', 0, 3),
(16, '2017-02-15 14:08:07', 0, 10),
(17, '2017-02-15 17:59:13', 0, 10),
(18, '2017-02-15 17:59:34', 0, 10),
(19, '2017-02-20 10:11:54', 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `content_comment` text NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `c_id`, `content_comment`, `p_id`) VALUES
(1, 3, 'asdFASDF', 7),
(2, 3, 'sdfasdf', 7),
(3, 3, 'sdfasdf', 7),
(4, 10, 'tres bon qualite', 9),
(5, 10, 'hello', 14),
(6, 10, 'ccc', 9),
(7, 10, 'mauvais produit', 9);

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `nom_detail` varchar(33) NOT NULL,
  `content_detail` varchar(333) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `detail`
--

INSERT INTO `detail` (`id_detail`, `nom_detail`, `content_detail`, `p_id`) VALUES
(1, 'width', '163px', 12),
(2, 'heigth', '123px', 12),
(3, 'design', 'flat', 12),
(4, 'site', 'forum', 12),
(5, 'RAM', '16GB', 13),
(6, 'CPU', '1.40GHz', 13),
(7, 'DESC DUR', '500GB', 13),
(8, 'RAM', '8gb', 14),
(9, 'ecran', '12puce', 14),
(10, 'CPU', 'i5', 14);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_image` int(10) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `nom_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id_image`, `p_id`, `nom_image`) VALUES
(17, 7, 'RFUGMiuOfl.jpg'),
(18, 7, 'hAuCfActTT.jpg'),
(19, 7, 'CL87rPulVv.jpg'),
(20, 8, 'UwIGJSp5WB.jpg'),
(21, 8, 'VPf1I1T0Lg.jpg'),
(22, 8, 'zTwCwvYIsd.jpg'),
(23, 9, 'GTfoN12iIW.jpg'),
(24, 9, 'sEuSnsKx7a.jpg'),
(25, 10, 'vM036BCYKa.jpg'),
(26, 10, 'KrMXwF3Wwn.jpg'),
(27, 10, 'UzPNcP3Dga.jpg'),
(28, 10, 'h6Wz7WzvDl.jpg'),
(29, 11, 'q2C9xWGLuA.jpg'),
(30, 11, '8JgBHqi2BE.jpg'),
(31, 11, 'AwxMB8JEit.jpg'),
(32, 11, 'UB9Diu7cBE.jpg'),
(33, 12, 'LUNflubWCD.png'),
(34, 13, 'R7lSY4Vjba.jpg'),
(35, 14, 'IDcQzbYyMG.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `infos`
--

CREATE TABLE `infos` (
  `tele` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `infos`
--

INSERT INTO `infos` (`tele`, `fax`, `adresse`, `email`, `lang`) VALUES
('+212673390998', '05 435654324', 'Errachidia rue 3, 43 elwaha, rissani, MAROC', 'contact@e-chop.com', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_desc` text NOT NULL,
  `p_prix` float NOT NULL,
  `p_stock` int(11) NOT NULL,
  `p_promo` int(11) NOT NULL DEFAULT '0',
  `p_video` varchar(40) NOT NULL,
  `p_thumb` varchar(40) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`p_id`, `p_title`, `p_desc`, `p_prix`, `p_stock`, `p_promo`, `p_video`, `p_thumb`, `id_cat`) VALUES
(1, 'PANTALONS', 'Conveniently seize leveraged niches via quality data. Phosfluorescently restore end-to-end relationships via compelling quality vectors. Interactively productize.', 200, 5, 60, '1.mp4', 'produit.jpg', 1),
(7, 'Esther Veste - Noir', 'Conveniently seize leveraged niches via quality data. Phosfluorescently restore end-to-end relationships via compelling quality vectors. Interactively productize.', 289, 23, 42, '', 'iBhH2pL454.jpg', 1),
(8, 'HP Transformer Pavilion', 'Conveniently seize leveraged niches via quality data. Phosfluorescently restore end-to-end relationships via compelling quality vectors. Interactively productize.', 3456, 1, 0, '', 'g831m2gGQ1.jpg', 2),
(9, 'Stevens Bottines - Bleu Marine', 'Conveniently seize leveraged niches via quality data. Phosfluorescently restore end-to-end relationships via compelling quality vectors. Interactively productize.', 299, 7, 37, '', 'QiWEKBLQLu.jpg', 3),
(10, 'Infinix Zero 3 X552', 'Conveniently seize leveraged niches via quality data. Phosfluorescently restore end-to-end relationships via compelling quality vectors. Interactively productize.', 2199, 23, 27, '', 'ZRCZxs8JmX.jpg', 1),
(11, 'TAKKAD Pantalon de jogging', 'Conveniently seize leveraged niches via quality data. Phosfluorescently restore end-to-end relationships via compelling quality vectors. Interactively productize.', 169, 34, 12, '', '3AlEgaGOI4.jpg', 2),
(12, 'logo forum', 'Conveniently seize leveraged niches via quality data. Phosfluorescently restore end-to-end relationships via compelling quality vectors. Interactively productize.', 4, 1, 0, '', 'wZO6y0NGn5.png', 3),
(13, 'pc i7 16GB RAM', 'Conveniently seize leveraged niches via quality data. Phosfluorescently restore end-to-end relationships via compelling quality vectors. Interactively productize.', 24060, 2, 17, '', '35ZjKetRtq.jpg', 3),
(14, 'infinix 2017', 'Conveniently seize leveraged niches via quality data. Phosfluorescently restore end-to-end relationships via compelling quality vectors. Interactively productize.', 34563, 2, 43, 'Alan Walker - Alone.mp4', 'QrIxQDvHtJ.jpg', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_id`);

--
-- Index pour la table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`cmd_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Index pour la table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `c_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `command`
--
ALTER TABLE `command`
  MODIFY `cmd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
