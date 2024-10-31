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
        $params['title'] = 'Error';
        $this->render('error/error404', $params, 'error');
    }

    public function logout()
    {
        if (isset($_SESSION['userLogged'])) {
            unset($_SESSION['userLogged']);
        }
        header('Location: /auth/login');
        exit();
    }

    public function updateAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = isset($_POST['username']) && $_POST['username'] !== '' ? $_POST['username'] : $_SESSION['userLogged']['username'];
            $phoneNumber = isset($_POST['phoneNumber']) && $_POST['phoneNumber'] !== '' ? $_POST['phoneNumber'] : $_SESSION['userLogged']['phoneNumber'];
            $errors = [];
            $userModel = new User();
            if ($username !== $_SESSION['userLogged']['username']) {
                if (!$userModel->isFieldAvailable('username', $username)) {
                    $errors[] = 'Username already exists';
                }
            }
            if ($phoneNumber !== $_SESSION['userLogged']['phoneNumber']) {
                if (!$userModel->isFieldAvailable('phoneNumber', $phoneNumber)) {
                    $errors[] = 'Phone number already exists';
                }
            }

            $imagePath = __DIR__ . '/../../Public/Assets/img/';
            $imgProfile = $_FILES['imgProfile'] ?? null;
            $filename = $_SESSION['userLogged']['imgProfile']; 
            $oldProfileImage = $filename;  // Imagen anterior para luego eliminarla

            if (empty($errors)) {
                $_SESSION['userLogged']['username'] = $username;
                $_SESSION['userLogged']['phoneNumber'] = $phoneNumber;

                // Manejo de la carga de la nueva imagen
                if ($imgProfile && $imgProfile['error'] === UPLOAD_ERR_OK) {
                    if (!Validator::imageTypeOk($imgProfile)) {
                        $errors[] = 'Image format not supported';
                    } else {
                        $type = $imgProfile['type'];
                        $extension = explode('/', $type)[1];
                        $filename = $username . '.' . $extension; // Nombre del archivo nuevo
                        $uploadPath = $imagePath . $filename;

                        if (!move_uploaded_file($imgProfile['tmp_name'], $uploadPath)) {
                            $errors[] = 'Failed to upload profile image';
                        } else {
                            // Elimina la imagen antigua si no es la imagen por defecto
                            if ($oldProfileImage !== 'default_img_profile.webp') {
                                $oldImagePath = $imagePath . $oldProfileImage;
                                if (file_exists($oldImagePath)) {
                                    unlink($oldImagePath);  // Elimina la imagen antigua
                                }
                            }
                            $_SESSION['userLogged']['imgProfile'] = $filename;
                        }
                    }
                }
                $userModel->updateItemById($_SESSION['userLogged']);
                $_SESSION['message'] = 'Profile data updated successfully';
            } else {
                $_SESSION['error'] = implode(', ', $errors);
            }
            $this->accountSettings();
        }
    }


    public function updateAddress()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $address = isset($_POST['address']) && $_POST['address'] !== '' ? $_POST['address'] : null;
            $userModel = new User();
            if ($address) {
                $_SESSION['userLogged']['address'] = $address;
                $userModel->updateItemById($_SESSION['userLogged']);
                $_SESSION['message'] = 'Profile data updated successfully';
            } else {
                $_SESSION['error'] = 'Por favor, rellena el campo de dirección';
            }
            $this->addressSettings();
        }
    }


    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentPassword = isset($_POST['currentPassword']) ? $_POST['currentPassword'] : '';
            $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';
            $verifyNewPassword = isset($_POST['verifyNewPassword']) ? $_POST['verifyNewPassword'] : '';
            $errors = [];
            $userModel = new User();
            if (!$userModel->verifyPassword($_SESSION['userLogged']['id'], $currentPassword)) {
                $errors[] = 'La contraseña actual es incorrecta';
            }
            if ($newPassword === $currentPassword) {
                $errors[] = 'La nueva contraseña no puede ser igual a la actual';
            }
            if (!$userModel->matchingPasswords($newPassword, $verifyNewPassword)) {
                $errors[] = 'Las nuevas contraseñas no coinciden';
            }
            if (!empty($newPassword) && !Validator::passwordRegexOk($newPassword)) {
                $errors[] = 'La nueva contraseña no cumple con los requisitos de complejidad';
            }

            if (empty($errors)) {
                $_SESSION['userLogged']['password'] = $newPassword;
                $_SESSION['message'] = 'Contraseña actualizada correctamente';
            } else {
                $_SESSION['error'] = $errors;
            }
            $this->passwordSettings();
        }
    }

    public function profile()
    {
        if (!isset($_SESSION['userLogged']) || $_SESSION['userLogged']['rol'] != 'client') {
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
        if (isset($_SESSION['message'])) {
            $params['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        if (isset($_SESSION['error'])) {
            $params['error'] = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        $this->render('user/accountSettings', $params, 'profile');
    }


    public function passwordSettings()
    {
        $params['title'] = 'Password settings';
        $params['cardTitle'] = 'Security configuration';
        if (isset($_SESSION['message'])) {
            $params['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        if (isset($_SESSION['error'])) {
            $params['error'] = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        $this->render('user/passwordSettings', $params, 'profile');
    }

    public function addressSettings()
    {
        $params['title'] = 'Password setting';
        $params['cardTitle'] = 'Address configuration';
        if (isset($_SESSION['message'])) {
            $params['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        if (isset($_SESSION['error'])) {
            $params['error'] = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        $this->render('user/addressSettings', $params, 'profile');
    }
}
