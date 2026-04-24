-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema store_dev
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema store_dev
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `store_dev` DEFAULT CHARACTER SET utf8mb3 ;
USE `store_dev` ;

-- -----------------------------------------------------
-- Table `store_dev`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store_dev`.`customers` (
  `customer_id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `birth_date` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `store_dev`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store_dev`.`orders` (
  `order_id` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `comment` VARCHAR(45) NOT NULL,
  `delivery_date` VARCHAR(45) NOT NULL,
  `customer_id` INT NOT NULL,
  PRIMARY KEY (`order_id`),
  INDEX `fk_orders_customers_idx` (`customer_id` ASC) VISIBLE,
  CONSTRAINT `fk_orders_customers`
    FOREIGN KEY (`customer_id`)
    REFERENCES `store_dev`.`customers` (`customer_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
