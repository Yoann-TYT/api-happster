<?php

namespace Happster\Model;

use Happster\Model\om\BaseCompteEdfPosteQuery;


/**
 * Skeleton subclass for performing query and update operations on the 'compte_edf_poste' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.
 */
class CompteEdfPosteQuery extends BaseCompteEdfPosteQuery
{
    public function findPkOrCreate($key) {
        $compteEdfPoste = \Happster\Model\CompteEdfPosteQuery::create()
            ->findPK($key);

        if (!$compteEdfPoste instanceof \Happster\Model\CompteEdfPoste) {
            $compteEdfPoste = new \Happster\Model\CompteEdfPoste;
        }

        return $compteEdfPoste;
    }
}
