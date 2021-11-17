<?php


/**
 * Base class that represents a query for the 'domain_language' table.
 *
 * 
 *
 * @method     DomainLanguageQuery orderByDomainId($order = Criteria::ASC) Order by the domain_id column
 * @method     DomainLanguageQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 *
 * @method     DomainLanguageQuery groupByDomainId() Group by the domain_id column
 * @method     DomainLanguageQuery groupByLanguageId() Group by the language_id column
 *
 * @method     DomainLanguageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DomainLanguageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DomainLanguageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DomainLanguageQuery leftJoinDomain($relationAlias = null) Adds a LEFT JOIN clause to the query using the Domain relation
 * @method     DomainLanguageQuery rightJoinDomain($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Domain relation
 * @method     DomainLanguageQuery innerJoinDomain($relationAlias = null) Adds a INNER JOIN clause to the query using the Domain relation
 *
 * @method     DomainLanguageQuery leftJoinLanguage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Language relation
 * @method     DomainLanguageQuery rightJoinLanguage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Language relation
 * @method     DomainLanguageQuery innerJoinLanguage($relationAlias = null) Adds a INNER JOIN clause to the query using the Language relation
 *
 * @method     DomainLanguage findOne(PropelPDO $con = null) Return the first DomainLanguage matching the query
 * @method     DomainLanguage findOneOrCreate(PropelPDO $con = null) Return the first DomainLanguage matching the query, or a new DomainLanguage object populated from the query conditions when no match is found
 *
 * @method     DomainLanguage findOneByDomainId(int $domain_id) Return the first DomainLanguage filtered by the domain_id column
 * @method     DomainLanguage findOneByLanguageId(int $language_id) Return the first DomainLanguage filtered by the language_id column
 *
 * @method     array findByDomainId(int $domain_id) Return DomainLanguage objects filtered by the domain_id column
 * @method     array findByLanguageId(int $language_id) Return DomainLanguage objects filtered by the language_id column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseDomainLanguageQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseDomainLanguageQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'DomainLanguage', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DomainLanguageQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DomainLanguageQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DomainLanguageQuery) {
			return $criteria;
		}
		$query = new DomainLanguageQuery();
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
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$domain_id, $language_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    DomainLanguage|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = DomainLanguagePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    DomainLanguageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(DomainLanguagePeer::DOMAIN_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(DomainLanguagePeer::LANGUAGE_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DomainLanguageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(DomainLanguagePeer::DOMAIN_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(DomainLanguagePeer::LANGUAGE_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the domain_id column
	 * 
	 * @param     int|array $domainId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainLanguageQuery The current query, for fluid interface
	 */
	public function filterByDomainId($domainId = null, $comparison = null)
	{
		if (is_array($domainId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DomainLanguagePeer::DOMAIN_ID, $domainId, $comparison);
	}

	/**
	 * Filter the query on the language_id column
	 * 
	 * @param     int|array $languageId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainLanguageQuery The current query, for fluid interface
	 */
	public function filterByLanguageId($languageId = null, $comparison = null)
	{
		if (is_array($languageId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DomainLanguagePeer::LANGUAGE_ID, $languageId, $comparison);
	}

	/**
	 * Filter the query by a related Domain object
	 *
	 * @param     Domain|PropelCollection $domain The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainLanguageQuery The current query, for fluid interface
	 */
	public function filterByDomain($domain, $comparison = null)
	{
		if ($domain instanceof Domain) {
			return $this
				->addUsingAlias(DomainLanguagePeer::DOMAIN_ID, $domain->getId(), $comparison);
		} elseif ($domain instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(DomainLanguagePeer::DOMAIN_ID, $domain->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByDomain() only accepts arguments of type Domain or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Domain relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainLanguageQuery The current query, for fluid interface
	 */
	public function joinDomain($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Domain');
		
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
			$this->addJoinObject($join, 'Domain');
		}
		
		return $this;
	}

	/**
	 * Use the Domain relation Domain object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainQuery A secondary query class using the current class as primary query
	 */
	public function useDomainQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDomain($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Domain', 'DomainQuery');
	}

	/**
	 * Filter the query by a related Language object
	 *
	 * @param     Language|PropelCollection $language The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainLanguageQuery The current query, for fluid interface
	 */
	public function filterByLanguage($language, $comparison = null)
	{
		if ($language instanceof Language) {
			return $this
				->addUsingAlias(DomainLanguagePeer::LANGUAGE_ID, $language->getId(), $comparison);
		} elseif ($language instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(DomainLanguagePeer::LANGUAGE_ID, $language->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByLanguage() only accepts arguments of type Language or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Language relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DomainLanguageQuery The current query, for fluid interface
	 */
	public function joinLanguage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Language');
		
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
			$this->addJoinObject($join, 'Language');
		}
		
		return $this;
	}

	/**
	 * Use the Language relation Language object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LanguageQuery A secondary query class using the current class as primary query
	 */
	public function useLanguageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLanguage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Language', 'LanguageQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     DomainLanguage $domainLanguage Object to remove from the list of results
	 *
	 * @return    DomainLanguageQuery The current query, for fluid interface
	 */
	public function prune($domainLanguage = null)
	{
		if ($domainLanguage) {
			$this->addCond('pruneCond0', $this->getAliasedColName(DomainLanguagePeer::DOMAIN_ID), $domainLanguage->getDomainId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(DomainLanguagePeer::LANGUAGE_ID), $domainLanguage->getLanguageId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseDomainLanguageQuery
