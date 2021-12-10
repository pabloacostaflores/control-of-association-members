-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Cargo` (
  `idCargo` INT NOT NULL AUTO_INCREMENT,
  `NombreCargo` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idCargo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Persona` (
  `idPersona` INT NOT NULL,
  `Nombre` VARCHAR(60) NOT NULL,
  `Telefono` VARCHAR(10) NOT NULL,
  `Dirreccion` VARCHAR(200) NOT NULL,
  `EsSocio` TINYINT NOT NULL,
  `EsHeredero` TINYINT NOT NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Administrador` (
  `idAdministrador` INT NOT NULL AUTO_INCREMENT,
  `Contrasenia` VARCHAR(45) NOT NULL,
  `esTesorero` TINYINT NOT NULL,
  `Cargo_idCargo` INT NOT NULL,
  `Persona_idPersona` INT NOT NULL,
  PRIMARY KEY (`idAdministrador`, `Cargo_idCargo`, `Persona_idPersona`),
  INDEX `fk_Administrador_Cargo1_idx` (`Cargo_idCargo` ASC) VISIBLE,
  INDEX `fk_Administrador_Persona1_idx` (`Persona_idPersona` ASC) VISIBLE,
  CONSTRAINT `fk_Administrador_Cargo1`
    FOREIGN KEY (`Cargo_idCargo`)
    REFERENCES `mydb`.`Cargo` (`idCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Administrador_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `mydb`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`OperacionesFinancieras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`OperacionesFinancieras` (
  `idOperacionesFinancieras` INT NOT NULL AUTO_INCREMENT,
  `Monto` DOUBLE NOT NULL,
  `Concepto` VARCHAR(100) NOT NULL,
  `Administrador_idAdministrador` INT NOT NULL,
  PRIMARY KEY (`idOperacionesFinancieras`, `Administrador_idAdministrador`),
  INDEX `fk_OperacionesFinancieras_Administrador_idx` (`Administrador_idAdministrador` ASC) VISIBLE,
  CONSTRAINT `fk_OperacionesFinancieras_Administrador`
    FOREIGN KEY (`Administrador_idAdministrador`)
    REFERENCES `mydb`.`Administrador` (`idAdministrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ReporteToma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ReporteToma` (
  `idReporteToma` INT NOT NULL AUTO_INCREMENT,
  `Fecha` DATE NOT NULL,
  `Descripcion` VARCHAR(500) NOT NULL,
  `Persona_idPersona` INT NOT NULL,
  PRIMARY KEY (`idReporteToma`, `Persona_idPersona`),
  INDEX `fk_ReporteToma_Persona1_idx` (`Persona_idPersona` ASC) VISIBLE,
  CONSTRAINT `fk_ReporteToma_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `mydb`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Actividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Actividades` (
  `idActividades` INT NOT NULL AUTO_INCREMENT,
  `FechaHora` DATETIME NOT NULL,
  `HorasLaboradas` INT NOT NULL,
  `Estatus` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idActividades`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Persona_has_Actividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Persona_has_Actividades` (
  `Persona_idPersona` INT NOT NULL,
  `Actividades_idActividades` INT NOT NULL,
  PRIMARY KEY (`Persona_idPersona`, `Actividades_idActividades`),
  INDEX `fk_Persona_has_Actividades_Actividades1_idx` (`Actividades_idActividades` ASC) VISIBLE,
  INDEX `fk_Persona_has_Actividades_Persona1_idx` (`Persona_idPersona` ASC) VISIBLE,
  CONSTRAINT `fk_Persona_has_Actividades_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `mydb`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Persona_has_Actividades_Actividades1`
    FOREIGN KEY (`Actividades_idActividades`)
    REFERENCES `mydb`.`Actividades` (`idActividades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ReparacionToma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ReparacionToma` (
  `idReparacionToma` INT NOT NULL AUTO_INCREMENT,
  `Fecha` DATE NOT NULL,
  `Descripcion` VARCHAR(500) NOT NULL,
  `Persona_idPersona` INT NOT NULL,
  PRIMARY KEY (`idReparacionToma`, `Persona_idPersona`),
  INDEX `fk_ReporteToma_Persona1_idx` (`Persona_idPersona` ASC) VISIBLE,
  CONSTRAINT `fk_ReporteToma_Persona10`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `mydb`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Objeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Objeto` (
  `idObjeto` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(60) NOT NULL,
  `Descripcion` VARCHAR(200) NOT NULL,
  `Cantidad` INT NOT NULL,
  PRIMARY KEY (`idObjeto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`OperacionInventario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`OperacionInventario` (
  `idOperacionInventario` INT NOT NULL AUTO_INCREMENT,
  `Cantidad` INT NOT NULL,
  `FechaOperacion` DATE NOT NULL,
  `Valor` FLOAT NOT NULL,
  `Administrador_idAdministrador` INT NOT NULL,
  `Objeto_idObjeto` INT NOT NULL,
  PRIMARY KEY (`idOperacionInventario`, `Administrador_idAdministrador`, `Objeto_idObjeto`),
  INDEX `fk_OperacionInventario_Administrador1_idx` (`Administrador_idAdministrador` ASC) VISIBLE,
  INDEX `fk_OperacionInventario_Objeto1_idx` (`Objeto_idObjeto` ASC) VISIBLE,
  CONSTRAINT `fk_OperacionInventario_Administrador1`
    FOREIGN KEY (`Administrador_idAdministrador`)
    REFERENCES `mydb`.`Administrador` (`idAdministrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OperacionInventario_Objeto1`
    FOREIGN KEY (`Objeto_idObjeto`)
    REFERENCES `mydb`.`Objeto` (`idObjeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Prestamos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Prestamos` (
  `idPrestamos` INT NOT NULL AUTO_INCREMENT,
  `Cantidad` INT NOT NULL,
  `Objeto_idObjeto` INT NOT NULL,
  `Administrador_idAdministrador` INT NOT NULL,
  `Persona_idPersona` INT NOT NULL,
  PRIMARY KEY (`idPrestamos`, `Objeto_idObjeto`, `Administrador_idAdministrador`, `Persona_idPersona`),
  INDEX `fk_Prestamos_Objeto1_idx` (`Objeto_idObjeto` ASC) VISIBLE,
  INDEX `fk_Prestamos_Administrador1_idx` (`Administrador_idAdministrador` ASC) VISIBLE,
  INDEX `fk_Prestamos_Persona1_idx` (`Persona_idPersona` ASC) VISIBLE,
  CONSTRAINT `fk_Prestamos_Objeto1`
    FOREIGN KEY (`Objeto_idObjeto`)
    REFERENCES `mydb`.`Objeto` (`idObjeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prestamos_Administrador1`
    FOREIGN KEY (`Administrador_idAdministrador`)
    REFERENCES `mydb`.`Administrador` (`idAdministrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prestamos_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `mydb`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
