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
# Add table "modules"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `modules` (
    `moduleID` VARCHAR(25) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `description` MEDIUMTEXT,
    `picture` LONGBLOB NOT NULL,
    `categoryCode` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_modules` PRIMARY KEY (`moduleID`)
);

# ---------------------------------------------------------------------- #
# Add table "moduleCategories"                                           #
# ---------------------------------------------------------------------- #

CREATE TABLE `moduleCategories` (
    `moduleCategoryCode` VARCHAR(25) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `picture` LONGBLOB NOT NULL,
    CONSTRAINT `PK_moduleCategories` PRIMARY KEY (`moduleCategoryCode`)
);

# ---------------------------------------------------------------------- #
# Add table "accounts"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `accounts` (
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
# Add table "teacher_module"                                            #
# ---------------------------------------------------------------------- #

CREATE TABLE `teacher_module` (
    `teacherID` VARCHAR(50) NOT NULL,
    `teachedModuleID` VARCHAR(25) NOT NULL
);

# ---------------------------------------------------------------------- #
# Add table "schoolClass"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `schoolClass` (
    `classLevel` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_schoolClass` PRIMARY KEY (`classLevel`)
);


# ---------------------------------------------------------------------- #
# Add table "schedules"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `schedules` (
    `sheduleID` INTEGER NOT NULL AUTO_INCREMENT,
    `sheduleDate` DATE NOT NULL,
    `beginTime` TIME NOT NULL,
    `endTime` TIME NOT NULL,
    `schoolRoom` VARCHAR(25) NOT NULL,
    `concernedTeacher` VARCHAR(25) NOT NULL,
    `concernedClass` VARCHAR(25) NOT NULL,
    `concernedModule` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_shedules` PRIMARY KEY (`sheduleID`)
);

# ---------------------------------------------------------------------- #
# Add table "posts"                                                      #
# ---------------------------------------------------------------------- #

CREATE TABLE `posts` (
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
# Add table "comments"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `comments` (
    `commentID` INTEGER NOT NULL AUTO_INCREMENT,
    `creationDateTime` DATETIME NOT NULL,
    `legend` TINYTEXT,
    `attachedFile` LONGBLOB,
    `createdByAccount` VARCHAR(25) NOT NULL,
    `concernedPost` INTEGER,
    CONSTRAINT `PK_comments` PRIMARY KEY (`commentID`)
);

# ---------------------------------------------------------------------- #
# Add table "discussions"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `discussions` (
    `discussionID` INTEGER NOT NULL AUTO_INCREMENT,
    `creationDateTime` DATE,
    `name` VARCHAR(50) NOT NULL,
    `createdByStudent` VARCHAR(25) NOT NULL,
    CONSTRAINT `PK_discussions` PRIMARY KEY (`discussionID`)
);

# ---------------------------------------------------------------------- #
# Add table "messages"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `messages` (
    `messageID` INTEGER NOT NULL AUTO_INCREMENT,
    `sendDateTime` DATETIME NOT NULL,
    `legend` TINYTEXT,
    `attachedFile` LONGBLOB,
    `sendByStudent` VARCHAR(25) NOT NULL,
    `attachedDiscussion` INTEGER NOT NULL,
    CONSTRAINT `PK_messages` PRIMARY KEY (`messageID`)
);

# ---------------------------------------------------------------------- #
# Add table "discussion_member"                                         #
# ---------------------------------------------------------------------- #

CREATE TABLE `discussion_member` (
    `concernedDiscussion` INTEGER NOT NULL,
    `studentMember` VARCHAR(25) NOT NULL
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `modules` ADD CONSTRAINT `FK_modules_moduleCategories`
    FOREIGN KEY (`categoryCode`) REFERENCES `moduleCategories`(`moduleCategoryCode`);
ALTER TABLE `accounts` ADD CONSTRAINT `FK_accounts_schoolClass`
    FOREIGN KEY (`associedSchoolClass`) REFERENCES `schoolClass`(`classLevel`);

ALTER TABLE `teacher_module` ADD CONSTRAINT `FK_teacher_module_accounts`
    FOREIGN KEY (`teacherID`) REFERENCES `accounts`(`accountID`);
    
ALTER TABLE `teacher_module` ADD CONSTRAINT `FK_teacher_module_modules`
    FOREIGN KEY (`teachedModuleID`) REFERENCES `modules`(`moduleID`);

ALTER TABLE `schedules` ADD CONSTRAINT `FK_shedules_accounts` 
    FOREIGN KEY (`concernedTeacher`) REFERENCES `accounts`(`accountID`);

ALTER TABLE `schedules` ADD CONSTRAINT `FK_shedules_schoolClass`
    FOREIGN KEY (`concernedClass`) REFERENCES `schoolClass`(`classLevel`);

ALTER TABLE `schedules` ADD CONSTRAINT `FK_shedules_modules`
    FOREIGN KEY (`concernedModule`) REFERENCES `modules`(`moduleID`);

ALTER TABLE `posts` ADD CONSTRAINT `FK_posts_accounts`
    FOREIGN KEY (`createdByTeacher`) REFERENCES `accounts`(`accountID`);

ALTER TABLE `posts` ADD CONSTRAINT `FK_posts_modules`
    FOREIGN KEY (`concernedModule`) REFERENCES `modules`(`moduleID`);

ALTER TABLE `comments` ADD CONSTRAINT `FK_comments_accounts`
    FOREIGN KEY (`createdByAccount`) REFERENCES `accounts`(`accountID`);

ALTER TABLE `comments` ADD CONSTRAINT `FK_comments_posts`
    FOREIGN KEY (`concernedPost`) REFERENCES `posts`(`postID`);

ALTER TABLE `messages` ADD CONSTRAINT `FK_messages_accounts`
    FOREIGN KEY (`sendByStudent`) REFERENCES `accounts`(`accountID`);

ALTER TABLE `messages` ADD CONSTRAINT `FK_messages_discussions`
    FOREIGN KEY (`attachedDiscussion`) REFERENCES `discussions`(`discussionID`);

ALTER TABLE `discussion_member` ADD CONSTRAINT `FK_discussion_member_discussions`
    FOREIGN KEY (`concernedDiscussion`) REFERENCES `discussions`(`discussionID`);

ALTER TABLE `discussion_member` ADD CONSTRAINT `FK_discussionMembers_accounts`
    FOREIGN KEY (`studentMember`) REFERENCES `accounts`(`accountID`);