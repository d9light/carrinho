-- MySQL Workbench Synchronization
-- Generated: 2024-03-05 08:47
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: ctism

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `dsi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;

CREATE TABLE IF NOT EXISTS `dsi`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `tipo_usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `tipo_usuario_id`),
  INDEX `fk_usuario_tipo_usuario_idx` (`tipo_usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_tipo_usuario`
    FOREIGN KEY (`tipo_usuario_id`)
    REFERENCES `dsi`.`tipo_usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `dsi`.`tipo_usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `dsi`.`itens` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `quantidade` VARCHAR(45) NOT NULL,
  `preco_custo` FLOAT(11) NOT NULL,
  `preco_venda` FLOAT(11) NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`),
  INDEX `fk_itens_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_itens_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `dsi`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `dsi`.`pedidos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `data_compra` DATE NOT NULL,
  `data_aprovacao` DATE NOT NULL,
  `valor_total` FLOAT(11) NOT NULL,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`),
  INDEX `fk_pedidos_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_pedidos_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `dsi`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `dsi`.`itens_has_pedidos` (
  `id` VARCHAR(45) NOT NULL,
  `itens_id` INT(11) NOT NULL,
  `pedidos_id` INT(11) NOT NULL,
  `quantidade` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `itens_id`, `pedidos_id`),
  INDEX `fk_itens_has_pedidos_pedidos1_idx` (`pedidos_id` ASC) VISIBLE,
  INDEX `fk_itens_has_pedidos_itens1_idx` (`itens_id` ASC) VISIBLE,
  CONSTRAINT `fk_itens_has_pedidos_itens1`
    FOREIGN KEY (`itens_id`)
    REFERENCES `dsi`.`itens` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_itens_has_pedidos_pedidos1`
    FOREIGN KEY (`pedidos_id`)
    REFERENCES `dsi`.`pedidos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
usuario