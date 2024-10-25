<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Book;


class AdminController extends Controller
{
    public function index($values = null)
    { {
            if (!isset($_SESSION['userLogged'])) {
                $params['title'] = 'Login';
                $this->render('user/login', $params, 'main');
            } else {
                $params['title'] = 'Book management';
                $this->render('admin/bookManagement', $params, 'main');
            }
        }
    }

    public function userManagement() {}

    public function bookManagement() {
        $bookModel = new Book();
        $allBooks = $bookModel->getAll();
        $params['title'] = 'Book management';
        $params['allBooks'] = $allBooks;
        $this->render('admin/bookManagement', $params, 'main');
    }
}
