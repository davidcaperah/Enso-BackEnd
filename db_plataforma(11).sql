-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2021 a las 16:45:01
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

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
(2, 12, 1, 2, '2021-06-08', '2021-11-22', 'Florez Bonneee', 1, NULL, 1, 'holasasaasas31331313131', 1),
(3, 15, 2, 1, '2021-06-11', '2021-06-17', 'Múltiplos de números naturales', 1, 22, 1, 'Múltiplos de números naturales', 3),
(5, 19, 1, 2, '2021-11-03', '2021-11-27', 'El jardin de las mariposas', 1, NULL, 1, 'holaa', 2),
(6, 19, 1, 2, '2021-11-03', '2021-11-26', 'El jardin de las mariposas', 1, 3, 1, 'hola', 2),
(7, 19, 1, 2, '2021-11-08', '2021-11-17', 'Lunes 8 de Nov', 1, 2, 1, 'Holasas', 3),
(8, 19, 1, 2, '2021-11-08', '2021-11-21', 'Nov 9 de Nov', 1, NULL, 1, '31313131weqweq', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_hyg`
--

CREATE TABLE `actividad_hyg` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `objetivo` varchar(150) NOT NULL,
  `puntos` varchar(900) NOT NULL,
  `sub_tema` int(11) DEFAULT 0,
  `PDF` varchar(120) DEFAULT NULL,
  `video` varchar(120) DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `ICFES` varchar(120) DEFAULT NULL,
  `n_icfes` varchar(120) DEFAULT NULL,
  `id_Profesor` int(11) NOT NULL DEFAULT 0,
  `D_es` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad_hyg`
--

INSERT INTO `actividad_hyg` (`id`, `Nombre`, `Tipo`, `objetivo`, `puntos`, `sub_tema`, `PDF`, `video`, `imagen`, `ICFES`, `n_icfes`, `id_Profesor`, `D_es`) VALUES
(2, 'dasdas', 2, 'dasdas', 'dasdasdas', 7, 'NULL', 'NULL', 'http://25.83.167.207/PlataformaHG/Archivos_u/imagen_doc/55725-pexels-maria-orlova-4947406.jpg', 'NULL', '', 0, 0),
(3, 'dasdas', 3, 'dasdas', 'dasdasdas', 7, 'http://25.83.167.207/PlataformaHG/Archivos_u/PDFs_doc/60205-EVIDENCIA-2.pdf', 'NULL', 'NULL', 'NULL', '', 0, 0),
(5, 'hola', 2, 'papapapap', '1.colorear\n2.corear', 10, 'NULL', 'NULL', 'http://25.83.167.207/PlataformaHG/Archivos_u/imagen_doc/37346-2cd5ba9c-3e59-4737-8827-0c4cad5da82d.jpg', 'NULL', '', 0, 0),
(17, 'Ir al paro', 1, 'Marchar por mis derechos', '1. LLevar material antidisturbios\n2. Ir bien preparado siempre', 10, 'NULL', 'https://www.youtube.com/watch?v=EW9olECsZxU', 'NULL', '0', 'NULL', 0, 0),
(18, 'Ir al paro', 2, 'Marchar por mis derechos', '1. LLevar material antidisturbios\n2. Ir bien preparado siempre', 10, 'NULL', 'NULL', 'http://25.83.167.207/PlataformaHG/Archivos_u/imagen_doc/66459-1620080658_628443_1620080809_noticia_normal_recorte1.jpg', '0', 'NULL', 0, 0),
(19, 'triangulos', 1, 'aprender sobre los triangulos y sus componentes', '1. como se realacionan los trinagulo\n2.partes de los triangulos\n3.operaciones', 8, 'NULL', 'https://www.youtube.com/watch?v=I9S1kBXLkBo', 'NULL', '0', 'NULL', 0, 0),
(21, 'dsadas', 2, 'dasdsa', 'dasdasdsa', 11, 'NULL', 'NULL', 'http://25.83.167.207/PlataformaHG/Archivos_u/imagen_doc/81532-portada.jpg', '0', 'NULL', 0, 0),
(22, 'formula de la media', 1, 'Comprender las formulas', '1.ver video\n2.resumen\n3.juego', 13, 'NULL', 'https://www.youtube.com/watch?v=5bZXpfxwHqk', 'NULL', '0', 'NULL', 0, 0),
(32, 'razonamiento', 4, 'comprender y razonar', '1.realizar la icfes', 15, 'NULL', 'NULL', 'NULL', '3', 'icfes', 0, 0),
(33, 'dsadsa', 2, 'asdas', 'dsaddsadas', 16, 'NULL', 'NULL', 'http://25.83.167.207/PlataformaHG/Archivos_u/imagen_doc/77733-pexels-skinny-alien-2318554.jpg', '0', 'NULL', 0, 0),
(34, 'dsadsa', 1, 'asdas', 'dsaddsadas', 16, 'NULL', 'https://www.youtube.com/watch?v=d2mg4i9IB40&list=RD9T8gFt4SU90&index=21&ab_channel=MoratMoratCanaloficialdeartista', 'NULL', '0', 'NULL', 0, 0);

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

--
-- Volcado de datos para la tabla `actividad_respuestas`
--

INSERT INTO `actividad_respuestas` (`id`, `id_actividad`, `pregunta`, `A`, `B`, `C`, `D`, `respuesta`) VALUES
(1, 1, 'fdsfsd', 'fsd', 'fsdf', 'sdfsd', 'fsdf', 'A'),
(2, 1, 'fsdfds', 'fsdfsd', 'dsf', 'fsdfsd', 'fsdf', 'B'),
(3, 4, 'dsadsa', 'dsaasd', 'dasdasdas', 'dasdasdas', 'dasdasdas', 'B'),
(4, 3, 'es a o b?', 'es la b', 'es la a', 'es b y c', 'es d', 'A'),
(5, 3, 'si la a es correcta cual de las 5 personas esta viva', 'luis', 'angel', 'miguel', 'paco', 'A'),
(6, 3, 'cuando 1 persona es conciente de sus actos la respuesta correcta es la b?', 'no por que no esta con ese tema', 'no ya que no sabe por que esta obiligado a hacerlo', 'si', 'no', 'B'),
(7, 5, 'Cual es la a', 'sapo', 'no moleste', 'sapo x2', 'sapo x3', 'A'),
(8, 5, 'jghjgh', 'jghjghj', 'jhgj', 'ghjgh', 'jghj', 'B'),
(9, 6, 'hola', 'es hola', 'es ellow', 'hello', 'good morning', 'D'),
(10, 7, 'Como se llama', 'Youtube', 'Faceboka', 'Gmailll', 'Mapss', 'A');

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

--
-- Volcado de datos para la tabla `acudientes`
--

INSERT INTO `acudientes` (`id_a`, `Nombre`, `Apellido`, `curso`, `estu`, `correo`, `pass`, `cod`, `id_col`, `Fecha_c`) VALUES
(1, 'Madre Luchona', 'Torres Castillo', 12, 3, 'madre@gmail.com', '$2y$10$aDA7UbrSfNwwz7h528aEi.gj/1ao9x8nVH2O.js342NVeQ9.jC0qi', '77ca4fa3-b6f2-4e49-921a-ec15b29d09b1', 2, ''),
(2, 'Padre de', 'Familia', 1, 1, 'Padredefamilia@gmail.com', '$2y$10$gzo3AR98CEF1Eulv7GsCt.DTfycCLKoo11PoKK8.RcbYWm.mjdGGW', 'c2c14ecc-763a-42ce-9227-0cf207640264', 1, '23-08-2021 19:22:00');

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

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `id_estu`, `titulo`, `nota`, `estado`, `id_docente`, `fecha`) VALUES
(2, 3, 'Probando', '12313123123123123123', 2, 1, 'May 31, 2021, 10:17 am'),
(3, 5, 'dasdas', 'dsadsadsadsa', 1, 1, 'May 31, 2021, 10:33 am'),
(4, 3, 'Sapo catre setenta hpta', 'dasdasdasdas das dasda sdas', 2, 1, 'June 4, 2021, 7:42 am'),
(5, 1, '1', '1', 1, 1, '21-09-01 22:15:03'),
(6, 1, '1', '1', 1, 1, 'September 1, 2021, 10:16 pm'),
(7, 1, '1', '1', 1, 1, '21-09-01 22:17:44 pm'),
(8, 1, '1', '1', 1, 1, '21-09-01 20:18:42 pm'),
(9, 1, '1', '1', 1, 1, '21-09-01 15:22:23 pm');

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
(4, 2, 'Entrega de notas para la fecha 10 de junio del 2021, esperamos que todos puedan entregar sus actividades correctamente', 'June 3, 2021, 12:29 pm', '/Archivos_u/Anuncios/77396-recordatorio.jpg', 'Proxima semana se cierran notas'),
(5, 1, 'sera a las 4pm', 'June 11, 2021, 4:33 pm', '/Archivos_u/Anuncios/71331-recordatorio.jpg', 'Proxima semana se cierran notas'),
(6, 1, 'es un anuncio editado', '21-08-25 18:16:48', '/Archivos_u/Anuncios/42098-killjoy.jpg', 'Hola que hace'),
(7, 2, 'Mañana se celebrará la entrega de boletines', '21-08-28 17:32:44', 'http://25.83.167.207/EnsoLearningBackend/Archivos_u/Anuncios/7209-img1.jpg', 'Mañana se cierran las notas'),
(11, 6, 'Chuzo', '21-11-09 16:04:24', 'http://localhost//EnsoLearningBackend/Archivos_u/Anuncios/81143-matematicas-concepto-lifeder-min-1024x682.jpg', '¿Que hay pa hacer?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `nombre_a` varchar(50) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre_a`, `curso`) VALUES
(4, 'Humanidades', 2),
(6, 'Humanidades', 1),
(7, 'Humanidades', 2),
(8, 'Matematicas', 4),
(9, 'ESPAÑOL', 4),
(10, 'matematicas', 1),
(19, 'Humanidades', 6),
(20, 'matematicas', 6),
(21, 'algebra', 8);

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
(1, 1, 1, NULL, 'Quiero que todos se diviertan ', 'agrega una noticia para tus estudiantes', 0, 0, 0),
(2, 2, 6, NULL, 'Un docente es aquel individuo que se dedica a ense  ar o que realiza acciones referentes a la ense  anza      En el leng', 'agrega una noticia para tus estudiantes', 0, 0, 0),
(3, 1, 1, 19, 'Quiero que todos se diviertan ', 'agrega una noticia para tus estudiantes', 0, 0, 1),
(4, 2, 6, 15, 'Un docente es aquel individuo que se dedica a ense  ar o que realiza acciones referentes a la ense  anza      En el leng', 'agrega una noticia para tus estudiantes', 0, 0, 0),
(5, 1, 1, 12, 'Quiero que todos se diviertan ', 'agrega una noticia para tus estudiantes', 0, 1, 0),
(9, 1, 5, 12, 'Quiero que todos se diviertan ', 'agrega una noticia para tus estudiantes', 0, 0, 0),
(10, 1, 1, 4, 'Quiero que todos se diviertan ', 'agrega una noticia para tus estudiantes', 0, 0, 0),
(11, 1, 4, 19, 'Quiero que todos se diviertan ', 'agrega una noticia para tus estudiantes', 0, 0, 0),
(12, 3, 2, NULL, 'This is the classroom  Yep Yep Yep', 'agrega una noticia para tus estudiantes', 0, 0, 0),
(13, 4, 2, NULL, 'Solo necesito esta aula para ense  ar mi materia', 'agrega una noticia para tus estudiantes', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `genero` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `autor`, `genero`) VALUES
(1, 'Agatha Chri', 3),
(2, 'Julio Verne', 3),
(3, 'García Márq', 4);

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

--
-- Volcado de datos para la tabla `codigos_cor`
--

INSERT INTO `codigos_cor` (`id`, `codigo_cor`, `fecha`) VALUES
(4, 'fcd841ce-389d-4b2a-a8b2-b0a01b24393c', '2021-06-03'),
(8, '6837e80a-16a5-4cc9-8671-610d7a0b9ac1', '2021-08-24'),
(9, '091e4c0c-0ee8-4641-b466-89e87e39d1bd', '2021-08-24'),
(10, '36d60fe1-3ccf-4c79-bf68-3f36021cca38', '2021-11-02');

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

--
-- Volcado de datos para la tabla `cod_lib`
--

INSERT INTO `cod_lib` (`id`, `Cod`, `Id_Col`, `Id_Curso`, `fecha`, `ciclo`) VALUES
(11, '04f3d8e0-4498-4774-8227-02a5b69e15dc', 5, 25, '2021-11-02', 6),
(12, '978cf5d0-e9bb-46c9-8d49-ffef06bbb805', 1, 1, '2021-11-02', 5);

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
(1, 'Colegio Santa Maria', 1, 2, '3223584804', '2021-05-11', 1, 0, 5, '0', 'b5a355-4b31-cbb3-202-2d1b8e3d8f5', 'somos una institución', '/Archivos_u/Logos_Col/31312-maxresdefault.jpg', '02-12-2021', 9),
(2, 'Colegio Gran Colombiano', 1, 1, '3206803309', '2021-05-11', 1, 0, 88, '0', '50b7e1c-873-db56-6bc3-a44e2a6d428', 'La Institución Educativa Cafí  Madrid le da la bienvenida a nuestra página web  Somos un Colegio oficial en convenio con la Alcald  a de Bucaramanga y los Colegios Minuto de Dios  desde el a  o 2003  formamos ni  as  ni  os y j  venes desde los gra', '/Archivos_u/Logos_Col/25671-White-and-Black-Mountain-Clean-and-Modern-Church-Logo-(1).png', '02-12-2021', 8),
(3, 'Colegio Italiano Leonardo Da Vinci', 1, 4, '3651546', '2021-08-05', 1, 0, 0, '0', '156f25-d80-d508-dcb7-7d33c2821c7', '1weweweweqweqweqweqweqweqweqweqweqwe', NULL, '02-12-2021', 0),
(4, 'Colegio Italiano Rafaello', 1, 6, '4587149', '2021-08-13', 1, 0, 0, '0', '5145d25-fc68-b6e0-e680-01fdc3f5f7c1', 'Es una instituci  n italiana de m  s grande trayectoria FIN ', NULL, '02-12-2021', 0),
(5, 'Institutomiprimerapuñalada', 1, 7, '2515522', '2021-08-24', 1, 0, 12, '0', '427a2b-f6b0-a800-517-630bdb716e1f', 'pss aca se estudia para estudiar la estudiacion de la estudiadera', NULL, '02-12-2021', 0),
(6, 'Comprender estado de notas ingles', 1, 8, '1515116211', '2021-08-24', 1, 0, 0, '0', '6a5b8c3-2428-374b-1c13-6aea1dd33b2', 'arendern hikfdihddie  lde hefldf j lfddfldfejkk dlfdjfdflfdjk', NULL, '02-12-2021', 0);

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

--
-- Volcado de datos para la tabla `competencias`
--

INSERT INTO `competencias` (`id`, `id_pensamiento`, `Descri`, `A`, `B`, `C`) VALUES
(7, 4, 'Plantea y resuelve situaciones problema aplicando los conceptos y definiciones de  conjuntos y números naturales.', 'Identifica diferencias y semejanzas dentro del sistema de números naturales.', 'Resuelve situaciones problema aplicando operaciones con conjuntos y números naturales.', 'Propone diferentes procedimientos para resolver problemas con números naturales.');

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
(1, 'Juan David', '$2y$10$xN1Wu9FRfQKxxKwJAXU4yuN.RMHWD9Jmwy15zIkefP7NES0JnSeCS', 'rjuandavid1002@gmail.com', 1000130596, 'Ramirez Monje', 'f9e2db99-c217-44ff-b7b1-9131cc9b9ced', 0),
(2, 'david esteban', '$2y$10$Xm6jvsSHauR7iqiVMa2j8uHdkcwKS5xmsS6x96Kv2./epb4iGCGiq', 'davideste@gmail.com', 1001285573, 'capera herrera', '6028c3be-c17b-4d56-8295-39444c6ddd40', 0),
(3, NULL, '$2y$10$hi5i91nUVbNGUZUvQeubNu1OGIgNSTFc7WEcWIs4Qu6bSxUtiAtoK', 'acu@gmail.com', NULL, 'Ramirez Mendoza', NULL, 0),
(4, 'Iván', '$2y$10$4QM9y12O/rfWQdiQlAHtBuR5Qj1NtR/xOjTAPr1qIeZ1wWx0668bu', 'ivan.grafiker@gmail.com', 1031180139, 'Ruiz', 'd1e8a750-0ec9-47c4-b5f6-8555ced6f783', 0),
(5, 'Iván', '$2y$10$dctdsq3WvNnORKS/H22xT.PIKCseu2srqdVvGF1mLeTC.hrBfGdDK', 'ivan.grafiker@gmail.com', 1031180139, 'Ruiz', 'd1e8a750-0ec9-47c4-b5f6-8555ced6f783', 0),
(6, 'Alex', '$2y$10$5yhENmSwc4onDu.t7LAokO6g1DApDi5b8t2Z51Yu6UMzFfKbMDkA6', 'ivan.gra@gmail.com', 1234567, 'Ramirez', 'ac770d08-b668-475b-a2e8-bec82fd14359', 0),
(7, 'CORDINADOR', '$2y$10$AzrO5joSAisAhrL0e32mVeUH0xizc0wvF0/cQynYte5Xva/XmDG9.', 'Cordinador@hijpasdpiasdip.com', 2003530, 'ASDASDASDASD', '0db480e2-1cbc-4562-afd0-7530c9583325', 0),
(8, 'pepe', '$2y$10$iQnxIg6OxUXRX7U1OvtTcOmBA00jGS0a8ASEgwTiwBi90Fu0YXC5e', 'felipemarin0152@gmail.com', 1001285573, 'pepe', '772947f9-e648-47bd-baec-d0b07966da92', 0);

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

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `Nombre`, `id_curso`, `id_col`) VALUES
(1, 'Decimo', 0, 0),
(2, 'noveno', 0, 0),
(4, 'Sexto', 0, 0),
(5, 'Decimo', 1, 1),
(6, 'Decimo', 1, 1),
(8, 'Matematicas', 0, 0);

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
(1, 1, 2, 'Julio', 'Cortaza', 10, 101, '1e1e2ed-1da-a81c-061f-d0b7e0bed66e', 6, 6, 10, 1, 'warning', 85),
(2, 1, NULL, '', '', 10, 202, '7b1f225-83db-6d08-8e88-8a8fc61ad644', 6, 6, 10, 1, 'warning', 0),
(3, 2, NULL, '', '', 10, 101, 'ccb075a-2735-f0c4-3a2-5eda804333b', 5, 5, 9, 1, 'warning', 0),
(4, 2, NULL, '', '', 10, 303, '4c483e1-b44-48b-4e81-1d55f6ac4b', 5, 6, 9, 1, 'warning', 0),
(5, 2, NULL, '', '', 10, 404, 'e22fe0f-2b42-03e7-8e7-dfc20d1a7e43', 5, 6, 9, 1, 'danger', 0),
(6, 1, NULL, '', '', 10, 303, '55ca6ee-ff7a-247-b341-dfce2a1dca61', 6, 6, 10, 1, 'warning', 0),
(7, 1, NULL, '', '', 10, 404, '81da62-0840-e155-63c-54c4764eeaa', 6, 6, 9, 2, 'warning', 0),
(8, 2, NULL, '', '', 15, 601, '5ec1835-efe-8313-ff05-dcbe6132ecf6', 5, 6, 12, 1, 'danger', 0),
(9, 2, NULL, '', '', 14, 704, 'ff660-efa1-dfa6-ae60-5ce861f125e', 5, 6, 9, 1, 'danger', 0),
(10, 1, NULL, '', '', 10, 505, 'c8a7b1d-b703-8a6e-44d0-c56c1805761c', 6, 6, 10, 1, 'danger', 0),
(11, 1, NULL, '', '', 9, 606, 'b57f613-adb2-3d8e-122a-46aaeba4c758', 6, 6, 10, 1, 'danger', 0),
(12, 2, NULL, '', '', 17, 901, '0f2db4f-c130-8d17-4f22-3aad1a4f08', 5, 6, 9, 1, 'danger', 83),
(13, 2, 1, 'Daniel Esteban', 'Ramirez Mendoza', 27, 1101, 'd272718-8582-d0d6-bbca-3ecd82a714d4', 5, 6, 14, 1, 'dark', 0),
(14, 1, NULL, '', '', 12, 707, '57034cf-b2af-c88e-c16e-74553d6721', 6, 6, 10, 1, 'danger', 0),
(15, 1, NULL, '', '', 10, 808, 'c4ecd2-4c75-814-51e-0be28eca62a8', 6, 6, 10, 1, 'danger', 0),
(16, 2, NULL, '', '', 12, 1102, 'bf35f6b-ed08-fe1d-c7e3-36b37bd572b3', 5, 6, 9, 1, 'dark', 0),
(17, 1, NULL, '', '', 10, 909, '15debc5-72a0-3d2a-bd7d-5a5c7f5afb2', 6, 6, 10, 1, 'danger', 0),
(18, 2, NULL, '', '', 18, 703, '2a6bcb3-f26b-5d5f-0b38-c472f2603616', 5, 6, 13, 2, 'danger', 0),
(19, 2, NULL, '', '', 17, 1103, 'ae087a8-f35-4cfb-37d-844f14018131', 5, 4, 12, 3, 'dark', 0),
(20, 2, NULL, '', '', 18, 1003, 'c54b48-ae0-dc2e-ebbf-24dbc73cee3c', 9, 4, 12, 3, 'dark', 0),
(21, 1, NULL, '', '', 2, 1111, 'e7fe57f-e5f-ca5f-31c5-a3c27a7be1a5', 6, 6, 12, 1, 'dark', 0),
(22, 3, 3, 'Alexander', 'Ruiz Velásquez', 32, 1101, 'b1e025-60da-244a-3748-ec677f1fcee3', 5, 40, 10, 1, '', 0),
(23, 4, 4, 'Iván', 'Ruiz', 30, 1101, 'e0431b-fa35-0d2f-03-a81d0843787b', 5, 8, 8, 1, 'dark', 0),
(24, 4, NULL, '', '', 30, 1001, 'ff8afd-1e25-364-1344-1c6e086602a', 5, 8, 8, 2, 'dark', 0),
(25, 5, NULL, '', '', 11, 21, '4ec013-f006-dff6-b177-ca752d1f365', 2, 6, 2, 1, 'danger', 0);

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
(1, 19, 1, 1, 1103),
(2, 15, 2, 1, 808),
(3, 12, 1, 1, 901),
(7, 12, 1, 5, 901),
(8, 4, 1, 1, 303),
(9, 19, 1, 4, 1103);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_promedio`
--

CREATE TABLE `c_promedio` (
  `id` int(11) NOT NULL,
  `promedio` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `c_promedio`
--

INSERT INTO `c_promedio` (`id`, `promedio`, `id_curso`) VALUES
(1, 12, 12);

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

--
-- Volcado de datos para la tabla `db_libros`
--

INSERT INTO `db_libros` (`id`, `Nombre`, `intro`, `objetivo`, `publico`, `genero`, `portada`, `autor`, `editorial`, `estrellas`, `rese`, `libro`, `personas`) VALUES
(1, 'Diestra de dios padre', 'En la diestra de dios padre es un cuento de Tomás Carrasquilla. Este relato es la adaptación de un cuento medieval europeo, en el que el protagonista es un hombre extremadamente generoso llamad', 'En la diestra de dios padre es un cuento de Tomás Carrasquilla. Este relato es la adaptación de un cuento medieval europeo, en el que el protagonista es un hombre extremadamente generoso llamad', 2, 3, 'http://25.83.167.207/PlataformaHG/Archivos_u/Portadas_lib/48438-portada8-400x539.jpg', 1, 'ministerio cultura', 4, 'En la diestra de dios padre es un cuento de Tomás Carrasquilla. Este relato es la adaptación de un cuento medieval europeo, en el que el protagonista es un hombre extremadamente generoso llamad', 'http://25.83.167.207/PlataformaHG/Archivos_u/libros/97609-a_la_diestra_de_dios_padre_leersmicuento_08.pdf', 1);

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

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id`, `dia`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes');

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
  `promedio` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `Nombre`, `Apellido`, `Id_curso`, `id_colegio`, `Correo`, `Pass`, `Puntos`, `Ciclo`, `Cod`, `Curso`, `fecha_reg`, `imagen`, `promedio`) VALUES
(1, 'camilo', 'de la peña', 1, 1, 'camilo@gmail.com', '$2y$10$2.TtbChqOK9kXoNmdgZSRuuXi9EQIIcZQwSBIWfO9X5ud2gnvGj1K', 1, 5, 'c2c14ecc-763a-42ce-9227-0cf207640264', 1, '2021-05-11', '/Archivos_u/Logos_estu/F1.png', 84),
(2, 'Juan Carlos', 'dsadas', 16, 2, 'ciclo3@gmail.com', '$2y$10$qHGa62.9/OVTkHcVRtweDu3ffALXmi5FIhUoNznj6OizVXfD685h2', 1, 7, 'bda73498-094f-4ef4-91bd-3f56e6aef904', 16, '2021-05-11', '/Archivos_u/Logos_estu/F1.png', 0),
(3, 'Stephany Camila', 'Castillo ', 12, 2, 'ciclo2@gmail.com', '$2y$10$tipfo9E5KPIDMGeJg3xl5ucoeoohLGeGeNdQzQLxPLGV1Lz64dsvy', 1, 6, '77ca4fa3-b6f2-4e49-921a-ec15b29d09b1', 12, '2021-05-11', '/Archivos_u/Logos_estu/F1.png', 100),
(4, 'david', 'CASALLAS', 15, 1, 'davidestudiante2@gmail.com', '$2y$10$0uZE//UFVf4UtAXjLbhb6u/GwK./aPFpZQNTbbLWj.2Cw5j.hB8S.', 1, 6, '34db22db-ea7c-46cb-9d2d-f970814d610c', 15, '2021-05-11', '/Archivos_u/Logos_estu/F1.png', 85),
(5, 'Maicol Jesid', 'Barrera Gonzales', 12, 2, 'maik@gmail.com', '$2y$10$WqFsnuzK8HbS6oNJriWXw.ffOAMvJk4orP3a3RlkaCf4za85Ob1I.', 1, 6, '6a2bc919-d840-4609-9f97-eebe61457155', 12, '2021-05-14', '/Archivos_u/Logos_estu/F1.png', 72),
(6, 'Danna Valentina', 'Capera', 15, 1, 'danna@gmail.com', '$2y$10$3ol25HCae//qlGNjWVLSX.QBZ5H897Uf8yLmwXDLtHuV4cA/PhbMq', 1, 6, '57547e8c-6e32-47e7-957d-cb0b2db9d621', 15, '2021-05-14', '/Archivos_u/Logos_estu/F1.png', 0),
(7, 'david', 'dfasdas', 20, 2, 'ciclo1@gmail.com', '$2y$10$enYXb7voDkmgRi/sKMSCOurPFDFbCJoMI4Xdp3R.aoxsF.ShQfHu6', 1, 5, '7f1c4497-47e1-4cfd-bb46-dbdf48736aa4', 20, '2021-06-03', '/Archivos_u/Logos_estu/F1.png', 70),
(8, 'Benito', 'Camela', 12, 2, 'Benito@gmail.com', '$2y$10$8iE.HWDkQvcHKCtw.i4iQelyjzz2M7isXBV/x9tH7WeTTUUBPFtWq', 1, 6, 'b967781c-673c-40f6-967b-6f433e86ec24', 12, '2021-06-04', '/Archivos_u/Logos_estu/F1.png', 100),
(9, 'es estu', 'estu', 1, 2, 'estu@gmail.com', 'asdadggadagagasgd', 2, 1, 'qeheqtgtgqtgewqwqtgeagwqe', 1, '0000-00-00', '/Archivos_u/Logos_estu/F1.png', 82);

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

--
-- Volcado de datos para la tabla `evalucion`
--

INSERT INTO `evalucion` (`id`, `id_col`, `id_curso`, `id_doc`, `Titulo`, `texto`, `preguntas`, `fecha_c`, `fecha_max`, `tiempo`, `estado`, `idm`) VALUES
(9, 2, 12, 1, 'oioiuo', 'uiouioui', 3, '2021-06-04', '2021-06-25', 50, 2, 5),
(10, 2, 19, 1, 'El jardin de las mariposas', 'Queremos que aprendas...', 1, '2021-11-10', '2021-11-26', 120, 0, 1),
(11, 2, 12, 1, 'El jardin de las mariposas', 'eqeqeqeqeqeqq', 2, '2021-11-11', '2021-11-20', 120, 0, 1);

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

--
-- Volcado de datos para la tabla `eva_res`
--

INSERT INTO `eva_res` (`id`, `id_maestra`, `pregunta`, `a`, `b`, `c`, `d`, `respuesta`) VALUES
(1, 1, 'hola', 'dsad', 'dsadas', 'dsadas', 'dsadsa', 'A'),
(2, 1, 'dadasd', 'asdasd', 'asdas', 'dasd', 'asdsadas', 'A'),
(3, 2, 'dasdsa', 'dsadsadasdas', 'dasdasdas', 'dasdas', 'dasdasdas', 'A'),
(4, 2, 'dasdsa', 'dsadsadasdas', 'dasdasdas', 'dasdas', 'dasdasdas', 'A'),
(5, 2, 'dasdas', 'dadsadas', 'dasdasdas', 'dasdasdas', 'dasdas', 'A'),
(6, 3, 'dasdas', 'dasdsa', 'dsadas', 'dsadsadas', 'dsadasdsa', 'A'),
(7, 3, 'dasdsa', 'asdasda', 'dsadasd', 'dasdas', 'dsadsadsa', 'A'),
(8, 4, 'dsadsa', 'dasdsa', 'dasdas', 'dasdsada', 'dsadasdas', 'A'),
(9, 4, 'dasdsa', 'dsadsa', 'dsadas', 'dasdasdas', 'dasdsa', 'B'),
(10, 5, 'dasdas', 'dasdas', 'dasdsad', 'dasdasd', 'dasdasdas', 'A'),
(11, 5, 'dsadas', 'asdsadas', 'dasdasdas', 'asddasdas', 'dasdsadas', 'A'),
(12, 6, 'dasdsadsa', 'dasdsadsda', 'dsadas', 'dasdsa', 'dasdsa', 'A'),
(13, 6, 'das', 'dsadsa', 'dasdsadsa', 'dasdsadas', 'dasdasdas', 'A'),
(14, 7, 'dasd', 'dasdsa', 'dasdas', 'dasdas', 'dasdas', 'B'),
(15, 7, 'dsad', 'dasdas', 'dasdas', 'dasdas', 'dasdas', 'B'),
(18, 9, 'kuyiyui', 'yuiyu', 'iuyi', 'yuiuyi', 'yuiuyi', 'A'),
(19, 9, 'iuiyuiyu', 'iuyiyui', 'uiyui', 'yui', 'yuiyuiyu', 'A'),
(20, 9, 'iuyiuy', 'iyui', 'yuiuy', 'iuyiyu', 'iuyiyu', 'A'),
(21, 10, '', 'Youtube', 'Faceboka', 'Gmailll', 'Mapss', 'A'),
(22, 11, '', 'Mark', 'Fredy', 'Robotica', 'Alfredo', 'A'),
(23, 11, '', 'Mark', 'Fredy', 'Robotica', 'Alfredo', 'A');

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

--
-- Volcado de datos para la tabla `eventos_a`
--

INSERT INTO `eventos_a` (`id`, `Nombre`, `img`, `fecha_i`, `fecha_f`, `cupos`, `1er`, `2do`, `3er`, `des`, `estado`, `asignatura`) VALUES
(13, 'Pruebas matematicas!!!', 'http://localhost//EnsoLearningBackend/Archivos_u/eventos/43399-matematicas-concepto-lifeder-min-1024x682.jpg', 2021, 2021, 12, 0, 0, 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit mollis, tincidunt senectus ridiculus primis fusce hac malesuada dis, feugiat class aliquam nisi aliquet cursus fringilla. ', 1, '2');

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

--
-- Volcado de datos para la tabla `evidencias`
--

INSERT INTO `evidencias` (`id`, `id_pensamiento`, `Texto`) VALUES
(6, 4, 'Reconoce la diferencia entre el conjunto de números.'),
(7, 4, 'Utiliza procedimientos para desarrollar operaciones con números naturales.'),
(8, 4, 'Identifica las diferentes operaciones con múltiplos y divisores.'),
(9, 4, 'Utiliza procedimientos para aplicar las propiedades de los divisores de un número.'),
(10, 4, 'Justifica procedimientos con los cuales se representa operaciones con números naturales.'),
(11, 4, 'Identifica los números naturales como un conjunto ordenado.'),
(12, 4, 'Resuelve operaciones aditivas y multiplicativas con números naturales.'),
(13, 4, 'Resuelve operaciones combinadas con números naturales, respetando el orden en las operaciones.'),
(14, 4, 'Aplica los conceptos aprendidos de numeración y de expresiones con números naturales en situaciones reales.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `genero` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `genero`) VALUES
(3, 'dramático'),
(4, 'didáctico');

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

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `id_aula`, `id_mat`, `id_dia`, `intencidad`, `jornada`) VALUES
(1, 3, 1, 1, 5, 1),
(2, 3, 1, 1, 5, 1),
(3, 3, 2, 1, 5, 1),
(4, 3, 2, 1, 5, 1),
(5, 3, 3, 1, 5, 1),
(6, 3, 7, 2, 5, 1),
(7, 3, 1, 2, 5, 1),
(8, 3, 6, 2, 5, 1),
(9, 3, 3, 2, 5, 1),
(10, 3, 2, 2, 5, 1),
(11, 3, 2, 3, 5, 1),
(12, 3, 3, 3, 5, 1),
(13, 3, 6, 3, 5, 1),
(14, 3, 5, 3, 5, 1),
(15, 3, 4, 3, 5, 1),
(16, 3, 5, 4, 5, 1),
(17, 3, 1, 4, 5, 1),
(18, 3, 2, 4, 5, 1),
(19, 3, 4, 4, 5, 1),
(20, 3, 3, 4, 5, 1),
(21, 3, 6, 5, 5, 1),
(22, 3, 5, 5, 5, 1),
(23, 3, 3, 5, 5, 1),
(24, 3, 1, 5, 5, 1),
(25, 3, 4, 5, 5, 1),
(44, 12, 5, 1, 6, 1),
(45, 12, 3, 1, 6, 1),
(46, 12, 3, 1, 6, 1),
(47, 12, 3, 1, 6, 1),
(48, 12, 4, 1, 6, 1),
(49, 12, 6, 1, 6, 1),
(50, 12, 5, 2, 6, 1),
(51, 12, 3, 2, 6, 1),
(52, 12, 2, 2, 6, 1),
(53, 12, 2, 2, 6, 1),
(54, 12, 7, 2, 6, 1),
(55, 12, 6, 2, 6, 1),
(56, 12, 7, 3, 6, 1),
(57, 12, 7, 3, 6, 1),
(58, 12, 2, 3, 6, 1),
(59, 12, 2, 3, 6, 1),
(60, 12, 3, 3, 6, 1),
(61, 12, 3, 3, 6, 1),
(62, 12, 2, 4, 6, 1),
(63, 12, 2, 4, 6, 1),
(64, 12, 1, 4, 6, 1),
(65, 12, 1, 4, 6, 1),
(66, 12, 6, 4, 6, 1),
(67, 12, 6, 4, 6, 1),
(68, 12, 6, 5, 6, 1),
(69, 12, 6, 5, 6, 1),
(70, 12, 1, 5, 6, 1),
(71, 12, 1, 5, 6, 1),
(72, 12, 2, 5, 6, 1),
(73, 12, 2, 5, 6, 1);

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

--
-- Volcado de datos para la tabla `icfes_maestra`
--

INSERT INTO `icfes_maestra` (`id`, `Nombre`, `descri`, `objetivo`, `sub_tema`) VALUES
(1, 'gfsdfsd', 'fsdf', 'sdfsdfsd', 0),
(3, 'icfes', 'saber las cosas de la icfes', 'poder manejar la icfes', 15),
(4, 'dsadsa', 'dasdasdas', 'dasdsad', 0),
(5, 'Múltiplos de números naturales', 'ohuhuh', 'nñklnñlm,l', 0),
(6, 'ingles', 'aprender ingles', 'ingles', 0),
(7, 'Colegio Republica de Uruguay', 'Lograr', 'hola', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

CREATE TABLE `intentos` (
  `id_i` int(11) NOT NULL,
  `id_estu` int(11) NOT NULL,
  `eva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intentos`
--

INSERT INTO `intentos` (`id_i`, `id_estu`, `eva`) VALUES
(1, 5, 8),
(2, 3, 8),
(3, 8, 8),
(4, 8, 9),
(5, 3, 9),
(6, 5, 9);

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
(1, 'matematicas'),
(2, 'ingles'),
(3, 'español'),
(4, 'religion'),
(5, 'c.naturales'),
(6, 's_politicas'),
(7, 'sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_malla`
--

CREATE TABLE `materias_malla` (
  `id` int(11) NOT NULL,
  `nombre_m` varchar(120) NOT NULL,
  `area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias_malla`
--

INSERT INTO `materias_malla` (`id`, `nombre_m`, `area`) VALUES
(1, 'Español', 6),
(2, 'ingles', 4),
(6, 'Aritmetica', 8),
(7, 'aricmetica', 10),
(8, 'aricmetica', 19),
(9, 'aricmetica', 19),
(10, 'Filosofia', 21);

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
(1, 7, 1, 2, 12, 1, 4, 14, 'docenteeee', 17),
(3, 7, 1, 2, 12, 1, 4, 1, 'iodllfolp', 17),
(4, 7, 1, 2, 12, 1, 4, 1, 'okoefkkefkeofke', 17),
(5, 7, 1, 2, 12, 1, 4, 13, 'dkeogkoeekge', 17),
(6, 7, 1, 2, 12, 1, 4, 31, 'Eres la mejor.', 17),
(7, 7, 1, 2, 12, 1, 4, 88, 'Eres la mejor estudiante', 17),
(8, 7, 1, 2, 12, 1, 4, 100, 'Hola Stephany, muy buen trabajo.', 17),
(9, 7, 1, 2, 12, 1, 4, 100, 'Muy bien', 17),
(10, 7, 1, 2, 12, 1, 4, 100, 'holas,', 17),
(11, 7, 1, 2, 12, 1, 4, 100, 'probandoooo', 17),
(12, 7, 1, 2, 12, 1, 4, 100, 'holass1111', 17),
(13, 7, 1, 2, 12, 1, 4, 13, 'hola', 17),
(14, 7, 1, 2, 12, 1, 4, 80, 'Muy buen trabajo, sigue así.', 17),
(15, 7, 1, 2, 12, 1, 4, 100, 'Excelente.', 17),
(16, 7, 1, 2, 12, 1, 4, 100, 'Excelente', 17),
(17, 7, 1, 2, 12, 1, 4, 100, 'Holas,hola.', 17),
(18, 7, 1, 2, 12, 1, 4, 88, 'Holasasassa', 17),
(19, 7, 1, 2, 12, 1, 4, 100, 'Holoa, 9 y 28', 17),
(20, 7, 1, 2, 12, 1, 4, 100, 'fowkkwrkw', 17),
(21, 3, 1, 2, 12, 1, 7, 100, 'ijiejjjij', 17);

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
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas_eva`
--

INSERT INTO `notas_eva` (`id`, `id_estu`, `id_curso`, `id_eva`, `tiempo`, `resultado`, `fecha`, `estado`) VALUES
(1, 5, 12, 8, 'Minutos: 1 / 10 y Segundos: 10', '1 / 2', '2021-06-04', 5),
(2, 3, 12, 8, 'Minutos: 0 / 10 y Segundos: 7', '1 / 2', '2021-06-04', 5),
(3, 8, 12, 8, 'Minutos: 0 / 10 y Segundos: 5', '1 / 2', '2021-06-04', 5),
(4, 8, 12, 9, 'Minutos: 0 / 50 y Segundos: 8', '0 / 3', '2021-06-04', 5),
(5, 3, 12, 9, 'Minutos: 0 / 50 y Segundos: 16', '0 / 3', '2021-06-04', 5),
(6, 5, 12, 9, 'Minutos: 0 / 50 y Segundos: 18', '0 / 3', '2021-06-04', 5);

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

--
-- Volcado de datos para la tabla `pensamientos`
--

INSERT INTO `pensamientos` (`id`, `Nombre`, `Materias`, `Periodo`) VALUES
(1, 'Numerico', 2, 1),
(4, 'Numerico', 6, 1),
(7, 'Geométrico ', 6, 1),
(8, 'Geometrico', 8, 1),
(9, 'Geometrico', 8, 1),
(10, 'Numerico', 6, 1),
(11, 'Matematicas basicas', 10, 2);

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
(1, 'Daniel Juan', 'Ramirez Jimenez', 'profe@gmail.com', '$2y$10$F91ShMqD0kHm9lGu8ci27uYMw4Jx5KOOdWZxuQa/hkihrKIheeafq', 12345, 1, 1, 2, 'Soy un docente bien chevere que le gusta molestar', 'Licenciado en ciencias agrarias', '/Archivos_u/Perfil_doc/87140-matematicas-concepto-lifeder-min-1024x682.jpg', 'Profesor'),
(2, 'julio', 'verne', 'julio101@gmail.com', '$2y$10$9g6KytbCSj5HMSujmfgCaOWmgYs0RaNr4sWutnqoioT7HFMGcjL.u', 253658547, 6, 2, 1, 'licenciado en matematicas', 'licenciado en matematicas', '/Archivos_u/Perfil_doc/9764-logo.jpg', 'Profesor'),
(3, 'Alexander', 'Ruiz Velásquez', 'idruizv@gmail.com', '$2y$10$eS1faYB9DVCLTUDXs41BjOpnJcH72Kw/D4Z/AV.S1skxa1dlzlVqO', 10254103, 2, 12, 3, 'I\'ll be your teacher in this year. OMG', 'Licenciado en Lenguas Extranjeras', '/Archivos_u/Logos_estu/F1.png', 'Profesor'),
(4, 'Iván', 'Ruiz', 'idrizv@gmail.com', '$2y$10$hZMblaTxRHuoiEVaIP5QU.5QYcfEQ97VkcxpwjaAOgnGMtd0N3CnW', 12584199, 2, 13, 4, 'Licenciado en Lenguas Modernas y Extranjeras de la Universidad El Bosque', 'Licenciado en Lenguas Extranjeras', '/Archivos_u/Logos_estu/F1.png', 'Profesor');

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
(1, 1, 1, 84, 1, 1),
(2, 2, 7, 70, 12, 1),
(3, 2, 3, 100, 12, 1);

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
  `estado` int(11) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solucion`
--

INSERT INTO `solucion` (`id`, `id_maestra`, `evidencia`, `comentario`, `id_estu`, `fecha_entrega`, `id_curso`, `estado`) VALUES
(1, 32, '2/ 3', 'ICFES', 3, '2021-06-04', 12, 5),
(2, 32, '2/ 3', 'ICFES', 5, '2021-06-04', 12, 5),
(3, 32, '3/ 3', 'ICFES', 8, '2021-06-04', 12, 5),
(7, 4, 'http://localhost//EnsoLearningBackend/Archivos_u/Acti_solu/98259-Actividad_trabajo_forzoso-andres.pdf', 'El trabajo si estuvo muy dificil, no logré entender el video enviado por usted, sin embargo, realicé la actividad propuesta', 3, '2021-11-04', 12, 5);

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

--
-- Volcado de datos para la tabla `sub-temas`
--

INSERT INTO `sub-temas` (`id`, `nombre_sub`, `descrip`, `tema`) VALUES
(1, 'dasdsadsa', 'dasdsadas', 0),
(2, 'dasdsadsadsad', 'dasdsa  asd as', 2),
(3, 'dasdsadas d', 'dasdas das das das', 3),
(4, 'sumar', 'sadasdasdasddas', 1),
(5, 'sumar', 'sadasdasdasddas', 1),
(6, 'Escribir los numeros naturales', 'dsadas ', 5),
(7, 'Sumar numeros naturales', ' Aprender a sumar numeros naturales', 4),
(9, 'Propiedades de los múltiplos de un número', 'Propiedades', 6),
(10, 'Numerico', 'Saber que necesita el usuario', 0);

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

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id`, `nombre`, `descr`, `id_pensamiento`, `id_temap`) VALUES
(1, 'Numerico', 'sadasdasdasddas', 2, 1),
(2, 'dasdsadas', 'dasdas', 2, 1),
(3, 'iuyiyuiyu', 'iyuiyuiyu', 2, 1),
(5, 'Representación Grafica de los números naturales', 'dsa ', 4, 6),
(6, 'Multiplos', 'multiplos', 4, 6),
(7, 'Divisores', 'Numeros y divisores', 4, 6),
(8, 'Numeros primos y Compuestos', 'Aprender números primos y compuestos', 4, 6),
(9, 'Algebra lineal', 'hola', 11, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_p`
--

CREATE TABLE `tema_p` (
  `id` int(11) NOT NULL,
  `id_pensamiento` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tema_p`
--

INSERT INTO `tema_p` (`id`, `id_pensamiento`, `Nombre`) VALUES
(1, 2, 'Numeros naturales'),
(2, 2, 'ugoiubvy yvyi'),
(3, 2, 'dsadsadsadsa'),
(4, 2, 'oiuoui o'),
(5, 2, 'Numeros naturales'),
(6, 4, 'Números Naturales'),
(9, 11, 'Los numeros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_r`
--

CREATE TABLE `tipos_r` (
  `id` int(11) NOT NULL,
  `nombre_T` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_r`
--

INSERT INTO `tipos_r` (`id`, `nombre_T`) VALUES
(1, 'Administrador'),
(2, 'Cordinador'),
(3, 'vendedor'),
(4, 'Estudiante'),
(5, 'Acudiente');

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
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`libro`, `user`, `id`) VALUES
(1, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `actividad_hyg`
--
ALTER TABLE `actividad_hyg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `actividad_respuestas`
--
ALTER TABLE `actividad_respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `acudientes`
--
ALTER TABLE `acudientes`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `codigos_colegio`
--
ALTER TABLE `codigos_colegio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `codigos_cor`
--
ALTER TABLE `codigos_cor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cod_lib`
--
ALTER TABLE `cod_lib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `colegios`
--
ALTER TABLE `colegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cordinador`
--
ALTER TABLE `cordinador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `cursos_as`
--
ALTER TABLE `cursos_as`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `c_promedio`
--
ALTER TABLE `c_promedio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `db_libros`
--
ALTER TABLE `db_libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `derechos_ap`
--
ALTER TABLE `derechos_ap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado_actividad`
--
ALTER TABLE `estado_actividad`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estandares`
--
ALTER TABLE `estandares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `evalucion`
--
ALTER TABLE `evalucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `eva_res`
--
ALTER TABLE `eva_res`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `eventos_a`
--
ALTER TABLE `eventos_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `evento_r`
--
ALTER TABLE `evento_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `icfes_maestra`
--
ALTER TABLE `icfes_maestra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `intentos`
--
ALTER TABLE `intentos`
  MODIFY `id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `materias_malla`
--
ALTER TABLE `materias_malla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `notas_eva`
--
ALTER TABLE `notas_eva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pensamientos`
--
ALTER TABLE `pensamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `promedio`
--
ALTER TABLE `promedio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recuperar`
--
ALTER TABLE `recuperar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solucion`
--
ALTER TABLE `solucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sub-temas`
--
ALTER TABLE `sub-temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tema_p`
--
ALTER TABLE `tema_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipos_r`
--
ALTER TABLE `tipos_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
