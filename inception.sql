SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Table `bdd`.`cards`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cards` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `num` INT(5) NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `rarity` ENUM('C','U','R') NOT NULL ,
  `effect` TEXT NOT NULL ,
  `cat` VARCHAR(45) NULL ,
  `cost` VARCHAR(20) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `num_UNIQUE` (`num` ASC) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `dreamers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `num` INT(5) NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `effect_solo` TEXT NOT NULL ,
  `effect_multi` TEXT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `num_UNIQUE` (`num` ASC) )
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
