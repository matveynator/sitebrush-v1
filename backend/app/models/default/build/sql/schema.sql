
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`sessionid` VARCHAR(255) NOT NULL,
	`oldid` INTEGER(11) NOT NULL,
	`avatarid` INTEGER(11) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`nickname` VARCHAR(255) NOT NULL,
	`firstname` VARCHAR(255) NOT NULL,
	`lastname` VARCHAR(255) NOT NULL,
	`gender` VARCHAR(255) NOT NULL,
	`phone` VARCHAR(255) NOT NULL,
	`dateofregistration` INTEGER(11) NOT NULL,
	`dateofbirth` INTEGER(11) NOT NULL,
	`lastvisittime` INTEGER(11) NOT NULL,
	`grinvichtimeoffset` INTEGER(11) NOT NULL,
	`activated` VARCHAR(255) NOT NULL,
	`verificationcode` VARCHAR(255) NOT NULL,
	`domain` VARCHAR(255) NOT NULL,
	`status` VARCHAR(255) NOT NULL,
	`language` VARCHAR(255) NOT NULL,
	`currentip` VARCHAR(255) NOT NULL,
	`autograb` VARCHAR(255) NOT NULL,
	`domaintograb` VARCHAR(255) NOT NULL,
	`profile` LONGTEXT NOT NULL,
	`preferences` LONGTEXT NOT NULL,
	`securitylog` LONGTEXT NOT NULL,
	`invitedby` VARCHAR(255) NOT NULL,
	`invitesammount` INTEGER(11) NOT NULL,
	`quotabytes` VARCHAR(255),
	`quotaoriginals` VARCHAR(255),
	`quotabytesused` BIGINT(20),
	`quotaoriginalsused` BIGINT(20),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`owner_id` INTEGER NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`title` LONGTEXT NOT NULL,
	`comment` LONGTEXT NOT NULL,
	`date` INTEGER(11) NOT NULL,
	`status` VARCHAR(255),
	`domain` VARCHAR(255),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- invite
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `invite`;

CREATE TABLE `invite`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`hash` VARCHAR(255) NOT NULL,
	`status` VARCHAR(255),
	`domain` VARCHAR(255),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- post
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`ownerid` INTEGER(11) NOT NULL,
	`deleterid` INTEGER(11) NOT NULL,
	`requesturi` TEXT,
	`type` VARCHAR(255) NOT NULL,
	`date` INTEGER(11) NOT NULL,
	`title` TEXT NOT NULL,
	`text` LONGTEXT NOT NULL,
	`shorttext` LONGTEXT NOT NULL,
	`tags` TEXT NOT NULL,
	`version` INTEGER(11) NOT NULL,
	`domain` TEXT NOT NULL,
	`published` VARCHAR(255) NOT NULL,
	`status` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- message
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`to` INTEGER,
	`from` INTEGER,
	`nickname` TEXT,
	`order` LONGTEXT,
	`date` INTEGER NOT NULL,
	`subject` LONGTEXT,
	`text` LONGTEXT NOT NULL,
	`type` VARCHAR(255) NOT NULL,
	`unread` TINYINT,
	`status` VARCHAR(255) NOT NULL,
	`domain` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- media
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`type` VARCHAR(255) NOT NULL,
	`hash` VARCHAR(255) NOT NULL,
	`originalhash` VARCHAR(255) NOT NULL,
	`format` VARCHAR(255) NOT NULL,
	`width` VARCHAR(255) NOT NULL,
	`height` VARCHAR(255) NOT NULL,
	`status` VARCHAR(255) NOT NULL,
	`domain` VARCHAR(255) NOT NULL,
	`day` INTEGER NOT NULL,
	`date` INTEGER NOT NULL,
	`sizesarray` LONGTEXT NOT NULL,
	`rating` FLOAT NOT NULL,
	`ratingcount` INTEGER NOT NULL,
	`ratingip` LONGTEXT NOT NULL,
	`views` INTEGER NOT NULL,
	`bytesused` INTEGER NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- template
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `template`;

CREATE TABLE `template`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` TEXT NOT NULL,
	`data` LONGTEXT NOT NULL,
	`status` VARCHAR(255) NOT NULL,
	`domain` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- domain
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `domain`;

CREATE TABLE `domain`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` TEXT NOT NULL,
	`dnszonedata` TEXT NOT NULL,
	`cnamesecret` VARCHAR(255) NOT NULL,
	`emailsecret` VARCHAR(255) NOT NULL,
	`freezed` INTEGER NOT NULL,
	`status` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- language
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(255) NOT NULL,
	`revision` INTEGER NOT NULL,
	`dictionary` LONGTEXT NOT NULL,
	`status` VARCHAR(255) NOT NULL,
	`domain` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- uri
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `uri`;

CREATE TABLE `uri`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`olduri` VARCHAR(255) NOT NULL,
	`newuri` VARCHAR(255) NOT NULL,
	`date` INTEGER NOT NULL,
	`status` VARCHAR(255),
	`domain` VARCHAR(255),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- user_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group`
(
	`user_id` INTEGER NOT NULL,
	`group_id` INTEGER NOT NULL,
	PRIMARY KEY (`user_id`,`group_id`),
	INDEX `user_group_FI_2` (`group_id`),
	CONSTRAINT `user_group_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`),
	CONSTRAINT `user_group_FK_2`
		FOREIGN KEY (`group_id`)
		REFERENCES `group` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user_invite
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_invite`;

CREATE TABLE `user_invite`
(
	`user_id` INTEGER NOT NULL,
	`invite_id` INTEGER NOT NULL,
	PRIMARY KEY (`user_id`,`invite_id`),
	INDEX `user_invite_FI_2` (`invite_id`),
	CONSTRAINT `user_invite_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`),
	CONSTRAINT `user_invite_FK_2`
		FOREIGN KEY (`invite_id`)
		REFERENCES `invite` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user_post
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_post`;

CREATE TABLE `user_post`
(
	`user_id` INTEGER NOT NULL,
	`post_id` INTEGER NOT NULL,
	PRIMARY KEY (`user_id`,`post_id`),
	INDEX `user_post_FI_2` (`post_id`),
	CONSTRAINT `user_post_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`),
	CONSTRAINT `user_post_FK_2`
		FOREIGN KEY (`post_id`)
		REFERENCES `post` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user_message
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_message`;

CREATE TABLE `user_message`
(
	`user_id` INTEGER NOT NULL,
	`message_id` INTEGER NOT NULL,
	PRIMARY KEY (`user_id`,`message_id`),
	INDEX `user_message_FI_2` (`message_id`),
	CONSTRAINT `user_message_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`),
	CONSTRAINT `user_message_FK_2`
		FOREIGN KEY (`message_id`)
		REFERENCES `message` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user_media
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_media`;

CREATE TABLE `user_media`
(
	`user_id` INTEGER NOT NULL,
	`media_id` INTEGER NOT NULL,
	PRIMARY KEY (`user_id`,`media_id`),
	INDEX `user_media_FI_2` (`media_id`),
	CONSTRAINT `user_media_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`),
	CONSTRAINT `user_media_FK_2`
		FOREIGN KEY (`media_id`)
		REFERENCES `media` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- group_post
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `group_post`;

CREATE TABLE `group_post`
(
	`group_id` INTEGER NOT NULL,
	`post_id` INTEGER NOT NULL,
	PRIMARY KEY (`group_id`,`post_id`),
	INDEX `group_post_FI_2` (`post_id`),
	CONSTRAINT `group_post_FK_1`
		FOREIGN KEY (`group_id`)
		REFERENCES `group` (`id`),
	CONSTRAINT `group_post_FK_2`
		FOREIGN KEY (`post_id`)
		REFERENCES `post` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- group_message
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `group_message`;

CREATE TABLE `group_message`
(
	`group_id` INTEGER NOT NULL,
	`message_id` INTEGER NOT NULL,
	PRIMARY KEY (`group_id`,`message_id`),
	INDEX `group_message_FI_2` (`message_id`),
	CONSTRAINT `group_message_FK_1`
		FOREIGN KEY (`group_id`)
		REFERENCES `group` (`id`),
	CONSTRAINT `group_message_FK_2`
		FOREIGN KEY (`message_id`)
		REFERENCES `message` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- group_media
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `group_media`;

CREATE TABLE `group_media`
(
	`group_id` INTEGER NOT NULL,
	`media_id` INTEGER NOT NULL,
	PRIMARY KEY (`group_id`,`media_id`),
	INDEX `group_media_FI_2` (`media_id`),
	CONSTRAINT `group_media_FK_1`
		FOREIGN KEY (`group_id`)
		REFERENCES `group` (`id`),
	CONSTRAINT `group_media_FK_2`
		FOREIGN KEY (`media_id`)
		REFERENCES `media` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- post_message
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `post_message`;

CREATE TABLE `post_message`
(
	`post_id` INTEGER NOT NULL,
	`message_id` INTEGER NOT NULL,
	PRIMARY KEY (`post_id`,`message_id`),
	INDEX `post_message_FI_2` (`message_id`),
	CONSTRAINT `post_message_FK_1`
		FOREIGN KEY (`post_id`)
		REFERENCES `post` (`id`),
	CONSTRAINT `post_message_FK_2`
		FOREIGN KEY (`message_id`)
		REFERENCES `message` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- post_media
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `post_media`;

CREATE TABLE `post_media`
(
	`post_id` INTEGER NOT NULL,
	`media_id` INTEGER NOT NULL,
	PRIMARY KEY (`post_id`,`media_id`),
	INDEX `post_media_FI_2` (`media_id`),
	CONSTRAINT `post_media_FK_1`
		FOREIGN KEY (`post_id`)
		REFERENCES `post` (`id`),
	CONSTRAINT `post_media_FK_2`
		FOREIGN KEY (`media_id`)
		REFERENCES `media` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- post_template
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `post_template`;

CREATE TABLE `post_template`
(
	`post_id` INTEGER NOT NULL,
	`template_id` INTEGER NOT NULL,
	PRIMARY KEY (`post_id`,`template_id`),
	INDEX `post_template_FI_2` (`template_id`),
	CONSTRAINT `post_template_FK_1`
		FOREIGN KEY (`post_id`)
		REFERENCES `post` (`id`),
	CONSTRAINT `post_template_FK_2`
		FOREIGN KEY (`template_id`)
		REFERENCES `template` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- message_media
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `message_media`;

CREATE TABLE `message_media`
(
	`message_id` INTEGER NOT NULL,
	`media_id` INTEGER NOT NULL,
	PRIMARY KEY (`message_id`,`media_id`),
	INDEX `message_media_FI_2` (`media_id`),
	CONSTRAINT `message_media_FK_1`
		FOREIGN KEY (`message_id`)
		REFERENCES `message` (`id`),
	CONSTRAINT `message_media_FK_2`
		FOREIGN KEY (`media_id`)
		REFERENCES `media` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- domain_language
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `domain_language`;

CREATE TABLE `domain_language`
(
	`domain_id` INTEGER NOT NULL,
	`language_id` INTEGER NOT NULL,
	PRIMARY KEY (`domain_id`,`language_id`),
	INDEX `domain_language_FI_2` (`language_id`),
	CONSTRAINT `domain_language_FK_1`
		FOREIGN KEY (`domain_id`)
		REFERENCES `domain` (`id`),
	CONSTRAINT `domain_language_FK_2`
		FOREIGN KEY (`language_id`)
		REFERENCES `language` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
