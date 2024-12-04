<?php
use App\Controllers\UserController;
use App\Controllers\ProductController;
use App\Controllers\OrderController;

$app->redirect('/','/products');

$app->get('/products', [ProductController::class, 'index']);
$app->get('/product/{id}', [ProductController::class, 'show']);
$app->post('/cart/add', [ProductController::class, 'addToCart']);
$app->get('/cart', [OrderController::class, 'viewCart']);
$app->post('/order', [OrderController::class, 'placeOrder']);
$app->get('/orders', [OrderController::class, 'index']);

$app->get('/register', [UserController::class, 'registerForm']);
$app->post('/register', [UserController::class, 'register']);
$app->get('/login', [UserController::class, 'loginForm']);
$app->post('/login', [UserController::class, 'login']);
$app->get('/logout', [UserController::class, 'logout']);

$app->get('/test', function ($request, $response) {
    $response->getBody()->write("Test route works!");
    return $response;
});


?>