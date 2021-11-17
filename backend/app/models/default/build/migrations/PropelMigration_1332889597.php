<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1332889597.
 * Generated on 2012-03-28 03:06:37 by root
 */
class PropelMigration_1332889597
{

	public function preUp($manager)
	{
		// add the pre-migration code here
	}

	public function postUp($manager)
	{
		// add the post-migration code here
	}

	public function preDown($manager)
	{
		// add the pre-migration code here
	}

	public function postDown($manager)
	{
		// add the post-migration code here
	}

	/**
	 * Get the SQL statements for the Up migration
	 *
	 * @return array list of the SQL strings to execute for the Up migration
	 *               the keys being the datasources
	 */
	public function getUpSQL()
	{
		return array (
  'brain' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `post_sbtemplate`;

RENAME TABLE `sbtemplate` TO `template`;

ALTER TABLE `group` CHANGE `date` `date` INTEGER(11) NOT NULL;

ALTER TABLE `post` CHANGE `oldid` `oldid` INTEGER(11) NOT NULL;

ALTER TABLE `post` CHANGE `ownerid` `ownerid` INTEGER(11) NOT NULL;

ALTER TABLE `post` CHANGE `deleterid` `deleterid` INTEGER(11) NOT NULL;

ALTER TABLE `post` CHANGE `date` `date` INTEGER(11) NOT NULL;

ALTER TABLE `post` CHANGE `lastcomment` `lastcomment` INTEGER(11) NOT NULL;

ALTER TABLE `post` CHANGE `version` `version` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `oldid` `oldid` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `avatarid` `avatarid` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `dateofregistration` `dateofregistration` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `dateofbirth` `dateofbirth` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `lastvisittime` `lastvisittime` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `grinvichtimeoffset` `grinvichtimeoffset` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `invitesammount` `invitesammount` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `quotabytesused` `quotabytesused` BIGINT(20);

ALTER TABLE `user` CHANGE `quotaoriginalsused` `quotaoriginalsused` BIGINT(20);

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

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

	/**
	 * Get the SQL statements for the Down migration
	 *
	 * @return array list of the SQL strings to execute for the Down migration
	 *               the keys being the datasources
	 */
	public function getDownSQL()
	{
		return array (
  'brain' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `post_template`;

RENAME TABLE `template` TO `sbtemplate`;

ALTER TABLE `group` CHANGE `date` `date` INTEGER NOT NULL;

ALTER TABLE `post` CHANGE `oldid` `oldid` INTEGER NOT NULL;

ALTER TABLE `post` CHANGE `ownerid` `ownerid` INTEGER NOT NULL;

ALTER TABLE `post` CHANGE `deleterid` `deleterid` INTEGER NOT NULL;

ALTER TABLE `post` CHANGE `date` `date` INTEGER NOT NULL;

ALTER TABLE `post` CHANGE `lastcomment` `lastcomment` INTEGER NOT NULL;

ALTER TABLE `post` CHANGE `version` `version` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `oldid` `oldid` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `avatarid` `avatarid` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `dateofregistration` `dateofregistration` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `dateofbirth` `dateofbirth` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `lastvisittime` `lastvisittime` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `grinvichtimeoffset` `grinvichtimeoffset` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `invitesammount` `invitesammount` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `quotabytesused` `quotabytesused` BIGINT;

ALTER TABLE `user` CHANGE `quotaoriginalsused` `quotaoriginalsused` BIGINT;

CREATE TABLE `post_sbtemplate`
(
	`post_id` INTEGER NOT NULL,
	`sbtemplate_id` INTEGER NOT NULL,
	PRIMARY KEY (`post_id`,`sbtemplate_id`),
	INDEX `post_sbtemplate_FI_2` (`sbtemplate_id`),
	CONSTRAINT `post_sbtemplate_FK_1`
		FOREIGN KEY (`post_id`)
		REFERENCES `post` (`id`),
	CONSTRAINT `post_sbtemplate_FK_2`
		FOREIGN KEY (`sbtemplate_id`)
		REFERENCES `sbtemplate` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}