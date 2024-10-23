<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Models\Cart;
use App\Helpers\Mailer;
use App\Helpers\Validator;
use Google\Client;
use Exception;

class UserController extends Controller
{
    public function index($values = null)
    { {
            if (!isset($_SESSION['user'])) {
                $params['title'] = 'Login';
                $this->render('user/login', $params, 'main');
            } else {
                $params['title'] = 'Register';
                $this->render('user/prueba', $params, 'main');
            }
        }
    }

    public function profile()
    {
        if (!isset($_SESSION['userLogged'])) {
            header("Location: /user/login");
            exit();
        }

        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
            $params['message'] = $message;
        }

        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
            $params['errors'] = $errors;
        }

        $userLogged = $_SESSION['userLogged'];
        $params['userLogged'] = $userLogged;
        $params['title'] = 'Profile';
        $this->render('user/profile', $params, 'main');
    }

    public function verified()
    {
        $params['title'] = 'Verified';
        $this->render('user/verified', $params, 'main');
    }

    public function verify($values = null)
    {
        $username = $values[0];
        $token = $values[1];
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
                $this->render("user/verified", $params, "main");
                return;
            }
        }

        // Si no se encontraron las credenciales
        $_SESSION['error'] = "Error al verificar credenciales por correo";
        header("Location: /user/register");
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
        $this->render('user/register', $params, 'main');
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

            /*             if (!$imgProfile) {
                //poner por defecto la imagen de default profile para usuario si no se indica una imagen para perfil
                //esta en la carpeta ../../Public/Assets/img/defaults_img_profile.jpg
            }
            if (!Validator::imageTypeOk($imgProfile)) {
                $errors[] = 'Image format not supported';
            } else {
                //aqui guardar imagen
                $type = $imgProfile['type'];
                $extension = explode('/', $type);
                //hacer algo para guardar imagen aqui
                $filename = $username . '.' . $extension[1];
            }
 */
            $imagePath = __DIR__ . '/../../Public/Assets/img/';
            $defaultProfileImg = 'default_img_profile.jpg';
            $filename = $defaultProfileImg; // Imagen por defecto

            if ($imgProfile) {
                // Verificar formato de imagen
                if (!Validator::imageTypeOk($imgProfile)) {
                    $errors[] = 'Image format not supported';
                } else {
                    // Guardar imagen de perfil del usuario
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
                header("Location: /user/login");
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: /user/register");
                exit();
            }
        }
    }

    public function login()
    {
        //aqui si el user verificado inicia sesion pues se inizializa el carrito
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
        $this->render('user/login', $params, 'main');
    }

    public function loginProcess()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['username']) || !empty($_POST['password'])) {
                $userModel = new User;
                $user = $userModel->credentialsOk($_POST['username'], $_POST['password']);
                if ($user != null) {
                    $_SESSION['userLogged'] = $user;
                    header("Location: /user/profile");
                    exit();
                }
                $_SESSION['error'] = 'Username or password are incorrect';
                header("Location: /user/login");
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
            header("Location: /user/login");
            exit();
        }
    }


    public function logout()
    {
        if (isset($_SESSION['userLogged'])) {
            unset($_SESSION['userLogged']);
        }
        header('Location: /user/login');
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

            if ($username !== $userLogged['username']) {
                if (!$userModel->isFieldAvailable('username', $username)) {
                    $errors[] = 'Username already exists';
                }
            }

            if ($newPassword !== $userLogged['password']) {
                if (!Validator::passwordRegexOk($newPassword)) {
                    $errors[] = 'Password does not meet complexity requirements';
                }
            }

            if ($phoneNumber && $phoneNumber !== $userLogged['phoneNumber']) {
                if (!$userModel->isFieldAvailable('phoneNumber', $phoneNumber)) {
                    $errors[] = 'Phone number already registered';
                }
            }

            /* $filename = $userLogged['imgProfile'];
            if ($imgProfile && $imgProfile['error'] === UPLOAD_ERR_OK) {
                $imagePath = __DIR__ . '/../../Public/Assets/img/';
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
            } */

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

    public function prueba () {
        $params['title'] = 'prueba';
        $user = $_SESSION['userLogged'];
        $carritoModel = new Cart();
        $carrito = $carritoModel->getCartByUser($user);
        $params['carritoDeUsuario'] = $carrito;
        $this->render('user/prueba', $params, 'main');
    }
}
