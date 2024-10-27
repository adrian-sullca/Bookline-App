<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Models\Cart;
use App\Helpers\Mailer;
use App\Helpers\Validator;
use Google\Client;

class AuthController extends Controller
{
    /* public function index($values = null)
    {
        if (!isset($_SESSION['userLogged'])) {
            $params['title'] = 'Login';
            $this->render('auth/login', $params, 'main');
        } else {
            $params['title'] = 'Profile';
            header('Location: /user/profile');
            exit();
        }
    } */

    public function index($values = null)
    {
        header('Location: /error/error404');
        exit();
    }

    public function verified()
    {
        $params['title'] = 'Verified';
        $this->render('auth/verified', $params, 'main');
    }

    public function verify($username, $token)
    {
        if (is_null($username) || is_null($token)) {
            $_SESSION['error'] = "Error al verificar credenciales por correo";
            $this->index();
            return;
        }

        foreach ($_SESSION['users'] as &$user) {
            if ($user['username'] == $username && $user['token'] == $token) {
                $user['verified'] = true;
                $userModel = new User();
                $userModel->updateItemById($user);
                $params['title'] = "Usuario verificado";
                $this->render("auth/verified", $params, "main");
                return;
            }
        }

        $_SESSION['error'] = "Error al verificar credenciales por correo";
        header("Location: /auth/register");
        exit();
    }

    public function register()
    {
        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
            $params['errors'] = $errors;
        }
        $params['title'] = 'Register';
        $this->render('auth/register', $params, 'main');
    }

    public function registerProcess()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $username = isset($_POST['username']) ? $_POST['username'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;
            $verifyPassword = isset($_POST['verifyPassword']) ? $_POST['verifyPassword'] : null;
            $address = isset($_POST['address']) ? $_POST['address'] : null;
            $number = isset($_POST['number']) ? $_POST['number'] : null;
            $imgProfile = isset($_FILES['imgProfile']) ? $_FILES['imgProfile'] : null;

            $userModel = new User();

            if (!$username || !$email || !$password || !$verifyPassword || !$number || !$address) {
                $errors[] = 'All fields are required';
            }

            if (!$userModel->isFieldAvailable('username', $username)) {
                $errors[] = 'Username already exists';
            }

            if (!$userModel->isFieldAvailable('email', $email)) {
                $errors[] = 'Email already exists';
            }

            if (!$userModel->matchingPasswords($password, $verifyPassword)) {
                $errors[] = 'Passwords do not match';
            }

            if (!Validator::passwordRegexOk($password)) {
                $errors[] = 'Password does not meet complexity requirements';
            }

            if (!Validator::phoneNumberRegexOk($number)) {
                $errors[] = 'Phone number invalid format';
            }

            $imagePath = __DIR__ . '/../../Public/Assets/img/';
            $defaultProfileImg = 'default_img_profile.jpg';
            $filename = $defaultProfileImg;

            if ($imgProfile) {
                if (!Validator::imageTypeOk($imgProfile)) {
                    $errors[] = 'Image format not supported';
                } else {
                    $type = $imgProfile['type'];
                    $extension = explode('/', $type);
                    $filename = $username . '.' . $extension[1];
                    $uploadPath = $imagePath . $filename;

                    if (!move_uploaded_file($imgProfile['tmp_name'], $uploadPath)) {
                        $errors[] = 'Failed to upload profile image';
                    }
                }
            }

            if (empty($errors)) {
                $newUser =
                    [
                        'id' => $userModel->getIdAvailable(),
                        'username' => $username,
                        'email' => $email,
                        'password' => $password,
                        'address' => $address,
                        'phoneNumber' => $number,
                        'cartId' => "",
                        'token' => $userModel->generaToken(),
                        'verified' => false,
                        'imgProfile' => $filename,
                        'rol' => 'client',
                    ];
                $userModel->create($newUser);
                $mailer = new Mailer();
                $mailer->mailServerSetup();
                $mailer->addRec($newUser);
                $mailer->addVerifyContent($newUser);
                $mailer->send();
                $_SESSION['message'] = 'Comprueba tu email';
                header("Location: /auth/login");
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: /auth/register");
                exit();
            }
        }
    }

    public function login()
    {
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
            $params['message'] = $message;
        }

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
            $params['error'] = $error;
        }

        $params['title'] = 'Login';
        $this->render('auth/login', $params, 'main');
    }

    public function loginProcess()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['username']) || !empty($_POST['password'])) {
                $userModel = new User();
                $user = $userModel->credentialsOk($_POST['username'], $_POST['password']);
                if ($user != null) {
                    $_SESSION['userLogged'] = $user;
                    if ($user['rol'] == 'admin') {
                        header("Location: /admin/bookManagement");
                        exit();
                    }

                    if ($user['rol'] == 'delivery_person') {
                        header("Location: /delivery/orders");
                        exit();
                    }

                    header("Location: /user/profile");
                    exit();
                }
                $_SESSION['error'] = 'Username or password are incorrect';
                header("Location: /auth/login");
                exit();
            }
        }
    }

    public function loginWithGoogle()
    {
        $client = new Client();
        $client->setClientId(CLIENT_ID);
        $client->setClientSecret(CLIENT_SECRET);
        $client->setRedirectUri(REDIRECT_URI);
        $client->addScope("email");
        $client->addScope("profile");

        $authUrl = $client->createAuthUrl();
        header("Location: $authUrl");
        exit();
    }

    public function loginProcessWithGoogle()
    {
        $client = new Client();
        $client->setClientId(CLIENT_ID);
        $client->setClientSecret(CLIENT_SECRET);
        $client->setRedirectUri(REDIRECT_URI);

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $_SESSION['access_token'] = $token['access_token'];
            $client->setAccessToken($token['access_token']);

            $oauth2 = new \Google\Service\Oauth2($client);
            $userInfo = $oauth2->userinfo->get();

            $userModel = new User();
            $existingUser = $userModel->getUserByEmail($userInfo->email);

            if ($existingUser) {
                $_SESSION['userLogged'] = $existingUser;
            } else {
                $idNewUser = $userModel->getIdAvailable();
                $cartModel = new Cart();
                $newUser = [
                    'id' => $idNewUser,
                    'username' => $userInfo->name,
                    'email' => $userInfo->email,
                    'password' => "",
                    'address' => "",
                    'phoneNumber' => "",
                    'cartId' => $cartModel->createCartForUser($idNewUser),
                    'token' => "",
                    'verified' => true,
                    'imgProfile' => "default_img_profile.webp",
                    'rol' => 'client',
                ];

                $userModel->create($newUser);
                $_SESSION['userLogged'] = $newUser;
            }
            header("Location: /user/profile");
            exit();
        } else {
            $_SESSION['error'] = "Error al iniciar sesión con Google.";
            header("Location: /auth/login");
            exit();
        }
    }
}
