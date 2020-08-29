-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2020 a las 05:21:52
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2020_08_17_225710_create_persona_table', 1),
(4, '2020_08_17_225804_create_subnivel_table', 1),
(5, '2020_08_17_225805_create_preguntas_subnivel_table', 1),
(6, '2020_08_17_225937_create_roles_table', 1),
(7, '2020_08_17_230017_create_usuario_pregunta_table', 1),
(8, '2020_08_17_230030_create_visitas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `fecha_nacimiento`, `edad`, `telefono`, `celular`, `direccion`, `created_at`, `updated_at`, `id_users`) VALUES
(1, '1995-09-28 00:00:00', 24, '5106700', '0992681086', 'Quito Sur', '2020-08-23 23:53:04', '2020-08-23 23:53:04', 1),
(2, '2000-01-03 00:00:00', 22, '02222222', '02222222222', 'norte', '2020-08-24 23:38:22', '2020-08-24 23:38:22', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 2, 'browser', '5de4d5659e7ee0dead6a172172f2b76bc398253a874dcc3ca7ea48bb543f92a8', '[\"*\"]', '2020-08-29 03:20:20', '2020-08-29 02:37:58', '2020-08-29 03:20:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_subnivel`
--

CREATE TABLE `preguntas_subnivel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `audio` text COLLATE utf8mb4_unicode_ci,
  `oraciones` text COLLATE utf8mb4_unicode_ci,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_campo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario_crea` bigint(20) UNSIGNED NOT NULL,
  `usuario_modifica` bigint(20) UNSIGNED DEFAULT NULL,
  `id_subnivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas_subnivel`
--

INSERT INTO `preguntas_subnivel` (`id`, `nombre`, `descripcion`, `foto`, `audio`, `oraciones`, `tipo`, `estado`, `valor_campo`, `nivel`, `created_at`, `updated_at`, `usuario_crea`, `usuario_modifica`, `id_subnivel`) VALUES
(1, '', NULL, 'b.png', NULL, NULL, '1', '1', '', 2, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1, 5),
(2, '', NULL, 'd.png', NULL, NULL, '0', '1', '', 2, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1, 5),
(3, '', NULL, 'p.png', NULL, NULL, '0', '1', '', 2, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1, 6),
(4, '', NULL, 'q.png', NULL, NULL, '1', '1', '', 2, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1, 6),
(5, '', NULL, 'm.png', NULL, NULL, '0', '1', '', 2, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1, 7),
(6, '', NULL, 'n.png', NULL, NULL, '1', '1', '', 2, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1, 7),
(7, '', NULL, 's.png', NULL, NULL, '0', '1', '', 2, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1, 8),
(8, '', NULL, 'z.png', NULL, NULL, '1', '1', '', 2, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1, 8),
(9, NULL, NULL, 'ad.png', NULL, NULL, '0', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1, 29),
(10, NULL, NULL, 'da.png', NULL, NULL, '1', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1, 29),
(11, NULL, NULL, 'li.png', NULL, NULL, '1', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1, 30),
(12, NULL, NULL, 'il.png', NULL, NULL, '0', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1, 30),
(13, NULL, NULL, 'mo.png', NULL, NULL, '0', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1, 31),
(14, NULL, NULL, 'om.png', NULL, NULL, '1', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1, 31),
(15, NULL, NULL, 'ne.png', NULL, NULL, '1', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1, 32),
(16, NULL, NULL, 'en.png', NULL, NULL, '0', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1, 32),
(17, NULL, NULL, 'sa.png', NULL, NULL, '1', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1, 33),
(18, NULL, NULL, 'as.png', NULL, NULL, '0', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 33),
(19, NULL, NULL, 're.png', NULL, NULL, '0', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 34),
(20, NULL, NULL, 'er.png', NULL, NULL, '1', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 34),
(21, NULL, NULL, 'ri.png', NULL, NULL, '1', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 35),
(22, NULL, NULL, 'ir.png', NULL, NULL, '0', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 35),
(23, NULL, NULL, 'pi.png', NULL, NULL, '0', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 36),
(24, NULL, NULL, 'ip.png', NULL, NULL, '1', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 36),
(25, NULL, NULL, 'di.png', NULL, NULL, '1', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 37),
(26, NULL, NULL, 'id.png', NULL, NULL, '0', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 37),
(27, NULL, NULL, 'up.png', NULL, NULL, '0', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 38),
(28, NULL, NULL, 'pu.png', NULL, NULL, '1', '1', NULL, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 38),
(29, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'mi sombrero es de copa', 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 39),
(30, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'borja tiene pecas', 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 40),
(31, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'la vaca tiene cuernos', 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 41),
(32, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'pedro quiere pastel', 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 42),
(33, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'mi perro ladra mucho', 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 43),
(34, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'sofía va de compras', 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 44),
(35, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'alberto tiene un manzano', 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 45),
(36, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'el raton Perez tiene mi diente', 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 46),
(37, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'juan camina por el cerro', 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 47),
(38, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'la playa es hermosa', 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 48),
(39, NULL, NULL, NULL, NULL, NULL, NULL, '1', 's', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1, 49),
(40, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'r', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 50),
(41, NULL, NULL, 'escuchar.png', '', NULL, NULL, '1', 't', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 51),
(42, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'l', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 52),
(43, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'f', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 53),
(44, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'b', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 54),
(45, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'x', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 55),
(46, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'y', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 56),
(47, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'o', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 57),
(48, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'c', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 58),
(49, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'con', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 59),
(50, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'ir', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 60),
(51, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'que', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 61),
(52, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'ya', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 62),
(53, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'un', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 63),
(54, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'in', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 64),
(55, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'im', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 65),
(56, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'si', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 66),
(57, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'por', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 67),
(58, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'tos', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 68),
(59, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'yo abrí la boca para que el odontólogo la revisara', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 79),
(60, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'bárbara bendita, eres mujer entre las santas', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 80),
(61, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'la barbacoa estaba deliciosa', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 81),
(62, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'la rosa es roja', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 82),
(63, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'el pan es de natalia', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 83),
(64, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'yo repaso un rato', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 84),
(65, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'zapatero a su zapato', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 85),
(66, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'mi mamá me ama', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 86),
(67, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'en la casa de la señora sofía, a la sombra de un peral me comí un pastel. por la ventana apareció su sobrino, el de la cara redonda y le mandó un saludo para mi tía.', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 87),
(68, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'lola es la hermana de Sara. lola es una niña pequeña que le gusta jugar en la nieve, cada vez que nieva lola se pone sus botas, su abrigo, sus orejeras y sale a jugar.', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 88),
(69, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'la gallina roja vive en una granja, ella trabaja mucho, siembra y cosecha el trigo. ella hace un pan muy rico. cuando acaba su trabajo ella se come todo el pan.', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 89),
(70, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'carlos es un mono muy divertido, le gusta comer bananas todo el día. a carlos le gusta ser perezoso y hacer reir a sus amigos.', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 90),
(71, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'miguel le gusta la playa, a miguel lee muchas horas. cuando viaja miguel a la playa siempre lo acompañan sus libros.', 4, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 91),
(72, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'cafetería', 3, '2020-08-25 05:00:00', '2020-08-25 05:00:00', 1, NULL, 69),
(73, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'jinete', 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL, 70),
(74, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'naranja', 3, '2020-08-25 05:00:00', '2020-08-25 05:00:00', 1, NULL, 71),
(75, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'presentador', 3, '2020-08-25 05:00:00', '2020-08-25 05:00:00', 1, NULL, 72),
(76, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'ballena', 3, '2020-08-25 05:00:00', '2020-08-25 05:00:00', 1, NULL, 73),
(77, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'sandía', 3, '2020-08-25 05:00:00', '2020-08-25 05:00:00', 1, NULL, 74),
(78, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'árboles', 3, '2020-08-25 05:00:00', '2020-08-25 05:00:00', 1, NULL, 75),
(79, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'tablero', 3, '2020-08-25 05:00:00', '2020-08-25 05:00:00', 1, NULL, 76),
(80, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'complejo', 3, '2020-08-25 05:00:00', '2020-08-25 05:00:00', 1, NULL, 77),
(81, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'opinión', 3, '2020-08-25 05:00:00', '2020-08-25 05:00:00', 1, NULL, 78);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` int(11) NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subnivel`
--

CREATE TABLE `subnivel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `audio` text COLLATE utf8mb4_unicode_ci,
  `nivel` int(11) NOT NULL,
  `subnivel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario_crea` bigint(20) UNSIGNED NOT NULL,
  `usuario_modifica` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subnivel`
--

INSERT INTO `subnivel` (`id`, `nombre`, `descripcion`, `foto`, `audio`, `nivel`, `subnivel`, `created_at`, `updated_at`, `usuario_crea`, `usuario_modifica`) VALUES
(5, NULL, NULL, NULL, 'B', 2, 1, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1),
(6, NULL, NULL, NULL, 'Q', 2, 1, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1),
(7, NULL, NULL, NULL, 'N', 2, 1, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1),
(8, NULL, NULL, NULL, 'Z', 2, 1, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1),
(29, NULL, NULL, NULL, 'DA', 2, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, 1),
(30, NULL, NULL, NULL, 'LI', 2, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(31, NULL, NULL, NULL, 'OM', 2, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(32, NULL, NULL, NULL, 'NE', 2, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(33, NULL, NULL, NULL, 'SA', 2, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(34, NULL, NULL, NULL, 'ER', 2, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(35, NULL, NULL, NULL, 'RI', 2, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(36, NULL, NULL, NULL, 'IP', 2, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(37, NULL, NULL, NULL, 'DI', 2, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(38, NULL, NULL, NULL, 'PU', 2, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(39, 'Misombreroesdecopa', NULL, 'sombrero.jpg', NULL, 2, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(40, 'Borjatienepecas', NULL, 'joven.jpg', NULL, 2, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(41, 'Lavacatienecuernos', NULL, 'vaca.jpg', NULL, 2, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(42, 'Pedroquierepastel', NULL, 'pastel.jpg', NULL, 2, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(43, 'Miperroladramucho', NULL, 'perro.jpg', NULL, 2, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(44, 'Sofíavadecompras', NULL, 'compras.jpg', NULL, 2, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(45, 'Albertotieneunmanzano', NULL, 'manzano.jpg', NULL, 2, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(46, 'ElratónPereztienemidiente', NULL, 'raton.jpg', NULL, 2, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(47, 'Juancaminaporelcerro', NULL, 'cerro.jpg', NULL, 2, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(48, 'Laplayaeshermosa', NULL, 'playa.jpg', NULL, 2, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(49, NULL, NULL, 'escuchar.png', 'S', 3, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(50, NULL, NULL, 'escuchar.png', 'R', 3, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(51, NULL, NULL, 'escuchar.png', 'T', 3, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(52, NULL, NULL, 'escuchar.png', 'L', 3, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(53, NULL, NULL, 'escuchar.png', 'F', 3, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(54, NULL, NULL, 'escuchar.png', 'B', 3, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(55, NULL, NULL, 'escuchar.png', 'X', 3, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(56, NULL, NULL, 'escuchar.png', 'Y', 3, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(57, NULL, NULL, 'escuchar.png', 'O', 3, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(58, NULL, NULL, 'escuchar.png', 'C', 3, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(59, NULL, NULL, 'escuchar.png', 'CON', 3, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(60, NULL, NULL, 'escuchar.png', 'IR', 3, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(61, NULL, NULL, 'escuchar.png', 'QUE', 3, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(62, NULL, NULL, 'escuchar.png', 'YA', 3, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(63, NULL, NULL, 'escuchar.png', 'UN', 3, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(64, NULL, NULL, 'escuchar.png', 'IN', 3, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(65, NULL, NULL, 'escuchar.png', 'IM', 3, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(66, NULL, NULL, 'escuchar.png', 'SI', 3, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(67, NULL, NULL, 'escuchar.png', 'POR', 3, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(68, NULL, NULL, 'escuchar.png', 'TOS', 3, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(69, NULL, NULL, 'escuchar.png', 'Cafetería', 3, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(70, NULL, NULL, 'escuchar.png', 'Jinete', 3, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(71, '', NULL, 'escuchar.png', 'Naranja', 3, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(72, '', NULL, 'escuchar.png', 'Presentador', 3, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(73, '', NULL, 'escuchar.png', 'Ballena', 3, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(74, '', NULL, 'escuchar.png', 'Sandía', 3, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(75, '', NULL, 'escuchar.png', 'Árboles', 3, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(76, '', NULL, 'escuchar.png', 'Tablero', 3, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(77, '', NULL, 'escuchar.png', 'Complejo', 3, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(78, '', NULL, 'escuchar.png', 'Opinión', 3, 3, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(79, 'Yo abrí la boca para que el odontólogo la revisara.', NULL, NULL, NULL, 4, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(80, 'Bárbara bendita, eres mujer entre las santas.', NULL, NULL, NULL, 4, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(81, 'La Barbacoa estaba deliciosa.', NULL, NULL, NULL, 4, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(82, 'La rosa es roja.', NULL, NULL, NULL, 4, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(83, 'El pan es de Natalia.', NULL, NULL, NULL, 4, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(84, 'Yo repaso un rato.', NULL, NULL, NULL, 4, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(85, 'Zapatero a su zapato.', NULL, NULL, NULL, 4, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(86, 'Mi mamá me ama.', NULL, NULL, NULL, 4, 1, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(87, 'En la casa de la señora sofía, a la sombra de un peral me comí un pastel. Por la ventana apareció su sobrino, el de la cara redonda y le mandó un saludo para mi tía.', NULL, NULL, NULL, 4, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(88, 'Lola es la hermana de Sara. Lola es una niña pequeña que le gusta jugar en la nieve, cada vez que nieva Lola se pone sus botas, su abrigo, sus orejeras y sale a jugar.', NULL, NULL, NULL, 4, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(89, 'La gallina roja vive en una granja, ella trabaja mucho, siembra y cosecha el trigo. Ella hace un pan muy rico. Cuando acaba su trabajo ella se come todo el pan.', NULL, NULL, NULL, 4, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL),
(90, 'Carlos es un mono muy divertido, le gusta comer bananas todo el día. A carlos le gusta ser perezoso y hacer reir a sus amigos.', NULL, NULL, NULL, 4, 2, '2020-08-24 05:00:00', '2020-08-10 05:00:00', 1, NULL),
(91, 'Miguel le gusta la playa, a Miguel lee muchas horas. Cuando viaja miguel a la playa siempre lo acompañan sus libros.', NULL, NULL, NULL, 4, 2, '2020-08-24 05:00:00', '2020-08-24 05:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wilian Ponce', 'wily2809@hotmail.com', NULL, '$2y$10$rmNShFGvtFMo/v9aC1WWdedTmAMO4M2.ARWumCcO8zbY6FZNP4b92', '1tesisvector-forest-sunset-forest-sunset-forest-wallpaper-thumb.jpg', NULL, '2020-08-23 23:50:43', '2020-08-23 23:53:05'),
(2, 'santiago', 'sa@hotmail.es', NULL, '$2y$10$sSgJH7Ahzy6TLWY7/QG87OVvv25KlVaky56kyWNGrtT5Sn4VQth/q', '2tesisejercicio nivel 3 palabras.jpg', NULL, '2020-08-24 23:37:11', '2020-08-24 23:38:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_pregunta`
--

CREATE TABLE `usuario_pregunta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `nivel` int(11) NOT NULL,
  `subnivel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario_crea` bigint(20) UNSIGNED NOT NULL,
  `usuario_modifica` bigint(20) UNSIGNED DEFAULT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `id_pre_nivel` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_pregunta`
--

INSERT INTO `usuario_pregunta` (`id`, `tipo`, `nivel`, `subnivel`, `created_at`, `updated_at`, `usuario_crea`, `usuario_modifica`, `id_users`, `id_pre_nivel`) VALUES
(63, 0, 2, 1, '2020-08-28 02:58:17', '2020-08-28 02:58:17', 2, NULL, 2, 5),
(64, 0, 2, 1, '2020-08-28 02:58:17', '2020-08-28 02:58:17', 2, NULL, 2, 6),
(65, 1, 2, 1, '2020-08-28 02:58:17', '2020-08-28 02:58:17', 2, NULL, 2, 7),
(66, 1, 2, 1, '2020-08-28 02:58:17', '2020-08-28 02:58:17', 2, NULL, 2, 8),
(67, 0, 2, 2, '2020-08-28 02:58:46', '2020-08-28 02:58:46', 2, NULL, 2, 29),
(68, 0, 2, 2, '2020-08-28 02:58:46', '2020-08-28 02:58:46', 2, NULL, 2, 30),
(69, 0, 2, 2, '2020-08-28 02:58:46', '2020-08-28 02:58:46', 2, NULL, 2, 31),
(70, 0, 2, 2, '2020-08-28 02:58:46', '2020-08-28 02:58:46', 2, NULL, 2, 32),
(71, 1, 2, 2, '2020-08-28 02:58:46', '2020-08-28 02:58:46', 2, NULL, 2, 33),
(72, 1, 2, 2, '2020-08-28 02:58:46', '2020-08-28 02:58:46', 2, NULL, 2, 34),
(73, 1, 2, 2, '2020-08-28 02:58:46', '2020-08-28 02:58:46', 2, NULL, 2, 35),
(74, 1, 2, 2, '2020-08-28 02:58:46', '2020-08-28 02:58:46', 2, NULL, 2, 36),
(75, 1, 2, 2, '2020-08-28 02:58:46', '2020-08-28 02:58:46', 2, NULL, 2, 37),
(76, 1, 2, 2, '2020-08-28 02:58:46', '2020-08-28 02:58:46', 2, NULL, 2, 38),
(186, 0, 2, 3, '2020-08-29 03:16:44', '2020-08-29 03:16:44', 2, NULL, 2, 39),
(187, 0, 2, 3, '2020-08-29 03:16:44', '2020-08-29 03:16:44', 2, NULL, 2, 40),
(188, 0, 2, 3, '2020-08-29 03:16:44', '2020-08-29 03:16:44', 2, NULL, 2, 41),
(189, 0, 2, 3, '2020-08-29 03:16:44', '2020-08-29 03:16:44', 2, NULL, 2, 42),
(190, 0, 2, 3, '2020-08-29 03:16:44', '2020-08-29 03:16:44', 2, NULL, 2, 43),
(191, 0, 2, 3, '2020-08-29 03:16:44', '2020-08-29 03:16:44', 2, NULL, 2, 44),
(192, 0, 2, 3, '2020-08-29 03:16:44', '2020-08-29 03:16:44', 2, NULL, 2, 45),
(193, 0, 2, 3, '2020-08-29 03:16:44', '2020-08-29 03:16:44', 2, NULL, 2, 46),
(194, 0, 2, 3, '2020-08-29 03:16:44', '2020-08-29 03:16:44', 2, NULL, 2, 47),
(195, 0, 2, 3, '2020-08-29 03:16:44', '2020-08-29 03:16:44', 2, NULL, 2, 48),
(196, 0, 3, 1, '2020-08-29 03:17:46', '2020-08-29 03:17:46', 2, NULL, 2, 49),
(197, 0, 3, 1, '2020-08-29 03:17:46', '2020-08-29 03:17:46', 2, NULL, 2, 50),
(198, 0, 3, 1, '2020-08-29 03:17:46', '2020-08-29 03:17:46', 2, NULL, 2, 51),
(199, 0, 3, 1, '2020-08-29 03:17:46', '2020-08-29 03:17:46', 2, NULL, 2, 52),
(200, 0, 3, 1, '2020-08-29 03:17:46', '2020-08-29 03:17:46', 2, NULL, 2, 53),
(201, 0, 3, 1, '2020-08-29 03:17:46', '2020-08-29 03:17:46', 2, NULL, 2, 54),
(202, 0, 3, 1, '2020-08-29 03:17:46', '2020-08-29 03:17:46', 2, NULL, 2, 55),
(203, 0, 3, 1, '2020-08-29 03:17:46', '2020-08-29 03:17:46', 2, NULL, 2, 56),
(204, 0, 3, 1, '2020-08-29 03:17:46', '2020-08-29 03:17:46', 2, NULL, 2, 57),
(205, 0, 3, 1, '2020-08-29 03:17:46', '2020-08-29 03:17:46', 2, NULL, 2, 58),
(206, 0, 3, 2, '2020-08-29 03:18:30', '2020-08-29 03:18:30', 2, NULL, 2, 59),
(207, 0, 3, 2, '2020-08-29 03:18:30', '2020-08-29 03:18:30', 2, NULL, 2, 60),
(208, 0, 3, 2, '2020-08-29 03:18:30', '2020-08-29 03:18:30', 2, NULL, 2, 61),
(209, 0, 3, 2, '2020-08-29 03:18:30', '2020-08-29 03:18:30', 2, NULL, 2, 62),
(210, 0, 3, 2, '2020-08-29 03:18:30', '2020-08-29 03:18:30', 2, NULL, 2, 63),
(211, 0, 3, 2, '2020-08-29 03:18:30', '2020-08-29 03:18:30', 2, NULL, 2, 64),
(212, 0, 3, 2, '2020-08-29 03:18:30', '2020-08-29 03:18:30', 2, NULL, 2, 65),
(213, 0, 3, 2, '2020-08-29 03:18:30', '2020-08-29 03:18:30', 2, NULL, 2, 66),
(214, 0, 3, 2, '2020-08-29 03:18:30', '2020-08-29 03:18:30', 2, NULL, 2, 67),
(215, 0, 3, 2, '2020-08-29 03:18:30', '2020-08-29 03:18:30', 2, NULL, 2, 68),
(216, 0, 4, 1, '2020-08-29 03:20:20', '2020-08-29 03:20:20', 2, NULL, 2, 79),
(217, 0, 4, 1, '2020-08-29 03:20:20', '2020-08-29 03:20:20', 2, NULL, 2, 80),
(218, 0, 4, 1, '2020-08-29 03:20:20', '2020-08-29 03:20:20', 2, NULL, 2, 81);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conteo` int(11) NOT NULL,
  `fechas` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id_users_foreign` (`id_users`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `preguntas_subnivel`
--
ALTER TABLE `preguntas_subnivel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preguntas_subnivel_usuario_crea_foreign` (`usuario_crea`),
  ADD KEY `preguntas_subnivel_usuario_modifica_foreign` (`usuario_modifica`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_id_users_foreign` (`id_users`);

--
-- Indices de la tabla `subnivel`
--
ALTER TABLE `subnivel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subnivel_usuario_crea_foreign` (`usuario_crea`),
  ADD KEY `subnivel_usuario_modifica_foreign` (`usuario_modifica`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario_pregunta`
--
ALTER TABLE `usuario_pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_pregunta_usuario_crea_foreign` (`usuario_crea`),
  ADD KEY `usuario_pregunta_usuario_modifica_foreign` (`usuario_modifica`),
  ADD KEY `usuario_pregunta_id_users_foreign` (`id_users`),
  ADD KEY `usuario_pregunta_id_pre_nivel_foreign` (`id_pre_nivel`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `preguntas_subnivel`
--
ALTER TABLE `preguntas_subnivel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subnivel`
--
ALTER TABLE `subnivel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario_pregunta`
--
ALTER TABLE `usuario_pregunta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `preguntas_subnivel`
--
ALTER TABLE `preguntas_subnivel`
  ADD CONSTRAINT `preguntas_subnivel_usuario_crea_foreign` FOREIGN KEY (`usuario_crea`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preguntas_subnivel_usuario_modifica_foreign` FOREIGN KEY (`usuario_modifica`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `subnivel`
--
ALTER TABLE `subnivel`
  ADD CONSTRAINT `subnivel_usuario_crea_foreign` FOREIGN KEY (`usuario_crea`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subnivel_usuario_modifica_foreign` FOREIGN KEY (`usuario_modifica`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario_pregunta`
--
ALTER TABLE `usuario_pregunta`
  ADD CONSTRAINT `usuario_pregunta_id_pre_nivel_foreign` FOREIGN KEY (`id_pre_nivel`) REFERENCES `preguntas_subnivel` (`id`),
  ADD CONSTRAINT `usuario_pregunta_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `usuario_pregunta_usuario_crea_foreign` FOREIGN KEY (`usuario_crea`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_pregunta_usuario_modifica_foreign` FOREIGN KEY (`usuario_modifica`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
