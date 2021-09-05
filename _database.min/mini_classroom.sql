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
# Add table "ModuleCategories"                                           #
# ---------------------------------------------------------------------- #

CREATE TABLE `ModuleCategories` (
    `moduleCategoryCode` VARCHAR(25) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `picture` LONGBLOB NOT NULL,
    CONSTRAINT `PK_moduleCategories` PRIMARY KEY (`moduleCategoryCode`)
);

# ---------------------------------------------------------------------- #
# Add table "Accounts"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `Accounts` (
    `accountId` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `type` VARCHAR(50) NOT NULL,
    `adminAccess` INTEGER NOT NULL,
    `firstName` VARCHAR(50),
    `lastName` VARCHAR(50),
    `address` VARCHAR(50),
    `phoneNumber` VARCHAR(25),
    `pictures` LONGBLOB NOT NULL,
    `associedSchoolClass` VARCHAR(25),
    CONSTRAINT `PK_accounts` PRIMARY KEY (`accountId`),
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `Modules` ADD CONSTRAINT `FK_modules_moduleCategories`
    FOREIGN KEY (`moduleCategoryCode`) REFERENCES `ModuleCategories`(`moduleCategoryCode`);

ALTER TABLE `Accounts` ADD CONSTRAINT `FK_accounts_schoolClass`
    FOREIGN KEY (`associedSchoolClass`) REFERENCES `SchoolClass`(`classLevel`);
