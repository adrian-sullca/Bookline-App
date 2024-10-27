<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Models\Cart;
use App\Helpers\Validator;

class UserController extends Controller
{
    public function index($values = null)
    {
        header('Location: /error/error404');
        exit();
    }

    public function logout()
    {
        if (isset($_SESSION['userLogged'])) {
            unset($_SESSION['userLogged']);
        }
        header('Location: /auth/login');
        exit();
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $userLogged = $_SESSION['userLogged'];
            $username = isset($_POST['username']) ? $_POST['username'] : null;
            $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : null;
            $address = isset($_POST['address']) ? $_POST['address'] : null;
            $phoneNumber = isset($_POST['number']) ? $_POST['number'] : null;
            $imgProfile = isset($_FILES['img']) ? $_FILES['img'] : null;

            $userModel = new User();

            if ($username != null) {
                if ($username !== $userLogged['username']) {
                    if (!$userModel->isFieldAvailable('username', $username)) {
                        $errors[] = 'Username already exists';
                    }
                }
            }

            if ($newPassword != null) {
                if ($newPassword !== $userLogged['password']) {
                    if (!Validator::passwordRegexOk($newPassword)) {
                        $errors[] = 'Password does not meet complexity requirements';
                    }
                }
            }

            if ($phoneNumber != null) {
                if ($phoneNumber && $phoneNumber !== $userLogged['phoneNumber']) {
                    if (!$userModel->isFieldAvailable('phoneNumber', $phoneNumber)) {
                        $errors[] = 'Phone number already registered';
                    }
                }
            }

            $imagePath = __DIR__ . '/../../Public/Assets/img/';
            $filename = $userLogged['imgProfile'];  // Imagen de perfil actual
            $oldProfileImage = $filename;  // Guarda la imagen anterior para luego eliminarla

            if ($imgProfile && $imgProfile['error'] === UPLOAD_ERR_OK) {
                if (!Validator::imageTypeOk($imgProfile)) {
                    $errors[] = 'Image format not supported';
                } else {
                    // Nueva imagen, procesa el cambio
                    $type = $imgProfile['type'];
                    $extension = explode('/', $type);
                    $filename = $username . '.' . $extension[1];
                    $uploadPath = $imagePath . $filename;

                    if (!move_uploaded_file($imgProfile['tmp_name'], $uploadPath)) {
                        $errors[] = 'Failed to upload profile image';
                    } else {
                        // Eliminar la imagen antigua si no es la imagen por defecto
                        if ($oldProfileImage !== 'default_img_profile.webp') {
                            $oldImagePath = $imagePath . $oldProfileImage;
                            if (file_exists($oldImagePath)) {
                                unlink($oldImagePath);  // Elimina la imagen antigua
                            }
                        }
                    }
                }
            }

            if (empty($errors)) {

                if ($userLogged['rol'] == 'admin') {
                }

                if ($userLogged['rol'] == 'client') {
                    $updatedUser = [
                        'id' => $userLogged['id'],
                        'username' => $username ?: $userLogged['username'],
                        'email' => $userLogged['email'],
                        'password' => $newPassword ?: $userLogged['password'],
                        'address' => $address ?: $userLogged['address'],
                        'phoneNumber' => $phoneNumber ?: $userLogged['phoneNumber'],
                        'cartId' =>  $userLogged['cartId'],
                        'token' =>  $userLogged['token'],
                        'verified' => $userLogged['verified'],
                        'rol' => $userLogged['rol'],
                        'imgProfile' => $filename
                    ];
                }

                $userModel->updateItemById($updatedUser);
                $_SESSION['userLogged'] = $updatedUser;
                $_SESSION['message'] = 'Profile data already updated';
                header("Location: /user/profile");
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: /user/profile");
                exit();
            }
        }
    }

    public function prueba()
    {
        $params['title'] = 'prueba';
        $user = $_SESSION['userLogged'];
        $carritoModel = new Cart();
        $carrito = $carritoModel->getCartByUser($user);
        $params['carritoDeUsuario'] = $carrito;
        $this->render('user/prueba', $params, 'main');
    }

    public function profile()
    {
        if ($_SESSION['userLogged']['rol'] != 'client') {
            header('Location: /auth/login');
            exit();
        } else {
            $params['title'] = 'My profile';
            $params['cardTitle'] = 'Client Profile';
            $this->render('user/profile', $params, 'profile');
        }
    }

    public function accountSettings()
    {
        $params['title'] = 'Account settings';
        $params['cardTitle'] = 'Account configuration';
        $this->render('user/accountSettings', $params, 'profile');
    }
    public function passwordSettings()
    {
        $params['title'] = 'Password settings';
        $params['cardTitle'] = 'Security configuration';
        $this->render('user/passwordSettings', $params, 'profile');
    }

    public function addressSettings()
    {
        $params['title'] = 'Password setting';
        $params['cardTitle'] = 'Address configuration';
        $this->render('user/addressSettings', $params, 'profile');
    }
}
