<?php
require 'model/UserDao.php';

class LoginController
{
    public function index()
    {
         require 'view/index.php';
    }
    public function checklogin()
    {
//        $servername = "localhost";
//        $username = "root";
//        $password = "";
//        $con = mysqli_connect($servername, $username, $password);
//        mysqli_select_db($con, "projectmini");
//if(!$con){
//    die("Could not connect to".mysqli_error());
//}else{
//    echo 'Connect';
//}
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if (isset($_POST['remember'])) {
            $rememberlogin = $_POST['remember'];
        }
        session_start();
        $listusers = (new UserDao())->all();
        foreach ($listusers as $luser) {
            if ($luser->get_username() == $user && $luser->get_password() == $pass) {
                if (isset($rememberlogin)) {
                    setcookie("user", $user, time() + (86400 * 30), '/');
                    setcookie("pass", $pass, time() + (86400 * 30), '/');
                } else {
                    setcookie("user", "", time() - 60, "/", "", 0);
                    setcookie("pass", "", time() - 60, "/", "", 0);
                    $_SESSION['user'] = $user;
                }
                (new BookController())->index();
                die();
            } else {

            }
        }
        header('Location: http://localhost/phpbasic/procrud/');
        $_SESSION['message'] = 'thông tin user không chính xác';

    }

}