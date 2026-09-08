-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bd_rosaintima
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_rosaintima
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_rosaintima` DEFAULT CHARACTER SET utf8mb3 ;
USE `bd_rosaintima` ;

-- -----------------------------------------------------
-- Table `bd_rosaintima`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_rosaintima`.`categoria` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3
COMMENT = '		\\n\\n';


-- -----------------------------------------------------
-- Table `bd_rosaintima`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_rosaintima`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `cpf` VARCHAR(45) NULL DEFAULT NULL,
  `telefone` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `bd_rosaintima`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_rosaintima`.`funcionario` (
  `id_funcionario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `cpf` VARCHAR(45) NULL DEFAULT NULL,
  `telefone` VARCHAR(45) NULL DEFAULT NULL,
  `cargo` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `bd_rosaintima`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_rosaintima`.`produto` (
  `id_produto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` INT NULL DEFAULT NULL,
  `preco` TEXT NULL DEFAULT NULL,
  `estoque` VARCHAR(45) NULL DEFAULT NULL,
  `id_categoria` INT NOT NULL,
  PRIMARY KEY (`id_produto`),
  INDEX `fk_filme_categoria_idx` (`id_categoria` ASC) VISIBLE,
  CONSTRAINT `fk_filme_categoria`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `bd_rosaintima`.`categoria` (`id_categoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `bd_rosaintima`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_rosaintima`.`venda` (
  `id_venda` INT NOT NULL AUTO_INCREMENT,
  `data_venda` DATE NULL DEFAULT NULL,
  `valor_total` INT NULL DEFAULT NULL,
  `forma_pagamento` VARCHAR(45) NULL DEFAULT NULL,
  `id_cliente` INT NOT NULL,
  `id_funcionario` INT NOT NULL,
  PRIMARY KEY (`id_venda`),
  INDEX `fk_locacao_cliente1_idx` (`id_cliente` ASC) VISIBLE,
  INDEX `fk_venda_funcionario1_idx` (`id_funcionario` ASC) VISIBLE,
  CONSTRAINT `fk_locacao_cliente1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `bd_rosaintima`.`cliente` (`id_cliente`),
  CONSTRAINT `fk_venda_funcionario1`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `bd_rosaintima`.`funcionario` (`id_funcionario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `bd_rosaintima`.`item_venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_rosaintima`.`item_venda` (
  `id_venda` INT NOT NULL,
  `id_produto` INT NOT NULL,
  `quantidade` VARCHAR(45) NULL DEFAULT NULL,
  `preco_unitario` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_venda`, `id_produto`),
  INDEX `fk_locacao_has_filme_filme1_idx` (`id_produto` ASC) VISIBLE,
  INDEX `fk_locacao_has_filme_locacao1_idx` (`id_venda` ASC) VISIBLE,
  CONSTRAINT `fk_locacao_has_filme_filme1`
    FOREIGN KEY (`id_produto`)
    REFERENCES `bd_rosaintima`.`produto` (`id_produto`),
  CONSTRAINT `fk_locacao_has_filme_locacao1`
    FOREIGN KEY (`id_venda`)
    REFERENCES `bd_rosaintima`.`venda` (`id_venda`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
