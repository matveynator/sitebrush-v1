<?php



/**
 * This class defines the structure of the 'user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.default.map
 */
class UserTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.UserTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('user');
		$this->setPhpName('User');
		$this->setClassname('User');
		$this->setPackage('default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('SESSIONID', 'SessionId', 'VARCHAR', true, 255, null);
		$this->addColumn('OLDID', 'OldId', 'INTEGER', true, 11, null);
		$this->addColumn('AVATARID', 'AvatarId', 'INTEGER', true, 11, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 255, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 255, null);
		$this->addColumn('NICKNAME', 'NickName', 'VARCHAR', true, 255, null);
		$this->addColumn('FIRSTNAME', 'FirstName', 'VARCHAR', true, 255, null);
		$this->addColumn('LASTNAME', 'LastName', 'VARCHAR', true, 255, null);
		$this->addColumn('GENDER', 'Gender', 'VARCHAR', true, 255, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', true, 255, null);
		$this->addColumn('DATEOFREGISTRATION', 'DateOfRegistration', 'INTEGER', true, 11, null);
		$this->addColumn('DATEOFBIRTH', 'DateOfBirth', 'INTEGER', true, 11, null);
		$this->addColumn('LASTVISITTIME', 'LastVisitTime', 'INTEGER', true, 11, null);
		$this->addColumn('GRINVICHTIMEOFFSET', 'GrinvichTimeOffset', 'INTEGER', true, 11, null);
		$this->addColumn('ACTIVATED', 'Activated', 'VARCHAR', true, 255, null);
		$this->addColumn('VERIFICATIONCODE', 'VerificationCode', 'VARCHAR', true, 255, null);
		$this->addColumn('DOMAIN', 'Domain', 'VARCHAR', true, 255, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', true, 255, null);
		$this->addColumn('LANGUAGE', 'Language', 'VARCHAR', true, 255, null);
		$this->addColumn('CURRENTIP', 'CurrentIp', 'VARCHAR', true, 255, null);
		$this->addColumn('AUTOGRAB', 'AutoGrab', 'VARCHAR', true, 255, null);
		$this->addColumn('DOMAINTOGRAB', 'DomainToGrab', 'VARCHAR', true, 255, null);
		$this->addColumn('PROFILE', 'Profile', 'CLOB', true, null, null);
		$this->addColumn('PREFERENCES', 'Preferences', 'CLOB', true, null, null);
		$this->addColumn('SECURITYLOG', 'SecurityLog', 'CLOB', true, null, null);
		$this->addColumn('INVITEDBY', 'InvitedBy', 'VARCHAR', true, 255, null);
		$this->addColumn('INVITESAMMOUNT', 'InvitesAmmount', 'INTEGER', true, 11, null);
		$this->addColumn('QUOTABYTES', 'QuotaBytes', 'VARCHAR', false, 255, null);
		$this->addColumn('QUOTAORIGINALS', 'QuotaOriginals', 'VARCHAR', false, 255, null);
		$this->addColumn('QUOTABYTESUSED', 'QuotaBytesUsed', 'BIGINT', false, 20, null);
		$this->addColumn('QUOTAORIGINALSUSED', 'QuotaOriginalsUsed', 'BIGINT', false, 20, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('UserGroup', 'UserGroup', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null);
    $this->addRelation('UserInvite', 'UserInvite', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null);
    $this->addRelation('UserPost', 'UserPost', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null);
    $this->addRelation('UserMessage', 'UserMessage', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null);
    $this->addRelation('UserMedia', 'UserMedia', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null);
    $this->addRelation('Group', 'Group', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Invite', 'Invite', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Post', 'Post', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Message', 'Message', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Media', 'Media', RelationMap::MANY_TO_MANY, array(), null, null);
	} // buildRelations()

} // UserTableMap
