<?php



/**
 * This class defines the structure of the 'group_media' table.
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
class GroupMediaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.GroupMediaTableMap';

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
		$this->setName('group_media');
		$this->setPhpName('GroupMedia');
		$this->setClassname('GroupMedia');
		$this->setPackage('default');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('GROUP_ID', 'GroupId', 'INTEGER' , 'group', 'ID', true, null, null);
		$this->addForeignPrimaryKey('MEDIA_ID', 'MediaId', 'INTEGER' , 'media', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Group', 'Group', RelationMap::MANY_TO_ONE, array('group_id' => 'id', ), null, null);
    $this->addRelation('Media', 'Media', RelationMap::MANY_TO_ONE, array('media_id' => 'id', ), null, null);
	} // buildRelations()

} // GroupMediaTableMap
