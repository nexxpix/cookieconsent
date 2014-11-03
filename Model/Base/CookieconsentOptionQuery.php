<?php

namespace CookieConsent\Model\Base;

use \Exception;
use \PDO;
use CookieConsent\Model\CookieconsentOption as ChildCookieconsentOption;
use CookieConsent\Model\CookieconsentOptionQuery as ChildCookieconsentOptionQuery;
use CookieConsent\Model\Map\CookieconsentOptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cookieconsent_options' table.
 *
 *
 *
 * @method     ChildCookieconsentOptionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCookieconsentOptionQuery orderByStyle($order = Criteria::ASC) Order by the style column
 * @method     ChildCookieconsentOptionQuery orderByBannerPlacement($order = Criteria::ASC) Order by the banner_placement column
 * @method     ChildCookieconsentOptionQuery orderByTagPlacement($order = Criteria::ASC) Order by the tag_placement column
 * @method     ChildCookieconsentOptionQuery orderByPrivacySettingsTags($order = Criteria::ASC) Order by the privacy_settings_tags column
 * @method     ChildCookieconsentOptionQuery orderByBannerDisplayMode($order = Criteria::ASC) Order by the banner_display_mode column
 * @method     ChildCookieconsentOptionQuery orderByConsent($order = Criteria::ASC) Order by the consent column
 *
 * @method     ChildCookieconsentOptionQuery groupById() Group by the id column
 * @method     ChildCookieconsentOptionQuery groupByStyle() Group by the style column
 * @method     ChildCookieconsentOptionQuery groupByBannerPlacement() Group by the banner_placement column
 * @method     ChildCookieconsentOptionQuery groupByTagPlacement() Group by the tag_placement column
 * @method     ChildCookieconsentOptionQuery groupByPrivacySettingsTags() Group by the privacy_settings_tags column
 * @method     ChildCookieconsentOptionQuery groupByBannerDisplayMode() Group by the banner_display_mode column
 * @method     ChildCookieconsentOptionQuery groupByConsent() Group by the consent column
 *
 * @method     ChildCookieconsentOptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCookieconsentOptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCookieconsentOptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCookieconsentOption findOne(ConnectionInterface $con = null) Return the first ChildCookieconsentOption matching the query
 * @method     ChildCookieconsentOption findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCookieconsentOption matching the query, or a new ChildCookieconsentOption object populated from the query conditions when no match is found
 *
 * @method     ChildCookieconsentOption findOneById(int $id) Return the first ChildCookieconsentOption filtered by the id column
 * @method     ChildCookieconsentOption findOneByStyle(string $style) Return the first ChildCookieconsentOption filtered by the style column
 * @method     ChildCookieconsentOption findOneByBannerPlacement(string $banner_placement) Return the first ChildCookieconsentOption filtered by the banner_placement column
 * @method     ChildCookieconsentOption findOneByTagPlacement(string $tag_placement) Return the first ChildCookieconsentOption filtered by the tag_placement column
 * @method     ChildCookieconsentOption findOneByPrivacySettingsTags(string $privacy_settings_tags) Return the first ChildCookieconsentOption filtered by the privacy_settings_tags column
 * @method     ChildCookieconsentOption findOneByBannerDisplayMode(string $banner_display_mode) Return the first ChildCookieconsentOption filtered by the banner_display_mode column
 * @method     ChildCookieconsentOption findOneByConsent(string $consent) Return the first ChildCookieconsentOption filtered by the consent column
 *
 * @method     array findById(int $id) Return ChildCookieconsentOption objects filtered by the id column
 * @method     array findByStyle(string $style) Return ChildCookieconsentOption objects filtered by the style column
 * @method     array findByBannerPlacement(string $banner_placement) Return ChildCookieconsentOption objects filtered by the banner_placement column
 * @method     array findByTagPlacement(string $tag_placement) Return ChildCookieconsentOption objects filtered by the tag_placement column
 * @method     array findByPrivacySettingsTags(string $privacy_settings_tags) Return ChildCookieconsentOption objects filtered by the privacy_settings_tags column
 * @method     array findByBannerDisplayMode(string $banner_display_mode) Return ChildCookieconsentOption objects filtered by the banner_display_mode column
 * @method     array findByConsent(string $consent) Return ChildCookieconsentOption objects filtered by the consent column
 *
 */
abstract class CookieconsentOptionQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \CookieConsent\Model\Base\CookieconsentOptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\CookieConsent\\Model\\CookieconsentOption', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCookieconsentOptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCookieconsentOptionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \CookieConsent\Model\CookieconsentOptionQuery) {
            return $criteria;
        }
        $query = new \CookieConsent\Model\CookieconsentOptionQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
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
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildCookieconsentOption|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CookieconsentOptionTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CookieconsentOptionTableMap::DATABASE_NAME);
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
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildCookieconsentOption A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, STYLE, BANNER_PLACEMENT, TAG_PLACEMENT, PRIVACY_SETTINGS_TAGS, BANNER_DISPLAY_MODE, CONSENT FROM cookieconsent_options WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildCookieconsentOption();
            $obj->hydrate($row);
            CookieconsentOptionTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildCookieconsentOption|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildCookieconsentOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CookieconsentOptionTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildCookieconsentOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CookieconsentOptionTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCookieconsentOptionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CookieconsentOptionTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CookieconsentOptionTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CookieconsentOptionTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the style column
     *
     * Example usage:
     * <code>
     * $query->filterByStyle('fooValue');   // WHERE style = 'fooValue'
     * $query->filterByStyle('%fooValue%'); // WHERE style LIKE '%fooValue%'
     * </code>
     *
     * @param     string $style The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCookieconsentOptionQuery The current query, for fluid interface
     */
    public function filterByStyle($style = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($style)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $style)) {
                $style = str_replace('*', '%', $style);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CookieconsentOptionTableMap::STYLE, $style, $comparison);
    }

    /**
     * Filter the query on the banner_placement column
     *
     * Example usage:
     * <code>
     * $query->filterByBannerPlacement('fooValue');   // WHERE banner_placement = 'fooValue'
     * $query->filterByBannerPlacement('%fooValue%'); // WHERE banner_placement LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bannerPlacement The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCookieconsentOptionQuery The current query, for fluid interface
     */
    public function filterByBannerPlacement($bannerPlacement = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bannerPlacement)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bannerPlacement)) {
                $bannerPlacement = str_replace('*', '%', $bannerPlacement);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CookieconsentOptionTableMap::BANNER_PLACEMENT, $bannerPlacement, $comparison);
    }

    /**
     * Filter the query on the tag_placement column
     *
     * Example usage:
     * <code>
     * $query->filterByTagPlacement('fooValue');   // WHERE tag_placement = 'fooValue'
     * $query->filterByTagPlacement('%fooValue%'); // WHERE tag_placement LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tagPlacement The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCookieconsentOptionQuery The current query, for fluid interface
     */
    public function filterByTagPlacement($tagPlacement = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tagPlacement)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tagPlacement)) {
                $tagPlacement = str_replace('*', '%', $tagPlacement);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CookieconsentOptionTableMap::TAG_PLACEMENT, $tagPlacement, $comparison);
    }

    /**
     * Filter the query on the privacy_settings_tags column
     *
     * Example usage:
     * <code>
     * $query->filterByPrivacySettingsTags('fooValue');   // WHERE privacy_settings_tags = 'fooValue'
     * $query->filterByPrivacySettingsTags('%fooValue%'); // WHERE privacy_settings_tags LIKE '%fooValue%'
     * </code>
     *
     * @param     string $privacySettingsTags The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCookieconsentOptionQuery The current query, for fluid interface
     */
    public function filterByPrivacySettingsTags($privacySettingsTags = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($privacySettingsTags)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $privacySettingsTags)) {
                $privacySettingsTags = str_replace('*', '%', $privacySettingsTags);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CookieconsentOptionTableMap::PRIVACY_SETTINGS_TAGS, $privacySettingsTags, $comparison);
    }

    /**
     * Filter the query on the banner_display_mode column
     *
     * Example usage:
     * <code>
     * $query->filterByBannerDisplayMode('fooValue');   // WHERE banner_display_mode = 'fooValue'
     * $query->filterByBannerDisplayMode('%fooValue%'); // WHERE banner_display_mode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bannerDisplayMode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCookieconsentOptionQuery The current query, for fluid interface
     */
    public function filterByBannerDisplayMode($bannerDisplayMode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bannerDisplayMode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bannerDisplayMode)) {
                $bannerDisplayMode = str_replace('*', '%', $bannerDisplayMode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CookieconsentOptionTableMap::BANNER_DISPLAY_MODE, $bannerDisplayMode, $comparison);
    }

    /**
     * Filter the query on the consent column
     *
     * Example usage:
     * <code>
     * $query->filterByConsent('fooValue');   // WHERE consent = 'fooValue'
     * $query->filterByConsent('%fooValue%'); // WHERE consent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $consent The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCookieconsentOptionQuery The current query, for fluid interface
     */
    public function filterByConsent($consent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($consent)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $consent)) {
                $consent = str_replace('*', '%', $consent);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CookieconsentOptionTableMap::CONSENT, $consent, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCookieconsentOption $cookieconsentOption Object to remove from the list of results
     *
     * @return ChildCookieconsentOptionQuery The current query, for fluid interface
     */
    public function prune($cookieconsentOption = null)
    {
        if ($cookieconsentOption) {
            $this->addUsingAlias(CookieconsentOptionTableMap::ID, $cookieconsentOption->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cookieconsent_options table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CookieconsentOptionTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CookieconsentOptionTableMap::clearInstancePool();
            CookieconsentOptionTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildCookieconsentOption or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildCookieconsentOption object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CookieconsentOptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CookieconsentOptionTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        CookieconsentOptionTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CookieconsentOptionTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // CookieconsentOptionQuery
