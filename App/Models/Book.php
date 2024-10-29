<?php

namespace App\Models;

use App\Models\Orm;

class Book extends Orm
{
    private $id;
    private $isbn;
    private $coverPhoto;
    private $title;
    private $author;
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

    public function getBookById($bookId)
    {
        foreach ($_SESSION['books'] as $book) {
            if ($book['id'] == $bookId) {
                return $book;
            }
        }
        return null;
    }

    public function isFieldAvailable($field, $value)
    {
        foreach ($_SESSION['books'] as $book) {
            if (isset($book[$field]) && $book[$field] == $value && $book['enabled'] == true) {
                return false;
            }
        }
        return true;
    }

    public function getAllBooksEnabled()
    {
        $booksEnabled = [];
        foreach ($_SESSION['books'] as $book) {
            if ($book['enabled'] == true) {
                array_push($booksEnabled, $book);
            }
        }
        return $booksEnabled;
    }

    public function searchBooks($query)
    {
        $booksByQuery = [];
        $query = trim($query);

        if (!empty($query)) {
            foreach ($_SESSION['books'] as $book) {
                // Verifica si el título contiene la consulta, ignorando mayúsculas y minúsculas
                if (stripos($book['title'], $query) !== false && $book['enabled'] == true) {
                    // Si se encuentra una coincidencia, agrega el libro al array
                    $booksByQuery[] = $book;
                }
            }
        }
        return $booksByQuery;
    }


    public function filterBooksByCategories($categories)
    {
        $filteredBooks = [];
        foreach ($_SESSION['books'] as $book) {
            if (in_array($book['category'], $categories) && $book['enabled'] == true) {
                $filteredBooks[] = $book;
            }
        }
        return $filteredBooks;
    }
}
