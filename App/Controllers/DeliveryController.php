<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Book;
use App\Models\Order;

class DeliveryController extends Controller
{
    /* public function index($values = null)
    { {
            if (!isset($_SESSION['user'])) {
                $params['title'] = 'Login';
                $this->render('user/login', $params, 'main');
            } else {
                $params['title'] = 'Register';
                $this->render('order/orders', $params, 'main');
            }
        }
    }
 */

    public function index($values = null)
    {
        $params['title'] = 'Error';
        $this->render('error/error404', $params, 'error');
    }

    public function orders()
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] !== 'delivery_person') {
            $params['title'] = 'Login';
            header('Location: /auth/login');
            exit();
        }

        $orderModel = new Order();
        $allOrders = $orderModel->getAllOrdersFilter();
        $params['title'] = 'Orders management';
        $params['allOrdersFilter'] = $allOrders;
        $this->render('delivery/orders', $params, 'main');
    }

    public function updateOrderState($orderId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                $oderModel = new Order();
                switch ($_POST['action']) {
                    case 'start_delivery':
                        $oderModel->changeOrderState($orderId, 'In Transit');
                        break;

                    case 'order_delivered':
                        $oderModel->changeOrderState($orderId, 'Delivered to the Customer');
                        break;
                }
            }
        }
        header('Location: /delivery/orders');
        exit();
    }
}
