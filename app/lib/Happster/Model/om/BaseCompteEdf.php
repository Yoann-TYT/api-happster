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
use Happster\Model\CompteEdfPeer;
use Happster\Model\CompteEdfPoste;
use Happster\Model\CompteEdfPosteQuery;
use Happster\Model\CompteEdfQuery;
use Happster\Model\Historique;
use Happster\Model\HistoriqueQuery;
use Happster\Model\User;
use Happster\Model\UserQuery;

/**
 * Base class that represents a row from the 'compte_edf' table.
 *
 *
 *
 * @package    propel.generator..om
 */
abstract class BaseCompteEdf extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'Happster\\Model\\CompteEdfPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CompteEdfPeer
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
     * The value for the nom field.
     * @var        string
     */
    protected $nom;

    /**
     * The value for the prenom field.
     * @var        string
     */
    protected $prenom;

    /**
     * The value for the adresse field.
     * @var        string
     */
    protected $adresse;

    /**
     * The value for the ville field.
     * @var        string
     */
    protected $ville;

    /**
     * The value for the code_postal field.
     * @var        int
     */
    protected $code_postal;

    /**
     * The value for the budget_souhaite field.
     * @var        int
     */
    protected $budget_souhaite;

    /**
     * The value for the prix_abonnement field.
     * @var        int
     */
    protected $prix_abonnement;

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
     * @var        PropelObjectCollection|Historique[] Collection to store aggregation of Historique objects.
     */
    protected $collHistoriques;
    protected $collHistoriquesPartial;

    /**
     * @var        PropelObjectCollection|CompteEdfPoste[] Collection to store aggregation of CompteEdfPoste objects.
     */
    protected $collCompteEdfPostes;
    protected $collCompteEdfPostesPartial;

    /**
     * @var        PropelObjectCollection|Activite[] Collection to store aggregation of Activite objects.
     */
    protected $collActivites;
    protected $collActivitesPartial;

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
    protected $historiquesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $compteEdfPostesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $activitesScheduledForDeletion = null;

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
     * Get the [nom] column value.
     *
     * @return string
     */
    public function getNom()
    {

        return $this->nom;
    }

    /**
     * Get the [prenom] column value.
     *
     * @return string
     */
    public function getPrenom()
    {

        return $this->prenom;
    }

    /**
     * Get the [adresse] column value.
     *
     * @return string
     */
    public function getAdresse()
    {

        return $this->adresse;
    }

    /**
     * Get the [ville] column value.
     *
     * @return string
     */
    public function getVille()
    {

        return $this->ville;
    }

    /**
     * Get the [code_postal] column value.
     *
     * @return int
     */
    public function getCodePostal()
    {

        return $this->code_postal;
    }

    /**
     * Get the [budget_souhaite] column value.
     *
     * @return int
     */
    public function getBudgetSouhaite()
    {

        return $this->budget_souhaite;
    }

    /**
     * Get the [prix_abonnement] column value.
     *
     * @return int
     */
    public function getPrixAbonnement()
    {

        return $this->prix_abonnement;
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
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = CompteEdfPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [nom] column.
     *
     * @param  string $v new value
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setNom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nom !== $v) {
            $this->nom = $v;
            $this->modifiedColumns[] = CompteEdfPeer::NOM;
        }


        return $this;
    } // setNom()

    /**
     * Set the value of [prenom] column.
     *
     * @param  string $v new value
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setPrenom($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->prenom !== $v) {
            $this->prenom = $v;
            $this->modifiedColumns[] = CompteEdfPeer::PRENOM;
        }


        return $this;
    } // setPrenom()

    /**
     * Set the value of [adresse] column.
     *
     * @param  string $v new value
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setAdresse($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->adresse !== $v) {
            $this->adresse = $v;
            $this->modifiedColumns[] = CompteEdfPeer::ADRESSE;
        }


        return $this;
    } // setAdresse()

    /**
     * Set the value of [ville] column.
     *
     * @param  string $v new value
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setVille($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ville !== $v) {
            $this->ville = $v;
            $this->modifiedColumns[] = CompteEdfPeer::VILLE;
        }


        return $this;
    } // setVille()

    /**
     * Set the value of [code_postal] column.
     *
     * @param  int $v new value
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setCodePostal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->code_postal !== $v) {
            $this->code_postal = $v;
            $this->modifiedColumns[] = CompteEdfPeer::CODE_POSTAL;
        }


        return $this;
    } // setCodePostal()

    /**
     * Set the value of [budget_souhaite] column.
     *
     * @param  int $v new value
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setBudgetSouhaite($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->budget_souhaite !== $v) {
            $this->budget_souhaite = $v;
            $this->modifiedColumns[] = CompteEdfPeer::BUDGET_SOUHAITE;
        }


        return $this;
    } // setBudgetSouhaite()

    /**
     * Set the value of [prix_abonnement] column.
     *
     * @param  int $v new value
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setPrixAbonnement($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->prix_abonnement !== $v) {
            $this->prix_abonnement = $v;
            $this->modifiedColumns[] = CompteEdfPeer::PRIX_ABONNEMENT;
        }


        return $this;
    } // setPrixAbonnement()

    /**
     * Set the value of [created_by] column.
     *
     * @param  int $v new value
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[] = CompteEdfPeer::CREATED_BY;
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
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setUpdatedBy($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->updated_by !== $v) {
            $this->updated_by = $v;
            $this->modifiedColumns[] = CompteEdfPeer::UPDATED_BY;
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
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            $currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created_at = $newDateAsString;
                $this->modifiedColumns[] = CompteEdfPeer::CREATED_AT;
            }
        } // if either are not null


        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            $currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->updated_at = $newDateAsString;
                $this->modifiedColumns[] = CompteEdfPeer::UPDATED_AT;
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
            $this->nom = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->prenom = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->adresse = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->ville = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->code_postal = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->budget_souhaite = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->prix_abonnement = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->created_by = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->updated_by = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->created_at = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->updated_at = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 12; // 12 = CompteEdfPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating CompteEdf object", $e);
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
            $con = Propel::getConnection(CompteEdfPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CompteEdfPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUserRelatedByCreatedBy = null;
            $this->aUserRelatedByUpdatedBy = null;
            $this->collHistoriques = null;

            $this->collCompteEdfPostes = null;

            $this->collActivites = null;

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
            $con = Propel::getConnection(CompteEdfPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CompteEdfQuery::create()
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
            $con = Propel::getConnection(CompteEdfPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
                // blamable behavior
                if (!$this->isColumnModified(CompteEdfPeer::CREATED_BY)) {
                    $this->setCreatedBy(\Happster\Helper\Auth::getUser()->getId());
                    }
                if (!$this->isColumnModified(CompteEdfPeer::UPDATED_BY)) {
                    $this->setUpdatedBy(\Happster\Helper\Auth::getUser()->getId());
                    }
                // timestampable behavior
                if (!$this->isColumnModified(CompteEdfPeer::CREATED_AT)) {
                    $this->setCreatedAt(time());
                }
                if (!$this->isColumnModified(CompteEdfPeer::UPDATED_AT)) {
                    $this->setUpdatedAt(time());
                }
            } else {
                $ret = $ret && $this->preUpdate($con);
                // blamable behavior
                if ($this->isModified() && !$this->isColumnModified(CompteEdfPeer::UPDATED_BY)) {
                    $this->setUpdatedBy(\Happster\Helper\Auth::getUser()->getId());
                    }
                // timestampable behavior
                if ($this->isModified() && !$this->isColumnModified(CompteEdfPeer::UPDATED_AT)) {
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
                CompteEdfPeer::addInstanceToPool($this);
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

            if ($this->historiquesScheduledForDeletion !== null) {
                if (!$this->historiquesScheduledForDeletion->isEmpty()) {
                    HistoriqueQuery::create()
                        ->filterByPrimaryKeys($this->historiquesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->historiquesScheduledForDeletion = null;
                }
            }

            if ($this->collHistoriques !== null) {
                foreach ($this->collHistoriques as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->compteEdfPostesScheduledForDeletion !== null) {
                if (!$this->compteEdfPostesScheduledForDeletion->isEmpty()) {
                    CompteEdfPosteQuery::create()
                        ->filterByPrimaryKeys($this->compteEdfPostesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->compteEdfPostesScheduledForDeletion = null;
                }
            }

            if ($this->collCompteEdfPostes !== null) {
                foreach ($this->collCompteEdfPostes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->activitesScheduledForDeletion !== null) {
                if (!$this->activitesScheduledForDeletion->isEmpty()) {
                    ActiviteQuery::create()
                        ->filterByPrimaryKeys($this->activitesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->activitesScheduledForDeletion = null;
                }
            }

            if ($this->collActivites !== null) {
                foreach ($this->collActivites as $referrerFK) {
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

        $this->modifiedColumns[] = CompteEdfPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CompteEdfPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CompteEdfPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(CompteEdfPeer::NOM)) {
            $modifiedColumns[':p' . $index++]  = '`nom`';
        }
        if ($this->isColumnModified(CompteEdfPeer::PRENOM)) {
            $modifiedColumns[':p' . $index++]  = '`prenom`';
        }
        if ($this->isColumnModified(CompteEdfPeer::ADRESSE)) {
            $modifiedColumns[':p' . $index++]  = '`adresse`';
        }
        if ($this->isColumnModified(CompteEdfPeer::VILLE)) {
            $modifiedColumns[':p' . $index++]  = '`ville`';
        }
        if ($this->isColumnModified(CompteEdfPeer::CODE_POSTAL)) {
            $modifiedColumns[':p' . $index++]  = '`code_postal`';
        }
        if ($this->isColumnModified(CompteEdfPeer::BUDGET_SOUHAITE)) {
            $modifiedColumns[':p' . $index++]  = '`budget_souhaite`';
        }
        if ($this->isColumnModified(CompteEdfPeer::PRIX_ABONNEMENT)) {
            $modifiedColumns[':p' . $index++]  = '`prix_abonnement`';
        }
        if ($this->isColumnModified(CompteEdfPeer::CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(CompteEdfPeer::UPDATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`updated_by`';
        }
        if ($this->isColumnModified(CompteEdfPeer::CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`created_at`';
        }
        if ($this->isColumnModified(CompteEdfPeer::UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = '`updated_at`';
        }

        $sql = sprintf(
            'INSERT INTO `compte_edf` (%s) VALUES (%s)',
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
                    case '`nom`':
                        $stmt->bindValue($identifier, $this->nom, PDO::PARAM_STR);
                        break;
                    case '`prenom`':
                        $stmt->bindValue($identifier, $this->prenom, PDO::PARAM_STR);
                        break;
                    case '`adresse`':
                        $stmt->bindValue($identifier, $this->adresse, PDO::PARAM_STR);
                        break;
                    case '`ville`':
                        $stmt->bindValue($identifier, $this->ville, PDO::PARAM_STR);
                        break;
                    case '`code_postal`':
                        $stmt->bindValue($identifier, $this->code_postal, PDO::PARAM_INT);
                        break;
                    case '`budget_souhaite`':
                        $stmt->bindValue($identifier, $this->budget_souhaite, PDO::PARAM_INT);
                        break;
                    case '`prix_abonnement`':
                        $stmt->bindValue($identifier, $this->prix_abonnement, PDO::PARAM_INT);
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


            if (($retval = CompteEdfPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collHistoriques !== null) {
                    foreach ($this->collHistoriques as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCompteEdfPostes !== null) {
                    foreach ($this->collCompteEdfPostes as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collActivites !== null) {
                    foreach ($this->collActivites as $referrerFK) {
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
        $pos = CompteEdfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getNom();
                break;
            case 2:
                return $this->getPrenom();
                break;
            case 3:
                return $this->getAdresse();
                break;
            case 4:
                return $this->getVille();
                break;
            case 5:
                return $this->getCodePostal();
                break;
            case 6:
                return $this->getBudgetSouhaite();
                break;
            case 7:
                return $this->getPrixAbonnement();
                break;
            case 8:
                return $this->getCreatedBy();
                break;
            case 9:
                return $this->getUpdatedBy();
                break;
            case 10:
                return $this->getCreatedAt();
                break;
            case 11:
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
        if (isset($alreadyDumpedObjects['CompteEdf'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CompteEdf'][$this->getPrimaryKey()] = true;
        $keys = CompteEdfPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNom(),
            $keys[2] => $this->getPrenom(),
            $keys[3] => $this->getAdresse(),
            $keys[4] => $this->getVille(),
            $keys[5] => $this->getCodePostal(),
            $keys[6] => $this->getBudgetSouhaite(),
            $keys[7] => $this->getPrixAbonnement(),
            $keys[8] => $this->getCreatedBy(),
            $keys[9] => $this->getUpdatedBy(),
            $keys[10] => $this->getCreatedAt(),
            $keys[11] => $this->getUpdatedAt(),
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
            if (null !== $this->collHistoriques) {
                $result['Historiques'] = $this->collHistoriques->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCompteEdfPostes) {
                $result['CompteEdfPostes'] = $this->collCompteEdfPostes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collActivites) {
                $result['Activites'] = $this->collActivites->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = CompteEdfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setNom($value);
                break;
            case 2:
                $this->setPrenom($value);
                break;
            case 3:
                $this->setAdresse($value);
                break;
            case 4:
                $this->setVille($value);
                break;
            case 5:
                $this->setCodePostal($value);
                break;
            case 6:
                $this->setBudgetSouhaite($value);
                break;
            case 7:
                $this->setPrixAbonnement($value);
                break;
            case 8:
                $this->setCreatedBy($value);
                break;
            case 9:
                $this->setUpdatedBy($value);
                break;
            case 10:
                $this->setCreatedAt($value);
                break;
            case 11:
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
        $keys = CompteEdfPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNom($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPrenom($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setAdresse($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setVille($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCodePostal($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setBudgetSouhaite($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPrixAbonnement($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setUpdatedBy($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CompteEdfPeer::DATABASE_NAME);

        if ($this->isColumnModified(CompteEdfPeer::ID)) $criteria->add(CompteEdfPeer::ID, $this->id);
        if ($this->isColumnModified(CompteEdfPeer::NOM)) $criteria->add(CompteEdfPeer::NOM, $this->nom);
        if ($this->isColumnModified(CompteEdfPeer::PRENOM)) $criteria->add(CompteEdfPeer::PRENOM, $this->prenom);
        if ($this->isColumnModified(CompteEdfPeer::ADRESSE)) $criteria->add(CompteEdfPeer::ADRESSE, $this->adresse);
        if ($this->isColumnModified(CompteEdfPeer::VILLE)) $criteria->add(CompteEdfPeer::VILLE, $this->ville);
        if ($this->isColumnModified(CompteEdfPeer::CODE_POSTAL)) $criteria->add(CompteEdfPeer::CODE_POSTAL, $this->code_postal);
        if ($this->isColumnModified(CompteEdfPeer::BUDGET_SOUHAITE)) $criteria->add(CompteEdfPeer::BUDGET_SOUHAITE, $this->budget_souhaite);
        if ($this->isColumnModified(CompteEdfPeer::PRIX_ABONNEMENT)) $criteria->add(CompteEdfPeer::PRIX_ABONNEMENT, $this->prix_abonnement);
        if ($this->isColumnModified(CompteEdfPeer::CREATED_BY)) $criteria->add(CompteEdfPeer::CREATED_BY, $this->created_by);
        if ($this->isColumnModified(CompteEdfPeer::UPDATED_BY)) $criteria->add(CompteEdfPeer::UPDATED_BY, $this->updated_by);
        if ($this->isColumnModified(CompteEdfPeer::CREATED_AT)) $criteria->add(CompteEdfPeer::CREATED_AT, $this->created_at);
        if ($this->isColumnModified(CompteEdfPeer::UPDATED_AT)) $criteria->add(CompteEdfPeer::UPDATED_AT, $this->updated_at);

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
        $criteria = new Criteria(CompteEdfPeer::DATABASE_NAME);
        $criteria->add(CompteEdfPeer::ID, $this->id);

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
     * @param object $copyObj An object of CompteEdf (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNom($this->getNom());
        $copyObj->setPrenom($this->getPrenom());
        $copyObj->setAdresse($this->getAdresse());
        $copyObj->setVille($this->getVille());
        $copyObj->setCodePostal($this->getCodePostal());
        $copyObj->setBudgetSouhaite($this->getBudgetSouhaite());
        $copyObj->setPrixAbonnement($this->getPrixAbonnement());
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

            foreach ($this->getHistoriques() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHistorique($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCompteEdfPostes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCompteEdfPoste($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActivites() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActivite($relObj->copy($deepCopy));
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
     * @return CompteEdf Clone of current object.
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
     * @return CompteEdfPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CompteEdfPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return CompteEdf The current object (for fluent API support)
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
            $v->addCompteEdfRelatedByCreatedBy($this);
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
                $this->aUserRelatedByCreatedBy->addCompteEdfsRelatedByCreatedBy($this);
             */
        }

        return $this->aUserRelatedByCreatedBy;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return CompteEdf The current object (for fluent API support)
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
            $v->addCompteEdfRelatedByUpdatedBy($this);
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
                $this->aUserRelatedByUpdatedBy->addCompteEdfsRelatedByUpdatedBy($this);
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
        if ('Historique' == $relationName) {
            $this->initHistoriques();
        }
        if ('CompteEdfPoste' == $relationName) {
            $this->initCompteEdfPostes();
        }
        if ('Activite' == $relationName) {
            $this->initActivites();
        }
    }

    /**
     * Clears out the collHistoriques collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return CompteEdf The current object (for fluent API support)
     * @see        addHistoriques()
     */
    public function clearHistoriques()
    {
        $this->collHistoriques = null; // important to set this to null since that means it is uninitialized
        $this->collHistoriquesPartial = null;

        return $this;
    }

    /**
     * reset is the collHistoriques collection loaded partially
     *
     * @return void
     */
    public function resetPartialHistoriques($v = true)
    {
        $this->collHistoriquesPartial = $v;
    }

    /**
     * Initializes the collHistoriques collection.
     *
     * By default this just sets the collHistoriques collection to an empty array (like clearcollHistoriques());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHistoriques($overrideExisting = true)
    {
        if (null !== $this->collHistoriques && !$overrideExisting) {
            return;
        }
        $this->collHistoriques = new PropelObjectCollection();
        $this->collHistoriques->setModel('Historique');
    }

    /**
     * Gets an array of Historique objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this CompteEdf is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Historique[] List of Historique objects
     * @throws PropelException
     */
    public function getHistoriques($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collHistoriquesPartial && !$this->isNew();
        if (null === $this->collHistoriques || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHistoriques) {
                // return empty collection
                $this->initHistoriques();
            } else {
                $collHistoriques = HistoriqueQuery::create(null, $criteria)
                    ->filterByCompteEdf($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collHistoriquesPartial && count($collHistoriques)) {
                      $this->initHistoriques(false);

                      foreach ($collHistoriques as $obj) {
                        if (false == $this->collHistoriques->contains($obj)) {
                          $this->collHistoriques->append($obj);
                        }
                      }

                      $this->collHistoriquesPartial = true;
                    }

                    $collHistoriques->getInternalIterator()->rewind();

                    return $collHistoriques;
                }

                if ($partial && $this->collHistoriques) {
                    foreach ($this->collHistoriques as $obj) {
                        if ($obj->isNew()) {
                            $collHistoriques[] = $obj;
                        }
                    }
                }

                $this->collHistoriques = $collHistoriques;
                $this->collHistoriquesPartial = false;
            }
        }

        return $this->collHistoriques;
    }

    /**
     * Sets a collection of Historique objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $historiques A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setHistoriques(PropelCollection $historiques, PropelPDO $con = null)
    {
        $historiquesToDelete = $this->getHistoriques(new Criteria(), $con)->diff($historiques);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->historiquesScheduledForDeletion = clone $historiquesToDelete;

        foreach ($historiquesToDelete as $historiqueRemoved) {
            $historiqueRemoved->setCompteEdf(null);
        }

        $this->collHistoriques = null;
        foreach ($historiques as $historique) {
            $this->addHistorique($historique);
        }

        $this->collHistoriques = $historiques;
        $this->collHistoriquesPartial = false;

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
    public function countHistoriques(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collHistoriquesPartial && !$this->isNew();
        if (null === $this->collHistoriques || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHistoriques) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHistoriques());
            }
            $query = HistoriqueQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompteEdf($this)
                ->count($con);
        }

        return count($this->collHistoriques);
    }

    /**
     * Method called to associate a Historique object to this object
     * through the Historique foreign key attribute.
     *
     * @param    Historique $l Historique
     * @return CompteEdf The current object (for fluent API support)
     */
    public function addHistorique(Historique $l)
    {
        if ($this->collHistoriques === null) {
            $this->initHistoriques();
            $this->collHistoriquesPartial = true;
        }

        if (!in_array($l, $this->collHistoriques->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddHistorique($l);

            if ($this->historiquesScheduledForDeletion and $this->historiquesScheduledForDeletion->contains($l)) {
                $this->historiquesScheduledForDeletion->remove($this->historiquesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Historique $historique The historique object to add.
     */
    protected function doAddHistorique($historique)
    {
        $this->collHistoriques[]= $historique;
        $historique->setCompteEdf($this);
    }

    /**
     * @param	Historique $historique The historique object to remove.
     * @return CompteEdf The current object (for fluent API support)
     */
    public function removeHistorique($historique)
    {
        if ($this->getHistoriques()->contains($historique)) {
            $this->collHistoriques->remove($this->collHistoriques->search($historique));
            if (null === $this->historiquesScheduledForDeletion) {
                $this->historiquesScheduledForDeletion = clone $this->collHistoriques;
                $this->historiquesScheduledForDeletion->clear();
            }
            $this->historiquesScheduledForDeletion[]= clone $historique;
            $historique->setCompteEdf(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CompteEdf is new, it will return
     * an empty collection; or if this CompteEdf has previously
     * been saved, it will retrieve related Historiques from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CompteEdf.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Historique[] List of Historique objects
     */
    public function getHistoriquesJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = HistoriqueQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getHistoriques($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CompteEdf is new, it will return
     * an empty collection; or if this CompteEdf has previously
     * been saved, it will retrieve related Historiques from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CompteEdf.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Historique[] List of Historique objects
     */
    public function getHistoriquesJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = HistoriqueQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getHistoriques($query, $con);
    }

    /**
     * Clears out the collCompteEdfPostes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return CompteEdf The current object (for fluent API support)
     * @see        addCompteEdfPostes()
     */
    public function clearCompteEdfPostes()
    {
        $this->collCompteEdfPostes = null; // important to set this to null since that means it is uninitialized
        $this->collCompteEdfPostesPartial = null;

        return $this;
    }

    /**
     * reset is the collCompteEdfPostes collection loaded partially
     *
     * @return void
     */
    public function resetPartialCompteEdfPostes($v = true)
    {
        $this->collCompteEdfPostesPartial = $v;
    }

    /**
     * Initializes the collCompteEdfPostes collection.
     *
     * By default this just sets the collCompteEdfPostes collection to an empty array (like clearcollCompteEdfPostes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCompteEdfPostes($overrideExisting = true)
    {
        if (null !== $this->collCompteEdfPostes && !$overrideExisting) {
            return;
        }
        $this->collCompteEdfPostes = new PropelObjectCollection();
        $this->collCompteEdfPostes->setModel('CompteEdfPoste');
    }

    /**
     * Gets an array of CompteEdfPoste objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this CompteEdf is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|CompteEdfPoste[] List of CompteEdfPoste objects
     * @throws PropelException
     */
    public function getCompteEdfPostes($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCompteEdfPostesPartial && !$this->isNew();
        if (null === $this->collCompteEdfPostes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCompteEdfPostes) {
                // return empty collection
                $this->initCompteEdfPostes();
            } else {
                $collCompteEdfPostes = CompteEdfPosteQuery::create(null, $criteria)
                    ->filterByCompteEdf($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCompteEdfPostesPartial && count($collCompteEdfPostes)) {
                      $this->initCompteEdfPostes(false);

                      foreach ($collCompteEdfPostes as $obj) {
                        if (false == $this->collCompteEdfPostes->contains($obj)) {
                          $this->collCompteEdfPostes->append($obj);
                        }
                      }

                      $this->collCompteEdfPostesPartial = true;
                    }

                    $collCompteEdfPostes->getInternalIterator()->rewind();

                    return $collCompteEdfPostes;
                }

                if ($partial && $this->collCompteEdfPostes) {
                    foreach ($this->collCompteEdfPostes as $obj) {
                        if ($obj->isNew()) {
                            $collCompteEdfPostes[] = $obj;
                        }
                    }
                }

                $this->collCompteEdfPostes = $collCompteEdfPostes;
                $this->collCompteEdfPostesPartial = false;
            }
        }

        return $this->collCompteEdfPostes;
    }

    /**
     * Sets a collection of CompteEdfPoste objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $compteEdfPostes A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setCompteEdfPostes(PropelCollection $compteEdfPostes, PropelPDO $con = null)
    {
        $compteEdfPostesToDelete = $this->getCompteEdfPostes(new Criteria(), $con)->diff($compteEdfPostes);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->compteEdfPostesScheduledForDeletion = clone $compteEdfPostesToDelete;

        foreach ($compteEdfPostesToDelete as $compteEdfPosteRemoved) {
            $compteEdfPosteRemoved->setCompteEdf(null);
        }

        $this->collCompteEdfPostes = null;
        foreach ($compteEdfPostes as $compteEdfPoste) {
            $this->addCompteEdfPoste($compteEdfPoste);
        }

        $this->collCompteEdfPostes = $compteEdfPostes;
        $this->collCompteEdfPostesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related CompteEdfPoste objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related CompteEdfPoste objects.
     * @throws PropelException
     */
    public function countCompteEdfPostes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCompteEdfPostesPartial && !$this->isNew();
        if (null === $this->collCompteEdfPostes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCompteEdfPostes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCompteEdfPostes());
            }
            $query = CompteEdfPosteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompteEdf($this)
                ->count($con);
        }

        return count($this->collCompteEdfPostes);
    }

    /**
     * Method called to associate a CompteEdfPoste object to this object
     * through the CompteEdfPoste foreign key attribute.
     *
     * @param    CompteEdfPoste $l CompteEdfPoste
     * @return CompteEdf The current object (for fluent API support)
     */
    public function addCompteEdfPoste(CompteEdfPoste $l)
    {
        if ($this->collCompteEdfPostes === null) {
            $this->initCompteEdfPostes();
            $this->collCompteEdfPostesPartial = true;
        }

        if (!in_array($l, $this->collCompteEdfPostes->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCompteEdfPoste($l);

            if ($this->compteEdfPostesScheduledForDeletion and $this->compteEdfPostesScheduledForDeletion->contains($l)) {
                $this->compteEdfPostesScheduledForDeletion->remove($this->compteEdfPostesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	CompteEdfPoste $compteEdfPoste The compteEdfPoste object to add.
     */
    protected function doAddCompteEdfPoste($compteEdfPoste)
    {
        $this->collCompteEdfPostes[]= $compteEdfPoste;
        $compteEdfPoste->setCompteEdf($this);
    }

    /**
     * @param	CompteEdfPoste $compteEdfPoste The compteEdfPoste object to remove.
     * @return CompteEdf The current object (for fluent API support)
     */
    public function removeCompteEdfPoste($compteEdfPoste)
    {
        if ($this->getCompteEdfPostes()->contains($compteEdfPoste)) {
            $this->collCompteEdfPostes->remove($this->collCompteEdfPostes->search($compteEdfPoste));
            if (null === $this->compteEdfPostesScheduledForDeletion) {
                $this->compteEdfPostesScheduledForDeletion = clone $this->collCompteEdfPostes;
                $this->compteEdfPostesScheduledForDeletion->clear();
            }
            $this->compteEdfPostesScheduledForDeletion[]= clone $compteEdfPoste;
            $compteEdfPoste->setCompteEdf(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CompteEdf is new, it will return
     * an empty collection; or if this CompteEdf has previously
     * been saved, it will retrieve related CompteEdfPostes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CompteEdf.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CompteEdfPoste[] List of CompteEdfPoste objects
     */
    public function getCompteEdfPostesJoinPoste($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CompteEdfPosteQuery::create(null, $criteria);
        $query->joinWith('Poste', $join_behavior);

        return $this->getCompteEdfPostes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CompteEdf is new, it will return
     * an empty collection; or if this CompteEdf has previously
     * been saved, it will retrieve related CompteEdfPostes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CompteEdf.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CompteEdfPoste[] List of CompteEdfPoste objects
     */
    public function getCompteEdfPostesJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CompteEdfPosteQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getCompteEdfPostes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CompteEdf is new, it will return
     * an empty collection; or if this CompteEdf has previously
     * been saved, it will retrieve related CompteEdfPostes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CompteEdf.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|CompteEdfPoste[] List of CompteEdfPoste objects
     */
    public function getCompteEdfPostesJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = CompteEdfPosteQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getCompteEdfPostes($query, $con);
    }

    /**
     * Clears out the collActivites collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return CompteEdf The current object (for fluent API support)
     * @see        addActivites()
     */
    public function clearActivites()
    {
        $this->collActivites = null; // important to set this to null since that means it is uninitialized
        $this->collActivitesPartial = null;

        return $this;
    }

    /**
     * reset is the collActivites collection loaded partially
     *
     * @return void
     */
    public function resetPartialActivites($v = true)
    {
        $this->collActivitesPartial = $v;
    }

    /**
     * Initializes the collActivites collection.
     *
     * By default this just sets the collActivites collection to an empty array (like clearcollActivites());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActivites($overrideExisting = true)
    {
        if (null !== $this->collActivites && !$overrideExisting) {
            return;
        }
        $this->collActivites = new PropelObjectCollection();
        $this->collActivites->setModel('Activite');
    }

    /**
     * Gets an array of Activite objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this CompteEdf is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Activite[] List of Activite objects
     * @throws PropelException
     */
    public function getActivites($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collActivitesPartial && !$this->isNew();
        if (null === $this->collActivites || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActivites) {
                // return empty collection
                $this->initActivites();
            } else {
                $collActivites = ActiviteQuery::create(null, $criteria)
                    ->filterByCompteEdf($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collActivitesPartial && count($collActivites)) {
                      $this->initActivites(false);

                      foreach ($collActivites as $obj) {
                        if (false == $this->collActivites->contains($obj)) {
                          $this->collActivites->append($obj);
                        }
                      }

                      $this->collActivitesPartial = true;
                    }

                    $collActivites->getInternalIterator()->rewind();

                    return $collActivites;
                }

                if ($partial && $this->collActivites) {
                    foreach ($this->collActivites as $obj) {
                        if ($obj->isNew()) {
                            $collActivites[] = $obj;
                        }
                    }
                }

                $this->collActivites = $collActivites;
                $this->collActivitesPartial = false;
            }
        }

        return $this->collActivites;
    }

    /**
     * Sets a collection of Activite objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $activites A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return CompteEdf The current object (for fluent API support)
     */
    public function setActivites(PropelCollection $activites, PropelPDO $con = null)
    {
        $activitesToDelete = $this->getActivites(new Criteria(), $con)->diff($activites);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->activitesScheduledForDeletion = clone $activitesToDelete;

        foreach ($activitesToDelete as $activiteRemoved) {
            $activiteRemoved->setCompteEdf(null);
        }

        $this->collActivites = null;
        foreach ($activites as $activite) {
            $this->addActivite($activite);
        }

        $this->collActivites = $activites;
        $this->collActivitesPartial = false;

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
    public function countActivites(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collActivitesPartial && !$this->isNew();
        if (null === $this->collActivites || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActivites) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getActivites());
            }
            $query = ActiviteQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCompteEdf($this)
                ->count($con);
        }

        return count($this->collActivites);
    }

    /**
     * Method called to associate a Activite object to this object
     * through the Activite foreign key attribute.
     *
     * @param    Activite $l Activite
     * @return CompteEdf The current object (for fluent API support)
     */
    public function addActivite(Activite $l)
    {
        if ($this->collActivites === null) {
            $this->initActivites();
            $this->collActivitesPartial = true;
        }

        if (!in_array($l, $this->collActivites->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddActivite($l);

            if ($this->activitesScheduledForDeletion and $this->activitesScheduledForDeletion->contains($l)) {
                $this->activitesScheduledForDeletion->remove($this->activitesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Activite $activite The activite object to add.
     */
    protected function doAddActivite($activite)
    {
        $this->collActivites[]= $activite;
        $activite->setCompteEdf($this);
    }

    /**
     * @param	Activite $activite The activite object to remove.
     * @return CompteEdf The current object (for fluent API support)
     */
    public function removeActivite($activite)
    {
        if ($this->getActivites()->contains($activite)) {
            $this->collActivites->remove($this->collActivites->search($activite));
            if (null === $this->activitesScheduledForDeletion) {
                $this->activitesScheduledForDeletion = clone $this->collActivites;
                $this->activitesScheduledForDeletion->clear();
            }
            $this->activitesScheduledForDeletion[]= clone $activite;
            $activite->setCompteEdf(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CompteEdf is new, it will return
     * an empty collection; or if this CompteEdf has previously
     * been saved, it will retrieve related Activites from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CompteEdf.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Activite[] List of Activite objects
     */
    public function getActivitesJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiviteQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByCreatedBy', $join_behavior);

        return $this->getActivites($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CompteEdf is new, it will return
     * an empty collection; or if this CompteEdf has previously
     * been saved, it will retrieve related Activites from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CompteEdf.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Activite[] List of Activite objects
     */
    public function getActivitesJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = ActiviteQuery::create(null, $criteria);
        $query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

        return $this->getActivites($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->nom = null;
        $this->prenom = null;
        $this->adresse = null;
        $this->ville = null;
        $this->code_postal = null;
        $this->budget_souhaite = null;
        $this->prix_abonnement = null;
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
            if ($this->collHistoriques) {
                foreach ($this->collHistoriques as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCompteEdfPostes) {
                foreach ($this->collCompteEdfPostes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActivites) {
                foreach ($this->collActivites as $o) {
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

        if ($this->collHistoriques instanceof PropelCollection) {
            $this->collHistoriques->clearIterator();
        }
        $this->collHistoriques = null;
        if ($this->collCompteEdfPostes instanceof PropelCollection) {
            $this->collCompteEdfPostes->clearIterator();
        }
        $this->collCompteEdfPostes = null;
        if ($this->collActivites instanceof PropelCollection) {
            $this->collActivites->clearIterator();
        }
        $this->collActivites = null;
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
        return (string) $this->exportTo(CompteEdfPeer::DEFAULT_STRING_FORMAT);
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
     * @return     CompteEdf The current object (for fluent API support)
     */
    public function keepUpdateDateUnchanged()
    {
        $this->modifiedColumns[] = CompteEdfPeer::UPDATED_AT;

        return $this;
    }

}
