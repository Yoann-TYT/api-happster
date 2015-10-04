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
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->headers->set('Access-Control-Allow-Origin', '*');

        $response = [
            'value' => round(rand(0, 100)),
            'type'  => 'success',
        ];
        echo json_encode($response);

    })->name("jauge");

// fonction chris
    $app->get('/api/postes_conso', function() use ($app) {
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->headers->set('Access-Control-Allow-Origin', '*');

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
