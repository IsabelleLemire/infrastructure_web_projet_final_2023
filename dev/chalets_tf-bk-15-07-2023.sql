-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 15 juil. 2023 à 16:21
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chalets_tf`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories_location`
--

CREATE TABLE `categories_location` (
  `id` int NOT NULL,
  `categorie` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories_location`
--

INSERT INTO `categories_location` (`id`, `categorie`) VALUES
(1, 'Équipements de plein air'),
(2, 'Loisirs aquatiques'),
(3, 'Accessoires de cuisine'),
(4, 'Divertissement'),
(5, 'Accessoires pour feux de camp ');

-- --------------------------------------------------------

--
-- Structure de la table `chalets`
--

CREATE TABLE `chalets` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `personnes_max` int NOT NULL,
  `prix_haute_saison` int NOT NULL,
  `prix_basse_saison` int NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `promo` tinyint(1) NOT NULL,
  `date_inscription` date NOT NULL,
  `fk_region` int NOT NULL,
  `id_picsum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chalets`
--

INSERT INTO `chalets` (`id`, `nom`, `description`, `personnes_max`, `prix_haute_saison`, `prix_basse_saison`, `actif`, `promo`, `date_inscription`, `fk_region`, `id_picsum`) VALUES
(1, 'Chalet Havre de paix - Centre-du-Québec', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Centre-du-Québec, dans la liste complète des chalets et dans la liste des chalets promo. ', 12, 165, 150, 1, 1, '2023-06-01', 1, 16),
(2, 'Chalet INACTIF - Centre du Québec', 'Magnifique Chalet. Puisqu\'il est inactif, il ne devrait pas s\'afficher sur le site, dans aucune page. ', 4, 110, 100, 0, 1, '2023-06-02', 1, 10),
(3, 'Chalet Havre de paix - Mauricie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Mauricie, dans la liste complète des chalets et dans la liste des chalets promo. ', 14, 132, 120, 1, 1, '2023-06-03', 2, 13),
(4, 'Chalet Havre de paix - Montérégie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Montérégie, dans la liste complète des chalets et dans la liste des chalets promo. ', 10, 209, 190, 1, 1, '2023-06-04', 3, 14),
(5, 'Chalet Havre de paix - Saguenay-Lac-Saint-Jean', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Saguenay-Lac-St-Jean, dans la liste complète des chalets et dans la liste des chalets promo. ', 12, 214, 195, 1, 1, '2023-06-05', 4, 17),
(6, 'Chalet PAS PROMO - Centre du Québec', 'Magnifique chalet pas en promotion.... Il peut s\'afficher dans la liste des chalets de la région Centre-du-Québec et dans la liste complète des chalets. Il ne doit pas appraître sur l\'accueil, ni dans la liste des chalets en promo. ', 6, 165, 150, 1, 0, '2023-06-06', 1, 28),
(7, 'Chalet INACTIF et PAS PROMO - Centre-du-Québec', 'Magnifique Chalet. Puisqu\'il est inactif, il ne devrait pas s\'afficher sur le site, dans aucune page. ', 6, 236, 215, 0, 0, '2023-06-07', 1, 11),
(8, 'Chalet Sérénité - Centre-du-Québec', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Centre-du-Québec, dans la liste complète des chalets et dans la liste des chalets promo.', 8, 248, 225, 1, 1, '2023-07-02', 1, 15),
(9, 'Chalet Sérénité - Mauricie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Mauricie, dans la liste complète des chalets et dans la liste des chalets promo.', 4, 242, 220, 1, 1, '2023-06-09', 2, 12),
(10, 'Chalet Sérénité - Montérégie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Montérégie, dans la liste complète des chalets et dans la liste des chalets promo.', 4, 187, 170, 1, 1, '2023-06-10', 3, 18),
(11, 'Chalet Sérénité - Saguenay-Lac-St-Jean', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Saguenay-Lac-St-Jean, dans la liste complète des chalets et dans la liste des chalets promo.', 8, 110, 100, 1, 1, '2023-06-11', 4, 28),
(12, 'Chalet Le paradis perdu - Centre-du-Québec', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Centre-du-Québec, dans la liste complète des chalets et dans la liste des chalets promo.', 10, 214, 195, 1, 1, '2023-06-12', 1, 37),
(13, 'Chalet Le paradis perdu - Mauricie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Mauricie, dans la liste complète des chalets et dans la liste des chalets promo.', 4, 126, 115, 1, 1, '2023-06-13', 2, 59),
(14, 'Chalet Le paradis perdu - Montérégie', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Montérégie, dans la liste complète des chalets et dans la liste des chalets promo.', 4, 214, 195, 1, 1, '2023-06-14', 3, 71),
(15, 'Chalet Le paradis perdu - Saguenay-Lac-St-Jean', 'Magnifique chalet.... Il peut s\'afficher sur la page d\'accueil (chalets en promo), dans la liste des chalets de la région Saguenay-Lac-St-Jean, dans la liste complète des chalets et dans la liste des chalets promo.', 12, 264, 240, 1, 1, '2023-06-15', 4, 380);

-- --------------------------------------------------------

--
-- Structure de la table `items_location`
--

CREATE TABLE `items_location` (
  `id` int NOT NULL,
  `nom_item` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `description_item` text COLLATE utf8mb4_general_ci NOT NULL,
  `prix_location_par_jour` decimal(10,0) NOT NULL,
  `fk_categorie` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `items_location`
--

INSERT INTO `items_location` (`id`, `nom_item`, `description_item`, `prix_location_par_jour`, `fk_categorie`) VALUES
(1, 'hamac', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis elementum est. Aenean gravida magna ac justo fermentum ultricies eu a elit. Morbi vel eros tortor. Nunc ornare lorem vitae dui cursus, sit amet tempor mauris efficitur. Mauris tristique neque sed risus auctor rhoncus. Suspendisse id faucibus nulla.', 25, 1),
(2, 'chaise pliante', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis elementum est. Aenean gravida magna ac justo fermentum ultricies eu a elit. Morbi vel eros tortor. Nunc ornare lorem vitae dui cursus, sit amet tempor mauris efficitur. Mauris tristique neque sed risus auctor rhoncus. Suspendisse id faucibus nulla.', 5, 1),
(3, 'boussole', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis elementum est. Aenean gravida magna ac justo fermentum ultricies eu a elit. Morbi vel eros tortor. Nunc ornare lorem vitae dui cursus, sit amet tempor mauris efficitur. Mauris tristique neque sed risus auctor rhoncus. Suspendisse id faucibus nulla.', 3, 1),
(4, 'kayaks', 'Suspendisse cursus varius pharetra. Phasellus aliquet vestibulum orci, nec commodo felis finibus at. Sed viverra sagittis tellus. Cras semper enim metus, ac pulvinar ex ullamcorper eget. Nam eget vehicula erat. Ut non turpis tellus. Cras quis faucibus libero.', 50, 2),
(5, 'pédalos', 'Suspendisse cursus varius pharetra. Phasellus aliquet vestibulum orci, nec commodo felis finibus at. Sed viverra sagittis tellus. Cras semper enim metus, ac pulvinar ex ullamcorper eget. Nam eget vehicula erat. Ut non turpis tellus. Cras quis faucibus libero.', 50, 2),
(6, 'gilets de sauvetage', 'Suspendisse cursus varius pharetra. Phasellus aliquet vestibulum orci, nec commodo felis finibus at. Sed viverra sagittis tellus. Cras semper enim metus, ac pulvinar ex ullamcorper eget. Nam eget vehicula erat. Ut non turpis tellus. Cras quis faucibus libero.', 25, 2),
(7, 'ustensiles', 'Morbi congue suscipit ex vitae lobortis. Suspendisse vestibulum lacus eu neque mattis varius. Nullam ac fringilla felis. Pellentesque suscipit accumsan orci, at viverra arcu hendrerit vitae. Mauris volutpat metus eget eleifend pulvinar. Maecenas maximus rhoncus ornare. Phasellus et elit at leo commodo blandit a non metus. Integer ac vehicula lorem.', 5, 3),
(8, 'poêle à fondue', 'Morbi congue suscipit ex vitae lobortis. Suspendisse vestibulum lacus eu neque mattis varius. Nullam ac fringilla felis. Pellentesque suscipit accumsan orci, at viverra arcu hendrerit vitae. Mauris volutpat metus eget eleifend pulvinar. Maecenas maximus rhoncus ornare. Phasellus et elit at leo commodo blandit a non metus. Integer ac vehicula lorem.', 10, 3),
(9, 'machine à café', 'Morbi congue suscipit ex vitae lobortis. Suspendisse vestibulum lacus eu neque mattis varius. Nullam ac fringilla felis. Pellentesque suscipit accumsan orci, at viverra arcu hendrerit vitae. Mauris volutpat metus eget eleifend pulvinar. Maecenas maximus rhoncus ornare. Phasellus et elit at leo commodo blandit a non metus. Integer ac vehicula lorem.', 10, 3),
(10, 'jeux de société	', 'Morbi suscipit, orci laoreet rhoncus fermentum, risus nibh molestie libero, non eleifend metus felis vel mauris. Fusce quis est vel sapien tristique auctor. Praesent eu erat augue.', 5, 4),
(11, 'lecteurs DVD', 'Morbi suscipit, orci laoreet rhoncus fermentum, risus nibh molestie libero, non eleifend metus felis vel mauris. Fusce quis est vel sapien tristique auctor. Praesent eu erat augue.', 5, 4),
(12, 'télévisions', 'Morbi suscipit, orci laoreet rhoncus fermentum, risus nibh molestie libero, non eleifend metus felis vel mauris. Fusce quis est vel sapien tristique auctor. Praesent eu erat augue.', 25, 4),
(13, 'sacs de bûches', 'Curabitur et tincidunt nisl. Phasellus non nisi sodales, egestas est at, tempor magna. Sed ac nisl at metus faucibus tincidunt sit amet ac odio. Donec eu velit interdum, tincidunt erat a, vulputate enim. Morbi sed diam scelerisque felis auctor elementum.', 25, 5),
(14, 'allume-feux', 'Curabitur et tincidunt nisl. Phasellus non nisi sodales, egestas est at, tempor magna. Sed ac nisl at metus faucibus tincidunt sit amet ac odio. Donec eu velit interdum, tincidunt erat a, vulputate enim. Morbi sed diam scelerisque felis auctor elementum.', 5, 5),
(15, 'couvertures d\'extérieur', 'Curabitur et tincidunt nisl. Phasellus non nisi sodales, egestas est at, tempor magna. Sed ac nisl at metus faucibus tincidunt sit amet ac odio. Donec eu velit interdum, tincidunt erat a, vulputate enim. Morbi sed diam scelerisque felis auctor elementum.', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom`) VALUES
(1, 'Centre-du-Québec'),
(2, 'Mauricie'),
(3, 'Montérégie'),
(4, 'Saguenay–Lac-Saint-Jean ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories_location`
--
ALTER TABLE `categories_location`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chalets`
--
ALTER TABLE `chalets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chalets_regions` (`fk_region`);

--
-- Index pour la table `items_location`
--
ALTER TABLE `items_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_categories_location` (`fk_categorie`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories_location`
--
ALTER TABLE `categories_location`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `chalets`
--
ALTER TABLE `chalets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `items_location`
--
ALTER TABLE `items_location`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chalets`
--
ALTER TABLE `chalets`
  ADD CONSTRAINT `chalets_regions` FOREIGN KEY (`fk_region`) REFERENCES `regions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `items_location`
--
ALTER TABLE `items_location`
  ADD CONSTRAINT `items_categories_location` FOREIGN KEY (`fk_categorie`) REFERENCES `categories_location` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
