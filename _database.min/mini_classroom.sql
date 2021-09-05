# ---------------------------------------------------------------------- #
# Project name:          Mini_Classroom                                  #
# Author:                @Lovanirina (ryuka25.github.io)                 #
# ---------------------------------------------------------------------- #

DROP DATABASE IF EXISTS mini_classroom;

CREATE DATABASE IF NOT EXISTS mini_classroom;

USE mini_classroom;

# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #
# ---------------------------------------------------------------------- #
# Add table "Modules"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `Modules` (
    `moduleId` VARCHAR(25) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `description` MEDIUMTEXT,
    `picture` LONGBLOB NOT NULL,
    `categoryCode` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_modules` PRIMARY KEY (`moduleId`),
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `Modules` ADD CONSTRAINT `FK_modules_moduleCategories`
    FOREIGN KEY (`moduleCategoryCode`) REFERENCES `ModuleCategories`(`moduleCategoryCode`);
