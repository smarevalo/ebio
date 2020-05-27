-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-05-2020 a las 03:32:21
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eing`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE IF NOT EXISTS `carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `presentacion` blob,
  `perfil` blob,
  `plan_pdf` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de una carrera.' ROW_FORMAT=COMPRESSED;

--
-- Volcado de datos para la tabla `carrera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclos`
--

DROP TABLE IF EXISTS `ciclos`;
CREATE TABLE IF NOT EXISTS `ciclos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET latin1 NOT NULL,
  `id_plan` int(11) NOT NULL,
  `id_orientacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_plan` (`id_plan`),
  KEY `id_orientacion` (`id_orientacion`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Ciclos que conforman los planes.';

--
-- Volcado de datos para la tabla `ciclos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo_materia`
--

DROP TABLE IF EXISTS `ciclo_materia`;
CREATE TABLE IF NOT EXISTS `ciclo_materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciclo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_regimen` int(11) NOT NULL,
  `horas` int(11) NOT NULL,
  `hs_total` int(11) NOT NULL,
  `programa` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `anio` int(11) NOT NULL,
  `codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ciclo` (`id_ciclo`),
  KEY `id_materia` (`id_materia`),
  KEY `id_regimen` (`id_regimen`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Información de una materia dentro de un ciclo.';

--
-- Volcado de datos para la tabla `ciclo_materia`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativas`
--

DROP TABLE IF EXISTS `correlativas`;
CREATE TABLE IF NOT EXISTS `correlativas` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_ciclo_materia` int(11) NOT NULL,
  `id_correlativa` int(11) NOT NULL,
  `id_correlativa_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_correlativa` (`id_correlativa`),
  KEY `id_ciclo` (`id_ciclo_materia`),
  KEY `id_correlativa_tipo` (`id_correlativa_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de unión para definir el tipo de correlatividad y correlatividades de las materias.';

--
-- Volcado de datos para la tabla `correlativas`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativas_tipo`
--

DROP TABLE IF EXISTS `correlativas_tipo`;
CREATE TABLE IF NOT EXISTS `correlativas_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de los tipos de correlatividades.' ROW_FORMAT=COMPRESSED;

--
-- Volcado de datos para la tabla `correlativas_tipo`
--

INSERT INTO `correlativas_tipo` (`id`, `descripcion`) VALUES
(1, 'Regularizada para cursar'),
(2, 'Aprobada para cursar'),
(3, 'Aprobada para rendir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `modalidad` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `enlace` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `profesor` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `publicado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de los cursos.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cvar`
--

DROP TABLE IF EXISTS `cvar`;
CREATE TABLE IF NOT EXISTS `cvar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` int(11) NOT NULL,
  `areas` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `experticia` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `grado` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `especializacion` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `maestria` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `doctorado` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_docente` (`id_docente`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos de un CV resumido de los docentes.';

--
-- Volcado de datos para la tabla `cvar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

DROP TABLE IF EXISTS `docentes`;
CREATE TABLE IF NOT EXISTS `docentes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `persona_id` bigint(20) NOT NULL,
  `id_docente_categoria` int(11) DEFAULT NULL,
  `descripcion` blob,
  PRIMARY KEY (`id`),
  KEY `docente_categoria_idx` (`id_docente_categoria`),
  KEY `persona_id` (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de los docentes.' ROW_FORMAT=COMPRESSED;

--
-- Volcado de datos para la tabla `docentes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_categoria`
--

DROP TABLE IF EXISTS `docente_categoria`;
CREATE TABLE IF NOT EXISTS `docente_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipos de categorías que puede tener un docente.' ROW_FORMAT=COMPRESSED;

--
-- Volcado de datos para la tabla `docente_categoria`
--

INSERT INTO `docente_categoria` (`id`, `nombre`) VALUES
(1, 'Profesor Titular'),
(2, 'Profesor Asociado'),
(3, 'Profesor Adjunto'),
(4, 'Jefe de Trabajos Prácticos'),
(5, 'Ayudante de Primera'),
(6, 'Profesor Adjunto Ad Honorem');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

DROP TABLE IF EXISTS `escuela`;
CREATE TABLE IF NOT EXISTS `escuela` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) CHARACTER SET latin1 NOT NULL,
  `universidad` varchar(60) CHARACTER SET latin1 NOT NULL,
  `director` varchar(80) CHARACTER SET latin1 NOT NULL,
  `color` char(7) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de la escuela.';

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id`, `nombre`, `universidad`, `director`, `color`) VALUES
(1, 'Escuela de Ingenieria', 'UNdeC', 'Ing. Alberto Riba', '#0080ff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Grupos de los cuales pueden formar parte los usuarios.';

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_id` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de cada materia.' ROW_FORMAT=COMPRESSED;

--
-- Volcado de datos para la tabla `materias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_tipo`
--

DROP TABLE IF EXISTS `materias_tipo`;
CREATE TABLE IF NOT EXISTS `materias_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipos de materias que se pueden tenerse en los planes de estudio.';

--
-- Volcado de datos para la tabla `materias_tipo`
--

INSERT INTO `materias_tipo` (`id`, `nombre`) VALUES
(1, 'Común'),
(2, 'Genérica'),
(3, 'Optativa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_docente`
--

DROP TABLE IF EXISTS `materia_docente`;
CREATE TABLE IF NOT EXISTS `materia_docente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciclo_materia` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ciclo` (`id_ciclo_materia`,`id_docente`),
  KEY `cm_materia_docente` (`id_docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de unión para definir la relación entre un docente y una materia.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `optativas`
--

DROP TABLE IF EXISTS `optativas`;
CREATE TABLE IF NOT EXISTS `optativas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_origen` int(11) NOT NULL,
  `id_optativa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_origen` (`id_origen`),
  KEY `id_origen_2` (`id_origen`),
  KEY `optativa_cm` (`id_optativa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de unión para definir la relación entre una materia genérica y sus optativas..';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orientaciones`
--

DROP TABLE IF EXISTS `orientaciones`;
CREATE TABLE IF NOT EXISTS `orientaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_plan` int(11) NOT NULL,
  `nombre` varchar(80) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_plan` (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de las orientaciones que puede tener un plan de estudio.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nombre_2` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `dni` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `cuit` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `email1` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `email2` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de las personas.';

--
-- Volcado de datos para la tabla `persona`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

DROP TABLE IF EXISTS `planes`;
CREATE TABLE IF NOT EXISTS `planes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(80) CHARACTER SET latin1 NOT NULL,
  `duracion` int(11) NOT NULL,
  `vigente` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_carrera` (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de cada plan de estudio.';

--
-- Volcado de datos para la tabla `planes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `contenido` blob,
  `creador_id` int(10) UNSIGNED DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `ultima_modificacion` date DEFAULT NULL,
  `modificador_id` int(10) UNSIGNED DEFAULT NULL,
  `esta_publicado` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(100) CHARACTER SET latin1 DEFAULT 'UNdeC',
  `comienzo` time DEFAULT '09:00:00',
  `fin` time DEFAULT '15:00:00',
  `tipo` int(4) NOT NULL DEFAULT '1',
  `imagen` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_publicaciones_creador_id` (`creador_id`),
  KEY `FK_publicaciones_modificador_id` (`modificador_id`),
  KEY `FK_publicaciones_tipo_publicacion` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 CHECKSUM=1 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de las publicaciones.' DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regimen`
--

DROP TABLE IF EXISTS `regimen`;
CREATE TABLE IF NOT EXISTS `regimen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipos de regimenes que puede tener una materia.';

--
-- Volcado de datos para la tabla `regimen`
--

INSERT INTO `regimen` (`id`, `nombre`) VALUES
(1, 'Anual'),
(2, 'Cuatrimestre 1'),
(3, 'Cuatrimestre 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_publicacion`
--

DROP TABLE IF EXISTS `tipo_publicacion`;
CREATE TABLE IF NOT EXISTS `tipo_publicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipos de publicaciones.';

--
-- Volcado de datos para la tabla `tipo_publicacion`
--

INSERT INTO `tipo_publicacion` (`id`, `nombre`) VALUES
(1, 'Eventos'),
(2, 'Artículos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulos`
--

DROP TABLE IF EXISTS `titulos`;
CREATE TABLE IF NOT EXISTS `titulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_plan` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `id_orientacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_plan` (`id_plan`),
  KEY `id_orientacion` (`id_orientacion`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de titulos que puede tener un plan de estudio.';

--
-- Volcado de datos para la tabla `titulos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(254) CHARACTER SET utf8 NOT NULL,
  `activation_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `forgotten_password_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Datos básicos de cada usuario.';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$kOKjC2ZI.r9ZDap5y6VXzuOLTW01TWZI/mE5yD1VNWCEWaYidlBzq', '', 'admin@admin.com', NULL, NULL, NULL, NULL, 1268889823, 1575146732, 1, 'Sergio', 'Arevalo', 'ADMIN', '0'),
(2, '127.0.0.1', 'user', '$2y$08$4t0JshOQrSJwbqJbTLRineDCBESSAwNTkL4kRz9KzAq0RoyPXHF0i', NULL, 'user@user.com', NULL, 'dbh2E39uTZ5Ud9Tb.wO9ee37b9e7bb6f9ed71b6b', 1522911545, NULL, 1521634623, 1560525321, 1, 'user', 'user', 'UNdeC', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de unión para definir a que grupo pertenece cada usuario.';

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);


--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciclos`
--
ALTER TABLE `ciclos`
  ADD CONSTRAINT `FK_ciclo_orientacion` FOREIGN KEY (`id_orientacion`) REFERENCES `orientaciones` (`id`),
  ADD CONSTRAINT `FK_ciclo_plan` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ciclo_materia`
--
ALTER TABLE `ciclo_materia`
  ADD CONSTRAINT `FK_cm_ciclo` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclos` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_cm_materia` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_cm_regimen` FOREIGN KEY (`id_regimen`) REFERENCES `regimen` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `correlativas`
--
ALTER TABLE `correlativas`
  ADD CONSTRAINT `FK_correlativa_cm` FOREIGN KEY (`id_ciclo_materia`) REFERENCES `ciclo_materia` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_correlativa_correlativa` FOREIGN KEY (`id_correlativa`) REFERENCES `ciclo_materia` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_correlativa_ct` FOREIGN KEY (`id_correlativa_tipo`) REFERENCES `correlativas_tipo` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `cvar`
--
ALTER TABLE `cvar`
  ADD CONSTRAINT `FK_cvar_docente` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `FK_docente_categoria` FOREIGN KEY (`id_docente_categoria`) REFERENCES `docente_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_persona_id_docente` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `FK_asignatura_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `materias_tipo` (`id`);

--
-- Filtros para la tabla `materia_docente`
--
ALTER TABLE `materia_docente`
  ADD CONSTRAINT `FK_cm_docente` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id`),
  ADD CONSTRAINT `FK_cm_materia_docente` FOREIGN KEY (`id_ciclo_materia`) REFERENCES `ciclo_materia` (`id`);

--
-- Filtros para la tabla `optativas`
--
ALTER TABLE `optativas`
  ADD CONSTRAINT `FK_optativa_cm` FOREIGN KEY (`id_optativa`) REFERENCES `ciclo_materia` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_origen_cm` FOREIGN KEY (`id_origen`) REFERENCES `ciclo_materia` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `planes`
--
ALTER TABLE `planes`
  ADD CONSTRAINT `FK_plan_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `FK_publicaciones_creador_id` FOREIGN KEY (`creador_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_publicaciones_modificador_id` FOREIGN KEY (`modificador_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_publicaciones_tipo_publicacion` FOREIGN KEY (`tipo`) REFERENCES `tipo_publicacion` (`id`);

--
-- Filtros para la tabla `titulos`
--
ALTER TABLE `titulos`
  ADD CONSTRAINT `titulo_orientacion` FOREIGN KEY (`id_orientacion`) REFERENCES `orientaciones` (`id`),
  ADD CONSTRAINT `titulo_plan` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
