<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Order;
use App\Models\OrderLines;

class OrderController extends Controller
{
    public function index($values = null)
    { {
            if (!isset($_SESSION['userLogged'])) {
                $params['title'] = 'Login';
                header('Location: /user/login');
                exit();
            } else {
                $params['title'] = 'My orders';
                $this->render('order/orders', $params, 'main');
            }
        }
    }



    public function orders()
    {
        if (!isset($_SESSION['userLogged'])) {
            $params['title'] = 'Login';
            header('Location: /user/login');
            exit();
        }
        $orderModel = new Order();
        $userOrders = $orderModel->getAllOrdersByUserId($_SESSION['userLogged']['id']);
        $params['title'] = 'My orders';
        $params['userOrders'] = $userOrders;
        $params['userLogged'] = $_SESSION['userLogged'];
        $this->render('order/orders', $params, 'main');
    }

    public function details($orderId) {
        if (!isset($_SESSION['userLogged'])) {
            $params['title'] = 'Login';
            header('Location: /user/login');
            exit();
        }
        $orderModel = new Order();
        $orderLinesModel = new OrderLines();
        $order = $orderModel->getById($orderId);
        $orderLines = $orderLinesModel->getOrderLinesByOrderId($orderId);
        $params['order'] = $order;
        $params['orderLinesByOrder'] = $orderLines;
        $params['userLogged'] = $_SESSION['userLogged'];
        $this->render('order/details', $params, 'main');
    }
}
