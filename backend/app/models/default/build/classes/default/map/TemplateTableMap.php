<?php



/**
 * This class defines the structure of the 'template' table.
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
class TemplateTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.TemplateTableMap';

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
		$this->setName('template');
		$this->setPhpName('Template');
		$this->setClassname('Template');
		$this->setPackage('default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'LONGVARCHAR', true, null, null);
		$this->addColumn('DATA', 'Data', 'CLOB', true, null, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', true, 255, null);
		$this->addColumn('DOMAIN', 'Domain', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('PostTemplate', 'PostTemplate', RelationMap::ONE_TO_MANY, array('id' => 'template_id', ), null, null);
    $this->addRelation('Post', 'Post', RelationMap::MANY_TO_MANY, array(), null, null);
	} // buildRelations()

} // TemplateTableMap
