<?php



/**
 * This class defines the structure of the 'group_message' table.
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
class GroupMessageTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.GroupMessageTableMap';

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
		$this->setName('group_message');
		$this->setPhpName('GroupMessage');
		$this->setClassname('GroupMessage');
		$this->setPackage('default');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('GROUP_ID', 'GroupId', 'INTEGER' , 'group', 'ID', true, null, null);
		$this->addForeignPrimaryKey('MESSAGE_ID', 'MessageId', 'INTEGER' , 'message', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Group', 'Group', RelationMap::MANY_TO_ONE, array('group_id' => 'id', ), null, null);
    $this->addRelation('Message', 'Message', RelationMap::MANY_TO_ONE, array('message_id' => 'id', ), null, null);
	} // buildRelations()

} // GroupMessageTableMap
