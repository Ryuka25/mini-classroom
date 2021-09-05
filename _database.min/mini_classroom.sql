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
# Add table "TeachersModules"                                            #
# ---------------------------------------------------------------------- #

CREATE TABLE `TeachersModules` (
    `teacherId` VARCHAR(50) NOT NULL,
    `teachedModuleId` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_0_teachersModules` PRIMARY KEY (`teacherId`),
    CONSTRAINT `PK_1_teachersModules` PRIMARY KEY (`teachedModuleId`),
);

# ---------------------------------------------------------------------- #
# Add table "SchoolClass"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `SchoolClass` {
    `classLevel` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_schoolClass` PRIMARY KEY (`classLevel`)
};

# ---------------------------------------------------------------------- #
# Add table "StudentsClass"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `StudentsClass` (
    `studentId` VARCHAR(50) NOT NULL,
    `studentClassLevel` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_0_studentsClass` PRIMARY KEY (`studentId`),
    CONSTRAINT `PK_1_studentsClass` PRIMARY KEY (`studentClassLevel`)
);

# ---------------------------------------------------------------------- #
# Add table "Shedules"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `Shedules` (
    `sheduleId` INTEGER NOT NULL AUTO_INCREMENT,
    `date` DATE NOT NULL,
    `beginTime` TIME NOT NULL,
    `endTime` TIME NOT NULL,
    `schoolRoom` VARCHAR(25) NOT NULL,
    `concernedTeacher` VARCHAR(25) NOT NULL,
    `concernedClass` VARCHAR(25) NOT NULL,
    `concernedModule` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_shedules` PRIMARY KEY (`sheduleId`)
);

# ---------------------------------------------------------------------- #
# Add table "Posts"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `Posts` (
    `postId` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(25) NOT NULL,
    `publicationDateTime` DATETIME NOT NULL,
    `category` VARCHAR NOT NULL,
    `deadline` DATETIME,
    `legend` LONGTEXT,
    `concernedModule` VARCHAR(25) NOT NULL,
    `createdByTeacher` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_posts` PRIMARY KEY (`postId`)
);

# ---------------------------------------------------------------------- #
# Add table "Comments"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `Comments` (
    `commentId` INTEGER NOT NULL AUTO_INCREMENT,
    `creationDateTime` DATETIME NOT NULL,
    `legend` TINYTEXT,
    `attachedFile` LONGBLOB,
    `createdByAccount` VARCHAR(25) NOT NULL,
    `concernedPost` INTEGER,
    CONSTRAINT `PK_comments` PRIMARY KEY (`commentId`)
);

# ---------------------------------------------------------------------- #
# Add table "Discussions"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `Discussions` (
    `discussionId` INTEGER NOT NULL AUTO_INCREMENT,
    `creationDateTime` DATE AUTO_INCREMENT
    `name` VARCHAR(50) NOT NULL,
    `createdByStudent` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_discussions` PRIMARY KEY (`discussionId`)
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `Modules` ADD CONSTRAINT `FK_modules_moduleCategories`
    FOREIGN KEY (`moduleCategoryCode`) REFERENCES `ModuleCategories`(`moduleCategoryCode`);

ALTER TABLE `Accounts` ADD CONSTRAINT `FK_accounts_schoolClass`
    FOREIGN KEY (`associedSchoolClass`) REFERENCES `SchoolClass`(`classLevel`);

ALTER TABLE `TeachersModules` ADD CONSTRAINT `FK_teachersModules_accounts`
    FOREIGN KEY (`teacherId`) REFERENCES `Accounts`(`accountId`);
    
ALTER TABLE `TeachersModules` ADD CONSTRAINT `FK_teachersModules_modules`
    FOREIGN KEY (`teachedModuleId`) REFERENCES `Modules`(`moduleId`);

ALTER TABLE `StudentsClass` ADD CONSTRAINT `FK_studentsClass_accounts`
    FOREIGN KEY (`studentId`) REFERENCES `Accounts`(`accountId`);

ALTER TABLE `StudentsClass` ADD CONSTRAINT `FK_studentsClass_schoolClass`
    FOREIGN KEY (`studentClassLevel`) REFERENCES `SchoolClass`(`classLevel`);

ALTER TABLE `Shedules` ADD CONSTRAINT `FK_shedules_accounts` 
    FOREIGN KEY (`concernedTeacher`) REFERENCES `Accounts`(`accountId`);

ALTER TABLE `Shedules` ADD CONSTRAINT `FK_shedules_schoolClass`
    FOREIGN KEY (`concernedClass`) REFERENCES `SchoolClass`(`classLevel`);

ALTER TABLE `Shedules` ADD CONSTRAINT `FK_shedules_modules`
    FOREIGN KEY (`concernedModule`) REFERENCES `Modules`(`moduleId`);

ALTER TABLE `Posts` ADD CONSTRAINT `FK_posts_accounts`
    FOREIGN KEY (`createdByTeacher`) REFERENCES `Accounts`(`accountId`);

ALTER TABLE `Posts` ADD CONSTRAINT `FK_posts_modules`
    FOREIGN KEY (`concernedModule`) REFERENCES `Modules`(`moduleId`);

ALTER TABLE `Comments` ADD CONSTRAINT `FK_comments_accounts`
    FOREIGN KEY (`createdByAccount`) REFERENCES `Accounts`(`accountId`);

ALTER TABLE `Comments` ADD CONSTRAINT `FK_comments_posts`
    FOREIGN KEY (`concernedPost`) REFERENCES `Posts`(`postId`);
