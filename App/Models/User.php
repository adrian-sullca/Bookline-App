<?php

namespace App\Models;

use App\Models\Orm;

class User extends Orm
{

    public function __construct()
    {
        parent::__construct('users');
        if (!isset($_SESSION['id_user'])) {
            $_SESSION['id_user'] = 1;
        }
    }

    public function generaToken()
    {
        $caracters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = substr(str_shuffle($caracters), 0, 12);
        return $token;
    }

    public function getUserByUsername($username)
    {
        foreach ($_SESSION[$this->model] as $user) {
            if ($user['username'] == $username) {
                return $user;
            }
        }
        return null;
    }

    public function credentialsOk($username, $password)
    {
        foreach ($_SESSION[$this->model] as $user) {
            if ($user['username'] == $username && $user['password'] == $password && $user['verified'] == true) {
                return $user;
            }
        }
        return null;
    }

    public function getIdAvailable()
    {
        $ids = array_column($_SESSION['users'], 'id');
        return end($ids) + 1;
    }

    public function getUserByEmail($email)
    {
        foreach ($_SESSION['users'] as $user) {
            if ($user['email'] === $email) {
                return $user;
            }
        }
        return null;
    }

    public function isFieldAvailable($field, $value)
    {
        foreach ($_SESSION['users'] as $user) {
            if (isset($user[$field]) && $user[$field] == $value && $user['verified'] == true) {
                return false;
            }
        }
        return true;
    }

    public function matchingPasswords($password, $verifyPassword)
    {
        return $password === $verifyPassword;
    }
}
