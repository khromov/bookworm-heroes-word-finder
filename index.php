<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();
$app->config('debug', true);

/* Main route */
$app->get('/', function () use ($app)
{
    $app->render('home.php');
    //echo "Hello!";
});

/* AJAX Route for finding words */
$app->post('/ajax/solve/:letters', function ($letters) use ($app)
{
    $app->contentType('application/json');
    echo json_encode(array('status' => 'OK', 'letters' => $letters, 'words' => []));
});


/* API Route for finding words */
$app->get('/api/solve/:letters', function ($letters) use ($app)
{
    $app->contentType('application/json');
    echo json_encode(array('status' => 'OK', 'letters' => $letters, 'words' => []));
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});
$app->run();