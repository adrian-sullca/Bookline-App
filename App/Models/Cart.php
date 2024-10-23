<?php

namespace App\Models;

use App\Models\Orm;

class Cart extends Orm
{
    private $id;
    private $userId;
    private $items;

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
            "items" => "array de libros"
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

    /* public function getItemsByCart($cartId)
    {
        $items = [];
        foreach ($_SESSION['cartItems'] as $item) {
            if ($item['cartId'] == $cartId) {
                if (isset($items[$item['bookId']])) {
                    $items[$item['bookId']]['quantity'] += $item['quantity'];
                } else {
                    $items[$item['bookId']] = $item;
                }
            }
        }
        return $items;
    } */

    public function getItemsByCart($cartId)
    {
        $items = [];
        foreach ($_SESSION['cartItems'] as $item) {
            if ($item['cartId'] == $cartId) {
                $items[] = $item; // Cambiado a añadir cada ítem directamente
            }
        }
        return $items; // Retorna todos los ítems del carrito
    }


    public function cleanCart($cartId)
    {
        // Filtra los ítems del carrito, manteniendo solo aquellos que no pertenecen al carrito que se quiere limpiar
        $_SESSION['cartItems'] = array_filter($_SESSION['cartItems'], function ($item) use ($cartId) {
            return $item['cartId'] !== $cartId;
        });

        // Reindexar el array para que los índices sean continuos (opcional)
        $_SESSION['cartItems'] = array_values($_SESSION['cartItems']);
    }
}
