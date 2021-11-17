<?php



/**
 * This class defines the structure of the 'domain_language' table.
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
class DomainLanguageTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'default.map.DomainLanguageTableMap';

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
		$this->setName('domain_language');
		$this->setPhpName('DomainLanguage');
		$this->setClassname('DomainLanguage');
		$this->setPackage('default');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('DOMAIN_ID', 'DomainId', 'INTEGER' , 'domain', 'ID', true, null, null);
		$this->addForeignPrimaryKey('LANGUAGE_ID', 'LanguageId', 'INTEGER' , 'language', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Domain', 'Domain', RelationMap::MANY_TO_ONE, array('domain_id' => 'id', ), null, null);
    $this->addRelation('Language', 'Language', RelationMap::MANY_TO_ONE, array('language_id' => 'id', ), null, null);
	} // buildRelations()

} // DomainLanguageTableMap
