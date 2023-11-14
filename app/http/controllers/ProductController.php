<?php

namespace App\Http\Controllers;

use App\Http\Models\Product;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ProductController
{
    public function index(Request $request, Response $response){
        ob_start();
        include __DIR__ . '/../../../views/index.php';
        $html = ob_get_clean();

        $response->getBody()->write($html);
        return $response;
    }
    public function create(Request $request, Response $response){
        ob_start();
        include __DIR__ . '/../../../views/create.php';
        $html = ob_get_clean();

        $response->getBody()->write($html);
        return $response;
    }

    public function store(Request $request, Response $response){
        $data = $request->getParsedBody();
        $files = $request->getUploadedFiles();
        $fileName = $files['image']->getClientFilename();

        $produs = new Product([...$data,$fileName]);
        $produs->save();

        return $response;
    }
}