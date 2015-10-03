<?php

namespace Happster\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'user' table.
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
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.map.UserTableMap';

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
        $this->setName('user');
        $this->setPhpName('User');
        $this->setClassname('Happster\\Model\\User');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', true, 255, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', true, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('password', 'Password', 'VARCHAR', false, 255, null);
        $this->addColumn('phone_number', 'PhoneNumber', 'VARCHAR', false, 255, null);
        $this->addColumn('role', 'Role', 'VARCHAR', false, 25, null);
        $this->addForeignKey('created_by', 'CreatedBy', 'INTEGER', 'user', 'id', false, null, null);
        $this->addForeignKey('updated_by', 'UpdatedBy', 'INTEGER', 'user', 'id', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
        $this->addValidator('first_name', 'required', 'propel.validator.RequiredValidator', '', 'This field is required.');
        $this->addValidator('first_name', 'maxLength', 'propel.validator.MaxLengthValidator', '255', 'This field can be no larger than 255 in size');
        $this->addValidator('last_name', 'required', 'propel.validator.RequiredValidator', '', 'This field is required.');
        $this->addValidator('last_name', 'maxLength', 'propel.validator.MaxLengthValidator', '255', 'This field can be no larger than 255 in size');
        $this->addValidator('email', 'required', 'propel.validator.RequiredValidator', '', 'This field is required.');
        $this->addValidator('email', 'unique', 'propel.validator.UniqueValidator', '', 'This entry already exists !');
        $this->addValidator('email', 'maxLength', 'propel.validator.MaxLengthValidator', '255', 'This field can be no larger than 255 in size');
        $this->addValidator('password', 'maxLength', 'propel.validator.MaxLengthValidator', '255', 'This field can be no larger than 255 in size');
        $this->addValidator('phone_number', 'maxLength', 'propel.validator.MaxLengthValidator', '255', 'This field can be no larger than 255 in size');
        $this->addValidator('role', 'validValues', 'propel.validator.ValidValuesValidator', 'ROLE_CLIENT|ROLE_ADMIN', 'Please select a valid role type.');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('UserRelatedByCreatedBy', 'Happster\\Model\\User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), null, null);
        $this->addRelation('UserRelatedByUpdatedBy', 'Happster\\Model\\User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), null, null);
        $this->addRelation('CompteEdfRelatedByCreatedBy', 'Happster\\Model\\CompteEdf', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'CompteEdfsRelatedByCreatedBy');
        $this->addRelation('CompteEdfRelatedByUpdatedBy', 'Happster\\Model\\CompteEdf', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'CompteEdfsRelatedByUpdatedBy');
        $this->addRelation('TarifRelatedByCreatedBy', 'Happster\\Model\\Tarif', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'TarifsRelatedByCreatedBy');
        $this->addRelation('TarifRelatedByUpdatedBy', 'Happster\\Model\\Tarif', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'TarifsRelatedByUpdatedBy');
        $this->addRelation('HistoriqueRelatedByCreatedBy', 'Happster\\Model\\Historique', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'HistoriquesRelatedByCreatedBy');
        $this->addRelation('HistoriqueRelatedByUpdatedBy', 'Happster\\Model\\Historique', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'HistoriquesRelatedByUpdatedBy');
        $this->addRelation('PosteRelatedByCreatedBy', 'Happster\\Model\\Poste', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'PostesRelatedByCreatedBy');
        $this->addRelation('PosteRelatedByUpdatedBy', 'Happster\\Model\\Poste', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'PostesRelatedByUpdatedBy');
        $this->addRelation('CompteEdfPosteRelatedByCreatedBy', 'Happster\\Model\\CompteEdfPoste', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'CompteEdfPostesRelatedByCreatedBy');
        $this->addRelation('CompteEdfPosteRelatedByUpdatedBy', 'Happster\\Model\\CompteEdfPoste', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'CompteEdfPostesRelatedByUpdatedBy');
        $this->addRelation('ActiviteRelatedByCreatedBy', 'Happster\\Model\\Activite', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'ActivitesRelatedByCreatedBy');
        $this->addRelation('ActiviteRelatedByUpdatedBy', 'Happster\\Model\\Activite', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'ActivitesRelatedByUpdatedBy');
        $this->addRelation('UserRelatedById0', 'Happster\\Model\\User', RelationMap::ONE_TO_MANY, array('id' => 'created_by', ), null, null, 'UsersRelatedById0');
        $this->addRelation('UserRelatedById1', 'Happster\\Model\\User', RelationMap::ONE_TO_MANY, array('id' => 'updated_by', ), null, null, 'UsersRelatedById1');
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

} // UserTableMap
