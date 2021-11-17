<?php


/**
 * Base class that represents a query for the 'user' table.
 *
 * 
 *
 * @method     UserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UserQuery orderBySessionId($order = Criteria::ASC) Order by the sessionid column
 * @method     UserQuery orderByOldId($order = Criteria::ASC) Order by the oldid column
 * @method     UserQuery orderByAvatarId($order = Criteria::ASC) Order by the avatarid column
 * @method     UserQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     UserQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     UserQuery orderByNickName($order = Criteria::ASC) Order by the nickname column
 * @method     UserQuery orderByFirstName($order = Criteria::ASC) Order by the firstname column
 * @method     UserQuery orderByLastName($order = Criteria::ASC) Order by the lastname column
 * @method     UserQuery orderByGender($order = Criteria::ASC) Order by the gender column
 * @method     UserQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     UserQuery orderByDateOfRegistration($order = Criteria::ASC) Order by the dateofregistration column
 * @method     UserQuery orderByDateOfBirth($order = Criteria::ASC) Order by the dateofbirth column
 * @method     UserQuery orderByLastVisitTime($order = Criteria::ASC) Order by the lastvisittime column
 * @method     UserQuery orderByGrinvichTimeOffset($order = Criteria::ASC) Order by the grinvichtimeoffset column
 * @method     UserQuery orderByActivated($order = Criteria::ASC) Order by the activated column
 * @method     UserQuery orderByVerificationCode($order = Criteria::ASC) Order by the verificationcode column
 * @method     UserQuery orderByDomain($order = Criteria::ASC) Order by the domain column
 * @method     UserQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     UserQuery orderByLanguage($order = Criteria::ASC) Order by the language column
 * @method     UserQuery orderByCurrentIp($order = Criteria::ASC) Order by the currentip column
 * @method     UserQuery orderByAutoGrab($order = Criteria::ASC) Order by the autograb column
 * @method     UserQuery orderByDomainToGrab($order = Criteria::ASC) Order by the domaintograb column
 * @method     UserQuery orderByProfile($order = Criteria::ASC) Order by the profile column
 * @method     UserQuery orderByPreferences($order = Criteria::ASC) Order by the preferences column
 * @method     UserQuery orderBySecurityLog($order = Criteria::ASC) Order by the securitylog column
 * @method     UserQuery orderByInvitedBy($order = Criteria::ASC) Order by the invitedby column
 * @method     UserQuery orderByInvitesAmmount($order = Criteria::ASC) Order by the invitesammount column
 * @method     UserQuery orderByQuotaBytes($order = Criteria::ASC) Order by the quotabytes column
 * @method     UserQuery orderByQuotaOriginals($order = Criteria::ASC) Order by the quotaoriginals column
 * @method     UserQuery orderByQuotaBytesUsed($order = Criteria::ASC) Order by the quotabytesused column
 * @method     UserQuery orderByQuotaOriginalsUsed($order = Criteria::ASC) Order by the quotaoriginalsused column
 *
 * @method     UserQuery groupById() Group by the id column
 * @method     UserQuery groupBySessionId() Group by the sessionid column
 * @method     UserQuery groupByOldId() Group by the oldid column
 * @method     UserQuery groupByAvatarId() Group by the avatarid column
 * @method     UserQuery groupByEmail() Group by the email column
 * @method     UserQuery groupByPassword() Group by the password column
 * @method     UserQuery groupByNickName() Group by the nickname column
 * @method     UserQuery groupByFirstName() Group by the firstname column
 * @method     UserQuery groupByLastName() Group by the lastname column
 * @method     UserQuery groupByGender() Group by the gender column
 * @method     UserQuery groupByPhone() Group by the phone column
 * @method     UserQuery groupByDateOfRegistration() Group by the dateofregistration column
 * @method     UserQuery groupByDateOfBirth() Group by the dateofbirth column
 * @method     UserQuery groupByLastVisitTime() Group by the lastvisittime column
 * @method     UserQuery groupByGrinvichTimeOffset() Group by the grinvichtimeoffset column
 * @method     UserQuery groupByActivated() Group by the activated column
 * @method     UserQuery groupByVerificationCode() Group by the verificationcode column
 * @method     UserQuery groupByDomain() Group by the domain column
 * @method     UserQuery groupByStatus() Group by the status column
 * @method     UserQuery groupByLanguage() Group by the language column
 * @method     UserQuery groupByCurrentIp() Group by the currentip column
 * @method     UserQuery groupByAutoGrab() Group by the autograb column
 * @method     UserQuery groupByDomainToGrab() Group by the domaintograb column
 * @method     UserQuery groupByProfile() Group by the profile column
 * @method     UserQuery groupByPreferences() Group by the preferences column
 * @method     UserQuery groupBySecurityLog() Group by the securitylog column
 * @method     UserQuery groupByInvitedBy() Group by the invitedby column
 * @method     UserQuery groupByInvitesAmmount() Group by the invitesammount column
 * @method     UserQuery groupByQuotaBytes() Group by the quotabytes column
 * @method     UserQuery groupByQuotaOriginals() Group by the quotaoriginals column
 * @method     UserQuery groupByQuotaBytesUsed() Group by the quotabytesused column
 * @method     UserQuery groupByQuotaOriginalsUsed() Group by the quotaoriginalsused column
 *
 * @method     UserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UserQuery leftJoinUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserGroup relation
 * @method     UserQuery rightJoinUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserGroup relation
 * @method     UserQuery innerJoinUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the UserGroup relation
 *
 * @method     UserQuery leftJoinUserInvite($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserInvite relation
 * @method     UserQuery rightJoinUserInvite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserInvite relation
 * @method     UserQuery innerJoinUserInvite($relationAlias = null) Adds a INNER JOIN clause to the query using the UserInvite relation
 *
 * @method     UserQuery leftJoinUserPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserPost relation
 * @method     UserQuery rightJoinUserPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserPost relation
 * @method     UserQuery innerJoinUserPost($relationAlias = null) Adds a INNER JOIN clause to the query using the UserPost relation
 *
 * @method     UserQuery leftJoinUserMessage($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserMessage relation
 * @method     UserQuery rightJoinUserMessage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserMessage relation
 * @method     UserQuery innerJoinUserMessage($relationAlias = null) Adds a INNER JOIN clause to the query using the UserMessage relation
 *
 * @method     UserQuery leftJoinUserMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserMedia relation
 * @method     UserQuery rightJoinUserMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserMedia relation
 * @method     UserQuery innerJoinUserMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the UserMedia relation
 *
 * @method     User findOne(PropelPDO $con = null) Return the first User matching the query
 * @method     User findOneOrCreate(PropelPDO $con = null) Return the first User matching the query, or a new User object populated from the query conditions when no match is found
 *
 * @method     User findOneById(int $id) Return the first User filtered by the id column
 * @method     User findOneBySessionId(string $sessionid) Return the first User filtered by the sessionid column
 * @method     User findOneByOldId(int $oldid) Return the first User filtered by the oldid column
 * @method     User findOneByAvatarId(int $avatarid) Return the first User filtered by the avatarid column
 * @method     User findOneByEmail(string $email) Return the first User filtered by the email column
 * @method     User findOneByPassword(string $password) Return the first User filtered by the password column
 * @method     User findOneByNickName(string $nickname) Return the first User filtered by the nickname column
 * @method     User findOneByFirstName(string $firstname) Return the first User filtered by the firstname column
 * @method     User findOneByLastName(string $lastname) Return the first User filtered by the lastname column
 * @method     User findOneByGender(string $gender) Return the first User filtered by the gender column
 * @method     User findOneByPhone(string $phone) Return the first User filtered by the phone column
 * @method     User findOneByDateOfRegistration(int $dateofregistration) Return the first User filtered by the dateofregistration column
 * @method     User findOneByDateOfBirth(int $dateofbirth) Return the first User filtered by the dateofbirth column
 * @method     User findOneByLastVisitTime(int $lastvisittime) Return the first User filtered by the lastvisittime column
 * @method     User findOneByGrinvichTimeOffset(int $grinvichtimeoffset) Return the first User filtered by the grinvichtimeoffset column
 * @method     User findOneByActivated(string $activated) Return the first User filtered by the activated column
 * @method     User findOneByVerificationCode(string $verificationcode) Return the first User filtered by the verificationcode column
 * @method     User findOneByDomain(string $domain) Return the first User filtered by the domain column
 * @method     User findOneByStatus(string $status) Return the first User filtered by the status column
 * @method     User findOneByLanguage(string $language) Return the first User filtered by the language column
 * @method     User findOneByCurrentIp(string $currentip) Return the first User filtered by the currentip column
 * @method     User findOneByAutoGrab(string $autograb) Return the first User filtered by the autograb column
 * @method     User findOneByDomainToGrab(string $domaintograb) Return the first User filtered by the domaintograb column
 * @method     User findOneByProfile(string $profile) Return the first User filtered by the profile column
 * @method     User findOneByPreferences(string $preferences) Return the first User filtered by the preferences column
 * @method     User findOneBySecurityLog(string $securitylog) Return the first User filtered by the securitylog column
 * @method     User findOneByInvitedBy(string $invitedby) Return the first User filtered by the invitedby column
 * @method     User findOneByInvitesAmmount(int $invitesammount) Return the first User filtered by the invitesammount column
 * @method     User findOneByQuotaBytes(string $quotabytes) Return the first User filtered by the quotabytes column
 * @method     User findOneByQuotaOriginals(string $quotaoriginals) Return the first User filtered by the quotaoriginals column
 * @method     User findOneByQuotaBytesUsed(string $quotabytesused) Return the first User filtered by the quotabytesused column
 * @method     User findOneByQuotaOriginalsUsed(string $quotaoriginalsused) Return the first User filtered by the quotaoriginalsused column
 *
 * @method     array findById(int $id) Return User objects filtered by the id column
 * @method     array findBySessionId(string $sessionid) Return User objects filtered by the sessionid column
 * @method     array findByOldId(int $oldid) Return User objects filtered by the oldid column
 * @method     array findByAvatarId(int $avatarid) Return User objects filtered by the avatarid column
 * @method     array findByEmail(string $email) Return User objects filtered by the email column
 * @method     array findByPassword(string $password) Return User objects filtered by the password column
 * @method     array findByNickName(string $nickname) Return User objects filtered by the nickname column
 * @method     array findByFirstName(string $firstname) Return User objects filtered by the firstname column
 * @method     array findByLastName(string $lastname) Return User objects filtered by the lastname column
 * @method     array findByGender(string $gender) Return User objects filtered by the gender column
 * @method     array findByPhone(string $phone) Return User objects filtered by the phone column
 * @method     array findByDateOfRegistration(int $dateofregistration) Return User objects filtered by the dateofregistration column
 * @method     array findByDateOfBirth(int $dateofbirth) Return User objects filtered by the dateofbirth column
 * @method     array findByLastVisitTime(int $lastvisittime) Return User objects filtered by the lastvisittime column
 * @method     array findByGrinvichTimeOffset(int $grinvichtimeoffset) Return User objects filtered by the grinvichtimeoffset column
 * @method     array findByActivated(string $activated) Return User objects filtered by the activated column
 * @method     array findByVerificationCode(string $verificationcode) Return User objects filtered by the verificationcode column
 * @method     array findByDomain(string $domain) Return User objects filtered by the domain column
 * @method     array findByStatus(string $status) Return User objects filtered by the status column
 * @method     array findByLanguage(string $language) Return User objects filtered by the language column
 * @method     array findByCurrentIp(string $currentip) Return User objects filtered by the currentip column
 * @method     array findByAutoGrab(string $autograb) Return User objects filtered by the autograb column
 * @method     array findByDomainToGrab(string $domaintograb) Return User objects filtered by the domaintograb column
 * @method     array findByProfile(string $profile) Return User objects filtered by the profile column
 * @method     array findByPreferences(string $preferences) Return User objects filtered by the preferences column
 * @method     array findBySecurityLog(string $securitylog) Return User objects filtered by the securitylog column
 * @method     array findByInvitedBy(string $invitedby) Return User objects filtered by the invitedby column
 * @method     array findByInvitesAmmount(int $invitesammount) Return User objects filtered by the invitesammount column
 * @method     array findByQuotaBytes(string $quotabytes) Return User objects filtered by the quotabytes column
 * @method     array findByQuotaOriginals(string $quotaoriginals) Return User objects filtered by the quotaoriginals column
 * @method     array findByQuotaBytesUsed(string $quotabytesused) Return User objects filtered by the quotabytesused column
 * @method     array findByQuotaOriginalsUsed(string $quotaoriginalsused) Return User objects filtered by the quotaoriginalsused column
 *
 * @package    propel.generator.default.om
 */
abstract class BaseUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'brain', $modelName = 'User', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UserQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UserQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UserQuery) {
			return $criteria;
		}
		$query = new UserQuery();
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
	 * @return    User|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = UserPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UserPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UserPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UserPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the sessionid column
	 * 
	 * @param     string $sessionId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySessionId($sessionId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sessionId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sessionId)) {
				$sessionId = str_replace('*', '%', $sessionId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::SESSIONID, $sessionId, $comparison);
	}

	/**
	 * Filter the query on the oldid column
	 * 
	 * @param     int|array $oldId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByOldId($oldId = null, $comparison = null)
	{
		if (is_array($oldId)) {
			$useMinMax = false;
			if (isset($oldId['min'])) {
				$this->addUsingAlias(UserPeer::OLDID, $oldId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($oldId['max'])) {
				$this->addUsingAlias(UserPeer::OLDID, $oldId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::OLDID, $oldId, $comparison);
	}

	/**
	 * Filter the query on the avatarid column
	 * 
	 * @param     int|array $avatarId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByAvatarId($avatarId = null, $comparison = null)
	{
		if (is_array($avatarId)) {
			$useMinMax = false;
			if (isset($avatarId['min'])) {
				$this->addUsingAlias(UserPeer::AVATARID, $avatarId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($avatarId['max'])) {
				$this->addUsingAlias(UserPeer::AVATARID, $avatarId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::AVATARID, $avatarId, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the nickname column
	 * 
	 * @param     string $nickName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserPeer::NICKNAME, $nickName, $comparison);
	}

	/**
	 * Filter the query on the firstname column
	 * 
	 * @param     string $firstName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByFirstName($firstName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($firstName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $firstName)) {
				$firstName = str_replace('*', '%', $firstName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::FIRSTNAME, $firstName, $comparison);
	}

	/**
	 * Filter the query on the lastname column
	 * 
	 * @param     string $lastName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByLastName($lastName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lastName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lastName)) {
				$lastName = str_replace('*', '%', $lastName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::LASTNAME, $lastName, $comparison);
	}

	/**
	 * Filter the query on the gender column
	 * 
	 * @param     string $gender The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByGender($gender = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($gender)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $gender)) {
				$gender = str_replace('*', '%', $gender);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::GENDER, $gender, $comparison);
	}

	/**
	 * Filter the query on the phone column
	 * 
	 * @param     string $phone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPhone($phone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($phone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $phone)) {
				$phone = str_replace('*', '%', $phone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::PHONE, $phone, $comparison);
	}

	/**
	 * Filter the query on the dateofregistration column
	 * 
	 * @param     int|array $dateOfRegistration The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByDateOfRegistration($dateOfRegistration = null, $comparison = null)
	{
		if (is_array($dateOfRegistration)) {
			$useMinMax = false;
			if (isset($dateOfRegistration['min'])) {
				$this->addUsingAlias(UserPeer::DATEOFREGISTRATION, $dateOfRegistration['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateOfRegistration['max'])) {
				$this->addUsingAlias(UserPeer::DATEOFREGISTRATION, $dateOfRegistration['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::DATEOFREGISTRATION, $dateOfRegistration, $comparison);
	}

	/**
	 * Filter the query on the dateofbirth column
	 * 
	 * @param     int|array $dateOfBirth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByDateOfBirth($dateOfBirth = null, $comparison = null)
	{
		if (is_array($dateOfBirth)) {
			$useMinMax = false;
			if (isset($dateOfBirth['min'])) {
				$this->addUsingAlias(UserPeer::DATEOFBIRTH, $dateOfBirth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateOfBirth['max'])) {
				$this->addUsingAlias(UserPeer::DATEOFBIRTH, $dateOfBirth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::DATEOFBIRTH, $dateOfBirth, $comparison);
	}

	/**
	 * Filter the query on the lastvisittime column
	 * 
	 * @param     int|array $lastVisitTime The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByLastVisitTime($lastVisitTime = null, $comparison = null)
	{
		if (is_array($lastVisitTime)) {
			$useMinMax = false;
			if (isset($lastVisitTime['min'])) {
				$this->addUsingAlias(UserPeer::LASTVISITTIME, $lastVisitTime['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($lastVisitTime['max'])) {
				$this->addUsingAlias(UserPeer::LASTVISITTIME, $lastVisitTime['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::LASTVISITTIME, $lastVisitTime, $comparison);
	}

	/**
	 * Filter the query on the grinvichtimeoffset column
	 * 
	 * @param     int|array $grinvichTimeOffset The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByGrinvichTimeOffset($grinvichTimeOffset = null, $comparison = null)
	{
		if (is_array($grinvichTimeOffset)) {
			$useMinMax = false;
			if (isset($grinvichTimeOffset['min'])) {
				$this->addUsingAlias(UserPeer::GRINVICHTIMEOFFSET, $grinvichTimeOffset['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($grinvichTimeOffset['max'])) {
				$this->addUsingAlias(UserPeer::GRINVICHTIMEOFFSET, $grinvichTimeOffset['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::GRINVICHTIMEOFFSET, $grinvichTimeOffset, $comparison);
	}

	/**
	 * Filter the query on the activated column
	 * 
	 * @param     string $activated The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByActivated($activated = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($activated)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $activated)) {
				$activated = str_replace('*', '%', $activated);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::ACTIVATED, $activated, $comparison);
	}

	/**
	 * Filter the query on the verificationcode column
	 * 
	 * @param     string $verificationCode The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByVerificationCode($verificationCode = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($verificationCode)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $verificationCode)) {
				$verificationCode = str_replace('*', '%', $verificationCode);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::VERIFICATIONCODE, $verificationCode, $comparison);
	}

	/**
	 * Filter the query on the domain column
	 * 
	 * @param     string $domain The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserPeer::DOMAIN, $domain, $comparison);
	}

	/**
	 * Filter the query on the status column
	 * 
	 * @param     string $status The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UserPeer::STATUS, $status, $comparison);
	}

	/**
	 * Filter the query on the language column
	 * 
	 * @param     string $language The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByLanguage($language = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($language)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $language)) {
				$language = str_replace('*', '%', $language);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::LANGUAGE, $language, $comparison);
	}

	/**
	 * Filter the query on the currentip column
	 * 
	 * @param     string $currentIp The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByCurrentIp($currentIp = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($currentIp)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $currentIp)) {
				$currentIp = str_replace('*', '%', $currentIp);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::CURRENTIP, $currentIp, $comparison);
	}

	/**
	 * Filter the query on the autograb column
	 * 
	 * @param     string $autoGrab The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByAutoGrab($autoGrab = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($autoGrab)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $autoGrab)) {
				$autoGrab = str_replace('*', '%', $autoGrab);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::AUTOGRAB, $autoGrab, $comparison);
	}

	/**
	 * Filter the query on the domaintograb column
	 * 
	 * @param     string $domainToGrab The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByDomainToGrab($domainToGrab = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($domainToGrab)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $domainToGrab)) {
				$domainToGrab = str_replace('*', '%', $domainToGrab);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::DOMAINTOGRAB, $domainToGrab, $comparison);
	}

	/**
	 * Filter the query on the profile column
	 * 
	 * @param     string $profile The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByProfile($profile = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($profile)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $profile)) {
				$profile = str_replace('*', '%', $profile);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::PROFILE, $profile, $comparison);
	}

	/**
	 * Filter the query on the preferences column
	 * 
	 * @param     string $preferences The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPreferences($preferences = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($preferences)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $preferences)) {
				$preferences = str_replace('*', '%', $preferences);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::PREFERENCES, $preferences, $comparison);
	}

	/**
	 * Filter the query on the securitylog column
	 * 
	 * @param     string $securityLog The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterBySecurityLog($securityLog = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($securityLog)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $securityLog)) {
				$securityLog = str_replace('*', '%', $securityLog);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::SECURITYLOG, $securityLog, $comparison);
	}

	/**
	 * Filter the query on the invitedby column
	 * 
	 * @param     string $invitedBy The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByInvitedBy($invitedBy = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($invitedBy)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $invitedBy)) {
				$invitedBy = str_replace('*', '%', $invitedBy);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::INVITEDBY, $invitedBy, $comparison);
	}

	/**
	 * Filter the query on the invitesammount column
	 * 
	 * @param     int|array $invitesAmmount The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByInvitesAmmount($invitesAmmount = null, $comparison = null)
	{
		if (is_array($invitesAmmount)) {
			$useMinMax = false;
			if (isset($invitesAmmount['min'])) {
				$this->addUsingAlias(UserPeer::INVITESAMMOUNT, $invitesAmmount['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($invitesAmmount['max'])) {
				$this->addUsingAlias(UserPeer::INVITESAMMOUNT, $invitesAmmount['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::INVITESAMMOUNT, $invitesAmmount, $comparison);
	}

	/**
	 * Filter the query on the quotabytes column
	 * 
	 * @param     string $quotaBytes The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByQuotaBytes($quotaBytes = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($quotaBytes)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $quotaBytes)) {
				$quotaBytes = str_replace('*', '%', $quotaBytes);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::QUOTABYTES, $quotaBytes, $comparison);
	}

	/**
	 * Filter the query on the quotaoriginals column
	 * 
	 * @param     string $quotaOriginals The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByQuotaOriginals($quotaOriginals = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($quotaOriginals)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $quotaOriginals)) {
				$quotaOriginals = str_replace('*', '%', $quotaOriginals);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UserPeer::QUOTAORIGINALS, $quotaOriginals, $comparison);
	}

	/**
	 * Filter the query on the quotabytesused column
	 * 
	 * @param     string|array $quotaBytesUsed The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByQuotaBytesUsed($quotaBytesUsed = null, $comparison = null)
	{
		if (is_array($quotaBytesUsed)) {
			$useMinMax = false;
			if (isset($quotaBytesUsed['min'])) {
				$this->addUsingAlias(UserPeer::QUOTABYTESUSED, $quotaBytesUsed['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quotaBytesUsed['max'])) {
				$this->addUsingAlias(UserPeer::QUOTABYTESUSED, $quotaBytesUsed['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::QUOTABYTESUSED, $quotaBytesUsed, $comparison);
	}

	/**
	 * Filter the query on the quotaoriginalsused column
	 * 
	 * @param     string|array $quotaOriginalsUsed The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByQuotaOriginalsUsed($quotaOriginalsUsed = null, $comparison = null)
	{
		if (is_array($quotaOriginalsUsed)) {
			$useMinMax = false;
			if (isset($quotaOriginalsUsed['min'])) {
				$this->addUsingAlias(UserPeer::QUOTAORIGINALSUSED, $quotaOriginalsUsed['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quotaOriginalsUsed['max'])) {
				$this->addUsingAlias(UserPeer::QUOTAORIGINALSUSED, $quotaOriginalsUsed['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UserPeer::QUOTAORIGINALSUSED, $quotaOriginalsUsed, $comparison);
	}

	/**
	 * Filter the query by a related UserGroup object
	 *
	 * @param     UserGroup $userGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUserGroup($userGroup, $comparison = null)
	{
		if ($userGroup instanceof UserGroup) {
			return $this
				->addUsingAlias(UserPeer::ID, $userGroup->getUserId(), $comparison);
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
	 * @return    UserQuery The current query, for fluid interface
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
	 * Filter the query by a related UserInvite object
	 *
	 * @param     UserInvite $userInvite  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUserInvite($userInvite, $comparison = null)
	{
		if ($userInvite instanceof UserInvite) {
			return $this
				->addUsingAlias(UserPeer::ID, $userInvite->getUserId(), $comparison);
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
	 * @return    UserQuery The current query, for fluid interface
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
	 * Filter the query by a related UserPost object
	 *
	 * @param     UserPost $userPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUserPost($userPost, $comparison = null)
	{
		if ($userPost instanceof UserPost) {
			return $this
				->addUsingAlias(UserPeer::ID, $userPost->getUserId(), $comparison);
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
	 * @return    UserQuery The current query, for fluid interface
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
	 * Filter the query by a related UserMessage object
	 *
	 * @param     UserMessage $userMessage  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUserMessage($userMessage, $comparison = null)
	{
		if ($userMessage instanceof UserMessage) {
			return $this
				->addUsingAlias(UserPeer::ID, $userMessage->getUserId(), $comparison);
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
	 * @return    UserQuery The current query, for fluid interface
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
	 * Filter the query by a related UserMedia object
	 *
	 * @param     UserMedia $userMedia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByUserMedia($userMedia, $comparison = null)
	{
		if ($userMedia instanceof UserMedia) {
			return $this
				->addUsingAlias(UserPeer::ID, $userMedia->getUserId(), $comparison);
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
	 * @return    UserQuery The current query, for fluid interface
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
	 * Filter the query by a related Group object
	 * using the user_group table as cross reference
	 *
	 * @param     Group $group the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByGroup($group, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserGroupQuery()
				->filterByGroup($group, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Invite object
	 * using the user_invite table as cross reference
	 *
	 * @param     Invite $invite the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByInvite($invite, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserInviteQuery()
				->filterByInvite($invite, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Post object
	 * using the user_post table as cross reference
	 *
	 * @param     Post $post the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByPost($post, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserPostQuery()
				->filterByPost($post, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Message object
	 * using the user_message table as cross reference
	 *
	 * @param     Message $message the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByMessage($message, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserMessageQuery()
				->filterByMessage($message, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Media object
	 * using the user_media table as cross reference
	 *
	 * @param     Media $media the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function filterByMedia($media, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserMediaQuery()
				->filterByMedia($media, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     User $user Object to remove from the list of results
	 *
	 * @return    UserQuery The current query, for fluid interface
	 */
	public function prune($user = null)
	{
		if ($user) {
			$this->addUsingAlias(UserPeer::ID, $user->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseUserQuery
