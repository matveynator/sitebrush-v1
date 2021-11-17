<?php



/**
 * This class defines the structure of the 'group' table.
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
class GroupTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.GroupTableMap';

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
		$this->setName('group');
		$this->setPhpName('Group');
		$this->setClassname('Group');
		$this->setPackage('default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('OWNER_ID', 'OwnerId', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('TITLE', 'Title', 'CLOB', true, null, null);
		$this->addColumn('COMMENT', 'Comment', 'CLOB', true, null, null);
		$this->addColumn('DATE', 'Date', 'INTEGER', true, 11, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', false, 255, null);
		$this->addColumn('DOMAIN', 'Domain', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('UserGroup', 'UserGroup', RelationMap::ONE_TO_MANY, array('id' => 'group_id', ), null, null);
    $this->addRelation('GroupPost', 'GroupPost', RelationMap::ONE_TO_MANY, array('id' => 'group_id', ), null, null);
    $this->addRelation('GroupMessage', 'GroupMessage', RelationMap::ONE_TO_MANY, array('id' => 'group_id', ), null, null);
    $this->addRelation('GroupMedia', 'GroupMedia', RelationMap::ONE_TO_MANY, array('id' => 'group_id', ), null, null);
    $this->addRelation('User', 'User', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Post', 'Post', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Message', 'Message', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Media', 'Media', RelationMap::MANY_TO_MANY, array(), null, null);
	} // buildRelations()

} // GroupTableMap
