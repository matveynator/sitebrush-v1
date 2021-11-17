<?php


/**
 * Base class that represents a query for the 'post_template' table.
 *
 * 
 *
 * @method     PostTemplateQuery orderByPostId($order = Criteria::ASC) Order by the post_id column
 * @method     PostTemplateQuery orderByTemplateId($order = Criteria::ASC) Order by the template_id column
 *
 * @method     PostTemplateQuery groupByPostId() Group by the post_id column
 * @method     PostTemplateQuery groupByTemplateId() Group by the template_id column
 *
 * @method     PostTemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PostTemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PostTemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PostTemplateQuery leftJoinPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Post relation
 * @method     PostTemplateQuery rightJoinPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Post relation
 * @method     PostTemplateQuery innerJoinPost($relationAlias = null) Adds a INNER JOIN clause to the query using the Post relation
 *
 * @method     PostTemplateQuery leftJoinTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Template relation
 * @method     PostTemplateQuery rightJoinTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Template relation
 * @method     PostTemplateQuery innerJoinTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the Template relation
 *
 * @method     PostTemplate findOne(PropelPDO $con = null) Return the first PostTemplate matching the query
 * @method     PostTemplate findOneOrCreate(PropelPDO $con = null) Return the first PostTemplate matching the query, or a new PostTemplate object populated from the query conditions when no match is found
 *
 * @method     PostTemplate findOneByPostId(int $post_id) Return the first PostTemplate filtered by the post_id column
 * @method     PostTemplate findOneByTemplateId(int $template_id) Return the first PostTemplate filtered by the template_id column
 *
 * @method     array findByPostId(int $post_id) Return PostTemplate objects filtered by the post_id column
 * @method     array findByTemplateId(int $template_id) Return PostTemplate objects filtered by the template_id column
 *
 * @package    propel.generator.default.om
 */
abstract class BasePostTemplateQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePostTemplateQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'PostTemplate', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PostTemplateQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PostTemplateQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PostTemplateQuery) {
			return $criteria;
		}
		$query = new PostTemplateQuery();
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
	 * @param     array[$post_id, $template_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PostTemplate|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PostTemplatePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PostTemplateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(PostTemplatePeer::POST_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(PostTemplatePeer::TEMPLATE_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PostTemplateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(PostTemplatePeer::POST_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(PostTemplatePeer::TEMPLATE_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the post_id column
	 * 
	 * @param     int|array $postId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostTemplateQuery The current query, for fluid interface
	 */
	public function filterByPostId($postId = null, $comparison = null)
	{
		if (is_array($postId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PostTemplatePeer::POST_ID, $postId, $comparison);
	}

	/**
	 * Filter the query on the template_id column
	 * 
	 * @param     int|array $templateId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostTemplateQuery The current query, for fluid interface
	 */
	public function filterByTemplateId($templateId = null, $comparison = null)
	{
		if (is_array($templateId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PostTemplatePeer::TEMPLATE_ID, $templateId, $comparison);
	}

	/**
	 * Filter the query by a related Post object
	 *
	 * @param     Post|PropelCollection $post The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostTemplateQuery The current query, for fluid interface
	 */
	public function filterByPost($post, $comparison = null)
	{
		if ($post instanceof Post) {
			return $this
				->addUsingAlias(PostTemplatePeer::POST_ID, $post->getId(), $comparison);
		} elseif ($post instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PostTemplatePeer::POST_ID, $post->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPost() only accepts arguments of type Post or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Post relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostTemplateQuery The current query, for fluid interface
	 */
	public function joinPost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Post');
		
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
			$this->addJoinObject($join, 'Post');
		}
		
		return $this;
	}

	/**
	 * Use the Post relation Post object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostQuery A secondary query class using the current class as primary query
	 */
	public function usePostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Post', 'PostQuery');
	}

	/**
	 * Filter the query by a related Template object
	 *
	 * @param     Template|PropelCollection $template The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostTemplateQuery The current query, for fluid interface
	 */
	public function filterByTemplate($template, $comparison = null)
	{
		if ($template instanceof Template) {
			return $this
				->addUsingAlias(PostTemplatePeer::TEMPLATE_ID, $template->getId(), $comparison);
		} elseif ($template instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PostTemplatePeer::TEMPLATE_ID, $template->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTemplate() only accepts arguments of type Template or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Template relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostTemplateQuery The current query, for fluid interface
	 */
	public function joinTemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Template');
		
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
			$this->addJoinObject($join, 'Template');
		}
		
		return $this;
	}

	/**
	 * Use the Template relation Template object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TemplateQuery A secondary query class using the current class as primary query
	 */
	public function useTemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTemplate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Template', 'TemplateQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PostTemplate $postTemplate Object to remove from the list of results
	 *
	 * @return    PostTemplateQuery The current query, for fluid interface
	 */
	public function prune($postTemplate = null)
	{
		if ($postTemplate) {
			$this->addCond('pruneCond0', $this->getAliasedColName(PostTemplatePeer::POST_ID), $postTemplate->getPostId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(PostTemplatePeer::TEMPLATE_ID), $postTemplate->getTemplateId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BasePostTemplateQuery
