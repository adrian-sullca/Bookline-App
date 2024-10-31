<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use App\Helpers\Mailer;

class CartController extends Controller
{
    /* public function index($values = null)
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
    } */

    public function index($values = null)
    {
        $params['title'] = 'Error';
        $this->render('error/error404', $params, 'error');
    }

    public function shoppingCart()
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] !== 'client') {
            header('Location: /auth/login');
            exit();
        }

        if (isset($_SESSION['error'])) {
            $params['error'] = $_SESSION['error'];
            unset($_SESSION['error']);
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
        $this->render('cart/shoppingCart', $params, 'main');
    }

    public function addToCart($bookId)
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] !== 'client') {
            header('Location: /auth/login');
            exit();
        }
        $userModel = new User();
        $userLogged = $userModel->getById($_SESSION['userLogged']['id']);
        $cartItemModel = new CartItem();

        /* $cartReturn = $cartItemModel->addItemToUserCart($bookId, $userLogged);
        print_r($_SESSION['carts']); */
        if ($cartItemModel->addItemToUserCart($bookId, $userLogged)) {
            header('Location: /cart/shoppingCart');
            exit();
        }
    }

    public function clean($cartId)
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] !== 'client') {
            header('Location: /auth/login');
            exit();
        }

        if ($cartId == $_SESSION['userLogged']['cartId']) {
            $cartModel = new Cart();
            $cartModel->cleanCart($cartId);
            $_SESSION['message'] = 'Cart cleaned successfully!';
            header('Location: /cart/shoppingCart');
            exit();
        } else {
            $_SESSION['message'] = 'Error cleaning cart.';
            header('Location: /cart/shoppingCart');
            exit();
        }
    }

    public function buy()
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] !== 'client') {
            header('Location: /auth/login');
            exit();
        }

        $cartModel = new Cart();
        $items = $cartModel->getItemsByCart($_SESSION['userLogged']['cartId']);

        if (!empty($items)) {
            $orderModel = new Order();
            $newOrder = [
                "id" => $orderModel->getIdAvailable(),
                "userId" => $_SESSION['userLogged']['id'],
                "state" => 'Pending',
                "orderDate" => date("Y-m-d H:i:s")
            ];
            array_push($_SESSION['orders'], $newOrder);

            $bookModel = new Book();
            $newOrderLines = [];
            foreach ($items as $item) {
                $newOrderLine = [
                    "id" => $orderModel->getIdAvailable(),
                    "orderId" => $newOrder['id'],
                    "itemId" => $item['bookId'],
                    "price" => $bookModel->getBookById($item['bookId'])['price'],
                    "quantity" => $item['quantity'],
                ];
                array_push($newOrderLines, $newOrderLine);
            }

            foreach ($newOrderLines as $line) {
                array_push($_SESSION['orderLines'], $line);
            }

            $cartModel->cleanCart($_SESSION['userLogged']['cartId']);
            $_SESSION['message'] = 'Order placed successfully. Check your orders';
            $mailer = new Mailer();
            $mailer->mailServerSetup();
            $mailer->addRec($_SESSION['userLogged']);
            $mailer->addOrderEmailContent($_SESSION['userLogged'], $newOrder, $newOrderLines);
            $mailer->send();
            $_SESSION['message'] = 'Processed order. Check your order in the section "My orders" or by email.';
            header('Location: /cart/shoppingCart');
            exit();
        } else {
            $_SESSION['error'] = 'The order cannot be processed. Your shopping cart is empty';
            header('Location: /cart/shoppingCart');
            exit();
        }
    }
}
