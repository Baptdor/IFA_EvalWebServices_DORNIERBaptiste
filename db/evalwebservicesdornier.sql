-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 07 mai 2021 à 14:57
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evalwebservicesdornier`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) DEFAULT NULL,
  `redacteur_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume_court` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E66BCF5E72D` (`categorie_id`),
  KEY `IDX_23A0E66764D0490` (`redacteur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `categorie_id`, `redacteur_id`, `titre`, `resume_court`, `description`) VALUES
(1, 2, 1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eleifend metus nibh, a laoreet ligula tristique placerat. Praes...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eleifend metus nibh, a laoreet ligula tristique placerat. Praesent id odio ipsum. Vivamus mattis, quam non dapibus facilisis, sapien tortor eleifend orci, non luctus eros nunc nec elit. Curabitur a metus a lectus malesuada ornare. Quisque massa erat, tincidunt convallis sollicitudin id, interdum ac sem. Sed non ante finibus metus blandit consectetur. Pellentesque vel nunc auctor, pharetra mi sit amet, rutrum nunc.\r\n       \r\nQuisque vehicula in tortor at consectetur. Duis sit amet malesuada nisi. Ut gravida, dolor id consequat cursus, urna lectus consequat dui, at consectetur neque sapien ac tellus. Vivamus aliquam tortor a placerat varius. Suspendisse sagittis, sapien eget varius tristique, neque urna imperdiet ligula, in accumsan felis erat egestas sapien. Ut a scelerisque nulla. Etiam commodo, metus sed auctor faucibus, lectus velit auctor dolor, vitae condimentum felis lorem nec purus. Vestibulum eleifend, arcu vitae faucibus egestas, lacus turpis malesuada tortor, eu fringilla purus erat ut massa. Morbi id elementum leo, eget imperdiet dolor. Aenean diam nulla, tincidunt a luctus a, volutpat nec tortor. Quisque ac justo purus. Nam eget blandit diam.\r\n\r\nSuspendisse tempor tempor hendrerit. Sed tempus dui lacinia posuere viverra. Maecenas sodales justo lacus, eu lobortis magna facilisis pulvinar. Vestibulum non elementum purus, et ultricies leo. Maecenas dictum consectetur est, ut molestie neque tristique id. Vestibulum egestas nulla eu lorem fringilla, nec condimentum tortor lacinia. Nunc dictum nulla porttitor pulvinar feugiat. Suspendisse potenti. Etiam interdum felis sed sodales facilisis. Nulla turpis libero, egestas id rhoncus sit amet, lobortis sit.'),
(21, 3, 2, 'Nam sit amet convallis tortor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis justo placerat orci hendrerit volutpat. Ut blandit conva...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis justo placerat orci hendrerit volutpat. Ut blandit convallis dapibus. Vestibulum tincidunt erat nec aliquam molestie. Donec aliquam dui vel tempor pulvinar. Vestibulum eu nisi non metus finibus facilisis. Praesent pharetra eu lectus ac congue. Donec pharetra lectus orci, vitae laoreet quam pulvinar in. Nullam euismod nisi justo, euismod congue urna lobortis sit amet.\r\n\r\nSuspendisse dolor leo, sollicitudin et felis pellentesque, tincidunt tempus dui. Sed consequat eleifend ipsum sit amet condimentum. Curabitur sagittis felis ac mi pulvinar ullamcorper. Cras quis porta magna. Proin rhoncus condimentum elit, at placerat purus rhoncus et. Ut leo mauris, tempor eu luctus vel, accumsan sit amet ante. Nulla ullamcorper interdum nisi. Pellentesque facilisis varius ligula, id iaculis nisi lacinia quis. Sed egestas sollicitudin fringilla. Aliquam auctor, quam ac malesuada mattis, dolor nunc efficitur magna, sed tincidunt magna elit a massa. Sed imperdiet ligula malesuada tellus tincidunt pellentesque. Praesent placerat est enim, in suscipit nunc tincidunt a. Vestibulum cursus nec nisi et placerat. Aenean nec quam est. Integer et nunc id sem porta pellentesque vel vel massa. Duis in sagittis odio.\r\n\r\nDonec elit tortor, congue et ultricies condimentum, elementum ut dui. Vestibulum volutpat felis nisi, sit amet imperdiet tellus laoreet sit amet. Aliquam eleifend lacinia mi, id convallis neque. Nulla tempor congue magna non consectetur. Suspendisse condimentum cursus lorem, ac accumsan orci sodales id. Mauris vel nibh in nibh egestas congue ut ut est. Etiam sit amet est arcu. Mauris in nisi in velit dapibus ultricies at.'),
(22, 1, 1, 'Nullam dictum bibendum orci', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut posuere metus. Integer placerat, enim vitae malesuada venena...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut posuere metus. Integer placerat, enim vitae malesuada venenatis, ex turpis sollicitudin libero, ac auctor magna turpis id nulla. Curabitur ut enim purus. Nunc ultricies, ipsum vitae finibus facilisis, tortor ex fringilla ligula, id consectetur lectus neque sit amet leo. Nam dictum cursus aliquet. Suspendisse venenatis in dolor nec gravida. Proin vulputate dolor non lectus egestas placerat. Aenean vitae imperdiet mauris. Nulla dapibus ipsum non dui varius sodales. Morbi gravida leo augue, at elementum augue pharetra sit amet. Ut interdum lectus ante, dapibus sagittis risus aliquam ut. Praesent lobortis blandit ante congue interdum. Cras faucibus rutrum nisl, non eleifend magna mattis et. Nulla molestie cursus ligula, in euismod eros faucibus sit amet.\r\n\r\nNulla finibus quam at lacus fringilla laoreet. Fusce rutrum, odio sollicitudin consectetur efficitur, sem neque varius velit, ut sodales mauris risus vitae enim. Ut ligula nibh, condimentum non scelerisque vitae, vulputate ut nibh. Nulla molestie ante eu nisi facilisis, id viverra nisi vulputate. Etiam ultricies, lacus vel tempor pretium, felis est sollicitudin enim, non sollicitudin tortor ipsum egestas nisl. Suspendisse potenti. Curabitur vel augue vehicula, hendrerit purus sed, vulputate ipsum. Phasellus sit amet mi fringilla nisl auctor hendrerit. Vestibulum vestibulum consectetur euismod. In venenatis erat ligula, id efficitur elit vestibulum vitae. Donec et ornare elit.\r\n\r\nPellentesque tempor velit eu arcu scelerisque bibendum. Aenean quam orci, cursus eu dolor sed, condimentum sagittis urna. Maecenas pellentesque imperdiet congue. Cras vitae dui nec est viverra dignissim. Nulla non risus ipsum. Morbi vehicula.');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Cuisine'),
(2, 'Cinéma'),
(3, 'Littérature'),
(4, 'Faits divers');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210507071032', '2021-05-07 07:10:42', 131);

-- --------------------------------------------------------

--
-- Structure de la table `redacteur`
--

DROP TABLE IF EXISTS `redacteur`;
CREATE TABLE IF NOT EXISTS `redacteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `redacteur`
--

INSERT INTO `redacteur` (`id`, `nom`, `prenom`, `email`) VALUES
(1, 'DORNIER', 'Baptiste', 'dornier.baptiste@gmail.com'),
(2, 'DOE', 'John', 'doe.john@gmail.com');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E66764D0490` FOREIGN KEY (`redacteur_id`) REFERENCES `redacteur` (`id`),
  ADD CONSTRAINT `FK_23A0E66BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
