-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2024 a las 11:27:14
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catedra_dss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id_juegos` int(11) NOT NULL,
  `nombre_juegos` varchar(30) NOT NULL,
  `precio_juegos` float NOT NULL,
  `tipo_juegos` varchar(10) DEFAULT NULL,
  `puntos_juegos` int(11) NOT NULL,
  `estado_juegos` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id_juegos`, `nombre_juegos`, `precio_juegos`, `tipo_juegos`, `puntos_juegos`, `estado_juegos`) VALUES
(1, 'Metal Slug', 2, 'Digital', 3, NULL),
(2, 'Toro Mecánico', 3.5, 'Mecánico', 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE `premios` (
  `id_premios` int(11) NOT NULL,
  `nombre_premios` varchar(25) NOT NULL,
  `costo_premios` int(11) NOT NULL,
  `estado_premios` varchar(10) NOT NULL,
  `cantidad_premios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios_usuarios`
--

CREATE TABLE `premios_usuarios` (
  `id_premios_usuarios` int(11) NOT NULL,
  `id_premios` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id_tarjetas` varchar(7) NOT NULL,
  `tipo_tarjetas` varchar(10) NOT NULL,
  `limite_tarjetas` int(11) NOT NULL,
  `saldo_tarjetas` float NOT NULL,
  `vencimiento_tarjetas` date NOT NULL,
  `propietario_tarjetas` int(11) NOT NULL,
  `puntos_tarjetas` int(11) NOT NULL,
  `estado_tarjetas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id_tarjetas`, `tipo_tarjetas`, `limite_tarjetas`, `saldo_tarjetas`, `vencimiento_tarjetas`, `propietario_tarjetas`, `puntos_tarjetas`, `estado_tarjetas`) VALUES
('EN16111', 'Plus', 50, 50, '2024-12-31', 2, 20, 'activo'),
('SL04251', 'Gold', 300, 300, '2024-12-31', 1, 11, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas_juegos`
--

CREATE TABLE `tarjetas_juegos` (
  `id_tarjetas_juegos` int(11) NOT NULL,
  `id_tarjetas` varchar(7) NOT NULL,
  `id_juegos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Disparadores `tarjetas_juegos`
--
DELIMITER $$
CREATE TRIGGER `InsertarTransaccion` AFTER INSERT ON `tarjetas_juegos` FOR EACH ROW BEGIN
    -- Obtener el precio del juego basado en el ID insertado en tarjetas_juegos
DECLARE precio_juegos_var float;
SELECT precio_juegos INTO precio_juegos_var FROM juegos WHERE id_juegos = NEW.id_juegos;

    -- Insertar datos en la tabla transacciones al insertar en tarjetas_juegos
INSERT INTO transacciones 
(tipo_transacciones, costo_transacciones, fecha_transacciones, id_tarjetas) VALUES 
('Ven_Juegos',precio_juegos_var, NOW(), NEW.id_tarjetas);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `SumarPuntos` AFTER INSERT ON `tarjetas_juegos` FOR EACH ROW BEGIN
    -- Obtener el tipo de juego basado en el ID insertado en tarjetas_juegos
    DECLARE tipo_juegos_var VARCHAR(255);
    SELECT tipo_juegos INTO tipo_juegos_var FROM juegos WHERE id_juegos = NEW.id_juegos;

    -- Actualizar puntos_tarjetas en la tabla tarjetas
    UPDATE tarjetas
    SET puntos_tarjetas = puntos_tarjetas +
        CASE tipo_juegos_var
            WHEN 'Digital' THEN 3
            WHEN 'Mecánico' THEN 5
            ELSE 0  -- Puedes agregar más casos según sea necesario
        END
    WHERE id_tarjetas = NEW.id_tarjetas;  -- Ajusta según tu esquema real
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id_transacciones` int(11) NOT NULL,
  `tipo_transacciones` varchar(10) NOT NULL,
  `costo_transacciones` float DEFAULT NULL,
  `fecha_transacciones` date DEFAULT NULL,
  `id_tarjetas` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre_usuarios` varchar(60) NOT NULL,
  `apellidos_usuarios` varchar(60) NOT NULL,
  `nacionalidad_usuarios` varchar(60) DEFAULT NULL,
  `tipo_usuarios` varchar(60) NOT NULL,
  `correo_usuarios` varchar(30) DEFAULT NULL,
  `contraseña_usuarios` varchar(30) NOT NULL,
  `puntos_usuarios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre_usuarios`, `apellidos_usuarios`, `nacionalidad_usuarios`, `tipo_usuarios`, `correo_usuarios`, `contraseña_usuarios`, `puntos_usuarios`) VALUES
(1, 'Sofía', 'Larín', 'Japonesa', 'usuario', 'sofialarin@gmail.com', 'SofiaLarin', 0),
(2, 'Eduardo', 'Nájera', 'Salvadoreño', 'usuario', 'eduardonajera@gmail.com', 'EduardoNajera', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id_juegos`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`id_premios`);

--
-- Indices de la tabla `premios_usuarios`
--
ALTER TABLE `premios_usuarios`
  ADD PRIMARY KEY (`id_premios_usuarios`),
  ADD KEY `fk_id_premios_PU` (`id_premios`),
  ADD KEY `fk_id_usuarios_PU` (`id_usuarios`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id_tarjetas`),
  ADD KEY `fk_propietario_tarjetas` (`propietario_tarjetas`);

--
-- Indices de la tabla `tarjetas_juegos`
--
ALTER TABLE `tarjetas_juegos`
  ADD PRIMARY KEY (`id_tarjetas_juegos`),
  ADD KEY `fk_id_juegps_TJ` (`id_juegos`),
  ADD KEY `fk_id_tarjetas_TJ` (`id_tarjetas`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id_transacciones`),
  ADD KEY `fk_id_tarjetas` (`id_tarjetas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id_juegos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarjetas_juegos`
--
ALTER TABLE `tarjetas_juegos`
  MODIFY `id_tarjetas_juegos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id_transacciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `premios_usuarios`
--
ALTER TABLE `premios_usuarios`
  ADD CONSTRAINT `fk_id_premios_PU` FOREIGN KEY (`id_premios`) REFERENCES `premios` (`id_premios`),
  ADD CONSTRAINT `fk_id_usuarios_PU` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD CONSTRAINT `fk_propietario_tarjetas` FOREIGN KEY (`propietario_tarjetas`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `tarjetas_juegos`
--
ALTER TABLE `tarjetas_juegos`
  ADD CONSTRAINT `fk_id_juegps_TJ` FOREIGN KEY (`id_juegos`) REFERENCES `juegos` (`id_juegos`),
  ADD CONSTRAINT `fk_id_tarjetas_TJ` FOREIGN KEY (`id_tarjetas`) REFERENCES `tarjetas` (`id_tarjetas`);

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `fk_id_tarjetas` FOREIGN KEY (`id_tarjetas`) REFERENCES `tarjetas` (`id_tarjetas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
