<?php
    use Happster\Model\TarifQuery;

    $app->get('/', function() use ($app) {
        echo rand(50,350)/1000;
        echo "It Works";
    })->name('homepage');

    $app->get('/api/jauge', function() use ($app) {
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->headers->set('Access-Control-Allow-Origin', '*');

        $response = [
            'value' => round(rand(0, 100)),
            'type'  => 'success',
        ];
        echo json_encode($response);

    })->name("jauge");

    $app->get('/api/tarif', function() use ($app) {
        $app->response->headers->set('Content-Type', 'application/json');
        //TarifQuery::create()
            //->filterByTime();

    })->name("tarif");


    require_once __ROOT__.'/app/routes/security.php';
?>
