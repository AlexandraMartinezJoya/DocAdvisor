-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Doctor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Doctor` (
  `idDoctor` INT NOT NULL AUTO_INCREMENT COMMENT 'the default id in which the doctor is listed ',
  `name` VARCHAR(45) NOT NULL COMMENT 'the name of the doctor',
  `surname` VARCHAR(45) NOT NULL COMMENT 'the surname of the doctor ',
  `idSpecialization` VARCHAR(45) NOT NULL COMMENT 'The current specialization of the doctor *** what if there are more than one?? ',
  `idAddress` VARCHAR(45) NOT NULL,
  `emailAddress` VARCHAR(45) NOT NULL COMMENT 'the registered email address used to login perhaps to the website',
  `photo` LONGBLOB NULL COMMENT 'upload photo option',
  `cnas` TINYINT(1) NOT NULL COMMENT 'if the doctor is currently working with cnas',
  `phoneNumber` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDoctor`));


-- -----------------------------------------------------
-- Table `mydb`.`Specialization`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Specialization` (
  `category_id` INT NOT NULL AUTO_INCREMENT,
  `specName` VARCHAR(45) NOT NULL COMMENT 'the name of the specialization',
  PRIMARY KEY (`category_id`));


-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `isUser` INT NOT NULL AUTO_INCREMENT,
  `authLogin` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL COMMENT 'auth email for the user',
  `phoneNumber` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`isUser`));


-- -----------------------------------------------------
-- Table `mydb`.`Address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Address` (
  `idAddress` INT NOT NULL AUTO_INCREMENT,
  `streetName` VARCHAR(45) NOT NULL,
  `streetNumber` VARCHAR(45) NOT NULL,
  `locationPhoto` MEDIUMBLOB NULL,
  PRIMARY KEY (`idAddress`));


-- -----------------------------------------------------
-- Table `mydb`.`Reviews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Reviews` (
  `idReview` INT NOT NULL AUTO_INCREMENT,
  `idDoctor` VARCHAR(45) NOT NULL,
  `votesPositive` INT NULL,
  `votesNegative` INT NULL,
  `maxVotesPerIdDoctor` TINYINT(1) NULL,
  PRIMARY KEY (`idReview`));


-- -----------------------------------------------------
-- Table `mydb`.`Booking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Booking` (
  `idBooking` INT NOT NULL AUTO_INCREMENT,
  `idUser` VARCHAR(45) NOT NULL,
  `idDoctor` VARCHAR(45) NOT NULL,
  `idSpecialization` VARCHAR(45) NOT NULL,
  `desiredDate` DATE NOT NULL,
  `confirmIdBooking` TINYINT(1) NOT NULL,
  `emergencyLevel` INT NOT NULL COMMENT 'scale from 1 to 10',
  `bookingRemainder` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idBooking`));


-- -----------------------------------------------------
-- Table `mydb`.`Location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Location` (
  `locationID` INT NOT NULL AUTO_INCREMENT,
  `zipCode` VARCHAR(45) NOT NULL,
  `locationName` VARCHAR(45) NOT NULL,
  `locationCoordinates` VARCHAR(30) NOT NULL COMMENT 'possibly to ip track, but for that we would need to get the ip location at every user login doctor or otherwise.',
  PRIMARY KEY (`locationID`));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
