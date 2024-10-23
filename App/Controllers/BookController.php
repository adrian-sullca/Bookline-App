<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Book;

class BookController extends Controller
{
    public function index($values = null)
    {
        $params['title'] = 'Catalog';
        $this->render('book/catalog', $params, 'main');
    }

    public function catalog() {
        $params['title'] = 'Catalog';
        $this->render('book/catalog', $params, 'main');
    }

    public function details($bookId)
    {
        $bookModel = new Book();
        $book = $bookModel->getBookById($bookId);
        $params['title'] = 'Book Details';
        $params['book'] = $book;
        $this->render('book/details', $params, 'main');
    }
}
