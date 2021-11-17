<?php



/**
 * This class defines the structure of the 'post' table.
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
class PostTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.PostTableMap';

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
		$this->setName('post');
		$this->setPhpName('Post');
		$this->setClassname('Post');
		$this->setPackage('default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('OWNERID', 'OwnerId', 'INTEGER', true, 11, null);
		$this->addColumn('DELETERID', 'DeleterId', 'INTEGER', true, 11, null);
		$this->addColumn('REQUESTURI', 'RequestUri', 'LONGVARCHAR', false, null, null);
		$this->addColumn('TYPE', 'Type', 'VARCHAR', true, 255, null);
		$this->addColumn('DATE', 'Date', 'INTEGER', true, 11, null);
		$this->addColumn('TITLE', 'Title', 'LONGVARCHAR', true, null, null);
		$this->addColumn('TEXT', 'Text', 'CLOB', true, null, null);
		$this->addColumn('SHORTTEXT', 'ShortText', 'CLOB', true, null, null);
		$this->addColumn('TAGS', 'Tags', 'LONGVARCHAR', true, null, null);
		$this->addColumn('VERSION', 'Version', 'INTEGER', true, 11, null);
		$this->addColumn('DOMAIN', 'Domain', 'LONGVARCHAR', true, null, null);
		$this->addColumn('PUBLISHED', 'Published', 'VARCHAR', true, 255, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('UserPost', 'UserPost', RelationMap::ONE_TO_MANY, array('id' => 'post_id', ), null, null);
    $this->addRelation('GroupPost', 'GroupPost', RelationMap::ONE_TO_MANY, array('id' => 'post_id', ), null, null);
    $this->addRelation('PostMessage', 'PostMessage', RelationMap::ONE_TO_MANY, array('id' => 'post_id', ), null, null);
    $this->addRelation('PostMedia', 'PostMedia', RelationMap::ONE_TO_MANY, array('id' => 'post_id', ), null, null);
    $this->addRelation('PostTemplate', 'PostTemplate', RelationMap::ONE_TO_MANY, array('id' => 'post_id', ), null, null);
    $this->addRelation('User', 'User', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Group', 'Group', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Message', 'Message', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Media', 'Media', RelationMap::MANY_TO_MANY, array(), null, null);
    $this->addRelation('Template', 'Template', RelationMap::MANY_TO_MANY, array(), null, null);
	} // buildRelations()

} // PostTableMap
