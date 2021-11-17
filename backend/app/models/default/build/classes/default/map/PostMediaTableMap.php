<?php



/**
 * This class defines the structure of the 'post_media' table.
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
class PostMediaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.PostMediaTableMap';

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
		$this->setName('post_media');
		$this->setPhpName('PostMedia');
		$this->setClassname('PostMedia');
		$this->setPackage('default');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('POST_ID', 'PostId', 'INTEGER' , 'post', 'ID', true, null, null);
		$this->addForeignPrimaryKey('MEDIA_ID', 'MediaId', 'INTEGER' , 'media', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Post', 'Post', RelationMap::MANY_TO_ONE, array('post_id' => 'id', ), null, null);
    $this->addRelation('Media', 'Media', RelationMap::MANY_TO_ONE, array('media_id' => 'id', ), null, null);
	} // buildRelations()

} // PostMediaTableMap
