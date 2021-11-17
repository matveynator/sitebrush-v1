<?php


/**
 * Base class that represents a query for the 'message' table.
 *
 * 
 *
 * @method     MessageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MessageQuery orderByTo($order = Criteria::ASC) Order by the to column
 * @method     MessageQuery orderByFrom($order = Criteria::ASC) Order by the from column
 * @method     MessageQuery orderByNickName($order = Criteria::ASC) Order by the nickname column
 * @method     MessageQuery orderByOrder($order = Criteria::ASC) Order by the order column
 * @method     MessageQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     MessageQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     MessageQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     MessageQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     MessageQuery orderByUnread($order = Criteria::ASC) Order by the unread column
 * @method     MessageQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     MessageQuery orderByDomain($order = Criteria::ASC) Order by the domain column
 *
 * @method     MessageQuery groupById() Group by the id column
 * @method     MessageQuery groupByTo() Group by the to column
 * @method     MessageQuery groupByFrom() Group by the from column
 * @method     MessageQuery groupByNickName() Group by the nickname column
 * @method     MessageQuery groupByOrder() Group by the order column
 * @method     MessageQuery groupByDate() Group by the date column
 * @method     MessageQuery groupBySubject() Group by the subject column
 * @method     MessageQuery groupByText() Group by the text column
 * @method     MessageQuery groupByType() Group by the type column
 * @method     MessageQuery groupByUnread() Group by the unread column
 * @method     MessageQuery groupByStatus() Group by the status column
 * @method     MessageQuery groupByDomain() Group by the domain column
 *
 * @method     MessageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MessageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MessageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MessageQuery leftJoinUserMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserMessage relation
 * @method     MessageQuery rightJoinUserMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserMessage relation
 * @method     MessageQuery innerJoinUserMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the UserMessage relation
 *
 * @method     MessageQuery leftJoinGroupMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupMessage relation
 * @method     MessageQuery rightJoinGroupMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupMessage relation
 * @method     MessageQuery innerJoinGroupMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupMessage relation
 *
 * @method     MessageQuery leftJoinPostMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostMessage relation
 * @method     MessageQuery rightJoinPostMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostMessage relation
 * @method     MessageQuery innerJoinPostMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the PostMessage relation
 *
 * @method     MessageQuery leftJoinMessageMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the MessageMedia relation
 * @method     MessageQuery rightJoinMessageMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MessageMedia relation
 * @method     MessageQuery innerJoinMessageMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the MessageMedia relation
 *
 * @method     Message findOne(PropelPDO $con = null) Return the first Message matching the query
 * @method     Message findOneOrCreate(PropelPDO $con = null) Return the first Message matching the query, or a new Message object populated from the query conditions when no match is found
 *
 * @method     Message findOneById(int $id) Return the first Message filtered by the id column
 * @method     Message findOneByTo(int $to) Return the first Message filtered by the to column
 * @method     Message findOneByFrom(int $from) Return the first Message filtered by the from column
 * @method     Message findOneByNickName(string $nickname) Return the first Message filtered by the nickname column
 * @method     Message findOneByOrder(string $order) Return the first Message filtered by the order column
 * @method     Message findOneByDate(int $date) Return the first Message filtered by the date column
 * @method     Message findOneBySubject(string $subject) Return the first Message filtered by the subject column
 * @method     Message findOneByText(string $text) Return the first Message filtered by the text column
 * @method     Message findOneByType(string $type) Return the first Message filtered by the type column
 * @method     Message findOneByUnread(boolean $unread) Return the first Message filtered by the unread column
 * @method     Message findOneByStatus(string $status) Return the first Message filtered by the status column
 * @method     Message findOneByDomain(string $domain) Return the first Message filtered by the domain column
 *
 * @method     array findById(int $id) Return Message objects filtered by the id column
 * @method     array findByTo(int $to) Return Message objects filtered by the to column
 * @method     array findByFrom(int $from) Return Message objects filtered by the from column
 * @method     array findByNickName(string $nickname) Return Message objects filtered by the nickname column
 * @method     array findByOrder(string $order) Return Message objects filtered by the order column
 * @method     array findByDate(int $date) Return Message objects filtered by the date column
 * @method     array findBySubject(string $subject) Return Message objects filtered by the subject column
 * @method     array findByText(string $text) Return Message objects filtered by the text column
 * @method     array findByType(string $type) Return Message objects filtered by the type column
 * @method     array findByUnread(boolean $unread) Return Message objects filtered by the unread column
 * @method     array findByStatus(string $status) Return Message objects filtered by the status column
 * @method     array findByDomain(string $domain) Return Message objects filtered by the domain column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseMessageQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMessageQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'Message', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MessageQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MessageQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MessageQuery) {
			return $criteria;
		}
		$query = new MessageQuery();
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
	 * @return    Message|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MessagePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MessagePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MessagePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MessagePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the to column
	 * 
	 * @param     int|array $to The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByTo($to = null, $comparison = null)
	{
		if (is_array($to)) {
			$useMinMax = false;
			if (isset($to['min'])) {
				$this->addUsingAlias(MessagePeer::TO, $to['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($to['max'])) {
				$this->addUsingAlias(MessagePeer::TO, $to['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MessagePeer::TO, $to, $comparison);
	}

	/**
	 * Filter the query on the from column
	 * 
	 * @param     int|array $from The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByFrom($from = null, $comparison = null)
	{
		if (is_array($from)) {
			$useMinMax = false;
			if (isset($from['min'])) {
				$this->addUsingAlias(MessagePeer::FROM, $from['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($from['max'])) {
				$this->addUsingAlias(MessagePeer::FROM, $from['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MessagePeer::FROM, $from, $comparison);
	}

	/**
	 * Filter the query on the nickname column
	 * 
	 * @param     string $nickName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByNickName($nickName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nickName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nickName)) {
				$nickName = str_replace('*', '%', $nickName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MessagePeer::NICKNAME, $nickName, $comparison);
	}

	/**
	 * Filter the query on the order column
	 * 
	 * @param     string $order The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByOrder($order = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($order)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $order)) {
				$order = str_replace('*', '%', $order);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MessagePeer::ORDER, $order, $comparison);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     int|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(MessagePeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(MessagePeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MessagePeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the subject column
	 * 
	 * @param     string $subject The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterBySubject($subject = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($subject)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $subject)) {
				$subject = str_replace('*', '%', $subject);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MessagePeer::SUBJECT, $subject, $comparison);
	}

	/**
	 * Filter the query on the text column
	 * 
	 * @param     string $text The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByText($text = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($text)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $text)) {
				$text = str_replace('*', '%', $text);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MessagePeer::TEXT, $text, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($type)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $type)) {
				$type = str_replace('*', '%', $type);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MessagePeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the unread column
	 * 
	 * @param     boolean|string $unread The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByUnread($unread = null, $comparison = null)
	{
		if (is_string($unread)) {
			$unread = in_array(strtolower($unread), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(MessagePeer::UNREAD, $unread, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MessagePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the domain column
	 * 
	 * @param     string $domain The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MessagePeer::DOMAIN, $domain, $comparison);
	}

	/**
	 * Filter the query by a related UserMessage object
	 *
	 * @param     UserMessage $userMessage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByUserMessage($userMessage, $comparison = null)
	{
		if ($userMessage instanceof UserMessage) {
			return $this
				->addUsingAlias(MessagePeer::ID, $userMessage->getMessageId(), $comparison);
		} elseif ($userMessage instanceof PropelCollection) {
			return $this
				->useUserMessageQuery()
					->filterByPrimaryKeys($userMessage->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUserMessage() only accepts arguments of type UserMessage or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UserMessage relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function joinUserMessage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserMessage');
		
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
			$this->addJoinObject($join, 'UserMessage');
		}
		
		return $this;
	}

	/**
	 * Use the UserMessage relation UserMessage object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserMessageQuery A secondary query class using the current class as primary query
	 */
	public function useUserMessageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserMessage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserMessage', 'UserMessageQuery');
	}

	/**
	 * Filter the query by a related GroupMessage object
	 *
	 * @param     GroupMessage $groupMessage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByGroupMessage($groupMessage, $comparison = null)
	{
		if ($groupMessage instanceof GroupMessage) {
			return $this
				->addUsingAlias(MessagePeer::ID, $groupMessage->getMessageId(), $comparison);
		} elseif ($groupMessage instanceof PropelCollection) {
			return $this
				->useGroupMessageQuery()
					->filterByPrimaryKeys($groupMessage->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByGroupMessage() only accepts arguments of type GroupMessage or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the GroupMessage relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function joinGroupMessage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('GroupMessage');
		
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
			$this->addJoinObject($join, 'GroupMessage');
		}
		
		return $this;
	}

	/**
	 * Use the GroupMessage relation GroupMessage object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupMessageQuery A secondary query class using the current class as primary query
	 */
	public function useGroupMessageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinGroupMessage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'GroupMessage', 'GroupMessageQuery');
	}

	/**
	 * Filter the query by a related PostMessage object
	 *
	 * @param     PostMessage $postMessage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByPostMessage($postMessage, $comparison = null)
	{
		if ($postMessage instanceof PostMessage) {
			return $this
				->addUsingAlias(MessagePeer::ID, $postMessage->getMessageId(), $comparison);
		} elseif ($postMessage instanceof PropelCollection) {
			return $this
				->usePostMessageQuery()
					->filterByPrimaryKeys($postMessage->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPostMessage() only accepts arguments of type PostMessage or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PostMessage relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function joinPostMessage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PostMessage');
		
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
			$this->addJoinObject($join, 'PostMessage');
		}
		
		return $this;
	}

	/**
	 * Use the PostMessage relation PostMessage object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostMessageQuery A secondary query class using the current class as primary query
	 */
	public function usePostMessageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPostMessage($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PostMessage', 'PostMessageQuery');
	}

	/**
	 * Filter the query by a related MessageMedia object
	 *
	 * @param     MessageMedia $messageMedia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByMessageMedia($messageMedia, $comparison = null)
	{
		if ($messageMedia instanceof MessageMedia) {
			return $this
				->addUsingAlias(MessagePeer::ID, $messageMedia->getMessageId(), $comparison);
		} elseif ($messageMedia instanceof PropelCollection) {
			return $this
				->useMessageMediaQuery()
					->filterByPrimaryKeys($messageMedia->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByMessageMedia() only accepts arguments of type MessageMedia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MessageMedia relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function joinMessageMedia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MessageMedia');
		
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
			$this->addJoinObject($join, 'MessageMedia');
		}
		
		return $this;
	}

	/**
	 * Use the MessageMedia relation MessageMedia object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MessageMediaQuery A secondary query class using the current class as primary query
	 */
	public function useMessageMediaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMessageMedia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MessageMedia', 'MessageMediaQuery');
	}

	/**
	 * Filter the query by a related User object
	 * using the user_message table as cross reference
	 *
	 * @param     User $user the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserMessageQuery()
				->filterByUser($user, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Group object
	 * using the group_message table as cross reference
	 *
	 * @param     Group $group the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByGroup($group, $comparison = Criteria::EQUAL)
	{
		return $this
			->useGroupMessageQuery()
				->filterByGroup($group, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Post object
	 * using the post_message table as cross reference
	 *
	 * @param     Post $post the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByPost($post, $comparison = Criteria::EQUAL)
	{
		return $this
			->usePostMessageQuery()
				->filterByPost($post, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Media object
	 * using the message_media table as cross reference
	 *
	 * @param     Media $media the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function filterByMedia($media, $comparison = Criteria::EQUAL)
	{
		return $this
			->useMessageMediaQuery()
				->filterByMedia($media, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Message $message Object to remove from the list of results
	 *
	 * @return    MessageQuery The current query, for fluid interface
	 */
	public function prune($message = null)
	{
		if ($message) {
			$this->addUsingAlias(MessagePeer::ID, $message->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMessageQuery
