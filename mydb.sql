-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2021 a las 22:30:29
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idActividades` int(11) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `HorasLaboradas` int(11) NOT NULL,
  `Estatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `Contrasenia` varchar(45) NOT NULL,
  `Cargo_idCargo` int(11) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `Contrasenia`, `Cargo_idCargo`, `Persona_idPersona`) VALUES
(1, 'perritos', 1, 1),
(1234568, 'gatitos2', 2, 8),
(1234569, '12345678', 2, 7),
(12345685, 'a', 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `NombreCargo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `NombreCargo`) VALUES
(1, 'Presidente'),
(2, 'Tesorero'),
(3, 'Administrador'),
(4, 'Vocal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto`
--

CREATE TABLE `objeto` (
  `idObjeto` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `objeto`
--

INSERT INTO `objeto` (`idObjeto`, `Nombre`, `Descripcion`, `Cantidad`) VALUES
(1, 'Pala', 'Una pala multiusos', 5),
(5, 'Pala', 'Pala para comer', 8),
(6, 'Pala', 'Pala para paladas', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacionesfinancieras`
--

CREATE TABLE `operacionesfinancieras` (
  `idOperacionesFinancieras` int(11) NOT NULL,
  `Monto` double NOT NULL,
  `Fecha` date NOT NULL,
  `Concepto` varchar(100) NOT NULL,
  `Administrador_idAdministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operacionesfinancieras`
--

INSERT INTO `operacionesfinancieras` (`idOperacionesFinancieras`, `Monto`, `Fecha`, `Concepto`, `Administrador_idAdministrador`) VALUES
(18, 52, '2021-12-05', 'Prueba', 1234568),
(19, 52, '2021-12-05', 'Prueba', 1234568),
(20, 500, '1990-12-12', 'Se compro una pasa', 1234568),
(21, -6, '2020-12-11', 'Perdimos un dinosaurio', 1234568),
(22, 504, '1200-12-11', 'Pago al programador', 1234568);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacioninventario`
--

CREATE TABLE `operacioninventario` (
  `idOperacionInventario` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `FechaOperacion` date NOT NULL,
  `Valor` float NOT NULL,
  `Administrador_idAdministrador` int(11) NOT NULL,
  `Objeto_idObjeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `coordX` double DEFAULT NULL,
  `coordY` double DEFAULT NULL,
  `Telefono` varchar(10) NOT NULL,
  `EsSocio` tinyint(4) NOT NULL,
  `EsHeredero` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `Nombre`, `coordX`, `coordY`, `Telefono`, `EsSocio`, `EsHeredero`) VALUES
(1, 'Juan', NULL, NULL, '999999', 1, 0),
(4, 'Mau', NULL, NULL, '1234567891', 0, 0),
(7, 'JJ', NULL, NULL, '55578', 1, 0),
(8, 'Angel Uriel', NULL, NULL, '55555', 0, 0),
(9, 'Pablo', NULL, NULL, '455', 1, 1),
(10, 'Poncho', 19.343892902279116, -99.36263405253827, '557815', 1, 1),
(555, 'Peca Peca', NULL, NULL, '5576814', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_actividades`
--

CREATE TABLE `persona_has_actividades` (
  `Persona_idPersona` int(11) NOT NULL,
  `Actividades_idActividades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idPrestamos` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Devuelto` tinyint(1) NOT NULL DEFAULT 0,
  `Objeto_idObjeto` int(11) NOT NULL,
  `Administrador_idAdministrador` int(11) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idPrestamos`, `Cantidad`, `Fecha`, `Devuelto`, `Objeto_idObjeto`, `Administrador_idAdministrador`, `Persona_idPersona`) VALUES
(10, 1, '2021-12-12', 0, 5, 1234568, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciontoma`
--

CREATE TABLE `reparaciontoma` (
  `idReparacionToma` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportetoma`
--

CREATE TABLE `reportetoma` (
  `idReporteToma` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividades`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`,`Cargo_idCargo`,`Persona_idPersona`),
  ADD KEY `fk_Administrador_Cargo1_idx` (`Cargo_idCargo`),
  ADD KEY `fk_Administrador_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`idObjeto`);

--
-- Indices de la tabla `operacionesfinancieras`
--
ALTER TABLE `operacionesfinancieras`
  ADD PRIMARY KEY (`idOperacionesFinancieras`,`Administrador_idAdministrador`),
  ADD KEY `fk_OperacionesFinancieras_Administrador_idx` (`Administrador_idAdministrador`);

--
-- Indices de la tabla `operacioninventario`
--
ALTER TABLE `operacioninventario`
  ADD PRIMARY KEY (`idOperacionInventario`,`Administrador_idAdministrador`,`Objeto_idObjeto`),
  ADD KEY `fk_OperacionInventario_Administrador1_idx` (`Administrador_idAdministrador`),
  ADD KEY `fk_OperacionInventario_Objeto1_idx` (`Objeto_idObjeto`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `persona_has_actividades`
--
ALTER TABLE `persona_has_actividades`
  ADD PRIMARY KEY (`Persona_idPersona`,`Actividades_idActividades`),
  ADD KEY `fk_Persona_has_Actividades_Actividades1_idx` (`Actividades_idActividades`),
  ADD KEY `fk_Persona_has_Actividades_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamos`,`Objeto_idObjeto`,`Administrador_idAdministrador`,`Persona_idPersona`),
  ADD KEY `fk_Prestamos_Objeto1_idx` (`Objeto_idObjeto`),
  ADD KEY `fk_Prestamos_Administrador1_idx` (`Administrador_idAdministrador`),
  ADD KEY `fk_Prestamos_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `reparaciontoma`
--
ALTER TABLE `reparaciontoma`
  ADD PRIMARY KEY (`idReparacionToma`,`Persona_idPersona`),
  ADD KEY `fk_ReporteToma_Persona1_idx` (`Persona_idPersona`);

--
-- Indices de la tabla `reportetoma`
--
ALTER TABLE `reportetoma`
  ADD PRIMARY KEY (`idReporteToma`,`Persona_idPersona`),
  ADD KEY `fk_ReporteToma_Persona1_idx` (`Persona_idPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idActividades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345696;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `objeto`
--
ALTER TABLE `objeto`
  MODIFY `idObjeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `operacionesfinancieras`
--
ALTER TABLE `operacionesfinancieras`
  MODIFY `idOperacionesFinancieras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `operacioninventario`
--
ALTER TABLE `operacioninventario`
  MODIFY `idOperacionInventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reparaciontoma`
--
ALTER TABLE `reparaciontoma`
  MODIFY `idReparacionToma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportetoma`
--
ALTER TABLE `reportetoma`
  MODIFY `idReporteToma` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_Administrador_Cargo1` FOREIGN KEY (`Cargo_idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Administrador_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operacionesfinancieras`
--
ALTER TABLE `operacionesfinancieras`
  ADD CONSTRAINT `fk_OperacionesFinancieras_Administrador` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operacioninventario`
--
ALTER TABLE `operacioninventario`
  ADD CONSTRAINT `fk_OperacionInventario_Administrador1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OperacionInventario_Objeto1` FOREIGN KEY (`Objeto_idObjeto`) REFERENCES `objeto` (`idObjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_has_actividades`
--
ALTER TABLE `persona_has_actividades`
  ADD CONSTRAINT `fk_Persona_has_Actividades_Actividades1` FOREIGN KEY (`Actividades_idActividades`) REFERENCES `actividades` (`idActividades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Persona_has_Actividades_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_Prestamos_Administrador1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prestamos_Objeto1` FOREIGN KEY (`Objeto_idObjeto`) REFERENCES `objeto` (`idObjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prestamos_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reparaciontoma`
--
ALTER TABLE `reparaciontoma`
  ADD CONSTRAINT `fk_ReporteToma_Persona10` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reportetoma`
--
ALTER TABLE `reportetoma`
  ADD CONSTRAINT `fk_ReporteToma_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
