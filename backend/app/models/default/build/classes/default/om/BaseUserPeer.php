<?php


/**
 * Base static class for performing query and update operations on the 'user' table.
 *
 * 
 *
 * @package    propel.generator.default.om
 */
abstract class BaseUserPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'brain';

	/** the table name for this class */
	const TABLE_NAME = 'user';

	/** the related Propel class for this table */
	const OM_CLASS = 'User';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'default.User';

	/** the related TableMap class for this table */
	const TM_CLASS = 'UserTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 32;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'user.ID';

	/** the column name for the SESSIONID field */
	const SESSIONID = 'user.SESSIONID';

	/** the column name for the OLDID field */
	const OLDID = 'user.OLDID';

	/** the column name for the AVATARID field */
	const AVATARID = 'user.AVATARID';

	/** the column name for the EMAIL field */
	const EMAIL = 'user.EMAIL';

	/** the column name for the PASSWORD field */
	const PASSWORD = 'user.PASSWORD';

	/** the column name for the NICKNAME field */
	const NICKNAME = 'user.NICKNAME';

	/** the column name for the FIRSTNAME field */
	const FIRSTNAME = 'user.FIRSTNAME';

	/** the column name for the LASTNAME field */
	const LASTNAME = 'user.LASTNAME';

	/** the column name for the GENDER field */
	const GENDER = 'user.GENDER';

	/** the column name for the PHONE field */
	const PHONE = 'user.PHONE';

	/** the column name for the DATEOFREGISTRATION field */
	const DATEOFREGISTRATION = 'user.DATEOFREGISTRATION';

	/** the column name for the DATEOFBIRTH field */
	const DATEOFBIRTH = 'user.DATEOFBIRTH';

	/** the column name for the LASTVISITTIME field */
	const LASTVISITTIME = 'user.LASTVISITTIME';

	/** the column name for the GRINVICHTIMEOFFSET field */
	const GRINVICHTIMEOFFSET = 'user.GRINVICHTIMEOFFSET';

	/** the column name for the ACTIVATED field */
	const ACTIVATED = 'user.ACTIVATED';

	/** the column name for the VERIFICATIONCODE field */
	const VERIFICATIONCODE = 'user.VERIFICATIONCODE';

	/** the column name for the DOMAIN field */
	const DOMAIN = 'user.DOMAIN';

	/** the column name for the STATUS field */
	const STATUS = 'user.STATUS';

	/** the column name for the LANGUAGE field */
	const LANGUAGE = 'user.LANGUAGE';

	/** the column name for the CURRENTIP field */
	const CURRENTIP = 'user.CURRENTIP';

	/** the column name for the AUTOGRAB field */
	const AUTOGRAB = 'user.AUTOGRAB';

	/** the column name for the DOMAINTOGRAB field */
	const DOMAINTOGRAB = 'user.DOMAINTOGRAB';

	/** the column name for the PROFILE field */
	const PROFILE = 'user.PROFILE';

	/** the column name for the PREFERENCES field */
	const PREFERENCES = 'user.PREFERENCES';

	/** the column name for the SECURITYLOG field */
	const SECURITYLOG = 'user.SECURITYLOG';

	/** the column name for the INVITEDBY field */
	const INVITEDBY = 'user.INVITEDBY';

	/** the column name for the INVITESAMMOUNT field */
	const INVITESAMMOUNT = 'user.INVITESAMMOUNT';

	/** the column name for the QUOTABYTES field */
	const QUOTABYTES = 'user.QUOTABYTES';

	/** the column name for the QUOTAORIGINALS field */
	const QUOTAORIGINALS = 'user.QUOTAORIGINALS';

	/** the column name for the QUOTABYTESUSED field */
	const QUOTABYTESUSED = 'user.QUOTABYTESUSED';

	/** the column name for the QUOTAORIGINALSUSED field */
	const QUOTAORIGINALSUSED = 'user.QUOTAORIGINALSUSED';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';
	
	/**
	 * An identiy map to hold any loaded instances of User objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array User[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'SessionId', 'OldId', 'AvatarId', 'Email', 'Password', 'NickName', 'FirstName', 'LastName', 'Gender', 'Phone', 'DateOfRegistration', 'DateOfBirth', 'LastVisitTime', 'GrinvichTimeOffset', 'Activated', 'VerificationCode', 'Domain', 'Status', 'Language', 'CurrentIp', 'AutoGrab', 'DomainToGrab', 'Profile', 'Preferences', 'SecurityLog', 'InvitedBy', 'InvitesAmmount', 'QuotaBytes', 'QuotaOriginals', 'QuotaBytesUsed', 'QuotaOriginalsUsed', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'sessionId', 'oldId', 'avatarId', 'email', 'password', 'nickName', 'firstName', 'lastName', 'gender', 'phone', 'dateOfRegistration', 'dateOfBirth', 'lastVisitTime', 'grinvichTimeOffset', 'activated', 'verificationCode', 'domain', 'status', 'language', 'currentIp', 'autoGrab', 'domainToGrab', 'profile', 'preferences', 'securityLog', 'invitedBy', 'invitesAmmount', 'quotaBytes', 'quotaOriginals', 'quotaBytesUsed', 'quotaOriginalsUsed', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::SESSIONID, self::OLDID, self::AVATARID, self::EMAIL, self::PASSWORD, self::NICKNAME, self::FIRSTNAME, self::LASTNAME, self::GENDER, self::PHONE, self::DATEOFREGISTRATION, self::DATEOFBIRTH, self::LASTVISITTIME, self::GRINVICHTIMEOFFSET, self::ACTIVATED, self::VERIFICATIONCODE, self::DOMAIN, self::STATUS, self::LANGUAGE, self::CURRENTIP, self::AUTOGRAB, self::DOMAINTOGRAB, self::PROFILE, self::PREFERENCES, self::SECURITYLOG, self::INVITEDBY, self::INVITESAMMOUNT, self::QUOTABYTES, self::QUOTAORIGINALS, self::QUOTABYTESUSED, self::QUOTAORIGINALSUSED, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'SESSIONID', 'OLDID', 'AVATARID', 'EMAIL', 'PASSWORD', 'NICKNAME', 'FIRSTNAME', 'LASTNAME', 'GENDER', 'PHONE', 'DATEOFREGISTRATION', 'DATEOFBIRTH', 'LASTVISITTIME', 'GRINVICHTIMEOFFSET', 'ACTIVATED', 'VERIFICATIONCODE', 'DOMAIN', 'STATUS', 'LANGUAGE', 'CURRENTIP', 'AUTOGRAB', 'DOMAINTOGRAB', 'PROFILE', 'PREFERENCES', 'SECURITYLOG', 'INVITEDBY', 'INVITESAMMOUNT', 'QUOTABYTES', 'QUOTAORIGINALS', 'QUOTABYTESUSED', 'QUOTAORIGINALSUSED', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'sessionid', 'oldid', 'avatarid', 'email', 'password', 'nickname', 'firstname', 'lastname', 'gender', 'phone', 'dateofregistration', 'dateofbirth', 'lastvisittime', 'grinvichtimeoffset', 'activated', 'verificationcode', 'domain', 'status', 'language', 'currentip', 'autograb', 'domaintograb', 'profile', 'preferences', 'securitylog', 'invitedby', 'invitesammount', 'quotabytes', 'quotaoriginals', 'quotabytesused', 'quotaoriginalsused', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'SessionId' => 1, 'OldId' => 2, 'AvatarId' => 3, 'Email' => 4, 'Password' => 5, 'NickName' => 6, 'FirstName' => 7, 'LastName' => 8, 'Gender' => 9, 'Phone' => 10, 'DateOfRegistration' => 11, 'DateOfBirth' => 12, 'LastVisitTime' => 13, 'GrinvichTimeOffset' => 14, 'Activated' => 15, 'VerificationCode' => 16, 'Domain' => 17, 'Status' => 18, 'Language' => 19, 'CurrentIp' => 20, 'AutoGrab' => 21, 'DomainToGrab' => 22, 'Profile' => 23, 'Preferences' => 24, 'SecurityLog' => 25, 'InvitedBy' => 26, 'InvitesAmmount' => 27, 'QuotaBytes' => 28, 'QuotaOriginals' => 29, 'QuotaBytesUsed' => 30, 'QuotaOriginalsUsed' => 31, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'sessionId' => 1, 'oldId' => 2, 'avatarId' => 3, 'email' => 4, 'password' => 5, 'nickName' => 6, 'firstName' => 7, 'lastName' => 8, 'gender' => 9, 'phone' => 10, 'dateOfRegistration' => 11, 'dateOfBirth' => 12, 'lastVisitTime' => 13, 'grinvichTimeOffset' => 14, 'activated' => 15, 'verificationCode' => 16, 'domain' => 17, 'status' => 18, 'language' => 19, 'currentIp' => 20, 'autoGrab' => 21, 'domainToGrab' => 22, 'profile' => 23, 'preferences' => 24, 'securityLog' => 25, 'invitedBy' => 26, 'invitesAmmount' => 27, 'quotaBytes' => 28, 'quotaOriginals' => 29, 'quotaBytesUsed' => 30, 'quotaOriginalsUsed' => 31, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::SESSIONID => 1, self::OLDID => 2, self::AVATARID => 3, self::EMAIL => 4, self::PASSWORD => 5, self::NICKNAME => 6, self::FIRSTNAME => 7, self::LASTNAME => 8, self::GENDER => 9, self::PHONE => 10, self::DATEOFREGISTRATION => 11, self::DATEOFBIRTH => 12, self::LASTVISITTIME => 13, self::GRINVICHTIMEOFFSET => 14, self::ACTIVATED => 15, self::VERIFICATIONCODE => 16, self::DOMAIN => 17, self::STATUS => 18, self::LANGUAGE => 19, self::CURRENTIP => 20, self::AUTOGRAB => 21, self::DOMAINTOGRAB => 22, self::PROFILE => 23, self::PREFERENCES => 24, self::SECURITYLOG => 25, self::INVITEDBY => 26, self::INVITESAMMOUNT => 27, self::QUOTABYTES => 28, self::QUOTAORIGINALS => 29, self::QUOTABYTESUSED => 30, self::QUOTAORIGINALSUSED => 31, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'SESSIONID' => 1, 'OLDID' => 2, 'AVATARID' => 3, 'EMAIL' => 4, 'PASSWORD' => 5, 'NICKNAME' => 6, 'FIRSTNAME' => 7, 'LASTNAME' => 8, 'GENDER' => 9, 'PHONE' => 10, 'DATEOFREGISTRATION' => 11, 'DATEOFBIRTH' => 12, 'LASTVISITTIME' => 13, 'GRINVICHTIMEOFFSET' => 14, 'ACTIVATED' => 15, 'VERIFICATIONCODE' => 16, 'DOMAIN' => 17, 'STATUS' => 18, 'LANGUAGE' => 19, 'CURRENTIP' => 20, 'AUTOGRAB' => 21, 'DOMAINTOGRAB' => 22, 'PROFILE' => 23, 'PREFERENCES' => 24, 'SECURITYLOG' => 25, 'INVITEDBY' => 26, 'INVITESAMMOUNT' => 27, 'QUOTABYTES' => 28, 'QUOTAORIGINALS' => 29, 'QUOTABYTESUSED' => 30, 'QUOTAORIGINALSUSED' => 31, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'sessionid' => 1, 'oldid' => 2, 'avatarid' => 3, 'email' => 4, 'password' => 5, 'nickname' => 6, 'firstname' => 7, 'lastname' => 8, 'gender' => 9, 'phone' => 10, 'dateofregistration' => 11, 'dateofbirth' => 12, 'lastvisittime' => 13, 'grinvichtimeoffset' => 14, 'activated' => 15, 'verificationcode' => 16, 'domain' => 17, 'status' => 18, 'language' => 19, 'currentip' => 20, 'autograb' => 21, 'domaintograb' => 22, 'profile' => 23, 'preferences' => 24, 'securitylog' => 25, 'invitedby' => 26, 'invitesammount' => 27, 'quotabytes' => 28, 'quotaoriginals' => 29, 'quotabytesused' => 30, 'quotaoriginalsused' => 31, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. UserPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(UserPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(UserPeer::ID);
			$criteria->addSelectColumn(UserPeer::SESSIONID);
			$criteria->addSelectColumn(UserPeer::OLDID);
			$criteria->addSelectColumn(UserPeer::AVATARID);
			$criteria->addSelectColumn(UserPeer::EMAIL);
			$criteria->addSelectColumn(UserPeer::PASSWORD);
			$criteria->addSelectColumn(UserPeer::NICKNAME);
			$criteria->addSelectColumn(UserPeer::FIRSTNAME);
			$criteria->addSelectColumn(UserPeer::LASTNAME);
			$criteria->addSelectColumn(UserPeer::GENDER);
			$criteria->addSelectColumn(UserPeer::PHONE);
			$criteria->addSelectColumn(UserPeer::DATEOFREGISTRATION);
			$criteria->addSelectColumn(UserPeer::DATEOFBIRTH);
			$criteria->addSelectColumn(UserPeer::LASTVISITTIME);
			$criteria->addSelectColumn(UserPeer::GRINVICHTIMEOFFSET);
			$criteria->addSelectColumn(UserPeer::ACTIVATED);
			$criteria->addSelectColumn(UserPeer::VERIFICATIONCODE);
			$criteria->addSelectColumn(UserPeer::DOMAIN);
			$criteria->addSelectColumn(UserPeer::STATUS);
			$criteria->addSelectColumn(UserPeer::LANGUAGE);
			$criteria->addSelectColumn(UserPeer::CURRENTIP);
			$criteria->addSelectColumn(UserPeer::AUTOGRAB);
			$criteria->addSelectColumn(UserPeer::DOMAINTOGRAB);
			$criteria->addSelectColumn(UserPeer::PROFILE);
			$criteria->addSelectColumn(UserPeer::PREFERENCES);
			$criteria->addSelectColumn(UserPeer::SECURITYLOG);
			$criteria->addSelectColumn(UserPeer::INVITEDBY);
			$criteria->addSelectColumn(UserPeer::INVITESAMMOUNT);
			$criteria->addSelectColumn(UserPeer::QUOTABYTES);
			$criteria->addSelectColumn(UserPeer::QUOTAORIGINALS);
			$criteria->addSelectColumn(UserPeer::QUOTABYTESUSED);
			$criteria->addSelectColumn(UserPeer::QUOTAORIGINALSUSED);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.SESSIONID');
			$criteria->addSelectColumn($alias . '.OLDID');
			$criteria->addSelectColumn($alias . '.AVATARID');
			$criteria->addSelectColumn($alias . '.EMAIL');
			$criteria->addSelectColumn($alias . '.PASSWORD');
			$criteria->addSelectColumn($alias . '.NICKNAME');
			$criteria->addSelectColumn($alias . '.FIRSTNAME');
			$criteria->addSelectColumn($alias . '.LASTNAME');
			$criteria->addSelectColumn($alias . '.GENDER');
			$criteria->addSelectColumn($alias . '.PHONE');
			$criteria->addSelectColumn($alias . '.DATEOFREGISTRATION');
			$criteria->addSelectColumn($alias . '.DATEOFBIRTH');
			$criteria->addSelectColumn($alias . '.LASTVISITTIME');
			$criteria->addSelectColumn($alias . '.GRINVICHTIMEOFFSET');
			$criteria->addSelectColumn($alias . '.ACTIVATED');
			$criteria->addSelectColumn($alias . '.VERIFICATIONCODE');
			$criteria->addSelectColumn($alias . '.DOMAIN');
			$criteria->addSelectColumn($alias . '.STATUS');
			$criteria->addSelectColumn($alias . '.LANGUAGE');
			$criteria->addSelectColumn($alias . '.CURRENTIP');
			$criteria->addSelectColumn($alias . '.AUTOGRAB');
			$criteria->addSelectColumn($alias . '.DOMAINTOGRAB');
			$criteria->addSelectColumn($alias . '.PROFILE');
			$criteria->addSelectColumn($alias . '.PREFERENCES');
			$criteria->addSelectColumn($alias . '.SECURITYLOG');
			$criteria->addSelectColumn($alias . '.INVITEDBY');
			$criteria->addSelectColumn($alias . '.INVITESAMMOUNT');
			$criteria->addSelectColumn($alias . '.QUOTABYTES');
			$criteria->addSelectColumn($alias . '.QUOTAORIGINALS');
			$criteria->addSelectColumn($alias . '.QUOTABYTESUSED');
			$criteria->addSelectColumn($alias . '.QUOTAORIGINALSUSED');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UserPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UserPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     User
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = UserPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return UserPeer::populateObjects(UserPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			UserPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      User $value A User object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A User object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof User) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or User object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     User Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to user
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = UserPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = UserPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = UserPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				UserPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (User object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = UserPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + UserPeer::NUM_COLUMNS;
		} else {
			$cls = UserPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			UserPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseUserPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseUserPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new UserTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? UserPeer::CLASS_DEFAULT : UserPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a User or Criteria object.
	 *
	 * @param      mixed $values Criteria or User object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from User object
		}

		if ($criteria->containsKey(UserPeer::ID) && $criteria->keyContainsValue(UserPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a User or Criteria object.
	 *
	 * @param      mixed $values Criteria or User object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(UserPeer::ID);
			$value = $criteria->remove(UserPeer::ID);
			if ($value) {
				$selectCriteria->add(UserPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(UserPeer::TABLE_NAME);
			}

		} else { // $values is User object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the user table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(UserPeer::TABLE_NAME, $con, UserPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			UserPeer::clearInstancePool();
			UserPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a User or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or User object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			UserPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof User) { // it's a model object
			// invalidate the cache for this single object
			UserPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(UserPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				UserPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			UserPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given User object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      User $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(UserPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(UserPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(UserPeer::DATABASE_NAME, UserPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     User
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = UserPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(UserPeer::DATABASE_NAME);
		$criteria->add(UserPeer::ID, $pk);

		$v = UserPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(UserPeer::DATABASE_NAME);
			$criteria->add(UserPeer::ID, $pks, Criteria::IN);
			$objs = UserPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseUserPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseUserPeer::buildTableMap();

