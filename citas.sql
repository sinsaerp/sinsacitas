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
  `medico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
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
  KEY `FK_citas_medicos` (`medico`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.citas: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` (`id`, `paciente`, `medico`, `fecha`, `fechaDeseada`, `fechaCita`, `horaCita`, `hora`, `rips`, `entidad`, `autorizacion`, `observaciones`, `estado`, `created_at`, `updated_at`) VALUES
	(14, '1234567890', '1034', '2021-07-19', '2021-07-19', '2021-07-19', '09:45:00', '10:46:11', '18', 'EMP023', NULL, 'cita confirmada', '0', '2021-07-19 10:46:11', '2021-07-19 10:48:00'),
	(15, '1234567890', '1034', '2021-07-19', '2021-07-19', '2021-07-19', '08:30:00', '11:47:19', '18', 'EMP023', NULL, 'cita confirmada', '0', '2021-07-19 11:47:19', '2021-07-19 11:59:01'),
	(16, '1234567890', '1034', '2021-08-13', '2021-08-13', '2021-08-13', '09:30:00', '09:55:17', '18', 'EMP023', '85694523221', NULL, '0', '2021-08-13 09:55:17', '2021-08-13 10:40:04'),
	(17, '10000102', '1034', '2021-08-13', '2021-08-13', '2021-08-13', '10:15:00', '11:16:37', '19', 'EPS002', '', 'llevar documentos', '0', '2021-08-13 11:16:37', '2021-08-13 11:20:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.citasservicios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `citasservicios` DISABLE KEYS */;
INSERT INTO `citasservicios` (`id`, `rips`, `codigo`, `descripcion`, `cantidad`, `estado`, `created_at`, `updated_at`) VALUES
	(13, '18', '890201', 'MEDICO GENERAL-CONSULTA DE PRIMERA VEZ POR MEDICINA GENERAL', 1, 1, '2021-07-19 10:46:11', '2021-07-19 10:46:11'),
	(14, '18', '890201', 'MEDICO GENERAL-CONSULTA DE PRIMERA VEZ POR MEDICINA GENERAL', 1, 1, '2021-07-19 11:47:19', '2021-07-19 11:47:19'),
	(15, '18', '890201', 'MEDICO GENERAL-CONSULTA DE PRIMERA VEZ POR MEDICINA GENERAL', 1, 1, '2021-08-13 09:55:17', '2021-08-13 09:55:17'),
	(16, '19', '890201', 'MEDICO GENERAL-CONSULTA DE PRIMERA VEZ POR MEDICINA GENERAL', 1, 1, '2021-08-13 11:16:37', '2021-08-13 11:16:37');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.especialidades: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` (`id`, `codigo`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
	(1, '1', 'CIRUGIA PLASTICA', 1, '2021-06-15 18:40:55', '2021-06-15 18:40:55'),
	(3, '3', 'GINECOLOGIA', 1, '2021-06-15 17:37:33', '2021-06-15 17:37:33'),
	(14, '14', 'MEDICO GENERAL', 1, '2021-06-15 17:37:33', '2021-06-15 17:37:33');
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
  `medico` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.horariom: ~52 rows (aproximadamente)
/*!40000 ALTER TABLE `horariom` DISABLE KEYS */;
INSERT INTO `horariom` (`id`, `medico`, `fecha`, `hora`, `estado`, `created_at`, `updated_at`) VALUES
	(6, 'T00153', '2021-06-15', '08:00:00', '1', '2021-06-15 16:31:29', '2021-06-15 17:42:09'),
	(7, 'T00153', '2021-06-15', '08:10:00', '1', '2021-06-15 16:31:30', '2021-06-15 17:42:10'),
	(8, 'T00153', '2021-06-15', '08:20:00', '1', '2021-06-15 16:31:30', '2021-06-15 17:42:10'),
	(9, 'T00153', '2021-06-15', '08:30:00', '1', '2021-06-15 16:31:31', '2021-06-15 17:42:10'),
	(10, 'T00153', '2021-06-15', '08:40:00', '1', '2021-06-15 16:31:31', '2021-06-15 17:42:11'),
	(11, '1046', '2021-06-15', '08:00:00', '1', '2021-06-15 17:42:11', '2021-06-15 17:44:36'),
	(12, '1046', '2021-06-15', '08:20:00', '0', '2021-06-15 17:42:12', '2021-06-15 20:16:38'),
	(13, '1046', '2021-06-15', '08:40:00', '1', '2021-06-15 17:42:12', '2021-06-15 17:44:37'),
	(14, '1046', '2021-06-15', '09:00:00', '0', '2021-06-15 17:42:13', '2021-06-15 18:46:26'),
	(15, '1046', '2021-06-15', '09:20:00', '0', '2021-06-15 17:42:13', '2021-06-16 14:18:42'),
	(16, 'T00153', '2021-06-18', '08:10:00', '1', '2021-06-18 17:11:55', '2021-06-18 17:11:55'),
	(17, 'T00153', '2021-06-18', '08:20:00', '1', '2021-06-18 17:11:55', '2021-06-18 17:11:55'),
	(18, 'T00153', '2021-06-18', '08:30:00', '0', '2021-06-18 17:11:56', '2021-06-18 17:12:55'),
	(19, 'T00153', '2021-06-18', '08:40:00', '1', '2021-06-18 17:11:56', '2021-06-18 17:11:56'),
	(20, 'T00153', '2021-06-18', '08:50:00', '1', '2021-06-18 17:11:57', '2021-06-18 17:11:57'),
	(21, 'T00153', '2021-06-30', '08:20:00', '1', '2021-06-18 17:24:34', '2021-06-18 17:24:34'),
	(22, 'T00153', '2021-06-30', '09:20:00', '1', '2021-06-18 17:24:34', '2021-06-18 17:24:34'),
	(23, 'T00153', '2021-06-30', '11:10:00', '0', '2021-06-18 17:24:34', '2021-06-18 17:28:21'),
	(24, '1034', '2021-07-13', '08:15:00', '1', '2021-07-13 13:40:30', '2021-07-13 13:40:30'),
	(25, '1034', '2021-07-13', '08:30:00', '1', '2021-07-13 13:40:31', '2021-07-13 13:40:31'),
	(26, '1034', '2021-07-13', '08:45:00', '0', '2021-07-13 13:40:31', '2021-07-13 13:40:58'),
	(27, '1034', '2021-07-13', '09:00:00', '0', '2021-07-13 13:40:31', '2021-07-13 14:45:19'),
	(28, '1034', '2021-07-13', '09:15:00', '1', '2021-07-13 13:40:32', '2021-07-13 13:40:32'),
	(29, '1034', '2021-07-14', '08:30:00', '1', '2021-07-14 10:49:47', '2021-07-14 10:49:47'),
	(30, '1034', '2021-07-14', '08:45:00', '1', '2021-07-14 10:49:48', '2021-07-14 10:49:48'),
	(31, '1034', '2021-07-14', '09:00:00', '1', '2021-07-14 10:49:49', '2021-07-14 10:49:49'),
	(32, '1034', '2021-07-14', '09:30:00', '1', '2021-07-14 10:49:49', '2021-07-16 13:06:53'),
	(33, '1034', '2021-07-14', '09:45:00', '1', '2021-07-14 10:49:49', '2021-07-16 11:25:22'),
	(34, '1034', '2021-07-14', '10:00:00', '1', '2021-07-14 10:49:49', '2021-07-14 10:53:35'),
	(35, '1034', '2021-07-14', '10:30:00', '1', '2021-07-14 10:49:50', '2021-07-16 11:08:21'),
	(36, '1034', '2021-07-14', '10:45:00', '1', '2021-07-14 10:49:50', '2021-07-16 10:41:27'),
	(37, '1034', '2021-07-14', '10:45:00', '1', '2021-07-14 10:49:50', '2021-07-16 10:41:27'),
	(38, '1034', '2021-07-14', '10:45:00', '1', '2021-07-14 10:49:50', '2021-07-16 10:41:27'),
	(39, '1034', '2021-07-14', '10:45:00', '1', '2021-07-14 10:49:50', '2021-07-16 10:41:27'),
	(40, '1034', '2021-07-14', '11:45:00', '1', '2021-07-14 10:49:50', '2021-07-16 10:41:27'),
	(41, '1034', '2021-07-14', '10:45:00', '1', '2021-07-14 10:49:50', '2021-07-16 10:41:27'),
	(42, '1034', '2021-07-14', '10:45:00', '1', '2021-07-14 10:49:50', '2021-07-16 10:41:27'),
	(43, '1034', '2021-07-14', '10:45:00', '1', '2021-07-14 10:49:50', '2021-07-16 10:41:27'),
	(44, '1034', '2021-07-14', '10:45:00', '1', '2021-07-14 10:49:50', '2021-07-16 10:41:27'),
	(45, '1034', '2021-07-19', '08:00:00', '1', '2021-07-19 10:43:27', '2021-07-19 10:43:27'),
	(46, '1034', '2021-07-19', '08:30:00', '0', '2021-07-19 10:43:27', '2021-07-19 11:47:19'),
	(47, '1034', '2021-07-19', '09:00:00', '1', '2021-07-19 10:43:27', '2021-07-19 10:43:27'),
	(48, '1034', '2021-07-19', '09:45:00', '0', '2021-07-19 10:43:28', '2021-07-19 10:46:11'),
	(49, '1034', '2021-07-19', '10:00:00', '1', '2021-07-19 10:43:28', '2021-07-19 10:43:28'),
	(50, '1034', '2021-07-19', '10:15:00', '1', '2021-07-19 10:43:28', '2021-07-19 10:43:28'),
	(51, '1034', '2021-07-19', '10:30:00', '1', '2021-07-19 10:43:28', '2021-07-19 10:43:28'),
	(52, '1034', '2021-08-13', '08:45:00', '1', '2021-08-13 09:53:22', '2021-08-13 09:53:22'),
	(53, '1034', '2021-08-13', '09:00:00', '1', '2021-08-13 09:53:22', '2021-08-13 09:53:22'),
	(54, '1034', '2021-08-13', '09:15:00', '1', '2021-08-13 09:53:23', '2021-08-13 09:53:23'),
	(55, '1034', '2021-08-13', '09:30:00', '0', '2021-08-13 09:53:23', '2021-08-13 09:55:17'),
	(56, '1034', '2021-08-13', '09:45:00', '1', '2021-08-13 09:53:23', '2021-08-13 09:53:23'),
	(57, '1034', '2021-08-13', '10:15:00', '0', '2021-08-13 09:53:23', '2021-08-13 11:16:37'),
	(58, '1034', '2021-08-13', '10:45:00', '1', '2021-08-13 09:53:23', '2021-08-13 09:53:23'),
	(59, 'T00153', '2021-08-13', '08:00:00', '1', '2021-08-13 15:40:16', '2021-08-13 15:40:16'),
	(60, 'T00153', '2021-08-13', '09:00:00', '1', '2021-08-13 15:40:16', '2021-08-13 15:40:16'),
	(61, 'T00153', '2021-08-13', '10:00:00', '1', '2021-08-13 15:40:17', '2021-08-13 15:40:17'),
	(62, 'T00153', '2021-08-13', '11:00:00', '1', '2021-08-13 15:40:17', '2021-08-13 15:40:17'),
	(63, 'T00153', '2021-08-13', '12:00:00', '1', '2021-08-13 15:40:17', '2021-08-13 15:40:17');
/*!40000 ALTER TABLE `horariom` ENABLE KEYS */;

-- Volcando estructura para tabla devappco_citas.medicos
CREATE TABLE IF NOT EXISTS `medicos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `especialidad_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_medicos_especialidades` (`especialidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.medicos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` (`id`, `especialidad_id`, `nombre`, `codigo`, `foto`, `estado`, `created_at`, `updated_at`) VALUES
	(8, 14, 'DAYANA PATRICIA ATENCIO MONTES', '1034', NULL, 1, '2021-06-15 18:40:28', '2021-06-15 18:40:28'),
	(9, 14, 'JESSICA MILENA SANTOS SIERRA', '1046', NULL, 1, '2021-06-15 18:40:28', '2021-06-15 18:40:28'),
	(10, 14, 'LUIS EDUARDO MARTINEZ', '514', NULL, 1, '2021-06-15 18:40:29', '2021-06-15 18:40:29'),
	(11, 49, 'PATRICK HERNAN ARRIETA BERNATE', 'T00081', NULL, 1, '2021-06-15 18:40:29', '2021-06-15 18:40:29'),
	(12, 3, 'ABDON MONTERROZA', 'T00153', NULL, 1, '2021-06-15 18:40:29', '2021-06-15 18:40:29');
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
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tipoconsulta_tipoconsulta` (`especialidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.tipoconsulta: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tipoconsulta` DISABLE KEYS */;
INSERT INTO `tipoconsulta` (`id`, `especialidad_id`, `nombre`, `codigo`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
	(13, 75, 'FLUOROSCOPIA DE OJO SOD', '951700', NULL, 1, '2021-07-16 10:39:48', '2021-07-16 10:39:48'),
	(14, 75, 'OCULOPLETISMOGRAFIA SOD', '951800', NULL, 1, '2021-07-16 10:39:48', '2021-07-16 10:39:48'),
	(15, 5, 'CONSULTA DE CONTROL POR NEUROLOGIA', '890202-36', NULL, 1, '2021-07-16 10:39:48', '2021-07-16 10:39:48'),
	(16, 36, 'RETIRO DE CERCLAJE INTRAMAXILAR', '768702', NULL, 1, '2021-07-16 10:39:49', '2021-07-16 10:39:49'),
	(17, 14, 'CONSULTA DE PRIMERA VEZ POR MEDICINA GENERAL', '890201', NULL, 1, '2021-07-16 10:39:49', '2021-07-16 10:39:49'),
	(18, 3, 'CONSULTA DE PRIMERA VEZ POR GINECOLOGIA', '890202-1', NULL, 1, '2021-07-16 10:39:49', '2021-07-16 10:39:49'),
	(19, 3, 'CONSULTA DE CONTROL O DE SEGUIMIENTO POR ESPECIALISTA EN GINECOLOGÍA', '890350-2', NULL, 1, '2021-07-16 10:39:49', '2021-07-16 10:39:49');
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
  `regimen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla devappco_citas.users: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `codeps`, `tipidafil`, `afcodigo`, `afape1`, `afape2`, `afnom1`, `afnom2`, `regimen`, `fecha_nacimiento`, `sexo`, `telefono`, `direccion`, `email`, `password`, `estado`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(8, 'ESS076', 'TI', '1102877148', 'BARBOZA', 'SANCHEZ', 'GUSTAVO', '', 'S', '2021-04-26', 'M', '46654', 'sampues', 'prueba@mail.com', '$2y$10$7fWm4Ya9aYL3Vzrl1lSHg.IfcnspL1uvFOXsUpxIPRyiSZvnyvvue', 1, NULL, NULL, '2021-04-08 19:42:57', '2021-04-08 19:42:57'),
	(10, 'EPS002', 'CC', '1102877147', 'ALMANZA ', 'PEREZ', 'EDUARDO', 'ANTONIO', 'S', '1997-02-15', 'M', '3024694138', 'DON ALONSO', 'eduardopipe2015@gmail.com', '$2y$10$XMkxwvJO0BPI89qbkLDTE.zIgvMSNBy6BtomdOkU/BOReJsrTYuSy', 1, NULL, NULL, '2021-04-21 16:28:03', '2021-04-21 16:28:03'),
	(11, 'EPS002', 'CC', '12345678', 'PEREZ', '', 'CARLOS ', '', 'S', '2021-02-02', 'M', '123696', 'SINCELEJO', 'carlos@mail.com', '$2y$10$ZQXTwG3iUUyJS1Az1P65a.HXjmK5STht50T1hwwPWqpCkf9gFPowC', 1, NULL, NULL, '2021-04-21 19:29:30', '2021-04-21 19:29:30'),
	(12, 'EPS002', 'CC', '987456321', 'PEREZ', '', 'CARLOS', '', 'S', '2021-04-29', 'M', '3025855696', 'sincelejo', 'carlosperez@gmail.com', '$2y$10$3IdBZHpD9xAZUWhk88GI5eLHAYpMyZGjMdRNGjwAeNUJSDqt3.HxK', 1, NULL, NULL, '2021-04-29 14:16:14', '2021-04-29 14:16:14'),
	(14, 'EPS002', 'CC', '11028771481', 'ALMANZA', 'PEREZ', 'EDUARDO', 'ANTONI', 'S', '2021-06-02', 'M', '3024694138', 'eduardo@mail.com', 'eduardo@mail.com', '$2y$10$tLDtxTDI.Ez0Opr66g69ZeqPtlhgmsBvTwJIFeZEcdysjf8Dk6TDy', 1, NULL, NULL, '2021-06-18 17:08:37', '2021-06-18 17:08:37'),
	(15, 'EMP023', 'CC', '1234567890', 'ROMERO', '', 'ANDERSON', '', 'S', '2021-06-01', 'M', '3015016058', 'sincelejo', 'anderson@mail.com', '$2y$10$TcIk87Q7oJab0I9ygKpsiOaZDt2r8cw4w3FjGF28Wmzvf2Ywx7aRa', 1, NULL, NULL, '2021-06-18 17:26:30', '2021-06-18 17:26:30'),
	(16, 'EPS002', 'CC', '01259852', 'SEGUNDO', 'DIAZ', 'OSCAR', 'MANUEL', 'C', '2021-07-01', 'M', '302458941', 'COROZAL', 'oscar@mail.com', '$2y$10$Auf3bUtsFdaQdn3qeXl4POGXeYenE7XFMob7S4YsM3wiGkBdFQd5.', 1, NULL, NULL, '2021-07-14 10:52:24', '2021-07-14 10:52:24'),
	(17, 'EPS002', 'CC', '1102877142', 'ROMERO', '', 'ANDERSON', '', 'C', '2021-07-01', 'M', '3024568952', 'SINCELEJO', 'ANDERSON@MAIL.COM', '$2y$10$YBbRJTd8oilCItFyita66uP0FjC.6zYLxRSWf0RND6hDMDPqrQ6Fy', 1, NULL, NULL, '2021-07-16 10:09:58', '2021-07-16 10:09:58'),
	(18, 'EPS002', 'CC', '10000102', 'ALMANZA', 'PEREZ', 'ROSA ', 'ANGELICA', 'S', '1998-07-17', 'F', '30024569999', 'SINCELEJO', 'rosa@mail.com', '$2y$10$D62e8e45/enCl3H751GWA.mCLL4PEhFNsTZeukWJdPnvQi0coIV9K', 1, NULL, NULL, '2021-08-13 11:02:19', '2021-08-13 11:02:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
