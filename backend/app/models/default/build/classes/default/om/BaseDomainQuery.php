<?php


/**
 * Base class that represents a query for the 'domain' table.
 *
 * 
 *
 * @method     DomainQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     DomainQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     DomainQuery orderByDNSZoneData($order = Criteria::ASC) Order by the dnszonedata column
 * @method     DomainQuery orderByCnameSecret($order = Criteria::ASC) Order by the cnamesecret column
 * @method     DomainQuery orderByEmailSecret($order = Criteria::ASC) Order by the emailsecret column
 * @method     DomainQuery orderByFreezed($order = Criteria::ASC) Order by the freezed column
 * @method     DomainQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     DomainQuery groupById() Group by the id column
 * @method     DomainQuery groupByName() Group by the name column
 * @method     DomainQuery groupByDNSZoneData() Group by the dnszonedata column
 * @method     DomainQuery groupByCnameSecret() Group by the cnamesecret column
 * @method     DomainQuery groupByEmailSecret() Group by the emailsecret column
 * @method     DomainQuery groupByFreezed() Group by the freezed column
 * @method     DomainQuery groupByStatus() Group by the status column
 *
 * @method     DomainQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DomainQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DomainQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DomainQuery leftJoinDomainLanguage($relationAlias = null) Adds a LEFT JOIN clause to the query using the DomainLanguage relation
 * @method     DomainQuery rightJoinDomainLanguage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DomainLanguage relation
 * @method     DomainQuery innerJoinDomainLanguage($relationAlias = null) Adds a INNER JOIN clause to the query using the DomainLanguage relation
 *
 * @method     Domain findOne(PropelPDO $con = null) Return the first Domain matching the query
 * @method     Domain findOneOrCreate(PropelPDO $con = null) Return the first Domain matching the query, or a new Domain object populated from the query conditions when no match is found
 *
 * @method     Domain findOneById(int $id) Return the first Domain filtered by the id column
 * @method     Domain findOneByName(string $name) Return the first Domain filtered by the name column
 * @method     Domain findOneByDNSZoneData(string $dnszonedata) Return the first Domain filtered by the dnszonedata column
 * @method     Domain findOneByCnameSecret(string $cnamesecret) Return the first Domain filtered by the cnamesecret column
 * @method     Domain findOneByEmailSecret(string $emailsecret) Return the first Domain filtered by the emailsecret column
 * @method     Domain findOneByFreezed(int $freezed) Return the first Domain filtered by the freezed column
 * @method     Domain findOneByStatus(string $status) Return the first Domain filtered by the status column
 *
 * @method     array findById(int $id) Return Domain objects filtered by the id column
 * @method     array findByName(string $name) Return Domain objects filtered by the name column
 * @method     array findByDNSZoneData(string $dnszonedata) Return Domain objects filtered by the dnszonedata column
 * @method     array findByCnameSecret(string $cnamesecret) Return Domain objects filtered by the cnamesecret column
 * @method     array findByEmailSecret(string $emailsecret) Return Domain objects filtered by the emailsecret column
 * @method     array findByFreezed(int $freezed) Return Domain objects filtered by the freezed column
 * @method     array findByStatus(string $status) Return Domain objects filtered by the status column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseDomainQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseDomainQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'Domain', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DomainQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DomainQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DomainQuery) {
			return $criteria;
		}
		$query = new DomainQuery();
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
	 * @return    Domain|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = DomainPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(DomainPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(DomainPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DomainPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DomainPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the dnszonedata column
	 * 
	 * @param     string $dNSZoneData The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByDNSZoneData($dNSZoneData = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($dNSZoneData)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $dNSZoneData)) {
				$dNSZoneData = str_replace('*', '%', $dNSZoneData);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DomainPeer::DNSZONEDATA, $dNSZoneData, $comparison);
	}

	/**
	 * Filter the query on the cnamesecret column
	 * 
	 * @param     string $cnameSecret The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByCnameSecret($cnameSecret = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cnameSecret)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cnameSecret)) {
				$cnameSecret = str_replace('*', '%', $cnameSecret);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DomainPeer::CNAMESECRET, $cnameSecret, $comparison);
	}

	/**
	 * Filter the query on the emailsecret column
	 * 
	 * @param     string $emailSecret The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByEmailSecret($emailSecret = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($emailSecret)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $emailSecret)) {
				$emailSecret = str_replace('*', '%', $emailSecret);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DomainPeer::EMAILSECRET, $emailSecret, $comparison);
	}

	/**
	 * Filter the query on the freezed column
	 * 
	 * @param     int|array $freezed The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByFreezed($freezed = null, $comparison = null)
	{
		if (is_array($freezed)) {
			$useMinMax = false;
			if (isset($freezed['min'])) {
				$this->addUsingAlias(DomainPeer::FREEZED, $freezed['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($freezed['max'])) {
				$this->addUsingAlias(DomainPeer::FREEZED, $freezed['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DomainPeer::FREEZED, $freezed, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
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
		return $this->addUsingAlias(DomainPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query by a related DomainLanguage object
	 *
	 * @param     DomainLanguage $domainLanguage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByDomainLanguage($domainLanguage, $comparison = null)
	{
		if ($domainLanguage instanceof DomainLanguage) {
			return $this
				->addUsingAlias(DomainPeer::ID, $domainLanguage->getDomainId(), $comparison);
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
	 * @return    DomainQuery The current query, for fluid interface
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
	 * Filter the query by a related Language object
	 * using the domain_language table as cross reference
	 *
	 * @param     Language $language the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function filterByLanguage($language, $comparison = Criteria::EQUAL)
	{
		return $this
			->useDomainLanguageQuery()
				->filterByLanguage($language, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Domain $domain Object to remove from the list of results
	 *
	 * @return    DomainQuery The current query, for fluid interface
	 */
	public function prune($domain = null)
	{
		if ($domain) {
			$this->addUsingAlias(DomainPeer::ID, $domain->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseDomainQuery
