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
}
