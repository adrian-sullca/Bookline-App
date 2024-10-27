<?php

namespace App\Models;

use App\Models\Orm;

class Order extends Orm
{

    public function __construct()
    {
        parent::__construct('orders');
        if (!isset($_SESSION['orders'])) {
            $_SESSION['orders'] = [];
        }
    }

    public function getIdAvailable()
    {
        $ids = array_column($_SESSION['orders'], 'id');
        return end($ids) + 1;
    }

    public function getAllOrdersByUserId($userId)
    {
        $orders = array_filter($_SESSION['orders'], function ($order) use ($userId) {
            return $order['userId'] == $userId;
        });
        return $orders;
    }

    public function cancelOrder($order)
    {
        foreach ($_SESSION['orders'] as &$orderArray) {
            if ($orderArray['id'] == $order['id']) {
                $orderArray['state'] = 'Canceled';
                return true;
            }
        }
        return false;
    }

    public function validateOrder($order)
    {
        foreach ($_SESSION['orders'] as &$orderArray) {
            if ($orderArray['id'] == $order['id']) {
                $orderArray['state'] = 'Validated';
                return true;
            }
        }
        return false;
    }

    public function getAllOrdersFilter()
    {
        $allOrdersNotPending = [];
        foreach ($_SESSION['orders'] as $order) {
            if ($order['state'] !== 'Pending' && $order['state'] !== 'Canceled' && $order['state'] !== 'Confirmed by Customer') {
                array_push($allOrdersNotPending, $order);
            }
        }
        return $allOrdersNotPending;
    }

    public function changeOrderState($orderId, $newState)
    {
        foreach ($_SESSION['orders'] as &$order) {
            if ($order['id'] == $orderId) {
                $order['state'] = $newState;
                return true;
            }
        }
        return false;
    }
}
