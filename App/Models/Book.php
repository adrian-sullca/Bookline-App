<?php
namespace App\Models;

use App\Models\Orm;

class Book extends Orm{
    private $id;
    private $isbn;
    private $coverPhoto;
    private $title;
    private $autor;
    private $category;
    private $synopsis;
    private $price;

    public function __construct()
    {
        parent::__construct('books');
        if (!isset($_SESSION['books'])) {
            $_SESSION['books'] = 1;
        }
    }

    public function getBookById($bookId) {
        foreach ($_SESSION['books'] as $book) {
            if ($book['id'] == $bookId) {
                return $book;
            }
        }
        return null;
    }
}