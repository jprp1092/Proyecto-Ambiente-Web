-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 18-11-2022 a las 16:51:37
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `AgregarCurso` (IN `pNombre` VARCHAR(15), IN `pModalidad` VARCHAR(20), IN `pHorario` VARCHAR(20), IN `pCreditos` INT, IN `pDocente` INT)   BEGIN

INSERT INTO `sistemaacademico`.`cursos`
(
  `nombre`,
  `modalidad`,
  `horario`,
  `creditos`,
  `docente`
)  
  VALUES
(
  pNombre,
  pModalidad,
  pHorario,
  pCreditos,
  pDocente
);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AgregarUsuario` (IN `pCedula` VARCHAR(15), IN `pNombre` VARCHAR(80), IN `pApellido` VARCHAR(80), IN `pContrasenna` VARCHAR(60), IN `pFechaNacimiento` DATE, IN `pDireccion` VARCHAR(500), IN `pTelefono` VARCHAR(45), IN `pCorreo` VARCHAR(50), IN `pTipoUsuario` INT, IN `pEstado` BIT)   BEGIN
	INSERT INTO `sistemaacademico`.`usuarios`
	(`cedula`,
	`nombre`,
	`apellido`,
	`contrasena`,
	`fechaNacimiento`,
	`direccion`,
	`telefono`,
	`correo`,
	`tipoRol`,
	`estado`)
	VALUES
	(pCedula,
	pNombre,
	pApellido,
	pContrasenna,
	pFechaNacimiento,
	pDireccion,
	pTelefono,
	pCorreo,
	pTipoUsuario,
	pEstado);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarMenu` (IN `pTipoUsuario` INT)   BEGIN 
    
	SELECT b.* 
    FROM pantalla_rol_usuario a 
    INNER JOIN pantallas b 
    ON a.idPantalla = b.idPantalla 
    WHERE a.tipoRol = pTipoUsuario; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarCursos` ()   BEGIN 
    
	SELECT C.*,U.nombre as nombreProfesor,U.apellido as apellidoProfesor
    FROM cursos C INNER JOIN usuarios U ON C.docente = U.idUsuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarProfesores` ()   BEGIN
	SELECT C.*, U.idUsuario , U.nombre AS nombreProfe, U.apellido AS apellidoProfe
    FROM cursos C INNER JOIN usuarios U ON C.docente = U.idUsuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarUsuarios` ()   BEGIN 
    
	SELECT U.*, 
           R.descripcion,
           CASE WHEN U.estado = 1 THEN 'ACTIVO' ELSE 'INACTIVO' END descripcionEstado
    FROM usuarios U
    INNER JOIN roles R ON U.tipoRol = R.idRol;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarUsuario` (IN `pCorreo` VARCHAR(50), IN `pContrasena` VARCHAR(60))   BEGIN
      
    SELECT `idUsuario`, 
           `cedula`, 
           `nombre`, 
           `apellido`, 
           `fechaNacimiento`, 
           `direccion`, 
           `telefono`, 
           `correo`,  
           `tipoRol`, 
           `estado`
    FROM   `usuarios`
    WHERE  `correo` = pCorreo
	   AND `contrasena` =  pContrasena
       AND `estado` = 1;
       
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validar_credenciales` (`pcedula` VARCHAR(15), `pcontra` VARCHAR(500))   BEGIN
	SELECT `idUsuario`,
    `cedula`,
    `contrasena`,
    `nombre`,
    `apellido1`,
    `apellido2`,
    `fechaNacimiento`,
    `direccion`,
    `telefono`,
    `carrera`,
    `rol`,
    `activo`
	FROM `usuarios` WHERE activo = 1 AND pcedula = cedula AND pcontra = contrasena;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VerRoles` ()   BEGIN
	SELECT * FROM roles;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idCurso` bigint(20) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `modalidad` varchar(20) NOT NULL,
  `horario` varchar(20) NOT NULL,
  `creditos` int(11) NOT NULL,
  `docente` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idCurso`, `nombre`, `modalidad`, `horario`, `creditos`, `docente`) VALUES
(0, 'Programación', 'Virtual', 'Mañana', 5, 2),
(0, 'Sistemas Operat', 'Presencial', 'Noche', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantallas`
--

CREATE TABLE `pantallas` (
  `idPantalla` int(11) NOT NULL,
  `redireccion` varchar(100) NOT NULL,
  `icono` varchar(100) NOT NULL,
  `texto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pantallas`
--

INSERT INTO `pantallas` (`idPantalla`, `redireccion`, `icono`, `texto`) VALUES
(1, 'Usuarios.php', 'fa fa-user', 'Usuarios'),
(2, 'Docentes.php', 'fa-solid fa-user-tie', 'Docentes'),
(3, 'Alumnos.php', 'fa fa-user-graduate', 'Alumnos'),
(4, 'Matriculas.php', 'fa fa-address-book', 'Matrícular'),
(5, 'Carreras.php', 'fa fa-award', 'Carreras'),
(6, 'Cursos.php', 'fa fa-award', 'Cursos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantalla_rol_usuario`
--

CREATE TABLE `pantalla_rol_usuario` (
  `idTipoPantalla` int(11) NOT NULL,
  `tipoRol` int(11) NOT NULL,
  `idPantalla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pantalla_rol_usuario`
--

INSERT INTO `pantalla_rol_usuario` (`idTipoPantalla`, `tipoRol`, `idPantalla`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 5),
(4, 3, 3),
(5, 3, 4),
(6, 3, 5),
(7, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Docente'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` bigint(20) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipoRol` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `cedula`, `nombre`, `apellido`, `contrasena`, `fechaNacimiento`, `direccion`, `telefono`, `correo`, `tipoRol`, `estado`) VALUES
(1, '2446', 'Alonso', 'Rojas', '12345', '2000-02-06', 'Heredia', '93845372', 'alonsorojas@gmail.com', 1, 1),
(2, '1234', 'Erick', 'Fonseca', '12345', '1994-04-08', 'Alajuela', '47338943', 'erickfonseca@gmail.com', 2, 1),
(3, '5454', 'Amanda', 'Flores', '12345', '2004-03-03', 'Cartago', '35968354', 'amandaflores@gmail.com', 3, 1),
(4, '305380675', 'Jose', 'Retana Pereira', '1', '2002-04-16', 'Cartago', '88887777', 'prueba@gmail.com', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pantallas`
--
ALTER TABLE `pantallas`
  ADD PRIMARY KEY (`idPantalla`);

--
-- Indices de la tabla `pantalla_rol_usuario`
--
ALTER TABLE `pantalla_rol_usuario`
  ADD PRIMARY KEY (`idTipoPantalla`),
  ADD KEY `fk_rol_usuario` (`tipoRol`),
  ADD KEY `fk_pantalla` (`idPantalla`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `ukCedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pantallas`
--
ALTER TABLE `pantallas`
  MODIFY `idPantalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pantalla_rol_usuario`
--
ALTER TABLE `pantalla_rol_usuario`
  MODIFY `idTipoPantalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pantalla_rol_usuario`
--
ALTER TABLE `pantalla_rol_usuario`
  ADD CONSTRAINT `fk_pantalla` FOREIGN KEY (`idPantalla`) REFERENCES `pantallas` (`idPantalla`),
  ADD CONSTRAINT `fk_rol_usuario` FOREIGN KEY (`tipoRol`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
