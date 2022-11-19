-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3310
-- Tiempo de generación: 19-11-2022 a las 02:29:56
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarUsuario` (IN `pnombre` VARCHAR(80), IN `papellido` VARCHAR(80), IN `pContrasenna` VARCHAR(60), IN `ptelefono` VARCHAR(45), IN `pdireccion` VARCHAR(500), IN `ptipoRol` INT, IN `pId` BIGINT(20))   BEGIN

	UPDATE usuarios
	SET	nombre = pnombre,
        apellido = papellido,
		contrasena = pContrasenna,
        telefono = ptelefono,
        direccion = pdireccion,
		tipoRol= pTipoRol	
	WHERE idUsuario = pId;

END$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUsuarioId` (IN `pId` INT)   BEGIN

	SELECT *,
			CASE WHEN estado = 1 THEN 'ACTIVO' ELSE 'INACTIVO' END descripcionEstado
    FROM usuarios
    WHERE idUsuario = pId;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
