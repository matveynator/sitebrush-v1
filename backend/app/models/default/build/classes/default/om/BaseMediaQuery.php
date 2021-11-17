<?php


/**
 * Base class that represents a query for the 'media' table.
 *
 * 
 *
 * @method     MediaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MediaQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     MediaQuery orderByHash($order = Criteria::ASC) Order by the hash column
 * @method     MediaQuery orderByOriginalHash($order = Criteria::ASC) Order by the originalhash column
 * @method     MediaQuery orderByFormat($order = Criteria::ASC) Order by the format column
 * @method     MediaQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method     MediaQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     MediaQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     MediaQuery orderByDomain($order = Criteria::ASC) Order by the domain column
 * @method     MediaQuery orderByDay($order = Criteria::ASC) Order by the day column
 * @method     MediaQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     MediaQuery orderBySizesArray($order = Criteria::ASC) Order by the sizesarray column
 * @method     MediaQuery orderByRating($order = Criteria::ASC) Order by the rating column
 * @method     MediaQuery orderByRatingCount($order = Criteria::ASC) Order by the ratingcount column
 * @method     MediaQuery orderByRatingIp($order = Criteria::ASC) Order by the ratingip column
 * @method     MediaQuery orderByViews($order = Criteria::ASC) Order by the views column
 * @method     MediaQuery orderByBytesUsed($order = Criteria::ASC) Order by the bytesused column
 *
 * @method     MediaQuery groupById() Group by the id column
 * @method     MediaQuery groupByType() Group by the type column
 * @method     MediaQuery groupByHash() Group by the hash column
 * @method     MediaQuery groupByOriginalHash() Group by the originalhash column
 * @method     MediaQuery groupByFormat() Group by the format column
 * @method     MediaQuery groupByWidth() Group by the width column
 * @method     MediaQuery groupByHeight() Group by the height column
 * @method     MediaQuery groupByStatus() Group by the status column
 * @method     MediaQuery groupByDomain() Group by the domain column
 * @method     MediaQuery groupByDay() Group by the day column
 * @method     MediaQuery groupByDate() Group by the date column
 * @method     MediaQuery groupBySizesArray() Group by the sizesarray column
 * @method     MediaQuery groupByRating() Group by the rating column
 * @method     MediaQuery groupByRatingCount() Group by the ratingcount column
 * @method     MediaQuery groupByRatingIp() Group by the ratingip column
 * @method     MediaQuery groupByViews() Group by the views column
 * @method     MediaQuery groupByBytesUsed() Group by the bytesused column
 *
 * @method     MediaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MediaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MediaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MediaQuery leftJoinUserMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserMedia relation
 * @method     MediaQuery rightJoinUserMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserMedia relation
 * @method     MediaQuery innerJoinUserMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the UserMedia relation
 *
 * @method     MediaQuery leftJoinGroupMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupMedia relation
 * @method     MediaQuery rightJoinGroupMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupMedia relation
 * @method     MediaQuery innerJoinGroupMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupMedia relation
 *
 * @method     MediaQuery leftJoinPostMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostMedia relation
 * @method     MediaQuery rightJoinPostMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostMedia relation
 * @method     MediaQuery innerJoinPostMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the PostMedia relation
 *
 * @method     MediaQuery leftJoinMessageMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the MessageMedia relation
 * @method     MediaQuery rightJoinMessageMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MessageMedia relation
 * @method     MediaQuery innerJoinMessageMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the MessageMedia relation
 *
 * @method     Media findOne(PropelPDO $con = null) Return the first Media matching the query
 * @method     Media findOneOrCreate(PropelPDO $con = null) Return the first Media matching the query, or a new Media object populated from the query conditions when no match is found
 *
 * @method     Media findOneById(int $id) Return the first Media filtered by the id column
 * @method     Media findOneByType(string $type) Return the first Media filtered by the type column
 * @method     Media findOneByHash(string $hash) Return the first Media filtered by the hash column
 * @method     Media findOneByOriginalHash(string $originalhash) Return the first Media filtered by the originalhash column
 * @method     Media findOneByFormat(string $format) Return the first Media filtered by the format column
 * @method     Media findOneByWidth(string $width) Return the first Media filtered by the width column
 * @method     Media findOneByHeight(string $height) Return the first Media filtered by the height column
 * @method     Media findOneByStatus(string $status) Return the first Media filtered by the status column
 * @method     Media findOneByDomain(string $domain) Return the first Media filtered by the domain column
 * @method     Media findOneByDay(int $day) Return the first Media filtered by the day column
 * @method     Media findOneByDate(int $date) Return the first Media filtered by the date column
 * @method     Media findOneBySizesArray(string $sizesarray) Return the first Media filtered by the sizesarray column
 * @method     Media findOneByRating(double $rating) Return the first Media filtered by the rating column
 * @method     Media findOneByRatingCount(int $ratingcount) Return the first Media filtered by the ratingcount column
 * @method     Media findOneByRatingIp(string $ratingip) Return the first Media filtered by the ratingip column
 * @method     Media findOneByViews(int $views) Return the first Media filtered by the views column
 * @method     Media findOneByBytesUsed(int $bytesused) Return the first Media filtered by the bytesused column
 *
 * @method     array findById(int $id) Return Media objects filtered by the id column
 * @method     array findByType(string $type) Return Media objects filtered by the type column
 * @method     array findByHash(string $hash) Return Media objects filtered by the hash column
 * @method     array findByOriginalHash(string $originalhash) Return Media objects filtered by the originalhash column
 * @method     array findByFormat(string $format) Return Media objects filtered by the format column
 * @method     array findByWidth(string $width) Return Media objects filtered by the width column
 * @method     array findByHeight(string $height) Return Media objects filtered by the height column
 * @method     array findByStatus(string $status) Return Media objects filtered by the status column
 * @method     array findByDomain(string $domain) Return Media objects filtered by the domain column
 * @method     array findByDay(int $day) Return Media objects filtered by the day column
 * @method     array findByDate(int $date) Return Media objects filtered by the date column
 * @method     array findBySizesArray(string $sizesarray) Return Media objects filtered by the sizesarray column
 * @method     array findByRating(double $rating) Return Media objects filtered by the rating column
 * @method     array findByRatingCount(int $ratingcount) Return Media objects filtered by the ratingcount column
 * @method     array findByRatingIp(string $ratingip) Return Media objects filtered by the ratingip column
 * @method     array findByViews(int $views) Return Media objects filtered by the views column
 * @method     array findByBytesUsed(int $bytesused) Return Media objects filtered by the bytesused column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseMediaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMediaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'Media', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MediaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MediaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MediaQuery) {
			return $criteria;
		}
		$query = new MediaQuery();
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
	 * @return    Media|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MediaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MediaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MediaPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MediaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MediaPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the hash column
	 * 
	 * @param     string $hash The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MediaPeer::HASH, $hash, $comparison);
	}

	/**
	 * Filter the query on the originalhash column
	 * 
	 * @param     string $originalHash The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByOriginalHash($originalHash = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($originalHash)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $originalHash)) {
				$originalHash = str_replace('*', '%', $originalHash);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MediaPeer::ORIGINALHASH, $originalHash, $comparison);
	}

	/**
	 * Filter the query on the format column
	 * 
	 * @param     string $format The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByFormat($format = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($format)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $format)) {
				$format = str_replace('*', '%', $format);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MediaPeer::FORMAT, $format, $comparison);
	}

	/**
	 * Filter the query on the width column
	 * 
	 * @param     string $width The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByWidth($width = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($width)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $width)) {
				$width = str_replace('*', '%', $width);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MediaPeer::WIDTH, $width, $comparison);
	}

	/**
	 * Filter the query on the height column
	 * 
	 * @param     string $height The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByHeight($height = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($height)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $height)) {
				$height = str_replace('*', '%', $height);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MediaPeer::HEIGHT, $height, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MediaPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the domain column
	 * 
	 * @param     string $domain The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MediaPeer::DOMAIN, $domain, $comparison);
	}

	/**
	 * Filter the query on the day column
	 * 
	 * @param     int|array $day The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByDay($day = null, $comparison = null)
	{
		if (is_array($day)) {
			$useMinMax = false;
			if (isset($day['min'])) {
				$this->addUsingAlias(MediaPeer::DAY, $day['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($day['max'])) {
				$this->addUsingAlias(MediaPeer::DAY, $day['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::DAY, $day, $comparison);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     int|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(MediaPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(MediaPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the sizesarray column
	 * 
	 * @param     string $sizesArray The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterBySizesArray($sizesArray = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sizesArray)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sizesArray)) {
				$sizesArray = str_replace('*', '%', $sizesArray);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MediaPeer::SIZESARRAY, $sizesArray, $comparison);
	}

	/**
	 * Filter the query on the rating column
	 * 
	 * @param     double|array $rating The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByRating($rating = null, $comparison = null)
	{
		if (is_array($rating)) {
			$useMinMax = false;
			if (isset($rating['min'])) {
				$this->addUsingAlias(MediaPeer::RATING, $rating['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rating['max'])) {
				$this->addUsingAlias(MediaPeer::RATING, $rating['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::RATING, $rating, $comparison);
	}

	/**
	 * Filter the query on the ratingcount column
	 * 
	 * @param     int|array $ratingCount The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByRatingCount($ratingCount = null, $comparison = null)
	{
		if (is_array($ratingCount)) {
			$useMinMax = false;
			if (isset($ratingCount['min'])) {
				$this->addUsingAlias(MediaPeer::RATINGCOUNT, $ratingCount['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ratingCount['max'])) {
				$this->addUsingAlias(MediaPeer::RATINGCOUNT, $ratingCount['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::RATINGCOUNT, $ratingCount, $comparison);
	}

	/**
	 * Filter the query on the ratingip column
	 * 
	 * @param     string $ratingIp The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByRatingIp($ratingIp = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ratingIp)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ratingIp)) {
				$ratingIp = str_replace('*', '%', $ratingIp);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MediaPeer::RATINGIP, $ratingIp, $comparison);
	}

	/**
	 * Filter the query on the views column
	 * 
	 * @param     int|array $views The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByViews($views = null, $comparison = null)
	{
		if (is_array($views)) {
			$useMinMax = false;
			if (isset($views['min'])) {
				$this->addUsingAlias(MediaPeer::VIEWS, $views['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($views['max'])) {
				$this->addUsingAlias(MediaPeer::VIEWS, $views['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::VIEWS, $views, $comparison);
	}

	/**
	 * Filter the query on the bytesused column
	 * 
	 * @param     int|array $bytesUsed The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByBytesUsed($bytesUsed = null, $comparison = null)
	{
		if (is_array($bytesUsed)) {
			$useMinMax = false;
			if (isset($bytesUsed['min'])) {
				$this->addUsingAlias(MediaPeer::BYTESUSED, $bytesUsed['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($bytesUsed['max'])) {
				$this->addUsingAlias(MediaPeer::BYTESUSED, $bytesUsed['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MediaPeer::BYTESUSED, $bytesUsed, $comparison);
	}

	/**
	 * Filter the query by a related UserMedia object
	 *
	 * @param     UserMedia $userMedia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByUserMedia($userMedia, $comparison = null)
	{
		if ($userMedia instanceof UserMedia) {
			return $this
				->addUsingAlias(MediaPeer::ID, $userMedia->getMediaId(), $comparison);
		} elseif ($userMedia instanceof PropelCollection) {
			return $this
				->useUserMediaQuery()
					->filterByPrimaryKeys($userMedia->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUserMedia() only accepts arguments of type UserMedia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UserMedia relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function joinUserMedia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserMedia');
		
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
			$this->addJoinObject($join, 'UserMedia');
		}
		
		return $this;
	}

	/**
	 * Use the UserMedia relation UserMedia object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserMediaQuery A secondary query class using the current class as primary query
	 */
	public function useUserMediaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserMedia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserMedia', 'UserMediaQuery');
	}

	/**
	 * Filter the query by a related GroupMedia object
	 *
	 * @param     GroupMedia $groupMedia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByGroupMedia($groupMedia, $comparison = null)
	{
		if ($groupMedia instanceof GroupMedia) {
			return $this
				->addUsingAlias(MediaPeer::ID, $groupMedia->getMediaId(), $comparison);
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
	 * @return    MediaQuery The current query, for fluid interface
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
	 * Filter the query by a related PostMedia object
	 *
	 * @param     PostMedia $postMedia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByPostMedia($postMedia, $comparison = null)
	{
		if ($postMedia instanceof PostMedia) {
			return $this
				->addUsingAlias(MediaPeer::ID, $postMedia->getMediaId(), $comparison);
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
	 * @return    MediaQuery The current query, for fluid interface
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
	 * Filter the query by a related MessageMedia object
	 *
	 * @param     MessageMedia $messageMedia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByMessageMedia($messageMedia, $comparison = null)
	{
		if ($messageMedia instanceof MessageMedia) {
			return $this
				->addUsingAlias(MediaPeer::ID, $messageMedia->getMediaId(), $comparison);
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
	 * @return    MediaQuery The current query, for fluid interface
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
	 * using the user_media table as cross reference
	 *
	 * @param     User $user the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserMediaQuery()
				->filterByUser($user, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Group object
	 * using the group_media table as cross reference
	 *
	 * @param     Group $group the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByGroup($group, $comparison = Criteria::EQUAL)
	{
		return $this
			->useGroupMediaQuery()
				->filterByGroup($group, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Post object
	 * using the post_media table as cross reference
	 *
	 * @param     Post $post the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByPost($post, $comparison = Criteria::EQUAL)
	{
		return $this
			->usePostMediaQuery()
				->filterByPost($post, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Message object
	 * using the message_media table as cross reference
	 *
	 * @param     Message $message the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function filterByMessage($message, $comparison = Criteria::EQUAL)
	{
		return $this
			->useMessageMediaQuery()
				->filterByMessage($message, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Media $media Object to remove from the list of results
	 *
	 * @return    MediaQuery The current query, for fluid interface
	 */
	public function prune($media = null)
	{
		if ($media) {
			$this->addUsingAlias(MediaPeer::ID, $media->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMediaQuery
