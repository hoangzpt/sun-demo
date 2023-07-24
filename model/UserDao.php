<?php
require_once 'model/User.php';
require_once 'model/ConnectData.php';
class UserDao
{
    public function all() {
        $sql = "select * from users";
        $result = (new ConnectData())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $object = new User($row);
            $arr[] = $object;
        }
        return $arr;
    }

    public function create($username,$password,$email)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        $sql = "INSERT INTO users (username, password ,email) VALUES ('$username', '$password', '$email')";
        if ((new ConnectData())->select($sql) === TRUE) {
            $_SESSION['message'] = "đăng kí thành công";
            header('Location: http://localhost/phpbasic/procrud/');
            die();
        } else {
            $_SESSION['message1'] = "đăng kí không thành công";
            (new RegisterController())->index();
            die();
        }
    }
//        session_start();
//        if ($_POST['username'] == "") {
//            $_SESSION['message1'] = 'vui lòng nhập username';
//            header('Location: ../view/registerform.php');
//            die();
//        }
//
//        if ($_POST['password'] == '') {
//            header('Location: ../view/registerform.php');
//            $_SESSION['message1'] = 'vui lòng nhập password';
//            die();
//        }
//        if ($_POST['password'] != $_POST['repassword']) {
//            header('Location: ../view/registerform.php');
//            $_SESSION['message1'] = 'repeat password chưa khớp với password';
//            die();
//        }
//
//        $sql = "select * from users";
//        $result = (new Connect())->query($sql);
//        foreach ($result as $row) {
//            if ($row['username'] == $_POST['username']) {
//                header('Location: ../view/registerform.php');
//                $_SESSION['message1'] = '../view/registerform.php';
//                die();
//            }
//            if ($row['email'] == $_POST['email']) {
//                header('Location: ../view/registerform.php');
//                $_SESSION['message1'] = 'email này đã được sử dụng';
//                die();
//            }
//
//        }
//
//        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
//            header('Location: ../view/registerform.php');
//            $_SESSION['message1'] = 'email chưa hợp lệ';
//            die();
//        }
//
//        $uppercase = preg_match('@[A-Z]@', $_POST['password']);
//        $lowercase = preg_match('@[a-z]@', $_POST['password']);
//        $number = preg_match('@[0-9]@', $_POST['password']);
//        $specialChars = preg_match('@[^\w]@', $_POST['password']);
//
//        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
//            header('Location: ../view/registerform.php');
//            $_SESSION['message1'] = 'password cần bao gồm ít nhất 1 chữ cái viết hoa, 1 chữ cái viết thường , 1 số, 1 kí tự đặc biệt và có độ dài lớn hơn bằng 8';
//            die();
//        }
//
//        $user = $_POST['username'];
//        $pass = $_POST['password'];
//        $email = $_POST['email'];
//
//
//        $sql = "INSERT INTO users (username, password ,email) VALUES ('$user', '$pass', '$email')";
//
//
//        if ((new Connect())->query($sql) === TRUE) {
//            $_SESSION['message'] = "đăng kí thành công";
//            header('Location: ../index.php');
//            die();
//        } else {
//            $_SESSION['message'] = "đăng kí không thành công";
//            header('Location: ../index.php');
//            die();
//
//        }

}