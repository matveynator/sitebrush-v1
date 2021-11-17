<?php


/**
 * Base class that represents a query for the 'post_message' table.
 *
 * 
 *
 * @method     PostMessageQuery orderByPostId($order = Criteria::ASC) Order by the post_id column
 * @method     PostMessageQuery orderByMessageId($order = Criteria::ASC) Order by the message_id column
 *
 * @method     PostMessageQuery groupByPostId() Group by the post_id column
 * @method     PostMessageQuery groupByMessageId() Group by the message_id column
 *
 * @method     PostMessageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PostMessageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PostMessageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PostMessageQuery leftJoinPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Post relation
 * @method     PostMessageQuery rightJoinPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Post relation
 * @method     PostMessageQuery innerJoinPost($relationAlias = null) Adds a INNER JOIN clause to the query using the Post relation
 *
 * @method     PostMessageQuery leftJoinMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Message relation
 * @method     PostMessageQuery rightJoinMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Message relation
 * @method     PostMessageQuery innerJoinMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the Message relation
 *
 * @method     PostMessage findOne(PropelPDO $con = null) Return the first PostMessage matching the query
 * @method     PostMessage findOneOrCreate(PropelPDO $con = null) Return the first PostMessage matching the query, or a new PostMessage object populated from the query conditions when no match is found
 *
 * @method     PostMessage findOneByPostId(int $post_id) Return the first PostMessage filtered by the post_id column
 * @method     PostMessage findOneByMessageId(int $message_id) Return the first PostMessage filtered by the message_id column
 *
 * @method     array findByPostId(int $post_id) Return PostMessage objects filtered by the post_id column
 * @method     array findByMessageId(int $message_id) Return PostMessage objects filtered by the message_id column
 *
 * @package    propel.generator.default.om
 */
abstract class BasePostMessageQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePostMessageQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'PostMessage', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PostMessageQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PostMessageQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PostMessageQuery) {
			return $criteria;
		}
		$query = new PostMessageQuery();
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
	 * @param     array[$post_id, $message_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PostMessage|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PostMessagePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PostMessageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(PostMessagePeer::POST_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(PostMessagePeer::MESSAGE_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PostMessageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(PostMessagePeer::POST_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(PostMessagePeer::MESSAGE_ID, $key[1], Criteria::EQUAL);
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
	 * @return    PostMessageQuery The current query, for fluid interface
	 */
	public function filterByPostId($postId = null, $comparison = null)
	{
		if (is_array($postId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PostMessagePeer::POST_ID, $postId, $comparison);
	}

	/**
	 * Filter the query on the message_id column
	 * 
	 * @param     int|array $messageId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostMessageQuery The current query, for fluid interface
	 */
	public function filterByMessageId($messageId = null, $comparison = null)
	{
		if (is_array($messageId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PostMessagePeer::MESSAGE_ID, $messageId, $comparison);
	}

	/**
	 * Filter the query by a related Post object
	 *
	 * @param     Post|PropelCollection $post The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostMessageQuery The current query, for fluid interface
	 */
	public function filterByPost($post, $comparison = null)
	{
		if ($post instanceof Post) {
			return $this
				->addUsingAlias(PostMessagePeer::POST_ID, $post->getId(), $comparison);
		} elseif ($post instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PostMessagePeer::POST_ID, $post->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PostMessageQuery The current query, for fluid interface
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
	 * Filter the query by a related Message object
	 *
	 * @param     Message|PropelCollection $message The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostMessageQuery The current query, for fluid interface
	 */
	public function filterByMessage($message, $comparison = null)
	{
		if ($message instanceof Message) {
			return $this
				->addUsingAlias(PostMessagePeer::MESSAGE_ID, $message->getId(), $comparison);
		} elseif ($message instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PostMessagePeer::MESSAGE_ID, $message->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMessage() only accepts arguments of type Message or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Message relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostMessageQuery The current query, for fluid interface
	 */
	public function joinMessage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Message');
		
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
			$this->addJoinObject($join, 'Message');
		}
		
		return $this;
	}

	/**
	 * Use the Message relation Message object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MessageQuery A secondary query class using the current class as primary query
	 */
	public function useMessageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMessage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Message', 'MessageQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PostMessage $postMessage Object to remove from the list of results
	 *
	 * @return    PostMessageQuery The current query, for fluid interface
	 */
	public function prune($postMessage = null)
	{
		if ($postMessage) {
			$this->addCond('pruneCond0', $this->getAliasedColName(PostMessagePeer::POST_ID), $postMessage->getPostId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(PostMessagePeer::MESSAGE_ID), $postMessage->getMessageId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BasePostMessageQuery
