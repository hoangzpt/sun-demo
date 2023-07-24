<?php

class RegisterController
{
    public function index()
    {
        require 'view/registerform.php';
    }
    public function createuser()
    {

        if(!isset($_SESSION))
        {
            session_start();
        }
        if ($_POST['username'] == "") {
            $_SESSION['message1'] = 'vui lòng nhập username';
            (new RegisterController())->index();
            die();
        }
        if ($_POST['email'] == "") {
            $_SESSION['message1'] = 'vui lòng nhập email';
            (new RegisterController())->index();
            die();
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $_SESSION['message1'] = 'email chưa hợp lệ';
            (new RegisterController())->index();
            die();
        }

        if ($_POST['password'] == "") {

            $_SESSION['message1'] = 'vui lòng nhập password';
            (new RegisterController())->index();
            die();
        }
        if ($_POST['password'] != $_POST['repassword']) {

            $_SESSION['message1'] = 'repeat password chưa khớp với password';
            (new RegisterController())->index();
            die();
        }

        $sql = "select * from users";
        $result = (new ConnectData())->select($sql);
        foreach ($result as $row) {
            if ($row['username'] == $_POST['username']) {
                $_SESSION['message1'] = 'username này đã được sử dụng';
                (new RegisterController())->index();

                die();
            }
            if ($row['email'] == $_POST['email']) {
                $_SESSION['message1'] = 'email này đã được sử dụng';
                (new RegisterController())->index();

                die();
            }

        }



        $uppercase = preg_match('@[A-Z]@', $_POST['password']);
        $lowercase = preg_match('@[a-z]@', $_POST['password']);
        $number = preg_match('@[0-9]@', $_POST['password']);
        $specialChars = preg_match('@[^\w]@', $_POST['password']);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {

            $_SESSION['message1'] = 'password cần bao gồm ít nhất 1 chữ cái viết hoa, 1 chữ cái viết thường , 1 số, 1 kí tự đặc biệt và có độ dài lớn hơn bằng 8';
            (new RegisterController())->index();
            die();
        }

        $user = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        (new UserDao())->create($user, $pass, $email);
    }
}