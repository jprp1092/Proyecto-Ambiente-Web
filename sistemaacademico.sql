-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3310
-- Tiempo de generación: 29-10-2022 a las 04:19:21
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaacademico`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPantalla` (IN `pTipoRol` INT)   BEGIN

SELECT b.*
FROM pantalla_tipo_rol a
INNER JOIN pantallas b ON a.idPantalla = b.idPantalla
WHERE a.tipoRol = pTipoRol;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarCredenciales` (IN `pCedula` VARCHAR(15), IN `pContrasena` VARCHAR(500))   BEGIN

	SELECT 	`idUsuario`,
			`cedula`,
			`nombre`,
			`apellido1`,
            `apellido2`,
            `fechaNacimiento`,
            `direccion`,
            `telefono`,
            `carrera`,
            `tipoRol`
	FROM 	`usuarios`
	WHERE 	`cedula` = pCedula
		AND `contrasena` = pContrasena
        AND `activo` = 1;
	
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantallas`
--

CREATE TABLE `pantallas` (
  `idPantalla` int(11) NOT NULL,
  `redireccion` varchar(150) DEFAULT NULL,
  `icono` varchar(150) DEFAULT NULL,
  `texto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pantallas`
--

INSERT INTO `pantallas` (`idPantalla`, `redireccion`, `icono`, `texto`) VALUES
(1, 'MantUsuarios.php', 'fa fa-user', 'Mant.Usuarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantalla_tipo_rol`
--

CREATE TABLE `pantalla_tipo_rol` (
  `idPantallaRol` int(11) NOT NULL,
  `tipoRol` int(11) NOT NULL,
  `idPantalla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pantalla_tipo_rol`
--

INSERT INTO `pantalla_tipo_rol` (`idPantallaRol`, `tipoRol`, `idPantalla`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_rol`
--

CREATE TABLE `tipo_rol` (
  `tipoRol` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_rol`
--

INSERT INTO `tipo_rol` (`tipoRol`, `descripcion`) VALUES
(1, 'Admin'),
(2, 'Profesor'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` bigint(20) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `contrasena` varchar(500) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido1` varchar(45) NOT NULL,
  `apellido2` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `carrera` varchar(45) NOT NULL,
  `tipoRol` int(11) NOT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `cedula`, `contrasena`, `nombre`, `apellido1`, `apellido2`, `fechaNacimiento`, `direccion`, `telefono`, `carrera`, `tipoRol`, `activo`) VALUES
(1, '123', 'admin', 'Kenneth', 'Alvarado', 'Martinez', '2002-02-06', 'sfsdfsdfsd', '86418981', 'Sistemas', 1, b'1'),
(2, '305390584', '123', 'Kenneth', 'Alvarado', 'Martienz', '2002-06-02', 'Cartago', '86180806', 'Sistemas', 3, b'1'),
(3, '308460256', '123', 'Juan', 'Fernandez', 'Sanabria', '1981-08-01', 'San Jose', '86948413', 'Sistemas', 2, b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pantallas`
--
ALTER TABLE `pantallas`
  ADD PRIMARY KEY (`idPantalla`);

--
-- Indices de la tabla `pantalla_tipo_rol`
--
ALTER TABLE `pantalla_tipo_rol`
  ADD PRIMARY KEY (`idPantallaRol`),
  ADD KEY `idPantalla` (`idPantalla`),
  ADD KEY `tipoRol` (`tipoRol`);

--
-- Indices de la tabla `tipo_rol`
--
ALTER TABLE `tipo_rol`
  ADD PRIMARY KEY (`tipoRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `tipoRol` (`tipoRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pantallas`
--
ALTER TABLE `pantallas`
  MODIFY `idPantalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pantalla_tipo_rol`
--
ALTER TABLE `pantalla_tipo_rol`
  MODIFY `idPantallaRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pantalla_tipo_rol`
--
ALTER TABLE `pantalla_tipo_rol`
  ADD CONSTRAINT `pantalla_tipo_rol_ibfk_1` FOREIGN KEY (`tipoRol`) REFERENCES `tipo_rol` (`tipoRol`),
  ADD CONSTRAINT `pantalla_tipo_rol_ibfk_2` FOREIGN KEY (`idPantalla`) REFERENCES `pantallas` (`idPantalla`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipoRol`) REFERENCES `tipo_rol` (`tipoRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
