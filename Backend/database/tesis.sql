-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2020 a las 04:33:59
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

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
(1, '1995-09-28 00:00:00', 24, '5106700', '0992681086', 'Quito Sur', '2020-08-23 23:53:04', '2020-08-23 23:53:04', 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\User', 1, 'browser', 'ca70d6ea20e66a4fdf93d0d62fc4534e1e83766098aeff185b24d0c4511899a0', '[\"*\"]', '2020-08-24 02:14:59', '2020-08-23 23:53:05', '2020-08-24 02:14:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_subnivel`
--

CREATE TABLE `preguntas_subnivel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oraciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(8, '', NULL, 'z.png', NULL, NULL, '1', '1', '', 2, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1, 8);

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
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(8, NULL, NULL, NULL, 'Z', 2, 1, '2020-08-23 05:00:00', '2020-08-23 05:00:00', 1, 1);

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
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wilian Ponce', 'wily2809@hotmail.com', NULL, '$2y$10$rmNShFGvtFMo/v9aC1WWdedTmAMO4M2.ARWumCcO8zbY6FZNP4b92', '1tesisvector-forest-sunset-forest-sunset-forest-wallpaper-thumb.jpg', NULL, '2020-08-23 23:50:43', '2020-08-23 23:53:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_pregunta`
--

CREATE TABLE `usuario_pregunta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(59, '1', 2, 1, '2020-08-24 02:03:27', '2020-08-24 02:03:27', 1, NULL, 1, 5),
(60, '0', 2, 1, '2020-08-24 02:03:27', '2020-08-24 02:03:27', 1, NULL, 1, 6),
(61, '0', 2, 1, '2020-08-24 02:03:27', '2020-08-24 02:03:27', 1, NULL, 1, 7),
(62, '0', 2, 1, '2020-08-24 02:03:27', '2020-08-24 02:03:27', 1, NULL, 1, 8);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `preguntas_subnivel`
--
ALTER TABLE `preguntas_subnivel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subnivel`
--
ALTER TABLE `subnivel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario_pregunta`
--
ALTER TABLE `usuario_pregunta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
