<?php

namespace App\Models;

use App\Models\Orm;

class Cart extends Orm
{
    public function __construct()
    {
        parent::__construct('carts');
        if (!isset($_SESSION['carts'])) {
            $_SESSION['carts'] = [];
        }
    }

    public function createCartForUser($idUser)
    {
        $idAvailableCart = $this->getIdAvailable();
        $newCart = [
            "id" => $idAvailableCart,
            "userId" => $idUser,
        ];
        $this->create($newCart);
        return $newCart['id'];
    }

    public function getIdAvailable()
    {
        $ids = array_column($_SESSION['carts'], 'id');
        return end($ids) + 1;
    }

    public function getCartByUser($user)
    {
        foreach ($_SESSION['carts'] as $cart) {
            if ($cart['id'] == $user['cartId']) {
                return $cart;
            }
        }
        return null;
    }

    public function getItemsByCart($cartId)
    {
        $items = [];
        foreach ($_SESSION['cartItems'] as $item) {
            if ($item['cartId'] == $cartId) {
                $items[] = $item;
            }
        }
        return $items;
    }


    public function cleanCart($cartId)
    {
        $updatedCartItems = [];
        foreach ($_SESSION['cartItems'] as $item) {
            if ($item['cartId'] != $cartId) {
                array_push($updatedCartItems, $item);
            }
        }
        $_SESSION['cartItems'] = $updatedCartItems;
    }
}
