<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CartItem;

class CartItemController extends Controller
{
    /* public function index($values = null)
    {
        if (!isset($_SESSION['userLogged'])) {
            $params['title'] = 'Login';
            header('Location: /auth/login');
            exit();
        } else {
            $params['title'] = 'My cart';
            $params['userLogged'] = $_SESSION['userLogged'];
            $this->render('cart/shoppingCart', $params, 'main');
        }
    } */

    public function index($values = null)
    {
        header('Location: /error/error404');
        exit();
    }

    public function addAnItem($itemId)
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] == 'delivery_person' || $_SESSION['userLogged']['rol'] == 'admin') {
            header('Location: /auth/login');
            exit();
        }

        $cartItemModel = new CartItem();

        if ($cartItemModel->addAnItem($itemId, $_SESSION['userLogged'])) {
            header('Location: /cart/shoppingCart');
            exit();
        } else {
            header('Location: /cart/addToCart/' . $itemId);
            exit();
        }
    }

    public function deleteAnItem($itemId)
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] == 'delivery_person' || $_SESSION['userLogged']['rol'] == 'admin') {
            header('Location: /auth/login');
            exit();
        }

        $cartItemModel = new CartItem();

        $cartItemModel->deleteAnItem($itemId, $_SESSION['userLogged']);
        header('Location: /cart/shoppingCart');
        exit();
    }

    public function deleteItem($itemId)
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] == 'delivery_person' || $_SESSION['userLogged']['rol'] == 'admin') {
            header('Location: /auth/login');
            exit();
        }

        $cartItemModel = new CartItem();
        $cartItemModel->deleteItem($itemId, $_SESSION['userLogged']);
        header('Location: /cart/shoppingCart');
        exit();
    }
}
