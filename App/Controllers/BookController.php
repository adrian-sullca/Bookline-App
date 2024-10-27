<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Book;
use App\Helpers\Validator;
use Google\Service\PeopleService\CoverPhoto;

class BookController extends Controller
{
    /* public function index($values = null)
    {
        $params['title'] = 'Catalog';
        $this->render('book/catalog', $params, 'main');
    } */
    public function index($values = null)
    {
        header('Location: /error/error404');
        exit();
    }

    public function catalog()
    {
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

    public function update($bookId)
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] !== 'admin') {
            $params['title'] = 'Login';
            header('Location: /auth/login');
            exit();
        }

        $bookModel = new Book();
        $book = $bookModel->getById($bookId);
        if (isset($_SESSION['errors'])) {
            $params['errors'] = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }

        if (isset($_SESSION['message'])) {
            $params['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }

        $params['title'] = 'Update book';
        $params['book'] = $book;
        $this->render('book/update', $params, 'main');
    }

    public function updateProcess($bookId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $bookModel = new Book();
            $book = $bookModel->getById($bookId);
            $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : null;
            $title = isset($_POST['title']) ? $_POST['title'] : null;
            $author = isset($_POST['author']) ? $_POST['author'] : null;
            $category = isset($_POST['category']) ? $_POST['category'] : null;
            $synopsis = isset($_POST['synopsis']) ? $_POST['synopsis'] : null;
            $price = isset($_POST['price']) ? $_POST['price'] : null;
            $enabled = isset($_POST['enabled']) && $_POST['enabled'] === '1';
            $coverPhoto = isset($_FILES['coverPhoto']) ? $_FILES['coverPhoto'] : null;
            if ($coverPhoto['error'] === UPLOAD_ERR_NO_FILE) {
                $coverPhoto = $book['coverPhoto'];
            }

            // Verificación de ISBN
            if ($isbn !== $book['isbn']) {
                if (!$bookModel->isFieldAvailable('isbn', $isbn)) {
                    $errors[] = 'ISBN already exists';
                }
            }
            $imagePath = '../../../Public/Assets/img/books/';
            if ($coverPhoto != $book['coverPhoto']) {
                if (!Validator::imageTypeOk($coverPhoto)) {
                    $errors[] = 'Image format not supported';
                } else {
                    $filename = $coverPhoto['name'];
                    $coverPhoto = $imagePath . $filename;
                }
            }

            if (empty($errors)) {
                $updatedBook = [
                    "id" => $book['id'],
                    "isbn" => $isbn ?: $book['isbn'],
                    "coverPhoto" => $coverPhoto,
                    "title" => $title ?: $book['title'],
                    "author" => $author ?: $book['author'],
                    "category" => $category ?: $book['category'],
                    "synopsis" => $synopsis ?: $book['synopsis'],
                    "price" => $price ?: $book['price'],
                    "enabled" => $enabled,
                ];

                $bookModel->updateItemById($updatedBook);
                $_SESSION['message'] = 'Book data successfully updated';
            } else {
                $_SESSION['errors'] = $errors;
            }

            $this->update($bookId);
        }
    }
}
