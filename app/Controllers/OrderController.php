<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController
{
    public function viewCart(Request $request, Response $response)
    {
        // Aici vei adăuga logica pentru a obține coșul de cumpărături al utilizatorului
        ob_start();
        require '../views/cart/cart.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function placeOrder(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $order = new Order();
        $order->user_id = $_SESSION['user']->id;
        $order->status = 'în așteptare';
        $order->total_price = $data['total_price']; // Asumăm că prețul total este trimis în request
        $order->save();

        foreach ($data['items'] as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();
        }

        return $response->withHeader('Location', '/orders')->withStatus(302);
    }

    public function index(Request $request, Response $response)
    {
        $orders = Order::where('user_id', $_SESSION['user']->id)->get();
        ob_start();
        require '../views/orders/index.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }
}
?>