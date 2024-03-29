SET character_set_client = utf8;

CREATE USER IF NOT EXISTS 'sitebrush'@'localhost' IDENTIFIED BY 'password'; 
GRANT ALL PRIVILEGES ON *.* TO 'sitebrush'@'localhost'; 
FLUSH PRIVILEGES;


CREATE DATABASE IF NOT EXISTS `sitebrush`;
USE `sitebrush`;

CREATE TABLE IF NOT EXISTS `domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `dnszonedata` text DEFAULT NULL,
  `cnamesecret` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `emailsecret` varchar(255) DEFAULT NULL,
  `freezed` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` longtext DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81325 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `invite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `revision` int(11) DEFAULT NULL,
  `dictionary` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `originalhash` varchar(255) DEFAULT NULL,
  `format` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `sizesarray` longtext DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `ratingcount` int(11) DEFAULT NULL,
  `ratingip` longtext DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `bytesused` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55214 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to` int(11) DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `nickname` text,
  `order` longtext,
  `date` int(11) DEFAULT NULL,
  `subject` longtext,
  `text` longtext DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `unread` tinyint(4) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerid` int(11) DEFAULT NULL,
  `deleterid` int(11) DEFAULT NULL,
  `requesturi` text,
  `type` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `shorttext` longtext DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `version` int(11) DEFAULT NULL,
  `domain` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `published` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19706 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `uri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `olduri` varchar(255) DEFAULT NULL,
  `newuri` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sessionid` varchar(255) DEFAULT NULL,
  `oldid` int(11) DEFAULT NULL,
  `avatarid` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dateofregistration` int(11) DEFAULT NULL,
  `dateofbirth` int(11) DEFAULT NULL,
  `lastvisittime` int(11) DEFAULT NULL,
  `grinvichtimeoffset` int(11) DEFAULT NULL,
  `activated` varchar(255) DEFAULT NULL,
  `verificationcode` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `currentip` varchar(255) DEFAULT NULL,
  `profile` longtext DEFAULT NULL,
  `preferences` longtext DEFAULT NULL,
  `securitylog` longtext DEFAULT NULL,
  `invitedby` varchar(255) DEFAULT NULL,
  `invitesammount` int(11) DEFAULT NULL,
  `quotabytes` varchar(255) DEFAULT NULL,
  `quotaoriginals` varchar(255) DEFAULT NULL,
  `quotabytesused` bigint(20) DEFAULT NULL,
  `quotaoriginalsused` bigint(20) DEFAULT NULL,
  `autograb` varchar(255) DEFAULT NULL,
  `domaintograb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `data` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `domain_language` (
  `domain_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`domain_id`,`language_id`),
  KEY `domain_language_FI_2` (`language_id`),
  CONSTRAINT `domain_language_FK_1` FOREIGN KEY (`domain_id`) REFERENCES `domain` (`id`),
  CONSTRAINT `domain_language_FK_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `group_media` (
  `group_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`,`media_id`),
  KEY `group_media_FI_2` (`media_id`),
  CONSTRAINT `group_media_FK_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`),
  CONSTRAINT `group_media_FK_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `group_message` (
  `group_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`,`message_id`),
  KEY `group_message_FI_2` (`message_id`),
  CONSTRAINT `group_message_FK_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`),
  CONSTRAINT `group_message_FK_2` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `group_post` (
  `group_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`,`post_id`),
  KEY `group_post_FI_2` (`post_id`),
  CONSTRAINT `group_post_FK_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`),
  CONSTRAINT `group_post_FK_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `message_media` (
  `message_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`,`media_id`),
  KEY `message_media_FI_2` (`media_id`),
  CONSTRAINT `message_media_FK_1` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`),
  CONSTRAINT `message_media_FK_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `post_media` (
  `post_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`,`media_id`),
  KEY `post_media_FI_2` (`media_id`),
  CONSTRAINT `post_media_FK_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  CONSTRAINT `post_media_FK_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `post_message` (
  `post_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`,`message_id`),
  KEY `post_message_FI_2` (`message_id`),
  CONSTRAINT `post_message_FK_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  CONSTRAINT `post_message_FK_2` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `post_template` (
  `post_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`,`template_id`),
  KEY `post_template_FI_2` (`template_id`),
  CONSTRAINT `post_template_FK_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  CONSTRAINT `post_template_FK_2` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `propel_migration` (
  `version` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user_group` (
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `user_group_FI_2` (`group_id`),
  CONSTRAINT `user_group_FK_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_group_FK_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user_invite` (
  `user_id` int(11) DEFAULT NULL,
  `invite_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`invite_id`),
  KEY `user_invite_FI_2` (`invite_id`),
  CONSTRAINT `user_invite_FK_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_invite_FK_2` FOREIGN KEY (`invite_id`) REFERENCES `invite` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user_media` (
  `user_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`media_id`),
  KEY `user_media_FI_2` (`media_id`),
  CONSTRAINT `user_media_FK_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_media_FK_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user_message` (
  `user_id` int(11) DEFAULT NULL,
  `message_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`message_id`),
  KEY `user_message_FI_2` (`message_id`),
  CONSTRAINT `user_message_FK_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_message_FK_2` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user_post` (
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`post_id`),
  KEY `user_post_FI_2` (`post_id`),
  CONSTRAINT `user_post_FK_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_post_FK_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
