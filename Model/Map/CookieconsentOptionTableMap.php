<?php

namespace CookieConsent\Model\Map;

use CookieConsent\Model\CookieconsentOption;
use CookieConsent\Model\CookieconsentOptionQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'cookieconsent_options' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class CookieconsentOptionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'CookieConsent.Model.Map.CookieconsentOptionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'cookieconsent_options';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\CookieConsent\\Model\\CookieconsentOption';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'CookieConsent.Model.CookieconsentOption';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the ID field
     */
    const ID = 'cookieconsent_options.ID';

    /**
     * the column name for the STYLE field
     */
    const STYLE = 'cookieconsent_options.STYLE';

    /**
     * the column name for the BANNER_PLACEMENT field
     */
    const BANNER_PLACEMENT = 'cookieconsent_options.BANNER_PLACEMENT';

    /**
     * the column name for the TAG_PLACEMENT field
     */
    const TAG_PLACEMENT = 'cookieconsent_options.TAG_PLACEMENT';

    /**
     * the column name for the PRIVACY_SETTINGS_TAGS field
     */
    const PRIVACY_SETTINGS_TAGS = 'cookieconsent_options.PRIVACY_SETTINGS_TAGS';

    /**
     * the column name for the BANNER_DISPLAY_MODE field
     */
    const BANNER_DISPLAY_MODE = 'cookieconsent_options.BANNER_DISPLAY_MODE';

    /**
     * the column name for the CONSENT field
     */
    const CONSENT = 'cookieconsent_options.CONSENT';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Style', 'BannerPlacement', 'TagPlacement', 'PrivacySettingsTags', 'BannerDisplayMode', 'Consent', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'style', 'bannerPlacement', 'tagPlacement', 'privacySettingsTags', 'bannerDisplayMode', 'consent', ),
        self::TYPE_COLNAME       => array(CookieconsentOptionTableMap::ID, CookieconsentOptionTableMap::STYLE, CookieconsentOptionTableMap::BANNER_PLACEMENT, CookieconsentOptionTableMap::TAG_PLACEMENT, CookieconsentOptionTableMap::PRIVACY_SETTINGS_TAGS, CookieconsentOptionTableMap::BANNER_DISPLAY_MODE, CookieconsentOptionTableMap::CONSENT, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'STYLE', 'BANNER_PLACEMENT', 'TAG_PLACEMENT', 'PRIVACY_SETTINGS_TAGS', 'BANNER_DISPLAY_MODE', 'CONSENT', ),
        self::TYPE_FIELDNAME     => array('id', 'style', 'banner_placement', 'tag_placement', 'privacy_settings_tags', 'banner_display_mode', 'consent', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Style' => 1, 'BannerPlacement' => 2, 'TagPlacement' => 3, 'PrivacySettingsTags' => 4, 'BannerDisplayMode' => 5, 'Consent' => 6, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'style' => 1, 'bannerPlacement' => 2, 'tagPlacement' => 3, 'privacySettingsTags' => 4, 'bannerDisplayMode' => 5, 'consent' => 6, ),
        self::TYPE_COLNAME       => array(CookieconsentOptionTableMap::ID => 0, CookieconsentOptionTableMap::STYLE => 1, CookieconsentOptionTableMap::BANNER_PLACEMENT => 2, CookieconsentOptionTableMap::TAG_PLACEMENT => 3, CookieconsentOptionTableMap::PRIVACY_SETTINGS_TAGS => 4, CookieconsentOptionTableMap::BANNER_DISPLAY_MODE => 5, CookieconsentOptionTableMap::CONSENT => 6, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'STYLE' => 1, 'BANNER_PLACEMENT' => 2, 'TAG_PLACEMENT' => 3, 'PRIVACY_SETTINGS_TAGS' => 4, 'BANNER_DISPLAY_MODE' => 5, 'CONSENT' => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'style' => 1, 'banner_placement' => 2, 'tag_placement' => 3, 'privacy_settings_tags' => 4, 'banner_display_mode' => 5, 'consent' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('cookieconsent_options');
        $this->setPhpName('CookieconsentOption');
        $this->setClassName('\\CookieConsent\\Model\\CookieconsentOption');
        $this->setPackage('CookieConsent.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('STYLE', 'Style', 'VARCHAR', false, 255, null);
        $this->addColumn('BANNER_PLACEMENT', 'BannerPlacement', 'VARCHAR', false, 255, null);
        $this->addColumn('TAG_PLACEMENT', 'TagPlacement', 'VARCHAR', false, 255, null);
        $this->addColumn('PRIVACY_SETTINGS_TAGS', 'PrivacySettingsTags', 'VARCHAR', false, 45, null);
        $this->addColumn('BANNER_DISPLAY_MODE', 'BannerDisplayMode', 'VARCHAR', false, 255, null);
        $this->addColumn('CONSENT', 'Consent', 'VARCHAR', false, 45, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {

            return (int) $row[
                            $indexType == TableMap::TYPE_NUM
                            ? 0 + $offset
                            : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
                        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? CookieconsentOptionTableMap::CLASS_DEFAULT : CookieconsentOptionTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (CookieconsentOption object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = CookieconsentOptionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = CookieconsentOptionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + CookieconsentOptionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = CookieconsentOptionTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            CookieconsentOptionTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = CookieconsentOptionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = CookieconsentOptionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                CookieconsentOptionTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(CookieconsentOptionTableMap::ID);
            $criteria->addSelectColumn(CookieconsentOptionTableMap::STYLE);
            $criteria->addSelectColumn(CookieconsentOptionTableMap::BANNER_PLACEMENT);
            $criteria->addSelectColumn(CookieconsentOptionTableMap::TAG_PLACEMENT);
            $criteria->addSelectColumn(CookieconsentOptionTableMap::PRIVACY_SETTINGS_TAGS);
            $criteria->addSelectColumn(CookieconsentOptionTableMap::BANNER_DISPLAY_MODE);
            $criteria->addSelectColumn(CookieconsentOptionTableMap::CONSENT);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.STYLE');
            $criteria->addSelectColumn($alias . '.BANNER_PLACEMENT');
            $criteria->addSelectColumn($alias . '.TAG_PLACEMENT');
            $criteria->addSelectColumn($alias . '.PRIVACY_SETTINGS_TAGS');
            $criteria->addSelectColumn($alias . '.BANNER_DISPLAY_MODE');
            $criteria->addSelectColumn($alias . '.CONSENT');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(CookieconsentOptionTableMap::DATABASE_NAME)->getTable(CookieconsentOptionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(CookieconsentOptionTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(CookieconsentOptionTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new CookieconsentOptionTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a CookieconsentOption or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or CookieconsentOption object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CookieconsentOptionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \CookieConsent\Model\CookieconsentOption) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(CookieconsentOptionTableMap::DATABASE_NAME);
            $criteria->add(CookieconsentOptionTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = CookieconsentOptionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { CookieconsentOptionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { CookieconsentOptionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the cookieconsent_options table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return CookieconsentOptionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a CookieconsentOption or Criteria object.
     *
     * @param mixed               $criteria Criteria or CookieconsentOption object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CookieconsentOptionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from CookieconsentOption object
        }

        if ($criteria->containsKey(CookieconsentOptionTableMap::ID) && $criteria->keyContainsValue(CookieconsentOptionTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.CookieconsentOptionTableMap::ID.')');
        }


        // Set the correct dbName
        $query = CookieconsentOptionQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // CookieconsentOptionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
CookieconsentOptionTableMap::buildTableMap();
