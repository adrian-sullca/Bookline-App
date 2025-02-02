<?php

namespace App\Models;

use App\Models\Orm;

class CartItem extends Orm
{
    public function __construct()
    {
        parent::__construct('cartItems');
        if (!isset($_SESSION['cartItems'])) {
            $_SESSION['cartItems'] = [];
        }
    }

    public function getIdAvailable()
    {
        $ids = array_column($_SESSION['cartItems'], 'id');
        return end($ids) + 1;
    }

    public function addItemToUserCart($bookId, $user)
    {
        $cartModel = new Cart();
        $cartUser = $cartModel->getCartByUser($user);
        $bookModel = new Book();
        $book = $bookModel->getBookById($bookId);
        if ($book) {
            foreach ($_SESSION['cartItems'] as &$item) {
                if ($item['cartId'] == $cartUser['id'] && $item['bookId'] == $bookId) {
                    $item['quantity'] += 1;
                    return true;
                }
            }
            $newId = $this->getIdAvailable();
            $cartItem = [
                "id" => $newId,
                "cartId" => $cartUser['id'],
                "bookId" => $book['id'],
                "quantity" => 1,
            ];
            array_push($_SESSION['cartItems'], $cartItem);
            return true;
        } else {
            return false;
        }
    }

    public function addAnItem($itemId, $user)
    {
        $cartModel = new Cart();
        $cartUser = $cartModel->getCartByUser($user);

        foreach ($_SESSION['cartItems'] as &$cartItem) {
            if ($cartItem['id'] == $itemId && $cartItem['cartId'] == $cartUser['id']) {
                $cartItem['quantity']++;
                return true;
            }
        }
        return false;
    }

    public function deleteAnItem($itemId, $user)
    {
        $cartModel = new Cart();
        $cartUser = $cartModel->getCartByUser($user);

        foreach ($_SESSION['cartItems'] as &$cartItem) {
            if ($cartItem['id'] == $itemId && $cartItem['cartId'] == $cartUser['id']) {
                $cartItem['quantity']--;
                if ($cartItem['quantity'] <= 0) {
                    $this->deleteItem($itemId, $user);
                }
                return true;
            }
        }
        return false;
    }

    public function deleteItem($itemId, $user)
    {
        $cartModel = new Cart();
        $cartUser = $cartModel->getCartByUser($user);

        $_SESSION['cartItems'] = array_filter($_SESSION['cartItems'], function ($item) use ($itemId, $cartUser) {
            return $item['id'] != $itemId || $item['cartId'] != $cartUser['id'];
        });
    }
}
