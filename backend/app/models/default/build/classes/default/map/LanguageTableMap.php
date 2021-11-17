<?php



/**
 * This class defines the structure of the 'language' table.
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
class LanguageTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.LanguageTableMap';

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
		$this->setName('language');
		$this->setPhpName('Language');
		$this->setClassname('Language');
		$this->setPackage('default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CODE', 'Code', 'VARCHAR', true, 255, null);
		$this->addColumn('REVISION', 'Revision', 'INTEGER', true, null, null);
		$this->addColumn('DICTIONARY', 'Dictionary', 'CLOB', true, null, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', true, 255, null);
		$this->addColumn('DOMAIN', 'Domain', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('DomainLanguage', 'DomainLanguage', RelationMap::ONE_TO_MANY, array('id' => 'language_id', ), null, null);
    $this->addRelation('Domain', 'Domain', RelationMap::MANY_TO_MANY, array(), null, null);
	} // buildRelations()

} // LanguageTableMap
