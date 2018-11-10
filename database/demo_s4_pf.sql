-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-11-2018 a las 23:58:12
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
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) DEFAULT NULL,
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plain_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `modified_on` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uniques_fields` (`username`),
  UNIQUE KEY `UNIQ_1483A5E9CCFA12B8` (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `profile_id`, `locale`, `username`, `password`, `plain_password`, `is_active`, `modified_on`, `created_on`) VALUES
(1, 1, 'es', 'admin@admin.com', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(3, 2, 'en', 'commercial@admin.com', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(4, 3, 'en', 'employee@admin.com', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41'),
(6, 4, 'es', 'projectManagement@admin.com', '$2y$13$Yf4t17xHrl4c/1ce4fs3Pukghfu4VCKXRmr6yh6cCfPv/Pbft7Uy6', 'admin', 1, '2018-10-22 21:45:41', '2018-10-22 21:45:41');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E9CCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
