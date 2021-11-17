<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1333581982.
 * Generated on 2012-04-05 03:26:22 by root
 */
class PropelMigration_1333581982
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

ALTER TABLE `group` CHANGE `date` `date` INTEGER(11) NOT NULL;

ALTER TABLE `post` CHANGE `ownerid` `ownerid` INTEGER(11) NOT NULL;

ALTER TABLE `post` CHANGE `deleterid` `deleterid` INTEGER(11) NOT NULL;

ALTER TABLE `post` CHANGE `date` `date` INTEGER(11) NOT NULL;

ALTER TABLE `post` CHANGE `version` `version` INTEGER(11) NOT NULL;

ALTER TABLE `post` ADD
(
	`published` VARCHAR(255) NOT NULL
);

ALTER TABLE `post` DROP `oldid`;

ALTER TABLE `post` DROP `lastcomment`;

ALTER TABLE `post` DROP `language`;

ALTER TABLE `post` DROP `showonfirst`;

ALTER TABLE `post` DROP `optionalinformation`;

ALTER TABLE `post` DROP `motd`;

ALTER TABLE `post` DROP `music`;

ALTER TABLE `post` DROP `mood`;

ALTER TABLE `user` CHANGE `oldid` `oldid` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `avatarid` `avatarid` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `dateofregistration` `dateofregistration` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `dateofbirth` `dateofbirth` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `lastvisittime` `lastvisittime` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `grinvichtimeoffset` `grinvichtimeoffset` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `invitesammount` `invitesammount` INTEGER(11) NOT NULL;

ALTER TABLE `user` CHANGE `quotabytesused` `quotabytesused` BIGINT(20);

ALTER TABLE `user` CHANGE `quotaoriginalsused` `quotaoriginalsused` BIGINT(20);

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

ALTER TABLE `group` CHANGE `date` `date` INTEGER NOT NULL;

ALTER TABLE `post` CHANGE `ownerid` `ownerid` INTEGER NOT NULL;

ALTER TABLE `post` CHANGE `deleterid` `deleterid` INTEGER NOT NULL;

ALTER TABLE `post` CHANGE `date` `date` INTEGER NOT NULL;

ALTER TABLE `post` CHANGE `version` `version` INTEGER NOT NULL;

ALTER TABLE `post` ADD
(
	`oldid` INTEGER NOT NULL,
	`lastcomment` INTEGER NOT NULL,
	`language` VARCHAR(255),
	`showonfirst` VARCHAR(255),
	`optionalinformation` LONGTEXT,
	`motd` VARCHAR(255),
	`music` TEXT,
	`mood` TEXT
);

ALTER TABLE `post` DROP `published`;

ALTER TABLE `user` CHANGE `oldid` `oldid` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `avatarid` `avatarid` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `dateofregistration` `dateofregistration` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `dateofbirth` `dateofbirth` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `lastvisittime` `lastvisittime` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `grinvichtimeoffset` `grinvichtimeoffset` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `invitesammount` `invitesammount` INTEGER NOT NULL;

ALTER TABLE `user` CHANGE `quotabytesused` `quotabytesused` BIGINT;

ALTER TABLE `user` CHANGE `quotaoriginalsused` `quotaoriginalsused` BIGINT;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}