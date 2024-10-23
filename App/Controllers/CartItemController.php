<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Book;
use App\Models\User;

class CartItemController extends Controller
{
    public function index($values = null)
    { {
            if (!isset($_SESSION['userLogged'])) {
                $params['title'] = 'Login';
                header('Location: /user/login');
                exit();
            } else {
                $params['title'] = 'My cart';
                $params['userLogged'] = $_SESSION['userLogged'];
                $this->render('cart/shopingCart', $params, 'main');
            }
        }
    }

    public function addAnItem($itemId)
    {
        $cartItemModel = new CartItem();
        if ($cartItemModel->addAnItem($itemId)) {
            header('Location: /cart/shopingCart');
            exit();
        }
    }

    public function deleteAnItem($itemId)
    {
        $cartItemModel = new CartItem();
        if ($cartItemModel->deleteAnItem($itemId)) {
            header('Location: /cart/shopingCart');
            exit();
        }
    }

    public function deleteItem($itemId)
    {
        $cartItemModel = new CartItem();
        $cartItemModel->deleteItem($itemId);
        header('Location: /cart/shopingCart');
        exit();
    }
}
