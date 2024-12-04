<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\User;

class UserController
{
    public function registerForm(Request $request, Response $response)
    {
        ob_start();
        require '../views/auth/register.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function register(Request $request, Response $response)
    {
        $data = $request->getParsedBody();

        $user = new User();
        $user->id = $data['id'];
        $user->first_name = $data['nume'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_BCRYPT);
        $user->save();

        $response->getBody()->write("User registered successfully.");
        return $response;
    }

    public function loginForm(Request $request, Response $response)
    {
        ob_start();
        require '../views/auth/login.view.php';
        $html = ob_get_clean();
        $response->getBody()->write($html);
        return $response;
    }

    public function login(Request $request, Response $response)
    {
        $data = $request->getParsedBody();
        $user = User::where('email', $data['email'])->first();
        
        if ($user && password_verify($data['password'], $user->password)) {
            $_SESSION['user'] = $user;
            return $response->withHeader('Location', '/')->withStatus(302);
        } else {
            return $response->withHeader('Location', '/login')->withStatus(302);
        }
    }

    public function logout(Request $request, Response $response)
    {
        session_destroy();
        return $response->withHeader('Location', '/')->withStatus(302);
    }
}
?>