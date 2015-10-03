<?php

namespace Happster\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Happster\Model\Activite;
use Happster\Model\ActiviteQuery;
use Happster\Model\CompteEdf;
use Happster\Model\CompteEdfQuery;
use Happster\Model\Historique;
use Happster\Model\HistoriqueQuery;
use Happster\Model\Poste;
use Happster\Model\PosteQuery;
use Happster\Model\Tarif;
use Happster\Model\TarifQuery;
use Happster\Model\User;
use Happster\Model\UserPeer;
use Happster\Model\UserQuery;

/**
 * Base class that represents a row from the 'user' table.
 *
 *
 *
 * @package    propel.generator..om
 */
abstract class BaseUser extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Happster\\Model\\UserPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        UserPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the first_name field.
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     * @var        string
     */
    protected $last_name;

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
     * The value for the phone_number field.
     * @var        string
     */
    protected $phone_number;

    /**
     * The value for the role field.
     * @var        string
     */
    protected $role;

    /**
     * The value for the created_by field.
     * @var        int
     */
    protected $created_by;

    /**
     * The value for the updated_by field.
     * @var        int
     */
    protected $updated_by;

    /**
     * The value for the created_at field.
     * @var        string
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        string
     */
    protected $updated_at;

    /**
     * @var        User
     */
    protected $aUserRelatedByCreatedBy;

    /**
     * @var        User
     */
    protected $aUserRelatedByUpdatedBy;

    /**
     * @var        PropelObjectCollection|CompteEdf[] Collection to store aggregation of CompteEdf objects.
     */
    protected $collCompteEdfsRelatedByCreatedBy;
    protected $collCompteEdfsRelatedByCreatedByPartial;

    /**
     * @var        PropelObjectCollection|CompteEdf[] Collection to store aggregation of CompteEdf objects.
     */
    protected $collCompteEdfsRelatedByUpdatedBy;
    protected $collCompteEdfsRelatedByUpdatedByPartial;

    /**
     * @var        PropelObjectCollection|Tarif[] Collection to store aggregation of Tarif objects.
     */
    protected $collTarifsRelatedByCreatedBy;
    protected $collTarifsRelatedByCreatedByPartial;

    /**
     * @var        PropelObjectCollection|Tarif[] Collection to store aggregation of Tarif objects.
     */
    protected $collTarifsRelatedByUpdatedBy;
    protected $collTarifsRelatedByUpdatedByPartial;

    /**
     * @var        PropelObjectCollection|Historique[] Collection to store aggregation of Historique objects.
     */
    protected $collHistoriquesRelatedByCreatedBy;
    protected $collHistoriquesRelatedByCreatedByPartial;

    /**
     * @var        PropelObjectCollection|Historique[] Collection to store aggregation of Historique objects.
     */
    protected $collHistoriquesRelatedByUpdatedBy;
    protected $collHistoriquesRelatedByUpdatedByPartial;

    /**
     * @var        PropelObjectCollection|Poste[] Collection to store aggregation of Poste objects.
     */
    protected $collPostesRelatedByCreatedBy;
    protected $collPostesRelatedByCreatedByPartial;

    /**
     * @var        PropelObjectCollection|Poste[] Collection to store aggregation of Poste objects.
     */
    protected $collPostesRelatedByUpdatedBy;
    protected $collPostesRelatedByUpdatedByPartial;

    /**
     * @var        PropelObjectCollection|Activite[] Collection to store aggregation of Activite objects.
     */
    protected $collActivitesRelatedByCreatedBy;
    protected $collActivitesRelatedByCreatedByPartial;

    /**
     * @var        PropelObjectCollection|Activite[] Collection to store aggregation of Activite objects.
     */
    protected $collActivitesRelatedByUpdatedBy;
    protected $collActivitesRelatedByUpdatedByPartial;

    /**
     * @var        PropelObjectCollection|User[] Collection to store aggregation of User objects.
     */
    protected $collUsersRelatedById0;
    protected $collUsersRelatedById0Partial;

    /**
     * @var        PropelObjectCollection|User[] Collection to store aggregation of User objects.
     */
    protected $collUsersRelatedById1;
    protected $collUsersRelatedById1Partial;

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
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $compteEdfsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $compteEdfsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tarifsRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tarifsRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $historiquesRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $historiquesRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $postesRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $postesRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $activitesRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $activitesRelatedByUpdatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usersRelatedById0ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $usersRelatedById1ScheduledForDeletion = null;

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [first_name] column value.
     *
     * @return string
     */
    public function getFirstName()
    {

        return $this->first_name;
    }

    /**
     * Get the [last_name] column value.
     *
     * @return string
     */
    public function getLastName()
    {

        return $this->last_name;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {

        return $this->email;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {

        return $this->password;
    }

    /**
     * Get the [phone_number] column value.
     *
     * @return string
     */
    public function getPhoneNumber()
    {

        return $this->phone_number;
    }

    /**
     * Get the [role] column value.
     *
     * @return string
     */
    public function getRole()
    {

        return $this->role;
    }

    /**
     * Get the [created_by] column value.
     *
     * @return int
     */
    public function getCreatedBy()
    {

        return $this->created_by;
    }

    /**
     * Get the [updated_by] column value.
     *
     * @return int
     */
    public function getUpdatedBy()
    {

        return $this->updated_by;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->created_at === null) {
            return null;
        }

        if ($this->created_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = 'Y-m-d H:i:s')
    {
        if ($this->updated_at === null) {
            return null;
        }

        if ($this->updated_at === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->updated_at);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return User The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = UserPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [first_name] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = UserPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = UserPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [email] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
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
     * @param  string $v new value
     * @return User The current object (for fluent API support)
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
     * Set the value of [phone_number] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setPhoneNumber($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone_number !== $v) {
            $this->phone_number = $v;
            $this->modifiedColumns[] = UserPeer::PHONE_NUMBER;
        }


        return $this;
    } // setPhoneNumber()

    /**
     * Set the value of [role] column.
     *
     * @param  string $v new value
     * @return User The current object (for fluent API support)
     */
    public function setRole($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->role !== $v) {
            $this->role = $v;
            $this->modifiedColumns[] = UserPeer::ROLE;
        }


        return $this;
    } // setRole()

    /**
     * Set the value of [created_by] column.
     *
     * @param  int $v new value
     * @return User The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = UserPeer::CREATED_BY;
        }

        if ($this->aUserRelatedByCreatedBy !== null && $this->aUserRelatedByCreatedBy->getId() !== $v) {
            $this->aUserRelatedByCreatedBy = null;
        }


        return $this;
    } // setCreatedBy()

    /**
     * Set the value of [updated_by] column.
     *
     * @param  int $v new value
     * @return User The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = UserPeer::UPDATED_BY;
        }

        if ($this->aUserRelatedByUpdatedBy !== null && $this->aUserRelatedByUpdatedBy->getId() !== $v) {
            $this->aUserRelatedByUpdatedBy = null;
        }


        return $this;
    } // setUpdatedBy()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return User The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = UserPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return User The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = UserPeer::UPDATED_AT;
            }
        } // if either are not null


        return $this;
    } // setUpdatedAt()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
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
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->first_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->last_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->email = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->password = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->phone_number = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->role = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->created_by = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->updated_by = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->created_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->updated_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 11; // 11 = UserPeer::NUM_HYDRATE_COLUMNS.

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
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aUserRelatedByCreatedBy !== null && $this->created_by !== $this->aUserRelatedByCreatedBy->getId()) {
            $this->aUserRelatedByCreatedBy = null;
        }
        if ($this->aUserRelatedByUpdatedBy !== null && $this->updated_by !== $this->aUserRelatedByUpdatedBy->getId()) {
            $this->aUserRelatedByUpdatedBy = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
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

            $this->aUserRelatedByCreatedBy = null;
            $this->aUserRelatedByUpdatedBy = null;
            $this->collCompteEdfsRelatedByCreatedBy = null;

            $this->collCompteEdfsRelatedByUpdatedBy = null;

            $this->collTarifsRelatedByCreatedBy = null;

            $this->collTarifsRelatedByUpdatedBy = null;

            $this->collHistoriquesRelatedByCreatedBy = null;

            $this->collHistoriquesRelatedByUpdatedBy = null;

            $this->collPostesRelatedByCreatedBy = null;

            $this->collPostesRelatedByUpdatedBy = null;

            $this->collActivitesRelatedByCreatedBy = null;

            $this->collActivitesRelatedByUpdatedBy = null;

            $this->collUsersRelatedById0 = null;

            $this->collUsersRelatedById1 = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
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
            $deleteQuery = UserQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
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
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
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
                // blamable behavior
                if (!$this->isColumnModified(UserPeer::CREATED_BY)) {
                    $this->setCreatedBy(\Happster\Helper\Auth::getUser()->getId());
                    }
                if (!$this->isColumnModified(UserPeer::UPDATED_BY)) {
                    $this->setUpdatedBy(\Happster\Helper\Auth::getUser()->getId());
                    }
                // timestampable behavior
                if (!$this->isColumnModified(UserPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(UserPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // blamable behavior
                if ($this->isModified() && !$this->isColumnModified(UserPeer::UPDATED_BY)) {
                    $this->setUpdatedBy(\Happster\Helper\Auth::getUser()->getId());
                    }
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(UserPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
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
        } catch (Exception $e) {
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
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUserRelatedByCreatedBy !== null) {
                if ($this->aUserRelatedByCreatedBy->isModified() || $this->aUserRelatedByCreatedBy->isNew()) {
                    $affectedRows += $this->aUserRelatedByCreatedBy->save($con);
                }
                $this->setUserRelatedByCreatedBy($this->aUserRelatedByCreatedBy);
            }

            if ($this->aUserRelatedByUpdatedBy !== null) {
                if ($this->aUserRelatedByUpdatedBy->isModified() || $this->aUserRelatedByUpdatedBy->isNew()) {
                    $affectedRows += $this->aUserRelatedByUpdatedBy->save($con);
                }
                $this->setUserRelatedByUpdatedBy($this->aUserRelatedByUpdatedBy);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->compteEdfsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->compteEdfsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->compteEdfsRelatedByCreatedByScheduledForDeletion as $compteEdfRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $compteEdfRelatedByCreatedBy->save($con);
                    }
                    $this->compteEdfsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collCompteEdfsRelatedByCreatedBy !== null) {
                foreach ($this->collCompteEdfsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->compteEdfsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->compteEdfsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->compteEdfsRelatedByUpdatedByScheduledForDeletion as $compteEdfRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $compteEdfRelatedByUpdatedBy->save($con);
                    }
                    $this->compteEdfsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collCompteEdfsRelatedByUpdatedBy !== null) {
                foreach ($this->collCompteEdfsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tarifsRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->tarifsRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->tarifsRelatedByCreatedByScheduledForDeletion as $tarifRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $tarifRelatedByCreatedBy->save($con);
                    }
                    $this->tarifsRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collTarifsRelatedByCreatedBy !== null) {
                foreach ($this->collTarifsRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tarifsRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->tarifsRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->tarifsRelatedByUpdatedByScheduledForDeletion as $tarifRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $tarifRelatedByUpdatedBy->save($con);
                    }
                    $this->tarifsRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collTarifsRelatedByUpdatedBy !== null) {
                foreach ($this->collTarifsRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->historiquesRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->historiquesRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->historiquesRelatedByCreatedByScheduledForDeletion as $historiqueRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $historiqueRelatedByCreatedBy->save($con);
                    }
                    $this->historiquesRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collHistoriquesRelatedByCreatedBy !== null) {
                foreach ($this->collHistoriquesRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->historiquesRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->historiquesRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->historiquesRelatedByUpdatedByScheduledForDeletion as $historiqueRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $historiqueRelatedByUpdatedBy->save($con);
                    }
                    $this->historiquesRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collHistoriquesRelatedByUpdatedBy !== null) {
                foreach ($this->collHistoriquesRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->postesRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->postesRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->postesRelatedByCreatedByScheduledForDeletion as $posteRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $posteRelatedByCreatedBy->save($con);
                    }
                    $this->postesRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collPostesRelatedByCreatedBy !== null) {
                foreach ($this->collPostesRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->postesRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->postesRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->postesRelatedByUpdatedByScheduledForDeletion as $posteRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $posteRelatedByUpdatedBy->save($con);
                    }
                    $this->postesRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collPostesRelatedByUpdatedBy !== null) {
                foreach ($this->collPostesRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->activitesRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->activitesRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->activitesRelatedByCreatedByScheduledForDeletion as $activiteRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $activiteRelatedByCreatedBy->save($con);
                    }
                    $this->activitesRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collActivitesRelatedByCreatedBy !== null) {
                foreach ($this->collActivitesRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->activitesRelatedByUpdatedByScheduledForDeletion !== null) {
                if (!$this->activitesRelatedByUpdatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->activitesRelatedByUpdatedByScheduledForDeletion as $activiteRelatedByUpdatedBy) {
                        // need to save related object because we set the relation to null
                        $activiteRelatedByUpdatedBy->save($con);
                    }
                    $this->activitesRelatedByUpdatedByScheduledForDeletion = null;
                }
            }

            if ($this->collActivitesRelatedByUpdatedBy !== null) {
                foreach ($this->collActivitesRelatedByUpdatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usersRelatedById0ScheduledForDeletion !== null) {
                if (!$this->usersRelatedById0ScheduledForDeletion->isEmpty()) {
                    foreach ($this->usersRelatedById0ScheduledForDeletion as $userRelatedById0) {
                        // need to save related object because we set the relation to null
                        $userRelatedById0->save($con);
                    }
                    $this->usersRelatedById0ScheduledForDeletion = null;
                }
            }

            if ($this->collUsersRelatedById0 !== null) {
                foreach ($this->collUsersRelatedById0 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usersRelatedById1ScheduledForDeletion !== null) {
                if (!$this->usersRelatedById1ScheduledForDeletion->isEmpty()) {
                    foreach ($this->usersRelatedById1ScheduledForDeletion as $userRelatedById1) {
                        // need to save related object because we set the relation to null
                        $userRelatedById1->save($con);
                    }
                    $this->usersRelatedById1ScheduledForDeletion = null;
                }
            }

            if ($this->collUsersRelatedById1 !== null) {
                foreach ($this->collUsersRelatedById1 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = UserPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(UserPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(UserPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(UserPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(UserPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(UserPeer::PHONE_NUMBER)) {
            $modifiedColumns[':p' . $index++]  = '`phone_number`';
        }
        if ($this->isColumnModified(UserPeer::ROLE)) {
            $modifiedColumns[':p' . $index++]  = '`role`';
        }
        if ($this->isColumnModified(UserPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(UserPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`updated_by`';
        }
        if ($this->isColumnModified(UserPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(UserPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `user` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`first_name`':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case '`last_name`':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`password`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`phone_number`':
                        $stmt->bindValue($identifier, $this->phone_number, PDO::PARAM_STR);
                        break;
                    case '`role`':
                        $stmt->bindValue($identifier, $this->role, PDO::PARAM_STR);
                        break;
                    case '`created_by`':
                        $stmt->bindValue($identifier, $this->created_by, PDO::PARAM_INT);
                        break;
                    case '`updated_by`':
                        $stmt->bindValue($identifier, $this->updated_by, PDO::PARAM_INT);
                        break;
                    case '`created_at`':
                        $stmt->bindValue($identifier, $this->created_at, PDO::PARAM_STR);
                        break;
                    case '`updated_at`':
                        $stmt->bindValue($identifier, $this->updated_at, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
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
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUserRelatedByCreatedBy !== null) {
                if (!$this->aUserRelatedByCreatedBy->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUserRelatedByCreatedBy->getValidationFailures());
                }
            }

            if ($this->aUserRelatedByUpdatedBy !== null) {
                if (!$this->aUserRelatedByUpdatedBy->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUserRelatedByUpdatedBy->getValidationFailures());
                }
            }


            if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collCompteEdfsRelatedByCreatedBy !== null) {
                    foreach ($this->collCompteEdfsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCompteEdfsRelatedByUpdatedBy !== null) {
                    foreach ($this->collCompteEdfsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTarifsRelatedByCreatedBy !== null) {
                    foreach ($this->collTarifsRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTarifsRelatedByUpdatedBy !== null) {
                    foreach ($this->collTarifsRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collHistoriquesRelatedByCreatedBy !== null) {
                    foreach ($this->collHistoriquesRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collHistoriquesRelatedByUpdatedBy !== null) {
                    foreach ($this->collHistoriquesRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPostesRelatedByCreatedBy !== null) {
                    foreach ($this->collPostesRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPostesRelatedByUpdatedBy !== null) {
                    foreach ($this->collPostesRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActivitesRelatedByCreatedBy !== null) {
                    foreach ($this->collActivitesRelatedByCreatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActivitesRelatedByUpdatedBy !== null) {
                    foreach ($this->collActivitesRelatedByUpdatedBy as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsersRelatedById0 !== null) {
                    foreach ($this->collUsersRelatedById0 as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collUsersRelatedById1 !== null) {
                    foreach ($this->collUsersRelatedById1 as $referrerFK) {
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
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
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
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getFirstName();
                break;
            case 2:
                return $this->getLastName();
                break;
            case 3:
                return $this->getEmail();
                break;
            case 4:
                return $this->getPassword();
                break;
            case 5:
                return $this->getPhoneNumber();
                break;
            case 6:
                return $this->getRole();
                break;
            case 7:
                return $this->getCreatedBy();
                break;
            case 8:
                return $this->getUpdatedBy();
                break;
            case 9:
                return $this->getCreatedAt();
                break;
            case 10:
                return $this->getUpdatedAt();
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
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
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
            $keys[1] => $this->getFirstName(),
            $keys[2] => $this->getLastName(),
            $keys[3] => $this->getEmail(),
            $keys[4] => $this->getPassword(),
            $keys[5] => $this->getPhoneNumber(),
            $keys[6] => $this->getRole(),
            $keys[7] => $this->getCreatedBy(),
            $keys[8] => $this->getUpdatedBy(),
            $keys[9] => $this->getCreatedAt(),
            $keys[10] => $this->getUpdatedAt(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUserRelatedByCreatedBy) {
                $result['UserRelatedByCreatedBy'] = $this->aUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUserRelatedByUpdatedBy) {
                $result['UserRelatedByUpdatedBy'] = $this->aUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collCompteEdfsRelatedByCreatedBy) {
                $result['CompteEdfsRelatedByCreatedBy'] = $this->collCompteEdfsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCompteEdfsRelatedByUpdatedBy) {
                $result['CompteEdfsRelatedByUpdatedBy'] = $this->collCompteEdfsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTarifsRelatedByCreatedBy) {
                $result['TarifsRelatedByCreatedBy'] = $this->collTarifsRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTarifsRelatedByUpdatedBy) {
                $result['TarifsRelatedByUpdatedBy'] = $this->collTarifsRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHistoriquesRelatedByCreatedBy) {
                $result['HistoriquesRelatedByCreatedBy'] = $this->collHistoriquesRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collHistoriquesRelatedByUpdatedBy) {
                $result['HistoriquesRelatedByUpdatedBy'] = $this->collHistoriquesRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPostesRelatedByCreatedBy) {
                $result['PostesRelatedByCreatedBy'] = $this->collPostesRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPostesRelatedByUpdatedBy) {
                $result['PostesRelatedByUpdatedBy'] = $this->collPostesRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActivitesRelatedByCreatedBy) {
                $result['ActivitesRelatedByCreatedBy'] = $this->collActivitesRelatedByCreatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActivitesRelatedByUpdatedBy) {
                $result['ActivitesRelatedByUpdatedBy'] = $this->collActivitesRelatedByUpdatedBy->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsersRelatedById0) {
                $result['UsersRelatedById0'] = $this->collUsersRelatedById0->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsersRelatedById1) {
                $result['UsersRelatedById1'] = $this->collUsersRelatedById1->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setFirstName($value);
                break;
            case 2:
                $this->setLastName($value);
                break;
            case 3:
                $this->setEmail($value);
                break;
            case 4:
                $this->setPassword($value);
                break;
            case 5:
                $this->setPhoneNumber($value);
                break;
            case 6:
                $this->setRole($value);
                break;
            case 7:
                $this->setCreatedBy($value);
                break;
            case 8:
                $this->setUpdatedBy($value);
                break;
            case 9:
                $this->setCreatedAt($value);
                break;
            case 10:
                $this->setUpdatedAt($value);
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
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = UserPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFirstName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setLastName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setEmail($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setPhoneNumber($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setRole($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCreatedBy($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setUpdatedBy($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UserPeer::DATABASE_NAME);

        if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
        if ($this->isColumnModified(UserPeer::FIRST_NAME)) $criteria->add(UserPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(UserPeer::LAST_NAME)) $criteria->add(UserPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(UserPeer::EMAIL)) $criteria->add(UserPeer::EMAIL, $this->email);
        if ($this->isColumnModified(UserPeer::PASSWORD)) $criteria->add(UserPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(UserPeer::PHONE_NUMBER)) $criteria->add(UserPeer::PHONE_NUMBER, $this->phone_number);
        if ($this->isColumnModified(UserPeer::ROLE)) $criteria->add(UserPeer::ROLE, $this->role);
        if ($this->isColumnModified(UserPeer::CREATED_BY)) $criteria->add(UserPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(UserPeer::UPDATED_BY)) $criteria->add(UserPeer::UPDATED_BY, $this->updated_by);
        if ($this->isColumnModified(UserPeer::CREATED_AT)) $criteria->add(UserPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(UserPeer::UPDATED_AT)) $criteria->add(UserPeer::UPDATED_AT, $this->updated_at);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(UserPeer::DATABASE_NAME);
        $criteria->add(UserPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
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
     * @param object $copyObj An object of User (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setPhoneNumber($this->getPhoneNumber());
        $copyObj->setRole($this->getRole());
        $copyObj->setCreatedBy($this->getCreatedBy());
        $copyObj->setUpdatedBy($this->getUpdatedBy());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getCompteEdfsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCompteEdfRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCompteEdfsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCompteEdfRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTarifsRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTarifRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTarifsRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTarifRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHistoriquesRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHistoriqueRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getHistoriquesRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHistoriqueRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPostesRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPosteRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPostesRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPosteRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActivitesRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActiviteRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActivitesRelatedByUpdatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActiviteRelatedByUpdatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsersRelatedById0() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUserRelatedById0($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsersRelatedById1() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUserRelatedById1($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
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
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return User Clone of current object.
     * @throws PropelException
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
     * @return UserPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UserPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return User The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUserRelatedByCreatedBy(User $v = null)
    {
        if ($v === null) {
            $this->setCreatedBy(NULL);
        } else {
            $this->setCreatedBy($v->getId());
        }

        $this->aUserRelatedByCreatedBy = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addUserRelatedById0($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return User The associated User object.
     * @throws PropelException
     */
    public function getUserRelatedByCreatedBy(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUserRelatedByCreatedBy === null && ($this->created_by !== null) && $doQuery) {
            $this->aUserRelatedByCreatedBy = UserQuery::create()->findPk($this->created_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserRelatedByCreatedBy->addUsersRelatedById0($this);
             */
        }

        return $this->aUserRelatedByCreatedBy;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return User The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUserRelatedByUpdatedBy(User $v = null)
    {
        if ($v === null) {
            $this->setUpdatedBy(NULL);
        } else {
            $this->setUpdatedBy($v->getId());
        }

        $this->aUserRelatedByUpdatedBy = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addUserRelatedById1($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return User The associated User object.
     * @throws PropelException
     */
    public function getUserRelatedByUpdatedBy(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUserRelatedByUpdatedBy === null && ($this->updated_by !== null) && $doQuery) {
            $this->aUserRelatedByUpdatedBy = UserQuery::create()->findPk($this->updated_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserRelatedByUpdatedBy->addUsersRelatedById1($this);
             */
        }

        return $this->aUserRelatedByUpdatedBy;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('CompteEdfRelatedByCreatedBy' == $relationName) {
            $this->initCompteEdfsRelatedByCreatedBy();
        }
        if ('CompteEdfRelatedByUpdatedBy' == $relationName) {
            $this->initCompteEdfsRelatedByUpdatedBy();
        }
        if ('TarifRelatedByCreatedBy' == $relationName) {
            $this->initTarifsRelatedByCreatedBy();
        }
        if ('TarifRelatedByUpdatedBy' == $relationName) {
            $this->initTarifsRelatedByUpdatedBy();
        }
        if ('HistoriqueRelatedByCreatedBy' == $relationName) {
            $this->initHistoriquesRelatedByCreatedBy();
        }
        if ('HistoriqueRelatedByUpdatedBy' == $relationName) {
            $this->initHistoriquesRelatedByUpdatedBy();
        }
        if ('PosteRelatedByCreatedBy' == $relationName) {
            $this->initPostesRelatedByCreatedBy();
        }
        if ('PosteRelatedByUpdatedBy' == $relationName) {
            $this->initPostesRelatedByUpdatedBy();
        }
        if ('ActiviteRelatedByCreatedBy' == $relationName) {
            $this->initActivitesRelatedByCreatedBy();
        }
        if ('ActiviteRelatedByUpdatedBy' == $relationName) {
            $this->initActivitesRelatedByUpdatedBy();
        }
        if ('UserRelatedById0' == $relationName) {
            $this->initUsersRelatedById0();
        }
        if ('UserRelatedById1' == $relationName) {
            $this->initUsersRelatedById1();
        }
    }

    /**
     * Clears out the collCompteEdfsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addCompteEdfsRelatedByCreatedBy()
     */
    public function clearCompteEdfsRelatedByCreatedBy()
    {
        $this->collCompteEdfsRelatedByCreatedBy = null; // important to set this to null since that means it is uninitialized
        $this->collCompteEdfsRelatedByCreatedByPartial = null;

        return $this;
    }

    /**
     * reset is the collCompteEdfsRelatedByCreatedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialCompteEdfsRelatedByCreatedBy($v = true)
    {
        $this->collCompteEdfsRelatedByCreatedByPartial = $v;
    }

    /**
     * Initializes the collCompteEdfsRelatedByCreatedBy collection.
     *
     * By default this just sets the collCompteEdfsRelatedByCreatedBy collection to an empty array (like clearcollCompteEdfsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCompteEdfsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collCompteEdfsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collCompteEdfsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collCompteEdfsRelatedByCreatedBy->setModel('CompteEdf');
    }

    /**
     * Gets an array of CompteEdf objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CompteEdf[] List of CompteEdf objects
     * @throws PropelException
     */
    public function getCompteEdfsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCompteEdfsRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collCompteEdfsRelatedByCreatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCompteEdfsRelatedByCreatedBy) {
                // return empty collection
                $this->initCompteEdfsRelatedByCreatedBy();
            } else {
                $collCompteEdfsRelatedByCreatedBy = CompteEdfQuery::create(null, $criteria)
                    ->filterByUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCompteEdfsRelatedByCreatedByPartial && count($collCompteEdfsRelatedByCreatedBy)) {
                      $this->initCompteEdfsRelatedByCreatedBy(false);

                      foreach ($collCompteEdfsRelatedByCreatedBy as $obj) {
                        if (false == $this->collCompteEdfsRelatedByCreatedBy->contains($obj)) {
                          $this->collCompteEdfsRelatedByCreatedBy->append($obj);
                        }
                      }

                      $this->collCompteEdfsRelatedByCreatedByPartial = true;
                    }

                    $collCompteEdfsRelatedByCreatedBy->getInternalIterator()->rewind();

                    return $collCompteEdfsRelatedByCreatedBy;
                }

                if ($partial && $this->collCompteEdfsRelatedByCreatedBy) {
                    foreach ($this->collCompteEdfsRelatedByCreatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collCompteEdfsRelatedByCreatedBy[] = $obj;
                        }
                    }
                }

                $this->collCompteEdfsRelatedByCreatedBy = $collCompteEdfsRelatedByCreatedBy;
                $this->collCompteEdfsRelatedByCreatedByPartial = false;
            }
        }

        return $this->collCompteEdfsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of CompteEdfRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $compteEdfsRelatedByCreatedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setCompteEdfsRelatedByCreatedBy(PropelCollection $compteEdfsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $compteEdfsRelatedByCreatedByToDelete = $this->getCompteEdfsRelatedByCreatedBy(new Criteria(), $con)->diff($compteEdfsRelatedByCreatedBy);


        $this->compteEdfsRelatedByCreatedByScheduledForDeletion = $compteEdfsRelatedByCreatedByToDelete;

        foreach ($compteEdfsRelatedByCreatedByToDelete as $compteEdfRelatedByCreatedByRemoved) {
            $compteEdfRelatedByCreatedByRemoved->setUserRelatedByCreatedBy(null);
        }

        $this->collCompteEdfsRelatedByCreatedBy = null;
        foreach ($compteEdfsRelatedByCreatedBy as $compteEdfRelatedByCreatedBy) {
            $this->addCompteEdfRelatedByCreatedBy($compteEdfRelatedByCreatedBy);
        }

        $this->collCompteEdfsRelatedByCreatedBy = $compteEdfsRelatedByCreatedBy;
        $this->collCompteEdfsRelatedByCreatedByPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CompteEdf objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CompteEdf objects.
     * @throws PropelException
     */
    public function countCompteEdfsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCompteEdfsRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collCompteEdfsRelatedByCreatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCompteEdfsRelatedByCreatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCompteEdfsRelatedByCreatedBy());
            }
            $query = CompteEdfQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByCreatedBy($this)
                ->count($con);
        }

        return count($this->collCompteEdfsRelatedByCreatedBy);
    }

    /**
     * Method called to associate a CompteEdf object to this object
     * through the CompteEdf foreign key attribute.
     *
     * @param    CompteEdf $l CompteEdf
     * @return User The current object (for fluent API support)
     */
    public function addCompteEdfRelatedByCreatedBy(CompteEdf $l)
    {
        if ($this->collCompteEdfsRelatedByCreatedBy === null) {
            $this->initCompteEdfsRelatedByCreatedBy();
            $this->collCompteEdfsRelatedByCreatedByPartial = true;
        }

        if (!in_array($l, $this->collCompteEdfsRelatedByCreatedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCompteEdfRelatedByCreatedBy($l);

            if ($this->compteEdfsRelatedByCreatedByScheduledForDeletion and $this->compteEdfsRelatedByCreatedByScheduledForDeletion->contains($l)) {
                $this->compteEdfsRelatedByCreatedByScheduledForDeletion->remove($this->compteEdfsRelatedByCreatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CompteEdfRelatedByCreatedBy $compteEdfRelatedByCreatedBy The compteEdfRelatedByCreatedBy object to add.
     */
    protected function doAddCompteEdfRelatedByCreatedBy($compteEdfRelatedByCreatedBy)
    {
        $this->collCompteEdfsRelatedByCreatedBy[]= $compteEdfRelatedByCreatedBy;
        $compteEdfRelatedByCreatedBy->setUserRelatedByCreatedBy($this);
    }

    /**
     * @param	CompteEdfRelatedByCreatedBy $compteEdfRelatedByCreatedBy The compteEdfRelatedByCreatedBy object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeCompteEdfRelatedByCreatedBy($compteEdfRelatedByCreatedBy)
    {
        if ($this->getCompteEdfsRelatedByCreatedBy()->contains($compteEdfRelatedByCreatedBy)) {
            $this->collCompteEdfsRelatedByCreatedBy->remove($this->collCompteEdfsRelatedByCreatedBy->search($compteEdfRelatedByCreatedBy));
            if (null === $this->compteEdfsRelatedByCreatedByScheduledForDeletion) {
                $this->compteEdfsRelatedByCreatedByScheduledForDeletion = clone $this->collCompteEdfsRelatedByCreatedBy;
                $this->compteEdfsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->compteEdfsRelatedByCreatedByScheduledForDeletion[]= $compteEdfRelatedByCreatedBy;
            $compteEdfRelatedByCreatedBy->setUserRelatedByCreatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collCompteEdfsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addCompteEdfsRelatedByUpdatedBy()
     */
    public function clearCompteEdfsRelatedByUpdatedBy()
    {
        $this->collCompteEdfsRelatedByUpdatedBy = null; // important to set this to null since that means it is uninitialized
        $this->collCompteEdfsRelatedByUpdatedByPartial = null;

        return $this;
    }

    /**
     * reset is the collCompteEdfsRelatedByUpdatedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialCompteEdfsRelatedByUpdatedBy($v = true)
    {
        $this->collCompteEdfsRelatedByUpdatedByPartial = $v;
    }

    /**
     * Initializes the collCompteEdfsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collCompteEdfsRelatedByUpdatedBy collection to an empty array (like clearcollCompteEdfsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCompteEdfsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collCompteEdfsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collCompteEdfsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collCompteEdfsRelatedByUpdatedBy->setModel('CompteEdf');
    }

    /**
     * Gets an array of CompteEdf objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CompteEdf[] List of CompteEdf objects
     * @throws PropelException
     */
    public function getCompteEdfsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCompteEdfsRelatedByUpdatedByPartial && !$this->isNew();
        if (null === $this->collCompteEdfsRelatedByUpdatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCompteEdfsRelatedByUpdatedBy) {
                // return empty collection
                $this->initCompteEdfsRelatedByUpdatedBy();
            } else {
                $collCompteEdfsRelatedByUpdatedBy = CompteEdfQuery::create(null, $criteria)
                    ->filterByUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCompteEdfsRelatedByUpdatedByPartial && count($collCompteEdfsRelatedByUpdatedBy)) {
                      $this->initCompteEdfsRelatedByUpdatedBy(false);

                      foreach ($collCompteEdfsRelatedByUpdatedBy as $obj) {
                        if (false == $this->collCompteEdfsRelatedByUpdatedBy->contains($obj)) {
                          $this->collCompteEdfsRelatedByUpdatedBy->append($obj);
                        }
                      }

                      $this->collCompteEdfsRelatedByUpdatedByPartial = true;
                    }

                    $collCompteEdfsRelatedByUpdatedBy->getInternalIterator()->rewind();

                    return $collCompteEdfsRelatedByUpdatedBy;
                }

                if ($partial && $this->collCompteEdfsRelatedByUpdatedBy) {
                    foreach ($this->collCompteEdfsRelatedByUpdatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collCompteEdfsRelatedByUpdatedBy[] = $obj;
                        }
                    }
                }

                $this->collCompteEdfsRelatedByUpdatedBy = $collCompteEdfsRelatedByUpdatedBy;
                $this->collCompteEdfsRelatedByUpdatedByPartial = false;
            }
        }

        return $this->collCompteEdfsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of CompteEdfRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $compteEdfsRelatedByUpdatedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setCompteEdfsRelatedByUpdatedBy(PropelCollection $compteEdfsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $compteEdfsRelatedByUpdatedByToDelete = $this->getCompteEdfsRelatedByUpdatedBy(new Criteria(), $con)->diff($compteEdfsRelatedByUpdatedBy);


        $this->compteEdfsRelatedByUpdatedByScheduledForDeletion = $compteEdfsRelatedByUpdatedByToDelete;

        foreach ($compteEdfsRelatedByUpdatedByToDelete as $compteEdfRelatedByUpdatedByRemoved) {
            $compteEdfRelatedByUpdatedByRemoved->setUserRelatedByUpdatedBy(null);
        }

        $this->collCompteEdfsRelatedByUpdatedBy = null;
        foreach ($compteEdfsRelatedByUpdatedBy as $compteEdfRelatedByUpdatedBy) {
            $this->addCompteEdfRelatedByUpdatedBy($compteEdfRelatedByUpdatedBy);
        }

        $this->collCompteEdfsRelatedByUpdatedBy = $compteEdfsRelatedByUpdatedBy;
        $this->collCompteEdfsRelatedByUpdatedByPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CompteEdf objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CompteEdf objects.
     * @throws PropelException
     */
    public function countCompteEdfsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCompteEdfsRelatedByUpdatedByPartial && !$this->isNew();
        if (null === $this->collCompteEdfsRelatedByUpdatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCompteEdfsRelatedByUpdatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCompteEdfsRelatedByUpdatedBy());
            }
            $query = CompteEdfQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByUpdatedBy($this)
                ->count($con);
        }

        return count($this->collCompteEdfsRelatedByUpdatedBy);
    }

    /**
     * Method called to associate a CompteEdf object to this object
     * through the CompteEdf foreign key attribute.
     *
     * @param    CompteEdf $l CompteEdf
     * @return User The current object (for fluent API support)
     */
    public function addCompteEdfRelatedByUpdatedBy(CompteEdf $l)
    {
        if ($this->collCompteEdfsRelatedByUpdatedBy === null) {
            $this->initCompteEdfsRelatedByUpdatedBy();
            $this->collCompteEdfsRelatedByUpdatedByPartial = true;
        }

        if (!in_array($l, $this->collCompteEdfsRelatedByUpdatedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCompteEdfRelatedByUpdatedBy($l);

            if ($this->compteEdfsRelatedByUpdatedByScheduledForDeletion and $this->compteEdfsRelatedByUpdatedByScheduledForDeletion->contains($l)) {
                $this->compteEdfsRelatedByUpdatedByScheduledForDeletion->remove($this->compteEdfsRelatedByUpdatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CompteEdfRelatedByUpdatedBy $compteEdfRelatedByUpdatedBy The compteEdfRelatedByUpdatedBy object to add.
     */
    protected function doAddCompteEdfRelatedByUpdatedBy($compteEdfRelatedByUpdatedBy)
    {
        $this->collCompteEdfsRelatedByUpdatedBy[]= $compteEdfRelatedByUpdatedBy;
        $compteEdfRelatedByUpdatedBy->setUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	CompteEdfRelatedByUpdatedBy $compteEdfRelatedByUpdatedBy The compteEdfRelatedByUpdatedBy object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeCompteEdfRelatedByUpdatedBy($compteEdfRelatedByUpdatedBy)
    {
        if ($this->getCompteEdfsRelatedByUpdatedBy()->contains($compteEdfRelatedByUpdatedBy)) {
            $this->collCompteEdfsRelatedByUpdatedBy->remove($this->collCompteEdfsRelatedByUpdatedBy->search($compteEdfRelatedByUpdatedBy));
            if (null === $this->compteEdfsRelatedByUpdatedByScheduledForDeletion) {
                $this->compteEdfsRelatedByUpdatedByScheduledForDeletion = clone $this->collCompteEdfsRelatedByUpdatedBy;
                $this->compteEdfsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->compteEdfsRelatedByUpdatedByScheduledForDeletion[]= $compteEdfRelatedByUpdatedBy;
            $compteEdfRelatedByUpdatedBy->setUserRelatedByUpdatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collTarifsRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addTarifsRelatedByCreatedBy()
     */
    public function clearTarifsRelatedByCreatedBy()
    {
        $this->collTarifsRelatedByCreatedBy = null; // important to set this to null since that means it is uninitialized
        $this->collTarifsRelatedByCreatedByPartial = null;

        return $this;
    }

    /**
     * reset is the collTarifsRelatedByCreatedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialTarifsRelatedByCreatedBy($v = true)
    {
        $this->collTarifsRelatedByCreatedByPartial = $v;
    }

    /**
     * Initializes the collTarifsRelatedByCreatedBy collection.
     *
     * By default this just sets the collTarifsRelatedByCreatedBy collection to an empty array (like clearcollTarifsRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTarifsRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collTarifsRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collTarifsRelatedByCreatedBy = new PropelObjectCollection();
        $this->collTarifsRelatedByCreatedBy->setModel('Tarif');
    }

    /**
     * Gets an array of Tarif objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Tarif[] List of Tarif objects
     * @throws PropelException
     */
    public function getTarifsRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTarifsRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collTarifsRelatedByCreatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTarifsRelatedByCreatedBy) {
                // return empty collection
                $this->initTarifsRelatedByCreatedBy();
            } else {
                $collTarifsRelatedByCreatedBy = TarifQuery::create(null, $criteria)
                    ->filterByUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTarifsRelatedByCreatedByPartial && count($collTarifsRelatedByCreatedBy)) {
                      $this->initTarifsRelatedByCreatedBy(false);

                      foreach ($collTarifsRelatedByCreatedBy as $obj) {
                        if (false == $this->collTarifsRelatedByCreatedBy->contains($obj)) {
                          $this->collTarifsRelatedByCreatedBy->append($obj);
                        }
                      }

                      $this->collTarifsRelatedByCreatedByPartial = true;
                    }

                    $collTarifsRelatedByCreatedBy->getInternalIterator()->rewind();

                    return $collTarifsRelatedByCreatedBy;
                }

                if ($partial && $this->collTarifsRelatedByCreatedBy) {
                    foreach ($this->collTarifsRelatedByCreatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collTarifsRelatedByCreatedBy[] = $obj;
                        }
                    }
                }

                $this->collTarifsRelatedByCreatedBy = $collTarifsRelatedByCreatedBy;
                $this->collTarifsRelatedByCreatedByPartial = false;
            }
        }

        return $this->collTarifsRelatedByCreatedBy;
    }

    /**
     * Sets a collection of TarifRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tarifsRelatedByCreatedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setTarifsRelatedByCreatedBy(PropelCollection $tarifsRelatedByCreatedBy, PropelPDO $con = null)
    {
        $tarifsRelatedByCreatedByToDelete = $this->getTarifsRelatedByCreatedBy(new Criteria(), $con)->diff($tarifsRelatedByCreatedBy);


        $this->tarifsRelatedByCreatedByScheduledForDeletion = $tarifsRelatedByCreatedByToDelete;

        foreach ($tarifsRelatedByCreatedByToDelete as $tarifRelatedByCreatedByRemoved) {
            $tarifRelatedByCreatedByRemoved->setUserRelatedByCreatedBy(null);
        }

        $this->collTarifsRelatedByCreatedBy = null;
        foreach ($tarifsRelatedByCreatedBy as $tarifRelatedByCreatedBy) {
            $this->addTarifRelatedByCreatedBy($tarifRelatedByCreatedBy);
        }

        $this->collTarifsRelatedByCreatedBy = $tarifsRelatedByCreatedBy;
        $this->collTarifsRelatedByCreatedByPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tarif objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Tarif objects.
     * @throws PropelException
     */
    public function countTarifsRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTarifsRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collTarifsRelatedByCreatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTarifsRelatedByCreatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTarifsRelatedByCreatedBy());
            }
            $query = TarifQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByCreatedBy($this)
                ->count($con);
        }

        return count($this->collTarifsRelatedByCreatedBy);
    }

    /**
     * Method called to associate a Tarif object to this object
     * through the Tarif foreign key attribute.
     *
     * @param    Tarif $l Tarif
     * @return User The current object (for fluent API support)
     */
    public function addTarifRelatedByCreatedBy(Tarif $l)
    {
        if ($this->collTarifsRelatedByCreatedBy === null) {
            $this->initTarifsRelatedByCreatedBy();
            $this->collTarifsRelatedByCreatedByPartial = true;
        }

        if (!in_array($l, $this->collTarifsRelatedByCreatedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTarifRelatedByCreatedBy($l);

            if ($this->tarifsRelatedByCreatedByScheduledForDeletion and $this->tarifsRelatedByCreatedByScheduledForDeletion->contains($l)) {
                $this->tarifsRelatedByCreatedByScheduledForDeletion->remove($this->tarifsRelatedByCreatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	TarifRelatedByCreatedBy $tarifRelatedByCreatedBy The tarifRelatedByCreatedBy object to add.
     */
    protected function doAddTarifRelatedByCreatedBy($tarifRelatedByCreatedBy)
    {
        $this->collTarifsRelatedByCreatedBy[]= $tarifRelatedByCreatedBy;
        $tarifRelatedByCreatedBy->setUserRelatedByCreatedBy($this);
    }

    /**
     * @param	TarifRelatedByCreatedBy $tarifRelatedByCreatedBy The tarifRelatedByCreatedBy object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeTarifRelatedByCreatedBy($tarifRelatedByCreatedBy)
    {
        if ($this->getTarifsRelatedByCreatedBy()->contains($tarifRelatedByCreatedBy)) {
            $this->collTarifsRelatedByCreatedBy->remove($this->collTarifsRelatedByCreatedBy->search($tarifRelatedByCreatedBy));
            if (null === $this->tarifsRelatedByCreatedByScheduledForDeletion) {
                $this->tarifsRelatedByCreatedByScheduledForDeletion = clone $this->collTarifsRelatedByCreatedBy;
                $this->tarifsRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->tarifsRelatedByCreatedByScheduledForDeletion[]= $tarifRelatedByCreatedBy;
            $tarifRelatedByCreatedBy->setUserRelatedByCreatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collTarifsRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addTarifsRelatedByUpdatedBy()
     */
    public function clearTarifsRelatedByUpdatedBy()
    {
        $this->collTarifsRelatedByUpdatedBy = null; // important to set this to null since that means it is uninitialized
        $this->collTarifsRelatedByUpdatedByPartial = null;

        return $this;
    }

    /**
     * reset is the collTarifsRelatedByUpdatedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialTarifsRelatedByUpdatedBy($v = true)
    {
        $this->collTarifsRelatedByUpdatedByPartial = $v;
    }

    /**
     * Initializes the collTarifsRelatedByUpdatedBy collection.
     *
     * By default this just sets the collTarifsRelatedByUpdatedBy collection to an empty array (like clearcollTarifsRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTarifsRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collTarifsRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collTarifsRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collTarifsRelatedByUpdatedBy->setModel('Tarif');
    }

    /**
     * Gets an array of Tarif objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Tarif[] List of Tarif objects
     * @throws PropelException
     */
    public function getTarifsRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTarifsRelatedByUpdatedByPartial && !$this->isNew();
        if (null === $this->collTarifsRelatedByUpdatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTarifsRelatedByUpdatedBy) {
                // return empty collection
                $this->initTarifsRelatedByUpdatedBy();
            } else {
                $collTarifsRelatedByUpdatedBy = TarifQuery::create(null, $criteria)
                    ->filterByUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTarifsRelatedByUpdatedByPartial && count($collTarifsRelatedByUpdatedBy)) {
                      $this->initTarifsRelatedByUpdatedBy(false);

                      foreach ($collTarifsRelatedByUpdatedBy as $obj) {
                        if (false == $this->collTarifsRelatedByUpdatedBy->contains($obj)) {
                          $this->collTarifsRelatedByUpdatedBy->append($obj);
                        }
                      }

                      $this->collTarifsRelatedByUpdatedByPartial = true;
                    }

                    $collTarifsRelatedByUpdatedBy->getInternalIterator()->rewind();

                    return $collTarifsRelatedByUpdatedBy;
                }

                if ($partial && $this->collTarifsRelatedByUpdatedBy) {
                    foreach ($this->collTarifsRelatedByUpdatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collTarifsRelatedByUpdatedBy[] = $obj;
                        }
                    }
                }

                $this->collTarifsRelatedByUpdatedBy = $collTarifsRelatedByUpdatedBy;
                $this->collTarifsRelatedByUpdatedByPartial = false;
            }
        }

        return $this->collTarifsRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of TarifRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tarifsRelatedByUpdatedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setTarifsRelatedByUpdatedBy(PropelCollection $tarifsRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $tarifsRelatedByUpdatedByToDelete = $this->getTarifsRelatedByUpdatedBy(new Criteria(), $con)->diff($tarifsRelatedByUpdatedBy);


        $this->tarifsRelatedByUpdatedByScheduledForDeletion = $tarifsRelatedByUpdatedByToDelete;

        foreach ($tarifsRelatedByUpdatedByToDelete as $tarifRelatedByUpdatedByRemoved) {
            $tarifRelatedByUpdatedByRemoved->setUserRelatedByUpdatedBy(null);
        }

        $this->collTarifsRelatedByUpdatedBy = null;
        foreach ($tarifsRelatedByUpdatedBy as $tarifRelatedByUpdatedBy) {
            $this->addTarifRelatedByUpdatedBy($tarifRelatedByUpdatedBy);
        }

        $this->collTarifsRelatedByUpdatedBy = $tarifsRelatedByUpdatedBy;
        $this->collTarifsRelatedByUpdatedByPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Tarif objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Tarif objects.
     * @throws PropelException
     */
    public function countTarifsRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTarifsRelatedByUpdatedByPartial && !$this->isNew();
        if (null === $this->collTarifsRelatedByUpdatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTarifsRelatedByUpdatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTarifsRelatedByUpdatedBy());
            }
            $query = TarifQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByUpdatedBy($this)
                ->count($con);
        }

        return count($this->collTarifsRelatedByUpdatedBy);
    }

    /**
     * Method called to associate a Tarif object to this object
     * through the Tarif foreign key attribute.
     *
     * @param    Tarif $l Tarif
     * @return User The current object (for fluent API support)
     */
    public function addTarifRelatedByUpdatedBy(Tarif $l)
    {
        if ($this->collTarifsRelatedByUpdatedBy === null) {
            $this->initTarifsRelatedByUpdatedBy();
            $this->collTarifsRelatedByUpdatedByPartial = true;
        }

        if (!in_array($l, $this->collTarifsRelatedByUpdatedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTarifRelatedByUpdatedBy($l);

            if ($this->tarifsRelatedByUpdatedByScheduledForDeletion and $this->tarifsRelatedByUpdatedByScheduledForDeletion->contains($l)) {
                $this->tarifsRelatedByUpdatedByScheduledForDeletion->remove($this->tarifsRelatedByUpdatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	TarifRelatedByUpdatedBy $tarifRelatedByUpdatedBy The tarifRelatedByUpdatedBy object to add.
     */
    protected function doAddTarifRelatedByUpdatedBy($tarifRelatedByUpdatedBy)
    {
        $this->collTarifsRelatedByUpdatedBy[]= $tarifRelatedByUpdatedBy;
        $tarifRelatedByUpdatedBy->setUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	TarifRelatedByUpdatedBy $tarifRelatedByUpdatedBy The tarifRelatedByUpdatedBy object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeTarifRelatedByUpdatedBy($tarifRelatedByUpdatedBy)
    {
        if ($this->getTarifsRelatedByUpdatedBy()->contains($tarifRelatedByUpdatedBy)) {
            $this->collTarifsRelatedByUpdatedBy->remove($this->collTarifsRelatedByUpdatedBy->search($tarifRelatedByUpdatedBy));
            if (null === $this->tarifsRelatedByUpdatedByScheduledForDeletion) {
                $this->tarifsRelatedByUpdatedByScheduledForDeletion = clone $this->collTarifsRelatedByUpdatedBy;
                $this->tarifsRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->tarifsRelatedByUpdatedByScheduledForDeletion[]= $tarifRelatedByUpdatedBy;
            $tarifRelatedByUpdatedBy->setUserRelatedByUpdatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collHistoriquesRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addHistoriquesRelatedByCreatedBy()
     */
    public function clearHistoriquesRelatedByCreatedBy()
    {
        $this->collHistoriquesRelatedByCreatedBy = null; // important to set this to null since that means it is uninitialized
        $this->collHistoriquesRelatedByCreatedByPartial = null;

        return $this;
    }

    /**
     * reset is the collHistoriquesRelatedByCreatedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialHistoriquesRelatedByCreatedBy($v = true)
    {
        $this->collHistoriquesRelatedByCreatedByPartial = $v;
    }

    /**
     * Initializes the collHistoriquesRelatedByCreatedBy collection.
     *
     * By default this just sets the collHistoriquesRelatedByCreatedBy collection to an empty array (like clearcollHistoriquesRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHistoriquesRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collHistoriquesRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collHistoriquesRelatedByCreatedBy = new PropelObjectCollection();
        $this->collHistoriquesRelatedByCreatedBy->setModel('Historique');
    }

    /**
     * Gets an array of Historique objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Historique[] List of Historique objects
     * @throws PropelException
     */
    public function getHistoriquesRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collHistoriquesRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collHistoriquesRelatedByCreatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHistoriquesRelatedByCreatedBy) {
                // return empty collection
                $this->initHistoriquesRelatedByCreatedBy();
            } else {
                $collHistoriquesRelatedByCreatedBy = HistoriqueQuery::create(null, $criteria)
                    ->filterByUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collHistoriquesRelatedByCreatedByPartial && count($collHistoriquesRelatedByCreatedBy)) {
                      $this->initHistoriquesRelatedByCreatedBy(false);

                      foreach ($collHistoriquesRelatedByCreatedBy as $obj) {
                        if (false == $this->collHistoriquesRelatedByCreatedBy->contains($obj)) {
                          $this->collHistoriquesRelatedByCreatedBy->append($obj);
                        }
                      }

                      $this->collHistoriquesRelatedByCreatedByPartial = true;
                    }

                    $collHistoriquesRelatedByCreatedBy->getInternalIterator()->rewind();

                    return $collHistoriquesRelatedByCreatedBy;
                }

                if ($partial && $this->collHistoriquesRelatedByCreatedBy) {
                    foreach ($this->collHistoriquesRelatedByCreatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collHistoriquesRelatedByCreatedBy[] = $obj;
                        }
                    }
                }

                $this->collHistoriquesRelatedByCreatedBy = $collHistoriquesRelatedByCreatedBy;
                $this->collHistoriquesRelatedByCreatedByPartial = false;
            }
        }

        return $this->collHistoriquesRelatedByCreatedBy;
    }

    /**
     * Sets a collection of HistoriqueRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $historiquesRelatedByCreatedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setHistoriquesRelatedByCreatedBy(PropelCollection $historiquesRelatedByCreatedBy, PropelPDO $con = null)
    {
        $historiquesRelatedByCreatedByToDelete = $this->getHistoriquesRelatedByCreatedBy(new Criteria(), $con)->diff($historiquesRelatedByCreatedBy);


        $this->historiquesRelatedByCreatedByScheduledForDeletion = $historiquesRelatedByCreatedByToDelete;

        foreach ($historiquesRelatedByCreatedByToDelete as $historiqueRelatedByCreatedByRemoved) {
            $historiqueRelatedByCreatedByRemoved->setUserRelatedByCreatedBy(null);
        }

        $this->collHistoriquesRelatedByCreatedBy = null;
        foreach ($historiquesRelatedByCreatedBy as $historiqueRelatedByCreatedBy) {
            $this->addHistoriqueRelatedByCreatedBy($historiqueRelatedByCreatedBy);
        }

        $this->collHistoriquesRelatedByCreatedBy = $historiquesRelatedByCreatedBy;
        $this->collHistoriquesRelatedByCreatedByPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Historique objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Historique objects.
     * @throws PropelException
     */
    public function countHistoriquesRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collHistoriquesRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collHistoriquesRelatedByCreatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHistoriquesRelatedByCreatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHistoriquesRelatedByCreatedBy());
            }
            $query = HistoriqueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByCreatedBy($this)
                ->count($con);
        }

        return count($this->collHistoriquesRelatedByCreatedBy);
    }

    /**
     * Method called to associate a Historique object to this object
     * through the Historique foreign key attribute.
     *
     * @param    Historique $l Historique
     * @return User The current object (for fluent API support)
     */
    public function addHistoriqueRelatedByCreatedBy(Historique $l)
    {
        if ($this->collHistoriquesRelatedByCreatedBy === null) {
            $this->initHistoriquesRelatedByCreatedBy();
            $this->collHistoriquesRelatedByCreatedByPartial = true;
        }

        if (!in_array($l, $this->collHistoriquesRelatedByCreatedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddHistoriqueRelatedByCreatedBy($l);

            if ($this->historiquesRelatedByCreatedByScheduledForDeletion and $this->historiquesRelatedByCreatedByScheduledForDeletion->contains($l)) {
                $this->historiquesRelatedByCreatedByScheduledForDeletion->remove($this->historiquesRelatedByCreatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	HistoriqueRelatedByCreatedBy $historiqueRelatedByCreatedBy The historiqueRelatedByCreatedBy object to add.
     */
    protected function doAddHistoriqueRelatedByCreatedBy($historiqueRelatedByCreatedBy)
    {
        $this->collHistoriquesRelatedByCreatedBy[]= $historiqueRelatedByCreatedBy;
        $historiqueRelatedByCreatedBy->setUserRelatedByCreatedBy($this);
    }

    /**
     * @param	HistoriqueRelatedByCreatedBy $historiqueRelatedByCreatedBy The historiqueRelatedByCreatedBy object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeHistoriqueRelatedByCreatedBy($historiqueRelatedByCreatedBy)
    {
        if ($this->getHistoriquesRelatedByCreatedBy()->contains($historiqueRelatedByCreatedBy)) {
            $this->collHistoriquesRelatedByCreatedBy->remove($this->collHistoriquesRelatedByCreatedBy->search($historiqueRelatedByCreatedBy));
            if (null === $this->historiquesRelatedByCreatedByScheduledForDeletion) {
                $this->historiquesRelatedByCreatedByScheduledForDeletion = clone $this->collHistoriquesRelatedByCreatedBy;
                $this->historiquesRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->historiquesRelatedByCreatedByScheduledForDeletion[]= $historiqueRelatedByCreatedBy;
            $historiqueRelatedByCreatedBy->setUserRelatedByCreatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collHistoriquesRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addHistoriquesRelatedByUpdatedBy()
     */
    public function clearHistoriquesRelatedByUpdatedBy()
    {
        $this->collHistoriquesRelatedByUpdatedBy = null; // important to set this to null since that means it is uninitialized
        $this->collHistoriquesRelatedByUpdatedByPartial = null;

        return $this;
    }

    /**
     * reset is the collHistoriquesRelatedByUpdatedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialHistoriquesRelatedByUpdatedBy($v = true)
    {
        $this->collHistoriquesRelatedByUpdatedByPartial = $v;
    }

    /**
     * Initializes the collHistoriquesRelatedByUpdatedBy collection.
     *
     * By default this just sets the collHistoriquesRelatedByUpdatedBy collection to an empty array (like clearcollHistoriquesRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHistoriquesRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collHistoriquesRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collHistoriquesRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collHistoriquesRelatedByUpdatedBy->setModel('Historique');
    }

    /**
     * Gets an array of Historique objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Historique[] List of Historique objects
     * @throws PropelException
     */
    public function getHistoriquesRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collHistoriquesRelatedByUpdatedByPartial && !$this->isNew();
        if (null === $this->collHistoriquesRelatedByUpdatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHistoriquesRelatedByUpdatedBy) {
                // return empty collection
                $this->initHistoriquesRelatedByUpdatedBy();
            } else {
                $collHistoriquesRelatedByUpdatedBy = HistoriqueQuery::create(null, $criteria)
                    ->filterByUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collHistoriquesRelatedByUpdatedByPartial && count($collHistoriquesRelatedByUpdatedBy)) {
                      $this->initHistoriquesRelatedByUpdatedBy(false);

                      foreach ($collHistoriquesRelatedByUpdatedBy as $obj) {
                        if (false == $this->collHistoriquesRelatedByUpdatedBy->contains($obj)) {
                          $this->collHistoriquesRelatedByUpdatedBy->append($obj);
                        }
                      }

                      $this->collHistoriquesRelatedByUpdatedByPartial = true;
                    }

                    $collHistoriquesRelatedByUpdatedBy->getInternalIterator()->rewind();

                    return $collHistoriquesRelatedByUpdatedBy;
                }

                if ($partial && $this->collHistoriquesRelatedByUpdatedBy) {
                    foreach ($this->collHistoriquesRelatedByUpdatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collHistoriquesRelatedByUpdatedBy[] = $obj;
                        }
                    }
                }

                $this->collHistoriquesRelatedByUpdatedBy = $collHistoriquesRelatedByUpdatedBy;
                $this->collHistoriquesRelatedByUpdatedByPartial = false;
            }
        }

        return $this->collHistoriquesRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of HistoriqueRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $historiquesRelatedByUpdatedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setHistoriquesRelatedByUpdatedBy(PropelCollection $historiquesRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $historiquesRelatedByUpdatedByToDelete = $this->getHistoriquesRelatedByUpdatedBy(new Criteria(), $con)->diff($historiquesRelatedByUpdatedBy);


        $this->historiquesRelatedByUpdatedByScheduledForDeletion = $historiquesRelatedByUpdatedByToDelete;

        foreach ($historiquesRelatedByUpdatedByToDelete as $historiqueRelatedByUpdatedByRemoved) {
            $historiqueRelatedByUpdatedByRemoved->setUserRelatedByUpdatedBy(null);
        }

        $this->collHistoriquesRelatedByUpdatedBy = null;
        foreach ($historiquesRelatedByUpdatedBy as $historiqueRelatedByUpdatedBy) {
            $this->addHistoriqueRelatedByUpdatedBy($historiqueRelatedByUpdatedBy);
        }

        $this->collHistoriquesRelatedByUpdatedBy = $historiquesRelatedByUpdatedBy;
        $this->collHistoriquesRelatedByUpdatedByPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Historique objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Historique objects.
     * @throws PropelException
     */
    public function countHistoriquesRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collHistoriquesRelatedByUpdatedByPartial && !$this->isNew();
        if (null === $this->collHistoriquesRelatedByUpdatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHistoriquesRelatedByUpdatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHistoriquesRelatedByUpdatedBy());
            }
            $query = HistoriqueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByUpdatedBy($this)
                ->count($con);
        }

        return count($this->collHistoriquesRelatedByUpdatedBy);
    }

    /**
     * Method called to associate a Historique object to this object
     * through the Historique foreign key attribute.
     *
     * @param    Historique $l Historique
     * @return User The current object (for fluent API support)
     */
    public function addHistoriqueRelatedByUpdatedBy(Historique $l)
    {
        if ($this->collHistoriquesRelatedByUpdatedBy === null) {
            $this->initHistoriquesRelatedByUpdatedBy();
            $this->collHistoriquesRelatedByUpdatedByPartial = true;
        }

        if (!in_array($l, $this->collHistoriquesRelatedByUpdatedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddHistoriqueRelatedByUpdatedBy($l);

            if ($this->historiquesRelatedByUpdatedByScheduledForDeletion and $this->historiquesRelatedByUpdatedByScheduledForDeletion->contains($l)) {
                $this->historiquesRelatedByUpdatedByScheduledForDeletion->remove($this->historiquesRelatedByUpdatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	HistoriqueRelatedByUpdatedBy $historiqueRelatedByUpdatedBy The historiqueRelatedByUpdatedBy object to add.
     */
    protected function doAddHistoriqueRelatedByUpdatedBy($historiqueRelatedByUpdatedBy)
    {
        $this->collHistoriquesRelatedByUpdatedBy[]= $historiqueRelatedByUpdatedBy;
        $historiqueRelatedByUpdatedBy->setUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	HistoriqueRelatedByUpdatedBy $historiqueRelatedByUpdatedBy The historiqueRelatedByUpdatedBy object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeHistoriqueRelatedByUpdatedBy($historiqueRelatedByUpdatedBy)
    {
        if ($this->getHistoriquesRelatedByUpdatedBy()->contains($historiqueRelatedByUpdatedBy)) {
            $this->collHistoriquesRelatedByUpdatedBy->remove($this->collHistoriquesRelatedByUpdatedBy->search($historiqueRelatedByUpdatedBy));
            if (null === $this->historiquesRelatedByUpdatedByScheduledForDeletion) {
                $this->historiquesRelatedByUpdatedByScheduledForDeletion = clone $this->collHistoriquesRelatedByUpdatedBy;
                $this->historiquesRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->historiquesRelatedByUpdatedByScheduledForDeletion[]= $historiqueRelatedByUpdatedBy;
            $historiqueRelatedByUpdatedBy->setUserRelatedByUpdatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collPostesRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addPostesRelatedByCreatedBy()
     */
    public function clearPostesRelatedByCreatedBy()
    {
        $this->collPostesRelatedByCreatedBy = null; // important to set this to null since that means it is uninitialized
        $this->collPostesRelatedByCreatedByPartial = null;

        return $this;
    }

    /**
     * reset is the collPostesRelatedByCreatedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialPostesRelatedByCreatedBy($v = true)
    {
        $this->collPostesRelatedByCreatedByPartial = $v;
    }

    /**
     * Initializes the collPostesRelatedByCreatedBy collection.
     *
     * By default this just sets the collPostesRelatedByCreatedBy collection to an empty array (like clearcollPostesRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPostesRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collPostesRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collPostesRelatedByCreatedBy = new PropelObjectCollection();
        $this->collPostesRelatedByCreatedBy->setModel('Poste');
    }

    /**
     * Gets an array of Poste objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Poste[] List of Poste objects
     * @throws PropelException
     */
    public function getPostesRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPostesRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collPostesRelatedByCreatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPostesRelatedByCreatedBy) {
                // return empty collection
                $this->initPostesRelatedByCreatedBy();
            } else {
                $collPostesRelatedByCreatedBy = PosteQuery::create(null, $criteria)
                    ->filterByUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPostesRelatedByCreatedByPartial && count($collPostesRelatedByCreatedBy)) {
                      $this->initPostesRelatedByCreatedBy(false);

                      foreach ($collPostesRelatedByCreatedBy as $obj) {
                        if (false == $this->collPostesRelatedByCreatedBy->contains($obj)) {
                          $this->collPostesRelatedByCreatedBy->append($obj);
                        }
                      }

                      $this->collPostesRelatedByCreatedByPartial = true;
                    }

                    $collPostesRelatedByCreatedBy->getInternalIterator()->rewind();

                    return $collPostesRelatedByCreatedBy;
                }

                if ($partial && $this->collPostesRelatedByCreatedBy) {
                    foreach ($this->collPostesRelatedByCreatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collPostesRelatedByCreatedBy[] = $obj;
                        }
                    }
                }

                $this->collPostesRelatedByCreatedBy = $collPostesRelatedByCreatedBy;
                $this->collPostesRelatedByCreatedByPartial = false;
            }
        }

        return $this->collPostesRelatedByCreatedBy;
    }

    /**
     * Sets a collection of PosteRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $postesRelatedByCreatedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setPostesRelatedByCreatedBy(PropelCollection $postesRelatedByCreatedBy, PropelPDO $con = null)
    {
        $postesRelatedByCreatedByToDelete = $this->getPostesRelatedByCreatedBy(new Criteria(), $con)->diff($postesRelatedByCreatedBy);


        $this->postesRelatedByCreatedByScheduledForDeletion = $postesRelatedByCreatedByToDelete;

        foreach ($postesRelatedByCreatedByToDelete as $posteRelatedByCreatedByRemoved) {
            $posteRelatedByCreatedByRemoved->setUserRelatedByCreatedBy(null);
        }

        $this->collPostesRelatedByCreatedBy = null;
        foreach ($postesRelatedByCreatedBy as $posteRelatedByCreatedBy) {
            $this->addPosteRelatedByCreatedBy($posteRelatedByCreatedBy);
        }

        $this->collPostesRelatedByCreatedBy = $postesRelatedByCreatedBy;
        $this->collPostesRelatedByCreatedByPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Poste objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Poste objects.
     * @throws PropelException
     */
    public function countPostesRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPostesRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collPostesRelatedByCreatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPostesRelatedByCreatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPostesRelatedByCreatedBy());
            }
            $query = PosteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByCreatedBy($this)
                ->count($con);
        }

        return count($this->collPostesRelatedByCreatedBy);
    }

    /**
     * Method called to associate a Poste object to this object
     * through the Poste foreign key attribute.
     *
     * @param    Poste $l Poste
     * @return User The current object (for fluent API support)
     */
    public function addPosteRelatedByCreatedBy(Poste $l)
    {
        if ($this->collPostesRelatedByCreatedBy === null) {
            $this->initPostesRelatedByCreatedBy();
            $this->collPostesRelatedByCreatedByPartial = true;
        }

        if (!in_array($l, $this->collPostesRelatedByCreatedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPosteRelatedByCreatedBy($l);

            if ($this->postesRelatedByCreatedByScheduledForDeletion and $this->postesRelatedByCreatedByScheduledForDeletion->contains($l)) {
                $this->postesRelatedByCreatedByScheduledForDeletion->remove($this->postesRelatedByCreatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PosteRelatedByCreatedBy $posteRelatedByCreatedBy The posteRelatedByCreatedBy object to add.
     */
    protected function doAddPosteRelatedByCreatedBy($posteRelatedByCreatedBy)
    {
        $this->collPostesRelatedByCreatedBy[]= $posteRelatedByCreatedBy;
        $posteRelatedByCreatedBy->setUserRelatedByCreatedBy($this);
    }

    /**
     * @param	PosteRelatedByCreatedBy $posteRelatedByCreatedBy The posteRelatedByCreatedBy object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removePosteRelatedByCreatedBy($posteRelatedByCreatedBy)
    {
        if ($this->getPostesRelatedByCreatedBy()->contains($posteRelatedByCreatedBy)) {
            $this->collPostesRelatedByCreatedBy->remove($this->collPostesRelatedByCreatedBy->search($posteRelatedByCreatedBy));
            if (null === $this->postesRelatedByCreatedByScheduledForDeletion) {
                $this->postesRelatedByCreatedByScheduledForDeletion = clone $this->collPostesRelatedByCreatedBy;
                $this->postesRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->postesRelatedByCreatedByScheduledForDeletion[]= $posteRelatedByCreatedBy;
            $posteRelatedByCreatedBy->setUserRelatedByCreatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collPostesRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addPostesRelatedByUpdatedBy()
     */
    public function clearPostesRelatedByUpdatedBy()
    {
        $this->collPostesRelatedByUpdatedBy = null; // important to set this to null since that means it is uninitialized
        $this->collPostesRelatedByUpdatedByPartial = null;

        return $this;
    }

    /**
     * reset is the collPostesRelatedByUpdatedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialPostesRelatedByUpdatedBy($v = true)
    {
        $this->collPostesRelatedByUpdatedByPartial = $v;
    }

    /**
     * Initializes the collPostesRelatedByUpdatedBy collection.
     *
     * By default this just sets the collPostesRelatedByUpdatedBy collection to an empty array (like clearcollPostesRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPostesRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collPostesRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collPostesRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collPostesRelatedByUpdatedBy->setModel('Poste');
    }

    /**
     * Gets an array of Poste objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Poste[] List of Poste objects
     * @throws PropelException
     */
    public function getPostesRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPostesRelatedByUpdatedByPartial && !$this->isNew();
        if (null === $this->collPostesRelatedByUpdatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPostesRelatedByUpdatedBy) {
                // return empty collection
                $this->initPostesRelatedByUpdatedBy();
            } else {
                $collPostesRelatedByUpdatedBy = PosteQuery::create(null, $criteria)
                    ->filterByUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPostesRelatedByUpdatedByPartial && count($collPostesRelatedByUpdatedBy)) {
                      $this->initPostesRelatedByUpdatedBy(false);

                      foreach ($collPostesRelatedByUpdatedBy as $obj) {
                        if (false == $this->collPostesRelatedByUpdatedBy->contains($obj)) {
                          $this->collPostesRelatedByUpdatedBy->append($obj);
                        }
                      }

                      $this->collPostesRelatedByUpdatedByPartial = true;
                    }

                    $collPostesRelatedByUpdatedBy->getInternalIterator()->rewind();

                    return $collPostesRelatedByUpdatedBy;
                }

                if ($partial && $this->collPostesRelatedByUpdatedBy) {
                    foreach ($this->collPostesRelatedByUpdatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collPostesRelatedByUpdatedBy[] = $obj;
                        }
                    }
                }

                $this->collPostesRelatedByUpdatedBy = $collPostesRelatedByUpdatedBy;
                $this->collPostesRelatedByUpdatedByPartial = false;
            }
        }

        return $this->collPostesRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of PosteRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $postesRelatedByUpdatedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setPostesRelatedByUpdatedBy(PropelCollection $postesRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $postesRelatedByUpdatedByToDelete = $this->getPostesRelatedByUpdatedBy(new Criteria(), $con)->diff($postesRelatedByUpdatedBy);


        $this->postesRelatedByUpdatedByScheduledForDeletion = $postesRelatedByUpdatedByToDelete;

        foreach ($postesRelatedByUpdatedByToDelete as $posteRelatedByUpdatedByRemoved) {
            $posteRelatedByUpdatedByRemoved->setUserRelatedByUpdatedBy(null);
        }

        $this->collPostesRelatedByUpdatedBy = null;
        foreach ($postesRelatedByUpdatedBy as $posteRelatedByUpdatedBy) {
            $this->addPosteRelatedByUpdatedBy($posteRelatedByUpdatedBy);
        }

        $this->collPostesRelatedByUpdatedBy = $postesRelatedByUpdatedBy;
        $this->collPostesRelatedByUpdatedByPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Poste objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Poste objects.
     * @throws PropelException
     */
    public function countPostesRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPostesRelatedByUpdatedByPartial && !$this->isNew();
        if (null === $this->collPostesRelatedByUpdatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPostesRelatedByUpdatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPostesRelatedByUpdatedBy());
            }
            $query = PosteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByUpdatedBy($this)
                ->count($con);
        }

        return count($this->collPostesRelatedByUpdatedBy);
    }

    /**
     * Method called to associate a Poste object to this object
     * through the Poste foreign key attribute.
     *
     * @param    Poste $l Poste
     * @return User The current object (for fluent API support)
     */
    public function addPosteRelatedByUpdatedBy(Poste $l)
    {
        if ($this->collPostesRelatedByUpdatedBy === null) {
            $this->initPostesRelatedByUpdatedBy();
            $this->collPostesRelatedByUpdatedByPartial = true;
        }

        if (!in_array($l, $this->collPostesRelatedByUpdatedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPosteRelatedByUpdatedBy($l);

            if ($this->postesRelatedByUpdatedByScheduledForDeletion and $this->postesRelatedByUpdatedByScheduledForDeletion->contains($l)) {
                $this->postesRelatedByUpdatedByScheduledForDeletion->remove($this->postesRelatedByUpdatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	PosteRelatedByUpdatedBy $posteRelatedByUpdatedBy The posteRelatedByUpdatedBy object to add.
     */
    protected function doAddPosteRelatedByUpdatedBy($posteRelatedByUpdatedBy)
    {
        $this->collPostesRelatedByUpdatedBy[]= $posteRelatedByUpdatedBy;
        $posteRelatedByUpdatedBy->setUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	PosteRelatedByUpdatedBy $posteRelatedByUpdatedBy The posteRelatedByUpdatedBy object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removePosteRelatedByUpdatedBy($posteRelatedByUpdatedBy)
    {
        if ($this->getPostesRelatedByUpdatedBy()->contains($posteRelatedByUpdatedBy)) {
            $this->collPostesRelatedByUpdatedBy->remove($this->collPostesRelatedByUpdatedBy->search($posteRelatedByUpdatedBy));
            if (null === $this->postesRelatedByUpdatedByScheduledForDeletion) {
                $this->postesRelatedByUpdatedByScheduledForDeletion = clone $this->collPostesRelatedByUpdatedBy;
                $this->postesRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->postesRelatedByUpdatedByScheduledForDeletion[]= $posteRelatedByUpdatedBy;
            $posteRelatedByUpdatedBy->setUserRelatedByUpdatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collActivitesRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addActivitesRelatedByCreatedBy()
     */
    public function clearActivitesRelatedByCreatedBy()
    {
        $this->collActivitesRelatedByCreatedBy = null; // important to set this to null since that means it is uninitialized
        $this->collActivitesRelatedByCreatedByPartial = null;

        return $this;
    }

    /**
     * reset is the collActivitesRelatedByCreatedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialActivitesRelatedByCreatedBy($v = true)
    {
        $this->collActivitesRelatedByCreatedByPartial = $v;
    }

    /**
     * Initializes the collActivitesRelatedByCreatedBy collection.
     *
     * By default this just sets the collActivitesRelatedByCreatedBy collection to an empty array (like clearcollActivitesRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActivitesRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collActivitesRelatedByCreatedBy && !$overrideExisting) {
            return;
        }
        $this->collActivitesRelatedByCreatedBy = new PropelObjectCollection();
        $this->collActivitesRelatedByCreatedBy->setModel('Activite');
    }

    /**
     * Gets an array of Activite objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Activite[] List of Activite objects
     * @throws PropelException
     */
    public function getActivitesRelatedByCreatedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActivitesRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collActivitesRelatedByCreatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActivitesRelatedByCreatedBy) {
                // return empty collection
                $this->initActivitesRelatedByCreatedBy();
            } else {
                $collActivitesRelatedByCreatedBy = ActiviteQuery::create(null, $criteria)
                    ->filterByUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActivitesRelatedByCreatedByPartial && count($collActivitesRelatedByCreatedBy)) {
                      $this->initActivitesRelatedByCreatedBy(false);

                      foreach ($collActivitesRelatedByCreatedBy as $obj) {
                        if (false == $this->collActivitesRelatedByCreatedBy->contains($obj)) {
                          $this->collActivitesRelatedByCreatedBy->append($obj);
                        }
                      }

                      $this->collActivitesRelatedByCreatedByPartial = true;
                    }

                    $collActivitesRelatedByCreatedBy->getInternalIterator()->rewind();

                    return $collActivitesRelatedByCreatedBy;
                }

                if ($partial && $this->collActivitesRelatedByCreatedBy) {
                    foreach ($this->collActivitesRelatedByCreatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collActivitesRelatedByCreatedBy[] = $obj;
                        }
                    }
                }

                $this->collActivitesRelatedByCreatedBy = $collActivitesRelatedByCreatedBy;
                $this->collActivitesRelatedByCreatedByPartial = false;
            }
        }

        return $this->collActivitesRelatedByCreatedBy;
    }

    /**
     * Sets a collection of ActiviteRelatedByCreatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $activitesRelatedByCreatedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setActivitesRelatedByCreatedBy(PropelCollection $activitesRelatedByCreatedBy, PropelPDO $con = null)
    {
        $activitesRelatedByCreatedByToDelete = $this->getActivitesRelatedByCreatedBy(new Criteria(), $con)->diff($activitesRelatedByCreatedBy);


        $this->activitesRelatedByCreatedByScheduledForDeletion = $activitesRelatedByCreatedByToDelete;

        foreach ($activitesRelatedByCreatedByToDelete as $activiteRelatedByCreatedByRemoved) {
            $activiteRelatedByCreatedByRemoved->setUserRelatedByCreatedBy(null);
        }

        $this->collActivitesRelatedByCreatedBy = null;
        foreach ($activitesRelatedByCreatedBy as $activiteRelatedByCreatedBy) {
            $this->addActiviteRelatedByCreatedBy($activiteRelatedByCreatedBy);
        }

        $this->collActivitesRelatedByCreatedBy = $activitesRelatedByCreatedBy;
        $this->collActivitesRelatedByCreatedByPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Activite objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Activite objects.
     * @throws PropelException
     */
    public function countActivitesRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActivitesRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collActivitesRelatedByCreatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActivitesRelatedByCreatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getActivitesRelatedByCreatedBy());
            }
            $query = ActiviteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByCreatedBy($this)
                ->count($con);
        }

        return count($this->collActivitesRelatedByCreatedBy);
    }

    /**
     * Method called to associate a Activite object to this object
     * through the Activite foreign key attribute.
     *
     * @param    Activite $l Activite
     * @return User The current object (for fluent API support)
     */
    public function addActiviteRelatedByCreatedBy(Activite $l)
    {
        if ($this->collActivitesRelatedByCreatedBy === null) {
            $this->initActivitesRelatedByCreatedBy();
            $this->collActivitesRelatedByCreatedByPartial = true;
        }

        if (!in_array($l, $this->collActivitesRelatedByCreatedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActiviteRelatedByCreatedBy($l);

            if ($this->activitesRelatedByCreatedByScheduledForDeletion and $this->activitesRelatedByCreatedByScheduledForDeletion->contains($l)) {
                $this->activitesRelatedByCreatedByScheduledForDeletion->remove($this->activitesRelatedByCreatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ActiviteRelatedByCreatedBy $activiteRelatedByCreatedBy The activiteRelatedByCreatedBy object to add.
     */
    protected function doAddActiviteRelatedByCreatedBy($activiteRelatedByCreatedBy)
    {
        $this->collActivitesRelatedByCreatedBy[]= $activiteRelatedByCreatedBy;
        $activiteRelatedByCreatedBy->setUserRelatedByCreatedBy($this);
    }

    /**
     * @param	ActiviteRelatedByCreatedBy $activiteRelatedByCreatedBy The activiteRelatedByCreatedBy object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeActiviteRelatedByCreatedBy($activiteRelatedByCreatedBy)
    {
        if ($this->getActivitesRelatedByCreatedBy()->contains($activiteRelatedByCreatedBy)) {
            $this->collActivitesRelatedByCreatedBy->remove($this->collActivitesRelatedByCreatedBy->search($activiteRelatedByCreatedBy));
            if (null === $this->activitesRelatedByCreatedByScheduledForDeletion) {
                $this->activitesRelatedByCreatedByScheduledForDeletion = clone $this->collActivitesRelatedByCreatedBy;
                $this->activitesRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->activitesRelatedByCreatedByScheduledForDeletion[]= $activiteRelatedByCreatedBy;
            $activiteRelatedByCreatedBy->setUserRelatedByCreatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collActivitesRelatedByUpdatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addActivitesRelatedByUpdatedBy()
     */
    public function clearActivitesRelatedByUpdatedBy()
    {
        $this->collActivitesRelatedByUpdatedBy = null; // important to set this to null since that means it is uninitialized
        $this->collActivitesRelatedByUpdatedByPartial = null;

        return $this;
    }

    /**
     * reset is the collActivitesRelatedByUpdatedBy collection loaded partially
     *
     * @return void
     */
    public function resetPartialActivitesRelatedByUpdatedBy($v = true)
    {
        $this->collActivitesRelatedByUpdatedByPartial = $v;
    }

    /**
     * Initializes the collActivitesRelatedByUpdatedBy collection.
     *
     * By default this just sets the collActivitesRelatedByUpdatedBy collection to an empty array (like clearcollActivitesRelatedByUpdatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActivitesRelatedByUpdatedBy($overrideExisting = true)
    {
        if (null !== $this->collActivitesRelatedByUpdatedBy && !$overrideExisting) {
            return;
        }
        $this->collActivitesRelatedByUpdatedBy = new PropelObjectCollection();
        $this->collActivitesRelatedByUpdatedBy->setModel('Activite');
    }

    /**
     * Gets an array of Activite objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Activite[] List of Activite objects
     * @throws PropelException
     */
    public function getActivitesRelatedByUpdatedBy($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActivitesRelatedByUpdatedByPartial && !$this->isNew();
        if (null === $this->collActivitesRelatedByUpdatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActivitesRelatedByUpdatedBy) {
                // return empty collection
                $this->initActivitesRelatedByUpdatedBy();
            } else {
                $collActivitesRelatedByUpdatedBy = ActiviteQuery::create(null, $criteria)
                    ->filterByUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActivitesRelatedByUpdatedByPartial && count($collActivitesRelatedByUpdatedBy)) {
                      $this->initActivitesRelatedByUpdatedBy(false);

                      foreach ($collActivitesRelatedByUpdatedBy as $obj) {
                        if (false == $this->collActivitesRelatedByUpdatedBy->contains($obj)) {
                          $this->collActivitesRelatedByUpdatedBy->append($obj);
                        }
                      }

                      $this->collActivitesRelatedByUpdatedByPartial = true;
                    }

                    $collActivitesRelatedByUpdatedBy->getInternalIterator()->rewind();

                    return $collActivitesRelatedByUpdatedBy;
                }

                if ($partial && $this->collActivitesRelatedByUpdatedBy) {
                    foreach ($this->collActivitesRelatedByUpdatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collActivitesRelatedByUpdatedBy[] = $obj;
                        }
                    }
                }

                $this->collActivitesRelatedByUpdatedBy = $collActivitesRelatedByUpdatedBy;
                $this->collActivitesRelatedByUpdatedByPartial = false;
            }
        }

        return $this->collActivitesRelatedByUpdatedBy;
    }

    /**
     * Sets a collection of ActiviteRelatedByUpdatedBy objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $activitesRelatedByUpdatedBy A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setActivitesRelatedByUpdatedBy(PropelCollection $activitesRelatedByUpdatedBy, PropelPDO $con = null)
    {
        $activitesRelatedByUpdatedByToDelete = $this->getActivitesRelatedByUpdatedBy(new Criteria(), $con)->diff($activitesRelatedByUpdatedBy);


        $this->activitesRelatedByUpdatedByScheduledForDeletion = $activitesRelatedByUpdatedByToDelete;

        foreach ($activitesRelatedByUpdatedByToDelete as $activiteRelatedByUpdatedByRemoved) {
            $activiteRelatedByUpdatedByRemoved->setUserRelatedByUpdatedBy(null);
        }

        $this->collActivitesRelatedByUpdatedBy = null;
        foreach ($activitesRelatedByUpdatedBy as $activiteRelatedByUpdatedBy) {
            $this->addActiviteRelatedByUpdatedBy($activiteRelatedByUpdatedBy);
        }

        $this->collActivitesRelatedByUpdatedBy = $activitesRelatedByUpdatedBy;
        $this->collActivitesRelatedByUpdatedByPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Activite objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Activite objects.
     * @throws PropelException
     */
    public function countActivitesRelatedByUpdatedBy(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActivitesRelatedByUpdatedByPartial && !$this->isNew();
        if (null === $this->collActivitesRelatedByUpdatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActivitesRelatedByUpdatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getActivitesRelatedByUpdatedBy());
            }
            $query = ActiviteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByUpdatedBy($this)
                ->count($con);
        }

        return count($this->collActivitesRelatedByUpdatedBy);
    }

    /**
     * Method called to associate a Activite object to this object
     * through the Activite foreign key attribute.
     *
     * @param    Activite $l Activite
     * @return User The current object (for fluent API support)
     */
    public function addActiviteRelatedByUpdatedBy(Activite $l)
    {
        if ($this->collActivitesRelatedByUpdatedBy === null) {
            $this->initActivitesRelatedByUpdatedBy();
            $this->collActivitesRelatedByUpdatedByPartial = true;
        }

        if (!in_array($l, $this->collActivitesRelatedByUpdatedBy->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActiviteRelatedByUpdatedBy($l);

            if ($this->activitesRelatedByUpdatedByScheduledForDeletion and $this->activitesRelatedByUpdatedByScheduledForDeletion->contains($l)) {
                $this->activitesRelatedByUpdatedByScheduledForDeletion->remove($this->activitesRelatedByUpdatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	ActiviteRelatedByUpdatedBy $activiteRelatedByUpdatedBy The activiteRelatedByUpdatedBy object to add.
     */
    protected function doAddActiviteRelatedByUpdatedBy($activiteRelatedByUpdatedBy)
    {
        $this->collActivitesRelatedByUpdatedBy[]= $activiteRelatedByUpdatedBy;
        $activiteRelatedByUpdatedBy->setUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	ActiviteRelatedByUpdatedBy $activiteRelatedByUpdatedBy The activiteRelatedByUpdatedBy object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeActiviteRelatedByUpdatedBy($activiteRelatedByUpdatedBy)
    {
        if ($this->getActivitesRelatedByUpdatedBy()->contains($activiteRelatedByUpdatedBy)) {
            $this->collActivitesRelatedByUpdatedBy->remove($this->collActivitesRelatedByUpdatedBy->search($activiteRelatedByUpdatedBy));
            if (null === $this->activitesRelatedByUpdatedByScheduledForDeletion) {
                $this->activitesRelatedByUpdatedByScheduledForDeletion = clone $this->collActivitesRelatedByUpdatedBy;
                $this->activitesRelatedByUpdatedByScheduledForDeletion->clear();
            }
            $this->activitesRelatedByUpdatedByScheduledForDeletion[]= $activiteRelatedByUpdatedBy;
            $activiteRelatedByUpdatedBy->setUserRelatedByUpdatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collUsersRelatedById0 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addUsersRelatedById0()
     */
    public function clearUsersRelatedById0()
    {
        $this->collUsersRelatedById0 = null; // important to set this to null since that means it is uninitialized
        $this->collUsersRelatedById0Partial = null;

        return $this;
    }

    /**
     * reset is the collUsersRelatedById0 collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsersRelatedById0($v = true)
    {
        $this->collUsersRelatedById0Partial = $v;
    }

    /**
     * Initializes the collUsersRelatedById0 collection.
     *
     * By default this just sets the collUsersRelatedById0 collection to an empty array (like clearcollUsersRelatedById0());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsersRelatedById0($overrideExisting = true)
    {
        if (null !== $this->collUsersRelatedById0 && !$overrideExisting) {
            return;
        }
        $this->collUsersRelatedById0 = new PropelObjectCollection();
        $this->collUsersRelatedById0->setModel('User');
    }

    /**
     * Gets an array of User objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|User[] List of User objects
     * @throws PropelException
     */
    public function getUsersRelatedById0($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsersRelatedById0Partial && !$this->isNew();
        if (null === $this->collUsersRelatedById0 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsersRelatedById0) {
                // return empty collection
                $this->initUsersRelatedById0();
            } else {
                $collUsersRelatedById0 = UserQuery::create(null, $criteria)
                    ->filterByUserRelatedByCreatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsersRelatedById0Partial && count($collUsersRelatedById0)) {
                      $this->initUsersRelatedById0(false);

                      foreach ($collUsersRelatedById0 as $obj) {
                        if (false == $this->collUsersRelatedById0->contains($obj)) {
                          $this->collUsersRelatedById0->append($obj);
                        }
                      }

                      $this->collUsersRelatedById0Partial = true;
                    }

                    $collUsersRelatedById0->getInternalIterator()->rewind();

                    return $collUsersRelatedById0;
                }

                if ($partial && $this->collUsersRelatedById0) {
                    foreach ($this->collUsersRelatedById0 as $obj) {
                        if ($obj->isNew()) {
                            $collUsersRelatedById0[] = $obj;
                        }
                    }
                }

                $this->collUsersRelatedById0 = $collUsersRelatedById0;
                $this->collUsersRelatedById0Partial = false;
            }
        }

        return $this->collUsersRelatedById0;
    }

    /**
     * Sets a collection of UserRelatedById0 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usersRelatedById0 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setUsersRelatedById0(PropelCollection $usersRelatedById0, PropelPDO $con = null)
    {
        $usersRelatedById0ToDelete = $this->getUsersRelatedById0(new Criteria(), $con)->diff($usersRelatedById0);


        $this->usersRelatedById0ScheduledForDeletion = $usersRelatedById0ToDelete;

        foreach ($usersRelatedById0ToDelete as $userRelatedById0Removed) {
            $userRelatedById0Removed->setUserRelatedByCreatedBy(null);
        }

        $this->collUsersRelatedById0 = null;
        foreach ($usersRelatedById0 as $userRelatedById0) {
            $this->addUserRelatedById0($userRelatedById0);
        }

        $this->collUsersRelatedById0 = $usersRelatedById0;
        $this->collUsersRelatedById0Partial = false;

        return $this;
    }

    /**
     * Returns the number of related User objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related User objects.
     * @throws PropelException
     */
    public function countUsersRelatedById0(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsersRelatedById0Partial && !$this->isNew();
        if (null === $this->collUsersRelatedById0 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsersRelatedById0) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsersRelatedById0());
            }
            $query = UserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByCreatedBy($this)
                ->count($con);
        }

        return count($this->collUsersRelatedById0);
    }

    /**
     * Method called to associate a User object to this object
     * through the User foreign key attribute.
     *
     * @param    User $l User
     * @return User The current object (for fluent API support)
     */
    public function addUserRelatedById0(User $l)
    {
        if ($this->collUsersRelatedById0 === null) {
            $this->initUsersRelatedById0();
            $this->collUsersRelatedById0Partial = true;
        }

        if (!in_array($l, $this->collUsersRelatedById0->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUserRelatedById0($l);

            if ($this->usersRelatedById0ScheduledForDeletion and $this->usersRelatedById0ScheduledForDeletion->contains($l)) {
                $this->usersRelatedById0ScheduledForDeletion->remove($this->usersRelatedById0ScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	UserRelatedById0 $userRelatedById0 The userRelatedById0 object to add.
     */
    protected function doAddUserRelatedById0($userRelatedById0)
    {
        $this->collUsersRelatedById0[]= $userRelatedById0;
        $userRelatedById0->setUserRelatedByCreatedBy($this);
    }

    /**
     * @param	UserRelatedById0 $userRelatedById0 The userRelatedById0 object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeUserRelatedById0($userRelatedById0)
    {
        if ($this->getUsersRelatedById0()->contains($userRelatedById0)) {
            $this->collUsersRelatedById0->remove($this->collUsersRelatedById0->search($userRelatedById0));
            if (null === $this->usersRelatedById0ScheduledForDeletion) {
                $this->usersRelatedById0ScheduledForDeletion = clone $this->collUsersRelatedById0;
                $this->usersRelatedById0ScheduledForDeletion->clear();
            }
            $this->usersRelatedById0ScheduledForDeletion[]= $userRelatedById0;
            $userRelatedById0->setUserRelatedByCreatedBy(null);
        }

        return $this;
    }

    /**
     * Clears out the collUsersRelatedById1 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return User The current object (for fluent API support)
     * @see        addUsersRelatedById1()
     */
    public function clearUsersRelatedById1()
    {
        $this->collUsersRelatedById1 = null; // important to set this to null since that means it is uninitialized
        $this->collUsersRelatedById1Partial = null;

        return $this;
    }

    /**
     * reset is the collUsersRelatedById1 collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsersRelatedById1($v = true)
    {
        $this->collUsersRelatedById1Partial = $v;
    }

    /**
     * Initializes the collUsersRelatedById1 collection.
     *
     * By default this just sets the collUsersRelatedById1 collection to an empty array (like clearcollUsersRelatedById1());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsersRelatedById1($overrideExisting = true)
    {
        if (null !== $this->collUsersRelatedById1 && !$overrideExisting) {
            return;
        }
        $this->collUsersRelatedById1 = new PropelObjectCollection();
        $this->collUsersRelatedById1->setModel('User');
    }

    /**
     * Gets an array of User objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this User is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|User[] List of User objects
     * @throws PropelException
     */
    public function getUsersRelatedById1($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsersRelatedById1Partial && !$this->isNew();
        if (null === $this->collUsersRelatedById1 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsersRelatedById1) {
                // return empty collection
                $this->initUsersRelatedById1();
            } else {
                $collUsersRelatedById1 = UserQuery::create(null, $criteria)
                    ->filterByUserRelatedByUpdatedBy($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsersRelatedById1Partial && count($collUsersRelatedById1)) {
                      $this->initUsersRelatedById1(false);

                      foreach ($collUsersRelatedById1 as $obj) {
                        if (false == $this->collUsersRelatedById1->contains($obj)) {
                          $this->collUsersRelatedById1->append($obj);
                        }
                      }

                      $this->collUsersRelatedById1Partial = true;
                    }

                    $collUsersRelatedById1->getInternalIterator()->rewind();

                    return $collUsersRelatedById1;
                }

                if ($partial && $this->collUsersRelatedById1) {
                    foreach ($this->collUsersRelatedById1 as $obj) {
                        if ($obj->isNew()) {
                            $collUsersRelatedById1[] = $obj;
                        }
                    }
                }

                $this->collUsersRelatedById1 = $collUsersRelatedById1;
                $this->collUsersRelatedById1Partial = false;
            }
        }

        return $this->collUsersRelatedById1;
    }

    /**
     * Sets a collection of UserRelatedById1 objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $usersRelatedById1 A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return User The current object (for fluent API support)
     */
    public function setUsersRelatedById1(PropelCollection $usersRelatedById1, PropelPDO $con = null)
    {
        $usersRelatedById1ToDelete = $this->getUsersRelatedById1(new Criteria(), $con)->diff($usersRelatedById1);


        $this->usersRelatedById1ScheduledForDeletion = $usersRelatedById1ToDelete;

        foreach ($usersRelatedById1ToDelete as $userRelatedById1Removed) {
            $userRelatedById1Removed->setUserRelatedByUpdatedBy(null);
        }

        $this->collUsersRelatedById1 = null;
        foreach ($usersRelatedById1 as $userRelatedById1) {
            $this->addUserRelatedById1($userRelatedById1);
        }

        $this->collUsersRelatedById1 = $usersRelatedById1;
        $this->collUsersRelatedById1Partial = false;

        return $this;
    }

    /**
     * Returns the number of related User objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related User objects.
     * @throws PropelException
     */
    public function countUsersRelatedById1(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsersRelatedById1Partial && !$this->isNew();
        if (null === $this->collUsersRelatedById1 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsersRelatedById1) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsersRelatedById1());
            }
            $query = UserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserRelatedByUpdatedBy($this)
                ->count($con);
        }

        return count($this->collUsersRelatedById1);
    }

    /**
     * Method called to associate a User object to this object
     * through the User foreign key attribute.
     *
     * @param    User $l User
     * @return User The current object (for fluent API support)
     */
    public function addUserRelatedById1(User $l)
    {
        if ($this->collUsersRelatedById1 === null) {
            $this->initUsersRelatedById1();
            $this->collUsersRelatedById1Partial = true;
        }

        if (!in_array($l, $this->collUsersRelatedById1->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddUserRelatedById1($l);

            if ($this->usersRelatedById1ScheduledForDeletion and $this->usersRelatedById1ScheduledForDeletion->contains($l)) {
                $this->usersRelatedById1ScheduledForDeletion->remove($this->usersRelatedById1ScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	UserRelatedById1 $userRelatedById1 The userRelatedById1 object to add.
     */
    protected function doAddUserRelatedById1($userRelatedById1)
    {
        $this->collUsersRelatedById1[]= $userRelatedById1;
        $userRelatedById1->setUserRelatedByUpdatedBy($this);
    }

    /**
     * @param	UserRelatedById1 $userRelatedById1 The userRelatedById1 object to remove.
     * @return User The current object (for fluent API support)
     */
    public function removeUserRelatedById1($userRelatedById1)
    {
        if ($this->getUsersRelatedById1()->contains($userRelatedById1)) {
            $this->collUsersRelatedById1->remove($this->collUsersRelatedById1->search($userRelatedById1));
            if (null === $this->usersRelatedById1ScheduledForDeletion) {
                $this->usersRelatedById1ScheduledForDeletion = clone $this->collUsersRelatedById1;
                $this->usersRelatedById1ScheduledForDeletion->clear();
            }
            $this->usersRelatedById1ScheduledForDeletion[]= $userRelatedById1;
            $userRelatedById1->setUserRelatedByUpdatedBy(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->password = null;
        $this->phone_number = null;
        $this->role = null;
        $this->created_by = null;
        $this->updated_by = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
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
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collCompteEdfsRelatedByCreatedBy) {
                foreach ($this->collCompteEdfsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCompteEdfsRelatedByUpdatedBy) {
                foreach ($this->collCompteEdfsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTarifsRelatedByCreatedBy) {
                foreach ($this->collTarifsRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTarifsRelatedByUpdatedBy) {
                foreach ($this->collTarifsRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHistoriquesRelatedByCreatedBy) {
                foreach ($this->collHistoriquesRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collHistoriquesRelatedByUpdatedBy) {
                foreach ($this->collHistoriquesRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPostesRelatedByCreatedBy) {
                foreach ($this->collPostesRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPostesRelatedByUpdatedBy) {
                foreach ($this->collPostesRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActivitesRelatedByCreatedBy) {
                foreach ($this->collActivitesRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActivitesRelatedByUpdatedBy) {
                foreach ($this->collActivitesRelatedByUpdatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsersRelatedById0) {
                foreach ($this->collUsersRelatedById0 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsersRelatedById1) {
                foreach ($this->collUsersRelatedById1 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aUserRelatedByCreatedBy instanceof Persistent) {
              $this->aUserRelatedByCreatedBy->clearAllReferences($deep);
            }
            if ($this->aUserRelatedByUpdatedBy instanceof Persistent) {
              $this->aUserRelatedByUpdatedBy->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collCompteEdfsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collCompteEdfsRelatedByCreatedBy->clearIterator();
        }
        $this->collCompteEdfsRelatedByCreatedBy = null;
        if ($this->collCompteEdfsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collCompteEdfsRelatedByUpdatedBy->clearIterator();
        }
        $this->collCompteEdfsRelatedByUpdatedBy = null;
        if ($this->collTarifsRelatedByCreatedBy instanceof PropelCollection) {
            $this->collTarifsRelatedByCreatedBy->clearIterator();
        }
        $this->collTarifsRelatedByCreatedBy = null;
        if ($this->collTarifsRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collTarifsRelatedByUpdatedBy->clearIterator();
        }
        $this->collTarifsRelatedByUpdatedBy = null;
        if ($this->collHistoriquesRelatedByCreatedBy instanceof PropelCollection) {
            $this->collHistoriquesRelatedByCreatedBy->clearIterator();
        }
        $this->collHistoriquesRelatedByCreatedBy = null;
        if ($this->collHistoriquesRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collHistoriquesRelatedByUpdatedBy->clearIterator();
        }
        $this->collHistoriquesRelatedByUpdatedBy = null;
        if ($this->collPostesRelatedByCreatedBy instanceof PropelCollection) {
            $this->collPostesRelatedByCreatedBy->clearIterator();
        }
        $this->collPostesRelatedByCreatedBy = null;
        if ($this->collPostesRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collPostesRelatedByUpdatedBy->clearIterator();
        }
        $this->collPostesRelatedByUpdatedBy = null;
        if ($this->collActivitesRelatedByCreatedBy instanceof PropelCollection) {
            $this->collActivitesRelatedByCreatedBy->clearIterator();
        }
        $this->collActivitesRelatedByCreatedBy = null;
        if ($this->collActivitesRelatedByUpdatedBy instanceof PropelCollection) {
            $this->collActivitesRelatedByUpdatedBy->clearIterator();
        }
        $this->collActivitesRelatedByUpdatedBy = null;
        if ($this->collUsersRelatedById0 instanceof PropelCollection) {
            $this->collUsersRelatedById0->clearIterator();
        }
        $this->collUsersRelatedById0 = null;
        if ($this->collUsersRelatedById1 instanceof PropelCollection) {
            $this->collUsersRelatedById1->clearIterator();
        }
        $this->collUsersRelatedById1 = null;
        $this->aUserRelatedByCreatedBy = null;
        $this->aUserRelatedByUpdatedBy = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

    // timestampable behavior

    /**
     * Mark the current object so that the update date doesn't get updated during next save
     *
     * @return     User The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = UserPeer::UPDATED_AT;

        return $this;
    }

}
