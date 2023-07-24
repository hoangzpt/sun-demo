<?php

class BookController
{
	public function index()
	{
		require_once 'model/Book.php';

        if(!isset($_SESSION))
        {
            session_start();
        }

        if (isset($_SESSION['user'])||isset($_COOKIE["user"])){
            $arr = (new Book())->all();
            require 'view/book/index.php';
        }else{
            $_SESSION['message'] = "vui lòng đăng nhập";
            header('Location: http://localhost/phpbasic/procrud/');
            die();
        }

	}

	public function create()

	{
        if(!isset($_SESSION))
        {
            session_start();
        }
        if (isset($_SESSION['user'])||isset($_COOKIE["user"])){
            require 'view/book/create.php';
        }else{
            $_SESSION['message'] = "vui lòng đăng nhập";
            header('Location: http://localhost/phpbasic/procrud/');
            die();
        }

	}

	public function store()
	{
        if(!isset($_SESSION))
        {
            session_start();
        }
		require_once 'model/Book.php';
        if (isset($_SESSION['user'])||isset($_COOKIE["user"])){
            (new Book())->create($_POST);
        }else{
            $_SESSION['message'] = "vui lòng đăng nhập";
            header('Location: http://localhost/phpbasic/procrud/');
            die();
        }


	}

	public function edit()
	{
		$ma = $_GET['ma'];
		require_once 'model/Book.php';

		$each = (new Book())->find($ma);
        if(!isset($_SESSION))
        {
            session_start();
        }
        if (isset($_SESSION['user'])||isset($_COOKIE["user"])){
            require 'view/book/edit.php';
        }else{
            $_SESSION['message'] = "vui lòng đăng nhập";
            header('Location: http://localhost/phpbasic/procrud/');
            die();
        }


	}

	public function update()
	{
		require_once 'model/Book.php';

		(new Book())->update($_POST);
        (new BookController())->index();
	}

	public function delete()
	{
		require_once 'model/Book.php';

		(new Book())->delete($_GET['ma']);
        (new BookController())->index();
	}
}