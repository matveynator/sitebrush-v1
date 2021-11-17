<?php


/**
 * Base class that represents a query for the 'language' table.
 *
 * 
 *
 * @method     LanguageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LanguageQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     LanguageQuery orderByRevision($order = Criteria::ASC) Order by the revision column
 * @method     LanguageQuery orderByDictionary($order = Criteria::ASC) Order by the dictionary column
 * @method     LanguageQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     LanguageQuery orderByDomain($order = Criteria::ASC) Order by the domain column
 *
 * @method     LanguageQuery groupById() Group by the id column
 * @method     LanguageQuery groupByCode() Group by the code column
 * @method     LanguageQuery groupByRevision() Group by the revision column
 * @method     LanguageQuery groupByDictionary() Group by the dictionary column
 * @method     LanguageQuery groupByStatus() Group by the status column
 * @method     LanguageQuery groupByDomain() Group by the domain column
 *
 * @method     LanguageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LanguageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LanguageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LanguageQuery leftJoinDomainLanguage($relationAlias = null) Adds a LEFT JOIN clause to the query using the DomainLanguage relation
 * @method     LanguageQuery rightJoinDomainLanguage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DomainLanguage relation
 * @method     LanguageQuery innerJoinDomainLanguage($relationAlias = null) Adds a INNER JOIN clause to the query using the DomainLanguage relation
 *
 * @method     Language findOne(PropelPDO $con = null) Return the first Language matching the query
 * @method     Language findOneOrCreate(PropelPDO $con = null) Return the first Language matching the query, or a new Language object populated from the query conditions when no match is found
 *
 * @method     Language findOneById(int $id) Return the first Language filtered by the id column
 * @method     Language findOneByCode(string $code) Return the first Language filtered by the code column
 * @method     Language findOneByRevision(int $revision) Return the first Language filtered by the revision column
 * @method     Language findOneByDictionary(string $dictionary) Return the first Language filtered by the dictionary column
 * @method     Language findOneByStatus(string $status) Return the first Language filtered by the status column
 * @method     Language findOneByDomain(string $domain) Return the first Language filtered by the domain column
 *
 * @method     array findById(int $id) Return Language objects filtered by the id column
 * @method     array findByCode(string $code) Return Language objects filtered by the code column
 * @method     array findByRevision(int $revision) Return Language objects filtered by the revision column
 * @method     array findByDictionary(string $dictionary) Return Language objects filtered by the dictionary column
 * @method     array findByStatus(string $status) Return Language objects filtered by the status column
 * @method     array findByDomain(string $domain) Return Language objects filtered by the domain column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseLanguageQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseLanguageQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'Language', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LanguageQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LanguageQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LanguageQuery) {
			return $criteria;
		}
		$query = new LanguageQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Language|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = LanguagePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LanguagePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LanguagePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LanguagePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function filterByCode($code = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($code)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $code)) {
				$code = str_replace('*', '%', $code);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LanguagePeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the revision column
	 * 
	 * @param     int|array $revision The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function filterByRevision($revision = null, $comparison = null)
	{
		if (is_array($revision)) {
			$useMinMax = false;
			if (isset($revision['min'])) {
				$this->addUsingAlias(LanguagePeer::REVISION, $revision['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($revision['max'])) {
				$this->addUsingAlias(LanguagePeer::REVISION, $revision['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LanguagePeer::REVISION, $revision, $comparison);
	}

	/**
	 * Filter the query on the dictionary column
	 * 
	 * @param     string $dictionary The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function filterByDictionary($dictionary = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($dictionary)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $dictionary)) {
				$dictionary = str_replace('*', '%', $dictionary);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LanguagePeer::DICTIONARY, $dictionary, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function filterByStatus($status = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($status)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $status)) {
				$status = str_replace('*', '%', $status);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LanguagePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the domain column
	 * 
	 * @param     string $domain The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function filterByDomain($domain = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($domain)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $domain)) {
				$domain = str_replace('*', '%', $domain);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LanguagePeer::DOMAIN, $domain, $comparison);
	}

	/**
	 * Filter the query by a related DomainLanguage object
	 *
	 * @param     DomainLanguage $domainLanguage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function filterByDomainLanguage($domainLanguage, $comparison = null)
	{
		if ($domainLanguage instanceof DomainLanguage) {
			return $this
				->addUsingAlias(LanguagePeer::ID, $domainLanguage->getLanguageId(), $comparison);
		} elseif ($domainLanguage instanceof PropelCollection) {
			return $this
				->useDomainLanguageQuery()
					->filterByPrimaryKeys($domainLanguage->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByDomainLanguage() only accepts arguments of type DomainLanguage or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the DomainLanguage relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function joinDomainLanguage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('DomainLanguage');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'DomainLanguage');
		}
		
		return $this;
	}

	/**
	 * Use the DomainLanguage relation DomainLanguage object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainLanguageQuery A secondary query class using the current class as primary query
	 */
	public function useDomainLanguageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDomainLanguage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'DomainLanguage', 'DomainLanguageQuery');
	}

	/**
	 * Filter the query by a related Domain object
	 * using the domain_language table as cross reference
	 *
	 * @param     Domain $domain the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function filterByDomain($domain, $comparison = Criteria::EQUAL)
	{
		return $this
			->useDomainLanguageQuery()
				->filterByDomain($domain, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Language $language Object to remove from the list of results
	 *
	 * @return    LanguageQuery The current query, for fluid interface
	 */
	public function prune($language = null)
	{
		if ($language) {
			$this->addUsingAlias(LanguagePeer::ID, $language->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseLanguageQuery
