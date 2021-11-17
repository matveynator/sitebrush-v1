<?php



/**
 * This class defines the structure of the 'media' table.
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
class MediaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.MediaTableMap';

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
		$this->setName('media');
		$this->setPhpName('Media');
		$this->setClassname('Media');
		$this->setPackage('default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('TYPE', 'Type', 'VARCHAR', true, 255, null);
		$this->addColumn('HASH', 'Hash', 'VARCHAR', true, 255, null);
		$this->addColumn('ORIGINALHASH', 'OriginalHash', 'VARCHAR', true, 255, null);
		$this->addColumn('FORMAT', 'Format', 'VARCHAR', true, 255, null);
		$this->addColumn('WIDTH', 'Width', 'VARCHAR', true, 255, null);
		$this->addColumn('HEIGHT', 'Height', 'VARCHAR', true, 255, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', true, 255, null);
		$this->addColumn('DOMAIN', 'Domain', 'VARCHAR', true, 255, null);
		$this->addColumn('DAY', 'Day', 'INTEGER', true, null, null);
		$this->addColumn('DATE', 'Date', 'INTEGER', true, null, null);
		$this->addColumn('SIZESARRAY', 'SizesArray', 'CLOB', true, null, null);
		$this->addColumn('RATING', 'Rating', 'FLOAT', true, null, null);
		$this->addColumn('RATINGCOUNT', 'RatingCount', 'INTEGER', true, null, null);
		$this->addColumn('RATINGIP', 'RatingIp', 'CLOB', true, null, null);
		$this->addColumn('VIEWS', 'Views', 'INTEGER', true, null, null);
		$this->addColumn('BYTESUSED', 'BytesUsed', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('UserMedia', 'UserMedia', RelationMap::ONE_TO_MANY, array('id' => 'media_id', ), null, null);
    $this->addRelation('GroupMedia', 'GroupMedia', RelationMap::ONE_TO_MANY, array('id' => 'media_id', ), null, null);
    $this->addRelation('PostMedia', 'PostMedia', RelationMap::ONE_TO_MANY, array('id' => 'media_id', ), null, null);
    $this->addRelation('MessageMedia', 'MessageMedia', RelationMap::ONE_TO_MANY, array('id' => 'media_id', ), null, null);
    $this->addRelation('User', 'User', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Group', 'Group', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Post', 'Post', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Message', 'Message', RelationMap::MANY_TO_MANY, array(), null, null);
	} // buildRelations()

} // MediaTableMap
