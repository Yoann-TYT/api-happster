<?php

namespace Happster\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'activite' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator..map
 */
class ActiviteTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.map.ActiviteTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('activite');
        $this->setPhpName('Activite');
        $this->setClassname('Happster\\Model\\Activite');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('time', 'Time', 'TIMESTAMP', true, null, null);
        $this->addColumn('production', 'Production', 'FLOAT', false, 10, null);
        $this->addColumn('consommation', 'Consommation', 'FLOAT', false, 10, null);
        $this->addForeignPrimaryKey('compte_edf_id', 'CompteEdfId', 'INTEGER' , 'compte_edf', 'id', true, null, null);
        $this->addForeignKey('created_by', 'CreatedBy', 'INTEGER', 'user', 'id', false, null, null);
        $this->addForeignKey('updated_by', 'UpdatedBy', 'INTEGER', 'user', 'id', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CompteEdf', 'Happster\\Model\\CompteEdf', RelationMap::MANY_TO_ONE, array('compte_edf_id' => 'id', ), 'CASCADE', null);
        $this->addRelation('UserRelatedByCreatedBy', 'Happster\\Model\\User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), null, null);
        $this->addRelation('UserRelatedByUpdatedBy', 'Happster\\Model\\User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), null, null);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'blamable' =>  array (
  'create_column' => 'created_by',
  'update_column' => 'updated_by',
),
            'timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // ActiviteTableMap
