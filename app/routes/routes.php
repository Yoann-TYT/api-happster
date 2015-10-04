<?php
    use Happster\Model\TarifQuery;
    use Happster\Model\CompteEdfQuery;
    use Happster\Model\UserQuery;

    $app->get('/', function() use ($app) {
        echo json_encode("API Happster");
    })->name('homepage');

    $app->get('/api/jauge(:data+)', function() use ($app) {
        $response = [
            'value' => round(rand(0, 100)),
            'type'  => 'success',
        ];
        echo json_encode($response);

    })->name("jauge");

    $app->get('/api/postes/:compteEdfId', function($compteEdfId) use ($app) {
        $postes = \Happster\Model\PosteQuery::create()
            ->find();

        $response = [];
        foreach ($postes as $poste) {
            $compteEdfPoste = \Happster\Model\CompteEdfPosteQuery::create()
                ->findPkOrCreate([$compteEdfId, $poste->getId()]);

            $response[] = [
                $poste->toJSON(),
                $compteEdfPoste->toJSON(),
            ];

        }
        echo json_encode($response);


    })->name('get_poste');

    $app->post('/api/poste', function() use ($app) {
        $compteEdfId    = $app->request->post('compte_edf_id');
        $posteId        = $app->request->post('poste_id');
        $puissance      = $app->request->post('puissance');

        $compteEdfPoste = \Happster\Model\CompteEdfPosteQuery::create()
            ->findPk([$compteEdfId, $posteId]);

        if ($compteEdfPoste instanceof \Happster\Model\CompteEdfPoste) {
            $app->halt(409, json_encode('Ce poste a déjà été ajouté'));
        }

        $compteEdfPoste = new \Happster\Model\CompteEdfPoste();
        $compteEdfPoste->setCompteEdfId($compteEdfId);
        $compteEdfPoste->setPosteId($posteId);
        $compteEdfPoste->setPuissance($puissance);
        $compteEdfPoste->setTime(time());
        $compteEdfPoste->save();

        echo $compteEdfPoste->toJSON();
    })->name('post_poste');

    $app->put('/api/poste', function() use ($app) {
        $compteEdfId    = $app->request->put('compte_edf_id');
        $posteId        = $app->request->put('poste_id');
        $puissance      = $app->request->put('puissance');


        $compteEdfPoste = \Happster\Model\CompteEdfPosteQuery::create()
            ->findPk([$compteEdfId, $posteId]);

        if (!$compteEdfPoste instanceof \Happster\Model\CompteEdfPoste) {
            $app->halt(409, json_encode("Ce poste n'existe pas en base de donnée"));
        }

        $compteEdfPoste->setPuissance($puissance);
        $compteEdfPoste->setTime(time());
        $compteEdfPoste->save();

        echo $compteEdfPoste->toJSON();
    })->name('put_poste');

    $app->delete('/api/poste', function() use ($app) {
        $compteEdfId    = $app->request->delete('compte_edf_id');
        $posteId        = $app->request->delete('poste_id');

        $compteEdfPoste = \Happster\Model\CompteEdfPosteQuery::create()
            ->findPk([$compteEdfId, $posteId]);

        if (!$compteEdfPoste instanceof \Happster\Model\CompteEdfPoste) {
            $app->halt(409, json_encode("Ce poste n'existe pas en base de donnée"));
        }

        $compteEdfPoste->delete();

        echo json_encode("Poste ".$posteId." supprimé");
    })->name('delete_poste');

    require_once __ROOT__.'/app/routes/security.php';
?>
