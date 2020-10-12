-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "cd2" -----------------------------------
CREATE DATABASE IF NOT EXISTS `cd2` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cd2`;
-- ---------------------------------------------------------


-- CREATE TABLE "cep" ------------------------------------------
CREATE TABLE `cep`( 
	`id_cep` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`cep` Char( 9 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`logradouro` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`complemento` Text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
	`bairro` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`localidade` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`uf` VarChar( 250 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`ibge` Int( 255 ) UNSIGNED NULL DEFAULT NULL,
	`gia` Int( 255 ) UNSIGNED NULL DEFAULT NULL,
	`ddd` Int( 255 ) UNSIGNED NULL DEFAULT NULL,
	`siafi` Int( 255 ) UNSIGNED NULL DEFAULT NULL,
	PRIMARY KEY ( `id_cep` ),
	CONSTRAINT `unique_cep` UNIQUE( `cep` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 22;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


