<?php


/**
 * Base class that represents a query for the 'uri' table.
 *
 * 
 *
 * @method     UriQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UriQuery orderByOldUri($order = Criteria::ASC) Order by the olduri column
 * @method     UriQuery orderByNewUri($order = Criteria::ASC) Order by the newuri column
 * @method     UriQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     UriQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     UriQuery orderByDomain($order = Criteria::ASC) Order by the domain column
 *
 * @method     UriQuery groupById() Group by the id column
 * @method     UriQuery groupByOldUri() Group by the olduri column
 * @method     UriQuery groupByNewUri() Group by the newuri column
 * @method     UriQuery groupByDate() Group by the date column
 * @method     UriQuery groupByStatus() Group by the status column
 * @method     UriQuery groupByDomain() Group by the domain column
 *
 * @method     UriQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UriQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UriQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Uri findOne(PropelPDO $con = null) Return the first Uri matching the query
 * @method     Uri findOneOrCreate(PropelPDO $con = null) Return the first Uri matching the query, or a new Uri object populated from the query conditions when no match is found
 *
 * @method     Uri findOneById(int $id) Return the first Uri filtered by the id column
 * @method     Uri findOneByOldUri(string $olduri) Return the first Uri filtered by the olduri column
 * @method     Uri findOneByNewUri(string $newuri) Return the first Uri filtered by the newuri column
 * @method     Uri findOneByDate(int $date) Return the first Uri filtered by the date column
 * @method     Uri findOneByStatus(string $status) Return the first Uri filtered by the status column
 * @method     Uri findOneByDomain(string $domain) Return the first Uri filtered by the domain column
 *
 * @method     array findById(int $id) Return Uri objects filtered by the id column
 * @method     array findByOldUri(string $olduri) Return Uri objects filtered by the olduri column
 * @method     array findByNewUri(string $newuri) Return Uri objects filtered by the newuri column
 * @method     array findByDate(int $date) Return Uri objects filtered by the date column
 * @method     array findByStatus(string $status) Return Uri objects filtered by the status column
 * @method     array findByDomain(string $domain) Return Uri objects filtered by the domain column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseUriQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUriQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'Uri', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UriQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UriQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UriQuery) {
			return $criteria;
		}
		$query = new UriQuery();
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
	 * @return    Uri|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UriPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UriQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UriPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UriQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UriPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UriQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UriPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the olduri column
	 * 
	 * @param     string $oldUri The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UriQuery The current query, for fluid interface
	 */
	public function filterByOldUri($oldUri = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($oldUri)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $oldUri)) {
				$oldUri = str_replace('*', '%', $oldUri);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UriPeer::OLDURI, $oldUri, $comparison);
	}

	/**
	 * Filter the query on the newuri column
	 * 
	 * @param     string $newUri The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UriQuery The current query, for fluid interface
	 */
	public function filterByNewUri($newUri = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($newUri)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $newUri)) {
				$newUri = str_replace('*', '%', $newUri);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UriPeer::NEWURI, $newUri, $comparison);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     int|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UriQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(UriPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(UriPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UriPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UriQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UriPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the domain column
	 * 
	 * @param     string $domain The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UriQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UriPeer::DOMAIN, $domain, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Uri $uri Object to remove from the list of results
	 *
	 * @return    UriQuery The current query, for fluid interface
	 */
	public function prune($uri = null)
	{
		if ($uri) {
			$this->addUsingAlias(UriPeer::ID, $uri->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseUriQuery
