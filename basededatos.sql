SET FOREIGN_KEY_CHECKS = 0;

DROP SCHEMA IF EXISTS `marisquinho` ;
CREATE SCHEMA IF NOT EXISTS `marisquinho` 


CREATE TABLE IF NOT EXISTS `marisquinho`.`modalidades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci

CREATE TABLE IF NOT EXISTS `marisquinho`.`paises` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 194
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci

CREATE TABLE IF NOT EXISTS `marisquinho`.`participantes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `apellidos` VARCHAR(100) NULL DEFAULT NULL,
  `telefono` VARCHAR(20) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `dni` VARCHAR(50) NULL DEFAULT NULL,
  `fecha_nacimiento` DATE NULL DEFAULT NULL,
  `alias` VARCHAR(50) NULL DEFAULT NULL,
  `veterano` TINYINT(1) NULL DEFAULT NULL,
  `sponsors` VARCHAR(200) NULL DEFAULT NULL,
  `musica` VARCHAR(200) NULL DEFAULT NULL,
  `instagram` VARCHAR(100) NULL DEFAULT NULL,
  `tiktok` VARCHAR(100) NULL DEFAULT NULL,
  `id_modalidad` INT NULL DEFAULT NULL,
  `id_pais` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_modalidad` (`id_modalidad` ASC) VISIBLE,
  INDEX `id_pais` (`id_pais` ASC) VISIBLE,
  CONSTRAINT `participantes_ibfk_1`
    FOREIGN KEY (`id_modalidad`)
    REFERENCES `marisquinho`.`modalidades` (`id`),
  CONSTRAINT `participantes_ibfk_2`
    FOREIGN KEY (`id_pais`)
    REFERENCES `marisquinho`.`paises` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 97
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci

SET FOREIGN_KEY_CHECKS = 1;
