<?php


/**
 * Base class that represents a query for the 'group' table.
 *
 * 
 *
 * @method     GroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     GroupQuery orderByOwnerId($order = Criteria::ASC) Order by the owner_id column
 * @method     GroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     GroupQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     GroupQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method     GroupQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     GroupQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     GroupQuery orderByDomain($order = Criteria::ASC) Order by the domain column
 *
 * @method     GroupQuery groupById() Group by the id column
 * @method     GroupQuery groupByOwnerId() Group by the owner_id column
 * @method     GroupQuery groupByName() Group by the name column
 * @method     GroupQuery groupByTitle() Group by the title column
 * @method     GroupQuery groupByComment() Group by the comment column
 * @method     GroupQuery groupByDate() Group by the date column
 * @method     GroupQuery groupByStatus() Group by the status column
 * @method     GroupQuery groupByDomain() Group by the domain column
 *
 * @method     GroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     GroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     GroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     GroupQuery leftJoinUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserGroup relation
 * @method     GroupQuery rightJoinUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserGroup relation
 * @method     GroupQuery innerJoinUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the UserGroup relation
 *
 * @method     GroupQuery leftJoinGroupPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupPost relation
 * @method     GroupQuery rightJoinGroupPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupPost relation
 * @method     GroupQuery innerJoinGroupPost($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupPost relation
 *
 * @method     GroupQuery leftJoinGroupMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupMessage relation
 * @method     GroupQuery rightJoinGroupMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupMessage relation
 * @method     GroupQuery innerJoinGroupMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupMessage relation
 *
 * @method     GroupQuery leftJoinGroupMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupMedia relation
 * @method     GroupQuery rightJoinGroupMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupMedia relation
 * @method     GroupQuery innerJoinGroupMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupMedia relation
 *
 * @method     Group findOne(PropelPDO $con = null) Return the first Group matching the query
 * @method     Group findOneOrCreate(PropelPDO $con = null) Return the first Group matching the query, or a new Group object populated from the query conditions when no match is found
 *
 * @method     Group findOneById(int $id) Return the first Group filtered by the id column
 * @method     Group findOneByOwnerId(int $owner_id) Return the first Group filtered by the owner_id column
 * @method     Group findOneByName(string $name) Return the first Group filtered by the name column
 * @method     Group findOneByTitle(string $title) Return the first Group filtered by the title column
 * @method     Group findOneByComment(string $comment) Return the first Group filtered by the comment column
 * @method     Group findOneByDate(int $date) Return the first Group filtered by the date column
 * @method     Group findOneByStatus(string $status) Return the first Group filtered by the status column
 * @method     Group findOneByDomain(string $domain) Return the first Group filtered by the domain column
 *
 * @method     array findById(int $id) Return Group objects filtered by the id column
 * @method     array findByOwnerId(int $owner_id) Return Group objects filtered by the owner_id column
 * @method     array findByName(string $name) Return Group objects filtered by the name column
 * @method     array findByTitle(string $title) Return Group objects filtered by the title column
 * @method     array findByComment(string $comment) Return Group objects filtered by the comment column
 * @method     array findByDate(int $date) Return Group objects filtered by the date column
 * @method     array findByStatus(string $status) Return Group objects filtered by the status column
 * @method     array findByDomain(string $domain) Return Group objects filtered by the domain column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseGroupQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'Group', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new GroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    GroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof GroupQuery) {
			return $criteria;
		}
		$query = new GroupQuery();
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
	 * @return    Group|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = GroupPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(GroupPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(GroupPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(GroupPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the owner_id column
	 * 
	 * @param     int|array $ownerId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByOwnerId($ownerId = null, $comparison = null)
	{
		if (is_array($ownerId)) {
			$useMinMax = false;
			if (isset($ownerId['min'])) {
				$this->addUsingAlias(GroupPeer::OWNER_ID, $ownerId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ownerId['max'])) {
				$this->addUsingAlias(GroupPeer::OWNER_ID, $ownerId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::OWNER_ID, $ownerId, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
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
		return $this->addUsingAlias(GroupPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByTitle($title = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($title)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $title)) {
				$title = str_replace('*', '%', $title);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(GroupPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the comment column
	 * 
	 * @param     string $comment The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByComment($comment = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($comment)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $comment)) {
				$comment = str_replace('*', '%', $comment);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(GroupPeer::COMMENT, $comment, $comparison);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     int|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(GroupPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(GroupPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
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
		return $this->addUsingAlias(GroupPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the domain column
	 * 
	 * @param     string $domain The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
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
		return $this->addUsingAlias(GroupPeer::DOMAIN, $domain, $comparison);
	}

	/**
	 * Filter the query by a related UserGroup object
	 *
	 * @param     UserGroup $userGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByUserGroup($userGroup, $comparison = null)
	{
		if ($userGroup instanceof UserGroup) {
			return $this
				->addUsingAlias(GroupPeer::ID, $userGroup->getGroupId(), $comparison);
		} elseif ($userGroup instanceof PropelCollection) {
			return $this
				->useUserGroupQuery()
					->filterByPrimaryKeys($userGroup->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUserGroup() only accepts arguments of type UserGroup or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UserGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function joinUserGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserGroup');
		
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
			$this->addJoinObject($join, 'UserGroup');
		}
		
		return $this;
	}

	/**
	 * Use the UserGroup relation UserGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserGroupQuery A secondary query class using the current class as primary query
	 */
	public function useUserGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserGroup', 'UserGroupQuery');
	}

	/**
	 * Filter the query by a related GroupPost object
	 *
	 * @param     GroupPost $groupPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByGroupPost($groupPost, $comparison = null)
	{
		if ($groupPost instanceof GroupPost) {
			return $this
				->addUsingAlias(GroupPeer::ID, $groupPost->getGroupId(), $comparison);
		} elseif ($groupPost instanceof PropelCollection) {
			return $this
				->useGroupPostQuery()
					->filterByPrimaryKeys($groupPost->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByGroupPost() only accepts arguments of type GroupPost or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the GroupPost relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function joinGroupPost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('GroupPost');
		
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
			$this->addJoinObject($join, 'GroupPost');
		}
		
		return $this;
	}

	/**
	 * Use the GroupPost relation GroupPost object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupPostQuery A secondary query class using the current class as primary query
	 */
	public function useGroupPostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinGroupPost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'GroupPost', 'GroupPostQuery');
	}

	/**
	 * Filter the query by a related GroupMessage object
	 *
	 * @param     GroupMessage $groupMessage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByGroupMessage($groupMessage, $comparison = null)
	{
		if ($groupMessage instanceof GroupMessage) {
			return $this
				->addUsingAlias(GroupPeer::ID, $groupMessage->getGroupId(), $comparison);
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
	 * @return    GroupQuery The current query, for fluid interface
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
	 * Filter the query by a related GroupMedia object
	 *
	 * @param     GroupMedia $groupMedia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByGroupMedia($groupMedia, $comparison = null)
	{
		if ($groupMedia instanceof GroupMedia) {
			return $this
				->addUsingAlias(GroupPeer::ID, $groupMedia->getGroupId(), $comparison);
		} elseif ($groupMedia instanceof PropelCollection) {
			return $this
				->useGroupMediaQuery()
					->filterByPrimaryKeys($groupMedia->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByGroupMedia() only accepts arguments of type GroupMedia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the GroupMedia relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function joinGroupMedia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('GroupMedia');
		
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
			$this->addJoinObject($join, 'GroupMedia');
		}
		
		return $this;
	}

	/**
	 * Use the GroupMedia relation GroupMedia object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupMediaQuery A secondary query class using the current class as primary query
	 */
	public function useGroupMediaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinGroupMedia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'GroupMedia', 'GroupMediaQuery');
	}

	/**
	 * Filter the query by a related User object
	 * using the user_group table as cross reference
	 *
	 * @param     User $user the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserGroupQuery()
				->filterByUser($user, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Post object
	 * using the group_post table as cross reference
	 *
	 * @param     Post $post the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByPost($post, $comparison = Criteria::EQUAL)
	{
		return $this
			->useGroupPostQuery()
				->filterByPost($post, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Message object
	 * using the group_message table as cross reference
	 *
	 * @param     Message $message the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByMessage($message, $comparison = Criteria::EQUAL)
	{
		return $this
			->useGroupMessageQuery()
				->filterByMessage($message, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Media object
	 * using the group_media table as cross reference
	 *
	 * @param     Media $media the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByMedia($media, $comparison = Criteria::EQUAL)
	{
		return $this
			->useGroupMediaQuery()
				->filterByMedia($media, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Group $group Object to remove from the list of results
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function prune($group = null)
	{
		if ($group) {
			$this->addUsingAlias(GroupPeer::ID, $group->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseGroupQuery
