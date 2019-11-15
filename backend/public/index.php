<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';


$app = new \Slim\App();

// $app->get('/hello/{name}', function (Request $request, Response $response, $args) {
//     $response->withStatus(200)->write('Hello, '. $args['name']);
//     return $response;
// });

// Users Ressource Routes
require '../src/routes/users.php';

$app->run();