<?php


/**
 * Base class that represents a row from the 'media' table.
 *
 * 
 *
 * @package    propel.generator.default.om
 */
abstract class BaseMedia extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'MediaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        MediaPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the type field.
	 * @var        string
	 */
	protected $type;

	/**
	 * The value for the hash field.
	 * @var        string
	 */
	protected $hash;

	/**
	 * The value for the originalhash field.
	 * @var        string
	 */
	protected $originalhash;

	/**
	 * The value for the format field.
	 * @var        string
	 */
	protected $format;

	/**
	 * The value for the width field.
	 * @var        string
	 */
	protected $width;

	/**
	 * The value for the height field.
	 * @var        string
	 */
	protected $height;

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
	 * The value for the day field.
	 * @var        int
	 */
	protected $day;

	/**
	 * The value for the date field.
	 * @var        int
	 */
	protected $date;

	/**
	 * The value for the sizesarray field.
	 * @var        string
	 */
	protected $sizesarray;

	/**
	 * The value for the rating field.
	 * @var        double
	 */
	protected $rating;

	/**
	 * The value for the ratingcount field.
	 * @var        int
	 */
	protected $ratingcount;

	/**
	 * The value for the ratingip field.
	 * @var        string
	 */
	protected $ratingip;

	/**
	 * The value for the views field.
	 * @var        int
	 */
	protected $views;

	/**
	 * The value for the bytesused field.
	 * @var        int
	 */
	protected $bytesused;

	/**
	 * @var        array UserMedia[] Collection to store aggregation of UserMedia objects.
	 */
	protected $collUserMedias;

	/**
	 * @var        array GroupMedia[] Collection to store aggregation of GroupMedia objects.
	 */
	protected $collGroupMedias;

	/**
	 * @var        array PostMedia[] Collection to store aggregation of PostMedia objects.
	 */
	protected $collPostMedias;

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
	 * @var        array Message[] Collection to store aggregation of Message objects.
	 */
	protected $collMessages;

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
	 * Get the [type] column value.
	 * 
	 * @return     string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Get the [hash] column value.
	 * 
	 * @return     string
	 */
	public function getHash()
	{
		return $this->hash;
	}

	/**
	 * Get the [originalhash] column value.
	 * 
	 * @return     string
	 */
	public function getOriginalHash()
	{
		return $this->originalhash;
	}

	/**
	 * Get the [format] column value.
	 * 
	 * @return     string
	 */
	public function getFormat()
	{
		return $this->format;
	}

	/**
	 * Get the [width] column value.
	 * 
	 * @return     string
	 */
	public function getWidth()
	{
		return $this->width;
	}

	/**
	 * Get the [height] column value.
	 * 
	 * @return     string
	 */
	public function getHeight()
	{
		return $this->height;
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
	 * Get the [day] column value.
	 * 
	 * @return     int
	 */
	public function getDay()
	{
		return $this->day;
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
	 * Get the [sizesarray] column value.
	 * 
	 * @return     string
	 */
	public function getSizesArray()
	{
		return $this->sizesarray;
	}

	/**
	 * Get the [rating] column value.
	 * 
	 * @return     double
	 */
	public function getRating()
	{
		return $this->rating;
	}

	/**
	 * Get the [ratingcount] column value.
	 * 
	 * @return     int
	 */
	public function getRatingCount()
	{
		return $this->ratingcount;
	}

	/**
	 * Get the [ratingip] column value.
	 * 
	 * @return     string
	 */
	public function getRatingIp()
	{
		return $this->ratingip;
	}

	/**
	 * Get the [views] column value.
	 * 
	 * @return     int
	 */
	public function getViews()
	{
		return $this->views;
	}

	/**
	 * Get the [bytesused] column value.
	 * 
	 * @return     int
	 */
	public function getBytesUsed()
	{
		return $this->bytesused;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MediaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [type] column.
	 * 
	 * @param      string $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = MediaPeer::TYPE;
		}

		return $this;
	} // setType()

	/**
	 * Set the value of [hash] column.
	 * 
	 * @param      string $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setHash($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->hash !== $v) {
			$this->hash = $v;
			$this->modifiedColumns[] = MediaPeer::HASH;
		}

		return $this;
	} // setHash()

	/**
	 * Set the value of [originalhash] column.
	 * 
	 * @param      string $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setOriginalHash($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->originalhash !== $v) {
			$this->originalhash = $v;
			$this->modifiedColumns[] = MediaPeer::ORIGINALHASH;
		}

		return $this;
	} // setOriginalHash()

	/**
	 * Set the value of [format] column.
	 * 
	 * @param      string $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setFormat($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->format !== $v) {
			$this->format = $v;
			$this->modifiedColumns[] = MediaPeer::FORMAT;
		}

		return $this;
	} // setFormat()

	/**
	 * Set the value of [width] column.
	 * 
	 * @param      string $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setWidth($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->width !== $v) {
			$this->width = $v;
			$this->modifiedColumns[] = MediaPeer::WIDTH;
		}

		return $this;
	} // setWidth()

	/**
	 * Set the value of [height] column.
	 * 
	 * @param      string $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setHeight($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->height !== $v) {
			$this->height = $v;
			$this->modifiedColumns[] = MediaPeer::HEIGHT;
		}

		return $this;
	} // setHeight()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = MediaPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [domain] column.
	 * 
	 * @param      string $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setDomain($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->domain !== $v) {
			$this->domain = $v;
			$this->modifiedColumns[] = MediaPeer::DOMAIN;
		}

		return $this;
	} // setDomain()

	/**
	 * Set the value of [day] column.
	 * 
	 * @param      int $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setDay($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->day !== $v) {
			$this->day = $v;
			$this->modifiedColumns[] = MediaPeer::DAY;
		}

		return $this;
	} // setDay()

	/**
	 * Set the value of [date] column.
	 * 
	 * @param      int $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setDate($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->date !== $v) {
			$this->date = $v;
			$this->modifiedColumns[] = MediaPeer::DATE;
		}

		return $this;
	} // setDate()

	/**
	 * Set the value of [sizesarray] column.
	 * 
	 * @param      string $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setSizesArray($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sizesarray !== $v) {
			$this->sizesarray = $v;
			$this->modifiedColumns[] = MediaPeer::SIZESARRAY;
		}

		return $this;
	} // setSizesArray()

	/**
	 * Set the value of [rating] column.
	 * 
	 * @param      double $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setRating($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->rating !== $v) {
			$this->rating = $v;
			$this->modifiedColumns[] = MediaPeer::RATING;
		}

		return $this;
	} // setRating()

	/**
	 * Set the value of [ratingcount] column.
	 * 
	 * @param      int $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setRatingCount($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->ratingcount !== $v) {
			$this->ratingcount = $v;
			$this->modifiedColumns[] = MediaPeer::RATINGCOUNT;
		}

		return $this;
	} // setRatingCount()

	/**
	 * Set the value of [ratingip] column.
	 * 
	 * @param      string $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setRatingIp($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ratingip !== $v) {
			$this->ratingip = $v;
			$this->modifiedColumns[] = MediaPeer::RATINGIP;
		}

		return $this;
	} // setRatingIp()

	/**
	 * Set the value of [views] column.
	 * 
	 * @param      int $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setViews($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->views !== $v) {
			$this->views = $v;
			$this->modifiedColumns[] = MediaPeer::VIEWS;
		}

		return $this;
	} // setViews()

	/**
	 * Set the value of [bytesused] column.
	 * 
	 * @param      int $v new value
	 * @return     Media The current object (for fluent API support)
	 */
	public function setBytesUsed($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->bytesused !== $v) {
			$this->bytesused = $v;
			$this->modifiedColumns[] = MediaPeer::BYTESUSED;
		}

		return $this;
	} // setBytesUsed()

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
			$this->type = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->hash = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->originalhash = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->format = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->width = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->height = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->status = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->domain = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->day = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->date = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->sizesarray = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->rating = ($row[$startcol + 12] !== null) ? (double) $row[$startcol + 12] : null;
			$this->ratingcount = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->ratingip = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->views = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->bytesused = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 17; // 17 = MediaPeer::NUM_COLUMNS - MediaPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Media object", $e);
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
			$con = Propel::getConnection(MediaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = MediaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collUserMedias = null;

			$this->collGroupMedias = null;

			$this->collPostMedias = null;

			$this->collMessageMedias = null;

			$this->collUsers = null;
			$this->collGroups = null;
			$this->collPosts = null;
			$this->collMessages = null;
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
			$con = Propel::getConnection(MediaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				MediaQuery::create()
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
			$con = Propel::getConnection(MediaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				MediaPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = MediaPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(MediaPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.MediaPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = MediaPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collUserMedias !== null) {
				foreach ($this->collUserMedias as $referrerFK) {
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

			if ($this->collPostMedias !== null) {
				foreach ($this->collPostMedias as $referrerFK) {
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


			if (($retval = MediaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUserMedias !== null) {
					foreach ($this->collUserMedias as $referrerFK) {
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

				if ($this->collPostMedias !== null) {
					foreach ($this->collPostMedias as $referrerFK) {
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
		$pos = MediaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getType();
				break;
			case 2:
				return $this->getHash();
				break;
			case 3:
				return $this->getOriginalHash();
				break;
			case 4:
				return $this->getFormat();
				break;
			case 5:
				return $this->getWidth();
				break;
			case 6:
				return $this->getHeight();
				break;
			case 7:
				return $this->getStatus();
				break;
			case 8:
				return $this->getDomain();
				break;
			case 9:
				return $this->getDay();
				break;
			case 10:
				return $this->getDate();
				break;
			case 11:
				return $this->getSizesArray();
				break;
			case 12:
				return $this->getRating();
				break;
			case 13:
				return $this->getRatingCount();
				break;
			case 14:
				return $this->getRatingIp();
				break;
			case 15:
				return $this->getViews();
				break;
			case 16:
				return $this->getBytesUsed();
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
		if (isset($alreadyDumpedObjects['Media'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Media'][$this->getPrimaryKey()] = true;
		$keys = MediaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getType(),
			$keys[2] => $this->getHash(),
			$keys[3] => $this->getOriginalHash(),
			$keys[4] => $this->getFormat(),
			$keys[5] => $this->getWidth(),
			$keys[6] => $this->getHeight(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getDomain(),
			$keys[9] => $this->getDay(),
			$keys[10] => $this->getDate(),
			$keys[11] => $this->getSizesArray(),
			$keys[12] => $this->getRating(),
			$keys[13] => $this->getRatingCount(),
			$keys[14] => $this->getRatingIp(),
			$keys[15] => $this->getViews(),
			$keys[16] => $this->getBytesUsed(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collUserMedias) {
				$result['UserMedias'] = $this->collUserMedias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collGroupMedias) {
				$result['GroupMedias'] = $this->collGroupMedias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPostMedias) {
				$result['PostMedias'] = $this->collPostMedias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = MediaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setType($value);
				break;
			case 2:
				$this->setHash($value);
				break;
			case 3:
				$this->setOriginalHash($value);
				break;
			case 4:
				$this->setFormat($value);
				break;
			case 5:
				$this->setWidth($value);
				break;
			case 6:
				$this->setHeight($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setDomain($value);
				break;
			case 9:
				$this->setDay($value);
				break;
			case 10:
				$this->setDate($value);
				break;
			case 11:
				$this->setSizesArray($value);
				break;
			case 12:
				$this->setRating($value);
				break;
			case 13:
				$this->setRatingCount($value);
				break;
			case 14:
				$this->setRatingIp($value);
				break;
			case 15:
				$this->setViews($value);
				break;
			case 16:
				$this->setBytesUsed($value);
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
		$keys = MediaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setType($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHash($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOriginalHash($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFormat($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setWidth($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setHeight($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDomain($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDay($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDate($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSizesArray($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setRating($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRatingCount($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRatingIp($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setViews($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setBytesUsed($arr[$keys[16]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(MediaPeer::DATABASE_NAME);

		if ($this->isColumnModified(MediaPeer::ID)) $criteria->add(MediaPeer::ID, $this->id);
		if ($this->isColumnModified(MediaPeer::TYPE)) $criteria->add(MediaPeer::TYPE, $this->type);
		if ($this->isColumnModified(MediaPeer::HASH)) $criteria->add(MediaPeer::HASH, $this->hash);
		if ($this->isColumnModified(MediaPeer::ORIGINALHASH)) $criteria->add(MediaPeer::ORIGINALHASH, $this->originalhash);
		if ($this->isColumnModified(MediaPeer::FORMAT)) $criteria->add(MediaPeer::FORMAT, $this->format);
		if ($this->isColumnModified(MediaPeer::WIDTH)) $criteria->add(MediaPeer::WIDTH, $this->width);
		if ($this->isColumnModified(MediaPeer::HEIGHT)) $criteria->add(MediaPeer::HEIGHT, $this->height);
		if ($this->isColumnModified(MediaPeer::STATUS)) $criteria->add(MediaPeer::STATUS, $this->status);
		if ($this->isColumnModified(MediaPeer::DOMAIN)) $criteria->add(MediaPeer::DOMAIN, $this->domain);
		if ($this->isColumnModified(MediaPeer::DAY)) $criteria->add(MediaPeer::DAY, $this->day);
		if ($this->isColumnModified(MediaPeer::DATE)) $criteria->add(MediaPeer::DATE, $this->date);
		if ($this->isColumnModified(MediaPeer::SIZESARRAY)) $criteria->add(MediaPeer::SIZESARRAY, $this->sizesarray);
		if ($this->isColumnModified(MediaPeer::RATING)) $criteria->add(MediaPeer::RATING, $this->rating);
		if ($this->isColumnModified(MediaPeer::RATINGCOUNT)) $criteria->add(MediaPeer::RATINGCOUNT, $this->ratingcount);
		if ($this->isColumnModified(MediaPeer::RATINGIP)) $criteria->add(MediaPeer::RATINGIP, $this->ratingip);
		if ($this->isColumnModified(MediaPeer::VIEWS)) $criteria->add(MediaPeer::VIEWS, $this->views);
		if ($this->isColumnModified(MediaPeer::BYTESUSED)) $criteria->add(MediaPeer::BYTESUSED, $this->bytesused);

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
		$criteria = new Criteria(MediaPeer::DATABASE_NAME);
		$criteria->add(MediaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Media (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setType($this->type);
		$copyObj->setHash($this->hash);
		$copyObj->setOriginalHash($this->originalhash);
		$copyObj->setFormat($this->format);
		$copyObj->setWidth($this->width);
		$copyObj->setHeight($this->height);
		$copyObj->setStatus($this->status);
		$copyObj->setDomain($this->domain);
		$copyObj->setDay($this->day);
		$copyObj->setDate($this->date);
		$copyObj->setSizesArray($this->sizesarray);
		$copyObj->setRating($this->rating);
		$copyObj->setRatingCount($this->ratingcount);
		$copyObj->setRatingIp($this->ratingip);
		$copyObj->setViews($this->views);
		$copyObj->setBytesUsed($this->bytesused);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getUserMedias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserMedia($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getGroupMedias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGroupMedia($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPostMedias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPostMedia($relObj->copy($deepCopy));
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
	 * @return     Media Clone of current object.
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
	 * @return     MediaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new MediaPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collUserMedias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserMedias()
	 */
	public function clearUserMedias()
	{
		$this->collUserMedias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserMedias collection.
	 *
	 * By default this just sets the collUserMedias collection to an empty array (like clearcollUserMedias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUserMedias($overrideExisting = true)
	{
		if (null !== $this->collUserMedias && !$overrideExisting) {
			return;
		}
		$this->collUserMedias = new PropelObjectCollection();
		$this->collUserMedias->setModel('UserMedia');
	}

	/**
	 * Gets an array of UserMedia objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Media is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array UserMedia[] List of UserMedia objects
	 * @throws     PropelException
	 */
	public function getUserMedias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUserMedias || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserMedias) {
				// return empty collection
				$this->initUserMedias();
			} else {
				$collUserMedias = UserMediaQuery::create(null, $criteria)
					->filterByMedia($this)
					->find($con);
				if (null !== $criteria) {
					return $collUserMedias;
				}
				$this->collUserMedias = $collUserMedias;
			}
		}
		return $this->collUserMedias;
	}

	/**
	 * Returns the number of related UserMedia objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserMedia objects.
	 * @throws     PropelException
	 */
	public function countUserMedias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUserMedias || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserMedias) {
				return 0;
			} else {
				$query = UserMediaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByMedia($this)
					->count($con);
			}
		} else {
			return count($this->collUserMedias);
		}
	}

	/**
	 * Method called to associate a UserMedia object to this object
	 * through the UserMedia foreign key attribute.
	 *
	 * @param      UserMedia $l UserMedia
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserMedia(UserMedia $l)
	{
		if ($this->collUserMedias === null) {
			$this->initUserMedias();
		}
		if (!$this->collUserMedias->contains($l)) { // only add it if the **same** object is not already associated
			$this->collUserMedias[]= $l;
			$l->setMedia($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Media is new, it will return
	 * an empty collection; or if this Media has previously
	 * been saved, it will retrieve related UserMedias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Media.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserMedia[] List of UserMedia objects
	 */
	public function getUserMediasJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserMediaQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getUserMedias($query, $con);
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
	 * If this Media is new, it will return
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
					->filterByMedia($this)
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
					->filterByMedia($this)
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
			$l->setMedia($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Media is new, it will return
	 * an empty collection; or if this Media has previously
	 * been saved, it will retrieve related GroupMedias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Media.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array GroupMedia[] List of GroupMedia objects
	 */
	public function getGroupMediasJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = GroupMediaQuery::create(null, $criteria);
		$query->joinWith('Group', $join_behavior);

		return $this->getGroupMedias($query, $con);
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
	 * If this Media is new, it will return
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
					->filterByMedia($this)
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
					->filterByMedia($this)
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
			$l->setMedia($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Media is new, it will return
	 * an empty collection; or if this Media has previously
	 * been saved, it will retrieve related PostMedias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Media.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PostMedia[] List of PostMedia objects
	 */
	public function getPostMediasJoinPost($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PostMediaQuery::create(null, $criteria);
		$query->joinWith('Post', $join_behavior);

		return $this->getPostMedias($query, $con);
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
	 * If this Media is new, it will return
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
					->filterByMedia($this)
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
					->filterByMedia($this)
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
			$l->setMedia($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Media is new, it will return
	 * an empty collection; or if this Media has previously
	 * been saved, it will retrieve related MessageMedias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Media.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array MessageMedia[] List of MessageMedia objects
	 */
	public function getMessageMediasJoinMessage($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MessageMediaQuery::create(null, $criteria);
		$query->joinWith('Message', $join_behavior);

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
	 * to the current object by way of the user_media cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Media is new, it will return
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
					->filterByMedia($this)
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
	 * to the current object by way of the user_media cross-reference table.
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
					->filterByMedia($this)
					->count($con);
			}
		} else {
			return count($this->collUsers);
		}
	}

	/**
	 * Associate a User object to this object
	 * through the user_media cross reference table.
	 *
	 * @param      User $user The UserMedia object to relate
	 * @return     void
	 */
	public function addUser($user)
	{
		if ($this->collUsers === null) {
			$this->initUsers();
		}
		if (!$this->collUsers->contains($user)) { // only add it if the **same** object is not already associated
			$userMedia = new UserMedia();
			$userMedia->setUser($user);
			$this->addUserMedia($userMedia);

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
	 * to the current object by way of the group_media cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Media is new, it will return
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
					->filterByMedia($this)
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
	 * to the current object by way of the group_media cross-reference table.
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
					->filterByMedia($this)
					->count($con);
			}
		} else {
			return count($this->collGroups);
		}
	}

	/**
	 * Associate a Group object to this object
	 * through the group_media cross reference table.
	 *
	 * @param      Group $group The GroupMedia object to relate
	 * @return     void
	 */
	public function addGroup($group)
	{
		if ($this->collGroups === null) {
			$this->initGroups();
		}
		if (!$this->collGroups->contains($group)) { // only add it if the **same** object is not already associated
			$groupMedia = new GroupMedia();
			$groupMedia->setGroup($group);
			$this->addGroupMedia($groupMedia);

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
	 * to the current object by way of the post_media cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Media is new, it will return
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
					->filterByMedia($this)
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
	 * to the current object by way of the post_media cross-reference table.
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
					->filterByMedia($this)
					->count($con);
			}
		} else {
			return count($this->collPosts);
		}
	}

	/**
	 * Associate a Post object to this object
	 * through the post_media cross reference table.
	 *
	 * @param      Post $post The PostMedia object to relate
	 * @return     void
	 */
	public function addPost($post)
	{
		if ($this->collPosts === null) {
			$this->initPosts();
		}
		if (!$this->collPosts->contains($post)) { // only add it if the **same** object is not already associated
			$postMedia = new PostMedia();
			$postMedia->setPost($post);
			$this->addPostMedia($postMedia);

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
	 * to the current object by way of the message_media cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Media is new, it will return
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
					->filterByMedia($this)
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
	 * to the current object by way of the message_media cross-reference table.
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
					->filterByMedia($this)
					->count($con);
			}
		} else {
			return count($this->collMessages);
		}
	}

	/**
	 * Associate a Message object to this object
	 * through the message_media cross reference table.
	 *
	 * @param      Message $message The MessageMedia object to relate
	 * @return     void
	 */
	public function addMessage($message)
	{
		if ($this->collMessages === null) {
			$this->initMessages();
		}
		if (!$this->collMessages->contains($message)) { // only add it if the **same** object is not already associated
			$messageMedia = new MessageMedia();
			$messageMedia->setMessage($message);
			$this->addMessageMedia($messageMedia);

			$this->collMessages[]= $message;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->type = null;
		$this->hash = null;
		$this->originalhash = null;
		$this->format = null;
		$this->width = null;
		$this->height = null;
		$this->status = null;
		$this->domain = null;
		$this->day = null;
		$this->date = null;
		$this->sizesarray = null;
		$this->rating = null;
		$this->ratingcount = null;
		$this->ratingip = null;
		$this->views = null;
		$this->bytesused = null;
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
			if ($this->collUserMedias) {
				foreach ($this->collUserMedias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collGroupMedias) {
				foreach ($this->collGroupMedias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPostMedias) {
				foreach ($this->collPostMedias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collMessageMedias) {
				foreach ($this->collMessageMedias as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collUserMedias instanceof PropelCollection) {
			$this->collUserMedias->clearIterator();
		}
		$this->collUserMedias = null;
		if ($this->collGroupMedias instanceof PropelCollection) {
			$this->collGroupMedias->clearIterator();
		}
		$this->collGroupMedias = null;
		if ($this->collPostMedias instanceof PropelCollection) {
			$this->collPostMedias->clearIterator();
		}
		$this->collPostMedias = null;
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
		return (string) $this->exportTo(MediaPeer::DEFAULT_STRING_FORMAT);
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

} // BaseMedia
