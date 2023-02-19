-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 19 fév. 2023 à 01:00
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fp`
--

-- --------------------------------------------------------

--
-- Structure de la table `elements`
--

DROP TABLE IF EXISTS `elements`;
CREATE TABLE IF NOT EXISTS `elements`
(
    `id`         bigint UNSIGNED                         NOT NULL AUTO_INCREMENT,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `unit`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    `price`      double                                  NOT NULL,
    `user_id`    int                                     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 39
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `elements`
--

INSERT INTO `elements` (`id`, `name`, `unit`, `created_at`, `updated_at`, `price`, `user_id`)
VALUES (36, 'machin', 'kilogrammes', '2023-02-19 00:07:57', '2023-02-19 00:07:57', 0.04, 7),
       (37, 'Semoule', 'kilogrammes', '2023-02-19 00:24:14', '2023-02-19 00:24:14', 56, 7),
       (38, 'Agneau', 'kilogrammes', '2023-02-19 00:24:20', '2023-02-19 00:24:20', 4, 7);

-- --------------------------------------------------------

--
-- Structure de la table `element_recette`
--

DROP TABLE IF EXISTS `element_recette`;
CREATE TABLE IF NOT EXISTS `element_recette`
(
    `id`         bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    `recette_id` bigint UNSIGNED NOT NULL,
    `element_id` bigint UNSIGNED NOT NULL,
    `created_at` timestamp       NULL DEFAULT NULL,
    `updated_at` timestamp       NULL DEFAULT NULL,
    `quantity`   float           NOT NULL,
    PRIMARY KEY (`id`),
    KEY `element_recette_recette_id_foreign` (`recette_id`),
    KEY `element_recette_element_id_foreign` (`element_id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 112
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `element_recette`
--

INSERT INTO `element_recette` (`id`, `recette_id`, `element_id`, `created_at`, `updated_at`, `quantity`)
VALUES (110, 20, 38, NULL, NULL, 1),
       (111, 20, 37, NULL, NULL, 2),
       (108, 20, 36, NULL, NULL, 0.05);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs`
(
    `id`         bigint UNSIGNED                         NOT NULL AUTO_INCREMENT,
    `uuid`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `connection` text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `queue`      text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `payload`    longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `exception`  longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `failed_at`  timestamp                               NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inventaires`
--

DROP TABLE IF EXISTS `inventaires`;
CREATE TABLE IF NOT EXISTS `inventaires`
(
    `id`         bigint UNSIGNED                         NOT NULL AUTO_INCREMENT,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `unit`       varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `stock`      double(8, 2)                            NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    `user_id`    int                                     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 14
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inventaires`
--

INSERT INTO `inventaires` (`id`, `name`, `unit`, `stock`, `created_at`, `updated_at`, `user_id`)
VALUES (5, 'poivre', 'kilogrammes', 1.00, '2023-02-17 20:07:19', '2023-02-17 20:07:19', 9),
       (12, 'machin', 'millilitres', 0.02, '2023-02-19 00:08:09', '2023-02-19 00:08:09', 7),
       (13, 'Agneau', 'grammes', 6.00, '2023-02-19 00:24:44', '2023-02-19 00:24:44', 7);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations`
(
    `id`        int UNSIGNED                            NOT NULL AUTO_INCREMENT,
    `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch`     int                                     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 21
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (9, '2014_10_12_100000_create_password_resets_table', 1),
       (10, '2019_08_19_000000_create_failed_jobs_table', 1),
       (11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
       (12, '2023_02_03_163400_create_recettes_table', 1),
       (13, '2023_02_11_211245_create_elements_table', 1),
       (14, '2023_02_11_214937_add_unit_to_elements', 1),
       (15, '2023_02_11_221257_add_relation_to_elements', 1),
       (16, '2023_02_11_223350_add_relations_to_elements', 1),
       (17, '2023_02_11_233609_add_constrainbts_to_elements', 2),
       (18, '2023_02_14_005312_create_users_table', 3),
       (19, '2023_02_16_030311_create_inventaires_table', 4),
       (20, '2023_02_16_235108_create_repas_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets`
(
    `email`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`email`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens`
(
    `id`             bigint UNSIGNED                         NOT NULL AUTO_INCREMENT,
    `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `tokenable_id`   bigint UNSIGNED                         NOT NULL,
    `name`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token`          varchar(64) COLLATE utf8mb4_unicode_ci  NOT NULL,
    `abilities`      text COLLATE utf8mb4_unicode_ci,
    `last_used_at`   timestamp                               NULL DEFAULT NULL,
    `expires_at`     timestamp                               NULL DEFAULT NULL,
    `created_at`     timestamp                               NULL DEFAULT NULL,
    `updated_at`     timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
    KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`)
) ENGINE = MyISAM
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes`
(
    `id`         bigint UNSIGNED                         NOT NULL AUTO_INCREMENT,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    `user_id`    int                                     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 21
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `name`, `created_at`, `updated_at`, `user_id`)
VALUES (20, 'couscous', '2023-02-19 00:16:17', '2023-02-19 00:16:17', 7);

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

DROP TABLE IF EXISTS `repas`;
CREATE TABLE IF NOT EXISTS `repas`
(
    `id`         bigint UNSIGNED NOT NULL AUTO_INCREMENT,
    `created_at` timestamp       NULL DEFAULT NULL,
    `updated_at` timestamp       NULL DEFAULT NULL,
    `date_repas` date            NOT NULL,
    `user_id`    int             NOT NULL,
    `recette_id` int             NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 68
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`id`, `created_at`, `updated_at`, `date_repas`, `user_id`, `recette_id`)
VALUES (66, '2023-02-19 00:25:10', '2023-02-19 00:25:10', '2023-02-19', 7, 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user`
(
    `id`         bigint UNSIGNED                         NOT NULL AUTO_INCREMENT,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password`   varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
) ENGINE = MyISAM
  AUTO_INCREMENT = 10
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`)
VALUES (9, 'S', 'd@d.d', '$2y$10$/GNMlU9nfHh5LGQf.b1DiO8LVcSTs.mSgfRaYal.wboSAtbkDxrbm', '2023-02-17 20:06:42',
        '2023-02-17 20:06:42'),
       (8, 'sasasasa', 'a@a.frs', '$2y$10$JokNCwyGdWvxb1/ozjuL8ugwznBp6xg8b9Sa0T8JoIld.v9EXKAEq', '2023-02-16 01:39:03',
        '2023-02-16 01:39:03'),
       (7, 'saaad', 'a@a.fr', '$2y$10$6.ghITc7LVbOReT2CFErMOpyIfysgfqigoNLk5AXhkD/o1VtVq7S6', '2023-02-15 20:57:34',
        '2023-02-15 20:57:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
