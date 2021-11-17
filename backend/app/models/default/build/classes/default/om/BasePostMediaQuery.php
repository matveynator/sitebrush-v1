<?php


/**
 * Base class that represents a query for the 'post_media' table.
 *
 * 
 *
 * @method     PostMediaQuery orderByPostId($order = Criteria::ASC) Order by the post_id column
 * @method     PostMediaQuery orderByMediaId($order = Criteria::ASC) Order by the media_id column
 *
 * @method     PostMediaQuery groupByPostId() Group by the post_id column
 * @method     PostMediaQuery groupByMediaId() Group by the media_id column
 *
 * @method     PostMediaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PostMediaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PostMediaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PostMediaQuery leftJoinPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Post relation
 * @method     PostMediaQuery rightJoinPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Post relation
 * @method     PostMediaQuery innerJoinPost($relationAlias = null) Adds a INNER JOIN clause to the query using the Post relation
 *
 * @method     PostMediaQuery leftJoinMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Media relation
 * @method     PostMediaQuery rightJoinMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Media relation
 * @method     PostMediaQuery innerJoinMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the Media relation
 *
 * @method     PostMedia findOne(PropelPDO $con = null) Return the first PostMedia matching the query
 * @method     PostMedia findOneOrCreate(PropelPDO $con = null) Return the first PostMedia matching the query, or a new PostMedia object populated from the query conditions when no match is found
 *
 * @method     PostMedia findOneByPostId(int $post_id) Return the first PostMedia filtered by the post_id column
 * @method     PostMedia findOneByMediaId(int $media_id) Return the first PostMedia filtered by the media_id column
 *
 * @method     array findByPostId(int $post_id) Return PostMedia objects filtered by the post_id column
 * @method     array findByMediaId(int $media_id) Return PostMedia objects filtered by the media_id column
 *
 * @package    propel.generator.default.om
 */
abstract class BasePostMediaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePostMediaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'PostMedia', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PostMediaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PostMediaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PostMediaQuery) {
			return $criteria;
		}
		$query = new PostMediaQuery();
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
	 * @param     array[$post_id, $media_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PostMedia|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PostMediaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PostMediaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(PostMediaPeer::POST_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(PostMediaPeer::MEDIA_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PostMediaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(PostMediaPeer::POST_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(PostMediaPeer::MEDIA_ID, $key[1], Criteria::EQUAL);
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
	 * @return    PostMediaQuery The current query, for fluid interface
	 */
	public function filterByPostId($postId = null, $comparison = null)
	{
		if (is_array($postId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PostMediaPeer::POST_ID, $postId, $comparison);
	}

	/**
	 * Filter the query on the media_id column
	 * 
	 * @param     int|array $mediaId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostMediaQuery The current query, for fluid interface
	 */
	public function filterByMediaId($mediaId = null, $comparison = null)
	{
		if (is_array($mediaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PostMediaPeer::MEDIA_ID, $mediaId, $comparison);
	}

	/**
	 * Filter the query by a related Post object
	 *
	 * @param     Post|PropelCollection $post The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostMediaQuery The current query, for fluid interface
	 */
	public function filterByPost($post, $comparison = null)
	{
		if ($post instanceof Post) {
			return $this
				->addUsingAlias(PostMediaPeer::POST_ID, $post->getId(), $comparison);
		} elseif ($post instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PostMediaPeer::POST_ID, $post->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PostMediaQuery The current query, for fluid interface
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
	 * Filter the query by a related Media object
	 *
	 * @param     Media|PropelCollection $media The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostMediaQuery The current query, for fluid interface
	 */
	public function filterByMedia($media, $comparison = null)
	{
		if ($media instanceof Media) {
			return $this
				->addUsingAlias(PostMediaPeer::MEDIA_ID, $media->getId(), $comparison);
		} elseif ($media instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PostMediaPeer::MEDIA_ID, $media->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMedia() only accepts arguments of type Media or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Media relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostMediaQuery The current query, for fluid interface
	 */
	public function joinMedia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Media');
		
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
			$this->addJoinObject($join, 'Media');
		}
		
		return $this;
	}

	/**
	 * Use the Media relation Media object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MediaQuery A secondary query class using the current class as primary query
	 */
	public function useMediaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMedia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Media', 'MediaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PostMedia $postMedia Object to remove from the list of results
	 *
	 * @return    PostMediaQuery The current query, for fluid interface
	 */
	public function prune($postMedia = null)
	{
		if ($postMedia) {
			$this->addCond('pruneCond0', $this->getAliasedColName(PostMediaPeer::POST_ID), $postMedia->getPostId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(PostMediaPeer::MEDIA_ID), $postMedia->getMediaId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BasePostMediaQuery
