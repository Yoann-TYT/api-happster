<?php
    use Happster\Model\TarifQuery;
    use Happster\Model\CompteEdfQuery;
    use Happster\Model\UserQuery;

    $app->get('/', function() use ($app) {

        for ($i = 9; $i > 0; $i--) {
            echo $i;
        }

        echo rand(50,350)/1000;
        echo "It Works";
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
// fonction chris
    $app->get('/api/postes_conso', function() use ($app) {

        $response = [
	'Radiateur' => round(rand(0, 100)/100 * 1500),
	'Ballon 100L' => round(rand(0, 100)/100 * 2500),
	'Réfrigérateur' => round(rand(0, 100)/100 * 200),
	'Congélateur' => round(rand(0, 100)/100 * 275),
	'Lave-vaisselle' => round(rand(0, 100)/100 * 1200),
	'Lave-linge' => round(rand(0, 100)/100 * 2500),
	'Sèche-linge' => round(rand(0, 100)/100 * 2500),
	'Télévision LCD' => round(rand(0, 100)/100 * 150),
	'Plaques de cuisson' => round(rand(0, 100)/100 * 9000),
	'Micro-ondes' => round(rand(0, 100)/100 * 1000),
	'Cafetière' => round(rand(0, 100)/100 * 750),
	'Voiture' => round(rand(0, 100)/100 * 4500),
	'Ordinateur' => round(rand(0, 100)/100 * 80),
	'Aspirateur' => round(rand(0, 100)/100 * 700),
	'Eclairage' => round(rand(0, 100)/100 * 100),
        ];
        echo json_encode($response);

    })->name("postes_conso");

    $app->get('/api/tarif', function() use ($app) {
        $app->response->headers->set('Content-Type', 'application/json');
        //TarifQuery::create()
            //->filterByTime();

    })->name("tarif");


    require_once __ROOT__.'/app/routes/security.php';
?>
