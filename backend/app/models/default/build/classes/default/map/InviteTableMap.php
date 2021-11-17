<?php



/**
 * This class defines the structure of the 'invite' table.
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
class InviteTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.InviteTableMap';

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
		$this->setName('invite');
		$this->setPhpName('Invite');
		$this->setClassname('Invite');
		$this->setPackage('default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('HASH', 'Hash', 'VARCHAR', true, 255, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', false, 255, null);
		$this->addColumn('DOMAIN', 'Domain', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('UserInvite', 'UserInvite', RelationMap::ONE_TO_MANY, array('id' => 'invite_id', ), null, null);
    $this->addRelation('User', 'User', RelationMap::MANY_TO_MANY, array(), null, null);
	} // buildRelations()

} // InviteTableMap
