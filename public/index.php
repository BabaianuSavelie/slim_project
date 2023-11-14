<?php

require __DIR__ . "/../vendor/autoload.php";

use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Http\Models\Product;
use App\Http\Controllers\ProductController;

$app = AppFactory::create();
$capsule = new Manager();

$capsule->addConnection(require '../config/settings.php');

$capsule->setAsGlobal();
$capsule->bootEloquent();

$app->get("/",[ProductController::class,'index']);

$app->get('/create',[ProductController::class,'create']);

$app->post('/create',[ProductController::class,'store']);

$app->run();

