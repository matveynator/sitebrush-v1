<?php


/**
 * Base class that represents a row from the 'message' table.
 *
 * 
 *
 * @package    propel.generator.default.om
 */
abstract class BaseMessage extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'MessagePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        MessagePeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the to field.
	 * @var        int
	 */
	protected $to;

	/**
	 * The value for the from field.
	 * @var        int
	 */
	protected $from;

	/**
	 * The value for the nickname field.
	 * @var        string
	 */
	protected $nickname;

	/**
	 * The value for the order field.
	 * @var        string
	 */
	protected $order;

	/**
	 * The value for the date field.
	 * @var        int
	 */
	protected $date;

	/**
	 * The value for the subject field.
	 * @var        string
	 */
	protected $subject;

	/**
	 * The value for the text field.
	 * @var        string
	 */
	protected $text;

	/**
	 * The value for the type field.
	 * @var        string
	 */
	protected $type;

	/**
	 * The value for the unread field.
	 * @var        boolean
	 */
	protected $unread;

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
	 * @var        array UserMessage[] Collection to store aggregation of UserMessage objects.
	 */
	protected $collUserMessages;

	/**
	 * @var        array GroupMessage[] Collection to store aggregation of GroupMessage objects.
	 */
	protected $collGroupMessages;

	/**
	 * @var        array PostMessage[] Collection to store aggregation of PostMessage objects.
	 */
	protected $collPostMessages;

	/**
	 * @var        array MessageMedia[] Collection to store aggregation of MessageMedia objects.
	 */
	protected $collMessageMedias;

	/**
	 * @var        array User[] Collection to store aggregation of User objects.
	 */
	protected $collUsers;

	/**
	 * @var        array Group[] Collection to store aggregation of Group objects.
	 */
	protected $collGroups;

	/**
	 * @var        array Post[] Collection to store aggregation of Post objects.
	 */
	protected $collPosts;

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
	 * Get the [to] column value.
	 * 
	 * @return     int
	 */
	public function getTo()
	{
		return $this->to;
	}

	/**
	 * Get the [from] column value.
	 * 
	 * @return     int
	 */
	public function getFrom()
	{
		return $this->from;
	}

	/**
	 * Get the [nickname] column value.
	 * 
	 * @return     string
	 */
	public function getNickName()
	{
		return $this->nickname;
	}

	/**
	 * Get the [order] column value.
	 * 
	 * @return     string
	 */
	public function getOrder()
	{
		return $this->order;
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
	 * Get the [subject] column value.
	 * 
	 * @return     string
	 */
	public function getSubject()
	{
		return $this->subject;
	}

	/**
	 * Get the [text] column value.
	 * 
	 * @return     string
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * Get the [type] column value.
	 * 
	 * @return     string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Get the [unread] column value.
	 * 
	 * @return     boolean
	 */
	public function getUnread()
	{
		return $this->unread;
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
	 * @return     Message The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MessagePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [to] column.
	 * 
	 * @param      int $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setTo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->to !== $v) {
			$this->to = $v;
			$this->modifiedColumns[] = MessagePeer::TO;
		}

		return $this;
	} // setTo()

	/**
	 * Set the value of [from] column.
	 * 
	 * @param      int $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setFrom($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->from !== $v) {
			$this->from = $v;
			$this->modifiedColumns[] = MessagePeer::FROM;
		}

		return $this;
	} // setFrom()

	/**
	 * Set the value of [nickname] column.
	 * 
	 * @param      string $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setNickName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nickname !== $v) {
			$this->nickname = $v;
			$this->modifiedColumns[] = MessagePeer::NICKNAME;
		}

		return $this;
	} // setNickName()

	/**
	 * Set the value of [order] column.
	 * 
	 * @param      string $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setOrder($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->order !== $v) {
			$this->order = $v;
			$this->modifiedColumns[] = MessagePeer::ORDER;
		}

		return $this;
	} // setOrder()

	/**
	 * Set the value of [date] column.
	 * 
	 * @param      int $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setDate($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->date !== $v) {
			$this->date = $v;
			$this->modifiedColumns[] = MessagePeer::DATE;
		}

		return $this;
	} // setDate()

	/**
	 * Set the value of [subject] column.
	 * 
	 * @param      string $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setSubject($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->subject !== $v) {
			$this->subject = $v;
			$this->modifiedColumns[] = MessagePeer::SUBJECT;
		}

		return $this;
	} // setSubject()

	/**
	 * Set the value of [text] column.
	 * 
	 * @param      string $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setText($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->text !== $v) {
			$this->text = $v;
			$this->modifiedColumns[] = MessagePeer::TEXT;
		}

		return $this;
	} // setText()

	/**
	 * Set the value of [type] column.
	 * 
	 * @param      string $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = MessagePeer::TYPE;
		}

		return $this;
	} // setType()

	/**
	 * Set the value of [unread] column.
	 * 
	 * @param      boolean $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setUnread($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->unread !== $v) {
			$this->unread = $v;
			$this->modifiedColumns[] = MessagePeer::UNREAD;
		}

		return $this;
	} // setUnread()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = MessagePeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [domain] column.
	 * 
	 * @param      string $v new value
	 * @return     Message The current object (for fluent API support)
	 */
	public function setDomain($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->domain !== $v) {
			$this->domain = $v;
			$this->modifiedColumns[] = MessagePeer::DOMAIN;
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
			$this->to = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->from = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->nickname = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->order = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->date = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->subject = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->text = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->type = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->unread = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
			$this->status = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->domain = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = MessagePeer::NUM_COLUMNS - MessagePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Message object", $e);
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
			$con = Propel::getConnection(MessagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = MessagePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collUserMessages = null;

			$this->collGroupMessages = null;

			$this->collPostMessages = null;

			$this->collMessageMedias = null;

			$this->collUsers = null;
			$this->collGroups = null;
			$this->collPosts = null;
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
			$con = Propel::getConnection(MessagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				MessageQuery::create()
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
			$con = Propel::getConnection(MessagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				MessagePeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = MessagePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(MessagePeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.MessagePeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = MessagePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collUserMessages !== null) {
				foreach ($this->collUserMessages as $referrerFK) {
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

			if ($this->collPostMessages !== null) {
				foreach ($this->collPostMessages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMessageMedias !== null) {
				foreach ($this->collMessageMedias as $referrerFK) {
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


			if (($retval = MessagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUserMessages !== null) {
					foreach ($this->collUserMessages as $referrerFK) {
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

				if ($this->collPostMessages !== null) {
					foreach ($this->collPostMessages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMessageMedias !== null) {
					foreach ($this->collMessageMedias as $referrerFK) {
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
		$pos = MessagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTo();
				break;
			case 2:
				return $this->getFrom();
				break;
			case 3:
				return $this->getNickName();
				break;
			case 4:
				return $this->getOrder();
				break;
			case 5:
				return $this->getDate();
				break;
			case 6:
				return $this->getSubject();
				break;
			case 7:
				return $this->getText();
				break;
			case 8:
				return $this->getType();
				break;
			case 9:
				return $this->getUnread();
				break;
			case 10:
				return $this->getStatus();
				break;
			case 11:
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
		if (isset($alreadyDumpedObjects['Message'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Message'][$this->getPrimaryKey()] = true;
		$keys = MessagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTo(),
			$keys[2] => $this->getFrom(),
			$keys[3] => $this->getNickName(),
			$keys[4] => $this->getOrder(),
			$keys[5] => $this->getDate(),
			$keys[6] => $this->getSubject(),
			$keys[7] => $this->getText(),
			$keys[8] => $this->getType(),
			$keys[9] => $this->getUnread(),
			$keys[10] => $this->getStatus(),
			$keys[11] => $this->getDomain(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collUserMessages) {
				$result['UserMessages'] = $this->collUserMessages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collGroupMessages) {
				$result['GroupMessages'] = $this->collGroupMessages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPostMessages) {
				$result['PostMessages'] = $this->collPostMessages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collMessageMedias) {
				$result['MessageMedias'] = $this->collMessageMedias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = MessagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTo($value);
				break;
			case 2:
				$this->setFrom($value);
				break;
			case 3:
				$this->setNickName($value);
				break;
			case 4:
				$this->setOrder($value);
				break;
			case 5:
				$this->setDate($value);
				break;
			case 6:
				$this->setSubject($value);
				break;
			case 7:
				$this->setText($value);
				break;
			case 8:
				$this->setType($value);
				break;
			case 9:
				$this->setUnread($value);
				break;
			case 10:
				$this->setStatus($value);
				break;
			case 11:
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
		$keys = MessagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFrom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNickName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOrder($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSubject($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setText($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setType($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUnread($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStatus($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDomain($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(MessagePeer::DATABASE_NAME);

		if ($this->isColumnModified(MessagePeer::ID)) $criteria->add(MessagePeer::ID, $this->id);
		if ($this->isColumnModified(MessagePeer::TO)) $criteria->add(MessagePeer::TO, $this->to);
		if ($this->isColumnModified(MessagePeer::FROM)) $criteria->add(MessagePeer::FROM, $this->from);
		if ($this->isColumnModified(MessagePeer::NICKNAME)) $criteria->add(MessagePeer::NICKNAME, $this->nickname);
		if ($this->isColumnModified(MessagePeer::ORDER)) $criteria->add(MessagePeer::ORDER, $this->order);
		if ($this->isColumnModified(MessagePeer::DATE)) $criteria->add(MessagePeer::DATE, $this->date);
		if ($this->isColumnModified(MessagePeer::SUBJECT)) $criteria->add(MessagePeer::SUBJECT, $this->subject);
		if ($this->isColumnModified(MessagePeer::TEXT)) $criteria->add(MessagePeer::TEXT, $this->text);
		if ($this->isColumnModified(MessagePeer::TYPE)) $criteria->add(MessagePeer::TYPE, $this->type);
		if ($this->isColumnModified(MessagePeer::UNREAD)) $criteria->add(MessagePeer::UNREAD, $this->unread);
		if ($this->isColumnModified(MessagePeer::STATUS)) $criteria->add(MessagePeer::STATUS, $this->status);
		if ($this->isColumnModified(MessagePeer::DOMAIN)) $criteria->add(MessagePeer::DOMAIN, $this->domain);

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
		$criteria = new Criteria(MessagePeer::DATABASE_NAME);
		$criteria->add(MessagePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Message (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setTo($this->to);
		$copyObj->setFrom($this->from);
		$copyObj->setNickName($this->nickname);
		$copyObj->setOrder($this->order);
		$copyObj->setDate($this->date);
		$copyObj->setSubject($this->subject);
		$copyObj->setText($this->text);
		$copyObj->setType($this->type);
		$copyObj->setUnread($this->unread);
		$copyObj->setStatus($this->status);
		$copyObj->setDomain($this->domain);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getUserMessages() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserMessage($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getGroupMessages() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGroupMessage($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPostMessages() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPostMessage($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getMessageMedias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addMessageMedia($relObj->copy($deepCopy));
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
	 * @return     Message Clone of current object.
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
	 * @return     MessagePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new MessagePeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collUserMessages collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserMessages()
	 */
	public function clearUserMessages()
	{
		$this->collUserMessages = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserMessages collection.
	 *
	 * By default this just sets the collUserMessages collection to an empty array (like clearcollUserMessages());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUserMessages($overrideExisting = true)
	{
		if (null !== $this->collUserMessages && !$overrideExisting) {
			return;
		}
		$this->collUserMessages = new PropelObjectCollection();
		$this->collUserMessages->setModel('UserMessage');
	}

	/**
	 * Gets an array of UserMessage objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Message is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array UserMessage[] List of UserMessage objects
	 * @throws     PropelException
	 */
	public function getUserMessages($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUserMessages || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserMessages) {
				// return empty collection
				$this->initUserMessages();
			} else {
				$collUserMessages = UserMessageQuery::create(null, $criteria)
					->filterByMessage($this)
					->find($con);
				if (null !== $criteria) {
					return $collUserMessages;
				}
				$this->collUserMessages = $collUserMessages;
			}
		}
		return $this->collUserMessages;
	}

	/**
	 * Returns the number of related UserMessage objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserMessage objects.
	 * @throws     PropelException
	 */
	public function countUserMessages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUserMessages || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserMessages) {
				return 0;
			} else {
				$query = UserMessageQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByMessage($this)
					->count($con);
			}
		} else {
			return count($this->collUserMessages);
		}
	}

	/**
	 * Method called to associate a UserMessage object to this object
	 * through the UserMessage foreign key attribute.
	 *
	 * @param      UserMessage $l UserMessage
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserMessage(UserMessage $l)
	{
		if ($this->collUserMessages === null) {
			$this->initUserMessages();
		}
		if (!$this->collUserMessages->contains($l)) { // only add it if the **same** object is not already associated
			$this->collUserMessages[]= $l;
			$l->setMessage($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Message is new, it will return
	 * an empty collection; or if this Message has previously
	 * been saved, it will retrieve related UserMessages from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Message.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserMessage[] List of UserMessage objects
	 */
	public function getUserMessagesJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserMessageQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getUserMessages($query, $con);
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
	 * If this Message is new, it will return
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
					->filterByMessage($this)
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
					->filterByMessage($this)
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
			$l->setMessage($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Message is new, it will return
	 * an empty collection; or if this Message has previously
	 * been saved, it will retrieve related GroupMessages from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Message.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array GroupMessage[] List of GroupMessage objects
	 */
	public function getGroupMessagesJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = GroupMessageQuery::create(null, $criteria);
		$query->joinWith('Group', $join_behavior);

		return $this->getGroupMessages($query, $con);
	}

	/**
	 * Clears out the collPostMessages collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPostMessages()
	 */
	public function clearPostMessages()
	{
		$this->collPostMessages = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPostMessages collection.
	 *
	 * By default this just sets the collPostMessages collection to an empty array (like clearcollPostMessages());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPostMessages($overrideExisting = true)
	{
		if (null !== $this->collPostMessages && !$overrideExisting) {
			return;
		}
		$this->collPostMessages = new PropelObjectCollection();
		$this->collPostMessages->setModel('PostMessage');
	}

	/**
	 * Gets an array of PostMessage objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Message is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PostMessage[] List of PostMessage objects
	 * @throws     PropelException
	 */
	public function getPostMessages($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPostMessages || null !== $criteria) {
			if ($this->isNew() && null === $this->collPostMessages) {
				// return empty collection
				$this->initPostMessages();
			} else {
				$collPostMessages = PostMessageQuery::create(null, $criteria)
					->filterByMessage($this)
					->find($con);
				if (null !== $criteria) {
					return $collPostMessages;
				}
				$this->collPostMessages = $collPostMessages;
			}
		}
		return $this->collPostMessages;
	}

	/**
	 * Returns the number of related PostMessage objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PostMessage objects.
	 * @throws     PropelException
	 */
	public function countPostMessages(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPostMessages || null !== $criteria) {
			if ($this->isNew() && null === $this->collPostMessages) {
				return 0;
			} else {
				$query = PostMessageQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByMessage($this)
					->count($con);
			}
		} else {
			return count($this->collPostMessages);
		}
	}

	/**
	 * Method called to associate a PostMessage object to this object
	 * through the PostMessage foreign key attribute.
	 *
	 * @param      PostMessage $l PostMessage
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPostMessage(PostMessage $l)
	{
		if ($this->collPostMessages === null) {
			$this->initPostMessages();
		}
		if (!$this->collPostMessages->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPostMessages[]= $l;
			$l->setMessage($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Message is new, it will return
	 * an empty collection; or if this Message has previously
	 * been saved, it will retrieve related PostMessages from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Message.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PostMessage[] List of PostMessage objects
	 */
	public function getPostMessagesJoinPost($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PostMessageQuery::create(null, $criteria);
		$query->joinWith('Post', $join_behavior);

		return $this->getPostMessages($query, $con);
	}

	/**
	 * Clears out the collMessageMedias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMessageMedias()
	 */
	public function clearMessageMedias()
	{
		$this->collMessageMedias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMessageMedias collection.
	 *
	 * By default this just sets the collMessageMedias collection to an empty array (like clearcollMessageMedias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initMessageMedias($overrideExisting = true)
	{
		if (null !== $this->collMessageMedias && !$overrideExisting) {
			return;
		}
		$this->collMessageMedias = new PropelObjectCollection();
		$this->collMessageMedias->setModel('MessageMedia');
	}

	/**
	 * Gets an array of MessageMedia objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Message is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array MessageMedia[] List of MessageMedia objects
	 * @throws     PropelException
	 */
	public function getMessageMedias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMessageMedias || null !== $criteria) {
			if ($this->isNew() && null === $this->collMessageMedias) {
				// return empty collection
				$this->initMessageMedias();
			} else {
				$collMessageMedias = MessageMediaQuery::create(null, $criteria)
					->filterByMessage($this)
					->find($con);
				if (null !== $criteria) {
					return $collMessageMedias;
				}
				$this->collMessageMedias = $collMessageMedias;
			}
		}
		return $this->collMessageMedias;
	}

	/**
	 * Returns the number of related MessageMedia objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related MessageMedia objects.
	 * @throws     PropelException
	 */
	public function countMessageMedias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMessageMedias || null !== $criteria) {
			if ($this->isNew() && null === $this->collMessageMedias) {
				return 0;
			} else {
				$query = MessageMediaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByMessage($this)
					->count($con);
			}
		} else {
			return count($this->collMessageMedias);
		}
	}

	/**
	 * Method called to associate a MessageMedia object to this object
	 * through the MessageMedia foreign key attribute.
	 *
	 * @param      MessageMedia $l MessageMedia
	 * @return     void
	 * @throws     PropelException
	 */
	public function addMessageMedia(MessageMedia $l)
	{
		if ($this->collMessageMedias === null) {
			$this->initMessageMedias();
		}
		if (!$this->collMessageMedias->contains($l)) { // only add it if the **same** object is not already associated
			$this->collMessageMedias[]= $l;
			$l->setMessage($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Message is new, it will return
	 * an empty collection; or if this Message has previously
	 * been saved, it will retrieve related MessageMedias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Message.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array MessageMedia[] List of MessageMedia objects
	 */
	public function getMessageMediasJoinMedia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MessageMediaQuery::create(null, $criteria);
		$query->joinWith('Media', $join_behavior);

		return $this->getMessageMedias($query, $con);
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
	 * to the current object by way of the user_message cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Message is new, it will return
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
					->filterByMessage($this)
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
	 * to the current object by way of the user_message cross-reference table.
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
					->filterByMessage($this)
					->count($con);
			}
		} else {
			return count($this->collUsers);
		}
	}

	/**
	 * Associate a User object to this object
	 * through the user_message cross reference table.
	 *
	 * @param      User $user The UserMessage object to relate
	 * @return     void
	 */
	public function addUser($user)
	{
		if ($this->collUsers === null) {
			$this->initUsers();
		}
		if (!$this->collUsers->contains($user)) { // only add it if the **same** object is not already associated
			$userMessage = new UserMessage();
			$userMessage->setUser($user);
			$this->addUserMessage($userMessage);

			$this->collUsers[]= $user;
		}
	}

	/**
	 * Clears out the collGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGroups()
	 */
	public function clearGroups()
	{
		$this->collGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGroups collection.
	 *
	 * By default this just sets the collGroups collection to an empty collection (like clearGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initGroups()
	{
		$this->collGroups = new PropelObjectCollection();
		$this->collGroups->setModel('Group');
	}

	/**
	 * Gets a collection of Group objects related by a many-to-many relationship
	 * to the current object by way of the group_message cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Message is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Group[] List of Group objects
	 */
	public function getGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroups) {
				// return empty collection
				$this->initGroups();
			} else {
				$collGroups = GroupQuery::create(null, $criteria)
					->filterByMessage($this)
					->find($con);
				if (null !== $criteria) {
					return $collGroups;
				}
				$this->collGroups = $collGroups;
			}
		}
		return $this->collGroups;
	}

	/**
	 * Gets the number of Group objects related by a many-to-many relationship
	 * to the current object by way of the group_message cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Group objects
	 */
	public function countGroups($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroups) {
				return 0;
			} else {
				$query = GroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByMessage($this)
					->count($con);
			}
		} else {
			return count($this->collGroups);
		}
	}

	/**
	 * Associate a Group object to this object
	 * through the group_message cross reference table.
	 *
	 * @param      Group $group The GroupMessage object to relate
	 * @return     void
	 */
	public function addGroup($group)
	{
		if ($this->collGroups === null) {
			$this->initGroups();
		}
		if (!$this->collGroups->contains($group)) { // only add it if the **same** object is not already associated
			$groupMessage = new GroupMessage();
			$groupMessage->setGroup($group);
			$this->addGroupMessage($groupMessage);

			$this->collGroups[]= $group;
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
	 * to the current object by way of the post_message cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Message is new, it will return
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
					->filterByMessage($this)
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
	 * to the current object by way of the post_message cross-reference table.
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
					->filterByMessage($this)
					->count($con);
			}
		} else {
			return count($this->collPosts);
		}
	}

	/**
	 * Associate a Post object to this object
	 * through the post_message cross reference table.
	 *
	 * @param      Post $post The PostMessage object to relate
	 * @return     void
	 */
	public function addPost($post)
	{
		if ($this->collPosts === null) {
			$this->initPosts();
		}
		if (!$this->collPosts->contains($post)) { // only add it if the **same** object is not already associated
			$postMessage = new PostMessage();
			$postMessage->setPost($post);
			$this->addPostMessage($postMessage);

			$this->collPosts[]= $post;
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
	 * to the current object by way of the message_media cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Message is new, it will return
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
					->filterByMessage($this)
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
	 * to the current object by way of the message_media cross-reference table.
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
					->filterByMessage($this)
					->count($con);
			}
		} else {
			return count($this->collMedias);
		}
	}

	/**
	 * Associate a Media object to this object
	 * through the message_media cross reference table.
	 *
	 * @param      Media $media The MessageMedia object to relate
	 * @return     void
	 */
	public function addMedia($media)
	{
		if ($this->collMedias === null) {
			$this->initMedias();
		}
		if (!$this->collMedias->contains($media)) { // only add it if the **same** object is not already associated
			$messageMedia = new MessageMedia();
			$messageMedia->setMedia($media);
			$this->addMessageMedia($messageMedia);

			$this->collMedias[]= $media;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->to = null;
		$this->from = null;
		$this->nickname = null;
		$this->order = null;
		$this->date = null;
		$this->subject = null;
		$this->text = null;
		$this->type = null;
		$this->unread = null;
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
			if ($this->collUserMessages) {
				foreach ($this->collUserMessages as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collGroupMessages) {
				foreach ($this->collGroupMessages as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPostMessages) {
				foreach ($this->collPostMessages as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collMessageMedias) {
				foreach ($this->collMessageMedias as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collUserMessages instanceof PropelCollection) {
			$this->collUserMessages->clearIterator();
		}
		$this->collUserMessages = null;
		if ($this->collGroupMessages instanceof PropelCollection) {
			$this->collGroupMessages->clearIterator();
		}
		$this->collGroupMessages = null;
		if ($this->collPostMessages instanceof PropelCollection) {
			$this->collPostMessages->clearIterator();
		}
		$this->collPostMessages = null;
		if ($this->collMessageMedias instanceof PropelCollection) {
			$this->collMessageMedias->clearIterator();
		}
		$this->collMessageMedias = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(MessagePeer::DEFAULT_STRING_FORMAT);
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

} // BaseMessage
