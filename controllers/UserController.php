<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 14:27
 */

namespace Controllers;

use Core\View;
use Models\DeviceModel;
use Models\UserModel;

class UserController
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public static function loginFormView()
    {
        if(isset($_SESSION['login'])){
            echo "Вы уже авторизованы!";
        }else{
            $view = new View();
            echo $view->render('login');
        }

    }

    public static function login()
    {
        $user = new UserModel();
        if ($user->usernameExists($_POST['login']) &&
            $user->isValidUser($_POST['login'], $_POST['password'])) {
            $_SESSION['login'] = $_POST['login'];
            if (!empty($_SESSION['login'])) {
                header('Location: /stats');
            }
        }
    }

    public static function logout()
    {
        session_destroy();
        unset($_SESSION['login']);
        header('Location: /');
    }



}