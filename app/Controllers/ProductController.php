<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Product;

class ProductController
{
    public function index(Request $request, Response $response)
    {
        $products = Product::all();
        ob_start();
        require '../views/products/index.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function show(Request $request, Response $response, $args)
    {
        $product = Product::find($args['id']);
        ob_start();
        require '../views/products/show.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function addToCart(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        // Logic for adding product to cart
        return $response->withHeader('Location', '/cart')->withStatus(302);
    }
}
?>