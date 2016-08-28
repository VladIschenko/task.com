<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 14:28
 */

namespace Models;

use Core\View;
use Core\Db;
use Controllers\UserController;
use PDO;


class UserModel {

    protected $db;
    private $username;
    private $pass;

    public function __construct() {
        $username = $this->username;
        $pass = $this->pass;
        $this->db = Db::connect();
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function usernameExists($username) {
        $stmt = $this->db->prepare("SELECT count(login) FROM users where login=?");
        $stmt->execute(array($username));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
        return false;
    }

    public function isValidUser($username, $pass) {
        $stmt = $this->db->prepare("SELECT password FROM users where login = :login");
        $stmt->bindParam(':login', $username);
        $stmt->execute();
        $check_pass = $stmt->fetchColumn();
        if ($check_pass == $pass) {
            return true;
        }
        return false;
    }

    public static function sessionStart()
    {
        if(session_id() == "") {
            session_start();
            $_SESSION['login'] = $_POST['login'];
        }
    }


    public static function sessionStop()
    {
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
            session_destroy();
            return true;
        }
        return false;
    }
}