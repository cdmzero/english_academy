
--
-- Base de datos: `laravel_master`
--
DROP DATABASE IF EXISTS `laravel_master`;
CREATE DATABASE IF NOT EXISTS `laravel_master` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `laravel_master`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lines`
--

CREATE TABLE `lines` (
  `id` int(255) NOT NULL,
  `result_id` int(255) DEFAULT NULL,
  `question_title` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `user_choice` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Option1` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Option2` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Option3` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Option4` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `answerd` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `lines`
--

INSERT INTO `lines` (`id`, `result_id`, `question_title`, `user_choice`, `Option1`, `Option2`, `Option3`, `Option4`, `answerd`, `created_at`, `updated_at`) VALUES
(1, 1, '¿En que ciudad se encuentra la Torre Eifel?', '1', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', NULL, NULL),
(2, 1, '¿Como se llama la capital de Francia?', '3', 'PARIS', 'MADRID', 'PUERTOLLANO', 'POBLETE', '1', NULL, NULL),
(3, 1, '¿Cual es la ciudad mas importante que cruza el Senna?', '1', 'PARIS', 'MADRID', 'MARBELLA', 'POBLETE', '1', NULL, NULL),
(4, 4, 'pepitoa', '4', 'la cara', 'de', 'tu', 'puxx', '4', '2020-06-01 17:48:05', NULL),
(5, 5, '¿En que ciudad se encuentra la Torre Eifel?', '1', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', '2020-06-01 18:05:01', NULL),
(6, 5, '¿Cual es la ciudad mas importante que cruza el Senna?', '1', 'PARIS', 'MADRID', 'MARBELLA', 'ARGAMASILLA', '1', '2020-06-01 18:05:01', NULL),
(7, 5, '¿Como se llama la capital de Francia?', '2', 'PARIS', 'PUERTOLLANO', 'BARCELONA', 'MOZAMBIQUE', '1', '2020-06-01 18:05:01', NULL),
(8, 6, '¿Cual es la ciudad mas importante que cruza el Senna?', '1', 'PARIS', 'MADRID', 'MARBELLA', 'ARGAMASILLA', '1', '2020-06-01 18:31:49', NULL),
(9, 6, '¿Como se llama la capital de Francia?', '3', 'PARIS', 'PUERTOLLANO', 'BARCELONA', 'MOZAMBIQUE', '1', '2020-06-01 18:31:49', NULL),
(10, 6, '¿En que ciudad se encuentra la Torre Eifel?', '3', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', '2020-06-01 18:31:49', NULL),
(11, 7, '¿En que ciudad se encuentra la Torre Eifel?', '1', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', '2020-06-05 13:13:29', NULL),
(12, 7, '¿Cual es la ciudad mas importante que cruza el Senna?', '1', 'PARIS', 'MADRID', 'MARBELLA', 'ARGAMASILLA', '1', '2020-06-05 13:13:29', NULL),
(13, 7, '¿Como se llama la capital de Francia?', '0', 'PARIS', 'PUERTOLLANO', 'BARCELONA', 'MOZAMBIQUE', '1', '2020-06-05 13:13:29', NULL),
(14, 8, '¿En que ciudad se encuentra la Torre Eifel?', '1', 'PARIS', 'MADRID', 'BARCELONA', 'POBLETE', '1', '2020-06-05 13:16:11', NULL),
(15, 8, '¿Cual es la ciudad mas importante que cruza el Senna?', '1', 'PARIS', 'MADRID', 'MARBELLA', 'ARGAMASILLA', '1', '2020-06-05 13:16:11', NULL),
(16, 8, '¿Como se llama la capital de Francia?', '0', 'PARIS', 'PUERTOLLANO', 'BARCELONA', 'MOZAMBIQUE', '1', '2020-06-05 13:16:11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `options`
--

CREATE TABLE `options` (
  `id` int(255) NOT NULL,
  `question_id` int(255) DEFAULT NULL,
  `option_number` int(255) DEFAULT NULL,
  `option_title` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_number`, `option_title`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'PARIS', '2020-06-01 17:44:32', NULL),
(2, 1, 2, 'MADRID', '2020-06-01 17:44:32', NULL),
(3, 1, 3, 'BARCELONA', '2020-06-01 17:44:32', NULL),
(4, 1, 4, 'POBLETE', '2020-06-01 17:44:32', NULL),
(5, 2, 1, 'PARIS', '2020-06-01 17:44:32', NULL),
(6, 2, 2, 'PUERTOLLANO', '2020-06-01 17:44:32', NULL),
(7, 2, 3, 'BARCELONA', '2020-06-01 17:44:32', NULL),
(8, 2, 4, 'MOZAMBIQUE', '2020-06-01 17:44:32', NULL),
(9, 3, 1, 'PARIS', '2020-06-01 17:44:32', NULL),
(10, 3, 2, 'MADRID', '2020-06-01 17:44:32', NULL),
(11, 3, 3, 'MARBELLA', '2020-06-01 17:44:32', NULL),
(12, 3, 4, 'ARGAMASILLA', '2020-06-01 17:44:32', NULL),
(13, 4, 1, 'la cara', '2020-06-01 17:47:53', '2020-06-01 17:47:53'),
(14, 4, 2, 'de', '2020-06-01 17:47:53', '2020-06-01 17:47:53'),
(15, 4, 3, 'tu', '2020-06-01 17:47:53', '2020-06-01 17:47:53'),
(16, 4, 4, 'puxx', '2020-06-01 17:47:53', '2020-06-01 17:47:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(255) NOT NULL,
  `email` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `token` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id` int(255) NOT NULL,
  `test_id` int(255) DEFAULT NULL,
  `question_title` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `answerd` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question_title`, `answerd`, `created_at`, `updated_at`) VALUES
(1, 1, '¿En que ciudad se encuentra la Torre Eifel?', 1, '2020-06-01 17:44:32', NULL),
(2, 1, '¿Como se llama la capital de Francia?', 1, '2020-06-01 17:44:32', NULL),
(3, 1, '¿Cual es la ciudad mas importante que cruza el Senna?', 1, '2020-06-01 17:44:32', NULL),
(4, 4, 'pepitoa', 4, '2020-06-01 17:47:53', '2020-06-01 17:47:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `results`
--

CREATE TABLE `results` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `test_id` int(255) DEFAULT NULL,
  `total_mark` float DEFAULT NULL,
  `proportion` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `results`
--

INSERT INTO `results` (`id`, `user_id`, `test_id`, `total_mark`, `proportion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 98.99, '3/3', '2020-06-01 17:44:32', NULL),
(2, 1, 1, 78.99, '2/3', '2020-06-01 17:44:32', NULL),
(3, 1, 1, 68.99, '2/3', '2020-06-01 17:44:32', NULL),
(4, 1, 4, 100, '1/1', '2020-06-01 17:48:05', NULL),
(5, 1, 1, 33.33, '2/3', '2020-06-01 18:05:01', '2020-06-05 13:16:53'),
(6, 1, 1, 0.3, '1/3', '2020-06-01 18:31:49', '2020-06-05 13:12:04'),
(7, 1, 1, 66.6667, '2/3', '2020-06-05 13:13:29', NULL),
(8, 1, 1, 66.67, '2/3', '2020-06-05 13:16:11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tests`
--

CREATE TABLE `tests` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `test_name` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `test_type` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `test_level` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `num_questions` int(255) DEFAULT NULL,
  `duration` int(255) DEFAULT NULL,
  `status` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `mark_right` float DEFAULT NULL,
  `mark_wrong` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `test_name`, `test_type`, `test_level`, `num_questions`, `duration`, `status`, `mark_right`, `mark_wrong`, `created_at`, `updated_at`) VALUES
(1, 1, 'University', 'Exam', 'High', 3, 20, 'Complete', 1, -1, '2020-06-01 17:44:32', '2020-06-05 13:46:33'),
(2, 1, 'Campus', 'Exam', 'Intermediate', 20, 20, 'Pending', 1, -1, '2020-06-01 17:44:32', NULL),
(3, 1, 'London', 'Exam', 'Basic', 20, 45, 'Pending', 1, -1, '2020-06-01 17:44:32', NULL),
(4, 1, 'A1 A2', 'Exercise', 'Basic', 1, 10, 'Public', 1, -1, '2020-06-01 17:44:32', '2020-06-01 17:47:57'),
(5, 1, 'B1 B2', 'Grammar', 'Intermediate', 5, 10, 'Pending', 1, -1, '2020-06-01 17:44:32', NULL),
(6, 1, 'C1 C2', 'Exercise', 'High', 5, 10, 'Pending', 1, -1, '2020-06-01 17:44:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `user_name` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `surname` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `role` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nick` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `image` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_name`, `surname`, `role`, `nick`, `email`, `password`, `image`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Jose Francisco', 'Funez Arcediano', 'admin', 'cdmzero', 'jose@jose.com', '$2y$10$oXxZR.ynFbwcLLBTOm/g1uSRyb5cW/D/rKsYsxF9nVQnTjGGF6Wjq', NULL, '2020-06-01 17:44:31', '2020-06-05 13:26:40', 'OZ54DOKVTp1h3O0bnAiGjOu65L8jOTcMnl5pLRL7GiHNHNKoCmdNvSk5Dxyd'),
(2, 'Juan', 'Lopez', 'user', 'juanlp', 'jlp@gmail.com', 'pass', NULL, '2020-06-01 17:44:31', NULL, NULL),
(3, 'Manolo', 'Garcia', 'user', 'manlo', 'manolo@gmail.com', 'pass', NULL, '2020-06-01 17:44:31', NULL, NULL),
(4, 'Laura', 'Gutierrez', 'teacher', 'lagu', 'lora@lora.com', '$2y$10$aabvLAiBbo71.oczP8/bjOiKxvzx9XPZf0TTnnD40hCGIL2sAvF7e', NULL, '2020-06-01 17:44:31', '2020-06-05 13:27:21', '3fcgAt1oGlBO3UH3WQye2WjI8PZ2ABBJvllxZWCk0ZXh2x3l3vlEuJowlUBp');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lines`
--
ALTER TABLE `lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_result_ids` (`result_id`);

--
-- Indices de la tabla `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question` (`question_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_test` (`test_id`);

--
-- Indices de la tabla `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_test_id` (`test_id`);

--
-- Indices de la tabla `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usertest` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lines`
--
ALTER TABLE `lines`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `options`
--
ALTER TABLE `options`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `results`
--
ALTER TABLE `results`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lines`
--
ALTER TABLE `lines`
  ADD CONSTRAINT `fk_result_ids` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `fk_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_test` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_test_id` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `fk_usertest` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;
