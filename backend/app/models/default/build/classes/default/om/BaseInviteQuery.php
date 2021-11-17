<?php


/**
 * Base class that represents a query for the 'invite' table.
 *
 * 
 *
 * @method     InviteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     InviteQuery orderByHash($order = Criteria::ASC) Order by the hash column
 * @method     InviteQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     InviteQuery orderByDomain($order = Criteria::ASC) Order by the domain column
 *
 * @method     InviteQuery groupById() Group by the id column
 * @method     InviteQuery groupByHash() Group by the hash column
 * @method     InviteQuery groupByStatus() Group by the status column
 * @method     InviteQuery groupByDomain() Group by the domain column
 *
 * @method     InviteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     InviteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     InviteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     InviteQuery leftJoinUserInvite($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserInvite relation
 * @method     InviteQuery rightJoinUserInvite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserInvite relation
 * @method     InviteQuery innerJoinUserInvite($relationAlias = null) Adds a INNER JOIN clause to the query using the UserInvite relation
 *
 * @method     Invite findOne(PropelPDO $con = null) Return the first Invite matching the query
 * @method     Invite findOneOrCreate(PropelPDO $con = null) Return the first Invite matching the query, or a new Invite object populated from the query conditions when no match is found
 *
 * @method     Invite findOneById(int $id) Return the first Invite filtered by the id column
 * @method     Invite findOneByHash(string $hash) Return the first Invite filtered by the hash column
 * @method     Invite findOneByStatus(string $status) Return the first Invite filtered by the status column
 * @method     Invite findOneByDomain(string $domain) Return the first Invite filtered by the domain column
 *
 * @method     array findById(int $id) Return Invite objects filtered by the id column
 * @method     array findByHash(string $hash) Return Invite objects filtered by the hash column
 * @method     array findByStatus(string $status) Return Invite objects filtered by the status column
 * @method     array findByDomain(string $domain) Return Invite objects filtered by the domain column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseInviteQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseInviteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'Invite', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new InviteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    InviteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof InviteQuery) {
			return $criteria;
		}
		$query = new InviteQuery();
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
	 * @return    Invite|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = InvitePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    InviteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(InvitePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    InviteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(InvitePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InviteQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(InvitePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the hash column
	 * 
	 * @param     string $hash The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InviteQuery The current query, for fluid interface
	 */
	public function filterByHash($hash = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hash)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hash)) {
				$hash = str_replace('*', '%', $hash);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(InvitePeer::HASH, $hash, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InviteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(InvitePeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the domain column
	 * 
	 * @param     string $domain The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InviteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(InvitePeer::DOMAIN, $domain, $comparison);
	}

	/**
	 * Filter the query by a related UserInvite object
	 *
	 * @param     UserInvite $userInvite  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InviteQuery The current query, for fluid interface
	 */
	public function filterByUserInvite($userInvite, $comparison = null)
	{
		if ($userInvite instanceof UserInvite) {
			return $this
				->addUsingAlias(InvitePeer::ID, $userInvite->getInviteId(), $comparison);
		} elseif ($userInvite instanceof PropelCollection) {
			return $this
				->useUserInviteQuery()
					->filterByPrimaryKeys($userInvite->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUserInvite() only accepts arguments of type UserInvite or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UserInvite relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InviteQuery The current query, for fluid interface
	 */
	public function joinUserInvite($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserInvite');
		
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
			$this->addJoinObject($join, 'UserInvite');
		}
		
		return $this;
	}

	/**
	 * Use the UserInvite relation UserInvite object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserInviteQuery A secondary query class using the current class as primary query
	 */
	public function useUserInviteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserInvite($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserInvite', 'UserInviteQuery');
	}

	/**
	 * Filter the query by a related User object
	 * using the user_invite table as cross reference
	 *
	 * @param     User $user the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InviteQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserInviteQuery()
				->filterByUser($user, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Invite $invite Object to remove from the list of results
	 *
	 * @return    InviteQuery The current query, for fluid interface
	 */
	public function prune($invite = null)
	{
		if ($invite) {
			$this->addUsingAlias(InvitePeer::ID, $invite->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseInviteQuery
