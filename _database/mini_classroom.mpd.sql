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
    `moduleID` VARCHAR(25) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `description` MEDIUMTEXT,
    `picture` LONGBLOB NOT NULL,
    `categoryCode` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_modules` PRIMARY KEY (`moduleID`)
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
    `accountID` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `type` INTEGER NOT NULL,
    `adminAccess` INTEGER NOT NULL,
    `firstName` VARCHAR(50),
    `lastName` VARCHAR(50),
    `address` VARCHAR(50),
    `phoneNumber` VARCHAR(25),
    `picture` LONGBLOB NOT NULL,
    `associedSchoolClass` VARCHAR(25),
    CONSTRAINT `PK_accounts` PRIMARY KEY (`accountID`)
);

# ---------------------------------------------------------------------- #
# Add table "TeachersModules"                                            #
# ---------------------------------------------------------------------- #

CREATE TABLE `TeachersModules` (
    `teacherID` VARCHAR(50) NOT NULL,
    `teachedModuleID` VARCHAR(25) NOT NULL
);

# ---------------------------------------------------------------------- #
# Add table "SchoolClass"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `SchoolClass` (
    `classLevel` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_schoolClass` PRIMARY KEY (`classLevel`)
);


# ---------------------------------------------------------------------- #
# Add table "Shedules"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `Shedules` (
    `sheduleID` INTEGER NOT NULL AUTO_INCREMENT,
    `date` DATE NOT NULL,
    `beginTime` TIME NOT NULL,
    `endTime` TIME NOT NULL,
    `schoolRoom` VARCHAR(25) NOT NULL,
    `concernedTeacher` VARCHAR(25) NOT NULL,
    `concernedClass` VARCHAR(25) NOT NULL,
    `concernedModule` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_shedules` PRIMARY KEY (`sheduleID`)
);

# ---------------------------------------------------------------------- #
# Add table "Posts"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `Posts` (
    `postID` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(25) NOT NULL,
    `publicationDateTime` DATETIME NOT NULL,
    `category` VARCHAR(25) NOT NULL,
    `deadline` DATETIME,
    `legend` LONGTEXT,
    `concernedModule` VARCHAR(25) NOT NULL,
    `createdByTeacher` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_posts` PRIMARY KEY (`postID`)
);

# ---------------------------------------------------------------------- #
# Add table "Comments"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `Comments` (
    `commentID` INTEGER NOT NULL AUTO_INCREMENT,
    `creationDateTime` DATETIME NOT NULL,
    `legend` TINYTEXT,
    `attachedFile` LONGBLOB,
    `createdByAccount` VARCHAR(25) NOT NULL,
    `concernedPost` INTEGER,
    CONSTRAINT `PK_comments` PRIMARY KEY (`commentID`)
);

# ---------------------------------------------------------------------- #
# Add table "Discussions"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `Discussions` (
    `discussionID` INTEGER NOT NULL AUTO_INCREMENT,
    `creationDateTime` DATE,
    `name` VARCHAR(50) NOT NULL,
    `createdByStudent` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_discussions` PRIMARY KEY (`discussionID`)
);

# ---------------------------------------------------------------------- #
# Add table "Messages"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `Messages` (
    `messageID` INTEGER NOT NULL AUTO_INCREMENT,
    `sendDateTime` DATETIME NOT NULL,
    `legend` TINYTEXT,
    `attachedFile` LONGBLOB,
    `sendByStudent` VARCHAR(25) NOT NULL,
    `attachedDiscussion` INTEGER NOT NULL,
    CONSTRAINT `PK_messages` PRIMARY KEY (`messageID`)
);

# ---------------------------------------------------------------------- #
# Add table "DiscussionsMembers"                                         #
# ---------------------------------------------------------------------- #

CREATE TABLE `DiscussionsMembers` (
    `concernedDiscussion` INTEGER NOT NULL,
    `studentMember` VARCHAR(25) NOT NULL
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `Modules` ADD CONSTRAINT `FK_modules_moduleCategories`
    FOREIGN KEY (`categoryCode`) REFERENCES `ModuleCategories`(`moduleCategoryCode`);
ALTER TABLE `Accounts` ADD CONSTRAINT `FK_accounts_schoolClass`
    FOREIGN KEY (`associedSchoolClass`) REFERENCES `SchoolClass`(`classLevel`);

ALTER TABLE `TeachersModules` ADD CONSTRAINT `FK_teachersModules_accounts`
    FOREIGN KEY (`teacherID`) REFERENCES `Accounts`(`accountID`);
    
ALTER TABLE `TeachersModules` ADD CONSTRAINT `FK_teachersModules_modules`
    FOREIGN KEY (`teachedModuleID`) REFERENCES `Modules`(`moduleID`);

ALTER TABLE `Shedules` ADD CONSTRAINT `FK_shedules_accounts` 
    FOREIGN KEY (`concernedTeacher`) REFERENCES `Accounts`(`accountID`);

ALTER TABLE `Shedules` ADD CONSTRAINT `FK_shedules_schoolClass`
    FOREIGN KEY (`concernedClass`) REFERENCES `SchoolClass`(`classLevel`);

ALTER TABLE `Shedules` ADD CONSTRAINT `FK_shedules_modules`
    FOREIGN KEY (`concernedModule`) REFERENCES `Modules`(`moduleID`);

ALTER TABLE `Posts` ADD CONSTRAINT `FK_posts_accounts`
    FOREIGN KEY (`createdByTeacher`) REFERENCES `Accounts`(`accountID`);

ALTER TABLE `Posts` ADD CONSTRAINT `FK_posts_modules`
    FOREIGN KEY (`concernedModule`) REFERENCES `Modules`(`moduleID`);

ALTER TABLE `Comments` ADD CONSTRAINT `FK_comments_accounts`
    FOREIGN KEY (`createdByAccount`) REFERENCES `Accounts`(`accountID`);

ALTER TABLE `Comments` ADD CONSTRAINT `FK_comments_posts`
    FOREIGN KEY (`concernedPost`) REFERENCES `Posts`(`postID`);

ALTER TABLE `Messages` ADD CONSTRAINT `FK_messages_accounts`
    FOREIGN KEY (`sendByStudent`) REFERENCES `Accounts`(`accountID`);

ALTER TABLE `Messages` ADD CONSTRAINT `FK_messages_discussions`
    FOREIGN KEY (`attachedDiscussion`) REFERENCES `Discussions`(`discussionID`);

ALTER TABLE `DiscussionsMembers` ADD CONSTRAINT `FK_discussionsMembers_discussions`
    FOREIGN KEY (`concernedDiscussion`) REFERENCES `Discussions`(`discussionID`);

ALTER TABLE `DiscussionsMembers` ADD CONSTRAINT `FK_discussionMembers_accounts`
    FOREIGN KEY (`studentMember`) REFERENCES `Accounts`(`accountID`);