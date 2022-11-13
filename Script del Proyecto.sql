use sistemaacademico;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------------------------------
-- Creación de la base datos `sistemaacademico`
-- --------------------------------------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `sistemaacademico` DEFAULT CHARACTER SET utf8;
USE `sistemaacademico`;

-- -------------------------------------------------------------------------------- 
-- CREACIÓN DE LAS TABLAS
-- -------------------------------------------------------------------------------- 

-- -------------------------------------------------------------------------------- 
-- Estructura para la tabla `usuarios`
-- -------------------------------------------------------------------------------- 

CREATE TABLE IF NOT EXISTS `sistemaacademico`.`usuarios` 
(
  `idUsuario` BIGINT NOT NULL AUTO_INCREMENT, 
  `cedula` VARCHAR(15) NOT NULL, 
  `nombre` VARCHAR(80) NOT NULL, 
  `apellido` VARCHAR(80) NOT NULL, 
  `contrasena` VARCHAR(60) NOT NULL, 
  `fechaNacimiento` DATE NOT NULL, 
  `direccion` VARCHAR(500) NOT NULL, 
  `telefono` VARCHAR(45) NOT NULL, 
  `correo` VARCHAR(50) NOT NULL,  
  `tipoRol` INT(11) NOT NULL, 
  `estado` INT(1) NOT NULL, 
  PRIMARY KEY (`idUsuario`), 
  UNIQUE `ukCedula` (`cedula`)
) 
  ENGINE = InnoDB;

-- -------------------------------------------------------------------------------- 
-- Estructura para la tabla `roles`
-- -------------------------------------------------------------------------------- 

CREATE TABLE IF NOT EXISTS `sistemaacademico`.`roles` 
(
  `idRol` INT(11) NOT NULL AUTO_INCREMENT, 
  `descripcion` VARCHAR(50) NOT NULL, 
  PRIMARY KEY (`idRol`)
) 
  ENGINE = InnoDB;

-- -------------------------------------------------------------------------------- 
-- Estructura para la tabla `pantallas`
-- --------------------------------------------------------------------------------   

CREATE TABLE IF NOT EXISTS `sistemaacademico`.`pantallas` (
  `idPantalla` int(11) NOT NULL AUTO_INCREMENT,
  `redireccion` varchar(100) NOT NULL,
  `icono` varchar(100) NOT NULL,
  `texto` varchar(100) NOT NULL,
  PRIMARY KEY (`idPantalla`)
) 
  ENGINE=InnoDB;

-- -------------------------------------------------------------------------------- 
-- Estructura para la tabla `pantallas`
-- --------------------------------------------------------------------------------   

CREATE TABLE IF NOT EXISTS `sistemaacademico`.`pantalla_rol_usuario` (
  `idTipoPantalla` int(11) NOT NULL AUTO_INCREMENT,
  `tipoRol` INT(11) NOT NULL, 
  `idPantalla` int(11) NOT NULL,
  PRIMARY KEY (`idTipoPantalla`)
) 
  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------------------------------- 
-- Conexión de las tablas `usuarios` y `roles`
-- -------------------------------------------------------------------------------- 

ALTER TABLE `usuarios` ADD CONSTRAINT `fkRolUsuario` FOREIGN KEY (`tipoRol`) REFERENCES `roles`(`idRol`) ON DELETE RESTRICT ON UPDATE RESTRICT;
  
-- -------------------------------------------------------------------------------- 
-- Conexión de las tablas `pantalla_rol_usuario` y `roles`
-- -------------------------------------------------------------------------------- 
  
ALTER TABLE `pantalla_rol_usuario` ADD CONSTRAINT `fk_rol_usuario` FOREIGN KEY (`tipoRol`) REFERENCES `roles`(`idRol`) ON DELETE RESTRICT ON UPDATE RESTRICT; 

-- -------------------------------------------------------------------------------- 
-- Conexión de las tablas `pantalla_rol_usuario` y `pantallas`
-- -------------------------------------------------------------------------------- 

ALTER TABLE `pantalla_rol_usuario` ADD CONSTRAINT `fk_pantalla` FOREIGN KEY (`idPantalla`) REFERENCES `pantallas`(`idPantalla`) ON DELETE RESTRICT ON UPDATE RESTRICT;  
  
-- -------------------------------------------------------------------------------- 
-- Volcado de datos para la tabla `roles`
-- -------------------------------------------------------------------------------- 

INSERT INTO `sistemaacademico`.`roles` 
(
  `descripcion`
) 
  VALUES 
(
  'Administrador'
),
(
  'Docente'
),
(
  'Estudiante'
);

-- -------------------------------------------------------------------------------- 
-- Volcado de datos para la tabla `roles`
-- -------------------------------------------------------------------------------- 

INSERT INTO `pantallas` 
(
  `redireccion`, 
  `icono`, 
  `texto`
) 
  VALUES
(
  'Usuarios.php', 
  'fa fa-user', 
  'Usuarios'
),
(
  'Docentes.php', 
  'fa-solid fa-user-tie', 
  'Docentes'
),
(
  'Alumnos.php', 
  'fa fa-user-graduate', 
  'Alumnos'
),
(
  'Matriculas.php', 
  'fa fa-address-book', 
  'Matrícular'
),
(
  'Carreras.php', 
  'fa fa-award', 
  'Carreras'
);

-- -------------------------------------------------------------------------------- 
-- Volcado de datos para la tabla `pantalla_rol_usuario`
-- --------------------------------------------------------------------------------

INSERT INTO `pantalla_rol_usuario` 
(
  `tipoRol`, 
  `idPantalla`
) 
  VALUES
-- Relacion del usuario "Administrador" con la pantalla "Usuarios"
(
  '1', 
  '1'
),
-- Relacion del usuario "Docente" con la pantalla "Docentes"
(
  '2', 
  '2'
),
-- Relacion del usuario "Docente" con la pantalla "Carreras"
(
  '2', 
  '5'
),
-- Relacion del usuario "Estudiante" con la pantalla "Alumnos"
(
  '3', 
  '3'
),
-- Relacion del usuario "Estudiante" con la pantalla "Matriculas"
(
  '3', 
  '4'
),
-- Relacion del usuario "Estudiante" con la pantalla "Carreras"
(
  '3', 
  '5'
);

-- -------------------------------------------------------------------------------- 
-- Creación del procedimiento almacenado `ValidarUsuario`
-- -------------------------------------------------------------------------------- 

DELIMITER $$

USE `sistemaacademico`$$
CREATE PROCEDURE `ValidarUsuario` (IN pCorreo VARCHAR(50), IN pContrasena VARCHAR(60))   
BEGIN
      
    SELECT `idUsuario`, 
           `cedula`, 
           `nombre`, 
           `apellido`, 
           `fechaNacimiento`, 
           `direccion`, 
           `telefono`, 
           `correo`, 
           `carrera`, 
           `tipoRol`, 
           `estado`
    FROM   `usuarios`
    WHERE  `correo` = pCorreo
	   AND `contrasena` =  pContrasena
       AND `estado` = 1;
       
END$$

DELIMITER ;

-- -------------------------------------------------------------------------------- 
-- Creación del procedimiento almacenado `ConsultarMenu`
-- -------------------------------------------------------------------------------- 

DELIMITER $$

USE `sistemaacademico`$$
CREATE PROCEDURE `ConsultarMenu`(IN `pTipoUsuario` INT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER 
BEGIN 
    
	SELECT b.* 
    FROM pantalla_rol_usuario a 
    INNER JOIN pantallas b 
    ON a.idPantalla = b.idPantalla 
    WHERE a.tipoRol = pTipoUsuario; 

END$$

DELIMITER ;

-- -------------------------------------------------------------------------------- 
-- Creación del procedimiento almacenado `ListarUsuarios`
-- -------------------------------------------------------------------------------- 

DELIMITER $$

USE `sistemaacademico`$$
CREATE PROCEDURE `ListarUsuarios`()
BEGIN 
    
	SELECT U.*, 
           R.descripcion,
           CASE WHEN U.estado = 1 THEN 'ACTIVO' ELSE 'INACTIVO' END descripcionEstado
    FROM usuarios U
    INNER JOIN roles R ON U.tipoRol = R.idRol;

END$$

DELIMITER ;

-- -------------------------------------------------------------------------------- 
-- Volcado de datos para la tabla `usuarios`
-- -------------------------------------------------------------------------------- 

INSERT INTO `sistemaacademico`.`usuarios` 
(
  `cedula`, 
  `nombre`, 
  `apellido`, 
  `contrasena`, 
  `fechaNacimiento`, 
  `direccion`, 
  `telefono`, 
  `correo`,  
  `tipoRol`, 
  `estado`
) 
  VALUES 
(
  '2446', 
  'Alonso', 
  'Rojas', 
  '12345', 
  '2000-02-06', 
  'Heredia', 
  '93845372', 
  'alonsorojas@gmail.com', 
  1, 
  1
),
(
  '1234', 
  'Erick', 
  'Fonseca', 
  '12345', 
  '1994-04-08', 
  'Alajuela', 
  '47338943', 
  'erickfonseca@gmail.com',  
  2, 
  1
),
(
  '5454', 
  'Amanda', 
  'Flores', 
  '12345', 
  '2004-03-03', 
  'Cartago', 
  '35968354', 
  'amandaflores@gmail.com',  
  3, 
  1
);
