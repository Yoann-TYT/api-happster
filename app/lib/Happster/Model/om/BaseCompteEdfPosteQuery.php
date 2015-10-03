<?php

namespace Happster\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Happster\Model\CompteEdf;
use Happster\Model\CompteEdfPoste;
use Happster\Model\CompteEdfPostePeer;
use Happster\Model\CompteEdfPosteQuery;
use Happster\Model\Poste;
use Happster\Model\User;

/**
 * Base class that represents a query for the 'compte_edf_poste' table.
 *
 *
 *
 * @method CompteEdfPosteQuery orderByCompteEdfId($order = Criteria::ASC) Order by the compte_edf_id column
 * @method CompteEdfPosteQuery orderByPosteId($order = Criteria::ASC) Order by the poste_id column
 * @method CompteEdfPosteQuery orderByPuissance($order = Criteria::ASC) Order by the puissance column
 * @method CompteEdfPosteQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method CompteEdfPosteQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method CompteEdfPosteQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method CompteEdfPosteQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method CompteEdfPosteQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method CompteEdfPosteQuery groupByCompteEdfId() Group by the compte_edf_id column
 * @method CompteEdfPosteQuery groupByPosteId() Group by the poste_id column
 * @method CompteEdfPosteQuery groupByPuissance() Group by the puissance column
 * @method CompteEdfPosteQuery groupByTime() Group by the time column
 * @method CompteEdfPosteQuery groupByCreatedBy() Group by the created_by column
 * @method CompteEdfPosteQuery groupByUpdatedBy() Group by the updated_by column
 * @method CompteEdfPosteQuery groupByCreatedAt() Group by the created_at column
 * @method CompteEdfPosteQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method CompteEdfPosteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CompteEdfPosteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CompteEdfPosteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CompteEdfPosteQuery leftJoinCompteEdf($relationAlias = null) Adds a LEFT JOIN clause to the query using the CompteEdf relation
 * @method CompteEdfPosteQuery rightJoinCompteEdf($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CompteEdf relation
 * @method CompteEdfPosteQuery innerJoinCompteEdf($relationAlias = null) Adds a INNER JOIN clause to the query using the CompteEdf relation
 *
 * @method CompteEdfPosteQuery leftJoinPoste($relationAlias = null) Adds a LEFT JOIN clause to the query using the Poste relation
 * @method CompteEdfPosteQuery rightJoinPoste($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Poste relation
 * @method CompteEdfPosteQuery innerJoinPoste($relationAlias = null) Adds a INNER JOIN clause to the query using the Poste relation
 *
 * @method CompteEdfPosteQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method CompteEdfPosteQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method CompteEdfPosteQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method CompteEdfPosteQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method CompteEdfPosteQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method CompteEdfPosteQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method CompteEdfPoste findOne(PropelPDO $con = null) Return the first CompteEdfPoste matching the query
 * @method CompteEdfPoste findOneOrCreate(PropelPDO $con = null) Return the first CompteEdfPoste matching the query, or a new CompteEdfPoste object populated from the query conditions when no match is found
 *
 * @method CompteEdfPoste findOneByCompteEdfId(int $compte_edf_id) Return the first CompteEdfPoste filtered by the compte_edf_id column
 * @method CompteEdfPoste findOneByPosteId(int $poste_id) Return the first CompteEdfPoste filtered by the poste_id column
 * @method CompteEdfPoste findOneByPuissance(double $puissance) Return the first CompteEdfPoste filtered by the puissance column
 * @method CompteEdfPoste findOneByTime(string $time) Return the first CompteEdfPoste filtered by the time column
 * @method CompteEdfPoste findOneByCreatedBy(int $created_by) Return the first CompteEdfPoste filtered by the created_by column
 * @method CompteEdfPoste findOneByUpdatedBy(int $updated_by) Return the first CompteEdfPoste filtered by the updated_by column
 * @method CompteEdfPoste findOneByCreatedAt(string $created_at) Return the first CompteEdfPoste filtered by the created_at column
 * @method CompteEdfPoste findOneByUpdatedAt(string $updated_at) Return the first CompteEdfPoste filtered by the updated_at column
 *
 * @method array findByCompteEdfId(int $compte_edf_id) Return CompteEdfPoste objects filtered by the compte_edf_id column
 * @method array findByPosteId(int $poste_id) Return CompteEdfPoste objects filtered by the poste_id column
 * @method array findByPuissance(double $puissance) Return CompteEdfPoste objects filtered by the puissance column
 * @method array findByTime(string $time) Return CompteEdfPoste objects filtered by the time column
 * @method array findByCreatedBy(int $created_by) Return CompteEdfPoste objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return CompteEdfPoste objects filtered by the updated_by column
 * @method array findByCreatedAt(string $created_at) Return CompteEdfPoste objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return CompteEdfPoste objects filtered by the updated_at column
 *
 * @package    propel.generator..om
 */
abstract class BaseCompteEdfPosteQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCompteEdfPosteQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'happster';
        }
        if (null === $modelName) {
            $modelName = 'Happster\\Model\\CompteEdfPoste';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CompteEdfPosteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CompteEdfPosteQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CompteEdfPosteQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CompteEdfPosteQuery) {
            return $criteria;
        }
        $query = new CompteEdfPosteQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$compte_edf_id, $poste_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   CompteEdfPoste|CompteEdfPoste[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CompteEdfPostePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CompteEdfPostePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 CompteEdfPoste A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `compte_edf_id`, `poste_id`, `puissance`, `time`, `created_by`, `updated_by`, `created_at`, `updated_at` FROM `compte_edf_poste` WHERE `compte_edf_id` = :p0 AND `poste_id` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new CompteEdfPoste();
            $obj->hydrate($row);
            CompteEdfPostePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return CompteEdfPoste|CompteEdfPoste[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|CompteEdfPoste[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(CompteEdfPostePeer::COMPTE_EDF_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(CompteEdfPostePeer::POSTE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(CompteEdfPostePeer::COMPTE_EDF_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(CompteEdfPostePeer::POSTE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the compte_edf_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCompteEdfId(1234); // WHERE compte_edf_id = 1234
     * $query->filterByCompteEdfId(array(12, 34)); // WHERE compte_edf_id IN (12, 34)
     * $query->filterByCompteEdfId(array('min' => 12)); // WHERE compte_edf_id >= 12
     * $query->filterByCompteEdfId(array('max' => 12)); // WHERE compte_edf_id <= 12
     * </code>
     *
     * @see       filterByCompteEdf()
     *
     * @param     mixed $compteEdfId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function filterByCompteEdfId($compteEdfId = null, $comparison = null)
    {
        if (is_array($compteEdfId)) {
            $useMinMax = false;
            if (isset($compteEdfId['min'])) {
                $this->addUsingAlias(CompteEdfPostePeer::COMPTE_EDF_ID, $compteEdfId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($compteEdfId['max'])) {
                $this->addUsingAlias(CompteEdfPostePeer::COMPTE_EDF_ID, $compteEdfId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPostePeer::COMPTE_EDF_ID, $compteEdfId, $comparison);
    }

    /**
     * Filter the query on the poste_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPosteId(1234); // WHERE poste_id = 1234
     * $query->filterByPosteId(array(12, 34)); // WHERE poste_id IN (12, 34)
     * $query->filterByPosteId(array('min' => 12)); // WHERE poste_id >= 12
     * $query->filterByPosteId(array('max' => 12)); // WHERE poste_id <= 12
     * </code>
     *
     * @see       filterByPoste()
     *
     * @param     mixed $posteId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function filterByPosteId($posteId = null, $comparison = null)
    {
        if (is_array($posteId)) {
            $useMinMax = false;
            if (isset($posteId['min'])) {
                $this->addUsingAlias(CompteEdfPostePeer::POSTE_ID, $posteId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posteId['max'])) {
                $this->addUsingAlias(CompteEdfPostePeer::POSTE_ID, $posteId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPostePeer::POSTE_ID, $posteId, $comparison);
    }

    /**
     * Filter the query on the puissance column
     *
     * Example usage:
     * <code>
     * $query->filterByPuissance(1234); // WHERE puissance = 1234
     * $query->filterByPuissance(array(12, 34)); // WHERE puissance IN (12, 34)
     * $query->filterByPuissance(array('min' => 12)); // WHERE puissance >= 12
     * $query->filterByPuissance(array('max' => 12)); // WHERE puissance <= 12
     * </code>
     *
     * @param     mixed $puissance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function filterByPuissance($puissance = null, $comparison = null)
    {
        if (is_array($puissance)) {
            $useMinMax = false;
            if (isset($puissance['min'])) {
                $this->addUsingAlias(CompteEdfPostePeer::PUISSANCE, $puissance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($puissance['max'])) {
                $this->addUsingAlias(CompteEdfPostePeer::PUISSANCE, $puissance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPostePeer::PUISSANCE, $puissance, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime('2011-03-14'); // WHERE time = '2011-03-14'
     * $query->filterByTime('now'); // WHERE time = '2011-03-14'
     * $query->filterByTime(array('max' => 'yesterday')); // WHERE time < '2011-03-13'
     * </code>
     *
     * @param     mixed $time The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(CompteEdfPostePeer::TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(CompteEdfPostePeer::TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPostePeer::TIME, $time, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
     * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
     * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by >= 12
     * $query->filterByCreatedBy(array('max' => 12)); // WHERE created_by <= 12
     * </code>
     *
     * @see       filterByUserRelatedByCreatedBy()
     *
     * @param     mixed $createdBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(CompteEdfPostePeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(CompteEdfPostePeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPostePeer::CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy(1234); // WHERE updated_by = 1234
     * $query->filterByUpdatedBy(array(12, 34)); // WHERE updated_by IN (12, 34)
     * $query->filterByUpdatedBy(array('min' => 12)); // WHERE updated_by >= 12
     * $query->filterByUpdatedBy(array('max' => 12)); // WHERE updated_by <= 12
     * </code>
     *
     * @see       filterByUserRelatedByUpdatedBy()
     *
     * @param     mixed $updatedBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(CompteEdfPostePeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(CompteEdfPostePeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPostePeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CompteEdfPostePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CompteEdfPostePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPostePeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CompteEdfPostePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CompteEdfPostePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPostePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related CompteEdf object
     *
     * @param   CompteEdf|PropelObjectCollection $compteEdf The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompteEdfPosteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompteEdf($compteEdf, $comparison = null)
    {
        if ($compteEdf instanceof CompteEdf) {
            return $this
                ->addUsingAlias(CompteEdfPostePeer::COMPTE_EDF_ID, $compteEdf->getId(), $comparison);
        } elseif ($compteEdf instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CompteEdfPostePeer::COMPTE_EDF_ID, $compteEdf->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCompteEdf() only accepts arguments of type CompteEdf or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CompteEdf relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function joinCompteEdf($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CompteEdf');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CompteEdf');
        }

        return $this;
    }

    /**
     * Use the CompteEdf relation CompteEdf object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Happster\Model\CompteEdfQuery A secondary query class using the current class as primary query
     */
    public function useCompteEdfQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompteEdf($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CompteEdf', '\Happster\Model\CompteEdfQuery');
    }

    /**
     * Filter the query by a related Poste object
     *
     * @param   Poste|PropelObjectCollection $poste The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompteEdfPosteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPoste($poste, $comparison = null)
    {
        if ($poste instanceof Poste) {
            return $this
                ->addUsingAlias(CompteEdfPostePeer::POSTE_ID, $poste->getId(), $comparison);
        } elseif ($poste instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CompteEdfPostePeer::POSTE_ID, $poste->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPoste() only accepts arguments of type Poste or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Poste relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function joinPoste($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Poste');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Poste');
        }

        return $this;
    }

    /**
     * Use the Poste relation Poste object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Happster\Model\PosteQuery A secondary query class using the current class as primary query
     */
    public function usePosteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPoste($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Poste', '\Happster\Model\PosteQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompteEdfPosteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(CompteEdfPostePeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CompteEdfPostePeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUserRelatedByCreatedBy() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function joinUserRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserRelatedByCreatedBy');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UserRelatedByCreatedBy');
        }

        return $this;
    }

    /**
     * Use the UserRelatedByCreatedBy relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Happster\Model\UserQuery A secondary query class using the current class as primary query
     */
    public function useUserRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUserRelatedByCreatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserRelatedByCreatedBy', '\Happster\Model\UserQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompteEdfPosteQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(CompteEdfPostePeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CompteEdfPostePeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUserRelatedByUpdatedBy() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function joinUserRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserRelatedByUpdatedBy');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'UserRelatedByUpdatedBy');
        }

        return $this;
    }

    /**
     * Use the UserRelatedByUpdatedBy relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Happster\Model\UserQuery A secondary query class using the current class as primary query
     */
    public function useUserRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUserRelatedByUpdatedBy($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserRelatedByUpdatedBy', '\Happster\Model\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   CompteEdfPoste $compteEdfPoste Object to remove from the list of results
     *
     * @return CompteEdfPosteQuery The current query, for fluid interface
     */
    public function prune($compteEdfPoste = null)
    {
        if ($compteEdfPoste) {
            $this->addCond('pruneCond0', $this->getAliasedColName(CompteEdfPostePeer::COMPTE_EDF_ID), $compteEdfPoste->getCompteEdfId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(CompteEdfPostePeer::POSTE_ID), $compteEdfPoste->getPosteId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     CompteEdfPosteQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(CompteEdfPostePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     CompteEdfPosteQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(CompteEdfPostePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     CompteEdfPosteQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(CompteEdfPostePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     CompteEdfPosteQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(CompteEdfPostePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     CompteEdfPosteQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(CompteEdfPostePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     CompteEdfPosteQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(CompteEdfPostePeer::CREATED_AT);
    }
}
