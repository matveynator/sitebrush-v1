<?php


/**
 * Base class that represents a query for the 'template' table.
 *
 * 
 *
 * @method     TemplateQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TemplateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     TemplateQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     TemplateQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     TemplateQuery orderByDomain($order = Criteria::ASC) Order by the domain column
 *
 * @method     TemplateQuery groupById() Group by the id column
 * @method     TemplateQuery groupByName() Group by the name column
 * @method     TemplateQuery groupByData() Group by the data column
 * @method     TemplateQuery groupByStatus() Group by the status column
 * @method     TemplateQuery groupByDomain() Group by the domain column
 *
 * @method     TemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TemplateQuery leftJoinPostTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostTemplate relation
 * @method     TemplateQuery rightJoinPostTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostTemplate relation
 * @method     TemplateQuery innerJoinPostTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the PostTemplate relation
 *
 * @method     Template findOne(PropelPDO $con = null) Return the first Template matching the query
 * @method     Template findOneOrCreate(PropelPDO $con = null) Return the first Template matching the query, or a new Template object populated from the query conditions when no match is found
 *
 * @method     Template findOneById(int $id) Return the first Template filtered by the id column
 * @method     Template findOneByName(string $name) Return the first Template filtered by the name column
 * @method     Template findOneByData(string $data) Return the first Template filtered by the data column
 * @method     Template findOneByStatus(string $status) Return the first Template filtered by the status column
 * @method     Template findOneByDomain(string $domain) Return the first Template filtered by the domain column
 *
 * @method     array findById(int $id) Return Template objects filtered by the id column
 * @method     array findByName(string $name) Return Template objects filtered by the name column
 * @method     array findByData(string $data) Return Template objects filtered by the data column
 * @method     array findByStatus(string $status) Return Template objects filtered by the status column
 * @method     array findByDomain(string $domain) Return Template objects filtered by the domain column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseTemplateQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTemplateQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'Template', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TemplateQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TemplateQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TemplateQuery) {
			return $criteria;
		}
		$query = new TemplateQuery();
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
	 * @return    Template|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TemplatePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TemplateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TemplatePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TemplateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TemplatePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TemplatePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TemplatePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the data column
	 * 
	 * @param     string $data The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateQuery The current query, for fluid interface
	 */
	public function filterByData($data = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($data)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $data)) {
				$data = str_replace('*', '%', $data);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TemplatePeer::DATA, $data, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TemplatePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the domain column
	 * 
	 * @param     string $domain The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TemplatePeer::DOMAIN, $domain, $comparison);
	}

	/**
	 * Filter the query by a related PostTemplate object
	 *
	 * @param     PostTemplate $postTemplate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateQuery The current query, for fluid interface
	 */
	public function filterByPostTemplate($postTemplate, $comparison = null)
	{
		if ($postTemplate instanceof PostTemplate) {
			return $this
				->addUsingAlias(TemplatePeer::ID, $postTemplate->getTemplateId(), $comparison);
		} elseif ($postTemplate instanceof PropelCollection) {
			return $this
				->usePostTemplateQuery()
					->filterByPrimaryKeys($postTemplate->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPostTemplate() only accepts arguments of type PostTemplate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PostTemplate relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TemplateQuery The current query, for fluid interface
	 */
	public function joinPostTemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PostTemplate');
		
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
			$this->addJoinObject($join, 'PostTemplate');
		}
		
		return $this;
	}

	/**
	 * Use the PostTemplate relation PostTemplate object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostTemplateQuery A secondary query class using the current class as primary query
	 */
	public function usePostTemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPostTemplate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PostTemplate', 'PostTemplateQuery');
	}

	/**
	 * Filter the query by a related Post object
	 * using the post_template table as cross reference
	 *
	 * @param     Post $post the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TemplateQuery The current query, for fluid interface
	 */
	public function filterByPost($post, $comparison = Criteria::EQUAL)
	{
		return $this
			->usePostTemplateQuery()
				->filterByPost($post, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Template $template Object to remove from the list of results
	 *
	 * @return    TemplateQuery The current query, for fluid interface
	 */
	public function prune($template = null)
	{
		if ($template) {
			$this->addUsingAlias(TemplatePeer::ID, $template->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseTemplateQuery
