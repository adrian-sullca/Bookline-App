<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Order;
use App\Models\OrderLines;

class OrderController extends Controller
{
    /* public function index($values = null)
    { {
            if (!isset($_SESSION['userLogged'])) {
                $params['title'] = 'Login';
                header('Location: /auth/login');
                exit();
            } else {
                $params['title'] = 'My orders';
                $this->render('order/orders', $params, 'main');
            }
        }
    } */

    public function index($values = null)
    {
        $params['title'] = 'Error';
        $this->render('error/error404', $params, 'error');
    }

    public function orders()
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] == 'delivery_person' || $_SESSION['userLogged']['rol'] == 'admin') {
            $params['title'] = 'Login';
            header('Location: /auth/login');
            exit();
        }

        $orderModel = new Order();
        $userOrders = $orderModel->getAllOrdersByUserId($_SESSION['userLogged']['id']);
        $params['title'] = 'My orders';
        $params['userOrders'] = $userOrders;
        $params['userLogged'] = $_SESSION['userLogged'];
        $this->render('order/orders', $params, 'main');
    }

    public function details($orderId, $message = null)
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] == 'delivery_person') {
            $params['title'] = 'Login';
            header('Location: /auth/login');
            exit();
        }
        $orderModel = new Order();
        if ($_SESSION['userLogged']['rol'] == 'client' || $_SESSION['userLogged']['rol'] == 'delivery_person') {
            $userId = $_SESSION['userLogged']['id'];
            $userOrders = $orderModel->getAllOrdersByUserId($userId);
            $orderIds = array_map(function ($order) {
                return $order['id'];
            }, $userOrders);
            if (!in_array($orderId, $orderIds)) {
                header('Location: /error/error404');
                exit();
            }
        }

        $orderLinesModel = new OrderLines();
        $order = $orderModel->getById($orderId);
        $orderLines = $orderLinesModel->getOrderLinesByOrderId($orderId);
        $params['title'] = 'Order details';
        $params['order'] = $order;
        $params['orderLinesByOrder'] = $orderLines;
        $params['userLogged'] = $_SESSION['userLogged'];
        if ($message != null) {
            $params['message'] = $message;
        }
        $this->render('order/details', $params, 'main');
    }

    public function cancel($orderId)
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] == 'delivery_person') {
            $params['title'] = 'Login';
            header('Location: /auth/login');
            exit();
        }
        $orderModel = new Order();
        $order = $orderModel->getById($orderId);
        $message = 'Order successfully cancelled';
        if (!$orderModel->cancelOrder($order)) {
            $message = 'Error when canceling order';
        }
        $this->details($orderId, $message);
    }

    public function validate($orderId)
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] == 'delivery_person') {
            $params['title'] = 'Login';
            header('Location: /auth/login');
            exit();
        }
        $orderModel = new Order();
        $order = $orderModel->getById($orderId);
        $message = 'Order successfully validated';
        if (!$orderModel->validateOrder($order)) {
            $message = 'Error when validated order';
        }
        $this->details($orderId, $message);
    }
}
