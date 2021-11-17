<?php


/**
 * Base class that represents a row from the 'user' table.
 *
 * 
 *
 * @package    propel.generator.default.om
 */
abstract class BaseUser extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'UserPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UserPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the sessionid field.
	 * @var        string
	 */
	protected $sessionid;

	/**
	 * The value for the oldid field.
	 * @var        int
	 */
	protected $oldid;

	/**
	 * The value for the avatarid field.
	 * @var        int
	 */
	protected $avatarid;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;

	/**
	 * The value for the nickname field.
	 * @var        string
	 */
	protected $nickname;

	/**
	 * The value for the firstname field.
	 * @var        string
	 */
	protected $firstname;

	/**
	 * The value for the lastname field.
	 * @var        string
	 */
	protected $lastname;

	/**
	 * The value for the gender field.
	 * @var        string
	 */
	protected $gender;

	/**
	 * The value for the phone field.
	 * @var        string
	 */
	protected $phone;

	/**
	 * The value for the dateofregistration field.
	 * @var        int
	 */
	protected $dateofregistration;

	/**
	 * The value for the dateofbirth field.
	 * @var        int
	 */
	protected $dateofbirth;

	/**
	 * The value for the lastvisittime field.
	 * @var        int
	 */
	protected $lastvisittime;

	/**
	 * The value for the grinvichtimeoffset field.
	 * @var        int
	 */
	protected $grinvichtimeoffset;

	/**
	 * The value for the activated field.
	 * @var        string
	 */
	protected $activated;

	/**
	 * The value for the verificationcode field.
	 * @var        string
	 */
	protected $verificationcode;

	/**
	 * The value for the domain field.
	 * @var        string
	 */
	protected $domain;

	/**
	 * The value for the status field.
	 * @var        string
	 */
	protected $status;

	/**
	 * The value for the language field.
	 * @var        string
	 */
	protected $language;

	/**
	 * The value for the currentip field.
	 * @var        string
	 */
	protected $currentip;

	/**
	 * The value for the autograb field.
	 * @var        string
	 */
	protected $autograb;

	/**
	 * The value for the domaintograb field.
	 * @var        string
	 */
	protected $domaintograb;

	/**
	 * The value for the profile field.
	 * @var        string
	 */
	protected $profile;

	/**
	 * The value for the preferences field.
	 * @var        string
	 */
	protected $preferences;

	/**
	 * The value for the securitylog field.
	 * @var        string
	 */
	protected $securitylog;

	/**
	 * The value for the invitedby field.
	 * @var        string
	 */
	protected $invitedby;

	/**
	 * The value for the invitesammount field.
	 * @var        int
	 */
	protected $invitesammount;

	/**
	 * The value for the quotabytes field.
	 * @var        string
	 */
	protected $quotabytes;

	/**
	 * The value for the quotaoriginals field.
	 * @var        string
	 */
	protected $quotaoriginals;

	/**
	 * The value for the quotabytesused field.
	 * @var        string
	 */
	protected $quotabytesused;

	/**
	 * The value for the quotaoriginalsused field.
	 * @var        string
	 */
	protected $quotaoriginalsused;

	/**
	 * @var        array UserGroup[] Collection to store aggregation of UserGroup objects.
	 */
	protected $collUserGroups;

	/**
	 * @var        array UserInvite[] Collection to store aggregation of UserInvite objects.
	 */
	protected $collUserInvites;

	/**
	 * @var        array UserPost[] Collection to store aggregation of UserPost objects.
	 */
	protected $collUserPosts;

	/**
	 * @var        array UserMessage[] Collection to store aggregation of UserMessage objects.
	 */
	protected $collUserMessages;

	/**
	 * @var        array UserMedia[] Collection to store aggregation of UserMedia objects.
	 */
	protected $collUserMedias;

	/**
	 * @var        array Group[] Collection to store aggregation of Group objects.
	 */
	protected $collGroups;

	/**
	 * @var        array Invite[] Collection to store aggregation of Invite objects.
	 */
	protected $collInvites;

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
	 * Get the [sessionid] column value.
	 * 
	 * @return     string
	 */
	public function getSessionId()
	{
		return $this->sessionid;
	}

	/**
	 * Get the [oldid] column value.
	 * 
	 * @return     int
	 */
	public function getOldId()
	{
		return $this->oldid;
	}

	/**
	 * Get the [avatarid] column value.
	 * 
	 * @return     int
	 */
	public function getAvatarId()
	{
		return $this->avatarid;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [password] column value.
	 * 
	 * @return     string
	 */
	public function getPassword()
	{
		return $this->password;
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
	 * Get the [firstname] column value.
	 * 
	 * @return     string
	 */
	public function getFirstName()
	{
		return $this->firstname;
	}

	/**
	 * Get the [lastname] column value.
	 * 
	 * @return     string
	 */
	public function getLastName()
	{
		return $this->lastname;
	}

	/**
	 * Get the [gender] column value.
	 * 
	 * @return     string
	 */
	public function getGender()
	{
		return $this->gender;
	}

	/**
	 * Get the [phone] column value.
	 * 
	 * @return     string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Get the [dateofregistration] column value.
	 * 
	 * @return     int
	 */
	public function getDateOfRegistration()
	{
		return $this->dateofregistration;
	}

	/**
	 * Get the [dateofbirth] column value.
	 * 
	 * @return     int
	 */
	public function getDateOfBirth()
	{
		return $this->dateofbirth;
	}

	/**
	 * Get the [lastvisittime] column value.
	 * 
	 * @return     int
	 */
	public function getLastVisitTime()
	{
		return $this->lastvisittime;
	}

	/**
	 * Get the [grinvichtimeoffset] column value.
	 * 
	 * @return     int
	 */
	public function getGrinvichTimeOffset()
	{
		return $this->grinvichtimeoffset;
	}

	/**
	 * Get the [activated] column value.
	 * 
	 * @return     string
	 */
	public function getActivated()
	{
		return $this->activated;
	}

	/**
	 * Get the [verificationcode] column value.
	 * 
	 * @return     string
	 */
	public function getVerificationCode()
	{
		return $this->verificationcode;
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
	 * Get the [status] column value.
	 * 
	 * @return     string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [language] column value.
	 * 
	 * @return     string
	 */
	public function getLanguage()
	{
		return $this->language;
	}

	/**
	 * Get the [currentip] column value.
	 * 
	 * @return     string
	 */
	public function getCurrentIp()
	{
		return $this->currentip;
	}

	/**
	 * Get the [autograb] column value.
	 * 
	 * @return     string
	 */
	public function getAutoGrab()
	{
		return $this->autograb;
	}

	/**
	 * Get the [domaintograb] column value.
	 * 
	 * @return     string
	 */
	public function getDomainToGrab()
	{
		return $this->domaintograb;
	}

	/**
	 * Get the [profile] column value.
	 * 
	 * @return     string
	 */
	public function getProfile()
	{
		return $this->profile;
	}

	/**
	 * Get the [preferences] column value.
	 * 
	 * @return     string
	 */
	public function getPreferences()
	{
		return $this->preferences;
	}

	/**
	 * Get the [securitylog] column value.
	 * 
	 * @return     string
	 */
	public function getSecurityLog()
	{
		return $this->securitylog;
	}

	/**
	 * Get the [invitedby] column value.
	 * 
	 * @return     string
	 */
	public function getInvitedBy()
	{
		return $this->invitedby;
	}

	/**
	 * Get the [invitesammount] column value.
	 * 
	 * @return     int
	 */
	public function getInvitesAmmount()
	{
		return $this->invitesammount;
	}

	/**
	 * Get the [quotabytes] column value.
	 * 
	 * @return     string
	 */
	public function getQuotaBytes()
	{
		return $this->quotabytes;
	}

	/**
	 * Get the [quotaoriginals] column value.
	 * 
	 * @return     string
	 */
	public function getQuotaOriginals()
	{
		return $this->quotaoriginals;
	}

	/**
	 * Get the [quotabytesused] column value.
	 * 
	 * @return     string
	 */
	public function getQuotaBytesUsed()
	{
		return $this->quotabytesused;
	}

	/**
	 * Get the [quotaoriginalsused] column value.
	 * 
	 * @return     string
	 */
	public function getQuotaOriginalsUsed()
	{
		return $this->quotaoriginalsused;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UserPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [sessionid] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setSessionId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sessionid !== $v) {
			$this->sessionid = $v;
			$this->modifiedColumns[] = UserPeer::SESSIONID;
		}

		return $this;
	} // setSessionId()

	/**
	 * Set the value of [oldid] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setOldId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->oldid !== $v) {
			$this->oldid = $v;
			$this->modifiedColumns[] = UserPeer::OLDID;
		}

		return $this;
	} // setOldId()

	/**
	 * Set the value of [avatarid] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setAvatarId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->avatarid !== $v) {
			$this->avatarid = $v;
			$this->modifiedColumns[] = UserPeer::AVATARID;
		}

		return $this;
	} // setAvatarId()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = UserPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [password] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = UserPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Set the value of [nickname] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setNickName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nickname !== $v) {
			$this->nickname = $v;
			$this->modifiedColumns[] = UserPeer::NICKNAME;
		}

		return $this;
	} // setNickName()

	/**
	 * Set the value of [firstname] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setFirstName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->firstname !== $v) {
			$this->firstname = $v;
			$this->modifiedColumns[] = UserPeer::FIRSTNAME;
		}

		return $this;
	} // setFirstName()

	/**
	 * Set the value of [lastname] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setLastName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->lastname !== $v) {
			$this->lastname = $v;
			$this->modifiedColumns[] = UserPeer::LASTNAME;
		}

		return $this;
	} // setLastName()

	/**
	 * Set the value of [gender] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setGender($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->gender !== $v) {
			$this->gender = $v;
			$this->modifiedColumns[] = UserPeer::GENDER;
		}

		return $this;
	} // setGender()

	/**
	 * Set the value of [phone] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->phone !== $v) {
			$this->phone = $v;
			$this->modifiedColumns[] = UserPeer::PHONE;
		}

		return $this;
	} // setPhone()

	/**
	 * Set the value of [dateofregistration] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setDateOfRegistration($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dateofregistration !== $v) {
			$this->dateofregistration = $v;
			$this->modifiedColumns[] = UserPeer::DATEOFREGISTRATION;
		}

		return $this;
	} // setDateOfRegistration()

	/**
	 * Set the value of [dateofbirth] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setDateOfBirth($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dateofbirth !== $v) {
			$this->dateofbirth = $v;
			$this->modifiedColumns[] = UserPeer::DATEOFBIRTH;
		}

		return $this;
	} // setDateOfBirth()

	/**
	 * Set the value of [lastvisittime] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setLastVisitTime($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->lastvisittime !== $v) {
			$this->lastvisittime = $v;
			$this->modifiedColumns[] = UserPeer::LASTVISITTIME;
		}

		return $this;
	} // setLastVisitTime()

	/**
	 * Set the value of [grinvichtimeoffset] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setGrinvichTimeOffset($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->grinvichtimeoffset !== $v) {
			$this->grinvichtimeoffset = $v;
			$this->modifiedColumns[] = UserPeer::GRINVICHTIMEOFFSET;
		}

		return $this;
	} // setGrinvichTimeOffset()

	/**
	 * Set the value of [activated] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setActivated($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->activated !== $v) {
			$this->activated = $v;
			$this->modifiedColumns[] = UserPeer::ACTIVATED;
		}

		return $this;
	} // setActivated()

	/**
	 * Set the value of [verificationcode] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setVerificationCode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->verificationcode !== $v) {
			$this->verificationcode = $v;
			$this->modifiedColumns[] = UserPeer::VERIFICATIONCODE;
		}

		return $this;
	} // setVerificationCode()

	/**
	 * Set the value of [domain] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setDomain($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->domain !== $v) {
			$this->domain = $v;
			$this->modifiedColumns[] = UserPeer::DOMAIN;
		}

		return $this;
	} // setDomain()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = UserPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Set the value of [language] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setLanguage($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->language !== $v) {
			$this->language = $v;
			$this->modifiedColumns[] = UserPeer::LANGUAGE;
		}

		return $this;
	} // setLanguage()

	/**
	 * Set the value of [currentip] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setCurrentIp($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->currentip !== $v) {
			$this->currentip = $v;
			$this->modifiedColumns[] = UserPeer::CURRENTIP;
		}

		return $this;
	} // setCurrentIp()

	/**
	 * Set the value of [autograb] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setAutoGrab($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->autograb !== $v) {
			$this->autograb = $v;
			$this->modifiedColumns[] = UserPeer::AUTOGRAB;
		}

		return $this;
	} // setAutoGrab()

	/**
	 * Set the value of [domaintograb] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setDomainToGrab($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->domaintograb !== $v) {
			$this->domaintograb = $v;
			$this->modifiedColumns[] = UserPeer::DOMAINTOGRAB;
		}

		return $this;
	} // setDomainToGrab()

	/**
	 * Set the value of [profile] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setProfile($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->profile !== $v) {
			$this->profile = $v;
			$this->modifiedColumns[] = UserPeer::PROFILE;
		}

		return $this;
	} // setProfile()

	/**
	 * Set the value of [preferences] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setPreferences($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->preferences !== $v) {
			$this->preferences = $v;
			$this->modifiedColumns[] = UserPeer::PREFERENCES;
		}

		return $this;
	} // setPreferences()

	/**
	 * Set the value of [securitylog] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setSecurityLog($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->securitylog !== $v) {
			$this->securitylog = $v;
			$this->modifiedColumns[] = UserPeer::SECURITYLOG;
		}

		return $this;
	} // setSecurityLog()

	/**
	 * Set the value of [invitedby] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setInvitedBy($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->invitedby !== $v) {
			$this->invitedby = $v;
			$this->modifiedColumns[] = UserPeer::INVITEDBY;
		}

		return $this;
	} // setInvitedBy()

	/**
	 * Set the value of [invitesammount] column.
	 * 
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setInvitesAmmount($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->invitesammount !== $v) {
			$this->invitesammount = $v;
			$this->modifiedColumns[] = UserPeer::INVITESAMMOUNT;
		}

		return $this;
	} // setInvitesAmmount()

	/**
	 * Set the value of [quotabytes] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setQuotaBytes($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->quotabytes !== $v) {
			$this->quotabytes = $v;
			$this->modifiedColumns[] = UserPeer::QUOTABYTES;
		}

		return $this;
	} // setQuotaBytes()

	/**
	 * Set the value of [quotaoriginals] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setQuotaOriginals($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->quotaoriginals !== $v) {
			$this->quotaoriginals = $v;
			$this->modifiedColumns[] = UserPeer::QUOTAORIGINALS;
		}

		return $this;
	} // setQuotaOriginals()

	/**
	 * Set the value of [quotabytesused] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setQuotaBytesUsed($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->quotabytesused !== $v) {
			$this->quotabytesused = $v;
			$this->modifiedColumns[] = UserPeer::QUOTABYTESUSED;
		}

		return $this;
	} // setQuotaBytesUsed()

	/**
	 * Set the value of [quotaoriginalsused] column.
	 * 
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setQuotaOriginalsUsed($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->quotaoriginalsused !== $v) {
			$this->quotaoriginalsused = $v;
			$this->modifiedColumns[] = UserPeer::QUOTAORIGINALSUSED;
		}

		return $this;
	} // setQuotaOriginalsUsed()

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
			$this->sessionid = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->oldid = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->avatarid = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->email = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->password = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->nickname = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->firstname = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->lastname = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->gender = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->phone = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->dateofregistration = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->dateofbirth = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->lastvisittime = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->grinvichtimeoffset = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->activated = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->verificationcode = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->domain = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->status = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->language = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->currentip = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->autograb = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->domaintograb = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->profile = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->preferences = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->securitylog = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
			$this->invitedby = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
			$this->invitesammount = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
			$this->quotabytes = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->quotaoriginals = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
			$this->quotabytesused = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
			$this->quotaoriginalsused = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 32; // 32 = UserPeer::NUM_COLUMNS - UserPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collUserGroups = null;

			$this->collUserInvites = null;

			$this->collUserPosts = null;

			$this->collUserMessages = null;

			$this->collUserMedias = null;

			$this->collGroups = null;
			$this->collInvites = null;
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				UserQuery::create()
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				UserPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = UserPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(UserPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = UserPeer::doUpdate($this, $con);
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

			if ($this->collUserInvites !== null) {
				foreach ($this->collUserInvites as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUserPosts !== null) {
				foreach ($this->collUserPosts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUserMessages !== null) {
				foreach ($this->collUserMessages as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUserMedias !== null) {
				foreach ($this->collUserMedias as $referrerFK) {
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


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUserGroups !== null) {
					foreach ($this->collUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserInvites !== null) {
					foreach ($this->collUserInvites as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserPosts !== null) {
					foreach ($this->collUserPosts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserMessages !== null) {
					foreach ($this->collUserMessages as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserMedias !== null) {
					foreach ($this->collUserMedias as $referrerFK) {
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
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSessionId();
				break;
			case 2:
				return $this->getOldId();
				break;
			case 3:
				return $this->getAvatarId();
				break;
			case 4:
				return $this->getEmail();
				break;
			case 5:
				return $this->getPassword();
				break;
			case 6:
				return $this->getNickName();
				break;
			case 7:
				return $this->getFirstName();
				break;
			case 8:
				return $this->getLastName();
				break;
			case 9:
				return $this->getGender();
				break;
			case 10:
				return $this->getPhone();
				break;
			case 11:
				return $this->getDateOfRegistration();
				break;
			case 12:
				return $this->getDateOfBirth();
				break;
			case 13:
				return $this->getLastVisitTime();
				break;
			case 14:
				return $this->getGrinvichTimeOffset();
				break;
			case 15:
				return $this->getActivated();
				break;
			case 16:
				return $this->getVerificationCode();
				break;
			case 17:
				return $this->getDomain();
				break;
			case 18:
				return $this->getStatus();
				break;
			case 19:
				return $this->getLanguage();
				break;
			case 20:
				return $this->getCurrentIp();
				break;
			case 21:
				return $this->getAutoGrab();
				break;
			case 22:
				return $this->getDomainToGrab();
				break;
			case 23:
				return $this->getProfile();
				break;
			case 24:
				return $this->getPreferences();
				break;
			case 25:
				return $this->getSecurityLog();
				break;
			case 26:
				return $this->getInvitedBy();
				break;
			case 27:
				return $this->getInvitesAmmount();
				break;
			case 28:
				return $this->getQuotaBytes();
				break;
			case 29:
				return $this->getQuotaOriginals();
				break;
			case 30:
				return $this->getQuotaBytesUsed();
				break;
			case 31:
				return $this->getQuotaOriginalsUsed();
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
		if (isset($alreadyDumpedObjects['User'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['User'][$this->getPrimaryKey()] = true;
		$keys = UserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSessionId(),
			$keys[2] => $this->getOldId(),
			$keys[3] => $this->getAvatarId(),
			$keys[4] => $this->getEmail(),
			$keys[5] => $this->getPassword(),
			$keys[6] => $this->getNickName(),
			$keys[7] => $this->getFirstName(),
			$keys[8] => $this->getLastName(),
			$keys[9] => $this->getGender(),
			$keys[10] => $this->getPhone(),
			$keys[11] => $this->getDateOfRegistration(),
			$keys[12] => $this->getDateOfBirth(),
			$keys[13] => $this->getLastVisitTime(),
			$keys[14] => $this->getGrinvichTimeOffset(),
			$keys[15] => $this->getActivated(),
			$keys[16] => $this->getVerificationCode(),
			$keys[17] => $this->getDomain(),
			$keys[18] => $this->getStatus(),
			$keys[19] => $this->getLanguage(),
			$keys[20] => $this->getCurrentIp(),
			$keys[21] => $this->getAutoGrab(),
			$keys[22] => $this->getDomainToGrab(),
			$keys[23] => $this->getProfile(),
			$keys[24] => $this->getPreferences(),
			$keys[25] => $this->getSecurityLog(),
			$keys[26] => $this->getInvitedBy(),
			$keys[27] => $this->getInvitesAmmount(),
			$keys[28] => $this->getQuotaBytes(),
			$keys[29] => $this->getQuotaOriginals(),
			$keys[30] => $this->getQuotaBytesUsed(),
			$keys[31] => $this->getQuotaOriginalsUsed(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collUserGroups) {
				$result['UserGroups'] = $this->collUserGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collUserInvites) {
				$result['UserInvites'] = $this->collUserInvites->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collUserPosts) {
				$result['UserPosts'] = $this->collUserPosts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collUserMessages) {
				$result['UserMessages'] = $this->collUserMessages->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collUserMedias) {
				$result['UserMedias'] = $this->collUserMedias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSessionId($value);
				break;
			case 2:
				$this->setOldId($value);
				break;
			case 3:
				$this->setAvatarId($value);
				break;
			case 4:
				$this->setEmail($value);
				break;
			case 5:
				$this->setPassword($value);
				break;
			case 6:
				$this->setNickName($value);
				break;
			case 7:
				$this->setFirstName($value);
				break;
			case 8:
				$this->setLastName($value);
				break;
			case 9:
				$this->setGender($value);
				break;
			case 10:
				$this->setPhone($value);
				break;
			case 11:
				$this->setDateOfRegistration($value);
				break;
			case 12:
				$this->setDateOfBirth($value);
				break;
			case 13:
				$this->setLastVisitTime($value);
				break;
			case 14:
				$this->setGrinvichTimeOffset($value);
				break;
			case 15:
				$this->setActivated($value);
				break;
			case 16:
				$this->setVerificationCode($value);
				break;
			case 17:
				$this->setDomain($value);
				break;
			case 18:
				$this->setStatus($value);
				break;
			case 19:
				$this->setLanguage($value);
				break;
			case 20:
				$this->setCurrentIp($value);
				break;
			case 21:
				$this->setAutoGrab($value);
				break;
			case 22:
				$this->setDomainToGrab($value);
				break;
			case 23:
				$this->setProfile($value);
				break;
			case 24:
				$this->setPreferences($value);
				break;
			case 25:
				$this->setSecurityLog($value);
				break;
			case 26:
				$this->setInvitedBy($value);
				break;
			case 27:
				$this->setInvitesAmmount($value);
				break;
			case 28:
				$this->setQuotaBytes($value);
				break;
			case 29:
				$this->setQuotaOriginals($value);
				break;
			case 30:
				$this->setQuotaBytesUsed($value);
				break;
			case 31:
				$this->setQuotaOriginalsUsed($value);
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
		$keys = UserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSessionId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOldId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAvatarId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEmail($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPassword($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNickName($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFirstName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLastName($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setGender($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPhone($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDateOfRegistration($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDateOfBirth($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLastVisitTime($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setGrinvichTimeOffset($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setActivated($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setVerificationCode($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDomain($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setStatus($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setLanguage($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCurrentIp($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setAutoGrab($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDomainToGrab($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setProfile($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPreferences($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setSecurityLog($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setInvitedBy($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setInvitesAmmount($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setQuotaBytes($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setQuotaOriginals($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setQuotaBytesUsed($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setQuotaOriginalsUsed($arr[$keys[31]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
		if ($this->isColumnModified(UserPeer::SESSIONID)) $criteria->add(UserPeer::SESSIONID, $this->sessionid);
		if ($this->isColumnModified(UserPeer::OLDID)) $criteria->add(UserPeer::OLDID, $this->oldid);
		if ($this->isColumnModified(UserPeer::AVATARID)) $criteria->add(UserPeer::AVATARID, $this->avatarid);
		if ($this->isColumnModified(UserPeer::EMAIL)) $criteria->add(UserPeer::EMAIL, $this->email);
		if ($this->isColumnModified(UserPeer::PASSWORD)) $criteria->add(UserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(UserPeer::NICKNAME)) $criteria->add(UserPeer::NICKNAME, $this->nickname);
		if ($this->isColumnModified(UserPeer::FIRSTNAME)) $criteria->add(UserPeer::FIRSTNAME, $this->firstname);
		if ($this->isColumnModified(UserPeer::LASTNAME)) $criteria->add(UserPeer::LASTNAME, $this->lastname);
		if ($this->isColumnModified(UserPeer::GENDER)) $criteria->add(UserPeer::GENDER, $this->gender);
		if ($this->isColumnModified(UserPeer::PHONE)) $criteria->add(UserPeer::PHONE, $this->phone);
		if ($this->isColumnModified(UserPeer::DATEOFREGISTRATION)) $criteria->add(UserPeer::DATEOFREGISTRATION, $this->dateofregistration);
		if ($this->isColumnModified(UserPeer::DATEOFBIRTH)) $criteria->add(UserPeer::DATEOFBIRTH, $this->dateofbirth);
		if ($this->isColumnModified(UserPeer::LASTVISITTIME)) $criteria->add(UserPeer::LASTVISITTIME, $this->lastvisittime);
		if ($this->isColumnModified(UserPeer::GRINVICHTIMEOFFSET)) $criteria->add(UserPeer::GRINVICHTIMEOFFSET, $this->grinvichtimeoffset);
		if ($this->isColumnModified(UserPeer::ACTIVATED)) $criteria->add(UserPeer::ACTIVATED, $this->activated);
		if ($this->isColumnModified(UserPeer::VERIFICATIONCODE)) $criteria->add(UserPeer::VERIFICATIONCODE, $this->verificationcode);
		if ($this->isColumnModified(UserPeer::DOMAIN)) $criteria->add(UserPeer::DOMAIN, $this->domain);
		if ($this->isColumnModified(UserPeer::STATUS)) $criteria->add(UserPeer::STATUS, $this->status);
		if ($this->isColumnModified(UserPeer::LANGUAGE)) $criteria->add(UserPeer::LANGUAGE, $this->language);
		if ($this->isColumnModified(UserPeer::CURRENTIP)) $criteria->add(UserPeer::CURRENTIP, $this->currentip);
		if ($this->isColumnModified(UserPeer::AUTOGRAB)) $criteria->add(UserPeer::AUTOGRAB, $this->autograb);
		if ($this->isColumnModified(UserPeer::DOMAINTOGRAB)) $criteria->add(UserPeer::DOMAINTOGRAB, $this->domaintograb);
		if ($this->isColumnModified(UserPeer::PROFILE)) $criteria->add(UserPeer::PROFILE, $this->profile);
		if ($this->isColumnModified(UserPeer::PREFERENCES)) $criteria->add(UserPeer::PREFERENCES, $this->preferences);
		if ($this->isColumnModified(UserPeer::SECURITYLOG)) $criteria->add(UserPeer::SECURITYLOG, $this->securitylog);
		if ($this->isColumnModified(UserPeer::INVITEDBY)) $criteria->add(UserPeer::INVITEDBY, $this->invitedby);
		if ($this->isColumnModified(UserPeer::INVITESAMMOUNT)) $criteria->add(UserPeer::INVITESAMMOUNT, $this->invitesammount);
		if ($this->isColumnModified(UserPeer::QUOTABYTES)) $criteria->add(UserPeer::QUOTABYTES, $this->quotabytes);
		if ($this->isColumnModified(UserPeer::QUOTAORIGINALS)) $criteria->add(UserPeer::QUOTAORIGINALS, $this->quotaoriginals);
		if ($this->isColumnModified(UserPeer::QUOTABYTESUSED)) $criteria->add(UserPeer::QUOTABYTESUSED, $this->quotabytesused);
		if ($this->isColumnModified(UserPeer::QUOTAORIGINALSUSED)) $criteria->add(UserPeer::QUOTAORIGINALSUSED, $this->quotaoriginalsused);

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
		$criteria = new Criteria(UserPeer::DATABASE_NAME);
		$criteria->add(UserPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of User (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setSessionId($this->sessionid);
		$copyObj->setOldId($this->oldid);
		$copyObj->setAvatarId($this->avatarid);
		$copyObj->setEmail($this->email);
		$copyObj->setPassword($this->password);
		$copyObj->setNickName($this->nickname);
		$copyObj->setFirstName($this->firstname);
		$copyObj->setLastName($this->lastname);
		$copyObj->setGender($this->gender);
		$copyObj->setPhone($this->phone);
		$copyObj->setDateOfRegistration($this->dateofregistration);
		$copyObj->setDateOfBirth($this->dateofbirth);
		$copyObj->setLastVisitTime($this->lastvisittime);
		$copyObj->setGrinvichTimeOffset($this->grinvichtimeoffset);
		$copyObj->setActivated($this->activated);
		$copyObj->setVerificationCode($this->verificationcode);
		$copyObj->setDomain($this->domain);
		$copyObj->setStatus($this->status);
		$copyObj->setLanguage($this->language);
		$copyObj->setCurrentIp($this->currentip);
		$copyObj->setAutoGrab($this->autograb);
		$copyObj->setDomainToGrab($this->domaintograb);
		$copyObj->setProfile($this->profile);
		$copyObj->setPreferences($this->preferences);
		$copyObj->setSecurityLog($this->securitylog);
		$copyObj->setInvitedBy($this->invitedby);
		$copyObj->setInvitesAmmount($this->invitesammount);
		$copyObj->setQuotaBytes($this->quotabytes);
		$copyObj->setQuotaOriginals($this->quotaoriginals);
		$copyObj->setQuotaBytesUsed($this->quotabytesused);
		$copyObj->setQuotaOriginalsUsed($this->quotaoriginalsused);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getUserGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserGroup($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUserInvites() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserInvite($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUserPosts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserPost($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUserMessages() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserMessage($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUserMedias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserMedia($relObj->copy($deepCopy));
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
	 * @return     User Clone of current object.
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
	 * @return     UserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UserPeer();
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
	 * If this User is new, it will return
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
					->filterByUser($this)
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
					->filterByUser($this)
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related UserGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserGroup[] List of UserGroup objects
	 */
	public function getUserGroupsJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserGroupQuery::create(null, $criteria);
		$query->joinWith('Group', $join_behavior);

		return $this->getUserGroups($query, $con);
	}

	/**
	 * Clears out the collUserInvites collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserInvites()
	 */
	public function clearUserInvites()
	{
		$this->collUserInvites = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserInvites collection.
	 *
	 * By default this just sets the collUserInvites collection to an empty array (like clearcollUserInvites());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUserInvites($overrideExisting = true)
	{
		if (null !== $this->collUserInvites && !$overrideExisting) {
			return;
		}
		$this->collUserInvites = new PropelObjectCollection();
		$this->collUserInvites->setModel('UserInvite');
	}

	/**
	 * Gets an array of UserInvite objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array UserInvite[] List of UserInvite objects
	 * @throws     PropelException
	 */
	public function getUserInvites($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUserInvites || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserInvites) {
				// return empty collection
				$this->initUserInvites();
			} else {
				$collUserInvites = UserInviteQuery::create(null, $criteria)
					->filterByUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collUserInvites;
				}
				$this->collUserInvites = $collUserInvites;
			}
		}
		return $this->collUserInvites;
	}

	/**
	 * Returns the number of related UserInvite objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserInvite objects.
	 * @throws     PropelException
	 */
	public function countUserInvites(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUserInvites || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserInvites) {
				return 0;
			} else {
				$query = UserInviteQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collUserInvites);
		}
	}

	/**
	 * Method called to associate a UserInvite object to this object
	 * through the UserInvite foreign key attribute.
	 *
	 * @param      UserInvite $l UserInvite
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserInvite(UserInvite $l)
	{
		if ($this->collUserInvites === null) {
			$this->initUserInvites();
		}
		if (!$this->collUserInvites->contains($l)) { // only add it if the **same** object is not already associated
			$this->collUserInvites[]= $l;
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related UserInvites from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserInvite[] List of UserInvite objects
	 */
	public function getUserInvitesJoinInvite($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserInviteQuery::create(null, $criteria);
		$query->joinWith('Invite', $join_behavior);

		return $this->getUserInvites($query, $con);
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
	 * If this User is new, it will return
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
					->filterByUser($this)
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
					->filterByUser($this)
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related UserPosts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserPost[] List of UserPost objects
	 */
	public function getUserPostsJoinPost($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserPostQuery::create(null, $criteria);
		$query->joinWith('Post', $join_behavior);

		return $this->getUserPosts($query, $con);
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
	 * If this User is new, it will return
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
					->filterByUser($this)
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
					->filterByUser($this)
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related UserMessages from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserMessage[] List of UserMessage objects
	 */
	public function getUserMessagesJoinMessage($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserMessageQuery::create(null, $criteria);
		$query->joinWith('Message', $join_behavior);

		return $this->getUserMessages($query, $con);
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
	 * If this User is new, it will return
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
					->filterByUser($this)
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
					->filterByUser($this)
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related UserMedias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserMedia[] List of UserMedia objects
	 */
	public function getUserMediasJoinMedia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserMediaQuery::create(null, $criteria);
		$query->joinWith('Media', $join_behavior);

		return $this->getUserMedias($query, $con);
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
	 * to the current object by way of the user_group cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
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
					->filterByUser($this)
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
	 * to the current object by way of the user_group cross-reference table.
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
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collGroups);
		}
	}

	/**
	 * Associate a Group object to this object
	 * through the user_group cross reference table.
	 *
	 * @param      Group $group The UserGroup object to relate
	 * @return     void
	 */
	public function addGroup($group)
	{
		if ($this->collGroups === null) {
			$this->initGroups();
		}
		if (!$this->collGroups->contains($group)) { // only add it if the **same** object is not already associated
			$userGroup = new UserGroup();
			$userGroup->setGroup($group);
			$this->addUserGroup($userGroup);

			$this->collGroups[]= $group;
		}
	}

	/**
	 * Clears out the collInvites collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addInvites()
	 */
	public function clearInvites()
	{
		$this->collInvites = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collInvites collection.
	 *
	 * By default this just sets the collInvites collection to an empty collection (like clearInvites());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initInvites()
	{
		$this->collInvites = new PropelObjectCollection();
		$this->collInvites->setModel('Invite');
	}

	/**
	 * Gets a collection of Invite objects related by a many-to-many relationship
	 * to the current object by way of the user_invite cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Invite[] List of Invite objects
	 */
	public function getInvites($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collInvites || null !== $criteria) {
			if ($this->isNew() && null === $this->collInvites) {
				// return empty collection
				$this->initInvites();
			} else {
				$collInvites = InviteQuery::create(null, $criteria)
					->filterByUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collInvites;
				}
				$this->collInvites = $collInvites;
			}
		}
		return $this->collInvites;
	}

	/**
	 * Gets the number of Invite objects related by a many-to-many relationship
	 * to the current object by way of the user_invite cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Invite objects
	 */
	public function countInvites($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collInvites || null !== $criteria) {
			if ($this->isNew() && null === $this->collInvites) {
				return 0;
			} else {
				$query = InviteQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collInvites);
		}
	}

	/**
	 * Associate a Invite object to this object
	 * through the user_invite cross reference table.
	 *
	 * @param      Invite $invite The UserInvite object to relate
	 * @return     void
	 */
	public function addInvite($invite)
	{
		if ($this->collInvites === null) {
			$this->initInvites();
		}
		if (!$this->collInvites->contains($invite)) { // only add it if the **same** object is not already associated
			$userInvite = new UserInvite();
			$userInvite->setInvite($invite);
			$this->addUserInvite($userInvite);

			$this->collInvites[]= $invite;
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
	 * to the current object by way of the user_post cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
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
					->filterByUser($this)
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
	 * to the current object by way of the user_post cross-reference table.
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
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collPosts);
		}
	}

	/**
	 * Associate a Post object to this object
	 * through the user_post cross reference table.
	 *
	 * @param      Post $post The UserPost object to relate
	 * @return     void
	 */
	public function addPost($post)
	{
		if ($this->collPosts === null) {
			$this->initPosts();
		}
		if (!$this->collPosts->contains($post)) { // only add it if the **same** object is not already associated
			$userPost = new UserPost();
			$userPost->setPost($post);
			$this->addUserPost($userPost);

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
	 * to the current object by way of the user_message cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
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
					->filterByUser($this)
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
	 * to the current object by way of the user_message cross-reference table.
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
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collMessages);
		}
	}

	/**
	 * Associate a Message object to this object
	 * through the user_message cross reference table.
	 *
	 * @param      Message $message The UserMessage object to relate
	 * @return     void
	 */
	public function addMessage($message)
	{
		if ($this->collMessages === null) {
			$this->initMessages();
		}
		if (!$this->collMessages->contains($message)) { // only add it if the **same** object is not already associated
			$userMessage = new UserMessage();
			$userMessage->setMessage($message);
			$this->addUserMessage($userMessage);

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
	 * to the current object by way of the user_media cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
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
					->filterByUser($this)
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
	 * to the current object by way of the user_media cross-reference table.
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
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collMedias);
		}
	}

	/**
	 * Associate a Media object to this object
	 * through the user_media cross reference table.
	 *
	 * @param      Media $media The UserMedia object to relate
	 * @return     void
	 */
	public function addMedia($media)
	{
		if ($this->collMedias === null) {
			$this->initMedias();
		}
		if (!$this->collMedias->contains($media)) { // only add it if the **same** object is not already associated
			$userMedia = new UserMedia();
			$userMedia->setMedia($media);
			$this->addUserMedia($userMedia);

			$this->collMedias[]= $media;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->sessionid = null;
		$this->oldid = null;
		$this->avatarid = null;
		$this->email = null;
		$this->password = null;
		$this->nickname = null;
		$this->firstname = null;
		$this->lastname = null;
		$this->gender = null;
		$this->phone = null;
		$this->dateofregistration = null;
		$this->dateofbirth = null;
		$this->lastvisittime = null;
		$this->grinvichtimeoffset = null;
		$this->activated = null;
		$this->verificationcode = null;
		$this->domain = null;
		$this->status = null;
		$this->language = null;
		$this->currentip = null;
		$this->autograb = null;
		$this->domaintograb = null;
		$this->profile = null;
		$this->preferences = null;
		$this->securitylog = null;
		$this->invitedby = null;
		$this->invitesammount = null;
		$this->quotabytes = null;
		$this->quotaoriginals = null;
		$this->quotabytesused = null;
		$this->quotaoriginalsused = null;
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
			if ($this->collUserInvites) {
				foreach ($this->collUserInvites as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUserPosts) {
				foreach ($this->collUserPosts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUserMessages) {
				foreach ($this->collUserMessages as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUserMedias) {
				foreach ($this->collUserMedias as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collUserGroups instanceof PropelCollection) {
			$this->collUserGroups->clearIterator();
		}
		$this->collUserGroups = null;
		if ($this->collUserInvites instanceof PropelCollection) {
			$this->collUserInvites->clearIterator();
		}
		$this->collUserInvites = null;
		if ($this->collUserPosts instanceof PropelCollection) {
			$this->collUserPosts->clearIterator();
		}
		$this->collUserPosts = null;
		if ($this->collUserMessages instanceof PropelCollection) {
			$this->collUserMessages->clearIterator();
		}
		$this->collUserMessages = null;
		if ($this->collUserMedias instanceof PropelCollection) {
			$this->collUserMedias->clearIterator();
		}
		$this->collUserMedias = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(UserPeer::DEFAULT_STRING_FORMAT);
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

} // BaseUser
