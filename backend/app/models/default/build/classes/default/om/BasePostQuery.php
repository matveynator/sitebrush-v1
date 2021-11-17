<?php


/**
 * Base class that represents a query for the 'post' table.
 *
 * 
 *
 * @method     PostQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PostQuery orderByOwnerId($order = Criteria::ASC) Order by the ownerid column
 * @method     PostQuery orderByDeleterId($order = Criteria::ASC) Order by the deleterid column
 * @method     PostQuery orderByRequestUri($order = Criteria::ASC) Order by the requesturi column
 * @method     PostQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     PostQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     PostQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     PostQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     PostQuery orderByShortText($order = Criteria::ASC) Order by the shorttext column
 * @method     PostQuery orderByTags($order = Criteria::ASC) Order by the tags column
 * @method     PostQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method     PostQuery orderByDomain($order = Criteria::ASC) Order by the domain column
 * @method     PostQuery orderByPublished($order = Criteria::ASC) Order by the published column
 * @method     PostQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     PostQuery groupById() Group by the id column
 * @method     PostQuery groupByOwnerId() Group by the ownerid column
 * @method     PostQuery groupByDeleterId() Group by the deleterid column
 * @method     PostQuery groupByRequestUri() Group by the requesturi column
 * @method     PostQuery groupByType() Group by the type column
 * @method     PostQuery groupByDate() Group by the date column
 * @method     PostQuery groupByTitle() Group by the title column
 * @method     PostQuery groupByText() Group by the text column
 * @method     PostQuery groupByShortText() Group by the shorttext column
 * @method     PostQuery groupByTags() Group by the tags column
 * @method     PostQuery groupByVersion() Group by the version column
 * @method     PostQuery groupByDomain() Group by the domain column
 * @method     PostQuery groupByPublished() Group by the published column
 * @method     PostQuery groupByStatus() Group by the status column
 *
 * @method     PostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PostQuery leftJoinUserPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserPost relation
 * @method     PostQuery rightJoinUserPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserPost relation
 * @method     PostQuery innerJoinUserPost($relationAlias = null) Adds a INNER JOIN clause to the query using the UserPost relation
 *
 * @method     PostQuery leftJoinGroupPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupPost relation
 * @method     PostQuery rightJoinGroupPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupPost relation
 * @method     PostQuery innerJoinGroupPost($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupPost relation
 *
 * @method     PostQuery leftJoinPostMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostMessage relation
 * @method     PostQuery rightJoinPostMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostMessage relation
 * @method     PostQuery innerJoinPostMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the PostMessage relation
 *
 * @method     PostQuery leftJoinPostMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostMedia relation
 * @method     PostQuery rightJoinPostMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostMedia relation
 * @method     PostQuery innerJoinPostMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the PostMedia relation
 *
 * @method     PostQuery leftJoinPostTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostTemplate relation
 * @method     PostQuery rightJoinPostTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostTemplate relation
 * @method     PostQuery innerJoinPostTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the PostTemplate relation
 *
 * @method     Post findOne(PropelPDO $con = null) Return the first Post matching the query
 * @method     Post findOneOrCreate(PropelPDO $con = null) Return the first Post matching the query, or a new Post object populated from the query conditions when no match is found
 *
 * @method     Post findOneById(int $id) Return the first Post filtered by the id column
 * @method     Post findOneByOwnerId(int $ownerid) Return the first Post filtered by the ownerid column
 * @method     Post findOneByDeleterId(int $deleterid) Return the first Post filtered by the deleterid column
 * @method     Post findOneByRequestUri(string $requesturi) Return the first Post filtered by the requesturi column
 * @method     Post findOneByType(string $type) Return the first Post filtered by the type column
 * @method     Post findOneByDate(int $date) Return the first Post filtered by the date column
 * @method     Post findOneByTitle(string $title) Return the first Post filtered by the title column
 * @method     Post findOneByText(string $text) Return the first Post filtered by the text column
 * @method     Post findOneByShortText(string $shorttext) Return the first Post filtered by the shorttext column
 * @method     Post findOneByTags(string $tags) Return the first Post filtered by the tags column
 * @method     Post findOneByVersion(int $version) Return the first Post filtered by the version column
 * @method     Post findOneByDomain(string $domain) Return the first Post filtered by the domain column
 * @method     Post findOneByPublished(string $published) Return the first Post filtered by the published column
 * @method     Post findOneByStatus(string $status) Return the first Post filtered by the status column
 *
 * @method     array findById(int $id) Return Post objects filtered by the id column
 * @method     array findByOwnerId(int $ownerid) Return Post objects filtered by the ownerid column
 * @method     array findByDeleterId(int $deleterid) Return Post objects filtered by the deleterid column
 * @method     array findByRequestUri(string $requesturi) Return Post objects filtered by the requesturi column
 * @method     array findByType(string $type) Return Post objects filtered by the type column
 * @method     array findByDate(int $date) Return Post objects filtered by the date column
 * @method     array findByTitle(string $title) Return Post objects filtered by the title column
 * @method     array findByText(string $text) Return Post objects filtered by the text column
 * @method     array findByShortText(string $shorttext) Return Post objects filtered by the shorttext column
 * @method     array findByTags(string $tags) Return Post objects filtered by the tags column
 * @method     array findByVersion(int $version) Return Post objects filtered by the version column
 * @method     array findByDomain(string $domain) Return Post objects filtered by the domain column
 * @method     array findByPublished(string $published) Return Post objects filtered by the published column
 * @method     array findByStatus(string $status) Return Post objects filtered by the status column
 *
 * @package    propel.generator.default.om
 */
abstract class BasePostQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePostQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'Post', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PostQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PostQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PostQuery) {
			return $criteria;
		}
		$query = new PostQuery();
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
	 * @return    Post|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PostPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PostPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PostPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PostPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the ownerid column
	 * 
	 * @param     int|array $ownerId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByOwnerId($ownerId = null, $comparison = null)
	{
		if (is_array($ownerId)) {
			$useMinMax = false;
			if (isset($ownerId['min'])) {
				$this->addUsingAlias(PostPeer::OWNERID, $ownerId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ownerId['max'])) {
				$this->addUsingAlias(PostPeer::OWNERID, $ownerId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostPeer::OWNERID, $ownerId, $comparison);
	}

	/**
	 * Filter the query on the deleterid column
	 * 
	 * @param     int|array $deleterId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByDeleterId($deleterId = null, $comparison = null)
	{
		if (is_array($deleterId)) {
			$useMinMax = false;
			if (isset($deleterId['min'])) {
				$this->addUsingAlias(PostPeer::DELETERID, $deleterId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deleterId['max'])) {
				$this->addUsingAlias(PostPeer::DELETERID, $deleterId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostPeer::DELETERID, $deleterId, $comparison);
	}

	/**
	 * Filter the query on the requesturi column
	 * 
	 * @param     string $requestUri The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByRequestUri($requestUri = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($requestUri)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $requestUri)) {
				$requestUri = str_replace('*', '%', $requestUri);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PostPeer::REQUESTURI, $requestUri, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PostPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     int|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(PostPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(PostPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PostPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the text column
	 * 
	 * @param     string $text The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PostPeer::TEXT, $text, $comparison);
	}

	/**
	 * Filter the query on the shorttext column
	 * 
	 * @param     string $shortText The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByShortText($shortText = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($shortText)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $shortText)) {
				$shortText = str_replace('*', '%', $shortText);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PostPeer::SHORTTEXT, $shortText, $comparison);
	}

	/**
	 * Filter the query on the tags column
	 * 
	 * @param     string $tags The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByTags($tags = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tags)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tags)) {
				$tags = str_replace('*', '%', $tags);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PostPeer::TAGS, $tags, $comparison);
	}

	/**
	 * Filter the query on the version column
	 * 
	 * @param     int|array $version The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByVersion($version = null, $comparison = null)
	{
		if (is_array($version)) {
			$useMinMax = false;
			if (isset($version['min'])) {
				$this->addUsingAlias(PostPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($version['max'])) {
				$this->addUsingAlias(PostPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PostPeer::VERSION, $version, $comparison);
	}

	/**
	 * Filter the query on the domain column
	 * 
	 * @param     string $domain The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PostPeer::DOMAIN, $domain, $comparison);
	}

	/**
	 * Filter the query on the published column
	 * 
	 * @param     string $published The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByPublished($published = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($published)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $published)) {
				$published = str_replace('*', '%', $published);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PostPeer::PUBLISHED, $published, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PostPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query by a related UserPost object
	 *
	 * @param     UserPost $userPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByUserPost($userPost, $comparison = null)
	{
		if ($userPost instanceof UserPost) {
			return $this
				->addUsingAlias(PostPeer::ID, $userPost->getPostId(), $comparison);
		} elseif ($userPost instanceof PropelCollection) {
			return $this
				->useUserPostQuery()
					->filterByPrimaryKeys($userPost->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUserPost() only accepts arguments of type UserPost or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UserPost relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function joinUserPost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserPost');
		
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
			$this->addJoinObject($join, 'UserPost');
		}
		
		return $this;
	}

	/**
	 * Use the UserPost relation UserPost object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserPostQuery A secondary query class using the current class as primary query
	 */
	public function useUserPostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserPost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserPost', 'UserPostQuery');
	}

	/**
	 * Filter the query by a related GroupPost object
	 *
	 * @param     GroupPost $groupPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByGroupPost($groupPost, $comparison = null)
	{
		if ($groupPost instanceof GroupPost) {
			return $this
				->addUsingAlias(PostPeer::ID, $groupPost->getPostId(), $comparison);
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
	 * @return    PostQuery The current query, for fluid interface
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
	 * Filter the query by a related PostMessage object
	 *
	 * @param     PostMessage $postMessage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByPostMessage($postMessage, $comparison = null)
	{
		if ($postMessage instanceof PostMessage) {
			return $this
				->addUsingAlias(PostPeer::ID, $postMessage->getPostId(), $comparison);
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
	 * @return    PostQuery The current query, for fluid interface
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
	 * Filter the query by a related PostMedia object
	 *
	 * @param     PostMedia $postMedia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByPostMedia($postMedia, $comparison = null)
	{
		if ($postMedia instanceof PostMedia) {
			return $this
				->addUsingAlias(PostPeer::ID, $postMedia->getPostId(), $comparison);
		} elseif ($postMedia instanceof PropelCollection) {
			return $this
				->usePostMediaQuery()
					->filterByPrimaryKeys($postMedia->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPostMedia() only accepts arguments of type PostMedia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PostMedia relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function joinPostMedia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PostMedia');
		
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
			$this->addJoinObject($join, 'PostMedia');
		}
		
		return $this;
	}

	/**
	 * Use the PostMedia relation PostMedia object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PostMediaQuery A secondary query class using the current class as primary query
	 */
	public function usePostMediaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPostMedia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PostMedia', 'PostMediaQuery');
	}

	/**
	 * Filter the query by a related PostTemplate object
	 *
	 * @param     PostTemplate $postTemplate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByPostTemplate($postTemplate, $comparison = null)
	{
		if ($postTemplate instanceof PostTemplate) {
			return $this
				->addUsingAlias(PostPeer::ID, $postTemplate->getPostId(), $comparison);
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
	 * @return    PostQuery The current query, for fluid interface
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
	 * Filter the query by a related User object
	 * using the user_post table as cross reference
	 *
	 * @param     User $user the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserPostQuery()
				->filterByUser($user, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Group object
	 * using the group_post table as cross reference
	 *
	 * @param     Group $group the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByGroup($group, $comparison = Criteria::EQUAL)
	{
		return $this
			->useGroupPostQuery()
				->filterByGroup($group, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Message object
	 * using the post_message table as cross reference
	 *
	 * @param     Message $message the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByMessage($message, $comparison = Criteria::EQUAL)
	{
		return $this
			->usePostMessageQuery()
				->filterByMessage($message, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Media object
	 * using the post_media table as cross reference
	 *
	 * @param     Media $media the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByMedia($media, $comparison = Criteria::EQUAL)
	{
		return $this
			->usePostMediaQuery()
				->filterByMedia($media, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Template object
	 * using the post_template table as cross reference
	 *
	 * @param     Template $template the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function filterByTemplate($template, $comparison = Criteria::EQUAL)
	{
		return $this
			->usePostTemplateQuery()
				->filterByTemplate($template, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Post $post Object to remove from the list of results
	 *
	 * @return    PostQuery The current query, for fluid interface
	 */
	public function prune($post = null)
	{
		if ($post) {
			$this->addUsingAlias(PostPeer::ID, $post->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePostQuery
