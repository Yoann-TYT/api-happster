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
use Happster\Model\Activite;
use Happster\Model\CompteEdf;
use Happster\Model\CompteEdfPeer;
use Happster\Model\CompteEdfPoste;
use Happster\Model\CompteEdfQuery;
use Happster\Model\Historique;
use Happster\Model\User;

/**
 * Base class that represents a query for the 'compte_edf' table.
 *
 *
 *
 * @method CompteEdfQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CompteEdfQuery orderByNom($order = Criteria::ASC) Order by the nom column
 * @method CompteEdfQuery orderByPrenom($order = Criteria::ASC) Order by the prenom column
 * @method CompteEdfQuery orderByAdresse($order = Criteria::ASC) Order by the adresse column
 * @method CompteEdfQuery orderByVille($order = Criteria::ASC) Order by the ville column
 * @method CompteEdfQuery orderByCodePostal($order = Criteria::ASC) Order by the code_postal column
 * @method CompteEdfQuery orderByBudgetSouhaite($order = Criteria::ASC) Order by the budget_souhaite column
 * @method CompteEdfQuery orderByPrixAbonnement($order = Criteria::ASC) Order by the prix_abonnement column
 * @method CompteEdfQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method CompteEdfQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method CompteEdfQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method CompteEdfQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method CompteEdfQuery groupById() Group by the id column
 * @method CompteEdfQuery groupByNom() Group by the nom column
 * @method CompteEdfQuery groupByPrenom() Group by the prenom column
 * @method CompteEdfQuery groupByAdresse() Group by the adresse column
 * @method CompteEdfQuery groupByVille() Group by the ville column
 * @method CompteEdfQuery groupByCodePostal() Group by the code_postal column
 * @method CompteEdfQuery groupByBudgetSouhaite() Group by the budget_souhaite column
 * @method CompteEdfQuery groupByPrixAbonnement() Group by the prix_abonnement column
 * @method CompteEdfQuery groupByCreatedBy() Group by the created_by column
 * @method CompteEdfQuery groupByUpdatedBy() Group by the updated_by column
 * @method CompteEdfQuery groupByCreatedAt() Group by the created_at column
 * @method CompteEdfQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method CompteEdfQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CompteEdfQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CompteEdfQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CompteEdfQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method CompteEdfQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method CompteEdfQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method CompteEdfQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method CompteEdfQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method CompteEdfQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method CompteEdfQuery leftJoinHistorique($relationAlias = null) Adds a LEFT JOIN clause to the query using the Historique relation
 * @method CompteEdfQuery rightJoinHistorique($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Historique relation
 * @method CompteEdfQuery innerJoinHistorique($relationAlias = null) Adds a INNER JOIN clause to the query using the Historique relation
 *
 * @method CompteEdfQuery leftJoinCompteEdfPoste($relationAlias = null) Adds a LEFT JOIN clause to the query using the CompteEdfPoste relation
 * @method CompteEdfQuery rightJoinCompteEdfPoste($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CompteEdfPoste relation
 * @method CompteEdfQuery innerJoinCompteEdfPoste($relationAlias = null) Adds a INNER JOIN clause to the query using the CompteEdfPoste relation
 *
 * @method CompteEdfQuery leftJoinActivite($relationAlias = null) Adds a LEFT JOIN clause to the query using the Activite relation
 * @method CompteEdfQuery rightJoinActivite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Activite relation
 * @method CompteEdfQuery innerJoinActivite($relationAlias = null) Adds a INNER JOIN clause to the query using the Activite relation
 *
 * @method CompteEdf findOne(PropelPDO $con = null) Return the first CompteEdf matching the query
 * @method CompteEdf findOneOrCreate(PropelPDO $con = null) Return the first CompteEdf matching the query, or a new CompteEdf object populated from the query conditions when no match is found
 *
 * @method CompteEdf findOneByNom(string $nom) Return the first CompteEdf filtered by the nom column
 * @method CompteEdf findOneByPrenom(string $prenom) Return the first CompteEdf filtered by the prenom column
 * @method CompteEdf findOneByAdresse(string $adresse) Return the first CompteEdf filtered by the adresse column
 * @method CompteEdf findOneByVille(string $ville) Return the first CompteEdf filtered by the ville column
 * @method CompteEdf findOneByCodePostal(int $code_postal) Return the first CompteEdf filtered by the code_postal column
 * @method CompteEdf findOneByBudgetSouhaite(int $budget_souhaite) Return the first CompteEdf filtered by the budget_souhaite column
 * @method CompteEdf findOneByPrixAbonnement(int $prix_abonnement) Return the first CompteEdf filtered by the prix_abonnement column
 * @method CompteEdf findOneByCreatedBy(int $created_by) Return the first CompteEdf filtered by the created_by column
 * @method CompteEdf findOneByUpdatedBy(int $updated_by) Return the first CompteEdf filtered by the updated_by column
 * @method CompteEdf findOneByCreatedAt(string $created_at) Return the first CompteEdf filtered by the created_at column
 * @method CompteEdf findOneByUpdatedAt(string $updated_at) Return the first CompteEdf filtered by the updated_at column
 *
 * @method array findById(int $id) Return CompteEdf objects filtered by the id column
 * @method array findByNom(string $nom) Return CompteEdf objects filtered by the nom column
 * @method array findByPrenom(string $prenom) Return CompteEdf objects filtered by the prenom column
 * @method array findByAdresse(string $adresse) Return CompteEdf objects filtered by the adresse column
 * @method array findByVille(string $ville) Return CompteEdf objects filtered by the ville column
 * @method array findByCodePostal(int $code_postal) Return CompteEdf objects filtered by the code_postal column
 * @method array findByBudgetSouhaite(int $budget_souhaite) Return CompteEdf objects filtered by the budget_souhaite column
 * @method array findByPrixAbonnement(int $prix_abonnement) Return CompteEdf objects filtered by the prix_abonnement column
 * @method array findByCreatedBy(int $created_by) Return CompteEdf objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return CompteEdf objects filtered by the updated_by column
 * @method array findByCreatedAt(string $created_at) Return CompteEdf objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return CompteEdf objects filtered by the updated_at column
 *
 * @package    propel.generator..om
 */
abstract class BaseCompteEdfQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCompteEdfQuery object.
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
            $modelName = 'Happster\\Model\\CompteEdf';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CompteEdfQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CompteEdfQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CompteEdfQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CompteEdfQuery) {
            return $criteria;
        }
        $query = new CompteEdfQuery(null, null, $modelAlias);

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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   CompteEdf|CompteEdf[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CompteEdfPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CompteEdfPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 CompteEdf A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 CompteEdf A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `budget_souhaite`, `prix_abonnement`, `created_by`, `updated_by`, `created_at`, `updated_at` FROM `compte_edf` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new CompteEdf();
            $obj->hydrate($row);
            CompteEdfPeer::addInstanceToPool($obj, (string) $key);
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
     * @return CompteEdf|CompteEdf[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|CompteEdf[]|mixed the list of results, formatted by the current formatter
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
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CompteEdfPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CompteEdfPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CompteEdfPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CompteEdfPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the nom column
     *
     * Example usage:
     * <code>
     * $query->filterByNom('fooValue');   // WHERE nom = 'fooValue'
     * $query->filterByNom('%fooValue%'); // WHERE nom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nom The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByNom($nom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nom)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nom)) {
                $nom = str_replace('*', '%', $nom);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::NOM, $nom, $comparison);
    }

    /**
     * Filter the query on the prenom column
     *
     * Example usage:
     * <code>
     * $query->filterByPrenom('fooValue');   // WHERE prenom = 'fooValue'
     * $query->filterByPrenom('%fooValue%'); // WHERE prenom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prenom The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByPrenom($prenom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prenom)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $prenom)) {
                $prenom = str_replace('*', '%', $prenom);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::PRENOM, $prenom, $comparison);
    }

    /**
     * Filter the query on the adresse column
     *
     * Example usage:
     * <code>
     * $query->filterByAdresse('fooValue');   // WHERE adresse = 'fooValue'
     * $query->filterByAdresse('%fooValue%'); // WHERE adresse LIKE '%fooValue%'
     * </code>
     *
     * @param     string $adresse The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByAdresse($adresse = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($adresse)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $adresse)) {
                $adresse = str_replace('*', '%', $adresse);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::ADRESSE, $adresse, $comparison);
    }

    /**
     * Filter the query on the ville column
     *
     * Example usage:
     * <code>
     * $query->filterByVille('fooValue');   // WHERE ville = 'fooValue'
     * $query->filterByVille('%fooValue%'); // WHERE ville LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ville The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByVille($ville = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ville)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ville)) {
                $ville = str_replace('*', '%', $ville);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::VILLE, $ville, $comparison);
    }

    /**
     * Filter the query on the code_postal column
     *
     * Example usage:
     * <code>
     * $query->filterByCodePostal(1234); // WHERE code_postal = 1234
     * $query->filterByCodePostal(array(12, 34)); // WHERE code_postal IN (12, 34)
     * $query->filterByCodePostal(array('min' => 12)); // WHERE code_postal >= 12
     * $query->filterByCodePostal(array('max' => 12)); // WHERE code_postal <= 12
     * </code>
     *
     * @param     mixed $codePostal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByCodePostal($codePostal = null, $comparison = null)
    {
        if (is_array($codePostal)) {
            $useMinMax = false;
            if (isset($codePostal['min'])) {
                $this->addUsingAlias(CompteEdfPeer::CODE_POSTAL, $codePostal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($codePostal['max'])) {
                $this->addUsingAlias(CompteEdfPeer::CODE_POSTAL, $codePostal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::CODE_POSTAL, $codePostal, $comparison);
    }

    /**
     * Filter the query on the budget_souhaite column
     *
     * Example usage:
     * <code>
     * $query->filterByBudgetSouhaite(1234); // WHERE budget_souhaite = 1234
     * $query->filterByBudgetSouhaite(array(12, 34)); // WHERE budget_souhaite IN (12, 34)
     * $query->filterByBudgetSouhaite(array('min' => 12)); // WHERE budget_souhaite >= 12
     * $query->filterByBudgetSouhaite(array('max' => 12)); // WHERE budget_souhaite <= 12
     * </code>
     *
     * @param     mixed $budgetSouhaite The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByBudgetSouhaite($budgetSouhaite = null, $comparison = null)
    {
        if (is_array($budgetSouhaite)) {
            $useMinMax = false;
            if (isset($budgetSouhaite['min'])) {
                $this->addUsingAlias(CompteEdfPeer::BUDGET_SOUHAITE, $budgetSouhaite['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($budgetSouhaite['max'])) {
                $this->addUsingAlias(CompteEdfPeer::BUDGET_SOUHAITE, $budgetSouhaite['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::BUDGET_SOUHAITE, $budgetSouhaite, $comparison);
    }

    /**
     * Filter the query on the prix_abonnement column
     *
     * Example usage:
     * <code>
     * $query->filterByPrixAbonnement(1234); // WHERE prix_abonnement = 1234
     * $query->filterByPrixAbonnement(array(12, 34)); // WHERE prix_abonnement IN (12, 34)
     * $query->filterByPrixAbonnement(array('min' => 12)); // WHERE prix_abonnement >= 12
     * $query->filterByPrixAbonnement(array('max' => 12)); // WHERE prix_abonnement <= 12
     * </code>
     *
     * @param     mixed $prixAbonnement The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByPrixAbonnement($prixAbonnement = null, $comparison = null)
    {
        if (is_array($prixAbonnement)) {
            $useMinMax = false;
            if (isset($prixAbonnement['min'])) {
                $this->addUsingAlias(CompteEdfPeer::PRIX_ABONNEMENT, $prixAbonnement['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prixAbonnement['max'])) {
                $this->addUsingAlias(CompteEdfPeer::PRIX_ABONNEMENT, $prixAbonnement['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::PRIX_ABONNEMENT, $prixAbonnement, $comparison);
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
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(CompteEdfPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(CompteEdfPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::CREATED_BY, $createdBy, $comparison);
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
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (is_array($updatedBy)) {
            $useMinMax = false;
            if (isset($updatedBy['min'])) {
                $this->addUsingAlias(CompteEdfPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedBy['max'])) {
                $this->addUsingAlias(CompteEdfPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::UPDATED_BY, $updatedBy, $comparison);
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
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(CompteEdfPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(CompteEdfPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(CompteEdfPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(CompteEdfPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CompteEdfPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompteEdfQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(CompteEdfPeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CompteEdfPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return CompteEdfQuery The current query, for fluid interface
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
     * @return                 CompteEdfQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(CompteEdfPeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CompteEdfPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return CompteEdfQuery The current query, for fluid interface
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
     * Filter the query by a related Historique object
     *
     * @param   Historique|PropelObjectCollection $historique  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompteEdfQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByHistorique($historique, $comparison = null)
    {
        if ($historique instanceof Historique) {
            return $this
                ->addUsingAlias(CompteEdfPeer::ID, $historique->getCompteEdfId(), $comparison);
        } elseif ($historique instanceof PropelObjectCollection) {
            return $this
                ->useHistoriqueQuery()
                ->filterByPrimaryKeys($historique->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHistorique() only accepts arguments of type Historique or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Historique relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function joinHistorique($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Historique');

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
            $this->addJoinObject($join, 'Historique');
        }

        return $this;
    }

    /**
     * Use the Historique relation Historique object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Happster\Model\HistoriqueQuery A secondary query class using the current class as primary query
     */
    public function useHistoriqueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHistorique($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Historique', '\Happster\Model\HistoriqueQuery');
    }

    /**
     * Filter the query by a related CompteEdfPoste object
     *
     * @param   CompteEdfPoste|PropelObjectCollection $compteEdfPoste  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompteEdfQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCompteEdfPoste($compteEdfPoste, $comparison = null)
    {
        if ($compteEdfPoste instanceof CompteEdfPoste) {
            return $this
                ->addUsingAlias(CompteEdfPeer::ID, $compteEdfPoste->getCompteEdfId(), $comparison);
        } elseif ($compteEdfPoste instanceof PropelObjectCollection) {
            return $this
                ->useCompteEdfPosteQuery()
                ->filterByPrimaryKeys($compteEdfPoste->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCompteEdfPoste() only accepts arguments of type CompteEdfPoste or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CompteEdfPoste relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function joinCompteEdfPoste($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CompteEdfPoste');

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
            $this->addJoinObject($join, 'CompteEdfPoste');
        }

        return $this;
    }

    /**
     * Use the CompteEdfPoste relation CompteEdfPoste object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Happster\Model\CompteEdfPosteQuery A secondary query class using the current class as primary query
     */
    public function useCompteEdfPosteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCompteEdfPoste($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CompteEdfPoste', '\Happster\Model\CompteEdfPosteQuery');
    }

    /**
     * Filter the query by a related Activite object
     *
     * @param   Activite|PropelObjectCollection $activite  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CompteEdfQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActivite($activite, $comparison = null)
    {
        if ($activite instanceof Activite) {
            return $this
                ->addUsingAlias(CompteEdfPeer::ID, $activite->getCompteEdfId(), $comparison);
        } elseif ($activite instanceof PropelObjectCollection) {
            return $this
                ->useActiviteQuery()
                ->filterByPrimaryKeys($activite->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActivite() only accepts arguments of type Activite or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Activite relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function joinActivite($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Activite');

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
            $this->addJoinObject($join, 'Activite');
        }

        return $this;
    }

    /**
     * Use the Activite relation Activite object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Happster\Model\ActiviteQuery A secondary query class using the current class as primary query
     */
    public function useActiviteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActivite($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Activite', '\Happster\Model\ActiviteQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   CompteEdf $compteEdf Object to remove from the list of results
     *
     * @return CompteEdfQuery The current query, for fluid interface
     */
    public function prune($compteEdf = null)
    {
        if ($compteEdf) {
            $this->addUsingAlias(CompteEdfPeer::ID, $compteEdf->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     CompteEdfQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(CompteEdfPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     CompteEdfQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(CompteEdfPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     CompteEdfQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(CompteEdfPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     CompteEdfQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(CompteEdfPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     CompteEdfQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(CompteEdfPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     CompteEdfQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(CompteEdfPeer::CREATED_AT);
    }
}
