<?php


/**
 * Base class that represents a query for the 'user_invite' table.
 *
 * 
 *
 * @method     UserInviteQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     UserInviteQuery orderByInviteId($order = Criteria::ASC) Order by the invite_id column
 *
 * @method     UserInviteQuery groupByUserId() Group by the user_id column
 * @method     UserInviteQuery groupByInviteId() Group by the invite_id column
 *
 * @method     UserInviteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserInviteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserInviteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserInviteQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     UserInviteQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     UserInviteQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     UserInviteQuery leftJoinInvite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Invite relation
 * @method     UserInviteQuery rightJoinInvite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Invite relation
 * @method     UserInviteQuery innerJoinInvite($relationAlias = null) Adds a INNER JOIN clause to the query using the Invite relation
 *
 * @method     UserInvite findOne(PropelPDO $con = null) Return the first UserInvite matching the query
 * @method     UserInvite findOneOrCreate(PropelPDO $con = null) Return the first UserInvite matching the query, or a new UserInvite object populated from the query conditions when no match is found
 *
 * @method     UserInvite findOneByUserId(int $user_id) Return the first UserInvite filtered by the user_id column
 * @method     UserInvite findOneByInviteId(int $invite_id) Return the first UserInvite filtered by the invite_id column
 *
 * @method     array findByUserId(int $user_id) Return UserInvite objects filtered by the user_id column
 * @method     array findByInviteId(int $invite_id) Return UserInvite objects filtered by the invite_id column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseUserInviteQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUserInviteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'UserInvite', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserInviteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserInviteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserInviteQuery) {
			return $criteria;
		}
		$query = new UserInviteQuery();
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
	 * @param     array[$user_id, $invite_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    UserInvite|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UserInvitePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UserInviteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(UserInvitePeer::USER_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(UserInvitePeer::INVITE_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserInviteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(UserInvitePeer::USER_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(UserInvitePeer::INVITE_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the user_id column
	 * 
	 * @param     int|array $userId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserInviteQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserInvitePeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the invite_id column
	 * 
	 * @param     int|array $inviteId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserInviteQuery The current query, for fluid interface
	 */
	public function filterByInviteId($inviteId = null, $comparison = null)
	{
		if (is_array($inviteId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserInvitePeer::INVITE_ID, $inviteId, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User|PropelCollection $user The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserInviteQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		if ($user instanceof User) {
			return $this
				->addUsingAlias(UserInvitePeer::USER_ID, $user->getId(), $comparison);
		} elseif ($user instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UserInvitePeer::USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserInviteQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');
		
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
			$this->addJoinObject($join, 'User');
		}
		
		return $this;
	}

	/**
	 * Use the User relation User object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Filter the query by a related Invite object
	 *
	 * @param     Invite|PropelCollection $invite The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserInviteQuery The current query, for fluid interface
	 */
	public function filterByInvite($invite, $comparison = null)
	{
		if ($invite instanceof Invite) {
			return $this
				->addUsingAlias(UserInvitePeer::INVITE_ID, $invite->getId(), $comparison);
		} elseif ($invite instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UserInvitePeer::INVITE_ID, $invite->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByInvite() only accepts arguments of type Invite or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Invite relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserInviteQuery The current query, for fluid interface
	 */
	public function joinInvite($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Invite');
		
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
			$this->addJoinObject($join, 'Invite');
		}
		
		return $this;
	}

	/**
	 * Use the Invite relation Invite object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InviteQuery A secondary query class using the current class as primary query
	 */
	public function useInviteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinInvite($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Invite', 'InviteQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     UserInvite $userInvite Object to remove from the list of results
	 *
	 * @return    UserInviteQuery The current query, for fluid interface
	 */
	public function prune($userInvite = null)
	{
		if ($userInvite) {
			$this->addCond('pruneCond0', $this->getAliasedColName(UserInvitePeer::USER_ID), $userInvite->getUserId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(UserInvitePeer::INVITE_ID), $userInvite->getInviteId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseUserInviteQuery
