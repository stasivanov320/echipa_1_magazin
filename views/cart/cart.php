<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CartController
{
    public function index(Request $request, Response $response, $args)
    {
        // Exemplu: Simulează coșul (înlocuiește cu logica ta reală)
        $cart = [
            [
                'name' => 'Produs 1',
                'quantity' => 2,
                'price' => 100.00
            ],
            [
                'name' => 'Produs 2',
                'quantity' => 1,
                'price' => 200.00
            ]
        ];

        // Transmite $cart către view
        return require __DIR__ . '/../views/cart/cart.view.php';
    }
} 
?>