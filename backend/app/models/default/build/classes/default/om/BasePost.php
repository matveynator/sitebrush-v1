<?php


/**
 * Base class that represents a row from the 'post' table.
 *
 * 
 *
 * @package    propel.generator.default.om
 */
abstract class BasePost extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PostPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PostPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the ownerid field.
	 * @var        int
	 */
	protected $ownerid;

	/**
	 * The value for the deleterid field.
	 * @var        int
	 */
	protected $deleterid;

	/**
	 * The value for the requesturi field.
	 * @var        string
	 */
	protected $requesturi;

	/**
	 * The value for the type field.
	 * @var        string
	 */
	protected $type;

	/**
	 * The value for the date field.
	 * @var        int
	 */
	protected $date;

	/**
	 * The value for the title field.
	 * @var        string
	 */
	protected $title;

	/**
	 * The value for the text field.
	 * @var        string
	 */
	protected $text;

	/**
	 * The value for the shorttext field.
	 * @var        string
	 */
	protected $shorttext;

	/**
	 * The value for the tags field.
	 * @var        string
	 */
	protected $tags;

	/**
	 * The value for the version field.
	 * @var        int
	 */
	protected $version;

	/**
	 * The value for the domain field.
	 * @var        string
	 */
	protected $domain;

	/**
	 * The value for the published field.
	 * @var        string
	 */
	protected $published;

	/**
	 * The value for the status field.
	 * @var        string
	 */
	protected $status;

	/**
	 * @var        array UserPost[] Collection to store aggregation of UserPost objects.
	 */
	protected $collUserPosts;

	/**
	 * @var        array GroupPost[] Collection to store aggregation of GroupPost objects.
	 */
	protected $collGroupPosts;

	/**
	 * @var        array PostMessage[] Collection to store aggregation of PostMessage objects.
	 */
	protected $collPostMessages;

	/**
	 * @var        array PostMedia[] Collection to store aggregation of PostMedia objects.
	 */
	protected $collPostMedias;

	/**
	 * @var        array PostTemplate[] Collection to store aggregation of PostTemplate objects.
	 */
	protected $collPostTemplates;

	/**
	 * @var        array User[] Collection to store aggregation of User objects.
	 */
	protected $collUsers;

	/**
	 * @var        array Group[] Collection to store aggregation of Group objects.
	 */
	protected $collGroups;

	/**
	 * @var        array Message[] Collection to store aggregation of Message objects.
	 */
	protected $collMessages;

	/**
	 * @var        array Media[] Collection to store aggregation of Media objects.
	 */
	protected $collMedias;

	/**
	 * @var        array Template[] Collection to store aggregation of Template objects.
	 */
	protected $collTemplates;

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
	 * Get the [ownerid] column value.
	 * 
	 * @return     int
	 */
	public function getOwnerId()
	{
		return $this->ownerid;
	}

	/**
	 * Get the [deleterid] column value.
	 * 
	 * @return     int
	 */
	public function getDeleterId()
	{
		return $this->deleterid;
	}

	/**
	 * Get the [requesturi] column value.
	 * 
	 * @return     string
	 */
	public function getRequestUri()
	{
		return $this->requesturi;
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
	 * Get the [date] column value.
	 * 
	 * @return     int
	 */
	public function getDate()
	{
		return $this->date;
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
	 * Get the [text] column value.
	 * 
	 * @return     string
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * Get the [shorttext] column value.
	 * 
	 * @return     string
	 */
	public function getShortText()
	{
		return $this->shorttext;
	}

	/**
	 * Get the [tags] column value.
	 * 
	 * @return     string
	 */
	public function getTags()
	{
		return $this->tags;
	}

	/**
	 * Get the [version] column value.
	 * 
	 * @return     int
	 */
	public function getVersion()
	{
		return $this->version;
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
	 * Get the [published] column value.
	 * 
	 * @return     string
	 */
	public function getPublished()
	{
		return $this->published;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PostPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [ownerid] column.
	 * 
	 * @param      int $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setOwnerId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->ownerid !== $v) {
			$this->ownerid = $v;
			$this->modifiedColumns[] = PostPeer::OWNERID;
		}

		return $this;
	} // setOwnerId()

	/**
	 * Set the value of [deleterid] column.
	 * 
	 * @param      int $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setDeleterId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->deleterid !== $v) {
			$this->deleterid = $v;
			$this->modifiedColumns[] = PostPeer::DELETERID;
		}

		return $this;
	} // setDeleterId()

	/**
	 * Set the value of [requesturi] column.
	 * 
	 * @param      string $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setRequestUri($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->requesturi !== $v) {
			$this->requesturi = $v;
			$this->modifiedColumns[] = PostPeer::REQUESTURI;
		}

		return $this;
	} // setRequestUri()

	/**
	 * Set the value of [type] column.
	 * 
	 * @param      string $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = PostPeer::TYPE;
		}

		return $this;
	} // setType()

	/**
	 * Set the value of [date] column.
	 * 
	 * @param      int $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setDate($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->date !== $v) {
			$this->date = $v;
			$this->modifiedColumns[] = PostPeer::DATE;
		}

		return $this;
	} // setDate()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = PostPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [text] column.
	 * 
	 * @param      string $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setText($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->text !== $v) {
			$this->text = $v;
			$this->modifiedColumns[] = PostPeer::TEXT;
		}

		return $this;
	} // setText()

	/**
	 * Set the value of [shorttext] column.
	 * 
	 * @param      string $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setShortText($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->shorttext !== $v) {
			$this->shorttext = $v;
			$this->modifiedColumns[] = PostPeer::SHORTTEXT;
		}

		return $this;
	} // setShortText()

	/**
	 * Set the value of [tags] column.
	 * 
	 * @param      string $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setTags($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tags !== $v) {
			$this->tags = $v;
			$this->modifiedColumns[] = PostPeer::TAGS;
		}

		return $this;
	} // setTags()

	/**
	 * Set the value of [version] column.
	 * 
	 * @param      int $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setVersion($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->version !== $v) {
			$this->version = $v;
			$this->modifiedColumns[] = PostPeer::VERSION;
		}

		return $this;
	} // setVersion()

	/**
	 * Set the value of [domain] column.
	 * 
	 * @param      string $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setDomain($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->domain !== $v) {
			$this->domain = $v;
			$this->modifiedColumns[] = PostPeer::DOMAIN;
		}

		return $this;
	} // setDomain()

	/**
	 * Set the value of [published] column.
	 * 
	 * @param      string $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setPublished($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->published !== $v) {
			$this->published = $v;
			$this->modifiedColumns[] = PostPeer::PUBLISHED;
		}

		return $this;
	} // setPublished()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     Post The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = PostPeer::STATUS;
		}

		return $this;
	} // setStatus()

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
			$this->ownerid = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->deleterid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->requesturi = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->type = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->date = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->title = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->text = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->shorttext = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->tags = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->version = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->domain = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->published = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->status = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 14; // 14 = PostPeer::NUM_COLUMNS - PostPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Post object", $e);
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
			$con = Propel::getConnection(PostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PostPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collUserPosts = null;

			$this->collGroupPosts = null;

			$this->collPostMessages = null;

			$this->collPostMedias = null;

			$this->collPostTemplates = null;

			$this->collUsers = null;
			$this->collGroups = null;
			$this->collMessages = null;
			$this->collMedias = null;
			$this->collTemplates = null;
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
			$con = Propel::getConnection(PostPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				PostQuery::create()
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
			$con = Propel::getConnection(PostPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				PostPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = PostPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(PostPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.PostPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = PostPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collUserPosts !== null) {
				foreach ($this->collUserPosts as $referrerFK) {
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

			if ($this->collPostMessages !== null) {
				foreach ($this->collPostMessages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPostMedias !== null) {
				foreach ($this->collPostMedias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPostTemplates !== null) {
				foreach ($this->collPostTemplates as $referrerFK) {
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


			if (($retval = PostPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUserPosts !== null) {
					foreach ($this->collUserPosts as $referrerFK) {
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

				if ($this->collPostMessages !== null) {
					foreach ($this->collPostMessages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPostMedias !== null) {
					foreach ($this->collPostMedias as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPostTemplates !== null) {
					foreach ($this->collPostTemplates as $referrerFK) {
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
		$pos = PostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDeleterId();
				break;
			case 3:
				return $this->getRequestUri();
				break;
			case 4:
				return $this->getType();
				break;
			case 5:
				return $this->getDate();
				break;
			case 6:
				return $this->getTitle();
				break;
			case 7:
				return $this->getText();
				break;
			case 8:
				return $this->getShortText();
				break;
			case 9:
				return $this->getTags();
				break;
			case 10:
				return $this->getVersion();
				break;
			case 11:
				return $this->getDomain();
				break;
			case 12:
				return $this->getPublished();
				break;
			case 13:
				return $this->getStatus();
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
		if (isset($alreadyDumpedObjects['Post'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Post'][$this->getPrimaryKey()] = true;
		$keys = PostPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getOwnerId(),
			$keys[2] => $this->getDeleterId(),
			$keys[3] => $this->getRequestUri(),
			$keys[4] => $this->getType(),
			$keys[5] => $this->getDate(),
			$keys[6] => $this->getTitle(),
			$keys[7] => $this->getText(),
			$keys[8] => $this->getShortText(),
			$keys[9] => $this->getTags(),
			$keys[10] => $this->getVersion(),
			$keys[11] => $this->getDomain(),
			$keys[12] => $this->getPublished(),
			$keys[13] => $this->getStatus(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collUserPosts) {
				$result['UserPosts'] = $this->collUserPosts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collGroupPosts) {
				$result['GroupPosts'] = $this->collGroupPosts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPostMessages) {
				$result['PostMessages'] = $this->collPostMessages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPostMedias) {
				$result['PostMedias'] = $this->collPostMedias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPostTemplates) {
				$result['PostTemplates'] = $this->collPostTemplates->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = PostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDeleterId($value);
				break;
			case 3:
				$this->setRequestUri($value);
				break;
			case 4:
				$this->setType($value);
				break;
			case 5:
				$this->setDate($value);
				break;
			case 6:
				$this->setTitle($value);
				break;
			case 7:
				$this->setText($value);
				break;
			case 8:
				$this->setShortText($value);
				break;
			case 9:
				$this->setTags($value);
				break;
			case 10:
				$this->setVersion($value);
				break;
			case 11:
				$this->setDomain($value);
				break;
			case 12:
				$this->setPublished($value);
				break;
			case 13:
				$this->setStatus($value);
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
		$keys = PostPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOwnerId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDeleterId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRequestUri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setType($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTitle($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setText($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setShortText($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTags($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setVersion($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDomain($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPublished($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStatus($arr[$keys[13]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PostPeer::DATABASE_NAME);

		if ($this->isColumnModified(PostPeer::ID)) $criteria->add(PostPeer::ID, $this->id);
		if ($this->isColumnModified(PostPeer::OWNERID)) $criteria->add(PostPeer::OWNERID, $this->ownerid);
		if ($this->isColumnModified(PostPeer::DELETERID)) $criteria->add(PostPeer::DELETERID, $this->deleterid);
		if ($this->isColumnModified(PostPeer::REQUESTURI)) $criteria->add(PostPeer::REQUESTURI, $this->requesturi);
		if ($this->isColumnModified(PostPeer::TYPE)) $criteria->add(PostPeer::TYPE, $this->type);
		if ($this->isColumnModified(PostPeer::DATE)) $criteria->add(PostPeer::DATE, $this->date);
		if ($this->isColumnModified(PostPeer::TITLE)) $criteria->add(PostPeer::TITLE, $this->title);
		if ($this->isColumnModified(PostPeer::TEXT)) $criteria->add(PostPeer::TEXT, $this->text);
		if ($this->isColumnModified(PostPeer::SHORTTEXT)) $criteria->add(PostPeer::SHORTTEXT, $this->shorttext);
		if ($this->isColumnModified(PostPeer::TAGS)) $criteria->add(PostPeer::TAGS, $this->tags);
		if ($this->isColumnModified(PostPeer::VERSION)) $criteria->add(PostPeer::VERSION, $this->version);
		if ($this->isColumnModified(PostPeer::DOMAIN)) $criteria->add(PostPeer::DOMAIN, $this->domain);
		if ($this->isColumnModified(PostPeer::PUBLISHED)) $criteria->add(PostPeer::PUBLISHED, $this->published);
		if ($this->isColumnModified(PostPeer::STATUS)) $criteria->add(PostPeer::STATUS, $this->status);

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
		$criteria = new Criteria(PostPeer::DATABASE_NAME);
		$criteria->add(PostPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Post (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setOwnerId($this->ownerid);
		$copyObj->setDeleterId($this->deleterid);
		$copyObj->setRequestUri($this->requesturi);
		$copyObj->setType($this->type);
		$copyObj->setDate($this->date);
		$copyObj->setTitle($this->title);
		$copyObj->setText($this->text);
		$copyObj->setShortText($this->shorttext);
		$copyObj->setTags($this->tags);
		$copyObj->setVersion($this->version);
		$copyObj->setDomain($this->domain);
		$copyObj->setPublished($this->published);
		$copyObj->setStatus($this->status);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getUserPosts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserPost($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getGroupPosts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGroupPost($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPostMessages() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPostMessage($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPostMedias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPostMedia($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPostTemplates() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPostTemplate($relObj->copy($deepCopy));
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
	 * @return     Post Clone of current object.
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
	 * @return     PostPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PostPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collUserPosts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserPosts()
	 */
	public function clearUserPosts()
	{
		$this->collUserPosts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserPosts collection.
	 *
	 * By default this just sets the collUserPosts collection to an empty array (like clearcollUserPosts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUserPosts($overrideExisting = true)
	{
		if (null !== $this->collUserPosts && !$overrideExisting) {
			return;
		}
		$this->collUserPosts = new PropelObjectCollection();
		$this->collUserPosts->setModel('UserPost');
	}

	/**
	 * Gets an array of UserPost objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Post is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array UserPost[] List of UserPost objects
	 * @throws     PropelException
	 */
	public function getUserPosts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUserPosts || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserPosts) {
				// return empty collection
				$this->initUserPosts();
			} else {
				$collUserPosts = UserPostQuery::create(null, $criteria)
					->filterByPost($this)
					->find($con);
				if (null !== $criteria) {
					return $collUserPosts;
				}
				$this->collUserPosts = $collUserPosts;
			}
		}
		return $this->collUserPosts;
	}

	/**
	 * Returns the number of related UserPost objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserPost objects.
	 * @throws     PropelException
	 */
	public function countUserPosts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUserPosts || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserPosts) {
				return 0;
			} else {
				$query = UserPostQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPost($this)
					->count($con);
			}
		} else {
			return count($this->collUserPosts);
		}
	}

	/**
	 * Method called to associate a UserPost object to this object
	 * through the UserPost foreign key attribute.
	 *
	 * @param      UserPost $l UserPost
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserPost(UserPost $l)
	{
		if ($this->collUserPosts === null) {
			$this->initUserPosts();
		}
		if (!$this->collUserPosts->contains($l)) { // only add it if the **same** object is not already associated
			$this->collUserPosts[]= $l;
			$l->setPost($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Post is new, it will return
	 * an empty collection; or if this Post has previously
	 * been saved, it will retrieve related UserPosts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Post.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserPost[] List of UserPost objects
	 */
	public function getUserPostsJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserPostQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getUserPosts($query, $con);
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
	 * If this Post is new, it will return
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
					->filterByPost($this)
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
					->filterByPost($this)
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
			$l->setPost($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Post is new, it will return
	 * an empty collection; or if this Post has previously
	 * been saved, it will retrieve related GroupPosts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Post.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array GroupPost[] List of GroupPost objects
	 */
	public function getGroupPostsJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = GroupPostQuery::create(null, $criteria);
		$query->joinWith('Group', $join_behavior);

		return $this->getGroupPosts($query, $con);
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
	 * If this Post is new, it will return
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
					->filterByPost($this)
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
					->filterByPost($this)
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
			$l->setPost($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Post is new, it will return
	 * an empty collection; or if this Post has previously
	 * been saved, it will retrieve related PostMessages from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Post.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PostMessage[] List of PostMessage objects
	 */
	public function getPostMessagesJoinMessage($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PostMessageQuery::create(null, $criteria);
		$query->joinWith('Message', $join_behavior);

		return $this->getPostMessages($query, $con);
	}

	/**
	 * Clears out the collPostMedias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPostMedias()
	 */
	public function clearPostMedias()
	{
		$this->collPostMedias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPostMedias collection.
	 *
	 * By default this just sets the collPostMedias collection to an empty array (like clearcollPostMedias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPostMedias($overrideExisting = true)
	{
		if (null !== $this->collPostMedias && !$overrideExisting) {
			return;
		}
		$this->collPostMedias = new PropelObjectCollection();
		$this->collPostMedias->setModel('PostMedia');
	}

	/**
	 * Gets an array of PostMedia objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Post is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PostMedia[] List of PostMedia objects
	 * @throws     PropelException
	 */
	public function getPostMedias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPostMedias || null !== $criteria) {
			if ($this->isNew() && null === $this->collPostMedias) {
				// return empty collection
				$this->initPostMedias();
			} else {
				$collPostMedias = PostMediaQuery::create(null, $criteria)
					->filterByPost($this)
					->find($con);
				if (null !== $criteria) {
					return $collPostMedias;
				}
				$this->collPostMedias = $collPostMedias;
			}
		}
		return $this->collPostMedias;
	}

	/**
	 * Returns the number of related PostMedia objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PostMedia objects.
	 * @throws     PropelException
	 */
	public function countPostMedias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPostMedias || null !== $criteria) {
			if ($this->isNew() && null === $this->collPostMedias) {
				return 0;
			} else {
				$query = PostMediaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPost($this)
					->count($con);
			}
		} else {
			return count($this->collPostMedias);
		}
	}

	/**
	 * Method called to associate a PostMedia object to this object
	 * through the PostMedia foreign key attribute.
	 *
	 * @param      PostMedia $l PostMedia
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPostMedia(PostMedia $l)
	{
		if ($this->collPostMedias === null) {
			$this->initPostMedias();
		}
		if (!$this->collPostMedias->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPostMedias[]= $l;
			$l->setPost($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Post is new, it will return
	 * an empty collection; or if this Post has previously
	 * been saved, it will retrieve related PostMedias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Post.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PostMedia[] List of PostMedia objects
	 */
	public function getPostMediasJoinMedia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PostMediaQuery::create(null, $criteria);
		$query->joinWith('Media', $join_behavior);

		return $this->getPostMedias($query, $con);
	}

	/**
	 * Clears out the collPostTemplates collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPostTemplates()
	 */
	public function clearPostTemplates()
	{
		$this->collPostTemplates = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPostTemplates collection.
	 *
	 * By default this just sets the collPostTemplates collection to an empty array (like clearcollPostTemplates());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPostTemplates($overrideExisting = true)
	{
		if (null !== $this->collPostTemplates && !$overrideExisting) {
			return;
		}
		$this->collPostTemplates = new PropelObjectCollection();
		$this->collPostTemplates->setModel('PostTemplate');
	}

	/**
	 * Gets an array of PostTemplate objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Post is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PostTemplate[] List of PostTemplate objects
	 * @throws     PropelException
	 */
	public function getPostTemplates($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPostTemplates || null !== $criteria) {
			if ($this->isNew() && null === $this->collPostTemplates) {
				// return empty collection
				$this->initPostTemplates();
			} else {
				$collPostTemplates = PostTemplateQuery::create(null, $criteria)
					->filterByPost($this)
					->find($con);
				if (null !== $criteria) {
					return $collPostTemplates;
				}
				$this->collPostTemplates = $collPostTemplates;
			}
		}
		return $this->collPostTemplates;
	}

	/**
	 * Returns the number of related PostTemplate objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PostTemplate objects.
	 * @throws     PropelException
	 */
	public function countPostTemplates(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPostTemplates || null !== $criteria) {
			if ($this->isNew() && null === $this->collPostTemplates) {
				return 0;
			} else {
				$query = PostTemplateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPost($this)
					->count($con);
			}
		} else {
			return count($this->collPostTemplates);
		}
	}

	/**
	 * Method called to associate a PostTemplate object to this object
	 * through the PostTemplate foreign key attribute.
	 *
	 * @param      PostTemplate $l PostTemplate
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPostTemplate(PostTemplate $l)
	{
		if ($this->collPostTemplates === null) {
			$this->initPostTemplates();
		}
		if (!$this->collPostTemplates->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPostTemplates[]= $l;
			$l->setPost($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Post is new, it will return
	 * an empty collection; or if this Post has previously
	 * been saved, it will retrieve related PostTemplates from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Post.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PostTemplate[] List of PostTemplate objects
	 */
	public function getPostTemplatesJoinTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PostTemplateQuery::create(null, $criteria);
		$query->joinWith('Template', $join_behavior);

		return $this->getPostTemplates($query, $con);
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
	 * to the current object by way of the user_post cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Post is new, it will return
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
					->filterByPost($this)
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
	 * to the current object by way of the user_post cross-reference table.
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
					->filterByPost($this)
					->count($con);
			}
		} else {
			return count($this->collUsers);
		}
	}

	/**
	 * Associate a User object to this object
	 * through the user_post cross reference table.
	 *
	 * @param      User $user The UserPost object to relate
	 * @return     void
	 */
	public function addUser($user)
	{
		if ($this->collUsers === null) {
			$this->initUsers();
		}
		if (!$this->collUsers->contains($user)) { // only add it if the **same** object is not already associated
			$userPost = new UserPost();
			$userPost->setUser($user);
			$this->addUserPost($userPost);

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
	 * to the current object by way of the group_post cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Post is new, it will return
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
					->filterByPost($this)
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
	 * to the current object by way of the group_post cross-reference table.
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
					->filterByPost($this)
					->count($con);
			}
		} else {
			return count($this->collGroups);
		}
	}

	/**
	 * Associate a Group object to this object
	 * through the group_post cross reference table.
	 *
	 * @param      Group $group The GroupPost object to relate
	 * @return     void
	 */
	public function addGroup($group)
	{
		if ($this->collGroups === null) {
			$this->initGroups();
		}
		if (!$this->collGroups->contains($group)) { // only add it if the **same** object is not already associated
			$groupPost = new GroupPost();
			$groupPost->setGroup($group);
			$this->addGroupPost($groupPost);

			$this->collGroups[]= $group;
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
	 * to the current object by way of the post_message cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Post is new, it will return
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
					->filterByPost($this)
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
	 * to the current object by way of the post_message cross-reference table.
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
					->filterByPost($this)
					->count($con);
			}
		} else {
			return count($this->collMessages);
		}
	}

	/**
	 * Associate a Message object to this object
	 * through the post_message cross reference table.
	 *
	 * @param      Message $message The PostMessage object to relate
	 * @return     void
	 */
	public function addMessage($message)
	{
		if ($this->collMessages === null) {
			$this->initMessages();
		}
		if (!$this->collMessages->contains($message)) { // only add it if the **same** object is not already associated
			$postMessage = new PostMessage();
			$postMessage->setMessage($message);
			$this->addPostMessage($postMessage);

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
	 * to the current object by way of the post_media cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Post is new, it will return
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
					->filterByPost($this)
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
	 * to the current object by way of the post_media cross-reference table.
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
					->filterByPost($this)
					->count($con);
			}
		} else {
			return count($this->collMedias);
		}
	}

	/**
	 * Associate a Media object to this object
	 * through the post_media cross reference table.
	 *
	 * @param      Media $media The PostMedia object to relate
	 * @return     void
	 */
	public function addMedia($media)
	{
		if ($this->collMedias === null) {
			$this->initMedias();
		}
		if (!$this->collMedias->contains($media)) { // only add it if the **same** object is not already associated
			$postMedia = new PostMedia();
			$postMedia->setMedia($media);
			$this->addPostMedia($postMedia);

			$this->collMedias[]= $media;
		}
	}

	/**
	 * Clears out the collTemplates collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTemplates()
	 */
	public function clearTemplates()
	{
		$this->collTemplates = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTemplates collection.
	 *
	 * By default this just sets the collTemplates collection to an empty collection (like clearTemplates());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initTemplates()
	{
		$this->collTemplates = new PropelObjectCollection();
		$this->collTemplates->setModel('Template');
	}

	/**
	 * Gets a collection of Template objects related by a many-to-many relationship
	 * to the current object by way of the post_template cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Post is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Template[] List of Template objects
	 */
	public function getTemplates($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTemplates || null !== $criteria) {
			if ($this->isNew() && null === $this->collTemplates) {
				// return empty collection
				$this->initTemplates();
			} else {
				$collTemplates = TemplateQuery::create(null, $criteria)
					->filterByPost($this)
					->find($con);
				if (null !== $criteria) {
					return $collTemplates;
				}
				$this->collTemplates = $collTemplates;
			}
		}
		return $this->collTemplates;
	}

	/**
	 * Gets the number of Template objects related by a many-to-many relationship
	 * to the current object by way of the post_template cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Template objects
	 */
	public function countTemplates($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTemplates || null !== $criteria) {
			if ($this->isNew() && null === $this->collTemplates) {
				return 0;
			} else {
				$query = TemplateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPost($this)
					->count($con);
			}
		} else {
			return count($this->collTemplates);
		}
	}

	/**
	 * Associate a Template object to this object
	 * through the post_template cross reference table.
	 *
	 * @param      Template $template The PostTemplate object to relate
	 * @return     void
	 */
	public function addTemplate($template)
	{
		if ($this->collTemplates === null) {
			$this->initTemplates();
		}
		if (!$this->collTemplates->contains($template)) { // only add it if the **same** object is not already associated
			$postTemplate = new PostTemplate();
			$postTemplate->setTemplate($template);
			$this->addPostTemplate($postTemplate);

			$this->collTemplates[]= $template;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->ownerid = null;
		$this->deleterid = null;
		$this->requesturi = null;
		$this->type = null;
		$this->date = null;
		$this->title = null;
		$this->text = null;
		$this->shorttext = null;
		$this->tags = null;
		$this->version = null;
		$this->domain = null;
		$this->published = null;
		$this->status = null;
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
			if ($this->collUserPosts) {
				foreach ($this->collUserPosts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collGroupPosts) {
				foreach ($this->collGroupPosts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPostMessages) {
				foreach ($this->collPostMessages as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPostMedias) {
				foreach ($this->collPostMedias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPostTemplates) {
				foreach ($this->collPostTemplates as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collUserPosts instanceof PropelCollection) {
			$this->collUserPosts->clearIterator();
		}
		$this->collUserPosts = null;
		if ($this->collGroupPosts instanceof PropelCollection) {
			$this->collGroupPosts->clearIterator();
		}
		$this->collGroupPosts = null;
		if ($this->collPostMessages instanceof PropelCollection) {
			$this->collPostMessages->clearIterator();
		}
		$this->collPostMessages = null;
		if ($this->collPostMedias instanceof PropelCollection) {
			$this->collPostMedias->clearIterator();
		}
		$this->collPostMedias = null;
		if ($this->collPostTemplates instanceof PropelCollection) {
			$this->collPostTemplates->clearIterator();
		}
		$this->collPostTemplates = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(PostPeer::DEFAULT_STRING_FORMAT);
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

} // BasePost
