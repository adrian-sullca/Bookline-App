<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Book;
use App\Models\User;

class CartController extends Controller
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

    public function shopingCart()
    {
        if (!isset($_SESSION['userLogged'])) {
            header('Location: /user/login');
            exit();
        }

        if (isset($_SESSION['message'])) {
            $params['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        $params['title'] = 'My cart';
        $params['userLogged'] = $_SESSION['userLogged'];

        $cartModel = new Cart();
        $items = $cartModel->getItemsByCart($_SESSION['userLogged']['cartId']);
        $params['userCartItems'] = $items;
        $this->render('cart/shopingCart', $params, 'main');
    }

    public function addToCart($bookId)
    {
        if (!isset($_SESSION['userLogged'])) {
            header('Location: /user/login');
            exit();
        }
        $userModel = new User();
        $userLogged = $userModel->getById($_SESSION['userLogged']['id']);
        $cartItemModel = new CartItem();

        if ($cartItemModel->addItemToUserCart($bookId, $userLogged)) {
            header('Location: /cart/shopingCart');
            exit();
        }
    }

    public function clean($cartId)
    {
        if (!isset($_SESSION['userLogged'])) {
            header('Location: /user/login');
            exit();
        }

        if ($cartId == $_SESSION['userLogged']['cartId']) {
            $cartModel = new Cart();
            $cartModel->cleanCart($cartId);
            $_SESSION['message'] = 'Cart cleaned successfully!';
            header('Location: /cart/shopingCart');
            exit();
        } else {
            $_SESSION['message'] = 'Error cleaning cart.';
            header('Location: /cart/shopingCart');
            exit();
        }
    }

    public function buy($cartId) {}
}
