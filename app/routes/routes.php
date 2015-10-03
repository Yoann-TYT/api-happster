<?php
    $app->get('/', function() use ($app) {
        echo "It Works";
    })->name('homepage');

    $app->get('/test', function() use ($app) {
        echo $tes->pwte();
        echo "It Workss";

    })->name('homepaget');
    require_once __ROOT__.'/app/routes/security.php';
?>
