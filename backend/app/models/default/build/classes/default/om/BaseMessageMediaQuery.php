<?php


/**
 * Base class that represents a query for the 'message_media' table.
 *
 * 
 *
 * @method     MessageMediaQuery orderByMessageId($order = Criteria::ASC) Order by the message_id column
 * @method     MessageMediaQuery orderByMediaId($order = Criteria::ASC) Order by the media_id column
 *
 * @method     MessageMediaQuery groupByMessageId() Group by the message_id column
 * @method     MessageMediaQuery groupByMediaId() Group by the media_id column
 *
 * @method     MessageMediaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MessageMediaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MessageMediaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MessageMediaQuery leftJoinMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Message relation
 * @method     MessageMediaQuery rightJoinMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Message relation
 * @method     MessageMediaQuery innerJoinMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the Message relation
 *
 * @method     MessageMediaQuery leftJoinMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Media relation
 * @method     MessageMediaQuery rightJoinMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Media relation
 * @method     MessageMediaQuery innerJoinMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the Media relation
 *
 * @method     MessageMedia findOne(PropelPDO $con = null) Return the first MessageMedia matching the query
 * @method     MessageMedia findOneOrCreate(PropelPDO $con = null) Return the first MessageMedia matching the query, or a new MessageMedia object populated from the query conditions when no match is found
 *
 * @method     MessageMedia findOneByMessageId(int $message_id) Return the first MessageMedia filtered by the message_id column
 * @method     MessageMedia findOneByMediaId(int $media_id) Return the first MessageMedia filtered by the media_id column
 *
 * @method     array findByMessageId(int $message_id) Return MessageMedia objects filtered by the message_id column
 * @method     array findByMediaId(int $media_id) Return MessageMedia objects filtered by the media_id column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseMessageMediaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMessageMediaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'MessageMedia', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MessageMediaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MessageMediaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MessageMediaQuery) {
			return $criteria;
		}
		$query = new MessageMediaQuery();
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
	 * @param     array[$message_id, $media_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    MessageMedia|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MessageMediaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MessageMediaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(MessageMediaPeer::MESSAGE_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(MessageMediaPeer::MEDIA_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MessageMediaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(MessageMediaPeer::MESSAGE_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(MessageMediaPeer::MEDIA_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the message_id column
	 * 
	 * @param     int|array $messageId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageMediaQuery The current query, for fluid interface
	 */
	public function filterByMessageId($messageId = null, $comparison = null)
	{
		if (is_array($messageId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MessageMediaPeer::MESSAGE_ID, $messageId, $comparison);
	}

	/**
	 * Filter the query on the media_id column
	 * 
	 * @param     int|array $mediaId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageMediaQuery The current query, for fluid interface
	 */
	public function filterByMediaId($mediaId = null, $comparison = null)
	{
		if (is_array($mediaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MessageMediaPeer::MEDIA_ID, $mediaId, $comparison);
	}

	/**
	 * Filter the query by a related Message object
	 *
	 * @param     Message|PropelCollection $message The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageMediaQuery The current query, for fluid interface
	 */
	public function filterByMessage($message, $comparison = null)
	{
		if ($message instanceof Message) {
			return $this
				->addUsingAlias(MessageMediaPeer::MESSAGE_ID, $message->getId(), $comparison);
		} elseif ($message instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MessageMediaPeer::MESSAGE_ID, $message->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    MessageMediaQuery The current query, for fluid interface
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
	 * Filter the query by a related Media object
	 *
	 * @param     Media|PropelCollection $media The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageMediaQuery The current query, for fluid interface
	 */
	public function filterByMedia($media, $comparison = null)
	{
		if ($media instanceof Media) {
			return $this
				->addUsingAlias(MessageMediaPeer::MEDIA_ID, $media->getId(), $comparison);
		} elseif ($media instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MessageMediaPeer::MEDIA_ID, $media->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    MessageMediaQuery The current query, for fluid interface
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
	 * @param     MessageMedia $messageMedia Object to remove from the list of results
	 *
	 * @return    MessageMediaQuery The current query, for fluid interface
	 */
	public function prune($messageMedia = null)
	{
		if ($messageMedia) {
			$this->addCond('pruneCond0', $this->getAliasedColName(MessageMediaPeer::MESSAGE_ID), $messageMedia->getMessageId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(MessageMediaPeer::MEDIA_ID), $messageMedia->getMediaId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseMessageMediaQuery
