<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CartItem;

class CartItemController extends Controller
{
    public function index($values = null)
    { {
            if (!isset($_SESSION['userLogged'])) {
                $params['title'] = 'Login';
                header('Location: /auth/login');
                exit();
            } else {
                $params['title'] = 'My cart';
                $params['userLogged'] = $_SESSION['userLogged'];
                $this->render('cart/shoppingCart', $params, 'main');
            }
        }
    }

    public function addAnItem($itemId)
    {
        $cartItemModel = new CartItem();
        if ($cartItemModel->addAnItem($itemId)) {
            header('Location: /cart/shoppingCart');
            exit();
        }
    }

    public function deleteAnItem($itemId)
    {
        $cartItemModel = new CartItem();
        if ($cartItemModel->deleteAnItem($itemId)) {
            header('Location: /cart/shoppingCart');
            exit();
        }
    }

    public function deleteItem($itemId)
    {
        $cartItemModel = new CartItem();
        $cartItemModel->deleteItem($itemId);
        header('Location: /cart/shoppingCart');
        exit();
    }
}
