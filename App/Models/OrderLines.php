<?php
namespace App\Models;

use App\Models\Orm;

class OrderLines extends Orm {

    public function __construct()
    {
        parent::__construct('orderLines');
        if (!isset($_SESSION['orderLines'])) {
            $_SESSION['orderLines'] = [];
        }
    }

    public function getOrderLinesByOrderId($orderId) {
        $orderLines = array_filter($_SESSION['orderLines'], function($orderline) use ($orderId) {
            return $orderline['orderId'] == $orderId;
        });

        return $orderLines;
    }
}