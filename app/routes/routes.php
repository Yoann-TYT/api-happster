<?php
    $app->get('/', function() use ($app) {
        echo "It Works";
    })->name('homepage');

    $app->get('/api/jauge', function() use ($app) {
        $app->response->headers->set('Content-Type', 'application/json');
        $response = [
            'value' => round(rand(0, 100)),
            'type'  => 'success',
        ];
        echo json_encode($response);

    })->name("jauge");

    require_once __ROOT__.'/app/routes/security.php';
?>
