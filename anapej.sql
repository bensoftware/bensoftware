-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 11 mai 2020 à 13:42
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `anapej`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `libelle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Article 1', '2020-05-01 11:33:05', '2020-05-01 11:37:53', '2020-05-01 11:37:53');

-- --------------------------------------------------------

--
-- Structure de la table `familles`
--

DROP TABLE IF EXISTS `familles`;
CREATE TABLE IF NOT EXISTS `familles` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `has_articles` int(11) NOT NULL DEFAULT '0' COMMENT 'Pour test',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `familles`
--

INSERT INTO `familles` (`id`, `libelle`, `has_articles`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lait', 1, NULL, '2020-03-17 13:40:36', NULL),
(2, 'Thé', 1, NULL, NULL, NULL),
(3, 'Boissons', 0, NULL, '2020-05-01 09:39:57', NULL),
(4, 'Biscuits', 1, NULL, NULL, NULL),
(5, 'Fruits', 1, '2020-02-23 18:09:14', '2020-02-23 18:09:14', NULL),
(6, 'Normale', 0, '2020-02-23 18:12:14', '2020-02-23 18:12:14', NULL),
(7, 'tst', 0, '2020-02-23 22:20:03', '2020-03-17 12:51:11', '2020-03-17 12:51:11'),
(8, 'Riz', 0, '2020-02-23 22:34:58', '2020-02-23 22:34:58', NULL),
(9, 'Champons', 0, '2020-02-23 22:36:52', '2020-02-23 22:36:52', NULL),
(10, 'Savons', 0, '2020-02-23 22:37:35', '2020-02-23 22:37:35', NULL),
(11, 'Huiles', 0, '2020-02-23 22:37:56', '2020-02-23 22:37:56', NULL),
(12, 'Pastels', 0, '2020-02-23 22:38:56', '2020-02-23 22:38:56', NULL),
(13, 'Téléviseurs', 0, '2020-02-23 22:42:45', '2020-02-23 22:42:45', NULL),
(14, 'Brosses', 0, '2020-02-24 00:24:25', '2020-02-24 00:24:25', NULL),
(15, 'Test', 0, '2020-02-28 22:03:47', '2020-02-28 22:03:47', NULL),
(16, 'test2', 0, '2020-02-28 22:28:05', '2020-02-28 22:28:05', NULL),
(17, 'test3', 0, '2020-02-28 22:28:15', '2020-02-28 22:28:15', NULL),
(18, 'test4', 0, '2020-02-28 22:29:48', '2020-02-28 22:29:48', NULL),
(19, 'test9', 0, '2020-02-28 22:30:32', '2020-02-28 22:30:32', NULL),
(20, 'Employeur2', 0, '2020-02-28 22:42:45', '2020-02-28 22:42:45', NULL),
(21, 'Famille22', 0, '2020-02-29 00:17:26', '2020-05-01 11:28:19', '2020-05-01 11:28:19'),
(22, 'tst1', 0, '2020-03-30 16:20:22', '2020-03-30 16:20:22', NULL),
(23, 'Famille 10', 0, '2020-05-01 10:09:22', '2020-05-01 10:09:22', NULL),
(24, 'Famille 11', 0, '2020-05-01 10:38:22', '2020-05-01 10:38:22', NULL),
(25, 'Famille 12', 0, '2020-05-01 10:40:55', '2020-05-01 10:40:55', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sys_droits`
--

DROP TABLE IF EXISTS `sys_droits`;
CREATE TABLE IF NOT EXISTS `sys_droits` (
  `id` int(11) NOT NULL,
  `libelle` varchar(120) NOT NULL,
  `type_acces` int(11) NOT NULL COMMENT 'Tous =0, Consultation=1,Enregestrement=2,Validation=3,Edition=4,Suppression=5, Suivi 6, Annotation 7, Affectation 8',
  `sys_groupes_traitement_id` int(11) NOT NULL,
  `ordre` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `supprimer` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sys_droits`
--

INSERT INTO `sys_droits` (`id`, `libelle`, `type_acces`, `sys_groupes_traitement_id`, `ordre`, `created_at`, `updated_at`, `deleted_at`, `supprimer`) VALUES
(1, 'Gestion d\'administration', 0, 1, 1, NULL, NULL, NULL, 0),
(2, 'Consulter administration', 1, 1, 2, '2020-04-20 13:05:05', NULL, NULL, 0),
(3, 'Supprimer dans l\'administration', 5, 1, 3, '2020-04-20 13:58:30', '2020-04-20 13:58:30', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sys_groupes_traitements`
--

DROP TABLE IF EXISTS `sys_groupes_traitements`;
CREATE TABLE IF NOT EXISTS `sys_groupes_traitements` (
  `id` int(11) NOT NULL,
  `libelle` varchar(120) NOT NULL,
  `ordre` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `supprimer` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sys_groupes_traitements`
--

INSERT INTO `sys_groupes_traitements` (`id`, `libelle`, `ordre`, `created_at`, `updated_at`, `deleted_at`, `supprimer`) VALUES
(1, 'Administration', 1, NULL, NULL, NULL, 0),
(2, 'Référentiels', 1, NULL, NULL, NULL, 0),
(3, 'Statistiques', 1, NULL, NULL, NULL, 0),
(4, 'Demandeurs', 1, NULL, NULL, NULL, 0),
(5, 'Employeurs', 1, NULL, NULL, NULL, 0),
(6, 'Centre de formations', 1, NULL, NULL, NULL, 0),
(7, 'Offres', 1, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sys_profiles`
--

DROP TABLE IF EXISTS `sys_profiles`;
CREATE TABLE IF NOT EXISTS `sys_profiles` (
  `id` int(11) NOT NULL,
  `libelle` varchar(120) NOT NULL,
  `ordre` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sys_profiles`
--

INSERT INTO `sys_profiles` (`id`, `libelle`, `ordre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrateur', 1, NULL, '2020-04-20 12:19:03', NULL),
(2, 'Profile 2', 1, '2020-04-20 12:22:10', '2020-04-20 14:01:03', '2020-04-20 14:01:03'),
(3, 'Profile2', 1, '2020-04-20 14:01:47', '2020-04-20 14:01:47', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sys_profiles_sys_droits`
--

DROP TABLE IF EXISTS `sys_profiles_sys_droits`;
CREATE TABLE IF NOT EXISTS `sys_profiles_sys_droits` (
  `id` int(11) NOT NULL,
  `sys_profile_id` int(11) NOT NULL,
  `sys_droit_id` int(11) NOT NULL,
  `ordre` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sys_profiles_sys_droits`
--

INSERT INTO `sys_profiles_sys_droits` (`id`, `sys_profile_id`, `sys_droit_id`, `ordre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(38, 1, 1, 1, '2020-04-24 22:46:43', '2020-04-24 22:46:43', NULL),
(39, 1, 3, 1, '2020-04-24 22:46:43', '2020-04-24 22:46:43', NULL),
(58, 3, 2, 1, '2020-04-25 15:59:47', '2020-04-25 15:59:47', NULL),
(59, 3, 2, 1, '2020-04-25 15:59:47', '2020-04-25 15:59:47', NULL),
(60, 3, 1, 1, '2020-04-25 15:59:47', '2020-04-25 15:59:47', NULL),
(61, 3, 3, 1, '2020-04-25 15:59:47', '2020-04-25 15:59:47', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sys_profiles_users`
--

DROP TABLE IF EXISTS `sys_profiles_users`;
CREATE TABLE IF NOT EXISTS `sys_profiles_users` (
  `id` int(11) NOT NULL,
  `sys_profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agence_id` int(11) DEFAULT NULL,
  `ordre` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sys_profiles_users`
--

INSERT INTO `sys_profiles_users` (`id`, `sys_profile_id`, `user_id`, `agence_id`, `ordre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 3, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sys_types_users`
--

DROP TABLE IF EXISTS `sys_types_users`;
CREATE TABLE IF NOT EXISTS `sys_types_users` (
  `id` int(11) NOT NULL,
  `libelle` varchar(120) DEFAULT NULL,
  `libelle_ar` varchar(120) DEFAULT NULL,
  `ordre` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
