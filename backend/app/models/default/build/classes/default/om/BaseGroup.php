<?php


/**
 * Base class that represents a row from the 'group' table.
 *
 * 
 *
 * @package    propel.generator.default.om
 */
abstract class BaseGroup extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'GroupPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        GroupPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the owner_id field.
	 * @var        int
	 */
	protected $owner_id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the title field.
	 * @var        string
	 */
	protected $title;

	/**
	 * The value for the comment field.
	 * @var        string
	 */
	protected $comment;

	/**
	 * The value for the date field.
	 * @var        int
	 */
	protected $date;

	/**
	 * The value for the status field.
	 * @var        string
	 */
	protected $status;

	/**
	 * The value for the domain field.
	 * @var        string
	 */
	protected $domain;

	/**
	 * @var        array UserGroup[] Collection to store aggregation of UserGroup objects.
	 */
	protected $collUserGroups;

	/**
	 * @var        array GroupPost[] Collection to store aggregation of GroupPost objects.
	 */
	protected $collGroupPosts;

	/**
	 * @var        array GroupMessage[] Collection to store aggregation of GroupMessage objects.
	 */
	protected $collGroupMessages;

	/**
	 * @var        array GroupMedia[] Collection to store aggregation of GroupMedia objects.
	 */
	protected $collGroupMedias;

	/**
	 * @var        array User[] Collection to store aggregation of User objects.
	 */
	protected $collUsers;

	/**
	 * @var        array Post[] Collection to store aggregation of Post objects.
	 */
	protected $collPosts;

	/**
	 * @var        array Message[] Collection to store aggregation of Message objects.
	 */
	protected $collMessages;

	/**
	 * @var        array Media[] Collection to store aggregation of Media objects.
	 */
	protected $collMedias;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [owner_id] column value.
	 * 
	 * @return     int
	 */
	public function getOwnerId()
	{
		return $this->owner_id;
	}

	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [title] column value.
	 * 
	 * @return     string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Get the [comment] column value.
	 * 
	 * @return     string
	 */
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * Get the [date] column value.
	 * 
	 * @return     int
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * Get the [status] column value.
	 * 
	 * @return     string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [domain] column value.
	 * 
	 * @return     string
	 */
	public function getDomain()
	{
		return $this->domain;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GroupPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [owner_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setOwnerId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->owner_id !== $v) {
			$this->owner_id = $v;
			$this->modifiedColumns[] = GroupPeer::OWNER_ID;
		}

		return $this;
	} // setOwnerId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = GroupPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = GroupPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [comment] column.
	 * 
	 * @param      string $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setComment($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = GroupPeer::COMMENT;
		}

		return $this;
	} // setComment()

	/**
	 * Set the value of [date] column.
	 * 
	 * @param      int $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setDate($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->date !== $v) {
			$this->date = $v;
			$this->modifiedColumns[] = GroupPeer::DATE;
		}

		return $this;
	} // setDate()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = GroupPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [domain] column.
	 * 
	 * @param      string $v new value
	 * @return     Group The current object (for fluent API support)
	 */
	public function setDomain($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->domain !== $v) {
			$this->domain = $v;
			$this->modifiedColumns[] = GroupPeer::DOMAIN;
		}

		return $this;
	} // setDomain()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->owner_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->title = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->comment = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->date = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->status = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->domain = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = GroupPeer::NUM_COLUMNS - GroupPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Group object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = GroupPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collUserGroups = null;

			$this->collGroupPosts = null;

			$this->collGroupMessages = null;

			$this->collGroupMedias = null;

			$this->collUsers = null;
			$this->collPosts = null;
			$this->collMessages = null;
			$this->collMedias = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				GroupQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				GroupPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = GroupPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(GroupPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.GroupPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = GroupPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collUserGroups !== null) {
				foreach ($this->collUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGroupPosts !== null) {
				foreach ($this->collGroupPosts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGroupMessages !== null) {
				foreach ($this->collGroupMessages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGroupMedias !== null) {
				foreach ($this->collGroupMedias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = GroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUserGroups !== null) {
					foreach ($this->collUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGroupPosts !== null) {
					foreach ($this->collGroupPosts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGroupMessages !== null) {
					foreach ($this->collGroupMessages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGroupMedias !== null) {
					foreach ($this->collGroupMedias as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getOwnerId();
				break;
			case 2:
				return $this->getName();
				break;
			case 3:
				return $this->getTitle();
				break;
			case 4:
				return $this->getComment();
				break;
			case 5:
				return $this->getDate();
				break;
			case 6:
				return $this->getStatus();
				break;
			case 7:
				return $this->getDomain();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['Group'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Group'][$this->getPrimaryKey()] = true;
		$keys = GroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getOwnerId(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getTitle(),
			$keys[4] => $this->getComment(),
			$keys[5] => $this->getDate(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getDomain(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collUserGroups) {
				$result['UserGroups'] = $this->collUserGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collGroupPosts) {
				$result['GroupPosts'] = $this->collGroupPosts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collGroupMessages) {
				$result['GroupMessages'] = $this->collGroupMessages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collGroupMedias) {
				$result['GroupMedias'] = $this->collGroupMedias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setOwnerId($value);
				break;
			case 2:
				$this->setName($value);
				break;
			case 3:
				$this->setTitle($value);
				break;
			case 4:
				$this->setComment($value);
				break;
			case 5:
				$this->setDate($value);
				break;
			case 6:
				$this->setStatus($value);
				break;
			case 7:
				$this->setDomain($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOwnerId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitle($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setComment($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDomain($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(GroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(GroupPeer::ID)) $criteria->add(GroupPeer::ID, $this->id);
		if ($this->isColumnModified(GroupPeer::OWNER_ID)) $criteria->add(GroupPeer::OWNER_ID, $this->owner_id);
		if ($this->isColumnModified(GroupPeer::NAME)) $criteria->add(GroupPeer::NAME, $this->name);
		if ($this->isColumnModified(GroupPeer::TITLE)) $criteria->add(GroupPeer::TITLE, $this->title);
		if ($this->isColumnModified(GroupPeer::COMMENT)) $criteria->add(GroupPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(GroupPeer::DATE)) $criteria->add(GroupPeer::DATE, $this->date);
		if ($this->isColumnModified(GroupPeer::STATUS)) $criteria->add(GroupPeer::STATUS, $this->status);
		if ($this->isColumnModified(GroupPeer::DOMAIN)) $criteria->add(GroupPeer::DOMAIN, $this->domain);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GroupPeer::DATABASE_NAME);
		$criteria->add(GroupPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Group (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setOwnerId($this->owner_id);
		$copyObj->setName($this->name);
		$copyObj->setTitle($this->title);
		$copyObj->setComment($this->comment);
		$copyObj->setDate($this->date);
		$copyObj->setStatus($this->status);
		$copyObj->setDomain($this->domain);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getUserGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserGroup($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getGroupPosts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGroupPost($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getGroupMessages() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGroupMessage($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getGroupMedias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGroupMedia($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Group Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     GroupPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new GroupPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collUserGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserGroups()
	 */
	public function clearUserGroups()
	{
		$this->collUserGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserGroups collection.
	 *
	 * By default this just sets the collUserGroups collection to an empty array (like clearcollUserGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUserGroups($overrideExisting = true)
	{
		if (null !== $this->collUserGroups && !$overrideExisting) {
			return;
		}
		$this->collUserGroups = new PropelObjectCollection();
		$this->collUserGroups->setModel('UserGroup');
	}

	/**
	 * Gets an array of UserGroup objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Group is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array UserGroup[] List of UserGroup objects
	 * @throws     PropelException
	 */
	public function getUserGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserGroups) {
				// return empty collection
				$this->initUserGroups();
			} else {
				$collUserGroups = UserGroupQuery::create(null, $criteria)
					->filterByGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collUserGroups;
				}
				$this->collUserGroups = $collUserGroups;
			}
		}
		return $this->collUserGroups;
	}

	/**
	 * Returns the number of related UserGroup objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserGroup objects.
	 * @throws     PropelException
	 */
	public function countUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserGroups) {
				return 0;
			} else {
				$query = UserGroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByGroup($this)
					->count($con);
			}
		} else {
			return count($this->collUserGroups);
		}
	}

	/**
	 * Method called to associate a UserGroup object to this object
	 * through the UserGroup foreign key attribute.
	 *
	 * @param      UserGroup $l UserGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserGroup(UserGroup $l)
	{
		if ($this->collUserGroups === null) {
			$this->initUserGroups();
		}
		if (!$this->collUserGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->collUserGroups[]= $l;
			$l->setGroup($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Group is new, it will return
	 * an empty collection; or if this Group has previously
	 * been saved, it will retrieve related UserGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Group.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserGroup[] List of UserGroup objects
	 */
	public function getUserGroupsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserGroupQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getUserGroups($query, $con);
	}

	/**
	 * Clears out the collGroupPosts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGroupPosts()
	 */
	public function clearGroupPosts()
	{
		$this->collGroupPosts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGroupPosts collection.
	 *
	 * By default this just sets the collGroupPosts collection to an empty array (like clearcollGroupPosts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initGroupPosts($overrideExisting = true)
	{
		if (null !== $this->collGroupPosts && !$overrideExisting) {
			return;
		}
		$this->collGroupPosts = new PropelObjectCollection();
		$this->collGroupPosts->setModel('GroupPost');
	}

	/**
	 * Gets an array of GroupPost objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Group is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array GroupPost[] List of GroupPost objects
	 * @throws     PropelException
	 */
	public function getGroupPosts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collGroupPosts || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroupPosts) {
				// return empty collection
				$this->initGroupPosts();
			} else {
				$collGroupPosts = GroupPostQuery::create(null, $criteria)
					->filterByGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collGroupPosts;
				}
				$this->collGroupPosts = $collGroupPosts;
			}
		}
		return $this->collGroupPosts;
	}

	/**
	 * Returns the number of related GroupPost objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related GroupPost objects.
	 * @throws     PropelException
	 */
	public function countGroupPosts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collGroupPosts || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroupPosts) {
				return 0;
			} else {
				$query = GroupPostQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByGroup($this)
					->count($con);
			}
		} else {
			return count($this->collGroupPosts);
		}
	}

	/**
	 * Method called to associate a GroupPost object to this object
	 * through the GroupPost foreign key attribute.
	 *
	 * @param      GroupPost $l GroupPost
	 * @return     void
	 * @throws     PropelException
	 */
	public function addGroupPost(GroupPost $l)
	{
		if ($this->collGroupPosts === null) {
			$this->initGroupPosts();
		}
		if (!$this->collGroupPosts->contains($l)) { // only add it if the **same** object is not already associated
			$this->collGroupPosts[]= $l;
			$l->setGroup($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Group is new, it will return
	 * an empty collection; or if this Group has previously
	 * been saved, it will retrieve related GroupPosts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Group.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array GroupPost[] List of GroupPost objects
	 */
	public function getGroupPostsJoinPost($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = GroupPostQuery::create(null, $criteria);
		$query->joinWith('Post', $join_behavior);

		return $this->getGroupPosts($query, $con);
	}

	/**
	 * Clears out the collGroupMessages collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGroupMessages()
	 */
	public function clearGroupMessages()
	{
		$this->collGroupMessages = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGroupMessages collection.
	 *
	 * By default this just sets the collGroupMessages collection to an empty array (like clearcollGroupMessages());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initGroupMessages($overrideExisting = true)
	{
		if (null !== $this->collGroupMessages && !$overrideExisting) {
			return;
		}
		$this->collGroupMessages = new PropelObjectCollection();
		$this->collGroupMessages->setModel('GroupMessage');
	}

	/**
	 * Gets an array of GroupMessage objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Group is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array GroupMessage[] List of GroupMessage objects
	 * @throws     PropelException
	 */
	public function getGroupMessages($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collGroupMessages || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroupMessages) {
				// return empty collection
				$this->initGroupMessages();
			} else {
				$collGroupMessages = GroupMessageQuery::create(null, $criteria)
					->filterByGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collGroupMessages;
				}
				$this->collGroupMessages = $collGroupMessages;
			}
		}
		return $this->collGroupMessages;
	}

	/**
	 * Returns the number of related GroupMessage objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related GroupMessage objects.
	 * @throws     PropelException
	 */
	public function countGroupMessages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collGroupMessages || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroupMessages) {
				return 0;
			} else {
				$query = GroupMessageQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByGroup($this)
					->count($con);
			}
		} else {
			return count($this->collGroupMessages);
		}
	}

	/**
	 * Method called to associate a GroupMessage object to this object
	 * through the GroupMessage foreign key attribute.
	 *
	 * @param      GroupMessage $l GroupMessage
	 * @return     void
	 * @throws     PropelException
	 */
	public function addGroupMessage(GroupMessage $l)
	{
		if ($this->collGroupMessages === null) {
			$this->initGroupMessages();
		}
		if (!$this->collGroupMessages->contains($l)) { // only add it if the **same** object is not already associated
			$this->collGroupMessages[]= $l;
			$l->setGroup($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Group is new, it will return
	 * an empty collection; or if this Group has previously
	 * been saved, it will retrieve related GroupMessages from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Group.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array GroupMessage[] List of GroupMessage objects
	 */
	public function getGroupMessagesJoinMessage($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = GroupMessageQuery::create(null, $criteria);
		$query->joinWith('Message', $join_behavior);

		return $this->getGroupMessages($query, $con);
	}

	/**
	 * Clears out the collGroupMedias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGroupMedias()
	 */
	public function clearGroupMedias()
	{
		$this->collGroupMedias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGroupMedias collection.
	 *
	 * By default this just sets the collGroupMedias collection to an empty array (like clearcollGroupMedias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initGroupMedias($overrideExisting = true)
	{
		if (null !== $this->collGroupMedias && !$overrideExisting) {
			return;
		}
		$this->collGroupMedias = new PropelObjectCollection();
		$this->collGroupMedias->setModel('GroupMedia');
	}

	/**
	 * Gets an array of GroupMedia objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Group is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array GroupMedia[] List of GroupMedia objects
	 * @throws     PropelException
	 */
	public function getGroupMedias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collGroupMedias || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroupMedias) {
				// return empty collection
				$this->initGroupMedias();
			} else {
				$collGroupMedias = GroupMediaQuery::create(null, $criteria)
					->filterByGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collGroupMedias;
				}
				$this->collGroupMedias = $collGroupMedias;
			}
		}
		return $this->collGroupMedias;
	}

	/**
	 * Returns the number of related GroupMedia objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related GroupMedia objects.
	 * @throws     PropelException
	 */
	public function countGroupMedias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collGroupMedias || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroupMedias) {
				return 0;
			} else {
				$query = GroupMediaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByGroup($this)
					->count($con);
			}
		} else {
			return count($this->collGroupMedias);
		}
	}

	/**
	 * Method called to associate a GroupMedia object to this object
	 * through the GroupMedia foreign key attribute.
	 *
	 * @param      GroupMedia $l GroupMedia
	 * @return     void
	 * @throws     PropelException
	 */
	public function addGroupMedia(GroupMedia $l)
	{
		if ($this->collGroupMedias === null) {
			$this->initGroupMedias();
		}
		if (!$this->collGroupMedias->contains($l)) { // only add it if the **same** object is not already associated
			$this->collGroupMedias[]= $l;
			$l->setGroup($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Group is new, it will return
	 * an empty collection; or if this Group has previously
	 * been saved, it will retrieve related GroupMedias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Group.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array GroupMedia[] List of GroupMedia objects
	 */
	public function getGroupMediasJoinMedia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = GroupMediaQuery::create(null, $criteria);
		$query->joinWith('Media', $join_behavior);

		return $this->getGroupMedias($query, $con);
	}

	/**
	 * Clears out the collUsers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsers()
	 */
	public function clearUsers()
	{
		$this->collUsers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsers collection.
	 *
	 * By default this just sets the collUsers collection to an empty collection (like clearUsers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUsers()
	{
		$this->collUsers = new PropelObjectCollection();
		$this->collUsers->setModel('User');
	}

	/**
	 * Gets a collection of User objects related by a many-to-many relationship
	 * to the current object by way of the user_group cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Group is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array User[] List of User objects
	 */
	public function getUsers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsers) {
				// return empty collection
				$this->initUsers();
			} else {
				$collUsers = UserQuery::create(null, $criteria)
					->filterByGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collUsers;
				}
				$this->collUsers = $collUsers;
			}
		}
		return $this->collUsers;
	}

	/**
	 * Gets the number of User objects related by a many-to-many relationship
	 * to the current object by way of the user_group cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related User objects
	 */
	public function countUsers($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsers) {
				return 0;
			} else {
				$query = UserQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByGroup($this)
					->count($con);
			}
		} else {
			return count($this->collUsers);
		}
	}

	/**
	 * Associate a User object to this object
	 * through the user_group cross reference table.
	 *
	 * @param      User $user The UserGroup object to relate
	 * @return     void
	 */
	public function addUser($user)
	{
		if ($this->collUsers === null) {
			$this->initUsers();
		}
		if (!$this->collUsers->contains($user)) { // only add it if the **same** object is not already associated
			$userGroup = new UserGroup();
			$userGroup->setUser($user);
			$this->addUserGroup($userGroup);

			$this->collUsers[]= $user;
		}
	}

	/**
	 * Clears out the collPosts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPosts()
	 */
	public function clearPosts()
	{
		$this->collPosts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPosts collection.
	 *
	 * By default this just sets the collPosts collection to an empty collection (like clearPosts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPosts()
	{
		$this->collPosts = new PropelObjectCollection();
		$this->collPosts->setModel('Post');
	}

	/**
	 * Gets a collection of Post objects related by a many-to-many relationship
	 * to the current object by way of the group_post cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Group is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Post[] List of Post objects
	 */
	public function getPosts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPosts || null !== $criteria) {
			if ($this->isNew() && null === $this->collPosts) {
				// return empty collection
				$this->initPosts();
			} else {
				$collPosts = PostQuery::create(null, $criteria)
					->filterByGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collPosts;
				}
				$this->collPosts = $collPosts;
			}
		}
		return $this->collPosts;
	}

	/**
	 * Gets the number of Post objects related by a many-to-many relationship
	 * to the current object by way of the group_post cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Post objects
	 */
	public function countPosts($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPosts || null !== $criteria) {
			if ($this->isNew() && null === $this->collPosts) {
				return 0;
			} else {
				$query = PostQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByGroup($this)
					->count($con);
			}
		} else {
			return count($this->collPosts);
		}
	}

	/**
	 * Associate a Post object to this object
	 * through the group_post cross reference table.
	 *
	 * @param      Post $post The GroupPost object to relate
	 * @return     void
	 */
	public function addPost($post)
	{
		if ($this->collPosts === null) {
			$this->initPosts();
		}
		if (!$this->collPosts->contains($post)) { // only add it if the **same** object is not already associated
			$groupPost = new GroupPost();
			$groupPost->setPost($post);
			$this->addGroupPost($groupPost);

			$this->collPosts[]= $post;
		}
	}

	/**
	 * Clears out the collMessages collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMessages()
	 */
	public function clearMessages()
	{
		$this->collMessages = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMessages collection.
	 *
	 * By default this just sets the collMessages collection to an empty collection (like clearMessages());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initMessages()
	{
		$this->collMessages = new PropelObjectCollection();
		$this->collMessages->setModel('Message');
	}

	/**
	 * Gets a collection of Message objects related by a many-to-many relationship
	 * to the current object by way of the group_message cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Group is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Message[] List of Message objects
	 */
	public function getMessages($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMessages || null !== $criteria) {
			if ($this->isNew() && null === $this->collMessages) {
				// return empty collection
				$this->initMessages();
			} else {
				$collMessages = MessageQuery::create(null, $criteria)
					->filterByGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collMessages;
				}
				$this->collMessages = $collMessages;
			}
		}
		return $this->collMessages;
	}

	/**
	 * Gets the number of Message objects related by a many-to-many relationship
	 * to the current object by way of the group_message cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Message objects
	 */
	public function countMessages($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMessages || null !== $criteria) {
			if ($this->isNew() && null === $this->collMessages) {
				return 0;
			} else {
				$query = MessageQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByGroup($this)
					->count($con);
			}
		} else {
			return count($this->collMessages);
		}
	}

	/**
	 * Associate a Message object to this object
	 * through the group_message cross reference table.
	 *
	 * @param      Message $message The GroupMessage object to relate
	 * @return     void
	 */
	public function addMessage($message)
	{
		if ($this->collMessages === null) {
			$this->initMessages();
		}
		if (!$this->collMessages->contains($message)) { // only add it if the **same** object is not already associated
			$groupMessage = new GroupMessage();
			$groupMessage->setMessage($message);
			$this->addGroupMessage($groupMessage);

			$this->collMessages[]= $message;
		}
	}

	/**
	 * Clears out the collMedias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMedias()
	 */
	public function clearMedias()
	{
		$this->collMedias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMedias collection.
	 *
	 * By default this just sets the collMedias collection to an empty collection (like clearMedias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initMedias()
	{
		$this->collMedias = new PropelObjectCollection();
		$this->collMedias->setModel('Media');
	}

	/**
	 * Gets a collection of Media objects related by a many-to-many relationship
	 * to the current object by way of the group_media cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Group is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Media[] List of Media objects
	 */
	public function getMedias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMedias || null !== $criteria) {
			if ($this->isNew() && null === $this->collMedias) {
				// return empty collection
				$this->initMedias();
			} else {
				$collMedias = MediaQuery::create(null, $criteria)
					->filterByGroup($this)
					->find($con);
				if (null !== $criteria) {
					return $collMedias;
				}
				$this->collMedias = $collMedias;
			}
		}
		return $this->collMedias;
	}

	/**
	 * Gets the number of Media objects related by a many-to-many relationship
	 * to the current object by way of the group_media cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Media objects
	 */
	public function countMedias($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMedias || null !== $criteria) {
			if ($this->isNew() && null === $this->collMedias) {
				return 0;
			} else {
				$query = MediaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByGroup($this)
					->count($con);
			}
		} else {
			return count($this->collMedias);
		}
	}

	/**
	 * Associate a Media object to this object
	 * through the group_media cross reference table.
	 *
	 * @param      Media $media The GroupMedia object to relate
	 * @return     void
	 */
	public function addMedia($media)
	{
		if ($this->collMedias === null) {
			$this->initMedias();
		}
		if (!$this->collMedias->contains($media)) { // only add it if the **same** object is not already associated
			$groupMedia = new GroupMedia();
			$groupMedia->setMedia($media);
			$this->addGroupMedia($groupMedia);

			$this->collMedias[]= $media;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->owner_id = null;
		$this->name = null;
		$this->title = null;
		$this->comment = null;
		$this->date = null;
		$this->status = null;
		$this->domain = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collUserGroups) {
				foreach ($this->collUserGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collGroupPosts) {
				foreach ($this->collGroupPosts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collGroupMessages) {
				foreach ($this->collGroupMessages as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collGroupMedias) {
				foreach ($this->collGroupMedias as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collUserGroups instanceof PropelCollection) {
			$this->collUserGroups->clearIterator();
		}
		$this->collUserGroups = null;
		if ($this->collGroupPosts instanceof PropelCollection) {
			$this->collGroupPosts->clearIterator();
		}
		$this->collGroupPosts = null;
		if ($this->collGroupMessages instanceof PropelCollection) {
			$this->collGroupMessages->clearIterator();
		}
		$this->collGroupMessages = null;
		if ($this->collGroupMedias instanceof PropelCollection) {
			$this->collGroupMedias->clearIterator();
		}
		$this->collGroupMedias = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(GroupPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseGroup
