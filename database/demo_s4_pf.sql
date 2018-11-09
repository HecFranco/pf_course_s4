-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-11-2018 a las 00:02:33
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id`, `user_id`, `email`, `note`, `created_on`) VALUES
(1, NULL, 'aguaviva@aguaviva.com', NULL, NULL),
(2, NULL, 'admin@admin.com', NULL, '2018-11-03 23:40:07'),
(3, 12, 'jaja@jaja.com', NULL, '2018-11-03 23:41:34');

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
  `name` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `base_price` float NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `price` float NOT NULL,
  `note` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `type_project` (`type_project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `gender_id`, `image`, `firstname`, `lastname`, `nickname`, `dni`, `birthdate`, `year_of_birth`, `timezone`, `modified_on`, `created_on`) VALUES
(1, 2, NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, '2018-10-22 21:43:00', '2018-10-22 21:43:00'),
(2, 2, NULL, 'commercial', 'commercial', NULL, NULL, NULL, NULL, NULL, '2018-10-22 21:43:00', '2018-10-22 21:43:00'),
(3, 2, NULL, 'employee', 'employee', NULL, NULL, NULL, NULL, NULL, '2018-10-22 21:43:00', '2018-10-22 21:43:00'),
(4, 2, NULL, 'projectManager', 'projectManager', NULL, NULL, NULL, NULL, NULL, '2018-10-22 21:43:00', '2018-10-22 21:43:00'),
(12, NULL, NULL, 'Pedro', 'Martinez', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, 'Nuevo', 'Nuevo2', NULL, NULL, NULL, NULL, NULL, '2018-11-03 23:40:07', '2018-11-03 23:40:07'),
(14, NULL, NULL, 'Nuevo', 'Nuevo2', NULL, NULL, NULL, NULL, NULL, '2018-11-03 23:41:34', '2018-11-03 23:41:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(255) DEFAULT NULL,
  `state_project_id` int(11) DEFAULT NULL,
  `type_project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `state_project_id` (`state_project_id`),
  KEY `type_project_id` (`type_project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `created_on`, `note`, `state_project_id`, `type_project_id`) VALUES
(1, NULL, '2018-10-24 08:52:10', NULL, NULL, 1),
(2, NULL, '2018-10-24 09:34:48', NULL, 4, 2),
(3, NULL, '2018-10-24 09:39:51', NULL, 4, 2),
(4, NULL, '2018-10-24 09:40:03', NULL, 4, 2),
(5, NULL, '2018-10-24 10:59:49', NULL, 4, 2),
(6, NULL, '2018-10-24 11:00:24', NULL, 4, 1),
(7, NULL, '2018-10-24 11:14:42', NULL, 4, 2),
(8, NULL, '2018-10-24 17:52:23', NULL, 4, 2),
(9, NULL, '2018-10-24 21:27:45', NULL, 4, 1),
(10, NULL, '2018-10-24 21:29:57', NULL, 4, 2),
(11, NULL, '2018-10-25 07:15:54', NULL, 4, 1),
(12, NULL, '2018-10-25 09:43:17', NULL, 4, 1),
(13, NULL, '2018-10-26 07:36:22', NULL, 4, 1),
(14, NULL, '2018-10-26 23:09:00', NULL, 4, 1),
(15, NULL, '2018-10-26 23:09:01', NULL, 4, 2),
(16, NULL, '2018-10-26 23:09:42', NULL, 4, 2),
(17, NULL, '2018-10-26 23:10:35', NULL, 4, 1),
(18, NULL, '2018-10-26 23:20:18', NULL, 4, 2),
(19, NULL, '2018-10-26 23:24:27', NULL, 4, 1),
(20, NULL, '2018-10-27 20:53:34', NULL, 4, 1),
(21, NULL, '2018-10-28 07:56:03', NULL, 4, 2),
(22, NULL, '2018-10-28 08:01:31', NULL, 4, 1),
(23, NULL, '2018-10-28 19:52:54', NULL, 4, 1),
(24, NULL, '2018-10-28 20:02:56', NULL, 4, 2),
(25, NULL, '2018-10-29 10:54:50', NULL, 4, 2),
(26, NULL, '2018-11-03 19:58:37', NULL, 4, 1),
(27, NULL, '2018-11-03 20:32:45', NULL, 4, 2),
(28, NULL, '2018-11-03 20:55:24', NULL, 4, 2),
(29, NULL, '2018-11-03 21:16:12', NULL, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects_tasks`
--

DROP TABLE IF EXISTS `projects_tasks`;
CREATE TABLE IF NOT EXISTS `projects_tasks` (
  `projects_id` bigint(20) NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`projects_id`,`task_id`),
  KEY `IDX_9CE8928C1EDE0F55` (`projects_id`),
  KEY `IDX_9CE8928CDF728B68` (`task_id`)
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
  `modified_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uniques_fields` (`username`),
  UNIQUE KEY `UNIQ_1483A5E9CCFA12B8` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `profile_id`, `username`, `password`, `plain_password`, `is_active`, `modified_on`, `created_on`) VALUES
(1, 1, 'admin', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(3, 2, 'commercial', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(4, 3, 'employee', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(6, 4, 'projectManagement', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(10, 12, 'aguaviva@aguaviva.com', '1234', '1234', 1, NULL, NULL),
(11, NULL, 'admin@admin.com', '$2y$13$AEuL3H7vjRMfnGW0nM1M2.UyZbNOktgh1mWVbM4x1zgWhDCvbdaIO', '1234', 1, '2018-11-03 23:40:07', '2018-11-03 23:40:07'),
(12, NULL, 'jaja@jaja.com', '$2y$13$9Ci2DeLz9WDXqhuO5Uw84OFIeC2Xjtmi/ycgUnKtqqeldHNGwkOcK', '1234', 1, '2018-11-03 23:41:34', '2018-11-03 23:41:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE IF NOT EXISTS `users_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_roles`
--

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`, `created_on`) VALUES
(1, 1, 1, '2018-10-24 10:27:59'),
(2, 3, 3, '2018-10-24 10:27:59'),
(3, 4, 2, '2018-10-24 10:27:59'),
(4, 6, 4, '2018-10-24 10:27:59');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `FK_4C81E852A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `list_type_task`
--
ALTER TABLE `list_type_task`
  ADD CONSTRAINT `FK_C8BD1246B6EC9B9` FOREIGN KEY (`type_project_id`) REFERENCES `list_type_project` (`id`);

--
-- Filtros para la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `FK_8B308530708A0E0` FOREIGN KEY (`gender_id`) REFERENCES `list_genders` (`id`);

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `FK_5C93B3A453FACE2C` FOREIGN KEY (`state_project_id`) REFERENCES `list_state_project` (`id`),
  ADD CONSTRAINT `FK_5C93B3A4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `type_project` FOREIGN KEY (`type_project_id`) REFERENCES `list_type_project` (`id`);

--
-- Filtros para la tabla `projects_tasks`
--
ALTER TABLE `projects_tasks`
  ADD CONSTRAINT `FK_9CE8928C1EDE0F55` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9CE8928CDF728B68` FOREIGN KEY (`task_id`) REFERENCES `list_type_task` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E9CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`);

--
-- Filtros para la tabla `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `FK_51498A8EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_51498A8ED60322AC` FOREIGN KEY (`role_id`) REFERENCES `list_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
