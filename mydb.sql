-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 09:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mydb`;

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
--

CREATE TABLE `actividades` (
  `idActividades` int(11) NOT NULL,
  `Mes` int(11) NOT NULL,
  `Anio` int(11) NOT NULL,
  `Estatus` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `Contrasenia` varchar(45) NOT NULL,
  `Cargo_idCargo` int(11) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `Contrasenia`, `Cargo_idCargo`, `Persona_idPersona`) VALUES
(0, '1234', 2, 0),
(1, 'perritos', 1, 1),
(1234568, 'gatitos2', 2, 8),
(1234569, '12345678', 2, 7),
(12345685, 'a', 4, 4),
(12345696, '0123456789', 4, 10),
(12345698, '12345678', 3, 69);

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `NombreCargo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`idCargo`, `NombreCargo`) VALUES
(1, 'Presidente'),
(2, 'Tesorero'),
(3, 'Administrador'),
(4, 'Vocal');

-- --------------------------------------------------------

--
-- Table structure for table `objeto`
--

CREATE TABLE `objeto` (
  `idObjeto` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `objeto`
--

INSERT INTO `objeto` (`idObjeto`, `Nombre`, `Descripcion`, `Cantidad`) VALUES
(1, 'Pala', 'Una pala multiusos', 4),
(5, 'Pala', 'Pala para comer', 0),
(6, 'Pala', 'Pala para paladas', 4),
(7, 'Perro', 'Un perrito ', 4),
(8, 'Pito de Tibu', 'Rico', 5),
(12, 'Cascos', 'Cascos de proteccion', 9),
(13, 'Muñecas inflebles', 'Muñecas para soltitarios mutliuso', 90);

-- --------------------------------------------------------

--
-- Table structure for table `operacionesfinancieras`
--

CREATE TABLE `operacionesfinancieras` (
  `idOperacionesFinancieras` int(11) NOT NULL,
  `Monto` double NOT NULL,
  `Fecha` date NOT NULL,
  `Concepto` varchar(100) NOT NULL,
  `Administrador_idAdministrador` int(11) NOT NULL,
  `factura` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operacionesfinancieras`
--

INSERT INTO `operacionesfinancieras` (`idOperacionesFinancieras`, `Monto`, `Fecha`, `Concepto`, `Administrador_idAdministrador`, `factura`) VALUES
(18, 52, '2021-12-05', 'Prueba', 1234568, ''),
(19, 52, '2021-12-05', 'Prueba', 1234568, ''),
(20, 500, '1990-12-12', 'Se compro una pasa', 1234568, ''),
(21, -6, '2020-12-11', 'Perdimos un dinosaurio', 1234568, ''),
(22, 504, '1200-12-11', 'Pago al programador', 1234568, ''),
(23, 40, '2021-12-13', 'Operacion en Inventario', 0, ''),
(24, 6210, '2021-12-13', 'Operacion en Inventario', 0, ''),
(25, 100, '2021-12-14', 'comprarandom', 1234568, '75519-'),
(26, 200, '2021-12-15', 'testcompra', 1234568, '80771-menorquetres.png'),
(27, 300, '2021-12-14', 'test', 1234568, '27970-menorquetres.png'),
(28, 400, '2021-12-14', 'nose', 1234568, '7512-menorquetres.png'),
(29, 500, '2021-12-14', 'sise', 1234568, '57863-menorquetres.png'),
(30, 700, '2021-12-14', 'una italika', 1234568, '75829-minimalCoverageCode.png');

-- --------------------------------------------------------

--
-- Table structure for table `operacioninventario`
--

CREATE TABLE `operacioninventario` (
  `idOperacionInventario` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `FechaOperacion` date NOT NULL,
  `Valor` float NOT NULL,
  `Administrador_idAdministrador` int(11) NOT NULL,
  `Objeto_idObjeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operacioninventario`
--

INSERT INTO `operacioninventario` (`idOperacionInventario`, `Cantidad`, `FechaOperacion`, `Valor`, `Administrador_idAdministrador`, `Objeto_idObjeto`) VALUES
(2, 1, '2021-12-12', -5, 1, 6),
(7, 1, '2021-12-12', -1, 1, 1),
(8, 1, '2021-12-13', -1, 1, 7),
(9, -10, '2021-12-13', 0, 1, 12),
(10, -15, '2021-12-13', -15, 1, 8),
(11, -1, '2021-12-13', 0, 1234568, 12);

-- --------------------------------------------------------

--
-- Table structure for table `persona`
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
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`idPersona`, `Nombre`, `coordX`, `coordY`, `Telefono`, `EsSocio`, `EsHeredero`) VALUES
(0, 'Bot', 0, 0, '0', 1, 1),
(1, 'Juan', NULL, NULL, '999999', 1, 0),
(4, 'Mau', NULL, NULL, '1234567891', 0, 0),
(7, 'JJ', NULL, NULL, '55578', 1, 0),
(8, 'Angel Uriel', NULL, NULL, '55555', 0, 0),
(9, 'Pablo', NULL, NULL, '455', 1, 1),
(10, 'Poncho', 19.343892902279116, -99.36263405253827, '557815', 1, 1),
(69, 'TIbu', 19.34507541027991, -99.36137642180157, '97582405', 1, 0),
(555, 'Peca Peca', NULL, NULL, '5576814', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `persona_has_actividades`
--

CREATE TABLE `persona_has_actividades` (
  `Persona_idPersona` int(11) NOT NULL,
  `Actividades_idActividades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
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
-- Dumping data for table `prestamos`
--

INSERT INTO `prestamos` (`idPrestamos`, `Cantidad`, `Fecha`, `Devuelto`, `Objeto_idObjeto`, `Administrador_idAdministrador`, `Persona_idPersona`) VALUES
(10, 1, '2021-12-12', 1, 5, 1234568, 1),
(12, 5, '2021-12-14', 1, 12, 1, 4),
(13, 4, '2021-12-14', 1, 6, 1, 7),
(14, 10, '2021-12-14', 1, 13, 1, 4),
(15, 1, '2021-12-14', 0, 7, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `reparaciontoma`
--

CREATE TABLE `reparaciontoma` (
  `idReparacionToma` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reparaciontoma`
--

INSERT INTO `reparaciontoma` (`idReparacionToma`, `Fecha`, `Descripcion`, `Persona_idPersona`) VALUES
(2, '2021-11-05', 'Se puso kolaloca', 4),
(3, '1984-02-29', 'Se parcho con sopa maruchan y despues se metio en arroz', 7);

-- --------------------------------------------------------

--
-- Table structure for table `reportetoma`
--

CREATE TABLE `reportetoma` (
  `idReporteToma` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Persona_idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reportetoma`
--

INSERT INTO `reportetoma` (`idReporteToma`, `Fecha`, `Descripcion`, `Persona_idPersona`) VALUES
(1, '2020-12-05', 'La rompi jugando al futbol', 4),
(2, '1984-02-28', 'Fue una peda intenzaa', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividades`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`,`Cargo_idCargo`,`Persona_idPersona`),
  ADD KEY `fk_Administrador_Cargo1_idx` (`Cargo_idCargo`),
  ADD KEY `fk_Administrador_Persona1_idx` (`Persona_idPersona`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indexes for table `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`idObjeto`);

--
-- Indexes for table `operacionesfinancieras`
--
ALTER TABLE `operacionesfinancieras`
  ADD PRIMARY KEY (`idOperacionesFinancieras`,`Administrador_idAdministrador`),
  ADD KEY `fk_OperacionesFinancieras_Administrador_idx` (`Administrador_idAdministrador`);

--
-- Indexes for table `operacioninventario`
--
ALTER TABLE `operacioninventario`
  ADD PRIMARY KEY (`idOperacionInventario`,`Administrador_idAdministrador`,`Objeto_idObjeto`),
  ADD KEY `fk_OperacionInventario_Administrador1_idx` (`Administrador_idAdministrador`),
  ADD KEY `fk_OperacionInventario_Objeto1_idx` (`Objeto_idObjeto`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indexes for table `persona_has_actividades`
--
ALTER TABLE `persona_has_actividades`
  ADD PRIMARY KEY (`Persona_idPersona`,`Actividades_idActividades`),
  ADD KEY `fk_Persona_has_Actividades_Actividades1_idx` (`Actividades_idActividades`),
  ADD KEY `fk_Persona_has_Actividades_Persona1_idx` (`Persona_idPersona`);

--
-- Indexes for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamos`,`Objeto_idObjeto`,`Administrador_idAdministrador`,`Persona_idPersona`),
  ADD KEY `fk_Prestamos_Objeto1_idx` (`Objeto_idObjeto`),
  ADD KEY `fk_Prestamos_Administrador1_idx` (`Administrador_idAdministrador`),
  ADD KEY `fk_Prestamos_Persona1_idx` (`Persona_idPersona`);

--
-- Indexes for table `reparaciontoma`
--
ALTER TABLE `reparaciontoma`
  ADD PRIMARY KEY (`idReparacionToma`,`Persona_idPersona`),
  ADD KEY `fk_ReporteToma_Persona1_idx` (`Persona_idPersona`);

--
-- Indexes for table `reportetoma`
--
ALTER TABLE `reportetoma`
  ADD PRIMARY KEY (`idReporteToma`,`Persona_idPersona`),
  ADD KEY `fk_ReporteToma_Persona1_idx` (`Persona_idPersona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idActividades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345699;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `objeto`
--
ALTER TABLE `objeto`
  MODIFY `idObjeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `operacionesfinancieras`
--
ALTER TABLE `operacionesfinancieras`
  MODIFY `idOperacionesFinancieras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `operacioninventario`
--
ALTER TABLE `operacioninventario`
  MODIFY `idOperacionInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reparaciontoma`
--
ALTER TABLE `reparaciontoma`
  MODIFY `idReparacionToma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reportetoma`
--
ALTER TABLE `reportetoma`
  MODIFY `idReporteToma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`);

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_Administrador_Cargo1` FOREIGN KEY (`Cargo_idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Administrador_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `operacionesfinancieras`
--
ALTER TABLE `operacionesfinancieras`
  ADD CONSTRAINT `fk_OperacionesFinancieras_Administrador` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `operacioninventario`
--
ALTER TABLE `operacioninventario`
  ADD CONSTRAINT `fk_OperacionInventario_Administrador1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OperacionInventario_Objeto1` FOREIGN KEY (`Objeto_idObjeto`) REFERENCES `objeto` (`idObjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `persona_has_actividades`
--
ALTER TABLE `persona_has_actividades`
  ADD CONSTRAINT `fk_Persona_has_Actividades_Actividades1` FOREIGN KEY (`Actividades_idActividades`) REFERENCES `actividades` (`idActividades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Persona_has_Actividades_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_Prestamos_Administrador1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prestamos_Objeto1` FOREIGN KEY (`Objeto_idObjeto`) REFERENCES `objeto` (`idObjeto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prestamos_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reparaciontoma`
--
ALTER TABLE `reparaciontoma`
  ADD CONSTRAINT `fk_ReporteToma_Persona10` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reportetoma`
--
ALTER TABLE `reportetoma`
  ADD CONSTRAINT `fk_ReporteToma_Persona1` FOREIGN KEY (`Persona_idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
