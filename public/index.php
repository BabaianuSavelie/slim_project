<?php

require __DIR__ . "/../vendor/autoload.php";

use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Http\Models\Product;

$app = AppFactory::create();
$capsule = new Manager();

$capsule->addConnection(require '../config/settings.php');

$capsule->setAsGlobal();
$capsule->bootEloquent();

$app->get("/",function(Request $request,Response $response){
    $response->getBody()->write("Hello World!");
    return $response;
});

$app->get('/products',function (Request $request,Response $response){
   $products = Product::all();

   $response->getBody()->write(json_encode($products));
   return $response;
});

$app->run();

