-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2021 a las 16:44:43
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
-- Base de datos: `db_admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Apellido` varchar(60) NOT NULL,
  `Correo` varchar(70) NOT NULL,
  `Pass` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `Nombre`, `Apellido`, `Correo`, `Pass`) VALUES
(1, 'Super', 'Usuario', 'felipemarin0152@gmail.com', '$2y$10$YhqPk5LEED2xG10sf9ErGennXFyBnDhGt7.g5MRzXx4ty/gn70wNm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperar`
--

CREATE TABLE `recuperar` (
  `id` int(11) NOT NULL,
  `codigo` varchar(70) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `fecha` varchar(70) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recuperar`
--

INSERT INTO `recuperar` (`id`, `codigo`, `correo`, `fecha`, `tipo`) VALUES
(1, '654asd654asd465sda', 'asdasdasdasd@gmail.co ', 'dsasdasdasdasd', 0),
(2, '$2y$10$.vXaAERuPjL4vlD1ugA8wukpFuc3gRK5Y8ciMyuvpSA.JRHTIQ5mm', 'felipemarin0152@gmail.com', '20-10-2021', 0),
(3, '$2y$10$FEew5fHc9tYAstfYKbDK6ukOlpCrfouP3mDu3YgZg4TG740gL1fzS', 'felipemarin0152@gmail.com', '20-10-2021', 0),
(4, '$2y$10$F7tPiaaSxS692qNb4B5Ssema9ZnI9DOnep4ZvXQsQ.HcQX5sUKYIS', 'felipemarin0152@gmail.com', '20-10-2021', 0),
(5, '$2y$10$.7dgfwDdhA4.YNfRNmrlQ.Zpln9KbepLUPD0TkiL6l4oBlZtPOkAO', 'felipemarin0152@gmail.com', '20-10-2021', 85),
(6, '$2y$10$Yqxn4ldJotMgcosxgPrYJeVr5Iq4W9oXJ0RrgNRx7DjXP0/NiT4N2', 'felipemarin0152@gmail.com', '20-10-2021', 85),
(8, '$2y$10$RzveqJSu73lVybon5Txyku8jMfAnBWWZ7k3ZbzwC9UW9rd4HRq5he', 'felipemarin0152@gmail.com', '21-10-2021', 85),
(10, '$2y$10$XootGN6ygc1xR0wtrTcfgO8DV39rocPvkV3kv3FVtuntFUqPx1Nyy', 'felipemarin0152@gmail.com', '21-10-2021', 85),
(11, '$2y$10$ot3iptuXEy41gTBYFih7a.cHA7k4qbXLPju5NzpggIkJHlSAl9k5q', 'felipemarin0152@gmail.com', '21-10-2021', 85),
(12, '$2y$10$ZTy/CMqSo4W4ZjTNkgsIGucBDPbhqeKVTwPefCB2vGuqF9Xuoi55K', 'felipemarin0152@gmail.com', '21-10-2021', 85),
(13, '$2y$10$ERadZ6Dfu.MQyq/Wo824vuq4iew.WcqlLQBmQwHfzOeujmTNSx2Hu', 'felipemarin0152@gmail.com', '21-10-2021', 85),
(15, '$2y$10$VnL7x0jKYnm5op8SZzqtjO4QS906qkhq9TBo4iSSEPfohP4/igaHe', 'felipemarin0152@gmail.com', '21-10-2021', 85),
(18, '$2y$10$doorjrz5o8rbFCZQIH8MsOaYZHz84fzVBmQFkcAuIO4kGxSmrC0XO', 'felipemarin0152@gmail.com', '21-10-2021', 85),
(27, '$2y$10$wz5KqJih33cxmAJot1f0WO8kvdS0s4dU75FVzyK0rtpWTXTQ2AQEm', 'felipemarin0152@gmail.com', '25-10-2021', 6365),
(28, '$2y$10$ajTXXRUQQA10xienz0DPXu18vVGoE4mPlYUX/kofVBZeZjwh2.VrO', 'felipemarin0152@gmail.com', '25-10-2021', 6365),
(29, '$2y$10$Jlgo6kWx9Ey8GDDfGJ1qwOoHMdRSfS.rIP7Jt/yRO2zMtzz73jT2S', 'felipemarin0152@gmail.com', '25-10-2021', 6365),
(30, '$2y$10$yYBVejJOJ.wkLVsZADUp6eumXhksk/qOSiMzEoDx/0H8e4TmCrea.', 'felipemarin0152@gmail.com', '25-10-2021', 6365);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recuperar`
--
ALTER TABLE `recuperar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `recuperar`
--
ALTER TABLE `recuperar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
