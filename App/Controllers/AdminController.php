<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Book;
use App\Models\Order;

class AdminController extends Controller
{
    /* public function index($values = null)
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] !== 'admin') {
            header('Location: /auth/login');
            exit();
        } else {
            $this->bookManagement();
        }
    } */
    public function index($values = null)
    {
        header('Location: /error/error404');
        exit();
    }
    
    public function orderManagement()
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] != 'admin') {
            header('Location: /auth/login');
            exit();
        } else {
            $orderModel = new Order();
            $allOrders = $orderModel->getAll();
            $params['title'] = 'Orders management';
            $params['allOrders'] = $allOrders;
            $this->render('admin/orderManagement', $params, 'main');
        }
    }

    public function bookManagement()
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] != 'admin') {
            header('Location: /auth/login');
            exit();
        } else {
            $bookModel = new Book();
            $allBooks = $bookModel->getAll();
            $params['title'] = 'Books management';
            $params['allBooks'] = $allBooks;
            $this->render('admin/bookManagement', $params, 'main');
        }
    }
}
