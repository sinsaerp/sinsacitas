-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para devappco_citas
CREATE DATABASE IF NOT EXISTS `devappco_citas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `devappco_citas`;

-- Volcando estructura para tabla devappco_citas.citas
CREATE TABLE IF NOT EXISTS `citas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `paciente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medico_id` bigint(20) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `fechaDeseada` date DEFAULT NULL,
  `fechaCita` date NOT NULL,
  `horaCita` time NOT NULL,
  `hora` time DEFAULT NULL,
  `rips` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autorizacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_citas_medicos` (`medico_id`),
  CONSTRAINT `FK_citas_medicos` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.citas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.citasservicios
CREATE TABLE IF NOT EXISTS `citasservicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rips` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.citasservicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `citasservicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `citasservicios` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.epssi
CREATE TABLE IF NOT EXISTS `epssi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codeps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codeps` (`codeps`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.epssi: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `epssi` DISABLE KEYS */;
INSERT INTO `epssi` (`id`, `codeps`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
	(14, 'CCF033-1', 'COMFASUCRE - EPSS', 1, '2021-05-31 16:02:48', '2021-05-31 16:02:48'),
	(15, 'EMP023', 'COLSANITAS S.A.', 1, '2021-05-31 16:02:49', '2021-05-31 16:02:49'),
	(16, 'EPS002', 'SALUDTOTAL S.A. E.P.S.', 1, '2021-05-31 16:02:49', '2021-05-31 16:02:49'),
	(17, 'ESS207', 'MUTUALSER E.S.S', 1, '2021-05-31 16:02:49', '2021-05-31 16:02:49'),
	(18, 'RES001', 'POLICÍA NACIONAL DE SUCRE', 1, '2021-05-31 16:02:49', '2021-05-31 16:02:49');
/*!40000 ALTER TABLE `epssi` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.especialidades
CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.especialidades: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` (`id`, `codigo`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
	(1, '1', 'CIRUGIA PLASTICA', 1, '2021-05-31 16:02:51', '2021-05-31 16:02:51'),
	(2, '3', 'GINECOLOGIA', 1, '2021-05-31 16:02:51', '2021-05-31 16:02:51');
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.horariom
CREATE TABLE IF NOT EXISTS `horariom` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `medico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.horariom: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `horariom` DISABLE KEYS */;
/*!40000 ALTER TABLE `horariom` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.medicos
CREATE TABLE IF NOT EXISTS `medicos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `especialidad_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_medicos_especialidades` (`especialidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.medicos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` (`id`, `especialidad_id`, `nombre`, `foto`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 4, 'MEDICO', NULL, 1, '2021-04-09 15:18:40', '2021-04-09 15:18:40'),
	(2, 14, 'LUIS ALFONSO MOVIL IBANEZ', NULL, 1, '2021-04-09 15:18:41', '2021-04-09 15:18:41'),
	(3, 14, 'DAYANA PATRICIA ATENCIO MONTES', NULL, 1, '2021-05-31 16:02:57', '2021-05-31 16:02:57'),
	(4, 14, 'LUIS EDUARDO MARTINEZ', NULL, 1, '2021-05-31 16:02:57', '2021-05-31 16:02:57'),
	(5, 49, 'PATRICK HERNAN ARRIETA BERNATE', NULL, 1, '2021-05-31 16:02:57', '2021-05-31 16:02:57'),
	(6, 3, 'ABDON MONTERROZA', NULL, 1, '2021-05-31 16:02:57', '2021-05-31 16:02:57');
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.migrations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.tipoconsulta
CREATE TABLE IF NOT EXISTS `tipoconsulta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `especialidad_id` bigint(20) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tipoconsulta_tipoconsulta` (`especialidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.tipoconsulta: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipoconsulta` DISABLE KEYS */;
INSERT INTO `tipoconsulta` (`id`, `especialidad_id`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 75, 'FLUOROSCOPIA DE OJO SOD', NULL, 1, '2021-05-31 16:02:54', '2021-05-31 16:02:54'),
	(2, 75, 'OCULOPLETISMOGRAFIA SOD', NULL, 1, '2021-05-31 16:02:54', '2021-05-31 16:02:54'),
	(3, 5, 'CONSULTA DE CONTROL POR NEUROLOGIA', NULL, 1, '2021-05-31 16:02:54', '2021-05-31 16:02:54'),
	(4, 36, 'RETIRO DE CERCLAJE INTRAMAXILAR', NULL, 1, '2021-05-31 16:02:54', '2021-05-31 16:02:54');
/*!40000 ALTER TABLE `tipoconsulta` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codeps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipidafil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `afcodigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `afape1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `afape2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `afnom1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `afnom2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `afcodigo` (`afcodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.users: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `codeps`, `tipidafil`, `afcodigo`, `afape1`, `afape2`, `afnom1`, `afnom2`, `fecha_nacimiento`, `sexo`, `telefono`, `direccion`, `email`, `password`, `estado`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(8, 'ESS076', 'TI', '1102877148', 'BARBOZA', 'SANCHEZ', 'GUSTAVO', '', '2021-04-26', 'M', '46654', 'sampues', 'gustavo@mail.com', '$2y$10$7fWm4Ya9aYL3Vzrl1lSHg.IfcnspL1uvFOXsUpxIPRyiSZvnyvvue', 1, NULL, NULL, '2021-04-08 19:42:57', '2021-04-08 19:42:57'),
	(10, 'EPS002', 'CC', '1102877147', 'ALMANZA ', 'PEREZ', 'EDUARDO', 'ANTONIO', '1997-02-15', 'M', '3024694138', 'DON ALONSO', 'eduardopipe2015@gmail.com', '$2y$10$XMkxwvJO0BPI89qbkLDTE.zIgvMSNBy6BtomdOkU/BOReJsrTYuSy', 1, NULL, NULL, '2021-04-21 16:28:03', '2021-04-21 16:28:03'),
	(11, 'EPS002', 'CC', '12345678', 'PEREZ', '', 'CARLOS ', '', '2021-02-02', 'M', '123696', 'SINCELEJO', 'carlos@mail.com', '$2y$10$ZQXTwG3iUUyJS1Az1P65a.HXjmK5STht50T1hwwPWqpCkf9gFPowC', 1, NULL, NULL, '2021-04-21 19:29:30', '2021-04-21 19:29:30'),
	(12, 'EPS002', 'CC', '987456321', 'PEREZ', '', 'CARLOS', '', '2021-04-29', 'M', '3025855696', 'sincelejo', 'carlosperez@gmail.com', '$2y$10$3IdBZHpD9xAZUWhk88GI5eLHAYpMyZGjMdRNGjwAeNUJSDqt3.HxK', 1, NULL, NULL, '2021-04-29 14:16:14', '2021-04-29 14:16:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
