-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-11-2018 a las 11:08:16
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `demo_s4_pf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `budgets`
--

DROP TABLE IF EXISTS `budgets`;
CREATE TABLE IF NOT EXISTS `budgets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `type_project_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_project_id` (`type_project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `budgets`
--

INSERT INTO `budgets` (`id`, `user_id`, `type_project_id`, `created_on`, `note`, `state_budget`) VALUES
(52, 35, 2, '2018-11-08 14:44:28', NULL, 'pending'),
(53, 37, 2, '2018-11-08 14:51:35', '2', 'pending'),
(54, 39, 2, '2018-11-08 18:51:45', NULL, 'pending'),
(55, 41, 2, '2018-11-08 18:54:04', NULL, 'pending'),
(56, 43, 2, '2018-11-08 18:58:32', NULL, 'pending'),
(57, 45, 2, '2018-11-08 18:59:04', NULL, 'pending'),
(58, 47, 2, '2018-11-08 19:00:16', NULL, 'pending'),
(59, 49, 2, '2018-11-08 19:04:02', 'asdfgsdfg', 'pending'),
(60, 51, 2, '2018-11-08 19:06:05', NULL, 'pending'),
(61, 53, 2, '2018-11-08 19:07:46', 'asdg', 'pending'),
(62, 43, 2, '2018-11-08 19:16:32', NULL, 'pending'),
(63, 55, 2, '2018-11-08 19:21:29', NULL, 'pending'),
(64, 1, 2, '2018-11-08 19:27:03', NULL, 'pending'),
(65, NULL, 2, '2018-11-08 19:27:42', NULL, 'draft'),
(66, NULL, 2, '2018-11-08 19:31:53', NULL, 'draft'),
(67, NULL, 2, '2018-11-08 19:51:12', NULL, 'draft'),
(68, 55, 2, '2018-11-09 09:10:05', NULL, 'pending'),
(69, 55, 2, '2018-11-09 09:16:30', NULL, 'pending'),
(70, NULL, 2, '2018-11-09 09:37:21', NULL, 'draft');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `budgets_tasks`
--

DROP TABLE IF EXISTS `budgets_tasks`;
CREATE TABLE IF NOT EXISTS `budgets_tasks` (
  `budget_id` bigint(20) NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`budget_id`,`task_id`),
  KEY `IDX_86C89C5F36ABA6B8` (`budget_id`),
  KEY `IDX_86C89C5F8DB60186` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_4C81E852A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id`, `user_id`, `email`, `note`, `created_on`) VALUES
(2, 1, 'admin@admin.com', NULL, '2018-11-03 23:40:07'),
(6, 26, 'prueba@prueba.com', NULL, '2018-11-08 13:17:18'),
(8, 35, '2#2.com', NULL, '2018-11-08 14:50:06'),
(10, 37, '2@2.com', NULL, '2018-11-08 14:51:53'),
(12, 39, 'pepe@admin.com', NULL, '2018-11-08 18:52:29'),
(14, 41, 'a@a.com', NULL, '2018-11-08 18:57:49'),
(16, 43, 'b@b.com', NULL, '2018-11-08 18:58:45'),
(18, 45, 'd@d.com', NULL, '2018-11-08 18:59:15'),
(20, 47, 'd@c.com', NULL, '2018-11-08 19:00:30'),
(22, 49, 'j@j.com', NULL, '2018-11-08 19:04:19'),
(24, 51, '1@b.com', NULL, '2018-11-08 19:06:30'),
(26, 53, 'v@v.com', NULL, '2018-11-08 19:08:02'),
(28, 55, 'hector.franco.aceituno@gmail.com', NULL, '2018-11-08 19:22:00'),
(29, 60, 'pepe.garcia@gmail.com', NULL, '2018-11-08 19:48:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_genders`
--

DROP TABLE IF EXISTS `list_genders`;
CREATE TABLE IF NOT EXISTS `list_genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `list_genders`
--

INSERT INTO `list_genders` (`id`, `name`, `created_on`) VALUES
(1, 'male', '2018-10-22 19:41:14'),
(2, 'femme', '2018-10-22 19:41:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_roles`
--

DROP TABLE IF EXISTS `list_roles`;
CREATE TABLE IF NOT EXISTS `list_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `list_roles`
--

INSERT INTO `list_roles` (`id`, `role`, `created_on`) VALUES
(1, 'ROLE_ADMIN', '2018-10-22 19:41:14'),
(2, 'ROLE_EMPLOYEE', '2018-10-22 19:41:14'),
(3, 'ROLE_COMMERCIAL', '2018-10-22 19:41:14'),
(4, 'ROLE_PROJECT', '2018-10-22 19:41:14'),
(5, 'ROLE_USER', '2018-10-22 19:41:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_state_project`
--

DROP TABLE IF EXISTS `list_state_project`;
CREATE TABLE IF NOT EXISTS `list_state_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `list_state_project`
--

INSERT INTO `list_state_project` (`id`, `name`, `created_on`) VALUES
(1, 'pending', '2018-10-23 19:05:44'),
(2, 'approved', '2018-10-23 19:05:44'),
(4, 'draft', '2018-10-24 11:33:42'),
(5, 'rejected', '2018-10-24 11:33:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_type_project`
--

DROP TABLE IF EXISTS `list_type_project`;
CREATE TABLE IF NOT EXISTS `list_type_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_price` double NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `list_type_project`
--

INSERT INTO `list_type_project` (`id`, `name`, `description`, `image`, `base_price`, `created_on`) VALUES
(1, 'Web Application', 'Web Application', 'files/services/service_desktop.png', 850.5, '2018-10-24 10:21:43'),
(2, 'Desktop Application', 'Desktop Application', 'files/services/service_desktop.png', 925.6, '2018-10-24 10:21:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_type_task`
--

DROP TABLE IF EXISTS `list_type_task`;
CREATE TABLE IF NOT EXISTS `list_type_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_project_id` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `type_project` (`type_project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `list_type_task`
--

INSERT INTO `list_type_task` (`id`, `type_project_id`, `price`, `note`, `name`, `description`, `created_on`) VALUES
(1, 2, 200, 'Lorem fistrum condemor ahorarr qué dise usteer torpedo fistro quietooor.', 'Blog', 'Lorem fistrum condemor ahorarr qué dise usteer torpedo fistro quietooor llevame al sircoo se calle ustée ese que llega a peich. Jarl diodenoo te voy a borrar el cerito está la cosa muy malar te voy a borrar el cerito. Torpedo amatomaa hasta luego Lucas me cago en tus muelas fistro diodeno te voy a borrar el cerito está la cosa muy malar. ', '2018-10-24 13:07:30'),
(2, 1, 200, 'Lorem fistrum condemor ahorarr qué dise usteer torpedo fistro quietooor.', 'Contacto', 'Lorem fistrum condemor ahorarr qué dise usteer torpedo fistro quietooor llevame al sircoo se calle ustée ese que llega a peich. Jarl diodenoo te voy a borrar el cerito está la cosa muy malar te voy a borrar el cerito. Torpedo amatomaa hasta luego Lucas me cago en tus muelas fistro diodeno te voy a borrar el cerito está la cosa muy malar. ', '2018-10-24 13:07:30'),
(3, 2, 200, 'Lorem fistrum condemor ahorarr qué dise usteer torpedo fistro quietooor.', 'Contacto', 'Lorem fistrum condemor ahorarr qué dise usteer torpedo fistro quietooor llevame al sircoo se calle ustée ese que llega a peich. Jarl diodenoo te voy a borrar el cerito está la cosa muy malar te voy a borrar el cerito. Torpedo amatomaa hasta luego Lucas me cago en tus muelas fistro diodeno te voy a borrar el cerito está la cosa muy malar. ', '2018-10-24 13:07:30'),
(4, 1, 200, 'Lorem fistrum condemor ahorarr qué dise usteer torpedo fistro quietooor.', 'Blog', 'Lorem fistrum condemor ahorarr qué dise usteer torpedo fistro quietooor llevame al sircoo se calle ustée ese que llega a peich. Jarl diodenoo te voy a borrar el cerito está la cosa muy malar te voy a borrar el cerito. Torpedo amatomaa hasta luego Lucas me cago en tus muelas fistro diodeno te voy a borrar el cerito está la cosa muy malar. ', '2018-10-24 13:07:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gender_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `year_of_birth` int(11) DEFAULT NULL,
  `timezone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `gender` (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `gender_id`, `image`, `firstname`, `lastname`, `nickname`, `dni`, `birthdate`, `year_of_birth`, `timezone`, `modified_on`, `created_on`) VALUES
(1, 2, NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, '2018-10-22 21:43:00', '2018-10-22 21:43:00'),
(2, 2, NULL, 'commercial', 'commercial', NULL, NULL, NULL, NULL, NULL, '2018-10-22 21:43:00', '2018-10-22 21:43:00'),
(3, 2, NULL, 'employee', 'employee', NULL, NULL, NULL, NULL, NULL, '2018-10-22 21:43:00', '2018-10-22 21:43:00'),
(4, 2, NULL, 'projectManager', 'projectManager', NULL, NULL, NULL, NULL, NULL, '2018-10-22 21:43:00', '2018-10-22 21:43:00'),
(48, NULL, NULL, 'prueba ', 'prueba', NULL, NULL, NULL, NULL, NULL, '2018-11-08 13:17:18', '2018-11-08 13:17:18'),
(73, NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, '2018-11-08 14:50:05', '2018-11-08 14:50:05'),
(74, NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, '2018-11-08 14:51:52', '2018-11-08 14:51:52'),
(76, NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, NULL, NULL, '2', 'a', NULL, NULL, NULL, NULL, NULL, '2018-11-08 18:52:28', '2018-11-08 18:52:28'),
(78, NULL, NULL, '2', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, NULL, NULL, 'a', 'a', NULL, NULL, NULL, NULL, NULL, '2018-11-08 18:57:48', '2018-11-08 18:57:48'),
(80, NULL, NULL, 'a', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, NULL, NULL, 'sd', 'sd', NULL, NULL, NULL, NULL, NULL, '2018-11-08 18:58:44', '2018-11-08 18:58:44'),
(82, NULL, NULL, 'sd', 'sd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, NULL, NULL, 'sdf', 'sdfg', NULL, NULL, NULL, NULL, NULL, '2018-11-08 18:59:14', '2018-11-08 18:59:14'),
(84, NULL, NULL, 'sdf', 'sdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, NULL, NULL, 'sadfg', 'asdfg', NULL, NULL, NULL, NULL, NULL, '2018-11-08 19:00:30', '2018-11-08 19:00:30'),
(86, NULL, NULL, 'sadfg', 'asdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, NULL, NULL, 'sdfasdfg', 'asdgsdfg', NULL, NULL, NULL, NULL, NULL, '2018-11-08 19:04:18', '2018-11-08 19:04:18'),
(88, NULL, NULL, 'sdfasdfg', 'asdgsdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, NULL, NULL, 'asdfg', 'sdgh', NULL, NULL, NULL, NULL, NULL, '2018-11-08 19:06:29', '2018-11-08 19:06:29'),
(90, NULL, NULL, 'asdfg', 'sdgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, NULL, NULL, 'afgadfg', 'agdsdfg', NULL, NULL, NULL, NULL, NULL, '2018-11-08 19:08:01', '2018-11-08 19:08:01'),
(92, NULL, NULL, 'afgadfg', 'agdsdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, NULL, NULL, 'asdg', 'adfg', NULL, NULL, NULL, NULL, NULL, '2018-11-08 19:21:59', '2018-11-08 19:21:59'),
(94, NULL, NULL, 'asdg', 'adfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, NULL, NULL, 'Pepe', 'García', NULL, NULL, NULL, NULL, NULL, '2018-11-08 19:48:22', '2018-11-08 19:48:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `state_project_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `type_project_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `state_project_id` (`state_project_id`),
  KEY `type_project_id` (`type_project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `state_project_id`, `user_id`, `type_project_id`, `created_on`, `note`) VALUES
(1, NULL, NULL, 1, '2018-10-24 08:52:10', NULL),
(2, 4, NULL, 2, '2018-10-24 09:34:48', NULL),
(3, 4, NULL, 2, '2018-10-24 09:39:51', NULL),
(4, 4, NULL, 2, '2018-10-24 09:40:03', NULL),
(5, 4, NULL, 2, '2018-10-24 10:59:49', NULL),
(6, 4, NULL, 1, '2018-10-24 11:00:24', NULL),
(7, 4, NULL, 2, '2018-10-24 11:14:42', NULL),
(8, 4, NULL, 2, '2018-10-24 17:52:23', NULL),
(9, 4, NULL, 1, '2018-10-24 21:27:45', NULL),
(10, 4, NULL, 2, '2018-10-24 21:29:57', NULL),
(11, 4, NULL, 1, '2018-10-25 07:15:54', NULL),
(12, 4, NULL, 1, '2018-10-25 09:43:17', NULL),
(13, 4, NULL, 1, '2018-10-26 07:36:22', NULL),
(14, 4, NULL, 1, '2018-10-26 23:09:00', NULL),
(15, 4, NULL, 2, '2018-10-26 23:09:01', NULL),
(16, 4, NULL, 2, '2018-10-26 23:09:42', NULL),
(17, 4, NULL, 1, '2018-10-26 23:10:35', NULL),
(18, 4, NULL, 2, '2018-10-26 23:20:18', NULL),
(19, 4, NULL, 1, '2018-10-26 23:24:27', NULL),
(20, 4, NULL, 1, '2018-10-27 20:53:34', NULL),
(21, 4, NULL, 2, '2018-10-28 07:56:03', NULL),
(22, 4, NULL, 1, '2018-10-28 08:01:31', NULL),
(23, 4, NULL, 1, '2018-10-28 19:52:54', NULL),
(24, 4, NULL, 2, '2018-10-28 20:02:56', NULL),
(25, 4, NULL, 2, '2018-10-29 10:54:50', NULL),
(26, 4, NULL, 1, '2018-11-03 19:58:37', NULL),
(27, 4, NULL, 2, '2018-11-03 20:32:45', NULL),
(28, 4, NULL, 2, '2018-11-03 20:55:24', NULL),
(29, 4, NULL, 2, '2018-11-03 21:16:12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects_tasks`
--

DROP TABLE IF EXISTS `projects_tasks`;
CREATE TABLE IF NOT EXISTS `projects_tasks` (
  `projects_id` bigint(20) NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`projects_id`,`task_id`),
  KEY `IDX_C5D931A91EDE0F55` (`projects_id`),
  KEY `IDX_C5D931A98DB60186` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects_tasks`
--

INSERT INTO `projects_tasks` (`projects_id`, `task_id`) VALUES
(6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) DEFAULT NULL,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plain_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uniques_fields` (`username`),
  UNIQUE KEY `UNIQ_1483A5E9CCFA12B8` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `profile_id`, `username`, `password`, `plain_password`, `is_active`, `modified_on`, `created_on`) VALUES
(1, 1, 'admin@admin.com', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(3, 2, 'commercial@admin.com', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(4, 3, 'employee@admin.com', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(6, 4, 'projectManagement@admin.com', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(26, 48, 'prueba@prueba.com', '$2y$13$HaWgcxEQTA01dg.ODAZ.KumnQOvMg36svcDr54LitQA2YqHxf9jt.', '1234', 1, '2018-11-08 13:17:18', '2018-11-08 13:17:18'),
(35, 73, '2#2.com', '$2y$13$SXlFlxG0AcGSKomzOKeNd.wFZ.LzImCV1XccNfWv/RYaPbwwzeut2', '|Z|7|!Lf#&_xmJWXLg8C', 1, '2018-11-08 14:50:06', '2018-11-08 14:50:06'),
(37, 75, '2@2.com', '$2y$13$LpZoA/FJNkXxaynPvXljV.kiPH8J/pEJV/UiuqeVEz7q8xxQnLsl.', 'u;cyz\\FnmYs42v:,$Oh+', 1, '2018-11-08 14:51:53', '2018-11-08 14:51:53'),
(39, 77, 'pepe@admin.com', '$2y$13$F5TuPAEUrfwmTdHZW8CDRez.pPhUBYu0knv2Cj3d5rA9Xv50X2kf6', '/#Csp9A&.^:+9gE`Dm~&', 1, '2018-11-08 18:52:29', '2018-11-08 18:52:29'),
(41, 79, 'a@a.com', '$2y$13$u4jRGa4h7GMDzBftEdU7r.7L0ZRfw8H7uWPxY8YnVDqOPXrf/Sj36', '5h@rGc7SKC/}$j00Ux0I', 1, '2018-11-08 18:57:49', '2018-11-08 18:57:49'),
(43, 81, 'b@b.com', '$2y$13$KoAZ5ehPI7fcZVawUfNhauxT/VQdDActxPgTeirNaLZ7UcF9DcXHa', '2ak$|WU):ot^?t.d]__{', 1, '2018-11-08 18:58:45', '2018-11-08 18:58:45'),
(45, 83, 'd@d.com', '$2y$13$ZbfN7rg0yfgRfLDJ1COS9.Tp57eU7m/JsJ4iBxmzsj9q/Sd46qpN6', 'SwCUfGiT>l>vb6<VT>Ck', 1, '2018-11-08 18:59:14', '2018-11-08 18:59:14'),
(47, 85, 'd@c.com', '$2y$13$WTzmm/SByWQJuf3nU0o5w.CpcT4ERmcxP1eJYmJFbOHZJRPHmkq/G', 'Gt#Usg*$g%SQb2DYa>Cg', 1, '2018-11-08 19:00:30', '2018-11-08 19:00:30'),
(49, 87, 'j@j.com', '$2y$13$Xg6Lx9h2k98dHazsgHiT6uzuyb9DRrBG0IhdF3rdBi6Ffv8QVAPKi', '[3?b@sUT02K:u7Fhn?)M', 1, '2018-11-08 19:04:19', '2018-11-08 19:04:19'),
(51, 89, '1@b.com', '$2y$13$v3jSJR1LiIHAqOyapHvBEO9Kw7skW/UPyXbotr8SRsKEwbIBwvZra', 'vSPVouf5q-}0$SgI]NBw', 1, '2018-11-08 19:06:30', '2018-11-08 19:06:30'),
(53, 91, 'v@v.com', '$2y$13$4YLuoinnx5LmAJh6xf0Ck.aEojPk/sLzQySViOcazqM0HLsxh9PLi', 'uk6b<e=Fn3PvO|t>32EA', 1, '2018-11-08 19:08:02', '2018-11-08 19:08:02'),
(55, 93, 'hector.franco.aceituno@gmail.com', '$2y$13$vWP9da8rHKXqgVcw/iOqaOcPKj2GRAyw94.UPjFC4WXqHQk.gN0ru', 'xR9T>@;oDXYgb&*v250F', 1, '2018-11-08 19:22:00', '2018-11-08 19:22:00'),
(60, 113, 'pepe.garcia@gmail.com', '$2y$13$3m85uvzPhBByLktpA3vYxOKbxXOae7UgEWO6/ppMfWv4MTZsbAR5y', '1234', 1, '2018-11-08 19:48:23', '2018-11-08 19:48:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_list_roles`
--

DROP TABLE IF EXISTS `users_list_roles`;
CREATE TABLE IF NOT EXISTS `users_list_roles` (
  `users_id` bigint(20) NOT NULL,
  `list_roles_id` int(11) NOT NULL,
  PRIMARY KEY (`users_id`,`list_roles_id`),
  KEY `IDX_B8C6155067B3B43D` (`users_id`),
  KEY `IDX_B8C6155046AA62A4` (`list_roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_list_roles`
--

INSERT INTO `users_list_roles` (`users_id`, `list_roles_id`) VALUES
(1, 1),
(4, 2),
(3, 3),
(6, 4),
(26, 5),
(35, 5),
(37, 5),
(39, 5),
(41, 5),
(43, 5),
(45, 5),
(47, 5),
(49, 5),
(51, 5),
(53, 5),
(55, 5),
(60, 5);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `FK_DCAA9548A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_DCAA9548B6EC9B9` FOREIGN KEY (`type_project_id`) REFERENCES `list_type_project` (`id`);

--
-- Filtros para la tabla `budgets_tasks`
--
ALTER TABLE `budgets_tasks`
  ADD CONSTRAINT `FK_86C89C5F36ABA6B8` FOREIGN KEY (`budget_id`) REFERENCES `budgets` (`id`),
  ADD CONSTRAINT `FK_86C89C5F8DB60186` FOREIGN KEY (`task_id`) REFERENCES `list_type_task` (`id`);

--
-- Filtros para la tabla `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `FK_4C81E852A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `list_type_task`
--
ALTER TABLE `list_type_task`
  ADD CONSTRAINT `FK_C8BD1246B6EC9B9` FOREIGN KEY (`type_project_id`) REFERENCES `list_type_project` (`id`);

--
-- Filtros para la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `FK_8B308530708A0E0` FOREIGN KEY (`gender_id`) REFERENCES `list_genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `FK_5C93B3A453FACE2C` FOREIGN KEY (`state_project_id`) REFERENCES `list_state_project` (`id`),
  ADD CONSTRAINT `FK_5C93B3A4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_5C93B3A4B6EC9B9` FOREIGN KEY (`type_project_id`) REFERENCES `list_type_project` (`id`);

--
-- Filtros para la tabla `projects_tasks`
--
ALTER TABLE `projects_tasks`
  ADD CONSTRAINT `FK_C5D931A91EDE0F55` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `FK_C5D931A98DB60186` FOREIGN KEY (`task_id`) REFERENCES `list_type_task` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E9CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_list_roles`
--
ALTER TABLE `users_list_roles`
  ADD CONSTRAINT `FK_B8C6155046AA62A4` FOREIGN KEY (`list_roles_id`) REFERENCES `list_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B8C6155067B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
