-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2022 a las 15:56:38
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_plataforma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_profe` int(11) NOT NULL,
  `id_col` int(11) NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_MAX` date NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_acti` int(11) DEFAULT NULL,
  `estado_d` int(11) NOT NULL,
  `descri` varchar(120) NOT NULL,
  `periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `id_curso`, `id_profe`, `id_col`, `fecha_c`, `fecha_MAX`, `Nombre`, `id_materia`, `id_acti`, `estado_d`, `descri`, `periodo`) VALUES
(5, 1, 1, 1, '2022-02-01', '2022-02-10', 'numeros naturales', 1, NULL, 2, 'aprende los numeros naturales', 1),
(7, 1, 1, 1, '2022-02-11', '2022-02-12', 'Comprender estado de notas ingles', 1, NULL, 2, 'adsasdasddas', 1),
(8, 1, 1, 1, '2022-02-15', '2022-02-17', 'Comprender estado de notas ingles', 1, NULL, 2, 'jkljklkjkljkljkjlk', 1),
(9, 1, 1, 1, '2022-02-16', '2022-02-18', 'hola', 1, NULL, 2, 'sdaasdasdasd', 4),
(10, 1, 1, 1, '2022-02-20', '2022-02-23', 'Comprender estado de notas ingles', 1, NULL, 1, 'dsasddasasd', 3),
(11, 1, 1, 1, '2022-02-20', '2022-02-22', 'sasddsaasd', 1, NULL, 1, 'dsasaddsasda', 3),
(12, 1, 1, 1, '2022-02-20', '2022-02-17', 'Comprender estado de notas ingles', 1, NULL, 2, 'dasddasdas', 3),
(13, 1, 1, 1, '2022-02-20', '2022-02-23', 'Comprender estado de notas ingles', 1, NULL, 1, 'dasdassadsda', 4),
(14, 1, 1, 1, '2022-02-20', '2022-02-22', 'saddasasd', 1, 2, 1, 'assdaasdsdaasd', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_hyg`
--

CREATE TABLE `actividad_hyg` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `tipo_s` int(11) NOT NULL,
  `objetivo` varchar(150) NOT NULL,
  `C_puntos` int(11) NOT NULL,
  `puntos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`puntos`)),
  `sub_tema` int(11) DEFAULT 0,
  `PDF` varchar(120) DEFAULT NULL,
  `video` varchar(120) DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `ICFES` varchar(120) DEFAULT NULL,
  `n_icfes` varchar(120) DEFAULT NULL,
  `id_Profesor` int(11) NOT NULL DEFAULT 0,
  `D_es` int(11) NOT NULL,
  `materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad_hyg`
--

INSERT INTO `actividad_hyg` (`id`, `Nombre`, `Tipo`, `tipo_s`, `objetivo`, `C_puntos`, `puntos`, `sub_tema`, `PDF`, `video`, `imagen`, `ICFES`, `n_icfes`, `id_Profesor`, `D_es`, `materia`) VALUES
(2, 'dasdasdasdasd', 1, 1, 'dassdadasdas', 1, '[{\"pregunta\":\"asdsdasdasda\",\"a\":\"sadsdaasdasd\",\"b\":\"asdsadsdaasd\",\"c\":\"asdsadasd\",\"d\":\"asdasdsda\"}]', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2),
(3, 'dasdasdasdasd', 1, 1, 'dassdadasdas', 1, '[{\"pregunta\":\"asdsdasdasda\",\"a\":\"sadsdaasdasd\",\"b\":\"asdsadsdaasd\",\"c\":\"asdsadasd\",\"d\":\"asdasdsda\"}]', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2),
(6, 'dsasdasd', 1, 3, 'asdsdaasdasd', 0, '[]', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2),
(9, 'Lectura de comprensión literal EL RENACUAJO PASEADOR', 1, 3, 'Aprende viendo videos', 1, '[\"crear cosas\"]', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1),
(10, 'Aprende los números naturales', 2, 3, 'Aprende viendo videos', 1, '[\"Mira el video y has un resumen del mismo\"]', NULL, 'http://localhost/EnsoLearningBackend/Archivos_u/PDFs_doc/29198-David+esteban+capera+herrera+(1).pdf', NULL, NULL, NULL, NULL, 0, 0, 1),
(11, 'Lectura de comprensión literal EL RENACUAJO PASEADOR', 2, 3, 'asdsdaasdasd', 1, '[\"leer y resumir\"]', NULL, NULL, 'https://www.youtube.com/watch?v=VfgwBgkdWrU', NULL, NULL, NULL, 0, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_respuestas`
--

CREATE TABLE `actividad_respuestas` (
  `id` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `pregunta` varchar(250) NOT NULL,
  `A` varchar(150) NOT NULL,
  `B` varchar(150) NOT NULL,
  `C` varchar(150) NOT NULL,
  `D` varchar(150) NOT NULL,
  `respuesta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acudientes`
--

CREATE TABLE `acudientes` (
  `id_a` int(11) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Apellido` varchar(120) NOT NULL,
  `curso` int(11) NOT NULL,
  `estu` int(11) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `cod` varchar(250) NOT NULL,
  `id_col` int(11) NOT NULL,
  `Fecha_c` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `id_estu` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `nota` varchar(350) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `fecha` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `id_col` int(11) NOT NULL,
  `anuncio` varchar(720) NOT NULL,
  `fecha` varchar(120) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `titulo` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_col`, `anuncio`, `fecha`, `imagen`, `titulo`) VALUES
(1, 1, 'apertura de la institucion', '22-02-01 11:40:45', '/Archivos_u/Logos_Col/13170-amicis-edmundo-de-corazon-184x300-1.jpg', 'Apertura de la institucion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `nombre_a` varchar(50) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id` int(11) NOT NULL,
  `id_Pro` int(11) NOT NULL,
  `id_Mat` int(11) NOT NULL,
  `Id_curso` int(11) DEFAULT NULL,
  `descr` varchar(120) DEFAULT NULL,
  `notas` varchar(120) DEFAULT 'agrega una noticia para tus estudiantes',
  `eva` int(11) DEFAULT 0,
  `malla` int(11) NOT NULL,
  `libro` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `id_Pro`, `id_Mat`, `Id_curso`, `descr`, `notas`, `eva`, `malla`, `libro`) VALUES
(1, 1, 1, NULL, 'En se  ar es lo que quiero y se hacer', 'agrega una noticia para tus estudiantes', 0, 0, 0),
(2, 1, 1, 1, 'En se  ar es lo que quiero y se hacer', 'agrega una noticia para tus estudiantes', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `genero` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_colegio`
--

CREATE TABLE `codigos_colegio` (
  `id` int(11) NOT NULL,
  `codigo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_cor`
--

CREATE TABLE `codigos_cor` (
  `id` int(11) NOT NULL,
  `codigo_cor` char(120) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod_lib`
--

CREATE TABLE `cod_lib` (
  `id` int(11) NOT NULL,
  `Cod` varchar(170) NOT NULL,
  `Id_Col` int(11) NOT NULL,
  `Id_Curso` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `ciclo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegios`
--

CREATE TABLE `colegios` (
  `id` int(11) NOT NULL,
  `nombreC` varchar(120) NOT NULL,
  `supervisor` int(100) NOT NULL,
  `Cordinador` int(11) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `fecha_creación` date NOT NULL,
  `pago` int(11) NOT NULL,
  `cupos` int(11) NOT NULL,
  `Cupos_max` int(11) NOT NULL,
  `profesores` varchar(120) NOT NULL,
  `id_cod` varchar(60) NOT NULL,
  `info` varchar(250) NOT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `fecha_vencimiento` varchar(70) NOT NULL,
  `promedio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colegios`
--

INSERT INTO `colegios` (`id`, `nombreC`, `supervisor`, `Cordinador`, `contacto`, `fecha_creación`, `pago`, `cupos`, `Cupos_max`, `profesores`, `id_cod`, `info`, `imagen`, `fecha_vencimiento`, `promedio`) VALUES
(1, 'Colegio santa maria rosal', 1, 1, '52465654645', '0000-00-00', 1, 0, 0, '0', '1014ff-ae67-c51d-61d-7a8d875664c', 'las instituciones se establecen de diferentes formas  Una de ellas es a trav  s de documentos  leyes o decretos  En este caso se habla de instituciones formales  como un gobierno o una universidad  por ejemplo ', NULL, '01-03-2022', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

CREATE TABLE `competencias` (
  `id` int(11) NOT NULL,
  `id_pensamiento` int(11) NOT NULL,
  `Descri` varchar(450) NOT NULL,
  `A` varchar(350) NOT NULL,
  `B` varchar(350) NOT NULL,
  `C` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cordinador`
--

CREATE TABLE `cordinador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `pass` varchar(240) DEFAULT NULL,
  `correo` varchar(120) DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `codigo` varchar(120) DEFAULT NULL,
  `id_Col` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cordinador`
--

INSERT INTO `cordinador` (`id`, `nombre`, `pass`, `correo`, `documento`, `apellido`, `codigo`, `id_Col`) VALUES
(1, 'juan', '$2y$10$2Y4vlAWrDomSvxpsy/17PeNc3VZXW7KDUGHM.KWU/5l9wyca9neI6', 'cor@gmail.com', 2147483647, 'perez', 'c193891c-e09c-4b64-a004-16f4a7ece2ca', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(11) NOT NULL,
  `id_curso` int(11) NOT NULL DEFAULT 0,
  `id_col` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `IdCol` int(11) NOT NULL,
  `IdPro` int(11) DEFAULT NULL,
  `Nombres` varchar(170) NOT NULL,
  `Apellidos` varchar(170) NOT NULL,
  `Can_Est` int(11) NOT NULL,
  `Curso_Nu` int(11) NOT NULL,
  `Cod` varchar(120) NOT NULL,
  `Dias` int(11) NOT NULL,
  `horas` int(11) NOT NULL,
  `materias` int(11) NOT NULL,
  `jornada` int(11) NOT NULL,
  `ciclos` varchar(60) NOT NULL,
  `promedio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `IdCol`, `IdPro`, `Nombres`, `Apellidos`, `Can_Est`, `Curso_Nu`, `Cod`, `Dias`, `horas`, `materias`, `jornada`, `ciclos`, `promedio`) VALUES
(1, 1, 1, 'Juan', 'Solis', 54, 102, 'f2e66c-717e-2ee7-7efe-fe83fd4cfe43', 5, 8, 15, 1, 'warning', 85),
(2, 1, NULL, '', '', 15, 505, '3a5ec-83f-b26f-eddb-168eb8a8062', 6, 5, 4, 2, 'danger', 0),
(3, 1, NULL, '', '', 18, 1101, '7ab4728-4eb3-d4d6-2a0-c1a356461368', 5, 5, 19, 2, 'dark', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_as`
--

CREATE TABLE `cursos_as` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_profe` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `Curso_Nu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos_as`
--

INSERT INTO `cursos_as` (`id`, `id_curso`, `id_profe`, `id_materia`, `Curso_Nu`) VALUES
(1, 1, 1, 1, 102);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_promedio`
--

CREATE TABLE `c_promedio` (
  `id` int(11) NOT NULL,
  `promedio` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_libros`
--

CREATE TABLE `db_libros` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `intro` varchar(250) NOT NULL,
  `objetivo` varchar(250) NOT NULL,
  `publico` int(11) NOT NULL,
  `genero` int(11) NOT NULL,
  `portada` varchar(120) NOT NULL,
  `autor` int(11) NOT NULL,
  `editorial` varchar(120) NOT NULL,
  `estrellas` int(11) NOT NULL,
  `rese` varchar(350) NOT NULL,
  `libro` varchar(120) NOT NULL,
  `personas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `derechos_ap`
--

CREATE TABLE `derechos_ap` (
  `id` int(11) NOT NULL,
  `id_pensamiento` int(11) NOT NULL,
  `Texto` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id` int(11) NOT NULL,
  `dia` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_actividad`
--

CREATE TABLE `estado_actividad` (
  `id_a` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_actividad`
--

INSERT INTO `estado_actividad` (`id_a`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Desabilitado'),
(3, 'pediente'),
(4, 'entregado'),
(5, 'Calificado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_users`
--

CREATE TABLE `estado_users` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_users`
--

INSERT INTO `estado_users` (`id`, `Nombre`) VALUES
(1, 'Desconectado'),
(2, 'Conectado'),
(3, 'Ausente'),
(4, 'Esperando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estandares`
--

CREATE TABLE `estandares` (
  `id` int(11) NOT NULL,
  `id_pensamiento` int(11) NOT NULL,
  `Texto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Apellido` varchar(170) NOT NULL,
  `Id_curso` int(11) NOT NULL,
  `id_colegio` int(11) NOT NULL,
  `Correo` varchar(120) NOT NULL,
  `Pass` varchar(250) NOT NULL,
  `Puntos` int(11) NOT NULL,
  `Ciclo` int(11) NOT NULL,
  `Cod` varchar(170) NOT NULL,
  `Curso` int(11) NOT NULL,
  `fecha_reg` date NOT NULL,
  `imagen` varchar(120) NOT NULL DEFAULT '/Archivos_u/Logos_estu/F1.png',
  `promedio` int(11) NOT NULL DEFAULT 0,
  `estado_p` int(11) NOT NULL DEFAULT 1,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `Nombre`, `Apellido`, `Id_curso`, `id_colegio`, `Correo`, `Pass`, `Puntos`, `Ciclo`, `Cod`, `Curso`, `fecha_reg`, `imagen`, `promedio`, `estado_p`, `estado`) VALUES
(1, 'angie', 'cortes julio', 1, 1, 'davidcaperh@gmail.com', '$2y$10$2Y4vlAWrDomSvxpsy/17PeNc3VZXW7KDUGHM.KWU/5l9wyca9neI6', 1, 6, '4b3d3afc-7ec3-43b3-ae5a-065648917424', 1, '2022-02-01', '/Archivos_u/Logos_estu/F1.png', 85, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evalucion`
--

CREATE TABLE `evalucion` (
  `id` int(11) NOT NULL,
  `id_col` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `Titulo` varchar(120) NOT NULL,
  `texto` varchar(250) NOT NULL,
  `preguntas` int(11) NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_max` date NOT NULL,
  `tiempo` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `idm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eva_res`
--

CREATE TABLE `eva_res` (
  `id` int(11) NOT NULL,
  `id_maestra` int(11) NOT NULL,
  `pregunta` varchar(250) NOT NULL,
  `a` varchar(120) NOT NULL,
  `b` varchar(120) NOT NULL,
  `c` varchar(120) NOT NULL,
  `d` varchar(120) NOT NULL,
  `respuesta` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_a`
--

CREATE TABLE `eventos_a` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `fecha_i` int(11) NOT NULL,
  `fecha_f` int(11) NOT NULL,
  `cupos` int(11) NOT NULL,
  `1er` int(11) NOT NULL DEFAULT 0,
  `2do` int(11) NOT NULL DEFAULT 0,
  `3er` int(11) NOT NULL DEFAULT 0,
  `des` varchar(350) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `asignatura` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_r`
--

CREATE TABLE `evento_r` (
  `id` int(11) NOT NULL,
  `id_estu` int(11) NOT NULL,
  `evento` int(11) NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencias`
--

CREATE TABLE `evidencias` (
  `id` int(11) NOT NULL,
  `id_pensamiento` int(11) NOT NULL,
  `Texto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `genero` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `id_dia` int(11) NOT NULL,
  `intencidad` int(11) NOT NULL,
  `jornada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `icfes_maestra`
--

CREATE TABLE `icfes_maestra` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `descri` varchar(250) NOT NULL,
  `objetivo` varchar(250) NOT NULL,
  `sub_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

CREATE TABLE `intentos` (
  `id_i` int(11) NOT NULL,
  `id_estu` int(11) NOT NULL,
  `eva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `N_Materia` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `N_Materia`) VALUES
(1, 'Matematicas'),
(2, 'Sociales'),
(3, 'Español'),
(4, 'Religion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_malla`
--

CREATE TABLE `materias_malla` (
  `id` int(11) NOT NULL,
  `nombre_m` varchar(120) NOT NULL,
  `area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `id_estu` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_colegio` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `id_estu`, `id_docente`, `id_colegio`, `id_curso`, `id_materia`, `id_actividad`, `id_nota`, `comentario`, `tipo`) VALUES
(2, 1, 1, 1, 1, 1, 1, 85, 'sdasdaasdasdasdasdasdsadsadsdasadsda', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_eva`
--

CREATE TABLE `notas_eva` (
  `id` int(11) NOT NULL,
  `id_estu` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_eva` int(11) NOT NULL,
  `tiempo` varchar(70) NOT NULL,
  `resultado` varchar(30) NOT NULL,
  `nota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensamientos`
--

CREATE TABLE `pensamientos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Materias` int(11) NOT NULL,
  `Periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `Correo` varchar(120) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `Documento` int(11) NOT NULL,
  `Cod_materia` int(11) DEFAULT NULL,
  `id_aula` int(11) DEFAULT NULL,
  `id_col` int(11) DEFAULT NULL,
  `Descr` varchar(120) DEFAULT NULL,
  `estudios` varchar(120) NOT NULL,
  `imagen` varchar(120) NOT NULL DEFAULT '/Archivos_u/Logos_estu/F1.png',
  `Cargo` varchar(120) NOT NULL DEFAULT 'Profesor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `Nombre`, `apellido`, `Correo`, `pass`, `Documento`, `Cod_materia`, `id_aula`, `id_col`, `Descr`, `estudios`, `imagen`, `Cargo`) VALUES
(1, 'Juan', 'Solis', 'profe1@gmail.com', '$2y$10$BtmFyi7iR2VAzhE55Lt.1OVxFcdomQ06POuqhznCGI3HZCkFfXJyq', 2147483647, 1, 1, 1, 'En señar es lo que quiero y se hacer', 'licenciado en matematicas', '/Archivos_u/Logos_estu/F1.png', 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promedio`
--

CREATE TABLE `promedio` (
  `id` int(11) NOT NULL,
  `id_col` int(11) NOT NULL,
  `id_estu` int(11) NOT NULL,
  `promedio` int(250) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `promedio`
--

INSERT INTO `promedio` (`id`, `id_col`, `id_estu`, `promedio`, `id_curso`, `id_materia`) VALUES
(1, 1, 1, 85, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperar`
--

CREATE TABLE `recuperar` (
  `id` int(11) NOT NULL,
  `codigo` varchar(250) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `fecha` varchar(70) NOT NULL,
  `tipo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solucion`
--

CREATE TABLE `solucion` (
  `id` int(11) NOT NULL,
  `id_maestra` int(11) NOT NULL,
  `evidencia` varchar(250) NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `id_estu` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `id_curso` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 4,
  `respuestas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`respuestas`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solucion`
--

INSERT INTO `solucion` (`id`, `id_maestra`, `evidencia`, `comentario`, `id_estu`, `fecha_entrega`, `id_curso`, `estado`, `respuestas`) VALUES
(1, 6, 'http://localhost//EnsoLearningBackend/Archivos_u/Acti_solu/1101-hoja+de+vida+y+anexos.docx', 'me gusto es muy bueno', 1, '2022-02-01', 1, 5, '{\"resuelve las operaciones del pdf\":\"asdsadfsda\",\"que son los numero naturales\":\"sdasadsdaasd\",\"donde vemos los numeros naturales\":\"sdaasdasdasd\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub-temas`
--

CREATE TABLE `sub-temas` (
  `id` int(11) NOT NULL,
  `nombre_sub` varchar(120) NOT NULL,
  `descrip` varchar(120) NOT NULL,
  `tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `descr` varchar(180) NOT NULL,
  `id_pensamiento` int(11) NOT NULL,
  `id_temap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_p`
--

CREATE TABLE `tema_p` (
  `id` int(11) NOT NULL,
  `id_pensamiento` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_r`
--

CREATE TABLE `tipos_r` (
  `id` int(11) NOT NULL,
  `nombre_T` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `libro` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acti` (`id_acti`),
  ADD KEY `estado_d` (`estado_d`),
  ADD KEY `id_aula` (`id_curso`);

--
-- Indices de la tabla `actividad_hyg`
--
ALTER TABLE `actividad_hyg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_tema` (`sub_tema`);

--
-- Indices de la tabla `actividad_respuestas`
--
ALTER TABLE `actividad_respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  ADD PRIMARY KEY (`id_a`);

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Pro` (`id_Pro`),
  ADD KEY `id_Mat` (`id_Mat`),
  ADD KEY `horario` (`malla`),
  ADD KEY `Id_curso` (`Id_curso`);

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`),
  ADD KEY `genero` (`genero`);

--
-- Indices de la tabla `codigos_colegio`
--
ALTER TABLE `codigos_colegio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `codigos_cor`
--
ALTER TABLE `codigos_cor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cod_lib`
--
ALTER TABLE `cod_lib`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_Col` (`Id_Col`),
  ADD KEY `Id_Curso` (`Id_Curso`);

--
-- Indices de la tabla `colegios`
--
ALTER TABLE `colegios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cod` (`id_cod`),
  ADD KEY `nombreC` (`nombreC`),
  ADD KEY `supervisor` (`supervisor`),
  ADD KEY `Cordinador` (`Cordinador`);

--
-- Indices de la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pensamiento` (`id_pensamiento`);

--
-- Indices de la tabla `cordinador`
--
ALTER TABLE `cordinador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdPro` (`IdPro`),
  ADD KEY `IdCol` (`IdCol`);

--
-- Indices de la tabla `cursos_as`
--
ALTER TABLE `cursos_as`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_profe` (`id_profe`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `Curso_Nu` (`Curso_Nu`);

--
-- Indices de la tabla `c_promedio`
--
ALTER TABLE `c_promedio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `db_libros`
--
ALTER TABLE `db_libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genero` (`genero`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `derechos_ap`
--
ALTER TABLE `derechos_ap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pensamiento` (`id_pensamiento`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_actividad`
--
ALTER TABLE `estado_actividad`
  ADD PRIMARY KEY (`id_a`);

--
-- Indices de la tabla `estado_users`
--
ALTER TABLE `estado_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estandares`
--
ALTER TABLE `estandares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pensamiento` (`id_pensamiento`),
  ADD KEY `id_pensamiento_2` (`id_pensamiento`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_curso` (`Id_curso`);

--
-- Indices de la tabla `evalucion`
--
ALTER TABLE `evalucion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eva_res`
--
ALTER TABLE `eva_res`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos_a`
--
ALTER TABLE `eventos_a`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evento_r`
--
ALTER TABLE `evento_r`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pensamiento` (`id_pensamiento`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `icfes_maestra`
--
ALTER TABLE `icfes_maestra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `intentos`
--
ALTER TABLE `intentos`
  ADD PRIMARY KEY (`id_i`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias_malla`
--
ALTER TABLE `materias_malla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area` (`area`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas_eva`
--
ALTER TABLE `notas_eva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pensamientos`
--
ALTER TABLE `pensamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Periodo` (`Periodo`),
  ADD KEY `Materias` (`Materias`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cod_materia` (`Cod_materia`),
  ADD KEY `id_col` (`id_col`);

--
-- Indices de la tabla `promedio`
--
ALTER TABLE `promedio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recuperar`
--
ALTER TABLE `recuperar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solucion`
--
ALTER TABLE `solucion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub-temas`
--
ALTER TABLE `sub-temas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pensamiento` (`id_pensamiento`);

--
-- Indices de la tabla `tema_p`
--
ALTER TABLE `tema_p`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_r`
--
ALTER TABLE `tipos_r`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `actividad_hyg`
--
ALTER TABLE `actividad_hyg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `actividad_respuestas`
--
ALTER TABLE `actividad_respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `codigos_colegio`
--
ALTER TABLE `codigos_colegio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `codigos_cor`
--
ALTER TABLE `codigos_cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cod_lib`
--
ALTER TABLE `cod_lib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colegios`
--
ALTER TABLE `colegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cordinador`
--
ALTER TABLE `cordinador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cursos_as`
--
ALTER TABLE `cursos_as`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `c_promedio`
--
ALTER TABLE `c_promedio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `db_libros`
--
ALTER TABLE `db_libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `derechos_ap`
--
ALTER TABLE `derechos_ap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_actividad`
--
ALTER TABLE `estado_actividad`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado_users`
--
ALTER TABLE `estado_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estandares`
--
ALTER TABLE `estandares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `evalucion`
--
ALTER TABLE `evalucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eva_res`
--
ALTER TABLE `eva_res`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos_a`
--
ALTER TABLE `eventos_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evento_r`
--
ALTER TABLE `evento_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `icfes_maestra`
--
ALTER TABLE `icfes_maestra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `intentos`
--
ALTER TABLE `intentos`
  MODIFY `id_i` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias_malla`
--
ALTER TABLE `materias_malla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notas_eva`
--
ALTER TABLE `notas_eva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pensamientos`
--
ALTER TABLE `pensamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `promedio`
--
ALTER TABLE `promedio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `recuperar`
--
ALTER TABLE `recuperar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solucion`
--
ALTER TABLE `solucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sub-temas`
--
ALTER TABLE `sub-temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tema_p`
--
ALTER TABLE `tema_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_r`
--
ALTER TABLE `tipos_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`id_acti`) REFERENCES `actividad_hyg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_ibfk_2` FOREIGN KEY (`estado_d`) REFERENCES `estado_actividad` (`id_a`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`id_Pro`) REFERENCES `profesores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aula_ibfk_2` FOREIGN KEY (`id_Mat`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`genero`) REFERENCES `generos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cod_lib`
--
ALTER TABLE `cod_lib`
  ADD CONSTRAINT `cod_lib_ibfk_1` FOREIGN KEY (`Id_Col`) REFERENCES `colegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cod_lib_ibfk_2` FOREIGN KEY (`Id_Curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `competencias_ibfk_1` FOREIGN KEY (`id_pensamiento`) REFERENCES `pensamientos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_3` FOREIGN KEY (`IdCol`) REFERENCES `colegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos_as`
--
ALTER TABLE `cursos_as`
  ADD CONSTRAINT `cursos_as_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_as_ibfk_3` FOREIGN KEY (`id_profe`) REFERENCES `profesores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_as_ibfk_4` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `db_libros`
--
ALTER TABLE `db_libros`
  ADD CONSTRAINT `db_libros_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `autor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_libros_ibfk_2` FOREIGN KEY (`genero`) REFERENCES `generos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `derechos_ap`
--
ALTER TABLE `derechos_ap`
  ADD CONSTRAINT `derechos_ap_ibfk_1` FOREIGN KEY (`id_pensamiento`) REFERENCES `pensamientos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estandares`
--
ALTER TABLE `estandares`
  ADD CONSTRAINT `estandares_ibfk_1` FOREIGN KEY (`id_pensamiento`) REFERENCES `pensamientos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evidencias`
--
ALTER TABLE `evidencias`
  ADD CONSTRAINT `evidencias_ibfk_1` FOREIGN KEY (`id_pensamiento`) REFERENCES `pensamientos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias_malla`
--
ALTER TABLE `materias_malla`
  ADD CONSTRAINT `materias_malla_ibfk_1` FOREIGN KEY (`area`) REFERENCES `areas` (`id`);

--
-- Filtros para la tabla `pensamientos`
--
ALTER TABLE `pensamientos`
  ADD CONSTRAINT `pensamientos_ibfk_1` FOREIGN KEY (`Materias`) REFERENCES `materias_malla` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`Cod_materia`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
