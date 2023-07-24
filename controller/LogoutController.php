<?php

class LogoutController
{
    public function logout()
    {
        setcookie( "user", "", time()- 60, "/","", 0);
        setcookie( "pass", "", time()- 60, "/","", 0);
        if(!isset($_SESSION))
        {
            session_start();
        }
        unset($_SESSION['user']);
        $_SESSION['message'] = 'bạn đã đăng xuất';
        header('Location: http://localhost/phpbasic/procrud/');

    }
}